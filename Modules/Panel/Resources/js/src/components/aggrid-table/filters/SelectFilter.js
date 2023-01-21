import "./SelectFilter.scss";
export default Vue.extend({
  template: `
    <div >
      <div class="ag-filter-body-wrapper ag-simple-filter-body-wrapper">
          <v-select v-if="shouldBeMultiple" ref="input" v-model="values"  :reduce="field => field.value" :options="options" :multiple="true"></v-select>
          <v-select v-else ref="input" v-model="value" :reduce="field => field.value" :options="options"></v-select>
      </div>
      <div class="ag-filter-apply-panel">
        <button type="button" @click="applyFilter"  ref="applyFilterButton" class="ag-standard-button ag-filter-apply-panel-button">{{__("Apply Filter")}}</button>
      </div>
    </div>
  `,
  data() {
    return {
      value: '',
      values: [],
      valueGetter: null,
      options:[],
      // showFilter:true
      // v-if="showFilter"
    };
  },
  methods: {
    isFilterActive() {
      return this.value !== null && this.value !== undefined && this.value !== '';
    },
    applyFilter(){
      this.params.filterChangedCallback();
      // this.params.closeOnApply=true;
      // if(this.params.closeOnApply){
      //   this.showFilter=false;
      // }
    },
    doesFilterPass(params) {
      return (
        !this.value ||
        this.value
          .toLowerCase()
          .split(' ')
          .every((filterWord) => {
            return (
              this.valueGetter(params.node)
                .toString()
                .toLowerCase()
                .indexOf(filterWord) >= 0
            );
          })
      );
    },

    getModel() {
      if(this.shouldBeMultiple){
        return { value: this.values,filterType:"multi_select" };
      }
      return { value: this.value,filterType:"select" };
    },

    setModel(model) {
        if(!model){
            this.value="";
            this.values=[];
            return;
        }
        if(this.shouldBeMultiple){
            this.values=model.value;
        }else{
            this.value = model.value;
        }
    },

    afterGuiAttached() {
    //     console.log(this.$refs)
    //   this.$refs.input.focus();
    },

    componentMethod(message) {
      alert(`Alert from PartialMatchFilterComponent ${message}`);
    },
  },
  computed:{
    shouldShowApplyButton(){
        return this.params.buttons && this.params.buttons.length && this.params.buttons.indexOf("apply") > -1;
    },
    shouldBeMultiple(){
        return this.params.type=="multi_select";
    }
  },
  watch: {
    value: function (val, oldVal) {
      if (val !== oldVal && !this.shouldShowApplyButton) {
        this.params.filterChangedCallback();
      }
    },
  },
  async created() {
    if(!this.params.values){
        const {data}=await this.$http.post(`${window.config.path_prefix}/api/filter/values`,{
            model:this.params.model,
            module:this.params.module,
            column:this.params.colDef.field
        });
        this.options=data;
    }else{
        if(typeof this.params.values == "function"){

        }else{
            this.options=this.params.values;
        }
    }
    this.valueGetter = this.params.valueGetter;
  },
});
