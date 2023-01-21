export default {
    methods: {
      getParamsForIndex(){
        let params = {};
        let query;
        if(this.shouldUpdateQueryString){
            query={ ...this.$route.query }
            for (const key in query) {
                if (["_limit", "_page","sort"].indexOf(key) < 0) {
                    params[`filter[${key}]`] = query[key];
                }
            }
        }else{
            query={...this.defaultFilterModel};
            query={...query,...this.gridApi.getFilterModel()};
            for (const key in query) {
                params[`filter[${key}]`] = query[key].value;
            }
        }
        params.limit = query._limit ? query._limit:this.paginationData.limit;
        params.skip = (this.paginationData.currentPage - 1) * this.paginationData.limit;
        if (params.skip < 1) delete params["skip"];
        if(this.baseFilters) {
            const baseFilters={};
            for (const key in this.baseFilters) {
                baseFilters[`filter[${key}]`] = this.baseFilters[key];
            }
            console.log(baseFilters)
            params={...params,...baseFilters};
        }

        return params;
      },
      getParamsForExport(){
        let params = {};
        let query;
        if(this.shouldUpdateQueryString){
            query={ ...this.$route.query }
            for (const key in query) {
                if (["_limit", "_page"].indexOf(key) < 0) {
                    params[`filter[${key}]`] = query[key];
                }
            }
        }else{
            query={...this.defaultFilterModel};
            query={...query,...this.gridApi.getFilterModel()};
            for (const key in query) {
                params[`filter[${key}]`] = query[key].value;
            }
        }
        if(this.baseFilters) {
            const baseFilters={};
            for (const key in this.baseFilters) {
                baseFilters[`filter[${key}]`] = this.baseFilters[key];
            }
            console.log(baseFilters)
            params={...params,...baseFilters};
        }
        return params;
      },
      getParamsForIndexPagination(){
        const params = {};
        const query = { ...this.$route.query };
        params.limit = query._limit ? query._limit:this.paginationData.limit;
        delete params['_page'];
        for (const key in query) {
          if (["_limit", "_page"].indexOf(key) < 0) {
            params[`filter[${key}]`] = query[key];
          }
        }
        return params;
      }
    },


}

