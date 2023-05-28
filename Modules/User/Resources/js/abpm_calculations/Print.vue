<template>
    <div>
        <div class="flex justify-center my-2">
            <vs-button color="success" @click="print" type="filled"
                >Print</vs-button
            >
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
                            {{ __("Sys") }}
                        </vs-th>
                        <vs-th>
                            {{ __("Dia") }}
                        </vs-th>
                        <vs-th>
                            {{ __("Hr") }}
                        </vs-th>
                        <vs-th>
                            {{ __("Created At") }}
                        </vs-th>
                        <vs-th>
                            {{ __("Updated At") }}
                        </vs-th>
                    </template>

                    <template slot-scope="{ data }">
                        <vs-tr :key="indextr" v-for="(tr, indextr) in data">
                            <vs-td :data="data[indextr].sys">
                                {{ data[indextr].sys }}
                            </vs-td>
                            <vs-td :data="data[indextr].dia">
                                {{ data[indextr].dia }}
                            </vs-td>
                            <vs-td :data="data[indextr].hr">
                                {{ data[indextr].hr }}
                            </vs-td>
                            <vs-td :data="data[indextr].created_at">
                                {{
                                    data[indextr].created_at
                                        | dateFormatter(
                                            data[indextr],
                                            "created_at"
                                        )
                                }}
                            </vs-td>
                            <vs-td :data="data[indextr].updated_at">
                                {{
                                    data[indextr].updated_at
                                        | dateFormatter(
                                            data[indextr],
                                            "updated_at"
                                        )
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
            baseUrl: "/user/api/aobp_calculations",
            title: this.__("Export Aobpcalculations"),
            items: [],
            model: "AobpCalculation",
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
