<template>
    <div>
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

      <div
        class="pagination-wrap vs-pagination-primary"
        v-if="paginationData.totalPages > 1"
      >
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
    </div>
</template>
<script>
import TableActionsRenderer from "@/components/aggrid-table/TableActions";
import TextFilterRenderer from "@/components/aggrid-table/TextFilter";
import ApplyFilterRenderer from '@/components/aggrid-table/ApplyFilterRenderer';
import translations from '@/components/aggrid-table/translations'
import '@sass/vuexy/extraComponents/agGridStyleOverride.scss';
// import { AgGridVue } from "@node_modules/ag-grid-vue"
import { AgGridVue } from '@ag-grid-community/vue';
import { MenuModule } from '@ag-grid-enterprise/menu';
import { SetFilterModule } from '@node_modules/@ag-grid-enterprise/set-filter';
import DateFilter from "@/components/aggrid-table/filters/DateFilter"
import SelectFilter from "@/components/aggrid-table/filters/SelectFilter"
import TimeFilter from "@/components/aggrid-table/filters/TimeFilter"
import RangeNumberFilter from "@/components/aggrid-table/filters/RangeNumberFilter"
// import {ClientSideRowModelModule} from '@ag-grid-community/client-side-row-model';
import { ServerSideRowModelModule } from '@node_modules/@ag-grid-enterprise/server-side-row-model';
import IndexToolbar from '@/components/IndexToolbar.vue'
// import '@node_modules/@ag-grid-community/core/dist/styles/ag-theme-alpine.css';
import '@node_modules/@ag-grid-community/core/dist/styles/ag-theme-material.css';
// import '@node_modules/@ag-grid-community/core/dist/styles/ag-theme-dark.css';
import DataSource from '@/components/aggrid-table/DataSource'
import HasFilter from "@/mixins/HasFilter";
import Paginable from "@/mixins/Paginable";
import InteractsWithQueryString from "@/mixins/InteractsWithQueryString";

export default {
  mixins: [HasFilter, Paginable, InteractsWithQueryString],
    props:{
        columnDefs:{
            type:Array,
            required:true
        },
        baseUrl:{
            type:String
        }
    },
    components: {
        AgGridVue
    },
    data() {
        const Lang=Iracode.$i18n.locale;
        return {
            gridOptions: {
                // dateComponent:DateFilter,
                context: {
                    componentParent: this
                },
                // floatingFilter:true,
                // filter:true,
                            // enables pagination in the grid
                pagination: true,

                // sets 10 rows per page (default is 100)
                paginationPageSize: 10,
            },
            currentRowCount:0,
            rowModelType:"serverSide",
            translations:translations[Lang],
            gridApi: null,
            frameworkComponents: {
                agDateInput: DateFilter,
                tableActionsRenderer: TableActionsRenderer,
                textFilterRenderer: TextFilterRenderer,
                applyFilterRenderer:ApplyFilterRenderer,
                agSelectColumnFilter:SelectFilter,
                agRangeNumberColumnFilter:RangeNumberFilter,
                agTimeRangeColumnFilter:TimeFilter
            },
            modules:[ServerSideRowModelModule,MenuModule,SetFilterModule],
            defaultColDef: {
                sortable: true,
                editable: false,
                resizable: true,
                suppressMenu: false,
                flex: 1,
                filter: true,
                // floatingFilterComponent: "agTextColumnFilter",
                filterParams: {
                    buttons: ['apply'],
                    suppressFilterButton: true,
                    suppressAndOrCondition: true,
                    suppressMenu:true,
                    closeOnApply:true,
                    suppressFilterOptions:true,
                    // filterOptions:[]//display none if filter options are specified empty, in _custom.scss .ag-filter-select.ag-disabled
                },
                // filterComponentParams: {         buttons: ['reset', 'apply'],debounceMs: 200,suppressFilterButton: true,suppressAndOrCondition: true,suppressMenu:true },
                // floatingFilter: true,
            },
        }
    },
    computed: {
        localeText(){
            return this.translations[Lang.locale] ? this.translations[Lang.locale]:this.translations['en'];
        },
    },
    methods: {

        onGridReady(params) {
            params.api.setServerSideDatasource(new DataSource(this));
            // ;
            // if(this.columnDefs.length < 8) this.gridApi.sizeColumnsToFit();
            // else this.gridOptions.columnApi.autoSizeAllColumns();
            // window.onresize = () => {
            //     this.gridApi.sizeColumnsToFit();
            // }
        },
        addFixedHeader(){
            const header = document.querySelector('[ref="headerRoot"]');
            const body = document.querySelector('[ref="eBodyViewport"]');
            // body.style.minHeight="300px";
            const headerContainer = document.querySelector('[ref="eHeaderContainer"]');

            // More on this later
            const original={};
            original.position = header.style.position;
            original.top = header.style.top;
            original.height = header.style.height;
            original.width = header.style.width;
            original.minHeight = header.style.minHeight;
            original.zIndex = header.style.zIndex;

            window.addEventListener("scroll", () => {
                const shouldStick = header.getBoundingClientRect().top <= 0;
                const shouldUnstick = body.getBoundingClientRect().top -
                    header.getBoundingClientRect().height > 0;

                if (shouldStick) {
                    header.style.position = "fixed";
                    header.style.top = "55px";
                    header.style.height = "55px";
                    header.style.width = "79%";
                    header.style.minHeight = "55px";
                    headerContainer.querySelector(".ag-header-row:nth-of-type(2)").style.display="none";
                    // this is optional, but if you have other contents that overlap the
                    // header you may want to adjust the zIndex accordingly
                    header.style.zIndex = "2";
                }
                if (shouldUnstick) {
                    headerContainer.querySelector(".ag-header-row:nth-of-type(2)").style.display="block";
                    header.style.position = original.position;
                    header.style.top = original.top;
                    header.style.width = original.width;
                    header.style.height = original.height;
                    header.style.minHeight = original.minHeight;
                    header.style.zIndex = original.zIndex;
                }
            })
        },
    },
    async beforeMount() {

        // try{
        //     const {data}=await this.$http.post(`${window.config.path_prefix}/api/get-model-fields`,{
        //         model:this.model,
        //         module:this.module
        //     });
        //     this.fields=data.data;
        // }catch(e){}
    },
    async mounted() {
        this.gridApi = this.gridOptions.api
        this.initializeFilters();

        if(this.$vs.rtl) {
            document.querySelector("[ref=gridPanel]").style.minHeight="300px";
            document.querySelector(".ag-body-horizontal-scroll-viewport").scrollLeft=this.$store.state.windowWidth;
        }
    }
}

</script>
