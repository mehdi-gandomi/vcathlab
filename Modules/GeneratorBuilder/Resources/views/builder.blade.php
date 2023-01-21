@php
    app()->setLocale("fa");
    use \Modules\Panel\Iracode;
    $builderController=app()->make('Modules\GeneratorBuilder\Http\Controllers\GeneratorBuilderController');
    $allModels=$builderController->getModels();
    $allModels=array_merge($allModels,$builderController->getModuleModels());
    //config(['app.locale'=>'fa']);
    \Config::set('app.locale','fa');
@endphp
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Iracode Generator Builder</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.2/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/all.css">
    {{--  @foreach (config("generatorbuilder.styles") as $key=>$file)
        <link href="{{asset('static/styles/generatorbuilder.'.$key)}}" rel="stylesheet" type="text/css">
    @endforeach  --}}
    <link href="/static/styles/bs-rtl" rel="stylesheet" type="text/css">
    <link href="/static/styles/generator-builder-styles" rel="stylesheet" type="text/css">
    <link href="/static/styles/json-editor" rel="stylesheet" type="text/css">
    <script src="/static/scripts/json-editor"></script>
    {{--  <script src="{{asset('assets/js/jsoneditor.min.js')}}"></script>  --}}
    <style>
        .select2-container,.select2-results__option{
            direction: ltr;
            text-align: left
        }
        #jsoneditor,#commonFilterJsoneditor,#fieldFilterOptionsJsoneditor{
            direction: ltr
        }
        .checkbox, .radio{
            margin-top: 0 !important
        }
    </style>
    <link rel="stylesheet" href="/static/styles/loader">
    <meta name="csrf-token" content="{{csrf_token()}}">
</head>
<style>
    .chk-align {
        padding-right: 10px;
    }

    .chk-label-margin {
        margin-left: 5px;
    }

    .required {
        color: red;
        padding-left: 5px;
    }

    .btn-green {
        background-color: #00A65A !important;
    }

    .btn-blue {
        background-color: #2489C5 !important;
    }
    .d-none{
        display: none !important;
    }
