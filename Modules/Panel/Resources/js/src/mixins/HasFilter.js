
export default {
    data(){
        return {
            anyFiltersApplied:false
        }
    },
    methods: {
        // filter(field,value){
        //     const query={...this.$route.query};
        //     query[field]=value;
        //     this.$router.push({query});
        //     console.log("before apply")
        //     // this.refreshItems();
        // },
        setFilterQuery(filterModel){
            if(!this.shouldUpdateQueryString) return;
            if(Object.keys(filterModel).length > 0) this.anyFiltersApplied=true;
            else this.anyFiltersApplied=false;
            const query={...this.$route.query};
            for(const key in filterModel){
                const model=filterModel[key];
                const filterType=model.filterType;

                if(filterType == "set"){
                    query[key]=model.values.length ? model.values.join(","):'';
                }else if(filterType == "date" || filterType == "datetime"){
                    query[key]=`${model.dateFrom},${model.dateTo}`;
                }else if(filterType == "rangeNumber"){
                    query[key]=`${model.from},${model.to}`;
                }else if(filterType == "timeRange"){
                    query[key]=`${model.from},${model.to}`;
                }
                else if(filterType == "select"){
                    query[key]=model.value;
                }else if(filterType == "multi_select"){
                    query[key]=model.value.join(",");
                }
                else{
                    query[key]=model.filter;
                }
                if(!query[key]) delete query[key];
            }
            if(this.paginationData.totalPages > 1){
                query._limit = this.paginationData.limit;
                query._page = this.paginationData.currentPage;
            }

            // console.log(new URLSearchParams(query).toString())

            if (new URLSearchParams(query).toString() ==location.search.replace("?", "")) return;
            try{
                this.$router.push({query});
            }catch(e){}
        },
        initializeFilters(){
            if(!this.shouldUpdateQueryString){
                this.gridApi.setFilterModel(this.defaultFilterModel);
                return;
            }
            const filters=this.getFilters();
            if(Object.keys(filters).length > 0) this.anyFiltersApplied=true;
            else this.anyFiltersApplied=false;
            const model={};
            for(const key in filters){
                const instance=this.gridApi.getFilterInstance(key);
                if(instance){
                    model[key]=instance.getModel();
                    if(!model[key] && instance.dateFilterParams){
                        model[key]={
                            filterType:instance.dateFilterParams.type,
                            dateFrom:"",
                            dateTo:""
                        }
                    }
                    if(!model[key]){
                        if(instance.dateFilterParams){
                            model[key]={
                                filterType:instance.dateFilterParams.type,
                                dateFrom:"",
                                dateTo:""
                            }
                        }else{
                            model[key]={
                                filterType:"text",
                            }
                        }
                    }
                    if(model){
                        const value=filters[key];
                        if(value){
                            if(model[key].filterType == "select"){
                                model[key].value=filters[key];
                            }else if(model[key].filterType == "multi_select"){
                                model[key].value=value.split(",");
                            }else if(model[key].filterType == "rangeNumber" || model[key].filterType == "timeRange"){
                                const range=value.split(",");
                                model[key].from=range[0];
                                model[key].to=range[1];
                            }else if(model[key].filterType == "date" || model[key].filterType == "datetime"){
                                const values=filters[key].split(",");
                                model[key].dateFrom=values[0];
                                model[key].dateTo=values[1];
                            }else{
                                model[key].filter=filters[key];
                            }
                        }
                    }

                }
            }
            // this.setFilterQuery(model)
            this.gridApi.setFilterModel(model);
        },
        async getFilterValues(module,model,column){
            return await this.$http.post(`${window.config.path_prefix}/api/filter/values`,{
                model:model,
                module:module,
                column:column
            })
        },
        resetFilters(){
            try{
                // const query = {
                //     _page:this.paginationData.currentPage,
                //     _limit:this.paginationData.limit
                // };

                // this.$router.push({query});
                this.gridApi.setFilterModel(null)
                this.anyFiltersApplied=false;
                this.gridApi.purgeServerSideCache([]);
                // this.gridApi.serverSideRowModel.datasource.resetFilters();
            }catch(e){
                console.log(e)
            }
        },
        queryStringObject(){

        },
        getFilters(){
            const query = { ...this.$route.query };
            delete query['_limit'];
            delete query['_page'];
            return query;
        },
        getParamsForFilter(){
            const params = {};
            const query = { ...this.$route.query };
            delete query['_limit'];
            delete query['_page'];
            delete query['sort'];
            for (const key in query) {
                params[`filter[${key}]`] = query[key];
            }
            return params;
        },
    },
    computed:{
        // anyFiltersApplied(){
        //     return this.gridApi && this.gridApi.filterManager && this.gridApi.filterManager.allFilters.size > 0;
        //     // return this.gridApi && Object.keys(this.gridApi.getFilterModel()).length > 0;
        // }
    },
    mounted() {
        // console.log(this.getFilters())
    },
}
