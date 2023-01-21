import Vue from 'vue';
export default Vue.extend({
    name:"date-filter",
    template: `
          <div class="ag-input-wrapper custom-date-filter" role="presentation" ref="flatpickr">
                <persian-date-picker
                    :aria-label="ariaLabel"
                    :type="filterType"
                    :placeholder="placeholder"
                    @input="onDateChanged"
                    :clearable="true"
                    :inputFormat= "inputFormat"
                    :displayFormat= "displayFormat"
                    :format="format"
                ></persian-date-picker>
          </div>
      `,
    //   :value="date" @input="onDateChanged"
    data: function () {
      return {
        date: null,
        placeholder:"",
        ariaLabel:""
      };
    },
    beforeMount() {},
    mounted() {
        // console.log(this)
    },
    computed: {
        filterType(){
            return this.params.filterParams.type ? this.params.filterParams.type:"datetime";
        },
        inputFormat(){
            if(this.params.filterParams.type == "date"){
                return "Y-M-D";
            }
            return "Y-M-D H:i:s";
        },
        displayFormat(){
            if(this.params.filterParams.type == "date"){
                return "jYYYY-jMM-jDD";
            }
            return "jYYYY-jMM-jDD HH:mm";
        },
        format(){
            if(this.params.filterParams.type == "date"){
                return "Y-M-D";
            }
            return "Y-M-D HH:mm:ss";
        }

    },
    methods: {
      onDateChanged(selectedDate) {
        //   console.log("date",selectedDate)
        // this..date=selectedDate;
        // this.$store.dispatch("updateCrudFilter",{model:this.params.filterParams.context.componentParent.model,column:})
        // if(!window.dateFilter) window.dateFilter={};
        // window.dateFilter[]
        // window.lastDateSelected=selectedDate;
        this.params.onDateChanged();
        this.date=selectedDate;
      },
      getModel(){
        return {type:"daye"};
      },
      getDate() {
        //   return this.date;
        if(typeof this.date == "object") return this.date;
        if(this.date){
            return new Date(this.date);
        }else{
            return new Date(window.lastDateSelected);
        }
      },

      setDate(date) {
        console.log("set date",this.date)
        this.date = date || "";
      },

      setInputPlaceholder(placeholder) {
        this.placeholder=placeholder;
      },

      setInputAriaLabel(label) {
        this.ariaLabel=label;
      },
    },
  });
