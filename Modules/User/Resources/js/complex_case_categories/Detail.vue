<template>
<loading-view :loading="loading">
    <div class="vx-row">
        <div class="vx-col w-full">
            <vx-card class="mb-base">
                <template v-slot:actions>
                    <vs-button
                        color="primary"
                        to="/user/complex_case_categories"
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
                created_at: "",
                updated_at: ""
            },
            formTypes: {
                name: "text",
                created_at: "text",
                updated_at: "text"
            },
            module: "User",
            model: "ComplexCaseCategory"
        };
    },
    props: {
        //
    },
    computed: {
        //
    },
    async created() {
        const { data: response } = await this.$http.get(
            `/user/api/complex_case_categories/${this.$route.params.id}`
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
