<template>
    <div class="mb-base index-page" id="ag-grid-demo">
        <vx-card>
            <IndexToolbar v-if="shouldShowToolbar" :parent="this" />
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
            baseUrl: "/user/api/body_compositions",
            model: "BodyComposition",
            module: "User",
            createButtonText: this.__("Create Bodycomposition"),
            createButtonLink: "/user/body_compositions/create",
            printButtonLink: "/user/body_compositions/print",
            columnDefs: [
                {
                    headerName: this.__("Row"),
                    width: 80,
                    minWidth: 80,
                    valueGetter: "node.rowIndex + 1",
                    valueFormatter: Formatters.rowNumberFormatter,
                },
                {
                    headerName: this.__("Actions"),
                    field: "action",
                    filter: false,
                    cellRenderer: "tableActionsRenderer",
                    cellRendererParams: {
                        model: "Bodycomposition",
                        baseRoutePath: "user/body_compositions",
                        modelPlural: "body_compositions",
                        baseApiPath: "/user/api",
                    },
                },
                {
                    headerName: this.__("patient"),
                    field: "patient.name",
                    resizable: true,
                    filter: false,
                },
                {
                    headerName: this.__("Age"),
                    field: "Age",
                    resizable: true,
                    filter: "agTextColumnFilter",
                },

                {
                    headerName: this.__("Sex"),
                    field: "Sex",
                    resizable: true,
                    valueFormatter: Formatters.radioFormatter,

                    filter: "agSelectColumnFilter",
                    filterParams: {
                        buttons: ["apply"],
                        closeOnApply: true,
                        type: "select",
                        module: "User",
                        model: "BodyComposition",
                    },
                },
                {
                    headerName: this.__("Waist"),
                    field: "Waist",
                    resizable: true,
                    filter: "agTextColumnFilter",
                },
                {
                    headerName: this.__("SMM"),
                    field: "SMM",
                    resizable: true,
                    filter: "agTextColumnFilter",
                },
                {
                    headerName: this.__("VFP"),
                    field: "VFP",
                    resizable: true,
                    filter: "agTextColumnFilter",
                },
                {
                    headerName: this.__("Height"),
                    field: "Height",
                    resizable: true,
                    filter: "agTextColumnFilter",
                },
                {
                    headerName: this.__("Weight"),
                    field: "Weight",
                    resizable: true,
                    filter: "agTextColumnFilter",
                },
                {
                    headerName: this.__("Hip"),
                    field: "Hip",
                    resizable: true,
                    filter: "agTextColumnFilter",
                },
                {
                    headerName: this.__("BFMP"),
                    field: "BFMP",
                    resizable: true,
                    filter: "agTextColumnFilter",
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
                // {
                //     headerName: this.__("user"),
                //     field: "user.email",
                //     resizable: true,
                //     filter: false,
                // },


            ],
            items: [],
        };
    },
};
</script>
