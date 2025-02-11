<template>
    <div class="mb-base">
        <vx-card :title="__('Patient Information')">
            <template v-slot:actions>
                <vs-button color="primary" to="/computation_center/list" type="filled">{{ __("Back") }}</vs-button>
            </template>
            <div class="form-design-page insert-mode">
                <div class="form-design-page-content">
                    <div class="form-design-section">
                        <div style="transition: opacity 300ms;">
                            <div class="form-design-section-wrapper style-border"
                                style="background-color: transparent; border-width: 1px; border-color: rgb(238, 238, 238); border-style: solid;">
                                <div class="form-design-section-head"
                                    style="background-color: rgb(249, 249, 249); color: rgb(0, 0, 0); border-width: 0px 0px 1px; border-color: rgb(238, 238, 238); border-style: solid; font-size: 14px;  font-weight: normal; font-style: unset;">
                                    <div class="title">Information</div>
                                </div>
                                <div class="form-design-section-content">
                                    <vs-row vs-type="flex" vs-w="12" class="mb-6 m-0">
                                        <vs-col vs-type="flex" vs-align="center" vs-lg="3" vs-sm="6" vs-xs="12">
                                            <div class="form-design-field form-field-text "
                                                style="display: inline-block;width: 100%;">
                                                <div class="content">
                                                    <div class="title"><span class="required" style="color: red;"> *
                                                        </span><span class="title-str"
                                                            style="font-size: 14px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Name</span>
                                                    </div>
                                                    <div class="wrapper" style="display: block;">
                                                        <div>
                                                            <div><input class="form-input" type="text" name="name"
                                                                    v-model="form.name" maxlength="255" placeholder=""
                                                                    style="width: 100%; font-size: 14px; color: rgb(0, 0, 0); border-color: rgb(225, 225, 225);  font-weight: normal; font-style: unset; background-color: rgb(255, 255, 255); border-style: solid; border-width: 1px; border-radius: 0px;">
                                                                <div style="margin: 10px -5px 5px; display: none;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </vs-col>
                                        <vs-col vs-type="flex" vs-align="center" vs-lg="1" vs-sm="6" vs-xs="12">
                                            <div class="form-design-field form-field-number "
                                                style="display: inline-block;width: 100%;">
                                                <div class="content">
                                                    <div class="title"><span class="required" style="color: red;"> *
                                                        </span><span class="title-str"
                                                            style="font-size: 14px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Age</span>
                                                    </div>
                                                    <div class="wrapper" style="display: block;">
                                                        <div>
                                                            <div><input type="number" placeholder="" name="age"
                                                                    v-model="form.age" class="form-input"
                                                                    style="width: 100%; font-size: 14px; color: rgb(0, 0, 0); border-color: rgb(225, 225, 225);  font-weight: normal; font-style: unset; background-color: rgb(255, 255, 255); border-style: solid; border-width: 1px; border-radius: 0px;">
                                                                <div style="margin: 10px -5px 5px; display: none;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </vs-col>
                                        <vs-col vs-type="flex" vs-align="center" vs-lg="3" vs-sm="6" vs-xs="12">
                                            <div class="form-design-field form-field-text "
                                                style="display: inline-block;width: 100%;">
                                                <div class="content">
                                                    <div class="title"><span class="required" style="color: red;"> *
                                                        </span><span class="title-str"
                                                            style="font-size: 14px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Physician</span>
                                                    </div>
                                                    <div class="wrapper" style="display: block;">
                                                        <div>
                                                            <div><input name="physician" class="form-input"
                                                                    v-model="form.physician" type="text" maxlength="255"
                                                                    placeholder=""
                                                                    style="width: 100%; font-size: 14px; color: rgb(0, 0, 0); border-color: rgb(225, 225, 225);  font-weight: normal; font-style: unset; background-color: rgb(255, 255, 255); border-style: solid; border-width: 1px; border-radius: 0px;">
                                                                <div style="margin: 10px -5px 5px; display: none;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </vs-col>
                                        <vs-col vs-type="flex" vs-align="center" vs-lg="2" vs-sm="6" vs-xs="12">
                                            <div class="form-design-field form-field-text "
                                                style="display: inline-block;width: 100%;">
                                                <div class="content">
                                                    <div class="title"><span class="required" style="color: red;"> *
                                                        </span><span class="title-str"
                                                            style="font-size: 14px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Date</span>
                                                    </div>
                                                    <div class="wrapper" style="display: block;">
                                                        <div>
                                                            <div>
                                                                    <date-picker type="date" v-model="form.date" format="YYYY-MM-DD" display-format="jYYYY-jMM-jDD" />
                                                                <div style="margin: 10px -5px 5px; display: none;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </vs-col>
                                        <vs-col vs-type="flex" vs-align="center" vs-lg="3" vs-sm="6" vs-xs="12">
                                            <div class="form-design-field form-field-toggle "
                                                style="display: inline-block;">
                                                <div class="content">
                                                    <div class="title"><span class="required" style="color: red;"> *
                                                        </span><span class="title-str"
                                                            style="font-size: 14px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Gender</span>
                                                    </div>
                                                    <div class="wrapper" style="display: block;">
                                                        <div>
                                                            <div><label
                                                                    class="ravesh-toggle ravesh-toggle-style-1 has-text"
                                                                    for="male"><input id="male" type="radio"
                                                                        name="gender" v-model="form.gender" value="1">
                                                                    <div class="float-right toggle-on ticon-1"><i></i>
                                                                        <div>Male</div>
                                                                    </div>
                                                                </label>
                                                                <label
                                                                    class="ravesh-toggle ravesh-toggle-style-1 has-text"
                                                                    for="female">
                                                                    <input id="female" type="radio" name="gender"
                                                                        v-model="form.gender" value="2">
                                                                    <div class="float-right toggle-on ticon-1"><i></i>
                                                                        <div>Female</div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </vs-col>
                                    </vs-row>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-design-section">
                        <div style="transition: opacity 300ms;">
                            <div class="form-design-section-wrapper style-border"
                                style="background-color: transparent; border-width: 1px; border-color: rgb(238, 238, 238); border-style: solid;">
                                <div class="form-design-section-head"
                                    style="background-color: rgb(249, 249, 249); color: rgb(0, 0, 0); border-width: 0px 0px 1px; border-color: rgb(238, 238, 238); border-style: solid; font-size: 14px;  font-weight: normal; font-style: unset;">
                                    <div class="title">Risk Factors</div>
                                </div>
                                <div class="form-design-section-content">
                                    <div class="form-design-field form-field-list col-1-3"
                                        style="display: inline-block;">
                                        <div class="content">
                                            <div class="title"><span class="required" style="color: red;"> *
                                                </span><span class="title-str"
                                                    style="font-size: 14px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Hypertension</span>
                                            </div>
                                            <div class="wrapper" style="display: block;">
                                                <div>
                                                    <div><select v-model="form.hypertension" class="ravesh-dropdown"
                                                            selected="selected"
                                                            style="width: 150px; font-size: 14px; color: rgb(0, 0, 0); border-color: rgb(225, 225, 225);  font-weight: normal; font-style: unset; background-color: rgb(255, 255, 255); border-style: solid; border-width: 1px; border-radius: 0px;">
                                                            <option value="">Please select</option>
                                                            <option value="0">no</option>
                                                            <option value="1">yes</option>
                                                        </select></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-design-field form-field-list col-1-3"
                                        style="display: inline-block;">
                                        <div class="content">
                                            <div class="title"><span class="required" style="color: red;"> *
                                                </span><span class="title-str"
                                                    style="font-size: 14px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Hyperlipidemia</span>
                                            </div>
                                            <div class="wrapper" style="display: block;">
                                                <div>
                                                    <div><select v-model="form.hyperlipidemia" class="ravesh-dropdown"
                                                            selected="selected"
                                                            style="width: 150px; font-size: 14px; color: rgb(0, 0, 0); border-color: rgb(225, 225, 225);  font-weight: normal; font-style: unset; background-color: rgb(255, 255, 255); border-style: solid; border-width: 1px; border-radius: 0px;">
                                                            <option value="">Please select</option>
                                                            <option value="0">no</option>
                                                            <option value="1">yes</option>
                                                        </select></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-design-field form-field-list col-1-3"
                                        style="display: inline-block;">
                                        <div class="content">
                                            <div class="title"><span class="required" style="color: red;"> *
                                                </span><span class="title-str"
                                                    style="font-size: 14px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Family
                                                    History</span></div>
                                            <div class="wrapper" style="display: block;">
                                                <div>
                                                    <div><select v-model="form.family_history" class="ravesh-dropdown"
                                                            selected="selected"
                                                            style="width: 150px; font-size: 14px; color: rgb(0, 0, 0); border-color: rgb(225, 225, 225);  font-weight: normal; font-style: unset; background-color: rgb(255, 255, 255); border-style: solid; border-width: 1px; border-radius: 0px;">
                                                            <option value="">Please select</option>
                                                            <option value="0">no</option>
                                                            <option value="1">yes</option>
                                                        </select></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-design-field form-field-list col-1-3"
                                        style="display: inline-block;">
                                        <div class="content">
                                            <div class="title"><span class="required" style="color: red;"> *
                                                </span><span class="title-str"
                                                    style="font-size: 14px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Diabetic</span>
                                            </div>
                                            <div class="wrapper" style="display: block;">
                                                <div>
                                                    <div><select v-model="form.diabetic" class="ravesh-dropdown"
                                                            selected="selected"
                                                            style="width: 150px; font-size: 14px; color: rgb(0, 0, 0); border-color: rgb(225, 225, 225);  font-weight: normal; font-style: unset; background-color: rgb(255, 255, 255); border-style: solid; border-width: 1px; border-radius: 0px;">
                                                            <option value="">Please select</option>
                                                            <option value="0">no</option>
                                                            <option value="1">yes</option>
                                                        </select></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-design-field form-field-list col-1-3"
                                        style="display: inline-block;">
                                        <div class="content">
                                            <div class="title"><span class="required" style="color: red;"> *
                                                </span><span class="title-str"
                                                    style="font-size: 14px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">MI
                                                    history</span></div>
                                            <div class="wrapper" style="display: block;">
                                                <div>
                                                    <div><select v-model="form.mi_history" class="ravesh-dropdown"
                                                            selected="selected"
                                                            style="width: 150px; font-size: 14px; color: rgb(0, 0, 0); border-color: rgb(225, 225, 225);  font-weight: normal; font-style: unset; background-color: rgb(255, 255, 255); border-style: solid; border-width: 1px; border-radius: 0px;">
                                                            <option value="">Please select</option>
                                                            <option value="0">no</option>
                                                            <option value="1">yes</option>
                                                        </select></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-design-field form-field-list col-1-3"
                                        style="display: inline-block;">
                                        <div class="content">
                                            <div class="title"><span class="required" style="color: red;"> *
                                                </span><span class="title-str"
                                                    style="font-size: 14px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Smoker</span>
                                            </div>
                                            <div class="wrapper" style="display: block;">
                                                <div>
                                                    <div><select v-model="form.smoker" class="ravesh-dropdown"
                                                            selected="selected"
                                                            style="width: 150px; font-size: 14px; color: rgb(0, 0, 0); border-color: rgb(225, 225, 225);  font-weight: normal; font-style: unset; background-color: rgb(255, 255, 255); border-style: solid; border-width: 1px; border-radius: 0px;">
                                                            <option value="">Please select</option>
                                                            <option value="0">no</option>
                                                            <option value="1">yes</option>
                                                        </select></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-design-field form-field-text col-1-3"
                                        style="display: inline-block;">
                                        <div class="content">
                                            <div class="title"><span class="required" style="color: red;"> *
                                                </span><span class="title-str"
                                                    style="font-size: 14px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">LVEF
                                                    (%)</span></div>
                                            <div class="wrapper" style="display: block;">
                                                <div>
                                                    <div><input v-model="form.lvef" class="form-input" type="text"
                                                            maxlength="255" placeholder=""
                                                            style="width: 150px; font-size: 14px; color: rgb(0, 0, 0); border-color: rgb(225, 225, 225);  font-weight: normal; font-style: unset; background-color: rgb(255, 255, 255); border-style: solid; border-width: 1px; border-radius: 0px;">
                                                        <div style="margin: 10px -5px 5px; display: none;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-design-field form-field-text col-1-3"
                                        style="display: inline-block;">
                                        <div class="content">
                                            <div class="title"><span class="required" style="color: red;"> *
                                                </span><span class="title-str"
                                                    style="font-size: 14px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">CrCl</span>
                                            </div>
                                            <div class="wrapper" style="display: block;">
                                                <div>
                                                    <div><input v-model="form.crcl" class="form-input" type="text"
                                                            maxlength="255" placeholder=""
                                                            style="width: 150px; font-size: 14px; color: rgb(0, 0, 0); border-color: rgb(225, 225, 225);  font-weight: normal; font-style: unset; background-color: rgb(255, 255, 255); border-style: solid; border-width: 1px; border-radius: 0px;">
                                                        <div style="margin: 10px -5px 5px; display: none;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-design-field form-field-list col-1-3"
                                        style="display: inline-block;">
                                        <div class="content">
                                            <div class="title"><span class="required" style="color: red;"> *
                                                </span><span class="title-str"
                                                    style="font-size: 14px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Symptoms</span>
                                            </div>
                                            <div class="wrapper" style="display: block;">
                                                <div>
                                                    <div><select v-model="form.symptoms" class="ravesh-dropdown"
                                                            selected="selected"
                                                            style="width: 150px; font-size: 14px; color: rgb(0, 0, 0); border-color: rgb(225, 225, 225);  font-weight: normal; font-style: unset; background-color: rgb(255, 255, 255); border-style: solid; border-width: 1px; border-radius: 0px;">
                                                            <option value="">Please select</option>
                                                            <option value="Asymptomatic">Asymptomatic</option>
                                                            <option value="Typical Chest Pain">Typical Chest Pain
                                                            </option>
                                                            <option value="Atypical Chest Pain">Atypical Chest Pain
                                                            </option>
                                                            <option value="Dyspnea">Dyspnea</option>
                                                        </select></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-design-section">
                        <div style="transition: opacity 300ms;">
                            <div class="form-design-section-wrapper style-border"
                                style="background-color: transparent; border-width: 1px; border-color: rgb(238, 238, 238); border-style: solid;">
                                <div class="form-design-section-head"
                                    style="background-color: rgb(249, 249, 249); color: rgb(0, 0, 0); border-width: 0px 0px 1px; border-color: rgb(238, 238, 238); border-style: solid; font-size: 14px;  font-weight: normal; font-style: unset;">
                                    <div class="title">Dominant</div>
                                </div>
                                <div class="form-design-section-content">
                                    <div class="form-design-field form-field-radio col-full"
                                        style="display: inline-block;">
                                        <div class="content">
                                            <div class="title"><span class="required" style="color: red;"> *
                                                </span><span class="title-str"
                                                    style="font-size: 14px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Dominant</span>
                                            </div>
                                            <div class="wrapper" style="display: block;">
                                                <div>
                                                    <div class="style-2 flex">
                                                        <div class="item"><label style="display: block;"
                                                                class="ravesh-form-control ravesh-form-control-radio type-classic"
                                                                for="id57ch2oh2it"><input id="id57ch2oh2it" type="radio"
                                                                    name="dominant" v-model="form.dominant"
                                                                    value="right-dominant">
                                                                <div class="cover"><span
                                                                        style="font-size: 13px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Right
                                                                        dominant</span>
                                                                    <div class="ravesh-form-control-indicator">
                                                                    </div>
                                                                </div>
                                                            </label></div>
                                                        <div class="item"><label style="display: block;"
                                                                class="ravesh-form-control ravesh-form-control-radio type-classic"
                                                                for="idv2cxca3v33"><input id="idv2cxca3v33" type="radio"
                                                                    name="dominant" v-model="form.dominant"
                                                                    value="left-dominant">
                                                                <div class="cover"><span
                                                                        style="font-size: 13px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Left
                                                                        dominant</span>
                                                                    <div class="ravesh-form-control-indicator">
                                                                    </div>
                                                                </div>
                                                            </label></div>

                                                            <div class="item"><label style="display: block;"
                                                                class="ravesh-form-control ravesh-form-control-radio type-classic"
                                                                for="idv2cxca3v23"><input id="idv2cxca3v23" type="radio"
                                                                    name="dominant" v-model="form.dominant"
                                                                    value="co-dominant">
                                                                <div class="cover"><span
                                                                        style="font-size: 13px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Co-dominant</span>
                                                                    <div class="ravesh-form-control-indicator">
                                                                    </div>
                                                                </div>
                                                            </label></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-design-section">
                        <div style="transition: opacity 300ms;">
                            <div class="form-design-section-wrapper style-border"
                                style="background-color: transparent; border-width: 1px; border-color: rgb(238, 238, 238); border-style: solid;">
                                <div class="form-design-section-head"
                                    style="background-color: rgb(249, 249, 249); color: rgb(0, 0, 0); border-width: 0px 0px 1px; border-color: rgb(238, 238, 238); border-style: solid; font-size: 14px;  font-weight: normal; font-style: unset;">
                                    <div class="title">Condition and Morphology</div>
                                </div>
                                <div class="form-design-section-content">
                                    <div class="form-design-field form-field-list col-1-3"
                                        style="display: inline-block;">
                                        <div class="content">
                                            <div class="title"><span class="required" style="color: red;"> *</span><span
                                                    class="title-str">Bifurcation</span></div>
                                            <div class="wrapper">
                                                <select v-model="form.bifurcation" class="ravesh-dropdown"
                                                    style="width: 150px; font-size: 14px; color: rgb(0, 0, 0); border-color: rgb(225, 225, 225);  font-weight: normal; font-style: unset; background-color: rgb(255, 255, 255); border-style: solid; border-width: 1px; border-radius: 0px;">
                                                    <option value="">Please select</option>
                                                    <option value="0">no</option>
                                                    <option value="1">yes</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-design-field form-field-list col-1-3"
                                        style="display: inline-block;">
                                        <div class="content">
                                            <div class="title"><span class="required" style="color: red;"> *</span><span
                                                    class="title-str">Trifurcation</span></div>
                                            <div class="wrapper">
                                                <select v-model="form.trifurcation" class="ravesh-dropdown"
                                                    style="width: 150px; font-size: 14px; color: rgb(0, 0, 0); border-color: rgb(225, 225, 225);  font-weight: normal; font-style: unset; background-color: rgb(255, 255, 255); border-style: solid; border-width: 1px; border-radius: 0px;">
                                                    <option value="">Please select</option>
                                                    <option value="0">no</option>
                                                    <option value="1">yes</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-design-field form-field-list col-1-3"
                                        style="display: inline-block;">
                                        <div class="content">
                                            <div class="title"><span class="required" style="color: red;"> *</span><span
                                                    class="title-str">Aorto Ostial Lesion</span></div>
                                            <div class="wrapper">
                                                <select v-model="form.aortoOstialLesion" class="ravesh-dropdown"
                                                    style="width: 150px; font-size: 14px; color: rgb(0, 0, 0); border-color: rgb(225, 225, 225);  font-weight: normal; font-style: unset; background-color: rgb(255, 255, 255); border-style: solid; border-width: 1px; border-radius: 0px;">
                                                    <option value="">Please select</option>
                                                    <option value="0">no</option>
                                                    <option value="1">yes</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-design-field form-field-list col-1-3"
                                        style="display: inline-block;">
                                        <div class="content">
                                            <div class="title"><span class="required" style="color: red;"> *</span><span
                                                    class="title-str">Severe Tortuosity</span></div>
                                            <div class="wrapper">
                                                <select v-model="form.severeTortuosity" class="ravesh-dropdown"
                                                    style="width: 150px; font-size: 14px; color: rgb(0, 0, 0); border-color: rgb(225, 225, 225);  font-weight: normal; font-style: unset; background-color: rgb(255, 255, 255); border-style: solid; border-width: 1px; border-radius: 0px;">
                                                    <option value="">Please select</option>
                                                    <option value="0">no</option>
                                                    <option value="1">yes</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-design-field form-field-list col-1-3"
                                        style="display: inline-block;">
                                        <div class="content">
                                            <div class="title"><span class="required" style="color: red;"> *</span><span
                                                    class="title-str">Severe Calcification</span></div>
                                            <div class="wrapper">
                                                <select v-model="form.severeCalcification" class="ravesh-dropdown"
                                                    style="width: 150px; font-size: 14px; color: rgb(0, 0, 0); border-color: rgb(225, 225, 225);  font-weight: normal; font-style: unset; background-color: rgb(255, 255, 255); border-style: solid; border-width: 1px; border-radius: 0px;">
                                                    <option value="">Please select</option>
                                                    <option value="0">no</option>
                                                    <option value="1">yes</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-design-field form-field-list col-1-3"
                                        style="display: inline-block;">
                                        <div class="content">
                                            <div class="title"><span class="required" style="color: red;"> *</span><span
                                                    class="title-str">Long Lesion</span></div>
                                            <div class="wrapper">
                                                <select v-model="form.longLesion" class="ravesh-dropdown"
                                                    style="width: 150px; font-size: 14px; color: rgb(0, 0, 0); border-color: rgb(225, 225, 225);  font-weight: normal; font-style: unset; background-color: rgb(255, 255, 255); border-style: solid; border-width: 1px; border-radius: 0px;">
                                                    <option value="">Please select</option>
                                                    <option value="0">no</option>
                                                    <option value="1">yes</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-design-field form-field-list col-1-3"
                                        style="display: inline-block;">
                                        <div class="content">
                                            <div class="title"><span class="required" style="color: red;"> *</span><span
                                                    class="title-str">Thrombus</span></div>
                                            <div class="wrapper">
                                                <select v-model="form.thrombus" class="ravesh-dropdown"
                                                    style="width: 150px; font-size: 14px; color: rgb(0, 0, 0); border-color: rgb(225, 225, 225);  font-weight: normal; font-style: unset; background-color: rgb(255, 255, 255); border-style: solid; border-width: 1px; border-radius: 0px;">
                                                    <option value="">Please select</option>
                                                    <option value="0">no</option>
                                                    <option value="1">yes</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-design-field form-field-list col-1-3"
                                        style="display: inline-block;">
                                        <div class="content">
                                            <div class="title"><span class="required" style="color: red;"> *</span><span
                                                    class="title-str">PVD</span></div>
                                            <div class="wrapper">
                                                <select v-model="form.pvd" class="ravesh-dropdown"
                                                    style="width: 150px; font-size: 14px; color: rgb(0, 0, 0); border-color: rgb(225, 225, 225);  font-weight: normal; font-style: unset; background-color: rgb(255, 255, 255); border-style: solid; border-width: 1px; border-radius: 0px;">
                                                    <option value="">Please select</option>
                                                    <option value="0">no</option>
                                                    <option value="1">yes</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-design-field form-field-list col-1-3"
                                        style="display: inline-block;">
                                        <div class="content">
                                            <div class="title"><span class="required" style="color: red;"> *</span><span
                                                    class="title-str">COPD</span></div>
                                            <div class="wrapper">
                                                <select v-model="form.copd" class="ravesh-dropdown"
                                                    style="width: 150px; font-size: 14px; color: rgb(0, 0, 0); border-color: rgb(225, 225, 225);  font-weight: normal; font-style: unset; background-color: rgb(255, 255, 255); border-style: solid; border-width: 1px; border-radius: 0px;">
                                                    <option value="">Please select</option>
                                                    <option value="0">no</option>
                                                    <option value="1">yes</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <vs-tabs :color="colorx" v-model="activeTab">
                        <vs-tab label="Report based on Table">






                            <Table ref="table" />








                        </vs-tab>
                        <vs-tab label="Report based on Voice">
                            <Voice/>
                        </vs-tab>
                        <vs-tab label="Report based on Text">
                            <div class="form-group">
                                <label for="">Write you report here</label>
                                <textarea rows="15" v-model="user_description"  placeholder="Add a description..."
                                    class="description-input"></textarea>
                            </div>
                        </vs-tab>
                    </vs-tabs>
                    <div class="form-design-section">
        <div style="transition: opacity 300ms;">
            <div class="form-design-section-wrapper style-border"
                style="background-color: transparent; ">
                <div class="form-design-section-head"
                    style="background-color: rgb(249, 249, 249); color: rgb(0, 0, 0); ; font-size: 14px;  font-weight: normal; font-style: unset;">
                    <div class="title">Result and Recommendation</div>
                </div>
                <div class="form-design-section-content flex">
                    <div class="form-design-field form-field-list col-1-2" style="display: inline-block;">
                        <div class="content">
                            <div class="title"><span class="required" style="color: red;"> * </span><span
                                    class="title-str"
                                    style="font-size: 15px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Result</span>
                            </div>
                            <div class="wrapper" style="display: block;">
                                <div>
                                    <div><select class="ravesh-dropdown" selected="selected"
                                            name="result"
                                            v-model="form.result"
                                            style="width: 300px; font-size: 15px; color: rgb(0, 0, 0);   font-weight: normal; font-style: unset; background-color: rgb(255, 255, 255); border-style: solid; border-width: 1px; border-radius: 6px;">
                                            <option value="">Please select</option>
                                            <option value="normal">normal</option>
                                            <option value="SVD">SVD</option>
                                            <option value="2VD">2VD</option>
                                            <option value="3VD">3VD</option>
                                            <option value="LMD">LMD</option>
                                            <option value="Graft Disease">Graft Disease</option>
                                            <option value="Ectatic/slow flow">Ectatic/slow flow</option>
                                            <option value="Muscle Bridge">Muscle Bridge</option>
                                            <option value="Stent Thrombosis">Stent Thrombosis</option>
                                        </select></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-design-field form-field-list col-1-2" style="display: inline-block;">
                        <div class="content">
                            <div class="title"><span class="required" style="color: red;"> * </span><span
                                    class="title-str"
                                    style="font-size: 15px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Recommendation</span>
                            </div>
                            <div class="wrapper" style="display: block;">
                                <div>
                                    <div><select class="ravesh-dropdown" selected="selected"
                                        name="recommendation"
                                            v-model="form.recommendation"
                                            style="width: 300px; font-size: 15px; color: rgb(0, 0, 0);   font-weight: normal; font-style: unset; background-color: rgb(255, 255, 255); border-style: solid; border-width: 1px; border-radius: 6px;">
                                            <option value="">Please select</option>
                                            <option value="MFU">MFU</option>
                                            <option value="PCI">PCI</option>
                                            <option value="CABG">CABG</option>
                                            <option value="PCI or CABG">PCI or CABG</option>
                                            <option value="MFU or PCI">MFU or PCI</option>
                                            <option value="MFU or CABG">MFU or CABG</option>
                                            <option value="Re-CABG">Re-CABG</option>
                                            <option value="Viability study/Ischemia assessment">Viability study/Ischemia assessment</option>
                                        </select></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-design-section">
        <div style="transition: opacity 300ms;">
            <div class="form-design-section-wrapper style-border"
                style="background-color: transparent; ">
                <div class="form-design-section-head"
                    style="background-color: rgb(249, 249, 249); color: rgb(0, 0, 0); ; font-size: 14px;  font-weight: normal; font-style: unset;">
                    <div class="title">Comment</div>
                </div>
                <div class="form-design-section-content">
                    <div class="form-design-field form-field-multiline col-full" style="display: inline-block;">
                        <div class="content">
                            <div class="title"><span class="required" style="color: red;"> * </span><span
                                    class="title-str"
                                    style="font-size: 15px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Comment</span>
                            </div>
                            <div class="wrapper" style="display: block;">
                                <div>
                                    <div><textarea name="comment" v-model="form.comment" placeholder="" rows="6" maxlength="1000" class="form-input"
                                            style="display: block; width: 100%; height: auto; min-height: 35px; max-height: 600px; font-size: 15px; color: rgb(0, 0, 0);   font-weight: normal; font-style: unset; background-color: rgb(255, 255, 255); border-style: solid; border-width: 1px; border-radius: 6px;"></textarea>
                                        <div style="direction: ltr; padding: 5px 0px 3px; display: none;"></div>
                                        <div style="margin: 10px -5px 5px; display: none;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                </div>
            </div>
            <div class="flex justify-center mt-16">
                <div>
                    <label for="">Openai model</label>
                    <select v-model="form.gpt_model" class="ravesh-dropdown"

                                                            style="width: 150px; font-size: 14px; color: rgb(0, 0, 0); border-color: rgb(225, 225, 225);  font-weight: normal; font-style: unset; background-color: rgb(255, 255, 255); border-style: solid; border-width: 1px; border-radius: 0px;">
  <option value="gpt-4o">gpt-4o</option>

  <option value="gpt-4o-mini">gpt-4o-mini</option>


  <option value="o1">o1</option>

  <option value="o3-mini">o3-mini</option>

  <option value="o1-mini">o1-mini</option>
  <option value="chatgpt-4o-latest">chatgpt-4o-latest</option>
  <option value="gpt-4-turbo">gpt-4-turbo</option>


  <option value="gpt-4">gpt-4</option>

  <option value="gpt-4-32k">gpt-4-32k</option>
  <option value="gpt-3.5-turbo">gpt-3.5-turbo</option>

  <option value="davinci-002">davinci-002</option>
  <option value="babbage-002">babbage-002</option>
