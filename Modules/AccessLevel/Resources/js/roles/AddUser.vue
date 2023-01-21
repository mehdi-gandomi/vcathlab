<template>
	<div class="mb-base">
		<form @submit="onSubmit">
			<vx-card>
				<div class="vx-col w-1/2">
					<div class="row flex">
						<v-select
						v-model="user_id"
						label="title"
						:filterable="false"
						:options="options"
						>
							<template slot="no-options">
							{{ __('Type to search') }}
							</template>
						</v-select>
					</div>
				</div>

				<div class="flex justify-end mt-16">
					<div class="flex">
						<vs-button color="success" @click="() => onSubmit('new')" class="mr-3 mb-2">{{
						__('Add and new')
						}}</vs-button>
						<vs-button color="success" @click="() => onSubmit('close')" class="mr-3 mb-2">{{
						__('Add and close')
						}}</vs-button>
						<vs-button color="warning" class="mb-2" @click="backToList()">{{
						__('Back')
						}}</vs-button>
					</div>
				</div>
			</vx-card>
		</form>
	</div>
</template>

<script>
import Form from '@/Form';

export default {
	data() {
		return {
			form: new Form({
				user_id: ''
			}),
			user_id: {},
			options: []
		}
	},
	async created() {
		const {data : response} = await this.$http.get(
			`/accesslevel/api/role_users/show_not_assigned?role_id=${this.$route.params.id}`
		);
		// if (response.success) {
			this.options = Object.values(response.data.items)
		// }
	},
	methods: {
		async onSubmit(action) {
			const data = await this.form.withData({user_id: this.user_id.id, role_id: this.$route.params.id}).put(`/accesslevel/api/role_users/assign`);
			if (data.success) {
				Iracode.success(this.__('User Assigned to Role'));

				if (action != 'close')
					return location.reload();
				this.backToList();
			}
		},
		backToList() {
			this.$router.push(`/accesslevel/roles/${this.$route.params.id}/users`)
		}
	}
};
</script>
