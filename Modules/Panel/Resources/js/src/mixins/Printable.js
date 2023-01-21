
export default {
    filters:{
        dateFormatter(value,data,field){
            const localedParam=`${field}_${Iracode.$i18n.locale}`;
            if(!data[localedParam]) return data[field];
            return data[localedParam];
        },
        relationFormatter(value,data,field){
            return Iracode.getByDotNotation(data,field,"-");
        },
        radioFormatter(value,data,field){
            let fieldDefinition=this.fields[field];
            value= typeof value == "boolean" ? +value:value;
            if(fieldDefinition && fieldDefinition.options && fieldDefinition.options.length){
                return fieldDefinition.options[value] ? fieldDefinition.options[value]:value;
            }
            return value;
        },
        selectFormatter(value,data,field){
            let fieldDefinition=this.fields[field];
            if(!fieldDefinition) return data[field];
            value= typeof value == "boolean" ? +value:value;
            if(fiefieldDefinition &&fieldDefinition.options && Object.keys(fiefieldDefinition.options).length){
                returnfieldDefinition.options[value] ?fieldDefinition.options[value]:value;
            }
            return value;
        }
    },
    computed: {
        logoUrl(){
            const logo=Iracode.setting ? Iracode.setting("logo","vendor/panel/assets/images/logo.png"):"vendor/panel/assets/images/logo.png";
            return this.serverUrl(logo);
        },
        site_name(){
            return Iracode.setting ? Iracode.setting("site_name","ایراکد"):"ایراکد";
        },
        currentDate(){
            return new Date().toLocaleDateString('fa-IR');
        },
        currentTime(){
            return new Date().toLocaleTimeString("fa-IR");
        }
    },
    mounted() {

    },
    async created() {
        const { data } = await this.$http.get(this.baseUrl,{
            params:this.$route.query
        });
        this.items=data.data.items;
        this.$http.post(`${window.config.path_prefix}/api/get-model-fields`,{
            model:this.model,
            module:this.module
        }).then(({data})=>{

            this.fields=data.data;
        });
    },
    methods: {
        print(){
            this.$htmlToPaper('crudPrint', null, () => { this.printed = true })
        }
    },
}
