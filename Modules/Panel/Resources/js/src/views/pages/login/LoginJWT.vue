<template>
  <div>
        <!-- v-validate="'required|email|min:3'" -->

    <vs-input

        name="email"
        icon-no-border
        :danger="hasValidationError('email')"
        :danger-text="validationError('email')"
        icon="icon icon-user"
        icon-pack="feather"
        :label-placeholder="__('Email')"
        v-model="form.email"
        class="w-full"/>
    <vs-input
        type="password"
        name="password"
        icon-no-border
        icon="icon icon-lock"
        icon-pack="feather"
        :danger="hasValidationError('password')"
        :danger-text="validationError('password')"
        :label-placeholder="__('Password')"
        v-model="form.password"
        class="w-full mt-6" />
    <div class="flex flex-wrap justify-center mt-5">
        <img class="cursor-pointer" @click="getCaptcha" :src="captchaImg" alt="">
        <!-- <vs-button class="reset-button" color="danger" type="relief" size="small"  @click="registerUser">
            <svg class="inline-block" fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="13px" height="13px"><path d="M 16 4 C 10.886719 4 6.617188 7.160156 4.875 11.625 L 6.71875 12.375 C 8.175781 8.640625 11.710938 6 16 6 C 19.242188 6 22.132813 7.589844 23.9375 10 L 20 10 L 20 12 L 27 12 L 27 5 L 25 5 L 25 8.09375 C 22.808594 5.582031 19.570313 4 16 4 Z M 25.28125 19.625 C 23.824219 23.359375 20.289063 26 16 26 C 12.722656 26 9.84375 24.386719 8.03125 22 L 12 22 L 12 20 L 5 20 L 5 27 L 7 27 L 7 23.90625 C 9.1875 26.386719 12.394531 28 16 28 C 21.113281 28 25.382813 24.839844 27.125 20.375 Z"/></svg>
        </vs-button> -->
    </div>
    <div class="flex flex-wrap justify-between my-4 captcha-wrap">
        <vs-input
            name="captcha"
            icon-no-border
            :danger="hasValidationError('captcha')"
            :danger-text="validationError('captcha')"
            :label-placeholder="__('Captcha')"
            v-model="form.captcha"
            class="w-full"/>
    </div>
    <div class="flex flex-wrap justify-between my-5">
        <vs-checkbox v-model="form.checkbox_remember_me" class="mb-3">{{__('Remember Me')}}</vs-checkbox>
    </div>
    <div class="flex flex-wrap justify-between my-5">
        <router-link to="/pages/forgot-password">{{__('Forgot Password?')}}</router-link>
    </div>

    <div class="flex flex-wrap justify-between mb-3">
      <vs-button :disabled="!validateForm" @click="loginJWT">{{__("Login")}}</vs-button>
      <vs-button  type="border" @click="registerUser">{{__("Register")}}</vs-button>
    </div>
  </div>
</template>

<script>
import Form from '@/Form';
export default {
  data() {
    return {
        captcha:{},
        form:new Form({
            email: '',
            password: '',
            checkbox_remember_me: false,
            captcha:"",
            key:""
        })
    }
  },
  computed: {
    validateForm() {
      return  /* !this.errors.any() && */ this.email != '' && this.password != '';
    },
    captchaImg(){
        return this.captcha.img;
    }
  },
  async created(){
    const isAuthenticated=await this.$auth.isAuthenticated();
    if (isAuthenticated) this.$router.push('/').catch((e) => console.log(e))
    await this.getCaptcha();
  },
//   mounted(){
//       this.$http.get('/sanctum/csrf-cookie').then(response => {
//             console.log(response);
//       });
//   },
  methods: {
    checkLogin() {
      // If user is already logged in notify
      if (this.$store.state.auth.isUserLoggedIn()) {

        // Close animation if passed as payload
        // this.$vs.loading.close()

        this.$vs.notify({
          title: this.__('Login Attempt'),
          text: this.__('You are already logged in!'),
          iconPack: 'feather',
          icon: 'icon-alert-circle',
          color: 'warning'
        })

        return false
      }
      return true
    },
    async getCaptcha(){
        const {data}=await this.$http.get("/captcha/api/flat");
        this.captcha=data;
        this.form.key=data.key
    },
    async loginJWT() {
      // Loading
      this.$vs.loading()

      try{
        const data=await this.form.withOptions({handleErrors:false}).post(`${window.config.path_prefix}/api/login`);
        this.$vs.loading.close();
        if(data.userData){
              this.$store.commit('UPDATE_USER_INFO', data.userData, {root: true})
              // Set bearer token in axios
              this.$store.commit("auth/SET_BEARER", data.accessToken)
              this.$store.commit("auth/SET_LOGIN_RESULT",data);
            //   location.href=`${window.config.path_prefix}/callback`;
        }
      }catch(error){
          console.log(error);
          this.$vs.loading.close()
          this.getCaptcha();
          this.$vs.notify({
            title: this.__('Error'),
            text: error.message,
            iconPack: 'feather',
            icon: 'icon-alert-circle',
            color: 'danger'
          })
      }
    },
    hasValidationError(name) {
        return this.form.errors && this.form.errors.has(name) ? true : undefined;
    },
    validationError(name) {
        return this.form.errors ? this.form.errors.first(name) : undefined;
    },
    registerUser() {
      if (!this.checkLogin()) return
      this.$router.push('/pages/register').catch(() => {})
    }
  }
}

</script>

<style scoped>
    .captcha-wrap .vs-con-input-label.is-label-placeholder{
        margin-top: 17px !important;
    }
</style>
