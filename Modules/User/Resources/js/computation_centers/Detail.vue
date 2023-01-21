<template>
    <loading-view :loading="loading">
        <div class="vx-row">
            <div class="vx-col w-full">
                <vx-card class="mb-base">
                    <template v-slot:actions>
                        <vs-button
                            color="primary"
                            to="/user/computation_centers"
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
                                        {{ __("Name") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.name }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">
                                        {{ __("Physician") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.physician }}
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
                                        {{ __("Hospital") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.hospital }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">{{ __("Age") }}</p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.age }}
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
                                    <p class="font-semibold">{{ __("Sex") }}</p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ radioFormat("sex") }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center"
                                >
                                    <p class="font-semibold">
                                        {{ __("Mobile") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.mobile }}
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
                                        {{ __("patient") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.patient }}
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
                name: "",
                physician: "",
                hospital: "",
                age: "",
                sex: "",
                mobile: "",
                created_at: "",
                updated_at: "",
                patient: "",
                user: "",
                patient: {},
                user: {},
            },
            formTypes: {
                name: "text",
                physician: "text",
                hospital: "text",
                age: "text",
                sex: "text",
                mobile: "text",
                created_at: "text",
                updated_at: "text",
                patient: "text",
                user: "text",
            },
            module: "User",
            model: "ComputationCenter",
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
            `/user/api/computation_centers/${this.$route.params.id}`
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
