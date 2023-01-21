<template>
    <loading-view :loading="loading">
        <div class="vx-row">
            <div class="vx-col w-full">
                <vx-card class="mb-base">
                    <template v-slot:actions>
                        <vs-button
                            color="primary"
                            to="/admin/physicians"
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
                                        {{ __("First Name") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.first_name }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center "
                                >
                                    <p class="font-semibold">
                                        {{ __("Last Name") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.last_name }}
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
                                        {{ __("Profession") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ selectFormat("profession") }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center "
                                >
                                    <p class="font-semibold">
                                        {{ __("Specialty") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ selectFormat("specialty") }}
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
                                    {{ details.hostpital }}
                                </div>
                            </div>
                        </div>
                        <div class="vx-col w-1/2">
                            <div class="row flex">
                                <div
                                    class="vx-col w-1/4 pr-5 flex justify-end items-center "
                                >
                                    <p class="font-semibold">
                                        {{ __("Cover") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.cover }}
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
                                        {{ __("Avatar") }}
                                    </p>
                                </div>
                                <div class="vx-col w-3/4">
                                    {{ details.avatar }}
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
                first_name: "",
                last_name: "",
                profession: "",
                specialty: "",
                hostpital: "",
                cover: "",
                avatar: "",
                created_at: "",
                updated_at: "",
                user: "",
                user: {}
            },
            formTypes: {
                first_name: "text",
                last_name: "text",
                profession: "text",
                specialty: "text",
                hostpital: "text",
                cover: "text",
                avatar: "text",
                created_at: "text",
                updated_at: "text",
                user: "text"
            },
            module: "Admin",
            model: "Physician"
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
            `/admin/api/physicians/${this.$route.params.id}`
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
    }
};
</script>
