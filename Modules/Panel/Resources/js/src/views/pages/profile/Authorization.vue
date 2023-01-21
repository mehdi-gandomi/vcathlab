<template>
  <vx-card no-shadow class="profile-info">
        <form-wizard ref="wizard" :startIndex="startIndex" transition='fade' title="" subtitle=""  stepSize="xs" color="rgb(115,103,240)" @on-change="onBeforeStepChange">
            <wizard-step
            slot-scope="props"
            slot="step"
            :tab="props.tab"
            :transition="props.transition"
            @click.native="navigateToTab(props.navigateToTab, props.index)"
                :index="props.index">
            </wizard-step>
            <tab-content  :title="__('Mobile')">
                ضمن خوش‌آمد گویی به شما کاربر محترم علائدین، به اطلاع می‌رساند که جهت فراهم آوردن محیطی مطمئن برای تمامی کاربران سایت، برای واریز و برداشت وجه ریالی نیاز به تکمیل فرآیند احراز هویت وجود دارد. لطفا پس از مطالعه توضیحات زیر، برای شروع به فعالیت مالی در سایت علائدین، فرآیند احراز هویت خود را آغاز نمایید.

                احراز هویت پایه‌ای با تایید شماره تلفن همراه، ارسال مدارک هویتی (کارت ملی)، ورود آدرس محل سکونت و تلفن ثابت و ارسال قبض تلفن جهت تایید آن‌ها، و ورود اطلاعات حساب و کارت بانکی صورت می‌گیرد. با انجام این سطح از احراز هویت می‌توانید اقدام به واریز وجه/کوین، معامله و برداشت وجه/کوین بپردازید.

                همچنین لازم به توضیح است که با توجه به قوانین بانکی کشور و امکان بلوکه شدن وجوه واریز شده از کارت‌های بانکی مسروقه، کاربران جدید که به تازگی اقدام به ثبت و واریز وجه از طریق یک کارت بانکی می‌کنند، به مدت یک روز کاری امکان ثبت درخواست برداشت وجه را نخواهند داشت. این تاخیر صرفاً جهت تایید اصالت کارت بانکی بوده و در طول این مدت کاربران می‌توانند به هر میزان با وجه واریزی خود در سیستم معامله نمایند و آن را تبدیل به سایر ارزهای دیجیتال کنند و صرفا محدودیت در خارج کردن وجه واریزی به مدت یک روز کاری از سیستم علائدین است.
            </tab-content>
            <tab-content lazy :title="__('ID Card')">
                <p>کاربر گرامی، فرایند استعلام و احراز هویت در این مرحله از ساعت 8 الی 20 انجام می شود. درصورت ارسال و تکمیل مراحل در خارج از این بازه زمانی، فرایند استعلام و بررسی این مرحله در صبح روز آینده انجام خواهد شد.</p>
                <h5 class="text-center my-3"> {{__("Confirm ID Card")}}</h5 >
                <hr class="my-5" style="border:1px solid rgba(0, 0, 0, 0.2);">
                <vs-row
                vs-type="flex"  vs-w="12">
                    <vs-col vs-type="flex" vs-align="center" vs-w="3">

                        <vs-input :label="__('first name')" v-model="idCardData.first_name"/>
                    </vs-col>
                    <vs-col vs-type="flex" vs-align="center" vs-w="3">
                        <vs-input :label="__('last name')" v-model="idCardData.last_name"/>
                    </vs-col>
                    <vs-col  vs-align="center" vs-w="3">
                        <label for="" class="vs-input--label block">{{__("birth date")}}</label>
                        <persian-date-picker   format="YYYY-MM-DD" display-format="DD jMMMM jYYYY" type="date" v-model="idCardData.birthdate"></persian-date-picker>

                    </vs-col>
                    <vs-col vs-type="flex" vs-align="center" vs-w="3">
                        <vs-input style="width:100%" :label="__('meli code')" v-model="idCardData.melicode"/>
                    </vs-col>
                    <vs-col class="pt-4 relative" vs-type="flex" vs-align="center" vs-w="12">
                        <vs-row
                            vs-type="flex"  vs-w="12">
                            <vs-col class="mb-2" vs-type="flex" vs-align="center" vs-w="12">
                                <label for="" class="vs-input--label block">{{__("ID card photo")}}</label>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-w="12">
                                <filepond :server="uploadServer" :label-idle="__('Drag & Drop your files')" accepted-file-types="image/jpeg, image/png" ></filepond>
                            </vs-col>
                        </vs-row>
                    </vs-col>
                </vs-row>

            </tab-content>
             <!-- <tab-content lazy :title="__('Bank Account Info')">
                <h5 class="text-center my-3"> {{__("Confirm Bank Account")}}</h5 >
                <hr class="my-5" style="border:1px solid rgba(0, 0, 0, 0.2);">
                <p>
                    لطفا حداقل یک کارت بانکی خود را وارد نمایید. این کارت باید حتما به نام خود شما باشد. امکان واریز وجه از طریق درگاه بانکی صرفا از مبدا کارت‌هایی که تایید شده باشند وجود خواهد داشت.
                </p>
                <vs-row>
                    <vs-col  vs-type="flex" vs-align="center" vs-w="3">
                        <vs-input :label-placeholder="__('Bank')" v-model="accountData.bank_name"/>
                    </vs-col>
                    <vs-col  vs-type="flex" vs-align="center" vs-w="4">
                        <vs-input :label-placeholder="__('Account number')" v-model="accountData.number"/>
                    </vs-col>
                    <vs-col vs-type="flex" vs-align="center" vs-w="5">
                        <vs-input :label-placeholder="__('Shaba number')" v-model="accountData.shaba_number"/>
                    </vs-col>
                </vs-row>
            </tab-content> -->
            <tab-content lazy :title="__('Bank Card Info')">
                <h5 class="text-center my-3"> {{__("Confirm Bank Card")}}</h5 >
                <hr class="my-5" style="border:1px solid rgba(0, 0, 0, 0.2);">
                <p>
                    لطفا حداقل یک کارت بانکی خود را وارد نمایید. این کارت باید حتما به نام خود شما باشد. امکان واریز وجه از طریق درگاه بانکی صرفا از مبدا کارت‌هایی که تایید شده باشند وجود خواهد داشت.
                </p>
                <vs-row>
                    <vs-col  vs-type="flex" vs-align="center" vs-w="3">
                        <vs-input :label-placeholder="__('Bank')" v-model="cardData.bank_name"/>
                    </vs-col>
                    <vs-col vs-type="flex" vs-align="center" vs-w="9">
                        <vs-input :label-placeholder="__('Card number')" v-model="cardData.card_number"/>
                    </vs-col>
                </vs-row>
            </tab-content>
            <tab-content lazy :title="__('Address & Phone')">
                Yuhuuu! This seems pretty damn simple
            </tab-content>
            <tab-content lazy :title="__('Identity Confirmation')">
                Yuhuuu! This seems pretty damn simple
            </tab-content>
            <div slot="prev"></div>
            <vs-button @click.stop="nextTab" slot="next" color="primary" type="filled">{{__("Next")}}</vs-button>
            <vs-button slot="finish" color="primary" type="filled">{{__("Finish")}}</vs-button>
        </form-wizard>
  </vx-card>
