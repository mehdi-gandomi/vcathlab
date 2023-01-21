<template>
  <vx-card no-shadow>

    <!-- Img Row -->
    <div class="flex flex-wrap items-center mb-4">
      <vs-avatar :src="avatarPreview" size="70px" class="mr-4 mb-4" />
      <div>
        <label for="avatar" style="cursor:pointer" class="inline-block">
            <vs-button class="mr-4 sm:mb-0 mb-2" style="pointer-events:none">{{__("Upload photo")}}</vs-button>
            <input @change="onUpload" style="display:none" type="file" name="avatar" id="avatar">
        </label>
        <!-- <vs-button type="border" color="danger">{{__("Remove")}}</vs-button> -->
        <!-- <p class="text-sm mt-2">JPG, GIF or PNG. Max size of 800kB</p> -->
      </div>
    </div>

    <!-- Info -->
    <vs-row vs-type="flex"  vs-w="12">
        <vs-col vs-type="flex" vs-w="6">
            <div class="w-11/12">
                <vs-input class="w-full mb-4" :label-placeholder="__('email')" v-model="userData.email"></vs-input>
            </div>

        </vs-col>
        <vs-col vs-type="flex" vs-w="6">
            <div class="w-11/12">
                <vs-input class="w-full mb-4" :label-placeholder="__('first name')" v-model="userData.first_name"></vs-input>
            </div>
        </vs-col>
        <vs-col vs-type="flex" vs-w="6">
            <div class="w-11/12">
                <vs-input class="w-full mb-4" :label-placeholder="__('last name')" v-model="userData.last_name"></vs-input>
            </div>

        </vs-col>


        <vs-col vs-type="flex" vs-w="6">
            <div class="w-11/12">
                <vs-input class="w-full mb-4" :label-placeholder="__('mobile')" v-model="userData.mobile"></vs-input>
                <div v-if="shouldShowMobileVerification">
                    <vs-alert icon-pack="feather" icon="icon-info" class=" my-4" color="warning" v-if="userData.mobile_verified == null">
                        <span >   {{__("Your mobile phone is not verified")}}. &emsp; <a href="#" @click="sendCode" class="hover:underline">{{__("Send Code")}}</a></span>
                    </vs-alert>
                    <vs-alert icon-pack="feather" icon="icon-info" class=" my-4" color="warning" v-if="userData.mobile_verified == 0">
                        <span >   {{__("Your mobile phone is not verified")}}. &emsp; <a href="#" @click="sendCode" class="hover:underline">{{__("Resend Code")}}</a></span>
                    </vs-alert>
                </div>
            </div>

        </vs-col>

    </vs-row>
    <!-- Save & Reset Button -->
    <div >
        <vs-button @click="updateProfile" class="ml-auto mt-2">{{__("Save Changes")}}</vs-button>
    </div>
    <vs-prompt
      @cancel="verifyCode=''"
      @accept="onCodeSubmit"
      @close="close"
      :title="__('Confirm code')"
      :accept-text="__('Confirm')"
      :cancel-text="__('Cancel')"
      :active="isCodeModalActive">
      <div class="con-exemple-prompt">
        <span>{{__("Enter the verification code")}}</span>
        <vs-input  :vs-placeholder="__('Code')" v-model="verifyCode" class="mt-3 w-full" />
      </div>
    </vs-prompt>
  </vx-card>
</template>

<script>
    // import Location from '@external_modules/Location/Resources/js/Location.vue'
export default {

    data(){
        const userInfo={...this.$store.state.auth.userInfo};
        const obj={
            isCodeModalActive:false,
            verifyCode:"",
            userData:{
                first_name:userInfo.first_name,
                last_name:userInfo.last_name,
                mobile:userInfo.mobile || "",
                email:userInfo.email || "",
                avatar:userInfo.photoURL,
                mobile_verified:userInfo.profile ? userInfo.profile.mobile_verified:0
            },
            avatarPreview:userInfo.photoURL,
            location:{
                city:userInfo ? userInfo.city:{},
                province:userInfo ? userInfo.province:{}
            },
        }
        return obj;
    },
  mounted(){
      console.log(this.userData)
  },
  computed:{
      shouldShowMobileVerification(){
          return window.vuexy.mobile_verification;
      }
  },
  methods:{
      advancedResume(){
          console.log(this.$parent)
      },
      async onCodeSubmit(){
          this.isCodeModalActive=true
          const{data}=await this.$http.post(`${window.config.root_url}/userverification/api/validate`,{
              mobile:this.userData.mobile,
              type:"mobile",
              code:this.verifyCode,
              reason:"verification"
          })
          if(data.ok){
              Iracode.success(data.message);
              this.isCodeModalActive=false;
              this.userData.mobile_verified=true;
              await this.$auth.handleSessionAuthentication()
          }else{
            Iracode.error(data.message);
          }

      },
      close(){

      },
      sendCode(){
          this.$http.post(`${window.config.root_url}/userverification/api/send`,{
              mobile:this.userData.mobile,
              type:"mobile",
              reason:"verification"
          })
          this.isCodeModalActive=true
      },
      async onUpload(e){
           if (e.target.files && e.target.files[0]) {
                this.userData.avatar=e.target.files[0];
                var reader = new FileReader();
                reader.onload = (e)=> this.avatarPreview=e.target.result

                reader.readAsDataURL(e.target.files[0]); // convert to base64 string



            }

      },
      async updateProfile(){
          // const fd=new FormData();
                // fd.append("avatar",e.target.files[0])
                // for(const key in this.userData){
                //     if(key != "avatar") fd.append(key,this.userData[key]);
                // }
                // fd.append("_method","PUT");
                // await this.$http.post(this.serverUrl("user/profile-information"),fd);
                // await this.$auth.handleSessionAuthentication()
          Iracode.loading();
          const fd=Iracode.objToFormData(this.userData);
          fd.append("_method","PUT");
          const {data}=await this.$http.post(this.serverUrl("user/profile-information"),fd)
          await this.$auth.handleSessionAuthentication()
          Iracode.success(this.__("Your profile updated successfully"))
          Iracode.close_loading();
        //   const userData={...this.$store.state.auth.userInfo};
        //   userData.email=this.userData.email;
        //   userData.profile.first_name=this.userData.first_name;
        //   userData.profile.last_name=this.userData.last_name;
        //   userData.profile.mobile=this.userData.mobile;

        //   this.$store.commit("UPDATE_USER_INFO",userData);
        //   userData
        //    put request
      }
  }
}
</script>
