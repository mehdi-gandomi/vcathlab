/*=========================================================================================
  File Name: main.js
  Description: main vue(js) file
  ----------------------------------------------------------------------------------------
  Item Name: Vuesax Admin - VueJS Dashboard Admin Template
  Author: Pixinvent
  Author URL: hhttp://www.themeforest.net/user/pixinvent
==========================================================================================*/


import Vue from 'vue'
import App from './App.vue'
// import vuetify from './plugins/vuetify'
import vfrag from './plugins/frag'
window.Vue = Vue; // to use inside other modules along with vuex and protortpe
import VueI18n from 'vue-i18n'
Vue.use(VueI18n)
import fullscreen from 'vue-fullscreen'
Vue.use(fullscreen)
// Vuesax Component Framework
import Vuesax from 'vuesax'
Vue.use(Vuesax,{ theme:{ colors:vuexy.colors }, rtl: vuexy.themeConfig.rtl })
// axios
import axios from "./axios.js"
Vue.prototype.$http = axios;
window.axios=axios;
import VueProgressBar from 'vue-progressbar'

Vue.use(VueProgressBar, {
  color:vuexy.colors.progress || 'rgb(143, 255, 199)',
  failedColor: vuexy.colors.progress_failed || 'red',
  thickness: vuexy.progress_thickness || '3px',
  inverse:vuexy.themeConfig.rtl
})
// API Calls
import "./http/requests"

// Globally Registered Components
import './globalComponents.js'

// Vue Router
// import router from './router'
import {createRouter} from './router';
import routes from './routes';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
Vue.use(VueSweetalert2);


// Vuex Store
import store from './store/store'


// Vuesax Admin Filters
import './filters/filters'

// Clipboard
import VueClipboard from 'vue-clipboard2'
Vue.use(VueClipboard);


// Tour
// import VueTour from 'vue-tour'
// Vue.use(VueTour)
// require('vue-tour/dist/vue-tour.css')



// Vuejs - Vue wrapper for hammerjs
import { VueHammer } from 'vue2-hammer'
Vue.use(VueHammer)

// Auth0 Plugin
import AuthPlugin from "./plugins/auth"
Vue.use(AuthPlugin);



// PrismJS
import 'prismjs'
// import 'prismjs/themes/prism-tomorrow.css'
Vue.config.productionTip = false

import VueImg from 'v-img';
const vueImgConfig = {
    // Use `alt` attribute as gallery slide title
    altAsTitle: false,
    // Display 'download' button near 'close' that opens source image in new tab
    sourceButton: false,
    // Event listener to open gallery will be applied to <img> element
    openOn: 'click',
    // Show thumbnails for all groups with more than 1 image
    thumbnails: false,
  }
  Vue.use(VueImg, vueImgConfig);

import IdleVue from "idle-vue";
if(window.vuexy.session_locking){
    const eventsHub = new Vue();
    let idleTimeout=(window.config.settings && window.config.settings.all.session_expire_time) ? window.config.settings.all.session_expire_time : 120;
    idleTimeout=idleTimeout * 1000;
    Vue.use(IdleVue, {
        eventEmitter: eventsHub,
        store,
        idleTime:idleTimeout,
        startAtIdle: false
    });
}

import VueHtmlToPaper from 'vue-html-to-paper';

const options = {
    name: '_blank',
    specs: [
      'fullscreen=yes',
      'titlebar=yes',
      'scrollbars=yes'
    ],
    styles: [
      `${window.config.base}/vendor/panel/css/main.css`,
      `${window.config.base}/vendor/panel/css/vuesax.css`,
      `${window.config.base}/vendor/panel/css/print.css`,
    ]
}

Vue.use(VueHtmlToPaper, options);


Vue.mixin(require('./mixins/trans'))
Vue.mixin(require('./mixins/utils'))
Vue.mixin(require('./mixins/urlHelpers'))
Vue.directive("frag",vfrag)
// Vue.config.silent = true
const i18n = new VueI18n({
    locale: window.config.locale,
    messages:window.translations,
    silentTranslationWarn: true
})
export default class Iracode {
    #app;
    #routes;
    #router;
    constructor(config={}) {
      this.bus = new Vue()
      this.bootingCallbacks = []
      this.routingCallbacks=[]
      this.afterBootCallbacks=[]
      this.config=config;
      this.#routes=routes;
      this.$i18n=i18n;
    }

    /**
     * Register a callback to be called before Nova starts. This is used to bootstrap
     * addons, tools, custom fields, or anything else Nova needs
     */
    booting(callback) {
      this.bootingCallbacks.push(callback)
    }
    registeringRoutes(callback) {
        this.routingCallbacks.push(callback)
    }
    setRoutesCallback(callback){
        this.routesCallback=callback;
    }
    setRouteComponent(routeName,component,layout="main"){
        if(layout == "main"){
            const index=this.#routes[0].children.findIndex(item=>item.name==routeName);
            if(index > -1){
                this.#routes[0].children[index].component=component;
            }
        }
    }
    chunkArray(arr, size) {
        return Array.from({ length: Math.ceil(arr.length / size) }, (v, i) =>
            arr.slice(i * size, i * size + size)
        )
    }
    addRoute(route,layout="main"){
        if(layout == "main"){
            this.#routes[0].children.push(route);
        }else if(layout == "full_page"){
            this.#routes[1].children.push(route);
        }
    }

