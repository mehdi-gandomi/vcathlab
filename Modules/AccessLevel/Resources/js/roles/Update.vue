<template>
  <div class="mb-base">
    <vx-card>
      <template v-slot:actions>
        <vs-button color="primary" to="/accesslevel/roles" type="filled">{{
          __('Back')
        }}</vs-button>
      </template>
      <form @submit="onSubmit">
        <div class="vx-row mb-6">
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <span>{{ __('Name') }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <div class="vx-col w-3/4">
                <component
                  :is="inputs.name.type"
                  v-model="form.name"
                  class="w-full"
                  :danger="hasValidationError('name')"
                  :danger-text="validationError('name')"
                  name="name"
                  type="text"
                />
              </div>
            </div>
          </div>
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <span>{{ __('Title') }}</span>
              </div>
              <div class="vx-col w-3/4">
                <component
                  :is="inputs.title.type"
                  v-model="form.title"
                  class="w-full"
                  :danger="hasValidationError('title')"
                  :danger-text="validationError('title')"
                  name="title"
                  type="text"
                />
              </div>
            </div>
          </div>
        </div>
        <form-tree :permissions="permissions" ref="tree"></form-tree>

        <div class="flex justify-end mt-16">
          <div class="flex">
            <vs-button color="success" @click="() => onSubmit('close')" class="mr-3 mb-2">{{
              __('Save')
            }}</vs-button>
            <vs-button color="warning" class="mb-2" @click="form.reset()">{{
              __('Clear')
            }}</vs-button>
          </div>
        </div>
      </form>
    </vx-card>
  </div>
</template>

<script>
import Form from '@/Form';
import HasForm from '@/mixins/HasForm';
import FormTree from "../components/Tree.vue";
// import FormGrid from "@/components/aggrid-table/Grid.vue";
import Formatters from '@/components/aggrid-table/Formatters';

export default {
  components: {
	'form-tree': FormTree,
//         <form-grid :columnDefs="innerGrids[0].columnDefs" :baseUrl="innerGrids[0].baseUrl"></form-grid>
// 	'form-grid': FormGrid
  },
  mixins: [HasForm],
  data() {
    return {
      form: new Form({
        name: '',
        title: '',
      }),
      model: 'Modules\\AccessLevel\\Models\\Role',
      inputs: {
        name: {
          type: 'vs-input',
          field_type: 'text',
        },
        title: {
          type: 'vs-input',
          field_type: 'text',
        },
      },
      permissions: {},
      /* innerGrids: [{
	columnDefs:  [
        {
          headerName: this.__('Email'),
          field: 'email',
          resizable: true,
          checkboxSelection: true,
          filter: 'agTextColumnFilter',
        },

        {
          headerName: this.__('Personnel Id'),
          field: 'personnel_id',
          resizable: true,
          filter: 'agTextColumnFilter',
        },
        {
          headerName: this.__('Username'),
          field: 'username',
          resizable: true,
          filter: 'agTextColumnFilter',
        },
        {
          headerName: this.__('State'),
          field: 'state',
          resizable: true,
          valueFormatter: Formatters.checkboxFormatter,

          cellRenderer: 'checkboxCellRenderer',
          filter: 'agSelectColumnFilter',
          filterParams: {
            buttons: ['apply'],
            closeOnApply: true,
            type: 'select',
            module: 'AccessLevel',
            model: 'User',
          },
        },
        {
          headerName: this.__('Master'),
          field: 'master',
          resizable: true,
          valueFormatter: Formatters.checkboxFormatter,

          cellRenderer: 'checkboxCellRenderer',
          filter: 'agSelectColumnFilter',
          filterParams: {
            buttons: ['apply'],
            closeOnApply: true,
            type: 'select',
            module: 'AccessLevel',
            model: 'User',
          },
        },
        {
          headerName: this.__('Actions'),
          field: 'action',
          filter: false,
          minWidth: 150,
          cellRenderer: 'tableActionsRenderer',
          cellRendererParams: {
            model: 'User',
            baseRoutePath: 'accesslevel/users',
            modelPlural: 'users',
            baseApiPath: '/accesslevel/api',
          },
        },
      ],
      baseUrl: '/accesslevel/api/users'
	}, {
		columnDefs: [],
		baseUrl: ""
	}]  */
    };
  },
  props: {
    //
  },
  computed: {
    //
  },
  async created() {
    const { data: response } = await this.$http.get(
      `/accesslevel/api/roles/${this.$route.params.id}`
    );
    if (response.success) {
      const { data } = response;
      this.$store.dispatch('setCurrentResource', data);

      if(data.abilities)
	if(data.abilities[0] || Object.keys(data.abilities)[0])
		this.permissions = data.abilities;

      this.populateFormFields(data);
    }
  },
  mounted() {
    //
  },
  methods: {
    async onSubmit(action) {
      const data = await this.form.withData({...this.form.data(), permissions: this.$refs.tree.getPermissions()}).put(`/accesslevel/api/roles/${this.$route.params.id}`);
      if (data.success) {
        Iracode.success(this.__('Role Updated Successfully'));
      }
      if (action == 'close') this.$router.push('/accesslevel/roles');
      else this.form.reset();
    },
    populateFormFields(data) {
      const newFormData = {};
      const form = { ...this.form };
      for (const key in form) {
        if (this.inputs[key]) {
          if (this.inputs[key].field_type == 'relation') {
            newFormData[key] = data[key] ? data[key] : '';
            const index = this.inputs[key].options.findIndex(op => op.id == 2);
            if (index > -1) this.inputs[key].selected = this.inputs[key].options[index];
          } else if (this.inputs[key].field_type != 'password') {
            newFormData[key] = data[key] ? data[key] : '';
          }
        }
      }
      this.form.populate(newFormData);
    },
  },
};
</script>
