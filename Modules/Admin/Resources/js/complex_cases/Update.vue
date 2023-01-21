<template>
    <div class="mb-base">
        <vx-card>
            <template v-slot:actions>
                <vs-button
                    color="primary"
                    to="/complex_cases"
                    type="filled"
                    >{{ __("Back") }}</vs-button
                >
            </template>
            <form @submit="onSubmit">
                <vs-row vs-type="flex" vs-w="12" class="mb-6">
                    <vs-col vs-type="flex" vs-align="center" vs-lg="4">
                        <vs-row vs-type="flex" vs-w="12">
                            <vs-col

                                vs-type="flex"
                                vs-align="center"
                                vs-lg="12"
                            >
                                <span>{{ __("Category") }}</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="12">
                                <v-select
                                    style="width: 100%"
                                    :dir="$vs.rtl ? 'rtl' : 'ltr'"
                                    :value="
                                        inputs.complex_case_category_id.selected
                                    "
                                    @input="
                                        op =>
                                            onRelationSelect(
                                                'complex_case_category_id',
                                                op
                                            )
                                    "
                                    label="name"
                                    :filterable="false"
                                    :options="
                                        inputs.complex_case_category_id.options
                                    "
                                    @search="
                                        (search, loading) =>
                                            onRelationSearch(
                                                'complex_case_category_id',
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
                    <vs-col vs-type="flex" vs-align="center" vs-lg="4">
                        <vs-row vs-type="flex" vs-w="12">
                            <vs-col
                                vs-type="flex"
                                vs-align="center"
                                vs-lg="12"
                            >
                                <span>{{ __("Title") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="12">
                                <component
                                    :is="inputs.title.type"
                                    v-model="form.title"
                                    class="w-full"
                                    :danger="hasValidationError('title')"
                                    :danger-text="validationError('title')"
                                    name="title"
                                    type="text"
                                />
                            </vs-col>
                        </vs-row>
                    </vs-col>
                    <vs-col vs-type="flex" vs-align="center" vs-lg="4">
                        <vs-row vs-type="flex" vs-w="12">
                            <vs-col
                                vs-type="flex"
                                vs-align="center"
                                vs-lg="12"
                            >
                                <span>{{ __("Is It Nightmare") }}</span>
                                <!-- <span class="ml-1 text-red">*</span> -->
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="12">
                                <component
                                    :is="inputs.nightmare.type"
                                    v-model="form.nightmare"
                                    class="w-full"
                                    :danger="hasValidationError('nightmare')"
                                    :danger-text="validationError('nightmare')"
                                    name="nightmare"
                                    type="text"
                                />
                            </vs-col>
                        </vs-row>
                    </vs-col>
                </vs-row>
                <vs-row vs-type="flex" vs-w="12" class="mb-6">
                    <vs-col vs-type="flex" vs-align="center" vs-lg="12">
                        <vs-row vs-type="flex" vs-w="12">
                            <vs-col
                                vs-type="flex"
                                vs-align="center"
                                vs-lg="12"
                            >
                                <span>{{ __("Short Summary") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="12">
                                <component
                                    :is="inputs.short_summary.type"
                                    v-model="form.short_summary"
                                    class="w-full"
                                    :danger="hasValidationError('short_summary')"
                                    :danger-text="validationError('short_summary')"
                                    name="short_summary"
                                    type="textarea"
                                />
                            </vs-col>
                        </vs-row>
                    </vs-col>
                </vs-row>
                <vs-row vs-type="flex" vs-w="12" class="mb-6">
                    <vs-col vs-type="flex" vs-align="center" vs-lg="12">
                        <vs-row vs-type="flex" vs-w="12">
                            <vs-col
                                vs-type="flex"
                                vs-align="center"
                                vs-lg="12"
                            >
                                <span>{{ __("Summary") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="12">
                                <component
                                    :is="inputs.summary.type"
                                    v-model="form.summary"
                                    class="w-full"
                                    :danger="hasValidationError('summary')"
                                    :danger-text="validationError('summary')"
                                    name="summary"
                                    type="textarea"
                                />
                            </vs-col>
                        </vs-row>
                    </vs-col>
                </vs-row>
                <vs-row vs-type="flex" vs-w="12" class="mb-6">
                    <vs-col vs-type="flex" vs-align="center" vs-lg="12">
                        <vs-row vs-type="flex" vs-w="12">
                            <vs-col

                                vs-type="flex"
                                vs-align="center"
                                vs-lg="12"
                            >
                                <span>{{ __("Video") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="12">
                                <component
                                    imageResizeMode="cover"
                                    :is="inputs.video.type"
                                    class="w-full"
                                    :danger="hasValidationError('video')"
                                    :danger-text="validationError('video')"
                                    name="video"
                                    v-bind="inputs.video.filepond_options"
                                    :files="inputs.video.files"
                                    :server="uploadServer"
                                />
                            </vs-col>
                        </vs-row>
                    </vs-col>
                </vs-row>
                <vs-row vs-type="flex" vs-w="12" class="mb-6">
                    <vs-col vs-type="flex" vs-align="center" vs-lg="12">
                        <vs-row vs-type="flex" vs-w="12">
                            <vs-col

                                vs-type="flex"
                                vs-align="center"
                                vs-lg="12"
                            >
                                <span>{{ __("Featured Image") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="12">
                                <component
                                    imageResizeMode="cover"
                                    :is="inputs.featured_image.type"
                                    class="w-full"
                                    :danger="hasValidationError('featured_image')"
                                    :danger-text="validationError('featured_image')"
                                    name="featured_image"
                                    v-bind="inputs.featured_image.filepond_options"
                                    :server="uploadServer"
                                    :files="inputs.featured_image.files"
                                />
                            </vs-col>
                        </vs-row>
                    </vs-col>


                </vs-row>
                <vs-row vs-type="flex" vs-w="12" class="mb-6">
                    <vs-col vs-type="flex" vs-align="center" vs-lg="12">
                        <vs-row vs-type="flex" vs-w="12">
                            <vs-col

                                vs-type="flex"
                                vs-align="center"
                                vs-lg="12"
                            >
                                <span>{{ __("Images") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="12">
                                <component
                                    imageResizeMode="cover"
                                    :is="inputs.images.type"
                                    class="w-full"
                                    :danger="hasValidationError('images')"
                                    :danger-text="validationError('images')"
                                    name="images"
                                    v-bind="inputs.images.filepond_options"
                                    :files="inputs.images.files"
                                    :server="uploadServer"
                                />
                            </vs-col>
                        </vs-row>
                    </vs-col>


                </vs-row>
                <div class="flex justify-end mt-16">
                    <div class="flex">
                        <loading-button
                            color="success"
                            @click="() => onSubmit('close')"
                            :loading="isLoading"
                            class="mr-3 mb-2"
                            >{{ __("Save") }}</loading-button
                        >
                        <loading-button
                            color="warning"
                            class="mb-2"
                            @click="form.reset()"
                            :loading="isLoading"
                            >{{ __("Clear") }}</loading-button
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
                title: "",
                nightmare: false,
                summary: "",
                short_summary: "",
                video: "",
                images: [],
                featured_image: "",
                complex_case_category_id: ""
            }),
            isLoading:false,
            model: "Modules\\User\\Models\\ComplexCase",
            inputs: {
                title: {
                    type: "vs-input",
                    field_type: "text"
                },
                nightmare: {
                    type: "vs-checkbox",
                },
                summary: {
                    type: "quill-editor",
                    field_type: "quill"
                },
                short_summary: {
                    type: "vs-textarea",
                    field_type: "textarea"
                },
                video: {
                    type: "filepond",
                    field_type: "filepond",
                    files:[],
                    filepond_options: {
                        "label-idle": "Drag &amp; Drop your files",
                        "allow-multiple": Iracode.toBool(0),
                        "instant-upload": Iracode.toBool(1),

                        "accepted-file-types":"video/mp4, video/x-ms-wmv, video/quicktime"
                    }
                },
                featured_image: {
                    type: "filepond",
                    field_type: "filepond_image",
                    files:[],
                    filepond_options: {
                        "label-idle": "Drag &amp; Drop your files",
                        "allow-multiple": false,
                        "instant-upload": true,
                        "max-file-size":"2MB",
                        "accepted-file-types":"image/jpeg, image/png"
                    }
                },
                images: {
                    type: "filepond",
                    field_type: "filepond_image",
                    files:[],
                    filepond_options: {
                        "label-idle": "Drag &amp; Drop your files",
                        "allow-multiple": true,
                        "instant-upload": true,
                        "max-file-size":"2MB",
                        "accepted-file-types":"image/jpeg, image/png"
                    }
                },
                complex_case_category_id: {
                    field_type: "relation",
                    foreign_key: "complex_case_category_id",
                    relation_name: "complexCaseCategory",
                    options: [],
                    selected: {},
                    searchUrl: "/user/api/complex_case_categories",
                    titleField: "name"
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
        Iracode.loading();
        const { data: response } = await this.$http.get(
            `/user/api/complex_cases/${this.$route.params.id}`
        );
        Iracode.close_loading();
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
            this.isLoading=true;
            const data = await this.form.put(
                `/user/api/complex_cases/${this.$route.params.id}`
            );
            if (data.success) {
                Iracode.success(this.__("Complexcase Updated Successfully"));
            }
            if (action == "close") this.$router.push("/complex_cases");
            else this.form.reset();
            this.isLoading=false;
        }
    }
};
</script>
