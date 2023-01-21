<template>
  <loading-view :loading="loading">
    <div class="vx-row">
      <div class="vx-col w-full">
        <vx-card class="mb-base">
          <template v-slot:actions>
            <vs-button
              color="primary"
              to="/user/echo_calculations"
              type="filled"
              >Back</vs-button
            >
          </template>
          <div class="vx-row mb-6">
            <div class="vx-col w-1/2">
              <div class="row flex">
                <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                  <p class="font-semibold">
                    {{ __("LV EDD") }}
                  </p>
                </div>
                <div class="vx-col w-3/4">
                  {{ details.LVEDD }}
                </div>
              </div>
            </div>
            <div class="vx-col w-1/2">
              <div class="row flex">
                <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                  <p class="font-semibold">
                    {{ __("LVESD") }}
                  </p>
                </div>
                <div class="vx-col w-3/4">
                  {{ details.LVESD }}
                </div>
              </div>
            </div>
          </div>
          <div class="vx-row mb-6">
            <div class="vx-col w-1/2">
              <div class="row flex">
                <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                  <p class="font-semibold">
                    {{ __("IVSD") }}
                  </p>
                </div>
                <div class="vx-col w-3/4">
                  {{ details.IVSD }}
                </div>
              </div>
            </div>
            <div class="vx-col w-1/2">
              <div class="row flex">
                <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                  <p class="font-semibold">
                    {{ __("DBP") }}
                  </p>
                </div>
                <div class="vx-col w-3/4">
                  {{ details.DBP }}
                </div>
              </div>
            </div>
          </div>
          <div class="vx-row mb-6">
            <div class="vx-col w-1/2">
              <div class="row flex">
                <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                  <p class="font-semibold">
                    {{ __("PWTD") }}
                  </p>
                </div>
                <div class="vx-col w-3/4">
                  {{ details.PWTD }}
                </div>
              </div>
            </div>
            <div class="vx-col w-1/2">
              <div class="row flex">
                <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                  <p class="font-semibold">
                    {{ __("TAPSE") }}
                  </p>
                </div>
                <div class="vx-col w-3/4">
                  {{ details.TAPSE }}
                </div>
              </div>
            </div>
          </div>
          <div class="vx-row mb-6">
            <div class="vx-col w-1/2">
              <div class="row flex">
                <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                  <p class="font-semibold">
                    {{ __("PAP") }}
                  </p>
                </div>
                <div class="vx-col w-3/4">
                  {{ details.PAP }}
                </div>
              </div>
            </div>
            <div class="vx-col w-1/2">
              <div class="row flex">
                <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                  <p class="font-semibold">
                    {{ __("SBP") }}
                  </p>
                </div>
                <div class="vx-col w-3/4">
                  {{ details.SBP }}
                </div>
              </div>
            </div>
          </div>
          <div class="vx-row mb-6">
            <div class="vx-col w-1/2">
              <div class="row flex">
                <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                  <p class="font-semibold">
                    {{ __("LVEF") }}
                  </p>
                </div>
                <div class="vx-col w-3/4">
                  {{ details.LVEF }}
                </div>
              </div>
            </div>
            <div class="vx-col w-1/2">
              <div class="row flex">
                <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                  <p class="font-semibold">
                    {{ __("Weight") }}
                  </p>
                </div>
                <div class="vx-col w-3/4">
                  {{ details.Weight }}
                </div>
              </div>
            </div>
          </div>
          <div class="vx-row mb-6">
            <div class="vx-col w-1/2">
              <div class="row flex">
                <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                  <p class="font-semibold">
                    {{ __("Height") }}
                  </p>
                </div>
                <div class="vx-col w-3/4">
                  {{ details.Height }}
                </div>
              </div>
            </div>
            <div class="vx-col w-1/2">
              <div class="row flex">
                <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                  <p class="font-semibold">{{ __("HR") }}</p>
                </div>
                <div class="vx-col w-3/4">
                  {{ details.HR }}
                </div>
              </div>
            </div>
          </div>
          <div class="vx-row mb-6">
            <div class="vx-col w-1/2">
              <div class="row flex">
                <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                  <p class="font-semibold">
                    {{ __("user") }}
                  </p>
                </div>
                <div class="vx-col w-3/4">
                  {{ details.user.name }}
                </div>
              </div>
            </div>

            <div class="vx-col w-1/2">
              <div class="row flex">
                <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                  <p class="font-semibold">
                    {{ __("Created At") }}
                  </p>
                </div>
                <div class="vx-col w-3/4">
                  {{ dateFormat("created_at") }}
                </div>
              </div>
            </div>
          </div>

          <div class="vx-row mb-6" style="padding: 0 6rem;">
              <div class="vx-col w-full">
                  <h4>Conditions</h4>
                  <vs-table stripe noDataText="">
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
                  {{ details.conditions.A1 }}
                  <!-- <v-select :options="conditions" label="label"></v-select> -->
                </vs-td>
                <vs-td> Mid Anterior </vs-td>
                <vs-td>
                  {{ details.conditions.A2 }}
                  <!-- <v-select :options="conditions" label="label"></v-select> -->
                </vs-td>
              </vs-tr>
              <vs-tr>
                <vs-td> Basal Anteroseptal </vs-td>
                <vs-td>
                  {{ details.conditions.A3 }}
                  <!-- <v-select :options="conditions" label="label"></v-select> -->
                </vs-td>
                <vs-td> Mid Anteroseptal </vs-td>
                <vs-td>
                  {{ details.conditions.A4 }}
                  <!-- <v-select :options="conditions" label="label"></v-select> -->
                </vs-td>
              </vs-tr>
              <vs-tr>
                <vs-td> Basal Inferoseptal </vs-td>
                <vs-td>
                  {{ details.conditions.A5 }}
                  <!-- <v-select :options="conditions" label="label"></v-select> -->
                </vs-td>
                <vs-td> Mid Inferoseptal </vs-td>
                <vs-td>
                  {{ details.conditions.A6 }}
                  <!-- <v-select :options="conditions" label="label"></v-select> -->
                </vs-td>
              </vs-tr>
              <vs-tr>
                <vs-td> Basal Inferior </vs-td>
                <vs-td>
                  {{ details.conditions.A7 }}
                  <!-- <v-select :options="conditions" label="label"></v-select> -->
                </vs-td>
                <vs-td> Mid Inferior </vs-td>
                <vs-td>
                  {{ details.conditions.A8 }}
                  <!-- <v-select :options="conditions" label="label"></v-select> -->
                </vs-td>
              </vs-tr>
              <vs-tr>
                <vs-td> Basal Inferolateral </vs-td>
                <vs-td>
                  {{ details.conditions.A9 }}
                  <!-- <v-select :options="conditions" label="label"></v-select> -->
                </vs-td>
                <vs-td> Mid Inferolateral </vs-td>
                <vs-td>
                  {{ details.conditions.A10 }}
                  <!-- <v-select :options="conditions" label="label"></v-select> -->
                </vs-td>
              </vs-tr>
              <vs-tr>
                <vs-td> Basal anterolateral </vs-td>
                <vs-td>
                  {{ details.conditions.A11 }}
                  <!-- <v-select :options="conditions" label="label"></v-select> -->
                </vs-td>
                <vs-td> Mid anterolateral </vs-td>
                <vs-td>
                  {{ details.conditions.A12 }}
                  <!-- <v-select :options="conditions" label="label"></v-select> -->
                </vs-td>
              </vs-tr>
              <vs-tr>
                <vs-td> Apical anterior </vs-td>
                <vs-td>
                  {{ details.conditions.A13 }}
                  <!-- <v-select :options="conditions" label="label"></v-select> -->
                </vs-td>
                <vs-td> Apex </vs-td>
                <vs-td>
                  {{ details.conditions.A14 }}
                  <!-- <v-select :options="conditions" label="label"></v-select> -->
                </vs-td>
              </vs-tr>
            </template>
          </vs-table>
              </div>
          </div>
        </vx-card>
        <vx-card title="Result" class="mb-base">
          <h3>Hemodynamic and Antropometry parameters</h3>
