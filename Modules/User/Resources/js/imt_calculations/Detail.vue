<template>
    <loading-view :loading="loading">
        <div class="vx-row">
            <div class="vx-col w-full">
                <vx-card class="mb-base">
                    <template v-slot:actions>
                        <vs-button
                            color="primary"
                            to="/user/imt_calculations"
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
                                    <p class="font-semibold">
                                        {{ __("LCIMT") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.LCIMT }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">
                                        {{ __("RCIMT") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.RCIMT }}
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
                                        {{ __("Created At") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ dateFormat("created_at") }}
                                </div>
                            </div>
                        </div>
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
                    </div>
                    <div class="vx-row mb-6">
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
                                    {{ details.user.name }}
                                </div>
                            </div>
                        </div>
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
                                    {{ details.patient.name }}
                                </div>
                            </div>
                        </div>
                    </div>
                </vx-card>
            </div>
        </div>
        <div class="vx-row">
            <div class="vx-col w-full">
                <vx-card class="mb-base">

                    <div >
                        <a  style="font-size: 30px" rel="noopener"  v-if="details.result && details.result.link" :key="downloadBtnKey" class="mr-3 mb-2 vs-component vs-button vs-button-success vs-button-filled download-btn"  href="javascript:void(0)" @click="download(details.result.link,'total_clicked')" >
                        {{__("Export PDF")}}
                    </a>
                    <a target="_blank" style="font-size: 30px" rel="noopener"  v-if="details.result && details.result.word_link" :key="downloadBtnKey" class="mr-3 mb-2 vs-component vs-button vs-button-success vs-button-filled download-btn"  :href="details.result.word_link" >
                            {{__("Export Word")}}
                    </a>
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
            downloadBtnKey:1,
            details: {
                LCIMT: "",
                RCIMT: "",
                created_at: "",
                updated_at: "",
                user: "",
                patient: "",
                user: {},
                patient: {},
                result: {},
            },
            formTypes: {
                LCIMT: "text",
                RCIMT: "text",
                created_at: "text",
                updated_at: "text",
                user: "text",
                patient: "text",
            },
            module: "User",
            model: "ImtCalculation",
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
            `/user/api/imt_calculations/${this.$route.params.id}`
        );
        if (response.success) {
            const { data } = response;
            this.$store.dispatch("setCurrentResource", data);
            this.populateFormFields(data);
            this.downloadBtnKey++;
        }
        this.loading = false;
    },
    mounted() {
        //
    },
};
</script>
