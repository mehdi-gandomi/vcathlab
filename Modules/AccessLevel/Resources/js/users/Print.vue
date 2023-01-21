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
              {{ __("Email") }}
            </vs-th>
            <vs-th>
              {{ __("Master") }}
            </vs-th>
            <vs-th>
              {{ __("Email Verified At") }}
            </vs-th>
            <vs-th>
              {{ __("Username") }}
            </vs-th>
            <vs-th>
              {{ __("Mobile") }}
            </vs-th>
            <vs-th>
              {{ __("Avatar Url") }}
            </vs-th>
            <vs-th>
              {{ __("Created At") }}
            </vs-th>
            <vs-th>
              {{ __("State") }}
            </vs-th>
          </template>

          <template slot-scope="{ data }">
            <vs-tr :key="indextr" v-for="(tr, indextr) in data">
              <vs-td :data="data[indextr].email">
                {{ data[indextr].email }}
              </vs-td>
              <vs-td :data="data[indextr].master">
                {{
                  data[indextr].master | radioFormatter(data[indextr], "master")
                }}
              </vs-td>
              <vs-td :data="data[indextr].email_verified_at">
                {{
                  data[indextr].email_verified_at
                    | dateFormatter(data[indextr], "email_verified_at")
                }}
              </vs-td>
              <vs-td :data="data[indextr].username">
                {{ data[indextr].username }}
              </vs-td>
              <vs-td :data="data[indextr].mobile">
                {{ data[indextr].mobile }}
              </vs-td>
              <vs-td :data="data[indextr].avatar_url">
                {{ data[indextr].avatar_url }}
              </vs-td>
              <vs-td :data="data[indextr].created_at">
                {{
                  data[indextr].created_at
                    | dateFormatter(data[indextr], "created_at")
                }}
              </vs-td>
              <vs-td :data="data[indextr].state">
                {{
                  data[indextr].state | radioFormatter(data[indextr], "state")
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
      baseUrl: "/accesslevel/api/users",
      title: this.__("Export Users"),
      items: [],
      model: "User",
      module: "AccessLevel",
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