    getRoutes(){
        return this.#routes;
    }
    getByDotNotation(o, s,defaultString) {
        if(!o) return defaultString;
        return s.split('.').reduce((o,i)=>o[i] || defaultString, o);
        // s = s.replace(/\[(\w+)\]/g, '.$1'); // convert indexes to properties
        // s = s.replace(/^\./, '');           // strip a leading dot
        // var a = s.split('.');
        // for (var i = 0, n = a.length; i < n; ++i) {
        //     var k = a[i];
        //     if (k in o) {
        //         o = o[k];
        //     } else {
        //         return;
        //     }
        // }
        // return o || defaultString;
    }
    /**
     * Execute all of the booting callbacks.
     */
    boot() {
    //   if(this.routesCallback){
    //     this.#routes=this.routesCallback(this.#routes);
    //   }
      this.routingCallbacks.forEach(callback => callback(Vue, store))
      this.routingCallbacks=[]
      this.#router=createRouter(this.#routes,store);
      this.bootingCallbacks.forEach(callback => callback(Vue, this.#router, store))
      this.bootingCallbacks = []
    }
    afterBoot(callback){
        this.afterBootCallbacks.push(callback);
    }
    loading(){
        if(this.#app){
            this.#app.$vs.loading();
        }
    }
    progress_start(){
        if(this.#app){
            this.#app.$Progress.start()
        }

    }
    progress_stop(){
        if(this.#app){
            this.#app.$Progress.finish()
        }

    }
    validURL(str) {
        var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
          '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
          '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
          '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
          '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
          '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
        return !!pattern.test(str);
      }
    close_loading(){
        if(this.#app){
            this.#app.$vs.loading.close()
        }

    }
    toBool(value){
        return !!+value;
    }
    objToFormData(obj){
        const fd=new FormData();
        for(const key in obj){
            fd.append(key,obj[key])
        }
        return fd;
    }
    /**
     * Register the built-in Vuex modules for each resource
     */
    registerStoreModules() {
      this.config.resources.forEach(resource => {
        store.registerModule(resource.uriKey, resources)
      })
    }
    t(...params){
        return this.#app.$t(...params)
    }
    app(){
        return this.#app;
    }
    /**
     * Start the Nova app by calling each of the tool's callbacks and then creating
     * the underlying Vue instance.
     */
    start() {
      this.boot()
      this.#app = new Vue({
        //   vuetify,
        router:this.#router,
            store,
            i18n,
            render: h => h(App),
            async created() {

            },
            onIdle() {
                if(window.vuexy.session_locking){
                    this.$store.commit("UPDATE_LOCKED_STATE",true)
                    if(this.$route.name != "page-lock-screen"){
                        this.$router.push({name:"page-lock-screen"});
                    }
                }

            }

      }).$mount('#app')
      this.afterBootCallbacks.forEach(callback => callback(Vue, store,this.#app,this.#router))
      if(window.notifications){
        store.dispatch("SET_NOTIFICATIONS",window.notifications)

      }
    }
    goto(route){
        return this.#app.$router.push(route);
    }
    basename(value){
        return value ? value.split('/').reverse()[0]:"-";
    }
    getHttp(){
        return this.#app.$http;
    }
    /**
     * Return an axios instance configured to make requests to Nova's API
     * and handle certain response codes.
     */
    request(options) {
      if (options !== undefined) {
        return axios(options)
      }

      return axios
    }

    /**
     * Register a listener on Nova's built-in event bus
     */
    $on(...args) {
      this.bus.$on(...args)
    }

    /**
     * Register a one-time listener on the event bus
     */
    $once(...args) {
      this.bus.$once(...args)
    }

    /**
     * Unregister an listener on the event bus
     */
    $off(...args) {
      this.bus.$off(...args)
    }

    /**
     * Emit an event on the event bus
     */
    $emit(...args) {
      this.bus.$emit(...args)
    }

    /**
     * Show an error message to the user.
     *
     * @param {string} message
     */
    error(message) {
      this.#app.$vs.notify({
        text: message,
        color: 'danger'
      })
    //   Vue.toasted.show(message, { type: 'error' })
    }

    /**
     * Show a success message to the user.
     *
     * @param {string} message
     */
    success(message) {
        this.#app.$vs.notify({
            text: message,
            color: 'success'
        })
    //   Vue.toasted.show(message, { type: 'success' })
    }

    /**
     * Show a warning message to the user.
     *
     * @param {string} message
     */
    warning(message) {
        this.#app.$vs.notify({
            text: message,
            color: 'warning'
        })
    //   Vue.toasted.show(message, { type: '' })
    }


  }

;(function() {
    this.CreateIracode = function(config) {
        return new Iracode(config)
    }
}.call(window))
