<template>
    <div class="mb-base">
        <vx-card :title="__('Patient Information')">
            <template v-slot:actions>
                <vs-button color="primary" to="/computation_center/list" type="filled">{{ __("Back") }}</vs-button>
            </template>
            <form @submit="onSubmit">

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
                                                        <div><input class="form-input" type="text" name="name" v-model="form.name" maxlength="255"
                                                                placeholder=""
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
                                                        <div><input type="number" placeholder="" name="age" v-model="form.age" class="form-input"
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
                                                        <div><input name="physician" class="form-input" v-model="form.physician" type="text" maxlength="255"
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
                                                                for="male"><input id="male"
                                                                    type="radio" name="gender" v-model="form.gender" value="1">
                                                                <div class="float-right toggle-on ticon-1"><i></i>
                                                                    <div>Male</div>
                                                                </div>
                                                            </label>
                                                            <label class="ravesh-toggle ravesh-toggle-style-1 has-text"
                                                                for="female">
                                                                <input id="female"
                                                                    type="radio" name="gender" v-model="form.gender" value="2">
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
                                                        <div><input class="form-input" name="email" v-model="form.email" type="text" maxlength="255"
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
                                                                         type="radio" name="dominant" v-model="form.dominant" value="right"
                                                                        ch="false">
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
                                                                         type="radio" name="dominant" v-model="form.dominant" value="left"
                                                                        ch="false">
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
                                                                        name="condition[]" v-model="form.condition" type="checkbox"
                                                                        value="Bifurcation">
                                                                    <div class="cover"><span
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Bifurcation</span>
                                                                        <div class="ravesh-form-control-indicator">
                                                                        </div>
                                                                    </div>
                                                                </label></div>
                                                            <div class="item"><label style="display: block;"
                                                                    class="ravesh-form-control ravesh-form-control-checkbox type-classic"
                                                                    for="idgi8o21p5ep"><input id="idgi8o21p5ep"
                                                                        name="condition[]" v-model="form.condition" type="checkbox"
                                                                        value="Trifurcation">
                                                                    <div class="cover"><span
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Trifurcation</span>
                                                                        <div class="ravesh-form-control-indicator">
                                                                        </div>
                                                                    </div>
                                                                </label></div>
                                                            <div class="item"><label style="display: block;"
                                                                    class="ravesh-form-control ravesh-form-control-checkbox type-classic"
                                                                    for="idyrfzg5ic4u"><input id="idyrfzg5ic4u"
                                                                        name="condition[]" v-model="form.condition" type="checkbox"
                                                                        value="Aorto Ostial lesion">
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
                                                                        name="condition[]" v-model="form.condition" type="checkbox"
                                                                        value="Severe Tortuosity">
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
                                                                        name="condition[]" v-model="form.condition" type="checkbox"
                                                                        value="Long lesion">
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
                                                                        name="condition[]" v-model="form.condition" type="checkbox"
                                                                        value="Calcification">
                                                                    <div class="cover"><span
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Calcification</span>
                                                                        <div class="ravesh-form-control-indicator">
                                                                        </div>
                                                                    </div>
                                                                </label></div>
                                                            <div class="item"><label style="display: block;"
                                                                    class="ravesh-form-control ravesh-form-control-checkbox type-classic"
                                                                    for="idz85rrn95x4"><input id="idz85rrn95x4"
                                                                        name="condition[]" v-model="form.condition" type="checkbox"
                                                                        value="Thrombus">
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
                                                                                    id="idrf9tisykyf"
                                                                                    name="LM_ostial[]"
                                                                                    v-model="form.LM_ostial"
                                                                                    type="checkbox" ch="false"
                                                                                    value="20_30">
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
                                                                                    id="iduijls68pcb"
                                                                                    name="LM_ostial[]"
                                                                                    v-model="form.LM_ostial"
                                                                                    type="checkbox" ch="false"
                                                                                    value="30_40">
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
                                                                                    id="id3p4k29xpvz"
                                                                                    name="LM_ostial[]"
                                                                                    v-model="form.LM_ostial"
                                                                                    type="checkbox" ch="false"
                                                                                    value="50_70">
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
                                                                                    id="id7eohlru7ta"
                                                                                    name="LM_ostial[]"
                                                                                    v-model="form.LM_ostial"
                                                                                    type="checkbox" ch="false"
                                                                                    value="70_80">
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
                                                                                    id="ide5lx01ba18"
                                                                                    name="LM_ostial[]"
                                                                                    v-model="form.LM_ostial"
                                                                                    type="checkbox" ch="false"
                                                                                    value="80_90">
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
                                                                                    id="idiwkp4yoo0y"
                                                                                    name="LM_ostial[]"
                                                                                    v-model="form.LM_ostial"
                                                                                    type="checkbox" ch="false"
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
                                                                                for="idpeyz3whs5e"><input
                                                                                    id="idpeyz3whs5e"
                                                                                    name="LM_ostial[]"
                                                                                    v-model="form.LM_ostial"
                                                                                    type="checkbox" ch="false"
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
                                                                                for="idq3zb2lmnho"><input
                                                                                    id="idq3zb2lmnho"
                                                                                    name="LM_ostial[]"
                                                                                    v-model="form.LM_ostial"
                                                                                    type="checkbox" ch="false"
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
                                                                                for="id90zxjqcxh9"><input
                                                                                    id="id90zxjqcxh9"
                                                                                    name="LM_ostial[]"
                                                                                    v-model="form.LM_ostial"
                                                                                    type="checkbox" ch="false"
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
                                                                                for="idngenuj51f8"><input
                                                                                    id="idngenuj51f8"
                                                                                    name="LM_ostial[]"
                                                                                    v-model="form.LM_ostial"
                                                                                    type="checkbox" ch="false"
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
                                                                                for="idyhuisv1bwn"><input
                                                                                    id="idyhuisv1bwn"
                                                                                    name="LM_ostial[]"
                                                                                    v-model="form.LM_ostial"
                                                                                    type="checkbox" ch="false"
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
                                                                                for="idknxhg3yhxl"><input
                                                                                    id="idknxhg3yhxl"
                                                                                    name="LM_ostial[]"
                                                                                    v-model="form.LM_ostial"
                                                                                    type="checkbox" ch="false"
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
                                                                        <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;"
                                                                            class=""><label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idwedmmfunwq"><input
                                                                                    id="idwedmmfunwq"
                                                                                    name="LM_proximal[]"
                                                                                    v-model="form.LM_proximal"
                                                                                    type="checkbox" ch="false"
                                                                                    value="20_30">
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
                                                                                    type="checkbox" ch="false"
                                                                                    value="30_40">
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
                                                                                    type="checkbox" ch="false"
                                                                                    value="50_70">
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
                                                                                    type="checkbox" ch="false"
                                                                                    value="70_80">
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
                                                                                    type="checkbox" ch="false"
                                                                                    value="80_90">
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
                                                                                    type="checkbox" ch="false"
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
                                                                                for="idr2ipb01qk"><input
                                                                                    id="idr2ipb01qk"
                                                                                    name="LM_proximal[]"
                                                                                    v-model="form.LM_proximal"
                                                                                    type="checkbox" ch="false"
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
                                                                                for="id2uebkysfzd"><input
                                                                                    id="id2uebkysfzd"
                                                                                    name="LM_proximal[]"
                                                                                    v-model="form.LM_proximal"
                                                                                    type="checkbox" ch="false"
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
                                                                                for="idkfianpezzm"><input
                                                                                    id="idkfianpezzm"
                                                                                    name="LM_proximal[]"
                                                                                    v-model="form.LM_proximal"
                                                                                    type="checkbox" ch="false"
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
                                                                                for="idy82tuveoyl"><input
                                                                                    id="idy82tuveoyl"
                                                                                    name="LM_proximal[]"
                                                                                    v-model="form.LM_proximal"
                                                                                    type="checkbox" ch="false"
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
                                                                                for="id466ltkht1t"><input
                                                                                    id="id466ltkht1t"
                                                                                    name="LM_proximal[]"
                                                                                    v-model="form.LM_proximal"
                                                                                    type="checkbox" ch="false"
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
                                                                                for="idp5qiwgu0vv"><input
                                                                                    id="idp5qiwgu0vv"
                                                                                    name="LM_proximal[]"
                                                                                    v-model="form.LM_proximal"
                                                                                    type="checkbox" ch="false"
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
                                                                            Mid portion</td>
                                                                        <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;"
                                                                            class=""><label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id1fwos3nx8f"><input
                                                                                    id="id1fwos3nx8f"
                                                                                    name="LM_mid[]"
                                                                                    v-model="form.LM_mid"
                                                                                    type="checkbox" ch="false"
                                                                                    value="20_30">
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
                                                                                    id="id4nhdukp96q"
                                                                                    name="LM_mid[]"
                                                                                    v-model="form.LM_mid"
                                                                                    type="checkbox" ch="false"
                                                                                    value="30_40">
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
                                                                                    id="idlhft5jk8jl"
                                                                                    name="LM_mid[]"
                                                                                    v-model="form.LM_mid"
                                                                                    type="checkbox" ch="false"
                                                                                    value="50_70">
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
                                                                                    id="id063zfbe5bg"
                                                                                    name="LM_mid[]"
                                                                                    v-model="form.LM_mid"
                                                                                    type="checkbox" ch="false"
                                                                                    value="70_80">
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
                                                                                    id="iddxz684goth"
                                                                                    name="LM_mid[]"
                                                                                    v-model="form.LM_mid"
                                                                                    type="checkbox" ch="false"
                                                                                    value="80_90">
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
                                                                                    id="idz4f64g0ih9"
                                                                                    name="LM_mid[]"
                                                                                    v-model="form.LM_mid"
                                                                                    type="checkbox" ch="false"
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
                                                                                for="idwt1adco4mt"><input
                                                                                    id="idwt1adco4mt"
                                                                                    name="LM_mid[]"
                                                                                    v-model="form.LM_mid"
                                                                                    type="checkbox" ch="false"
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
                                                                                for="idckm6fw16ym"><input
                                                                                    id="idckm6fw16ym"
                                                                                    name="LM_mid[]"
                                                                                    v-model="form.LM_mid"
                                                                                    type="checkbox" ch="false"
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
                                                                                for="idjssl0a13ym"><input
                                                                                    id="idjssl0a13ym"
                                                                                    name="LM_mid[]"
                                                                                    v-model="form.LM_mid"
                                                                                    type="checkbox" ch="false"
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
                                                                                for="id0rrpiclvy7"><input
                                                                                    id="id0rrpiclvy7"
                                                                                    name="LM_mid[]"
                                                                                    v-model="form.LM_mid"
                                                                                    type="checkbox" ch="false"
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
                                                                                for="idzwrn61vgc8"><input
                                                                                    id="idzwrn61vgc8"
                                                                                    name="LM_mid[]"
                                                                                    v-model="form.LM_mid"
                                                                                    type="checkbox" ch="false"
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
                                                                                for="idefparr0vhx"><input
                                                                                    id="idefparr0vhx"
                                                                                    name="LM_mid[]"
                                                                                    v-model="form.LM_mid"
                                                                                    type="checkbox" ch="false"
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
                                                                        <td style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;"
                                                                            class=""><label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idwrpw6js4fd"><input
                                                                                    id="idwrpw6js4fd"
                                                                                    name="LM_distal[]"
                                                                                    v-model="form.LM_distal"
                                                                                    type="checkbox" ch="false"
                                                                                    value="20_30">
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
                                                                                    id="id673r85ft2n"
                                                                                    name="LM_distal[]"
                                                                                    v-model="form.LM_distal"
                                                                                    type="checkbox" ch="false"
                                                                                    value="30_40">
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
                                                                                    id="idj1gv6i9fd5"
                                                                                    name="LM_distal[]"
                                                                                    v-model="form.LM_distal"
                                                                                    type="checkbox" ch="false"
                                                                                    value="50_70">
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
                                                                                    id="idvb8wsq1uki"
                                                                                    name="LM_distal[]"
                                                                                    v-model="form.LM_distal"
                                                                                    type="checkbox" ch="false"
                                                                                    value="70_80">
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
                                                                                    id="idj60bq5nsqj"
                                                                                    name="LM_distal[]"
                                                                                    v-model="form.LM_distal"
                                                                                    type="checkbox" ch="false"
                                                                                    value="80_90">
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
                                                                                    id="id8twjj4ycid"
                                                                                    name="LM_distal[]"
                                                                                    v-model="form.LM_distal"
                                                                                    type="checkbox" ch="false"
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
                                                                                for="id3tyly3mj7d"><input
                                                                                    id="id3tyly3mj7d"
                                                                                    name="LM_distal[]"
                                                                                    v-model="form.LM_distal"
                                                                                    type="checkbox" ch="false"
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
                                                                                for="id4wo752w2zm"><input
                                                                                    id="id4wo752w2zm"
                                                                                    name="LM_distal[]"
                                                                                    v-model="form.LM_distal"
                                                                                    type="checkbox" ch="false"
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
                                                                                for="idc5v58eb92k"><input
                                                                                    id="idc5v58eb92k"
                                                                                    name="LM_distal[]"
                                                                                    v-model="form.LM_distal"
                                                                                    type="checkbox" ch="false"
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
                                                                                for="idnq26h5my1s"><input
                                                                                    id="idnq26h5my1s"
                                                                                    name="LM_distal[]"
                                                                                    v-model="form.LM_distal"
                                                                                    type="checkbox" ch="false"
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
                                                                                for="id5x58ceekqw"><input
                                                                                    id="id5x58ceekqw"
                                                                                    name="LM_distal[]"
                                                                                    v-model="form.LM_distal"
                                                                                    type="checkbox" ch="false"
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
                                                                                for="idwfdb3069ya"><input
                                                                                    id="idwfdb3069ya"
                                                                                    name="LM_distal[]"
                                                                                    v-model="form.LM_distal"
                                                                                    type="checkbox" ch="false"
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
                                                        Main (LM)</span></div>
                                                <div class="wrapper" style="display: block;">
                                                    <div>
                                                        <div><textarea placeholder="" name="left_main_description" v-model="form.left_main_description" rows="2" maxlength="1000"
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
                                                                                    name="LAD_ostial[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                    name="LAD_ostial[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                    name="LAD_ostial[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                    name="LAD_ostial[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                    name="LAD_ostial[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                    name="LAD_ostial[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                    name="LAD_ostial[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                    name="LAD_ostial[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                    name="LAD_ostial[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                    name="LAD_ostial[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                    name="LAD_ostial[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                    name="LAD_ostial[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                    name="LAD_proximal[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                for="idb89l4usrov"><input
                                                                                    id="idb89l4usrov"
                                                                                    name="LAD_proximal[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                for="idlku0htt7s4"><input
                                                                                    id="idlku0htt7s4"
                                                                                    name="LAD_proximal[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                for="id96lr0pn6km"><input
                                                                                    id="id96lr0pn6km"
                                                                                    name="LAD_proximal[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                for="id9ygbyonczh"><input
                                                                                    id="id9ygbyonczh"
                                                                                    name="LAD_proximal[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                for="idtanp0l71n"><input
                                                                                    id="idtanp0l71n"
                                                                                    name="LAD_proximal[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                for="idixzzmqii02"><input
                                                                                    id="idixzzmqii02"
                                                                                    name="LAD_proximal[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                for="idoyr0bhwpnd"><input
                                                                                    id="idoyr0bhwpnd"
                                                                                    name="LAD_proximal[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                for="id4o0g9z2z4"><input
                                                                                    id="id4o0g9z2z4"
                                                                                    name="LAD_proximal[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                for="id9intto3ren"><input
                                                                                    id="id9intto3ren"
                                                                                    name="LAD_proximal[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                for="idp3dq9ld7i6"><input
                                                                                    id="idp3dq9ld7i6"
                                                                                    name="LAD_proximal[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                for="id77ztgihftx"><input
                                                                                    id="id77ztgihftx"
                                                                                    name="LAD_proximal[]"
                                                                                    type="checkbox" ch="false"
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
                                                                            Mid portion</td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id3xbvcwdg89"><input
                                                                                    id="id3xbvcwdg89"
                                                                                    name="LAD_mid[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                    name="LAD_mid[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                    name="LAD_mid[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                    name="LAD_mid[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                    name="LAD_mid[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                    name="LAD_mid[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                    name="LAD_mid[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                    name="LAD_mid[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                    name="LAD_mid[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                    name="LAD_mid[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                    name="LAD_mid[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                    name="LAD_mid[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                    name="LAD_distal[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                    name="LAD_distal[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                    name="LAD_distal[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                    name="LAD_distal[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                    name="LAD_distal[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                    name="LAD_distal[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                    name="LAD_distal[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                    name="LAD_distal[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                    name="LAD_distal[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                    name="LAD_distal[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                    name="LAD_distal[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                    name="LAD_distal[]"
                                                                                    type="checkbox" ch="false"
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12858_12862">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12858_12863">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12858_12864">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12858_12865">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12858_12866">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12858_12867">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12858_12868">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12858_12869">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12858_12870">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12858_12871">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12858_12872">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12858_12873">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12859_12862">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12859_12863">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12859_12864">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12859_12865">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12859_12866">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12859_12867">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12859_12868">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12859_12869">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12859_12870">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12859_12871">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12859_12872">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12859_12873">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12860_12862">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12860_12863">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12860_12864">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12860_12865">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12860_12866">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12860_12867">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12860_12868">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12860_12869">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12860_12870">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12860_12871">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12860_12872">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12860_12873">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12861_12862">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12861_12863">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12861_12864">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12861_12865">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12861_12866">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12861_12867">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12861_12868">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12861_12869">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12861_12870">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12861_12871">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12861_12872">
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
                                                                                    name="namezr0w5mihfn"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12861_12873">
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
                                                        <div><textarea placeholder="" rows="2" maxlength="1000"
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
                                                                        <td class="row-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Ostial portion</td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idoqihprh5bx"><input
                                                                                    id="idoqihprh5bx"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12874_12878">
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
                                                                                for="idhar1svy9h0"><input
                                                                                    id="idhar1svy9h0"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12874_12879">
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
                                                                                for="idfy2ha0smw0"><input
                                                                                    id="idfy2ha0smw0"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12874_12880">
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
                                                                                for="idja2jqwdrhz"><input
                                                                                    id="idja2jqwdrhz"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12874_12881">
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
                                                                                for="idkh0vqeawn2"><input
                                                                                    id="idkh0vqeawn2"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12874_12882">
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
                                                                                for="id0q2qpvw6uc"><input
                                                                                    id="id0q2qpvw6uc"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12874_12883">
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
                                                                                for="idh1iz1qcxno"><input
                                                                                    id="idh1iz1qcxno"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12874_12884">
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
                                                                                for="idfypcy0xwxe"><input
                                                                                    id="idfypcy0xwxe"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12874_12885">
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
                                                                                for="idn2i0temcm3"><input
                                                                                    id="idn2i0temcm3"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12874_12886">
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
                                                                                for="iddeilqj2fo6"><input
                                                                                    id="iddeilqj2fo6"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12874_12887">
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
                                                                                for="idh74cg6niyu"><input
                                                                                    id="idh74cg6niyu"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12874_12888">
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
                                                                                for="idqvxd0i2nhj"><input
                                                                                    id="idqvxd0i2nhj"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12874_12889">
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
                                                                                for="idgjjuklkaat"><input
                                                                                    id="idgjjuklkaat"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12875_12878">
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
                                                                                for="idxbn50wkshi"><input
                                                                                    id="idxbn50wkshi"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12875_12879">
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
                                                                                for="id5blhcsxqg8"><input
                                                                                    id="id5blhcsxqg8"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12875_12880">
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
                                                                                for="idjrh4v17eso"><input
                                                                                    id="idjrh4v17eso"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12875_12881">
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
                                                                                for="idxf9h3xsob6"><input
                                                                                    id="idxf9h3xsob6"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12875_12882">
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
                                                                                for="idutk858f0m2"><input
                                                                                    id="idutk858f0m2"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12875_12883">
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
                                                                                for="id8pk4ezrtl2"><input
                                                                                    id="id8pk4ezrtl2"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12875_12884">
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
                                                                                for="id1yzz5zvjii"><input
                                                                                    id="id1yzz5zvjii"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12875_12885">
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
                                                                                for="idavmokv5jwg"><input
                                                                                    id="idavmokv5jwg"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12875_12886">
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
                                                                                for="idazarfgc2xw"><input
                                                                                    id="idazarfgc2xw"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12875_12887">
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
                                                                                for="idvpnj9dqi8f"><input
                                                                                    id="idvpnj9dqi8f"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12875_12888">
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
                                                                                for="idjiyrqci9mc"><input
                                                                                    id="idjiyrqci9mc"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12875_12889">
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
                                                                                for="idjzumn4szev"><input
                                                                                    id="idjzumn4szev"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12876_12878">
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
                                                                                for="idye3z663xmn"><input
                                                                                    id="idye3z663xmn"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12876_12879">
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
                                                                                for="id8gpx8ut8cl"><input
                                                                                    id="id8gpx8ut8cl"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12876_12880">
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
                                                                                for="id7xahcthu1d"><input
                                                                                    id="id7xahcthu1d"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12876_12881">
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
                                                                                for="idwj2a83r192"><input
                                                                                    id="idwj2a83r192"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12876_12882">
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
                                                                                for="idae1ccb3uy5"><input
                                                                                    id="idae1ccb3uy5"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12876_12883">
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
                                                                                for="idmqcvh6umfs"><input
                                                                                    id="idmqcvh6umfs"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12876_12884">
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
                                                                                for="idc60yqw4q5y"><input
                                                                                    id="idc60yqw4q5y"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12876_12885">
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
                                                                                for="idwi6avn08p6"><input
                                                                                    id="idwi6avn08p6"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12876_12886">
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
                                                                                for="id5rbtwa7ckx"><input
                                                                                    id="id5rbtwa7ckx"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12876_12887">
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
                                                                                for="id9598eqpbye"><input
                                                                                    id="id9598eqpbye"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12876_12888">
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
                                                                                for="idw8ecjjyzy8"><input
                                                                                    id="idw8ecjjyzy8"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12876_12889">
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
                                                                                for="id820mrgki5k"><input
                                                                                    id="id820mrgki5k"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12877_12878">
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
                                                                                for="id42cap2u3t0"><input
                                                                                    id="id42cap2u3t0"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12877_12879">
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
                                                                                for="idi7d1sze4r7"><input
                                                                                    id="idi7d1sze4r7"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12877_12880">
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
                                                                                for="idgsdmi8r7bf"><input
                                                                                    id="idgsdmi8r7bf"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12877_12881">
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
                                                                                for="idtg1mghxqs5"><input
                                                                                    id="idtg1mghxqs5"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12877_12882">
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
                                                                                for="idmrcqym1cja"><input
                                                                                    id="idmrcqym1cja"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12877_12883">
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
                                                                                for="id0j2snpxl1r"><input
                                                                                    id="id0j2snpxl1r"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12877_12884">
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
                                                                                for="idtn0zfvo1cs"><input
                                                                                    id="idtn0zfvo1cs"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12877_12885">
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
                                                                                for="id6ar0j4c9ao"><input
                                                                                    id="id6ar0j4c9ao"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12877_12886">
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
                                                                                for="ids6z4euxl9g"><input
                                                                                    id="ids6z4euxl9g"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12877_12887">
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
                                                                                for="idmcjqqjhm6w"><input
                                                                                    id="idmcjqqjhm6w"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12877_12888">
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
                                                                                for="idvds4y202lw"><input
                                                                                    id="idvds4y202lw"
                                                                                    name="name2mrm2psp9x"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12877_12889">
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
                                                        style="font-size: 11px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">Diagonal.2</span>
                                                </div>
                                                <div class="wrapper" style="display: block;">
                                                    <div>
                                                        <div><textarea placeholder="" rows="2" maxlength="1000"
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
                                                        Circumfles (LCX)</span></div>
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
                                                                                for="idneis3ijx4y"><input
                                                                                    id="idneis3ijx4y"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12890_12894">
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
                                                                                for="idqa205buyds"><input
                                                                                    id="idqa205buyds"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12890_12895">
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
                                                                                for="idv8b4x9xdcc"><input
                                                                                    id="idv8b4x9xdcc"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12890_12896">
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
                                                                                for="idj69syy4zl1"><input
                                                                                    id="idj69syy4zl1"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12890_12897">
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
                                                                                for="id5j5i7uwfb7"><input
                                                                                    id="id5j5i7uwfb7"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12890_12898">
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
                                                                                for="idgkkosq30uy"><input
                                                                                    id="idgkkosq30uy"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12890_12899">
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
                                                                                for="idvpbw3iazwp"><input
                                                                                    id="idvpbw3iazwp"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12890_12900">
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
                                                                                for="idbuvty9eiw9"><input
                                                                                    id="idbuvty9eiw9"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12890_12901">
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
                                                                                for="idcnd9bhrifp"><input
                                                                                    id="idcnd9bhrifp"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12890_12902">
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
                                                                                for="idgnpualnd4y"><input
                                                                                    id="idgnpualnd4y"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12890_12903">
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
                                                                                for="idpgzpbrcy42"><input
                                                                                    id="idpgzpbrcy42"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12890_12904">
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
                                                                                for="idizwqh3wivb"><input
                                                                                    id="idizwqh3wivb"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12890_12905">
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
                                                                                for="id6k5cstxiak"><input
                                                                                    id="id6k5cstxiak"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12891_12894">
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
                                                                                for="idus5zc2dq8b"><input
                                                                                    id="idus5zc2dq8b"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12891_12895">
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
                                                                                for="idsg44fti8db"><input
                                                                                    id="idsg44fti8db"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12891_12896">
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
                                                                                for="idgneebpbj9o"><input
                                                                                    id="idgneebpbj9o"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12891_12897">
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
                                                                                for="idhpk0tvpvjq"><input
                                                                                    id="idhpk0tvpvjq"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12891_12898">
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
                                                                                for="idd71u02euxu"><input
                                                                                    id="idd71u02euxu"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12891_12899">
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
                                                                                for="id4c3htwc6gp"><input
                                                                                    id="id4c3htwc6gp"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12891_12900">
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
                                                                                for="idsj7zsqbpqo"><input
                                                                                    id="idsj7zsqbpqo"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12891_12901">
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
                                                                                for="iddzb0fb9r6y"><input
                                                                                    id="iddzb0fb9r6y"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12891_12902">
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
                                                                                for="id7sgo7319ib"><input
                                                                                    id="id7sgo7319ib"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12891_12903">
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
                                                                                for="id1anuaazjog"><input
                                                                                    id="id1anuaazjog"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12891_12904">
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
                                                                                for="idnmww218vvh"><input
                                                                                    id="idnmww218vvh"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12891_12905">
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
                                                                                for="id1t6ekygbnn"><input
                                                                                    id="id1t6ekygbnn"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12892_12894">
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
                                                                                for="id5lhvbi3cbx"><input
                                                                                    id="id5lhvbi3cbx"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12892_12895">
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
                                                                                for="idbc6xw3m4ut"><input
                                                                                    id="idbc6xw3m4ut"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12892_12896">
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
                                                                                for="id3zbas7um9m"><input
                                                                                    id="id3zbas7um9m"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12892_12897">
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
                                                                                for="idwcfuk1qwz0"><input
                                                                                    id="idwcfuk1qwz0"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12892_12898">
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
                                                                                for="idbb6e7gxglx"><input
                                                                                    id="idbb6e7gxglx"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12892_12899">
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
                                                                                for="idpz7hhm4iul"><input
                                                                                    id="idpz7hhm4iul"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12892_12900">
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
                                                                                for="ids3g5cuqwsz"><input
                                                                                    id="ids3g5cuqwsz"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12892_12901">
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
                                                                                for="ida3t63r0zhj"><input
                                                                                    id="ida3t63r0zhj"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12892_12902">
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
                                                                                for="idl2y6xyd9pr"><input
                                                                                    id="idl2y6xyd9pr"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12892_12903">
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
                                                                                for="idvco5130d4l"><input
                                                                                    id="idvco5130d4l"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12892_12904">
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
                                                                                for="idgmqvxm3gew"><input
                                                                                    id="idgmqvxm3gew"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12892_12905">
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
                                                                                for="idkc39se4myc"><input
                                                                                    id="idkc39se4myc"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12893_12894">
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
                                                                                for="id7k6snrtmom"><input
                                                                                    id="id7k6snrtmom"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12893_12895">
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
                                                                                for="id8nociw8rqm"><input
                                                                                    id="id8nociw8rqm"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12893_12896">
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
                                                                                for="id26sbxsnxr7"><input
                                                                                    id="id26sbxsnxr7"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12893_12897">
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
                                                                                for="idzkf71b2zym"><input
                                                                                    id="idzkf71b2zym"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12893_12898">
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
                                                                                for="id1jrot1ot0b"><input
                                                                                    id="id1jrot1ot0b"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12893_12899">
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
                                                                                for="id5e2zpx101q"><input
                                                                                    id="id5e2zpx101q"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12893_12900">
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
                                                                                for="idx07u8td1zy"><input
                                                                                    id="idx07u8td1zy"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12893_12901">
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
                                                                                for="idw8i4om40n5"><input
                                                                                    id="idw8i4om40n5"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12893_12902">
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
                                                                                for="id0e24k7hvya"><input
                                                                                    id="id0e24k7hvya"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12893_12903">
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
                                                                                for="ideptbm2kdvf"><input
                                                                                    id="ideptbm2kdvf"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12893_12904">
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
                                                                                for="idlw8lk4pdyo"><input
                                                                                    id="idlw8lk4pdyo"
                                                                                    name="namegijb5kfm7e"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12893_12905">
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
                                                        Circumfles (LCX)</span></div>
                                                <div class="wrapper" style="display: block;">
                                                    <div>
                                                        <div><textarea placeholder="" rows="2" maxlength="1000"
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
                                                                        <td class="row-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Ostial portion</td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idedqfxhs57y"><input
                                                                                    id="idedqfxhs57y"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12906_12910">
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
                                                                                for="idx63kaq1eut"><input
                                                                                    id="idx63kaq1eut"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12906_12911">
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
                                                                                for="idsjvckqjcdw"><input
                                                                                    id="idsjvckqjcdw"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12906_12912">
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
                                                                                for="id4a9jg15nmq"><input
                                                                                    id="id4a9jg15nmq"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12906_12913">
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
                                                                                for="idsj3vvqsntn"><input
                                                                                    id="idsj3vvqsntn"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12906_12914">
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
                                                                                for="ideyr62u6w5h"><input
                                                                                    id="ideyr62u6w5h"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12906_12915">
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
                                                                                for="id0dl1ag529k"><input
                                                                                    id="id0dl1ag529k"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12906_12916">
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
                                                                                for="idspk482pi1s"><input
                                                                                    id="idspk482pi1s"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12906_12917">
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
                                                                                for="idksv1kx5at9"><input
                                                                                    id="idksv1kx5at9"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12906_12918">
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
                                                                                for="id22j6s8a55v"><input
                                                                                    id="id22j6s8a55v"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12906_12919">
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
                                                                                for="id890h3gsujr"><input
                                                                                    id="id890h3gsujr"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12906_12920">
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
                                                                                for="idz50xaqbp0k"><input
                                                                                    id="idz50xaqbp0k"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12906_12921">
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
                                                                                for="id0udkqgaedw"><input
                                                                                    id="id0udkqgaedw"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12907_12910">
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
                                                                                for="id5svezxaoa0"><input
                                                                                    id="id5svezxaoa0"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12907_12911">
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
                                                                                for="idaexhovexgo"><input
                                                                                    id="idaexhovexgo"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12907_12912">
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
                                                                                for="idscjo1kdprr"><input
                                                                                    id="idscjo1kdprr"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12907_12913">
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
                                                                                for="iduap1bhmdss"><input
                                                                                    id="iduap1bhmdss"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12907_12914">
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
                                                                                for="idgsqiwklpyv"><input
                                                                                    id="idgsqiwklpyv"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12907_12915">
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
                                                                                for="idgxl8lk5oaz"><input
                                                                                    id="idgxl8lk5oaz"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12907_12916">
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
                                                                                for="id82vf9pev9c"><input
                                                                                    id="id82vf9pev9c"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12907_12917">
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
                                                                                for="idh6xubp6bs9"><input
                                                                                    id="idh6xubp6bs9"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12907_12918">
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
                                                                                for="idq0wnfkjk37"><input
                                                                                    id="idq0wnfkjk37"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12907_12919">
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
                                                                                for="idafh99m6xuz"><input
                                                                                    id="idafh99m6xuz"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12907_12920">
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
                                                                                for="idhor77iilp2"><input
                                                                                    id="idhor77iilp2"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12907_12921">
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
                                                                                for="idaasawa2a6e"><input
                                                                                    id="idaasawa2a6e"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12908_12910">
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
                                                                                for="id4s7xe6a27l"><input
                                                                                    id="id4s7xe6a27l"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12908_12911">
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
                                                                                for="ide3srrkywan"><input
                                                                                    id="ide3srrkywan"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12908_12912">
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
                                                                                for="id1q46yr5ecm"><input
                                                                                    id="id1q46yr5ecm"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12908_12913">
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
                                                                                for="id5obidf29g6"><input
                                                                                    id="id5obidf29g6"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12908_12914">
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
                                                                                for="idbl5xavjxnf"><input
                                                                                    id="idbl5xavjxnf"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12908_12915">
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
                                                                                for="idqph8lezw4j"><input
                                                                                    id="idqph8lezw4j"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12908_12916">
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
                                                                                for="ida0onfzz9ec"><input
                                                                                    id="ida0onfzz9ec"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12908_12917">
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
                                                                                for="idnu6yb4u60r"><input
                                                                                    id="idnu6yb4u60r"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12908_12918">
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
                                                                                for="idyw78yzsogo"><input
                                                                                    id="idyw78yzsogo"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12908_12919">
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
                                                                                for="idzae5j106sn"><input
                                                                                    id="idzae5j106sn"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12908_12920">
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
                                                                                for="idb7dzly0wzh"><input
                                                                                    id="idb7dzly0wzh"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12908_12921">
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
                                                                                for="id1ddibm97zq"><input
                                                                                    id="id1ddibm97zq"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12909_12910">
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
                                                                                for="id0he69y579z"><input
                                                                                    id="id0he69y579z"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12909_12911">
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
                                                                                for="id8e0v0spidx"><input
                                                                                    id="id8e0v0spidx"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12909_12912">
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
                                                                                for="idflvgxegcfn"><input
                                                                                    id="idflvgxegcfn"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12909_12913">
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
                                                                                for="idfpdpq9hgef"><input
                                                                                    id="idfpdpq9hgef"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12909_12914">
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
                                                                                for="idv0l1igkqa5"><input
                                                                                    id="idv0l1igkqa5"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12909_12915">
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
                                                                                for="idx5gfix23qa"><input
                                                                                    id="idx5gfix23qa"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12909_12916">
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
                                                                                for="idz6zh3dlqzf"><input
                                                                                    id="idz6zh3dlqzf"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12909_12917">
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
                                                                                for="id3abntai2no"><input
                                                                                    id="id3abntai2no"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12909_12918">
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
                                                                                for="idn48be071bj"><input
                                                                                    id="idn48be071bj"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12909_12919">
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
                                                                                for="iduckj6uivin"><input
                                                                                    id="iduckj6uivin"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12909_12920">
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
                                                                                for="idnq5b1ty0yt"><input
                                                                                    id="idnq5b1ty0yt"
                                                                                    name="nameajea7obye8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12909_12921">
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
                                                        style="font-size: 11px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">OM1</span>
                                                </div>
                                                <div class="wrapper" style="display: block;">
                                                    <div>
                                                        <div><textarea placeholder="" rows="2" maxlength="1000"
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
                                                                        <td class="row-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Ostial portion</td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="idaxhveiomir"><input
                                                                                    id="idaxhveiomir"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12922_12926">
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
                                                                                for="id51d37yfhue"><input
                                                                                    id="id51d37yfhue"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12922_12927">
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
                                                                                for="idzk3zw35mek"><input
                                                                                    id="idzk3zw35mek"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12922_12928">
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
                                                                                for="idafwgggx98q"><input
                                                                                    id="idafwgggx98q"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12922_12929">
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
                                                                                for="idmvhl933dzc"><input
                                                                                    id="idmvhl933dzc"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12922_12930">
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
                                                                                for="idf3nctalj4m"><input
                                                                                    id="idf3nctalj4m"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12922_12931">
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
                                                                                for="id2ued7naukr"><input
                                                                                    id="id2ued7naukr"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12922_12932">
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
                                                                                for="idybld1c9vt6"><input
                                                                                    id="idybld1c9vt6"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12922_12933">
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
                                                                                for="idl6tywjoh7k"><input
                                                                                    id="idl6tywjoh7k"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12922_12934">
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
                                                                                for="id3ivs01ro92"><input
                                                                                    id="id3ivs01ro92"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12922_12935">
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
                                                                                for="id90oorjf11w"><input
                                                                                    id="id90oorjf11w"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12922_12936">
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
                                                                                for="idzp6hqv9fu9"><input
                                                                                    id="idzp6hqv9fu9"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12922_12937">
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
                                                                                for="idxtbwuwrj8s"><input
                                                                                    id="idxtbwuwrj8s"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12923_12926">
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
                                                                                for="idrbwka5w1m8"><input
                                                                                    id="idrbwka5w1m8"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12923_12927">
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
                                                                                for="id2m252h4n4j"><input
                                                                                    id="id2m252h4n4j"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12923_12928">
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
                                                                                for="idnqdnq4r4w2"><input
                                                                                    id="idnqdnq4r4w2"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12923_12929">
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
                                                                                for="id8y1fzilyun"><input
                                                                                    id="id8y1fzilyun"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12923_12930">
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
                                                                                for="idtdveq72hll"><input
                                                                                    id="idtdveq72hll"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12923_12931">
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
                                                                                for="idsyakwoe44o"><input
                                                                                    id="idsyakwoe44o"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12923_12932">
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
                                                                                for="id0kaskymo1t"><input
                                                                                    id="id0kaskymo1t"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12923_12933">
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
                                                                                for="idfns2tj4o8n"><input
                                                                                    id="idfns2tj4o8n"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12923_12934">
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
                                                                                for="idzuihs2rdqc"><input
                                                                                    id="idzuihs2rdqc"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12923_12935">
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
                                                                                for="idwtcri15zdx"><input
                                                                                    id="idwtcri15zdx"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12923_12936">
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
                                                                                for="idwxj3kkk97s"><input
                                                                                    id="idwxj3kkk97s"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12923_12937">
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
                                                                                for="iderlz8vtmri"><input
                                                                                    id="iderlz8vtmri"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12924_12926">
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
                                                                                for="idriq5l8prit"><input
                                                                                    id="idriq5l8prit"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12924_12927">
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
                                                                                for="idgwsz4ar0ip"><input
                                                                                    id="idgwsz4ar0ip"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12924_12928">
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
                                                                                for="idmwt95xt255"><input
                                                                                    id="idmwt95xt255"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12924_12929">
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
                                                                                for="id89v9zylyk8"><input
                                                                                    id="id89v9zylyk8"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12924_12930">
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
                                                                                for="idzddrm6lap6"><input
                                                                                    id="idzddrm6lap6"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12924_12931">
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
                                                                                for="idqgj7jvvmrt"><input
                                                                                    id="idqgj7jvvmrt"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12924_12932">
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
                                                                                for="idbpyq0b0lo1"><input
                                                                                    id="idbpyq0b0lo1"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12924_12933">
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
                                                                                for="ideef49drgbj"><input
                                                                                    id="ideef49drgbj"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12924_12934">
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
                                                                                for="id99pt7dv76a"><input
                                                                                    id="id99pt7dv76a"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12924_12935">
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
                                                                                for="idzw4w0zzo4y"><input
                                                                                    id="idzw4w0zzo4y"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12924_12936">
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
                                                                                for="idr4ynq1m5o2"><input
                                                                                    id="idr4ynq1m5o2"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12924_12937">
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
                                                                                for="iddruayrve5b"><input
                                                                                    id="iddruayrve5b"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12925_12926">
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
                                                                                for="id1bm85xdi6v"><input
                                                                                    id="id1bm85xdi6v"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12925_12927">
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
                                                                                for="idp9l6nzqr40"><input
                                                                                    id="idp9l6nzqr40"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12925_12928">
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
                                                                                for="idgwglo0292y"><input
                                                                                    id="idgwglo0292y"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12925_12929">
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
                                                                                for="idd90nbfgo3u"><input
                                                                                    id="idd90nbfgo3u"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12925_12930">
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
                                                                                for="id4o7srqaodf"><input
                                                                                    id="id4o7srqaodf"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12925_12931">
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
                                                                                for="idsymh4sle5i"><input
                                                                                    id="idsymh4sle5i"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12925_12932">
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
                                                                                for="id2yr4ftlcuy"><input
                                                                                    id="id2yr4ftlcuy"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12925_12933">
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
                                                                                for="idrwki4pk2ji"><input
                                                                                    id="idrwki4pk2ji"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12925_12934">
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
                                                                                for="idpo5stvkl65"><input
                                                                                    id="idpo5stvkl65"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12925_12935">
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
                                                                                for="idk42tnx2j3l"><input
                                                                                    id="idk42tnx2j3l"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12925_12936">
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
                                                                                for="id62k7obhabp"><input
                                                                                    id="id62k7obhabp"
                                                                                    name="namejzlte3918r"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12925_12937">
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
                                                        style="font-size: 11px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">OM2</span>
                                                </div>
                                                <div class="wrapper" style="display: block;">
                                                    <div>
                                                        <div><textarea placeholder="" rows="2" maxlength="1000"
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
                                                                        <td class="row-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Ostial portion</td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id8tpnkhqx8h"><input
                                                                                    id="id8tpnkhqx8h"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12938_12942">
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
                                                                                for="ido37nejiaet"><input
                                                                                    id="ido37nejiaet"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12938_12943">
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
                                                                                for="id9txa6kaucx"><input
                                                                                    id="id9txa6kaucx"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12938_12944">
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
                                                                                for="id8g4v3szf77"><input
                                                                                    id="id8g4v3szf77"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12938_12945">
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
                                                                                for="id63j7jntsgy"><input
                                                                                    id="id63j7jntsgy"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12938_12946">
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
                                                                                for="idrsrpmjnpk3"><input
                                                                                    id="idrsrpmjnpk3"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12938_12947">
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
                                                                                for="idz4y1fodr9h"><input
                                                                                    id="idz4y1fodr9h"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12938_12948">
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
                                                                                for="id1a6qmbbr9d"><input
                                                                                    id="id1a6qmbbr9d"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12938_12949">
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
                                                                                for="idx69orw4mef"><input
                                                                                    id="idx69orw4mef"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12938_12950">
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
                                                                                for="idhqivpoatd3"><input
                                                                                    id="idhqivpoatd3"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12938_12951">
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
                                                                                for="id52m7momuvb"><input
                                                                                    id="id52m7momuvb"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12938_12952">
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
                                                                                for="idc68a66c8fj"><input
                                                                                    id="idc68a66c8fj"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12938_12953">
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
                                                                                for="idog8icf9w3c"><input
                                                                                    id="idog8icf9w3c"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12939_12942">
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
                                                                                for="idbwbjzngix9"><input
                                                                                    id="idbwbjzngix9"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12939_12943">
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
                                                                                for="idsjhalkxizn"><input
                                                                                    id="idsjhalkxizn"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12939_12944">
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
                                                                                for="idypa9a17lmg"><input
                                                                                    id="idypa9a17lmg"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12939_12945">
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
                                                                                for="idkze3c9wu6v"><input
                                                                                    id="idkze3c9wu6v"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12939_12946">
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
                                                                                for="idh8n6ssx4o4"><input
                                                                                    id="idh8n6ssx4o4"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12939_12947">
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
                                                                                for="idz4bwn5fegq"><input
                                                                                    id="idz4bwn5fegq"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12939_12948">
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
                                                                                for="idjnj9l6h35z"><input
                                                                                    id="idjnj9l6h35z"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12939_12949">
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
                                                                                for="idx9x3ivd52i"><input
                                                                                    id="idx9x3ivd52i"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12939_12950">
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
                                                                                for="idp3hqtfoigp"><input
                                                                                    id="idp3hqtfoigp"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12939_12951">
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
                                                                                for="id9yqdgph93e"><input
                                                                                    id="id9yqdgph93e"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12939_12952">
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
                                                                                for="id8askoqswqh"><input
                                                                                    id="id8askoqswqh"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12939_12953">
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
                                                                                for="idhpcrkjdlho"><input
                                                                                    id="idhpcrkjdlho"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12940_12942">
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
                                                                                for="idlrl50kpip5"><input
                                                                                    id="idlrl50kpip5"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12940_12943">
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
                                                                                for="id9gkzw7oyao"><input
                                                                                    id="id9gkzw7oyao"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12940_12944">
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
                                                                                for="id1bbxmx8ekr"><input
                                                                                    id="id1bbxmx8ekr"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12940_12945">
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
                                                                                for="idjmwh3rruln"><input
                                                                                    id="idjmwh3rruln"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12940_12946">
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
                                                                                for="id9a514hudah"><input
                                                                                    id="id9a514hudah"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12940_12947">
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
                                                                                for="idonyzilx10f"><input
                                                                                    id="idonyzilx10f"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12940_12948">
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
                                                                                for="idy2hvm1aoth"><input
                                                                                    id="idy2hvm1aoth"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12940_12949">
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
                                                                                for="idjstc8fphkx"><input
                                                                                    id="idjstc8fphkx"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12940_12950">
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
                                                                                for="idj725zpax28"><input
                                                                                    id="idj725zpax28"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12940_12951">
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
                                                                                for="idko03itm28i"><input
                                                                                    id="idko03itm28i"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12940_12952">
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
                                                                                for="ids9jbvio9st"><input
                                                                                    id="ids9jbvio9st"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12940_12953">
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
                                                                                for="id8s61gldrhs"><input
                                                                                    id="id8s61gldrhs"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12941_12942">
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
                                                                                for="idvw9m7neiip"><input
                                                                                    id="idvw9m7neiip"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12941_12943">
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
                                                                                for="id22ktky91vh"><input
                                                                                    id="id22ktky91vh"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12941_12944">
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
                                                                                for="idzxfsrpws9k"><input
                                                                                    id="idzxfsrpws9k"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12941_12945">
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
                                                                                for="id3a7lwt75ba"><input
                                                                                    id="id3a7lwt75ba"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12941_12946">
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
                                                                                for="idizjvm27una"><input
                                                                                    id="idizjvm27una"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12941_12947">
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
                                                                                for="id0ueotdt630"><input
                                                                                    id="id0ueotdt630"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12941_12948">
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
                                                                                for="id7aisfaqixe"><input
                                                                                    id="id7aisfaqixe"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12941_12949">
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
                                                                                for="id9xlktrzjh5"><input
                                                                                    id="id9xlktrzjh5"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12941_12950">
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
                                                                                for="idifjmhifs6s"><input
                                                                                    id="idifjmhifs6s"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12941_12951">
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
                                                                                for="idokwdkj8j9e"><input
                                                                                    id="idokwdkj8j9e"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12941_12952">
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
                                                                                for="id41sf5nhg6w"><input
                                                                                    id="id41sf5nhg6w"
                                                                                    name="namegrywri43g5"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12941_12953">
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
                                                        style="font-size: 11px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">RCA</span>
                                                </div>
                                                <div class="wrapper" style="display: block;">
                                                    <div>
                                                        <div><textarea placeholder="" rows="2" maxlength="1000"
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
                                                                        <td class="row-title"
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            Ostial portion</td>
                                                                        <td
                                                                            style="font-size: 10px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">
                                                                            <label
                                                                                class="ravesh-form-control no-text ravesh-form-control-checkbox"
                                                                                for="id8pfe2uyg5n"><input
                                                                                    id="id8pfe2uyg5n"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12954_12958">
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
                                                                                for="idncddxuwbjp"><input
                                                                                    id="idncddxuwbjp"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12954_12959">
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
                                                                                for="idxhlwi66u69"><input
                                                                                    id="idxhlwi66u69"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12954_12960">
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
                                                                                for="idk9fm58ryga"><input
                                                                                    id="idk9fm58ryga"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12954_12961">
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
                                                                                for="idc165v80cop"><input
                                                                                    id="idc165v80cop"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12954_12962">
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
                                                                                for="idbolve4b2nm"><input
                                                                                    id="idbolve4b2nm"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12954_12963">
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
                                                                                for="idfh7wiuqegy"><input
                                                                                    id="idfh7wiuqegy"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12954_12964">
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
                                                                                for="id7yly0d97wo"><input
                                                                                    id="id7yly0d97wo"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12954_12965">
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
                                                                                for="idqdkk85tbcy"><input
                                                                                    id="idqdkk85tbcy"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12954_12966">
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
                                                                                for="idpq2w8z9jmh"><input
                                                                                    id="idpq2w8z9jmh"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12954_12967">
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
                                                                                for="id1n86i5pf3b"><input
                                                                                    id="id1n86i5pf3b"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12954_12968">
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
                                                                                for="idfp61ympmy4"><input
                                                                                    id="idfp61ympmy4"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12954_12969">
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
                                                                                for="idmex4m941ay"><input
                                                                                    id="idmex4m941ay"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12955_12958">
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
                                                                                for="idi1yzcws0qz"><input
                                                                                    id="idi1yzcws0qz"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12955_12959">
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
                                                                                for="idaama50q5hh"><input
                                                                                    id="idaama50q5hh"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12955_12960">
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
                                                                                for="idwtzle0059i"><input
                                                                                    id="idwtzle0059i"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12955_12961">
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
                                                                                for="idljaz8dzkk"><input
                                                                                    id="idljaz8dzkk"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12955_12962">
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
                                                                                for="idwgih41mjn1"><input
                                                                                    id="idwgih41mjn1"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12955_12963">
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
                                                                                for="idk8eornfct5"><input
                                                                                    id="idk8eornfct5"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12955_12964">
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
                                                                                for="idy9o5fq5pkn"><input
                                                                                    id="idy9o5fq5pkn"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12955_12965">
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
                                                                                for="id1wtippxidm"><input
                                                                                    id="id1wtippxidm"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12955_12966">
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
                                                                                for="idw4fis94bbp"><input
                                                                                    id="idw4fis94bbp"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12955_12967">
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
                                                                                for="idxg8gyvdils"><input
                                                                                    id="idxg8gyvdils"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12955_12968">
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
                                                                                for="id0fwrny6cac"><input
                                                                                    id="id0fwrny6cac"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12955_12969">
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
                                                                                for="idlyu0p76d37"><input
                                                                                    id="idlyu0p76d37"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12956_12958">
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
                                                                                for="id9hbxt22ptk"><input
                                                                                    id="id9hbxt22ptk"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12956_12959">
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
                                                                                for="idhfjbeaanmf"><input
                                                                                    id="idhfjbeaanmf"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12956_12960">
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
                                                                                for="idu6hmqgdm33"><input
                                                                                    id="idu6hmqgdm33"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12956_12961">
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
                                                                                for="id0gypink0xq"><input
                                                                                    id="id0gypink0xq"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12956_12962">
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
                                                                                for="id3qknddf7ox"><input
                                                                                    id="id3qknddf7ox"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12956_12963">
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
                                                                                for="idpklxzs6ta5"><input
                                                                                    id="idpklxzs6ta5"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12956_12964">
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
                                                                                for="idx1ygyq1b9m"><input
                                                                                    id="idx1ygyq1b9m"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12956_12965">
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
                                                                                for="idmjvgxgaki8"><input
                                                                                    id="idmjvgxgaki8"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12956_12966">
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
                                                                                for="id3yi90s5dp1"><input
                                                                                    id="id3yi90s5dp1"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12956_12967">
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
                                                                                for="idkdf6w7s0rv"><input
                                                                                    id="idkdf6w7s0rv"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12956_12968">
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
                                                                                for="idqu6frg40ow"><input
                                                                                    id="idqu6frg40ow"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12956_12969">
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
                                                                                for="idj2qbmllyk0"><input
                                                                                    id="idj2qbmllyk0"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12957_12958">
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
                                                                                for="idfjeusidqqg"><input
                                                                                    id="idfjeusidqqg"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12957_12959">
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
                                                                                for="idu26l7dvw7m"><input
                                                                                    id="idu26l7dvw7m"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12957_12960">
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
                                                                                for="idv7yehcswn4"><input
                                                                                    id="idv7yehcswn4"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12957_12961">
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
                                                                                for="idb67bc4gjxi"><input
                                                                                    id="idb67bc4gjxi"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12957_12962">
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
                                                                                for="id085m7bywvz"><input
                                                                                    id="id085m7bywvz"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12957_12963">
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
                                                                                for="idk6xw33my0l"><input
                                                                                    id="idk6xw33my0l"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12957_12964">
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
                                                                                for="id0f2my4vpn1"><input
                                                                                    id="id0f2my4vpn1"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12957_12965">
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
                                                                                for="idxrd51q966l"><input
                                                                                    id="idxrd51q966l"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12957_12966">
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
                                                                                for="idgwl5nt09uz"><input
                                                                                    id="idgwl5nt09uz"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12957_12967">
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
                                                                                for="id0pgtagdyd5"><input
                                                                                    id="id0pgtagdyd5"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12957_12968">
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
                                                                                for="id5tdvbwy0cz"><input
                                                                                    id="id5tdvbwy0cz"
                                                                                    name="namev74qraczso"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12957_12969">
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
                                                        style="font-size: 11px; color: rgb(0, 0, 0);  font-weight: normal; font-style: unset;">PDA</span>
                                                </div>
                                                <div class="wrapper" style="display: block;">
                                                    <div>
                                                        <div><textarea placeholder="" rows="2" maxlength="1000"
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
                                                                                for="idzsuc65tp09"><input
                                                                                    id="idzsuc65tp09"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12970_12974">
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
                                                                                for="idpiizwefwex"><input
                                                                                    id="idpiizwefwex"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12970_12975">
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
                                                                                for="id4cj6edo3sb"><input
                                                                                    id="id4cj6edo3sb"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12970_12976">
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
                                                                                for="idup1l3wd29f"><input
                                                                                    id="idup1l3wd29f"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12970_12977">
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
                                                                                for="idnifgk2po8s"><input
                                                                                    id="idnifgk2po8s"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12970_12978">
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
                                                                                for="idyqik80nt2r"><input
                                                                                    id="idyqik80nt2r"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12970_12979">
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
                                                                                for="idubdqp6qzlk"><input
                                                                                    id="idubdqp6qzlk"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12970_12980">
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
                                                                                for="ideid1xk2vjm"><input
                                                                                    id="ideid1xk2vjm"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12970_12981">
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
                                                                                for="ide8foxnvnlw"><input
                                                                                    id="ide8foxnvnlw"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12970_12982">
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
                                                                                for="idvyblg7dgm7"><input
                                                                                    id="idvyblg7dgm7"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12970_12983">
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
                                                                                for="id31sc9gnxdv"><input
                                                                                    id="id31sc9gnxdv"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12970_12984">
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
                                                                                for="id41ga0waf4a"><input
                                                                                    id="id41ga0waf4a"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12970_12985">
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
                                                                                for="id3nzox5aoxh"><input
                                                                                    id="id3nzox5aoxh"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12971_12974">
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
                                                                                for="id6s8itusb0k"><input
                                                                                    id="id6s8itusb0k"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12971_12975">
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
                                                                                for="id0pk7qxn3xk"><input
                                                                                    id="id0pk7qxn3xk"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12971_12976">
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
                                                                                for="idoqirjs43s9"><input
                                                                                    id="idoqirjs43s9"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12971_12977">
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
                                                                                for="idd4ydxttbc3"><input
                                                                                    id="idd4ydxttbc3"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12971_12978">
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
                                                                                for="idfohj7lzboy"><input
                                                                                    id="idfohj7lzboy"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12971_12979">
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
                                                                                for="id18btz1wu1v"><input
                                                                                    id="id18btz1wu1v"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12971_12980">
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
                                                                                for="idakknvt1lb8"><input
                                                                                    id="idakknvt1lb8"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12971_12981">
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
                                                                                for="idwfr7cgcgnm"><input
                                                                                    id="idwfr7cgcgnm"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12971_12982">
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
                                                                                for="id1jy7x4895t"><input
                                                                                    id="id1jy7x4895t"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12971_12983">
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
                                                                                for="id5pam6ve48p"><input
                                                                                    id="id5pam6ve48p"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12971_12984">
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
                                                                                for="iddtk2lewddi"><input
                                                                                    id="iddtk2lewddi"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12971_12985">
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
                                                                                for="idxwloqstvr5"><input
                                                                                    id="idxwloqstvr5"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12972_12974">
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
                                                                                for="id5yw7n0iklq"><input
                                                                                    id="id5yw7n0iklq"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12972_12975">
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
                                                                                for="idn7nxgo9c1b"><input
                                                                                    id="idn7nxgo9c1b"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12972_12976">
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
                                                                                for="id5fzeppxs1p"><input
                                                                                    id="id5fzeppxs1p"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12972_12977">
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
                                                                                for="idr64yy5fw5q"><input
                                                                                    id="idr64yy5fw5q"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12972_12978">
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
                                                                                for="idwmtge0unlp"><input
                                                                                    id="idwmtge0unlp"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12972_12979">
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
                                                                                for="idixnxuzh786"><input
                                                                                    id="idixnxuzh786"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12972_12980">
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
                                                                                for="idybbanf3500"><input
                                                                                    id="idybbanf3500"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12972_12981">
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
                                                                                for="id65u81iejxq"><input
                                                                                    id="id65u81iejxq"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12972_12982">
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
                                                                                for="idxfqtl74nu2"><input
                                                                                    id="idxfqtl74nu2"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12972_12983">
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
                                                                                for="idrrko2n8tl1"><input
                                                                                    id="idrrko2n8tl1"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12972_12984">
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
                                                                                for="idicgnyd9cj2"><input
                                                                                    id="idicgnyd9cj2"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12972_12985">
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
                                                                                for="idkow6yi7iz2"><input
                                                                                    id="idkow6yi7iz2"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12973_12974">
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
                                                                                for="idmlw9m4004y"><input
                                                                                    id="idmlw9m4004y"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12973_12975">
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
                                                                                for="idok0748v6ap"><input
                                                                                    id="idok0748v6ap"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12973_12976">
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
                                                                                for="idn7of8rvdt6"><input
                                                                                    id="idn7of8rvdt6"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12973_12977">
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
                                                                                for="idjkdl28irwl"><input
                                                                                    id="idjkdl28irwl"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12973_12978">
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
                                                                                for="idfu53h5e7ic"><input
                                                                                    id="idfu53h5e7ic"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12973_12979">
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
                                                                                for="idmvbjx25b9h"><input
                                                                                    id="idmvbjx25b9h"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12973_12980">
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
                                                                                for="idiuanaq8lml"><input
                                                                                    id="idiuanaq8lml"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12973_12981">
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
                                                                                for="idmppulcck6w"><input
                                                                                    id="idmppulcck6w"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12973_12982">
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
                                                                                for="idac6jetmfpk"><input
                                                                                    id="idac6jetmfpk"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12973_12983">
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
                                                                                for="idz8xpv1khmq"><input
                                                                                    id="idz8xpv1khmq"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12973_12984">
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
                                                                                for="idpq4omrbgzj"><input
                                                                                    id="idpq4omrbgzj"
                                                                                    name="nametr0n88odg8"
                                                                                    type="checkbox" ch="false"
                                                                                    value="12973_12985">
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
                                                        <div><textarea placeholder="" rows="2" maxlength="1000"
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
                    </div>
                </div>
                <div class="flex justify-center mt-16">
                    <vs-button color="success" @click="() => onSubmit('new')" class="mr-3 mb-2" size="large">{{
                        __("Admission")
                        }}</vs-button>
                </div>
            </form>
        </vx-card>
    </div>
</template>
<script>

export default{
    data(){
        return {
            form:{
                name:"",
                age:"",
                physician:"",
                gender:1,
                email:"",
                dominant:"right",
                condition:[],
                left_main_description:"",
                LM_ostial:[],
                LM_proximal:[],
                LM_mid:[],
                LM_distal:[]
            }
        }
    }
}
</script>
<style>
.ravesh-toggle input:checked + .ticon-1{
    background: #03a9f4;
  color: #fff;
}
</style>
