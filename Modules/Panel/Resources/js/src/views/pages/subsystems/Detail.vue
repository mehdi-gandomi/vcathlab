<template>
  <div class="vx-row">
    <div class="vx-col w-full">
      <vx-card class="mb-base">
        <template v-slot:actions>
          <vs-button color="primary" to="/subsystems" type="filled">بازگشت</vs-button>
        </template>
        <table>
          <tr>
            <td class="font-semibold">{{ __('عنوان') }}</td>
            <td>{{ details.title }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __(' لینک مستقیم') }}</td>
            <td>{{ details.route }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('آیکن') }}</td>
            <td>{{ details.icon_class }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('عنوان نمایشی در هدر صفحه') }}</td>
            <td>{{ details.header_title }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('ترتیب نمایش') }}</td>
            <td>{{ details.ordering }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('وضعیت') }}</td>
            <td>{{ details.state }}</td>
          </tr>
        </table>
      </vx-card>
    </div>
  </div>
</template>
<script>
export default {
  components: {},
  mixins: [],
  data() {
    return {
      details: {
        title: '',
        route: '',
        icon_class: '',
        header_title: '',
        ordering: '',
        state: '',
      },
      formTypes: {
        title: 'text',
        route: 'text',
        icon_class: 'text',
        header_title: 'text',
        ordering: 'text',
        state: 'text',
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
    populateFormFields(data) {
      const newDetails = {};
      const details = { ...this.details };
      for (const key in details) {
        if (this.formTypes[key] != 'password') {
          newDetails[key] = data[key] ? data[key] : '';
        }
      }
      this.details = newDetails;
    },
  },
};
</script>
