<template>
  <div>
    <div class="flex justify-center my-2">
      <vs-button color="success" @click="print" type="filled">Print</vs-button>
    </div>
    <div id="crudPrint">
      <div class="flex justify-between">
        <div class="logo">
          <img :src="logoUrl" alt="" />
        </div>
        <div class="exportTitle">
          <h4>{{ title }}</h4>
        </div>
        <div class="date">
          <strong>{{ __("Date") }}:</strong>
          <p>{{ currentDate }}</p>
        </div>
      </div>
      <div class="flex justify-between my-5">
        <div class="siteName">
          <h4>{{ site_name }}</h4>
        </div>
        <div class="exportTitle">
          <h4>{{ title }}</h4>
        </div>
        <div class="date">
          <strong>{{ __("Time") }}:</strong>
          <p>{{ currentTime }}</p>
        </div>
      </div>
      <div class="table-wrap">
        <vs-table stripe :data="items">
          <template slot="thead">
            <vs-th>
              {{ __("Slug") }}
            </vs-th>
            <vs-th>
              {{ __("Name") }}
            </vs-th>
            <vs-th>
              {{ __("Description") }}
            </vs-th>
            <vs-th>
              {{ __("Is Active") }}
            </vs-th>
            <vs-th>
              {{ __("Price") }}
            </vs-th>
            <vs-th>
              {{ __("Signup Fee") }}
            </vs-th>
            <vs-th>
              {{ __("Currency") }}
            </vs-th>
            <vs-th>
              {{ __("Trial Period") }}
            </vs-th>
            <vs-th>
              {{ __("Trial Interval") }}
            </vs-th>
            <vs-th>
              {{ __("Invoice Period") }}
            </vs-th>
            <vs-th>
              {{ __("Invoice Interval") }}
            </vs-th>
            <vs-th>
              {{ __("Grace Period") }}
            </vs-th>
            <vs-th>
              {{ __("Grace Interval") }}
            </vs-th>
            <vs-th>
              {{ __("Prorate Extend Due") }}
            </vs-th>
            <vs-th>
              {{ __("Active Subscribers Limit") }}
            </vs-th>
            <vs-th>
              {{ __("Sort Order") }}
            </vs-th>
            <vs-th>
              {{ __("Created At") }}
            </vs-th>
            <vs-th>
              {{ __("Updated At") }}
            </vs-th>
            <vs-th>
              {{ __("Deleted At") }}
            </vs-th>
          </template>

          <template slot-scope="{ data }">
            <vs-tr :key="indextr" v-for="(tr, indextr) in data">
              <vs-td :data="data[indextr].slug">
                {{ data[indextr].slug }}
              </vs-td>
              <vs-td :data="data[indextr].name">
                {{ data[indextr].name }}
              </vs-td>
              <vs-td :data="data[indextr].description">
                {{ data[indextr].description }}
              </vs-td>
              <vs-td :data="data[indextr].is_active">
                {{ data[indextr].is_active }}
              </vs-td>
              <vs-td :data="data[indextr].price">
                {{ data[indextr].price }}
              </vs-td>
              <vs-td :data="data[indextr].signup_fee">
                {{ data[indextr].signup_fee }}
              </vs-td>
              <vs-td :data="data[indextr].currency">
                {{ data[indextr].currency }}
              </vs-td>
              <vs-td :data="data[indextr].trial_period">
                {{ data[indextr].trial_period }}
              </vs-td>
              <vs-td :data="data[indextr].trial_interval">
                {{
                  data[indextr].trial_interval
                    | selectFormatter(data[indextr], "trial_interval")
                }}
              </vs-td>
              <vs-td :data="data[indextr].invoice_period">
                {{ data[indextr].invoice_period }}
              </vs-td>
              <vs-td :data="data[indextr].invoice_interval">
                {{
                  data[indextr].invoice_interval
                    | selectFormatter(data[indextr], "invoice_interval")
                }}
              </vs-td>
              <vs-td :data="data[indextr].grace_period">
                {{ data[indextr].grace_period }}
              </vs-td>
              <vs-td :data="data[indextr].grace_interval">
                {{ data[indextr].grace_interval }}
              </vs-td>
              <vs-td :data="data[indextr].prorate_extend_due">
                {{ data[indextr].prorate_extend_due }}
              </vs-td>
              <vs-td :data="data[indextr].active_subscribers_limit">
                {{ data[indextr].active_subscribers_limit }}
              </vs-td>
              <vs-td :data="data[indextr].sort_order">
                {{ data[indextr].sort_order }}
              </vs-td>
              <vs-td :data="data[indextr].created_at">
                {{ data[indextr].created_at }}
              </vs-td>
              <vs-td :data="data[indextr].updated_at">
                {{ data[indextr].updated_at }}
              </vs-td>
              <vs-td :data="data[indextr].deleted_at">
                {{
                  data[indextr].deleted_at
                    | dateFormatter(data[indextr], "deleted_at")
                }}
              </vs-td>
            </vs-tr>
          </template>
        </vs-table>
      </div>
    </div>
  </div>
</template>

<script>
import Printable from "@/mixins/Printable";
export default {
  mixins: [Printable],
  data() {
    return {
      baseUrl: "/user/api/plans",
      title: this.__("Export Plans"),
      items: [],
      model: "Plan",
      module: "User",
    };
  },
};
</script>
<style lang="scss">
#crudPrint {
  padding: 5rem;
  max-width: 90%;
  margin: auto;

  .logo {
    width: 100px;
    img {
      width: 100%;
    }
  }
}
</style>
