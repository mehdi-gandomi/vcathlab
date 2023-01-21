<template>
    <div class="mb-base">
        <vx-card>
            <template v-slot:actions>
                <vs-button
                    color="primary"
                    to="/user/body_compositions"
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
                                <span>{{ __("patient") }}</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <v-select
                                    style="width: 100%"
                                    :dir="$vs.rtl ? 'rtl' : 'ltr'"
                                    :value="inputs.patient_id.selected"
                                    @input="
                                        (op) =>
                                            onRelationSelect('patient_id', op)
                                    "
                                    label="name"
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
                                class="justify-end"
                                vs-type="flex"
                                vs-align="center"
                                vs-lg="3"
                            >
                                <span>{{ __("user") }}</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <v-select
                                    style="width: 100%"
                                    :dir="$vs.rtl ? 'rtl' : 'ltr'"
                                    :value="inputs.user_id.selected"
                                    @input="
                                        (op) => onRelationSelect('user_id', op)
                                    "
                                    label="email"
                                    :filterable="false"
                                    :options="inputs.user_id.options"
                                    @search="
                                        (search, loading) =>
                                            onRelationSearch(
                                                'user_id',
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
                                <span>{{ __("Age") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.Age.type"
                                    v-model="form.Age"
                                    class="w-full"
                                    :danger="hasValidationError('Age')"
                                    :danger-text="validationError('Age')"
                                    name="Age"
                                    type="text"
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
                                <span>{{ __("Sex") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.Sex.type"
                                    v-model="form.Sex"
                                    class="w-full"
                                    :danger="hasValidationError('Sex')"
                                    :danger-text="validationError('Sex')"
                                    name="Sex"
                                    type="radio"
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
                                <span>{{ __("Waist") }}</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.Waist.type"
                                    v-model="form.Waist"
                                    class="w-full"
                                    :danger="hasValidationError('Waist')"
                                    :danger-text="validationError('Waist')"
                                    name="Waist"
                                    type="text"
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
                                <span>{{ __("S M M") }}</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.SMM.type"
                                    v-model="form.SMM"
                                    class="w-full"
                                    :danger="hasValidationError('SMM')"
                                    :danger-text="validationError('SMM')"
                                    name="SMM"
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
                                <span>{{ __("V F P") }}</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.VFP.type"
                                    v-model="form.VFP"
                                    class="w-full"
                                    :danger="hasValidationError('VFP')"
                                    :danger-text="validationError('VFP')"
                                    name="VFP"
                                    type="text"
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
                                <span>{{ __("Height") }}</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.Height.type"
                                    v-model="form.Height"
                                    class="w-full"
                                    :danger="hasValidationError('Height')"
                                    :danger-text="validationError('Height')"
                                    name="Height"
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
                                <span>{{ __("Weight") }}</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.Weight.type"
                                    v-model="form.Weight"
                                    class="w-full"
                                    :danger="hasValidationError('Weight')"
                                    :danger-text="validationError('Weight')"
                                    name="Weight"
                                    type="text"
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
                                <span>{{ __("Hip") }}</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.Hip.type"
                                    v-model="form.Hip"
                                    class="w-full"
                                    :danger="hasValidationError('Hip')"
                                    :danger-text="validationError('Hip')"
                                    name="Hip"
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
                                <span>{{ __("B F M P") }}</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.BFMP.type"
                                    v-model="form.BFMP"
                                    class="w-full"
                                    :danger="hasValidationError('BFMP')"
                                    :danger-text="validationError('BFMP')"
                                    name="BFMP"
                                    type="text"
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
                            @click="() => onSubmit('close')"
                            class="mr-3 mb-2"
                            >{{ __("Save") }}</vs-button
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
import UpdatePage from "@/mixins/UpdatePage";
export default {
    components: {},
    mixins: [HasForm, UpdatePage],
    data() {
        return {
            form: new Form({
                Age: "",
                Sex: "",
                Waist: "",
                SMM: "",
                VFP: "",
                Height: "",
                Weight: "",
                Hip: "",
                BFMP: "",
                user_id: "",
                patient_id: "",
            }),
            model: "Modules\\User\\Models\\BodyComposition",
            inputs: {
                Age: {
                    type: "vs-input",
                    field_type: "text",
                },
                Sex: {
                    type: "vs-radio",
                    field_type: "radio",
                },
                Waist: {
                    type: "vs-input",
                    field_type: "text",
                },
                SMM: {
                    type: "vs-input",
                    field_type: "text",
                },
                VFP: {
                    type: "vs-input",
                    field_type: "text",
                },
                Height: {
                    type: "vs-input",
                    field_type: "text",
                },
                Weight: {
                    type: "vs-input",
                    field_type: "text",
                },
                Hip: {
                    type: "vs-input",
                    field_type: "text",
                },
                BFMP: {
                    type: "vs-input",
                    field_type: "text",
                },
                user_id: {
                    field_type: "relation",
                    foreign_key: "user_id",
                    relation_name: "user",
                    options: [],
                    selected: {},
                    searchUrl: "/panel/api/users",
                    titleField: "email",
                },
                patient_id: {
                    field_type: "relation",
                    foreign_key: "patient_id",
                    relation_name: "patient",
                    options: [],
                    selected: {},
                    searchUrl: "/user/api/patients",
                    titleField: "name",
                },
            },
        };
    },
    props: {
        //
    },
    computed: {
        //
    },
    async created() {
        const { data: response } = await this.$http.get(
            `/user/api/body_compositions/${this.$route.params.id}`
        );
        if (response.success) {
            const { data } = response;
            this.$store.dispatch("setCurrentResource", data);
            this.populateFormFields(data);
        }
    },
    mounted() {
        //
    },
    methods: {
        async onSubmit(action) {
            const data = await this.form.put(
                `/user/api/body_compositions/${this.$route.params.id}`
            );
            if (data.success) {
                Iracode.success(
                    this.__("Bodycomposition Updated Successfully")
                );
            }
            if (action == "close") this.$router.push("/user/body_compositions");
            else this.form.reset();
        },
    },
};
</script>
