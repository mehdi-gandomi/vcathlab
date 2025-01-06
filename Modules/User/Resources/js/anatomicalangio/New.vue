<template>
    <div class="mb-base">
        <vx-card :title="__('Patient Information')">
            <template v-slot:actions>
                <vs-button color="primary" to="/computation_center/list" type="filled">{{ __("Back") }}</vs-button>
            </template>
            <form>

                <div class="form-design-page insert-mode">
                    <div class="form-design-page-content">
                        <div class="form-design-section">
                            <div style="transition: opacity 300ms;">
                                <div class="form-design-section-wrapper style-border"
                                    style="background-color: transparent; border-width: 1px; border-color: rgb(238, 238, 238); border-style: solid;">
                                    <div class="form-design-section-head"
                                        style="background-color: rgb(249, 249, 249); color: rgb(0, 0, 0); border-width: 0px 0px 1px; border-color: rgb(238, 238, 238); border-style: solid; font-size: 12px;  font-weight: normal; font-style: unset;">
                                        <div class="title">Information</div>
                                    </div>
                                    <div class="form-design-section-content">
                                        <div class="form-design-field form-field-text col-1-2"
                                            style="display: inline-block;">
                                            <div class="content">
                                                <div class="title"><span class="required" style="color: red;"> *
                                                    </span><span class="title-str"
                                                        style="font-size: 11px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Name</span>
                                                </div>
                                                <div class="wrapper" style="display: block;">
                                                    <div>
                                                        <div><input class="form-input" type="text" name="name"
                                                                v-model="form.name" maxlength="255" placeholder=""
                                                                style="width: 300px; font-size: 11px; color: rgb(0, 0, 0); border-color: rgb(225, 225, 225);  font-weight: normal; font-style: unset; background-color: rgb(255, 255, 255); border-style: solid; border-width: 1px; border-radius: 0px;">
                                                            <div style="margin: 10px -5px 5px; display: none;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-design-field form-field-number col-1-2"
                                            style="display: inline-block;">
                                            <div class="content">
                                                <div class="title"><span class="required" style="color: red;"> *
                                                    </span><span class="title-str"
                                                        style="font-size: 11px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Age</span>
                                                </div>
                                                <div class="wrapper" style="display: block;">
                                                    <div>
                                                        <div><input type="number" placeholder="" name="age"
                                                                v-model="form.age" class="form-input"
                                                                style="width: 300px; font-size: 11px; color: rgb(0, 0, 0); border-color: rgb(225, 225, 225);  font-weight: normal; font-style: unset; background-color: rgb(255, 255, 255); border-style: solid; border-width: 1px; border-radius: 0px;">
                                                            <div style="margin: 10px -5px 5px; display: none;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-design-field form-field-text col-1-2"
                                            style="display: inline-block;">
                                            <div class="content">
                                                <div class="title"><span class="required" style="color: red;"> *
                                                    </span><span class="title-str"
                                                        style="font-size: 11px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Physician</span>
                                                </div>
                                                <div class="wrapper" style="display: block;">
                                                    <div>
                                                        <div><input name="physician" class="form-input"
                                                                v-model="form.physician" type="text" maxlength="255"
                                                                placeholder=""
                                                                style="width: 300px; font-size: 11px; color: rgb(0, 0, 0); border-color: rgb(225, 225, 225);  font-weight: normal; font-style: unset; background-color: rgb(255, 255, 255); border-style: solid; border-width: 1px; border-radius: 0px;">
                                                            <div style="margin: 10px -5px 5px; display: none;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-design-field form-field-toggle col-1-2"
                                            style="display: inline-block;">
                                            <div class="content">
                                                <div class="title"><span class="required" style="color: red;"> *
                                                    </span><span class="title-str"
                                                        style="font-size: 11px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Gender</span>
                                                </div>
                                                <div class="wrapper" style="display: block;">
                                                    <div>
                                                        <div><label class="ravesh-toggle ravesh-toggle-style-1 has-text"
                                                                for="male"><input id="male" type="radio" name="gender"
                                                                    v-model="form.gender" value="1">
                                                                <div class="float-right toggle-on ticon-1"><i></i>
                                                                    <div>Male</div>
                                                                </div>
                                                            </label>
                                                            <label class="ravesh-toggle ravesh-toggle-style-1 has-text"
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
                                        <div class="form-design-field form-field-text col-1-2"
                                            style="display: inline-block;">
                                            <div class="content">
                                                <div class="title"><span class="required" style="color: red;"> *
                                                    </span><span class="title-str"
                                                        style="font-size: 11px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Email</span>
                                                </div>
                                                <div class="wrapper" style="display: block;">
                                                    <div>
                                                        <div><input class="form-input" name="email" v-model="form.email"
                                                                type="text" maxlength="255"
                                                                placeholder="example@gmail.com"
                                                                style="width: 300px; font-size: 11px; color: rgb(0, 0, 0); border-color: rgb(225, 225, 225);  font-weight: normal; font-style: unset; background-color: rgb(255, 255, 255); border-style: solid; border-width: 1px; border-radius: 0px;">
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
                        <div class="form-design-section">
                            <div style="transition: opacity 300ms;">
                                <div class="form-design-section-wrapper style-border"
                                    style="background-color: transparent; border-width: 1px; border-color: rgb(238, 238, 238); border-style: solid;">
                                    <div class="form-design-section-head"
                                        style="background-color: rgb(249, 249, 249); color: rgb(0, 0, 0); border-width: 0px 0px 1px; border-color: rgb(238, 238, 238); border-style: solid; font-size: 12px;  font-weight: normal; font-style: unset;">
                                        <div class="title">Dominant</div>
                                    </div>
                                    <div class="form-design-section-content">
                                        <div class="form-design-field form-field-radio col-full"
                                            style="display: inline-block;">
                                            <div class="content">
                                                <div class="title"><span class="required" style="color: red;"> *
                                                    </span><span class="title-str"
                                                        style="font-size: 11px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Dominant</span>
                                                </div>
                                                <div class="wrapper" style="display: block;">
                                                    <div>
                                                        <div class="style-2">
                                                            <div class="item"><label style="display: block;"
                                                                    class="ravesh-form-control ravesh-form-control-radio type-classic"
                                                                    for="id57ch2oh2it"><input id="id57ch2oh2it"
                                                                        type="radio" name="dominant"
                                                                        v-model="form.dominant" value="right">
                                                                    <div class="cover"><span
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Right
                                                                            dominant</span>
                                                                        <div class="ravesh-form-control-indicator">
                                                                        </div>
                                                                    </div>
                                                                </label></div>
                                                            <div class="item"><label style="display: block;"
                                                                    class="ravesh-form-control ravesh-form-control-radio type-classic"
                                                                    for="idv2cxca3v33"><input id="idv2cxca3v33"
                                                                        type="radio" name="dominant"
                                                                        v-model="form.dominant" value="left">
                                                                    <div class="cover"><span
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Left
                                                                            dominant</span>
                                                                        <div class="ravesh-form-control-indicator">
                                                                        </div>
                                                                    </div>
                                                                </label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-design-field form-field-checkbox col-full"
                                            style="display: inline-block;">
                                            <div class="content">
                                                <div class="title"><span class="required" style="color: red;"> *
                                                    </span><span class="title-str"
                                                        style="font-size: 11px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Condition</span>
                                                </div>
                                                <div class="wrapper" style="display: block;">
                                                    <div>
                                                        <div class="style-2">
                                                            <div class="item"><label style="display: block;"
                                                                    class="ravesh-form-control ravesh-form-control-checkbox type-classic"
                                                                    for="idjhmz0fxx0a"><input id="idjhmz0fxx0a"
                                                                        name="condition[]" v-model="form.condition"
                                                                        type="checkbox" value="Bifurcation">
                                                                    <div class="cover"><span
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Bifurcation</span>
                                                                        <div class="ravesh-form-control-indicator">
                                                                        </div>
                                                                    </div>
                                                                </label></div>
                                                            <div class="item"><label style="display: block;"
                                                                    class="ravesh-form-control ravesh-form-control-checkbox type-classic"
                                                                    for="idgi8o21p5ep"><input id="idgi8o21p5ep"
                                                                        name="condition[]" v-model="form.condition"
                                                                        type="checkbox" value="Trifurcation">
                                                                    <div class="cover"><span
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Trifurcation</span>
                                                                        <div class="ravesh-form-control-indicator">
                                                                        </div>
                                                                    </div>
                                                                </label></div>
                                                            <div class="item"><label style="display: block;"
                                                                    class="ravesh-form-control ravesh-form-control-checkbox type-classic"
                                                                    for="idyrfzg5ic4u"><input id="idyrfzg5ic4u"
                                                                        name="condition[]" v-model="form.condition"
                                                                        type="checkbox" value="Aorto Ostial lesion">
                                                                    <div class="cover"><span
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Aorto
                                                                            Ostial lesion</span>
                                                                        <div class="ravesh-form-control-indicator">
                                                                        </div>
                                                                    </div>
                                                                </label></div>
                                                            <div class="item"><label style="display: block;"
                                                                    class="ravesh-form-control ravesh-form-control-checkbox type-classic"
                                                                    for="idd6m7zw52aj"><input id="idd6m7zw52aj"
                                                                        name="condition[]" v-model="form.condition"
                                                                        type="checkbox" value="Severe Tortuosity">
                                                                    <div class="cover"><span
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Severe
                                                                            Tortuosity</span>
                                                                        <div class="ravesh-form-control-indicator">
                                                                        </div>
                                                                    </div>
                                                                </label></div>
                                                            <div class="item"><label style="display: block;"
                                                                    class="ravesh-form-control ravesh-form-control-checkbox type-classic"
                                                                    for="idrh53jofsk8"><input id="idrh53jofsk8"
                                                                        name="condition[]" v-model="form.condition"
                                                                        type="checkbox" value="Long lesion">
                                                                    <div class="cover"><span
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Long
                                                                            lesion</span>
                                                                        <div class="ravesh-form-control-indicator">
                                                                        </div>
                                                                    </div>
                                                                </label></div>
                                                            <div class="item"><label style="display: block;"
                                                                    class="ravesh-form-control ravesh-form-control-checkbox type-classic"
                                                                    for="id71ah6ripey"><input id="id71ah6ripey"
                                                                        name="condition[]" v-model="form.condition"
                                                                        type="checkbox" value="Calcification">
                                                                    <div class="cover"><span
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Calcification</span>
                                                                        <div class="ravesh-form-control-indicator">
                                                                        </div>
                                                                    </div>
                                                                </label></div>
                                                            <div class="item"><label style="display: block;"
                                                                    class="ravesh-form-control ravesh-form-control-checkbox type-classic"
                                                                    for="idz85rrn95x4"><input id="idz85rrn95x4"
                                                                        name="condition[]" v-model="form.condition"
                                                                        type="checkbox" value="Thrombus">
                                                                    <div class="cover"><span
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Thrombus</span>
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
                                        style="background-color: rgb(249, 249, 249); color: rgb(0, 0, 0); border-width: 0px 0px 1px; border-color: rgb(238, 238, 238); border-style: solid; font-size: 12px;  font-weight: normal; font-style: unset;">
                                        <div class="title">Left Main (LM)</div>
                                    </div>
                                    <div class="form-design-section-content">
                                        <div class="form-design-field form-field-matrix col-full"
                                            style="display: inline-block;">
                                            <div class="content">
                                                <div class="title"><span class="required" style="color: red;"> *
                                                    </span><span class="title-str"
                                                        style="font-size: 11px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Left
                                                        Main (LM)</span></div>
                                                <div class="wrapper" style="display: block;">
                                                    <div>
                                                        <div>
                                                            <table class="border">
                                                                <tbody>
                                                                    <tr>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                        </td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (20%-30%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (30%-40%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (50%-70%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (70%-80%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (80%-90%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (99%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (100%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Muscle</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Diffuse</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Stent</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Long</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            ISR</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="row-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Ostial portion</td>
                                                                        <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;"
                                                                            class=""><label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idrf9tisykyf"><input
                                                                                    id="idrf9tisykyf" name="LM_ostial[]"
                                                                                    v-model="form.LM_ostial"
                                                                                    type="checkbox" value="20_30">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label></td>
                                                                        <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;"
                                                                            class=""><label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="iduijls68pcb"><input
                                                                                    id="iduijls68pcb" name="LM_ostial[]"
                                                                                    v-model="form.LM_ostial"
                                                                                    type="checkbox" value="30_40">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label></td>
                                                                        <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;"
                                                                            class=""><label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id3p4k29xpvz"><input
                                                                                    id="id3p4k29xpvz" name="LM_ostial[]"
                                                                                    v-model="form.LM_ostial"
                                                                                    type="checkbox" value="50_70">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label></td>
                                                                        <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;"
                                                                            class=""><label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id7eohlru7ta"><input
                                                                                    id="id7eohlru7ta" name="LM_ostial[]"
                                                                                    v-model="form.LM_ostial"
                                                                                    type="checkbox" value="70_80">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label></td>
                                                                        <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;"
                                                                            class=""><label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="ide5lx01ba18"><input
                                                                                    id="ide5lx01ba18" name="LM_ostial[]"
                                                                                    v-model="form.LM_ostial"
                                                                                    type="checkbox" value="80_90">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label></td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idiwkp4yoo0y"><input
                                                                                    id="idiwkp4yoo0y" name="LM_ostial[]"
                                                                                    v-model="form.LM_ostial"
                                                                                    type="checkbox" value="99">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idpeyz3whs5e"><input
                                                                                    id="idpeyz3whs5e" name="LM_ostial[]"
                                                                                    v-model="form.LM_ostial"
                                                                                    type="checkbox" value="100">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idq3zb2lmnho"><input
                                                                                    id="idq3zb2lmnho" name="LM_ostial[]"
                                                                                    v-model="form.LM_ostial"
                                                                                    type="checkbox" value="muscle">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id90zxjqcxh9"><input
                                                                                    id="id90zxjqcxh9" name="LM_ostial[]"
                                                                                    v-model="form.LM_ostial"
                                                                                    type="checkbox" value="diffuse">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idngenuj51f8"><input
                                                                                    id="idngenuj51f8" name="LM_ostial[]"
                                                                                    v-model="form.LM_ostial"
                                                                                    type="checkbox" value="stent">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idyhuisv1bwn"><input
                                                                                    id="idyhuisv1bwn" name="LM_ostial[]"
                                                                                    v-model="form.LM_ostial"
                                                                                    type="checkbox" value="long">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idknxhg3yhxl"><input
                                                                                    id="idknxhg3yhxl" name="LM_ostial[]"
                                                                                    v-model="form.LM_ostial"
                                                                                    type="checkbox" value="ISR">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="row-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Proximal portion</td>
                                                                        <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;"
                                                                            class=""><label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idwedmmfunwq"><input
                                                                                    id="idwedmmfunwq"
                                                                                    name="LM_proximal[]"
                                                                                    v-model="form.LM_proximal"
                                                                                    type="checkbox" value="20_30">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label></td>
                                                                        <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;"
                                                                            class=""><label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idj6l5jjuobt"><input
                                                                                    id="idj6l5jjuobt"
                                                                                    name="LM_proximal[]"
                                                                                    v-model="form.LM_proximal"
                                                                                    type="checkbox" value="30_40">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label></td>
                                                                        <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;"
                                                                            class=""><label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id88slcp7tmc"><input
                                                                                    id="id88slcp7tmc"
                                                                                    name="LM_proximal[]"
                                                                                    v-model="form.LM_proximal"
                                                                                    type="checkbox" value="50_70">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label></td>
                                                                        <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;"
                                                                            class=""><label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id6h4kbc7rqe"><input
                                                                                    id="id6h4kbc7rqe"
                                                                                    name="LM_proximal[]"
                                                                                    v-model="form.LM_proximal"
                                                                                    type="checkbox" value="70_80">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label></td>
                                                                        <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;"
                                                                            class=""><label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="ido4hmrcbiit"><input
                                                                                    id="ido4hmrcbiit"
                                                                                    name="LM_proximal[]"
                                                                                    v-model="form.LM_proximal"
                                                                                    type="checkbox" value="80_90">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label></td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idcwrqj70kg1"><input
                                                                                    id="idcwrqj70kg1"
                                                                                    name="LM_proximal[]"
                                                                                    v-model="form.LM_proximal"
                                                                                    type="checkbox" value="99">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idr2ipb01qk"><input
                                                                                    id="idr2ipb01qk"
                                                                                    name="LM_proximal[]"
                                                                                    v-model="form.LM_proximal"
                                                                                    type="checkbox" value="100">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id2uebkysfzd"><input
                                                                                    id="id2uebkysfzd"
                                                                                    name="LM_proximal[]"
                                                                                    v-model="form.LM_proximal"
                                                                                    type="checkbox" value="muscle">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idkfianpezzm"><input
                                                                                    id="idkfianpezzm"
                                                                                    name="LM_proximal[]"
                                                                                    v-model="form.LM_proximal"
                                                                                    type="checkbox" value="diffuse">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idy82tuveoyl"><input
                                                                                    id="idy82tuveoyl"
                                                                                    name="LM_proximal[]"
                                                                                    v-model="form.LM_proximal"
                                                                                    type="checkbox" value="stent">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id466ltkht1t"><input
                                                                                    id="id466ltkht1t"
                                                                                    name="LM_proximal[]"
                                                                                    v-model="form.LM_proximal"
                                                                                    type="checkbox" value="long">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idp5qiwgu0vv"><input
                                                                                    id="idp5qiwgu0vv"
                                                                                    name="LM_proximal[]"
                                                                                    v-model="form.LM_proximal"
                                                                                    type="checkbox" value="ISR">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="row-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Mid portion</td>
                                                                        <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;"
                                                                            class=""><label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id1fwos3nx8f"><input
                                                                                    id="id1fwos3nx8f" name="LM_mid[]"
                                                                                    v-model="form.LM_mid"
                                                                                    type="checkbox" value="20_30">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label></td>
                                                                        <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;"
                                                                            class=""><label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id4nhdukp96q"><input
                                                                                    id="id4nhdukp96q" name="LM_mid[]"
                                                                                    v-model="form.LM_mid"
                                                                                    type="checkbox" value="30_40">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label></td>
                                                                        <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;"
                                                                            class=""><label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idlhft5jk8jl"><input
                                                                                    id="idlhft5jk8jl" name="LM_mid[]"
                                                                                    v-model="form.LM_mid"
                                                                                    type="checkbox" value="50_70">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label></td>
                                                                        <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;"
                                                                            class=""><label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id063zfbe5bg"><input
                                                                                    id="id063zfbe5bg" name="LM_mid[]"
                                                                                    v-model="form.LM_mid"
                                                                                    type="checkbox" value="70_80">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label></td>
                                                                        <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;"
                                                                            class=""><label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="iddxz684goth"><input
                                                                                    id="iddxz684goth" name="LM_mid[]"
                                                                                    v-model="form.LM_mid"
                                                                                    type="checkbox" value="80_90">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label></td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idz4f64g0ih9"><input
                                                                                    id="idz4f64g0ih9" name="LM_mid[]"
                                                                                    v-model="form.LM_mid"
                                                                                    type="checkbox" value="99">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idwt1adco4mt"><input
                                                                                    id="idwt1adco4mt" name="LM_mid[]"
                                                                                    v-model="form.LM_mid"
                                                                                    type="checkbox" value="100">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idckm6fw16ym"><input
                                                                                    id="idckm6fw16ym" name="LM_mid[]"
                                                                                    v-model="form.LM_mid"
                                                                                    type="checkbox" value="muscle">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idjssl0a13ym"><input
                                                                                    id="idjssl0a13ym" name="LM_mid[]"
                                                                                    v-model="form.LM_mid"
                                                                                    type="checkbox" value="diffuse">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id0rrpiclvy7"><input
                                                                                    id="id0rrpiclvy7" name="LM_mid[]"
                                                                                    v-model="form.LM_mid"
                                                                                    type="checkbox" value="stent">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idzwrn61vgc8"><input
                                                                                    id="idzwrn61vgc8" name="LM_mid[]"
                                                                                    v-model="form.LM_mid"
                                                                                    type="checkbox" value="long">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idefparr0vhx"><input
                                                                                    id="idefparr0vhx" name="LM_mid[]"
                                                                                    v-model="form.LM_mid"
                                                                                    type="checkbox" value="ISR">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="row-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Distal portion</td>
                                                                        <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;"
                                                                            class=""><label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idwrpw6js4fd"><input
                                                                                    id="idwrpw6js4fd" name="LM_distal[]"
                                                                                    v-model="form.LM_distal"
                                                                                    type="checkbox" value="20_30">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label></td>
                                                                        <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;"
                                                                            class=""><label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id673r85ft2n"><input
                                                                                    id="id673r85ft2n" name="LM_distal[]"
                                                                                    v-model="form.LM_distal"
                                                                                    type="checkbox" value="30_40">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label></td>
                                                                        <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;"
                                                                            class=""><label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idj1gv6i9fd5"><input
                                                                                    id="idj1gv6i9fd5" name="LM_distal[]"
                                                                                    v-model="form.LM_distal"
                                                                                    type="checkbox" value="50_70">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label></td>
                                                                        <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;"
                                                                            class=""><label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idvb8wsq1uki"><input
                                                                                    id="idvb8wsq1uki" name="LM_distal[]"
                                                                                    v-model="form.LM_distal"
                                                                                    type="checkbox" value="70_80">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label></td>
                                                                        <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;"
                                                                            class=""><label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idj60bq5nsqj"><input
                                                                                    id="idj60bq5nsqj" name="LM_distal[]"
                                                                                    v-model="form.LM_distal"
                                                                                    type="checkbox" value="80_90">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label></td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id8twjj4ycid"><input
                                                                                    id="id8twjj4ycid" name="LM_distal[]"
                                                                                    v-model="form.LM_distal"
                                                                                    type="checkbox" value="99">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id3tyly3mj7d"><input
                                                                                    id="id3tyly3mj7d" name="LM_distal[]"
                                                                                    v-model="form.LM_distal"
                                                                                    type="checkbox" value="100">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id4wo752w2zm"><input
                                                                                    id="id4wo752w2zm" name="LM_distal[]"
                                                                                    v-model="form.LM_distal"
                                                                                    type="checkbox" value="muscle">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idc5v58eb92k"><input
                                                                                    id="idc5v58eb92k" name="LM_distal[]"
                                                                                    v-model="form.LM_distal"
                                                                                    type="checkbox" value="diffuse">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idnq26h5my1s"><input
                                                                                    id="idnq26h5my1s" name="LM_distal[]"
                                                                                    v-model="form.LM_distal"
                                                                                    type="checkbox" value="stent">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id5x58ceekqw"><input
                                                                                    id="id5x58ceekqw" name="LM_distal[]"
                                                                                    v-model="form.LM_distal"
                                                                                    type="checkbox" value="long">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idwfdb3069ya"><input
                                                                                    id="idwfdb3069ya" name="LM_distal[]"
                                                                                    v-model="form.LM_distal"
                                                                                    type="checkbox" value="ISR">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-design-field form-field-multiline col-full"
                                            style="display: inline-block;">
                                            <div class="content">
                                                <div class="title"><span class="required" style="color: red;"> *
                                                    </span><span class="title-str"
                                                        style="font-size: 11px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Left
                                                        Main (LM)</span></div>
                                                <div class="wrapper" style="display: block;">
                                                    <div>
                                                        <div><textarea placeholder="" name="left_main_description"
                                                                v-model="form.left_main_description" rows="2"
                                                                maxlength="1000" class="form-input"
                                                                style="display: block; width: 100%; height: auto; min-height: 35px; max-height: 600px; font-size: 11px; color: rgb(0, 0, 0); border-color: rgb(225, 225, 225);  font-weight: normal; font-style: unset; background-color: rgb(255, 255, 255); border-style: solid; border-width: 1px; border-radius: 0px;"></textarea>
                                                            <div
                                                                style="direction: ltr; padding: 5px 0px 3px; display: none;">
                                                            </div>
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
                        <div class="form-design-section">
                            <div style="transition: opacity 300ms;">
                                <div class="form-design-section-wrapper style-border"
                                    style="background-color: transparent; border-width: 1px; border-color: rgb(238, 238, 238); border-style: solid;">
                                    <div class="form-design-section-head"
                                        style="background-color: rgb(249, 249, 249); color: rgb(0, 0, 0); border-width: 0px 0px 1px; border-color: rgb(238, 238, 238); border-style: solid; font-size: 12px;  font-weight: normal; font-style: unset;">
                                        <div class="title">Left Anterior Descending (LAD)</div>
                                    </div>
                                    <div class="form-design-section-content">
                                        <div class="form-design-field form-field-matrix col-full"
                                            style="display: inline-block;">
                                            <div class="content">
                                                <div class="title"><span class="required" style="color: red;"> *
                                                    </span><span class="title-str"
                                                        style="font-size: 11px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Left
                                                        Anterior Descending (LAD)</span></div>
                                                <div class="wrapper" style="display: block;">
                                                    <div>
                                                        <div>
                                                            <table class="border">
                                                                <tbody>
                                                                    <tr>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                        </td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (20%-30%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (30%-40%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (50%-70%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (70%-80%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (80%-90%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (99%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (100%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Muscle</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Diffuse</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Stent</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Long</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            ISR</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="row-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Ostial portion</td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idfa9rt9m4iq"><input
                                                                                    id="idfa9rt9m4iq"
                                                                                    v-model="form.LAD_ostial"
                                                                                    name="LAD_ostial[]" type="checkbox"
                                                                                    value="20_30">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idsqfc8nugp4"><input
                                                                                    id="idsqfc8nugp4"
                                                                                    v-model="form.LAD_ostial"
                                                                                    name="LAD_ostial[]" type="checkbox"
                                                                                    value="30_40">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idmt10tjl3mi"><input
                                                                                    id="idmt10tjl3mi"
                                                                                    v-model="form.LAD_ostial"
                                                                                    name="LAD_ostial[]" type="checkbox"
                                                                                    value="50_70">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idsr8m1igate"><input
                                                                                    id="idsr8m1igate"
                                                                                    v-model="form.LAD_ostial"
                                                                                    name="LAD_ostial[]" type="checkbox"
                                                                                    value="70_80">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idnx8vsglmzj"><input
                                                                                    id="idnx8vsglmzj"
                                                                                    v-model="form.LAD_ostial"
                                                                                    name="LAD_ostial[]" type="checkbox"
                                                                                    value="80_90">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="iduaqe1ldgzl"><input
                                                                                    id="iduaqe1ldgzl"
                                                                                    v-model="form.LAD_ostial"
                                                                                    name="LAD_ostial[]" type="checkbox"
                                                                                    value="99">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idl2hbl6etrh"><input
                                                                                    id="idl2hbl6etrh"
                                                                                    v-model="form.LAD_ostial"
                                                                                    name="LAD_ostial[]" type="checkbox"
                                                                                    value="100">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id6ezukt7naa"><input
                                                                                    id="id6ezukt7naa"
                                                                                    v-model="form.LAD_ostial"
                                                                                    name="LAD_ostial[]" type="checkbox"
                                                                                    value="muscle">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id4dnq9o1oxc"><input
                                                                                    id="id4dnq9o1oxc"
                                                                                    v-model="form.LAD_ostial"
                                                                                    name="LAD_ostial[]" type="checkbox"
                                                                                    value="diffuse">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idk2aox2gcbz"><input
                                                                                    id="idk2aox2gcbz"
                                                                                    v-model="form.LAD_ostial"
                                                                                    name="LAD_ostial[]" type="checkbox"
                                                                                    value="stent">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id8wqirus58m"><input
                                                                                    id="id8wqirus58m"
                                                                                    v-model="form.LAD_ostial"
                                                                                    name="LAD_ostial[]" type="checkbox"
                                                                                    value="long">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id49bi2f5vda"><input
                                                                                    id="id49bi2f5vda"
                                                                                    v-model="form.LAD_ostial"
                                                                                    name="LAD_ostial[]" type="checkbox"
                                                                                    value="ISR">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="row-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Proximal portion</td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idl54qcbinba"><input
                                                                                    id="idl54qcbinba"
                                                                                    v-model="form.LAD_proximal"
                                                                                    name="LAD_proximal[]"
                                                                                    type="checkbox" value="20_30">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idb89l4usrov"><input
                                                                                    id="idb89l4usrov"
                                                                                    v-model="form.LAD_proximal"
                                                                                    name="LAD_proximal[]"
                                                                                    type="checkbox" value="30_40">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idlku0htt7s4"><input
                                                                                    id="idlku0htt7s4"
                                                                                    v-model="form.LAD_proximal"
                                                                                    name="LAD_proximal[]"
                                                                                    type="checkbox" value="50_70">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id96lr0pn6km"><input
                                                                                    id="id96lr0pn6km"
                                                                                    v-model="form.LAD_proximal"
                                                                                    name="LAD_proximal[]"
                                                                                    type="checkbox" value="70_80">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id9ygbyonczh"><input
                                                                                    id="id9ygbyonczh"
                                                                                    v-model="form.LAD_proximal"
                                                                                    name="LAD_proximal[]"
                                                                                    type="checkbox" value="80_90">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idtanp0l71n"><input
                                                                                    id="idtanp0l71n"
                                                                                    v-model="form.LAD_proximal"
                                                                                    name="LAD_proximal[]"
                                                                                    type="checkbox" value="99">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idixzzmqii02"><input
                                                                                    id="idixzzmqii02"
                                                                                    v-model="form.LAD_proximal"
                                                                                    name="LAD_proximal[]"
                                                                                    type="checkbox" value="100">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idoyr0bhwpnd"><input
                                                                                    id="idoyr0bhwpnd"
                                                                                    v-model="form.LAD_proximal"
                                                                                    name="LAD_proximal[]"
                                                                                    type="checkbox" value="muscle">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id4o0g9z2z4"><input
                                                                                    id="id4o0g9z2z4"
                                                                                    v-model="form.LAD_proximal"
                                                                                    name="LAD_proximal[]"
                                                                                    type="checkbox" value="diffuse">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id9intto3ren"><input
                                                                                    id="id9intto3ren"
                                                                                    v-model="form.LAD_proximal"
                                                                                    name="LAD_proximal[]"
                                                                                    type="checkbox" value="stent">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idp3dq9ld7i6"><input
                                                                                    id="idp3dq9ld7i6"
                                                                                    v-model="form.LAD_proximal"
                                                                                    name="LAD_proximal[]"
                                                                                    type="checkbox" value="long">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id77ztgihftx"><input
                                                                                    id="id77ztgihftx"
                                                                                    v-model="form.LAD_proximal"
                                                                                    name="LAD_proximal[]"
                                                                                    type="checkbox" value="ISR">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="row-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Mid portion</td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id3xbvcwdg89"><input
                                                                                    id="id3xbvcwdg89"
                                                                                    v-model="form.LAD_mid"
                                                                                    name="LAD_mid[]" type="checkbox"
                                                                                    value="20_30">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id2l9743n0lm"><input
                                                                                    id="id2l9743n0lm"
                                                                                    v-model="form.LAD_mid"
                                                                                    name="LAD_mid[]" type="checkbox"
                                                                                    value="30_40">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id2oq3v6jy35"><input
                                                                                    id="id2oq3v6jy35"
                                                                                    v-model="form.LAD_mid"
                                                                                    name="LAD_mid[]" type="checkbox"
                                                                                    value="50_70">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id09sdxl96if"><input
                                                                                    id="id09sdxl96if"
                                                                                    v-model="form.LAD_mid"
                                                                                    name="LAD_mid[]" type="checkbox"
                                                                                    value="70_80">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idkx60qzdb55"><input
                                                                                    id="idkx60qzdb55"
                                                                                    v-model="form.LAD_mid"
                                                                                    name="LAD_mid[]" type="checkbox"
                                                                                    value="80_90">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id756dhqkj7g"><input
                                                                                    id="id756dhqkj7g"
                                                                                    v-model="form.LAD_mid"
                                                                                    name="LAD_mid[]" type="checkbox"
                                                                                    value="99">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idzv0f2dqy1c"><input
                                                                                    id="idzv0f2dqy1c"
                                                                                    v-model="form.LAD_mid"
                                                                                    name="LAD_mid[]" type="checkbox"
                                                                                    value="100">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idybt6jwe8zu"><input
                                                                                    id="idybt6jwe8zu"
                                                                                    v-model="form.LAD_mid"
                                                                                    name="LAD_mid[]" type="checkbox"
                                                                                    value="muscle">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id8wjixvxyt2"><input
                                                                                    id="id8wjixvxyt2"
                                                                                    v-model="form.LAD_mid"
                                                                                    name="LAD_mid[]" type="checkbox"
                                                                                    value="diffuse">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id541gptfsp1"><input
                                                                                    id="id541gptfsp1"
                                                                                    v-model="form.LAD_mid"
                                                                                    name="LAD_mid[]" type="checkbox"
                                                                                    value="stent">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="ido0k8bwksww"><input
                                                                                    id="ido0k8bwksww"
                                                                                    v-model="form.LAD_mid"
                                                                                    name="LAD_mid[]" type="checkbox"
                                                                                    value="long">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id19l4xrvea6"><input
                                                                                    id="id19l4xrvea6"
                                                                                    v-model="form.LAD_mid"
                                                                                    name="LAD_mid[]" type="checkbox"
                                                                                    value="ISR">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="row-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Distal portion</td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id8ulul0fqcf"><input
                                                                                    id="id8ulul0fqcf"
                                                                                    v-model="form.LAD_distal"
                                                                                    name="LAD_distal[]" type="checkbox"
                                                                                    value="20_30">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idp9wpq4svz"><input
                                                                                    id="idp9wpq4svz"
                                                                                    v-model="form.LAD_distal"
                                                                                    name="LAD_distal[]" type="checkbox"
                                                                                    value="30_40">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idsku3noyazq"><input
                                                                                    id="idsku3noyazq"
                                                                                    v-model="form.LAD_distal"
                                                                                    name="LAD_distal[]" type="checkbox"
                                                                                    value="50_70">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="ids7toa3aeir"><input
                                                                                    id="ids7toa3aeir"
                                                                                    v-model="form.LAD_distal"
                                                                                    name="LAD_distal[]" type="checkbox"
                                                                                    value="70_80">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id54jch5r6au"><input
                                                                                    id="id54jch5r6au"
                                                                                    v-model="form.LAD_distal"
                                                                                    name="LAD_distal[]" type="checkbox"
                                                                                    value="80_90">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idz5297evse9"><input
                                                                                    id="idz5297evse9"
                                                                                    v-model="form.LAD_distal"
                                                                                    name="LAD_distal[]" type="checkbox"
                                                                                    value="99">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idae66ncum2l"><input
                                                                                    id="idae66ncum2l"
                                                                                    v-model="form.LAD_distal"
                                                                                    name="LAD_distal[]" type="checkbox"
                                                                                    value="100">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idqg51bu5wy7"><input
                                                                                    id="idqg51bu5wy7"
                                                                                    v-model="form.LAD_distal"
                                                                                    name="LAD_distal[]" type="checkbox"
                                                                                    value="muscle">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idhuumz6cgr3"><input
                                                                                    id="idhuumz6cgr3"
                                                                                    v-model="form.LAD_distal"
                                                                                    name="LAD_distal[]" type="checkbox"
                                                                                    value="diffuse">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idyv88ei4s7b"><input
                                                                                    id="idyv88ei4s7b"
                                                                                    v-model="form.LAD_distal"
                                                                                    name="LAD_distal[]" type="checkbox"
                                                                                    value="stent">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id087k7ldywz"><input
                                                                                    id="id087k7ldywz"
                                                                                    v-model="form.LAD_distal"
                                                                                    name="LAD_distal[]" type="checkbox"
                                                                                    value="long">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id1g8rqdfsxv"><input
                                                                                    id="id1g8rqdfsxv"
                                                                                    v-model="form.LAD_distal"
                                                                                    name="LAD_distal[]" type="checkbox"
                                                                                    value="ISR">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-design-field form-field-multiline col-full"
                                            style="display: inline-block;">
                                            <div class="content">
                                                <div class="title"><span class="required" style="color: red;"> *
                                                    </span><span class="title-str"
                                                        style="font-size: 11px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Left
                                                        Anterior Descending (LAD)</span></div>
                                                <div class="wrapper" style="display: block;">
                                                    <div>
                                                        <div><textarea placeholder="" rows="2" maxlength="1000"
                                                                class="form-input"
                                                                v-model="form.left_anterior_descending_description"
                                                                style="display: block; width: 100%; height: auto; min-height: 35px; max-height: 600px; font-size: 11px; color: rgb(0, 0, 0); border-color: rgb(225, 225, 225);  font-weight: normal; font-style: unset; background-color: rgb(255, 255, 255); border-style: solid; border-width: 1px; border-radius: 0px;"></textarea>
                                                            <div
                                                                style="direction: ltr; padding: 5px 0px 3px; display: none;">
                                                            </div>
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
                        <div class="form-design-section">
                            <div style="transition: opacity 300ms;">
                                <div class="form-design-section-wrapper style-border"
                                    style="background-color: transparent; border-width: 1px; border-color: rgb(238, 238, 238); border-style: solid;">
                                    <div class="form-design-section-head"
                                        style="background-color: rgb(249, 249, 249); color: rgb(0, 0, 0); border-width: 0px 0px 1px; border-color: rgb(238, 238, 238); border-style: solid; font-size: 12px;  font-weight: normal; font-style: unset;">
                                        <div class="title">Diagonal.1</div>
                                    </div>
                                    <div class="form-design-section-content">
                                        <div class="form-design-field form-field-matrix col-full"
                                            style="display: inline-block;">
                                            <div class="content">
                                                <div class="title"><span class="required" style="color: red;"> *
                                                    </span><span class="title-str"
                                                        style="font-size: 11px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Diagonal.1</span>
                                                </div>
                                                <div class="wrapper" style="display: block;">
                                                    <div>
                                                        <div>
                                                            <table class="border">
                                                                <tbody>
                                                                    <tr>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                        </td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (20%-30%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (30%-40%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (50%-70%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (70%-80%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (80%-90%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (99%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (100%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Muscle</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Diffuse</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Stent</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Long</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            ISR</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="row-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Ostial portion</td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idryv4m787di"><input
                                                                                    id="idryv4m787di"
                                                                                    v-model="form.Diagonal1_ostial"
                                                                                    name="Diagonal1_ostial[]"
                                                                                    type="checkbox" value="20_30">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idevnfvfj36b"><input
                                                                                    id="idevnfvfj36b"
                                                                                    v-model="form.Diagonal1_ostial"
                                                                                    name="Diagonal1_ostial[]"
                                                                                    type="checkbox" value="30_40">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idelcnbaqqno"><input
                                                                                    id="idelcnbaqqno"
                                                                                    v-model="form.Diagonal1_ostial"
                                                                                    name="Diagonal1_ostial[]"
                                                                                    type="checkbox" value="50_70">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idg9vbfe5wa5"><input
                                                                                    id="idg9vbfe5wa5"
                                                                                    v-model="form.Diagonal1_ostial"
                                                                                    name="Diagonal1_ostial[]"
                                                                                    type="checkbox" value="70_80">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idxgo7a39qwr"><input
                                                                                    id="idxgo7a39qwr"
                                                                                    v-model="form.Diagonal1_ostial"
                                                                                    name="Diagonal1_ostial[]"
                                                                                    type="checkbox" value="80_90">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id4nyyprkfzy"><input
                                                                                    id="id4nyyprkfzy"
                                                                                    v-model="form.Diagonal1_ostial"
                                                                                    name="Diagonal1_ostial[]"
                                                                                    type="checkbox" value="99">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idbmutd983e9"><input
                                                                                    id="idbmutd983e9"
                                                                                    v-model="form.Diagonal1_ostial"
                                                                                    name="Diagonal1_ostial[]"
                                                                                    type="checkbox" value="100">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id0887d049py"><input
                                                                                    id="id0887d049py"
                                                                                    v-model="form.Diagonal1_ostial"
                                                                                    name="Diagonal1_ostial[]"
                                                                                    type="checkbox" value="muscle">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id3p2pmyb8gs"><input
                                                                                    id="id3p2pmyb8gs"
                                                                                    v-model="form.Diagonal1_ostial"
                                                                                    name="Diagonal1_ostial[]"
                                                                                    type="checkbox" value="diffuse">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idqrddjbq9yf"><input
                                                                                    id="idqrddjbq9yf"
                                                                                    v-model="form.Diagonal1_ostial"
                                                                                    name="Diagonal1_ostial[]"
                                                                                    type="checkbox" value="stent">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id1tsvoykeg3"><input
                                                                                    id="id1tsvoykeg3"
                                                                                    v-model="form.Diagonal1_ostial"
                                                                                    name="Diagonal1_ostial[]"
                                                                                    type="checkbox" value="long">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idk8acwfys7p"><input
                                                                                    id="idk8acwfys7p"
                                                                                    v-model="form.Diagonal1_ostial"
                                                                                    name="Diagonal1_ostial[]"
                                                                                    type="checkbox" value="ISR">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="row-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Proximal portion</td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idz7ly7btz8p"><input
                                                                                    id="idz7ly7btz8p"
                                                                                    v-model="form.Diagonal1_proximal"
                                                                                    name="Diagonal1_proximal[]"
                                                                                    type="checkbox" value="20_30">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idr2faqwm926"><input
                                                                                    id="idr2faqwm926"
                                                                                    v-model="form.Diagonal1_proximal"
                                                                                    name="Diagonal1_proximal[]"
                                                                                    type="checkbox" value="30_40">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id9h9cl929om"><input
                                                                                    id="id9h9cl929om"
                                                                                    v-model="form.Diagonal1_proximal"
                                                                                    name="Diagonal1_proximal[]"
                                                                                    type="checkbox" value="50_70">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idgyhbp4s6ey"><input
                                                                                    id="idgyhbp4s6ey"
                                                                                    v-model="form.Diagonal1_proximal"
                                                                                    name="Diagonal1_proximal[]"
                                                                                    type="checkbox" value="70_80">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="iddse875kj88"><input
                                                                                    id="iddse875kj88"
                                                                                    v-model="form.Diagonal1_proximal"
                                                                                    name="Diagonal1_proximal[]"
                                                                                    type="checkbox" value="80_90">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idm4b23auf15"><input
                                                                                    id="idm4b23auf15"
                                                                                    v-model="form.Diagonal1_proximal"
                                                                                    name="Diagonal1_proximal[]"
                                                                                    type="checkbox" value="99">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id7l8u8dq7a4"><input
                                                                                    id="id7l8u8dq7a4"
                                                                                    v-model="form.Diagonal1_proximal"
                                                                                    name="Diagonal1_proximal[]"
                                                                                    type="checkbox" value="100">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id4aigldwtqc"><input
                                                                                    id="id4aigldwtqc"
                                                                                    v-model="form.Diagonal1_proximal"
                                                                                    name="Diagonal1_proximal[]"
                                                                                    type="checkbox" value="muscle">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id1t0o74orbt"><input
                                                                                    id="id1t0o74orbt"
                                                                                    v-model="form.Diagonal1_proximal"
                                                                                    name="Diagonal1_proximal[]"
                                                                                    type="checkbox" value="diffuse">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id3twge9b5h3"><input
                                                                                    id="id3twge9b5h3"
                                                                                    v-model="form.Diagonal1_proximal"
                                                                                    name="Diagonal1_proximal[]"
                                                                                    type="checkbox" value="stent">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idyn2fdx2v8g"><input
                                                                                    id="idyn2fdx2v8g"
                                                                                    v-model="form.Diagonal1_proximal"
                                                                                    name="Diagonal1_proximal[]"
                                                                                    type="checkbox" value="long">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idqs84usoy9d"><input
                                                                                    id="idqs84usoy9d"
                                                                                    v-model="form.Diagonal1_proximal"
                                                                                    name="Diagonal1_proximal[]"
                                                                                    type="checkbox" value="ISR">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="row-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Mid portion</td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id7pqo8vi0qw"><input
                                                                                    id="id7pqo8vi0qw"
                                                                                    name="Diagonal1_mid[]"
                                                                                    v-model="form.Diagonal1_mid"
                                                                                    type="checkbox" value="20_30">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idbak4nymae7"><input
                                                                                    id="idbak4nymae7"
                                                                                    name="Diagonal1_mid[]"
                                                                                    v-model="form.Diagonal1_mid"
                                                                                    type="checkbox" value="30_40">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id0ft764dh68"><input
                                                                                    id="id0ft764dh68"
                                                                                    name="Diagonal1_mid[]"
                                                                                    v-model="form.Diagonal1_mid"
                                                                                    type="checkbox" value="50_70">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idrbgyfchj80"><input
                                                                                    id="idrbgyfchj80"
                                                                                    name="Diagonal1_mid[]"
                                                                                    v-model="form.Diagonal1_mid"
                                                                                    type="checkbox" value="70_80">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idz0bro2omvp"><input
                                                                                    id="idz0bro2omvp"
                                                                                    name="Diagonal1_mid[]"
                                                                                    v-model="form.Diagonal1_mid"
                                                                                    type="checkbox" value="80_90">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id097gibbg59"><input
                                                                                    id="id097gibbg59"
                                                                                    name="Diagonal1_mid[]"
                                                                                    v-model="form.Diagonal1_mid"
                                                                                    type="checkbox" value="99">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idyy0rpjppea"><input
                                                                                    id="idyy0rpjppea"
                                                                                    name="Diagonal1_mid[]"
                                                                                    v-model="form.Diagonal1_mid"
                                                                                    type="checkbox" value="100">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idpbp1sxu5jn"><input
                                                                                    id="idpbp1sxu5jn"
                                                                                    name="Diagonal1_mid[]"
                                                                                    v-model="form.Diagonal1_mid"
                                                                                    type="checkbox" value="muscle">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idlrw7bqghbh"><input
                                                                                    id="idlrw7bqghbh"
                                                                                    name="Diagonal1_mid[]"
                                                                                    v-model="form.Diagonal1_mid"
                                                                                    type="checkbox" value="diffuse">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idlyequt0p9x"><input
                                                                                    id="idlyequt0p9x"
                                                                                    name="Diagonal1_mid[]"
                                                                                    v-model="form.Diagonal1_mid"
                                                                                    type="checkbox" value="stent">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idb2c804sdi3"><input
                                                                                    id="idb2c804sdi3"
                                                                                    name="Diagonal1_mid[]"
                                                                                    v-model="form.Diagonal1_mid"
                                                                                    type="checkbox" value="long">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id3nho7qmm2i"><input
                                                                                    id="id3nho7qmm2i"
                                                                                    name="Diagonal1_mid[]"
                                                                                    v-model="form.Diagonal1_mid"
                                                                                    type="checkbox" value="ISR">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="row-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Distal portion</td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="iddmuu7pg569"><input
                                                                                    id="iddmuu7pg569"
                                                                                    name="Diagonal1_distal[]"
                                                                                    v-model="form.Diagonal1_distal"
                                                                                    type="checkbox" value="20_30">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id7nxmrt8im6"><input
                                                                                    id="id7nxmrt8im6"
                                                                                    name="Diagonal1_distal[]"
                                                                                    v-model="form.Diagonal1_distal"
                                                                                    type="checkbox" value="30_40">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="ideusulztb37"><input
                                                                                    id="ideusulztb37"
                                                                                    name="Diagonal1_distal[]"
                                                                                    v-model="form.Diagonal1_distal"
                                                                                    type="checkbox" value="50_70">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idd2xjcmeayk"><input
                                                                                    id="idd2xjcmeayk"
                                                                                    name="Diagonal1_distal[]"
                                                                                    v-model="form.Diagonal1_distal"
                                                                                    type="checkbox" value="70_80">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idll1kf6mnqm"><input
                                                                                    id="idll1kf6mnqm"
                                                                                    name="Diagonal1_distal[]"
                                                                                    v-model="form.Diagonal1_distal"
                                                                                    type="checkbox" value="80_90">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idej4qx2a8h4"><input
                                                                                    id="idej4qx2a8h4"
                                                                                    name="Diagonal1_distal[]"
                                                                                    v-model="form.Diagonal1_distal"
                                                                                    type="checkbox" value="99">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idtmvu1tw4ql"><input
                                                                                    id="idtmvu1tw4ql"
                                                                                    name="Diagonal1_distal[]"
                                                                                    v-model="form.Diagonal1_distal"
                                                                                    type="checkbox" value="100">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idplntb6gsvp"><input
                                                                                    id="idplntb6gsvp"
                                                                                    name="Diagonal1_distal[]"
                                                                                    v-model="form.Diagonal1_distal"
                                                                                    type="checkbox" value="muscle">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idyzayubph3r"><input
                                                                                    id="idyzayubph3r"
                                                                                    name="Diagonal1_distal[]"
                                                                                    v-model="form.Diagonal1_distal"
                                                                                    type="checkbox" value="diffuse">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idqli8dpihhs"><input
                                                                                    id="idqli8dpihhs"
                                                                                    name="Diagonal1_distal[]"
                                                                                    v-model="form.Diagonal1_distal"
                                                                                    type="checkbox" value="stent">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="iduzos4xmann"><input
                                                                                    id="iduzos4xmann"
                                                                                    name="Diagonal1_distal[]"
                                                                                    v-model="form.Diagonal1_distal"
                                                                                    type="checkbox" value="long">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idj1ku3h3ze1"><input
                                                                                    id="idj1ku3h3ze1"
                                                                                    name="Diagonal1_distal[]"
                                                                                    v-model="form.Diagonal1_distal"
                                                                                    type="checkbox" value="ISR">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-design-field form-field-multiline col-full"
                                            style="display: inline-block;">
                                            <div class="content">
                                                <div class="title"><span class="required" style="color: red;"> *
                                                    </span><span class="title-str"
                                                        style="font-size: 11px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Diagonal.1</span>
                                                </div>
                                                <div class="wrapper" style="display: block;">
                                                    <div>
                                                        <div><textarea v-model="form.diagonal1_description"
                                                                placeholder="" rows="2" maxlength="1000"
                                                                class="form-input"
                                                                style="display: block; width: 100%; height: auto; min-height: 35px; max-height: 600px; font-size: 11px; color: rgb(0, 0, 0); border-color: rgb(225, 225, 225);  font-weight: normal; font-style: unset; background-color: rgb(255, 255, 255); border-style: solid; border-width: 1px; border-radius: 0px;"></textarea>
                                                            <div
                                                                style="direction: ltr; padding: 5px 0px 3px; display: none;">
                                                            </div>
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
                        <div class="form-design-section">
                            <div style="transition: opacity 300ms;">
                                <div class="form-design-section-wrapper style-border"
                                    style="background-color: transparent; border-width: 1px; border-color: rgb(238, 238, 238); border-style: solid;">
                                    <div class="form-design-section-head"
                                        style="background-color: rgb(249, 249, 249); color: rgb(0, 0, 0); border-width: 0px 0px 1px; border-color: rgb(238, 238, 238); border-style: solid; font-size: 12px;  font-weight: normal; font-style: unset;">
                                        <div class="title">Diagonal.2</div>
                                    </div>
                                    <div class="form-design-section-content">
                                        <div class="form-design-field form-field-matrix col-full"
                                            style="display: inline-block;">
                                            <div class="content">
                                                <div class="title"><span class="required" style="color: red;"> *
                                                    </span><span class="title-str"
                                                        style="font-size: 11px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Diagonal.2</span>
                                                </div>
                                                <div class="wrapper" style="display: block;">
                                                    <div>
                                                        <div>
                                                            <table class="border">
                                                                <tbody>
                                                                    <tr>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                        </td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (20%-30%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (30%-40%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (50%-70%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (70%-80%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (80%-90%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (99%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (100%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Muscle</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Diffuse</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Stent</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Long</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            ISR</td>
                                                                    </tr>
                                                                    <tr>
    <td class="row-title" style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        Ostial portion</td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_ostial_20_30">
            <input id="diagonal2_ostial_20_30" v-model="form.Diagonal2_ostial" name="Diagonal2_ostial[]" type="checkbox" value="20_30">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_ostial_30_40">
            <input id="diagonal2_ostial_30_40" v-model="form.Diagonal2_ostial" name="Diagonal2_ostial[]" type="checkbox" value="30_40">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_ostial_50_70">
            <input id="diagonal2_ostial_50_70" v-model="form.Diagonal2_ostial" name="Diagonal2_ostial[]" type="checkbox" value="50_70">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_ostial_70_80">
            <input id="diagonal2_ostial_70_80" v-model="form.Diagonal2_ostial" name="Diagonal2_ostial[]" type="checkbox" value="70_80">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_ostial_80_90">
            <input id="diagonal2_ostial_80_90" v-model="form.Diagonal2_ostial" name="Diagonal2_ostial[]" type="checkbox" value="80_90">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_ostial_99">
            <input id="diagonal2_ostial_99" v-model="form.Diagonal2_ostial" name="Diagonal2_ostial[]" type="checkbox" value="99">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_ostial_100">
            <input id="diagonal2_ostial_100" v-model="form.Diagonal2_ostial" name="Diagonal2_ostial[]" type="checkbox" value="100">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_ostial_muscle">
            <input id="diagonal2_ostial_muscle" v-model="form.Diagonal2_ostial" name="Diagonal2_ostial[]" type="checkbox" value="muscle">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_ostial_diffuse">
            <input id="diagonal2_ostial_diffuse" v-model="form.Diagonal2_ostial" name="Diagonal2_ostial[]" type="checkbox" value="diffuse">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_ostial_stent">
            <input id="diagonal2_ostial_stent" v-model="form.Diagonal2_ostial" name="Diagonal2_ostial[]" type="checkbox" value="stent">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_ostial_long">
            <input id="diagonal2_ostial_long" v-model="form.Diagonal2_ostial" name="Diagonal2_ostial[]" type="checkbox" value="long">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_ostial_isr">
            <input id="diagonal2_ostial_isr" v-model="form.Diagonal2_ostial" name="Diagonal2_ostial[]" type="checkbox" value="ISR">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
</tr>
<tr>
    <td class="row-title" style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        Proximal portion</td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_proximal_20_30">
            <input id="diagonal2_proximal_20_30" v-model="form.Diagonal2_proximal" name="Diagonal2_proximal[]" type="checkbox" value="20_30">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_proximal_30_40">
            <input id="diagonal2_proximal_30_40" v-model="form.Diagonal2_proximal" name="Diagonal2_proximal[]" type="checkbox" value="30_40">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_proximal_50_70">
            <input id="diagonal2_proximal_50_70" v-model="form.Diagonal2_proximal" name="Diagonal2_proximal[]" type="checkbox" value="50_70">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_proximal_70_80">
            <input id="diagonal2_proximal_70_80" v-model="form.Diagonal2_proximal" name="Diagonal2_proximal[]" type="checkbox" value="70_80">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_proximal_80_90">
            <input id="diagonal2_proximal_80_90" v-model="form.Diagonal2_proximal" name="Diagonal2_proximal[]" type="checkbox" value="80_90">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_proximal_99">
            <input id="diagonal2_proximal_99" v-model="form.Diagonal2_proximal" name="Diagonal2_proximal[]" type="checkbox" value="99">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_proximal_100">
            <input id="diagonal2_proximal_100" v-model="form.Diagonal2_proximal" name="Diagonal2_proximal[]" type="checkbox" value="100">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_proximal_muscle">
            <input id="diagonal2_proximal_muscle" v-model="form.Diagonal2_proximal" name="Diagonal2_proximal[]" type="checkbox" value="muscle">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_proximal_diffuse">
            <input id="diagonal2_proximal_diffuse" v-model="form.Diagonal2_proximal" name="Diagonal2_proximal[]" type="checkbox" value="diffuse">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_proximal_stent">
            <input id="diagonal2_proximal_stent" v-model="form.Diagonal2_proximal" name="Diagonal2_proximal[]" type="checkbox" value="stent">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_proximal_long">
            <input id="diagonal2_proximal_long" v-model="form.Diagonal2_proximal" name="Diagonal2_proximal[]" type="checkbox" value="long">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_proximal_isr">
            <input id="diagonal2_proximal_isr" v-model="form.Diagonal2_proximal" name="Diagonal2_proximal[]" type="checkbox" value="ISR">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
</tr>
<tr>
    <td class="row-title" style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        Mid portion</td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_mid_20_30">
            <input id="diagonal2_mid_20_30" name="Diagonal2_mid[]" v-model="form.Diagonal2_mid" type="checkbox" value="20_30">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_mid_30_40">
            <input id="diagonal2_mid_30_40" name="Diagonal2_mid[]" v-model="form.Diagonal2_mid" type="checkbox" value="30_40">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_mid_50_70">
            <input id="diagonal2_mid_50_70" name="Diagonal2_mid[]" v-model="form.Diagonal2_mid" type="checkbox" value="50_70">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_mid_70_80">
            <input id="diagonal2_mid_70_80" name="Diagonal2_mid[]" v-model="form.Diagonal2_mid" type="checkbox" value="70_80">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_mid_80_90">
            <input id="diagonal2_mid_80_90" name="Diagonal2_mid[]" v-model="form.Diagonal2_mid" type="checkbox" value="80_90">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_mid_99">
            <input id="diagonal2_mid_99" name="Diagonal2_mid[]" v-model="form.Diagonal2_mid" type="checkbox" value="99">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_mid_100">
            <input id="diagonal2_mid_100" name="Diagonal2_mid[]" v-model="form.Diagonal2_mid" type="checkbox" value="100">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_mid_muscle">
            <input id="diagonal2_mid_muscle" name="Diagonal2_mid[]" v-model="form.Diagonal2_mid" type="checkbox" value="muscle">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_mid_diffuse">
            <input id="diagonal2_mid_diffuse" name="Diagonal2_mid[]" v-model="form.Diagonal2_mid" type="checkbox" value="diffuse">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_mid_stent">
            <input id="diagonal2_mid_stent" name="Diagonal2_mid[]" v-model="form.Diagonal2_mid" type="checkbox" value="stent">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_mid_long">
            <input id="diagonal2_mid_long" name="Diagonal2_mid[]" v-model="form.Diagonal2_mid" type="checkbox" value="long">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_mid_isr">
            <input id="diagonal2_mid_isr" name="Diagonal2_mid[]" v-model="form.Diagonal2_mid" type="checkbox" value="ISR">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
</tr>
<tr>
    <td class="row-title" style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        Distal portion</td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_distal_20_30">
            <input id="diagonal2_distal_20_30" name="Diagonal2_distal[]" v-model="form.Diagonal2_distal" type="checkbox" value="20_30">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_distal_30_40">
            <input id="diagonal2_distal_30_40" name="Diagonal2_distal[]" v-model="form.Diagonal2_distal" type="checkbox" value="30_40">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_distal_50_70">
            <input id="diagonal2_distal_50_70" name="Diagonal2_distal[]" v-model="form.Diagonal2_distal" type="checkbox" value="50_70">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_distal_70_80">
            <input id="diagonal2_distal_70_80" name="Diagonal2_distal[]" v-model="form.Diagonal2_distal" type="checkbox" value="70_80">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_distal_80_90">
            <input id="diagonal2_distal_80_90" name="Diagonal2_distal[]" v-model="form.Diagonal2_distal" type="checkbox" value="80_90">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_distal_99">
            <input id="diagonal2_distal_99" name="Diagonal2_distal[]" v-model="form.Diagonal2_distal" type="checkbox" value="99">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_distal_100">
            <input id="diagonal2_distal_100" name="Diagonal2_distal[]" v-model="form.Diagonal2_distal" type="checkbox" value="100">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_distal_muscle">
            <input id="diagonal2_distal_muscle" name="Diagonal2_distal[]" v-model="form.Diagonal2_distal" type="checkbox" value="muscle">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_distal_diffuse">
            <input id="diagonal2_distal_diffuse" name="Diagonal2_distal[]" v-model="form.Diagonal2_distal" type="checkbox" value="diffuse">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_distal_stent">
            <input id="diagonal2_distal_stent" name="Diagonal2_distal[]" v-model="form.Diagonal2_distal" type="checkbox" value="stent">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_distal_long">
            <input id="diagonal2_distal_long" name="Diagonal2_distal[]" v-model="form.Diagonal2_distal" type="checkbox" value="long">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="diagonal2_distal_isr">
            <input id="diagonal2_distal_isr" name="Diagonal2_distal[]" v-model="form.Diagonal2_distal" type="checkbox" value="ISR">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
</tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-design-field form-field-multiline col-full"
                                            style="display: inline-block;">
                                            <div class="content">
                                                <div class="title"><span class="required" style="color: red;"> *
                                                    </span><span class="title-str"
                                                        style="font-size: 11px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Diagonal.2</span>
                                                </div>
                                                <div class="wrapper" style="display: block;">
                                                    <div>
                                                        <div><textarea v-model="form.diagonal2_description"
                                                                placeholder="" rows="2" maxlength="1000"
                                                                class="form-input"
                                                                style="display: block; width: 100%; height: auto; min-height: 35px; max-height: 600px; font-size: 11px; color: rgb(0, 0, 0); border-color: rgb(225, 225, 225);  font-weight: normal; font-style: unset; background-color: rgb(255, 255, 255); border-style: solid; border-width: 1px; border-radius: 0px;"></textarea>
                                                            <div
                                                                style="direction: ltr; padding: 5px 0px 3px; display: none;">
                                                            </div>
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
                        <div class="form-design-section">
                            <div style="transition: opacity 300ms;">
                                <div class="form-design-section-wrapper style-border"
                                    style="background-color: transparent; border-width: 1px; border-color: rgb(238, 238, 238); border-style: solid;">
                                    <div class="form-design-section-head"
                                        style="background-color: rgb(249, 249, 249); color: rgb(0, 0, 0); border-width: 0px 0px 1px; border-color: rgb(238, 238, 238); border-style: solid; font-size: 12px;  font-weight: normal; font-style: unset;">
                                        <div class="title">Left Circumfles (LCX)</div>
                                    </div>
                                    <div class="form-design-section-content">
                                        <div class="form-design-field form-field-matrix col-full"
                                            style="display: inline-block;">
                                            <div class="content">
                                                <div class="title"><span class="required" style="color: red;"> *
                                                    </span><span class="title-str"
                                                        style="font-size: 11px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Left
                                                        Circumfles (LCX)</span>
                                                </div>
                                                <div class="wrapper" style="display: block;">
                                                    <div>
                                                        <div>
                                                            <table class="border">
                                                                <tbody>
                                                                    <tr>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                        </td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (20%-30%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (30%-40%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (50%-70%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (70%-80%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (80%-90%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (99%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (100%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Muscle</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Diffuse</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Stent</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Long</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            ISR</td>
                                                                    </tr>
                                                                    <tr>
    <td class="row-title" style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        Ostial portion</td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="lcx_ostial_20_30">
            <input id="lcx_ostial_20_30" v-model="form.lcx_ostial" name="lcx_ostial[]" type="checkbox" value="20_30">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="lcx_ostial_30_40">
            <input id="lcx_ostial_30_40" v-model="form.lcx_ostial" name="lcx_ostial[]" type="checkbox" value="30_40">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="lcx_ostial_50_70">
            <input id="lcx_ostial_50_70" v-model="form.lcx_ostial" name="lcx_ostial[]" type="checkbox" value="50_70">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="lcx_ostial_70_80">
            <input id="lcx_ostial_70_80" v-model="form.lcx_ostial" name="lcx_ostial[]" type="checkbox" value="70_80">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="lcx_ostial_80_90">
            <input id="lcx_ostial_80_90" v-model="form.lcx_ostial" name="lcx_ostial[]" type="checkbox" value="80_90">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="lcx_ostial_99">
            <input id="lcx_ostial_99" v-model="form.lcx_ostial" name="lcx_ostial[]" type="checkbox" value="99">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="lcx_ostial_100">
            <input id="lcx_ostial_100" v-model="form.lcx_ostial" name="lcx_ostial[]" type="checkbox" value="100">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="lcx_ostial_muscle">
            <input id="lcx_ostial_muscle" v-model="form.lcx_ostial" name="lcx_ostial[]" type="checkbox" value="muscle">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="lcx_ostial_diffuse">
            <input id="lcx_ostial_diffuse" v-model="form.lcx_ostial" name="lcx_ostial[]" type="checkbox" value="diffuse">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="lcx_ostial_stent">
            <input id="lcx_ostial_stent" v-model="form.lcx_ostial" name="lcx_ostial[]" type="checkbox" value="stent">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="lcx_ostial_long">
            <input id="lcx_ostial_long" v-model="form.lcx_ostial" name="lcx_ostial[]" type="checkbox" value="long">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="lcx_ostial_isr">
            <input id="lcx_ostial_isr" v-model="form.lcx_ostial" name="lcx_ostial[]" type="checkbox" value="ISR">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
</tr>
<tr>
    <td class="row-title" style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        Proximal portion</td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="lcx_proximal_20_30">
            <input id="lcx_proximal_20_30" v-model="form.lcx_proximal" name="lcx_proximal[]" type="checkbox" value="20_30">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="lcx_proximal_30_40">
            <input id="lcx_proximal_30_40" v-model="form.lcx_proximal" name="lcx_proximal[]" type="checkbox" value="30_40">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="lcx_proximal_50_70">
            <input id="lcx_proximal_50_70" v-model="form.lcx_proximal" name="lcx_proximal[]" type="checkbox" value="50_70">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="lcx_proximal_70_80">
            <input id="lcx_proximal_70_80" v-model="form.lcx_proximal" name="lcx_proximal[]" type="checkbox" value="70_80">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="lcx_proximal_80_90">
            <input id="lcx_proximal_80_90" v-model="form.lcx_proximal" name="lcx_proximal[]" type="checkbox" value="80_90">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="lcx_proximal_99">
            <input id="lcx_proximal_99" v-model="form.lcx_proximal" name="lcx_proximal[]" type="checkbox" value="99">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="lcx_proximal_100">
            <input id="lcx_proximal_100" v-model="form.lcx_proximal" name="lcx_proximal[]" type="checkbox" value="100">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="lcx_proximal_muscle">
            <input id="lcx_proximal_muscle" v-model="form.lcx_proximal" name="lcx_proximal[]" type="checkbox" value="muscle">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="lcx_proximal_diffuse">
            <input id="lcx_proximal_diffuse" v-model="form.lcx_proximal" name="lcx_proximal[]" type="checkbox" value="diffuse">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="lcx_proximal_stent">
            <input id="lcx_proximal_stent" v-model="form.lcx_proximal" name="lcx_proximal[]" type="checkbox" value="stent">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="lcx_proximal_long">
            <input id="lcx_proximal_long" v-model="form.lcx_proximal" name="lcx_proximal[]" type="checkbox" value="long">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="lcx_proximal_isr">
            <input id="lcx_proximal_isr" v-model="form.lcx_proximal" name="lcx_proximal[]" type="checkbox" value="ISR">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
</tr>
<tr>
    <td class="row-title" style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">Mid portion</td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="mid_20_30"><input id="mid_20_30" name="lcx_mid[]" v-model="form.lcx_mid" type="checkbox" value="20_30">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="mid_30_40"><input id="mid_30_40" name="lcx_mid[]" v-model="form.lcx_mid" type="checkbox" value="30_40">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="mid_50_70"><input id="mid_50_70" name="lcx_mid[]" v-model="form.lcx_mid" type="checkbox" value="50_70">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="mid_70_80"><input id="mid_70_80" name="lcx_mid[]" v-model="form.lcx_mid" type="checkbox" value="70_80">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="mid_80_90"><input id="mid_80_90" name="lcx_mid[]" v-model="form.lcx_mid" type="checkbox" value="80_90">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="mid_99"><input id="mid_99" name="lcx_mid[]" v-model="form.lcx_mid" type="checkbox" value="99">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="mid_100"><input id="mid_100" name="lcx_mid[]" v-model="form.lcx_mid" type="checkbox" value="100">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="mid_muscle"><input id="mid_muscle" name="lcx_mid[]" v-model="form.lcx_mid" type="checkbox" value="muscle">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="mid_diffuse"><input id="mid_diffuse" name="lcx_mid[]" v-model="form.lcx_mid" type="checkbox" value="diffuse">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="mid_stent"><input id="mid_stent" name="lcx_mid[]" v-model="form.lcx_mid" type="checkbox" value="stent">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="mid_long"><input id="mid_long" name="lcx_mid[]" v-model="form.lcx_mid" type="checkbox" value="long">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="mid_isr"><input id="mid_isr" name="lcx_mid[]" v-model="form.lcx_mid" type="checkbox" value="ISR">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
</tr>
<tr>
    <td class="row-title" style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">Distal portion</td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="distal_20_30"><input id="distal_20_30" name="lcx_distal[]" v-model="form.lcx_distal" type="checkbox" value="20_30">
            <div class="cover"><div class="ravesh-form-control-indicator"></div></div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="distal_30_40"><input id="distal_30_40" name="lcx_distal[]" v-model="form.lcx_distal" type="checkbox" value="30_40">
            <div class="cover"><div class="ravesh-form-control-indicator"></div></div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="distal_50_70"><input id="distal_50_70" name="lcx_distal[]" v-model="form.lcx_distal" type="checkbox" value="50_70">
            <div class="cover"><div class="ravesh-form-control-indicator"></div></div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="distal_70_80"><input id="distal_70_80" name="lcx_distal[]" v-model="form.lcx_distal" type="checkbox" value="70_80">
            <div class="cover"><div class="ravesh-form-control-indicator"></div></div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="distal_80_90"><input id="distal_80_90" name="lcx_distal[]" v-model="form.lcx_distal" type="checkbox" value="80_90">
            <div class="cover"><div class="ravesh-form-control-indicator"></div></div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="distal_99"><input id="distal_99" name="lcx_distal[]" v-model="form.lcx_distal" type="checkbox" value="99">
            <div class="cover"><div class="ravesh-form-control-indicator"></div></div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="distal_100"><input id="distal_100" name="lcx_distal[]" v-model="form.lcx_distal" type="checkbox" value="100">
            <div class="cover"><div class="ravesh-form-control-indicator"></div></div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="distal_muscle"><input id="distal_muscle" name="lcx_distal[]" v-model="form.lcx_distal" type="checkbox" value="muscle">
            <div class="cover"><div class="ravesh-form-control-indicator"></div></div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="distal_diffuse"><input id="distal_diffuse" name="lcx_distal[]" v-model="form.lcx_distal" type="checkbox" value="diffuse">
            <div class="cover"><div class="ravesh-form-control-indicator"></div></div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="distal_stent"><input id="distal_stent" name="lcx_distal[]" v-model="form.lcx_distal" type="checkbox" value="stent">
            <div class="cover"><div class="ravesh-form-control-indicator"></div></div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="distal_long"><input id="distal_long" name="lcx_distal[]" v-model="form.lcx_distal" type="checkbox" value="long">
            <div class="cover"><div class="ravesh-form-control-indicator"></div></div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="distal_isr"><input id="distal_isr" name="lcx_distal[]" v-model="form.lcx_distal" type="checkbox" value="ISR">
            <div class="cover"><div class="ravesh-form-control-indicator"></div></div>
        </label>
    </td>
</tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-design-field form-field-multiline col-full"
                                            style="display: inline-block;">
                                            <div class="content">
                                                <div class="title"><span class="required" style="color: red;"> *
                                                    </span><span class="title-str"
                                                        style="font-size: 11px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Left
                                                        Circumfles (LCX)</span></div>
                                                <div class="wrapper" style="display: block;">
                                                    <div>
                                                        <div><textarea v-model="form.lcx_description" placeholder=""
                                                                rows="2" maxlength="1000" class="form-input"
                                                                style="display: block; width: 100%; height: auto; min-height: 35px; max-height: 600px; font-size: 11px; color: rgb(0, 0, 0); border-color: rgb(225, 225, 225);  font-weight: normal; font-style: unset; background-color: rgb(255, 255, 255); border-style: solid; border-width: 1px; border-radius: 0px;"></textarea>
                                                            <div
                                                                style="direction: ltr; padding: 5px 0px 3px; display: none;">
                                                            </div>
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
                        <div class="form-design-section">
                            <div style="transition: opacity 300ms;">
                                <div class="form-design-section-wrapper style-border"
                                    style="background-color: transparent; border-width: 1px; border-color: rgb(238, 238, 238); border-style: solid;">
                                    <div class="form-design-section-head"
                                        style="background-color: rgb(249, 249, 249); color: rgb(0, 0, 0); border-width: 0px 0px 1px; border-color: rgb(238, 238, 238); border-style: solid; font-size: 12px;  font-weight: normal; font-style: unset;">
                                        <div class="title">OM1</div>
                                    </div>
                                    <div class="form-design-section-content">
                                        <div class="form-design-field form-field-matrix col-full"
                                            style="display: inline-block;">
                                            <div class="content">
                                                <div class="title"><span class="required" style="color: red;"> *
                                                    </span><span class="title-str"
                                                        style="font-size: 11px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">OM1</span>
                                                </div>
                                                <div class="wrapper" style="display: block;">
                                                    <div>
                                                        <div>
                                                            <table class="border">
                                                                <tbody>
                                                                    <tr>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                        </td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (20%-30%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (30%-40%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (50%-70%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (70%-80%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (80%-90%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (99%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (100%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Muscle</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Diffuse</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Stent</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Long</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            ISR</td>
                                                                    </tr>
                                                                    <tr>
    <td class="row-title" style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">Ostial portion</td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om1_ostial_20_30"><input id="om1_ostial_20_30" v-model="form.om1_ostial" name="om1_ostial[]" type="checkbox" value="20_30">
            <div class="cover"><div class="ravesh-form-control-indicator"></div></div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om1_ostial_30_40"><input id="om1_ostial_30_40" v-model="form.om1_ostial" name="om1_ostial[]" type="checkbox" value="30_40">
            <div class="cover"><div class="ravesh-form-control-indicator"></div></div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om1_ostial_50_70"><input id="om1_ostial_50_70" v-model="form.om1_ostial" name="om1_ostial[]" type="checkbox" value="50_70">
            <div class="cover"><div class="ravesh-form-control-indicator"></div></div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om1_ostial_70_80"><input id="om1_ostial_70_80" v-model="form.om1_ostial" name="om1_ostial[]" type="checkbox" value="70_80">
            <div class="cover"><div class="ravesh-form-control-indicator"></div></div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om1_ostial_80_90"><input id="om1_ostial_80_90" v-model="form.om1_ostial" name="om1_ostial[]" type="checkbox" value="80_90">
            <div class="cover"><div class="ravesh-form-control-indicator"></div></div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om1_ostial_99"><input id="om1_ostial_99" v-model="form.om1_ostial" name="om1_ostial[]" type="checkbox" value="99">
            <div class="cover"><div class="ravesh-form-control-indicator"></div></div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om1_ostial_100"><input id="om1_ostial_100" v-model="form.om1_ostial" name="om1_ostial[]" type="checkbox" value="100">
            <div class="cover"><div class="ravesh-form-control-indicator"></div></div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om1_ostial_muscle"><input id="om1_ostial_muscle" v-model="form.om1_ostial" name="om1_ostial[]" type="checkbox" value="muscle">
            <div class="cover"><div class="ravesh-form-control-indicator"></div></div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om1_ostial_diffuse"><input id="om1_ostial_diffuse" v-model="form.om1_ostial" name="om1_ostial[]" type="checkbox" value="diffuse">
            <div class="cover"><div class="ravesh-form-control-indicator"></div></div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om1_ostial_stent"><input id="om1_ostial_stent" v-model="form.om1_ostial" name="om1_ostial[]" type="checkbox" value="stent">
            <div class="cover"><div class="ravesh-form-control-indicator"></div></div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om1_ostial_long"><input id="om1_ostial_long" v-model="form.om1_ostial" name="om1_ostial[]" type="checkbox" value="long">
            <div class="cover"><div class="ravesh-form-control-indicator"></div></div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om1_ostial_isr"><input id="om1_ostial_isr" v-model="form.om1_ostial" name="om1_ostial[]" type="checkbox" value="ISR">
            <div class="cover"><div class="ravesh-form-control-indicator"></div></div>
        </label>
    </td>
</tr>
<tr>
    <td class="row-title" style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">Proximal portion</td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="prox_20_30_id"><input id="prox_20_30_id" v-model="form.om1_proximal" name="om1_proximal[]" type="checkbox" value="20_30">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="prox_30_40_id"><input id="prox_30_40_id" v-model="form.om1_proximal" name="om1_proximal[]" type="checkbox" value="30_40">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="prox_50_70_id"><input id="prox_50_70_id" v-model="form.om1_proximal" name="om1_proximal[]" type="checkbox" value="50_70">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="prox_70_80_id"><input id="prox_70_80_id" v-model="form.om1_proximal" name="om1_proximal[]" type="checkbox" value="70_80">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="prox_80_90_id"><input id="prox_80_90_id" v-model="form.om1_proximal" name="om1_proximal[]" type="checkbox" value="80_90">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="prox_99_id"><input id="prox_99_id" v-model="form.om1_proximal" name="om1_proximal[]" type="checkbox" value="99">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="prox_100_id"><input id="prox_100_id" v-model="form.om1_proximal" name="om1_proximal[]" type="checkbox" value="100">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="prox_muscle_id"><input id="prox_muscle_id" v-model="form.om1_proximal" name="om1_proximal[]" type="checkbox" value="muscle">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="prox_diffuse_id"><input id="prox_diffuse_id" v-model="form.om1_proximal" name="om1_proximal[]" type="checkbox" value="diffuse">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="prox_stent_id"><input id="prox_stent_id" v-model="form.om1_proximal" name="om1_proximal[]" type="checkbox" value="stent">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="prox_long_id"><input id="prox_long_id" v-model="form.om1_proximal" name="om1_proximal[]" type="checkbox" value="long">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="prox_isr_id"><input id="prox_isr_id" v-model="form.om1_proximal" name="om1_proximal[]" type="checkbox" value="ISR">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
</tr>
<tr>
    <td class="row-title" style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">Mid portion</td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="mid_20_30_id"><input id="mid_20_30_id" name="om1_mid[]" v-model="form.om1_mid" type="checkbox" value="20_30">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="mid_30_40_id"><input id="mid_30_40_id" name="om1_mid[]" v-model="form.om1_mid" type="checkbox" value="30_40">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="mid_50_70_id"><input id="mid_50_70_id" name="om1_mid[]" v-model="form.om1_mid" type="checkbox" value="50_70">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="mid_70_80_id"><input id="mid_70_80_id" name="om1_mid[]" v-model="form.om1_mid" type="checkbox" value="70_80">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="mid_80_90_id"><input id="mid_80_90_id" name="om1_mid[]" v-model="form.om1_mid" type="checkbox" value="80_90">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="mid_99_id"><input id="mid_99_id" name="om1_mid[]" v-model="form.om1_mid" type="checkbox" value="99">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="mid_100_id"><input id="mid_100_id" name="om1_mid[]" v-model="form.om1_mid" type="checkbox" value="100">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="mid_muscle_id"><input id="mid_muscle_id" name="om1_mid[]" v-model="form.om1_mid" type="checkbox" value="muscle">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="mid_diffuse_id"><input id="mid_diffuse_id" name="om1_mid[]" v-model="form.om1_mid" type="checkbox" value="diffuse">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="mid_stent_id"><input id="mid_stent_id" name="om1_mid[]" v-model="form.om1_mid" type="checkbox" value="stent">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="mid_long_id"><input id="mid_long_id" name="om1_mid[]" v-model="form.om1_mid" type="checkbox" value="long">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="mid_isr_id"><input id="mid_isr_id" name="om1_mid[]" v-model="form.om1_mid" type="checkbox" value="ISR">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
</tr>
<tr>
    <td class="row-title" style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">Distal portion</td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="dist_20_30_id"><input id="dist_20_30_id" name="om1_distal[]" v-model="form.om1_distal" type="checkbox" value="20_30">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="dist_30_40_id"><input id="dist_30_40_id" name="om1_distal[]" v-model="form.om1_distal" type="checkbox" value="30_40">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="dist_50_70_id"><input id="dist_50_70_id" name="om1_distal[]" v-model="form.om1_distal" type="checkbox" value="50_70">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="dist_70_80_id"><input id="dist_70_80_id" name="om1_distal[]" v-model="form.om1_distal" type="checkbox" value="70_80">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="dist_80_90_id"><input id="dist_80_90_id" name="om1_distal[]" v-model="form.om1_distal" type="checkbox" value="80_90">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="dist_99_id"><input id="dist_99_id" name="om1_distal[]" v-model="form.om1_distal" type="checkbox" value="99">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="dist_100_id"><input id="dist_100_id" name="om1_distal[]" v-model="form.om1_distal" type="checkbox" value="100">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="dist_muscle_id"><input id="dist_muscle_id" name="om1_distal[]" v-model="form.om1_distal" type="checkbox" value="muscle">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="dist_diffuse_id"><input id="dist_diffuse_id" name="om1_distal[]" v-model="form.om1_distal" type="checkbox" value="diffuse">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="dist_stent_id"><input id="dist_stent_id" name="om1_distal[]" v-model="form.om1_distal" type="checkbox" value="stent">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="dist_long_id"><input id="dist_long_id" name="om1_distal[]" v-model="form.om1_distal" type="checkbox" value="long">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="dist_isr_id"><input id="dist_isr_id" name="om1_distal[]" v-model="form.om1_distal" type="checkbox" value="ISR">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
</tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-design-field form-field-multiline col-full"
                                            style="display: inline-block;">
                                            <div class="content">
                                                <div class="title"><span class="required" style="color: red;"> *
                                                    </span><span class="title-str"
                                                        style="font-size: 11px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">OM1</span>
                                                </div>
                                                <div class="wrapper" style="display: block;">
                                                    <div>
                                                        <div><textarea v-model="form.om1_description" placeholder=""
                                                                rows="2" maxlength="1000" class="form-input"
                                                                style="display: block; width: 100%; height: auto; min-height: 35px; max-height: 600px; font-size: 11px; color: rgb(0, 0, 0); border-color: rgb(225, 225, 225);  font-weight: normal; font-style: unset; background-color: rgb(255, 255, 255); border-style: solid; border-width: 1px; border-radius: 0px;"></textarea>
                                                            <div
                                                                style="direction: ltr; padding: 5px 0px 3px; display: none;">
                                                            </div>
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
                        <div class="form-design-section">
                            <div style="transition: opacity 300ms;">
                                <div class="form-design-section-wrapper style-border"
                                    style="background-color: transparent; border-width: 1px; border-color: rgb(238, 238, 238); border-style: solid;">
                                    <div class="form-design-section-head"
                                        style="background-color: rgb(249, 249, 249); color: rgb(0, 0, 0); border-width: 0px 0px 1px; border-color: rgb(238, 238, 238); border-style: solid; font-size: 12px;  font-weight: normal; font-style: unset;">
                                        <div class="title">OM2</div>
                                    </div>
                                    <div class="form-design-section-content">
                                        <div class="form-design-field form-field-matrix col-full"
                                            style="display: inline-block;">
                                            <div class="content">
                                                <div class="title"><span class="required" style="color: red;"> *
                                                    </span><span class="title-str"
                                                        style="font-size: 11px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">OM2</span>
                                                </div>
                                                <div class="wrapper" style="display: block;">
                                                    <div>
                                                        <div>
                                                            <table class="border">
                                                                <tbody>
                                                                    <tr>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                        </td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (20%-30%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (30%-40%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (50%-70%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (70%-80%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (80%-90%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (99%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (100%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Muscle</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Diffuse</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Stent</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Long</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            ISR</td>
                                                                    </tr>
                                                                    <tr>
    <td class="row-title" style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">Ostial portion</td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_ostial_20_30"><input id="om2_ostial_20_30" v-model="form.om2_ostial" name="om2_ostial[]" type="checkbox" value="20_30">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_ostial_30_40"><input id="om2_ostial_30_40" v-model="form.om2_ostial" name="om2_ostial[]" type="checkbox" value="30_40">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_ostial_50_70"><input id="om2_ostial_50_70" v-model="form.om2_ostial" name="om2_ostial[]" type="checkbox" value="50_70">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_ostial_70_80"><input id="om2_ostial_70_80" v-model="form.om2_ostial" name="om2_ostial[]" type="checkbox" value="70_80">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_ostial_80_90"><input id="om2_ostial_80_90" v-model="form.om2_ostial" name="om2_ostial[]" type="checkbox" value="80_90">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_ostial_99"><input id="om2_ostial_99" v-model="form.om2_ostial" name="om2_ostial[]" type="checkbox" value="99">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_ostial_100"><input id="om2_ostial_100" v-model="form.om2_ostial" name="om2_ostial[]" type="checkbox" value="100">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_ostial_muscle"><input id="om2_ostial_muscle" v-model="form.om2_ostial" name="om2_ostial[]" type="checkbox" value="muscle">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_ostial_diffuse"><input id="om2_ostial_diffuse" v-model="form.om2_ostial" name="om2_ostial[]" type="checkbox" value="diffuse">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_ostial_stent"><input id="om2_ostial_stent" v-model="form.om2_ostial" name="om2_ostial[]" type="checkbox" value="stent">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_ostial_long"><input id="om2_ostial_long" v-model="form.om2_ostial" name="om2_ostial[]" type="checkbox" value="long">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_ostial_isr"><input id="om2_ostial_isr" v-model="form.om2_ostial" name="om2_ostial[]" type="checkbox" value="ISR">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
</tr>
<tr>
    <td class="row-title" style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">Proximal portion</td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_proximal_20_30"><input id="om2_proximal_20_30" v-model="form.om2_proximal" name="om2_proximal[]" type="checkbox" value="20_30">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_proximal_30_40"><input id="om2_proximal_30_40" v-model="form.om2_proximal" name="om2_proximal[]" type="checkbox" value="30_40">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_proximal_50_70"><input id="om2_proximal_50_70" v-model="form.om2_proximal" name="om2_proximal[]" type="checkbox" value="50_70">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_proximal_70_80"><input id="om2_proximal_70_80" v-model="form.om2_proximal" name="om2_proximal[]" type="checkbox" value="70_80">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_proximal_80_90"><input id="om2_proximal_80_90" v-model="form.om2_proximal" name="om2_proximal[]" type="checkbox" value="80_90">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_proximal_99"><input id="om2_proximal_99" v-model="form.om2_proximal" name="om2_proximal[]" type="checkbox" value="99">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_proximal_100"><input id="om2_proximal_100" v-model="form.om2_proximal" name="om2_proximal[]" type="checkbox" value="100">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_proximal_muscle"><input id="om2_proximal_muscle" v-model="form.om2_proximal" name="om2_proximal[]" type="checkbox" value="muscle">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_proximal_diffuse"><input id="om2_proximal_diffuse" v-model="form.om2_proximal" name="om2_proximal[]" type="checkbox" value="diffuse">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_proximal_stent"><input id="om2_proximal_stent" v-model="form.om2_proximal" name="om2_proximal[]" type="checkbox" value="stent">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_proximal_long"><input id="om2_proximal_long" v-model="form.om2_proximal" name="om2_proximal[]" type="checkbox" value="long">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_proximal_isr"><input id="om2_proximal_isr" v-model="form.om2_proximal" name="om2_proximal[]" type="checkbox" value="ISR">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
</tr>
<tr>
    <td class="row-title" style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">Mid portion</td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_mid_20_30"><input id="om2_mid_20_30" name="om2_mid[]" v-model="form.om2_mid" type="checkbox" value="20_30">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_mid_30_40"><input id="om2_mid_30_40" name="om2_mid[]" v-model="form.om2_mid" type="checkbox" value="30_40">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_mid_50_70"><input id="om2_mid_50_70" name="om2_mid[]" v-model="form.om2_mid" type="checkbox" value="50_70">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_mid_70_80"><input id="om2_mid_70_80" name="om2_mid[]" v-model="form.om2_mid" type="checkbox" value="70_80">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_mid_80_90"><input id="om2_mid_80_90" name="om2_mid[]" v-model="form.om2_mid" type="checkbox" value="80_90">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_mid_99"><input id="om2_mid_99" name="om2_mid[]" v-model="form.om2_mid" type="checkbox" value="99">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_mid_100"><input id="om2_mid_100" name="om2_mid[]" v-model="form.om2_mid" type="checkbox" value="100">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_mid_muscle"><input id="om2_mid_muscle" name="om2_mid[]" v-model="form.om2_mid" type="checkbox" value="muscle">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_mid_diffuse"><input id="om2_mid_diffuse" name="om2_mid[]" v-model="form.om2_mid" type="checkbox" value="diffuse">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_mid_stent"><input id="om2_mid_stent" name="om2_mid[]" v-model="form.om2_mid" type="checkbox" value="stent">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_mid_long"><input id="om2_mid_long" name="om2_mid[]" v-model="form.om2_mid" type="checkbox" value="long">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_mid_isr"><input id="om2_mid_isr" name="om2_mid[]" v-model="form.om2_mid" type="checkbox" value="ISR">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
</tr>
<tr>
    <td class="row-title" style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Distal portion</td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_distal_20_30"><input id="om2_distal_20_30" name="om2_distal[]" v-model="form.om2_distal" type="checkbox" value="20_30">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_distal_30_40"><input id="om2_distal_30_40" name="om2_distal[]" v-model="form.om2_distal" type="checkbox" value="30_40">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_distal_50_70"><input id="om2_distal_50_70" name="om2_distal[]" v-model="form.om2_distal" type="checkbox" value="50_70">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_distal_70_80"><input id="om2_distal_70_80" name="om2_distal[]" v-model="form.om2_distal" type="checkbox" value="70_80">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_distal_80_90"><input id="om2_distal_80_90" name="om2_distal[]" v-model="form.om2_distal" type="checkbox" value="80_90">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_distal_99"><input id="om2_distal_99" name="om2_distal[]" v-model="form.om2_distal" type="checkbox" value="99">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_distal_100"><input id="om2_distal_100" name="om2_distal[]" v-model="form.om2_distal" type="checkbox" value="100">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_distal_muscle"><input id="om2_distal_muscle" name="om2_distal[]" v-model="form.om2_distal" type="checkbox" value="muscle">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_distal_diffuse"><input id="om2_distal_diffuse" name="om2_distal[]" v-model="form.om2_distal" type="checkbox" value="diffuse">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_distal_stent"><input id="om2_distal_stent" name="om2_distal[]" v-model="form.om2_distal" type="checkbox" value="stent">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_distal_long"><input id="om2_distal_long" name="om2_distal[]" v-model="form.om2_distal" type="checkbox" value="long">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="om2_distal_isr"><input id="om2_distal_isr" name="om2_distal[]" v-model="form.om2_distal" type="checkbox" value="ISR">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
</tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-design-field form-field-multiline col-full"
                                            style="display: inline-block;">
                                            <div class="content">
                                                <div class="title"><span class="required" style="color: red;"> *
                                                    </span><span class="title-str"
                                                        style="font-size: 11px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">OM2</span>
                                                </div>
                                                <div class="wrapper" style="display: block;">
                                                    <div>
                                                        <div><textarea v-model="form.om2_description" placeholder=""
                                                                rows="2" maxlength="1000" class="form-input"
                                                                style="display: block; width: 100%; height: auto; min-height: 35px; max-height: 600px; font-size: 11px; color: rgb(0, 0, 0); border-color: rgb(225, 225, 225);  font-weight: normal; font-style: unset; background-color: rgb(255, 255, 255); border-style: solid; border-width: 1px; border-radius: 0px;"></textarea>
                                                            <div
                                                                style="direction: ltr; padding: 5px 0px 3px; display: none;">
                                                            </div>
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
                        <div class="form-design-section">
                            <div style="transition: opacity 300ms;">
                                <div class="form-design-section-wrapper style-border"
                                    style="background-color: transparent; border-width: 1px; border-color: rgb(238, 238, 238); border-style: solid;">
                                    <div class="form-design-section-head"
                                        style="background-color: rgb(249, 249, 249); color: rgb(0, 0, 0); border-width: 0px 0px 1px; border-color: rgb(238, 238, 238); border-style: solid; font-size: 12px;  font-weight: normal; font-style: unset;">
                                        <div class="title">Right Coronary Artery (RCA)</div>
                                    </div>
                                    <div class="form-design-section-content">
                                        <div class="form-design-field form-field-matrix col-full"
                                            style="display: inline-block;">
                                            <div class="content">
                                                <div class="title"><span class="required" style="color: red;"> *
                                                    </span><span class="title-str"
                                                        style="font-size: 11px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">RCA</span>
                                                </div>
                                                <div class="wrapper" style="display: block;">
                                                    <div>
                                                        <div>
                                                            <table class="border">
                                                                <tbody>
                                                                    <tr>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                        </td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (20%-30%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (30%-40%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (50%-70%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (70%-80%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (80%-90%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (99%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (100%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Muscle</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Diffuse</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Stent</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Long</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            ISR</td>
                                                                    </tr>
                                                                    <tr>
    <td class="row-title" style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Ostial portion</td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_ostial_20_30"><input id="rca_ostial_20_30" v-model="form.rca_ostial" name="rca_ostial[]" type="checkbox" value="20_30">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_ostial_30_40"><input id="rca_ostial_30_40" v-model="form.rca_ostial" name="rca_ostial[]" type="checkbox" value="30_40">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_ostial_50_70"><input id="rca_ostial_50_70" v-model="form.rca_ostial" name="rca_ostial[]" type="checkbox" value="50_70">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_ostial_70_80"><input id="rca_ostial_70_80" v-model="form.rca_ostial" name="rca_ostial[]" type="checkbox" value="70_80">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_ostial_80_90"><input id="rca_ostial_80_90" v-model="form.rca_ostial" name="rca_ostial[]" type="checkbox" value="80_90">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_ostial_99"><input id="rca_ostial_99" v-model="form.rca_ostial" name="rca_ostial[]" type="checkbox" value="99">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_ostial_100"><input id="rca_ostial_100" v-model="form.rca_ostial" name="rca_ostial[]" type="checkbox" value="100">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_ostial_muscle"><input id="rca_ostial_muscle" v-model="form.rca_ostial" name="rca_ostial[]" type="checkbox" value="muscle">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_ostial_diffuse"><input id="rca_ostial_diffuse" v-model="form.rca_ostial" name="rca_ostial[]" type="checkbox" value="diffuse">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_ostial_stent"><input id="rca_ostial_stent" v-model="form.rca_ostial" name="rca_ostial[]" type="checkbox" value="stent">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_ostial_long"><input id="rca_ostial_long" v-model="form.rca_ostial" name="rca_ostial[]" type="checkbox" value="long">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_ostial_isr"><input id="rca_ostial_isr" v-model="form.rca_ostial" name="rca_ostial[]" type="checkbox" value="ISR">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
</tr>
<tr>
    <td class="row-title" style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Proximal portion</td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_proximal_20_30"><input id="rca_proximal_20_30" v-model="form.rca_proximal" name="rca_proximal[]" type="checkbox" value="20_30">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_proximal_30_40"><input id="rca_proximal_30_40" v-model="form.rca_proximal" name="rca_proximal[]" type="checkbox" value="30_40">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_proximal_50_70"><input id="rca_proximal_50_70" v-model="form.rca_proximal" name="rca_proximal[]" type="checkbox" value="50_70">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_proximal_70_80"><input id="rca_proximal_70_80" v-model="form.rca_proximal" name="rca_proximal[]" type="checkbox" value="70_80">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_proximal_80_90"><input id="rca_proximal_80_90" v-model="form.rca_proximal" name="rca_proximal[]" type="checkbox" value="80_90">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_proximal_99"><input id="rca_proximal_99" v-model="form.rca_proximal" name="rca_proximal[]" type="checkbox" value="99">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_proximal_100"><input id="rca_proximal_100" v-model="form.rca_proximal" name="rca_proximal[]" type="checkbox" value="100">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_proximal_muscle"><input id="rca_proximal_muscle" v-model="form.rca_proximal" name="rca_proximal[]" type="checkbox" value="muscle">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_proximal_diffuse"><input id="rca_proximal_diffuse" v-model="form.rca_proximal" name="rca_proximal[]" type="checkbox" value="diffuse">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_proximal_stent"><input id="rca_proximal_stent" v-model="form.rca_proximal" name="rca_proximal[]" type="checkbox" value="stent">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_proximal_long"><input id="rca_proximal_long" v-model="form.rca_proximal" name="rca_proximal[]" type="checkbox" value="long">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_proximal_isr"><input id="rca_proximal_isr" v-model="form.rca_proximal" name="rca_proximal[]" type="checkbox" value="ISR">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
</tr>
<tr>
    <td class="row-title" style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Mid portion</td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_mid_20_30"><input id="rca_mid_20_30" name="rca_mid[]" v-model="form.rca_mid" type="checkbox" value="20_30">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_mid_30_40"><input id="rca_mid_30_40" name="rca_mid[]" v-model="form.rca_mid" type="checkbox" value="30_40">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_mid_50_70"><input id="rca_mid_50_70" name="rca_mid[]" v-model="form.rca_mid" type="checkbox" value="50_70">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_mid_70_80"><input id="rca_mid_70_80" name="rca_mid[]" v-model="form.rca_mid" type="checkbox" value="70_80">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_mid_80_90"><input id="rca_mid_80_90" name="rca_mid[]" v-model="form.rca_mid" type="checkbox" value="80_90">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_mid_99"><input id="rca_mid_99" name="rca_mid[]" v-model="form.rca_mid" type="checkbox" value="99">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_mid_100"><input id="rca_mid_100" name="rca_mid[]" v-model="form.rca_mid" type="checkbox" value="100">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_mid_muscle"><input id="rca_mid_muscle" name="rca_mid[]" v-model="form.rca_mid" type="checkbox" value="muscle">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_mid_diffuse"><input id="rca_mid_diffuse" name="rca_mid[]" v-model="form.rca_mid" type="checkbox" value="diffuse">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_mid_stent"><input id="rca_mid_stent" name="rca_mid[]" v-model="form.rca_mid" type="checkbox" value="stent">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_mid_long"><input id="rca_mid_long" name="rca_mid[]" v-model="form.rca_mid" type="checkbox" value="long">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_mid_isr"><input id="rca_mid_isr" name="rca_mid[]" v-model="form.rca_mid" type="checkbox" value="ISR">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
</tr>
<tr>
    <td class="row-title" style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Distal portion</td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_distal_20_30"><input id="rca_distal_20_30" name="rca_distal[]" v-model="form.rca_distal" type="checkbox" value="20_30">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_distal_30_40"><input id="rca_distal_30_40" name="rca_distal[]" v-model="form.rca_distal" type="checkbox" value="30_40">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_distal_50_70"><input id="rca_distal_50_70" name="rca_distal[]" v-model="form.rca_distal" type="checkbox" value="50_70">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_distal_70_80"><input id="rca_distal_70_80" name="rca_distal[]" v-model="form.rca_distal" type="checkbox" value="70_80">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_distal_80_90"><input id="rca_distal_80_90" name="rca_distal[]" v-model="form.rca_distal" type="checkbox" value="80_90">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_distal_99"><input id="rca_distal_99" name="rca_distal[]" v-model="form.rca_distal" type="checkbox" value="99">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_distal_100"><input id="rca_distal_100" name="rca_distal[]" v-model="form.rca_distal" type="checkbox" value="100">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_distal_muscle"><input id="rca_distal_muscle" name="rca_distal[]" v-model="form.rca_distal" type="checkbox" value="muscle">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_distal_diffuse"><input id="rca_distal_diffuse" name="rca_distal[]" v-model="form.rca_distal" type="checkbox" value="diffuse">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_distal_stent"><input id="rca_distal_stent" name="rca_distal[]" v-model="form.rca_distal" type="checkbox" value="stent">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_distal_long"><input id="rca_distal_long" name="rca_distal[]" v-model="form.rca_distal" type="checkbox" value="long">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="rca_distal_isr"><input id="rca_distal_isr" name="rca_distal[]" v-model="form.rca_distal" type="checkbox" value="ISR">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
</tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-design-field form-field-multiline col-full"
                                            style="display: inline-block;">
                                            <div class="content">
                                                <div class="title"><span class="required" style="color: red;"> *
                                                    </span><span class="title-str"
                                                        style="font-size: 11px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">RCA</span>
                                                </div>
                                                <div class="wrapper" style="display: block;">
                                                    <div>
                                                        <div><textarea v-model="form.rca_description" placeholder=""
                                                                rows="2" maxlength="1000" class="form-input"
                                                                style="display: block; width: 100%; height: auto; min-height: 35px; max-height: 600px; font-size: 11px; color: rgb(0, 0, 0); border-color: rgb(225, 225, 225);  font-weight: normal; font-style: unset; background-color: rgb(255, 255, 255); border-style: solid; border-width: 1px; border-radius: 0px;"></textarea>
                                                            <div
                                                                style="direction: ltr; padding: 5px 0px 3px; display: none;">
                                                            </div>
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
                        <div class="form-design-section">
                            <div style="transition: opacity 300ms;">
                                <div class="form-design-section-wrapper style-border"
                                    style="background-color: transparent; border-width: 1px; border-color: rgb(238, 238, 238); border-style: solid;">
                                    <div class="form-design-section-head"
                                        style="background-color: rgb(249, 249, 249); color: rgb(0, 0, 0); border-width: 0px 0px 1px; border-color: rgb(238, 238, 238); border-style: solid; font-size: 12px;  font-weight: normal; font-style: unset;">
                                        <div class="title">PDA</div>
                                    </div>
                                    <div class="form-design-section-content">
                                        <div class="form-design-field form-field-matrix col-full"
                                            style="display: inline-block;">
                                            <div class="content">
                                                <div class="title"><span class="required" style="color: red;"> *
                                                    </span><span class="title-str"
                                                        style="font-size: 11px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">PDA</span>
                                                </div>
                                                <div class="wrapper" style="display: block;">
                                                    <div>
                                                        <div>
                                                            <table class="border">
                                                                <tbody>
                                                                    <tr>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                        </td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (20%-30%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (30%-40%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (50%-70%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (70%-80%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (80%-90%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (99%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (100%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Muscle</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Diffuse</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Stent</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Long</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            ISR</td>
                                                                    </tr>
                                                                    <tr>
    <td class="row-title" style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Ostial portion</td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_ostial_20_30"><input id="pda_ostial_20_30" v-model="form.pda_ostial" name="pda_ostial[]" type="checkbox" value="20_30">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_ostial_30_40"><input id="pda_ostial_30_40" v-model="form.pda_ostial" name="pda_ostial[]" type="checkbox" value="30_40">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_ostial_50_70"><input id="pda_ostial_50_70" v-model="form.pda_ostial" name="pda_ostial[]" type="checkbox" value="50_70">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_ostial_70_80"><input id="pda_ostial_70_80" v-model="form.pda_ostial" name="pda_ostial[]" type="checkbox" value="70_80">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_ostial_80_90"><input id="pda_ostial_80_90" v-model="form.pda_ostial" name="pda_ostial[]" type="checkbox" value="80_90">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_ostial_99"><input id="pda_ostial_99" v-model="form.pda_ostial" name="pda_ostial[]" type="checkbox" value="99">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_ostial_100"><input id="pda_ostial_100" v-model="form.pda_ostial" name="pda_ostial[]" type="checkbox" value="100">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_ostial_muscle"><input id="pda_ostial_muscle" v-model="form.pda_ostial" name="pda_ostial[]" type="checkbox" value="muscle">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_ostial_diffuse"><input id="pda_ostial_diffuse" v-model="form.pda_ostial" name="pda_ostial[]" type="checkbox" value="diffuse">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_ostial_stent"><input id="pda_ostial_stent" v-model="form.pda_ostial" name="pda_ostial[]" type="checkbox" value="stent">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_ostial_long"><input id="pda_ostial_long" v-model="form.pda_ostial" name="pda_ostial[]" type="checkbox" value="long">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_ostial_isr"><input id="pda_ostial_isr" v-model="form.pda_ostial" name="pda_ostial[]" type="checkbox" value="ISR">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
</tr>
<tr>
    <td class="row-title" style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        Proximal portion</td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_proximal_20_30"><input
                id="pda_proximal_20_30" v-model="form.pda_proximal" name="pda_proximal[]" type="checkbox" value="20_30">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_proximal_30_40"><input
                id="pda_proximal_30_40" v-model="form.pda_proximal" name="pda_proximal[]" type="checkbox" value="30_40">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_proximal_50_70"><input
                id="pda_proximal_50_70" v-model="form.pda_proximal" name="pda_proximal[]" type="checkbox" value="50_70">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_proximal_70_80"><input
                id="pda_proximal_70_80" v-model="form.pda_proximal" name="pda_proximal[]" type="checkbox" value="70_80">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_proximal_80_90"><input
                id="pda_proximal_80_90" v-model="form.pda_proximal" name="pda_proximal[]" type="checkbox" value="80_90">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_proximal_99"><input
                id="pda_proximal_99" v-model="form.pda_proximal" name="pda_proximal[]" type="checkbox" value="99">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_proximal_100"><input
                id="pda_proximal_100" v-model="form.pda_proximal" name="pda_proximal[]" type="checkbox" value="100">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_proximal_muscle"><input
                id="pda_proximal_muscle" v-model="form.pda_proximal" name="pda_proximal[]" type="checkbox" value="muscle">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_proximal_diffuse"><input
                id="pda_proximal_diffuse" v-model="form.pda_proximal" name="pda_proximal[]" type="checkbox" value="diffuse">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_proximal_stent"><input
                id="pda_proximal_stent" v-model="form.pda_proximal" name="pda_proximal[]" type="checkbox" value="stent">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_proximal_long"><input
                id="pda_proximal_long" v-model="form.pda_proximal" name="pda_proximal[]" type="checkbox" value="long">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_proximal_isr"><input
                id="pda_proximal_isr" v-model="form.pda_proximal" name="pda_proximal[]" type="checkbox" value="ISR">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
</tr>
<tr>
    <td class="row-title" style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        Mid portion</td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_mid_20_30"><input
                id="pda_mid_20_30" name="pda_mid[]" v-model="form.pda_mid" type="checkbox" value="20_30">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_mid_30_40"><input
                id="pda_mid_30_40" name="pda_mid[]" v-model="form.pda_mid" type="checkbox" value="30_40">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_mid_50_70"><input
                id="pda_mid_50_70" name="pda_mid[]" v-model="form.pda_mid" type="checkbox" value="50_70">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_mid_70_80"><input
                id="pda_mid_70_80" name="pda_mid[]" v-model="form.pda_mid" type="checkbox" value="70_80">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_mid_80_90"><input
                id="pda_mid_80_90" name="pda_mid[]" v-model="form.pda_mid" type="checkbox" value="80_90">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_mid_99"><input id="pda_mid_99"
                name="pda_mid[]" v-model="form.pda_mid" type="checkbox" value="99">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_mid_100"><input id="pda_mid_100"
                name="pda_mid[]" v-model="form.pda_mid" type="checkbox" value="100">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_mid_muscle"><input
                id="pda_mid_muscle" name="pda_mid[]" v-model="form.pda_mid" type="checkbox" value="muscle">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_mid_diffuse"><input
                id="pda_mid_diffuse" name="pda_mid[]" v-model="form.pda_mid" type="checkbox" value="diffuse">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_mid_stent"><input
                id="pda_mid_stent" name="pda_mid[]" v-model="form.pda_mid" type="checkbox" value="stent">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_mid_long"><input
                id="pda_mid_long" name="pda_mid[]" v-model="form.pda_mid" type="checkbox" value="long">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_mid_isr"><input id="pda_mid_isr"
                name="pda_mid[]" v-model="form.pda_mid" type="checkbox" value="ISR">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
</tr>
<tr>
    <td class="row-title" style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        Distal portion</td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_distal_20_30"><input
                id="pda_distal_20_30" name="pda_distal[]" v-model="form.pda_distal" type="checkbox" value="20_30">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_distal_30_40"><input
                id="pda_distal_30_40" name="pda_distal[]" v-model="form.pda_distal" type="checkbox" value="30_40">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_distal_50_70"><input
                id="pda_distal_50_70" name="pda_distal[]" v-model="form.pda_distal" type="checkbox" value="50_70">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_distal_70_80"><input
                id="pda_distal_70_80" name="pda_distal[]" v-model="form.pda_distal" type="checkbox" value="70_80">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_distal_80_90"><input
                id="pda_distal_80_90" name="pda_distal[]" v-model="form.pda_distal" type="checkbox" value="80_90">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_distal_99"><input
                id="pda_distal_99" name="pda_distal[]" v-model="form.pda_distal" type="checkbox" value="99">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_distal_100"><input
                id="pda_distal_100" name="pda_distal[]" v-model="form.pda_distal" type="checkbox" value="100">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_distal_muscle"><input
                id="pda_distal_muscle" name="pda_distal[]" v-model="form.pda_distal" type="checkbox" value="muscle">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_distal_diffuse"><input
                id="pda_distal_diffuse" name="pda_distal[]" v-model="form.pda_distal" type="checkbox" value="diffuse">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_distal_stent"><input
                id="pda_distal_stent" name="pda_distal[]" v-model="form.pda_distal" type="checkbox" value="stent">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_distal_long"><input
                id="pda_distal_long" name="pda_distal[]" v-model="form.pda_distal" type="checkbox" value="long">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
    <td style="font-size: 10px; color: rgb(0, 0, 0); font-weight: normal; font-style: unset;">
        <label class="ravesh-form-control no-text ravesh-form-control-checkbox" for="pda_distal_isr"><input
                id="pda_distal_isr" name="pda_distal[]" v-model="form.pda_distal" type="checkbox" value="ISR">
            <div class="cover">
                <div class="ravesh-form-control-indicator"></div>
            </div>
        </label>
    </td>
</tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-design-field form-field-multiline col-full"
                                            style="display: inline-block;">
                                            <div class="content">
                                                <div class="title"><span class="required" style="color: red;"> *
                                                    </span><span class="title-str"
                                                        style="font-size: 11px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">PDA</span>
                                                </div>
                                                <div class="wrapper" style="display: block;">
                                                    <div>
                                                        <div><textarea v-model="form.pda_description" placeholder=""
                                                                rows="2" maxlength="1000" class="form-input"
                                                                style="display: block; width: 100%; height: auto; min-height: 35px; max-height: 600px; font-size: 11px; color: rgb(0, 0, 0); border-color: rgb(225, 225, 225);  font-weight: normal; font-style: unset; background-color: rgb(255, 255, 255); border-style: solid; border-width: 1px; border-radius: 0px;"></textarea>
                                                            <div
                                                                style="direction: ltr; padding: 5px 0px 3px; display: none;">
                                                            </div>
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
                        <div class="form-design-section">
                            <div style="transition: opacity 300ms;">
                                <div class="form-design-section-wrapper style-border"
                                    style="background-color: transparent; border-width: 1px; border-color: rgb(238, 238, 238); border-style: solid;">
                                    <div class="form-design-section-head"
                                        style="background-color: rgb(249, 249, 249); color: rgb(0, 0, 0); border-width: 0px 0px 1px; border-color: rgb(238, 238, 238); border-style: solid; font-size: 12px;  font-weight: normal; font-style: unset;">
                                        <div class="title">PLV</div>
                                    </div>
                                    <div class="form-design-section-content">
                                        <div class="form-design-field form-field-matrix col-full"
                                            style="display: inline-block;">
                                            <div class="content">
                                                <div class="title"><span class="required" style="color: red;"> *
                                                    </span><span class="title-str"
                                                        style="font-size: 11px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">PLV</span>
                                                </div>
                                                <div class="wrapper" style="display: block;">
                                                    <div>
                                                        <div>
                                                            <table class="border">
                                                                <tbody>
                                                                    <tr>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                        </td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (20%-30%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (30%-40%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (50%-70%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (70%-80%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (80%-90%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (99%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            (100%)</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Muscle</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Diffuse</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Stent</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Long</td>
                                                                        <td class="column-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            ISR</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="row-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Ostial portion</td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idryv4m787di"><input
                                                                                    id="idryv4m787di"
                                                                                    v-model="form.plv_ostial"
                                                                                    name="plv_ostial[]" type="checkbox"
                                                                                    value="20_30">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idevnfvfj36b"><input
                                                                                    id="idevnfvfj36b"
                                                                                    v-model="form.plv_ostial"
                                                                                    name="plv_ostial[]" type="checkbox"
                                                                                    value="30_40">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idelcnbaqqno"><input
                                                                                    id="idelcnbaqqno"
                                                                                    v-model="form.plv_ostial"
                                                                                    name="plv_ostial[]" type="checkbox"
                                                                                    value="50_70">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idg9vbfe5wa5"><input
                                                                                    id="idg9vbfe5wa5"
                                                                                    v-model="form.plv_ostial"
                                                                                    name="plv_ostial[]" type="checkbox"
                                                                                    value="70_80">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idxgo7a39qwr"><input
                                                                                    id="idxgo7a39qwr"
                                                                                    v-model="form.plv_ostial"
                                                                                    name="plv_ostial[]" type="checkbox"
                                                                                    value="80_90">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id4nyyprkfzy"><input
                                                                                    id="id4nyyprkfzy"
                                                                                    v-model="form.plv_ostial"
                                                                                    name="plv_ostial[]" type="checkbox"
                                                                                    value="99">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idbmutd983e9"><input
                                                                                    id="idbmutd983e9"
                                                                                    v-model="form.plv_ostial"
                                                                                    name="plv_ostial[]" type="checkbox"
                                                                                    value="100">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id0887d049py"><input
                                                                                    id="id0887d049py"
                                                                                    v-model="form.plv_ostial"
                                                                                    name="plv_ostial[]" type="checkbox"
                                                                                    value="muscle">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id3p2pmyb8gs"><input
                                                                                    id="id3p2pmyb8gs"
                                                                                    v-model="form.plv_ostial"
                                                                                    name="plv_ostial[]" type="checkbox"
                                                                                    value="diffuse">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idqrddjbq9yf"><input
                                                                                    id="idqrddjbq9yf"
                                                                                    v-model="form.plv_ostial"
                                                                                    name="plv_ostial[]" type="checkbox"
                                                                                    value="stent">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id1tsvoykeg3"><input
                                                                                    id="id1tsvoykeg3"
                                                                                    v-model="form.plv_ostial"
                                                                                    name="plv_ostial[]" type="checkbox"
                                                                                    value="long">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idk8acwfys7p"><input
                                                                                    id="idk8acwfys7p"
                                                                                    v-model="form.plv_ostial"
                                                                                    name="plv_ostial[]" type="checkbox"
                                                                                    value="ISR">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="row-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Proximal portion</td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idz7ly7btz8p"><input
                                                                                    id="idz7ly7btz8p"
                                                                                    v-model="form.plv_proximal"
                                                                                    name="plv_proximal[]"
                                                                                    type="checkbox" value="20_30">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idr2faqwm926"><input
                                                                                    id="idr2faqwm926"
                                                                                    v-model="form.plv_proximal"
                                                                                    name="plv_proximal[]"
                                                                                    type="checkbox" value="30_40">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id9h9cl929om"><input
                                                                                    id="id9h9cl929om"
                                                                                    v-model="form.plv_proximal"
                                                                                    name="plv_proximal[]"
                                                                                    type="checkbox" value="50_70">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idgyhbp4s6ey"><input
                                                                                    id="idgyhbp4s6ey"
                                                                                    v-model="form.plv_proximal"
                                                                                    name="plv_proximal[]"
                                                                                    type="checkbox" value="70_80">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="iddse875kj88"><input
                                                                                    id="iddse875kj88"
                                                                                    v-model="form.plv_proximal"
                                                                                    name="plv_proximal[]"
                                                                                    type="checkbox" value="80_90">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idm4b23auf15"><input
                                                                                    id="idm4b23auf15"
                                                                                    v-model="form.plv_proximal"
                                                                                    name="plv_proximal[]"
                                                                                    type="checkbox" value="99">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id7l8u8dq7a4"><input
                                                                                    id="id7l8u8dq7a4"
                                                                                    v-model="form.plv_proximal"
                                                                                    name="plv_proximal[]"
                                                                                    type="checkbox" value="100">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id4aigldwtqc"><input
                                                                                    id="id4aigldwtqc"
                                                                                    v-model="form.plv_proximal"
                                                                                    name="plv_proximal[]"
                                                                                    type="checkbox" value="muscle">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id1t0o74orbt"><input
                                                                                    id="id1t0o74orbt"
                                                                                    v-model="form.plv_proximal"
                                                                                    name="plv_proximal[]"
                                                                                    type="checkbox" value="diffuse">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id3twge9b5h3"><input
                                                                                    id="id3twge9b5h3"
                                                                                    v-model="form.plv_proximal"
                                                                                    name="plv_proximal[]"
                                                                                    type="checkbox" value="stent">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idyn2fdx2v8g"><input
                                                                                    id="idyn2fdx2v8g"
                                                                                    v-model="form.plv_proximal"
                                                                                    name="plv_proximal[]"
                                                                                    type="checkbox" value="long">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idqs84usoy9d"><input
                                                                                    id="idqs84usoy9d"
                                                                                    v-model="form.plv_proximal"
                                                                                    name="plv_proximal[]"
                                                                                    type="checkbox" value="ISR">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="row-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Mid portion</td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id7pqo8vi0qw"><input
                                                                                    id="id7pqo8vi0qw" name="plv_mid[]"
                                                                                    v-model="form.plv_mid"
                                                                                    type="checkbox" value="20_30">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idbak4nymae7"><input
                                                                                    id="idbak4nymae7" name="plv_mid[]"
                                                                                    v-model="form.plv_mid"
                                                                                    type="checkbox" value="30_40">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id0ft764dh68"><input
                                                                                    id="id0ft764dh68" name="plv_mid[]"
                                                                                    v-model="form.plv_mid"
                                                                                    type="checkbox" value="50_70">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idrbgyfchj80"><input
                                                                                    id="idrbgyfchj80" name="plv_mid[]"
                                                                                    v-model="form.plv_mid"
                                                                                    type="checkbox" value="70_80">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idz0bro2omvp"><input
                                                                                    id="idz0bro2omvp" name="plv_mid[]"
                                                                                    v-model="form.plv_mid"
                                                                                    type="checkbox" value="80_90">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id097gibbg59"><input
                                                                                    id="id097gibbg59" name="plv_mid[]"
                                                                                    v-model="form.plv_mid"
                                                                                    type="checkbox" value="99">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idyy0rpjppea"><input
                                                                                    id="idyy0rpjppea" name="plv_mid[]"
                                                                                    v-model="form.plv_mid"
                                                                                    type="checkbox" value="100">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idpbp1sxu5jn"><input
                                                                                    id="idpbp1sxu5jn" name="plv_mid[]"
                                                                                    v-model="form.plv_mid"
                                                                                    type="checkbox" value="muscle">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idlrw7bqghbh"><input
                                                                                    id="idlrw7bqghbh" name="plv_mid[]"
                                                                                    v-model="form.plv_mid"
                                                                                    type="checkbox" value="diffuse">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idlyequt0p9x"><input
                                                                                    id="idlyequt0p9x" name="plv_mid[]"
                                                                                    v-model="form.plv_mid"
                                                                                    type="checkbox" value="stent">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idb2c804sdi3"><input
                                                                                    id="idb2c804sdi3" name="plv_mid[]"
                                                                                    v-model="form.plv_mid"
                                                                                    type="checkbox" value="long">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id3nho7qmm2i"><input
                                                                                    id="id3nho7qmm2i" name="plv_mid[]"
                                                                                    v-model="form.plv_mid"
                                                                                    type="checkbox" value="ISR">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="row-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Distal portion</td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="iddmuu7pg569"><input
                                                                                    id="iddmuu7pg569"
                                                                                    name="plv_distal[]"
                                                                                    v-model="form.plv_distal"
                                                                                    type="checkbox" value="20_30">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id7nxmrt8im6"><input
                                                                                    id="id7nxmrt8im6"
                                                                                    name="plv_distal[]"
                                                                                    v-model="form.plv_distal"
                                                                                    type="checkbox" value="30_40">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="ideusulztb37"><input
                                                                                    id="ideusulztb37"
                                                                                    name="plv_distal[]"
                                                                                    v-model="form.plv_distal"
                                                                                    type="checkbox" value="50_70">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idd2xjcmeayk"><input
                                                                                    id="idd2xjcmeayk"
                                                                                    name="plv_distal[]"
                                                                                    v-model="form.plv_distal"
                                                                                    type="checkbox" value="70_80">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idll1kf6mnqm"><input
                                                                                    id="idll1kf6mnqm"
                                                                                    name="plv_distal[]"
                                                                                    v-model="form.plv_distal"
                                                                                    type="checkbox" value="80_90">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idej4qx2a8h4"><input
                                                                                    id="idej4qx2a8h4"
                                                                                    name="plv_distal[]"
                                                                                    v-model="form.plv_distal"
                                                                                    type="checkbox" value="99">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idtmvu1tw4ql"><input
                                                                                    id="idtmvu1tw4ql"
                                                                                    name="plv_distal[]"
                                                                                    v-model="form.plv_distal"
                                                                                    type="checkbox" value="100">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idplntb6gsvp"><input
                                                                                    id="idplntb6gsvp"
                                                                                    name="plv_distal[]"
                                                                                    v-model="form.plv_distal"
                                                                                    type="checkbox" value="muscle">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idyzayubph3r"><input
                                                                                    id="idyzayubph3r"
                                                                                    name="plv_distal[]"
                                                                                    v-model="form.plv_distal"
                                                                                    type="checkbox" value="diffuse">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idqli8dpihhs"><input
                                                                                    id="idqli8dpihhs"
                                                                                    name="plv_distal[]"
                                                                                    v-model="form.plv_distal"
                                                                                    type="checkbox" value="stent">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="iduzos4xmann"><input
                                                                                    id="iduzos4xmann"
                                                                                    name="plv_distal[]"
                                                                                    v-model="form.plv_distal"
                                                                                    type="checkbox" value="long">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idj1ku3h3ze1"><input
                                                                                    id="idj1ku3h3ze1"
                                                                                    name="plv_distal[]"
                                                                                    v-model="form.plv_distal"
                                                                                    type="checkbox" value="ISR">
                                                                                <div class="cover">
                                                                                    <div
                                                                                        class="ravesh-form-control-indicator">
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-design-field form-field-multiline col-full"
                                            style="display: inline-block;">
                                            <div class="content">
                                                <div class="title"><span class="required" style="color: red;"> *
                                                    </span><span class="title-str"
                                                        style="font-size: 11px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">PLV</span>
                                                </div>
                                                <div class="wrapper" style="display: block;">
                                                    <div>
                                                        <div><textarea v-model="form.plv_description" placeholder=""
                                                                rows="2" maxlength="1000" class="form-input"
                                                                style="display: block; width: 100%; height: auto; min-height: 35px; max-height: 600px; font-size: 11px; color: rgb(0, 0, 0); border-color: rgb(225, 225, 225);  font-weight: normal; font-style: unset; background-color: rgb(255, 255, 255); border-style: solid; border-width: 1px; border-radius: 0px;"></textarea>
                                                            <div
                                                                style="direction: ltr; padding: 5px 0px 3px; display: none;">
                                                            </div>
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
                    <vs-button color="success" @click="() => doReport()" class="mr-3 mb-2" size="large">{{
                        __("Admission")
                    }}</vs-button>
                </div>
            </form>
        </vx-card>
    </div>
</template>
<script>

export default {
    data() {
        return {
            form: {
                name: "",
                age: "",
                physician: "",
                gender: 1,
                email: "",
                dominant: "right",
                condition: [],
                left_main_description: "",
                LM_ostial: [],
                LM_proximal: [],
                LM_mid: [],
                LM_distal: [],
                LAD_distal: [],
                LAD_proximal: [],
                LAD_mid: [],
                LAD_ostial: [],

                Diagonal1_distal: [],
                Diagonal1_proximal: [],
                Diagonal1_mid: [],
                Diagonal1_ostial: [],
                diagonal1_description: "",

                Diagonal2_distal: [],
                Diagonal2_proximal: [],
                Diagonal2_mid: [],
                Diagonal2_ostial: [],
                diagonal2_description: "",

                lcx_distal: [],
                lcx_proximal: [],
                lcx_mid: [],
                lcx_ostial: [],
                lcx_description: "",

                om1_distal: [],
                om1_proximal: [],
                om1_mid: [],
                om1_ostial: [],
                om1_description: "",

                om2_distal: [],
                om2_proximal: [],
                om2_mid: [],
                om2_ostial: [],
                om2_description: "",

                rca_distal: [],
                rca_proximal: [],
                rca_mid: [],
                rca_ostial: [],
                rca_description: "",

                pda_distal: [],
                pda_proximal: [],
                pda_mid: [],
                pda_ostial: [],
                pda_description: "",

                plv_distal: [],
                plv_proximal: [],
                plv_mid: [],
                plv_ostial: [],
                plv_description: "",


                left_anterior_descending_description: ""
            }
        }
    },
    methods: {
        doReport() {
            console.log(this.form)
        }
    }
}
</script>
<style>
.ravesh-toggle input:checked+.ticon-1 {
    background: #03a9f4;
    color: #fff;
}
</style>
