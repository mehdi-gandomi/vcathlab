<template>
  <div class="mb-base">
    <vx-card>
      <template v-slot:actions>
        <vs-button color="primary" to="/subsystems" type="filled">{{ __('Back') }}</vs-button>
      </template>
      <form @submit="onSubmit">
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
                <span>{{ __(' لینک مستقیم') }}</span>
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
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <span>{{ __('عنوان نمایشی در هدر صفحه') }}</span>
              </div>
              <div class="vx-col w-3/4">
                <component
                  :is="inputs.header_title.type"
                  v-model="form.header_title"
                  class="w-full"
                  :danger="hasValidationError('header_title')"
                  :danger-text="validationError('header_title')"
                  name="header_title"
                  type="textarea"
                />
              </div>
            </div>
          </div>
        </div>
        <div class="vx-row mb-6">
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

        <div class="flex justify-end">
          <div class="flex">
            <vs-button color="success" @click="() => onSubmit('new')" class="mr-3 mb-2">{{
              __('Save and new')
            }}</vs-button>
            <vs-button color="success" @click="() => onSubmit('close')" class="mr-3 mb-2">{{
              __('Save and close')
            }}</vs-button>
            <vs-button color="warning" class="mb-2" @click="form.reset()">{{ __('Clear') }}</vs-button>
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
        route: '',
        icon_class: '',
        header_title: '',
        ordering: '',
        state: '',
      },
      model: 'App\\Models\\SubSystem',
      inputs: {
        title: {
          type: 'vs-textarea',
          field_type: 'textarea',
        },
        route: {
          type: 'vs-input',
          field_type: 'text',
        },
        icon_class: {
          type: 'vs-input',
          field_type: 'text',
        },
        header_title: {
          type: 'vs-textarea',
          field_type: 'textarea',
        },
        ordering: {
          type: 'vs-input',
          field_type: 'number',
        },
        state: {
          type: 'vs-checkbox',
          field_type: 'checkbox',
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
    const { data: response } = await this.$http.get(`/api/subsystems/${this.$route.params.id}`);
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
      const data = await this.form.put(`/api/subsystems/${this.$route.params.id}`);
      if (data.success) {
        Iracode.success(this.__('Subsystem Updated Successfully'));
      }
      if (action == 'close') this.$router.push('/subsystems');
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
