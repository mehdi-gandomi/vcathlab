<template>
  <div class="mb-base">
    <vx-card>
      <h2 style="text-align: center;padding: 2rem;border: 1px solid #000;">MACE Risk Assesment</h2>

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
          <vs-row vs-align="center" v-if="userInfo.panel_type == 6" vs-type="flex" vs-w="12" class="mb-6 m-0">

            <vs-col
              vs-lg="6"
              vs-sm="6"
              vs-xs="12"
            >
                <div style="display:flex;align-items:center">
                    <div class="flex text-left">
                        <span>{{ __("Left Ankle Pressure") }}</span>
                        <span class="ml-1 text-red">*</span>
                    </div>
                    <component
                        :is="inputs.LeftAnklePressure.type"
                        v-model="form.LeftAnklePressure"
                        style="width:100px;margin-left:1.8rem"
                        :danger="hasValidationError('LeftAnklePressure')"
                        :danger-text="validationError('LeftAnklePressure')"
                        name="LeftAnklePressure"
                        type="text"
                    />
                    <span class="ml-2">
                        mmHg
                    </span>
                </div>
                <div style="display:flex;align-items:center;margin-top:2rem">
                    <div class="flex text-left">
                        <span>{{ __("Right Ankle Pressure") }}</span>
                        <span class="ml-1 text-red">*</span>
                    </div>
                    <component
                        :is="inputs.RightAnklePressure.type"
                        v-model="form.RightAnklePressure"
                        style="width:100px;margin-left:1rem"
                        :danger="hasValidationError('RightAnklePressure')"
                        :danger-text="validationError('RightAnklePressure')"
                        name="RightAnklePressure"
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
              vs-lg="6"
              vs-sm="6"
              vs-xs="12"
            >

                <fieldset style="height:120px" class="w-100 styled-fieldset">
                      <legend>{{ __("Parental HTN") }}</legend>
                      <div style="display:flex;justify-content:space-around;width:100%;margin-top:0.5rem">
                        <vs-radio v-model="form.Parental_hypertension" vs-name="Parental_hypertension" vs-value="1"
                        >Yes</vs-radio
                        >
                        <vs-radio
                        v-model="form.Parental_hypertension"
                        vs-name="Parental_hypertension"
                        vs-value="0"
                        class="ml-4"
                        >No</vs-radio
                        >
                    </div>
                </fieldset>

            </vs-col>
             <vs-col
              vs-type="flex"
              vs-align="center"
              vs-lg="4"
              vs-sm="6"
              vs-xs="12"
            >

                <fieldset class="w-100 styled-fieldset">
                      <legend>{{ __("Symptom") }}</legend>
                      <div style="display:flex;justify-content:space-around;width:100%;margin-top:0.5rem">
                        <v-select style="width:100%" v-model="form.symptom"  :options="symptoms"></v-select>
                    </div>
                </fieldset>

            </vs-col>

          </vs-row>
        <vs-row v-else vs-align="center" vs-type="flex" vs-w="12" class="mb-6 m-0">

            <vs-col
              vs-type="flex"
              vs-align="center"
              vs-lg="2"
              vs-sm="6"
              vs-xs="12"
              v-if="userInfo.panel_type != 5"
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
                :is="inputs.LeftAnklePressure.type"
                v-model="form.LeftAnklePressure"
                style="width:100px;margin-left:1rem"
                :danger="hasValidationError('LeftAnklePressure')"
                :danger-text="validationError('LeftAnklePressure')"
                name="LeftAnklePressure"
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
                :is="inputs.RightAnklePressure.type"
                v-model="form.RightAnklePressure"
                style="width:100px;margin-left:1rem"
                :danger="hasValidationError('RightAnklePressure')"
                :danger-text="validationError('RightAnklePressure')"
                name="RightAnklePressure"
                type="text"
              />

            </vs-col>
             <vs-col
              vs-type="flex"
              vs-align="center"
              vs-lg="4"
              vs-sm="6"
              vs-xs="12"
              v-if="userInfo.panel_type == 6"
            >

                <fieldset class="w-100 styled-fieldset">
                      <legend>{{ __("Symptom") }}</legend>
                      <div style="display:flex;justify-content:space-around;width:100%;margin-top:0.5rem">
                        <v-select style="width:100%" v-model="form.symptom"  :options="symptoms"></v-select>
                    </div>
                </fieldset>

            </vs-col>
            <vs-col
              vs-type="flex"
              vs-align="center"
              vs-lg="4"
              vs-sm="6"
              vs-xs="12"
              v-if="userInfo.panel_type == 5"
            >

                <fieldset class="w-100 styled-fieldset">
                      <legend>{{ __("Parental HTN") }}</legend>
                      <div style="display:flex;justify-content:space-around;width:100%;margin-top:0.5rem">
                        <vs-radio v-model="form.Parental_hypertension" vs-name="Parental_hypertension" vs-value="1"
                        >Yes</vs-radio
                        >
                        <vs-radio
                        v-model="form.Parental_hypertension"
                        vs-name="Parental_hypertension"
                        vs-value="0"
                        class="ml-4"
                        >No</vs-radio
                        >
                    </div>
                </fieldset>

            </vs-col>
          </vs-row>
        </div>
        <vs-row v-if="false">
            <vs-col
              style="flex-direction: column"
              vs-type="flex"

              vs-lg="6"
              vs-sm="6"
              vs-xs="12"
            >

                <fieldset class="w-100 styled-fieldset">
                      <legend>{{ __("History") }}</legend>
                      <div style="display:flex;justify-content:space-between;width:100%;margin-top:0.5rem">
                        <div>
                            <p>
                                <vs-checkbox v-model="form.history" vs-value="No history of cardiac disease" value="No history of cardiac disease" >No history of cardiac disease</vs-checkbox>
                            </p>
                            <p class="mt-4">
                                <vs-checkbox v-model="form.history" vs-value="CABG" value="CABG" >CABG</vs-checkbox>
                            </p>
                             <p class="mt-4">
                                <vs-checkbox v-model="form.history" vs-value="Pre PCI" value="Pre PCI" >Pre PCI</vs-checkbox>
                            </p>
                            <p class="mt-4">
                                <vs-checkbox v-model="form.history" vs-value="Artial Fibrilation" value="Artial Fibrilation" >Artial Fibrilation</vs-checkbox>
                            </p>
                            <p class="mt-4">
                                <vs-checkbox v-model="form.history" vs-value="Coronavirus (COVID 19)" value="Coronavirus (COVID 19)" >Coronavirus (COVID 19)</vs-checkbox>
                            </p>
                            <p class="mt-4">
                                <vs-checkbox v-model="form.history" vs-value="MI and Heart Attack" value="MI and Heart Attack" >MI and Heart Attack</vs-checkbox>
                            </p>
                            <p class="mt-4">
                                <vs-checkbox v-model="form.history" vs-value="Stroke and ITA" value="Stroke and ITA" >Stroke and ITA</vs-checkbox>
                            </p>
                            <p class="mt-4">
                                <vs-checkbox v-model="form.history" vs-value="Arrhythmia" value="Arrhythmia" >Arrhythmia</vs-checkbox>
                            </p>
                            <p class="mt-4">
                                <vs-checkbox v-model="form.history" vs-value="ICD and CRT" value="ICD and CRT" >ICD and CRT</vs-checkbox>
                            </p>
                        </div>
                        <div>
                            <p >
                                <vs-checkbox v-model="form.history" vs-value="Cardiomyopathy" value="Cardiomyopathy" >Cardiomyopathy</vs-checkbox>
                            </p>
                            <p class="mt-4">
                                <vs-checkbox v-model="form.history" vs-value="Valve Surgery" value="Valve Surgery" >Valve Surgery</vs-checkbox>
                            </p>
                            <p class="mt-4">
                                <vs-checkbox v-model="form.history" vs-value="Heart failure" value="Heart failure" >Heart failure</vs-checkbox>
                            </p>
                            <p class="mt-4">
                                <vs-checkbox v-model="form.history" vs-value="Pulmonary disease" value="Pulmonary disease" >Pulmonary disease</vs-checkbox>
                            </p>
                            <p class="mt-4">
                                <vs-checkbox v-model="form.history" vs-value="Peripheral disease" value="Peripheral disease" >Peripheral disease</vs-checkbox>
                            </p>
                            <p class="mt-4">
                                <vs-checkbox v-model="form.history" vs-value="DVT" value="DVT" >DVT</vs-checkbox>
                            </p>
                            <p class="mt-4">
                                <vs-checkbox v-model="form.history" vs-value="Syncope" value="Syncope" >Syncope</vs-checkbox>
                            </p>
                            <p class="mt-4">
                                <vs-checkbox v-model="form.history" vs-value="Cogenital" value="Cogenital" >Cogenital</vs-checkbox>
                            </p>
                        </div>
                    </div>
                </fieldset>



            </vs-col>
               <vs-col
              style="flex-direction: column"
              vs-type="flex"

              vs-lg="6"
              vs-sm="6"
              vs-xs="12"
            >

              <fieldset class="w-100 styled-fieldset" >
    <legend>{{ __("Chief Complaint") }}</legend>
    <div style="display:flex;justify-content:space-between;width:100%;margin-top:0.5rem">
      <div>
          <p>
              <vs-checkbox v-model="form.chief_complaint" vs-value="Chest Pain" value="Chest Pain">Chest Pain</vs-checkbox>
          </p>
          <p class="mt-4">
              <vs-checkbox v-model="form.chief_complaint" vs-value="Arm or shoulder pain" value="Arm or shoulder pain">Arm or shoulder pain</vs-checkbox>
          </p>
           <p class="mt-4">
              <vs-checkbox v-model="form.chief_complaint" vs-value="Dyspnea" value="Dyspnea">Dyspnea</vs-checkbox>
          </p>
          <p class="mt-4">
              <vs-checkbox v-model="form.chief_complaint" vs-value="Burning sensation in your chest" value="Burning sensation in your chest">Burning sensation in your chest</vs-checkbox>
          </p>
          <p class="mt-4">
              <vs-checkbox v-model="form.chief_complaint" vs-value="Dizziness" value="Dizziness">Dizziness</vs-checkbox>
          </p>
          <p class="mt-4">
              <vs-checkbox v-model="form.chief_complaint" vs-value="Weakness" value="Weakness">Weakness</vs-checkbox>
          </p>
          <p class="mt-4">
              <vs-checkbox v-model="form.chief_complaint" vs-value="Throat or Jaw pain" value="Throat or Jaw pain">Throat or Jaw pain</vs-checkbox>
          </p>
          <p class="mt-4">
              <vs-checkbox v-model="form.chief_complaint" vs-value="Bradycardia" value="Bradycardia">Bradycardia</vs-checkbox>
          </p>
          <p class="mt-4">
              <vs-checkbox v-model="form.chief_complaint" vs-value="Tachycardia" value="Tachycardia">Tachycardia</vs-checkbox>
          </p>
      </div>
      <div>
          <p >
              <vs-checkbox v-model="form.chief_complaint" vs-value="Blood pressure fluctuations" value="Blood pressure fluctuations">Blood pressure fluctuations</vs-checkbox>
          </p>
          <p class="mt-4">
              <vs-checkbox v-model="form.chief_complaint" vs-value="Hypotension" value="Hypotension">Hypotension</vs-checkbox>
          </p>
          <p class="mt-4">
              <vs-checkbox v-model="form.chief_complaint" vs-value="Hypertension" value="Hypertension">Hypertension</vs-checkbox>
          </p>
          <p class="mt-4">
              <vs-checkbox v-model="form.chief_complaint" vs-value="GI Bleeding" value="GI Bleeding">GI Bleeding</vs-checkbox>
          </p>
          <p class="mt-4">
              <vs-checkbox v-model="form.chief_complaint" vs-value="Back pain" value="Back pain">Back pain</vs-checkbox>
          </p>
          <p class="mt-4">
              <vs-checkbox v-model="form.chief_complaint" vs-value="Headache and Nausea" value="Headache and Nausea">Headache and Nausea</vs-checkbox>
          </p>
          <p class="mt-4">
              <vs-checkbox v-model="form.chief_complaint" vs-value="Abdominal pain" value="Abdominal pain">Abdominal pain</vs-checkbox>
          </p>
          <p class="mt-4">
              <vs-checkbox v-model="form.chief_complaint" vs-value="Fever" value="Fever">Fever</vs-checkbox>
          </p>
      </div>
  </div>
