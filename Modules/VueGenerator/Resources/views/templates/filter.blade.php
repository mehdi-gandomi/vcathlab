@if (is_object($filter))
    filter:"{{method_exists($filter->getFilterClass(),'getComponent') ? $filter->getFilterClass()::getComponent():'agTextColumnFilter'}}",
    @if (method_exists($filter->getFilterClass(),"getType"))
        @switch($filter->getFilterClass()::getType())
            @case("date")
            @case("datetime")
                filterParams: {
                    buttons: ['apply'],
                    suppressFilterButton: true,
                    suppressAndOrCondition: true,
                    defaultOption:"inRange",
                    suppressMenu:true,
                    closeOnApply:true,
                    suppressFilterOptions:true,
                    type:"{{$filter->getFilterClass()::getType()}}"
                    // filterOptions:[]//display none if filter options are specified empty, in _custom.scss .ag-filter-select.ag-disabled
                },
            @break
            @case("time")
                filterParams: {
                    buttons: ['apply'],
                    suppressFilterButton: true,
                    suppressAndOrCondition: true,
                    defaultOption:"inRange",
                    suppressMenu:true,
                    closeOnApply:true,
                    suppressFilterOptions:true,
                    // filterOptions:[]//display none if filter options are specified empty, in _custom.scss .ag-filter-select.ag-disabled
                },
            @break
            @case("set")
                filterParams:{
                    buttons: ['apply'],
                    suppressFilterButton: true,
                    suppressAndOrCondition: true,
                    suppressMenu:true,
                    closeOnApply:true,
                    suppressFilterOptions:true,
                    filterOptions:[],
                    values: async (params)=> {
                        const {data}=await this.getFilterValues(this.module,this.model,"{{$field['name']}}");
                        params.success(data);
                    }
                },
            @break
            @case("select")
            @case("multiselect")
                filterParams:{
                    buttons: ['apply'],
                    closeOnApply:true,
                    type:"{{$filter->getFilterClass()::getType()}}",
                    module:"{{$module}}",
                    model:"{{basename(get_class($model))}}"
                },
            @break
        @endswitch
    @endif
@else
    filter: "agTextColumnFilter",
@endif

