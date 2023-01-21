
Iracode.registeringRoutes(function(Vue){
    Iracode.setRouteComponent("dashboard-analytics",require("./Dashboard").default)
    Iracode.addRoute( {
        path: '/user/ffr_ct_cases/create',
        name: 'new-ffr-ct-case',
        component: require('./ffr_ct_cases/New.vue').default
    });
    Iracode.addRoute( {
        path: '/user/ffr_ct_cases/register',
        name: 'register-ffr-ct-case',
        component: require('./ffr_ct_cases/Register.vue').default
    });
    Iracode.addRoute( {
        path: '/intro',
        name: 'intro',
        component: require('./Intro.vue').default
    },"full_page");
});
Iracode.afterBoot(function(vue,store,app,router){
    if(window.notifications){
            app.$store.dispatch("SET_NOTIFICATIONS",window.notifications)
            // setInterval(async()=>{
            //   const {data}=await app.$http.get(`${window.config.panel_url}/api/notifications`);
            //   app.$store.dispatch("SET_NOTIFICATIONS",data.data);
            //   app.$auth.handleSessionAuthentication();
            // },10000);
          //   setInterval(async()=>{
          //
          //   },5000);
    }
  });
