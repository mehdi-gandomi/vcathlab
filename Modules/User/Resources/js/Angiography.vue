<template>
    <div class="mb-base">
      <vx-card>
        <h2 style="text-align: center;padding: 2rem;border: 1px solid #000;">Angiography Risk Assesment</h2>

        <form @subheart_failuret="onSubheart_failuret">
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
                <component
                  :is="inputs.name.type"
                  v-model="patient.name"
                  style="width:250px;margin-left:1rem"
                  :danger="hasValidationError('name')"
                  :danger-text="validationError('name')"
                  name="name"
                  type="text"
                />
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
          <div >

            <vs-row vs-type="flex" vs-w="12" class="mb-6 m-0">
              <vs-col
                style="flex-direction: column"
                vs-type="flex"

                vs-lg="4"
                vs-sm="6"
                vs-xs="12"
              >

                  <fieldset class="w-100 styled-fieldset">
                        <legend>{{ __("Hypotension") }}</legend>
                        <div style="display:flex;justify-content:space-around;width:100%;margin-top:0.5rem">
                          <vs-radio v-model="form.Hypotension" vs-name="Hypotension" vs-value="1"
                          >Yes</vs-radio
                          >
                          <vs-radio
                          v-model="form.Hypotension"
                          vs-name="Hypotension"
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
                        <legend>{{ __("IABP") }}</legend>
                        <div style="display:flex;justify-content:space-around;width:100%;margin-top:0.5rem">
                          <vs-radio v-model="form.IABP" vs-name="IABP" vs-value="1"
                          >Yes</vs-radio
                          >
                          <vs-radio
                          v-model="form.IABP"
                          vs-name="IABP"
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
                        <legend>{{ __("Heart Failure") }}</legend>
                        <div style="display:flex;justify-content:space-around;width:100%;margin-top:0.5rem">
                          <vs-radio v-model="form.heart_failure" vs-name="heart_failure" vs-value="1"
                          >Yes</vs-radio
                          >
                          <vs-radio
                          v-model="form.heart_failure"
                          vs-name="heart_failure"
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
                        <legend>{{ __("Prior Bleeding") }}</legend>
                        <div style="display:flex;justify-content:space-around;width:100%;margin-top:0.5rem">
                          <vs-radio v-model="form.pribleed" vs-name="pribleed" vs-value="1"
                          >Yes</vs-radio
                          >
                          <vs-radio
                          v-model="form.pribleed"
                          vs-name="pribleed"
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
                        <legend>{{ __("Acute MI") }}</legend>
                        <div style="display:flex;justify-content:space-around;width:100%;margin-top:0.5rem">
                          <vs-radio v-model="form.Acute_MI" vs-name="Acute_MI" vs-value="1"
                          >Yes</vs-radio
                          >
                          <vs-radio
                          v-model="form.Acute_MI"
                          vs-name="Acute_MI"
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
                          <vs-radio v-model="form.Diabet" vs-name="Diabet" vs-value="1"
                          >Yes</vs-radio
                          >
                          <vs-radio
                          v-model="form.Diabet"
                          vs-name="Diabet"
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
            <legend>{{ __("Prior PCI") }}</legend>
            <div style="display:flex;justify-content:space-around;width:100%;margin-top:0.5rem">
              <vs-radio v-model="form.PriorPCI" vs-name="PriorPCI" vs-value="1"
              >Yes</vs-radio
              >
              <vs-radio
              v-model="form.PriorPCI"
              vs-name="PriorPCI"
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
            <legend>{{ __("Prior CBAG") }}</legend>
            <div style="display:flex;justify-content:space-around;width:100%;margin-top:0.5rem">
              <vs-radio v-model="form.PriorCABG" vs-name="PriorCABG" vs-value="1"
              >Yes</vs-radio
              >
              <vs-radio
              v-model="form.PriorCABG"
              vs-name="PriorCABG"
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
                  <span>{{ __("Cr") }} </span>
                  <span class="ml-1 text-red">*</span>
                </div>
                  <div class="flex" style="align-items:center">
                        <component
                          :is="inputs.Cr.type"
                          v-model="form.Cr"
                          style="width:100px;margin-left:1rem"
                          :danger="hasValidationError('Cr')"
                          :danger-text="validationError('Cr')"
                          name="Cr"
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
                  <span>{{ __("Hb") }}</span>
                  <span class="ml-1 text-red">*</span>
                </div>

                  <div class="flex" style="align-items:center">
                        <component
                          :is="inputs.Hb.type"
                          v-model="form.Hb"
                          style="width:100px;margin-left:1rem"
                          :danger="hasValidationError('Hb')"
                          :danger-text="validationError('Hb')"
                          name="Hb"
                          type="text"
                      />
                      <span class="ml-2">
                          g/dl
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
                  <span>{{ __("Ht") }}</span>
                  <span class="ml-1 text-red">*</span>
                </div>
                 <div class="flex" style="align-items:center">
                        <component
                          :is="inputs.Ht.type"
                          v-model="form.Ht"
                          style="width:100px;margin-left:1rem"
                          :danger="hasValidationError('Ht')"
                          :danger-text="validationError('Ht')"
                          name="Ht"
                          type="text"
                      />
                      <span class="ml-2">
                          %
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
                  <span>{{ __("WBC") }}</span>
                  <span class="ml-1 text-red">*</span>
                </div>
                <div class="flex" style="align-items:center">
                        <component
                          :is="inputs.WBC.type"
                          v-model="form.WBC"
                          style="width:100px;margin-left:1rem"
                          :danger="hasValidationError('WBC')"
                          :danger-text="validationError('WBC')"
                          name="WBC"
                          type="text"
                      />
                      <span class="ml-2">
                          10*9/L
                      </span>
                  </div>
              </vs-col>
              <vs-col
                vs-type="flex"
                vs-align="center"
                vs-lg="3"
                vs-sm="6"
                vs-xs="12"
                class="mt-4"
              >
                <div class="flex text-left">
                  <span>{{ __("Plt") }} </span>
                  <span class="ml-1 text-red">*</span>
                </div>
                  <div class="flex" style="align-items:center">
                        <component
                          :is="inputs.Plt.type"
                          v-model="form.Plt"
                          style="width:100px;margin-left:1rem"
                          :danger="hasValidationError('Plt')"
                          :danger-text="validationError('Plt')"
                          name="Plt"
                          type="text"
                      />
                      <span class="ml-2">
                        10*3/L
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
                          :is="inputs.Weight.type"
                          v-model="form.Weight"
                          style="width:100px;margin-left:1rem"
                          :danger="hasValidationError('Weight')"
                          :danger-text="validationError('Weight')"
                          name="Weight"
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
                          :is="inputs.Height.type"
                          v-model="form.Height"
                          style="width:100px;margin-left:1rem"
                          :danger="hasValidationError('Height')"
                          :danger-text="validationError('Height')"
                          name="Height"
                          type="text"
                      />
                      <span class="ml-2">
                          cm
                      </span>
                  </div>
              </vs-col>
            </vs-row>
            <vs-row vs-type="flex" vs-w="12" class="mb-6 m-0">
              <vs-col
                vs-type="flex"
                vs-align="center"
                vs-lg="3"
                vs-sm="6"
                vs-xs="12"
              >
                <div class="flex text-left">
                  <span>{{ __("CAVI") }}</span>
                  <span class="ml-1 text-red">*</span>
                </div>


                 <div class="flex" style="align-items:center">
                        <component
                          :is="inputs.CAVI.type"
                          v-model="form.CAVI"
                          style="width:100px;margin-left:1rem"
                          :danger="hasValidationError('CAVI')"
                          :danger-text="validationError('CAVI')"
                          name="CAVI"
                          type="text"
                      />
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
                  <span>{{ __("PTP") }}</span>
                  <span class="ml-1 text-red">*</span>
                </div>


                 <div class="flex" style="align-items:center">
                        <component
                          :is="inputs.PTP.type"
                          v-model="form.PTP"
                          style="width:100px;margin-left:1rem"
                          :danger="hasValidationError('PTP')"
                          :danger-text="validationError('PTP')"
                          name="PTP"
                          type="text"
                      />
                      <span class="ml-2">
                          %
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
                  <span>{{ __("Contrast") }}</span>
                  <span class="ml-1 text-red">*</span>
                </div>


                 <div class="flex" style="align-items:center">
                        <component
                          :is="inputs.Contrast.type"
                          v-model="form.Contrast"
                          style="width:100px;margin-left:1rem"
                          :danger="hasValidationError('Contrast')"
                          :danger-text="validationError('Contrast')"
                          name="Contrast"
                          type="text"
                      />
                      <span class="ml-2">
                          cc
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
                  <span>{{ __("LVEF") }}</span>
                  <span class="ml-1 text-red">*</span>
                </div>


                 <div class="flex" style="align-items:center">
                        <component
                          :is="inputs.LVEF.type"
                          v-model="form.LVEF"
                          style="width:100px;margin-left:1rem"
                          :danger="hasValidationError('LVEF')"
                          :danger-text="validationError('LVEF')"
                          name="LVEF"
                          type="text"
                      />
                      <span class="ml-2">
                          %
                      </span>
                  </div>
              </vs-col>

            </vs-row>
            <vs-row vs-type="flex" vs-w="12" class="mb-6 m-0">
                <vs-col
                vs-type="flex"
                vs-align="center"
                vs-lg="3"
                vs-sm="6"
                vs-xs="12"
              >
                <div class="flex text-left">
                  <span>{{ __("HR") }}</span>
                  <span class="ml-1 text-red">*</span>
                </div>


                 <div class="flex" style="align-items:center">
                        <component
                          :is="inputs.HR.type"
                          v-model="form.HR"
                          style="width:100px;margin-left:1rem"
                          :danger="hasValidationError('HR')"
                          :danger-text="validationError('HR')"
                          name="HR"
                          type="text"
                      />
                      <span class="ml-2">
                          bps
                      </span>
                  </div>
              </vs-col>

            </vs-row>
          </div>






          <div class="flex justify-center mt-16">
            <div class="flex align-items-center">
              <vs-button
                  style="font-size:20px"
                color="success"
                @click="calculate"
                class="mr-3 mb-2"
                >{{ __("Calculate") }}</vs-button
              >


            </div>

          </div>
          <div class="result-wrap flex justify-center mt-8" v-if="result.data.link">
                <a target="_blank" style="font-size: 12px" rel="noopener"    class="mr-2 mb-2 vs-component vs-button vs-button-success vs-button-filled download-btn" :href="result.data.link" >
                                            {{__("Export PDF")}}
                                    </a>
                <a target="_blank" style="font-size: 12px" rel="noopener"    class="mr-2 mb-2 vs-component vs-button vs-button-success vs-button-filled download-btn" :href="result.data.word_link" >
                        {{__("Export Word")}}
                </a>
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
      const userInfo = { ...this.$store.state.auth.userInfo };
      return {
          // symptoms:[
          //     {
          //         label:"No angina (Asymptomatic)",
          //         value:"No angina (Asymptomatic)"
          //     }
          // ],
          mace:{},
          symptoms:[
              "No angina (Asymptomatic)",
              "Atypical Chest Pain",
              "Typical Chest Pain",
              "Dyspnea"
          ],
        userInfo: userInfo,
        patientResult:{},
          selectedDrug:"",
          downloadBtnKey:1,

        form: {
            Cr:0.9,
            Ht:40,
            LVEF:55,
            HR:85,
            Contrast:400,
            Hb:15,
            PTP:85,
            CAVI:8.5,
            WBC:9000,
            Plt:250000,
            PriorCABG:0,
            PriorPCI:0,
          HbA1C: 5.5,
          patient_id: "",
          Age: "",
          SBP: 120,
          DBP: 80,
          Height: 180,
          Weight: 80,
          Sex: 1,
          pribleed: 0,
          Hypotension: 0,
          heart_failure: 0,
          Diabet: 0,
          Acute_MI: 0,
          IABP: 0,
          Smoker:0
        },
        patient:{
          name: "",
          code: "1136",
        },
        result:{
          data:{}
        },
        model: "Modules\\User\\Models\\Angiography",
        locale: Iracode.$i18n.locale,

        inputs: {
          name: {
            type: "vs-input",
          },
          WBC: {
            type: "vs-input",
          },
          HR: {
            type: "vs-input",
          },
          Contrast: {
            type: "vs-input",
          },
          LVEF: {
            type: "vs-input",
          },
          PTP: {
            type: "vs-input",
          },
          CAVI: {
            type: "vs-input",
          },
          Hb: {
            type: "vs-input",
          },
          Ht: {
            type: "vs-input",
          },
          Plt: {
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
          PriorCABG: {
            type: "vs-radio",
          },
          PriorPCI: {
            type: "vs-radio",
          },
          code: {
            type: "vs-input",
          },
          Cr: {
            type: "vs-input",
          },
          file: {
            type: "vs-input",
          },
          patient_id: {
            field_type: "text",
            type: "vs-input",
            options: [],
            selected: {},
            foreign_key: "patient_id",
            relation_name: "patient",
            searchUrl: "/user/api/patients",
            titleField: "name",
          },
          pribleed: {
            type: "vs-radio",
          },
             Hypotension: {
            type: "vs-radio",
          },
             heart_failure: {
            type: "vs-radio",
          },
             Diabet: {
            type: "vs-radio",
          },
             Acute_MI: {
            type: "vs-radio",
          },
               IABP: {
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
          LeftAnklePressure: {
            type: "vs-input",
          },
          RightAnklePressure: {
            type: "vs-input",
          },
          Height: {
            type: "vs-input",
          },
          Weight: {
            type: "vs-input",
          },
          Smoker: {
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
      async download(link,maceType){
          setTimeout(async()=>{
              try{
                  const {data}=await this.$http.put("/user/api/mace_assesments/"+this.mace.id,{[maceType]:1});
                  console.log(data)

              }catch(e){
                  console.log(e)
              }finally{
                  location.href=link;
              }
          },500)
      },
            autoCompleteFunc(event) {
        console.log(event)
      },
      addDrug(){
          this.form.drug_information.push(this.selectedDrug)
          this.selectedDrug=""
      },
        async calculate(){

            let patientForm=this.patient;
            patientForm.age=this.form.Age;
            patientForm.sex=this.form.Sex;
            patientForm.hospital="";
            const {data:patient} = await this.$http.post("/user/api/patients",patientForm);
            // this.patientResult=patient;

            this.form.patient_id=patient.data.id;
            const {data}=await this.$http.post("/user/api/angiographies",this.form);
            this.result=data;


        },
      async onSubheart_failuret(action) {
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
  <style>
  .download-btn:hover{
      color: #fff;
  }
  .examplex {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 0.5rem;
  }
  .examplex .a-icon {
    outline: none;
    text-decoration: none !important;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .examplex .a-icon i {
    font-size: 18px;
  }
.w-100{
    width: 100% !important;
}
  </style>
