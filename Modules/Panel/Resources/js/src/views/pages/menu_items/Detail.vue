<template>
  <div class="vx-row">
    <div class="vx-col w-full">
      <vx-card class="mb-base">
        <template v-slot:actions>
          <vs-button color="primary" to="/menu_items" type="filled">Back</vs-button>
        </template>
        <table>
          <tr>
            <td class="font-semibold">{{ __('آیدی منو') }}</td>
            <td>{{ details.menu_id }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('Title') }}</td>
            <td>{{ details.title }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('Slug') }}</td>
            <td>{{ details.slug }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('Url') }}</td>
            <td>{{ details.url }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('Target') }}</td>
            <td>{{ details.target }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('Parent Id') }}</td>
            <td>{{ details.parent_id }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('Order') }}</td>
            <td>{{ details.order }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('Route') }}</td>
            <td>{{ details.route }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('Params') }}</td>
            <td>{{ details.params }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('Controller') }}</td>
            <td>{{ details.controller }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('Middleware') }}</td>
            <td>{{ details.middleware }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('Icon') }}</td>
            <td>{{ details.icon }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('Custom Class') }}</td>
            <td>{{ details.custom_class }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('Created At') }}</td>
            <td>{{ details.created_at }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('Updated At') }}</td>
            <td>{{ details.updated_at }}</td>
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
      formTypes: {
        menu_id: 'text',
        title: 'text',
        slug: 'text',
        url: 'text',
        target: 'text',
        parent_id: 'text',
        order: 'text',
        route: 'text',
        params: 'text',
        controller: 'text',
        middleware: 'text',
        icon: 'text',
        custom_class: 'text',
        created_at: 'text',
        updated_at: 'text',
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
