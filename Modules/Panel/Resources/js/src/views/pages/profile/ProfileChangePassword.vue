<template>
  <vx-card no-shadow>

    <vs-input type="password" :danger="hasValidationError('current_password')" :danger-text="validationError('current_password')" class="w-full mb-base" :label-placeholder="__('Old Password')" v-model="form.current_password" />
    <vs-input type="password" :danger="hasValidationError('password')" :danger-text="validationError('password')" class="w-full mb-base" :label-placeholder="__('New Password')" v-model="form.password" />
    <vs-input type="password" :danger="hasValidationError('password_confirmation')" :danger-text="validationError('password_confirmation')" class="w-full mb-base" :label-placeholder="__('Confirm Password')" v-model="form.password_confirmation" />

    <!-- Save & Reset Button -->
    <div class="flex flex-wrap items-center justify-end">
      <vs-button :disabled="isDisabled" @click="changePassword" class="ml-auto mt-2">{{__("Save Changes")}}</vs-button>
      <vs-button class="ml-4 mt-2" type="border" color="warning">{{__("Reset")}}</vs-button>
    </div>
  </vx-card>
</template>

<script>
import Form from '@/Form'
export default {
  data() {
    return {
      form:new Form({
        current_password: "",
        password: "",
        password_confirmation: "",
      })
    }
  },
  computed: {
    activeUserInfo() {
      return this.$store.state.AppActiveUser
    },
    isDisabled(){
        return !this.form.current_password || !this.form.password || !this.form.password_confirmation
    }
  },
  methods:{
    //   "" put request
    async changePassword(){
        try{
            const data=await this.form.put(`${window.config.root_url}/user/password`);
            Iracode.success(this.__("Your password changed successfully"))
        }catch(e){

        }
    },
    hasValidationError(name) {
        return this.form.errors && this.form.errors.has(name) ? true : undefined;
    },
    validationError(name) {
        return this.form.errors ? this.form.errors.first(name) : undefined;
    },
  }
}
</script>
