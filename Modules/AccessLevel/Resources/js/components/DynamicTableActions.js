const Vue = window.Vue;

export default Vue.extend({
  template: `
    <td class="pr-6 align-middle block w-full">
	<span v-if="params.exposeRowId" class="row-id" :data-id="params.data.id"/>
        <div class="inline-flex items-center justify-center w-full" >
            <vx-tooltip v-for="(button, i) in params.buttons" v-if="!handleCallbackOrValue(button.disable)" :key="i" :text="handleCallbackOrValue(button.text)">
		<vs-button :href="isHref(button.link) && button.link" :to="button.link && button.link.call(getInstance())" @click="button.callback && button.callback.call(getInstance())" :color="handleCallbackOrValue(button.color)" type="relief" style="margin:0 0.2rem" size="small" v-bind="button.$attrs && button.$attrs"><i v-if="button.class || button.icon" :class="button.class ? handleCallbackOrValue(button.class) : 'far fa-lg fa-'+handleCallbackOrValue(button.icon)"/></vs-button>
	</vx-tooltip>
        </div>
    </td>
    `,
  data: () => ({
	value: null,
 }),
  methods: {
    getInstance() {
	return this
    },
    handleCallbackOrValue(val) {
	    return (typeof val == "function") ? val.call(this) : val
    },
    isHref(link) {
	if(typeof link == "function")
		link = link.call(this);
	if(!link)
	    	return false;
	link = (link+"").trim().toLowerCase();
	return link.substr(0, 2) == "//" || link.substr(0, 4) == "www." || ~link.indexOf("http:") || ~link.indexOf("https:");
    }
  }
});
