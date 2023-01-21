<template>
  <div class="mb-base">
    <vx-card>
      <template v-slot:actions>
        <vs-button color="primary" to="/accesslevel/user_activities" type="filled">{{
          __('Back')
        }}</vs-button>
      </template>
      <form @submit="onSubmit">
        <div class="vx-row mb-6">
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <span>{{ __('Log Name') }}</span>
              </div>
              <div class="vx-col w-3/4">
                <component
                  :is="inputs.log_name.type"
                  v-model="form.log_name"
                  class="w-full"
                  :danger="hasValidationError('log_name')"
                  :danger-text="validationError('log_name')"
                  name="log_name"
                  type="text"
                />
              </div>
            </div>
          </div>
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <span>{{ __('Description') }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <div class="vx-col w-3/4">
                <component
                  :is="inputs.description.type"
                  v-model="form.description"
                  class="w-full"
                  :danger="hasValidationError('description')"
                  :danger-text="validationError('description')"
                  name="description"
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
                <span>{{ __('Subject Id') }}</span>
              </div>
              <div class="vx-col w-3/4">
                <component
                  :is="inputs.subject_id.type"
                  v-model="form.subject_id"
                  class="w-full"
                  :danger="hasValidationError('subject_id')"
                  :danger-text="validationError('subject_id')"
                  name="subject_id"
                  type="number"
                />
              </div>
            </div>
          </div>
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <span>{{ __('Subject Type') }}</span>
              </div>
              <div class="vx-col w-3/4">
                <component
                  :is="inputs.subject_type.type"
                  v-model="form.subject_type"
                  class="w-full"
                  :danger="hasValidationError('subject_type')"
                  :danger-text="validationError('subject_type')"
                  name="subject_type"
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
                <span>{{ __('Causer Id') }}</span>
              </div>
              <div class="vx-col w-3/4">
                <component
                  :is="inputs.causer_id.type"
                  v-model="form.causer_id"
                  class="w-full"
                  :danger="hasValidationError('causer_id')"
                  :danger-text="validationError('causer_id')"
                  name="causer_id"
                  type="number"
                />
              </div>
            </div>
          </div>
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <span>{{ __('Causer Type') }}</span>
              </div>
              <div class="vx-col w-3/4">
                <component
                  :is="inputs.causer_type.type"
                  v-model="form.causer_type"
                  class="w-full"
                  :danger="hasValidationError('causer_type')"
                  :danger-text="validationError('causer_type')"
                  name="causer_type"
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
                <span>{{ __('System Ip') }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <div class="vx-col w-3/4">
                <component
                  :is="inputs.system_ip.type"
                  v-model="form.system_ip"
                  class="w-full"
                  :danger="hasValidationError('system_ip')"
                  :danger-text="validationError('system_ip')"
                  name="system_ip"
                  type="text"
                />
              </div>
            </div>
          </div>
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <span>{{ __('Properties') }}</span>
              </div>
              <div class="vx-col w-3/4">
                <component
                  :is="inputs.properties.type"
                  v-model="form.properties"
                  class="w-full"
                  :danger="hasValidationError('properties')"
                  :danger-text="validationError('properties')"
                  name="properties"
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
                  type="datetime"
                />
              </div>
            </div>
          </div>
        </div>

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
export default {
  components: {},
  mixins: [HasForm],
  data() {
    return {
      form: {
        log_name: '',
        description: '',
        subject_id: '',
        subject_type: '',
        causer_id: '',
        causer_type: '',
        system_ip: '',
        properties: '',
        created_at: '',
      },
      model: 'Modules\\AccessLevel\\Models\\UserActivity',
      inputs: {
        log_name: {
          type: 'vs-input',
          field_type: 'text',
        },
        description: {
          type: 'vs-textarea',
          field_type: 'textarea',
        },
        subject_id: {
          type: 'vs-input',
          field_type: 'number',
        },
        subject_type: {
          type: 'vs-input',
          field_type: 'text',
        },
        causer_id: {
          type: 'vs-input',
          field_type: 'number',
        },
        causer_type: {
          type: 'vs-input',
          field_type: 'text',
        },
        system_ip: {
          type: 'vs-input',
          field_type: 'text',
        },
        properties: {
          type: 'vs-textarea',
          field_type: 'textarea',
        },
        created_at: {
          type: 'persian-date-picker',
          field_type: 'datetime',
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
    const { data: response } = await this.$http.get(
      `/accesslevel/api/user_activities/${this.$route.params.id}`
    );
    if (response.success) {
      const { data } = response;
      this.$store.dispatch('setCurrentResource', data);
      this.populateFormFields(data);
    }
  },
  mounted() {
    //
  },
  methods: {
    async onSubmit(action) {
      const data = await this.form.put(`/accesslevel/api/user_activities/${this.$route.params.id}`);
      if (data.success) {
        Iracode.success(this.__('Useractivity Updated Successfully'));
      }
      if (action == 'close') this.$router.push('/accesslevel/user_activities');
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
