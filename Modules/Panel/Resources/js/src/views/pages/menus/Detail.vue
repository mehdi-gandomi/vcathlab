<template>
  <div class="vx-row">
    <div class="vx-col w-full">
      <vx-card class="mb-base">
        <template v-slot:actions>
          <vs-button color="primary" to="/menus" type="filled">بازگشت</vs-button>
        </template>
        <table>
          <tr>
            <td class="font-semibold">{{ __('عنوان') }}</td>
            <td>{{ details.title }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('آیکن') }}</td>
            <td>{{ details.icon_class }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('لینک') }}</td>
            <td>{{ details.route }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('ترتیب نمایش') }}</td>
            <td>{{ details.ordering }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('نمایش در تب جدید') }}</td>
            <td>{{ details.open_in_blank }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('نمایش در iFrame') }}</td>
            <td>{{ details.open_in_iframe }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('توضیحات') }}</td>
            <td>{{ details.description }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('وضعیت') }}</td>
            <td>{{ details.state }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('menu') }}</td>
            <td>{{ details.menu.title }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('subsystem') }}</td>
            <td>{{ details.subsystem.title }}</td>
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
        icon_class: '',
        route: '',
        ordering: '',
        open_in_blank: '',
        open_in_iframe: '',
        description: '',
        state: '',
        menu: {},
        subsystem: {},
      },
      formTypes: {
        title: 'text',
        icon_class: 'text',
        route: 'text',
        ordering: 'text',
        open_in_blank: 'text',
        open_in_iframe: 'text',
        description: 'text',
        state: 'text',
        menu: 'text',
        subsystem: 'text',
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