<vs-table stripe noDataText="">
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
        <vs-td>{{result.conditions[0]}}</vs-td>
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
        <vs-td>{{result.conditions[1]}}</vs-td>
      </vs-tr>
      <vs-tr>
        <vs-td> End-systolic Volume (ESV) </vs-td>
        <vs-td>
          {{ result.ESV }}
        </vs-td>
        <vs-td> 26 - 82 | ml </vs-td>
        <vs-td>{{result.conditions[2]}}</vs-td>
      </vs-tr>
      <vs-tr>
        <vs-td> Stroke Volume (SV) </vs-td>
        <vs-td>
          {{ result.SV }}
        </vs-td>
        <vs-td> 60 – 100 | ml </vs-td>
        <vs-td>{{result.conditions[3]}}</vs-td>
      </vs-tr>
      <vs-tr>
        <vs-td> Stroke Volume Index (SVI) </vs-td>
        <vs-td>
          {{ result.SVI }}
        </vs-td>
        <vs-td> 33 – 47 | ml </vs-td>
        <vs-td>{{result.conditions[4]}}</vs-td>
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
        <vs-td>{{result.conditions[5]}}</vs-td>
      </vs-tr>
      <vs-tr>
        <vs-td> Cardiac Index (CI) </vs-td>
        <vs-td>
          {{ result.CI }}
        </vs-td>
        <vs-td> 2.5 – 4.0 | l/min/m2 </vs-td>
        <vs-td>{{result.conditions[6]}}</vs-td>
      </vs-tr>

      <vs-tr>
        <vs-td> Coronary Blood Flow (CBF) </vs-td>
        <vs-td>
          {{ result.CBF }}
        </vs-td>
        <vs-td> 0.2 - 0.4 | l/min </vs-td>
        <vs-td>{{result.conditions[8]}}</vs-td>
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
        <vs-td>{{result.conditions[9]}}</vs-td>
      </vs-tr>
      <vs-tr>
        <vs-td> Pulmonary Resistance (PVR) </vs-td>
        <vs-td>
          {{ result.PVR }}
        </vs-td>
        <vs-td> 0.8 – 3.0 | dyn.s/cm6 </vs-td>
        <vs-td>{{result.conditions[10]}}</vs-td>
      </vs-tr>
      <vs-tr>
        <vs-td> Coronary Resistance Index (RI) </vs-td>
        <vs-td>
          {{ result.RI }}
        </vs-td>
        <vs-td> 15 - 35 | dyn.s/cm6 </vs-td>
        <vs-td>{{result.conditions[11]}}</vs-td>
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
        <vs-td>{{result.conditions[12]}}</vs-td>
      </vs-tr>
      <vs-tr>
        <vs-td> Relative wall thickness (RWT) </vs-td>
        <vs-td>
          {{ result.RWT }}
        </vs-td>
        <vs-td> < 42.0 | Pascal </vs-td>
        <vs-td>{{result.conditions[13]}}</vs-td>
      </vs-tr>

    </template>
  </vs-table>
          <!-- <p class="my-2">
                <strong style="font-size:1.2rem">{{details.result.msg1}}</strong>
            </p>
            <p class="my-2">
                <strong style="font-size:1.2rem">{{details.result.msg2}}</strong>
            </p>
            <p class="my-2">
                <strong style="font-size:1.2rem">{{details.result.msg3}}</strong>
            </p> -->
            <a target="_blank" style="font-size: 30px" rel="noopener"  v-if="details.link"  class="mr-3 mb-2 vs-component vs-button vs-button-success vs-button-filled download-btn"  :href="details.link" >
                    {{__("Export PDF")}}
            </a>
            <a target="_blank" style="font-size: 30px" rel="noopener"  v-if="details.word_link"  class="mr-3 mb-2 vs-component vs-button vs-button-success vs-button-filled download-btn"  :href="details.word_link" >
                    {{__("Export Word")}}
            </a>
        </vx-card>
      </div>
    </div>
  </loading-view>
