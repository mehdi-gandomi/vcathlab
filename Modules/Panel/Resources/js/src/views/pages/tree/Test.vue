<template>
<div class="tree-components" dir="rtl">
<vs-row class="tree-root">
  <vs-col class="tree-container" vs-lg="6" vs-md="6">
    <treeselect
      ref="tree"
      v-model="treeValue"
      :multiple="true"
      :options="tree"
      :always-open="true"
      :open-on-click="false"
      :max-height="treeHeight"
      :flat="true"
      @select="onSelect"
      @deselect="deSelect"
    >

      <label slot="option-label" slot-scope="{ node, labelClassName }" :class="labelClassName">
        <i :class="node.raw.icon"></i>
        {{ node.label}}
      </label>
    </treeselect>
  </vs-col>
  <vs-col vs-lg="6" vs-md="6">
	  <vx-card>
		<label>دسترسی های <label v-html="checkBoxTitle"> </label></label>
		<vs-checkbox color="primary" v-model="checkData[selectedId][0]" @change="checkForChecklick($event, 0)" ref="treeCheck0">مشاهده</vs-checkbox>
		<vs-checkbox color="success" v-model="checkData[selectedId][1]" @change="checkForChecklick($event, 1)" ref="treeCheck1">ثبت</vs-checkbox>
		<vs-checkbox color="warning" v-model="checkData[selectedId][2]" @change="checkForChecklick($event, 2)" ref="treeCheck2">ویرایش</vs-checkbox>
		<vs-checkbox color="danger" v-model="checkData[selectedId][3]" @change="checkForChecklick($event, 3)" ref="treeCheck3">حذف</vs-checkbox>
		<vs-checkbox color="dark" v-model="checkData[selectedId][4]" @change="checkForChecklick($event, 4)" ref="treeCheck4">گرفتن خروجی و فایل</vs-checkbox>
		<vs-checkbox color="#F80" v-model="checkData[selectedId][5]" @change="checkForChecklick($event, 5)" ref="treeCheck5">آپلود فایل</vs-checkbox>
	</vx-card>
</vs-col>
  </vs-row>
  </div>
</template>

<script>
import axios from 'axios';

const STATE_CHECKED = 2;
const STATE_UNCHECKED = 0;

