
Iracode.setting=(key,defaultValue)=>(window.config.settings.all[key] !== undefined) ? window.config.settings.all[key]:defaultValue;
Iracode.registeringRoutes(function(vue,store){
    Iracode.addRoute(
        {
            path: 'settings',
            name: 'settings-page',
            component: require('./Settings.vue').default,
            // component: ()=>import('./Settings.vue'),
        }
    );

})
