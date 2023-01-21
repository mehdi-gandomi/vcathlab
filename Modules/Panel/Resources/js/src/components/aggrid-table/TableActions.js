import Vue from 'vue';

export default Vue.extend({
  template: `
    <td class="pr-6 align-middle block w-full">
        <div class="inline-flex items-center justify-center w-full h-full" >
            <vx-tooltip v-if="showDetailButton" :text="__('Show '+params.model)">
                <vs-button :to="detailsLink" color="primary" type="relief" style="margin:0 0.2rem" size="small" icon-pack="feather" icon="icon-eye"></vs-button>
            </vx-tooltip>
            <vx-tooltip v-if="showEditButton" :text="__('Edit '+params.model)">
                <vs-button :to="updateLink" color="warning" type="relief" style="margin:0 0.2rem" size="small" icon-pack="feather" icon="icon-edit"></vs-button>
            </vx-tooltip>
            <vx-tooltip v-if="showDeleteButton" :text="__('Delete '+params.model)">
                <vs-button @click="deleteItem" color="danger" type="relief" style="margin:0 0.2rem" size="small" icon-pack="feather" icon="icon-trash-2"></vs-button>
            </vx-tooltip>
        </div>
    </td>
    `,
  data: function() {
    return {
      value: null,
    };
  },
  methods: {
    async deleteItem(){
        const result=await this.$swal({
            title: this.__('Are you sure?'),
            text: this.__(`Do you want to delete this ${this.params.model} ?`),
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: this.__("Yes"),
            cancelButtonText: this.__("Cancel")
        });
        if(result.value){
            const {data:response} =await this.$http.delete(`${this.params.baseApiPath}/${this.params.modelPlural}/${this.params.data.id}`);
            if(response.success){
                Iracode.success(this.__(`${this.params.model} Deleted!`))
                // this.params.context.componentParent.refreshItems()
                this.params.context.componentParent.gridApi.purgeServerSideCache();
            }
        }
    }
  },
  mounted() {
      console.log(this.modelKeyName,"params",this.params)
  },
  computed:{
    modelKeyName(){
        return this.params.modelKeyName ? this.params.modelKeyName:"id";
    },
    detailsLink(){
        if(!this.params.data) return "";
        return `/${this.params.baseRoutePath}/${this.params.data[this.modelKeyName]}`
    },
    updateLink(){
        if(!this.params.data) return "";
        return `/${this.params.baseRoutePath}/${this.params.data[this.modelKeyName]}/edit`
    },
    showEditButton(){
        return this.params.showEditButton !== undefined ? this.params.showEditButton:true;
    },
    showDeleteButton(){
        return this.params.showDeleteButton !== undefined ? this.params.showDeleteButton:true;
    },
    showDetailButton(){
        return this.params.showDetailButton !== undefined ? this.params.showDetailButton:true;
    }
  }
});
