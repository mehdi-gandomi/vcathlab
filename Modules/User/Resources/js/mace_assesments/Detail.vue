<template>
    <loading-view :loading="loading">
        <div class="vx-row">
            <div class="vx-col w-full">
                <vx-card class="mb-base">
                    <template v-slot:actions>
                        <vs-button
                            color="primary"
                            to="/user/mace_assesments"
                            type="filled"
                            >Back</vs-button
                        >
                    </template>
                    <div class="vx-row mb-6">
                        <div class="vx-col w-1/4 mb-6">
                            <div class="">
                                <div
                                    class="text-center "
                                >
                                    <p class="font-semibold">
                                        {{ __("HbA1C") }}
                                    </p>
                                </div>
                                <div class="text-center">
                                    {{ details.HbA1C }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/4 mb-6">
                            <div class="">
                                <div
                                    class="text-center "
                                >
                                    <p class="font-semibold">
                                        {{ __("LDL Cholesterol") }}
                                    </p>
                                </div>
                                <div class="text-center">
                                    {{ details.LDL_cholesterol }}
                                </div>
                            </div>
                        </div>
                          <div class="vx-col w-1/4 mb-6">
                            <div class="">
                                <div
                                    class="text-center "
                                >
                                    <p class="font-semibold">
                                        {{ __("HDL Cholesterol") }}
                                    </p>
                                </div>
                                <div class="text-center">
                                    {{ details.HDL_cholesterol }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/4 mb-6">
                            <div class="">
                                <div
                                    class="text-center "
                                >
                                    <p class="font-semibold">{{ __("Age") }}</p>
                                </div>
                                <div class="text-center">
                                    {{ details.Age }}
                                </div>
                            </div>
                        </div>
                           <div class="vx-col w-1/4 mb-6">
                            <div class="">
                                <div
                                    class="text-center "
                                >
                                    <p class="font-semibold">
                                        {{ __("SBP") }}
                                    </p>
                                </div>
                                <div class="text-center">
                                    {{ details.SBP }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/4 mb-6">
                            <div class="">
                                <div
                                    class="text-center "
                                >
                                    <p class="font-semibold">
                                        {{ __("Triglycerides") }}
                                    </p>
                                </div>
                                <div class="text-center">
                                    {{ details.Triglycerides }}
                                </div>
                            </div>
                        </div>
                          <div class="vx-col w-1/4 mb-6">
                            <div class="">
                                <div
                                    class="text-center "
                                >
                                    <p class="font-semibold">
                                        {{ __("DBP") }}
                                    </p>
                                </div>
                                <div class="text-center">
                                    {{ details.DBP }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/4 mb-6">
                            <div class="">
                                <div
                                    class="text-center "
                                >
                                    <p class="font-semibold">
                                        {{ __("Left Anklebrachial Index") }}
                                    </p>
                                </div>
                                <div class="text-center">
                                    {{ details.LeftAnklebrachialIndex ? formatDigit(+details.LeftAnklebrachialIndex):'' }}
                                </div>
                            </div>
                        </div>
                          <div class="vx-col w-1/4 mb-6">
                            <div class="">
                                <div
                                    class="text-center "
                                >
                                    <p class="font-semibold">
                                        {{ __("Right Anklebrachial Index") }}
                                    </p>
                                </div>
                                <div class="text-center">
                                    {{ details.RightAnklebrachialIndex ? formatDigit(+details.RightAnklebrachialIndex):'' }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/4 mb-6">
                            <div class="">
                                <div
                                    class="text-center "
                                >
                                    <p class="font-semibold">
                                        {{ __("Heigth") }}
                                    </p>
                                </div>
                                <div class="text-center">
                                    {{ details.Heigth }}
                                </div>
                            </div>
                        </div>
                         <div class="vx-col w-1/4 mb-6">
                            <div class="">
                                <div
                                    class="text-center "
                                >
                                    <p class="font-semibold">
                                        {{ __("Weigth") }}
                                    </p>
                                </div>
                                <div class="text-center">
                                    {{ details.Weigth }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/4 mb-6">
                            <div class="">
                                <div
                                    class="text-center "
                                >
                                    <p class="font-semibold">{{ __("Sex") }}</p>
                                </div>
                                <div class="text-center">
                                    {{ radioFormat("Sex") }}
                                </div>
                            </div>
                        </div>
                          <div class="vx-col w-1/4 mb-6">
                            <div class="">
                                <div
                                    class="text-center "
                                >
                                    <p class="font-semibold">
                                        {{ __("Smoker") }}
                                    </p>
                                </div>
                                <div class="text-center">
                                    {{ details.Smoker }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/4 mb-6">
                            <div class="">
                                <div
                                    class="text-center "
                                >
                                    <p class="font-semibold">
                                        {{ __("TBP") }}
                                    </p>
                                </div>
                                <div class="text-center">
                                    {{ details.TBP }}
                                </div>
                            </div>
                        </div>
                         <div class="vx-col w-1/4 mb-6">
                            <div class="">
                                <div
                                    class="text-center "
                                >
                                    <p class="font-semibold">{{ __("MI") }}</p>
                                </div>
                                <div class="text-center">
                                    {{ details.MI }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/4 mb-6">
                            <div class="">
                                <div
                                    class="text-center "
                                >
                                    <p class="font-semibold">
                                        {{ __("Diabetes") }}
                                    </p>
                                </div>
                                <div class="text-center">
                                    {{ details.Diabetes }}
                                </div>
                            </div>
                        </div>
                           <div class="vx-col w-1/4 mb-6">
                            <div class="">
                                <div
                                    class="text-center "
                                >
                                    <p class="font-semibold">{{ __("FH") }}</p>
                                </div>
                                <div class="text-center">
                                    {{ details.FH }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/4 mb-6">
                            <div class="">
                                <div
                                    class="text-center "
                                >
                                    <p class="font-semibold">
                                        {{ __("THL") }}
                                    </p>
                                </div>
                                <div class="text-center">
                                    {{ details.THL }}
                                </div>
                            </div>
                        </div>
                          <div class="vx-col w-1/4 mb-6">
                            <div class="">
                                <div
                                    class="text-center "
                                >
                                    <p class="font-semibold">
                                        {{ __("Created At") }}
                                    </p>
                                </div>
                                <div class="text-center">
                                    {{ dateFormat("created_at") }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/4 mb-6">
                            <div class="">
                                <div
                                    class="text-center "
                                >
                                    <p class="font-semibold">
                                        {{ __("Updated At") }}
                                    </p>
                                </div>
                                <div class="text-center">
                                    {{ dateFormat("updated_at") }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/4 mb-6">
                            <div class="">
                                <div
                                    class="text-center "
                                >
                                    <p class="font-semibold">
                                        {{ __("user") }}
                                    </p>
                                </div>
                                <div class="text-center">
                                    {{ details.user ? details.user.name:"" }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/4 mb-6">
                            <div class="">
                                <div
                                    class="text-center "
                                >
                                    <p class="font-semibold">
                                        {{ __("patient") }}
                                    </p>
                                </div>
                                <div class="text-center">
                                    {{ details.patient ? details.patient.name:"" }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                </vx-card>
                <vx-card title="Result">

                      <!-- <vs-row v-if="details.result && details.result.msg" style="padding:2rem">
              <vs-col vs-lg="12">
                  <h3 class="my-4">
                      <strong>
                          Atherosclerosis plaque progress:
                      </strong>
                  </h3>
                  <p>
                      	Risk of plaque progress with current risk factors  =  <strong>{{details.result.Risk1.toFixed(2)}}</strong> %  ({{details.result.msg}})
                  </p>
                  <p>
                      	Risk of plaque progress with optimal risk factors  = <strong>{{details.result.OMen.toFixed(2)}}</strong> %  (optimal risk)
                  </p>


              </vs-col>
              <vs-col vs-lg="12">
                  <h3 class="my-4">
                      <strong>
                          	MI and CVA risk assessment:
                      </strong>
                  </h3>
                  <p>
                      	Risk of MI and stroke with current risk factors  =  <strong>{{details.result.Risk2.toFixed(2)}}</strong> %  ({{details.result.msg2}})
                  </p>
                  <p>
                      	Risk of MI and stroke with optimal risk factors  = <strong>{{details.result.RSK1.toFixed(2)}}</strong> %  (optimal risk)
                  </p>
              </vs-col>
              <vs-col vs-lg="12">
                  <h3 class="my-4">
                      <strong>
                          Conclusion:
                      </strong>
                  </h3>
                  <p>
                      	The patient is {{details.result.msg}} for atherosclerosis plaque progress.
                  </p>
                  <p>
                      	The patient is {{details.result.msg2}} for MI and stroke event.
                  </p>


              </vs-col>
          </vs-row> -->
          <!-- <a target="_blank" style="font-size: 30px" rel="noopener"  v-if="details.result && details.result.link"  class="mr-3 mb-2 vs-component vs-button vs-button-success vs-button-filled download-btn"  :href="details.result.link" >
                    {{__("Export PDF")}}
            </a>
            <a target="_blank" style="font-size: 30px" rel="noopener"  v-if="details.result && details.result.word_link"  class="mr-3 mb-2 vs-component vs-button vs-button-success vs-button-filled download-btn"  :href="details.result.word_link" >
                    {{__("Export Word")}}
            </a> -->
                <div style="width:80%" v-if="userInfo.email == 'najafi@vcathlab.com' && details.result && details.result.link">
                    <vs-row>
                        <vs-col vs-lg="4" style="margin:2rem 0">
                            <p class="col-lg-3">Body and BP Triage:</p>
                        </vs-col>
                        <vs-col vs-lg="8" style="margin:2rem 0">
                            <a target="_blank" style="font-size: 12px" rel="noopener"   :key="downloadBtnKey" class="mr-2 mb-2 vs-component vs-button vs-button-success vs-button-filled download-btn" :href="details.result.links.bp_triage.link" >
                                                {{__("Export PDF")}}
                                        </a>
                            <a target="_blank" style="font-size: 12px" rel="noopener"  :key="downloadBtnKey" class="mr-2 mb-2 vs-component vs-button vs-button-success vs-button-filled download-btn" :href="details.result.links.bp_triage.word_link">
                                    {{__("Export Word")}}</a>
                        </vs-col>
                    </vs-row>
                    <vs-row>
                        <vs-col vs-lg="4" style="margin:2rem 0">
                            <p class="col-lg-3">PTP of CAD Results:</p>
                        </vs-col>
                        <vs-col vs-lg="8" style="margin:2rem 0">
                            <a target="_blank" style="font-size: 12px" rel="noopener"   :key="downloadBtnKey" class="mr-2 mb-2 vs-component vs-button vs-button-success vs-button-filled download-btn"  :href="details.result.links.ptp_cad.link">
                                                {{__("Export PDF")}}
                                        </a>
                            <a target="_blank" style="font-size: 12px" rel="noopener"  :key="downloadBtnKey" class="mr-2 mb-2 vs-component vs-button vs-button-success vs-button-filled download-btn" :href="details.result.links.ptp_cad.word_link">
                                    {{__("Export Word")}}</a>
                        </vs-col>
                    </vs-row>
                    <vs-row>
                        <vs-col vs-lg="4" style="margin:2rem 0">
                            <p class="col-lg-3">Total results:</p>
                        </vs-col>
                        <vs-col vs-lg="8" style="margin:2rem 0">
                            <a target="_blank" style="font-size: 12px" rel="noopener"   :key="downloadBtnKey" class="mr-2 mb-2 vs-component vs-button vs-button-success vs-button-filled download-btn" :href="details.result.link" >
                                                {{__("Export PDF")}}
                                        </a>
                            <a target="_blank" style="font-size: 12px" rel="noopener"  :key="downloadBtnKey" class="mr-2 mb-2 vs-component vs-button vs-button-success vs-button-filled download-btn" :href="details.result.word_link">
                                    {{__("Export Word")}}</a>
                        </vs-col>
                    </vs-row>
                </div>
                <div class="result" style="display: flex;justify-content: center;margin-top:1rem" v-else-if="userInfo.panel_type == 6 && details.result.link">
               <div class="examplex">
                        <vs-button class="btnx" type="filled" color="success">Ankle Brachial Index</vs-button>
                        <vs-dropdown vs-trigger-click >
                        <vs-button class="btn-drop" color="success" type="filled" icon="expand_more"></vs-button>
                        <!-- <a href="#">Hola mundo</a> -->

                        <vs-dropdown-menu>
                            <vs-dropdown-item>
                                                        <a style="font-size: 12px" rel="noopener"   :key="downloadBtnKey" class="" @click="download(details.result.links.bp_triage.link,'abi_clicked')" >
                                            {{__("Export PDF")}}
                                    </a>
                            </vs-dropdown-item>
                            <vs-dropdown-item>
                            <a  style="font-size: 12px" rel="noopener"  :key="downloadBtnKey" class="" @click="download(details.result.links.bp_triage.word_link,'abi_clicked')">
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
                                <a  style="font-size: 12px" rel="noopener"   :key="downloadBtnKey" class=""  @click="download(details.result.links.ptp_cad.link,'screening_test_clicked')" href="javascript:void(0)">
                                            {{__("Export PDF")}}
                                    </a>
                            </vs-dropdown-item>
                            <vs-dropdown-item>
                            <a  style="font-size: 12px" rel="noopener"  :key="downloadBtnKey" class="" @click="download(details.result.links.ptp_cad.word_link,'screening_test_clicked')" href="javascript:void(0)">
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
                            <a  style="font-size: 12px" rel="noopener"   :key="downloadBtnKey" href="javascript:void(0)" class=""  @click="()=>download(details.result.links.ClinicallikelihoodofCAD.link,'ptp_of_cad_clicked')">
                                            {{__("Export PDF")}}
                                    </a>
                            </vs-dropdown-item>
                            <vs-dropdown-item>
                            <a  style="font-size: 12px" rel="noopener"  :key="downloadBtnKey" href="javascript:void(0)" class="" @click="()=>download(details.result.links.ClinicallikelihoodofCAD.word_link,'ptp_of_cad_clicked')">
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
                            <a  style="font-size: 12px" rel="noopener"   :key="downloadBtnKey" class="" href="javascript:void(0)" @click="download(details.result.link,'total_clicked')">
                                            {{__("Export PDF")}}
                                    </a>
                            </vs-dropdown-item>
                            <vs-dropdown-item>
                            <a  style="font-size: 12px" rel="noopener"  :key="downloadBtnKey" class="" href="javascript:void(0)" @click="download(details.result.word_link,'total_clicked')">
                                {{__("Export Word")}}</a>
                            </vs-dropdown-item>

                        </vs-dropdown-menu>
                        </vs-dropdown>

                    </div>
         </div>
                <div v-else-if="details.result && details.result.link">
                    <a target="_blank" style="font-size: 30px" rel="noopener"  v-if="details.result && details.result.link" :key="downloadBtnKey" class="mr-3 mb-2 vs-component vs-button vs-button-success vs-button-filled download-btn"  href="javascript:void(0)" @click="download(details.result.link,'total_clicked')" >
                        {{__("Export PDF")}}
                    </a>
                    <a target="_blank" style="font-size: 30px" rel="noopener"  v-if="details.result && details.result.word_link" :key="downloadBtnKey" class="mr-3 mb-2 vs-component vs-button vs-button-success vs-button-filled download-btn"  :href="details.result.word_link" >
                            {{__("Export Word")}}
                    </a>
                </div>
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
        const userInfo = { ...this.$store.state.auth.userInfo };
        return {
            downloadBtnKey:1,
            userInfo: userInfo,
            details: {

                HbA1C: "",
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
                Sex: "",
                Smoker: "",
                TBP: "",
                MI: "",
                Diabetes: "",
                FH: "",
                THL: "",
                created_at: "",
                updated_at: "",
                user: "",
                patient: "",
                user: {},
                patient: {},
                result:{}
            },
            formTypes: {
                HbA1C: "text",
                LDL_cholesterol: "text",
                HDL_cholesterol: "text",
                Age: "text",
                SBP: "text",
                Triglycerides: "text",
                DBP: "text",
                LeftAnklebrachialIndex: "text",
                RightAnklebrachialIndex: "text",
                Heigth: "text",
                Weigth: "text",
                Sex: "text",
                Smoker: "text",
                TBP: "text",
                MI: "text",
                Diabetes: "text",
                FH: "text",
                THL: "text",
                created_at: "text",
                updated_at: "text",
                user: "text",
                patient: "text"
            },
            module: "User",
            model: "MaceAssesment"
        };
    },
    props: {
        //
    },
    computed: {
        Iracode() {
            return window.Iracode;
        }
    },
    methods: {
        async download(link,maceType){
        setTimeout(async()=>{
            try{
                const {data}=await this.$http.put("/user/api/mace_assesments/"+this.details.id,{[maceType]:1});
                console.log(data)

            }catch(e){
                console.log(e)
            }finally{
                location.href=link;
            }
        },500)
    },
        formatDigit(digit){
            +digit.toFixed(2)
        }
    },
    async created() {
        const { data: response } = await this.$http.get(
            `/user/api/mace_assesments/${this.$route.params.id}`
        );
        if (response.success) {
            const { data } = response;
            this.$store.dispatch("setCurrentResource", data);
            this.populateFormFields(data);
        }
        this.loading = false;
    },
    mounted() {
        //
    }
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

</style>
