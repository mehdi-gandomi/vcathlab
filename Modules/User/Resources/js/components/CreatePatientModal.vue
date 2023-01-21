<template>
    <vs-popup class="holamundo"  title="Create patient" :active.sync="show" >
        <form @submit="onSubmit">
            <vs-row vs-type="flex" vs-w="12" class="mb-6 m-0">
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
            <vs-row vs-type="flex" vs-w="12" class="mb-6 m-0">
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
                                class="ml-4"
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
            <vs-button
                color="success"
                @click="() => onSubmit('close')"
                class="mr-3 mb-2"
                >{{ __("Save") }}</vs-button
            >
        </form>
    </vs-popup>
</template>

<script>
import Form from "@/Form";
import HasForm from "@/mixins/HasForm";
export default {
    props:{
        show:{

        }
    },
    components: {},
    mixins: [HasForm],
    data() {
        return {
            form: new Form({
                name: "",
                age: "",
                sex: "1",
                hospital: ""
            }),
            model: "Modules\\User\\Models\\Patient",
            locale: Iracode.$i18n.locale,
            inputs: {
                name: {
                    type: "vs-input"
                },
                age: {
                    type: "vs-input"
                },
                sex: {
                    type: "vs-radio"
                },
                hospital: {
                    type: "vs-input"
                }
            }
        };
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
            Iracode.loading();
            const data = await this.form.post("/user/api/patients");
            Iracode.close_loading();
            if (data.success) {
                Iracode.success(this.__("Patient Created Successfully"));

                return this.$emit("created",data.data);
            }
            Iracode.error(this.__("An error occured while creating the patient"));
        }
    }
};
</script>
