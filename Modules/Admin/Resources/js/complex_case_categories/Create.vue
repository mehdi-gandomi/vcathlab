<template>
    <div class="mb-base">
        <vx-card>
            <template v-slot:actions>
                <vs-button
                    color="primary"
                    to="/admin/complex_case_categories"
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
                                <span>{{ __("Parent") }}</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="12">
                                <v-select
                                    style="width: 100%"
                                    :dir="$vs.rtl ? 'rtl' : 'ltr'"
                                    :value="
                                        inputs.parent_id.selected
                                    "
                                    @input="
                                        op =>
                                            onRelationSelect(
                                                'parent_id',
                                                op
                                            )
                                    "
                                    label="name"
                                    :filterable="false"
                                    :options="
                                        inputs.parent_id.options
                                    "
                                    @search="
                                        (search, loading) =>
                                            onRelationSearch(
                                                'parent_id',
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
                                class="justify-end pr-5"
                                vs-type="flex"
                                vs-align="center"
                                vs-lg="3"
                            >
                                <span>{{ __("Name") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.name.type"
                                    v-model="form.name"
                                    class="w-full"
                                    :danger="hasValidationError('name')"
                                    :danger-text="validationError('name')"
                                    name="name"
                                    type="text"
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
export default {
    components: {},
    mixins: [HasForm],
    data() {
        return {
            form: new Form({
                name: "",
                parent_id:""
            }),
            model: "Modules\\Admin\\Models\\ComplexCaseCategory",
            locale: Iracode.$i18n.locale,
            inputs: {
                name: {
                    type: "vs-input"
                },
                parent_id: {
                    field_type: "relation",
                    options: [],
                    selected: {},
                    foreign_key: "parent_id",
                    relation_name: "complexCaseCategory",
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
    created() {
        //
    },
    mounted() {
        //
    },
    methods: {
        async onSubmit(action) {
            const data = await this.form.post(
                "/admin/api/complex_case_categories"
            );
            if (data.success) {
                Iracode.success(
                    this.__("Complexcasecategory Created Successfully")
                );
                if (action == "close")
                    this.$router.push("/admin/complex_case_categories");
                else this.form.reset();
            }
        }
    }
};
</script>
