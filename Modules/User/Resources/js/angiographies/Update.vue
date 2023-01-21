<template>
    <div class="mb-base">
        <vx-card>
            <template v-slot:actions>
                <vs-button
                    color="primary"
                    to="/user/angiographies"
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
                                <span>{{ __("Cr") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.Cr.type"
                                    v-model="form.Cr"
                                    class="w-full"
                                    :danger="hasValidationError('Cr')"
                                    :danger-text="validationError('Cr')"
                                    name="Cr"
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
                                <span>{{ __("Ht") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.Ht.type"
                                    v-model="form.Ht"
                                    class="w-full"
                                    :danger="hasValidationError('Ht')"
                                    :danger-text="validationError('Ht')"
                                    name="Ht"
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
                                <span>{{ __("L V E F") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.LVEF.type"
                                    v-model="form.LVEF"
                                    class="w-full"
                                    :danger="hasValidationError('LVEF')"
                                    :danger-text="validationError('LVEF')"
                                    name="LVEF"
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
                                <span>{{ __("H R") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.HR.type"
                                    v-model="form.HR"
                                    class="w-full"
                                    :danger="hasValidationError('HR')"
                                    :danger-text="validationError('HR')"
                                    name="HR"
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
                                <span>{{ __("Contrast") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.Contrast.type"
                                    v-model="form.Contrast"
                                    class="w-full"
                                    :danger="hasValidationError('Contrast')"
                                    :danger-text="validationError('Contrast')"
                                    name="Contrast"
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
                                <span>{{ __("Hb") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.Hb.type"
                                    v-model="form.Hb"
                                    class="w-full"
                                    :danger="hasValidationError('Hb')"
                                    :danger-text="validationError('Hb')"
                                    name="Hb"
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
                                <span>{{ __("P T P") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.PTP.type"
                                    v-model="form.PTP"
                                    class="w-full"
                                    :danger="hasValidationError('PTP')"
                                    :danger-text="validationError('PTP')"
                                    name="PTP"
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
                                <span>{{ __("C A V I") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.CAVI.type"
                                    v-model="form.CAVI"
                                    class="w-full"
                                    :danger="hasValidationError('CAVI')"
                                    :danger-text="validationError('CAVI')"
                                    name="CAVI"
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
                                <span>{{ __("W B C") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.WBC.type"
                                    v-model="form.WBC"
                                    class="w-full"
                                    :danger="hasValidationError('WBC')"
                                    :danger-text="validationError('WBC')"
                                    name="WBC"
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
                                <span>{{ __("Prior C A B G") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.PriorCABG.type"
                                    v-model="form.PriorCABG"
                                    class="w-full"
                                    :danger="hasValidationError('PriorCABG')"
                                    :danger-text="validationError('PriorCABG')"
                                    name="PriorCABG"
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
                                <span>{{ __("Prior P C I") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.PriorPCI.type"
                                    v-model="form.PriorPCI"
                                    class="w-full"
                                    :danger="hasValidationError('PriorPCI')"
                                    :danger-text="validationError('PriorPCI')"
                                    name="PriorPCI"
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
                </vs-row>
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
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <v-select
                                    style="width: 100%"
                                    :dir="$vs.rtl ? 'rtl' : 'ltr'"
                                    :value="inputs.patient_id.selected"
                                    @input="
                                        (op) =>
                                            onRelationSelect('patient_id', op)
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
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <v-select
                                    style="width: 100%"
                                    :dir="$vs.rtl ? 'rtl' : 'ltr'"
                                    :value="inputs.user_id.selected"
                                    @input="
                                        (op) => onRelationSelect('user_id', op)
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
                                <span>{{ __("Pribleed") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.pribleed.type"
                                    v-model="form.pribleed"
                                    class="w-full"
                                    :danger="hasValidationError('pribleed')"
                                    :danger-text="validationError('pribleed')"
                                    name="pribleed"
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
                                <span>{{ __("Hypotension") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.Hypotension.type"
                                    v-model="form.Hypotension"
                                    class="w-full"
                                    :danger="hasValidationError('Hypotension')"
                                    :danger-text="
                                        validationError('Hypotension')
                                    "
                                    name="Hypotension"
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
                                <span>{{ __("Heart Failure") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.heart_failure.type"
                                    v-model="form.heart_failure"
                                    class="w-full"
                                    :danger="
                                        hasValidationError('heart_failure')
                                    "
                                    :danger-text="
                                        validationError('heart_failure')
                                    "
                                    name="heart_failure"
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
                                <span>{{ __("Diabet") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.Diabet.type"
                                    v-model="form.Diabet"
                                    class="w-full"
                                    :danger="hasValidationError('Diabet')"
                                    :danger-text="validationError('Diabet')"
                                    name="Diabet"
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
                                <span>{{ __("Acute  M I") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.Acute_MI.type"
                                    v-model="form.Acute_MI"
                                    class="w-full"
                                    :danger="hasValidationError('Acute_MI')"
                                    :danger-text="validationError('Acute_MI')"
                                    name="Acute_MI"
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
                                <span>{{ __("I A B P") }}</span>
                                <span class="ml-1 text-red">*</span>
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                <component
                                    :is="inputs.IABP.type"
                                    v-model="form.IABP"
                                    class="w-full"
                                    :danger="hasValidationError('IABP')"
                                    :danger-text="validationError('IABP')"
                                    name="IABP"
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
                Cr: "",
                Ht: "",
                LVEF: "",
                HR: "",
                Contrast: "",
                Hb: "",
                PTP: "",
                CAVI: "",
                WBC: "",
                PriorCABG: "",
                PriorPCI: "",
                HbA1C: "",
                Age: "",
                SBP: "",
                DBP: "",
                Heigth: "",
                Weigth: "",
                Sex: "",
                pribleed: "",
                Hypotension: "",
                heart_failure: "",
                Diabet: "",
                Acute_MI: "",
                IABP: "",
                Smoker: "",
                user_id: "",
                patient_id: "",
            }),
            model: "Modules\\User\\Models\\Angiography",
            inputs: {
                Cr: {
                    type: "vs-input",
                    field_type: "text",
                },
                Ht: {
                    type: "vs-input",
                    field_type: "text",
                },
                LVEF: {
                    type: "vs-input",
                    field_type: "text",
                },
                HR: {
                    type: "vs-input",
                    field_type: "text",
                },
                Contrast: {
                    type: "vs-input",
                    field_type: "text",
                },
                Hb: {
                    type: "vs-input",
                    field_type: "text",
                },
                PTP: {
                    type: "vs-input",
                    field_type: "text",
                },
                CAVI: {
                    type: "vs-input",
                    field_type: "text",
                },
                WBC: {
                    type: "vs-input",
                    field_type: "text",
                },
                PriorCABG: {
                    type: "vs-input",
                    field_type: "text",
                },
                PriorPCI: {
                    type: "vs-input",
                    field_type: "text",
                },
                HbA1C: {
                    type: "vs-input",
                    field_type: "text",
                },
                Age: {
                    type: "vs-input",
                    field_type: "text",
                },
                SBP: {
                    type: "vs-input",
                    field_type: "text",
                },
                DBP: {
                    type: "vs-input",
                    field_type: "text",
                },
                Heigth: {
                    type: "vs-input",
                    field_type: "text",
                },
                Weigth: {
                    type: "vs-input",
                    field_type: "text",
                },
                Sex: {
                    type: "vs-radio",
                    field_type: "radio",
                },
                pribleed: {
                    type: "vs-input",
                    field_type: "text",
                },
                Hypotension: {
                    type: "vs-input",
                    field_type: "text",
                },
                heart_failure: {
                    type: "vs-input",
                    field_type: "text",
                },
                Diabet: {
                    type: "vs-input",
                    field_type: "text",
                },
                Acute_MI: {
                    type: "vs-input",
                    field_type: "text",
                },
                IABP: {
                    type: "vs-input",
                    field_type: "text",
                },
                Smoker: {
                    type: "vs-input",
                    field_type: "text",
                },
                user_id: {
                    field_type: "relation",
                    foreign_key: "user_id",
                    relation_name: "user",
                    options: [],
                    selected: {},
                    searchUrl: "/panel/api/users",
                    titleField: "email",
                },
                patient_id: {
                    field_type: "relation",
                    foreign_key: "patient_id",
                    relation_name: "patient",
                    options: [],
                    selected: {},
                    searchUrl: "/user/api/patients",
                    titleField: "name",
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
            `/user/api/angiographies/${this.$route.params.id}`
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
                `/user/api/angiographies/${this.$route.params.id}`
            );
            if (data.success) {
                Iracode.success(this.__("Angiography Updated Successfully"));
            }
            if (action == "close") this.$router.push("/user/angiographies");
            else this.form.reset();
        },
    },
};
</script>