</template>

<script>
//local registration
import {FormWizard, TabContent,WizardStep} from 'vue-form-wizard'
import Form from '@/Form';
import 'vue-form-wizard/dist/vue-form-wizard.min.css'
export default {
  components: {
    FormWizard,
    TabContent,
    WizardStep
  },
  data() {
    const userInfo={...this.$store.state.auth.userInfo};
    const obj={
        idCardData:{
            first_name:userInfo.profile ? userInfo.profile.first_name:"",
            last_name:userInfo.profile ? userInfo.profile.last_name:"",
            mobile:userInfo.mobile || "",
            email:userInfo.email || "",
            birthdate:userInfo.profile ? userInfo.profile.birthdate:"",
            melicode:userInfo.profile ? userInfo.profile.melicode:"",
            melicard_photo:{},
            type:"idCard"
            // mobile_verified:userInfo.profile ? userInfo.profile.mobile_verified:0
        },
        currentStep:userInfo.profile.verify_step,
        startIndex:userInfo.profile.verify_step,
        cardData:{
            bank_name:"",
            card_number:""
        },
        accountData:{
            bank_name:"",
            card_number:""
        },
        uploadServer: {
            url: window.config.path_prefix,
            process: (fieldName, file, metadata, load, error, progress, abort) => {
                this.idCardData.melicard_photo=file;
                return load();
                // console.log('InsideFP-InputNameTag: ' + fieldName);
                // console.log('InsideFP-Metadata: ' , metadata);
                // var obj_data = {};
                // //obj_data['something'] = 'something'; // may want to add other data
                // obj_data['myfile'] = file;
                // var imgData = new FormData();
                // $.each(obj_data, function(k, v) { // apply object key/values to imgData
                // console.log(['Key, Value & myfilecheck: ', k, v, k == 'myfile']);
                //     if (k == 'myfile') {$.each(v, function(i, file) {imgData.append(k, file)})}
                // else {imgData.append(k, v)}
                // });
                // console.log('ImgData: ' , imgData);
                // $.ajax....
            }
        }
    }
    return obj;
  },
  computed: {
    activeUserInfo() {
      return this.$store.state.AppActiveUser
    },
    // startIndex(){
    //     // if()
    // }
  },
  methods:{
        async nextTab(...params){
            console.log(params)
            switch(this.currentStep){
                case 1:
                    // if(confirm('Are you sure?')){
                    await this.saveIdCardData();
                    this.$refs.wizard.nextTab()
                    // }
                break;
                case 2:
                    // if(confirm('Are you sure?')){
                    await this.saveBankCardInfo();
                    this.$refs.wizard.nextTab()
                    // }
                break;
                default:
                    this.$refs.wizard.nextTab()
                break;
            }
        },
        navigateToTab(navigateFunction, index){
            // navigateFunction(index)
            // if(confirm('Do you want to leave this step?')){

            // }
        },
        saveBankCardInfo(){
            return new Promise(async(resolve,reject)=>{
                try{
                    const {data} =await this.$http.post(`${window.config.root_url}/alaadin/api/bank_cards`,this.cardData)
                    console.log(data)
                    await this.$auth.handleSessionAuthentication()
                }catch(e){

                }
            })
        },
      saveIdCardData(){
          return new Promise(async(resolve,reject)=>{
            const fd=new FormData();
            for(const key in this.idCardData) fd.append(key,this.idCardData[key]);
            fd.append("_method","PUT");
            try{
                const {data} =await this.$http.post(`${window.config.root_url}/user/profile-information`,fd)
                await this.$auth.handleSessionAuthentication()
            }catch(e){

            }
          })
      },
      saveBankAccountInfo(){
          return new Promise(async(resolve,reject)=>{
            const fd=new FormData();
            for(const key in this.idCardData) fd.append(key,this.idCardData[key]);
            fd.append("_method","PUT");
            try{
                const {data} =await this.$http.post(`${window.config.root_url}/user/profile-information`,fd)
                await this.$auth.handleSessionAuthentication()
            }catch(e){

            }
          })
      },

      onBeforeStepChange(prevIndex,nextIndex){
          console.log(prevIndex,nextIndex)
          this.currentStep=nextIndex;
      }
  }
}
</script>
<style lang="scss">
    .profile-info {
        .vpd-input-group .vpd-icon-btn{
            min-width: 15% !important;
        }
        .vpd-main {
            margin-top: 0.2rem;
            width: 90%;
            font-size: 12px;
            display: block;
        }
        .vue-form-wizard .wizard-icon-circle .wizard-icon-container{
            border-radius: 50%;
        }
        .vue-form-wizard .navbar .navbar-nav>li>a.wizard-btn,.vue-form-wizard .wizard-btn{
            font-family: IRANSans,Tahoma !important;
        }
        .filepond--wrapper{
            width: 100%;
        }
    }
    .fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
/* Enter and leave animations can use different */
/* durations and timing functions.              */
.slide-fade-enter-active {
  transition: all .3s ease;
}
.slide-fade-leave-active {
  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
  transform: translateX(10px);
  opacity: 0;
}
</style>
