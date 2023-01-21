<template>
  <div class="vx-row">
    <div class="vx-col w-full">
      <vx-card class="mb-base">
        <template v-slot:actions>
          <vs-button color="primary" to="/user_activities" type="filled">Back</vs-button>
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
          <tr><td><h6>{{ __('Changed Properties') }}</h6></td><td>
		<vs-table striped no-data-text="">
			<template #thead>
				<vs-th>{{ __('Field')}}</vs-th>
				<vs-th v-for="(column, index) in details.properties.columns" :key="index">{{column}}</vs-th>
			</template>
			<template>
				<vs-tr v-for="(row, index) in details.properties.rows" :key="index">
					<vs-td>{{  __(index) }}</vs-td>
					<vs-td v-for="(column, indexColumn) in details.properties.columns" :key="indexColumn">{{row[column]}}</vs-td>
				</vs-tr>
			</template>
		</vs-table>
	</td></tr>
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
    const { data: response } = await this.$http.get(`/api/user_activities/${this.$route.params.id}`);
    if (response.success) {
      const { data } = response;
      let properties = data.properties,
      columns = Object.keys(properties.attributes),
      rows = {old_value:{}, new_value:{}};
      columns.forEach(column => {
	rows.old_value[column] = properties.old[column];
	rows.new_value[column] = properties.attributes[column];
      });
      data.properties = {columns, rows};
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
