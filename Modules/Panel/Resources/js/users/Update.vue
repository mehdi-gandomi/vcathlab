<template>
    <div class="mb-base">
        <vx-card >
            <template v-slot:actions>
                <vs-button color="primary" to="/panel/users" type="filled">{{__("Back")}}</vs-button>
            </template>
            <form @submit="onSubmit">
                <div class="vx-row mb-6">
                                                    <div class="vx-col w-1/2">
                    <div class="row flex">
                        <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                            <span>{{__("Email")}}</span>
                                                            <span class="ml-1 text-red">*</span>
                                                    </div>
                        <div class="vx-col w-3/4">
                                                            <component :is="inputs.email.type" v-model="form.email" class="w-full" :danger="hasValidationError('email')" :danger-text="validationError('email')" name="email" type="email"    />
                                                    </div>
                    </div>
                </div>
                                            </div>
    <div class="vx-row mb-6">
                                                    </div>
    <div class="vx-row mb-6">
                                                                        <div class="vx-col w-1/2">
                    <div class="row flex">
                        <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                            <span>{{__("State")}}</span>
                                                            <span class="ml-1 text-red">*</span>
                                                    </div>
                        <div class="vx-col w-3/4">
                                                                                                <vs-radio v-model="form.state" vs-name="state" vs-value="0">غیرفعال</vs-radio>
                                                                    <vs-radio v-model="form.state" vs-name="state" vs-value="1">فعال</vs-radio>
                                                                                    </div>
                    </div>
                </div>
                        </div>
    <div class="vx-row mb-6">
                                                    <div class="vx-col w-1/2">
                    <div class="row flex">
                        <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                            <span>{{__("Master")}}</span>
                                                            <span class="ml-1 text-red">*</span>
                                                    </div>
                        <div class="vx-col w-3/4">
                                                                                                <vs-radio v-model="form.master" vs-name="master" vs-value="0">ندارد</vs-radio>
                                                                    <vs-radio v-model="form.master" vs-name="master" vs-value="1">دارد</vs-radio>
                                                                                    </div>
                    </div>
                </div>
                                            </div>
    <div class="vx-row mb-6">
                                                    <div class="vx-col w-1/2">
                    <div class="row flex">
                        <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                            <span>{{__("Email Verified At")}}</span>
                                                    </div>
                        <div class="vx-col w-3/4">
                                                            <component :is="inputs.email_verified_at.type" v-model="form.email_verified_at" class="w-full" :danger="hasValidationError('email_verified_at')" :danger-text="validationError('email_verified_at')" name="email_verified_at" type="date"    />
                                                    </div>
                    </div>
                </div>
                                                                <div class="vx-col w-1/2">
                    <div class="row flex">
                        <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                            <span>{{__("Password")}}</span>
                                                            <span class="ml-1 text-red">*</span>
                                                    </div>
                        <div class="vx-col w-3/4">
                                                            <component :is="inputs.password.type" v-model="form.password" class="w-full" :danger="hasValidationError('password')" :danger-text="validationError('password')" name="password" type="password"    />
                                                    </div>
                    </div>
                </div>
                        </div>

                <div class="flex justify-end mt-16">
                    <div class="flex">
                        <vs-button color="success" @click="()=>onSubmit('close')" class="mr-3 mb-2">{{__('Save')}}</vs-button>
                        <vs-button color="warning"  class="mb-2" @click="form.reset()">{{__("Clear")}}</vs-button>
                    </div>
                </div>
            </form>
        </vx-card>
    </div>
</template>

<script>
    import Form from '@/Form';
import HasForm from '@/mixins/HasForm'
export default {
    components: {},
    mixins: [HasForm],
    data () {
        return {
            form:new Form({
                                                                                                                                                email:"",
                                                                                                                                                                                                                                                                                                                                                                    state:"0",
                                                                                                                                                                                        master:"0",
                                                                                                                                                                                                                                email_verified_at:"",
                                                                                                                                                                                                                        password:"",
                                                                                                                    }),
            model:"Modules\\Panel\\Models\\User",
            inputs:{
                                                            email:{
                        type:"vs-input",
                        field_type:"email",
                                                                                                                        },
                                                                                                                                                                                                                                state:{
                        type:"vs-radio",
                        field_type:"radio",
                                                                                                                        },
                                                                                master:{
                        type:"vs-radio",
                        field_type:"radio",
                                                                                                                        },
                                                                                                                    email_verified_at:{
                        type:"persian-date-picker",
                        field_type:"date",
                                                                                                                        },
                                                                                password:{
                        type:"vs-input",
                        field_type:"password",
                                                                                                                        },
                                                                },
        }
    },
    props: {
    //
    },
    computed: {
    //
    },
    async created () {
        const {data:response} =await this.$http.get(`/panel/api/users/${this.$route.params.id}`);
        if(response.success){
            const {data}=response;
            this.$store.dispatch("setCurrentResource",data);
            this.populateFormFields(data);
        }
    },
    mounted () {
    //
    },
    methods: {
        async onSubmit(action){
            const data =await this.form.put(`/panel/api/users/${this.$route.params.id}`);
            if(data.success){
                Iracode.success(this.__("User Updated Successfully"))
            }
            if(action == "close") this.$router.push("/panel/users");
            else this.form.reset();
        },
        populateFormFields(data){
            const newFormData={};
            const form={...this.form};
            for(const key in form){
                if(this.inputs[key]){
                    if(this.inputs[key].field_type == "relation"){
                        newFormData[key] = data[key] ? data[key]: "";
                        const index=this.inputs[key].options.findIndex(op=>op.id == 2);
                        if(index > -1) this.inputs[key].selected=this.inputs[key].options[index];
                    }
                    else if(this.inputs[key].field_type != "password"){
                        newFormData[key]=data[key] ? data[key]:"";
                    }
                }
            }
            this.form.populate(newFormData);
        }
    }

};

</script>
