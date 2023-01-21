<template>
  <div class="tree-components" dir="rtl">
    <vs-row class="tree-root">
      <vs-col class="tree-container" vs-lg="6" vs-md="6">
        <treeselect
          ref="tree"
          :value="treeValue"
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
            {{ node.label }}
          </label>
        </treeselect>
      </vs-col>
      <vs-col vs-lg="6" vs-md="6">
        <vx-card style="box-shadow: none;">
          <label>دسترسی های <label v-html="checkBoxTitle"> </label></label>
          <vs-checkbox
            v-for="(item, index) in checkboxes"
            :key="index"
            :color="item[1]"
            v-model="checkData[_selectedId][index]"
            @change="checkForChecklick($event, index)"
            :ref="`treeCheck${index}`"
            >{{ item[0] }}</vs-checkbox
          >
        </vx-card>
      </vs-col>
    </vs-row>
  </div>
</template>

<script>
import Vue from 'vue';
import Vuex, { mapState, mapMutations } from 'vuex';
import * as VueDeepSet from 'vue-deepset';
import trans from '@/mixins/trans';
import VueTree from '@riophae/vue-treeselect';
import '@riophae/vue-treeselect/dist/vue-treeselect.css';

Vue.use(Vuex);
Vue.use(VueDeepSet);
Vue.component('treeselect', VueTree);

const STATE_CHECKED = 2;
const STATE_UNCHECKED = 0;

const store = new Vuex.Store({
  state: {
    treeValue: [],
    checkData: {},
  },
  mutations: VueDeepSet.extendMutation({
    updateValue(state, value) {
      state.treeValue = value;
    },
    updateChecked(state, value) {
      let _i;
      for (_i in state.checkData) {
        state.checkData[_i] = [];
        delete state.checkData[_i];
      }
      for (_i in value) state.checkData[_i] = value[_i];
    },
  }),
});

let private_scope = {
  prevSelection: 0,
  findParent(checkBox) {
    while (checkBox.$parent) {
      if (~checkBox.$parent.$el.className.indexOf('tree-component')) return checkBox.$parent;
      checkBox = checkBox.$parent;
    }
    return null;
  },
  uniqueArray: (inArray) => Array.from(new Set(inArray)),
  boolVar: (val) => !!+val,
  boolMap: (val) => {
    if (val.constructor == Array)
      return val.map((v) => private_scope[`bool${typeof v != 'object' ? 'Var' : 'Map'}`](v));
    let result = {};
    return (
      Object.entries(val).forEach(
        (v) =>
          (result[v[0]] = private_scope[`bool${typeof v[1] != 'object' ? 'Var' : 'Map'}`](v[1]))
      ),
      result
    );
  },
  abilitiesToPermissions: (abilities) =>
    private_scope.boolMap({ 0: [0, 0, 0, 0, 0, 0], ...abilities }), // Main Part of job done in Laravel
  components: {}, // save $refs to checkBoxes
  changing: {}, // ids of elements in changing
  events: {},
  origError: () => {},
};