</fieldset>



            </vs-col>
        </vs-row>


<vs-row class="mt-5" v-if="false">
            <vs-col
              style="flex-direction: column"
              vs-type="flex"

              vs-lg="6"
              vs-sm="6"
              vs-xs="12"
            >

                <fieldset class="w-100 styled-fieldset">
                      <legend>{{ __("Medical Treatment") }}</legend>
                      <div style="width:100%;margin-top:0.5rem">
                        <label for="">Drug Information</label>
                          <div style="display:flex;margin-top: 1rem;">
                              <!-- <vs-input v-model="form.drug_information" /> -->
                               <vs-select
                               style="flex:1"
                                autocomplete
                                @input-change="autoCompleteFunc"
                                class="selectExample"
                                v-model="selectedDrug"
                                >
                                <vs-select-item :key="index" :value="item.value" :text="item.text" v-for="(item,index) in drugs" />
                              </vs-select>
                              <vs-button style="width: 35px;height: 35px;padding: 0;margin-left: 0.7rem;" @click="addDrug" color="warning" type="filled"  >
                                  <span style="font-size:2rem">+</span>
                              </vs-button>
                          </div>
                    </div>
                </fieldset>



            </vs-col>
               <vs-col
              style="flex-direction: column"
              vs-type="flex"

              vs-lg="6"
              vs-sm="6"
              vs-xs="12"
            >

                <fieldset class="w-100 styled-fieldset" style="padding-bottom: 3rem;">
                      <legend>{{ __("Physical Activity") }}</legend>
                      <div style="width:100%;margin-top:0.5rem">
                          <label for="">Physical Activity during a week</label>
                          <div style="display: flex;justify-content: space-around;">
                              <p class="mt-4">
                                    <vs-radio v-model="form.physical_activity" vs-name="physical_activity" vs-value="Normal level">Normal level</vs-radio>
                                </p>
                                <p class="mt-4">
                                    <vs-radio v-model="form.physical_activity" vs-name="physical_activity" vs-value="Low level">Low level</vs-radio>
                                </p>
                                <p class="mt-4">
                                    <vs-radio v-model="form.physical_activity" vs-name="physical_activity" vs-value="High level">High level</vs-radio>
                                </p>
                          </div>
                    </div>
                </fieldset>



            </vs-col>
        </vs-row>


          <div>
         <div v-if="userInfo.panel_type != 5 && userInfo.panel_type != 6" >
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
        </div>
        <div class="flex justify-center mt-16">
          <div class="flex align-items-center">
            <vs-button
                style="font-size:20px"
              color="success"
              @click="calculate"
              class="mr-3 mb-2"
              >{{ __("MACE Risk Calculation") }}</vs-button
            >

            <div style="width:80%" v-if="(userInfo.email == 'najafi@vcathlab.com' || userInfo.email == 'mghasemi@vcathlab.com') && result.data.data">
                <vs-row>
                    <vs-col vs-lg="4">
                        <p class="col-lg-3">Body and BP Triage:</p>
                    </vs-col>
                    <vs-col vs-lg="8">
                        <a target="_blank" style="font-size: 12px" rel="noopener"   :key="downloadBtnKey" class="mr-2 mb-2 vs-component vs-button vs-button-success vs-button-filled download-btn" :href="result.data.data.links.bp_triage.link" >
                                            {{__("Export PDF")}}
                                    </a>
                        <a target="_blank" style="font-size: 12px" rel="noopener"  :key="downloadBtnKey" class="mr-2 mb-2 vs-component vs-button vs-button-success vs-button-filled download-btn" :href="result.data.data.links.bp_triage.word_link">
                                {{__("Export Word")}}</a>
                    </vs-col>
                </vs-row>
                <vs-row>
                    <vs-col vs-lg="4">
                        <p class="col-lg-3">PTP of CAD Results:</p>
                    </vs-col>
                    <vs-col vs-lg="8">
                        <a target="_blank" style="font-size: 12px" rel="noopener"   :key="downloadBtnKey" class="mr-2 mb-2 vs-component vs-button vs-button-success vs-button-filled download-btn"  :href="result.data.data.links.ptp_cad.link">
                                            {{__("Export PDF")}}
                                    </a>
                        <a target="_blank" style="font-size: 12px" rel="noopener"  :key="downloadBtnKey" class="mr-2 mb-2 vs-component vs-button vs-button-success vs-button-filled download-btn" :href="result.data.data.links.ptp_cad.word_link">
                                {{__("Export Word")}}</a>
                    </vs-col>
                </vs-row>
                <vs-row>
                    <vs-col vs-lg="4">
                        <p class="col-lg-3">Total results:</p>
                    </vs-col>
                    <vs-col vs-lg="8">
                        <a target="_blank" style="font-size: 12px" rel="noopener"   :key="downloadBtnKey" class="mr-2 mb-2 vs-component vs-button vs-button-success vs-button-filled download-btn" :href="result.data.data.link" >
                                            {{__("Export PDF")}}
                                    </a>
                        <a target="_blank" style="font-size: 12px" rel="noopener"  :key="downloadBtnKey" class="mr-2 mb-2 vs-component vs-button vs-button-success vs-button-filled download-btn" :href="result.data.data.word_link">
                                {{__("Export Word")}}</a>
                    </vs-col>
                </vs-row>
            </div>
            <div v-else-if="result.data.data && userInfo.panel_type != 6">
                <a target="_blank" style="font-size: 30px" rel="noopener"  v-if="result.data.data && result.data.data.link" :key="downloadBtnKey" class="mr-3 mb-2 vs-component vs-button vs-button-success vs-button-filled download-btn"  :href="result.data.data.link" >
                    {{__("Export PDF")}}
                </a>
                <a target="_blank" style="font-size: 30px" rel="noopener"  v-if="result.data.data && result.data.data.word_link" :key="downloadBtnKey" class="mr-3 mb-2 vs-component vs-button vs-button-success vs-button-filled download-btn"  :href="result.data.data.word_link" >
                        {{__("Export Word")}}
                </a>
            </div>
          </div>
        </div>
         <div class="result" style="display: flex;justify-content: center;margin-top:1rem" v-if="userInfo.email != 'najafi@vcathlab.com' && userInfo.email != 'mghasemi@vcathlab.com' && userInfo.panel_type == 6 && result.data.data">
               <div class="examplex">
                        <vs-button class="btnx" type="filled" color="success">Ankle Brachial Index</vs-button>
                        <vs-dropdown vs-trigger-click >
                        <vs-button class="btn-drop" color="success" type="filled" icon="expand_more"></vs-button>
                        <!-- <a href="#">Hola mundo</a> -->

                        <vs-dropdown-menu>
                            <vs-dropdown-item>
                                                        <a style="font-size: 12px" rel="noopener"   :key="downloadBtnKey" class="" @click="download(result.data.data.links.bp_triage.link,'abi_clicked')" >
                                            {{__("Export PDF")}}
                                    </a>
                            </vs-dropdown-item>
                            <vs-dropdown-item>
                            <a  style="font-size: 12px" rel="noopener"  :key="downloadBtnKey" class="" @click="download(result.data.data.links.bp_triage.word_link,'abi_clicked')">
                                {{__("Export Word")}}</a>
                            </vs-dropdown-item>

                        </vs-dropdown-menu>
                        </vs-dropdown>

                    </div>
                <div class="examplex">
                        <vs-button class="btnx" type="filled" color="success">Screening Test</vs-button>
                        <vs-dropdown vs-trigger-click >
                        <vs-button class="btn-drop" color="success" type="filled" icon="expand_more"></vs-button>
                        <!-- <a href="#">Hola mundo</a> -->

                        <vs-dropdown-menu>
                            <vs-dropdown-item>
                                <a  style="font-size: 12px" rel="noopener"   :key="downloadBtnKey" class=""  @click="download(result.data.data.links.ptp_cad.link,'screening_test_clicked')" href="javascript:void(0)">
                                            {{__("Export PDF")}}
                                    </a>
                            </vs-dropdown-item>
                            <vs-dropdown-item>
                            <a  style="font-size: 12px" rel="noopener"  :key="downloadBtnKey" class="" @click="download(result.data.data.links.ptp_cad.word_link,'screening_test_clicked')" href="javascript:void(0)">
                                {{__("Export Word")}}</a>
                            </vs-dropdown-item>

                        </vs-dropdown-menu>
                        </vs-dropdown>

                    </div>
                <div class="examplex">
                        <vs-button class="btnx" type="filled" color="success">PTP of CAD</vs-button>
                        <vs-dropdown vs-trigger-click >
                        <vs-button class="btn-drop" color="success" type="filled" icon="expand_more"></vs-button>
                        <!-- <a href="#">Hola mundo</a> -->

                        <vs-dropdown-menu>

                            <vs-dropdown-item>
                            <a  style="font-size: 12px" rel="noopener"   :key="downloadBtnKey" href="javascript:void(0)" class=""  @click="()=>download(result.data.data.links.ClinicallikelihoodofCAD.link,'ptp_of_cad_clicked')">
                                            {{__("Export PDF")}}
                                    </a>
                            </vs-dropdown-item>
                            <vs-dropdown-item>
                            <a  style="font-size: 12px" rel="noopener"  :key="downloadBtnKey" href="javascript:void(0)" class="" @click="()=>download(result.data.data.links.ClinicallikelihoodofCAD.word_link,'ptp_of_cad_clicked')">
                                {{__("Export Word")}}</a>
                            </vs-dropdown-item>

                        </vs-dropdown-menu>
                        </vs-dropdown>

                    </div>
               <div class="examplex">
                        <vs-button class="btnx" type="filled" color="success">Total Result</vs-button>
                        <vs-dropdown vs-trigger-click >
                        <vs-button class="btn-drop" color="success" type="filled" icon="expand_more"></vs-button>
                        <!-- <a href="#">Hola mundo</a> -->

                        <vs-dropdown-menu>
                            <vs-dropdown-item>
                            <a  style="font-size: 12px" rel="noopener"   :key="downloadBtnKey" class="" href="javascript:void(0)" @click="download(result.data.data.link,'total_clicked')">
                                            {{__("Export PDF")}}
                                    </a>
                            </vs-dropdown-item>
                            <vs-dropdown-item>
                            <a  style="font-size: 12px" rel="noopener"  :key="downloadBtnKey" class="" href="javascript:void(0)" @click="download(result.data.data.word_link,'total_clicked')">
                                {{__("Export Word")}}</a>
                            </vs-dropdown-item>

                        </vs-dropdown-menu>
                        </vs-dropdown>

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
          Parental_hypertension:"0",
          physical_activity:"Normal level",
          risk_factors:[],
          drug_information:[],
          history:[],
          chief_complaint:[],
        HbA1C: 5.5,
        patient_id: "",
        LDL_cholesterol: 120,
        HDL_cholesterol: 45,
        Age: "",
        SBP: 120,
        Triglycerides: 140,
        DBP: 80,
        LeftAnklePressure: 165,
        RightAnklePressure: 160,
        Heigth: 180,
        Weigth: 80,
        patient_id:0,
        Sex: 1,
        Smoker: 0,
        TBP: 0,
        MI: 0,
        Diabetes: 0,
        FH: 0,
        THL: 0,
        symptom:"No angina (Asymptomatic)"
      },
      patient:{
        name: "",
        code: "1136",
      },
      result:{
        'msg':"",
        'msg2':"",
        'Risk1':"",
        'OMen':"",
        'Risk2':"",
        'RSK1':"",
        'ASI':"",
        'PWV':"",
        data:{}
      },
      model: "Modules\\User\\Models\\CtCase",
      locale: Iracode.$i18n.locale,
      drugs:[
  {
      text:"Abciximab",
      value:"Abciximab"
  },
  {
      text:"Acebutolol",
      value:"Acebutolol"
  },
  {
      text:"Aspirin",
      value:"Aspirin"
  },
  {
      text:"Adenosine",
      value:"Adenosine"
  },
  {
      text:"Epinephrine",
      value:"Epinephrine"
  },
  {
      text:"Alteplase",
      value:"Alteplase"
  },
  {
      text:"Amiloride",
      value:"Amiloride"
  },
  {
      text:"Amiodarone",
      value:"Amiodarone"
  },
  {
      text:"Amlodipine",
      value:"Amlodipine"
  },
  {
      text:"Amrinone",
      value:"Amrinone"
  },
  {
      text:"Argatroban",
      value:"Argatroban"
  },
  {
      text:"Atenolol",
      value:"Atenolol"
  },
  {
      text:"Atorvastatin",
      value:"Atorvastatin"
  },
  {
      text:"Benazepril",
      value:"Benazepril"
  },
  {
      text:"Bisoprolol",
      value:"Bisoprolol"
  },
  {
      text:"Bivalirudin",
      value:"Bivalirudin"
  },
  {
      text:"Bosentan",
      value:"Bosentan"
  },
  {
      text:"Bretylium",
      value:"Bretylium"
  },
  {
      text:"Bumetanide",
      value:"Bumetanide"
  },
  {
      text:"Candesartan",
      value:"Candesartan"
  },
  {
      text:"Captopril",
      value:"Captopril"
  },
  {
      text:"Carvedilol",
      value:"Carvedilol"
  },
  {
      text:"Chlorothiazide",
      value:"Chlorothiazide"
  },
  {
      text:"Chlortalidone",
      value:"Chlortalidone"
  },
  {
      text:"Cilostazol",
      value:"Cilostazol"
  },
  {
      text:"Clofibrate",
      value:"Clofibrate"
  },
  {
      text:"Clonidine",
      value:"Clonidine"
  },
  {
      text:"Clopidogrel",
      value:"Clopidogrel"
  },
  {
      text:"Colesevelam",
      value:"Colesevelam"
  },
  {
      text:"Colestipol",
      value:"Colestipol"
  },
  {
      text:"Colestyramine",
      value:"Colestyramine"
  },
  {
      text:"Dalteparin",
      value:"Dalteparin"
  },
  {
      text:"Desirudin",
      value:"Desirudin"
  },
  {
      text:"Diazoxide-Oral",
      value:"Diazoxide-Oral"
  },
  {
      text:"Digoxin",
      value:"Digoxin"
  },
  {
      text:"Diltiazem",
      value:"Diltiazem"
  },
  {
      text:"Dipyridamole",
      value:"Dipyridamole"
  },
  {
      text:"Disopyramide",
      value:"Disopyramide"
  },
  {
      text:"Dobutamine",
      value:"Dobutamine"
  },
  {
      text:"Dofetilide",
      value:"Dofetilide"
  },
  {
      text:"Dopamine",
      value:"Dopamine"
  },
  {
      text:"Doxazosin",
      value:"Doxazosin"
  },
  {
      text:"Enalapril",
      value:"Enalapril"
  },
  {
      text:"Enoxaparin Sodium",
      value:"Enoxaparin Sodium"
  },
  {
      text:"Eplerenone",
      value:"Eplerenone"
  },
  {
      text:"Eprosartan",
      value:"Eprosartan"
  },
  {
      text:"Eptifibatide",
      value:"Eptifibatide"
  },
  {
      text:"Esmolol",
      value:"Esmolol"
  },
  {
      text:"Etacrynic Acid",
      value:"Etacrynic Acid"
  },
  {
      text:"Ezetimibe",
      value:"Ezetimibe"
  },
  {
      text:"Felodipine",
      value:"Felodipine"
  },
  {
      text:"Fenofibrate",
      value:"Fenofibrate"
  },
  {
      text:"Fenoldopam Mesilate",
      value:"Fenoldopam Mesilate"
  },
  {
      text:"Fibrinolysin",
      value:"Fibrinolysin"
  },
  {
      text:"Flecainide",
      value:"Flecainide"
  },
  {
      text:"Fluvastatin",
      value:"Fluvastatin"
  },
  {
      text:"Fondaparinux",
      value:"Fondaparinux"
  },
  {
      text:"Fosinopril",
      value:"Fosinopril"
  },
  {
      text:"Furosemide",
      value:"Furosemide"
  },
  {
      text:"Gemfibrozil",
      value:"Gemfibrozil"
  },
  {
      text:"Nitroglycerin",
      value:"Nitroglycerin"
  },
  {
      text:"Hydrochloride",
      value:"Hydrochloride"
  },
  {
      text:"Heparin",
      value:"Heparin"
  },
  {
      text:"Hydralazine",
      value:"Hydralazine"
  },
  {
      text:"Hydrochlorothiazide",
      value:"Hydrochlorothiazide"
  },
  {
      text:"Ibutilide Fumarate",
      value:"Ibutilide Fumarate"
  },
  {
      text:"Indapamide",
      value:"Indapamide"
  },
  {
      text:"Irbesartan",
      value:"Irbesartan"
  },
  {
      text:"Isoproterenol",
      value:"Isoproterenol"
  },
  {
      text:"Isosorbide Dinitrate",
      value:"Isosorbide Dinitrate"
  },
  {
      text:"Isosorbide Mononitrate",
      value:"Isosorbide Mononitrate"
  },
  {
      text:"Isradipine",
      value:"Isradipine"
  },
  {
      text:"Labetalol",
      value:"Labetalol"
  },
  {
      text:"Lepirudin",
      value:"Lepirudin"
  },
  {
      text:"Lisinopril",
      value:"Lisinopril"
  },
  {
      text:"Losartan",
      value:"Losartan"
  },
  {
      text:"Lovastatin",
      value:"Lovastatin"
  },
  {
      text:"Mannitol",
      value:"Mannitol"
  },
  {
      text:"Methyldopa",
      value:"Methyldopa"
  },
  {
      text:"Metolazone",
      value:"Metolazone"
  },
  {
      text:"Metoprolol",
      value:"Metoprolol"
  },
  {
      text:"Mexiletine",
      value:"Mexiletine"
  },
  {
      text:"Midodrine",
      value:"Midodrine"
  },
  {
      text:"Milrinone",
      value:"Milrinone"
  },
  {
      text:"Minoxidil",
      value:"Minoxidil"
  },
  {
      text:"Moexipril",
      value:"Moexipril"
  },
  {
      text:"Nadolol",
      value:"Nadolol"
  },
  {
      text:"Nebivolol",
      value:"Nebivolol"
  },
  {
      text:"Nesiritide Citrate",
      value:"Nesiritide Citrate"
  },
  {
      text:"Nicardipine",
      value:"Nicardipine"
  },
  {
      text:"Nicorandil",
      value:"Nicorandil"
  },
  {
      text:"Nifedipine",
      value:"Nifedipine"
  },
  {
      text:"Nimodipine",
      value:"Nimodipine"
  },
  {
      text:"Nisoldipine",
      value:"Nisoldipine"
  },
  {
      text:"Nitric Oxide",
      value:"Nitric Oxide"
  },
  {
      text:"Norepinephrine",
      value:"Norepinephrine"
  },
  {
      text:"Olmesartan",
      value:"Olmesartan"
  },
  {
      text:"Omega-3 Triglycerides",
      value:"Omega-3 Triglycerides"
  },
  {
      text:"Pentosan Polysulfate Sodium",
      value:"Pentosan Polysulfate Sodium"
  },
  {
      text:"Pentoxifylline",
      value:"Pentoxifylline"
  },
  {
      text:"Perindopril",
      value:"Perindopril"
  },
  {
      text:"Phenoxybenzamine",
      value:"Phenoxybenzamine"
  },
  {
      text:"Phentolamine",
      value:"Phentolamine"
  },
  {
      text:"Pindolol",
      value:"Pindolol"
  },
  {
      text:"Pitavastatin",
      value:"Pitavastatin"
  },
  {
      text:"Pravastatin",
      value:"Pravastatin"
  },
  {
      text:"Prazosin",
      value:"Prazosin"
  },
  {
      text:"Procainamide",
      value:"Procainamide"
  },
  {
      text:"Propafenone",
      value:"Propafenone"
  },
  {
      text:"Propranolol",
      value:"Propranolol"
  },
  {
      text:"Quinapril",
      value:"Quinapril"
  },
  {
      text:"Quinidine",
      value:"Quinidine"
  },
  {
      text:"Ramipril",
      value:"Ramipril"
  },
  {
      text:"Ranolazine",
      value:"Ranolazine"
  },
  {
      text:"Reteplase",
      value:"Reteplase"
  },
  {
      text:"Rosuvastatin",
      value:"Rosuvastatin"
  },
  {
      text:"Simvastatin",
      value:"Simvastatin"
  },
  {
      text:"Sodium Nitroprusside",
      value:"Sodium Nitroprusside"
  },
  {
      text:"Sotalol",
      value:"Sotalol"
  },
  {
      text:"Spironolactone",
      value:"Spironolactone"
  },
  {
      text:"Streptokinase",
      value:"Streptokinase"
  },
  {
      text:"Telmisartan",
      value:"Telmisartan"
  },
  {
      text:"Tenecteplase",
      value:"Tenecteplase"
  },
  {
      text:"Teprotide",
      value:"Teprotide"
  },
  {
      text:"Terazosin",
      value:"Terazosin"
  },
  {
      text:"Ticlopidine",
      value:"Ticlopidine"
  },
  {
      text:"Tinzaparin",
      value:"Tinzaparin"
  },
  {
      text:"Tirofiban",
      value:"Tirofiban"
  },
  {
      text:"Torasemide",
      value:"Torasemide"
  },
  {
      text:"Trandolapril",
      value:"Trandolapril"
  },
  {
      text:"Urokinase",
      value:"Urokinase"
  },
  {
      text:"Valsartan",
      value:"Valsartan"
  },
  {
      text:"Verapamil",
      value:"Verapamil"
  },
  {
      text:"Warfarin",
      value:"Warfarin"
  },
  {
      text:"Ephedrine",
      value:"Ephedrine"
  },
  {
      text:"Anagrelide",
      value:"Anagrelide"
  },
  {
      text:"Acetylsalicylic Acid+Atorvastatin+Hydrochlorthiazide+Valsartan",
      value:"Acetylsalicylic Acid+Atorvastatin+Hydrochlorthiazide+Valsartan"
  },
  {
      text:"Amiloride-H",
      value:"Amiloride-H"
  },
  {
      text:"Triamterene-H",
      value:"Triamterene-H"
  },
  {
      text:"Lidocaine-Systemic",
      value:"Lidocaine-Systemic"
  },
  {
      text:"Epinephrin-Ophthalmic",
      value:"Epinephrin-Ophthalmic"
  },
  {
      text:"Amlodipine+Atorvastatin",
      value:"Amlodipine+Atorvastatin"
  },
  {
      text:"Losartan+Hydrochlorothiazide",
      value:"Losartan+Hydrochlorothiazide"
  },
  {
      text:"Lisinopril+Hydrochlorothiazide",
      value:"Lisinopril+Hydrochlorothiazide"
  },
  {
      text:"Amlodipine+Benazepril",
      value:"Amlodipine+Benazepril"
  },
  {
      text:"Amlodipine+Valsartan",
      value:"Amlodipine+Valsartan"
  },
  {
      text:"Bisoprolol+Hydrochlorothiazide",
      value:"Bisoprolol+Hydrochlorothiazide"
  },
  {
      text:"Telmisartan+Hydrochlorothiazide",
      value:"Telmisartan+Hydrochlorothiazide"
  },
  {
      text:"Ticagrelor",
      value:"Ticagrelor"
  },
  {
      text:"Dabigatran",
      value:"Dabigatran"
  },
  {
      text:"Dipyridamol+ASA",
      value:"Dipyridamol+ASA"
  },
  {
      text:"Dronedarone",
      value:"Dronedarone"
  },
  {
      text:"Prasugrel",
      value:"Prasugrel"
  },
  {
      text:"Ezetimibe+Simvastatin",
      value:"Ezetimibe+Simvastatin"
  },
  {
      text:"Ivabradine",
      value:"Ivabradine"
  },
  {
      text:"Ixabepilone",
      value:"Ixabepilone"
  },
  {
      text:"Nicotinic Acid+Laropiprant",
      value:"Nicotinic Acid+Laropiprant"
  },
  {
      text:"Rivaroxaban",
      value:"Rivaroxaban"
  },
  {
      text:"Sacubitril+Valsartan",
      value:"Sacubitril+Valsartan"
  },
  {
      text:"Ambrisentan",
      value:"Ambrisentan"
  },
  {
      text:"Aliskiren",
      value:"Aliskiren"
  },
  {
      text:"Betaxolol-Systemic",
      value:"Betaxolol-Systemic"
  },
  {
      text:"Apixaban",
      value:"Apixaban"
  },
],
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
          field_type: "text",
          type: "vs-input",
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
        LeftAnklePressure: {
          type: "vs-input",
        },
        RightAnklePressure: {
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
          this.result={
        'msg':"",
        'msg2':"",
        'Risk1':"",
        'OMen':"",
        'Risk2':"",
        'RSK1':"",
        'ASI':"",
        'PWV':"",
        data:{}
      };
        const {HbA1C,LDL_cholesterol,HDL_cholesterol,Age,SBP,Triglycerides,DBP,LeftAnklePressure,RightAnklePressure,Heigth,Weigth,Sex,Smoker,TBP,MI,Diabetes,FH,THL}=this.form;

        const Total_cholesterol = +LDL_cholesterol + +HDL_cholesterol + (+Triglycerides / 5);

        const ABI = (+LeftAnklePressure + +RightAnklePressure)/2;




        const Ken = (Age * 0.0455) + (Sex * 0.7496) - (1*0.5055) + (Diabetes * 0.5168) + (Smoker * 0.4732) + (Total_cholesterol * 0.0053)

            - (HDL_cholesterol * 0.0140) + (THL * 0.2473) + (SBP * 0.0085) + (TBP * 0.3381) + (FH * 0.4522);

        const Kmen = (1 - Math.pow(0.99963, Math.exp(Ken))) * 100;


            const Wen = (Age * 0.0455) + (Sex * 0.7496) - (1 * 0.5055) + (Diabetes * 0.5168) + (0 * 0.4732) + (110 * 0.0053)

                - (55 * 0.0140) + (1 * 0.2473) + (120 * 0.0085) + (1 * 0.3381) + (FH * 0.4522);

            const OMen = (1 - Math.pow(0.99963, Math.exp(Wen))) * 100;

        const B1 = 0.0799 * Age + 3.137 * Math.log(SBP) + 0.180 * Math.log(0.1) + 1.382 * Math.log(Total_cholesterol);

        const B2 = -1.172 * Math.log(HDL_cholesterol) + 0.134 * HbA1C + 0.818 * Smoker + 0.438 * MI;

        const B = B1 + B2;

        const RSK = (1 - Math.pow(0.98634, Math.exp(B-22.325))) * 100;


        // const c1 = 0.0799 * Age + 3.137 * Math.log(120) + 0.180 * Math.log(0.1) + 1.382 * Math.log(150);

        // const c2 = -1.172 * Math.log(55) + 0.134 * 5 + 0.818 * 0 + 0.438 * MI;

        // const c = c1 + c2;

        const c1 = 0.0799 * Age + 3.137 * Math.log(120) + 0.180 * Math.log(0.1) + 1.382 * Math.log(150);

        const c2 = -1.172 * Math.log(40) + 0.134 * 6 + 0.818 * 0 + 0.438 * MI;

        const c = c1 + c2;


        const RSK1 = (1 - Math.pow(0.98634, Math.exp(c - 22.325))) * 100;


        let PWV = ((0.12*Age)+8)*100

        let ASI = (PWV/50)*(DBP/70)*(ABI/0.8) //Arterial Stiffness Index (ASI)


        console.log(RSK1)



        // let Risk1 = +Kmen + ((0.035*Weigth)-1.4)+((0.175*ASI)-7.65)


        // let Risk2 = +RSK + ((0.035*Weigth)-1.4)+((0.175*ASI)-7.65)

        let Risk1 = Kmen;
        let Risk2 = RSK;


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
        // Iracode.loading()
        // Iracode.close_loading();
        this.result.Risk1=Risk1;
        this.result.Risk2=Risk2;
        this.result.RSK1=RSK1;
        this.result.RSK1=RSK1;
        this.result.PWV=PWV;
        this.result.ASI=ASI;
        this.result.OMen=OMen;
        this.result.msg=msg;
        this.result.msg2=msg2;

        let patientForm=this.patient;
        patientForm.age=this.form.Age;
        patientForm.sex=this.form.Sex;
        patientForm.hospital="";
        const {data:patient} = await this.$http.post("/user/api/patients",patientForm);
        this.patientResult=patient;

        this.form.patient_id=patient.data.id;
        this.form.risk_factors=[];
        if(this.form.Smoker == "1") this.form.risk_factors.push("Smoker");
        if(this.form.FH == "1") this.form.risk_factors.push("Family History");
        if(this.form.Diabetes == "1") this.form.risk_factors.push("Diabetes");
        if(this.form.THL == "1") this.form.risk_factors.push("Hyperlipidemia");
        if(this.form.TBP == "1") this.form.risk_factors.push("Hypertension");
        if(this.form.MI == "1") this.form.risk_factors.push("MI History");
        if(this.mace && this.mace.id && this.mace['Age'] == this.form['Age']){
            const {data}=await this.$http.post("/user/api/mace_assesment",{...this.form,id:this.mace.id});
            this.mace=data.data.mace;
            setTimeout(()=>{
                this.result.data=data;
                this.$forceUpdate();
                this.downloadBtnKey++;
            },500)

        }else{
            const {data}=await this.$http.post("/user/api/mace_assesment",this.form);
            this.mace=data.data.mace;
            setTimeout(()=>{
                this.result.data=data;
                this.$forceUpdate();
                this.downloadBtnKey++;
            },500)
        }


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
