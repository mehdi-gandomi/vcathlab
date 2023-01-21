const Vue = window.Vue;

export default Vue.extend({
  template: `
    <td class="pr-6 align-middle block w-full">
        <div class="inline-flex items-center justify-center w-full h-full" >
            <div class="inline-flex" v-if="showButtonAtStart && params.buttons && params.buttons.length">
                <vx-tooltip v-for="(button, i) in params.buttons" v-if="!handleCallbackOrValue(button.disable)" :key="i" :text="handleCallbackOrValue(button.text)">
                    <vs-button :class="handleCallbackOrValue(button.class)"  target :href="isHref(button.link) ? handleCallbackOrValue(button.link):undefined" :to="!isHref(button.link) && button.link && button.link.call(getInstance())" @click="button.callback && button.callback.call(getInstance())" :color="handleCallbackOrValue(button.color)" type="relief" style="margin:0 0.2rem" size="small" v-bind="button.$attrs && button.$attrs"><i v-if="button.icon_class || button.icon" :class="button.icon_class ? handleCallbackOrValue(button.icon_class) : 'far fa-lg fa-'+handleCallbackOrValue(button.icon)"/>
                      <span v-if="!button.icon && button.text">{{handleCallbackOrValue(button.text)}}</span>
                    </vs-button>
                </vx-tooltip>
            </div>
            <vx-tooltip v-if="showDetailButton" :text="__('Show '+params.model)">
                <vs-button :to="detailsLink" color="primary" type="relief" style="margin:0 0.2rem" size="small" icon-pack="feather" icon="icon-eye"></vs-button>
            </vx-tooltip>
            <vx-tooltip v-if="showEditButton" :text="__('Edit '+params.model)">
                <vs-button :to="updateLink" color="warning" type="relief" style="margin:0 0.2rem" size="small" icon-pack="feather" icon="icon-edit"></vs-button>
            </vx-tooltip>
            <vx-tooltip v-if="showDeleteButton" :text="__('Delete '+params.model)">
                <vs-button @click="deleteItem" color="danger" type="relief" style="margin:0 0.2rem" size="small" icon-pack="feather" icon="icon-trash-2"></vs-button>
            </vx-tooltip>
            <div class="inline-flex" v-if="showButtonAtEnd  && params.buttons && params.buttons.length">
                <vx-tooltip v-for="(button, i) in params.buttons" v-if="!handleCallbackOrValue(button.disable)" :key="i" :text="handleCallbackOrValue(button.text)">
                <vs-button :class="handleCallbackOrValue(button.class)" target :href="isHref(button.link) ? handleCallbackOrValue(button.link):undefined" :to="!isHref(button.link) && button.link && button.link.call(getInstance())" @click="button.callback && button.callback.call(getInstance())" :color="handleCallbackOrValue(button.color)" type="relief" style="margin:0 0.2rem" size="small" v-bind="button.$attrs && button.$attrs"><i v-if="button.icon_class || button.icon" :class="button.icon_class ? handleCallbackOrValue(button.icon_class) : 'far fa-lg fa-'+handleCallbackOrValue(button.icon)"/>
                <span v-if="!button.icon && button.text">{{handleCallbackOrValue(button.text)}}</span>
                </vs-button>
                </vx-tooltip>
            </div>
        </div>
    </td>
    `,
  data: () => ({
    value: null,
  }),
  methods: {
    getInstance() {
      return this;
    },
    handleCallbackOrValue(val) {
      return typeof val == "function" ? val.call(this) : val;
    },
    async deleteItem() {
      const result = await this.$swal({
        title: this.__("Are you sure?"),
        text: this.__(`Do you want to delete this ${this.params.model} ?`),
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: this.__("Yes"),
        cancelButtonText: this.__("Cancel"),
      });
      if (result.value) {
        const { data: response } = await this.$http.delete(
          `${this.params.baseApiPath}/${this.params.modelPlural}/${this.params.data.id}`
        );
        if (response.success) {
          Iracode.success(this.__(`${this.params.model} Deleted!`));
          // this.params.context.componentParent.refreshItems()
          this.params.context.componentParent.gridApi.purgeServerSideCache();
        }
      }
    },
    isHref(link) {
      if (typeof link == "function") link = link.call(this);
      if (!link) return false;
      link = (link + "").trim().toLowerCase();
      console.log("link",link)
      let url;
      try {
        url = new URL(link);
        console.log(url)
      } catch (_) {
        return false;
      }
      console.log("url bool",(url.protocol === "http:" || url.protocol === "https:"))
      return url.protocol === "http:" || url.protocol === "https:";
    },
  },
  computed: {
    modelKeyName(){
        return this.params.modelKeyName ? this.params.modelKeyName:"id";
    },
    detailsLink() {
      if (!this.params.data) return "";
      return `/${this.params.baseRoutePath}/${this.params.data[this.modelKeyName]}`;
    },
    updateLink() {
      if (!this.params.data) return "";
      return `/${this.params.baseRoutePath}/${this.params.data[this.modelKeyName]}/edit`;
    },
    showEditButton() {
      return this.params.showEditButton !== undefined
        ? this.params.showEditButton
        : true;
    },
    showDeleteButton() {
      return this.params.showDeleteButton !== undefined
        ? this.params.showDeleteButton
        : true;
    },
    showDetailButton() {
      return this.params.showDetailButton !== undefined
        ? this.params.showDetailButton
        : true;
    },
    showButtonAtStart() {
        return this.params.showButtonsAtStart !== undefined
          ? this.params.showButtonsAtStart
          : false;
      },
      showButtonAtEnd() {
        return this.params.showButtonsAtEnd !== undefined
          ? this.params.showButtonsAtEnd
          : (this.params.showButtonsAtStart === true ? false: true);
      },
  },
});
