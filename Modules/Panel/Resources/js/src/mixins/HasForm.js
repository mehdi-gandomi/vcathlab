
export default {
    data(){
        return {
          uploadServer: {
                url: window.config.uploadBasePath,
                timeout: 36000000,
                load: (source, load, error, progress, abort, headers) => {
                    if(source.indexOf("/null") > -1) {
                        console.log("source",source);
                        abort()
                    };

                    var myRequest = new Request(source);
                    fetch(myRequest).then(function(response) {
                    response.blob().then(function(myBlob) {
                        load(myBlob)
                    });
                    });
                },
                process: {
                    url: '/process',
                    method: 'POST',
                    headers: {
                        "Authorization":`Bearer ${this.$store.state.auth.accessToken}`,
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                    },
                    withCredentials: false,
                    onload: (response) => {
                        if(typeof response != "object") response=JSON.parse(response);
                        console.log(this.inputs[response.field_name],response.field_name);
                        if(this.inputs[response.field_name]['filepond_options']['allow-multiple']){
                            this.form[response.field_name].push(response.key);
                        }else{
                            this.form[response.field_name]=response.key;
                        }
                        return response.key;
                    },
                    onerror: (response) => response.data,
                    ondata: (formData) => {
                        formData.append('model', this.model);
                        if(this.$route.params.id){
                            formData.append('model_id', this.$route.params.id);
                        }
                        return formData;
                    }
                },
                revert: 'revert',
                restore: 'restore',
                fetch: 'fetch'
            }
        }
    },
    methods: {
	    getRelationLabel(...args){
		    console.log(this, args);
		    // return op.title;
        },
        onRelationSelect(foreignKey,option,fieldKey="id"){
            this.inputs[foreignKey].selected =option;
            this.form[foreignKey]=option[fieldKey];
        },
        handleFilePondInit: function() {
            // FilePond instance methods are available on `this.$refs.pond`
            /* eslint-disable */
            console.log('FilePond has initialized');
        },
        onSelect(field,option){
            this.inputs[field].selected =option;
            this.form[field]=option.value;
        },
        async onRelationSearch(foreignKey,search,loading){
            if(search == "") return;
            loading(true);
            const input=this.inputs[foreignKey];
            const params={};
            if(input){
                params[`filter[${input.titleField}]`]=search;
            }
            const {data}=await this.$http.get(this.inputs[foreignKey].searchUrl,{params});

            if(data.success){
                this.inputs[foreignKey].options=data.data.items;
                return loading(false);
            }
            this.inputs[foreignKey].options=[];
         },
         hasValidationError(name) {
           return this.form.errors && this.form.errors.has(name) ? true : undefined;
         },
         validationError(name) {
           return this.form.errors ? this.form.errors.first(name) : undefined;
         },
         async onSelectTableSearch(field,search){
            if(search.length){
                const {data} =await this.$http.post(`${window.config.path_prefix}/api/get_select_table`,{...this.inputs[field].select_table_options,search});
                this.inputs[field].options=data.data;
            }

         }
    },
    async created() {
        console.log("before create called")
        for(const key in this.inputs){
            if(this.inputs[key].field_type === "relation"){
                console.log(this.inputs[key])
                const {data}=await this.$http.get(this.inputs[key].searchUrl);
                if(data.success){
                    this.inputs[key].options=data.data.items;
                }
                if(this.inputs[key].options.length){
                    if(!Array.isArray(this.inputs[key].selected)){
                        this.form[key]=this.inputs[key].options[0].id;
                        this.inputs[key].selected=this.inputs[key].options[0];
                    }
                }
            }
        }
    }
}
