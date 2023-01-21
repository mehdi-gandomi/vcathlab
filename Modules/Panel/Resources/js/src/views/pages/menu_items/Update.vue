<template>
  <div class="mb-base">
    <vx-card>
      <template v-slot:actions>
        <vs-button color="primary" to="/menu_items" type="filled">{{ __('Back') }}</vs-button>
      </template>
      <form @submit="onSubmit">
        <div class="vx-row mb-6">
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <span>{{ __('آیدی منو') }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <div class="vx-col w-3/4">
                <component
                  :is="inputs.menu_id.type"
                  v-model="form.menu_id"
                  class="w-full"
                  :danger="hasValidationError('menu_id')"
                  :danger-text="validationError('menu_id')"
                  name="menu_id"
                  type="number"
                />
              </div>
            </div>
          </div>
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <span>{{ __('Title') }}</span>
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
                <span>{{ __('Slug') }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <div class="vx-col w-3/4">
                <component
                  :is="inputs.slug.type"
                  v-model="form.slug"
                  class="w-full"
                  :danger="hasValidationError('slug')"
                  :danger-text="validationError('slug')"
                  name="slug"
                  :label-idle="inputs.slug.filepond_options['label-idle']"
                  :allow-multiple="inputs.slug.filepond_options['allow-multiple']"
                  :accepted-file-types="inputs.slug.filepond_options['accepted-file-types']"
                />
              </div>
            </div>
          </div>
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <span>{{ __('Url') }}</span>
              </div>
              <div class="vx-col w-3/4">
                <component
                  :is="inputs.url.type"
                  v-model="form.url"
                  class="w-full"
                  :danger="hasValidationError('url')"
                  :danger-text="validationError('url')"
                  name="url"
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
                <span>{{ __('Target') }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <div class="vx-col w-3/4">
                <component
                  :is="inputs.target.type"
                  v-model="form.target"
                  class="w-full"
                  :danger="hasValidationError('target')"
                  :danger-text="validationError('target')"
                  name="target"
                  type="text"
                />
              </div>
            </div>
          </div>
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <span>{{ __('Parent Id') }}</span>
              </div>
              <div class="vx-col w-3/4">
                <component
                  :is="inputs.parent_id.type"
                  v-model="form.parent_id"
                  class="w-full"
                  :danger="hasValidationError('parent_id')"
                  :danger-text="validationError('parent_id')"
                  name="parent_id"
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
                <span>{{ __('Order') }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <div class="vx-col w-3/4">
                <component
                  :is="inputs.order.type"
                  v-model="form.order"
                  class="w-full"
                  :danger="hasValidationError('order')"
                  :danger-text="validationError('order')"
                  name="order"
                  type="number"
                />
              </div>
            </div>
          </div>
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <span>{{ __('Route') }}</span>
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
        </div>
        <div class="vx-row mb-6">
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <span>{{ __('Params') }}</span>
              </div>
              <div class="vx-col w-3/4">
                <component
                  :is="inputs.params.type"
                  v-model="form.params"
                  class="w-full"
                  :danger="hasValidationError('params')"
                  :danger-text="validationError('params')"
                  name="params"
                  type="textarea"
                />
              </div>
            </div>
          </div>
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <span>{{ __('Controller') }}</span>
              </div>
              <div class="vx-col w-3/4">
                <component
                  :is="inputs.controller.type"
                  v-model="form.controller"
                  class="w-full"
                  :danger="hasValidationError('controller')"
                  :danger-text="validationError('controller')"
                  name="controller"
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
                <span>{{ __('Middleware') }}</span>
              </div>
              <div class="vx-col w-3/4">
                <component
                  :is="inputs.middleware.type"
                  v-model="form.middleware"
                  class="w-full"
                  :danger="hasValidationError('middleware')"
                  :danger-text="validationError('middleware')"
                  name="middleware"
                  type="text"
                />
              </div>
            </div>
          </div>
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <span>{{ __('Icon') }}</span>
              </div>
              <div class="vx-col w-3/4">
                <component
                  :is="inputs.icon.type"
                  v-model="form.icon"
                  class="w-full"
                  :danger="hasValidationError('icon')"
                  :danger-text="validationError('icon')"
                  name="icon"
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
                <span>{{ __('Custom Class') }}</span>
              </div>
              <div class="vx-col w-3/4">
                <component
                  :is="inputs.custom_class.type"
                  v-model="form.custom_class"
                  class="w-full"
                  :danger="hasValidationError('custom_class')"
                  :danger-text="validationError('custom_class')"
                  name="custom_class"
                  type="text"
                />
              </div>
            </div>
          </div>
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <span>{{ __('Created At') }}</span>
              </div>
              <div class="vx-col w-3/4">
                <component
                  :is="inputs.created_at.type"
                  v-model="form.created_at"
                  class="w-full"
                  :danger="hasValidationError('created_at')"
                  :danger-text="validationError('created_at')"
                  name="created_at"
                  type="date"
                />
              </div>
            </div>
          </div>
        </div>
        <div class="vx-row mb-6">
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <span>{{ __('Updated At') }}</span>
              </div>
              <div class="vx-col w-3/4">
                <component
                  :is="inputs.updated_at.type"
                  v-model="form.updated_at"
                  class="w-full"
                  :danger="hasValidationError('updated_at')"
                  :danger-text="validationError('updated_at')"
                  name="updated_at"
                  type="date"
                />
              </div>
            </div>
          </div>
        </div>

        <div class="flex justify-end">
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
        menu_id: '',
        title: '',
        slug: '',
        url: '',
        target: '',
        parent_id: '',
        order: '',
        route: '',
        params: '',
        controller: '',
        middleware: '',
        icon: '',
        custom_class: '',
        created_at: '',
        updated_at: '',
      },
      inputs: {
        menu_id: {
          type: 'vs-input',
          field_type: 'number',
        },
        title: {
          type: 'vs-input',
          field_type: 'text',
        },
        slug: {
          type: 'filepond',
          field_type: 'filepond',
          filepond_options: {
            'label-idle': 'Drag &amp; Drop your files',
            'allow-multiple': Iracode.toBool(1),
            'accepted-file-types': 'image/jpeg, image/png',
          },
        },
        url: {
          type: 'vs-input',
          field_type: 'text',
        },
        target: {
          type: 'vs-input',
          field_type: 'text',
        },
        parent_id: {
          type: 'vs-input',
          field_type: 'number',
        },
        order: {
          type: 'vs-input',
          field_type: 'number',
        },
        route: {
          type: 'vs-input',
          field_type: 'text',
        },
        params: {
          type: 'vs-textarea',
          field_type: 'textarea',
        },
        controller: {
          type: 'vs-input',
          field_type: 'text',
        },
        middleware: {
          type: 'vs-input',
          field_type: 'text',
        },
        icon: {
          type: 'vs-input',
          field_type: 'text',
        },
        custom_class: {
          type: 'vs-input',
          field_type: 'text',
        },
        created_at: {
          type: 'persian-date-picker',
          field_type: 'date',
        },
        updated_at: {
          type: 'persian-date-picker',
          field_type: 'date',
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
    const { data: response } = await this.$http.get(`/api/menu_items/${this.$route.params.id}`);
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
      const data = await this.form.put(`/api/menu_items/${this.$route.params.id}`);
      if (data.success) {
        Iracode.success(this.__('Menuitem Updated Successfully'));
      }
      if (action == 'close') this.$router.push('/menu_items');
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
