<template>
    <div class="mb-base">
        <vx-card>
            <template v-slot:actions>
                <vs-button
                    color="primary"
                    to="/admin/complex_cases"
                    type="filled"
                    >{{ __("Back") }}</vs-button
                >
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
                                <span>{{ __("complexCaseCategory") }}</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <v-select
                                    style="width: 100%"
                                    :dir="$vs.rtl ? 'rtl' : 'ltr'"
                                    :value="
                                        inputs.complex_case_category_id.selected
                                    "
                                    @input="
                                        op =>
                                            onRelationSelect(
                                                'complex_case_category_id',
                                                op
                                            )
                                    "
                                    label="name"
                                    :filterable="false"
                                    :options="
                                        inputs.complex_case_category_id.options
                                    "
                                    @search="
                                        (search, loading) =>
                                            onRelationSearch(
                                                'complex_case_category_id',
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
                                <span>{{ __("Title") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.title.type"
                                    v-model="form.title"
                                    class="w-full"
                                    :danger="hasValidationError('title')"
                                    :danger-text="validationError('title')"
                                    name="title"
                                    type="text"
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
                                <span>{{ __("Slug") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.slug.type"
                                    v-model="form.slug"
                                    class="w-full"
                                    :danger="hasValidationError('slug')"
                                    :danger-text="validationError('slug')"
                                    name="slug"
                                    type="text"
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
                                <span>{{ __("Summary") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.summary.type"
                                    v-model="form.summary"
                                    class="w-full"
                                    :danger="hasValidationError('summary')"
                                    :danger-text="validationError('summary')"
                                    name="summary"
                                    type="quill"
                                />
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
                                <span>{{ __("Short Summary") }}</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.short_summary.type"
                                    v-model="form.short_summary"
                                    class="w-full"
                                    :danger="
                                        hasValidationError('short_summary')
                                    "
                                    :danger-text="
                                        validationError('short_summary')
                                    "
                                    name="short_summary"
                                    type="textarea"
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
                                <span>{{ __("File") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    imageResizeMode="cover"
                                    :is="inputs.file.type"
                                    class="w-full"
                                    :danger="hasValidationError('file')"
                                    :danger-text="validationError('file')"
                                    name="file"
                                    :label-idle="
                                        inputs.file.filepond_options[
                                            'label-idle'
                                        ]
                                    "
                                    :allow-multiple="
                                        inputs.file.filepond_options[
                                            'allow-multiple'
                                        ]
                                    "
                                    :instant-upload="
                                        inputs.file.filepond_options[
                                            'instant-upload'
                                        ]
                                    "
                                    :files="inputs.file.files"
                                    :server="uploadServer"
                                />
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
                                <span>{{ __("Status") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <vs-radio
                                    v-model="form.status"
                                    vs-name="status"
                                    vs-value="0"
                                    >Init</vs-radio
                                >
                                <vs-radio
                                    v-model="form.status"
                                    vs-name="status"
                                    vs-value="1"
                                    >Active</vs-radio
                                >
                                <vs-radio
                                    v-model="form.status"
                                    vs-name="status"
                                    vs-value="2"
                                    >Deactive</vs-radio
                                >
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
                title: "",
                slug: "",
                summary: "",
                short_summary: "",
                file: "",
                status: "0",
                complex_case_category_id: ""
            }),
            model: "Modules\\Admin\\Models\\ComplexCase",
            locale: Iracode.$i18n.locale,
            inputs: {
                title: {
                    type: "vs-input",
                    field_type: "text"
                },
                slug: {
                    type: "vs-input",
                    field_type: "text"
                },
                summary: {
                    type: "quill-editor",
                    field_type: "quill"
                },
                short_summary: {
                    type: "vs-textarea",
                    field_type: "textarea"
                },
                file: {
                    type: "filepond",
                    field_type: "filepond",
                    files: [],
                    filepond_options: {
                        "label-idle": "Drag &amp; Drop your files",
                        "allow-multiple": Iracode.toBool(0),
                        "instant-upload": Iracode.toBool(1)
                    }
                },
                status: {
                    type: "vs-radio",
                    field_type: "radio"
                },
                complex_case_category_id: {
                    field_type: "relation",
                    options: [],
                    selected: {},
                    foreign_key: "complex_case_category_id",
                    relation_name: "complexCaseCategory",
                    searchUrl: "/admin/api/complex_case_categories",
                    titleField: "name"
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
            const data = await this.form.post("/admin/api/complex_cases");
            if (data.success) {
                Iracode.success(this.__("Complexcase Created Successfully"));
                if (action == "close")
                    this.$router.push("/admin/complex_cases");
                else this.form.reset();
            }
        }
    }
};
</script>
