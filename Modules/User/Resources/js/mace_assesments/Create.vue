<template>
    <div class="mb-base">
        <vx-card>
            <template v-slot:actions>
                <vs-button
                    color="primary"
                    to="/user/mace_assesments"
                    type="filled"
                    >{{ __("Back") }}</vs-button
                >
            </template>
            <form @submit="onSubmit">
                <vs-row vs-type="flex" vs-w="12" class="mb-6">
                    <vs-col vs-type="flex" vs-align="center" vs-lg="6">
                        <vs-row vs-type="flex" vs-w="12">
                            <vs-col
                                class="justify-end"
                                vs-type="flex"
                                vs-align="center"
                                vs-lg="3"
                            >
                                <span>{{ __("patient") }}</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <v-select
                                    style="width: 100%"
                                    :dir="$vs.rtl ? 'rtl' : 'ltr'"
                                    :value="inputs.patient_id.selected"
                                    @input="
                                        op => onRelationSelect('patient_id', op)
                                    "
                                    label="name"
                                    :filterable="false"
                                    :options="inputs.patient_id.options"
                                    @search="
                                        (search, loading) =>
                                            onRelationSearch(
                                                'patient_id',
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
                                <span>{{ __("user") }}</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <v-select
                                    style="width: 100%"
                                    :dir="$vs.rtl ? 'rtl' : 'ltr'"
                                    :value="inputs.user_id.selected"
                                    @input="
                                        op => onRelationSelect('user_id', op)
                                    "
                                    label="email"
                                    :filterable="false"
                                    :options="inputs.user_id.options"
                                    @search="
                                        (search, loading) =>
                                            onRelationSearch(
                                                'user_id',
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
                                <span>{{ __("Hb A1 C") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.HbA1C.type"
                                    v-model="form.HbA1C"
                                    class="w-full"
                                    :danger="hasValidationError('HbA1C')"
                                    :danger-text="validationError('HbA1C')"
                                    name="HbA1C"
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
                                <span>{{ __("L D L Cholesterol") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.LDL_cholesterol.type"
                                    v-model="form.LDL_cholesterol"
                                    class="w-full"
                                    :danger="
                                        hasValidationError('LDL_cholesterol')
                                    "
                                    :danger-text="
                                        validationError('LDL_cholesterol')
                                    "
                                    name="LDL_cholesterol"
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
                                <span>{{ __("H D L Cholesterol") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.HDL_cholesterol.type"
                                    v-model="form.HDL_cholesterol"
                                    class="w-full"
                                    :danger="
                                        hasValidationError('HDL_cholesterol')
                                    "
                                    :danger-text="
                                        validationError('HDL_cholesterol')
                                    "
                                    name="HDL_cholesterol"
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
                                <span>{{ __("Age") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.Age.type"
                                    v-model="form.Age"
                                    class="w-full"
                                    :danger="hasValidationError('Age')"
                                    :danger-text="validationError('Age')"
                                    name="Age"
                                    type="number"
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
                                <span>{{ __("S B P") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.SBP.type"
                                    v-model="form.SBP"
                                    class="w-full"
                                    :danger="hasValidationError('SBP')"
                                    :danger-text="validationError('SBP')"
                                    name="SBP"
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
                                <span>{{ __("Triglycerides") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.Triglycerides.type"
                                    v-model="form.Triglycerides"
                                    class="w-full"
                                    :danger="
                                        hasValidationError('Triglycerides')
                                    "
                                    :danger-text="
                                        validationError('Triglycerides')
                                    "
                                    name="Triglycerides"
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
                                <span>{{ __("D B P") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.DBP.type"
                                    v-model="form.DBP"
                                    class="w-full"
                                    :danger="hasValidationError('DBP')"
                                    :danger-text="validationError('DBP')"
                                    name="DBP"
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
                                <span>{{
                                    __("Left Anklebrachial Index")
                                }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.LeftAnklebrachialIndex.type"
                                    v-model="form.LeftAnklebrachialIndex"
                                    class="w-full"
                                    :danger="
                                        hasValidationError(
                                            'LeftAnklebrachialIndex'
                                        )
                                    "
                                    :danger-text="
                                        validationError(
                                            'LeftAnklebrachialIndex'
                                        )
                                    "
                                    name="LeftAnklebrachialIndex"
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
                                <span>{{
                                    __("Right Anklebrachial Index")
                                }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.RightAnklebrachialIndex.type"
                                    v-model="form.RightAnklebrachialIndex"
                                    class="w-full"
                                    :danger="
                                        hasValidationError(
                                            'RightAnklebrachialIndex'
                                        )
                                    "
                                    :danger-text="
                                        validationError(
                                            'RightAnklebrachialIndex'
                                        )
                                    "
                                    name="RightAnklebrachialIndex"
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
                                <span>{{ __("Heigth") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.Heigth.type"
                                    v-model="form.Heigth"
                                    class="w-full"
                                    :danger="hasValidationError('Heigth')"
                                    :danger-text="validationError('Heigth')"
                                    name="Heigth"
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
                                <span>{{ __("Weigth") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.Weigth.type"
                                    v-model="form.Weigth"
                                    class="w-full"
                                    :danger="hasValidationError('Weigth')"
                                    :danger-text="validationError('Weigth')"
                                    name="Weigth"
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
                                <span>{{ __("Sex") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.Sex.type"
                                    v-model="form.Sex"
                                    class="w-full"
                                    :danger="hasValidationError('Sex')"
                                    :danger-text="validationError('Sex')"
                                    name="Sex"
                                    type="radio"
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
                                <span>{{ __("Smoker") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.Smoker.type"
                                    v-model="form.Smoker"
                                    class="w-full"
                                    :danger="hasValidationError('Smoker')"
                                    :danger-text="validationError('Smoker')"
                                    name="Smoker"
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
                                <span>{{ __("T B P") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.TBP.type"
                                    v-model="form.TBP"
                                    class="w-full"
                                    :danger="hasValidationError('TBP')"
                                    :danger-text="validationError('TBP')"
                                    name="TBP"
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
                                <span>{{ __("M I") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.MI.type"
                                    v-model="form.MI"
                                    class="w-full"
                                    :danger="hasValidationError('MI')"
                                    :danger-text="validationError('MI')"
                                    name="MI"
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
                                <span>{{ __("Diabetes") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.Diabetes.type"
                                    v-model="form.Diabetes"
                                    class="w-full"
                                    :danger="hasValidationError('Diabetes')"
                                    :danger-text="validationError('Diabetes')"
                                    name="Diabetes"
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
                                <span>{{ __("F H") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.FH.type"
                                    v-model="form.FH"
                                    class="w-full"
                                    :danger="hasValidationError('FH')"
                                    :danger-text="validationError('FH')"
                                    name="FH"
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
                                <span>{{ __("T H L") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.THL.type"
                                    v-model="form.THL"
                                    class="w-full"
                                    :danger="hasValidationError('THL')"
                                    :danger-text="validationError('THL')"
                                    name="THL"
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
                HbA1C: "",
                LDL_cholesterol: "",
                HDL_cholesterol: "",
                Age: "",
                SBP: "",
                Triglycerides: "",
                DBP: "",
                LeftAnklebrachialIndex: "",
                RightAnklebrachialIndex: "",
                Heigth: "",
                Weigth: "",
                Sex: "",
                Smoker: "",
                TBP: "",
                MI: "",
                Diabetes: "",
                FH: "",
                THL: "",
                user_id: "",
                patient_id: ""
            }),
            model: "Modules\\User\\Models\\MaceAssesment",
            locale: Iracode.$i18n.locale,
            inputs: {
                HbA1C: {
                    type: "vs-input",
                    field_type: "text"
                },
                LDL_cholesterol: {
                    type: "vs-input",
                    field_type: "text"
                },
                HDL_cholesterol: {
                    type: "vs-input",
                    field_type: "text"
                },
                Age: {
                    type: "vs-input",
                    field_type: "number"
                },
                SBP: {
                    type: "vs-input",
                    field_type: "text"
                },
                Triglycerides: {
                    type: "vs-input",
                    field_type: "text"
                },
                DBP: {
                    type: "vs-input",
                    field_type: "text"
                },
                LeftAnklebrachialIndex: {
                    type: "vs-input",
                    field_type: "text"
                },
                RightAnklebrachialIndex: {
                    type: "vs-input",
                    field_type: "text"
                },
                Heigth: {
                    type: "vs-input",
                    field_type: "text"
                },
                Weigth: {
                    type: "vs-input",
                    field_type: "text"
                },
                Sex: {
                    type: "vs-radio",
                    field_type: "radio"
                },
                Smoker: {
                    type: "vs-input",
                    field_type: "text"
                },
                TBP: {
                    type: "vs-input",
                    field_type: "text"
                },
                MI: {
                    type: "vs-input",
                    field_type: "text"
                },
                Diabetes: {
                    type: "vs-input",
                    field_type: "text"
                },
                FH: {
                    type: "vs-input",
                    field_type: "text"
                },
                THL: {
                    type: "vs-input",
                    field_type: "text"
                },
                user_id: {
                    field_type: "relation",
                    options: [],
                    selected: {},
                    foreign_key: "user_id",
                    relation_name: "user",
                    searchUrl: "/panel/api/users",
                    titleField: "email"
                },
                patient_id: {
                    field_type: "relation",
                    options: [],
                    selected: {},
                    foreign_key: "patient_id",
                    relation_name: "patient",
                    searchUrl: "/user/api/patients",
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
            const data = await this.form.post("/user/api/mace_assesments");
            if (data.success) {
                Iracode.success(this.__("Maceassesment Created Successfully"));
                if (action == "close")
                    this.$router.push("/user/mace_assesments");
                else this.form.reset();
            }
        }
    }
};
</script>
