<template>
<loading-view :loading="loading">
    <div class="vx-row">
        <div class="vx-col w-full">
            <vx-card class="mb-base">
                <template v-slot:actions>
                    <vs-button color="primary" to="/admin/users" type="filled"
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
                                    {{ __("Username") }}
                                </p>
                            </div>
                            <div class="vx-col w-3/4">
                                {{ details.username }}
                            </div>
                        </div>
                    </div>
                    <div class="vx-col w-1/2">
                        <div class="row flex">
                            <div
                                class="vx-col w-1/4 pr-5 flex justify-end items-center"
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
                </div>
                <div class="vx-row mb-6">
                    <div class="vx-col w-1/2">
                        <div class="row flex">
                            <div
                                class="vx-col w-1/4 pr-5 flex justify-end items-center"
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
                    <div class="vx-col w-1/2">
                        <div class="row flex">
                            <div
                                class="vx-col w-1/4 pr-5 flex justify-end items-center"
                            >
                                <p class="font-semibold">{{ __("State") }}</p>
                            </div>
                            <div class="vx-col w-3/4">
                                {{ details.state }}
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
                                    {{ __("province") }}
                                </p>
                            </div>
                            <div class="vx-col w-3/4">
                                <p>
                                    {{ getRelation("province.en_name") }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="vx-col w-1/2">
                        <div class="row flex">
                            <div
                                class="vx-col w-1/4 pr-5 flex justify-end items-center"
                            >
                                <p class="font-semibold">{{ __("city") }}</p>
                            </div>
                            <div class="vx-col w-3/4">
                                <p>
                                    {{ getRelation("city.en_name") }}
                                </p>
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
                                <p class="font-semibold">{{ __("Country") }}</p>
                            </div>
                            <div class="vx-col w-3/4">
                                {{ details.country }}
                            </div>
                        </div>
                    </div>
                    <div class="vx-col w-1/2">
                        <div class="row flex">
                            <div
                                class="vx-col w-1/4 pr-5 flex justify-end items-center"
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
                </div>
                <div class="vx-row mb-6">
                    <div class="vx-col w-1/2">
                        <div class="row flex">
                            <div
                                class="vx-col w-1/4 pr-5 flex justify-end items-center"
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
                    <div class="vx-col w-1/2">
                        <div class="row flex">
                            <div
                                class="vx-col w-1/4 pr-5 flex justify-end items-center"
                            >
                                <p class="font-semibold">{{ __("Mobile") }}</p>
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
                                <p class="font-semibold">{{ __("Email") }}</p>
                            </div>
                            <div class="vx-col w-3/4">
                                {{ details.email }}
                            </div>
                        </div>
                    </div>
                    <div class="vx-col w-1/2">
                        <div class="row flex">
                            <div
                                class="vx-col w-1/4 pr-5 flex justify-end items-center"
                            >
                                <p class="font-semibold">
                                    {{ __("Email Verified At") }}
                                </p>
                            </div>
                            <div class="vx-col w-3/4">
                                {{ dateFormat("email_verified_at") }}
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
                                    {{ __("Password") }}
                                </p>
                            </div>
                            <div class="vx-col w-3/4">
                                {{ details.password }}
                            </div>
                        </div>
                    </div>
                    <div class="vx-col w-1/2">
                        <div class="row flex">
                            <div
                                class="vx-col w-1/4 pr-5 flex justify-end items-center"
                            >
                                <p class="font-semibold">
                                    {{ __("Two Factor Secret") }}
                                </p>
                            </div>
                            <div class="vx-col w-3/4">
                                {{ details.two_factor_secret }}
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
                                    {{ __("Two Factor Recovery Codes") }}
                                </p>
                            </div>
                            <div class="vx-col w-3/4">
                                {{ details.two_factor_recovery_codes }}
                            </div>
                        </div>
                    </div>
                    <div class="vx-col w-1/2">
                        <div class="row flex">
                            <div
                                class="vx-col w-1/4 pr-5 flex justify-end items-center"
                            >
                                <p class="font-semibold">
                                    {{ __("Remember Token") }}
                                </p>
                            </div>
                            <div class="vx-col w-3/4">
                                {{ details.remember_token }}
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
                username: "",
                first_name: "",
                last_name: "",
                state: "",
                country: "",
                profession: "",
                specialty: "",
                mobile: "",
                email: "",
                email_verified_at: "",
                password: "",
                two_factor_secret: "",
                two_factor_recovery_codes: "",
                remember_token: "",
                created_at: "",
                updated_at: "",
                city: {},
                province: {},
            },
            formTypes: {
                username: "text",
                first_name: "text",
                last_name: "text",
                state: "text",
                country: "text",
                profession: "text",
                specialty: "text",
                mobile: "text",
                email: "text",
                email_verified_at: "text",
                password: "text",
                two_factor_secret: "text",
                two_factor_recovery_codes: "text",
                remember_token: "text",
                created_at: "text",
                updated_at: "text",
                ticketit_admin: "text",
                ticketit_agent: "text",
                city: "text",
                province: "text",
            },
            module: "Admin",
            model: "User",
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
            `/admin/api/users/${this.$route.params.id}`
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
        populateFormFields(data) {
            const newDetails = {};
            const details = { ...this.details };
            for (const key in details) {
                if (this.formTypes[key] != "password") {
                    newDetails[key] = data[key] ? data[key] : "";
                }
            }
            this.details = newDetails;
        },
    },
};
</script>
