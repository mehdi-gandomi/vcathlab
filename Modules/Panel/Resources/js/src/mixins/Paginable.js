export default {
    data() {
        return {
            maxPageNumbers: 7,
            paginationData: {
                totalPages: 1,
                count: 1,
                maxPageNumbers: 7,
                currentPage: 1,
                perPages: [10,20, 50, 100, 150],
                perPageIndex: 0,
                limit: 10,
            },
        }
    },
    computed:{
        from(){
            return ((this.paginationData.currentPage - 1) * this.paginationData.limit) + 1;
        }
    },
    methods: {
        gotoFirstPage(){
            this.loadPage(1);
        },
        gotoLastPage(){
            this.loadPage(this.paginationData.totalPages)
        },
        updatePaginationQueryString() {
            const query = { ...this.$route.query };
            query._limit = this.paginationData.limit;
            query._page = this.paginationData.currentPage;
            // console.log(new URLSearchParams(query).toString())
            if (new URLSearchParams(query).toString() ==location.search.replace("?", "")) return;
            try{
                this.$router.push({ query });
            }catch(e){}
        },
        async setPerPage(index) {
            this.paginationData.perPageIndex = index;
            this.paginationData.limit = this.paginationData.perPages[
              this.paginationData.perPageIndex
            ];
            this.paginationData.currentPage = parseInt(
              this.paginationData.count / this.paginationData.limit
            );
            if(this.shouldUpdateQueryString){
                this.updatePaginationQueryString();
            }
            this.items=[];
            this.gridApi.purgeServerSideCache([]);
            //await this.getPaginationData();
            // await this.refreshItems();
          },

          async loadPage(page) {
            this.paginationData.currentPage = page;
            this.updatePaginationQueryString();
            // this.gridApi.paginationGoToNextPage();
            this.items=[];
            this.gridApi.purgeServerSideCache([]);
          },
          async getPaginationData() {

            const params=this.getParamsForIndexPagination();
            const { data: paginationData } = await this.$http.get(
              `${this.baseUrl}/pagination_data`,
              {
                params
              }
            );
            this.paginationData.totalPages = paginationData.data.total_pages;
            this.paginationData.count = paginationData.data.count;
          },
    },
    async created() {
        this.paginationData.currentPage = this.$route.query._page
          ? +this.$route.query._page
          : 1;
        this.paginationData.limit = this.$route.query._limit
          ? +this.$route.query._limit
          : this.paginationData.limit;
        this.paginationData.perPageIndex = this.paginationData.perPages.indexOf(
          this.paginationData.limit
        );
        this.paginationData.perPageIndex =
          this.paginationData.perPageIndex < 0
            ? 0
            : this.paginationData.perPageIndex;
        // await this.getPaginationData();
    },
}
