<template>
  <div class="mb-base">
    <vx-card>
      <h2 style="text-align: center;padding: 2rem;border: 1px solid #000;">MACE Risk Assesment</h2>
        <img style="margin:auto;display:block;height:400px" src="/assets/images/mace_cover.png" alt="">
        <vs-table stripe noDataText="">
            <!-- <template slot="header">
                <h3>
                Users
                </h3>
            </template> -->
            <!-- <template slot="thead">
                <vs-th>
                Basal Segments
                </vs-th>
                <vs-th>
                Condition
                </vs-th>
                <vs-th>
                Mid Segments
                </vs-th>
                <vs-th>
                Condition
                </vs-th>
            </template> -->

            <template slot-scope="{data}">
                <vs-tr >
                    <vs-th >
                        Name
                    </vs-th>
                    <vs-td >
                        <component
                            :is="inputs.name.type"
                            v-model="patient.name"
                            style="width:250px;margin-left:1rem"
                            :danger="hasValidationError('name')"
                            :danger-text="validationError('name')"
                            name="name"
                            type="text"
                        />
                    </vs-td>
                    <vs-th >
                        Name
                    </vs-th>
                    <vs-td >
                        <component
                            :is="inputs.name.type"
                            v-model="patient.name"
                            style="width:250px;margin-left:1rem"
                            :danger="hasValidationError('name')"
                            :danger-text="validationError('name')"
                            name="name"
                            type="text"
                        />
                    </vs-td>
                </vs-tr>

            </template>
            </vs-table>
      <form @submit="onSubmit">
        <div>
          <h4 class="gray">Patient Information:</h4>
          <vs-row vs-type="flex" vs-w="12" class="mb-6 m-0">
            <vs-col
              vs-type="flex"
              vs-align="center"
              vs-lg="4"
              vs-sm="6"
              vs-xs="12"
            >
              <div class="flex text-left">
                <span>{{ __("Name") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>

            </vs-col>
            <vs-col

              vs-type="flex"
              vs-align="center"
              vs-lg="2"
              vs-sm="6"
              vs-xs="12"
            >
              <div
                class="flex text-left"
              >
                <span>{{ __("Code") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>

              <component
                :is="inputs.code.type"
                v-model="patient.code"
                style="width:120px;margin-left:1rem"
                :danger="hasValidationError('code')"
                :danger-text="validationError('code')"
                name="code"
                type="text"
              />
            </vs-col>
            <vs-col
              vs-type="flex"
              vs-align="center"
              vs-lg="3"
              vs-sm="6"
              vs-xs="6"
            >
              <div class="flex text-left">
                <span>{{ __("Age") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>

              <component
                :is="inputs.Age.type"
                v-model="form.Age"
                style="width:80px;margin-left:1rem"
                :danger="hasValidationError('Age')"
                :danger-text="validationError('Age')"
                name="Age"
                type="number"
              />
            </vs-col>

            <vs-col
              vs-type="flex"
              vs-align="center"
              vs-lg="3"
              vs-sm="6"
              vs-xs="12"
            >
              <div class="flex text-left">
                <span>{{ __("Sex") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>

              <div style="display:flex;justify-content:space-around;width:100%;margin-top:0.5rem;margin-left:1.5rem">
                <vs-radio v-model="form.Sex" vs-name="Sex" vs-value="1"
                  >Male</vs-radio
                >
                <vs-radio
                  v-model="form.Sex"
                  vs-name="Sex"
                  vs-value="0"
                  class="ml-4"
                  >Female</vs-radio
                >
              </div>
            </vs-col>
          </vs-row>
        </div>
        <div>
          <h4 class="gray">Medical Treatment:</h4>
          <vs-row vs-type="flex" vs-w="12" class="mb-6 m-0">
            <vs-col
              style="flex-direction: column"
              vs-type="flex"

              vs-lg="4"
              vs-sm="6"
              vs-xs="12"
            >

                <fieldset class="w-100 styled-fieldset">
                      <legend>{{ __("Treatment for Hypertension") }}</legend>
                      <div style="display:flex;justify-content:space-around;width:100%;margin-top:0.5rem">
                        <vs-radio v-model="form.TBP" vs-name="TBP" vs-value="1"
                        >Yes</vs-radio
                        >
                        <vs-radio
                        v-model="form.TBP"
                        vs-name="TBP"
                        vs-value="0"
                        class="ml-4"
                        >No</vs-radio
                        >
                    </div>
                </fieldset>



            </vs-col>
            <vs-col
              style="flex-direction: column"
              vs-type="flex"
              vs-align="center"
              vs-lg="4"
              vs-sm="6"
              vs-xs="12"
            >

                 <fieldset class="w-100 styled-fieldset">
                      <legend>{{ __("Treatment for Hyperlipidemia") }}</legend>
                      <div style="display:flex;justify-content:space-around;width:100%;margin-top:0.5rem">
                        <vs-radio v-model="form.THL" vs-name="THL" vs-value="1"
                        >Yes</vs-radio
                        >
                        <vs-radio
                        v-model="form.THL"
                        vs-name="THL"
                        vs-value="0"
                        class="ml-4"
                        >No</vs-radio
                        >
                    </div>
                </fieldset>
            </vs-col>
            <vs-col
              style="flex-direction: column"
              vs-type="flex"
              vs-align="center"
              vs-lg="4"
              vs-sm="6"
              vs-xs="12"
            >


                 <fieldset class="w-100 styled-fieldset">
                      <legend>{{ __("Treatment for MI History") }}</legend>
                      <div style="display:flex;justify-content:space-around;width:100%;margin-top:0.5rem">
                        <vs-radio v-model="form.MI" vs-name="MI" vs-value="1"
                        >Yes</vs-radio
                        >
                        <vs-radio
                        v-model="form.MI"
                        vs-name="MI"
                        vs-value="0"
                        class="ml-4"
                        >No</vs-radio
                        >
                    </div>
                </fieldset>
            </vs-col>
          </vs-row>
        </div>
         <div>
          <h4 class="gray">Risk Factors:</h4>
          <vs-row vs-type="flex" vs-w="12" class="mb-6 m-0">
            <vs-col
              style="flex-direction: column"
              vs-type="flex"
              vs-align="center"
              vs-lg="4"
              vs-sm="6"
              vs-xs="12"
            >


                 <fieldset class="w-100 styled-fieldset">
                      <legend>{{ __("Smoker") }}</legend>
                      <div style="display:flex;justify-content:space-around;width:100%;margin-top:0.5rem">
                        <vs-radio v-model="form.Smoker" vs-name="Smoker" vs-value="1"
                        >Yes</vs-radio
                        >
                        <vs-radio
                        v-model="form.Smoker"
                        vs-name="Smoker"
                        vs-value="0"
                        class="ml-4"
                        >No</vs-radio
                        >
                    </div>
                </fieldset>
            </vs-col>
            <vs-col
              style="flex-direction: column"
              vs-type="flex"
              vs-align="center"
              vs-lg="4"
              vs-sm="6"
              vs-xs="12"
            >


                <fieldset class="w-100 styled-fieldset">
                      <legend>{{ __("Family History") }}</legend>
                      <div style="display:flex;justify-content:space-around;width:100%;margin-top:0.5rem">
                        <vs-radio v-model="form.FH" vs-name="FH" vs-value="1"
                        >Yes</vs-radio
                        >
                        <vs-radio
                        v-model="form.FH"
                        vs-name="FH"
                        vs-value="0"
                        class="ml-4"
                        >No</vs-radio
                        >
                    </div>
                </fieldset>
            </vs-col>
            <vs-col
              style="flex-direction: column"
              vs-type="flex"
              vs-align="center"
              vs-lg="4"
              vs-sm="6"
              vs-xs="12"
            >


                <fieldset class="w-100 styled-fieldset">
                      <legend>{{ __("Diabetes") }}</legend>
                      <div style="display:flex;justify-content:space-around;width:100%;margin-top:0.5rem">
                        <vs-radio v-model="form.Diabetes" vs-name="Diabetes" vs-value="1"
                        >Yes</vs-radio
                        >
                        <vs-radio
                        v-model="form.Diabetes"
                        vs-name="Diabetes"
                        vs-value="0"
                        class="ml-4"
                        >No</vs-radio
                        >
                    </div>
                </fieldset>
            </vs-col>
          </vs-row>
        </div>
        <div>
          <h4 class="gray">Hemodynamic Parameters:</h4>
          <vs-row vs-type="flex" vs-w="12" class="mb-6 m-0">
            <vs-col
              vs-type="flex"
              vs-align="center"
              vs-lg="3"
              vs-sm="6"
              vs-xs="12"
            >
              <div class="flex text-left">
                <span>{{ __("LDL") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
                <div class="flex" style="align-items:center">
                      <component
                        :is="inputs.LDL_cholesterol.type"
                        v-model="form.LDL_cholesterol"
                        style="width:100px;margin-left:1rem"
                        :danger="hasValidationError('LDL_cholesterol')"
                        :danger-text="validationError('LDL_cholesterol')"
                        name="LDL_cholesterol"
                        type="text"
                    />
                    <span class="ml-2">
                        mg/dl
                    </span>
                </div>
            </vs-col>
            <vs-col
              vs-type="flex"
              vs-align="center"
              vs-lg="3"
              vs-sm="6"
              vs-xs="12"
            >
              <div class="flex text-left">
                <span>{{ __("HDL") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>

                <div class="flex" style="align-items:center">
                      <component
                        :is="inputs.HDL_cholesterol.type"
                        v-model="form.HDL_cholesterol"
                        style="width:100px;margin-left:1rem"
                        :danger="hasValidationError('HDL_cholesterol')"
                        :danger-text="validationError('HDL_cholesterol')"
                        name="HDL_cholesterol"
                        type="text"
                    />
                    <span class="ml-2">
                        mg/dl
                    </span>
                </div>
            </vs-col>
            <vs-col
              vs-type="flex"
              vs-align="center"
              vs-lg="3"
              vs-sm="6"
              vs-xs="12"
            >
              <div class="flex text-left">
                <span>{{ __("TG") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
               <div class="flex" style="align-items:center">
                      <component
                        :is="inputs.Triglycerides.type"
                        v-model="form.Triglycerides"
                        style="width:100px;margin-left:1rem"
                        :danger="hasValidationError('Triglycerides')"
                        :danger-text="validationError('Triglycerides')"
                        name="Triglycerides"
                        type="text"
                    />
                    <span class="ml-2">
                        mg/dl
                    </span>
                </div>
            </vs-col>
            <vs-col
              vs-type="flex"
              vs-align="center"
              vs-lg="3"
              vs-sm="6"
              vs-xs="12"
            >
              <div class="flex text-left">
                <span>{{ __("HbA1C") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <div class="flex" style="align-items:center">
                      <component
                        :is="inputs.HbA1C.type"
                        v-model="form.HbA1C"
                        style="width:100px;margin-left:1rem"
                        :danger="hasValidationError('HbA1C')"
                        :danger-text="validationError('HbA1C')"
                        name="HbA1C"
                        type="text"
                    />
                    <span class="ml-2">
                        %
                    </span>
                </div>
            </vs-col>
          </vs-row>
        </div>
         <div>
          <h4 class="gray">Blood Pressure & Anthropometry:</h4>
          <vs-row vs-type="flex" vs-w="12" class="mb-6 m-0">
            <vs-col
              vs-type="flex"
              vs-align="center"
              vs-lg="3"
              vs-sm="6"
              vs-xs="12"
            >
              <div class="flex text-left">
                <span>{{ __("DBP") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>


               <div class="flex" style="align-items:center">
                      <component
                        :is="inputs.DBP.type"
                        v-model="form.DBP"
                        style="width:100px;margin-left:1rem"
                        :danger="hasValidationError('DBP')"
                        :danger-text="validationError('DBP')"
                        name="DBP"
                        type="text"
                    />
                    <span class="ml-2">
                        mmHg
                    </span>
                </div>
            </vs-col>
            <vs-col
              vs-type="flex"
              vs-align="center"
              vs-lg="3"
              vs-sm="6"
              vs-xs="12"
            >
              <div class="flex text-left">
                <span>{{ __("SBP") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>


               <div class="flex" style="align-items:center">
                      <component
                        :is="inputs.SBP.type"
                        v-model="form.SBP"
                        style="width:100px;margin-left:1rem"
                        :danger="hasValidationError('SBP')"
                        :danger-text="validationError('SBP')"
                        name="SBP"
                        type="text"
                    />
                    <span class="ml-2">
                        mmHg
                    </span>
                </div>
            </vs-col>
            <vs-col
              vs-type="flex"
              vs-align="center"
              vs-lg="3"
              vs-sm="6"
              vs-xs="12"
            >
              <div class="flex text-left">
                <span>{{ __("Weight") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>


               <div class="flex" style="align-items:center">
                      <component
                        :is="inputs.Weigth.type"
                        v-model="form.Weigth"
                        style="width:100px;margin-left:1rem"
                        :danger="hasValidationError('Weigth')"
                        :danger-text="validationError('Weigth')"
                        name="Weigth"
                        type="text"
                    />
                    <span class="ml-2">
                        kg
                    </span>
                </div>
            </vs-col>
            <vs-col
              vs-type="flex"
              vs-align="center"
              vs-lg="3"
              vs-sm="6"
              vs-xs="12"
            >
              <div class="flex text-left">
                <span>{{ __("Height") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>


               <div class="flex" style="align-items:center">
                      <component
                        :is="inputs.Heigth.type"
                        v-model="form.Heigth"
                        style="width:100px;margin-left:1rem"
                        :danger="hasValidationError('Heigth')"
                        :danger-text="validationError('Heigth')"
                        name="Heigth"
                        type="text"
                    />
                    <span class="ml-2">
                        cm
                    </span>
                </div>
            </vs-col>
          </vs-row>
        </div>
        <div>
          <h4 class="gray">Ankle-brachial index:</h4>
          <vs-row vs-align="center" vs-type="flex" vs-w="12" class="mb-6 m-0">
             <vs-col
              vs-type="flex"
              vs-align="center"
              vs-lg="2"
              vs-sm="2"
              vs-xs="2"
            >
            </vs-col>
            <vs-col
              vs-type="flex"
              vs-align="center"
              vs-lg="4"
              vs-sm="6"
              vs-xs="12"
            >
              <div class="flex text-left">
                <span>{{ __("Left Ankle-brachial Index") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <component
                :is="inputs.LeftAnklebrachialIndex.type"
                v-model="form.LeftAnklebrachialIndex"
                style="width:100px;margin-left:1rem"
                :danger="hasValidationError('LeftAnklebrachialIndex')"
                :danger-text="validationError('LeftAnklebrachialIndex')"
                name="LeftAnklebrachialIndex"
                type="text"
              />

            </vs-col>
            <vs-col
              vs-type="flex"
              vs-align="center"
              vs-lg="4"
              vs-sm="6"
              vs-xs="12"
            >
              <div class="flex text-left">
                <span>{{ __("Right Ankle-brachial Index") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <component
                :is="inputs.RightAnklebrachialIndex.type"
                v-model="form.RightAnklebrachialIndex"
                style="width:100px;margin-left:1rem"
                :danger="hasValidationError('RightAnklebrachialIndex')"
                :danger-text="validationError('RightAnklebrachialIndex')"
                name="RightAnklebrachialIndex"
                type="text"
              />

            </vs-col>
            <vs-col
              vs-type="flex"
              vs-align="center"
              vs-lg="2"
              vs-sm="2"
              vs-xs="2"
            >
            </vs-col>
          </vs-row>
        </div>
          <div>
          <h4 class="gray">Result of Assesment:</h4>
          <vs-row vs-type="flex" vs-w="12" class="mb-6 m-0">

            <vs-col
              vs-type="flex"
              vs-align="center"
              vs-lg="6"
              vs-sm="6"
              vs-xs="12"
            >
              <div class="flex text-left">
                <span>{{ __("Pulse Wave Velocity (PWV)") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <div class="flex" style="align-items:center">
                  <strong style="margin-left:1rem">
                    {{result.PWV ? result.PWV.toFixed(2):result.PWV}}
                  </strong>

                    <span class="ml-2">
                        cm/s
                    </span>
                </div>
            </vs-col>
            <vs-col
              vs-type="flex"
              style="flex-direction: column;justify-content:center"
              vs-align="center"
              vs-lg="6"
              vs-sm="6"
              vs-xs="12"
            >
              <div class="flex mx-2 mt-3 text-left w-100 mb-3">
                <strong>{{ __("PWV") }}</strong>
                <span class="ml-1">{{__("higher than cut off > 1650 cm/s")}}</span>

              </div>


            </vs-col>
          </vs-row>
          <vs-row vs-type="flex" vs-w="12" class="mb-6 m-0">

            <vs-col
              vs-type="flex"
              vs-align="center"
              vs-lg="6"
              vs-sm="6"
              vs-xs="12"
            >
              <div class="flex text-left">
                <span>{{ __("Arterial Stiffness Index (ASI)") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <strong style="margin-left:1rem">
                  {{result.ASI ? result.ASI.toFixed(2):result.ASI}}
              </strong>

            </vs-col>
            <vs-col
              vs-type="flex"
              style="flex-direction: column;justify-content:center"
              vs-align="center"
              vs-lg="6"
              vs-sm="6"
              vs-xs="12"
            >
              <div class="flex mx-2 mt-3 text-left w-100 mb-3">
                <strong>{{ __("ASI") }}</strong>
                <span class="ml-1">{{__("higher than cut off > 60")}}</span>

              </div>


            </vs-col>
          </vs-row>
          <vs-row v-if="result && result.msg">
              <vs-col vs-lg="12">
                  <h3 class="my-4">
                      <strong>
                          Atherosclerosis plaque progress:
                      </strong>
                  </h3>
                  <p>
                      	Risk of plaque progress with current risk factors  =  <strong>{{result.Risk1.toFixed(2)}}</strong> %  ({{result.msg}})
                  </p>
                  <p>
                      	Risk of plaque progress with optimal risk factors  = <strong>{{result.OMen.toFixed(2)}}</strong> %  (optimal risk)
                  </p>


              </vs-col>
              <vs-col vs-lg="12">
                  <h3 class="my-4">
                      <strong>
                          	MI and CVA risk assessment:
                      </strong>
                  </h3>
                  <p>
                      	Risk of MI and stroke with current risk factors  =  <strong>{{result.Risk2.toFixed(2)}}</strong> %  ({{result.msg2}})
                  </p>
                  <p>
                      	Risk of MI and stroke with optimal risk factors  = <strong>{{result.RSK1.toFixed(2)}}</strong> %  (optimal risk)
                  </p>
              </vs-col>
              <vs-col vs-lg="12">
                  <h3 class="my-4">
                      <strong>
                          Conclusion:
                      </strong>
                  </h3>
                  <p>
                      	The patient is {{result.msg}} for atherosclerosis plaque progress.
                  </p>
                  <p>
                      	The patient is {{result.msg2}} for MI and stroke event.
                  </p>


              </vs-col>
          </vs-row>
        </div>
        <div class="flex justify-center mt-16">
          <div class="flex">
            <vs-button
                style="font-size:30px"
              color="success"
              @click="calculate"
              class="mr-3 mb-2"
              >{{ __("MACE Risk Calculation") }}</vs-button
            >

          </div>
        </div>
      </form>
    </vx-card>
  </div>
</template>
<style>
    .gray{
        color: #b5b2b2;
        margin: 1.5rem 0;
    }
    .styled-fieldset{
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
        HbA1C: "",
        patient_id: "",
        LDL_cholesterol: "",
        HDL_cholesterol: "",
        Age: "",
        SBP: "",
        Triglycerides: "",
        DBP: "",
        LeftAnklebrachialIndex: "",
        RightAnklebrachialIndex: "",
        Heigth: "",
        Weigth: "",
        patient_id:0,
        Sex: 1,
        Smoker: 0,
        TBP: 0,
        MI: 0,
        Diabetes: 0,
        FH: 0,
        THL: 0
      },
      patient:{
        name: "",
        code: "",
      },
      result:{
        PWV:"",
        ASI:""
      },
      model: "Modules\\User\\Models\\CtCase",
      locale: Iracode.$i18n.locale,
      inputs: {
        name: {
          type: "vs-input",
        },
        physician: {
          type: "vs-input",
        },
        Age: {
          type: "vs-input",
        },
        Sex: {
          type: "vs-radio",
        },
        code: {
          type: "vs-input",
        },
        file: {
          type: "vs-input",
        },
        patient_id: {
          field_type: "relation",
          options: [],
          selected: {},
          foreign_key: "patient_id",
          relation_name: "patient",
          searchUrl: "/user/api/patients",
          titleField: "name",
        },
        Smoker: {
          type: "vs-radio",
        },
           TBP: {
          type: "vs-radio",
        },
           MI: {
          type: "vs-radio",
        },
           Diabetes: {
          type: "vs-radio",
        },
           FH: {
          type: "vs-radio",
        },
             THL: {
          type: "vs-radio",
        },
        HbA1C: {
          type: "vs-input",
        },
        LDL_cholesterol: {
          type: "vs-input",
        },
        HDL_cholesterol: {
          type: "vs-input",
        },
          SBP: {
          type: "vs-input",
        },
            Triglycerides: {
          type: "vs-input",
        },
        DBP: {
          type: "vs-input",
        },
        LeftAnklebrachialIndex: {
          type: "vs-input",
        },
        RightAnklebrachialIndex: {
          type: "vs-input",
        },
        Heigth: {
          type: "vs-input",
        },
        Weigth: {
          type: "vs-input",
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
  created() {
    //
  },
  mounted() {
    //
  },
  methods: {
      async calculate(){
        const {HbA1C,LDL_cholesterol,HDL_cholesterol,Age,SBP,Triglycerides,DBP,LeftAnklebrachialIndex,RightAnklebrachialIndex,Heigth,Weigth,Sex,Smoker,TBP,MI,Diabetes,FH,THL}=this.form;

        const Total_cholesterol = LDL_cholesterol + HDL_cholesterol + (Triglycerides / 5);

        const ABI = (LeftAnklebrachialIndex + RightAnklebrachialIndex)/2;




        const Ken = (Age * 0.0455) + (Sex * 0.7496) - (1*0.5055) + (Diabetes * 0.5168) + (Smoker * 0.4732) + (Total_cholesterol * 0.0053)

            - (HDL_cholesterol * 0.0140) + (THL * 0.2473) + (SBP * 0.0085) + (TBP * 0.3381) + (FH * 0.4522);

        const Kmen = (1 - Math.pow(0.99963, Math.exp(Ken))) * 100;


            const Wen = (Age * 0.0455) + (Sex * 0.7496) - (1 * 0.5055) + (Diabetes * 0.5168) + (0 * 0.4732) + (150 * 0.0053)

                - (55 * 0.0140) + (1 * 0.2473) + (120 * 0.0085) + (1 * 0.3381) + (FH * 0.4522);

            const OMen = (1 - Math.pow(0.99963, Math.exp(Wen))) * 100;

        const B1 = 0.0799 * Age + 3.137 * Math.log(SBP) + 0.180 * Math.log(0.1) + 1.382 * Math.log(Total_cholesterol);

        const B2 = -1.172 * Math.log(HDL_cholesterol) + 0.134 * HbA1C + 0.818 * Smoker + 0.438 * MI;

        const B = B1 + B2;

        const RSK = (1 - Math.pow(0.98634, Math.exp(B-22.325))) * 100;


        const c1 = 0.0799 * Age + 3.137 * Math.log(120) + 0.180 * Math.log(0.1) + 1.382 * Math.log(150);

        const c2 = -1.172 * Math.log(55) + 0.134 * 5 + 0.818 * 0 + 0.438 * MI;

        const c = c1 + c2;

        const RSK1 = (1 - Math.pow(0.98634, Math.exp(c - 22.325))) * 100;


        let PWV = ((0.12*Age)+8)*100

        let ASI = (PWV/50)*(DBP/70)*(ABI/0.8) //Arterial Stiffness Index (ASI)


        console.log(RSK1)



        let Risk1 = Kmen + ((0.035*Weigth)-1.4)+((0.175*ASI)-7.65)


        let Risk2 = RSK + ((0.035*Weigth)-1.4)+((0.175*ASI)-7.65)

        let msg="";
        if(Risk1 < 5){
            msg="Low risk";
        }else if(Risk1 < 20 && Risk1 > 5){
            msg="Moderate risk";
        }else if(Risk1 > 20){
            msg="High risk";
        }
        let msg2="";
        if(Risk2 < 5){
            msg2="Low risk";
        }else if(Risk2 < 20 && Risk2 > 5){
            msg2="Moderate risk";
        }else if(Risk2 > 20){
            msg2="High risk";
        }
        Iracode.loading()
        let patientForm=this.patient;
        patientForm.age=this.form.Age;
        patientForm.sex=this.form.Sex;
        patientForm.hospital="";
        const {data:patient} = await this.$http.post("/user/api/patients",patientForm);
        console.log(patient)
        this.form.patient_id=patient.data.id;
        const {data}=await this.$http.post("/user/api/mace_assesment",this.form);
        Iracode.close_loading();
        console.log(data)
        this.result=data.data.result;
        //   this.result.PWV=PWV;
        // this.result.ASI=ASI;
        // if(data.ok){
        //     window.open(data.data.link, "_blank");
        // }
//
        //Risk of plaque progress with current risk factors  =  $Risk1  ($msg)

        //Risk of plaque progress with optimal risk factors  = $Omen  (optimal risk)


        //Risk of MI and stroke with current risk factors  =  $Risk2  ($msg2)

        //Risk of MI and stroke with optimal risk factors  = $RSK1  (optimal risk)


        //The patient is $msg for atherosclerosis plaque progress.

        //The patient is $msg2 for MI and stroke event.

        console.log(Risk1)
        console.log(Risk2)
        console.log(msg)
        console.log(msg2)

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
