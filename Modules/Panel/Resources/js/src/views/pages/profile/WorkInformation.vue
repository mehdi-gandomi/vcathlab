<template>
  <vx-card no-shadow>


    <!-- Info -->
    <vs-row vs-type="flex"  vs-w="12">
        <!-- <vs-col vs-type="flex" vs-w="6">
            <div class="w-11/12">

            <label for="">{{__('Work Name')}}</label>
                <vs-input class="w-full mb-4 mt-4" v-model="userData.work_name"></vs-input>
            </div>

        </vs-col> -->
        <vs-col vs-type="flex" vs-w="6">
            <div class="w-11/12">
            <label for="">{{__("Work Method")}}</label>
            <v-select
                :reduce="op=>op.value"
                class="my-4"
                v-model="userData.work_method"
                name="work_method"
                :options="fields.work_method.options"
                :dir="$vs.rtl ? 'rtl' : 'ltr'"
            />
            </div>
        </vs-col>
        <vs-col vs-type="flex" vs-w="6">
            <div class="w-11/12">
            <label for="">{{__("Work Places")}}</label>
            <v-select
                multiple
                :reduce="op=>op.value"
                class="my-4"
                v-model="userData.work_places"
                name="work_places"
                :options="districts"
                :dir="$vs.rtl ? 'rtl' : 'ltr'"
            />
            </div>
        </vs-col>
        <vs-col vs-type="flex" vs-w="6">
            <div class="w-11/12">
            <label for="">{{__("Vehicle")}}</label>
            <v-select
                :reduce="op=>op.value"
                class="my-4"
                v-model="userData.vehicle"
                name="vehicle"
                :options="fields.vehicle.options"
                :dir="$vs.rtl ? 'rtl' : 'ltr'"
            />
            </div>
        </vs-col>
        <vs-col vs-type="flex" vs-w="6">
            <div class="w-11/12">
            <label for="">{{__("Specialty")}}</label>
            <v-select
                :reduce="op=>op.value"
                class="my-4"
                v-model="userData.specialty"
                name="specialty"
                :options="fields.specialty.options"
                :dir="$vs.rtl ? 'rtl' : 'ltr'"
            />
            </div>
        </vs-col>
    </vs-row>
    <!-- Save & Reset Button -->
    <div class="flex flex-wrap items-center justify-end">
      <vs-button @click="updateProfile" class="ml-auto mt-2">{{__("Save Changes")}}</vs-button>
    </div>
  </vx-card>
</template>

<script>
String.prototype.toEnglishDigits = function () {
        return this.replace(/[۰-۹]/g, d => '۰۱۲۳۴۵۶۷۸۹'.indexOf(d))
    }
export default {
    data(){
        const userInfo={...this.$store.state.auth.userInfo};
        const obj={
            isCodeModalActive:false,
            fields:window.config.profile_fields,
            districts:window.config.districts.map(item=>{
                return {
                    label:item.name,
                    value:item.id
                };
            }),
            verifyCode:"",
            userData:{
                ...userInfo.profile,
                birthdate:new Date(userInfo.profile.birthdate).toLocaleString('fa-IR',{ year: 'numeric', month: '2-digit', day: '2-digit' }).toEnglishDigits()
            },
            avatarPreview:userInfo.photoURL
        }
        return obj;
    },
  mounted(){
      console.log(this.userData)
  },
  async created() {



  },
  computed:{
      shouldShowMobileVerification(){
          return window.vuexy.mobile_verification;
      }
  },
  methods:{
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
          const {data}=await this.$http.post(this.serverUrl("app/user/profile-information"),fd)
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
