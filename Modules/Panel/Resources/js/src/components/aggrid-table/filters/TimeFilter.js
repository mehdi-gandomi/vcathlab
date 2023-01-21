import Vue from 'vue';
import "./SelectFilter.scss";
export default Vue.extend({
  template: `
    <div >
      <div class="ag-filter-body-wrapper ag-simple-filter-body-wrapper centerx labelx">
         <div class="ag-input-wrapper custom-date-filter" role="presentation" ref="flatpickr">
                <persian-date-picker
                    type="time"
                    v-model="from"
                    :clearable="true"
                    inputFormat= "HH:mm"
                    displayFormat= "HH:mm"
                    format="HH:mm"
                ></persian-date-picker>

          </div>
          <div class="ag-input-wrapper custom-date-filter" role="presentation" ref="flatpickr">
            <persian-date-picker
                type="time"
                v-model="to"
                :clearable="true"
                inputFormat= "HH:mm"
                displayFormat= "HH:mm"
                format="HH:mm"
            ></persian-date-picker>

          </div>

      </div>
      <div class="ag-filter-apply-panel">
        <button type="button" @click="applyFilter"  ref="applyFilterButton" class="ag-standard-button ag-filter-apply-panel-button">{{__("Apply Filter")}}</button>
      </div>
    </div>
  `,
  data() {
    return {
      from:0,
      to:0,
      valueGetter: null
      // showFilter:true
      // v-if="showFilter"
    };
  },
  methods: {
    isFilterActive() {
      return (this.from !== null && this.from !== undefined && this.from !== '') && (this.to !== null && this.to !== undefined && this.to !== '');
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
        console.log(this.from,this.to)
      return { from: this.from,to:this.to,filterType:"timeRange" };
    },

    setModel(model) {
        console.log(model)
        if(model){
           this.from=model.from;
           this.to=model.to;
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
    this.valueGetter = this.params.valueGetter;
  },
});
