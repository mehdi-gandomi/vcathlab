<template>
    <div class="mb-base">
        <vx-card>
            <template v-slot:actions>
                <vs-button color="primary" to="/admin/users" type="filled">{{
                    __("Back")
                }}</vs-button>
            </template>
            <form @submit="onSubmit">
                <vs-row vs-type="flex" vs-w="12" class="mb-6">
                    <vs-col vs-type="flex" vs-align="center" vs-lg="6">
                        <vs-row vs-type="flex" vs-w="12">
                            <vs-col

                                vs-type="flex"
                                vs-align="center"
                                vs-lg="3"
                            >
                                <span>{{ __("Avatar") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    imageResizeMode="cover"
                                    :is="inputs.avatar.type"
                                    class="w-full"
                                    :danger="hasValidationError('avatar')"
                                    :danger-text="validationError('avatar')"
                                    name="avatar"
                                    v-bind="inputs.avatar.filepond_options"
                                    :server="uploadServer"
                                />
                            </vs-col>
                        </vs-row>
                    </vs-col>

                    <vs-col vs-type="flex" vs-align="center" vs-lg="6">
                        <vs-row vs-type="flex" vs-w="12">
                            <vs-col
                                class="justify-end pr-5"
                                vs-type="flex"
                                vs-align="center"
                                vs-lg="3"
                            >
                                <span>{{ __("First Name") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.first_name.type"
                                    v-model="form.first_name"
                                    class="w-full"
                                    :danger="hasValidationError('first_name')"
                                    :danger-text="validationError('first_name')"
                                    name="first_name"
                                    type="text"
                                />
                            </vs-col>
                        </vs-row>
                    </vs-col>
                </vs-row>
                <vs-row vs-type="flex" vs-w="12" class="mb-6">
                    <vs-col vs-type="flex" vs-align="center" vs-lg="6">
                        <vs-row vs-type="flex" vs-w="12">
                            <vs-col
                                class="justify-end pr-5"
                                vs-type="flex"
                                vs-align="center"
                                vs-lg="3"
                            >
                                <span>{{ __("Last Name") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.last_name.type"
                                    v-model="form.last_name"
                                    class="w-full"
                                    :danger="hasValidationError('last_name')"
                                    :danger-text="validationError('last_name')"
                                    name="last_name"
                                    type="text"
                                />
                            </vs-col>
                        </vs-row>
                    </vs-col>
                    <!-- <vs-col vs-type="flex" vs-align="center" vs-lg="6">
                        <vs-row vs-type="flex" vs-w="12">
                            <vs-col
                                class="justify-end pr-5"
                                vs-type="flex"
                                vs-align="center"
                                vs-lg="3"
                            >
                                <span>{{ __("State") }}</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.state.type"
                                    v-model="form.state"
                                    class="w-full"
                                    :danger="hasValidationError('state')"
                                    :danger-text="validationError('state')"
                                    name="state"
                                    type="text"
                                />
                            </vs-col>
                        </vs-row>
                    </vs-col> -->
                </vs-row>
                <!-- <vs-row vs-type="flex" vs-w="12" class="mb-6">
                    <vs-col vs-type="flex" vs-align="center" vs-lg="6">
                        <vs-row vs-type="flex" vs-w="12">
                            <vs-col
                                class="justify-end"
                                vs-type="flex"
                                vs-align="center"
                                vs-lg="3"
                            >
                                <span>{{ __("province") }}</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <v-select
                                    :dir="$vs.rtl ? 'rtl' : 'ltr'"
                                    :value="inputs.province_id.selected"
                                    @input="
                                        (op) =>
                                            onRelationSelect('province_id', op)
                                    "
                                    label="en_name"
                                    :filterable="false"
                                    :options="inputs.province_id.options"
                                    @search="
                                        (search, loading) =>
                                            onRelationSearch(
                                                'province_id',
                                                search,
                                                loading
                                            )
                                    "
                                >
                                    <template slot="no-options">
                                        {{ __("Type to search") }}
                                    </template>
                                </v-select>
                            </vs-col>
                        </vs-row>
                    </vs-col>
                    <vs-col vs-type="flex" vs-align="center" vs-lg="6">
                        <vs-row vs-type="flex" vs-w="12">
                            <vs-col
                                class="justify-end"
                                vs-type="flex"
                                vs-align="center"
                                vs-lg="3"
                            >
                                <span>{{ __("city") }}</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <v-select
                                    :dir="$vs.rtl ? 'rtl' : 'ltr'"
                                    :value="inputs.city_id.selected"
                                    @input="
                                        (op) => onRelationSelect('city_id', op)
                                    "
                                    label="en_name"
                                    :filterable="false"
                                    :options="inputs.city_id.options"
                                    @search="
                                        (search, loading) =>
                                            onRelationSearch(
                                                'city_id',
                                                search,
                                                loading
                                            )
                                    "
                                >
                                    <template slot="no-options">
                                        {{ __("Type to search") }}
                                    </template>
                                </v-select>
                            </vs-col>
                        </vs-row>
                    </vs-col>
                </vs-row> -->
                <vs-row vs-type="flex" vs-w="12" class="mb-6">
                    <!-- <vs-col vs-type="flex" vs-align="center" vs-lg="6">
                        <vs-row vs-type="flex" vs-w="12">
                            <vs-col
                                class="justify-end pr-5"
                                vs-type="flex"
                                vs-align="center"
                                vs-lg="3"
                            >
                                <span>{{ __("Country") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.country.type"
                                    v-model="form.country"
                                    class="w-full"
                                    :danger="hasValidationError('country')"
                                    :danger-text="validationError('country')"
                                    name="country"
                                    type="text"
                                />
                            </vs-col>
                        </vs-row>
                    </vs-col> -->
                    <vs-col vs-type="flex" vs-align="center" vs-lg="6">
                        <vs-row vs-type="flex" vs-w="12">
                            <vs-col
                                class="justify-end pr-5"
                                vs-type="flex"
                                vs-align="center"
                                vs-lg="3"
                            >
                                <span>{{ __("Username") }}</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.username.type"
                                    v-model="form.username"
                                    class="w-full"
                                    :danger="hasValidationError('username')"
                                    :danger-text="validationError('username')"
                                    name="username"
                                    type="text"
                                />
                            </vs-col>
                        </vs-row>
                    </vs-col>
                    <vs-col vs-type="flex" vs-align="center" vs-lg="6">
                        <vs-row vs-type="flex" vs-w="12">
                            <vs-col
                                class="justify-end pr-5"
                                vs-type="flex"
                                vs-align="center"
                                vs-lg="3"
                            >
                                <span>{{ __("Profession") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.profession.type"
                                    :value="inputs.profession.selected"
                                    @input="(op) => onSelect('profession', op)"
                                    class="w-full"
                                    :danger="hasValidationError('profession')"
                                    :danger-text="validationError('profession')"
                                    name="profession"
                                    type="select"
                                    :options="inputs.profession.options"
                                    :dir="$vs.rtl ? 'rtl' : 'ltr'"
                                />
                            </vs-col>
                        </vs-row>
                    </vs-col>
                </vs-row>
                <vs-row vs-type="flex" vs-w="12" class="mb-6">
                    <vs-col vs-type="flex" vs-align="center" vs-lg="6">
                        <vs-row vs-type="flex" vs-w="12">
                            <vs-col
                                class="justify-end pr-5"
                                vs-type="flex"
                                vs-align="center"
                                vs-lg="3"
                            >
                                <span>{{ __("Specialty") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.specialty.type"
                                    :value="inputs.specialty.selected"
                                    @input="(op) => onSelect('specialty', op)"
                                    class="w-full"
                                    :danger="hasValidationError('specialty')"
                                    :danger-text="validationError('specialty')"
                                    name="specialty"
                                    type="select"
                                    :options="inputs.specialty.options"
                                    :dir="$vs.rtl ? 'rtl' : 'ltr'"
                                />
                            </vs-col>
                        </vs-row>
                    </vs-col>
                    <vs-col vs-type="flex" vs-align="center" vs-lg="6">
                        <vs-row vs-type="flex" vs-w="12">
                            <vs-col
                                class="justify-end pr-5"
                                vs-type="flex"
                                vs-align="center"
                                vs-lg="3"
                            >
                                <span>{{ __("Mobile") }}</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.mobile.type"
                                    v-model="form.mobile"
                                    class="w-full"
                                    :danger="hasValidationError('mobile')"
                                    :danger-text="validationError('mobile')"
                                    name="mobile"
                                    type="text"
                                />
                            </vs-col>
                        </vs-row>
                    </vs-col>
                </vs-row>
                <vs-row vs-type="flex" vs-w="12" class="mb-6">
                    <vs-col vs-type="flex" vs-align="center" vs-lg="6">
                        <vs-row vs-type="flex" vs-w="12">
                            <vs-col
                                class="justify-end pr-5"
                                vs-type="flex"
                                vs-align="center"
                                vs-lg="3"
                            >
                                <span>{{ __("Email") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.email.type"
                                    v-model="form.email"
                                    class="w-full"
                                    :danger="hasValidationError('email')"
                                    :danger-text="validationError('email')"
                                    name="email"
                                    type="text"
                                />
                            </vs-col>
                        </vs-row>
                    </vs-col>
                    <vs-col vs-type="flex" vs-align="center" vs-lg="6">
                        <vs-row vs-type="flex" vs-w="12">
                            <vs-col
                                class="justify-end pr-5"
                                vs-type="flex"
                                vs-align="center"
                                vs-lg="3"
                            >
                                <span>{{ __("Password") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.password.type"
                                    v-model="form.password"
                                    class="w-full"
                                    :danger="hasValidationError('password')"
                                    :danger-text="validationError('password')"
                                    name="password"
                                    type="text"
                                />
                            </vs-col>
                        </vs-row>
                    </vs-col>
                </vs-row>




                <div class="flex justify-end mt-16">
                    <div class="flex">
                        <vs-button
                            color="success"
                            @click="() => onSubmit('new')"
                            class="mr-3 mb-2"
                            >{{ __("Save and new") }}</vs-button
                        >
                        <vs-button
                            color="success"
                            @click="() => onSubmit('close')"
                            class="mr-3 mb-2"
                            >{{ __("Save and close") }}</vs-button
                        >
                        <vs-button
                            color="warning"
                            class="mb-2"
                            @click="form.reset()"
                            >{{ __("Clear") }}</vs-button
                        >
                    </div>
                </div>
            </form>
        </vx-card>
    </div>
</template>

<script>
import Form from "@/Form";
import HasForm from "@/mixins/HasForm";
import UpdatePage from "@/mixins/UpdatePage";
export default {
    components: {},
    mixins: [HasForm, UpdatePage],
    data() {
        return {
            form: new Form({
                username: "",
                first_name: "",
                last_name: "",
                // state: "",
                // country: "",
                profession: "1",
                specialty: "1",
                mobile: "",
                email: "",
                // email_verified_at: "",
                password: "",
                // two_factor_secret: "",
                // two_factor_recovery_codes: "",
                // remember_token: "",
                // city_id: "",
                // province_id: "",
            }),
            model: "Modules\\Admin\\Models\\User",
            inputs: {
                username: {
                    type: "vs-input",
                    field_type: "text",
                },
                first_name: {
                    type: "vs-input",
                    field_type: "text",
                },
                avatar: {
                    type: "filepond",
                    files:[],
                    filepond_options: {
                        "label-idle": "Drag &amp; Drop your files",
                        "allow-multiple": false,
                        "instant-upload": true,
                        "max-file-size":"2MB",
                        "accepted-file-types":"image/jpeg, image/png"
                    }
                },
                last_name: {
                    type: "vs-input",
                    field_type: "text",
                },
                state: {
                    type: "vs-input",
                    field_type: "text",
                },
                country: {
                    type: "vs-input",
                    field_type: "text",
                },
                profession: {
                    type: "v-select",
                    field_type: "select",
                    options: [
                        {
                            label: "Fellow",
                            value: "1",
                        },
                        {
                            label: "Medical student",
                            value: "2",
                        },
                        {
                            label: "Physician",
                            value: "3",
                        },
                        {
                            label: "Physician assistant",
                            value: "4",
                        },
                        {
                            label: "Resident",
                            value: "5",
                        },
                        {
                            label: "Other",
                            value: "6",
                        },
                    ],
                    selected: {},
                },
                specialty: {
                    type: "v-select",
                    field_type: "select",
                    options: [
                        {
                            label: "General cardiologist",
                            value: "1",
                        },
                        {
                            label: "Interventional cardiologist",
                            value: "2",
                        },
                        {
                            label: "Interventional radilogist",
                            value: "3",
                        },
                        {
                            label: "Interventionalelectrophysiologist",
                            value: "4",
                        },
                        {
                            label: "Other",
                            value: "5",
                        },
                    ],
                    selected: {},
                },
                mobile: {
                    type: "vs-input",
                    field_type: "text",
                },
                email: {
                    type: "vs-input",
                    field_type: "text",
                },
                email_verified_at: {
                    type: "persian-date-picker",
                    field_type: "datetime",
                },
                password: {
                    type: "vs-input",
                    field_type: "text",
                },
                two_factor_secret: {
                    type: "vs-textarea",
                    field_type: "textarea",
                },
                two_factor_recovery_codes: {
                    type: "vs-textarea",
                    field_type: "textarea",
                },
                remember_token: {
                    type: "vs-input",
                    field_type: "text",
                },
                city_id: {
                    field_type: "relation",
                    foreign_key: "city_id",
                    relation_name: "city",
                    options: [],
                    selected: {},
                    searchUrl: "/place/api/cities",
                    titleField: "en_name",
                },
                province_id: {
                    field_type: "relation",
                    foreign_key: "province_id",
                    relation_name: "province",
                    options: [],
                    selected: {},
                    searchUrl: "/place/api/provinces",
                    titleField: "en_name",
                },
            },
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
        async onSubmit(action) {
            const data = await this.form.put(
                `/admin/api/users/${this.$route.params.id}`
            );
            if (data.success) {
                Iracode.success(this.__("User Updated Successfully"));
            }
            if (action == "close") this.$router.push("/admin/users");
            else this.form.reset();
        },
    },
};
</script>