</select>
                </div>
            </div>
            <div class="flex  justify-center mt-4">

                <vs-button color="success" @click="() => doReport()" class="mr-3 mb-2" size="large">{{
                    __("Admission")
                }}</vs-button>
            </div>
            <div v-if="prompt && response">
                <h4 style="text-align: center;">
                    <strong>Prompt:</strong>

                </h4>
                <div v-html="formatText(prompt)">

                </div>
                <h4 style="margin-top: 1rem;">
                    <strong>Response:</strong>

                </h4>
                <div v-html="formatText(response)">

                </div>
            </div>
        </vx-card>
    </div>
</template>
<script>
import Table from './Table.vue'
import Voice from './Voice.vue'
import VuePersianDatetimePicker from '@node_modules/vue-persian-datetime-picker'
export default {
    data() {
        return {
            activeTab:0,
            prompt:"",
            response:"",
            form: {
                gpt_model:"o3-mini",
                physician: "",
                date:new Date().toISOString().split('T')[0],
    longLesion: "0",
    thrombus: "0",
    pvd: "0",
    copd: "0",
    diabetic: "0",
    hyperlipidemia: "0",
    hypertension: "0",
    family_history: "0",
    mi_history: "0",
    lvef: "50",
    crcl: "100",
    symptoms: "Asymptomatic",
    dominant: "right-dominant",
    gender: 1,
    email: "",
    name: "",
    age: "",
    smoker: "0",
    bifurcation: "0",
    trifurcation: "0",
    aortoOstialLesion: "0",
    severeTortuosity: "0",
    severeCalcification: "0",
    result:"",
recommendation:"",
comment:"please write coronary angiography detailed report for LM, LAD, D1, D2, LCX, OM1, OM2, RCA, PLV, PDA, RAMUS, for vessel with empty field write normal and without stenosis except RAMUS, write text (at least one line) for each vessel, patient, significant finding, clinical background"
            }
        }
    },
    methods: {
        formatText(text) {
      return text.replace(/\n/g, '<br>');
    },

        async doReport() {
            if(this.activeTab == 0){
                Iracode.loading()
                const form={...this.form,...this.$refs.table.getForm()};
                const {data}=await this.$http.post("/user/api/gpt/report",form)
                Iracode.close_loading()
                this.prompt=data.prompt;
                this.response=data.response;
            }else if(this.activeTab == 2){
                Iracode.loading()
                const form={...this.form,user_description:this.user_description,gpt_model:this.form.gpt_model};
                const {data}=await this.$http.post("/user/api/gpt/report-text",form)
                Iracode.close_loading()
                this.prompt=data.prompt;
                this.response=data.response;
            }

        }
    },
    components:{
        Table,
        Voice,
        datePicker: VuePersianDatetimePicker
    }
}
</script>
<style>
.ravesh-toggle input:checked+.ticon-1 {
    background: #03a9f4;
    color: #fff;
}
</style>
<style>
.recorder-container {
    text-align: center;
    margin-top: 20px;
    padding: 10px;
    box-sizing: border-box;
}

