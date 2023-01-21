<template>
  <div class="mb-base">
    <vx-card>
      <template v-slot:actions>
        <vs-button color="primary" to="/roles" type="filled">{{ __('Back') }}</vs-button>
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

        <div class="flex justify-end">
          <div class="flex">
            <vs-button color="success" @click="() => onSubmit('new')" class="mr-3 mb-2">{{
              __('Save and new')
            }}</vs-button>
            <vs-button color="success" @click="() => onSubmit('close')" class="mr-3 mb-2">{{
              __('Save and close')
            }}</vs-button>
            <vs-button color="warning" class="mb-2">{{ __('Clear') }}</vs-button>
          </div>
        </div>
      </form>
    </vx-card>
  </div>
</template>

<script>
import Form from '@/Form';
import HasForm from '@/mixins/HasForm';
import FormTree from "./Tree.vue";

export default {
  components: {
	'form-tree': FormTree
  },
  mixins: [HasForm],
  data() {
    return {
      form: {
        name: '',
        title: '',
      },
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
      permissions: {}
    };
  },
  props: {
    //
  },
  computed: {
    //
  },
  async created() {
    const { data: response } = await this.$http.get(`/api/roles/${this.$route.params.id}`);
    if (response.success) {
      const { data } = response;
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
      const { data } = await this.form.withData({...this.form.data(), permissions: this.$refs.tree.getPermissions()}).put(`/api/roles/${this.$route.params.id}`);
      if (data.success) {
        Iracode.success(this.__('Role Updated Successfully'));
      }
      if (action == 'close') this.$router.push('/roles');
      else this.form.reset();
    },
    populateFormFields(data) {
      const newFormData = {};
      const form = { ...this.form };
      for (const key in form) {
        if (this.inputs[key]) {
          if (this.inputs[key].field_type == 'relation') {
            newFormData[key] = data[this.inputs[key].foreign_key]
              ? data[this.inputs[key].foreign_key]
              : '';
          } else if (this.inputs[key].field_type != 'password') {
            newFormData[key] = data[key] ? data[key] : '';
          }
        }
      }
      this.form = new Form(newFormData);
    },
  },
};
</script>
