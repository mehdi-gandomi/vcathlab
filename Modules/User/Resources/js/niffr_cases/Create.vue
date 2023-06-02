<template>

    <div class="mb-base niffr-create">


            <vx-card class="form">
                <h5 style="color:#494aa6" class="mb-4">Patient Information</h5>
               <form >
                                    <vs-row vs-type="flex" vs-w="12" class="mb-6 m-0">
                                        <vs-col vs-type="flex"  vs-align="center" vs-lg="3" vs-sm="6" vs-xs="12">
                                             <div class="flex mr-5 text-left">
                                                     <span>{{ __("Name") }}</span>
                                                    <span class="ml-1 text-red">*</span>
                                                </div>
                                                <component
                                                        :is="inputs.name.type"
                                                        v-model="form.name"
                                                        class="w-full"
                                                        :danger="hasValidationError('name')"
                                                        :danger-text="validationError('name')"
                                                        name="name"
                                                        type="text"
                                                    />
                                        </vs-col>
                                             <vs-col  vs-type="flex" vs-align="center" vs-lg="3" vs-sm="6" vs-xs="12">
                                                <div  class="flex mr-5 text-left">
                                                      <span>{{ __("Hospital") }}</span>
                                                    <span class="ml-1 text-red">*</span>
                                                </div>


                                                    <component
                                                        :is="inputs.hospital.type"
                                                        v-model="form.hospital"
                                                        class="w-full"
                                                        :danger="hasValidationError('hospital')"
                                                        :danger-text="validationError('hospital')"
                                                        name="hospital"
                                                        type="text"
                                                    />

                                        </vs-col>
                                        <vs-col  vs-type="flex" vs-align="center" vs-lg="2" vs-sm="6" vs-xs="6">
                                               <div class="flex mr-5 text-left">
                                                   <span>{{ __("Age") }}</span>
                                                    <span class="ml-1 text-red">*</span>
                                                </div>


                                                    <component
                                                        :is="inputs.age.type"
                                                        v-model="form.age"
                                                        class="w-full"
                                                        :danger="hasValidationError('age')"
                                                        :danger-text="validationError('age')"
                                                        name="age"
                                                        type="number"
                                                    />

                                        </vs-col>
                                        <vs-col  vs-type="flex" vs-align="center" vs-lg="2" vs-sm="6" vs-xs="6">
                                            <div class="flex mr-5 text-left ">
                                                       <span>{{ __("Physician") }}</span>
                                                    <span class="ml-1 text-red">*</span>
                                                </div>


                                                    <component
                                                        :is="inputs.physician.type"
                                                        v-model="form.physician"
                                                        class="w-full"
                                                        :danger="hasValidationError('physician')"
                                                        :danger-text="validationError('physician')"
                                                        name="physician"
                                                        type="text"
                                                    />

                                        </vs-col>
                                         <vs-col  vs-type="flex" vs-align="center" style="flex-direction: column;justify-content: center;" vs-lg="2" vs-sm="6" vs-xs="12">
                                                <!-- <div class="flex mr-5 text-left mb-3">
                                                  <span>{{ __("Sex") }}</span>
                                                    <span class="ml-1 text-red">*</span>
                                                </div> -->


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

                </form>
                <vs-row id="mobile-row" vs-type="flex" vs-w="12" class="my-6">


                        <vs-col  vs-lg="8" vs-sm="12" vs-xs="12">
                            <h5 style="color:#494aa6" class="mb-4">Select Stenosis Spot of 3D Coronary</h5>
                            <model-viewer
                            id="model"
                            ref="modelViewer"
                            style="width: 100%; height: 500px;background:rgb(180 169 169)"
                            camera-change="onCameraChange"
                            src="/glb35.glb"
                            alt="A 3D model of an astronaut"
                            camera-controls

                            >
                            <!-- @click="event=>changePivotpoint(event)" -->
                                <points v-if="showPoints" :key="pointsKey" :pointsForm="points" @pointClicked="onPointClicked" />
                            </model-viewer>
                            <vs-button class="mt-4" id="desktop-calc" style="width:100%" @click="saveNiffr" color="success" size="large" type="filled">Calculate</vs-button>
                        </vs-col>
                        <vs-col  vs-lg="4" vs-sm="12" vs-xs="12">
                            <form action="">
    <div>
                                    <div class="flex justify-between items-center my-8">
                                        <h6 style="color:#494aa6;font-size:1.2rem"  for="">{{__("Angiography Device Frame Number")}}</h6>
                                    </div>
                                    <div class="flex">
                                        <vs-radio style="margin:0 0.5rem" v-model="frame_number" vs-name="radios1" :vs-value="7.5">7.5 Frame/s</vs-radio>
                                        <vs-radio style="margin:0 0.5rem" v-model="frame_number" vs-name="radios1" :vs-value="15">15 Frame/s</vs-radio>
                                    </div>
                                </div>
                                <div class="my-8">
                                    <h6 style="color:#494aa6;font-size:1.2rem" class="mb-4 ">TIMI Frame Count:</h6>
                                </div>
                                <!-- <div class="heart-rate-gif">
                                    <img style="width:100%" :src="this.url('vendor/user/img/heart-rate.gif')" alt="">
                                </div> -->
                                <vs-row style="display:flex" class="pt-1">
                                    <vs-col vs-lg="2" class="flex justify-between items-center">
                                        <h6 class="mr-4" for="">{{__("TFC")}}</h6>
                                    </vs-col>
                                    <vs-col vs-lg="4" class="TFC">
                                        <vs-input  type="number" v-model="tfc"  class="my-2 w-full"/>
                                    </vs-col>
                                    <vs-col vs-lg="6" class="flex align-items-center" >
                                        <p>Frame </p>
                                    </vs-col>

                                </vs-row>
                                <div class="my-8">
                                    <h6 style="color:#494aa6;font-size:1.2rem" class="mb-4 my-4">Mean Artery Pressure:</h6>
                                </div>
                                <vs-row style="display:flex;align-items:center" class="mt-2">
                                    <h6 class="mx-2" style="width:10%"  for="">{{__("DBP")}}</h6>
                                    <vs-input style="width:25%" type="number" @input="value=>updatePressureValue('dbp',value)" :value="pressureForm.dbp"  class="my-2" />
                                        <p class="mx-2" style="font-size:12px;width:50%">mmHg, Diastolic Pressure  </p>

                                </vs-row>

                                <vs-row style="display:flex;align-items:center">
                                    <h6 class="mx-2" style="width:10%"  for="">{{__("SBP")}}</h6>
                                    <vs-input style="width:25%" type="number" @input="value=>updatePressureValue('sbp',value)" :value="pressureForm.sbp"  class="my-2 " />
                                    <p class="mx-2" style="font-size:12px;width:50%">mmHg, Systolic Pressure  </p>

                                </vs-row>

                                <vs-row style="display:flex;align-items:center">
                                    <h6 class="mx-2" style="width:10%"  for="">{{__("HR")}}</h6>
                                    <vs-input style="width:25%" type="number" @input="value=>updatePressureValue('hr',value)" :value="pressureForm.hr"  class="my-2 " />
                                    <p class="mx-2" style="font-size:12px;width:50%">beat/s Heart Rate  </p>
                                </vs-row>

                                <vs-row style="display:flex;align-items:center">
                                    <h6 class="mx-2" style="width:10%"  for="">{{__("MAP")}}</h6>
                                    <vs-input style="width:25%" type="number" readonly :value="pressureForm.pressure"  class="my-2 " />
                                    <p class="mx-2" style="font-size:12px;width:50%">mmHg,  </p>
                                </vs-row>
                                <h6 style="color:#494aa6;font-size:1.2rem" class="mb-4 my-4">Distal Length:</h6>
                                <vs-row style="display:flex;align-items:center">
                                    <h6 class="mx-2" style="width:10%"  for="">{{__("DL")}}</h6>
                                    <vs-input style="width:25%" type="number"  v-model="ld"  class="my-2 " />
                                    <p class="mx-2" style="font-size:12px;width:50%">mm Distal Length </p>

                                </vs-row>


                            </form>
                            <vs-button class="mt-4" id="mobile-calc" style="width:100%" @click="saveNiffr" color="success" size="large" type="filled">Calculate</vs-button>
                        </vs-col>
                </vs-row>

            </vx-card>

          <vs-popup class="holamundo"  title="IMPORTANT INFORMATION" :active.sync="noticePopupOpen" >
              <img style="max-width:100%" :src="url('assets/img/niffr.png')" alt="">
              <h4 class="text-center my-4">
                  IMPORTANT INFORMATION
              </h4>
              <p>
                  The Functional SYNTAX Score (based on non-invasive fractional flow reserved (NiFFR)) is a tool developed in connection with the SYNTAX Trial, a trial comparing PCI and Cardiac Surgery in complex, high-risk LM and/or 3VD patients. By combining anatomic and clinical prognostic variables, the Functional SYNTAX score (based on (NiFFR)) creates accurate mortality predictions to guide the choice between PCI and CABG for patients with multivessel coronary disease. The Functional SYNTAX score calculator provides the doctor with an individual, patient-oriented treatment recommendation based on the mortality risk. This tool was validated in different registries and randomized trials. It has also been the basis for the ongoing SYNTAX II trial and is currently being tested on a non-invasive MSCT approach in the SYNTAX III REVOLUTION study.
              </p>
              <vs-checkbox class="my-4" v-model="niffer_tos">Yes, I have fully read the Important Information above.</vs-checkbox>
              <vs-button @click="submitTos" color="success" type="filled">Save</vs-button>
          </vs-popup>
           <vs-popup @close="onClose" class="holamundo point-popup"  :title="selectedPoint ? selectedPoint.label:''" :active.sync="pointInputPopupActive" >

                <form action="" v-if="selectedPoint.name && points[selectedPoint.name]">
                    <vs-row>
                        <vs-col vs-lg="2" class="flex align-items-center">
                            <p style="font-weight:bold">Dp(mm)</p>
                        </vs-col>
                        <vs-col vs-lg="5">
                            <vs-input  style="width:100%" type="number" @input="value=>updatePoint('dp',value)" :value="points[selectedPoint.name].values.dp"  class="my-2" />
                        </vs-col>
                        <vs-col vs-lg="5" class="flex align-items-center">
                            <p style="font-weight:bold">Proximal Diameter </p>
                        </vs-col>
                        <strong class="validation-error" v-if="pointsErrors[selectedPoint.name] && pointsErrors[selectedPoint.name]['dp']">
                            {{pointsErrors[selectedPoint.name]['dp']}}
                        </strong>
                    </vs-row>
                     <vs-row>
                        <vs-col vs-lg="2" class="flex align-items-center">
                            <p style="font-weight:bold">Ds(mm)</p>
                        </vs-col>
                        <vs-col vs-lg="5">
                            <vs-input style="width:100%" type="number" @input="value=>updatePoint('ds',value)" :value="points[selectedPoint.name].values.ds"  class="my-2" />
                        </vs-col>
                        <vs-col vs-lg="5" class="flex align-items-center">
                            <p style="font-weight:bold">Diameter Stenosis  </p>
                        </vs-col>

                        <strong class="validation-error" v-if="pointsErrors[selectedPoint.name] && pointsErrors[selectedPoint.name]['ds']">
                            {{pointsErrors[selectedPoint.name]['ds']}}
                        </strong>
                    </vs-row>
                     <vs-row>
                        <vs-col vs-lg="2" class="flex align-items-center">
                            <p style="font-weight:bold">Dd(mm)</p>
                        </vs-col>
                        <vs-col vs-lg="5">
                            <vs-input style="width:100%" type="number" @input="value=>updatePoint('dd',value)" :value="points[selectedPoint.name].values.dd"  class="my-2" />
                        </vs-col>
                        <vs-col vs-lg="5" class="flex align-items-center">
                            <p style="font-weight:bold">Distal Diameter  </p>
                        </vs-col>

                        <strong class="validation-error" v-if="pointsErrors[selectedPoint.name] && pointsErrors[selectedPoint.name]['dd']">
                            {{pointsErrors[selectedPoint.name]['dd']}}
                        </strong>
                    </vs-row>
                    <vs-row>
                        <vs-col vs-lg="2" class="flex align-items-center">
                            <p style="font-weight:bold">LL(mm)</p>
                        </vs-col>
                        <vs-col vs-lg="5">
                            <vs-input style="width:100%" type="number" @input="value=>updatePoint('ll',value)" :value="points[selectedPoint.name].values.ll"  class="my-2" />
                        </vs-col>
                        <vs-col vs-lg="5" class="flex align-items-center">
                            <p style="font-weight:bold">Lesion Length  </p>
                        </vs-col>

                        <strong class="validation-error" v-if="pointsErrors[selectedPoint.name] && pointsErrors[selectedPoint.name]['ll']">
                            {{pointsErrors[selectedPoint.name]['ll']}}
                        </strong>
                    </vs-row>


                    <vs-button style="width:100%;margin-top:1rem" @click="savePoint" color="success" type="filled">Save</vs-button>
                </form>
          </vs-popup>
          <vs-popup   class="holamundo result-popup"  title="Result" :active.sync="resultPopupActive">
                <div class="loading-wrap" v-if="isLoading">
                    <img style="width:150px" src="/images/loader.gif" alt="">
                </div>
                <div v-else>
                    <div v-if="Object.keys(points).length > 0 && resultPopupActive">
                        <div v-for="(point,key) in points" :key="key">
                        <div v-if="point.done">
                                <h4>{{point.name.replace("_"," ")}}</h4>

                                <point-table :ctCaseResults="ctCaseResults" :point="point"/>

                                <hr>
                        </div>
                        </div>

                    </div>
                    <div v-else>
                        <h4>You did not select any vessel</h4>
                    </div>
                </div>
          </vs-popup>
          <!-- <create-patient-modal :show="showCreatePatientModal" @created="patient=>onPatientCreated(patient)" /> -->
    </div>
