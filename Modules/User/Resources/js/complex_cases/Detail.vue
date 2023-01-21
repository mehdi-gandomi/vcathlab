<template>
<loading-view :loading="loading">
    <div class="vx-row">
        <div class="vx-col w-full">
            <vx-card class="mb-base">
                <template v-slot:actions>
                    <vs-button
                        color="primary"
                        to="/complex_cases"
                        type="filled"
                        >Back</vs-button
                    >
                </template>
                <div class="vx-row mb-6">
                    <div class="vx-col w-1/2">
                        <div class="row flex">
                            <div
                                class="vx-col w-1/4 pr-5 flex justify-end items-center "
                            >
                                <p class="font-semibold">{{ __("Title") }}</p>
                            </div>
                            <div class="vx-col w-3/4">
                                {{ details.title }}
                            </div>
                        </div>
                    </div>
                    <div class="vx-col w-1/2">
                        <div class="row flex">
                            <div
                                class="vx-col w-1/4 pr-5 flex justify-end items-center "
                            >
                                <p class="font-semibold">{{ __("Summary") }}</p>
                            </div>
                            <div class="vx-col w-3/4">
                                {{ details.summary }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vx-row mb-6">
                    <div class="vx-col w-1/2">
                        <div class="row flex">
                            <div
                                class="vx-col w-1/4 pr-5 flex justify-end items-center "
                            >
                                <p class="font-semibold">{{ __("Video") }}</p>
                            </div>
                            <div class="vx-col w-3/4">
                                {{ details.Video }}
                            </div>
                        </div>
                    </div>
                    <div class="vx-col w-1/2">
                        <div class="row flex">
                            <div
                                class="vx-col w-1/4 pr-5 flex justify-end items-center "
                            >
                                <p class="font-semibold">{{ __("Is Nightmare") }}</p>
                            </div>
                            <div class="vx-col w-3/4">
                                {{ details.nightmare ? "Yes":"No" }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vx-row mb-6">
                    <div class="vx-col w-1/2">
                        <div class="row flex">
                            <div
                                class="vx-col w-1/4 pr-5 flex justify-end items-center "
                            >
                                <p class="font-semibold">
                                    {{ __("Category") }}
                                </p>
                            </div>
                            <div class="vx-col w-3/4">
                                {{ details.complexCaseCategory }}
                            </div>
                        </div>
                    </div>
                    <div class="vx-col w-1/2">
                        <div class="row flex">
                            <div
                                class="vx-col w-1/4 pr-5 flex justify-end items-center "
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
                <div class="vx-row mb-6"></div>
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
                title: "",
                summary: "",
                file: "",
                created_at: "",
                updated_at: "",
                complexCaseCategory: "",
                user: "",
                complexCaseCategory: {}
            },
            formTypes: {
                title: "text",
                summary: "text",
                file: "text",
                created_at: "text",
                updated_at: "text",
                complexCaseCategory: "text",
                user: "text"
            },
            module: "User",
            model: "ComplexCase"
        };
    },
    props: {
        //
    },
    computed: {
        Iracode() {
            return window.Iracode;
        }
    },
    async created() {
        const { data: response } = await this.$http.get(
            `/user/api/complex_cases/${this.$route.params.id}`
        );
        if (response.success) {
            const { data } = response;
            this.$store.dispatch("setCurrentResource", data);
            this.populateFormFields(data);
        }
this.loading=false;
    },
    mounted() {
        //
    },
    methods: {

    }
};
</script>
