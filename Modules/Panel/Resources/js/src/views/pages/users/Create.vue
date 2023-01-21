<template>
  <div class="mb-base">
    <vx-card>
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
                <span>{{ __('Email') }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <div class="vx-col w-3/4">
                <component
                  :is="inputs.email.type"
                  v-model="form.email"
                  class="w-full"
                  :danger="hasValidationError('email')"
                  :danger-text="validationError('email')"
                  name="email"
                  type="email"
                />
              </div>
            </div>
          </div>
        </div>
        <div class="vx-row mb-6">
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <span>{{ __('Email Verified At') }}</span>
              </div>
              <div class="vx-col w-3/4">
                <component
                  :is="inputs.email_verified_at.type"
                  v-model="form.email_verified_at"
                  class="w-full"
                  :danger="hasValidationError('email_verified_at')"
                  :danger-text="validationError('email_verified_at')"
                  name="email_verified_at"
                  type="date"
                />
              </div>
            </div>
          </div>
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <span>{{ __('Password') }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <div class="vx-col w-3/4">
                <component
                  :is="inputs.password.type"
                  v-model="form.password"
                  class="w-full"
                  :danger="hasValidationError('password')"
                  :danger-text="validationError('password')"
                  name="password"
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
                <span>{{ __('Remember Token') }}</span>
              </div>
              <div class="vx-col w-3/4">
                <component
                  :is="inputs.remember_token.type"
                  v-model="form.remember_token"
                  class="w-full"
                  :danger="hasValidationError('remember_token')"
                  :danger-text="validationError('remember_token')"
                  name="remember_token"
                  type="text"
                />
              </div>
            </div>
          </div>
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <span>{{ __('Gender') }}</span>
              </div>
              <div class="vx-col w-3/4">
                <vs-radio v-model="form.gender" vs-value="1">مرد</vs-radio>
                <vs-radio v-model="form.gender" vs-value="2">زن</vs-radio>
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
        <div class="vx-row mb-6">
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <span>{{ __('دسترسی به زیرمجموعه ها') }}</span>
                <span class="ml-1 text-red">*</span>
              </div>
              <div class="vx-col w-3/4">
                <vs-radio v-model="form.master" vs-value="0">ندارد</vs-radio>
                <vs-radio v-model="form.master" vs-value="1">دارد</vs-radio>
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
                <vs-radio v-model="form.state" vs-value="0">غیرفعال</vs-radio>
                <vs-radio v-model="form.state" vs-value="1">فعال</vs-radio>
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
        name: '',
        email: '',
        email_verified_at: '',
        password: '',
        remember_token: '',
        gender: '1',
        created_at: '',
        updated_at: '',
        master: '0',
        state: '0',
      }),
      locale: Iracode.$i18n.locale,
      inputs: {
        name: {
          type: 'vs-input',
        },
        email: {
          type: 'vs-input',
        },
        email_verified_at: {
          type: 'persian-date-picker',
        },
        password: {
          type: 'vs-input',
        },
        remember_token: {
          type: 'vs-input',
        },
        gender: {
          type: 'vs-radio',
        },
        created_at: {
          type: 'persian-date-picker',
        },
        updated_at: {
          type: 'persian-date-picker',
        },
        master: {
          type: 'vs-radio',
        },
        state: {
          type: 'vs-radio',
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
      const data = await this.form.post('/api/users');
      if (data.success) {
        Iracode.success(this.__('User Created Successfully'));
        if (action == 'close') this.$router.push('/users');
        else this.form.reset();
      }
    },
  },
};
</script>
