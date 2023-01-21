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
                            {{ __("Age") }}
                        </vs-th>
                        <vs-th>
                            {{ __("Sex") }}
                        </vs-th>
                        <vs-th>
                            {{ __("Waist") }}
                        </vs-th>
                        <vs-th>
                            {{ __("S M M") }}
                        </vs-th>
                        <vs-th>
                            {{ __("V F P") }}
                        </vs-th>
                        <vs-th>
                            {{ __("Height") }}
                        </vs-th>
                        <vs-th>
                            {{ __("Weight") }}
                        </vs-th>
                        <vs-th>
                            {{ __("Hip") }}
                        </vs-th>
                        <vs-th>
                            {{ __("B F M P") }}
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
                            <vs-td :data="data[indextr].Age">
                                {{ data[indextr].Age }}
                            </vs-td>
                            <vs-td :data="data[indextr].Sex">
                                {{
                                    data[indextr].Sex
                                        | radioFormatter(data[indextr], "Sex")
                                }}
                            </vs-td>
                            <vs-td :data="data[indextr].Waist">
                                {{ data[indextr].Waist }}
                            </vs-td>
                            <vs-td :data="data[indextr].SMM">
                                {{ data[indextr].SMM }}
                            </vs-td>
                            <vs-td :data="data[indextr].VFP">
                                {{ data[indextr].VFP }}
                            </vs-td>
                            <vs-td :data="data[indextr].Height">
                                {{ data[indextr].Height }}
                            </vs-td>
                            <vs-td :data="data[indextr].Weight">
                                {{ data[indextr].Weight }}
                            </vs-td>
                            <vs-td :data="data[indextr].Hip">
                                {{ data[indextr].Hip }}
                            </vs-td>
                            <vs-td :data="data[indextr].BFMP">
                                {{ data[indextr].BFMP }}
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
            baseUrl: "/user/api/body_compositions",
            title: this.__("Export Bodycompositions"),
            items: [],
            model: "BodyComposition",
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