let __ = trans.methods.__;
export default {
  store,
  data: () => ({
    selectedId: 0,
    tree: [],
    forest: {},
    checkboxes: [
      [__('Index'), 'primary'],
      [__('Create'), 'success'],
      [__('Update'), 'warning'],
      [__('Delete'), 'danger'],
      [__('Export'), 'dark'],
      [__('Upload'), '#F80'],
    ],
    // checked: {}
  }),
  props: { permissions: { type: Object, default: () => ({}) } },
  watch: {
    permissions(newPermissions) {
      this.clearAll();
      // if(newPermissions.constructor == Object)
      Object.entries(newPermissions).forEach((permission) => {
        let node_id = permission[0];
        this.removeValue(node_id);
        this.$vuexSet(`checkData.${node_id}`, private_scope.boolMap(permission[1]));
        this.appendValue(node_id);
      });
    },
  },
  computed: {
    ...mapState(['treeValue']),
    checkData() {
      return this.$deepModel('checkData');
    },
    _selectedId() {
      let selectedId = this.selectedId;
      if (!this.checkData[selectedId])
        this.$vuexSet(`checkData.${selectedId}`, private_scope.boolMap([0, 0, 0, 0, 0, 0]));
      return selectedId;
    },
    treeHeight() {
      return window.innerHeight;
    },
    checkBoxTitle() {
      return `<i class="${this.findBranchInTree(this.selectedId).icon}"></i> ${
        this.findBranchInTree(this.selectedId).label
      }`;
    },
    selectedTree() {
      return this.$refs.tree.menu.current;
    },
  },
  methods: {
    ...mapMutations(['updateValue', 'updateChecked']),
    appendValue(node_id) {
      let selected = this.treeValue.slice(0);
      selected.push(node_id);
      this.updateValue(private_scope.uniqueArray(selected));
    },
    removeValue(node_id) {
      let selected = this.treeValue.slice(0),
        where;
      if (~(where = selected.indexOf(node_id)))
        selected[where] =
          where > 0 ? selected[0] : where != 1 && selected.length > 1 ? selected[1] : null; // refill position with duplicate values from array and
      this.updateValue(private_scope.uniqueArray(selected)); // ... it will be remove duplicated
    },
    isSelected(node_id) {
      return ~this.treeValue.indexOf(node_id);
    },
    delay(miliseconds = 100, callback = null) {
      return new Promise((resolve) => {
        setTimeout(
          typeof callback == 'function'
            ? () => {
                callback();
                resolve();
              }
            : resolve,
          miliseconds
        );
      });
    },
    clearAll() {
      this.updateChecked({});
      this.updateValue([]);
    },
    onSelect(node, instanceId) {
      this.gs_data(node.id); // refreshNodeId_Array
      if (private_scope.prevSelection == node.id)
        // reselecting fills all checkboxes
        this.gs_data(node.id, [1, 1, 1, 1, 1, 1]);
      this.appendValue(node.id);
      this.$forceUpdate();
      this.selectedId = node.id;
      private_scope.prevSelection = this.selectedId;
      this.freshComponents();
      this.$forceUpdate();
    },
    deSelect(node, instanceId) {
      this.gs_data(node.id); // refreshNodeId_Array
      let elem;
      if (private_scope.prevSelection == node.id) {
        // reselecting clear all checkboxes
        this.gs_data(node.id, [0, 0, 0, 0, 0, 0]);
        this.removeValue(node.id);
      } else {
        // +this.gs_data(node.id).map(v=> +v).join('')
        this.delay(40, () => {
          // check Th Box for related subsytem/menu
          this.appendValue(node.id);
          private_scope.prevSelection = node.id;
        });
      }
      this.selectedId = node.id;
      this.$forceUpdate();
      this.freshComponents();
    },
    async checkForChecklick(event, i) {
      await this.delay(5);
      private_scope.events[this.selectedId] = event.target.checked;
      await this.delay(100);
      let itemProps = this.gs_data(
        this.selectedId,
        Object.entries(private_scope.components).map((v) => v[1].$el.querySelector('input').checked)
      );
      if (private_scope.events[this.selectedId]) {
        // if Last Event was a "Check" event
        if (!this.isSelected(this.selectedId)) await this.delay(75);
        this.appendValue(this.selectedId);
      } else {
        private_scope.events[this.selectedId] = true;
        if (this.isSelected(this.selectedId))
          if (!+itemProps.map((v) => +v).join(''))
            // if there is no checked
            this.removeValue(this.selectedId);
      }
    },
    resetConsole() {
      let changing = false;
      for (let _i in private_scope.changing)
        if (private_scope.changing[_i]) {
          changing = true;
          break;
        }

      if (changing) return setTimeout(this.resetConsole, 10);

      console.error = private_scope.origError;
    },
    async freshVal(elem, newVal, _index) {
      if (elem.$el.querySelector('input').checked == newVal) return;

      try {
        console.error = private_scope.nullFunc;
        private_scope.changing[_index] = true;
        elem.value = !newVal;
        await this.delay(50);
        try {
          elem.value = newVal;
          private_scope.changing[_index] = false;
        } catch (e) {}
        setTimeout(this.resetConsole, 10);
      } catch (e) {}
    },
    async freshComponents() {
      for (let _i in this.$refs)
        if (~_i.indexOf('treeCheck'))
          private_scope.components[_i] = this.$refs[_i][0] || { value: !0 };

      await this.delay(100);
      for (let _checkBox in private_scope.components) {
        let value = this.gs_data()[+_checkBox.match(/\d/g).join('')],
          component = private_scope.components[_checkBox];
        await this.freshVal(component, value, _checkBox);
        component.$forceUpdate();
      }
    },
    gs_data(node_id = 0, value = null) {
      if (!node_id) node_id = this.selectedId;

      let hasValue = true; // false if this is an "init fill"
      if (!this.checkData[node_id]) {
        value = [1, 1, 1, 1, 1, 1];
        hasValue = false;
      }
      if (value) {
        if (value.forEach) this.$vuexSet(`checkData.${node_id}`, private_scope.boolMap(value));
        // this.checkData[node_id] = value;///private_scope.boolMap(value);///.forEach((state, index)=>this.checkData[node_id].splice(index,1,state)); // replace value in array by new Value
        if (this.forest.nodeMap[node_id] && this.forest.nodeMap[node_id].children)
          this.delay(25, () => {
            for (let childNode of this.forest.nodeMap[node_id].children)
              if (hasValue)
                // not autofilled
                this.gs_data(childNode.id, value);
              else if (!this.checkData[childNode.id])
                // child has not data
                this.gs_data(childNode.id, value);
          });
      }
      return this.checkData[node_id];
    },
    setTreeCheck(node_id, state = -1) {
      if (!~state) state = STATE_CHECKED;

      this.forest.checkedStateMap[node_id] = state;

      /*
			 if(this.forest.nodeMap[node_id].children)
				this.delay(25, ()=>{
					this.forest.nodeMap[node_id].children.map((v, index) => this.forest.checkedStateMap[index]).join('').indexOf("0")
						for(let childNode of this.forest.nodeMap[node_id].children)
							this.forest.checkedStateMap[childNode.id] = state;
				}); */
    },
    findBranchInTree(id /* branch */) {
      const NULL_OBJ = { icon: '', label: '' };
      if (typeof id != 'string') return NULL_OBJ;
      let searcher = (obj) => {
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
    },
  getPermissions() {
    let resultPermissions = {},
      selected = this.treeValue.slice(0),
      node_id;
    for (node_id in this.checkData)
      if (~selected.indexOf(node_id))
      	resultPermissions[node_id] = this.checkData[node_id];
    return resultPermissions;
  },
  },
  created() {
    // console.log('iVue#', this);
    private_scope.nullFunc = private_scope.origError;
    private_scope.origError = console.error;
  },
  async mounted() {
    // console.log(this.checkData);
    this.$vuexSet('checkData.0', private_scope.boolMap([0, 0, 0, 0, 0, 0]));
    // private_scope.boolMap({0: [0,0,0,0,0,0], ...this.permissions
    // if(this.permissions)
    // 	this.checkData = private_scope.abilitiesToPermissions(this.permissions);
    const { data } = await this.$http.get('/admin/getTree');
    this.tree = data;
    this.forest = this.$refs.tree.forest;
    /* this.$nextTick(()=>{
			this.$refs.tree.$refs.menu.$children // only one level children, u can get nested level by $option.$children
				.filter(child => child.$options.name == "vue-treeselect--option")
				.every($option => );
		}); */

    window._X_find = (branch) => this.findBranchInTree(branch);
  },
};
window._private_vars = private_scope;
</script>

<style lang="scss">
$treeselect-color: black;

.tree-components {
  margin-top: -15px;
}

.vue-treeselect__label-container:hover .vue-treeselect__checkbox--unchecked {
  border-color: $treeselect-color;
}
.vue-treeselect__checkbox--checked,
.vue-treeselect__label-container:hover .vue-treeselect__checkbox--checked {
  border-color: $treeselect-color;
  background: $treeselect-color;
}
.tree-container {
  direction: ltr;
}
.vue-treeselect__control {
  display: none !important;
}
[dir='rtl'] .vue-treeselect,
.vue-treeselect--open-below:not(.vue-treeselect--append-to-body) .vue-treeselect__menu-container {
  position: initial;
}
[dir='rtl'] .vue-treeselect--open-below .vue-treeselect__menu {
  position: relative;
  border: 0;
}
</style>
