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
            <div class="flex justify-between  my-5">
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
                            {{ __("L V E D D") }}
                        </vs-th>
                        <vs-th>
                            {{ __("L V E S D") }}
                        </vs-th>
                        <vs-th>
                            {{ __("I V S D") }}
                        </vs-th>
                        <vs-th>
                            {{ __("D B P") }}
                        </vs-th>
                        <vs-th>
                            {{ __("P W T D") }}
                        </vs-th>
                        <vs-th>
                            {{ __("T A P S E") }}
                        </vs-th>
                        <vs-th>
                            {{ __("P A P") }}
                        </vs-th>
                        <vs-th>
                            {{ __("S B P") }}
                        </vs-th>
                        <vs-th>
                            {{ __("L V E F") }}
                        </vs-th>
                        <vs-th>
                            {{ __("Weight") }}
                        </vs-th>
                        <vs-th>
                            {{ __("Height") }}
                        </vs-th>
                        <vs-th>
                            {{ __("H R") }}
                        </vs-th>
                        <vs-th>
                            {{ __("Conditions") }}
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
                            <vs-td :data="data[indextr].LVEDD">
                                {{ data[indextr].LVEDD }}
                            </vs-td>
                            <vs-td :data="data[indextr].LVESD">
                                {{ data[indextr].LVESD }}
                            </vs-td>
                            <vs-td :data="data[indextr].IVSD">
                                {{ data[indextr].IVSD }}
                            </vs-td>
                            <vs-td :data="data[indextr].DBP">
                                {{ data[indextr].DBP }}
                            </vs-td>
                            <vs-td :data="data[indextr].PWTD">
                                {{ data[indextr].PWTD }}
                            </vs-td>
                            <vs-td :data="data[indextr].TAPSE">
                                {{ data[indextr].TAPSE }}
                            </vs-td>
                            <vs-td :data="data[indextr].PAP">
                                {{ data[indextr].PAP }}
                            </vs-td>
                            <vs-td :data="data[indextr].SBP">
                                {{ data[indextr].SBP }}
                            </vs-td>
                            <vs-td :data="data[indextr].LVEF">
                                {{ data[indextr].LVEF }}
                            </vs-td>
                            <vs-td :data="data[indextr].Weight">
                                {{ data[indextr].Weight }}
                            </vs-td>
                            <vs-td :data="data[indextr].Height">
                                {{ data[indextr].Height }}
                            </vs-td>
                            <vs-td :data="data[indextr].HR">
                                {{ data[indextr].HR }}
                            </vs-td>
                            <vs-td :data="data[indextr].conditions">
                                {{ data[indextr].conditions }}
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
            baseUrl: "/user/api/echo_calculations",
            title: this.__("Export Echocalculations"),
            items: [],
            model: "EchoCalculation",
            module: "User"
        };
    }
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
