<template>
  <div>
    <input type="hidden" :id="`vueicon_${name}`" :name="`vueicon_${name}`" :value="icon" />
  </div>
</template>

<script>
import $ from '@node_modules/jquery';
import fontIconPicker from '@node_modules/@fonticonpicker/fonticonpicker';
import trans from '@/mixins/trans';
let __ = trans.methods.__;
fontIconPicker($); // register to jQuery

let $picker = null,
selectedIcon = "";
export default {
	name: "iracode-icon-picker",
	props: { name: { type: String, default: () => ("element") }, value: { type: String, default: () => ("") }, allCategoryText  : { type: String, default: () => __("From all categories") }, unCategorizedText: { type: String, default: () => __("Uncategorized") }, searchPlaceholder: { type: String, default: () => __("Search Icons") } },
	computed: {
		icon: {
			set(icon=null){
				if(icon) {
					$picker.setIcon(icon);
				}
				return $picker;
			},
			get() {
				return selectedIcon || this.value
			}
		}
	},
	async mounted() {
		let vm$emit = (method, param) => this.$emit(method, param);
		$picker = $(`#vueicon_${this.name}`).fontIconPicker({
			allCategoryText: this.allCategoryText,
			unCategorizedText: this.unCategorizedText,
			searchPlaceholder: this.searchPlaceholder,
		}).on("change", function() {vm$emit('input', (selectedIcon = $(this).val()))});
		// Get the JSON file
        		const {data: categories} = await this.$http.get('/fontawesome-icons.json');
		const categoryNames = Object.keys(categories); // store initial data
		// to List Names => categoryNames.map(cat => `'Icons-${cat}': '${cat}'`).join(",\n")
		// Re-Set icons
		if(categories) {
			for(let categoryName of categoryNames) {
				categories[__(`Icons-${categoryName}`)] = categories[categoryName];
				delete categories[categoryName];
			}
		        $picker.setIcons(categories);
		}
	}
};
</script>

<style>
/* @import url('/css/fonticonpicker.css'); */
@import url('/vendor/panel/css/fontawesome.css');
</style>
