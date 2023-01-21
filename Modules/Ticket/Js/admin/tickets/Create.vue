<template>
    <vx-card title="Create ticket">
    <div>

        <div class=" row">
            <label for="subject" >Subject: </label>
            <vs-input class="w-full"  required="required"  v-model="form.subject" type="text" id="subject"/>
        </div>
        <div class=" mt-4">
            <label for="content" >Description: </label>
            <quill-editor v-model="form.content" required="required" id="content" ></quill-editor>
        </div>
        <div class="form-row mt-5">
            <div class=" col-lg-4 row">
                <label for="priority" >Priority: </label>
                <select v-model="form.priority_id" class="form-control" required="required" >
                    <option v-for="(priority,key) in priorities" :key="key" :value="key">{{priority}}</option>
                </select>
            </div>
            <div class=" offset-lg-1 col-lg-4 row">
                <label for="category" >Category: </label>
                <select class="form-control" required="required" v-model="form.category_id">
                    <option v-for="(category,key) in categories" :key="key" :value="key">{{category}}</option>
                </select>
            </div>
        </div>
        <br>
        <div class=" row">
            <div class="col-lg-10 offset-lg-2">
                <vs-button href="/tickets" type="border">Back</vs-button>
                <vs-button color="primary" @click="createTicket">Send</vs-button>
            </div>
        </div>
    </div>
    </vx-card>
</template>
<<script>
import Form from '@external_modules/Panel/Resources/js/src/Form'
export default {
    data() {
        return {
            form:new Form({
                agent_id:"auto",
                category_id:1,
                priority_id:1,
                content:"",
                subject:"",
                _token:document.querySelector('meta[name="csrf-token"]').content
            })
        }
    },
    computed: {
        categories(){
            return window.config.categories;
        },
        priorities(){
            return window.config.priorities;
        }
    },
    methods: {
        async createTicket(){
            this.$vs.loading();
            const data=await this.form.post("/tickets");
            console.log(data)
            if (data.ok) {
                Iracode.success(this.__("Ticket created successfully"))
                this.$router.push("/user/tickets")
            }
            this.$vs.loading.close();
        }
    },
}
</script>
