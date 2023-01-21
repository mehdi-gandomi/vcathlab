<template>
    <div class="mb-base">
        <vx-card>
            <template v-slot:actions>
                <vs-button
                    color="primary"
                    to="/user/computation_centers"
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
                                <span>{{ __("Name") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.name.type"
                                    v-model="form.name"
                                    class="w-full"
                                    :danger="hasValidationError('name')"
                                    :danger-text="validationError('name')"
                                    name="name"
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
                                <span>{{ __("Physician") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.physician.type"
                                    v-model="form.physician"
                                    class="w-full"
                                    :danger="hasValidationError('physician')"
                                    :danger-text="validationError('physician')"
                                    name="physician"
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
                                <span>{{ __("Hospital") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.hospital.type"
                                    v-model="form.hospital"
                                    class="w-full"
                                    :danger="hasValidationError('hospital')"
                                    :danger-text="validationError('hospital')"
                                    name="hospital"
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
                                <span>{{ __("Age") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.age.type"
                                    v-model="form.age"
                                    class="w-full"
                                    :danger="hasValidationError('age')"
                                    :danger-text="validationError('age')"
                                    name="age"
                                    type="number"
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
                                <span>{{ __("Sex") }}</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.sex.type"
                                    v-model="form.sex"
                                    class="w-full"
                                    :danger="hasValidationError('sex')"
                                    :danger-text="validationError('sex')"
                                    name="sex"
                                    type="radio"
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
                                <span>{{ __("Mobile") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.mobile.type"
                                    v-model="form.mobile"
                                    class="w-full"
                                    :danger="hasValidationError('mobile')"
                                    :danger-text="validationError('mobile')"
                                    name="mobile"
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
                name: "",
                physician: "",
                hospital: "",
                age: "",
                sex: "",
                mobile: "",
                patient_id: "",
                user_id: "",
            }),
            model: "Modules\\User\\Models\\ComputationCenter",
            inputs: {
                name: {
                    type: "vs-input",
                    field_type: "text",
                },
                physician: {
                    type: "vs-input",
                    field_type: "text",
                },
                hospital: {
                    type: "vs-input",
                    field_type: "text",
                },
                age: {
                    type: "vs-input",
                    field_type: "number",
                },
                sex: {
                    type: "vs-radio",
                    field_type: "radio",
                },
                mobile: {
                    type: "vs-input",
                    field_type: "text",
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
                user_id: {
                    field_type: "relation",
                    foreign_key: "user_id",
                    relation_name: "user",
                    options: [],
                    selected: {},
                    searchUrl: "/panel/api/users",
                    titleField: "email",
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
            `/user/api/computation_centers/${this.$route.params.id}`
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
                `/user/api/computation_centers/${this.$route.params.id}`
            );
            if (data.success) {
                Iracode.success(
                    this.__("Computationcenter Updated Successfully")
                );
            }
            if (action == "close")
                this.$router.push("/user/computation_centers");
            else this.form.reset();
        },
    },
};
</script>
