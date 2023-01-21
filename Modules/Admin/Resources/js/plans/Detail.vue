<template>
<loading-view :loading="loading">
  <div class="vx-row">
    <div class="vx-col w-full">
      <vx-card class="mb-base">
        <template v-slot:actions>
          <vs-button color="primary" to="/user/plans" type="filled"
            >Back</vs-button
          >
        </template>
        <div class="vx-row mb-6">
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <p class="font-semibold">{{ __("Slug") }}</p>
              </div>
              <div class="vx-col w-3/4">
                {{ details.slug }}
              </div>
            </div>
          </div>
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <p class="font-semibold">{{ __("Name") }}</p>
              </div>
              <div class="vx-col w-3/4">
                {{ details.name }}
              </div>
            </div>
          </div>
        </div>
        <div class="vx-row mb-6">
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <p class="font-semibold">{{ __("Description") }}</p>
              </div>
              <div class="vx-col w-3/4">
                {{ details.description }}
              </div>
            </div>
          </div>
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <p class="font-semibold">{{ __("Is Active") }}</p>
              </div>
              <div class="vx-col w-3/4">
                {{ details.is_active }}
              </div>
            </div>
          </div>
        </div>
        <div class="vx-row mb-6">
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <p class="font-semibold">{{ __("Price") }}</p>
              </div>
              <div class="vx-col w-3/4">
                {{ details.price }}
              </div>
            </div>
          </div>
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <p class="font-semibold">{{ __("Signup Fee") }}</p>
              </div>
              <div class="vx-col w-3/4">
                {{ details.signup_fee }}
              </div>
            </div>
          </div>
        </div>
        <div class="vx-row mb-6">
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <p class="font-semibold">{{ __("Currency") }}</p>
              </div>
              <div class="vx-col w-3/4">
                {{ details.currency }}
              </div>
            </div>
          </div>
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <p class="font-semibold">{{ __("Trial Period") }}</p>
              </div>
              <div class="vx-col w-3/4">
                {{ details.trial_period }}
              </div>
            </div>
          </div>
        </div>
        <div class="vx-row mb-6">
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <p class="font-semibold">{{ __("Trial Interval") }}</p>
              </div>
              <div class="vx-col w-3/4">
                {{ selectFormat("trial_interval") }}
              </div>
            </div>
          </div>
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <p class="font-semibold">{{ __("Invoice Period") }}</p>
              </div>
              <div class="vx-col w-3/4">
                {{ details.invoice_period }}
              </div>
            </div>
          </div>
        </div>
        <div class="vx-row mb-6">
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <p class="font-semibold">{{ __("Invoice Interval") }}</p>
              </div>
              <div class="vx-col w-3/4">
                {{ selectFormat("invoice_interval") }}
              </div>
            </div>
          </div>
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <p class="font-semibold">{{ __("Grace Period") }}</p>
              </div>
              <div class="vx-col w-3/4">
                {{ details.grace_period }}
              </div>
            </div>
          </div>
        </div>
        <div class="vx-row mb-6">
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <p class="font-semibold">{{ __("Grace Interval") }}</p>
              </div>
              <div class="vx-col w-3/4">
                {{ details.grace_interval }}
              </div>
            </div>
          </div>
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <p class="font-semibold">{{ __("Prorate Extend Due") }}</p>
              </div>
              <div class="vx-col w-3/4">
                {{ details.prorate_extend_due }}
              </div>
            </div>
          </div>
        </div>
        <div class="vx-row mb-6">
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <p class="font-semibold">
                  {{ __("Active Subscribers Limit") }}
                </p>
              </div>
              <div class="vx-col w-3/4">
                {{ details.active_subscribers_limit }}
              </div>
            </div>
          </div>
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <p class="font-semibold">{{ __("Sort Order") }}</p>
              </div>
              <div class="vx-col w-3/4">
                {{ details.sort_order }}
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
                <p class="font-semibold">{{ __("Updated At") }}</p>
              </div>
              <div class="vx-col w-3/4">
                {{ dateFormat("updated_at") }}
              </div>
            </div>
          </div>
        </div>
        <div class="vx-row mb-6">
          <div class="vx-col w-1/2">
            <div class="row flex">
              <div class="vx-col w-1/4 pr-5 flex justify-end items-center">
                <p class="font-semibold">{{ __("Deleted At") }}</p>
              </div>
              <div class="vx-col w-3/4">
                {{ dateFormat("deleted_at") }}
              </div>
            </div>
          </div>
        </div>
      </vx-card>
    </div>
  </div>
  </loading-view>
</template>
<script>
import DetailPage from "@/mixins/DetailPage";
export default {
  components: {},
  mixins: [DetailPage],
  data() {
    return {
      details: {
        slug: "",
        name: "",
        description: "",
        is_active: "",
        price: "",
        signup_fee: "",
        currency: "",
        trial_period: "",
        trial_interval: "",
        invoice_period: "",
        invoice_interval: "",
        grace_period: "",
        grace_interval: "",
        prorate_extend_due: "",
        active_subscribers_limit: "",
        sort_order: "",
        created_at: "",
        updated_at: "",
        deleted_at: "",
      },
      formTypes: {
        slug: "text",
        name: "text",
        description: "text",
        is_active: "text",
        price: "text",
        signup_fee: "text",
        currency: "text",
        trial_period: "text",
        trial_interval: "text",
        invoice_period: "text",
        invoice_interval: "text",
        grace_period: "text",
        grace_interval: "text",
        prorate_extend_due: "text",
        active_subscribers_limit: "text",
        sort_order: "text",
        created_at: "text",
        updated_at: "text",
        deleted_at: "text",
      },
      module: "User",
      model: "Plan",
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
      `/user/api/plans/${this.$route.params.id}`
    );
    if (response.success) {
      const { data } = response;
      this.$store.dispatch("setCurrentResource", data);
      this.populateFormFields(data);
    }
    this.loading=false;
  },
  mounted() {
    //
  },
  methods: {

  },
};
</script>
