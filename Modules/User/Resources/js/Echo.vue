<template>
  <div class="mb-base">
    <vx-card style="padding-top: 2rem">
      <h3 class="text-center mb-8" style="margin-top: -2rem">
        Echocardiography Report
      </h3>
      <!--  -->
      <div v-if="userInfo.panel_type == 3 || userInfo.panel_type == 4 || userInfo.panel_type == 5 || userInfo.panel_type == 6">
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
                v-model="patient.age"
                style="width:80px;margin-left:1rem"
                :danger="hasValidationError('age')"
                :danger-text="validationError('age')"
                name="age"
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
                <vs-radio v-model="patient.sex" vs-name="sex" vs-value="1"
                  >Male</vs-radio
                >
                <vs-radio
                  v-model="patient.sex"
                  vs-name="sex"
                  vs-value="0"
                  class="ml-4"
                  >Female</vs-radio
                >
              </div>
            </vs-col>
          </vs-row>
        </div>
      <h4 style="text-align: left; padding: 1.5rem; border: 1px solid #000">
        Cardio Measurement
      </h4>

      <form @submit="onSubmit">
        <div>
          <vs-row vs-type="flex" vs-w="12" class="mb-6 m-0">
            <vs-col
              vs-type="flex"
              style="margin: 0.5rem 0"
              vs-align="center"
              vs-lg="4"
              vs-sm="6"
              vs-xs="12"
            >
              <div class="flex text-left" style="width: 70px">
                <span>{{ __("LVEDD") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <component
                :is="inputs.LVEDD.type"
                v-model="form.LVEDD"
                style="width: 100px; margin-left: 1rem"
                :danger="hasValidationError('LVEDD')"
                :danger-text="validationError('LVEDD')"
                name="LVEDD"
                type="text"
              />
              <span class="unit">cm</span>
            </vs-col>
            <vs-col
              vs-type="flex"
              style="margin: 0.5rem 0"
              vs-align="center"
              vs-lg="4"
              vs-sm="6"
              vs-xs="12"
            >
              <div class="flex text-left" style="width: 70px">
                <span>{{ __("LVESD") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <component
                :is="inputs.LVESD.type"
                v-model="form.LVESD"
                style="width: 100px; margin-left: 1rem"
                :danger="hasValidationError('LVESD')"
                :danger-text="validationError('LVESD')"
                name="LVESD"
                type="text"
              />
              <span class="unit">cm</span>
            </vs-col>
            <vs-col
              vs-type="flex"
              style="margin: 0.5rem 0"
              vs-align="center"
              vs-lg="4"
              vs-sm="6"
              vs-xs="12"
            >
              <div class="flex text-left" style="width: 70px">
                <span>{{ __("IVSD") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <component
                :is="inputs.IVSD.type"
                v-model="form.IVSD"
                style="width: 100px; margin-left: 1rem"
                :danger="hasValidationError('IVSD')"
                :danger-text="validationError('IVSD')"
                name="IVSD"
                type="text"
              />
              <span class="unit">cm</span>
            </vs-col>
            <vs-col
              vs-type="flex"
              style="margin: 0.5rem 0"
              vs-align="center"
              vs-lg="4"
              vs-sm="6"
              vs-xs="12"
            >
              <div class="flex text-left" style="width: 70px">
                <span>{{ __("DBP") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <component
                :is="inputs.DBP.type"
                v-model="form.DBP"
                style="width: 100px; margin-left: 1rem"
                :danger="hasValidationError('DBP')"
                :danger-text="validationError('DBP')"
                name="DBP"
                type="text"
              />
              <span class="unit">mmHg</span>
            </vs-col>
            <vs-col
              vs-type="flex"
              style="margin: 0.5rem 0"
              vs-align="center"
              vs-lg="4"
              vs-sm="6"
              vs-xs="12"
            >
              <div class="flex text-left" style="width: 70px">
                <span>{{ __("PWTD") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <component
                :is="inputs.PWTD.type"
                v-model="form.PWTD"
                style="width: 100px; margin-left: 1rem"
                :danger="hasValidationError('PWTD')"
                :danger-text="validationError('PWTDe')"
                name="PWTD"
                type="text"
              />
              <span class="unit">cm</span>
            </vs-col>
            <vs-col
              vs-type="flex"
              style="margin: 0.5rem 0"
              vs-align="center"
              vs-lg="4"
              vs-sm="6"
              vs-xs="12"
            >
              <div class="flex text-left" style="width: 70px">
                <span>{{ __("TAPSE") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <component
                :is="inputs.TAPSE.type"
                v-model="form.TAPSE"
                style="width: 100px; margin-left: 1rem"
                :danger="hasValidationError('TAPSE')"
                :danger-text="validationError('TAPSE')"
                name="TAPSE"
                type="text"
              />
              <span class="unit">cm</span>
            </vs-col>
            <vs-col
              vs-type="flex"
              style="margin: 0.5rem 0"
              vs-align="center"
              vs-lg="4"
              vs-sm="6"
              vs-xs="12"
            >
              <div class="flex text-left" style="width: 70px">
                <span>{{ __("PAP") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <component
                :is="inputs.PAP.type"
                v-model="form.PAP"
                style="width: 100px; margin-left: 1rem"
                :danger="hasValidationError('PAP')"
                :danger-text="validationError('PAP')"
                name="PAP"
                type="text"
              />
              <span class="unit">mmHg</span>
            </vs-col>
            <vs-col
              vs-type="flex"
              style="margin: 0.5rem 0"
              vs-align="center"
              vs-lg="4"
              vs-sm="6"
              vs-xs="12"
            >
              <div class="flex text-left" style="width: 70px">
                <span>{{ __("SBP") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <component
                :is="inputs.SBP.type"
                v-model="form.SBP"
                style="width: 100px; margin-left: 1rem"
                :danger="hasValidationError('SBP')"
                :danger-text="validationError('SBP')"
                name="SBP"
                type="text"
              />
              <span class="unit">mmHg</span>
            </vs-col>
            <vs-col
              vs-type="flex"
              style="margin: 0.5rem 0"
              vs-align="center"
              vs-lg="4"
              vs-sm="6"
              vs-xs="12"
            >
              <div class="flex text-left" style="width: 70px">
                <span>{{ __("LVEF") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <component
                :is="inputs.LVEF.type"
                v-model="form.LVEF"
                style="width: 100px; margin-left: 1rem"
                :danger="hasValidationError('LVEF')"
                :danger-text="validationError('LVEF')"
                name="LVEF"
                type="text"
              />
              <span class="unit">%</span>
            </vs-col>
            <vs-col
              vs-type="flex"
              style="margin: 0.5rem 0"
              vs-align="center"
              vs-lg="4"
              vs-sm="6"
              vs-xs="12"
            >
              <div class="flex text-left" style="width: 70px">
                <span>{{ __("Weight") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <component
                :is="inputs.Weight.type"
                v-model="form.Weight"
                style="width: 100px; margin-left: 1rem"
                :danger="hasValidationError('Weight')"
                :danger-text="validationError('Weight')"
                name="Weight"
                type="text"
              />
              <span class="unit">Kg</span>
            </vs-col>
            <vs-col
              vs-type="flex"
              style="margin: 0.5rem 0"
              vs-align="center"
              vs-lg="4"
              vs-sm="6"
              vs-xs="12"
            >
              <div class="flex text-left" style="width: 70px">
                <span>{{ __("Height") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <component
                :is="inputs.Height.type"
                v-model="form.Height"
                style="width: 100px; margin-left: 1rem"
                :danger="hasValidationError('Height')"
                :danger-text="validationError('Height')"
                name="Height"
                type="text"
              />
              <span class="unit">cm</span>
            </vs-col>
            <vs-col
              vs-type="flex"
              style="margin: 0.5rem 0"
              vs-align="center"
              vs-lg="4"
              vs-sm="6"
              vs-xs="12"
            >
              <div class="flex text-left" style="width: 70px">
                <span>{{ __("HR") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <component
                :is="inputs.HR.type"
                v-model="form.HR"
                style="width: 100px; margin-left: 1rem"
                :danger="hasValidationError('HR')"
                :danger-text="validationError('HR')"
                nam="HR"
                type="text"
              />
              <span class="unit">beat/s</span>
            </vs-col>
            <vs-col
              vs-type="flex"
              style="margin: 0.5rem 0"
              vs-align="center"
              vs-lg="4"
              vs-sm="6"
              vs-xs="12"
              v-if="userInfo.panel_type == 5 || userInfo.panel_type == 6"
            >
              <div class="flex text-left" style="width: 70px">
                <span>{{ __("MG") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <component
                :is="inputs.MG.type"
                v-model="form.MG"
                style="width: 100px; margin-left: 1rem"
                :danger="hasValidationError('MG')"
                :danger-text="validationError('MG')"
                nam="MG"
                type="text"
              />
              <span class="unit">mmHg</span>
            </vs-col>
            <vs-col
              vs-type="flex"
              style="margin: 0.5rem 0"
              vs-align="center"
              vs-lg="4"
              vs-sm="6"
              vs-xs="12"
              v-if="userInfo.panel_type == 5 || userInfo.panel_type == 6"
            >
              <div class="flex text-left" style="width: 70px">
                <span>{{ __("PG") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <component
                :is="inputs.PG.type"
                v-model="form.PG"
                style="width: 100px; margin-left: 1rem"
                :danger="hasValidationError('PG')"
                :danger-text="validationError('PG')"
                nam="PG"
                type="text"
              />
              <span class="unit">mmHg</span>
            </vs-col>
            <vs-col
              vs-type="flex"
              style="margin: 0.5rem 0"
              vs-align="center"
              vs-lg="4"
              vs-sm="6"
              vs-xs="12"
              v-if="userInfo.panel_type == 5 || userInfo.panel_type == 6"
            >
              <div class="flex text-left" style="width: 70px">
                <span>{{ __("TRG") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <component
                :is="inputs.TRG.type"
                v-model="form.TRG"
                style="width: 100px; margin-left: 1rem"
                :danger="hasValidationError('TRG')"
                :danger-text="validationError('TRG')"
                nam="TRG"
                type="text"
              />
              <span class="unit">mmHg</span>
            </vs-col>
            <vs-col
              vs-type="flex"
              style="margin: 0.5rem 0"
              vs-align="center"
              vs-lg="4"
              vs-sm="6"
              vs-xs="12"
              v-if="userInfo.panel_type == 5 || userInfo.panel_type == 6"
            >
              <div class="flex text-left" style="width: 70px">
                <span>{{ __("PASP") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <component
                :is="inputs.PASP.type"
                v-model="form.PASP"
                style="width: 100px; margin-left: 1rem"
                :danger="hasValidationError('PASP')"
                :danger-text="validationError('PASP')"
                nam="PASP"
                type="text"
              />
              <span class="unit">mmHg</span>
            </vs-col>
            <vs-col
              vs-type="flex"
              style="margin: 0.5rem 0"
              vs-align="center"
              vs-lg="4"
              vs-sm="6"
              vs-xs="12"
              v-if="userInfo.panel_type == 5 || userInfo.panel_type == 6"
            >
              <div class="flex text-left" style="width: 70px">
                <span>{{ __("MVP") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <component
                :is="inputs.MVP.type"
                v-model="form.MVP"
                style="width: 100px; margin-left: 1rem"
                :danger="hasValidationError('MVP')"
                :danger-text="validationError('MVP')"
                nam="MVP"
                type="text"
                :options="selectOptions.MVP"
              />
              <span class="unit">yes/no</span>
            </vs-col>
            <vs-col
              vs-type="flex"
              style="margin: 0.5rem 0"
              vs-align="center"
              vs-lg="4"
              vs-sm="6"
              vs-xs="12"
              v-if="userInfo.panel_type == 5 || userInfo.panel_type == 6"
            >
              <div class="flex text-left" style="width: 70px">
                <span>{{ __("Asc.Aorta") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <component
                :is="inputs.ASCA.type"
                v-model="form.ASCA"
                style="width: 100px; margin-left: 1rem"
                :danger="hasValidationError('ASCA')"
                :danger-text="validationError('ASCA')"
                nam="ASCA"
                type="text"
                :options="selectOptions.ASCA"
              />
              <span class="unit">cm</span>
            </vs-col>
            <vs-col
              vs-type="flex"
              style="margin: 0.5rem 0"
              vs-align="center"
              vs-lg="4"
              vs-sm="6"
              vs-xs="12"
              v-if="userInfo.email != 'abayatian@vcathlab.com' && userInfo.email != 'nkojuri@vcathlab.com' && userInfo.email != 'kojuri@vcathlab.com' && userInfo.email != 'bayatian@vcathlab.com'"
            >
              <div class="flex text-left" style="width: 70px">
                <span>{{ __("LC.IMT") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>

              <component
                :is="inputs.LCIMT.type"
                v-model="form.LCIMT"
                style="width: 100px; margin-left: 1rem"
                :danger="hasValidationError('LCIMT')"
                :danger-text="validationError('LCIMT')"
                nam="LCIMT"
                type="text"
              />
              <span class="unit">μm</span>
            </vs-col>
            <vs-col
              vs-type="flex"
              style="margin: 0.5rem 0"
              vs-align="center"
              vs-lg="4"
              vs-sm="6"
              vs-xs="12"
              v-if="userInfo.email != 'abayatian@vcathlab.com' && userInfo.email != 'nkojuri@vcathlab.com' && userInfo.email != 'kojuri@vcathlab.com' && userInfo.email != 'bayatian@vcathlab.com'"
            >
              <div class="flex text-left" style="width: 70px">
                <span>{{ __("RC.IMT") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <component
                :is="inputs.RCIMT.type"
                v-model="form.RCIMT"
                style="width: 100px; margin-left: 1rem"
                :danger="hasValidationError('RCIMT')"
                :danger-text="validationError('RCIMT')"
                nam="RCIMT"
                type="text"
              />
              <span class="unit">μm</span>
            </vs-col>
          </vs-row>
          <vs-table stripe noDataText="" v-if="userInfo.email == 'kojuri@vcathlab.com' || (userInfo.panel_type != 5 && userInfo.panel_type != 6)" >
            <!-- <template slot="header">
                <h3>
                Users
                </h3>
            </template> -->
            <template slot="thead">
              <vs-th> Basal Segments </vs-th>
              <vs-th> Condition </vs-th>
              <vs-th> Mid Segments </vs-th>
              <vs-th> Condition </vs-th>
            </template>

            <template slot-scope="{ data }">
              <vs-tr>
                <vs-td> Basal Anterior </vs-td>
                <vs-td>
                  <select style="width: 100%" v-model="items.A1">
                    <option
                      v-for="op in conditions"
                      :key="op.value"
                      :value="op.value"
                    >
                      {{ op.label }}
                    </option>
                  </select>
                  <!-- <v-select :options="conditions" label="label"></v-select> -->
                </vs-td>
                <vs-td> Mid Anterior </vs-td>
                <vs-td>
                  <select style="width: 100%" v-model="items.A2">
                    <option
                      v-for="op in conditions"
                      :key="op.value"
                      :value="op.value"
                    >
                      {{ op.label }}
                    </option>
                  </select>
                  <!-- <v-select :options="conditions" label="label"></v-select> -->
                </vs-td>
              </vs-tr>
              <vs-tr>
                <vs-td> Basal Anteroseptal </vs-td>
                <vs-td>
                  <select style="width: 100%" v-model="items.A3">
                    <option
                      v-for="op in conditions"
                      :key="op.value"
                      :value="op.value"
                    >
                      {{ op.label }}
                    </option>
                  </select>
                  <!-- <v-select :options="conditions" label="label"></v-select> -->
                </vs-td>
                <vs-td> Mid Anteroseptal </vs-td>
                <vs-td>
                  <select style="width: 100%" v-model="items.A4">
                    <option
                      v-for="op in conditions"
                      :key="op.value"
                      :value="op.value"
                    >
                      {{ op.label }}
                    </option>
                  </select>
                  <!-- <v-select :options="conditions" label="label"></v-select> -->
                </vs-td>
              </vs-tr>
              <vs-tr>
                <vs-td> Basal Inferoseptal </vs-td>
                <vs-td>
                  <select style="width: 100%" v-model="items.A5">
                    <option
                      v-for="op in conditions"
                      :key="op.value"
                      :value="op.value"
                    >
                      {{ op.label }}
                    </option>
                  </select>
                  <!-- <v-select :options="conditions" label="label"></v-select> -->
                </vs-td>
                <vs-td> Mid Inferoseptal </vs-td>
                <vs-td>
                  <select style="width: 100%" v-model="items.A6">
                    <option
                      v-for="op in conditions"
                      :key="op.value"
                      :value="op.value"
                    >
                      {{ op.label }}
                    </option>
                  </select>
                  <!-- <v-select :options="conditions" label="label"></v-select> -->
                </vs-td>
              </vs-tr>
              <vs-tr>
                <vs-td> Basal Inferior </vs-td>
                <vs-td>
                  <select style="width: 100%" v-model="items.A7">
                    <option
                      v-for="op in conditions"
                      :key="op.value"
                      :value="op.value"
                    >
                      {{ op.label }}
                    </option>
                  </select>
                  <!-- <v-select :options="conditions" label="label"></v-select> -->
                </vs-td>
                <vs-td> Mid Inferior </vs-td>
                <vs-td>
                  <select style="width: 100%" v-model="items.A8">
                    <option
                      v-for="op in conditions"
                      :key="op.value"
                      :value="op.value"
                    >
                      {{ op.label }}
                    </option>
                  </select>
                  <!-- <v-select :options="conditions" label="label"></v-select> -->
                </vs-td>
              </vs-tr>
              <vs-tr>
                <vs-td> Basal Inferolateral </vs-td>
                <vs-td>
                  <select style="width: 100%" v-model="items.A9">
                    <option
                      v-for="op in conditions"
                      :key="op.value"
                      :value="op.value"
                    >
                      {{ op.label }}
                    </option>
                  </select>
                  <!-- <v-select :options="conditions" label="label"></v-select> -->
                </vs-td>
                <vs-td> Mid Inferolateral </vs-td>
                <vs-td>
                  <select style="width: 100%" v-model="items.A10">
                    <option
                      v-for="op in conditions"
                      :key="op.value"
                      :value="op.value"
                    >
                      {{ op.label }}
                    </option>
                  </select>
                  <!-- <v-select :options="conditions" label="label"></v-select> -->
                </vs-td>
              </vs-tr>
              <vs-tr>
                <vs-td> Basal anterolateral </vs-td>
                <vs-td>
                  <select style="width: 100%" v-model="items.A11">
                    <option
                      v-for="op in conditions"
                      :key="op.value"
                      :value="op.value"
                    >
                      {{ op.label }}
                    </option>
                  </select>
                  <!-- <v-select :options="conditions" label="label"></v-select> -->
                </vs-td>
                <vs-td> Mid anterolateral </vs-td>
                <vs-td>
                  <select style="width: 100%" v-model="items.A12">
                    <option
                      v-for="op in conditions"
                      :key="op.value"
                      :value="op.value"
                    >
                      {{ op.label }}
                    </option>
                  </select>
                  <!-- <v-select :options="conditions" label="label"></v-select> -->
                </vs-td>
              </vs-tr>
              <vs-tr>
                <vs-td> Apical anterior </vs-td>
                <vs-td>
                  <select style="width: 100%" v-model="items.A13">
                    <option
                      v-for="op in conditions"
                      :key="op.value"
                      :value="op.value"
                    >
                      {{ op.label }}
                    </option>
                  </select>
                  <!-- <v-select :options="conditions" label="label"></v-select> -->
                </vs-td>
                <vs-td> Apex </vs-td>
                <vs-td>
                  <select style="width: 100%" v-model="items.A14">
                    <option
                      v-for="op in conditions"
                      :key="op.value"
                      :value="op.value"
                    >
                      {{ op.label }}
                    </option>
                  </select>
                  <!-- <v-select :options="conditions" label="label"></v-select> -->
                </vs-td>
              </vs-tr>
            </template>
          </vs-table>
          <vs-row class="my-8" v-if="userInfo.panel_type == 5 || userInfo.panel_type == 6">
            <vs-col vs-lg="3" class="mt-5" >

                  <div >
                      <strong style="display:block;text-align:center;margin:0.5rem 0">Left Ventricular:</strong>
                       <v-select v-model="form.LV"  :options="selectOptions.LV"></v-select>
                  </div>

              </vs-col>
<vs-col vs-lg="3" class="mt-5" >

                  <div >
                      <strong style="display:block;text-align:center;margin:0.5rem 0">Right Ventricular:</strong>
                       <v-select v-model="form.RV"  :options="selectOptions.RV"></v-select>
                  </div>
              </vs-col>
              <vs-col vs-lg="3" class="mt-5">

                  <div >
                      <strong style="display:block;text-align:center;margin:0.5rem 0">Left Atrium Size:</strong>
                       <v-select v-model="form.LA"  :options="selectOptions.LA"></v-select>
                  </div>

              </vs-col>
<vs-col vs-lg="3" class="mt-5">

                  <div >
                      <strong style="display:block;text-align:center;margin:0.5rem 0">Right Atrium Size:</strong>
                       <v-select v-model="form.RA"  :options="selectOptions.RA"></v-select>
                  </div>
              </vs-col>
              <vs-col vs-lg="3" class="mt-3" >
                  <div >
                      <strong style="display:block;text-align:center;margin:0.5rem 0">Mitral Valve(MR):</strong>
                       <v-select v-model="form.MR"  :options="selectOptions.MR"></v-select>
                  </div>

              </vs-col>
              <vs-col vs-lg="3" class="mt-3" >
                  <div >
                      <strong style="display:block;text-align:center;margin:0.5rem 0">Miral Valve(MS):</strong>
                       <v-select v-model="form.MS"  :options="selectOptions.MS"></v-select>
                  </div>
              </vs-col>
              <vs-col vs-lg="3" class="mt-3" >

                  <div >
                      <strong style="display:block;text-align:center;margin:0.5rem 0">Aortic Valve(AI):</strong>
                       <v-select v-model="form.AI"  :options="selectOptions.AI"></v-select>
                  </div>

              </vs-col>
              <vs-col vs-lg="3" class="mt-3" >

                  <div >
                      <strong style="display:block;text-align:center;margin:0.5rem 0">Aortic Valve(AS):</strong>
                       <v-select v-model="form.AS"  :options="selectOptions.AS"></v-select>
                  </div>
              </vs-col>
              <vs-col vs-lg="3" class="mt-3">

                  <div >
                      <strong style="display:block;text-align:center;margin:0.5rem 0">Tricuspid Valve(TR):</strong>
                       <v-select v-model="form.TR"  :options="selectOptions.TR"></v-select>
                  </div>

              </vs-col>
              <vs-col vs-lg="3" class="mt-3">

                  <div >
                      <strong style="display:block;text-align:center;margin:0.5rem 0">Tricuspid Valve(TS):</strong>
                       <v-select v-model="form.TS"  :options="selectOptions.TS"></v-select>
                  </div>
              </vs-col>

              <vs-col vs-lg="3" class="mt-3">

                  <div >
                      <strong style="display:block;text-align:center;margin:0.5rem 0">Pulmonary Valve(PI):</strong>
                       <v-select v-model="form.PI"  :options="selectOptions.PI"></v-select>
                  </div>

              </vs-col>
              <vs-col vs-lg="3" class="mt-3">

                  <div >
                      <strong style="display:block;text-align:center;margin:0.5rem 0">Pulmonary Valve(PS):</strong>
                       <v-select v-model="form.PS"  :options="selectOptions.PS"></v-select>
                  </div>
              </vs-col>

          </vs-row>
          <h3 v-if="userInfo.panel_type != 5 && userInfo.panel_type != 6">Hemodynamic and Antropometry parameters</h3>
          <vs-table stripe noDataText="" v-if="userInfo.panel_type != 5 && userInfo.panel_type != 6">
            <!-- <template slot="header">
        <h3>
        Users
        </h3>
    </template> -->
            <template slot="thead">
              <vs-th> Variables </vs-th>
              <vs-th> Result </vs-th>
              <vs-th> Normal Range </vs-th>
              <vs-th> Condition </vs-th>
            </template>

            <template slot-scope="{ data }">
              <vs-tr>
                <vs-td> Mean Arterial Pressure (MAP) </vs-td>
                <vs-td>
                  {{ result.MAP }}
                </vs-td>
                <vs-td> 70 - 105 | mmHg </vs-td>
                <vs-td>{{ result.conditions[0] }}</vs-td>
              </vs-tr>
              <vs-tr>
                <vs-th colspan="4">
                  <strong class="text-center w-100" style="font-size: 16px"
                    >Stroke Volume Index (SVI)</strong
                  >
                </vs-th>
              </vs-tr>
              <vs-tr>
                <vs-td> End-diastolic Volume (EDV) </vs-td>
                <vs-td>
                  {{ result.EDV }}
                </vs-td>
                <vs-td> 106 - 214 | ml </vs-td>
                <vs-td>{{ result.conditions[1] }}</vs-td>
              </vs-tr>
              <vs-tr>
                <vs-td> End-systolic Volume (ESV) </vs-td>
                <vs-td>
                  {{ result.ESV }}
                </vs-td>
                <vs-td> 26 - 82 | ml </vs-td>
                <vs-td>{{ result.conditions[2] }}</vs-td>
              </vs-tr>
              <vs-tr>
                <vs-td> Stroke Volume (SV) </vs-td>
                <vs-td>
                  {{ result.SV }}
                </vs-td>
                <vs-td> 60 – 100 | ml </vs-td>
                <vs-td>{{ result.conditions[3] }}</vs-td>
              </vs-tr>
              <vs-tr>
                <vs-td> Stroke Volume Index (SVI) </vs-td>
                <vs-td>
                  {{ result.SVI }}
                </vs-td>
                <vs-td> 33 – 47 | ml </vs-td>
                <vs-td>{{ result.conditions[4] }}</vs-td>
              </vs-tr>
              <vs-tr>
                <vs-th colspan="4">
                  <strong class="text-center w-100" style="font-size: 16px"
                    >Coronary Perfusion (CPP)</strong
                  >
                </vs-th>
              </vs-tr>
              <vs-tr>
                <vs-td> Cardiac Output (CO) </vs-td>
                <vs-td>
                  {{ result.CO }}
                </vs-td>
                <vs-td> 4.0 – 8.0 | l/min </vs-td>
                <vs-td>{{ result.conditions[5] }}</vs-td>
              </vs-tr>
              <vs-tr>
                <vs-td> Cardiac Index (CI) </vs-td>
                <vs-td>
                  {{ result.CI }}
                </vs-td>
                <vs-td> 2.5 – 4.0 | l/min/m2 </vs-td>
                <vs-td>{{ result.conditions[6] }}</vs-td>
              </vs-tr>

              <vs-tr>
                <vs-td> Coronary Blood Flow (CBF) </vs-td>
                <vs-td>
                  {{ result.CBF }}
                </vs-td>
                <vs-td> 0.2 - 0.4 | l/min </vs-td>
                <vs-td>{{ result.conditions[10] }}</vs-td>
              </vs-tr>
              <vs-tr>
                <vs-th colspan="4">
                  <strong class="text-center w-100" style="font-size: 16px"
                    >Vascular and Pulmonary Resistance</strong
                  >
                </vs-th>
              </vs-tr>
              <vs-tr>
                <vs-td> Vascular Resistance (SVR) </vs-td>
                <vs-td>
                  {{ result.SVR }}
                </vs-td>
                <vs-td> 8.0 – 20 | dyn.s/cm6 </vs-td>
                <vs-td>{{ result.conditions[7] }}</vs-td>
              </vs-tr>
              <vs-tr>
                <vs-td> Pulmonary Resistance (PVR) </vs-td>
                <vs-td>
                  {{ result.PVR }}
                </vs-td>
                <vs-td> 0.8 – 3.0 | dyn.s/cm6 </vs-td>
                <vs-td>{{ result.conditions[8] }}</vs-td>
              </vs-tr>
              <vs-tr>
                <vs-td> Coronary Resistance Index (RI) </vs-td>
                <vs-td>
                  {{ result.RI }}
                </vs-td>
                <vs-td> 15 - 35 | dyn.s/cm6 </vs-td>
                <vs-td>{{ result.conditions[9] }}</vs-td>
              </vs-tr>
              <vs-tr>
                <vs-th colspan="4">
                  <strong class="text-center w-100" style="font-size: 16px"
                    >Left Ventricular Hypertrophy (LVH)</strong
                  >
                </vs-th>
              </vs-tr>
              <vs-tr>
                <vs-td> Left ventricular mass (LVMI) </vs-td>
                <vs-td>
                  {{ result.LVMI }}
                </vs-td>
                <vs-td> 95 - 115 | Pascal </vs-td>
                <vs-td>{{ result.conditions[11] }}</vs-td>
              </vs-tr>
              <vs-tr>
                <vs-td> Relative wall thickness (RWT) </vs-td>
                <vs-td>
                  {{ result.RWT }}
                </vs-td>
                <vs-td> < 42.0 | Pascal </vs-td>
                <vs-td>{{ result.conditions[12] }}</vs-td>
              </vs-tr>
            </template>
          </vs-table>
          <p class="my-2" v-if="userInfo.panel_type != 5 && userInfo.panel_type != 6">
            <strong style="font-size: 1.2rem">{{ result.msg1 }}</strong>
          </p>
          <p class="my-2" v-if="userInfo.panel_type != 5 && userInfo.panel_type != 6">
            <strong style="font-size: 1.2rem">{{ result.msg2 }}</strong>
          </p>
          <p class="my-2" v-if="userInfo.panel_type != 5 && userInfo.panel_type != 6">
            <strong style="font-size: 1.2rem">{{ result.msg3 }}</strong>
          </p>
        </div>
        <div class="flex justify-center mt-16">
          <div class="flex">
            <vs-button
              style="font-size: 30px"
              color="success"
              @click="calculate"
              class="mr-3 mb-2"
              >{{ __("Calculate") }}</vs-button
            >
            <a target="_blank" style="font-size: 30px" rel="noopener" :key="downloadBtnKey" v-if="result.data.data && result.data.data.link" class="mr-3 mb-2 vs-component vs-button vs-button-success vs-button-filled download-btn"  :href="result.data.data.link" >
                    {{__("Export PDF")}}
                </a>
            <a target="_blank" style="font-size: 30px" rel="noopener" :key="downloadBtnKey" v-if="result.data.data && result.data.data.link" class="mr-3 mb-2 vs-component vs-button vs-button-success vs-button-filled download-btn"  :href="result.data.data.word_link" >
                    {{__("Export Word")}}
                </a>
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
    const userInfo = { ...this.$store.state.auth.userInfo };
    const obj = {
      userInfo: userInfo,
      patient:{
        name: "",
        age: "",
        sex: 1,
        hospital:""
      },

      downloadBtnKey:1,
      selectOptions:{
            LV:[
                'normal',
                'mild enlarged',
                'moderate enlarged',
                'severe enlarged',
                'mild to moderate enlarged',
                'moderate to severe enlarged',
            ],
            RV:[
                'normal',
                'mild enlarged',
                'moderate enlarged',
                'severe enlarged',
                'mild to moderate enlarged',
                'moderate to severe enlarged',
            ],
            LA:[
                'normal',
                'mild enlarged',
                'moderate enlarged',
                'severe enlarged',
                'mild to moderate enlarged',
                'moderate to severe enlarged',
            ],
            RA:[
                'normal',
                'mild enlarged',
                'moderate enlarged',
                'severe enlarged',
                'mild to moderate enlarged',
                'moderate to severe enlarged',
            ],

            LVH:[
                'no',
                'mild',
                'mild to moderate',
                'moderate',
                'moderate to severe',
                'severe',
            ],
            RWMA:[
                'no',
                'mild',
                'mild to moderate',
                'moderate',
                'moderate to severe',
                'severe',
            ],
            MVP:[
                'no ',
                'with',
            ],
            MS:[
                'no',
                'moderate',
                'severe',
                'mild to moderate',
                'moderate to severe',
                'mild',
                'trivial',
            ],
            MR:[
                'no',
                'moderate',
                'severe',
                'mild to moderate',
                'moderate to severe',
                'mild',
                'trivial',
            ],
            AS:[
                'no',
                'moderate',
                'severe',
                'mild to moderate',
                'moderate to severe',
                'mild',
                'trivial',
            ],
            AI:[
                'no',
                'moderate',
                'severe',
                'mild to moderate',
                'moderate to severe',
                'mild',
                'trivial',
            ],
            PS:[
                'no',
                'moderate',
                'severe',
                'mild to moderate',
                'moderate to severe',
                'mild',
                'trivial',
            ],
            PI:[
                'no',
                'moderate',
                'severe',
                'mild to moderate',
                'moderate to severe',
                'mild',
                'trivial',
            ],
            TS:[
                'no',
                'moderate',
                'severe',
                'mild to moderate',
                'moderate to severe',
                'mild',
                'trivial',
            ],
            TR:[
                'no',
                'moderate',
                'severe',
                'mild to moderate',
                'moderate to severe',
                'mild',
                'trivial',
            ],
      },
      form: {
        LCIMT:"",
        RCIMT:"",
        LV:"normal",
        ASCA:"2.38",
        RV:"normal",
        LA:"normal",
        RA:"normal",
        LVH:"",
        RWMA:"",
        MVP:"no",
        MS:"no",
        MR:"no",
        AS:"no",
        AI:"no",
        PS:"no",
        PI:"no",
        TS:"no",
        TR:"no",
        LVEDD: "5.32",
        LVESD: "3.28",
        IVSD: "0.75",
        "DBP": "85",
        PWTD: "0.75",
        TAPSE: "1.75",
        PAP: "15",
        SBP: "125",
        LVEF: "55",
        Weight: "70",
        Height: "180",
        HR: "89",
        patient_id:"",
        MG:"12",
        PG:"15",
        TRG:"14",
        PASP:"15"
      },
      items: {
        A1: 1,
        A2: 1,
        A3: 1,
        A4: 1,
        A5: 1,
        A6: 1,
        A7: 1,
        A8: 1,
        A9: 1,
        A10: 1,
        A11: 1,
        A12: 1,
        A13: 1,
        A14: 1,
      },
      result: {
        MAP: "",
        EDV: "",
        ESV: "",
        SV: "",
        SVI: "",
        CO: "",
        CI: "",
        CPP: "",
        CBF: "",
        SVR: "",
        PVR: "",
        RI: "",
        LVMI: "",
        RWT: "",
        WMS: "",
        LVEF: "",
        msg1: "",
        msg2: "",
        msg3: "",
        conditions: {
          0: "normal",
          1: "normal",
          2: "normal",
          3: "normal",
          4: "normal",
          5: "normal",
          6: "normal",
          7: "normal",
          8: "normal",
          9: "normal",
          10: "normal",
          11: "normal",
          12: "normal",
          13: "normal",
        },
        data:{}
      },
      conditions: [
        {
          label: "Normal",
          value: 1,
        },

        {
          label: "Hypokinetic",
          value: 2,
        },

        {
          label: "Akinetic",
          value: 3,
        },

        {
          label: "Dyskinetic",
          value: 4,
        },

        {
          label: "Aneurysmal",
          value: 5,
        },

        {
          label: "Mild Hypokinetic",
          value: 1.5,
        },

        {
          label: "Severe Hypokinetic",
          value: 2.5,
        },

        {
          label: "Akinetic with scar",
          value: 6,
        },

        {
          label: "Dyscinetic with scar",
          value: 7,
        },
      ],
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
        LVEDD: {
          type: "vs-input",
        },
        LVESD: {
          type: "vs-input",
        },
        IVSD: {
          type: "vs-input",
        },
        PWTD: {
          type: "vs-input",
        },
        TAPSE: {
          type: "vs-input",
        },
        PAP: {
          type: "vs-input",
        },
        SBP: {
          type: "vs-input",
        },
        LVEF: {
          type: "vs-input",
        },
        Weight: {
          type: "vs-input",
        },
        Height: {
          type: "vs-input",
        },
        HR: {
          type: "vs-input",
        },
        DBP: {
          type: "vs-input",
        },
        MG: {
          type: "vs-input",
        },
        PG: {
          type: "vs-input",
        },
        TRG: {
          type: "vs-input",
        },
        PASP: {
          type: "vs-input",
        },
        MVP: {
          type: "v-select",
        },
        ASCA:{
            type: "vs-input",
        },
        LCIMT:{
            type: "vs-input",
        },
        RCIMT:{
            type: "vs-input",
        },
        LV: {
          type: "v-select",
        },
        RV: {
          type: "v-select",
        },
        LeftAtriumSize: {
          type: "v-select",
        },
        RightAtriumSize: {
          type: "v-select",
        },
        MR: {
          type: "v-select",
        },
        MS: {
          type: "v-select",
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
      },
    };
    return obj;
  },
  props: {
    //
  },
  computed: {
    //
  },
  created() {
    console.log(this.userInfo.email)
  },
  mounted() {
    //
  },
  methods: {
    async calculate() {
        this.result={
        MAP: "",
        EDV: "",
        ESV: "",
        SV: "",
        SVI: "",
        CO: "",
        CI: "",
        CPP: "",
        CBF: "",
        SVR: "",
        PVR: "",
        RI: "",
        LVMI: "",
        RWT: "",
        WMS: "",
        LVEF: "",
        msg1: "",
        msg2: "",
        msg3: "",
        conditions: {
          0: "normal",
          1: "normal",
          2: "normal",
          3: "normal",
          4: "normal",
          5: "normal",
          6: "normal",
          7: "normal",
          8: "normal",
          9: "normal",
          10: "normal",
          11: "normal",
          12: "normal",
          13: "normal",
        },
        data:{}
      };
      let {
        LVEDD,
        LVESD,
        IVSD,
        DBP,
        PWTD,
        TAPSE,
        PAP,
        SBP,
        LVEF,
        Weight,
        Height,
        HR,
      } = this.form;
      if (this.userInfo.email == "kojuri@vcathlab.com") {
        LVEDD = LVEDD / 10;
        LVESD = LVESD / 10;
        IVSD = IVSD / 10;
        PWTD = PWTD / 10;
        TAPSE = TAPSE / 10;
      }

      const { A1, A2, A3, A4, A5, A6, A7, A8, A9, A10, A11, A12, A13, A14 } =
        this.items;
      const SUM =
        A1 +
        A2 +
        A3 +
        A4 +
        A5 +
        A6 +
        A7 +
        A8 +
        A9 +
        A10 +
        A11 +
        A12 +
        A13 +
        A14;

      const WMS = SUM / 14;

      const Ejection_fraction = (0.93 - 0.26 * +WMS) * 100;

      const MAP = +DBP + (0.3333 + +HR * 0.0012) * (+SBP - +DBP);

      const EDV = (7 / (2.4 + +LVEDD)) * Math.pow(+LVEDD, 3);

      let ESV = (7 / (2.4 + +LVESD)) * Math.pow(+LVESD, 3);
    //   ESV = EDV*(1-LVEF)
      ESV = EDV*(1-(LVEF/100));
      const SV = +EDV - +ESV;

      const SVI = SV / Math.sqrt((+Weight * +Height) / 3600);

      const CO = (SV * HR) / 1000;

      const CI = CO / Math.sqrt((Weight * Height) / 3600);

      const CBF = 0.05 * CO;

      const SVR = ((+MAP - 12) / CO) * 0.8;

      const PVR = ((+PAP - 7) / CO) * 0.8;

      const CRI = MAP / (CBF * 16.67);

      const LVMI =
        (1.04 * Math.pow(+IVSD + +LVEDD + +PWTD, 3) - Math.pow(LVEDD, 3)) /
        Math.sqrt((Weight * Height) / 3600);

      const RWT = 200 * (PWTD / LVEDD);
      let WMSI = (0.93-(LVEF/100))/0.26
      let condition = "";

      if (MAP > 105) this.result.conditions[0] = "critical";

      if (MAP < 105) this.result.conditions[0] = "normal";

      if (EDV < 86) this.result.conditions[1] = "critical";

      if (EDV > 86) this.result.conditions[1] = "normal";

      if (ESV < 26) this.result.conditions[2] = "critical";

      if (ESV > 26) this.result.conditions[2] = "normal";

      if (SV < 55) this.result.conditions[3] = "critical";

      if (SV > 55) this.result.conditions[3] = "normal";

      if (SVI < 33) this.result.conditions[4] = "critical";

      if (SVI > 33) this.result.conditions[4] = "normal";

      if (CO < 4.0) this.result.conditions[5] = "critical";

      if (CO > 4.0) this.result.conditions[5] = "normal							";

      if (CI < 2.5) this.result.conditions[6] = "critical";

      if (CI > 2.5) this.result.conditions[6] = "normal";

      if (SVR > 15) this.result.conditions[7] = "critical";

      if (SVR < 15) this.result.conditions[7] = "normal	";

      if (PVR > 2.5) this.result.conditions[8] = "critical";
      else if (PVR < 2.5) this.result.conditions[8] = "normal						";

      if (CRI > 30) this.result.conditions[9] = "critical";

      if (CRI < 30) this.result.conditions[9] = "normal	";

      if (CBF < 0.2) this.result.conditions[10] = "critical";

      if (CBF > 0.2) this.result.conditions[10] = "normal";

      if (LVMI > 130) this.result.conditions[11] = "abnormal";

      if (LVMI < 130) this.result.conditions[11] = "normal";

      if (RWT > 42) this.result.conditions[12] = "abnormal";

      if (RWT < 42) this.result.conditions[12] = "normal";

      let Grading = "";
      let LS = "";
      let WG = "";
      let SG = "";
      let SVG = "";
      let PVG = "";
      if (LVEF > 55) {
        Grading = "Normal (>55%)";
        LS = "-15% to -25%";
      }

      if (LVEF > 40 && LVEF < 55) {
        Grading = "Mildly reduced (40% - 55%)";
        LS = "-15% to -12.5%";
      }

      if (LVEF > 30 && LVEF < 40) {
        Grading = "Moderately reduced (30% - 40%)";
        LS = "-12.5% to -8.1%";
      }
      if (LVEF < 30) {
        Grading = "Severely reduced (<30%)";
        LS = "< -8%";
      }

      let msg3 = `Ejection fraction (LVEF = ${LVEF}%) was **${Grading}**, longitudinal strain (global and regional) = **${LS}**.`;
    //   if (WMSI < 1.2) WG = "normal";

    //   if (WMSI > 1.2) WG = "Abnormal";

    //   if (WMSI < 1.2) SG = "normokinetic";

    //   if (WMSI < 1.5) SG = "mild hypokinesia";

    //   if (WMSI < 2.0) SG = "hypokinesia";

    //   if (WMSI < 2.5) SG = "severe hypokinesia";

    //   if (WMSI < 3.0) SG = "akinetic";

        if (WMSI < 1.47)

            SG = "normokinetic"

        if (WMSI < 1.66)

            SG = "mild hypokinesia"

        if (WMSI < 2.06)

            SG = "hypokinesia"

        if (WMSI < 2.65)

            SG = "severe hypokinesia"

        if (WMSI < 3.0)

            SG = "akinetic"

      let msg4 = `Wall motion score index (WMSI = ${WMSI}) was **${WG}**, is considered **${SG}**.`;

      if (SVR > 15) SVG = "abnormal";

      if (SVR < 15) SVG = "normal";

      let msg5 = `Systemic vascular resistance (SVR = ${SVR} dyn.s/cm6) was **${SVG}** value, (CO = ${CO} l/min) and (MAP = ${MAP} mmHg).`;

      if (PVR > 2.5) PVG = "abnormal";

      if (PVR < 2.5) PVG = "normal";

      let msg6 = `Pulmonary vascular resistance (PVR = ${PVR} dyn.s/cm6) was **${PVG}** value, (CO = ${CO} l/min) and (mean PAP = ${PAP} mmHg)).`;
      let msg7 = "";

      if ((LVMI > 115) & (RWT > 42))
        msg7 = "Left ventricular hypertrophy (LVH) was concentric hypertrophy";

      if ((LVMI < 115) & (RWT < 42))
        msg7 = "Left ventricular hypertrophy (LVH) was normal (no LVH)";

      if ((LVMI > 115) & (RWT < 42))
        msg7 = "Left ventricular hypertrophy (LVH) was eccentric hypertrophy";

      if ((LVMI < 115) & (RWT > 42))
        msg7 = "Left ventricular hypertrophy (LVH) was concentric remodeling";

      let LVMG = "";
      if (LVMI < 115) LVMG = "normal value (<115 g/m2) without abnormality.";

      if (LVMI < 131) LVMG = "mildly abnormal.";

      if (LVMI < 148) LVMG = "moderrately abnormal.";

      if (LVMI > 148) LVMG = "severely abnormal.";

      let msg8 = `Left ventricular mass index (LVMI = ${LVMI} g/m2) was **${LVMG}**`;

      // if (WMS > 2) this.result.conditions[13] = "critical";

      // if (WMS < 2) this.result.conditions[13] = "normal";
      this.result.MAP = MAP.toFixed(2);
      this.result.EDV = EDV.toFixed(2);
      this.result.ESV = ESV.toFixed(2);
      this.result.SV = SV.toFixed(2);
      this.result.SVI = SVI.toFixed(2);
      this.result.CO = CO.toFixed(2);
      this.result.CI = CI.toFixed(2);
      // this.result.CPP=CPP.toFixed(2);
      this.result.CBF = CBF.toFixed(2);
      this.result.SVR = SVR.toFixed(2);
      this.result.PVR = PVR.toFixed(2);
      this.result.RI = CRI.toFixed(2);
      this.result.LVMI = parseFloat(LVMI).toFixed(2);
      this.result.RWT = RWT.toFixed(2);
      this.result.WMS = WMS.toFixed(2);
      this.result.LVEF = parseFloat(LVEF).toFixed(2);
      console.log(WMS, RWT, condition);
      if ((LVMI > 115) & (RWT > 42))
        this.result.msg1 =
          "Left ventricular hypertrophy (LVH) was concentric hypertrophy";

      if ((LVMI < 115) & (RWT < 42))
        this.result.msg1 =
          "Left ventricular hypertrophy (LVH) was normal (no LVH)";

      if ((LVMI > 115) & (RWT < 42))
        this.result.msg1 =
          "Left ventricular hypertrophy (LVH) was eccentric hypertrophy";

      if ((LVMI < 115) & (RWT > 42))
        this.result.msg1 =
          "Left ventricular hypertrophy (LVH) was concentric remodeling";

      if (SVR > 20)
        this.result.msg2 =
          "Systemic vascular resistance was critical value (SVR > 1.5U) with stenosis.";
      if (SVR < 20)
        this.result.msg2 =
          "Systemic vascular resistance was normal value (SVR < 1.5U) without dilation or stenosis.";
      if (SVR < 5)
        this.result.msg2 =
          "Systemic vascular resistance was critical value (SVR< 0.2U) with dilation.";

      if (PVR > 3)
        this.result.msg3 =
          "Pulmonary vascular resistance was high value with pulmonary vascular disease.";

      if (PVR < 3)
        this.result.msg3 =
          "Pulmonary vascular resistance was normal value without vascular disease.";
console.log( msg3, msg4, msg5, msg6, msg7, msg8,LVMG,PVG,SVG,WG,Grading,LS);
        if(this.userInfo.panel_type == 3 || this.userInfo.panel_type == 4 || this.userInfo.panel_type == 5 || this.userInfo.panel_type == 6){
            const {data:patient} = await this.$http.post("/user/api/patients",this.patient);
            console.log(patient)
            this.form.patient_id=patient.data.id;
        }
      const { data } = await this.$http.post("/user/api/echo_calculations", {
        ...this.form,
        conditions: this.items,
      });
      setTimeout(()=>{
          this.result.data=data;
          this.$forceUpdate();
            this.downloadBtnKey++;
      },500)

      console.log(data);
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
.unit{
    margin-left:1rem;
}
</style>
