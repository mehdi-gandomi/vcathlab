<template>
    <div class="mb-base">
        <vx-card>
            <h2 style="text-align: center;padding: 2rem;border: 1px solid #000;">Ambulatory Blood Pressure Monitoring</h2>

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
                    <vs-row vs-type="flex" vs-w="12" class="mb-6 m-0">
                                <vs-col vs-type="flex" vs-align="center" vs-lg="4" vs-sm="4" vs-xs="12">
                                    <div class="flex text-left">
                                        <span>{{ __("Weight") }}</span>
                                        <span class="ml-1 text-red">*</span>
                                    </div>


                                    <div class="flex" style="align-items:center">
                                        <component :is="inputs.Weight.type" v-model="form.weight"
                                            style="width:100px;margin-left:1rem" :danger="hasValidationError('weight')"
                                            :danger-text="validationError('weight')" name="weight" type="text" />
                                        <span class="ml-2">
                                            kg
                                        </span>
                                    </div>
                                </vs-col>
                                <vs-col vs-type="flex" vs-align="center" vs-lg="4" vs-sm="4" vs-xs="12">
                                    <div class="flex text-left">
                                        <span>{{ __("Height") }}</span>
                                        <span class="ml-1 text-red">*</span>
                                    </div>


                                    <div class="flex" style="align-items:center">
                                        <component :is="inputs.Height.type" v-model="form.height"
                                            style="width:100px;margin-left:1rem" :danger="hasValidationError('height')"
                                            :danger-text="validationError('height')" name="Height" type="text" />
                                        <span class="ml-2">
                                            cm
                                        </span>
                                    </div>
                                </vs-col>
                                   <vs-col vs-type="flex" vs-align="center" vs-lg="4" vs-sm="4" vs-xs="12">
                                    <div class="flex text-left">
                                        <span>{{ __("Time") }}</span>
                                        <span class="ml-1 text-red">*</span>
                                    </div>


                                    <div class="flex" style="align-items:center">
                                        <component placeholder="For EX: 16:30" :is="inputs.Time.type" v-model="form.time"
                                            style="width:100px;margin-left:1rem" :danger="hasValidationError('time')"
                                            :danger-text="validationError('time')" name="time" type="text" />

                                    </div>
                                </vs-col>
                            </vs-row>
                </div>
                <div class="table-wrap container">
                    <vs-table stripe :key="tableKey" noDataText="">

                        <template slot="thead">
                                  <vs-th>
                            Time
                            </vs-th>
                            <vs-th>
                            SYS
                            </vs-th>
                            <vs-th>
                            DIA
                            </vs-th>
                            <vs-th>
                            HR
                            </vs-th>

                        </template>

                        <template >
                            <vs-tr :key="indextr" v-for="(tr, indextr) in 48" >
                                       <vs-td >
                                <vs-input v-model="form.times[indextr]"  />
                            </vs-td>
                            <vs-td >
                                <vs-input v-model="form.sys[indextr]" @paste="(e)=>onPaste('sys',indextr,e)" />
                            </vs-td>

                            <vs-td >
                                <vs-input v-model="form.dia[indextr]" @paste="(e)=>onPaste('dia',indextr,e)" />
                            </vs-td>

                            <vs-td >
                                <vs-input v-model="form.hr[indextr]"  @paste="(e)=>onPaste('hr',indextr,e)"/>
                            </vs-td>
                            </vs-tr>
                        </template>
                        </vs-table>
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
import moment from '@node_modules/jalali-moment'
export default {
    components: {},
    mixins: [HasForm],
    data() {
        return {
            tableKey:0,
            form: {
                patient_id: 0,
                dia:[],
                hr:[],
                sys:[],
                times:[],
                Age: "",
                Sex: 1,
                height: 180,
                weight: 80,
                time:""
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
                     Time: {
                    type: "vs-input"
                },
                Height: {
                    type: "vs-input"
                },
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

    },
    created() {

        console.log(ranges)
        for(let index=0;index < 48;index++){
            this.form.dia[index]="";
            this.form.sys[index]="";
            this.form.hr[index]="";
        }
    },
    watch:{
        "form.time"(){
            const regex = /^([0-1]?[0-9]|2[0-3]):[0-5][0-9]$/gm;
            if(!regex.test(this.form.time)) return;
            const timeArr=this.form.time.split(":")
            let now=moment()
            // now=now.set(timeArr[0],"hour")

            // now=now.set(timeArr[1],"minute")
            now=now.set({
            'hour' : timeArr[0],
            'minute'  : timeArr[1]
            })
            console.log(timeArr,now.format("H:mm"))
            const ranges=[
                now.format("H:mm")
            ];
            for(let i=1;i<48;i++){
                ranges.push(now.add(30,'minute').format("H:mm"))
            }
            this.form.times=ranges
        }
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
            patientForm.weight=this.form.weight;
            patientForm.height=this.form.height;
            patientForm.hospital="";
            Iracode.loading();
            const {data:patient} = await this.$http.post("/user/api/patients",patientForm);
            this.patientResult=patient;

            this.form.patient_id=patient.data.id;

            const {data}=await this.$http.post("/user/api/abpm_calculations",this.form);
            Iracode.close_loading();

            console.log(data)
            location.href="/user/abpm/result/"+data.data.id;
        },
        onPaste(row,index,e){
            e.preventDefault(); // do not paste the contents into the first cell ...
            // convert TSV from clipboard into a 2D array:
            let vals=e.clipboardData.getData('text').trim().split(/\r?\n */).map(r=>r.split(/\t/));

            if(vals.length > 1){
                console.log(vals)
                for(let key=0;key < 48;key++){
                    if(vals[key] != undefined){
                        if(row == 'dia'){
                            this.form[row][key]=(vals[key][0] > 100 ? 85:vals[key][0])
                        }else{
                            this.form[row][key]=vals[key][0]
                        }
                    }
                }
                this.tableKey++;
            }else{
                this.form[row][index]=e.clipboardData.getData('text').trim();
                this.tableKey++;
            }
            // let td=$(this).closest('.contTD'); // closest  container TD and work from there

            // let col=td.index(), row=td.parent().index(), tbdy=td.closest('tbody');
            // // modify input fields of rows >= row and columns >= col:
            // tbdy.children('tr').slice(row).each((i,tr)=>{
            //     $(tr).find('td input:text').slice(col).each((j,ti)=>{
            //     if(vals[i]&&vals[i][j]!=null) ti.value=vals[i][j] }
            // )});
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
    .table-wrap{
        width: 80%;
        margin: auto;
    }
    .table-wrap .vs-con-input-label{
        width: 180px !important;
    }
</style>