let private_scope = {
	prevSelection: 0,
	findParent(checkBox) {
		while(checkBox.$parent) {
			if(~checkBox.$parent.$el.className.indexOf("tree-component"))
				return checkBox.$parent;
			checkBox = checkBox.$parent
		}
	},
	uniqueArray: inArray => Array.from(new Set(inArray)),
	components: {}, // save $refs to checkBoxes
	// selectedNodes: {},
	changing: {}, // ids of elemnts in changing
	watchers: {}, // callbacks
	watching: {}, // ids of currently running watch
	events: {},
	uncheck: {},
	origError: ()=>{}
};
export default {
	data() {
		return {
			treeValue: null,
			checkData: {0:this.boolArr([0,0,0,0,0,0])},
			selectedId: 0,
			tree: [],
			forest: {}
		}
	},
	computed: {
		treeHeight() {
			return window.innerHeight
		},
		checkBoxTitle() {
			return `<i class="${this.findBranchInTree(this.selectedId).icon}"></i> ${this.findBranchInTree(this.selectedId).label}`
		},
		checkedData() {
			return this.checkData[this.selectedId]
		},
		selectedTree() {
			return this.$refs.tree.menu.current
		}
	},
	watch: {
		selectedId(value, oldValue) {
			// console.log('#selectedId:', value);
		},
		checkedData() {}
	},
	methods: {
		/* onInput(...args) {
			console.log(args);
		}, */
		delay(miliseconds=100, callback=null) {
			return new Promise(resolve => {
				setTimeout(typeof callback == 'function' ? ()=> {callback(); resolve()} : resolve, miliseconds)
			})
		},
		/* clearAll() {
			this.forest.selectedNodeIds.every(node_id => {
				private_scope.selectedNodes[node_id]=true;
				this.setTreeCheck(node_id, STATE_UNCHECKED, true);
			});
		},
		async onTreeChange(e,a) {
			let selectedTree = this.selectedTree+"";
			await this.delay(100);
			console.log(this.forest.selectedNodeIds, selectedTree);
			this.clearAll();
			if(this.isSelected(selectedTree))
				console.log('Selected');
			else
				console.log('DSelected');
			// console.log(`#[EA]`, private_scope.uniqueArray(e), private_scope.uniqueArray([, ...a]))
		}, */
		onSelect(node, instanceId) {
			// this.setTreeCheck(node.id, STATE_UNCHECKED);
			(this.gs_data(node.id)); // refreshNodeId_Array
			if(private_scope.prevSelection == node.id) // reselecting fills all checkboxes
				this.gs_data(node.id,  [1,1,1,1,1,1]);
			this.$forceUpdate();
			this.selectedId = node.id;
			private_scope.prevSelection = this.selectedId;
			this.freshComponents();
			this.$forceUpdate();

			// console.log(node.id);
			// alert(node.label);
		},
		boolArr: (arr) => arr.map(v=>!!v),
		/* isSelected(node_id) {
			return this.forest.selectedNodes[node_id]
		}, */
		async deSelect(node, instanceId) {
			// this.setTreeCheck(node.id);
			/* if( ! this.forest.nodeMap[node.id].isRootNode) {
				let parentId = this.forest.nodeMap[node.id].parentNode.id;
				this.setTreeCheck(parentId, STATE_CHECKED, true);
			} */
			(this.gs_data(node.id)); // refreshNodeId_Array
			let elem;
			if(private_scope.prevSelection == node.id) // reselecting clear all checkboxes
				this.gs_data(node.id,  [0,0,0,0,0,0]);
			else {
				// +this.gs_data(node.id).map(v=> +v).join('')
				await this.delay(75);
				// check Th Box for related subsytem/menu
				this.setTreeCheck(node.id);
				private_scope.prevSelection = node.id;
			}
			this.selectedId = node.id;
			this.$forceUpdate();
			this.freshComponents();
		},
		async checkForChecklick(event, i){
			await this.delay(5);
			private_scope.events[this.selectedId] = event.target.checked;
			await this.delay(100);
			let itemProps = this.gs_data(this.selectedId, Object.entries(private_scope.components).map(v => v[1].$el.querySelector("input").checked)), elem;
			// i=-1;
				// console.log(`#${this.selectedId}`, itemProps);
			/* 	for(let _i in itemProps)
					if(itemProps[_i] != storedProps[_i]) { 
						i = _i;
						break;
					} */
				// ~i && 
			if(private_scope.uncheck[this.selectedId]) { // if Last Event was a "Check" event
				if(!this.forest.checkedStateMap[this.selectedId])
					// await this.delay(75);
					this.setTreeCheck(this.selectedId);
			}
			else {
				private_scope.uncheck[this.selectedId] = true;
				if(this.forest.checkedStateMap[this.selectedId]) 
					if(!+ itemProps.map(v=> +v).join('')) // if there is no checked
						this.setTreeCheck(this.selectedId, STATE_UNCHECKED);
			}
		},
		resetConsole() {
			let changing = false;
			for(let _i in private_scope.changing)
				if(private_scope.changing[_i]) {
					changing = true;
					break;
				}

			if(changing)
				return setTimeout(this.resetConsole, 10);

			console.error = private_scope.origError;
		},
		async freshVal(elem, newVal, _index) {
			if(elem.$el.querySelector("input").checked == newVal)
				return;

			try {
				console.error = private_scope.nullFunc;
				private_scope.changing[_index] = true;
				elem.value=!newVal;
				await this.delay(50);
				try {
					elem.value = newVal;
					private_scope.changing[_index] = false;
				} catch(e){}
				setTimeout(this.resetConsole, 10);
			} catch(e){}
		},
		/* watchAndCheck(component, selectedId, _checkBox) {
			function _unwatch($unwatch) {
				return ()=>{
					let isWatching = private_scope.watching[_checkBox];
					private_scope.watching[_checkBox] = false;
					if(isWatching)
						return setTimeout(_unwatch, 10);
					$unwatch();
				}
			}
			private_scope.watchers[_checkBox] = [this.selectedId, _unwatch(component.$watch('value', this.checkForChecklick))];
		}, */
		async freshComponents() {
			for(let _i in this.$refs)
				if(~_i.indexOf("treeCheck"))
					private_scope.components[_i] = this.$refs[_i] || {value:!0};

			await this.delay(100);
			for(let _checkBox in private_scope.components)
			{
				let value = this.gs_data()[+_checkBox.match(/\d/g).join("")],
				component = private_scope.components[_checkBox];
				// console.log(component);
				await this.freshVal(component, value, _checkBox);
				component.$forceUpdate();
			}
		},
		gs_data(node_id=0, value=null) {
			if(!node_id)
				node_id=this.selectedId;

			// console.log("data()", node_id, value);

			let hasValue = true; // false if this is an "init fill"
			if(!this.checkData[node_id]) {
				this.checkData[node_id]=[];
				value = [1,1,1,1,1,1];
				hasValue = false;
			}
			if(value) {
				// while(this.checkData[node_id].length)
				// 	this.checkData[node_id].pop();
				value.forEach && this.boolArr(value).forEach((state, index)=>this.checkData[node_id].splice(index,1,state)); // replace value in array by new Value
				if(this.forest.nodeMap[node_id].children)
					this.delay(25, ()=>{
						for(let childNode of this.forest.nodeMap[node_id].children)
							if(hasValue) // not autofilled
								this.gs_data(childNode.id, value);
							else
								if(!this.checkData[childNode.id]) // child has not data
									this.gs_data(childNode.id, value);

							// if(hasValue || !this.checkData[childNode.id])
							// 	this.gs_data(childNode.id, value);
					});
			}
			return this.checkData[node_id];
		},
		setTreeCheck(node_id, state=-1, onlyParent=false) {
			if(!~state)
				state = STATE_CHECKED;
			
			if(onlyParent)
				if(this.forest.nodeMap[node_id].children && ~this.forest.nodeMap[node_id].children.map(v => this.forest.checkedStateMap[v.id]).join('').indexOf("0"))
					state = STATE_UNCHECKED;

			this.forest.checkedStateMap[node_id] = state;

			if(onlyParent)
				return;

			if(this.forest.nodeMap[node_id].children)
				this.delay(25, ()=>{
					this.forest.nodeMap[node_id].children.map((v, index) => this.forest.checkedStateMap[index]).join('').indexOf("0")
						for(let childNode of this.forest.nodeMap[node_id].children)
							this.forest.checkedStateMap[childNode.id] = state;
				});
		},
		findBranchInTree(id/* branch */)
		{
			const NULL_OBJ = {icon:'', label:''};
			if(typeof id != 'string')
				return NULL_OBJ;
			let searcher = (obj)=>{
				var result = NULL_OBJ;
				for (var p in obj) {
					if (obj.id === id) {
						return obj;
					} else {
						if (typeof obj[p] === 'object') {
							result = searcher(obj[p]);
							if (result.label) {
								return result;
							}
						}
					}
				}
				return result;
			};
			return searcher(this.tree);
		}
	},
	created() {
		private_scope.nullFunc = private_scope.origError;
		private_scope.origError = console.error;
	},
	async mounted() {
		console.log(this.checkData);
		const {data} = await axios.get('/showTree');
		this.tree = data;
		this.forest = this.$refs.tree.forest;
		// this.$refs.tree.$watch('internalValue', this.onTreeChange);
		/* this.$nextTick(()=>{
			this.$refs.tree.$refs.menu.$children // only one level children, u can get nested level by $option.$children
				.filter(child => child.$options.name == "vue-treeselect--option")
				.every($option => );
		}); */

		// for(let _i in this.$refs)
		// 	if(~_i.indexOf("treeCheck"))
		// 		this.$refs[_i].$watch('value', this.checkForChecklick);
 		window._X_find = (branch) => this.findBranchInTree(branch);
		/*window.forceUpdate = () => this.$forceUpdate();
		window.forceUpdate = () => this.$forceUpdate(); */
	}
};
window._private_vars = private_scope;

</script>

<style lang="scss">
$treeselect-color: black;
.vue-treeselect__label-container:hover .vue-treeselect__checkbox--unchecked {
    border-color: $treeselect-color;
}
.vue-treeselect__checkbox--checked, .vue-treeselect__label-container:hover .vue-treeselect__checkbox--checked {
    border-color: $treeselect-color;
    background: $treeselect-color;
}
.tree-container {
  direction: ltr;
}
.tree-root {
	margin-top: 85px
}
.vue-treeselect__control {
	display: none !important;
}
</style>