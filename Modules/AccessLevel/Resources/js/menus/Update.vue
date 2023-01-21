<template>
  <div class="mb-base">
    <vx-card>
      <template v-slot:actions>
        <vs-button color="primary" to="/accesslevel/menus" type="filled">{{
          __('Back')
        }}</vs-button>
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
                  type="text"
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
	        :placeholder="__('با / شروع می‌شود')"
	        dir="ltr"
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
        <div class="vx-col w-1/2">
          <div class="row flex">
            <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
              <span>{{ __('subsystem') }}</span>
              <span class="ml-1 text-red-100">*</span>
            </div>
            <div class="vx-col w-3/4">
              <v-select
                :value="inputs.subsystem_id.selected"
                @input="op => onRelationSelect('subsystem_id', op)"
                label="title"
                :filterable="false"
                :options="inputs.subsystem_id.options"
                @search="(search, loading) => onRelationSearch('subsystem_id', search, loading)"
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
              <span>{{ __('menu') }}</span>
            </div>
            <div class="vx-col w-3/4">
              <v-select
                :value="inputs.menu_id.selected"
                @input="op => onRelationSelect('menu_id', op)"
                label="title"
                :filterable="false"
                :options="inputs.menu_id.options"
                @search="(search, loading) => onRelationSearch('menu_id', search, loading)"
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
        icon_class: '',
        route: '',
        ordering: '',
        open_in_blank: false,
        open_in_iframe: false,
        description: '',
        state: false,
        subsystem_id: '',
      }),
      model: 'Modules\\AccessLevel\\Models\\Menu',
      inputs: {
        title: {
          type: 'vs-input',
          field_type: 'text',
        },
        icon_class: {
          type: VueIconPicker.name,
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
        subsystem_id: {
          field_type: 'relation',
          foreign_key: 'subsystem_id',
          relation_name: 'subsystem',
          options: [],
          selected: {},
          searchUrl: '/accesslevel/api/subsystems',
          titleField: 'title',
        },
        menu_id: {
          field_type: 'relation',
          foreign_key: 'menu_id',
          relation_name: 'menu',
          options: [],
          selected: {},
          searchUrl: '/accesslevel/api/menus',
          titleField: 'title',
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
      `/accesslevel/api/menus/${this.$route.params.id}`
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
	getFormData(form) {
		if(!form)
			form = this.form;
		let options = {};

		let subsystem_id = form.subsystem_id;
		options.subsystem_id = /^\d+$/.test(subsystem_id+'') ? +subsystem_id : +subsystem_id.id;
		options.open_in_blank = !!form.open_in_blank;
		options.open_in_iframe = !!form.open_in_iframe;
		options.state = !!form.state;
		options.ordering = form.ordering || 0;

		return form.withData({...form.data(), ...options});
	},
    async onSubmit(action) {
      const data = await this.getFormData().put(`/accesslevel/api/menus/${this.$route.params.id}`);
      if (data.success) {
        Iracode.success(this.__('Menu Updated Successfully'));
      }
      if (action == 'close') {
		let back_url = '/accesslevel/menus';
		if(this.$route.query.subsystem_id)
				back_url += `?subsystem_id=${this.$route.query.subsystem_id}`;
		this.$router.push(back_url);
        }
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
