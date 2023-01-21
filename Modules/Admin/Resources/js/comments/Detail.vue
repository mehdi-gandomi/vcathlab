<template>
<loading-view :loading="loading">
    <div class="vx-row">
        <div class="vx-col w-full">
            <vx-card class="mb-base">
                <template v-slot:actions>
                    <vs-button
                        color="primary"
                        to="/admin/complex_case/comments"
                        type="filled"
                        >Back</vs-button
                    >
                </template>
                <div class="vx-row mb-6"></div>
                <div class="vx-row mb-6">
                    <div class="vx-col w-1/2">
                        <div class="row flex">
                            <div
                                class="vx-col w-1/4 pr-5 flex justify-end items-center "
                            >
                                <p class="font-semibold">{{ __("Name") }}</p>
                            </div>
                            <div class="vx-col w-3/4">
                                {{ details.name }}
                            </div>
                        </div>
                    </div>
                    <div class="vx-col w-1/2">
                        <div class="row flex">
                            <div
                                class="vx-col w-1/4 pr-5 flex justify-end items-center "
                            >
                                <p class="font-semibold">{{ __("Email") }}</p>
                            </div>
                            <div class="vx-col w-3/4">
                                {{ details.email }}
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
                                <p class="font-semibold">{{ __("Comment") }}</p>
                            </div>
                            <div class="vx-col w-3/4">
                                {{ details.comment }}
                            </div>
                        </div>
                    </div>
                    <div class="vx-col w-1/2">
                        <div class="row flex">
                            <div
                                class="vx-col w-1/4 pr-5 flex justify-end items-center "
                            >
                                <p class="font-semibold">
                                    {{ __("Is Approved") }}
                                </p>
                            </div>
                            <div class="vx-col w-3/4">
                                {{ radioFormat("is_approved") }}
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
                                <p class="font-semibold">{{ __("user") }}</p>
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
                commentable_type: "",
                commentable_id: "",
                name: "",
                email: "",
                comment: "",
                is_approved: "",
                created_at: "",
                updated_at: "",
                user: "",
                user: {}
            },
            formTypes: {
                commentable_type: "text",
                commentable_id: "text",
                name: "text",
                email: "text",
                comment: "text",
                is_approved: "text",
                created_at: "text",
                updated_at: "text",
                user: "text"
            },
            module: "Admin",
            model: "Comment"
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
            `/admin/api/comments/${this.$route.params.id}`
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
