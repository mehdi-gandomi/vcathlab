import Vue from 'vue';
// :placeholder="params.column.colDef.headerName"
export default Vue.extend({
  template: `
      <vs-input type="text"  name="params.column.colDef.field" class="w-full" v-model="input" @input="onChange" />
    `,
    data(){
        return{
            input:""
        }
    },
    created(){
        this.input=this.$route.query[this.params.column.colDef.field] ? this.$route.query[this.params.column.colDef.field]:""
    },
    updated(){
        this.input=this.$route.query[this.params.column.colDef.field] ? this.$route.query[this.params.column.colDef.field]:""
    },
  mounted(){
    console.log(this.params)
  },
  methods:{
    onChange(value){
        // console.log(value)
        // if(value.length > 2){
        this.params.filterParams.context.componentParent.filter(this.params.column.colDef.field,value)
            // this.$emit("filterChanged",{
            //     filed:this.params.column.colDef.field,
            //     value
            // })
        // }
    }
  }
});
