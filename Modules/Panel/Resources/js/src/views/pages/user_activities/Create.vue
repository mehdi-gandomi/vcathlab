<template>
  <div class="mb-base">
    <vx-card>
      <template v-slot:actions>
        <vs-button color="primary" to="/user_activities" type="filled">{{ __('Back') }}</vs-button>
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
                  type="text"
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
                  type="text"
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
      form: new Form({
        log_name: '',
        description: '',
        subject_id: '',
        subject_type: '',
        causer_id: '',
        causer_type: '',
        system_ip: '',
        properties: '',
        created_at: '',
      }),
      locale: Iracode.$i18n.locale,
      inputs: {
        log_name: {
          type: 'vs-input',
        },
        description: {
          type: 'vs-textarea',
        },
        subject_id: {
          type: 'vs-input',
        },
        subject_type: {
          type: 'vs-input',
        },
        causer_id: {
          type: 'vs-input',
        },
        causer_type: {
          type: 'vs-input',
        },
        system_ip: {
          type: 'vs-input',
        },
        properties: {
          type: 'vs-textarea',
        },
        created_at: {
          type: 'persian-date-picker',
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
  created() {
    //
  },
  mounted() {
    //
  },
  methods: {
    async onSubmit(action) {
      const data = await this.form.post('/api/user_activities');
      if (data.success) {
        Iracode.success(this.__('Activitylog Created Successfully'));
        if (action == 'close') this.$router.push('/user_activities');
        else this.form.reset();
      }
    },
  },
};
</script>
