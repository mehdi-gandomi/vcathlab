<template>
  <div class="vx-row">
    <div class="vx-col w-full">
      <vx-card class="mb-base">
        <template v-slot:actions>
          <vs-button color="primary" to="/accesslevel/user_activities" type="filled"
            >Back</vs-button
          >
        </template>
        <table>
          <tr>
            <td class="font-semibold">{{ __('Log Name') }}</td>
            <td>{{ details.log_name }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('Description') }}</td>
            <td>{{ details.description }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('Subject Id') }}</td>
            <td>{{ details.subject_id }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('Subject Type') }}</td>
            <td>{{ details.subject_type }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('Causer Id') }}</td>
            <td>{{ details.causer_id }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('Causer Type') }}</td>
            <td>{{ details.causer_type }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('System Ip') }}</td>
            <td>{{ details.system_ip }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('Properties') }}</td>
            <td>{{ details.properties }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('Created At') }}</td>
            <td>{{ details.created_at }}</td>
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
      formTypes: {
        log_name: 'text',
        description: 'text',
        subject_id: 'text',
        subject_type: 'text',
        causer_id: 'text',
        causer_type: 'text',
        system_ip: 'text',
        properties: 'text',
        created_at: 'text',
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
