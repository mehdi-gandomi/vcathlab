<template>
    <div class="mb-base">
        <vx-card>
            <h2 style="text-align: center;padding: 2rem;border: 1px solid #000;">Carotid IMT Scan (CIMT)</h2>

            <form @submit="onSubmit">
                <div>
                    <h4 class="gray">Patient Information:</h4>
                    <vs-row vs-type="flex" vs-w="12" class="mb-6 m-0">
                        <vs-col vs-type="flex" vs-align="center" vs-lg="4" vs-sm="6" vs-xs="12">
                            <div class="flex text-left">
                                <span>{{ __("Name") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </div>
                            <component :is="inputs.name.type" v-model="patient.name" style="width:250px;margin-left:1rem"
                                :danger="hasValidationError('name')" :danger-text="validationError('name')" name="name"
                                type="text" />
                        </vs-col>
                        <vs-col vs-type="flex" vs-align="center" vs-lg="2" vs-sm="6" vs-xs="12">
                            <div class="flex text-left">
                                <span>{{ __("Code") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </div>

                            <component :is="inputs.code.type" v-model="patient.code" style="width:120px;margin-left:1rem"
                                :danger="hasValidationError('code')" :danger-text="validationError('code')" name="code"
                                type="text" />
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
                        <vs-col vvs-align="center" vs-lg="6" vs-sm="6" vs-xs="12">
                            <div class="text-center">
                                <div class="plaque-title">
                                    <strong>Left:</strong>
                                    <span>Plaque Description</span>
                                </div>
                            </div>
                            <div class="plaque-form">
                                <vs-row vs-type="flex" vs-w="12" class="mt-10 m-0">

                                    <vs-col vs-lg="5">
                                        <strong>Intima-Media Thickness:</strong>
                                    </vs-col>
                                    <vs-col vs-lg="5">
                                        <div class="input flex">
                                            <vs-input  v-model="form.LCIMT" />
                                            <strong style="width:40px;display: inline-block;" class="ml-2">mm</strong>
                                        </div>
                                    </vs-col>

                                </vs-row>
                                <vs-row vs-type="flex" vs-w="12" class="mt-6 m-0">

                                    <vs-col vs-lg="5">
                                        <strong>Internal Carotid Artery:</strong>
                                    </vs-col>
                                    <vs-col vs-lg="5">
                                        <div class="input flex">
                                            <vs-input v-model="form.LICA" />
                                            <strong style="width:40px;display:inline-block;flex:1" class="ml-2">%</strong>
                                        </div>
                                    </vs-col>

                                </vs-row>
                                <vs-row vs-type="flex" vs-w="12" class="mt-6 m-0">

                                    <vs-col vs-lg="5">
                                        <strong>External Carotid Artery:</strong>
                                    </vs-col>
                                    <vs-col vs-lg="5">
                                        <div class="input flex">
                                            <vs-input v-model="form.LECA" />
                                            <strong style="width:40px;display:inline-block;flex:1" class="ml-2">%</strong>
                                        </div>
                                    </vs-col>

                                </vs-row>
                                <vs-row vs-type="flex" vs-w="12" class="mt-6 m-0">

                                    <vs-col vs-lg="5">
                                        <strong>Common Carotid Artery:</strong>
                                    </vs-col>
                                    <vs-col vs-lg="5">
                                        <div class="input flex">
                                            <vs-input v-model="form.LCCA" />
                                            <strong style="width:40px;display:inline-block;flex:1" class="ml-2">%</strong>
                                        </div>
                                    </vs-col>

                                </vs-row>
                            </div>
                        </vs-col>
                        <vs-col vs-align="center" vs-lg="6" vs-sm="6" vs-xs="12">
                            <div class="text-center">
                                <div class="plaque-title">
                                    <strong>Right:</strong>
                                    <span>Plaque Description</span>
                                </div>
                            </div>
                            <div class="plaque-form">
                                <vs-row vs-type="flex" vs-w="12" class="mt-10 m-0">

                                    <vs-col vs-lg="5">
                                        <strong>Intima-Media Thickness:</strong>
                                    </vs-col>
                                    <vs-col vs-lg="5">
                                        <div class="input flex">
                                            <vs-input v-model="form.RCIMT" />
                                            <strong style="width:40px;display: inline-block;" class="ml-2">mm</strong>
                                        </div>
                                    </vs-col>

                                </vs-row>
                                <vs-row vs-type="flex" vs-w="12" class="mt-6 m-0">

                                    <vs-col vs-lg="5">
                                        <strong>Internal Carotid Artery:</strong>
                                    </vs-col>
                                    <vs-col vs-lg="5">
                                        <div class="input flex">
                                            <vs-input v-model="form.RICA" />
                                            <strong style="width:40px;display:inline-block;flex:1" class="ml-2">%</strong>
                                        </div>
                                    </vs-col>

                                </vs-row>
                                <vs-row vs-type="flex" vs-w="12" class="mt-6 m-0">

                                    <vs-col vs-lg="5">
                                        <strong>External Carotid Artery:</strong>
                                    </vs-col>
                                    <vs-col vs-lg="5">
                                        <div class="input flex">
                                            <vs-input v-model="form.RECA" />
                                            <strong style="width:40px;display:inline-block;flex:1" class="ml-2">%</strong>
                                        </div>
                                    </vs-col>

                                </vs-row>
                                <vs-row vs-type="flex" vs-w="12" class="mt-6 m-0">

                                    <vs-col vs-lg="5">
                                        <strong>Common Carotid Artery:</strong>
                                    </vs-col>
                                    <vs-col vs-lg="5">
                                        <div class="input flex">
                                            <vs-input v-model="form.RCCA" />
                                            <strong style="width:40px;display:inline-block;flex:1" class="ml-2">%</strong>
                                        </div>
                                    </vs-col>

                                </vs-row>
                            </div>
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
                                class="mr-3  vs-component vs-button vs-button-success vs-button-filled download-btn"
                                :href="body.link" :key="downloadBtnKey">
                                {{ __("Export PDF") }}
                            </a>
                            <a target="_blank" style="font-size:20px" rel="noopener"
                                class="mr-3  vs-component vs-button vs-button-success vs-button-filled download-btn"
                                :href="body.word_link" :key="downloadBtnKey">
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
            tableKey: 0,
            form: {
                patient_id: 0,
                Age: "",
                Sex: 1,
                LCIMT:"400",
                LICA:"0",
                LECA:"0",
                LCCA:"0",
                RCIMT:"450",
                RICA:"0",
                RECA:"0",
                RCCA:"0",
            },
            patient: {
                name: "",
                code: "1136",
            },
            result: {},
            body: {},
            downloadBtnKey: 0,
            patientResult: {},
            model: "Modules\\User\\Models\\CtCase",
            locale: Iracode.$i18n.locale,
            inputs: {

                code: {
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

    mounted() {
        //
    },
    methods: {
        async calculate() {
            this.body = {};
            let patientForm = this.patient;
            patientForm.age = this.form.Age;
            patientForm.sex = this.form.Sex;
            patientForm.hospital = "";
            Iracode.loading();
            const { data: patient } = await this.$http.post("/user/api/patients", patientForm);
            this.patientResult = patient;

            this.form.patient_id = patient.data.id;

            const { data } = await this.$http.post("/user/api/imt_calculations", this.form);
            Iracode.close_loading();
            this.body=data.data;
            console.log(data)

        },

        async onSubmit(action) {
            const data = await this.form.post("/user/api/imt_calculations");
            if (data.success) {
                Iracode.success(this.__("Ctcase Created Successfully"));
                if (action == "close") this.$router.push("/user/imt_calculations");
                else this.form.reset();
            }
        },
    },
};
</script>
<style>
.table-wrap {
    width: 70%;
    margin: auto;
}

.plaque-title,
.plaque-form {
    font-size: 18px;
}
</style>
