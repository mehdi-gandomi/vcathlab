<template>
    <div class="mb-base">
        <vx-card>
            <template v-slot:actions>
                <vs-button color="primary" to="/user/ct_cases" type="filled">{{
                    __("Back")
                }}</vs-button>
            </template>
            <form @submit="onSubmit">
                <vs-row vs-type="flex" vs-w="12" class="mb-6">
                    <vs-col vs-type="flex" vs-align="center" vs-lg="6">
                        <vs-row vs-type="flex" vs-w="12">
                            <vs-col
                                class="justify-end"
                                vs-type="flex"
                                vs-align="center"
                                vs-lg="3"
                            >
                                <span>{{ __("patient") }}</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <v-select
                                    :dir="$vs.rtl ? 'rtl' : 'ltr'"
                                    :value="inputs.patient_id.selected"
                                    @input="
                                        op => onRelationSelect('patient_id', op)
                                    "
                                    label="id"
                                    :filterable="false"
                                    :options="inputs.patient_id.options"
                                    @search="
                                        (search, loading) =>
                                            onRelationSearch(
                                                'patient_id',
                                                search,
                                                loading
                                            )
                                    "
                                >
                                    <template slot="no-options">
                                        {{ __("Type to search") }}
                                    </template>
                                </v-select>
                            </vs-col>
                        </vs-row>
                    </vs-col>
                    <vs-col vs-type="flex" vs-align="center" vs-lg="6">
                        <vs-row vs-type="flex" vs-w="12">
                            <vs-col
                                class="justify-end pr-5"
                                vs-type="flex"
                                vs-align="center"
                                vs-lg="3"
                            >
                                <span>{{ __("Ct File") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    imageResizeMode="cover"
                                    :is="inputs.ct_file.type"
                                    class="w-full"
                                    :danger="hasValidationError('ct_file')"
                                    :danger-text="validationError('ct_file')"
                                    name="ct_file"
                                    :label-idle="
                                        inputs.ct_file.filepond_options[
                                            'label-idle'
                                        ]
                                    "
                                    :allow-multiple="
                                        inputs.ct_file.filepond_options[
                                            'allow-multiple'
                                        ]
                                    "
                                    :instant-upload="
                                        inputs.ct_file.filepond_options[
                                            'instant-upload'
                                        ]
                                    "
                                    :files="inputs.ct_file.files"
                                    :server="uploadServer"
                                />
                            </vs-col>
                        </vs-row>
                    </vs-col>
                </vs-row>
                <vs-row vs-type="flex" vs-w="12" class="mb-6">
                    <vs-col vs-type="flex" vs-align="center" vs-lg="6">
                        <vs-row vs-type="flex" vs-w="12">
                            <vs-col
                                class="justify-end pr-5"
                                vs-type="flex"
                                vs-align="center"
                                vs-lg="3"
                            >
                                <span>{{ __("Result") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.result.type"
                                    v-model="form.result"
                                    class="w-full"
                                    :danger="hasValidationError('result')"
                                    :danger-text="validationError('result')"
                                    name="result"
                                    type="quill"
                                />
                            </vs-col>
                        </vs-row>
                    </vs-col>
                </vs-row>
                <vs-row vs-type="flex" vs-w="12" class="mb-6"> </vs-row>

                <div class="flex justify-end mt-16">
                    <div class="flex">
                        <vs-button
                            color="success"
                            @click="() => onSubmit('new')"
                            class="mr-3 mb-2"
                            >{{ __("Save and new") }}</vs-button
                        >
                        <vs-button
                            color="success"
                            @click="() => onSubmit('close')"
                            class="mr-3 mb-2"
                            >{{ __("Save and close") }}</vs-button
                        >
                        <vs-button
                            color="warning"
                            class="mb-2"
                            @click="form.reset()"
                            >{{ __("Clear") }}</vs-button
                        >
                    </div>
                </div>
            </form>
        </vx-card>
    </div>
</template>

<script>
import Form from "@/Form";
import HasForm from "@/mixins/HasForm";
export default {
    components: {},
    mixins: [HasForm],
    data() {
        return {
            form: new Form({
                ct_file: "",
                result: "",
                patient_id: ""
            }),
            model: "Modules\\User\\Models\\CtCase",
            locale: Iracode.$i18n.locale,
            inputs: {
                ct_file: {
                    type: "filepond",
                    filepond_options: {
                        "label-idle": "Drag &amp; Drop your files",
                        "allow-multiple": Iracode.toBool(0),
                        "instant-upload": Iracode.toBool(0)
                    }
                },
                result: {
                    type: "quill-editor"
                },
                patient_id: {
                    field_type: "relation",
                    options: [],
                    selected: {},
                    foreign_key: "patient_id",
                    relation_name: "patient",
                    searchUrl: "/user/api/patients",
                    titleField: "id"
                }
            }
        };
    },
    props: {
        //
    },
    computed: {
        //
    },
    created() {
        //
    },
    mounted() {
        //
    },
    methods: {
        async onSubmit(action) {
            const data = await this.form.post("/user/api/ct_cases");
            if (data.success) {
                Iracode.success(this.__("Ctcase Created Successfully"));
                if (action == "close") this.$router.push("/user/ct_cases");
                else this.form.reset();
            }
        }
    }
};
</script>
