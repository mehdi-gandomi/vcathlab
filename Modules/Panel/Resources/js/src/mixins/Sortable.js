export default {
    computed:{
        from(){
            return ((this.paginationData.currentPage - 1) * this.paginationData.limit) + 1;
        }
    },
    methods: {
        createSortParams(request){
            const sorts=request.sortModel.map(sort=>{
                if(sort.sort == "asc"){
                    return sort.colId;
                }else if(sort.sort == "desc"){
                    return `-${sort.colId}`;
                }
            });
            if(sorts.length > 0){
                return {
                    sort:sorts.join(",")
                }
            }
            return {}
        },
        setSortQuery(sorts){
            if(typeof sorts == "object"){
                const query={...this.$route.query,...sorts};
                if (new URLSearchParams(query).toString() ==location.search.replace("?", "")) return;
                try{
                    this.$router.push({query});
                }catch(e){}
            }
        }
    },
    async mounted() {
        const query=this.$route.query;
        if(query.sort){
            let sorts=[];
            sorts=query.sort.split(",")
            sorts=sorts.map(sort=>{
                if(sort.indexOf("-") > -1) return {
                    colId:sort.replace("-",""),
                    sort:"desc"
                };
                return {
                    colId:sort,
                    sort:"asc"
                };
            });
            this.gridOptions.columnApi.applyColumnState({state:sorts})
            // this.gridApi.setSortModel(sorts)
            // console.log(sorts,this.gridApi)
        }
        // await this.getPaginationData();
    },
}
