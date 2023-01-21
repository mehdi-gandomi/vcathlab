<!-- =========================================================================================
    File Name: Login.vue
    Description: Login Page
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
      Author: Pixinvent
    Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->


<template>
  <div class="h-screen flex w-full bg-img vx-row no-gutter items-center justify-center" id="page-login">
    <div class="vx-col sm:w-1/2 md:w-1/2 lg:w-3/4 xl:w-3/5 sm:m-0 m-4">
      <vx-card>
        <div slot="no-body" class="full-page-bg-color">

          <div class="vx-row no-gutter justify-center items-center">

            <div class="vx-col hidden lg:block lg:w-1/2">
              <img src="@assets/images/pages/login.png" alt="login" class="mx-auto">
              <!-- <p class="developer">طراحی و پیاده سازی نوسط ایراکد</p> -->
            </div>

            <div class="vx-col sm:w-full md:w-full lg:w-1/2 d-theme-dark-bg">
              <div class="pt-8 pb-4 pr-8 pl-8 login-wrap">

                <div class="vx-card__title mb-4">
                  <h4 class="mb-4">{{__("Login")}}</h4>
                  <!-- <p>Welcome back, please login to your account.</p> -->
                </div>
                <login-jwt></login-jwt>
                <p class="developer">طراحی و پیاده سازی نوسط <a href="http://iracode.com">ایراکد</a></p>
              </div>
            </div>
          </div>
        </div>
      </vx-card>
    </div>
  </div>
</template>



<script>
import LoginJwt from "./LoginJWT.vue"

export default {
  components: {
    LoginJwt
  }
}
</script>

<style lang="scss">
.login-wrap {
    .vs-input--input{
        direction: ltr !important;
    }
  .con-tab {
    padding-bottom: 14px;
  }

  .con-slot-tabs {
    margin-top: 1rem;
  }

}
  .developer{
    // position: absolute;
    // bottom: 5px;
    // left: 60%;
    // transform: translateX(50%);
    text-align: center;
  }
</style>
