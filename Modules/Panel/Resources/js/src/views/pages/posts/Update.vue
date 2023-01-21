<template>
  <div class="mb-base">
    <vx-card>
      <template v-slot:actions>
        <vs-button color="primary" to="/posts" type="filled">{{ __('Back') }}</vs-button>
      </template>
      <form @submit="onSubmit">
        <div class="vx-row mb-6">
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
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <span>{{ __('Image') }}</span>
              </div>
              <div class="vx-col w-3/4">
                <component
                  :is="inputs.image.type"
                  class="w-full"
                  :danger="hasValidationError('image')"
                  :danger-text="validationError('image')"
                  name="image"
                  :label-idle="inputs.image.filepond_options['label-idle']"
                  :allow-multiple="inputs.image.filepond_options['allow-multiple']"
                  :accepted-file-types="inputs.image.filepond_options['accepted-file-types']"
                  :instant-upload="inputs.image.filepond_options['instant-upload']"
                  :server="uploadServer"
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
        image: [],
      },
      model: 'App\\Models\\Post',
      inputs: {
        title: {
          type: 'vs-input',
          field_type: 'text',
        },
        image: {
          type: 'filepond',
          field_type: 'filepond_image',
          filepond_options: {
            'label-idle': 'Drag &amp; Drop your files',
            'allow-multiple': Iracode.toBool(1),
            'accepted-file-types': 'image/jpeg, image/png',
            'instant-upload': Iracode.toBool(1),
          },
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
    const { data: response } = await this.$http.get(`/api/posts/${this.$route.params.id}`);
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
      const data = await this.form.put(`/api/posts/${this.$route.params.id}`);
      if (data.success) {
        Iracode.success(this.__('Post Updated Successfully'));
      }
      if (action == 'close') this.$router.push('/posts');
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
