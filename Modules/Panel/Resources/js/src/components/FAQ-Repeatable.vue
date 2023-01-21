<template>
    <div>
        <vue-repeater v-model="form.faqs"></vue-repeater>
    </div>
</template>
  
  <script>
  String.prototype.toEnglishDigits = function () {
          return this.replace(/[۰-۹]/g, d => '۰۱۲۳۴۵۶۷۸۹'.indexOf(d))
      }
  import VueRepeater from './vue-repeater/src/components/repeater'
  import './vue-repeater/dist/lib/vue-repeater.css'
//   Iracode.booting(function(vue){
//    
//   })
  
  
  export default {
      components: {VueRepeater},
      data(){
          const obj={
              form:{
                  faqs:[
                      {
                          name:"faq-item",
                          value:{}
                      }
                  ],
              }
          }
          return obj;
      },
    mounted(){
        console.log(this.userData)
    },
    watch:{
        // "form.faqs":{
        //     get () { return this.form.faqs },
        //     set (faqs) { ) }
        // }
        "form.faqs"(){
            this.$emit('input', this.form.faqs)
        }
    },
    async created() {
        this.form.faqs=window.config.settings.all.pages.faq;
    },
    computed:{
    
    },
    methods:{
       
    }
  }
  </script>
  <style >
  .repeater{
      width: 100%;
  }
  </style>
  