</style>
<body class="skin-blue" style="background-color: #ecf0f5">
<div class="col-md-12">
    <section class="content">
        <div id="info" style="display: none"></div>
        <div class="box box-primary col-lg-12">
            <div class="box-header" style="margin-top: 10px">
                <h1 class="box-title" style="font-size: 30px">{{Iracode::t("generatorbuilder.Iracode Generator Builder")}}</h1>
            </div>
            <div class="box-body">
                <form id="form">
                    <input type="hidden" name="_token" id="token" value="{!! csrf_token() !!}"/>

                    <div class="form-group col-md-3">
                        <label for="txtModelName">{{Iracode::t("generatorbuilder.Model Name")}}<span class="required">*</span></label>
                        <input type="text" class="form-control" required id="txtModelName" placeholder="{{Iracode::t('Enter name')}}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="tableType">{{Iracode::t("generatorbuilder.Table")}}</label>
                        <select id="tableType" class="form-control" name="table_type" style="width: 100%">
                            <option value="existing" selected>{{Iracode::t("generatorbuilder.Choose Existing Tables")}}</option>
                            <option value="new">{{Iracode::t("generatorbuilder.New Table")}}</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3 " id="existingTablesWrap">
                        <label for="txtCustomTblName">{{Iracode::t("generatorbuilder.Existing Tables")}}</label>
                        <select id="existingTblName" class="form-control" style="width: 100%">
                            @foreach ($currentTables as $table)
                                <option data-singular="{{$table['singular']}}" value="{{$table['table']}}">{{$table['table']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="txtExtendModel">{{Iracode::t("generatorbuilder.Extend model")}}</label>
                        <input type="text" class="form-control" id="txtExtendModel" value="{{config('crudgenerator.model_extend_class')}}" placeholder="Enter name">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="txtTitleField">{{Iracode::t("generatorbuilder.Title Field")}}</label>
                        <select id="txtTitleField" class="form-control" style="width: 100%">
                        </select>
                    </div>


                    <div class="form-group col-md-3 d-none" id="newTableWrap">
                        <label for="txtCustomTblName">{{Iracode::t("generatorbuilder.Custom Table Name")}}</label>
                        <input type="text" class="form-control" id="txtCustomTblName" placeholder="Enter table name">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="txtPrefix">{{Iracode::t("generatorbuilder.Prefix")}}</label>
                        <input type="text" class="form-control" id="txtPrefix" placeholder="Enter prefix">
                    </div>
                    @if ($showMenus)
                        <div class="form-group col-md-3" id="MenusWrap">
                            <label for="txtCustomTblName">{{Iracode::t("generatorbuilder.Menu")}}</label>
                            <select id="menuId" class="form-control" style="width: 100%">
                                @foreach ($Menus as $menu)
                                    @if (isset($menu['children']))
                                        <optgroup label="{{$menu['label']}}">
                                            @foreach ($menu['children'] as $child)
                                                <option data-singular="{{$menu['id']}}" value="{{$menu['id']}}">{{$menu['label']}}</option>
                                            @endforeach
                                        </optgroup>
                                    @else
                                        <option data-singular="{{$menu['id']}}" value="{{$menu['id']}}">{{$menu['label']}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    @endif
                    <div class="form-group col-md-12">
                        <label for="txtModelName">{{Iracode::t("generatorbuilder.Options")}}</label>

                        <div class="form-inline form-group" style="border-color: transparent">
                            <div class="checkbox chk-align">
                                <label>
                                    <input type="checkbox" class="flat-red" id="chkAuthenticable"><span
                                            class="chk-label-margin"> {{Iracode::t("generatorbuilder.Authenticale")}} </span>
                                </label>
                            </div>
                            <div class="checkbox chk-align">
                                <label>
                                    <input type="checkbox" class="flat-red" id="chkDelete"><span
                                            class="chk-label-margin"> {{Iracode::t("generatorbuilder.Soft Delete")}} </span>
                                </label>
                            </div>

                            {{--  <div class="checkbox chk-align">
                                <label>
                                    <input type="checkbox" class="flat-red" id="chkSave"> <span
                                            class="chk-label-margin">{{Iracode::t("generatorbuilder.Save Schema")}}</span>
                                </label>
                            </div>  --}}
                            {{--  <div class="checkbox chk-align" id="chSwag">
                                <label>
                                    <input type="checkbox" class="flat-red" id="chkSwagger"> <span
                                            class="chk-label-margin">Swagger</span>
                                </label>
                            </div>  --}}
                            {{--  <div class="checkbox chk-align" id="chTest">
                                <label>
                                    <input type="checkbox" class="flat-red" id="chkTestCases"> <span
                                            class="chk-label-margin">Test Cases</span>
                                </label>
                            </div>  --}}
                            {{--  <div class="checkbox chk-align" id="chDataTable">
                                <label>
                                    <input type="checkbox" class="flat-red" id="chkDataTable"> <span
                                            class="chk-label-margin">Datatables</span>
                                </label>
                            </div>  --}}
                            <div class="checkbox chk-align" id="chNoTimestampWrap">
                                <label>
                                    <input type="checkbox" class="flat-red" id="chNoTimestamp" checked> <span
                                            class="chk-label-margin">{{Iracode::t("generatorbuilder.No Timestamp")}}</span>
                                </label>
                            </div>
                            <div class="checkbox chk-align" id="chMigration">
                                <label>
                                    <input type="checkbox" class="flat-red" id="chkMigration" checked> <span
                                            class="chk-label-margin">{{Iracode::t("generatorbuilder.Migration")}}</span>
                                </label>
                            </div>
                            <div class="checkbox chk-align d-none" id="chForceMigrate">
                                <label>
                                    <input type="checkbox" class="flat-red" id="chkForceMigrate" checked> <span
                                            class="chk-label-margin">{{Iracode::t("generatorbuilder.Force Migrate")}}</span>
                                </label>
                            </div>
                            <div class="checkbox chk-align" id="chVueCrud">
                                <label>
                                    <input type="checkbox" class="flat-red" id="chkVueCrud" checked> <span
                                            class="chk-label-margin">{{Iracode::t("generatorbuilder.Vue CRUD")}}</span>
                                </label>
                            </div>
                            <div class="checkbox chk-align" id="chCreateView">
                                <label>
                                    <input type="checkbox" class="flat-red" id="chkCreateView" checked> <span
                                            class="chk-label-margin">{{Iracode::t("generatorbuilder.Create view")}}</span>
                                </label>
                            </div>
                            <div class="checkbox chk-align" id="chUpdateView">
                                <label>
                                    <input type="checkbox" class="flat-red" id="chkUpdateView" checked> <span
                                            class="chk-label-margin">{{Iracode::t("generatorbuilder.Update view")}}</span>
                                </label>
                            </div>
                            <div class="checkbox chk-align" id="chIndexView">
                                <label>
                                    <input type="checkbox" class="flat-red" id="chkIndexView" checked> <span
                                            class="chk-label-margin">{{Iracode::t("generatorbuilder.Index view")}}</span>
                                </label>
                            </div>
                            <div class="checkbox chk-align" id="chDetailView">
                                <label>
                                    <input type="checkbox" class="flat-red" id="chkDetailView" checked> <span
                                            class="chk-label-margin">{{Iracode::t("generatorbuilder.Detail view")}}</span>
                                </label>
                            </div>
                            {{-- <div class="checkbox chk-align" id="chGenFilter">
                                <label>
                                    <input type="checkbox" class="flat-red" id="chkGenFilter" checked> <span
                                            class="chk-label-margin">Generate filters</span>
                                </label>
                            </div> --}}
                        </div>
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="txtModuleName">{{Iracode::t("generatorbuilder.Module Name")}}</label>
                        <input type="text" class="form-control" id="txtModuleName" placeholder="Panel">
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="txtControllerNamespace">{{Iracode::t("generatorbuilder.Controller Namespace")}}</label>
                        <input readonly type="text" class="form-control" id="txtControllerNamespace" placeholder="Modules\Panel\Controllers">
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="txtModelNamespace">{{Iracode::t("generatorbuilder.Model Namespace")}}</label>
                        <input readonly type="text" class="form-control" id="txtModelNamespace" placeholder="Modules\Panel\Models">
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="txtRepositoryNamespace">{{Iracode::t("generatorbuilder.Repository Namespace")}}</label>
                        <input readonly type="text" class="form-control" id="txtRepositoryNamespace" placeholder="Modules\Panel\Repositories">
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="txtRequestNamespace">{{Iracode::t("generatorbuilder.Request Namespace")}}</label>
                        <input readonly type="text" class="form-control" id="txtRequestNamespace" placeholder="Modules\Panel\Http\Requests\API">
                    </div>
                    <div class="form-group col-md-1 d-none">
                        <label for="txtPaginate">{{Iracode::t("generatorbuilder.Paginate")}}</label>
                        <input type="number" class="form-control" value="10" id="txtPaginate" placeholder="">
                    </div>

                    <div class="form-group col-md-12" style="margin-top: 7px">
                        <div class="form-control" style="border-color: transparent;padding-left: 0px">
                            <label style="font-size: 18px">{{Iracode::t("generatorbuilder.Fields")}}</label>
                        </div>
                    </div>

                    <div class="table-responsive col-md-12">
                        <table class="table table-striped table-bordered" id="table">
                            <thead class="no-border">
                            <tr>
                                <th>{{Iracode::t("generatorbuilder.Field Name")}}</th>
                                <th>{{Iracode::t("generatorbuilder.Label")}}</th>
                                <th>{{Iracode::t("generatorbuilder.DB Type")}}</th>
                                <th>{{Iracode::t("generatorbuilder.DB Size")}}</th>
                                <th>{{Iracode::t("generatorbuilder.Validations")}}</th>
                                <th>{{Iracode::t("generatorbuilder.Html Type")}}</th>
                                <th>{{Iracode::t("generatorbuilder.Filter")}}</th>

                                <th style="width: 68px">{{Iracode::t("generatorbuilder.Primary")}}</th>
                                <th style="width: 87px">{{Iracode::t("generatorbuilder.Searchable")}}</th>
                                <th style="width: 63px">{{Iracode::t("generatorbuilder.Fillable")}}</th>
                                <th style="width: 65px">{{Iracode::t("generatorbuilder.In Form")}}</th>
                                <th style="width: 67px">{{Iracode::t("generatorbuilder.In Index")}}</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody id="container" class="no-border-x no-border-y ui-sortable">

                            </tbody>
                        </table>
                    </div>

                    <div id="columnAddWrap" class="form-inline col-md-12" style="padding-top: 10px">
                        <div class="form-group chk-align" style="border-color: transparent;">
                            <button type="button" class="btn btn-success btn-flat btn-green" id="btnAdd"> {{Iracode::t("generatorbuilder.Add Field")}}
                            </button>
                        </div>
                        <div class="form-group chk-align" style="border-color: transparent;">
                            <button type="button" class="btn btn-success btn-flat btn-green" id="btnPrimary"> {{Iracode::t("generatorbuilder.Add")}}
                                {{Iracode::t("generatorbuilder.Primary")}}
                            </button>
                        </div>
                        <div class="form-group chk-align" style="border-color: transparent;">
                            <button type="button" class="btn btn-success btn-flat btn-green" id="btnTimeStamps"> {{Iracode::t("generatorbuilder.Add")}}
                                {{Iracode::t("generatorbuilder.Timestamps")}}
                            </button>
                        </div>
                    </div>

                    <div class="table-responsive col-md-12" id="relationShip" style="margin-top:35px;display: none">
                        <table class="table table-striped table-bordered" id="table">
                            <thead class="no-border">
                            <tr>
                                <th>{{Iracode::t("generatorbuilder.Relation Type")}}</th>
                                <th>{{Iracode::t("generatorbuilder.Foreign Model")}}<span class="required">*</span></th>
                                <th>{{Iracode::t("generatorbuilder.Foreign Key")}}</th>
                                <th>{{Iracode::t("generatorbuilder.Local Key")}}</th>
                                <th>{{Iracode::t("generatorbuilder.In Index")}}</th>
                                <th>{{Iracode::t("generatorbuilder.In Form")}}</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody id="rsContainer" class="no-border-x no-border-y ui-sortable">

                            </tbody>
                        </table>
                    </div>
                    <div class="form-inline col-md-12" style="padding-top: 10px">
                        <div class="form-group" style="border-color: transparent;">
                            <button type="button" class="btn btn-success btn-flat btn-green" id="btnRelationShip">
                                {{Iracode::t("generatorbuilder.Add RelationShip")}}
                            </button>
                        </div>
                    </div>

                    <div class="form-inline col-md-12" style="padding:15px 15px;text-align: right">
                        <div class="form-group" style="border-color: transparent;padding-left: 10px">
                            <button type="submit" class="btn btn-flat btn-primary btn-blue" id="btnGenerate">{{Iracode::t("generatorbuilder.Generate")}}
                            </button>
                        </div>
                        <div class="form-group" style="border-color: transparent;padding-left: 10px">
                            <button type="button" class="btn btn-default btn-flat" id="btnReset" data-toggle="modal"
                                    data-target="#confirm-delete"> {{Iracode::t("generatorbuilder.Reset")}}
                            </button>
                        </div>
                    </div>


                    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Confirm Reset</h4>
                                </div>

                                <div class="modal-body">
                                    <p style="font-size: 16px">This will reset all of your fields. Do you want to
                                        proceed?</p>

                                    <p class="debug-url"></p>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-flat btn-default" data-dismiss="modal">No
                                    </button>
                                    <a id="btnModelReset" class="btn btn-flat btn-danger btn-ok" data-dismiss="modal">Yes</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </section>
</div>
<div class="col-md-12">
    <section class="content">
        <div id="commonFiltersMessage" style="display: none"></div>
        <div class="box box-primary col-lg-12">
            <div class="box-header" style="margin-top: 10px">
                <h1 class="box-title" style="font-size: 30px">{{Iracode::t("generatorbuilder.Common Filters")}}</h1>
            </div>
            <div class="box-body">
                <form id="commonFilterForm">
                    <input type="hidden" name="_token" id="rbToken" value="{!! csrf_token() !!}"/>
                    <div class="form-group col-md-4">
                        <label for="txtCommonFilterName">{{Iracode::t("generatorbuilder.Filter Name")}}<span class="required">*</span></label>
                        <input type="text" class="form-control" name="filter_name" required id="txtCommonFilterName" placeholder="Filter Name...">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="txtCommonFilterModuleName">{{Iracode::t("generatorbuilder.Module Name")}}<span class="required">*</span></label>
                        <input type="text" class="form-control" name="module" required id="txtCommonFilterModuleName" placeholder="Module Name...">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="txtCommonFilterType">{{Iracode::t("generatorbuilder.Filter Type")}}<span class="required">*</span></label>
                        <select id="txtCommonFilterType" name="filter_type" class="form-control drdFilter" style="width: 100%">
                            <option value="checkbox">Checkbox</option>
                            <option value="date">Date</option>
                            <option value="datetime">DateTime</option>
                            <option value="multiselect">Multi Select</option>
                            <option value="number">Number</option>
                            <option value="select">Select</option>
                            <option value="set">Set</option>
                            <option value="time">Time</option>
                            <option value="text">Text</option>
                            {{-- <option value="multi_select">Multi Select</option> --}}
                        </select>
                        <textarea type="text" name="options" class="form-control" id="commonFilterOptions" style="display: none" data-field="" placeholder='{
                                "key":"value"
                        }'></textarea>
                        <button type="button" class="btn btn-primary btn-sm setFilterOptionsButton" style="margin-top: 1rem" onclick="openCommonFilterOptionsModal(this)" data-field="" data-field-type="" style="display: none">
                            {{Iracode::t("generatorbuilder.Set/Show options")}}
                        </button>
                    </div>
                    <div class="form-inline col-md-12" style="padding:15px 15px;text-align: right">
                        <div class="form-group" style="border-color: transparent;padding-left: 10px">
                            <button type="submit" class="btn btn-flat btn-primary btn-blue" id="btnCreateCommonFilter">{{Iracode::t('generatorbuilder.Generate')}}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<div class="col-md-12">
    <section class="content">
        <div id="vueCrud" style="display: none"></div>
        <div class="box box-primary col-lg-12">
            <div class="box-header" style="margin-top: 10px">
                <h1 class="box-title" style="font-size: 30px">Vue CRUD</h1>
            </div>
            <div class="box-body">
                <form id="vueCrudForm">
                    <input type="hidden" name="_token" id="vcToken" value="{!! csrf_token() !!}"/>

                    <div class="form-group col-md-4">
                        <label for="txtVCModelName">Model Name<span class="required">*</span></label>
                        <select id="txtVCModelName" name="model" class="form-control">
                            @foreach ($allModels as $model)
                                <option value="{{$model['namespace']}}">{{$model['namespace']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="txtVCModelName">Module Name<span class="required">*</span></label>
                        <select id="txtVCModuleName" name="module" class="form-control">
                            @foreach (Module::all() as $module)
                                <option value="{{$module->getName()}}">{{$module->getName()}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-inline col-md-12" style="padding:15px 15px;text-align: right">
                        <div class="form-group" style="border-color: transparent;padding-left: 10px">
                            <button type="submit" class="btn btn-flat btn-primary btn-blue" id="btnVueCRUD">Generate
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<div class="col-md-12">
    <section class="content">
        <div id="rollbackInfo" style="display: none"></div>
        <div class="box box-primary col-lg-12">
            <div class="box-header" style="margin-top: 10px">
                <h1 class="box-title" style="font-size: 30px">Rollback</h1>
            </div>
            <div class="box-body">
                <form id="rollbackForm">
                    <input type="hidden" name="_token" id="rbToken" value="{!! csrf_token() !!}"/>

                    <div class="form-group col-md-4">
                        <label for="txtRBModelName">Model Name<span class="required">*</span></label>
                        <input type="text" class="form-control" required id="txtRBModelName" placeholder="Enter name">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="txtRBModuleName">Module Name</label>
                        <input type="text" class="form-control" id="txtRBModuleName" placeholder="Enter module name">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="txtRBPrefix">Prefix</label>
                        <input type="text" class="form-control" id="txtRBPrefix" placeholder="Enter prefix">
                    </div>
                    <div class="form-inline col-md-12" style="padding:15px 15px;text-align: right">
                        <div class="form-group" style="border-color: transparent;padding-left: 10px">
                            <button type="submit" class="btn btn-flat btn-primary btn-blue" id="btnRollback">Rollback
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>


<div class="col-md-12">
    <section class="content">
        <div id="schemaInfo" style="display: none"></div>
        <div class="box box-primary col-lg-12">
            <div class="box-header" style="margin-top: 10px">
                <h1 class="box-title" style="font-size: 30px">Generate CRUD From Schema</h1>
            </div>
            <div class="box-body">
                <form method="post" id="schemaForm" enctype="multipart/form-data">
                    <input type="hidden" name="_token" id="smToken" value="{!! csrf_token() !!}"/>
                    <div class="form-group col-md-4">
                        <label for="txtSmModelName">Model Name<span class="required">*</span></label>
                        <input type="text" name="modelName" class="form-control" id="txtSmModelName" placeholder="Enter Model Name">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="schemaFile">Schema File<span class="required">*</span></label>
                        <input type="file" name="schemaFile" class="form-control" required id="schemaFile">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="drdSmCommandType">Command Type</label>
                        <select name="commandType" id="drdSmCommandType" class="form-control" style="width: 100%">
                            {{--  <option value="infyom:api_scaffold">API Scaffold Generator</option>  --}}
                            <option value="infyom:api">API Generator</option>
                            {{--  <option value="infyom:scaffold">Scaffold Generator</option>  --}}
                        </select>
                    </div>
                    <div class="form-inline col-md-12" style="padding:15px 15px;text-align: right">
                        <div class="form-group" style="border-color: transparent;padding-left: 10px">
                            <button type="submit" class="btn btn-flat btn-primary btn-blue" id="btnSmGenerate">Generate
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<div class="modal-overlay">
    <div class="modal-loader">
        <p class="loader-title">لطفا صبر کنید...</p>
        <div class="modal-spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="optionsModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{Iracode::t("generatorbuilder.Set/Show options")}}</h5>

            </div>
            <div class="modal-body">
                <div class="row" style="margin-bottom: 2rem">
                    <div class="col-lg-10">
                        <label for="optionsModalEnum">{{Iracode::t("generatorbuilder.Select enum class")}}</label>
                        <select id="optionsModalEnum" class="form-control" >
                            @foreach ($enums as $enum)
                                <option value="{{$enum['namespace']}}">{{$enum['namespace']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <button onclick="loadEnum($('#optionsModalEnum').val(),'jsonEditor')" class="btn btn-success" style="margin-top: 2.5rem" type="button">{{Iracode::t("generatorbuilder.Fill")}}</button>
                    </div>
                </div>
                <div id="jsoneditor" style="width: 100%; height: 400px;"></div>
                <button class="btn btn-primary mt-4" type="button" data-dismiss="modal" aria-label="Close">
                    {{Iracode::t("generatorbuilder.Save")}}
                </button>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="commonFilterOptionsModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{Iracode::t("generatorbuilder.Set/Show options")}}</h5>

            </div>
            <div class="modal-body">
                <div class="row" style="margin-bottom: 2rem">
                    <div class="col-lg-10">
                        <label for="commonFilterOptionsEnum">{{Iracode::t("generatorbuilder.Select enum class")}}</label>
                        <select id="commonFilterOptionsEnum" class="form-control" >
                            @foreach ($enums as $enum)
                                <option value="{{$enum['namespace']}}">{{$enum['namespace']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <button onclick="loadEnum($('#commonFilterOptionsEnum').val(),'commonFilterJsonEditor')" class="btn btn-success" style="margin-top: 2.5rem" type="button">{{Iracode::t("generatorbuilder.Fill")}}</button>
                    </div>
                </div>
                <div id="commonFilterJsoneditor" style="width: 100%; height: 400px;"></div>
                <button class="btn btn-primary mt-4" type="button" data-dismiss="modal" aria-label="Close">
                    {{Iracode::t("generatorbuilder.Save")}}
                </button>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="selectTableOptionsModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{Iracode::t("generatorbuilder.Set Table options")}}</h5>

            </div>
            <div class="modal-body">
                <div class="row" style="margin-bottom: 2rem">
                    <div class="col-lg-4">
                        <label for="txtSTTableName">{{Iracode::t("generatorbuilder.Table Name")}}<span class="required">*</span></label>
                        <input type="text" name="tableName" class="form-control" id="txtSTTableName" placeholder="Enter Table Name">
                    </div>
                    <div class="col-lg-4">
                        <label for="txtSTLabelColumn">{{Iracode::t("generatorbuilder.Label Column")}}<span class="required">*</span></label>
                        <input type="text" name="labelColumn" class="form-control" id="txtSTLabelColumn" placeholder="Enter Column Name">
                    </div>
                    <div class="col-lg-4">
                        <label for="txtSTValueColumn">{{Iracode::t("generatorbuilder.Value Column")}}<span class="required">*</span></label>
                        <input type="text" name="valueColumn" class="form-control" id="txtSTValueColumn" placeholder="Enter Column Name">
                    </div>
                </div>
                <button class="btn btn-primary mt-4" type="button" data-dismiss="modal" aria-label="Close">
                    {{Iracode::t("generatorbuilder.Save")}}
                </button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="fieldFiltersOptionsModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{Iracode::t("generatorbuilder.Set/Show options")}}</h5>

            </div>
            <div class="modal-body">
                <div class="row" style="margin-bottom: 2rem">
                    <div class="col-lg-10">
                        <label for="fieldFiltersEnum">{{Iracode::t("generatorbuilder.Select enum class")}}</label>
                        <select id="fieldFiltersEnum" class="form-control" >
                            @foreach ($enums as $enum)
                                <option value="{{$enum['namespace']}}">{{$enum['namespace']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <button onclick="loadEnum($('#fieldFiltersEnum').val(),'fieldFiltersJsonEditor')" class="btn btn-success" style="margin-top: 2.5rem" type="button">{{Iracode::t("generatorbuilder.Fill")}}</button>
                    </div>
                </div>

                <div id="fieldFilterOptionsJsoneditor" style="width: 100%; height: 400px;"></div>
                <button class="btn btn-primary mt-4" type="button" data-dismiss="modal" aria-label="Close">
                    {{Iracode::t("generatorbuilder.Save")}}
                </button>
            </div>

        </div>
    </div>
</div>
</body>

@foreach (config("generatorbuilder.scripts") as $key=>$file)
    <script src="{{asset('static/scripts/generatorbuilder.'.$key)}}"></script>
@endforeach
<script>
    window.jsonEditor={};
    window.selectedFieldOptionsElement={};
    var filepondOptions={
        "label-idle":"Drag & Drop your files",
        "allow-multiple":false,
        "accepted-file-types":"image/jpeg, image/png",
        "instant-upload":true
    };
    $("#optionsModal").on("hide.bs.modal",function(e){
        var closestFilter=selectedFieldOptionsElement.closest("tr").find('.txtFieldFilterValues');
        if(closestFilter.val() == ""){
            closestFilter.val(JSON.stringify(window.jsonEditor.get()));
        }
        window.selectedFieldOptionsElement.val(JSON.stringify(window.jsonEditor.get()));
    })
    $("#fieldFiltersOptionsModal").on("hide.bs.modal",function(e){
        //console.log(fieldFilterValuesElement)
        window.fieldFilterValuesElement.val(JSON.stringify(window.fieldFiltersJsonEditor.get()));
    })
    $("#selectTableOptionsModal").on("hide.bs.modal",function(e){
        //console.log(fieldFilterValuesElement)
        var options={
            table:$("#txtSTTableName").val(),
            labelColumn:$("#txtSTLabelColumn").val(),
            valueColumn:$("#txtSTValueColumn").val()
        }
        selectedFieldOptionsElement.val(JSON.stringify(options))
    })
    function openSelectTableOptionsModal(button){
        var htmlValuesٍElement=$(button).parent().find('.txtHtmlValue');
        window.selectedFieldOptionsElement=htmlValuesٍElement;
        $("#selectTableOptionsModal").modal("show");
    }
    function loadEnum(enumNamespace,editor){
        $.ajax({
            type:"POST",
            url:"{{route('io_generator_builder_get_enum_values')}}",
            data:{
                namespace:enumNamespace
            },
            success:function(data){
                if(data.ok){
                    window[editor].set(data.data)
                }
            }
        })
    }
    function openFieldFiltersOptionsModal(button){
        var filterType=$(button).closest("tr").find(".drdFilter").val();
        var filterValuesElement=$(button).closest("tr").find('.txtFieldFilterValues');
        var options={};
        try{
            options=JSON.parse(filterValuesElement.val());
        }catch(e){
            options={};
        }
        if(options === false) options={};

        // create the editor
        var container = document.getElementById("fieldFilterOptionsJsoneditor")
        $(container).empty();
        var editorConfig = {}
        window.fieldFiltersJsonEditor = new JSONEditor(container, editorConfig)
        window.fieldFiltersJsonEditor.set(options)
        window.fieldFilterValuesElement=filterValuesElement;
          // get json
        $("#fieldFiltersOptionsModal").modal("show")
    }
    function openOptionsModal(button){
        var field=$(button).parent().find(".txtFieldName").val();
        var fieldType=$(button).parent().find(".drdHtmlType").val();
        var htmlValuesٍElement=$(button).parent().find('.txtHtmlValue');
        try{
            var options=JSON.parse(htmlValuesٍElement.val());
        }catch(e){
            var options={};
        }
        if(options === false) options={};
        // create the editor
        var container = document.getElementById("jsoneditor")
        $(container).empty();
        var editorConfig = {}
        window.jsonEditor = new JSONEditor(container, editorConfig)
        window.jsonEditor.set(options)
        window.selectedFieldOptionsElement=htmlValuesٍElement;
          // get json

        $("#optionsModal").modal("show")
    }
    function openCommonFilterOptionsModal(){
        try{
            var options=JSON.parse($("#commonFilterOptions").val());
        }catch(e){
            var options={};
        }
        if(options === false) options={};

        // create the editor
        var container = document.getElementById("commonFilterJsoneditor")
        $(container).empty();
        window.commonFilterJsonEditor = new JSONEditor(container, {

        })
        window.commonFilterJsonEditor.set(options)
        $("#commonFilterOptionsModal").modal("show")
    }
    $("#commonFilterOptionsModal").on("hide.bs.modal",function(e){
        $("#commonFilterOptions").val(JSON.stringify(window.commonFilterJsonEditor.get()));
    })
    $("select").select2({width: '100%'});
    var fieldIdArr = [];
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });



        $("#drdCommandType").on("change", function () {
            if ($(this).val() == "infyom:scaffold") {
                $('#chSwag').hide();
                $('#chTest').hide();
            }
            else {
                $('#chSwag').show();
                $('#chTest').show();
            }
        });

        $("#chkForceMigrate").on("ifChanged", function () {
            if ($(this).prop('checked') == true) {
                $('#chkMigration').iCheck("check", true);
                $('#chkMigration').iCheck("disable", true);
            } else {
                $('#chkMigration').iCheck("enable", true);
            }
        });
        $("#tableType").select2().on("change",function(e){
            var value=$(this).val();
            if(value == 'existing'){
                $("#newTableWrap").addClass("d-none");
                $("#chForceMigrate").addClass("d-none");
                $("#existingTablesWrap").removeClass("d-none");
                var value=$("#existingTblName option:selected").val();
                var selectedSingular=$("#existingTblName option:selected").data("singular");
                $("#txtModelName").val(selectedSingular);
                initializeFields(value);
            }else if(value == 'new'){
                $("#newTableWrap").removeClass("d-none");
                $("#chForceMigrate").removeClass("d-none");
                $("#existingTablesWrap").addClass("d-none");
                $("#container").html("");
                $("#txtModelName").val("");
                $("#columnAddWrap").css("display","block");
                $("#chMigration").css("display","block");
            }
        });
        var htmlTypes = {
            integer: "number",
            smallint:"number",
            string: "text",
            text: "textarea",
            datetime: "datetime",
            date: "date",
            boolean:"radio",
            bigInteger:"number",
            decimal:"number",
            double:"number",
            float:"number",
            bigint:"number",
            json:"textarea",
        };
        var filterTypes = {
            integer: "number",
            double:"number",
            float:"number",
            string: "text",
            text: "text",
            datetime: "datetime",
            date: "date",
            //boolean:"checkbox",
            boolean:"select",
            bigInteger:"number",
            decimal:"number",
            bigint:"number",
            json:"text",
        };
        var dbTypes={
            "increments":"increments",
            "integer":"integer",
            "smallinteger":"smallInteger",
            "smallint":"smallint",
            "json":"json",
            "longtext":"longText",
            "biginteger":"bigInteger",
            "bigint":"bigInteger",
            "double":"double",
            "float":"float",
            "decimal":"decimal",
            "boolean":"tinyInteger",
            "string":"string",
            "char":"char",
            "text":"text",
            "mediumtext":"mediumText",
            "longtext":"longText",
            "enum":"enum",
            "binary":"binary",
            "datetime":"dateTime",
            "date":"date",
            "timestamp":"timestamp",
        }
        var htmlStr = '<tr class="item" style="display: table-row;"></tr>';
        var commonComponent = $(htmlStr).filter("tr").load('{{ route('io_field_template') }}');
        var relationStr = '<tr class="relationItem" style="display: table-row;"></tr>';
        var relationComponent = $(relationStr).filter("tr").load('{{ route('io_relation_field_template') }}');

        function initializeFields(tablename){
            var csrfToken=$("[name='csrf-token']").attr("content");
            $("#container").html("");
            //$("#columnAddWrap").css("display","none");
            $("#chMigration").css("display","none");
            $.ajax({
                type:"POST",
                url:"{{route('io_generator_builder_get_table_fields')}}",
                beforeSend: function(request) {
                    request.setRequestHeader("X-CSRF-TOKEN", csrfToken);
                },
                data:{
                    tablename:tablename,
                    _token:csrfToken
                },
                success:function(data){
                    if(data.ok){
                        var titleFieldsOptions="";
                        Object.values(data.columns).forEach(function(column){
                            titleFieldsOptions+="<option value='"+column.name+"'>"+column.name+"</option>";
                            if(column.name != "id"){
                                var item = $(commonComponent).clone();
                                var htmlType=htmlTypes[column.type];
                                var filterType=filterTypes[column.type];
                                $(item).find(".txtTitle").val(column.label);
                                $(item).find(".txtFieldName").val(column.name);
                                $(item).find(".drdHtmlType").val(htmlType);
                                $(item).find(".txtdbType").val(dbTypes[column.type]);
                                $(item).find(".txtdbSize").val(column.length);

                                /*$(item).find(".setOptionsButton").attr("data-field-type",column.type);
                                $(item).find(".setOptionsButton").attr("data-field",column.name);
                                $(item).find(".txtHtmlValue").attr("data-field",column.name);*/

                                if(column.nullable){
                                    $(item).find(".txtValidation").val("nullable");
                                }else{
                                    $(item).find(".txtValidation").val("required");
                                }
                                //txtdbSize
                                $(item).find(".txtComment").val(column.comment);
                                $(item).find(".drdFilter").val("new_"+filterType);
                                $(item).find(".txtFieldName").prop("readonly",true);
                                if(column.name == "created_at" || column.name == "updated_at"){
                                    $(item).find(".chkInForm").prop("checked",false);
                                    //$(item).find(".chkInIndex").prop("checked",false);
                                }

                                //$(item).find(".txtdbType").prop("disabled",true);
                                $(item).find(".txtdbSize").prop("readonly",true);
                                $("#rsContainer").empty();
                                $("#relationShip").hide();
                                initializeCheckbox(item);
                                $("#container").append(item);
                            }
                        })
                        $("#container input[type=radio]").trigger("change");
                        $("#container select").trigger("change");
                        $("#txtTitleField").html(titleFieldsOptions);
                        $("#txtTitleField").val("id");
                        $("#txtTitleField").trigger("change");
                    }
                }
            })
        }
        $(document).ready(function () {


          var selectedTable=$("#existingTblName").val();
            var selectedSingular=$("#existingTblName option:selected").data("singular");
            $("#txtModelName").val(selectedSingular);
            initializeFields(selectedTable);

            $("#existingTblName").select2().on("change",function(e){
                var value=$(this).val();
                var selectedSingular=$("#existingTblName option:selected").data("singular");
                $("#txtModelName").val(selectedSingular);
                initializeFields(value);
            });

            $("#btnAdd").on("click", function () {
                var item = $(commonComponent).clone();
                initializeCheckbox(item);
                $("#container").append(item);
            });

            $("#btnTimeStamps").on("click", function () {
                var item_created_at = $(commonComponent).clone();
                $(item_created_at).find('.txtFieldName').val("created_at");
                renderTimeStampData(item_created_at);
                initializeCheckbox(item_created_at);
                $("#container").append(item_created_at);


                var item_updated_at = $(commonComponent).clone();
                $(item_updated_at).find('.txtFieldName').val("updated_at");
                renderTimeStampData(item_updated_at);
                initializeCheckbox(item_updated_at);
                $("#container").append(item_updated_at);
            });

            $("#btnPrimary").on("click", function () {
                var item = $(commonComponent).clone();
                renderPrimaryData(item);
                initializeCheckbox(item);
                $("#container").append(item);
            });

            $("#btnRelationShip").on("click", function () {
                $("#relationShip").show();
                var item = $(relationComponent).clone();

                $(item).find("select").select2({ width: '100%' });

                var relationType = $(item).find('.drdRelationType');

                $(relationType).select2().on('change', function () {
                    if ($(relationType).val() == "mtm")
                        $(item).find('.foreignTable').show();
                    else
                        $(item).find('.foreignTable').hide();
                });

                $("#rsContainer").append(item);
            });

            $("#btnModelReset").on("click", function () {
                $("#container").html("");
                $('input:text').val("");
                $('input:checkbox').iCheck('uncheck');

            });

            $("#form").on("submit", function (e) {
               try{
                if(!$("#txtModuleName").val()) {
                    alert("لطفا نام ماژول را وارد کنید");
                    e.preventDefault();
                    return;
                }
                var fieldArr = [];
                var relationFieldArr = [];
                $(".modal-overlay").addClass("show");
                $('.item').each(function () {

                    var htmlType = $(this).find('.drdHtmlType');
                    var htmlValue = "";
                    var filterType=$(this).find('.drdFilter');
                    var filterOptions={};
                    var options={};
                    var filepondOptions={};
                    if ($(htmlType).val() == "select" || $(htmlType).val() == "multi_select" || $(htmlType).val() == "radio" || $(htmlType).val() == "selectTable") {
                        htmlValue = $(this).find('.drdHtmlType').val();
                        try{
                            options=JSON.parse($(this).find('.txtHtmlValue').val());
                        }catch(e){
                            options=[];
                        }
                    }
                    else {
                        htmlValue = $(this).find('.drdHtmlType').val();
                    }
                    if ($(htmlType).val() == "filepond" || $(htmlType).val() == "filepond_image"){
                        try{
                            filepondOptions=JSON.parse($(this).find('.txtHtmlValue').val());
                        }catch(e){
                            filepondOptions={};
                        }
                    }

                    //filter values
                    if ($(filterType).val() == "new_select" || $(filterType).val() == "new_multiselect" || $(filterType).val() == "new_radio" || $(filterType).val() =="new_set")
                    {
                        try{
                            filterOptions=JSON.parse($(this).find('.txtFieldFilterValues').val());
                        }catch(e){
                            filterOptions=[];
                        }
                    }

                    var dbType=$(this).find('.txtdbType').val();
                    if($(this).find(".txtdbSize").val() != ""){
                        dbType+=","+$(this).find(".txtdbSize").val();
                    }
                    var field={
                        name: $(this).find('.txtFieldName').val(),
                        label: $(this).find('.txtTitle').val(),
                        dbType: dbType,
                        htmlType: htmlValue,
                        filepondOptions:filepondOptions,
                        //comment:$(this).find('.txtComment').val(),
                        htmlValues:options,
                        filter:$(this).find(".drdFilter").val(),
                        filterOptions:filterOptions,
                        validations: $(this).find('.txtValidation').val(),
                        foreignTable: $(this).find('.txtForeignTable').val(),
                        isForeign: $(this).find('.chkForeign').prop('checked'),
                        searchable: $(this).find('.chkSearchable').prop('checked'),
                        fillable: $(this).find('.chkFillable').prop('checked'),
                        primary: $(this).find('.chkPrimary').prop('checked'),
                        inForm: $(this).find('.chkInForm').prop('checked'),
                        inIndex: $(this).find('.chkInIndex').prop('checked')
                    };
                    fieldArr.push(field);
                });

                $('.relationItem').each(function () {
                    relationFieldArr.push({
                        relationType: $(this).find('.drdRelationType').val(),
                        foreignModel: $(this).find('.txtForeignModel').val(),
                        foreignTable: $(this).find('.txtForeignTable').val(),
                        foreignKey: $(this).find('.txtForeignKey').val(),
                        localKey: $(this).find('.txtLocalKey').val(),
                        inIndex: $(this).find('.chkInIndex').prop('checked'),
                        inForm: $(this).find('.chkInForm').prop('checked'),
                    });
                });
                var tableType=$("#tableType").select2().val();
                var tableName="";
                if(tableType == "existing") tableName=$("#existingTblName").select2().val();
                else tableName=$('#txtCustomTblName').val();
                var data = {
                    modelName: $('#txtModelName').val(),
                    commandType: "infyom:api",
                    tableName: tableName,
                    tableType:tableType,
                    migrate: $('#chkMigration').prop('checked'),
                    modelExtendClass:$("#txtExtendModel").val(),
                    options: {
                        notTimestamp:$("#chNoTimestamp").prop("checked"),
                        titleField:$("#txtTitleField").val(),
                        softDelete: $('#chkDelete').prop('checked'),
                        authenticatable:$("#chkAuthenticable").prop("checked"),
                        save: $('#chkSave').prop('checked'),
                        prefix: $('#txtPrefix').val(),
                        paginate: $('#txtPaginate').val(),
                        forceMigrate: $('#chkForceMigrate').prop('checked'),
                        vueCrud: $('#chkVueCrud').prop('checked'),
                        createView: $('#chkCreateView').prop('checked'),
                        updateView: $('#chkUpdateView').prop('checked'),
                        indexView: $('#chkIndexView').prop('checked'),
                        detailView: $('#chkDetailView').prop('checked'),
                        generateFilters: $('#chkGenFilter').prop('checked'),
                    },
                    addOns: {
                        swagger: $('#chkSwagger').prop('checked'),
                        tests: $('#chkTestCases').prop('checked'),
                        datatables: $('#chkDataTable').prop('checked')
                    },
                    fields: fieldArr,
                    relations: relationFieldArr,
                    menuId:$("#menuId").val(),
                    moduleOptions:{
                        name:$("#txtModuleName").val(),
                        requestNamespace:$("#txtRequestNamespace").val(),
                        controllerNamespace:$("#txtControllerNamespace").val(),
                        modelNamespace:$("#txtModelNamespace").val(),
                        repositoryNamespace:$("#txtRepositoryNamespace").val()
                    }
                };

                data['_token'] = $('#token').val();
                var csrfToken=$("[name='csrf-token']").attr("content");
                $.ajax({
                    url: '{{ route('io_generator_builder_generate') }}',
                   // type: "POST",
                    method: "POST",
                    dataType: 'json',
                    contentType: 'application/json',
                    data: JSON.stringify(data),
                    beforeSend: function(request) {
                        request.setRequestHeader("X-CSRF-TOKEN", csrfToken);
                    },
                    success: function (result) {
                        $(".modal-overlay").removeClass("show");
                        $("#info").html("");
                        $("#info").append('<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>' + result + '</strong></div>');
                        $("#info").show();
                        var $container = $("html,body");
                        var $scrollTo = $('#info');
                        $container.animate({scrollTop: $scrollTo.offset().top - $container.offset().top, scrollLeft: 0},300);
                        /*setTimeout(function () {
                            $('#info').fadeOut('fast');
                        }, 3000);*/
                        //location.reload();
                    },
                    error: function (result) {
                        $(".modal-overlay").removeClass("show");
                        var result = JSON.parse(JSON.stringify(result));
                        var errorMessage = '';
                        if (result.hasOwnProperty('responseJSON') && result.responseJSON.hasOwnProperty('message')) {
                            errorMessage = result.responseJSON.message;
                        }

                        $("#info").html("");
                        $("#info").append('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Fail! </strong>' + errorMessage + '</div>');
                        $("#info").show();
                        var $container = $("html,body");
                        var $scrollTo = $('#info');
                        $container.animate({ scrollTop: $scrollTo.offset().top}, 300);
                        /*setTimeout(function () {
                            $('#info').fadeOut('fast');
                        }, 3000);*/
                    }
                });

                return false;
               }catch(e){
                   console.log(e);
                return false;
               }
            });

            $('#rollbackForm').on("submit", function (e) {
                e.preventDefault();
                $(".modal-overlay").addClass("show");

                var data = {
                    modelName: $('#txtRBModelName').val(),
                    moduleName: $('#txtRBModuleName').val(),
                    commandType: "infyom:api",
                    prefix: $('#txtRBPrefix').val(),
                    _token: $('#rbToken').val()
                };

                $.ajax({
                    url: '{{ route('io_generator_builder_rollback') }}',
                    method: "POST",
                    dataType: 'json',
                    contentType: 'application/json',
                    data: JSON.stringify(data),
                    success: function (result) {
                        $(".modal-overlay").removeClass("show");

                        var result = JSON.parse(JSON.stringify(result));

                        $("#rollbackInfo").html("");
                        $("#rollbackInfo").append('<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>' + result.message + '</strong></div>');
                        $("#rollbackInfo").show();

                        var $container = $("html,body");
                        var $scrollTo = $('#rollbackInfo');
                        $container.animate({
                            scrollTop: $scrollTo.offset().top - $container.offset().top,
                            scrollLeft: 0
                        }, 300);
                        /*setTimeout(function () {
                            $('#rollbackInfo').fadeOut('fast');
                        }, 3000);*/
                        //location.reload();
                    },
                    error: function (result) {
                        $(".modal-overlay").removeClass("show");

                        var result = JSON.parse(JSON.stringify(result));
                        var errorMessage = '';
                        if (result.hasOwnProperty('responseJSON') && result.responseJSON.hasOwnProperty('message')) {
                            errorMessage = result.responseJSON.message;
                        }

                        $("#rollbackInfo").html("");
                        $("#rollbackInfo").append('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Fail! </strong>' + errorMessage + '</div>');
                        $("#rollbackInfo").show();
                        /*setTimeout(function () {
                            $('#rollbackInfo').fadeOut('fast');
                        }, 3000);*/
                    }
                });
            });
            $('#vueCrudForm').on("submit", function (e) {
                e.preventDefault();
                $(".modal-overlay").addClass("show");

                $.ajax({
                    url: '{{ route('io_generator_builder_vuecrud') }}',
                    method: "POST",
                    dataType: 'json',
                    //contentType: 'application/json',
                    data: $(this).serialize(),
                    success: function (result) {
                        $(".modal-overlay").removeClass("show");

                        var result = JSON.parse(JSON.stringify(result));

                        $("#vueCrud").html("");
                        $("#vueCrud").append('<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>' + result.message + '</strong></div>');
                        $("#vueCrud").show();

                        var $container = $("html,body");
                        var $scrollTo = $('#vueCrud');
                        $container.animate({
                            scrollTop: $scrollTo.offset().top - $container.offset().top,
                            scrollLeft: 0
                        }, 300);
                        /*setTimeout(function () {
                            $('#vueCrud').fadeOut('fast');
                        }, 3000);*/
                        //location.reload();
                    },
                    error: function (result) {
                        $(".modal-overlay").removeClass("show");

                        var result = JSON.parse(JSON.stringify(result));
                        var errorMessage = '';
                        if (result.hasOwnProperty('responseJSON') && result.responseJSON.hasOwnProperty('message')) {
                            errorMessage = result.responseJSON.message;
                        }

                        $("#vueCrud").html("");
                        $("#vueCrud").append('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Fail! </strong>' + errorMessage + '</div>');
                        $("#vueCrud").show();
                        /*setTimeout(function () {
                            $('#vueCrud').fadeOut('fast');
                        }, 3000);*/
                    }
                });
            });
            $('#schemaFile').change(function () {

                var ext = $(this).val().split('.').pop().toLowerCase();
                if (ext != 'json') {
                    $("#schemaInfo").html("");
                    $("#schemaInfo").append('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Schema file must be json</strong></div>');
                    $("#schemaInfo").show();
                    $(this).replaceWith($(this).val('').clone(true));
                    /*setTimeout(function () {
                        $('div.alert').fadeOut('fast');
                    }, 3000);*/
                }
            });
            $("#commonFilterForm").on("submit",function(e){
                e.preventDefault();
                $(".modal-overlay").addClass("show");

                $.ajax({
                    url: '{{ route('io_generator_builder_common_filter') }}',
                    method: "POST",
                    dataType: 'json',
                    //contentType: 'application/json',
                    data: $(this).serialize(),
                    success: function (result) {
                        $(".modal-overlay").removeClass("show");

                        var result = JSON.parse(JSON.stringify(result));

                        $("#commonFiltersMessage").html("");
                        $("#commonFiltersMessage").append('<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>' + result.message + '</strong></div>');
                        $("#commonFiltersMessage").show();

                        var $container = $("html,body");
                        var $scrollTo = $('#commonFiltersMessage');
                        $container.animate({
                            scrollTop: $scrollTo.offset().top - $container.offset().top,
                            scrollLeft: 0
                        }, 300);
                        /*setTimeout(function () {
                            $('#commonFiltersMessage').fadeOut('fast');
                        }, 3000);*/
                        //location.reload();
                    },
                    error: function (result) {
                        $(".modal-overlay").removeClass("show");

                        var result = JSON.parse(JSON.stringify(result));
                        var errorMessage = '';
                        if (result.hasOwnProperty('responseJSON') && result.responseJSON.hasOwnProperty('message')) {
                            errorMessage = result.responseJSON.message;
                        }

                        $("#commonFiltersMessage").html("");
                        $("#commonFiltersMessage").append('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Fail! </strong>' + errorMessage + '</div>');
                        $("#commonFiltersMessage").show();
/*                        setTimeout(function () {
                            $('#commonFiltersMessage').fadeOut('fast');
                        }, 3000);*/
                    }
                });
            });
            $('#schemaForm').on("submit", function (e) {
                e.preventDefault();
                $(".modal-overlay").addClass("show");

                $.ajax({
                    url: '{{ route('io_generator_builder_generate_from_file') }}',
                    type: 'POST',
                    data: new FormData($(this)[0]),
                    processData: false,
                    contentType: false,
                    success: function (result) {
                        $(".modal-overlay").removeClass("show");

                        var result = JSON.parse(JSON.stringify(result));

                        $("#schemaInfo").html("");
                        $("#schemaInfo").append('<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>' + result.message + '</strong></div>');
                        $("#schemaInfo").show();
                        var $container = $("html,body");
                        var $scrollTo = $('#schemaInfo');
                        $container.animate({
                            scrollTop: $scrollTo.offset().top - $container.offset().top,
                            scrollLeft: 0
                        }, 300);
                        /*setTimeout(function () {
                            $('#schemaInfo').fadeOut('fast');
                        }, 3000);*/
                        //location.reload();
                    },
                    error: function (result) {
                        $(".modal-overlay").removeClass("show");

                        var result = JSON.parse(JSON.stringify(result));
                        var errorMessage = '';
                        if (result.hasOwnProperty('responseJSON') && result.responseJSON.hasOwnProperty('message')) {
                            errorMessage = result.responseJSON.message;
                        }

                        $("#schemaInfo").html("");
                        $("#schemaInfo").append('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Fail! </strong>' + errorMessage + '</div>');
                        $("#schemaInfo").show();
                        /*setTimeout(function () {
                            $('#schemaInfo').fadeOut('fast');
                        }, 3000);*/
                    }
                });
            });

            function renderPrimaryData(el) {

                $('.chkPrimary').iCheck(getiCheckSelection(false));

                $(el).find('.txtFieldName').val("id");
                $(el).find('.txtdbType').val("increments");
                $(el).find('.chkSearchable').attr('checked', false);
                $(el).find('.chkFillable').attr('checked', false);
                $(el).find('.chkPrimary').attr('checked', true);
                $(el).find('.chkInForm').attr('checked', false);
                $(el).find('.chkInIndex').attr('checked', false);
                $(el).find('.drdHtmlType').val('number').trigger('change');
            }

            function renderTimeStampData(el) {
                $(el).find('.txtdbType').val("timestamp");
                $(el).find('.chkSearchable').attr('checked', false);
                $(el).find('.chkFillable').attr('checked', false);
                $(el).find('.chkPrimary').attr('checked', false);
                $(el).find('.chkInForm').attr('checked', false);
                $(el).find('.chkInIndex').attr('checked', false);
                $(el).find('.drdHtmlType').val('date').trigger('change');
            }

        });

        function initializeCheckbox(el) {
            $(el).find('input:checkbox').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue'
            });
            $(el).find("select").select2({width: '100%'});

            $(el).find(".chkPrimary").on("ifClicked", function () {
                $('.chkPrimary').each(function () {
                    $(this).iCheck('uncheck');
                });
            });

            $(el).find(".chkForeign").on("ifChanged", function () {
                if ($(this).prop('checked') == true) {
                    $(el).find('.foreignTable').show();
                } else {
                    $(el).find('.foreignTable').hide();
                }
            });

            $(el).find(".chkPrimary").on("ifChanged", function () {
                if ($(this).prop('checked') == true) {
                    $(el).find(".chkSearchable").iCheck('uncheck');
                    $(el).find(".chkFillable").iCheck('uncheck');
                    $(el).find(".chkInForm").iCheck('uncheck');
                }
            });

            var htmlType = $(el).find('.drdHtmlType');

            $(htmlType).select2().on('change', function () {
                console.log(el)
                if ($(htmlType).val() == "select" || $(htmlType).val() == "multi_select" || $(htmlType).val() == "radio"){
                    $(el).find(".txtHtmlValue").val("");
                    $(el).find('.setOptionsButton').show();
                }else if ($(htmlType).val() == "selectTable"){
                    $(el).find(".txtHtmlValue").val("");
                    $(el).find('.setSelectTableOptionsButton').show();
                    $(el).find('.setOptionsButton').hide();
                }
                else if($(htmlType).val() == "filepond" || $(htmlType).val() == "filepond_image"){
                    $(el).find(".txtHtmlValue").val(JSON.stringify(filepondOptions));
                    $(el).find('.setOptionsButton').show();
                }

                else{
                    $(el).find('.setOptionsButton').hide();
                    $(el).find('.setSelectTableOptionsButton').hide();

                }

                /*$(el).find(".setOptionsButton").attr("data-field-type",htmlType.val());
                $(el).find(".setOptionsButton").attr("data-field",$(el).find(".txtFieldName").val());
                $(el).find(".txtHtmlValue").attr("data-field",$(el).find(".txtFieldName").val());*/
            });
            var filterType = $(el).find('.drdFilter');

            $(filterType).select2().on('change', function () {
                console.log(el)
                if ($(filterType).val() == "new_select" || $(filterType).val() == "new_multiselect" || $(filterType).val() == "new_radio" || $(filterType).val() =="new_set")
                    $(el).find('.setFilterOptionsButton').show();
                else
                    $(el).find('.setFilterOptionsButton').hide();

                /*$(el).find(".setOptionsButton").attr("data-field-type",htmlType.val());
                $(el).find(".setOptionsButton").attr("data-field",$(el).find(".txtFieldName").val());
                $(el).find(".txtHtmlValue").attr("data-field",$(el).find(".txtFieldName").val());*/
            });

        }

    });
    $("#txtModuleName").on("input",function(e){
        var module=$(this).val();
        $("#txtRequestNamespace").val(module+'\\'+'Http\\Requests\\API');
        $("#txtControllerNamespace").val(module+'\\'+'Http\\Controllers\\API');
        $("#txtModelNamespace").val(module+'\\'+'Models');
        $("#txtRepositoryNamespace").val(module+'\\'+'Repositories');
    })
    $(document).on("input",".txtFieldName",function(e){
        var titleFieldsOptions="";
        titleFieldsOptions+="<option value='id'>id</option>";
        $(".item .txtFieldName").each(function(item){
            titleFieldsOptions+="<option value='"+$(this).val()+"'>"+$(this).val()+"</option>";
        })
        $("#txtTitleField").html(titleFieldsOptions);
        $("#txtTitleField").val("id");
        $("#txtTitleField").trigger("change");
    })
    function getiCheckSelection(value) {
        if (value == true)
            return 'checked';
        else
            return 'uncheck';
    }

    function removeItem(e) {
        e.parentNode.parentNode.parentNode.removeChild(e.parentNode.parentNode);
    }

</script>
</html>
