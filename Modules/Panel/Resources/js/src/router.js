import Vue from 'vue';
import Router from 'vue-router';
import auth from '@/auth/authService';
// Import all of the resource routes files.
// import other_routes from './routes.js'
Vue.use(Router);

export const createRouter=(routes,store)=>{
    const router = new Router({
        mode: 'history',
        base: window.config.path_prefix,
        scrollBehavior() {
          return { x: 0, y: 0 };
        },
        routes,
      });

      router.afterEach(() => {
        // Remove initial loading
        Iracode.progress_stop();
        const appLoading = document.getElementById('loading-bg');
        if (appLoading) {
          appLoading.style.display = 'none';
        }
      });

      router.beforeEach(async (to, from, next) => {
            Iracode.progress_start();
            if(to.query.renew){
                // localStorage.removeItem("vuex");
                await auth.handleSessionAuthentication()
                store.commit("UPDATE_LOCKED_STATE",false)
                return router.replace(to.path)
            }
            if(Object.keys(store.state.auth.userInfo).length < 1){
                await auth.handleSessionAuthentication()
                store.commit("UPDATE_LOCKED_STATE",false)
                return next();
            }
            if(store.state.locked && window.vuexy.session_locking && !to.query.renew){
                if(to.name != "page-lock-screen"){
                    return router.push({name:"page-lock-screen"});
                }
            }

            if(to.meta.middleware){
                if(Array.isArray(to.meta.middleware)){
                    return to.meta.middleware.map(middleware=>{
                        if(typeof middleware == "function"){
                            return middleware(to, from, next,router);
                        }
                    });
                }else if(typeof to.meta.middleware == "function"){
                    return to.meta.middleware(to, from, next,router);
                }
            }

          return next();
          // console.log("from & to",from,to)
          // try{
          //     if(from.name != "auth-callback" && !store.state.auth.userInfo.displayName){
          //         return router.push("/callback");
          //     }
          // }catch(e){}
      //   if(!this.$store.state.auth.userInfo.displayName) return this.$router.push("/callbck");
      });
      return router;
};
