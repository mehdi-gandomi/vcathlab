const DataSource=(vm)=>{
    return {
        // called by the grid when more rows are required
        getRows:async (params) => {
            const request=params.request;
            // params.request.startRow=40;
            // vm.$store.dispatch("setFilter",{model:vm.model,filters:request.filterModel})
            if(vm.shouldUpdateQueryString === true){
                vm.setFilterQuery(request.filterModel);
            }
            let queryParams=vm.getParamsForIndex();
            if(vm.createSortParams){
                const sorts=vm.createSortParams(request)
                queryParams={...queryParams,...sorts};
                vm.setSortQuery(sorts);
            }
            if(Object.keys(request.filterModel).length > 0 && vm.anyFiltersApplied) vm.anyFiltersApplied=true
            // for(const key in request.filterModel){
            //     const model=request.filterModel[key];
            //     const filterType=model.filterType;
            //     if(filterType == "set"){
            //         queryParams[`filter[${key}]`]=model.values.length ? model.values.join(","):'';
            //     }else if(filterType == "date" || filterType == "datetime"){
            //         queryParams[`filter[${key}]`]=`${model.dateFrom},${model.dateTo}`;
            //     }else if(filterType == "select"){
            //         queryParams[`filter[${key}]`]=model.value;
            //     }else if(filterType == "multi_select"){
            //         queryParams[`filter[${key}]`]=model.value.join(",");
            //     }
            //     else{
            //         queryParams[`filter[${key}]`]=model.filter;
            //     }
            //     if(!queryParams[`filter[${key}]`]) delete queryParams[`filter[${key}]`];
            // }

            // queryParams['skip']=request.startRow;
            // queryParams['limit']=vm.paginationData.limit;
            // const query={...this.$route.query};
            // queryParams[field]=value;
            // this.$router.push({query});
            // get data for request from server
            // var response = server.getData(params.request);
            try{
             const { data } = await vm.$http.get(vm.baseUrl,{
                params:queryParams
            });
              if (data.success) {
                // let currentLastRow = request.startRow + data.data.length;
                // currentLastRow=currentLastRow <= request.endRow ? currentLastRow : -1;
                console.log(request)
                vm.currentRowCount=data.data.items.length;
                vm.paginationData.totalPages = data.data.pagination_data.total_pages;
                vm.paginationData.count = data.data.pagination_data.count;
                // let lastRow=vm.paginationData.currentPage > 1 ? (vm.paginationData.currentPage * data.data.items.length):data.data.items.length;
                // console.log(lastRow)
                const length=Array.isArray(data.data.items) ? data.data.items.length:Object.values(data.data.items).length;
                const items=Array.isArray(data.data.items) ? data.data.items:Object.values(data.data.items);
                params.successCallback(items,length);
              }
            }catch(e){
                console.log(e)
                params.failCallback();
            }

        },
        resetFilters:async () => {
            vm.setFilterQuery(request.filterModel);
            const queryParams=vm.getParamsForIndex();
            // queryParams['skip']=request.startRow;
            // queryParams['limit']=vm.paginationData.limit;
            // const query={...this.$route.query};
            // queryParams[field]=value;
            // this.$router.push({query});
            // get data for request from server
            // var response = server.getData(params.request);
            try{
             const { data } = await vm.$http.get(vm.baseUrl,{
                params:queryParams
            });
              if (data.success) {


                params.successCallback(data.data, -1);
              }
            }catch(e){
                console.log(e)
                params.failCallback();
            }

        }
    };
}
export default DataSource;
