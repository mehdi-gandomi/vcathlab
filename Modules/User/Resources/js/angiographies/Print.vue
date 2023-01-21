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
                            {{ __("Cr") }}
                        </vs-th>
                        <vs-th>
                            {{ __("Ht") }}
                        </vs-th>
                        <vs-th>
                            {{ __("L V E F") }}
                        </vs-th>
                        <vs-th>
                            {{ __("H R") }}
                        </vs-th>
                        <vs-th>
                            {{ __("Contrast") }}
                        </vs-th>
                        <vs-th>
                            {{ __("Hb") }}
                        </vs-th>
                        <vs-th>
                            {{ __("P T P") }}
                        </vs-th>
                        <vs-th>
                            {{ __("C A V I") }}
                        </vs-th>
                        <vs-th>
                            {{ __("W B C") }}
                        </vs-th>
                        <vs-th>
                            {{ __("Prior C A B G") }}
                        </vs-th>
                        <vs-th>
                            {{ __("Prior P C I") }}
                        </vs-th>
                        <vs-th>
                            {{ __("Hb A1 C") }}
                        </vs-th>
                        <vs-th>
                            {{ __("Age") }}
                        </vs-th>
                        <vs-th>
                            {{ __("S B P") }}
                        </vs-th>
                        <vs-th>
                            {{ __("D B P") }}
                        </vs-th>
                        <vs-th>
                            {{ __("Heigth") }}
                        </vs-th>
                        <vs-th>
                            {{ __("Weigth") }}
                        </vs-th>
                        <vs-th>
                            {{ __("Sex") }}
                        </vs-th>
                        <vs-th>
                            {{ __("Pribleed") }}
                        </vs-th>
                        <vs-th>
                            {{ __("Hypotension") }}
                        </vs-th>
                        <vs-th>
                            {{ __("Heart Failure") }}
                        </vs-th>
                        <vs-th>
                            {{ __("Diabet") }}
                        </vs-th>
                        <vs-th>
                            {{ __("Acute  M I") }}
                        </vs-th>
                        <vs-th>
                            {{ __("I A B P") }}
                        </vs-th>
                        <vs-th>
                            {{ __("Smoker") }}
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
                            <vs-td :data="data[indextr].Cr">
                                {{ data[indextr].Cr }}
                            </vs-td>
                            <vs-td :data="data[indextr].Ht">
                                {{ data[indextr].Ht }}
                            </vs-td>
                            <vs-td :data="data[indextr].LVEF">
                                {{ data[indextr].LVEF }}
                            </vs-td>
                            <vs-td :data="data[indextr].HR">
                                {{ data[indextr].HR }}
                            </vs-td>
                            <vs-td :data="data[indextr].Contrast">
                                {{ data[indextr].Contrast }}
                            </vs-td>
                            <vs-td :data="data[indextr].Hb">
                                {{ data[indextr].Hb }}
                            </vs-td>
                            <vs-td :data="data[indextr].PTP">
                                {{ data[indextr].PTP }}
                            </vs-td>
                            <vs-td :data="data[indextr].CAVI">
                                {{ data[indextr].CAVI }}
                            </vs-td>
                            <vs-td :data="data[indextr].WBC">
                                {{ data[indextr].WBC }}
                            </vs-td>
                            <vs-td :data="data[indextr].PriorCABG">
                                {{ data[indextr].PriorCABG }}
                            </vs-td>
                            <vs-td :data="data[indextr].PriorPCI">
                                {{ data[indextr].PriorPCI }}
                            </vs-td>
                            <vs-td :data="data[indextr].HbA1C">
                                {{ data[indextr].HbA1C }}
                            </vs-td>
                            <vs-td :data="data[indextr].Age">
                                {{ data[indextr].Age }}
                            </vs-td>
                            <vs-td :data="data[indextr].SBP">
                                {{ data[indextr].SBP }}
                            </vs-td>
                            <vs-td :data="data[indextr].DBP">
                                {{ data[indextr].DBP }}
                            </vs-td>
                            <vs-td :data="data[indextr].Heigth">
                                {{ data[indextr].Heigth }}
                            </vs-td>
                            <vs-td :data="data[indextr].Weigth">
                                {{ data[indextr].Weigth }}
                            </vs-td>
                            <vs-td :data="data[indextr].Sex">
                                {{
                                    data[indextr].Sex
                                        | radioFormatter(data[indextr], "Sex")
                                }}
                            </vs-td>
                            <vs-td :data="data[indextr].pribleed">
                                {{ data[indextr].pribleed }}
                            </vs-td>
                            <vs-td :data="data[indextr].Hypotension">
                                {{ data[indextr].Hypotension }}
                            </vs-td>
                            <vs-td :data="data[indextr].heart_failure">
                                {{ data[indextr].heart_failure }}
                            </vs-td>
                            <vs-td :data="data[indextr].Diabet">
                                {{ data[indextr].Diabet }}
                            </vs-td>
                            <vs-td :data="data[indextr].Acute_MI">
                                {{ data[indextr].Acute_MI }}
                            </vs-td>
                            <vs-td :data="data[indextr].IABP">
                                {{ data[indextr].IABP }}
                            </vs-td>
                            <vs-td :data="data[indextr].Smoker">
                                {{ data[indextr].Smoker }}
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
            baseUrl: "/user/api/angiographies",
            title: this.__("Export Angiographies"),
            items: [],
            model: "Angiography",
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
