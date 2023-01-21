<template>
  <div class="mb-base create-form">
    <vx-card>
      <template v-slot:actions>
        <vs-button color="primary" to="/accesslevel/users" type="filled">{{
          __("Back")
        }}</vs-button>
      </template>
      <form @submit="onSubmit">
        <vs-row vs-type="flex" vs-w="12" class="mb-6">
          <vs-col vs-type="flex" vs-align="center" vs-lg="6">
            <vs-row vs-type="flex" vs-w="12">
              <vs-col
                class="justify-end pr-5"
                vs-type="flex"
                vs-align="center"
                vs-lg="3"
              >
                <span>{{ __("Email") }}</span>
              </vs-col>
              <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                <component
                  :is="inputs.email.type"
                  v-model="form.email"
                  class="w-full"
                  :danger="hasValidationError('email')"
                  :danger-text="validationError('email')"
                  name="email"
                  type="text"
                />
              </vs-col>
            </vs-row>
          </vs-col>
          <vs-col vs-type="flex" vs-align="center" vs-lg="6">
            <vs-row vs-type="flex" vs-w="12">
              <vs-col
                class="justify-end pr-5"
                vs-type="flex"
                vs-align="center"
                vs-lg="3"
              >
                <span>{{ __("Username") }}</span>
              </vs-col>
              <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                <component
                  :is="inputs.username.type"
                  v-model="form.username"
                  class="w-full"
                  :danger="hasValidationError('username')"
                  :danger-text="validationError('username')"
                  name="username"
                  type="text"
                />
              </vs-col>
            </vs-row>
          </vs-col>
        </vs-row>

        <vs-row vs-type="flex" vs-w="12" class="mb-6">
          <vs-col vs-type="flex" vs-align="center" vs-lg="6">
            <vs-row vs-type="flex" vs-w="12">
              <vs-col
                class="justify-end pr-5"
                vs-type="flex"
                vs-align="center"
                vs-lg="3"
              >
                <span>{{ __("Mobile") }}</span>
              </vs-col>
              <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                <component
                  :is="inputs.mobile.type"
                  v-model="form.mobile"
                  class="w-full"
                  :danger="hasValidationError('mobile')"
                  :danger-text="validationError('mobile')"
                  name="mobile"
                  type="text"
                />
              </vs-col>
            </vs-row>
          </vs-col>
          <!-- <vs-col vs-type="flex" vs-align="center" vs-lg="6">
            <vs-row vs-type="flex" vs-w="12">
              <vs-col
                class="justify-end pr-5"
                vs-type="flex"
                vs-align="center"
                vs-lg="3"
              >
                <span>{{ __("Avatar Url") }}</span>
              </vs-col>
              <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                <component
                  :is="inputs.avatar_url.type"
                  v-model="form.avatar_url"
                  class="w-full"
                  :danger="hasValidationError('avatar_url')"
                  :danger-text="validationError('avatar_url')"
                  name="avatar_url"
                  type="text"
                />
              </vs-col>
            </vs-row>
          </vs-col> -->
        </vs-row>


        <div class="flex justify-end mt-16">
          <div class="flex">
            <vs-button
              color="success"
              @click="() => onSubmit('new')"
              class="mr-3 mb-2"
              >{{ __("Save and new") }}</vs-button
            >
            <vs-button
              color="success"
              @click="() => onSubmit('close')"
              class="mr-3 mb-2"
              >{{ __("Save and close") }}</vs-button
            >
            <vs-button color="warning" class="mb-2" @click="form.reset()">{{
              __("Clear")
            }}</vs-button>
          </div>
        </div>
      </form>
    </vx-card>
  </div>
</template>

<script>
import Form from "@/Form";
import HasForm from "@/mixins/HasForm";
export default {
  components: {},
  mixins: [HasForm],
  data() {
    return {
      form: new Form({
        email: "",
        master: "",
        email_verified_at: "",
        username: "",
        mobile: "",
        avatar_url: "",
        state: "",
      }),
      model: "Modules\\AccessLevel\\Models\\User",
      locale: window.Iracode.$i18n.locale,
      inputs: {
        email: {
          type: "vs-input",
          field_type: "text",
        },
        master: {
          type: "vs-radio",
          field_type: "radio",
        },
        email_verified_at: {
          type: "persian-date-picker",
          field_type: "datetime",
        },
        username: {
          type: "vs-input",
          field_type: "text",
        },
        mobile: {
          type: "vs-input",
          field_type: "text",
        },
        avatar_url: {
          type: "vs-input",
          field_type: "text",
        },
        state: {
          type: "vs-radio",
          field_type: "radio",
        },
      },
      locales: window.config.locales,
    };
  },
  props: {
    //
  },
  computed: {
    //
  },
  created() {
    //
  },
  mounted() {
    //
  },
  methods: {
    async onSubmit(action) {
      const data = await this.form.post("/accesslevel/api/users");
      if (data.success) {
        Iracode.success(this.__("User Created Successfully"));
        if (action == "close") this.$router.push("/accesslevel/users");
        else this.form.reset();
      }
    },
  },
};
</script>
<style>
.create-form .vs-tabs--content {
  padding: 0;
}
</style>
