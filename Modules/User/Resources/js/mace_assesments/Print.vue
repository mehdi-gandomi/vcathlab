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
                            {{ __("Hb A1 C") }}
                        </vs-th>
                        <vs-th>
                            {{ __("L D L Cholesterol") }}
                        </vs-th>
                        <vs-th>
                            {{ __("H D L Cholesterol") }}
                        </vs-th>
                        <vs-th>
                            {{ __("Age") }}
                        </vs-th>
                        <vs-th>
                            {{ __("S B P") }}
                        </vs-th>
                        <vs-th>
                            {{ __("Triglycerides") }}
                        </vs-th>
                        <vs-th>
                            {{ __("D B P") }}
                        </vs-th>
                        <vs-th>
                            {{ __("Left Anklebrachial Index") }}
                        </vs-th>
                        <vs-th>
                            {{ __("Right Anklebrachial Index") }}
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
                            {{ __("Smoker") }}
                        </vs-th>
                        <vs-th>
                            {{ __("T B P") }}
                        </vs-th>
                        <vs-th>
                            {{ __("M I") }}
                        </vs-th>
                        <vs-th>
                            {{ __("Diabetes") }}
                        </vs-th>
                        <vs-th>
                            {{ __("F H") }}
                        </vs-th>
                        <vs-th>
                            {{ __("T H L") }}
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
                            <vs-td :data="data[indextr].HbA1C">
                                {{ data[indextr].HbA1C }}
                            </vs-td>
                            <vs-td :data="data[indextr].LDL_cholesterol">
                                {{ data[indextr].LDL_cholesterol }}
                            </vs-td>
                            <vs-td :data="data[indextr].HDL_cholesterol">
                                {{ data[indextr].HDL_cholesterol }}
                            </vs-td>
                            <vs-td :data="data[indextr].Age">
                                {{ data[indextr].Age }}
                            </vs-td>
                            <vs-td :data="data[indextr].SBP">
                                {{ data[indextr].SBP }}
                            </vs-td>
                            <vs-td :data="data[indextr].Triglycerides">
                                {{ data[indextr].Triglycerides }}
                            </vs-td>
                            <vs-td :data="data[indextr].DBP">
                                {{ data[indextr].DBP }}
                            </vs-td>
                            <vs-td :data="data[indextr].LeftAnklebrachialIndex">
                                {{ data[indextr].LeftAnklebrachialIndex }}
                            </vs-td>
                            <vs-td
                                :data="data[indextr].RightAnklebrachialIndex"
                            >
                                {{ data[indextr].RightAnklebrachialIndex }}
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
                            <vs-td :data="data[indextr].Smoker">
                                {{ data[indextr].Smoker }}
                            </vs-td>
                            <vs-td :data="data[indextr].TBP">
                                {{ data[indextr].TBP }}
                            </vs-td>
                            <vs-td :data="data[indextr].MI">
                                {{ data[indextr].MI }}
                            </vs-td>
                            <vs-td :data="data[indextr].Diabetes">
                                {{ data[indextr].Diabetes }}
                            </vs-td>
                            <vs-td :data="data[indextr].FH">
                                {{ data[indextr].FH }}
                            </vs-td>
                            <vs-td :data="data[indextr].THL">
                                {{ data[indextr].THL }}
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
            baseUrl: "/user/api/mace_assesments",
            title: this.__("Export Maceassesments"),
            items: [],
            model: "MaceAssesment",
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
