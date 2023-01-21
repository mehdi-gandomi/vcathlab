import VueRepeater from 'vue-repeater'
import 'vue-repeater/dist/lib/vue-repeater.css'
import Feature from './components/Feature'

Iracode.registeringRoutes(function(Vue){
    Vue.component('vue-repeater', VueRepeater)
    Vue.component('feature', Feature)
    Iracode.setRouteComponent("dashboard-analytics",require("./Dashboard").default)
    Iracode.addRoute( {
        path: '/user/ffr_ct_cases/create',
        name: 'new-ffr-ct-case',
        component: require('./ffr_ct_cases/New.vue').default
    });
    Iracode.addRoute( {
        path: '/intro',
        name: 'intro',
        component: require('./Intro.vue').default
    },"full_page");
});
