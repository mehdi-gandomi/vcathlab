@php
    use \Modules\Panel\Iracode;
    $builderController=app()->make('Modules\GeneratorBuilder\Http\Controllers\GeneratorBuilderController');
    $filters=$builderController->getAllFilters();
@endphp
<td style="min-width:100px">
    <input type="text" style="width: 100%" required class="form-control txtFieldName"/>
    <input type="text" class="form-control foreignTable txtForeignTable" style="display: none"
           placeholder="Foreign table,Primary key"/>
</td>
<td style="min-width:100px">
    <div class="checkbox" style="text-align: center;direction:ltr;text-align:left">
        <label style="padding-left: 0px">
            <input type="text" class="form-control txtTitle" placeholder=""/>
        </label>
    </div>
</td>
<td style="width:150px" class="dbTypeWrap">
    <select class="form-control txtdbType" style="width: 100%">
        <option value="bigInteger">BigInteger</option>
        <option value="binary">Binary</option>
        <option value="boolean">Boolean</option>
        <option value="char">Char</option>
        <option value="date">Date</option>
        <option value="dateTime">DateTime</option>
        <option value="decimal">Decimal</option>
        <option value="double">Double</option>
        <option value="enum">Enum</option>
        <option value="float">Float</option>
        <option value="increments">Increments</option>
        <option value="integer">Integer</option>
        <option value="json">Json</option>
        <option value="longText">LongText</option>
        <option value="mediumText">MediumText</option>
        <option value="smallint">SmallInteger</option>
        <option value="string">String</option>
        <option value="text">Text</option>
        <option value="tinyInteger">TinyInteger</option>
        <option value="timestamp">Timestamp</option>
    </select>

    <input type="text" class="form-control dbValue txtDbValue" style="display: none"
           placeholder=""/>
</td>
<td style=";max-width: 100px;" class="dbSizeWrap">
    <input type="text" class="form-control txtdbSize"/>
</td>
<td style="direction:ltr;text-align:left">
    <input type="text" class="form-control txtValidation"/>
</td>
<td style="width:100px">
    <select class="form-control drdHtmlType" style="width: 100%">
        <option value="text">Text</option>
        <option value="textarea">TextArea</option>
        <option value="quill">Quill editor</option>
        <option value="email">Email</option>
        <option value="number">Number</option>
        <option value="spin">Spin</option>
        <option value="date">Date</option>
        <option value="datetime">DateTime</option>
        <option value="time">time</option>
        {{--  <option value="file">File</option>  --}}
        <option value="filepond">Filepond</option>
        <option value="filepond_image">Filepond Image</option>
        <option value="password">Password</option>
        <option value="select">Select</option>
        <option value="multi_select">Multi Select</option>
        <option value="selectTable">Select from table</option>
        <option value="radio">Radio</option>
        <option value="checkbox">Checkbox</option>
        <option value="toggle-switch">Toggle</option>
    </select>
    <textarea type="text" class="form-control htmlValue txtHtmlValue" style="display: none" data-field="" placeholder='{
        "key":"value"
}'></textarea>


{{-- "ajax_upload":{
    "path":{{config('ajaxupload.upload_path')}}
} --}}

<button type="button" class="btn btn-primary btn-sm setOptionsButton" style="margin-top: 1rem;display: none" onclick="openOptionsModal(this)" data-field="" data-field-type="" >
    {{Iracode::t("generatorbuilder.Set/Show options")}}
</button>
<button type="button" class="btn btn-primary btn-sm setSelectTableOptionsButton" style="margin-top: 1rem;display: none" onclick="openSelectTableOptionsModal(this)">
    {{Iracode::t("generatorbuilder.Set Table options")}}
</button>
</td>
<td style="width: 150px;">
    <select class="form-control drdFilter" style="width: 100%">
        <optgroup label="New Filter">
            {{--  <option value="new_checkbox">Checkbox</option>  --}}
            <option value="new_date">Date</option>
            <option value="new_datetime">DateTime</option>
            <option value="new_multiselect">Multi Select</option>
            <option value="new_number">Number</option>
            <option value="new_select">Select</option>
            <option value="new_set">Set</option>
            <option value="new_time">Time</option>
            <option value="new_text">Text</option>
        </optgroup>
        <optgroup label="Existing Filter">
            @foreach ($filters as $filter)
                <option value="existing_{{$filter['namespace']}}">{{$filter['name']}}</option>
            @endforeach
        </optgroup>
        {{-- <option value="multi_select">Multi Select</option> --}}
    </select>
    <textarea type="text" class="form-control txtFieldFilterValues" style="display: none" data-field="" placeholder='{
        "key":"value"
}'></textarea>
{{-- "ajax_upload":{
    "path":{{config('ajaxupload.upload_path')}}
} --}}

<button type="button" class="btn btn-primary btn-sm setFilterOptionsButton" style="margin-top: 1rem" onclick="openFieldFiltersOptionsModal(this)" data-field="" data-field-type="" style="display: none">
    {{Iracode::t("generatorbuilder.Set/Show options")}}
</button>
</td>

<td style="">
    <div class="checkbox" style="text-align: center">
        <label style="padding-left: 0px">
            <input type="checkbox" style="margin-left: 0px!important;" class="flat-red chkPrimary"/>
        </label>
    </div>
</td>
{{--  <td style="">
    <div class="checkbox" style="text-align: center">
        <label style="padding-left: 0px">
            <input type="checkbox" style="margin-left: 0px!important;" class="flat-red chkForeign"/>
        </label>
    </div>
</td>  --}}
<td style="">
    <div class="checkbox" style="text-align: center">
        <label style="padding-left: 0px">
            <input type="checkbox" style="margin-left: 0px!important;" class="flat-red chkSearchable" checked/>
        </label>
    </div>
</td>
<td style="">
    <div class="checkbox" style="text-align: center">
        <label style="padding-left: 0px">
            <input type="checkbox" style="margin-left: 0px!important;" class="flat-red chkFillable" checked/>
        </label>
    </div>
</td>
<td style="">
    <div class="checkbox" style="text-align: center">
        <label style="padding-left: 0px">
            <input type="checkbox" style="margin-left: 0px!important;" class="flat-red chkInForm" checked/>
        </label>
    </div>
</td>
<td style="">
    <div class="checkbox" style="text-align: center">
        <label style="padding-left: 0px">
            <input type="checkbox" style="margin-left: 0px!important;" class="flat-red chkInIndex" checked/>
        </label>
    </div>
</td>
<td style="text-align: center;">
    <i onclick="removeItem(this)" class="remove fa fa-trash-o"
       style="cursor: pointer;font-size: 20px;color: red"></i>
</td>

