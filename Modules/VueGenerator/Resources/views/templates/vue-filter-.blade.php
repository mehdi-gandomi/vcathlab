@if (in_array($column['name'], $model->getDates()))
    valueFormatter: Formatters.dateFormatter,
@else
    @switch($model::$fields[$column['name']]['htmlType'])
        @case("select")
            valueFormatter: Formatters.selectFormatter,
        @break

        @case("checkbox")
            valueFormatter: Formatters.checkboxFormatter,
        @break
        @case("radio")
            valueFormatter: Formatters.radioFormatter,
        @break
    @endswitch
@endif
{{-- @case("multi_select")
            valueFormatter: Formatters.selectFormatter,
        @break --}}
