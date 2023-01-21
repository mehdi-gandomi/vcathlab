import HasFilter from '@/mixins/HasFilter';
import IndexPage from '@/mixins/IndexPage'
import Paginable from '@/mixins/Paginable'
import Sortable from "@/mixins/Sortable";
import InteractsWithQueryString from "@/mixins/InteractsWithQueryString";
import Formatters from "@/components/aggrid-table/Formatters";

export default {
    mixins: [HasFilter,IndexPage,Paginable,InteractsWithQueryString,Sortable],
    data() {
        return {
            searchQuery: '',
            baseUrl:"{{ $baseApiPath }}/{{ $modelPlural }}",
            model:"{{basename(get_class($model))}}",
            module:"{{$module}}",
            createButtonText:this.__("Create {{$modelTitle}}"),
            createButtonLink:"/{{$baseRoutePath}}/create",
            printButtonLink:"/{{$baseRoutePath}}/print",
            columnDefs: [
                {
                    headerName: this.__("Row"),
                    width:80,
                    minWidth:80,
                    valueGetter: "node.rowIndex + 1",
                    valueFormatter:Formatters.rowNumberFormatter
                },
                @php
                    $fields=$model::$fields;

                    $indexFields=array_filter($fields,function($field){
                        return $field['inIndex'] == 1;
                    });
                    $field=array_shift($indexFields);
                @endphp
                {
                    headerName: this.__("{{ $field['title'] }}"),
                    @if ($field['htmlType'] == "relation")
                        field: "{{ \Str::snake($field['name']).'.'.$field['relatedClass']::$title }}",
                    @else
                        field: "{{ $field['name'] }}",
                    @endif
                    resizable: true,
                    @if (isset($model::allowedFilters()[$field['name']]))
                        @include('vuegenerator::templates.filter',['field'=>$field,'model'=>$model,'module'=>$module,'filter'=>$model::allowedFilters()[$field['name']]])
                    @else
                        filter:false,
                    @endif
                    @include('vuegenerator::templates.value-formatter',['field'=>$field,'model'=>$model])
                    @include('vuegenerator::templates.cell-renderer',['field'=>$field,'model'=>$model])
                    },

                @foreach ($indexFields as $key => $field)
                        {
                            headerName: this.__("{{ $field['title'] }}"),
                            @if ($field['htmlType'] == "relation")
                                field: "{{ \Str::snake($field['name']).'.'.$field['relatedClass']::$title }}",
                            @else
                                field: "{{ $field['name'] }}",
                            @endif
                            resizable: true,
                            @include('vuegenerator::templates.value-formatter',['field'=>$field,'model'=>$model])
                            @include('vuegenerator::templates.cell-renderer',['field'=>$field,'model'=>$model])
                            @if (isset($model::allowedFilters()[$field['name']]))
                                @include('vuegenerator::templates.filter',['field'=>$field,'model'=>$model,'module'=>$module,'filter'=>$model::allowedFilters()[$field['name']]])
                            @else
                                filter:false,
                            @endif
                        },
                @endforeach
                {
                    headerName: this.__('Actions'),
                    field: 'action',
                    filter:false,
                    cellRenderer: "tableActionsRenderer",
                    cellRendererParams: {
                        model:"{{ $modelTitle }}",
                        baseRoutePath:"{{ $baseRoutePath }}",
                        modelPlural:"{{$modelPlural}}",
                        baseApiPath:"{{ $baseApiPath }}",
                        @if (!$showEditButton)
                            showEditButton:false,
                        @endif
                        @if (!$showDetailButton)
                            showDetailButton:false,
                        @endif
                    }

                }
            ],
            items: []
        }
    }

}