.visualizer-canvas {
    border: 1px solid #000;
    width: 100%;
    height: 100px;
    margin-bottom: 20px;
    background-color: #228B22;
}

.button-container {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 15px;
}

.or-container {
    text-align: center;
    margin: 20px 0;
}

.or-text {
    font-size: 18px;
    font-weight: bold;
    color: #555;
}

.upload-container {
    margin-top: 20px;
}

.upload-label {
    display: block;
    margin: 10px auto;
    text-align: center;
    font-size: 16px;
    font-weight: bold;
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.upload-label:hover {
    background-color: #0056b3;
}

.upload-input {
    display: none;
}

.upload-instructions {
    font-size: 14px;
    color: #555;
    text-align: center;
}

.record-button {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.record-button.start {
    background-color: #28a745;
    color: white;
}

.record-button.stop {
    background-color: #dc3545;
    color: white;
}

.record-button:disabled {
    background-color: #ccc;
    cursor: not-allowed;
}

.record-button:hover:enabled {
    opacity: 0.9;
}

.spinner-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 20px;
}

.spinner {
    width: 50px;
    height: 50px;
    border: 5px solid #ccc;
    border-top: 5px solid #555;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}

.loading-text {
    font-size: 18px;
    font-weight: bold;
    color: #555;
    margin-top: 10px;
}

.description-input {
    width: 100%;
    margin-top: 20px;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    resize: none;
}

.calculate-button {
    margin-top: 15px;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    background-color: #007bff;
    color: white;
    transition: background-color 0.3s ease;
}

.calculate-button:hover {
    background-color: #0056b3;
}

.calculate-button:disabled {
    background-color: #ccc;
    cursor: not-allowed;
}

.transcript-text {
    font-size: 18px;
    font-weight: bold;
    margin-top: 20px;
}

.response-text {
    font-size: 16px;
    margin-top: 10px;
}
.vs-tabs--li button.vs-tabs--btn{

  font-size: 1.5rem !important;
  font-weight: bold !important;
  border-radius: 10px !important;
  padding: 1rem !important;
}
.vs-tabs--li.activeChild button.vs-tabs--btn{
    background: #5a97d0 !important;
    color: #fff !important;
}
.con-ul-tabs button:not(:disabled):hover{
    color: #fff !important;
}
.vs-tabs-position-top .vs-tabs--ul{

  gap: 20px !important;
  justify-content: center !important;
}
.line-vs-tabs{
    display: none !important;
}
</style>
