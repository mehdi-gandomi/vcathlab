<template>
  <vx-card no-shadow class="profile-info">
        <form-wizard ref="wizard"  transition='fade' title="" subtitle=""  stepSize="xs" color="rgb(115,103,240)" @on-change="onBeforeStepChange">
            <wizard-step
            slot-scope="props"
            slot="step"
            :tab="props.tab"
            :transition="props.transition"
            @click.native="navigateToTab(props.navigateToTab, props.index)"
                :index="props.index">
            </wizard-step>
            <tab-content  :title="__('Basic Information')">
                <basic-information ref="basicInfo"/>
            </tab-content>
            <tab-content  :title="__('Work Information')">
                <work-information ref="workInfo"/>
            </tab-content>
            <tab-content  :title="__('Work Experience')">
                <work-experience ref="workExperience"/>
            </tab-content>
            <tab-content  :title="__('Skills')">
                <skills ref="skills"/>
            </tab-content>
            <tab-content  :title="__('Educations')">
                <educations ref="educations"/>
            </tab-content>
            <tab-content  :title="__('Social Network')">
                <social-network ref="socialNetwork"/>
            </tab-content>
            <tab-content  :title="__('Further Information')">
                <further-information ref="furtherInformation"/>
            </tab-content>
            <vs-button @click.stop="$refs.wizard.prevTab()" slot="prev" color="primary" type="filled">{{__("Back")}}</vs-button>
            <vs-button @click.stop="nextTab" slot="next" color="primary" type="filled">{{__("Next")}}</vs-button>
            <span slot="finish" ></span>
        </form-wizard>
  </vx-card>
</template>

<script>
//local registration
import {FormWizard, TabContent,WizardStep} from 'vue-form-wizard'
import BasicInformation from "./BasicInformation.vue"
import WorkInformation from "./WorkInformation.vue"
import WorkExperience from "./WorkExperience.vue"
import SocialNetwork from "./SocialNetwork.vue"
import FurtherInformation from "./FurtherInformation.vue"
import Educations from "./Educations.vue"
import Skills from "./Skills.vue"

import Form from '@/Form';
import 'vue-form-wizard/dist/vue-form-wizard.min.css'
export default {
  components: {
    FormWizard,
    Educations,
    TabContent,
    WizardStep,
    BasicInformation,
    WorkInformation,
    WorkExperience,
    SocialNetwork,
    FurtherInformation,
    Skills
  },
  data() {
    const userInfo={...this.$store.state.auth.userInfo};
    const obj={


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
            this.$refs.wizard.nextTab()
        },
        navigateToTab(navigateFunction, index){
            // navigateFunction(index)
            // if(confirm('Do you want to leave this step?')){

            // }
        },

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
