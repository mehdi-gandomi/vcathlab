// import BootstrapVue from 'bootstrap-vue'
// Vue.use(BootstrapVue)
import {BTable,BPagination} from 'bootstrap-vue';
// import { TablePlugin } from 'bootstrap-vue'
import './bootstrap/scss/bootstrap.scss'
import 'bootstrap-vue/dist/bootstrap-vue.css'
Vue.component("b-table",BTable);
Vue.component("b-pagination",BPagination);
Iracode.registeringRoutes(()=>{
    Iracode.addRoute(
        {
            path: '/user/tickets',
            name: 'user-tickets',
            component: require('./user/tickets/Index.vue').default,
        }
    );
    Iracode.addRoute(
        {
            path: '/user/tickets/create',
            name: 'user-tickets-create',
            component: require('./user/tickets/Create.vue').default,
        }
    );
    Iracode.addRoute(
        {
            path: '/user/tickets/:id',
            name: 'user-tickets-details',
            component: require('./user/tickets/Show.vue').default,
        }
    );

    //admin
    Iracode.addRoute(
        {
            path: '/admin/tickets',
            name: 'admin-tickets',
            component: require('./admin/tickets/Index.vue').default,
        }
    );
    Iracode.addRoute(
        {
            path: '/admin/tickets/create',
            name: 'admin-tickets-create',
            component: require('./admin/tickets/Create.vue').default,
        }
    );
    Iracode.addRoute(
        {
            path: '/admin/tickets/:id',
            name: 'admin-tickets-details',
            component: require('./admin/tickets/Show.vue').default,
        }
    );
});
