<template>
    <div class="mb-base">
        <vx-card>
            <h2 style="text-align: center;padding: 2rem;border: 1px solid #000;">Body Composition</h2>

            <form @submit="onSubmit">
                <div>
                    <h4 class="gray">Patient Information:</h4>
                    <vs-row vs-type="flex" vs-w="12" class="mb-6 m-0">
                        <vs-col vs-type="flex" vs-align="center" vs-lg="4" vs-sm="6" vs-xs="12">
                            <div class="flex text-left">
                                <span>{{ __("Name") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </div>
                            <component :is="inputs.name.type" v-model="patient.name"
                                style="width:250px;margin-left:1rem" :danger="hasValidationError('name')"
                                :danger-text="validationError('name')" name="name" type="text" />
                        </vs-col>
                        <vs-col vs-type="flex" vs-align="center" vs-lg="2" vs-sm="6" vs-xs="12">
                            <div class="flex text-left">
                                <span>{{ __("Code") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </div>

                            <component :is="inputs.code.type" v-model="patient.code"
                                style="width:120px;margin-left:1rem" :danger="hasValidationError('code')"
                                :danger-text="validationError('code')" name="code" type="text" />
                        </vs-col>
                        <vs-col vs-type="flex" vs-align="center" vs-lg="3" vs-sm="6" vs-xs="6">
                            <div class="flex text-left">
                                <span>{{ __("Age") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </div>

                            <component :is="inputs.Age.type" v-model="form.Age" style="width:80px;margin-left:1rem"
                                :danger="hasValidationError('Age')" :danger-text="validationError('Age')" name="Age"
                                type="number" />
                        </vs-col>

                        <vs-col vs-type="flex" vs-align="center" vs-lg="3" vs-sm="6" vs-xs="12">
                            <div class="flex text-left">
                                <span>{{ __("Sex") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </div>

                            <div
                                style="display:flex;justify-content:space-around;width:100%;margin-top:0.5rem;margin-left:1.5rem">
                                <vs-radio v-model="form.Sex" vs-name="Sex" vs-value="1">Male</vs-radio>
                                <vs-radio v-model="form.Sex" vs-name="Sex" vs-value="0" class="ml-4">Female</vs-radio>
                            </div>
                        </vs-col>
                    </vs-row>
                </div>
                <div>

                    <vs-row vs-type="flex" vs-w="12" class="mb-6 m-0">
                        <vs-col vs-lg="7" vs-sm="7" vs-xs="7">
                            <h4 class="gray">Anthropometry Parameters</h4>
                            <vs-row vs-type="flex" vs-w="12" class="mb-6 m-0">
                                <vs-col vs-type="flex" vs-align="center" vs-lg="6" vs-sm="6" vs-xs="12">
                                    <div class="flex text-left">
                                        <span>{{ __("Weight") }}</span>
                                        <span class="ml-1 text-red">*</span>
                                    </div>


                                    <div class="flex" style="align-items:center">
                                        <component :is="inputs.Weight.type" v-model="form.Weight"
                                            style="width:100px;margin-left:1rem" :danger="hasValidationError('Weight')"
                                            :danger-text="validationError('Weight')" name="Weight" type="text" />
                                        <span class="ml-2">
                                            kg
                                        </span>
                                    </div>
                                </vs-col>
                                <vs-col vs-type="flex" vs-align="center" vs-lg="6" vs-sm="6" vs-xs="12">
                                    <div class="flex text-left">
                                        <span>{{ __("Height") }}</span>
                                        <span class="ml-1 text-red">*</span>
                                    </div>


                                    <div class="flex" style="align-items:center">
                                        <component :is="inputs.Height.type" v-model="form.Height"
                                            style="width:100px;margin-left:1rem" :danger="hasValidationError('Height')"
                                            :danger-text="validationError('Height')" name="Height" type="text" />
                                        <span class="ml-2">
                                            cm
                                        </span>
                                    </div>
                                </vs-col>
                            </vs-row>
                            <vs-row vs-type="flex" vs-w="12" class="mb-6 m-0">
                                <vs-col vs-type="flex" vs-align="center" vs-lg="6" vs-sm="6" vs-xs="12">
                                    <div class="flex text-left">
                                        <span>{{ __("Waist") }}</span>
                                        <span class="ml-1 text-red">*</span>
                                    </div>


                                    <div class="flex" style="align-items:center">
                                        <component :is="inputs.Waist.type" v-model="form.Waist"
                                            style="width:100px;margin-left:1rem" :danger="hasValidationError('Waist')"
                                            :danger-text="validationError('Waist')" name="Waist" type="text" />
                                        <span class="ml-2">
                                            cm
                                        </span>
                                    </div>
                                </vs-col>
                                <vs-col vs-type="flex" vs-align="center" vs-lg="6" vs-sm="6" vs-xs="12">
                                    <div class="flex text-left">
                                        <span>{{ __("Hip") }}</span>
                                        <span class="ml-1 text-red">*</span>
                                    </div>


                                    <div class="flex" style="align-items:center">
                                        <component :is="inputs.Hip.type" v-model="form.Hip"
                                            style="width:100px;margin-left:1rem" :danger="hasValidationError('Hip')"
                                            :danger-text="validationError('Hip')" name="Hip" type="text" />
                                        <span class="ml-2">
                                            cm
                                        </span>
                                    </div>
                                </vs-col>
                            </vs-row>
                            <vs-row vs-type="flex" vs-w="12" class="mb-6 m-0">
                                <vs-col vs-type="flex" vs-align="center" vs-lg="12" vs-sm="12" vs-xs="12">
                                    <div class="flex text-left">
                                        <span>{{ __("BFMP") }}</span>
                                        <span class="ml-1 text-red">*</span>
                                    </div>


                                    <div class="flex" style="align-items:center">
                                        <component :is="inputs.BFMP.type" v-model="form.BFMP"
                                            style="width:100px;margin-left:1rem" :danger="hasValidationError('BFMP')"
                                            :danger-text="validationError('BFMP')" name="BFMP" type="text" />
                                        <span class="ml-2">
                                            %
                                        </span>
                                        <span class="ml-2">
                                            Body Fat Percentage
                                        </span>
                                    </div>
                                </vs-col>

                            </vs-row>
                            <vs-row vs-type="flex" vs-w="12" class="mb-6 m-0">
                                <vs-col vs-type="flex" vs-align="center" vs-lg="12" vs-sm="12" vs-xs="12">
                                    <div class="flex text-left">
                                        <span>{{ __("SMM") }}</span>
                                        <span class="ml-1 text-red">*</span>
                                    </div>


                                    <div class="flex" style="align-items:center">
                                        <component :is="inputs.SMM.type" v-model="form.SMM"
                                            style="width:100px;margin-left:1rem" :danger="hasValidationError('SMM')"
                                            :danger-text="validationError('SMM')" name="SMM" type="text" />
                                        <span class="ml-2">
                                            %
                                        </span>
                                        <span class="ml-2">
                                            Skeletal Muscle Mass
                                        </span>
                                    </div>
                                </vs-col>

                            </vs-row>
                            <vs-row vs-type="flex" vs-w="12" class="mb-6 m-0">
                                <vs-col vs-type="flex" vs-align="center" vs-lg="12" vs-sm="12" vs-xs="12">
                                    <div class="flex text-left">
                                        <span>{{ __("VFP") }}</span>
                                        <span class="ml-1 text-red">*</span>
                                    </div>


                                    <div class="flex" style="align-items:center">
                                        <component :is="inputs.VFP.type" v-model="form.VFP"
                                            style="width:100px;margin-left:1rem" :danger="hasValidationError('VFP')"
                                            :danger-text="validationError('VFP')" name="VFP" type="text" />
                                        <span class="ml-2">
                                            %
                                        </span>
                                        <span class="ml-2">
                                            Visceral Fat
                                        </span>
                                    </div>
                                </vs-col>

                            </vs-row>
                        </vs-col>
                        <vs-col vs-lg="5">
                            <img src="/images/body-outline.jpg" style="width:400px" alt="">
                        </vs-col>
                    </vs-row>
                </div>
                <div>
                    <div class="flex align-items-center justify-content-center" style="justify-content: center;">
                        <vs-button style="font-size:20px" color="success" @click="calculate" class="mr-3 mb-2">{{
                            __("Calculate")
                        }}</vs-button>


                        <div class="mt-2" v-if="body.link">
                            <a target="_blank" style="font-size:20px" rel="noopener"
                                class="mr-3  vs-component vs-button vs-button-success vs-button-filled download-btn" :href="body.link" :key="downloadBtnKey">
                                {{ __("Export PDF") }}
                            </a>
                            <a target="_blank" style="font-size:20px" rel="noopener"
                                class="mr-3  vs-component vs-button vs-button-success vs-button-filled download-btn" :href="body.word_link" :key="downloadBtnKey">
                                {{ __("Export Word") }}
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </vx-card>
    </div>
</template>
<style>
.gray {
    color: #b5b2b2;
    margin: 1.5rem 0;
}

.styled-fieldset {
    padding: 2rem 1rem;
}
</style>
<script>

import Form from "@/Form";
import HasForm from "@/mixins/HasForm";
export default {
    components: {},
    mixins: [HasForm],
    data() {
        return {

            form: {
                Waist: "",
                SMM: "",
                VFP: "",
                Hip: "",
                BFMP: "",
                Age: "",
                Height: 180,
                Weight: 80,
                patient_id: 0,
                Sex: 1
            },
            patient: {
                name: "",
                code: "1136",
            },
            result:{},
            body: {},
            downloadBtnKey: 0,
          patientResult: {},
            model: "Modules\\User\\Models\\CtCase",
            locale: Iracode.$i18n.locale,
            inputs: {
                Weight: {
                    type: "vs-input"
                },
                Height: {
                    type: "vs-input"
                },
                Waist: {
                    type: "vs-input"
                },
                SMM: {
                    type: "vs-input"
                },
                VFP: {
                    type: "vs-input"
                },
                Hip: {
                    type: "vs-input"
                },
                BFMP: {
                    type: "vs-input"
                },
                name: {
                    type: "vs-input"
                },
                physician: {
                    type: "vs-input"
                },
                Age: {
                    type: "vs-input"
                },
                Sex: {
                    type: "vs-radio"
                },
                code: {
                    type: "vs-input"
                },
                file: {
                    type: "vs-input"
                },
                patient_id: {
                    field_type: "text",
                    type: "vs-input",
                    options: [],
                    selected: {},
                    foreign_key: "patient_id",
                    relation_name: "patient",
                    searchUrl: "/user/api/patients",
                    titleField: "name"
                }

            },
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
        async calculate() {
            this.body={};
            let patientForm=this.patient;
            patientForm.age=this.form.Age;
            patientForm.sex=this.form.Sex;
            patientForm.hospital="";
            // Iracode.loading();
            const {data:patient} = await this.$http.post("/user/api/patients",patientForm);
            this.patientResult=patient;

            this.form.patient_id=patient.data.id;

            const {data}=await this.$http.post("/user/api/body_composition",this.form);
            // Iracode.close_loading();
            this.body=data.data;
            setTimeout(()=>{
                this.result.data=data;
                this.$forceUpdate();
                this.downloadBtnKey++;
            },500)
        },
        async onSubmit(action) {
            const data = await this.form.post("/user/api/ct_cases");
            if (data.success) {
                Iracode.success(this.__("Ctcase Created Successfully"));
                if (action == "close") this.$router.push("/user/ct_cases");
                else this.form.reset();
            }
        },
    },
};
</script>
