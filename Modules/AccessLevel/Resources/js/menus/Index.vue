<template>
  <div class="mb-base index-page" id="ag-grid-demo">
    <vx-card>
      <IndexToolbar :parent="this" />
      <ag-grid-vue
        ref="agGridTable"
        :gridOptions="gridOptions"
        class="ag-theme-material w-100 my-4 ag-grid-table"
        :columnDefs="columnDefs"
        :defaultColDef="defaultColDef"
        rowSelection="multiple"
        colResizeDefault="shift"
        domLayout="autoHeight"
        :animateRows="true"
        :modules="modules"
        :localeText="translations"
        :cacheBlockSize="paginationData.limit"
        @grid-ready="onGridReady"
        :rowModelType="rowModelType"
        :pagination="true"
        :paginationPageSize="paginationData.limit"
        :suppressPaginationPanel="true"
        :frameworkComponents="frameworkComponents"
        :enableRtl="$vs.rtl"
        :overlayLoadingTemplate="__('loading') + '...'"
      ></ag-grid-vue>

      <div class="pagination-wrap vs-pagination-primary" v-if="paginationData.totalPages > 1">
        <!-- <feather-icon icon="ChevronsLeftIcon" /> -->
        <button class="vs-pagination--buttons mx-2" @click="gotoFirstPage">
          <vs-icon icon-pack="feather" icon="icon-chevrons-right"></vs-icon>
        </button>
        <vs-pagination
          class="pagination"
          goto
          :total="paginationData.totalPages"
          @change="loadPage"
          :max="paginationData.maxPageNumbers"
          v-model="paginationData.currentPage"
        />
        <button class="vs-pagination--buttons mx-2" @click="gotoLastPage">
          <vs-icon icon-pack="feather" icon="icon-chevrons-left"></vs-icon>
        </button>
        <!-- <feather-icon icon="ChevronsRightIcon" /> -->
      </div>
    </vx-card>
  </div>
</template>

<script>
import HasFilter from '@/mixins/HasFilter';
import IndexPage from '@/mixins/IndexPage';
import Paginable from '@/mixins/Paginable';
import InteractsWithQueryString from '@/mixins/InteractsWithQueryString';
import Formatters from '@/components/aggrid-table/Formatters';

export default {
  mixins: [HasFilter, IndexPage, Paginable, InteractsWithQueryString],
  data() {
    return {
      searchQuery: '',
      baseUrl: '/accesslevel/api/menus',
      model: 'Menu',
      module: 'AccessLevel',
      createButtonText: this.__('Create Menu'),
      createButtonLink: '/accesslevel/menus/create',
      columnDefs: [
        {
          headerName: this.__('عنوان'),
          field: 'title',
          resizable: true,
          filter: 'agTextColumnFilter',
        },
        {
          headerName: this.__('آیکن'),
          field: 'icon_class',
          resizable: true,
          filter: 'agTextColumnFilter',
        },
        {
          headerName: this.__('لینک'),
          field: 'route',
          resizable: true,
          filter: 'agTextColumnFilter',
        },
        {
          headerName: this.__('ترتیب نمایش'),
          field: 'ordering',
          resizable: true,
          filter: 'agTextColumnFilter',
        },
        {
          headerName: this.__('نمایش در تب جدید'),
          field: 'open_in_blank',
          resizable: true,
          valueFormatter: Formatters.checkboxFormatter,

          filter: 'agCheckboxColumnFilter',
        },
        {
          headerName: this.__('نمایش در iFrame'),
          field: 'open_in_iframe',
          resizable: true,
          valueFormatter: Formatters.checkboxFormatter,

          filter: 'agCheckboxColumnFilter',
        },
        {
          headerName: this.__('توضیحات'),
          field: 'description',
          resizable: true,
          filter: 'agTextColumnFilter',
        },
        {
          headerName: this.__('State'),
          field: 'state',
          resizable: true,
          valueFormatter: Formatters.checkboxFormatter,

          filter: 'agCheckboxColumnFilter',
        },
        {
          headerName: this.__('subsystem'),
          field: 'subsystem.title',
          resizable: true,
          valueFormatter: Formatters.relationFormatter,
          filter: !false,
        },
        {
          headerName: this.__('Actions'),
          field: 'action',
          filter: false,
          minWidth: 150,
          cellRenderer: 'tableActionsRenderer',
          cellRendererParams: {
            model: 'Menu',
            baseRoutePath: 'accesslevel/menus',
            modelPlural: 'menus',
            baseApiPath: '/accesslevel/api',
          },
        },
      ],
      items: [],
    };
  },
  created() {
	if(this.$route.query.subsystem_id)
		this.createButtonLink += `?subsystem_id=${this.$route.query.subsystem_id}`;
  },
  methods:{
	  setFilterQuery(filterModel){
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
	query
            if (new URLSearchParams(query).toString() ==location.search.replace("?", "")) return;
            try{
                this.$router.push({query});
            }catch(e){}
        },
  }
};
</script>
