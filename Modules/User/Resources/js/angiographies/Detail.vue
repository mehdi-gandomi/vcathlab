<template>
    <loading-view :loading="loading">
        <div class="vx-row">
            <div class="vx-col w-full">
                <vx-card class="mb-base">
                    <template v-slot:actions>
                        <vs-button
                            color="primary"
                            to="/user/angiographies"
                            type="filled"
                            >Back</vs-button
                        >
                    </template>
                    <div class="vx-row mb-6">
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">{{ __("Cr") }}</p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.Cr }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">{{ __("Ht") }}</p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.Ht }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="vx-row mb-6">
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">
                                        {{ __("L V E F") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.LVEF }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">{{ __("H R") }}</p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.HR }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="vx-row mb-6">
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">
                                        {{ __("Contrast") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.Contrast }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">{{ __("Hb") }}</p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.Hb }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="vx-row mb-6">
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">
                                        {{ __("P T P") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.PTP }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">
                                        {{ __("C A V I") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.CAVI }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="vx-row mb-6">
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">
                                        {{ __("W B C") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.WBC }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">
                                        {{ __("Prior C A B G") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.PriorCABG }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="vx-row mb-6">
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">
                                        {{ __("Prior P C I") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.PriorPCI }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">
                                        {{ __("Hb A1 C") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.HbA1C }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="vx-row mb-6">
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">{{ __("Age") }}</p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.Age }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">
                                        {{ __("S B P") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.SBP }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="vx-row mb-6">
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">
                                        {{ __("D B P") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.DBP }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">
                                        {{ __("Height") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.Height }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="vx-row mb-6">
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">
                                        {{ __("Weight") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.Weight }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">{{ __("Sex") }}</p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ radioFormat("Sex") }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="vx-row mb-6">
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">
                                        {{ __("Pribleed") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.pribleed }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">
                                        {{ __("Hypotension") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.Hypotension }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="vx-row mb-6">
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">
                                        {{ __("Heart Failure") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.heart_failure }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">
                                        {{ __("Diabet") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.Diabet }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="vx-row mb-6">
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">
                                        {{ __("Acute  M I") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.Acute_MI }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">
                                        {{ __("I A B P") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.IABP }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="vx-row mb-6">
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">
                                        {{ __("Smoker") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.Smoker }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">
                                        {{ __("Created At") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ dateFormat("created_at") }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="vx-row mb-6">
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">
                                        {{ __("Updated At") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ dateFormat("updated_at") }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">
                                        {{ __("user") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.user }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="vx-row mb-6">
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">
                                        {{ __("patient") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.patient }}
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
                Cr: "",
                Ht: "",
                LVEF: "",
                HR: "",
                Contrast: "",
                Hb: "",
                PTP: "",
                CAVI: "",
                WBC: "",
                PriorCABG: "",
                PriorPCI: "",
                HbA1C: "",
                Age: "",
                SBP: "",
                DBP: "",
                Height: "",
                Weight: "",
                Sex: "",
                pribleed: "",
                Hypotension: "",
                heart_failure: "",
                Diabet: "",
                Acute_MI: "",
                IABP: "",
                Smoker: "",
                created_at: "",
                updated_at: "",
                user: "",
                patient: "",
                user: {},
                patient: {},
            },
            formTypes: {
                Cr: "text",
                Ht: "text",
                LVEF: "text",
                HR: "text",
                Contrast: "text",
                Hb: "text",
                PTP: "text",
                CAVI: "text",
                WBC: "text",
                PriorCABG: "text",
                PriorPCI: "text",
                HbA1C: "text",
                Age: "text",
                SBP: "text",
                DBP: "text",
                Height: "text",
                Weight: "text",
                Sex: "text",
                pribleed: "text",
                Hypotension: "text",
                heart_failure: "text",
                Diabet: "text",
                Acute_MI: "text",
                IABP: "text",
                Smoker: "text",
                created_at: "text",
                updated_at: "text",
                user: "text",
                patient: "text",
            },
            module: "User",
            model: "Angiography",
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
            `/user/api/angiographies/${this.$route.params.id}`
        );
        if (response.success) {
            const { data } = response;
            this.$store.dispatch("setCurrentResource", data);
            this.populateFormFields(data);
        }
        this.loading = false;
    },
    mounted() {
        //
    },
};
</script>
