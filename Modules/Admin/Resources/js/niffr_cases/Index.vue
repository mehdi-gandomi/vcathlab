<template>
    <div class="mb-base index-page" id="ag-grid-demo">
        <vx-card>
            <IndexToolbar :showCreateButton="false" v-if="shouldShowToolbar" :parent="this" />
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
                <button
                    class="vs-pagination--buttons mx-2"
                    @click="gotoFirstPage"
                >
                    <vs-icon
                        icon-pack="feather"
                        icon="icon-chevrons-right"
                    ></vs-icon>
                </button>
                <vs-pagination
                    class="pagination"
                    goto
                    :total="paginationData.totalPages"
                    @change="loadPage"
                    :max="paginationData.maxPageNumbers"
                    v-model="paginationData.currentPage"
                />
                <button
                    class="vs-pagination--buttons mx-2"
                    @click="gotoLastPage"
                >
                    <vs-icon
                        icon-pack="feather"
                        icon="icon-chevrons-left"
                    ></vs-icon>
                </button>
                <!-- <feather-icon icon="ChevronsRightIcon" /> -->
            </div>
        </vx-card>
    </div>
</template>

<script>
import HasFilter from "@/mixins/HasFilter";
import IndexPage from "@/mixins/IndexPage";
import Paginable from "@/mixins/Paginable";
import InteractsWithQueryString from "@/mixins/InteractsWithQueryString";
import Formatters from "@/components/aggrid-table/Formatters";
import DataSource from '@/components/aggrid-table/DataSource'
export default {
    mixins: [HasFilter, IndexPage, Paginable, InteractsWithQueryString],
    data() {
        return {
            searchQuery: "",
            baseUrl: "/user/api/niffr_cases",
            model: "NIFFRCase",
            module: "User",
            createButtonText: this.__("Create Niffrcase"),
            createButtonLink: "/user/niffr_cases/create",
            printButtonLink: "/user/niffr_cases/print",
            columnDefs: [


                {
                    headerName: this.__("Physician"),
                    field: "physician",
                    resizable: true,
                    filter: "agTextColumnFilter"
                },

                {
                    headerName: this.__("Patient"),
                    field: "patient.name",
                    resizable: true,
                    filter: "agTextColumnFilter"
                },
                {
                    headerName: this.__("Age"),
                    field: "patient.age",
                    resizable: true,
                    filter: "agTextColumnFilter"
                },
                {
                    headerName: this.__("Hospital"),
                    field: "patient.hospital",
                    resizable: true,
                    filter: "agTextColumnFilter"
                },


                {
                    headerName: this.__("Created At"),
                    field: "created_at",
                    resizable: true,
                    valueFormatter: Formatters.dateFormatter,

                    filter: "agDateColumnFilter",
                    filterParams: {
                        buttons: ['apply'],
                        suppressFilterButton: true,
                        suppressAndOrCondition: true,
                        defaultOption:"inRange",
                        suppressMenu:true,
                        closeOnApply:true,
                        suppressFilterOptions:true,
                        type:"date"
                        // filterOptions:[]//display none if filter options are specified empty, in _custom.scss .ag-filter-select.ag-disabled
                    },
                },
                {
                    headerName: this.__("Actions"),
                    field: "action",
                    filter: false,
                    minWidth: 150,
                    cellRenderer: "tableActionsRenderer",
                    cellRendererParams: {
                        model: "Niffrcase",
                        baseRoutePath: "user/niffr_cases",
                        modelPlural: "niffr_cases",
                        baseApiPath: "/user/api"
                    }
                }
            ],
            items: []
        };
    },
     methods: {
          onGridReady(params) {
            params.api.setServerSideDatasource(new DataSource(this));
            // ;
            if(this.columnDefs.length < 8) this.gridApi.sizeColumnsToFit();
            else this.gridOptions.columnApi.autoSizeAllColumns();
            this.gridOptions.columnApi.applyColumnState({
            state: [{ colId: 'patient.hospital', sort: 'desc' }],
            defaultState: { sort: null },
        });
        }
    },
};
</script>
