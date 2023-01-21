<template>
  <div class="vx-row">
    <div class="vx-col w-full">
      <vx-card class="mb-base">
        <template v-slot:actions>
          <vs-button color="primary" to="/accesslevel/users" type="filled"
            >Back</vs-button
          >
        </template>
        <div class="vx-row mb-6">
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <p class="font-semibold">{{ __("Email") }}</p>
              </div>
              <div class="vx-col w-3/4">
                {{ details.email }}
              </div>
            </div>
          </div>
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <p class="font-semibold">{{ __("Master") }}</p>
              </div>
              <div class="vx-col w-3/4">
                {{ radioFormat("master") }}
              </div>
            </div>
          </div>
        </div>
        <div class="vx-row mb-6">
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <p class="font-semibold">{{ __("Email Verified At") }}</p>
              </div>
              <div class="vx-col w-3/4">
                {{ dateFormat("email_verified_at") }}
              </div>
            </div>
          </div>
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <p class="font-semibold">{{ __("Username") }}</p>
              </div>
              <div class="vx-col w-3/4">
                {{ details.username }}
              </div>
            </div>
          </div>
        </div>
        <div class="vx-row mb-6">
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <p class="font-semibold">{{ __("Mobile") }}</p>
              </div>
              <div class="vx-col w-3/4">
                {{ details.mobile }}
              </div>
            </div>
          </div>
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <p class="font-semibold">{{ __("Avatar Url") }}</p>
              </div>
              <div class="vx-col w-3/4">
                {{ details.avatar_url }}
              </div>
            </div>
          </div>
        </div>
        <div class="vx-row mb-6">
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <p class="font-semibold">{{ __("Created At") }}</p>
              </div>
              <div class="vx-col w-3/4">
                {{ dateFormat("created_at") }}
              </div>
            </div>
          </div>
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <p class="font-semibold">{{ __("State") }}</p>
              </div>
              <div class="vx-col w-3/4">
                {{ radioFormat("state") }}
              </div>
            </div>
          </div>
        </div>
      </vx-card>
    </div>
  </div>
</template>
<script>
import DetailPage from "@/mixins/DetailPage";
export default {
  components: {},
  mixins: [DetailPage],
  data() {
    return {
      details: {
        email: "",
        master: "",
        email_verified_at: "",
        username: "",
        mobile: "",
        avatar_url: "",
        created_at: "",
        state: "",
      },
      formTypes: {
        email: "text",
        master: "text",
        email_verified_at: "text",
        username: "text",
        mobile: "text",
        avatar_url: "text",
        created_at: "text",
        state: "text",
      },
      module: "AccessLevel",
      model: "User",
    };
  },
  props: {
    //
  },
  computed: {
    Iracode() {
      return window.Iracode;
    },
  },
  async created() {
    const { data: response } = await this.$http.get(
      `/accesslevel/api/users/${this.$route.params.id}`
    );
    if (response.success) {
      const { data } = response;
      this.$store.dispatch("setCurrentResource", data);
      this.populateFormFields(data);
    }
  },
  mounted() {
    //
  },
};
</script>
