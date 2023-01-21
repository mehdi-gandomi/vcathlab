
export default {
    async created() {
        for(const key in this.inputs){
            if(this.inputs[key].field_type === "relation"){
                console.log(this.inputs[key])
                const {data}=await this.$http.get(this.inputs[key].searchUrl);
                if(data.success){
                    this.inputs[key].options=data.data.items;
                }
                // if(this.inputs[key].options.length){
                //     this.form[key]=this.inputs[key].options[0].id;
                //     this.inputs[key].selected=this.inputs[key].options[0];
                // }
            }
        }
    },
    methods: {
        populateFormFields(data) {
            const newFormData = {};
            const form = { ...this.form };
            console.log("populating",form,data)
            for (const key in form) {
                if (this.inputs[key]) {
                    if (this.inputs[key].field_type == "relation") {
                        newFormData[key] = data[key] !== undefined ? data[key] : "";
                        console.log(newFormData[key])
                        const index = this.inputs[key].options.findIndex(
                            op => op.id == data[key]
                        );
                        console.log("district",index,data[key],this.inputs[key].options)
                        if (index > -1)
                            this.inputs[key].selected = this.inputs[
                                key
                            ].options[index];
                    } else if (this.inputs[key].field_type == "select") {
                        newFormData[key] = data[key] !== undefined ? data[key] : "";
                        const index = this.inputs[key].options.findIndex(
                            op => op.value == data[key]
                        );
                        if (index > -1)
                            this.inputs[key].selected = this.inputs[
                                key
                            ].options[index];
                    }else if(["filepond","filepond_image"].includes(this.inputs[key].field_type)) {

                        if(this.inputs[key].files && Array.isArray(this.inputs[key].files)){
                            if(Array.isArray(data[key])){
                                console.log(data[key])
                                data[key].forEach(file => {
                                    this.inputs[key].files.push({
                                        source:this.serverUrl(file),
                                        // type:"local",
                                        // load: false,
                                        options: {
                                            type: 'local',
                                            load: false,  // ← File data will NOT be load
                                        }
                                    });
                                });

                            }else{
                                this.inputs[key].files.push({
                                    source:this.serverUrl(data[key]),
                                    // type:"local",
                                    // load: false,
                                    options: {
                                        type: 'local',
                                        load: false,  // ← File data will NOT be load
                                    }
                                });
                            }
                        }

                        if(Array.isArray(form[key])){
                            newFormData[key] = data[key] !== undefined ? (!Array.isArray(data[key]) ? []:data[key]) : "";
                        }else{
                            newFormData[key] = data[key] !== undefined ? data[key] : "";
                        }
                    }
                     else if (this.inputs[key].field_type != "password") {
                        newFormData[key] = data[key] !== undefined ? data[key] : "";
                    }
                }
            }
            this.form.populate(newFormData);
        }
    },
}
