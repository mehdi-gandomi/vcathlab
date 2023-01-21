<template>
<loading-view :loading="loading">
    <div class="vx-row">
        <div class="vx-col w-full">
            <vx-card class="mb-base">
                <template v-slot:actions>
                    <vs-button color="primary" to="/user/ct_cases" type="filled"
                        >Back</vs-button
                    >
                </template>
                <div class="vx-row mb-6">
                    <div class="vx-col w-1/2">
                        <div class="row flex">
                            <div
                                class="vx-col w-1/4 pr-5 flex justify-end items-center "
                            >
                                <p class="font-semibold">{{ __("Ct File") }}</p>
                            </div>
                            <div class="vx-col w-3/4">
                                <a v-if="details.ct_file" :href="url(details.ct_file)" :download="Iracode.basename(details.ct_file)">{{
                                    Iracode.basename(details.ct_file)
                                }}</a>
                                <p v-else>
                                    {{__("No file uploaded yet")}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="vx-col w-1/2">
                        <div class="row flex">
                            <div
                                class="vx-col w-1/4 pr-5 flex justify-end items-center "
                            >
                                <p class="font-semibold">
                                    {{ __("Result File") }}
                                </p>
                            </div>
                            <div class="vx-col w-3/4 flex">
                                <a v-if="details.result_file" :href="url(details.result_file)" :download="Iracode.basename(details.result_file)">{{
                                    Iracode.basename(details.result_file)
                                }}</a>
                                <p v-else>
                                    {{__("No file uploaded yet")}}

                                </p>

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
                                class="vx-col w-1/4 pr-5 flex justify-end items-center "
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
                                class="vx-col w-1/4 pr-5 flex justify-end items-center "
                            >
                                <p class="font-semibold">{{ __("Patient") }}</p>
                            </div>
                            <div class="vx-col w-3/4">
                                {{ details.patient.name }}
                            </div>
                        </div>
                    </div>
                    <div class="vx-col w-1/2">
                        <div class="row flex">
                            <div
                                class="vx-col w-1/4 pr-5 flex justify-end items-center "
                            >
                                <p class="font-semibold">{{ __("Age") }}</p>
                            </div>
                            <div class="vx-col w-3/4">
                                {{ details.patient.age }}
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
                                    {{ __("Hospital") }}
                                </p>
                            </div>
                            <div class="vx-col w-3/4">
                                {{ details.patient.hospital }}
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
            uploadModalActive:false,
            details: {
                ct_file: "",
                result_file: "",
                created_at: "",
                updated_at: "",
                "patient.name": "",
                "patient.age": "",
                "patient.hospital": "",
                patient: ""
            },
            formTypes: {
                ct_file: "text",
                result_file: "text",
                created_at: "text",
                updated_at: "text",
                "patient.name": "text",
                "patient.age": "text",
                "patient.hospital": "text",
                patient: "text"
            },
            module: "User",
            model: "CtCase"
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
            `/user/api/ct_cases/${this.$route.params.id}`
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
