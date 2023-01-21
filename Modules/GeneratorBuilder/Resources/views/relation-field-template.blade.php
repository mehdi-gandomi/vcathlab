@php
    use \Modules\Panel\Iracode;
    $builderController=app()->make('Modules\GeneratorBuilder\Http\Controllers\GeneratorBuilderController');
    $models=$builderController->getModels();
    $models=array_merge($models,$builderController->getModuleModels());
@endphp
<td style="vertical-align: middle;width:150px">
    <select class="form-control drdRelationType" style="width: 100%">
        <option value="mt1">{{Iracode::t("generatorbuilder.Many to One")}}</option>
        <option value="1t1">{{Iracode::t("generatorbuilder.One to One")}}</option>
        <option value="1tm">{{Iracode::t("generatorbuilder.One to Many")}}</option>
        <option value="mtm">{{Iracode::t("generatorbuilder.Many to Many")}}</option>
    </select>

    <input type="text"  class="form-control foreignTable txtForeignTable" style="display: none"
           placeholder="Custom Table Name"/>
</td>
<td style="vertical-align: middle;width:400px;text-align:left">
    <select class="form-control txtForeignModel" style="width: 100%">

        {{--  @foreach ($models as $model)
            <option value="{{$model['name']}}">{{$model['name']}}</option>
        @endforeach  --}}

        @foreach ($models as $model)
            <option value="{{$model['namespace']}}">{{$model['namespace']}}</option>
        @endforeach
    </select>
</td>
<td style="vertical-align: middle;width:200px;text-align:left">
    <input type="text" style="width: 100%" class="form-control txtForeignKey"/>
</td>
<td style="vertical-align: middle;width:200px;text-align:left">
    <input type="text" class="form-control txtLocalKey"/>
</td>

<td style="vertical-align: middle">
    <div class="checkbox" style="text-align: center">
        <label style="padding-left: 0px">
            <input type="checkbox" style="margin-left: 0px!important;" class="flat-red chkInIndex" checked/>
        </label>
    </div>
</td>
<td style="vertical-align: middle">
    <div class="checkbox" style="text-align: center">
        <label style="padding-left: 0px">
            <input type="checkbox" style="margin-left: 0px!important;" class="flat-red chkInForm" checked/>
        </label>
    </div>
</td>
<td style="text-align: center;vertical-align: middle">
    <i onclick="removeItem(this)" class="remove fa fa-trash-o"
       style="cursor: pointer;font-size: 20px;color: red"></i>
</td>

