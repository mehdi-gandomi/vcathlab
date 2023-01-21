<template>
  <loading-view :loading="Object.keys(data).length < 1">
    <vx-card :title="data.ticket.subject" >
        <template slot="actions">
            <div>
                <vs-button @click="markAsComplete" color="success">
                    Mark Complete
                </vs-button>
                <!-- <vs-button @click="editTicket" style="primary">
                    Edit
                </vs-button> -->
                <vs-button @click="deleteTicket" color="danger">
                    Delete
                </vs-button>
            </div>

        </template>
        <div class="ticket-details">
            <vs-row vs-type="flex" vs-w="12">
                <vs-col
                    vs-align="center"
                    vs-lg="6"
                >
                    <p><strong>Owner</strong>: {{data.ticket.user.name}}</p>
                    <p>
                        <strong>Status</strong>:
                        <span :style="{color: data.ticket.status.color}">{{data.ticket.status.name}}</span>
                    </p>
                    <p>
                        <strong>Priority</strong>:
                        <span :style="{color: data.ticket.priority.color}">{{data.ticket.priority.name}}</span>
                    </p>
                </vs-col>
                <vs-col
                    vs-align="center"
                    vs-lg="6"
                >
                    <p><strong>Responsible</strong>: {{data.ticket.agent.name}}</p>
                    <p>
                        <strong>Category</strong>:
                        <span :style="{color: data.ticket.category.color}"> {{data.ticket.category.name}} </span>
                    </p>
                    <p><strong>Created</strong>: {{data.ticket.human_created_at}}</p>
                    <p><strong>Last Update</strong>: {{data.ticket.human_updated_at}}</p>
                </vs-col>
            </vs-row>
        </div>
        <div class="ticket-content" v-html="data.ticket.html">

        </div>
    </vx-card>
      <div class="ticket-comments mt-8">
            <h4>{{__("Comments")}}</h4>
            <div>
                <vx-card class="my-3" :class="{'primary-card':(comment.user_id != data.ticket.user_id)}" v-for="(comment,key) in data.comments.data" :key="key" :title="comment.user.name">
                    <template slot="actions">
                        {{comment.human_created_at}}
                    </template>
                    <div v-html="comment.html">

                    </div>
                </vx-card>
            </div>
    </div>
      <div class="ticket-reply mt-8">
            <div>
                <vx-card >
                    <quill-editor v-model="form.content"></quill-editor>
                    <vs-button @click="reply" class="mt-4" color="primary" type="border">Reply</vs-button>
                </vx-card>
            </div>
    </div>
  </loading-view>
</template>
<script>

export default {
    data() {
        return {
            data:{},
            form:{
                content:"",
                ticket_id:0
            }
        }
    },
    async created() {
        Iracode.loading();
        const {data}=await this.$http.get(`/tickets/${this.$route.params.id}`);
        this.data=data.data;
        this.form.ticket_id=this.data.ticket.id;
        Iracode.close_loading();
    },
    methods: {
        async markAsComplete(){
            const {data}=await this.$http.get(`/tickets/${this.data.ticket.id}/complete`);
            if(data.ok){
                Iracode.success(this.__("Ticket marked as complete"))
            }
        },
        async reply(){
            this.$vs.loading();
            const {data:result}=await this.$http.post("/tickets-comment",this.form);
            const {data}=await this.$http.get(`/tickets/${this.$route.params.id}`);
            this.data=data.data;
            this.form.ticket_id=this.data.ticket.id;
            this.$vs.loading.close();
            Iracode.success(this.__("Comment created successfully"))
        },
        async deleteTicket(){
            const {value} = await this.$swal({
                title: this.__('Are you sure?'),
                text: this.__(`Do you want to delete this ticket ?`),
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: this.__("Yes"),
                cancelButtonText: this.__("Cancel")
            });
            if(value){
                const {data}=await this.$http.delete(`/tickets/${this.data.ticket.id}`);
                if(data.ok){
                    Iracode.success(this.__("Ticket deleted"))
                    this.$router.push("/user/tickets")
                }
            }
        }
    },
};
</script>
<style>
    .ticket-details{
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1.25rem;
        border: 1px solid rgba(0,0,0,.125);
        padding: 1rem;
        margin-bottom: 2rem;
        line-height: 2;
    }
    .vx-card.primary-card .vx-card__header{
        background-color: rgba(var(--vs-primary));
        color: #fff !important;
    }
    .vx-card.primary-card .vx-card__header h4{
        color: #fff !important
    }
</style>