</template>
<script>
import DetailPage from "@/mixins/DetailPage";
export default {
  components: {},
  mixins: [DetailPage],
  data() {
    return {
      details: {
          link:"",
          result:{},
        LVEDD: "",
        LVESD: "",
        IVSD: "",
        DBP: "",
        PWTD: "",
        TAPSE: "",
        PAP: "",
        SBP: "",
        LVEF: "",
        Weight: "",
        Height: "",
        HR: "",
        conditions: [],
        created_at: "",
        updated_at: "",
        user: "",
        user: {},
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
      formTypes: {
        LVEDD: "text",
        LVESD: "text",
        IVSD: "text",
        DBP: "text",
        PWTD: "text",
        TAPSE: "text",
        PAP: "text",
        SBP: "text",
        LVEF: "text",
        Weight: "text",
        Height: "text",
        HR: "text",
        conditions: "text",
        created_at: "text",
        updated_at: "text",
        user: "text",
      },
      module: "User",
      model: "EchoCalculation",
    };
  },
  props: {
    //
  },
  computed: {
    Iracode() {
      return window.Iracode;
    },
  },
  async created() {
    const { data: response } = await this.$http.get(
      `/user/api/echo_calculations/${this.$route.params.id}`
    );
    if (response.success) {
      const { data } = response;
      this.$store.dispatch("setCurrentResource", data);
      this.populateFormFields(data);
      this.calculate();
    }
    this.loading = false;
  },
  methods: {
    async calculate() {
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
      } = this.details;
      LVEDD=LVEDD/10;
        LVESD=LVESD/10;
        IVSD=IVSD/10;
        PWTD=PWTD/10;
        TAPSE=TAPSE/10;
      const { A1, A2, A3, A4, A5, A6, A7, A8, A9, A10, A11, A12, A13, A14 } =
        this.details.conditions;
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

      const ESV = (7 / (2.4 + +LVESD)) * Math.pow(+LVESD, 3);

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

        if (LVMI > 250) this.result.conditions[11] = "critical";

        if (LVMI < 250) this.result.conditions[11] = "normal";

        if (RWT > 42) this.result.conditions[12] = "critical";

        if (RWT < 42) this.result.conditions[12] = "normal";

        if (WMS > 2) this.result.conditions[13] = "critical";

        if (WMS < 2) this.result.conditions[13] = "normal";
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
      this.result.LVMI = LVMI.toFixed(2);
      this.result.RWT = RWT.toFixed(2);
      this.result.WMS = WMS.toFixed(2);
      this.result.LVEF = LVEF ? parseFloat(LVEF).toFixed(2):"";
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
      console.log(WMS, RWT, condition);
    },
  },
  mounted() {
    //
  },
};
</script>
<style>
.download-btn:hover{
    color: #fff;
}
</style>
