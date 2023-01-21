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
        Sortable
    ],
    data() {
        return {
            searchQuery: "",
            baseUrl: "/user/api/mace_assesments",
            model: "MaceAssesment",
            module: "User",
            createButtonText: this.__("Create Maceassesment"),
            createButtonLink: "/mace_assesment",
            printButtonLink: "/user/mace_assesments/print",
            columnDefs: [
                {
                    headerName: this.__("Row"),
                    width: 80,
                    minWidth: 80,
                    valueGetter: "node.rowIndex + 1",
                    valueFormatter: Formatters.rowNumberFormatter
                },

                {
                    headerName: this.__("Actions"),
                    field: "action",
                    filter: false,
                    cellRenderer: "tableActionsRenderer",
                    cellRendererParams: {
                        showDeleteButton:false,
                        model: "Maceassesment",
                        baseRoutePath: "user/mace_assesments",
                        modelPlural: "mace_assesments",
                        baseApiPath: "/user/api",
                        buttons:[
                            {
                                text() {
                                    return this.__(`ABI`);
                                },
                                link(){
                                    return window.config.base+"/user/api/mace_assesments/"+this.params.data.id+"/export/abi"
                                },
                                class:"includeIcon includeIconOnly",
                                async callback() {
                                    this.params.context.componentParent.sharePopupActive=true;
                                    this.params.context.componentParent.selectedResource=this.params.data;
                                },
                                color: "success",
                            },
                            {
                                text() {
                                    return this.__(`R`);
                                },
                                link(){
                                    return window.config.base+"/user/api/mace_assesments/"+this.params.data.id+"/export/r"
                                },
                                class:"includeIcon includeIconOnly",
                                async callback() {
                                    this.params.context.componentParent.sharePopupActive=true;
                                    this.params.context.componentParent.selectedResource=this.params.data;
                                },
                                color: "success",
                            },
                        ]
                    }
                },
                {
                    headerName: this.__("Created At"),
                    field: "created_at",
                    resizable: true,
valueFormatter: (params)=>{
                        return params.data.created_at_fa;
                    },
                    filter: "agDateColumnFilter",
                    filterParams: {
                        buttons: ['apply'],
                        suppressFilterButton: true,
                        suppressAndOrCondition: true,
                        defaultOption:"inRange",
                        suppressMenu:true,
                        closeOnApply:true,
                        suppressFilterOptions:true,
                        type:"datetime"
                        // filterOptions:[]//display none if filter options are specified empty, in _custom.scss .ag-filter-select.ag-disabled
                    },
                },
                {
                    headerName: this.__("patient"),
                    field: "patient.name",
                    resizable: true,
                    filter: false
                },

                {
                    headerName: this.__("Age"),
                    field: "Age",
                    resizable: true,
                    filter: "agTextColumnFilter"
                },


                {
                    headerName: this.__("Ankle Brachial Index"),
                    field: "abi_clicked",
                    resizable: true,
                    valueFormatter: (params)=>{
                        return params.value == 1 ? "Yes":"No";
                    },

                    filter: "agSelectColumnFilter",
                    filterParams: {
                        buttons: ["apply"],
                        closeOnApply: true,
                        type: "select",
                        module: "User",
                        model: "MaceAssesment"
                    }
                },
                {
                    headerName: this.__("Screening Test"),
                    field: "screening_test_clicked",
                    resizable: true,
                    valueFormatter: (params)=>{
                        return params.value == 1 ? "Yes":"No";
                    },

                    filter: "agSelectColumnFilter",
                    filterParams: {
                        buttons: ["apply"],
                        closeOnApply: true,
                        type: "select",
                        module: "User",
                        model: "MaceAssesment"
                    }
                },
                {
                    headerName: this.__("PTP of CAD"),
                    field: "ptp_of_cad_clicked",
                    resizable: true,
                    valueFormatter: (params)=>{
                        return params.value == 1 ? "Yes":"No";
                    },

                    filter: "agSelectColumnFilter",
                    filterParams: {
                        buttons: ["apply"],
                        closeOnApply: true,
                        type: "select",
                        module: "User",
                        model: "MaceAssesment"
                    }
                },
                {
                    headerName: this.__("Total Result"),
                    field: "total_clicked",
                    resizable: true,
                    valueFormatter: (params)=>{
                        return params.value == 1 ? "Yes":"No";
                    },

                    filter: "agSelectColumnFilter",
                    filterParams: {
                        buttons: ["apply"],
                        closeOnApply: true,
                        type: "select",
                        module: "User",
                        model: "MaceAssesment"
                    }
                },


                // {
                //     headerName: this.__("Updated At"),
                //     field: "updated_at",
                //     resizable: true,
                //     valueFormatter: Formatters.dateFormatter,

                //     filter: "agTextColumnFilter",
                //     filter: "agDateColumnFilter",
                //     filterParams: {
                //         buttons: ['apply'],
                //         suppressFilterButton: true,
                //         suppressAndOrCondition: true,
                //         defaultOption:"inRange",
                //         suppressMenu:true,
                //         closeOnApply:true,
                //         suppressFilterOptions:true,
                //         type:"datetime"
                //         // filterOptions:[]//display none if filter options are specified empty, in _custom.scss .ag-filter-select.ag-disabled
                //     },
                // },
                {
                    headerName: this.__("user"),
                    field: "user.email",
                    resizable: true,
                    filter: false
                },

            ],
            items: []
        };
    }
};
</script>
