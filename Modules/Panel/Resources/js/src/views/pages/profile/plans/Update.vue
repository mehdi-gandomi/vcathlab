<template>
  <div class="mb-base">
    <vx-card>
      <template v-slot:actions>
        <vs-button color="primary" to="/user/plans" type="filled">{{
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
                <span>{{ __("Slug") }}</span>
                <span class="ml-1 text-red">*</span>
              </vs-col>
              <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                <component
                  :is="inputs.slug.type"
                  v-model="form.slug"
                  class="w-full"
                  :danger="hasValidationError('slug')"
                  :danger-text="validationError('slug')"
                  name="slug"
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
                <span>{{ __("Name") }}</span>
                <span class="ml-1 text-red">*</span>
              </vs-col>
              <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                <component
                  :is="inputs.name.type"
                  v-model="form.name"
                  class="w-full"
                  :danger="hasValidationError('name')"
                  :danger-text="validationError('name')"
                  name="name"
                  type="textarea"
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
                <span>{{ __("Description") }}</span>
              </vs-col>
              <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                <component
                  :is="inputs.description.type"
                  v-model="form.description"
                  class="w-full"
                  :danger="hasValidationError('description')"
                  :danger-text="validationError('description')"
                  name="description"
                  type="textarea"
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
                <span>{{ __("Is Active") }}</span>
                <span class="ml-1 text-red">*</span>
              </vs-col>
              <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                <component
                  :is="inputs.is_active.type"
                  v-model="form.is_active"
                  class="w-full"
                  :danger="hasValidationError('is_active')"
                  :danger-text="validationError('is_active')"
                  name="is_active"
                  type="checkbox"
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
                <span>{{ __("Price") }}</span>
                <span class="ml-1 text-red">*</span>
              </vs-col>
              <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                <component
                  :is="inputs.price.type"
                  v-model="form.price"
                  class="w-full"
                  :danger="hasValidationError('price')"
                  :danger-text="validationError('price')"
                  name="price"
                  type="number"
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
                <span>{{ __("Signup Fee") }}</span>
                <span class="ml-1 text-red">*</span>
              </vs-col>
              <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                <component
                  :is="inputs.signup_fee.type"
                  v-model="form.signup_fee"
                  class="w-full"
                  :danger="hasValidationError('signup_fee')"
                  :danger-text="validationError('signup_fee')"
                  name="signup_fee"
                  type="number"
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
                <span>{{ __("Currency") }}</span>
                <span class="ml-1 text-red">*</span>
              </vs-col>
              <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                <component
                  :is="inputs.currency.type"
                  v-model="form.currency"
                  class="w-full"
                  :danger="hasValidationError('currency')"
                  :danger-text="validationError('currency')"
                  name="currency"
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
                <span>{{ __("Trial Period") }}</span>
                <span class="ml-1 text-red">*</span>
              </vs-col>
              <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                <component
                  :is="inputs.trial_period.type"
                  v-model="form.trial_period"
                  class="w-full"
                  :danger="hasValidationError('trial_period')"
                  :danger-text="validationError('trial_period')"
                  name="trial_period"
                  type="number"
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
                <span>{{ __("Trial Interval") }}</span>
                <span class="ml-1 text-red">*</span>
              </vs-col>
              <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                <component
                  :is="inputs.trial_interval.type"
                  :value="inputs.trial_interval.selected"
                  @input="(op) => onSelect('trial_interval', op)"
                  class="w-full"
                  :danger="hasValidationError('trial_interval')"
                  :danger-text="validationError('trial_interval')"
                  name="trial_interval"
                  type="select"
                  :options="inputs.trial_interval.options"
                  :dir="$vs.rtl ? 'rtl' : 'ltr'"
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
                <span>{{ __("Invoice Period") }}</span>
                <span class="ml-1 text-red">*</span>
              </vs-col>
              <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                <component
                  :is="inputs.invoice_period.type"
                  v-model="form.invoice_period"
                  class="w-full"
                  :danger="hasValidationError('invoice_period')"
                  :danger-text="validationError('invoice_period')"
                  name="invoice_period"
                  type="number"
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
                <span>{{ __("Invoice Interval") }}</span>
                <span class="ml-1 text-red">*</span>
              </vs-col>
              <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                <component
                  :is="inputs.invoice_interval.type"
                  :value="inputs.invoice_interval.selected"
                  @input="(op) => onSelect('invoice_interval', op)"
                  class="w-full"
                  :danger="hasValidationError('invoice_interval')"
                  :danger-text="validationError('invoice_interval')"
                  name="invoice_interval"
                  type="select"
                  :options="inputs.invoice_interval.options"
                  :dir="$vs.rtl ? 'rtl' : 'ltr'"
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
                <span>{{ __("Grace Period") }}</span>
                <span class="ml-1 text-red">*</span>
              </vs-col>
              <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                <component
                  :is="inputs.grace_period.type"
                  v-model="form.grace_period"
                  class="w-full"
                  :danger="hasValidationError('grace_period')"
                  :danger-text="validationError('grace_period')"
                  name="grace_period"
                  type="number"
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
                <span>{{ __("Grace Interval") }}</span>
                <span class="ml-1 text-red">*</span>
              </vs-col>
              <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                <component
                  :is="inputs.grace_interval.type"
                  v-model="form.grace_interval"
                  class="w-full"
                  :danger="hasValidationError('grace_interval')"
                  :danger-text="validationError('grace_interval')"
                  name="grace_interval"
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
                <span>{{ __("Prorate Extend Due") }}</span>
              </vs-col>
              <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                <component
                  :is="inputs.prorate_extend_due.type"
                  v-model="form.prorate_extend_due"
                  class="w-full"
                  :danger="hasValidationError('prorate_extend_due')"
                  :danger-text="validationError('prorate_extend_due')"
                  name="prorate_extend_due"
                  type="number"
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
                <span>{{ __("Active Subscribers Limit") }}</span>
              </vs-col>
              <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                <component
                  :is="inputs.active_subscribers_limit.type"
                  v-model="form.active_subscribers_limit"
                  class="w-full"
                  :danger="hasValidationError('active_subscribers_limit')"
                  :danger-text="validationError('active_subscribers_limit')"
                  name="active_subscribers_limit"
                  type="number"
                />
              </vs-col>
            </vs-row>
          </vs-col>
        </vs-row>
        <vs-row vs-type="flex" vs-w="12" class="mb-6"> </vs-row>
        <vs-row vs-type="flex" vs-w="12" class="mb-6"> </vs-row>

        <div class="flex justify-end mt-16">
          <div class="flex">
            <vs-button
              color="success"
              @click="() => onSubmit('close')"
              class="mr-3 mb-2"
              >{{ __("Save") }}</vs-button
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
import UpdatePage from "@/mixins/UpdatePage";
export default {
  components: {},
  mixins: [HasForm, UpdatePage],
  data() {
    return {
      form: new Form({
        slug: "",
        name: "",
        description: "",
        is_active: false,
        price: "",
        signup_fee: "",
        currency: "",
        trial_period: "",
        trial_interval: "month",
        invoice_period: "",
        invoice_interval: "month",
        grace_period: "",
        grace_interval: "",
        prorate_extend_due: "",
        active_subscribers_limit: "",
      }),
      model: "Modules\\User\\Models\\Plan",
      inputs: {
        slug: {
          type: "vs-input",
          field_type: "text",
        },
        name: {
          type: "vs-textarea",
          field_type: "textarea",
        },
        description: {
          type: "vs-textarea",
          field_type: "textarea",
        },
        is_active: {
          type: "vs-checkbox",
          field_type: "checkbox",
        },
        price: {
          type: "vs-input",
          field_type: "number",
        },
        signup_fee: {
          type: "vs-input",
          field_type: "number",
        },
        currency: {
          type: "vs-input",
          field_type: "text",
        },
        trial_period: {
          type: "vs-input",
          field_type: "number",
        },
        trial_interval: {
          type: "v-select",
          field_type: "select",
          options: [
            {
              label: "Month",
              value: "month",
            },
            {
              label: "Year",
              value: "year",
            },
          ],
          selected: {},
        },
        invoice_period: {
          type: "vs-input",
          field_type: "number",
        },
        invoice_interval: {
          type: "v-select",
          field_type: "select",
          options: [
            {
              label: "Month",
              value: "month",
            },
            {
              label: "Year",
              value: "year",
            },
          ],
          selected: {},
        },
        grace_period: {
          type: "vs-input",
          field_type: "number",
        },
        grace_interval: {
          type: "vs-input",
          field_type: "text",
        },
        prorate_extend_due: {
          type: "vs-input",
          field_type: "number",
        },
        active_subscribers_limit: {
          type: "vs-input",
          field_type: "number",
        },
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
      `/user/api/plans/${this.$route.params.id}`
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
  methods: {
    async onSubmit(action) {
      const data = await this.form.put(
        `/user/api/plans/${this.$route.params.id}`
      );
      if (data.success) {
        Iracode.success(this.__("Plan Updated Successfully"));
      }
      if (action == "close") this.$router.push("/user/plans");
      else this.form.reset();
    },
  },
};
</script>
