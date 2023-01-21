<template>
  <div class="vx-row">
    <div class="vx-col w-full">
      <vx-card class="mb-base">
        <template v-slot:actions>
          <vs-button color="primary" to="/users" type="filled">بازگشت</vs-button>
        </template>
        <table>
          <tr>
            <td class="font-semibold">{{ __('Name') }}</td>
            <td>{{ details.name }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('Email') }}</td>
            <td>{{ details.email }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('Email Verified At') }}</td>
            <td>{{ details.email_verified_at }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('Password') }}</td>
            <td>{{ details.password }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('Remember Token') }}</td>
            <td>{{ details.remember_token }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('Gender') }}</td>
            <td>{{ details.gender }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('Created At') }}</td>
            <td>{{ details.created_at }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('Updated At') }}</td>
            <td>{{ details.updated_at }}</td>
          </tr>
          <tr>
            <td class="font-semibold">{{ __('دسترسی به زیرمجموعه ها') }}</td>
            <td>{{ details.master }}</td>
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
        name: '',
        email: '',
        email_verified_at: '',
        password: '',
        remember_token: '',
        gender: '',
        created_at: '',
        updated_at: '',
        master: '',
        state: '',
      },
      formTypes: {
        name: 'text',
        email: 'text',
        email_verified_at: 'text',
        password: 'text',
        remember_token: 'text',
        gender: 'text',
        created_at: 'text',
        updated_at: 'text',
        master: 'text',
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
    const { data: response } = await this.$http.get(`/api/users/${this.$route.params.id}`);
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
