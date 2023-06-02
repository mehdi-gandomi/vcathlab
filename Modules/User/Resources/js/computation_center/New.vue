<template>
    <div class="mb-base">
        <vx-card :title="__('Patient Information')">
            <template v-slot:actions>
                <vs-button
                    color="primary"
                    to="/computation_center/list"
                    type="filled"
                    >{{ __("Back") }}</vs-button
                >
            </template>
            <form @submit="onSubmit">

                <vs-row vs-type="flex" vs-w="12" class="mb-6">
                    <vs-col vs-type="flex" vs-align="center" vs-lg="4">
                        <vs-row vs-type="flex" vs-w="12">
                            <vs-col
                                class="justify-end"
                                vs-type="flex"
                                vs-align="center"
                                vs-lg="3"
                            >
                                <span>{{ __("Name") }}</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <vs-input v-model="form.name" class="w-full" name="name" type="text" />
                            </vs-col>
                        </vs-row>
                    </vs-col>
                    <vs-col vs-type="flex" vs-align="center" vs-lg="4">
                        <vs-row vs-type="flex" vs-w="12">
                            <vs-col
                                class="justify-end"
                                vs-type="flex"
                                vs-align="center"
                                vs-lg="3"
                            >
                                <span>{{ __("Physician") }}</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <vs-input v-model="form.physician" class="w-full" name="physician" type="text" />
                            </vs-col>
                        </vs-row>
                    </vs-col>
                    <vs-col vs-type="flex" vs-align="center" vs-lg="3">
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
                                <div>
                                        <vs-radio
                                        v-model="form.sex"
                                        vs-name="sex"
                                        vs-value="1"
                                        >Male</vs-radio
                                    >
                                    <vs-radio
                                        v-model="form.sex"
                                        vs-name="sex"
                                        vs-value="2"
                                        class="ml-4"
                                        >Female</vs-radio
                                    >

                                </div>
                            </vs-col>
                        </vs-row>
                    </vs-col>

                </vs-row>
                <vs-row class="mt-4">
                    <vs-col vs-type="flex" vs-align="center" vs-lg="4">
                        <vs-row vs-type="flex" vs-w="12">
                            <vs-col
                                class="justify-end"
                                vs-type="flex"
                                vs-align="center"
                                vs-lg="3"
                            >
                                <span>{{ __("Hospital") }}</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <vs-input v-model="form.hospital" class="w-full" name="hospital" type="text" />
                            </vs-col>
                        </vs-row>
                    </vs-col>
                    <vs-col vs-type="flex" vs-align="center" vs-lg="4">
                        <vs-row vs-type="flex" vs-w="12">
                            <vs-col
                                class="justify-end"
                                vs-type="flex"
                                vs-align="center"
                                vs-lg="3"
                            >
                                <span>{{ __("Age") }}</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <vs-input v-model="form.age" class="w-full" name="age" type="number" />
                            </vs-col>
                        </vs-row>
                    </vs-col>

                    <vs-col vs-type="flex" vs-align="center" vs-lg="4">
                        <vs-row vs-type="flex" vs-w="12">
                            <vs-col
                                class="justify-end"
                                vs-type="flex"
                                vs-align="center"
                                vs-lg="3"
                            >
                                <span>{{ __("Mobile") }}</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <vs-input v-model="form.phone" class="w-full" name="phone" type="text" />
                            </vs-col>
                        </vs-row>
                    </vs-col>
                    <vs-col
                    vs-type="flex" vs-align="center" vs-lg="4"
              >
              <vs-row vs-type="flex" vs-w="12" class="mt-4">
                            <vs-col
                                class="justify-end"
                                vs-type="flex"
                                vs-align="center"
                                vs-lg="3"
                            >
                                <span>{{ __("Procedure") }}</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <v-select
                                    v-model="form.patient_procedure"
                                    style="width:100%"
                                    name="patient_procedure"
                                    :options="procedures"
                                    type="text"
                                ></v-select>
                            </vs-col>
                        </vs-row>
              </vs-col>
                </vs-row>
                <div class="flex justify-center mt-16">
                    <vs-button
                            color="success"
                            @click="() => onSubmit('new')"
                            class="mr-3 mb-2"
                            size="large"
                            >{{ __("Admission") }}</vs-button
                        >
                </div>
            </form>
        </vx-card>
    </div>
</template>

<script>
import Form from "@/Form";
// import HasForm from "@/mixins/HasForm";
export default {
    components: {},
    // mixins: [HasForm],
    data() {
        return {
            form: new Form({
                name:"",
                age:"",
                physician:"",
                patient_id:"",
                sex:1,
                hospital:"",
                phone:"",
                patient_procedure:""
            }),
            procedures:[
            "Angio NIFFR",
            "CT Angio NIFFR",
            "Complex Case",
            "Angiography Risk"
          ],
            model: "Modules\\User\\Models\\MaceAssesment",
            locale: Iracode.$i18n.locale,
            inputs: {
                HbA1C: {
                    type: "vs-input",
                    field_type: "text"
                },
                LDL_cholesterol: {
                    type: "vs-input",
                    field_type: "text"
                },
                HDL_cholesterol: {
                    type: "vs-input",
                    field_type: "text"
                },
                Age: {
                    type: "vs-input",
                    field_type: "number"
                },
                SBP: {
                    type: "vs-input",
                    field_type: "text"
                },
                Triglycerides: {
                    type: "vs-input",
                    field_type: "text"
                },
                DBP: {
                    type: "vs-input",
                    field_type: "text"
                },
                LeftAnklebrachialIndex: {
                    type: "vs-input",
                    field_type: "text"
                },
                RightAnklebrachialIndex: {
                    type: "vs-input",
                    field_type: "text"
                },
                Heigth: {
                    type: "vs-input",
                    field_type: "text"
                },
                Weigth: {
                    type: "vs-input",
                    field_type: "text"
                },
                Sex: {
                    type: "vs-radio",
                    field_type: "radio"
                },
                Smoker: {
                    type: "vs-input",
                    field_type: "text"
                },
                TBP: {
                    type: "vs-input",
                    field_type: "text"
                },
                MI: {
                    type: "vs-input",
                    field_type: "text"
                },
                Diabetes: {
                    type: "vs-input",
                    field_type: "text"
                },
                FH: {
                    type: "vs-input",
                    field_type: "text"
                },
                THL: {
                    type: "vs-input",
                    field_type: "text"
                },
                user_id: {
                    field_type: "relation",
                    options: [],
                    selected: {},
                    foreign_key: "user_id",
                    relation_name: "user",
                    searchUrl: "/panel/api/users",
                    titleField: "email"
                },
                patient_id: {
                    field_type: "relation",
                    options: [],
                    selected: {},
                    foreign_key: "patient_id",
                    relation_name: "patient",
                    searchUrl: "/user/api/patients",
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
            Iracode.loading();
            const {data:patient} = await this.$http.post("/user/api/patients",this.form);
            // this.patientResult=patient;

            this.form.patient_id=patient.data.id;
            const data = await this.form.post("/user/api/computation_center");
            Iracode.close_loading();
            if (data.ok) {
                Iracode.success(this.__("Your request sent successfully"));
                this.form.reset();
            }
        }
    }
};
</script>
