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
                        <vs-button color="success" @click="()=>onSubmit('new')" class="mr-3 mb-2">{{__('Save and new')}}</vs-button>
                        <vs-button color="success" @click="()=>onSubmit('close')" class="mr-3 mb-2">{{__('Save and close')}}</vs-button>
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
            locale:Iracode.$i18n.locale,
            inputs:{
                                                            email:{
                        type:"vs-input",
                                                                                                },
                                                                                                                                                                                                                                state:{
                        type:"vs-radio",
                                                                                                },
                                                                                master:{
                        type:"vs-radio",
                                                                                                },
                                                                                                                    email_verified_at:{
                        type:"persian-date-picker",
                                                                                                },
                                                                                password:{
                        type:"vs-input",
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
    created () {
    //
    },
    mounted () {
    //
    },
    methods: {
        async onSubmit(action){
            const data =await this.form.post("/panel/api/users");
            if(data.success){
            Iracode.success(this.__("User Created Successfully"))
            if(action == "close") this.$router.push("/panel/users");
            else this.form.reset();
            }
        },

    }
};

</script>
