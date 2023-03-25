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
import Sortable from "@/mixins/Sortable";
import InteractsWithQueryString from "@/mixins/InteractsWithQueryString";
import Formatters from "@/components/aggrid-table/Formatters";

export default {
    mixins: [
        HasFilter,
        IndexPage,
        Paginable,
        InteractsWithQueryString,
        Sortable,
    ],
    data() {
        return {
            searchQuery: "",
            baseUrl: "/user/api/aobp_calculations",
            model: "AobpCalculation",
            module: "User",
            createButtonText: this.__("Create Aobpcalculation"),
            createButtonLink: "/user/aobp_calculations/create",
            printButtonLink: "/user/aobp_calculations/print",
            columnDefs: [
                {
                    headerName: this.__("Row"),
                    width: 80,
                    minWidth: 80,
                    valueGetter: "node.rowIndex + 1",
                    valueFormatter: Formatters.rowNumberFormatter,
                },
                // {
                //     headerName: this.__("Sys"),
                //     field: "sys",
                //     resizable: true,
                //     filter: "agTextColumnFilter",
                // },

                // {
                //     headerName: this.__("Dia"),
                //     field: "dia",
                //     resizable: true,
                //     filter: "agTextColumnFilter",
                // },
                // {
                //     headerName: this.__("Hr"),
                //     field: "hr",
                //     resizable: true,
                //     filter: "agTextColumnFilter",
                // },
                {
                    headerName: this.__("user"),
                    field: "user.email",
                    resizable: true,
                    filter: false,
                },
                {
                    headerName: this.__("patient"),
                    field: "patient.name",
                    resizable: true,
                    filter: false,
                },
                {
                    headerName: this.__("Created At"),
                    field: "created_at",
                    resizable: true,
                    valueFormatter: Formatters.dateFormatter,

                    filter: "agTextColumnFilter",
                },
                {
                    headerName: this.__("Updated At"),
                    field: "updated_at",
                    resizable: true,
                    valueFormatter: Formatters.dateFormatter,

                    filter: "agTextColumnFilter",
                },

                {
                    headerName: this.__("Actions"),
                    field: "action",
                    filter: false,
                    cellRenderer: "tableActionsRenderer",
                    cellRendererParams: {
                        model: "Aobpcalculation",
                        baseRoutePath: "user/aobp_calculations",
                        modelPlural: "aobp_calculations",
                        baseApiPath: "/user/api",
                        showEditButton: false,
                    },
                },
            ],
            items: [],
        };
    },
};
</script>
