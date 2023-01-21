<template>
  <div class="mb-base">
    <vx-card>
      <template v-slot:actions>
        <vs-button color="primary" to="/accesslevel/subsystems" type="filled">{{
          __('Back')
        }}</vs-button>
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
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <span>{{ __('آیکن') }}</span>
              </div>
              <div class="vx-col w-3/4">
                <component
                  :is="inputs.icon_class.type"
                  v-model="form.icon_class"
                  name="icon_class"
	        height="85px"
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
                <span>{{ __('State') }}</span>
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

        <div class="flex justify-end mt-16">
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
import VueIconPicker from '../components/IconPicker.vue';

export default {
  components: {
	[VueIconPicker.name]: VueIconPicker
  },
  mixins: [HasForm],
  data() {
    return {
      form: new Form({
        title: '',
        route: '',
        icon_class: '',
        header_title: '',
        ordering: '',
        state: false,
      }),
      model: 'Modules\\AccessLevel\\Models\\SubSystem',
      locale: window.Iracode.$i18n.locale,
      inputs: {
        title: {
          type: 'vs-input',
        },
        route: {
          type: 'vs-input',
        },
        icon_class: {
          type: VueIconPicker.name,
        },
        header_title: {
          type: 'vs-input',
        },
        ordering: {
          type: 'vs-input',
        },
        state: {
          type: 'vs-checkbox',
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
      const data = await this.form.post('/accesslevel/api/subsystems');
      if (data.success) {
        Iracode.success(this.__('SubSystem Created Successfully'));
        if (action == 'close') this.$router.push('/accesslevel/subsystems');
        else this.form.reset();
      }
    },
  },
};
</script>
