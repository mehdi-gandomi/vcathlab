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
            baseUrl: "/admin/api/comments",
            model: "Comment",
            module: "Admin",
            createButtonText: this.__("Create Comment"),
            createButtonLink: "/admin/comments/create",
            printButtonLink: "/admin/comments/print",
            columnDefs: [
                {
                    headerName: this.__("Case"),
                    field: "commentable.title",
                    minWidth:250,
                    resizable: true,
                    filter: "agTextColumnFilter"
                },
                {
                    headerName: this.__("Name"),
                    field: "name",
                    resizable: true,
                    filter: "agTextColumnFilter"
                },

                {
                    headerName: this.__("Email"),
                    field: "email",
                    resizable: true,
                    filter: "agTextColumnFilter"
                },
                {
                    headerName: this.__("Comment"),
                    field: "comment",
                    resizable: true,
                    filter: "agTextColumnFilter"
                },
                {
                    headerName: this.__("Status"),
                    field: "is_approved",
                    resizable: true,
                    valueFormatter: Formatters.radioFormatter,

                    filter: "agSelectColumnFilter",
                    filterParams: {
                        buttons: ["apply"],
                        closeOnApply: true,
                        type: "select",
                        module: "Admin",
                        model: "Comment"
                    }
                },
                {
                    headerName: this.__("Created At"),
                    field: "created_at",
                    resizable: true,
                    valueFormatter: Formatters.dateFormatter,

                    filter: "agTextColumnFilter"
                },

                // {
                //     headerName: this.__("user"),
                //     field: "user.email",
                //     resizable: true,
                //     filter: false
                // },
                {
                    headerName: this.__("Actions"),
                    field: "action",
                    filter: false,
                    cellRenderer: "tableActionsRenderer",
                    cellRendererParams: {
                        model: "Comment",
                        baseRoutePath: "admin/complex_case/comments",
                        modelPlural: "comments",
                        baseApiPath: "/admin/api",
                        showEditButton: false,
                         buttons:[
                            {
                                text() {
                                    return this.__(`Confirm`);
                                },
                                class:"includeIcon includeIconOnly",
                                async callback() {
                                    // this.params.context.componentParent.sharePopupActive=true;
                                    // this.params.context.componentParent.selectedResource=this.params.data;
                                    const result = await this.$swal({
                                        title: this.__("Are you sure?"),
                                        text: this.__(`Do you want to confirm this comment ?`),
                                        icon: "warning",
                                        showCancelButton: true,
                                        confirmButtonColor: "#3085d6",
                                        cancelButtonColor: "#d33",
                                        confirmButtonText: this.__("Yes"),
                                        cancelButtonText: this.__("Cancel"),
                                    });
                                    if(result.value){
                                        const {data}= await this.$http.post(`/admin/api/comments/${this.params.data.id}/confirm`)
                                        Iracode.success(data.message)
                                        this.params.context.componentParent.gridApi.purgeServerSideCache([]);
                                    }
                                },
                                color: "success",
                                icon: "check-circle",
                            },
                        ]
                    }
                }
            ],
            items: []
        };
    }
};
</script>
