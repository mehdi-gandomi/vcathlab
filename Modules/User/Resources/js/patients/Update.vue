<template>
    <div class="mb-base">
        <vx-card>
            <template v-slot:actions>
                <vs-button color="primary" to="/user/patients" type="filled">{{
                    __("Back")
                }}</vs-button>
            </template>
            <form @submit="onSubmit">
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
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <vs-radio
                                    v-model="form.sex"
                                    vs-name="sex"
                                    vs-value="1"
                                    >Male</vs-radio
                                >
                                <vs-radio
                                    v-model="form.sex"
                                    vs-name="sex"
                                    vs-value="0"
                                    >Female</vs-radio
                                >
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
                age: "",
                sex: "1",
                hospital: ""
            }),
            model: "Modules\\User\\Models\\Patient",
            inputs: {
                name: {
                    type: "vs-input",
                    field_type: "text"
                },
                age: {
                    type: "vs-input",
                    field_type: "number"
                },
                sex: {
                    type: "vs-radio",
                    field_type: "radio"
                },
                hospital: {
                    type: "vs-input",
                    field_type: "text"
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
    async created() {
        const { data: response } = await this.$http.get(
            `/user/api/patients/${this.$route.params.id}`
        );
        if (response.success) {
            const { data } = response;
            this.$store.dispatch("setCurrentResource", data);
            this.populateFormFields(data);
        }
this.loading=false;
    },
    mounted() {
        //
    },
    methods: {
        async onSubmit(action) {
            const data = await this.form.put(
                `/user/api/patients/${this.$route.params.id}`
            );
            if (data.success) {
                Iracode.success(this.__("Patient Updated Successfully"));
            }
            if (action == "close") this.$router.push("/user/patients");
            else this.form.reset();
        }
    }
};
</script>
