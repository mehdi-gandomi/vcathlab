<template>
  <div class="mb-base">
    <vx-card style="padding-top:2rem">
        <h3 class="text-center mb-8" style="margin-top:-2rem">Body Composition Analysis</h3>
      <h4 style="text-align: left;padding: 1.5rem;border: 1px solid #000;">Body Analyzer</h4>

      <form @submit="onSubmit">
        <div>
          <vs-row vs-type="flex" vs-w="12" class="mb-6 m-0">
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
              vs-xs="6"
            >
              <div class="flex text-left">
                <span>{{ __("Weight") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>

              <component
                :is="inputs.Weight.type"
                v-model="form.Weight"
                style="width:80px;margin-left:1rem"
                :danger="hasValidationError('Weight')"
                :danger-text="validationError('Weight')"
                name="Weight"
                type="number"
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
                <span>{{ __("Height") }}</span>
                <span class="ml-1 text-red">*</span>
              </div>

              <component
                :is="inputs.Height.type"
                v-model="form.Height"
                style="width:80px;margin-left:1rem"
                :danger="hasValidationError('Height')"
                :danger-text="validationError('Height')"
                name="Height"
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
           <vs-table stripe noDataText="">
            <!-- <template slot="header">
                <h3>
                Users
                </h3>
            </template> -->
            <template slot="thead">
                <vs-th>
                Variables
                </vs-th>
                <vs-th>
                Result
                </vs-th>
                <vs-th>
                Unit
                </vs-th>

            </template>

            <template slot-scope="{data}">
                <vs-tr >
                    <vs-td >
                        Total Body Water (TBW)
                    </vs-td>
                    <vs-td >

                    </vs-td>
                    <vs-td >
                        kg
                    </vs-td>

                </vs-tr>
                <vs-tr >
                    <vs-td >
                        Percentage of TBW
                    </vs-td>
                    <vs-td >

                    </vs-td>
                    <vs-td >
                        %
                    </vs-td>

                </vs-tr>
                <vs-tr >
                    <vs-td >
                        Basal Metabolic Rate (BMR)
                    </vs-td>
                    <vs-td >

                    </vs-td>
                    <vs-td >
                        Kcalor/day
                    </vs-td>

                </vs-tr>
                <vs-tr>
                    <vs-th colspan="4">
                    <strong class="text-center w-100" style="font-size: 16px"
                        >Obesity Analysis</strong
                    >
                    </vs-th>
                </vs-tr>
                <vs-tr >
                    <vs-td >
                        Weight
                    </vs-td>
                    <vs-td >

                    </vs-td>
                    <vs-td >
                        kg
                    </vs-td>

                </vs-tr>
                <vs-tr >
                    <vs-td >
                        Skeletal Muscle Mass (SMM)
                    </vs-td>
                    <vs-td >

                    </vs-td>
                    <vs-td >
                        kg
                    </vs-td>

                </vs-tr>
                <vs-tr >
                    <vs-td >
                        Body Mass Index (BMI)
                    </vs-td>
                    <vs-td >

                    </vs-td>
                    <vs-td >
                        Kg/m2
                    </vs-td>

                </vs-tr>
                <vs-tr>
                    <vs-th colspan="4">
                    <strong class="text-center w-100" style="font-size: 16px"
                        >Muscle – Fat Analysis </strong
                    >
                    </vs-th>
                </vs-tr>
                <vs-tr >
                    <vs-td >
                        Body Fat Mass (BFM)
                    </vs-td>
                    <vs-td >

                    </vs-td>
                    <vs-td >
                        kg
                    </vs-td>

                </vs-tr>
                <vs-tr >
                    <vs-td >
                        Percent Body Fat (PBF)
                    </vs-td>
                    <vs-td >

                    </vs-td>
                    <vs-td >
                        %
                    </vs-td>

                </vs-tr>
                <vs-tr >
                    <vs-td >
                        Lean Body Mass (LBM)
                    </vs-td>
                    <vs-td >

                    </vs-td>
                    <vs-td >
                        %
                    </vs-td>

                </vs-tr>
            </template>
            </vs-table>
            <h3>
                  Result:
            </h3>
            <p class="my-2">
                <strong style="font-size:1.2rem">{{result.msg1}}</strong>
            </p>
            <p class="my-2">
                <strong style="font-size:1.2rem">{{result.msg2}}</strong>
            </p>
            <p class="my-2">
                <strong style="font-size:1.2rem">{{result.msg3}}</strong>
            </p>
        </div>
        <div class="flex justify-center mt-16">
          <div class="flex">
            <vs-button
                style="font-size:30px"
              color="success"
              @click="calculate"
              class="mr-3 mb-2"
              >{{ __("Calculate") }}</vs-button
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
          "LVEDD": "",
          "LVESD": "",
          "IVSD": "",
          "DBP	": "",
          "PWTD": "",
          "TAPSE": "",
          "PAP": "",
          "SBP": "",
          "LVEF": "",
          "Weight": "",
          "Height": "",
          "ُSex":"",
          "Age":"",
          "HR": "",
      },
      patient: new Form({
        name: "",
        code: "",
      }),
      items:{
        A1 : 1,
        A2 : 1,
        A3 : 1,
        A4 : 1,
        A5 : 1,
        A6 : 1,
        A7 : 1,
        A8 : 1,
        A9 : 1,
        A10 : 1,
        A11 : 1,
        A12 : 1,
        A13 : 1,
        A14 : 1
      },
      result:{
        MAP:"",
        EDV:"",
        ESV:"",
        SV:"",
        SVI:"",
        CO:"",
        CI:"",
        CPP:"",
        CBF:"",
        SVR:"",
        PVR:"",
        RI:"",
        LVMI:"",
        RWT:"",
        WMS:"",
        LVEF:"",
        msg1:"",
        msg2:"",
        msg3:"",
        conditions:{
            0:"normal",
            1:"normal",
            2:"normal",
            3:"normal",
            4:"normal",
            5:"normal",
            6:"normal",
            7:"normal",
            8:"normal",
            9:"normal",
            10:"normal",
            11:"normal",
            12:"normal",
            13:"normal",
        }
      },
      conditions:[
        {
        label:"Normal",
        value:1
        },

        {
        label:"Hypokinetic",
        value:2
        },

        {
        label:"Akinetic",
        value:3
        },

        {
        label:"Dyskinetic",
        value:4
        },

        {
        label:"Aneurysmal",
        value:5
        },

        {
        label:"Mild Hypokinetic",
        value:1.5
        },

        {
        label:"Severe Hypokinetic",
        value:2.5
        },

        {
        label:"Akinetic with scar",
        value:6
        },

        {
        label:"Dyscinetic with scar",
        value:7
        },
      ],
      model: "Modules\\User\\Models\\CtCase",
      locale: Iracode.$i18n.locale,
      inputs: {
        "LVEDD": {
          type: "vs-input",
        },
"LVESD": {
          type: "vs-input",
        },
"IVSD": {
          type: "vs-input",
        },
"PWTD": {
          type: "vs-input",
        },
"TAPSE": {
          type: "vs-input",
        },
        "Age": {
          type: "vs-input",
        },
"PAP": {
          type: "vs-input",
        },
"SBP": {
          type: "vs-input",
        },
"LVEF": {
          type: "vs-input",
        },
"Weight": {
          type: "vs-input",
        },
        "Sex": {
          type: "vs-input",
        },
"Height": {
          type: "vs-input",
        },
"HR": {
          type: "vs-input",
        },
        "DBP": {
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
          const {LVEDD,LVESD,IVSD,DBP,PWTD,TAPSE,PAP,SBP,LVEF,Weight,Height,HR}=this.form;
          const {A1 , A2 , A3 , A4 , A5 , A6 , A7 , A8 , A9 , A10 , A11 , A12 , A13 , A14}=this.items;
        const SUM =
            A1 + A2 + A3 + A4 + A5 + A6 + A7 + A8 + A9 + A10 + A11 + A12 + A13 + A14;

            const WMS = SUM / 14;

            const Ejection_fraction = (0.93 - 0.26 * +WMS) * 100;

            const MAP = +DBP + (0.3333 + +HR * 0.0012) * (+SBP - +DBP);

            const EDV = (7 / (2.4 + +LVEDD)) * (Math.pow(+LVEDD,3));

            const ESV = (7 / (2.4 + +LVESD)) * (Math.pow(+LVESD,3));

            const SV = +EDV - +ESV;

            const SVI = SV / Math.sqrt((+Weight * +Height) / 3600);

            const CO = (SV * HR) / 1000;

            const CI = CO / Math.sqrt((Weight * Height) / 3600);

            const CBF = 0.05 * CO;

            const SVR = ((+MAP - 12) / CO) * 0.8;

            const PVR = ((+PAP - 7) / CO) * 0.8;

            const CRI = MAP / (CBF * 16.67);

            const LVMI =(1.04 * Math.pow(+IVSD + +LVEDD + +PWTD,3)- Math.pow(LVEDD, 3)) / Math.sqrt((Weight * Height) / 3600);

            const RWT = 200 * (PWTD / LVEDD);

            let condition = "";
            if (MAP > 110) this.result.conditions[0] = "critical";

        if (MAP < 110) this.result.conditions[0] = "normal";

        if (EDV < 100) this.result.conditions[1] = "critical";

        if (EDV > 110) this.result.conditions[1] = "normal";

        if (ESV < 26) this.result.conditions[2] = "critical";

        if (ESV > 26) this.result.conditions[2] = "normal";

        if (SV < 60) this.result.conditions[3] = "critical";

        if (SV > 60) this.result.conditions[3] = "normal";

        if (SVI < 33) this.result.conditions[4] = "critical";

        if (SVI > 33) this.result.conditions[4] = "normal";

        if (CO < 4.0) this.result.conditions[5] = "critical";

        if (CO > 4.0) this.result.conditions[5] = "normal							";

        if (CI < 2.5) this.result.conditions[6] = "critical";

        if (CI > 2.5) this.result.conditions[6] = "normal";

        if (SVR > 20) this.result.conditions[7] = "critical";

        if (SVR < 20) this.result.conditions[7] = "normal	";

        if (PVR > 3.0) this.result.conditions[8] = "critical";

        if (PVR < 3.0) this.result.conditions[8] = "normal						";

        if (CRI > 35) this.result.conditions[9] = "critical";

        if (CRI < 35) this.result.conditions[9] = "normal	";

        if (LVEF < 20) this.result.conditions[10] = "critical";

        if (LVEF > 20) this.result.conditions[10] = "normal";

        if (LVMI > 115) this.result.conditions[11] = "critical";

        if (LVMI < 115) this.result.conditions[11] = "normal";

        if (RWT > 42) this.result.conditions[12] = "critical";

        if (RWT < 42) this.result.conditions[12] = "normal";

        if (WMS > 2) this.result.conditions[13] = "critical";

        if (WMS < 2) this.result.conditions[13] = "normal";
            this.result.MAP=MAP.toFixed(2);
            this.result.EDV=EDV.toFixed(2);
            this.result.ESV=ESV.toFixed(2);
            this.result.SV=SV.toFixed(2);
            this.result.SVI=SVI.toFixed(2);
            this.result.CO=CO.toFixed(2);
            this.result.CI=CI.toFixed(2);
            // this.result.CPP=CPP.toFixed(2);
            this.result.CBF=CBF.toFixed(2);
            this.result.SVR=SVR.toFixed(2);
            this.result.PVR=PVR.toFixed(2);
            this.result.RI=CRI.toFixed(2);
            this.result.LVMI=parseFloat(LVMI).toFixed(2);
            this.result.RWT=RWT.toFixed(2);
            this.result.WMS=WMS.toFixed(2);
            this.result.LVEF=parseFloat(LVEF).toFixed(2);
            console.log(WMS,RWT,condition)
            if (LVMI > 115 & RWT > 42)
                this.result.msg1="Left ventricular hypertrophy (LVH) was concentric hypertrophy"

            if (LVMI < 115 & RWT < 42)

                this.result.msg1="Left ventricular hypertrophy (LVH) was normal (no LVH)"

            if (LVMI > 115 & RWT < 42)

                this.result.msg1="Left ventricular hypertrophy (LVH) was eccentric hypertrophy"

            if (LVMI < 115 & RWT > 42)

                this.result.msg1="Left ventricular hypertrophy (LVH) was concentric remodeling"



            if (SVR > 20) this.result.msg2="Systemic vascular resistance was critical value (SVR > 1.5U) with stenosis.";
            if (SVR < 20) this.result.msg2="Systemic vascular resistance was normal value (SVR < 1.5U) without dilation or stenosis.";
            if (SVR < 5) this.result.msg2="Systemic vascular resistance was critical value (SVR< 0.2U) with dilation.";

            if (PVR > 3)    this.result.msg3="Pulmonary vascular resistance was high value with pulmonary vascular disease.";


            if (PVR < 3)    this.result.msg3="Pulmonary vascular resistance was normal value without vascular disease.";

const {data}=await this.$http.post("/user/api/echo_calculations",{...this.form,conditions:this.items})
console.log(data)
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