</template>

<script>
import Form from "@/Form";
import HasForm from "@/mixins/HasForm";
import Points from './Points.vue'
import all_points from './all_points'
import PointTable from './PointTable'
// import CreatePatientModal from '../components/CreatePatientModal.vue'
export default {
    components: {Points,PointTable},
    mixins: [HasForm],
    data() {
        const lang=this.$i18n;
        const user={...this.$store.state.auth.userInfo};
        const data= {
            ld:"",
            form: {
                file: "",
                patient_id: "",
                physician:"",
                 name: "",
                age: "",
                sex: "1",
                hospital: user.name
            },
            createdCase:null,
            isLoading:false,
            showPoints:false,
            points:{

            },
            niffr_case_id:"",
            ctCaseResults:{},
            resultPopupActive:false,
            showCreatePatientModal:false,
            tfc:"",
            pressureForm:{
                dbp:"",
                sbp:"",
                hr:"",
                // ld:"",
                pressure:""
            },
            patient:{},
            patients:[],
            pointsErrors:{},
            selectedPoint:{},
            pointInputPopupActive:false,
            niffer_tos:false,
            pointsKey:0,
            noticePopupOpen:false,
            model: "Modules\\User\\Models\\NIFFRCase",
            locale: lang.locale,
            frame_number:7.5,
            inputs: {
                name: {
                    type: "vs-input"
                },
                physician:{
                    type: "vs-input"
                },
                age: {
                    type: "vs-input"
                },
                sex: {
                    type: "vs-radio"
                },
                hospital: {
                    type: "vs-input"
                },
                file: {
                    type: "vs-input"
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
        return data;
    },
    props: {
        //
    },
    computed: {
        //
    },
    async created() {

        await this.getPatients();
        const nifferTos=localStorage.getItem("niffer_tos");
        this.niffer_tos=!!nifferTos;
        this.noticePopupOpen=!this.niffer_tos;

        // Iracode.$on("saveNiffr",async()=>{
        //     this.calculateAll();
        //     Iracode.loading();
        //     try{
        //         const {data}=await this.$http.post(this.url("user/api/niffr_cases"),{
        //             points:this.points,
        //             patient_id:this.patient.id
        //         })
        //         if(data.success){
        //             Iracode.success(data.message)
        //             Iracode.close_loading();
        //             return this.resultPopupActive=true;
        //         }

        //         Iracode.error(data.message)
        //     }catch(e){
        //         Iracode.error(data.message)
        //     }finally{
        //         Iracode.close_loading();
        //     }
        // })
    },
    beforeMount() {
      let modelViewerScript = document.createElement('script')
      modelViewerScript.setAttribute('src', this.url("vendor/user/js/model-viewer.min.js"))
      modelViewerScript.setAttribute('type', 'module')
      document.head.appendChild(modelViewerScript)
    //   scene-graph-ready

    },
    mounted() {

        if(this.$refs['modelViewer']){
            this.$refs['modelViewer'].addEventListener("load", (e) => {
                this.showPoints=true
            });
        }
    },
    methods: {
        submitTos(){
            if(!this.niffer_tos){
                return;
            }
            localStorage.setItem("niffer_tos",this.niffer_tos)
            this.noticePopupOpen=false
        },
        async exportAsWord(name){
            const point=this.ctCaseResults[name];
            if(!point.result_file) return;
            this.$vs.loading();
            const {data:blob}=await this.$http.get(this.url(point.result_file),{
                responseType: 'blob', // important
            })

             // Create an object URL for the blob object
            const url = URL.createObjectURL(blob);

            // Create a new anchor element
            const a = document.createElement('a');

            // Set the href and download attributes for the anchor element
            // You can optionally set other attributes like `title`, etc
            // Especially, if the anchor element will be attached to the DOM
            a.href = url;

            a.download = Iracode.basename(point.result_file);

            // Click handler that releases the object URL after the element has been clicked
            // This is required for one-off downloads of the blob content
            const clickHandler = (e) => {
                console.log(e)
                setTimeout(() => {
                URL.revokeObjectURL(url);
                // this.removeEventListener('click', clickHandler);
                this.$vs.loading.close()
                }, 150);
            };

            // Add the click event listener on the anchor element
            // Comment out this line if you don't want a one-off download of the blob content
            a.addEventListener('click', clickHandler, false);

            // Programmatically trigger a click on the anchor element
            // Useful if you want the download to happen automatically
            // Without attaching the anchor element to the DOM
            // Comment out this line if you don't want an automatic download of the blob content
            a.click();

            // Return the anchor element
            // Useful if you want a reference to the element
            // in order to attach it to the DOM or use it in some other way
            return a;
        },
        async saveNiffr(){
            this.resultPopupActive=true;
            this.isLoading=true;
            // Iracode.loading();
            const {data:patient} = await this.$http.post("/user/api/patients",this.form);

            this.calculateAll();
            // if(!this.patient.id) {
            //     return Iracode.error(this.__("You have to specify a patient"))
            // }
            console.log("patient",patient)
            try{

                const {data}=await this.$http.post(this.url("user/api/niffr_cases"),{
                        points:this.points,
                        patient_id:patient.data.id,
                        map:this.pressureForm.pressure,
                        physician:this.form.physician,
                        niffr_case_id:this.niffr_case_id
                        // result:this.points
                    })
                if(data.success){
                    Iracode.success(data.message)
                    // Iracode.close_loading();
                    this.ctCaseResults=data.data.points;
                    this.niffr_case_id=data.data.case.id;
                    return this.isLoading=false;
                }

                Iracode.error(data.message)
            }catch(e){
                if(e.response){
                    Iracode.error(e.response.data.message)
                }
            }finally{
                // Iracode.close_loading();
            }
        },
        renderStatus(point){
            let status = "Non-Significant";
            console.log(point)
            if (point.ffr < 0.8)
            {
                status = "Significant";
            }
            return status;
        },
        async onPatientCreated(patient){

            this.showCreatePatientModal=false;
            await this.getPatients();
            this.patient=patient;
        },
        async getPatients(){
            const {data}=await this.$http.get("/user/api/patients");
            this.patients=data.data.items;
        },
        async calculateAll(){
            if(!this.pressureForm.pressure){
                return Iracode.error(this.__("You have to specify parameters needed for MAP"))
            }

            for(const key in this.points){
                this.calculate(key,this.points[key]);
            }

        },
        calculate(key,point){

            const PI = 3.141592;
            const MAP=parseFloat(this.pressureForm.pressure) * 133.3;
            const SBP=parseFloat(this.pressureForm.sbp);
            const HR=parseFloat(this.pressureForm.hr);


                let Ds = parseFloat(point.values.ds);
                let Dp = parseFloat(point.values.dp);
                let Dd = parseFloat(point.values.dd);
                let Ll = parseFloat(point.values.ll);
                let Ld = parseFloat(this.ld);

                let Ls=Ll;
                const Lp =0;
                let TFC=parseFloat(this.tfc);
                let TTFC=TFC;
                // Ds = ((2 * Ds1) + Ds2) / 3;

                Ds = Ds * (1e-3);
                Dp = Dp * (1e-3);
                Dd = Dd * (1e-3);
                Ls = Ls * (1e-3);
                Ld=Ld * (1e-3);
                // Calculation of Mean of Diameter:
                const Dm = ((2*Dp) + Dd) / 3;

                // Calulation of Area:
                const As = (PI / 4) * Math.pow(Ds, 2);
                const Ad = (PI / 4) * Math.pow(Dd, 2);
                const Ap = (PI / 4) * Math.pow(Dp, 2);
                const Am = (PI / 4) * Math.pow(Dm, 2);


                const rAPV = 0.0009 * SBP * HR + 5.925;
                let Lenght = 150 * (1e-3);
                let CFR = 2;
                const Age=this.form.age;
                console.log(point,"point")
                if (point.vessel == "LAD" || point.vessel == "DIAGONAL 2" || point.vessel == "Dig" )
                {
                    Lenght = 160 * (1e-3);
                    CFR = Math.pow(10, 1.16 - 0.48 * Math.log10(rAPV) - 0.0025 * Age);

                    if (TFC < 14)
                    {
                        TFC = 14;
                    }
                    if(TTFC < 7.5){
                        TTFC=7.5;
                    }
                }else if (point.vessel == "LCX" || point.vessel == "OM1" || point.vessel == "OM2" )
                {
                    Lenght = 120 * (1e-3);
                    CFR = Math.pow(10, 1.14 - 0.45 * Math.log10(rAPV) - 0.0031 * Age);
                    if (TFC < 9)
                    {
                        TFC = 9;
                    }
                    if(TTFC < 6){
                        TTFC=6;
                    }
                }else if (point.vessel == "RCA" || point.vessel == "PDA" || point.vessel == "PLV")
                {
                    Lenght = 107 * (1e-3);
                    CFR = Math.pow(10, 1.15 - 0.50 * Math.log10(rAPV) - 0.0021 * Age);
                    if (TFC < 9)
                    {
                        TFC = 9;
                    }
                    if(TTFC < 6){
                        TTFC=6;
                    }
                }


                let AFDN = 15;
                AFDN=this.frame_number;
                console.log(AFDN)
                // if (radioButton2.Checked)
                // {
                //     AFDN = 15.0;
                // }

                // else if (radioButton3.Checked)
                // {
                //     AFDN = 25.0;
                // }

                // else if (radioButton7.Checked)
                // {
                //     AFDN = 30.0;
                // }

                // Caliculation of Mean of Velocity (Vm):
                let Vm;
                if(AFDN == 7.5){
                    Vm=(Lenght * AFDN) / TTFC;
                }else if(AFDN == 15){
                    Vm=(Lenght * AFDN) / TFC;
                }

                // Caliculation of Flow of the rest state (Qr):
                const Qr = Vm * Am;

                // Total Coronary Resistance Index (TCRI)
                const TCRI = 0.21;
                // Caliculation of Flow of the hyperemia state (Qh):
                const Qh = Qr / TCRI;

                const Density = 1060;
                const Viscosity = 0.0035;

                // debugger;
                // Calculation of Pressure Drop of hypermia state:
                const DeltaPh_eddy = Density * Math.pow(Qh, 2) * Math.pow(((1 / As) - (1 / Am)), 2) / 2;
                const DeltaPh_proxim = 8 * PI * Viscosity * Lp * Qh / Math.pow(Ap, 2);
                const DeltaPh_distal = 8 * PI * Viscosity * Ld * Qh / Math.pow(Ad, 2);
                const DeltaPh_stenos = 8 * PI * Viscosity * Ls * Qh / Math.pow(As, 2);

                const DeltaPh = (DeltaPh_eddy + DeltaPh_proxim + DeltaPh_distal + DeltaPh_stenos);
                // Calculation of Pressure Drop of rest state:
                const DeltaPrs = Density * Math.pow(Qr, 2) * Math.pow(((1 / As) - (1 / Am)), 2) / 2;
                const DeltaPrr = 8 * PI * Viscosity * Ls * Qr / Math.pow(Am, 2);
                const DeltaPr  = DeltaPrs + DeltaPrr;
                // Calculation of Fractional Flow Reserved (FFR):
                let FFR = (12888.777 - DeltaPh) / 12888.777;
                if (FFR > 0.40 & FFR < 0.75)
                {
                    FFR = 0.2817*FFR + 0.547
                }
                if (FFR < 0.40)
                {
                    FFR = 0.65
                }

                // Calculation of Wall Shear Stress (WSS):
                const WSS = 4 * Viscosity * Qr / (PI * (Math.pow(Ds / 2, 3)));

                const Dss=((Dm - Ds)/Dm)*100;
                const Ass=((Math.pow(Dm,2) - Math.pow(Ds,2))/Math.pow(Dm,2))*100;
                const GP=(MAP - DeltaPh)/133.3;

                // Calculation of Index of Microvascular Resistance:
                const IMR = ((MAP - DeltaPh) / Qh)*((1e-6) /133.3);
// debugger;
                this.points[point.name].ffr=FFR.toFixed(2);
                this.points[point.name].wss=WSS.toFixed(2);
                this.points[point.name].imr=IMR.toFixed(2);
                this.points[point.name].dss=Dss.toFixed(2);
                this.points[point.name].ass=Ass.toFixed(2);
                this.points[point.name].gp=GP.toFixed(2);




        },
        updatePressureValue(type,value){
            this.pressureForm[type]=value;
            let isDone=true;
            for(const key in this.pressureForm){
                if(!this.pressureForm[key] && key!="pressure"){
                    isDone=false;
                    break;
                }
            }
            console.log(this.pressureForm)
            if(isDone){
                // Calculation of Mean Artery Pressure:
                const map= parseFloat(this.pressureForm.dbp) + ((0.3333) + parseFloat(this.pressureForm.hr) * (0.0012)) * (parseFloat(this.pressureForm.sbp) - parseFloat(this.pressureForm.dbp));
                 // Calculation of Mean Artery Pressure:
                this.pressureForm.pressure=map.toFixed(2);
            }
        },
        onClose(){
            let hasError=false;
            if(this.points[this.selectedPoint.name]){
                for(const key in this.points[this.selectedPoint.name]){
                    if(!this.points[this.selectedPoint.name]['values'][key]) {
                        hasError=true;
                        break;
                    }
                }
            }
            console.log(hasError)
            if(hasError) delete this.points[this.selectedPoint.name];
        },
        isPointCompleted(point){
            // return Object.keys(this.points).length == 30;
            return true;
        },
        changePivotpoint(event) {
            var oX = event.offsetX;
            var oY = event.offsetY;
            console.log(oX,oY)
            var model = this.$refs['modelViewer'];
            var posandnormal = model.positionAndNormalFromPoint(oX,oY);
            if (posandnormal != null) {
                var position = posandnormal.position
                var normal = posandnormal.normal;
                var strPosition = position.x + " " + position.y + " " + position.z;
                var cameraTarget = position.x + "m " + position.y + "m " + position.z + "m";
                var strNormal = normal.x + " " + normal.y + " " + normal.z;
                // var strPosandnormal = JSON.stringify(posandnormal);
                // model.updateHotspot({"name": "hotspot-pivotpoint", "position": strPosition, "normal": strNormal});
                model.cameraTarget = cameraTarget;
                // document.getElementById("pivotpoint").style.display = "block";
            }
            elsex
            {
                model.cameraTarget = cameraTarget;
                // document.getElementById("pivotpoint").style.display = "none";
            }
            },
        showLabel(point){
            console.log(point)
            alert(point.label)
        },
        getPatientName(op){
        return op.name;
    },
        savePoint(){
            let hasError=false;
            for(const key in this.points[this.selectedPoint.name]['values']){
                console.log(key)
                if(!this.points[this.selectedPoint.name]['values'][key]) {
                    if(!this.pointsErrors[this.selectedPoint.name]){
                        this.pointsErrors[this.selectedPoint.name]={};
                    }
                    this.pointsErrors[this.selectedPoint.name][key]=`${key} should not be empty`;
                    hasError=true;
                    break;
                }
            }
    console.log(hasError)
            if(!hasError){
                this.points[this.selectedPoint.name].done=true;
                this.pointInputPopupActive=false;
                this.pointsKey++;
            }
            this.$forceUpdate()
            // document.querySelector(`[data-name=${this.selectedPoint.name}]`).classList.add("done")
        },
        updatePoint(point,value){
            this.points[this.selectedPoint.name]['values'][point]=value;
            if(this.pointsErrors[this.selectedPoint.name]){
                this.pointsErrors[this.selectedPoint.name][point]="";
            }
            this.$forceUpdate();
        },
        onPointClicked(point){
            this.selectedPoint=point;
            if(!this.points[point.name]){
                this.points[point.name]={
                    done:false,
                    ffr:"",
                    wss:"",
                    imr:"",
                    dss:"",
                    ass:"",
                    gp:"",
                    name:point.name,
                    vessel:point.vessel,
                    region:point.region,
                    values:{
                        dp:"",
                        ds:"",
                        dd:"",
                        ll:""
                    }
                }
            }
            this.pointInputPopupActive=true;
        },

        async onSubmit(action) {
            // const data = await this.form.post("/user/api/niffr_cases");
            // if (data.success) {
            //     Iracode.success(this.__("Niffrcase Created Successfully"));
            //     if (action == "close")
            //         this.$router.push("/user/niffr_cases");
            //     else this.form.reset();
            // }
        }
    }
};
</script>
<style >

      .point-popup .vs-popup{
          width: 400px !important;
      }
      .validation-error{
          font-size: 0.8rem;
          padding-left: 0.5rem;
      }
    .v-nav-menu:fullscreen{
        display: none !important;
    }
    .loading-wrap{
        position: absolute;
        z-index: 999;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);

    }
    .result-popup .vs-popup{
        min-height:250px
    }
    #mobile-calc{
            display: none;
        }
    @media(max-width:768px){
        #desktop-calc{
            display: none;
        }
        #mobile-calc{
            display: block;
        }
        #mobile-row{
            width: 115% !important;
        }
    }
</style>

