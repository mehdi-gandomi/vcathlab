<template>
    <div class="mb-base">
        <vx-card>
            <template v-slot:actions>
                <vs-button
                    color="primary"
                    to="/admin/physicians"
                    type="filled"
                    >{{ __("Back") }}</vs-button
                >
            </template>
            <form @submit="onSubmit">
                <vs-row vs-type="flex" vs-w="12" class="mb-6">
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
                                <span>{{ __("Profession") }}</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.profession.type"
                                    :value="inputs.profession.selected"
                                    @input="op => onSelect('profession', op)"
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
                    <vs-col vs-type="flex" vs-align="center" vs-lg="6">
                        <vs-row vs-type="flex" vs-w="12">
                            <vs-col
                                class="justify-end pr-5"
                                vs-type="flex"
                                vs-align="center"
                                vs-lg="3"
                            >
                                <span>{{ __("Specialty") }}</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.specialty.type"
                                    :value="inputs.specialty.selected"
                                    @input="op => onSelect('specialty', op)"
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
                                <span>{{ __("Hospital") }}</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.hostpital.type"
                                    v-model="form.hostpital"
                                    class="w-full"
                                    :danger="hasValidationError('hostpital')"
                                    :danger-text="validationError('hostpital')"
                                    name="hostpital"
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
                                <span>{{ __("Cover") }}</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    imageResizeMode="cover"
                                    :is="inputs.cover.type"
                                    class="w-full"
                                    :danger="hasValidationError('cover')"
                                    :danger-text="validationError('cover')"
                                    name="cover"
                                    :label-idle="
                                        inputs.cover.filepond_options[
                                            'label-idle'
                                        ]
                                    "
                                    :allow-multiple="
                                        inputs.cover.filepond_options[
                                            'allow-multiple'
                                        ]
                                    "
                                    :accepted-file-types="
                                        inputs.cover.filepond_options[
                                            'accepted-file-types'
                                        ]
                                    "
                                    :instant-upload="
                                        inputs.cover.filepond_options[
                                            'instant-upload'
                                        ]
                                    "
                                    :files="inputs.cover.files"
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
                                    :label-idle="
                                        inputs.avatar.filepond_options[
                                            'label-idle'
                                        ]
                                    "
                                    :allow-multiple="
                                        inputs.avatar.filepond_options[
                                            'allow-multiple'
                                        ]
                                    "
                                    :accepted-file-types="
                                        inputs.avatar.filepond_options[
                                            'accepted-file-types'
                                        ]
                                    "
                                    :instant-upload="
                                        inputs.avatar.filepond_options[
                                            'instant-upload'
                                        ]
                                    "
                                    :files="inputs.avatar.files"
                                    :server="uploadServer"
                                />
                            </vs-col>
                        </vs-row>
                    </vs-col>
                </vs-row>
                <vs-row vs-type="flex" vs-w="12" class="mb-6"> </vs-row>

                <div class="flex justify-end mt-16">
                    <div class="flex">
                        <vs-button
                            color="success"
                            @click="() => onSubmit('close')"
                            class="mr-3 mb-2"
                            >{{ __("Save") }}</vs-button
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
                first_name: "",
                last_name: "",
                profession: "1",
                specialty: "1",
                hostpital: "",
                cover: "",
                avatar: ""
            }),
            model: "Modules\\Admin\\Models\\Physician",
            inputs: {
                first_name: {
                    type: "vs-input",
                    field_type: "text"
                },
                last_name: {
                    type: "vs-input",
                    field_type: "text"
                },
                profession: {
                    type: "v-select",
                    field_type: "select",
                    options: [
                        {
                            label: "Fellow",
                            value: "1"
                        },
                        {
                            label: "Medical student",
                            value: "2"
                        },
                        {
                            label: "Physician",
                            value: "3"
                        },
                        {
                            label: "Physician assistant",
                            value: "4"
                        },
                        {
                            label: "Resident",
                            value: "5"
                        },
                        {
                            label: "Other",
                            value: "6"
                        }
                    ],
                    selected: {}
                },
                specialty: {
                    type: "v-select",
                    field_type: "select",
                    options: [
                        {
                            label: "General cardiologist",
                            value: "1"
                        },
                        {
                            label: "Interventional cardiologist",
                            value: "2"
                        },
                        {
                            label: "Interventional radilogist",
                            value: "3"
                        },
                        {
                            label: "Interventionalelectrophysiologist",
                            value: "4"
                        },
                        {
                            label: "Other",
                            value: "5"
                        }
                    ],
                    selected: {}
                },
                hostpital: {
                    type: "vs-input",
                    field_type: "text"
                },
                cover: {
                    type: "filepond",
                    field_type: "filepond_image",
                    files: [],
                    filepond_options: {
                        "label-idle": "Drag &amp; Drop your files",
                        "allow-multiple": Iracode.toBool(0),
                        "accepted-file-types": "image/jpeg, image/png",
                        "instant-upload": Iracode.toBool(1)
                    }
                },
                avatar: {
                    type: "filepond",
                    field_type: "filepond_image",
                    files: [],
                    filepond_options: {
                        "label-idle": "Drag &amp; Drop your files",
                        "allow-multiple": Iracode.toBool(0),
                        "accepted-file-types": "image/jpeg, image/png",
                        "instant-upload": Iracode.toBool(1)
                    }
                }
            }
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
            `/admin/api/physicians/${this.$route.params.id}`
        );
        if (response.success) {
            const { data } = response;
            this.$store.dispatch("setCurrentResource", data);
            this.populateFormFields(data);
        }
    },
    mounted() {
        //
    },
    methods: {
        async onSubmit(action) {
            const data = await this.form.put(
                `/admin/api/physicians/${this.$route.params.id}`
            );
            if (data.success) {
                Iracode.success(this.__("Physician Updated Successfully"));
            }
            if (action == "close") this.$router.push("/admin/physicians");
            else this.form.reset();
        }
    }
};
</script>
