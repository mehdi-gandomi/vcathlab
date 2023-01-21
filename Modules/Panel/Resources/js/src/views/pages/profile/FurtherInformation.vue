<template>
  <vx-card no-shadow>


    <!-- Info -->
    <vs-row vs-type="flex"  vs-w="12">
        <vs-col vs-lg="12">
            <label for="">درباره من</label>
            <vs-textarea v-model="userData.about"/>
        </vs-col>
        <vs-col vs-lg="12">
            <label for="">دوره آموزشی</label>
            <vs-textarea v-model="userData.courses"/>
        </vs-col>
         <vs-col vs-lg="12">
            <label for="">جوایز و افتحارات</label>
            <vs-textarea v-model="userData.awards"/>
        </vs-col>
        <vs-col vs-lg="12">
            <label for="">فعالیت های داوطلبانه</label>
            <vs-textarea v-model="userData.activities"/>
        </vs-col>
         <vs-col vs-lg="12">
            <label for="">پروژه های آکادمیک</label>
            <vs-textarea v-model="userData.academic_projects"/>
        </vs-col>
          <vs-col vs-lg="12">
            <label for="">کتاب ها و مقالات</label>
            <vs-textarea v-model="userData.books_and_journals"/>
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
    this.fields.gender.options=this.fields.gender.options.filter(item=>item.value != 3)
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
