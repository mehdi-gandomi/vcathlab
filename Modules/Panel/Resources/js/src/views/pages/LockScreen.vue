<!-- =========================================================================================
    File Name: LockScreen.vue
    Description: Lock Screen Page
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
      Author: Pixinvent
    Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->


<template>
    <div class="h-screen flex w-full bg-img vx-row no-gutter justify-center items-center">
        <div class="vx-col sm:w-3/5 md:w-3/5 lg:w-3/4 xl:w-3/5 sm:m-0 m-4">
            <vx-card>
                <div slot="no-body" class="full-page-bg-color">
                    <div class="vx-row no-gutter">
                        <div class="vx-col hidden sm:hidden md:hidden lg:block lg:w-1/2 mx-auto self-center">
                            <img src="@assets/images/pages/lock-screen.png" alt="login" class="mx-auto">
                        </div>
                        <div class="vx-col sm:w-full md:w-full lg:w-1/2 mx-auto self-center d-theme-dark-bg">
                            <div class="p-8">
                                <div class="vx-card__title mb-8">
                                    <h4 class="mb-4">{{__("Your Session is locked")}}</h4>
                                </div>
                                <!-- <vs-input icon-no-border icon="icon icon-user" icon-pack="feather" label-placeholder="Username" v-model="value1" class="w-full mb-6"/> -->
                                <vs-input icon-no-border icon="icon icon-lock" icon-pack="feather" type="password" :label-placeholder="__('Password')" v-model="password" class="w-full mb-6" />

                                <div class="flex justify-between flex-wrap">
                                    <!-- <router-link to="/pages/login" class="mb-4">{{__("Are you not John Doe?")}}</router-link> -->
                                    <vs-button class="ml-2" @click="unlock">{{__("Unlock")}}</vs-button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </vx-card>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            password: ''
        }
    },
    methods:{
        async unlock(){
            const {data} =await this.$http.post(`${window.config.path_prefix}/api/unlock`,{password:this.password});
            if(data.ok){
                this.$store.commit("UPDATE_LOCKED_STATE",false)
                // this.$router.push("/");
                location.href=window.config.panel_url;
            }else{
                this.$store.commit("UPDATE_LOCKED_STATE",true)
                Iracode.error(data.message);
            }
        }
    }
}
</script>
