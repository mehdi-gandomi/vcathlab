
export default {
    data() {
        return {
            fields:[],
            loading:true
        }
    },
    created() {
        this.$http.post(`${window.config.path_prefix}/api/get-model-fields`,{
            model:this.model,
            module:this.module
        }).then(({data})=>{
            this.fields=data.data;
        });
    },
    methods: {
        getRelation(relation){
            return this.__(Iracode.getByDotNotation(this.details,relation,"-"))
        },
        dateFormat(field){
            const localedParam=`${field}_${window.Iracode.$i18n.locale}`;
            if(!this.details[localedParam]) return this.details[field];
            return this.details[localedParam];
        },
        populateFormFields(data) {
            this.details = data;
        },
        radioFormat(field){
            let definedField=this.fields[field];
            let value=this.details[field];
            value= typeof value == "boolean" ? +value:value;
            if(definedField && definedField.options && definedField.options.length){
                return definedField.options[value] ? this.__(definedField.options[value]):this.__(value);
            }
            return this.__(value);
        },
        checkboxFormat(){

        },
        selectFormat(field){
            let definedField=this.fields[field];
            let value=this.details[field];
            value= typeof value == "boolean" ? +value:value;
            if(definedField && definedField.options && definedField.options.length){
                return definedField.options[value] ? this.__(definedField.options[value]):this.__(value);
            }
            return this.__(value);
        }
    },

}
