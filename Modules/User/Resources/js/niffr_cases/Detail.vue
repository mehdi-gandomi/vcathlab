<template>
    <loading-view :loading="loading">
        <div class="vx-row">
            <div class="vx-col w-full">
                <vx-card class="mb-base">
                    <template v-slot:actions>
                        <vs-button
                            color="primary"
                            to="/user/niffr_cases"
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
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center "
                                >
                                    <p class="font-semibold">{{ __("Patient") }}</p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.patient.name }}
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
                                    <p class="font-semibold">{{ __("Age") }}</p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.patient.age }}
                                </div>
                            </div>
                        </div>
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
                <vx-card>
                    <vs-row v-for="(point,key) in details.points" :key="key">
                        <div class="vx-col w-100 text-center my-4">
                            <h5 class="text-center">{{point.vessel}} {{point.region}}</h5>
                        </div>
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center "
                                >
                                    <p class="font-semibold">
                                        {{ __("FFR") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ point.ffr }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center "
                                >
                                    <p class="font-semibold">
                                        {{ __("MAP") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ point.map }}
                                </div>
                            </div>
                        </div>
                         <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center "
                                >
                                    <p class="font-semibold">
                                        {{ __("File") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    <a :href="`https://docs.google.com/viewerng/viewer?url=${url(point.result_file)}`" target="_blank">{{Iracode.basename(point.result_file)}}</a>
                                </div>
                            </div>
                        </div>
                    </vs-row>
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
                file: "",
                created_at: "",
                updated_at: "",
                "patient.name": "",
                "patient.age": "",
                "patient.hospital": "",
                patient: "",
                patient: {}
            },
            formTypes: {
                file: "text",
                created_at: "text",
                updated_at: "text",
                "patient.name": "text",
                "patient.age": "text",
                "patient.hospital": "text",
                patient: "text"
            },
            module: "User",
            model: "NIFFRCase"
        };
    },
    props: {
        //
    },
    computed: {
        Iracode(){
                return window.Iracode;
            }
    },
    async created() {
        const { data: response } = await this.$http.get(
            `/user/api/niffr_cases/${this.$route.params.id}`
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
    }
};
</script>
