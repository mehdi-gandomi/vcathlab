<template>
  <div class="mb-base">
    <vx-card>
      <template v-slot:actions>
        <vs-button color="primary" to="/menus" type="filled">{{ __('Back') }}</vs-button>
      </template>
      <form @submit="onSubmit">
        <div class="vx-row mb-6"></div>
        <div class="vx-row mb-6">
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <span>{{ __('عنوان') }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <div class="vx-col w-3/4">
                <component
                  :is="inputs.title.type"
                  v-model="form.title"
                  class="w-full"
                  :danger="hasValidationError('title')"
                  :danger-text="validationError('title')"
                  name="title"
                  type="textarea"
                />
              </div>
            </div>
          </div>
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <span>{{ __('آیکن') }}</span>
              </div>
              <div class="vx-col w-3/4">
                <component
                  :is="inputs.icon_class.type"
                  v-model="form.icon_class"
                  class="w-full"
                  :danger="hasValidationError('icon_class')"
                  :danger-text="validationError('icon_class')"
                  name="icon_class"
                  type="text"
                />
              </div>
            </div>
          </div>
        </div>
        <div class="vx-row mb-6">
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <span>{{ __('لینک') }}</span>
              </div>
              <div class="vx-col w-3/4">
                <component
                  :is="inputs.route.type"
                  v-model="form.route"
                  class="w-full"
                  :danger="hasValidationError('route')"
                  :danger-text="validationError('route')"
                  name="route"
                  type="text"
                />
              </div>
            </div>
          </div>
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <span>{{ __('ترتیب نمایش') }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <div class="vx-col w-3/4">
                <component
                  :is="inputs.ordering.type"
                  v-model="form.ordering"
                  class="w-full"
                  :danger="hasValidationError('ordering')"
                  :danger-text="validationError('ordering')"
                  name="ordering"
                  type="number"
                />
              </div>
            </div>
          </div>
        </div>
        <div class="vx-row mb-6">
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <span>{{ __('نمایش در تب جدید') }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <div class="vx-col w-3/4">
                <component
                  :is="inputs.open_in_blank.type"
                  v-model="form.open_in_blank"
                  class="w-full"
                  :danger="hasValidationError('open_in_blank')"
                  :danger-text="validationError('open_in_blank')"
                  name="open_in_blank"
                  type="checkbox"
                />
              </div>
            </div>
          </div>
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <span>{{ __('نمایش در iFrame') }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <div class="vx-col w-3/4">
                <component
                  :is="inputs.open_in_iframe.type"
                  v-model="form.open_in_iframe"
                  class="w-full"
                  :danger="hasValidationError('open_in_iframe')"
                  :danger-text="validationError('open_in_iframe')"
                  name="open_in_iframe"
                  type="checkbox"
                />
              </div>
            </div>
          </div>
        </div>
        <div class="vx-row mb-6">
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <span>{{ __('توضیحات') }}</span>
              </div>
              <div class="vx-col w-3/4">
                <component
                  :is="inputs.description.type"
                  v-model="form.description"
                  class="w-full"
                  :danger="hasValidationError('description')"
                  :danger-text="validationError('description')"
                  name="description"
                  type="text"
                />
              </div>
            </div>
          </div>
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <span>{{ __('وضعیت') }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <div class="vx-col w-3/4">
                <component
                  :is="inputs.state.type"
                  v-model="form.state"
                  class="w-full"
                  :danger="hasValidationError('state')"
                  :danger-text="validationError('state')"
                  name="state"
                  type="checkbox"
                />
              </div>
            </div>
          </div>
        </div>
        <div class="vx-col w-1/2">
          <div class="row flex">
            <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
              <span>{{ __('menu') }}</span>
            </div>
            <div class="vx-col w-3/4">
              <v-select
                :value="inputs.menu.selected"
                @input="(op) => onRelationSelect('menu', 'menu_id', op)"
                v-model="form.menu_id"
                label="title"
                :filterable="false"
                :options="inputs.menu.options"
                @search="(search, loading) => onRelationSearch('menu', search, loading)"
              >
                <template slot="no-options">
                  {{ __('Type to search') }}
                </template>
              </v-select>
            </div>
          </div>
        </div>
        <div class="vx-col w-1/2">
          <div class="row flex">
            <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
              <span>{{ __('subsystem') }}</span>
              <span class="ml-1 text-red-100">*</span>
            </div>
            <div class="vx-col w-3/4">
              <v-select
                :value="inputs.subsystem.selected"
                @input="(op) => onRelationSelect('subsystem', 'subsystem_id', op)"
                v-model="form.subsystem_id"
                label="title"
                :filterable="false"
                :options="inputs.subsystem.options"
                @search="(search, loading) => onRelationSearch('subsystem', search, loading)"
              >
                <template slot="no-options">
                  {{ __('Type to search') }}
                </template>
              </v-select>
            </div>
          </div>
        </div>

        <div class="flex justify-end mt-16">
          <div class="flex">
            <vs-button color="success" @click="() => onSubmit('new')" class="mr-3 mb-2">{{
              __('Save and new')
            }}</vs-button>
            <vs-button color="success" @click="() => onSubmit('close')" class="mr-3 mb-2">{{
              __('Save and close')
            }}</vs-button>
            <vs-button color="warning" class="mb-2" @click="resetForm">{{ __('Clear') }}</vs-button>
          </div>
        </div>
      </form>
    </vx-card>
  </div>
</template>

<script>
import Form from '@/Form';
import HasForm from '@/mixins/HasForm';
export default {
  components: {},
  mixins: [HasForm],
  data() {
    return {
      form: {
        title: '',
        icon_class: '',
        route: '',
        ordering: '',
        open_in_blank: '',
        open_in_iframe: '',
        description: '',
        state: '',
        menu_id: '',
        subsystem_id: '',
      },
      model: 'App\\Models\\Menu',
      inputs: {
        title: {
          type: 'vs-textarea',
          field_type: 'textarea',
        },
        icon_class: {
          type: 'vs-input',
          field_type: 'text',
        },
        route: {
          type: 'vs-input',
          field_type: 'text',
        },
        ordering: {
          type: 'vs-input',
          field_type: 'number',
        },
        open_in_blank: {
          type: 'vs-checkbox',
          field_type: 'checkbox',
        },
        open_in_iframe: {
          type: 'vs-checkbox',
          field_type: 'checkbox',
        },
        description: {
          type: 'vs-input',
          field_type: 'text',
        },
        state: {
          type: 'vs-checkbox',
          field_type: 'checkbox',
        },
        menu: {
          type: 'relation',
          foreign_key: 'menu_id',
          options: [],
          selected: {},
          searchUrl: '/api/menus',
        },
        subsystem: {
          type: 'relation',
          foreign_key: 'subsystem_id',
          options: [],
          selected: {},
          searchUrl: '/api/subsystems',
        },
      },
    };
  },
  props: {
    //
  },
  computed: {
    //
  },
  async created() {
    const { data: response } = await this.$http.get(`/api/menus/${this.$route.params.id}`);
    if (response.success) {
      const { data } = response;
      this.populateFormFields(data);
    }
  },
  mounted() {
    //
  },
  methods: {
    async onSubmit(action) {
      const data = await this.form.put(`/api/menus/${this.$route.params.id}`);
      if (data.success) {
        Iracode.success(this.__('Menu Updated Successfully'));
      }
      if (action == 'close') this.$router.push('/menus');
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
