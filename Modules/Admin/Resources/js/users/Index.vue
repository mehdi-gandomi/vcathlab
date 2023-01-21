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
import InteractsWithQueryString from "@/mixins/InteractsWithQueryString";
import Formatters from "@/components/aggrid-table/Formatters";

export default {
    mixins: [HasFilter, IndexPage, Paginable, InteractsWithQueryString],
    data() {
        return {
            searchQuery: "",
            baseUrl: "/admin/api/users",
            model: "User",
            module: "Admin",
            createButtonText: this.__("Create User"),
            createButtonLink: "/admin/users/create",
            printButtonLink: "/admin/users/print",
            columnDefs: [
                // {
                //     headerName: this.__("Avatar"),
                //     field: "avatar",
                //     cellRenderer:"imageCellRenderer",
                //     resizable: true,
                //     filter: "agTextColumnFilter"
                // },
                {
                    headerName: this.__("Email"),
                    field: "email",
                    resizable: true,
                    filter: "agTextColumnFilter",
                },
                {
                    headerName: this.__("First Name"),
                    field: "first_name",
                    resizable: true,
                    filter: "agTextColumnFilter",
                },
                {
                    headerName: this.__("Last Name"),
                    field: "last_name",
                    resizable: true,
                    filter: "agTextColumnFilter",
                },

                // {
                //     headerName: this.__("Profession"),
                //     field: "profession",
                //     resizable: true,
                //     valueFormatter: Formatters.selectFormatter,

                //     filter: "agSelectColumnFilter",
                //     filterParams: {
                //         buttons: ["apply"],
                //         closeOnApply: true,
                //         type: "select",
                //         module: "Admin",
                //         model: "User",
                //     },
                // },
                // {
                //     headerName: this.__("Specialty"),
                //     field: "specialty",
                //     resizable: true,
                //     valueFormatter: Formatters.selectFormatter,

                //     filter: "agSelectColumnFilter",
                //     filterParams: {
                //         buttons: ["apply"],
                //         closeOnApply: true,
                //         type: "select",
                //         module: "Admin",
                //         model: "User",
                //     },
                // },
                {
                    headerName: this.__("Mobile"),
                    field: "mobile",
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
                    headerName: this.__("Actions"),
                    field: "action",
                    filter: false,
                    minWidth: 150,
                    cellRenderer: "tableActionsRenderer",
                    cellRendererParams: {
                        showDetailButton:false,
                        model: "User",
                        baseRoutePath: "admin/users",
                        modelPlural: "users",
                        baseApiPath: "/admin/api",
                    },
                },
            ],
            items: [],
        };
    },
};
</script>
