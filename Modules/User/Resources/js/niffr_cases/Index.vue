<template>
    <div class="mb-base index-page" id="ag-grid-demo">
        <vx-card>
            <IndexToolbar :showPrintButton="true" v-if="shouldShowToolbar" :parent="this" />
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
        <vs-popup class="holamundo"  title="ُShare to social" :active.sync="sharePopupActive">
            <div class="share-network-list vs-row">
                <!-- :url="shareLink" -->
                <!-- :quote="network.quote" -->
                <ShareNetwork
                    v-for="(network,i) in networks"
                    :key="i"
                    :url="network.network == 'telegram' ? shareLink:''"
                    quote=""
                    :class="network.class"
                    :network="network.network"
                    :title="title"
                    :description="description"
                    :hashtags="network.hashtags"
                >
                    <i :class="network.icon"></i>
                    {{network.text}}
                </ShareNetwork>
            </div>
        </vs-popup>
    </div>
</template>

<script>
import HasFilter from "@/mixins/HasFilter";
import IndexPage from "@/mixins/IndexPage";
import Paginable from "@/mixins/Paginable";
import InteractsWithQueryString from "@/mixins/InteractsWithQueryString";
import Formatters from "@/components/aggrid-table/Formatters";
import VueSocialSharing from 'vue-social-sharing'
Vue.use(VueSocialSharing);
import DataSource from '@/components/aggrid-table/DataSource'
export default {
    mixins: [HasFilter, IndexPage, Paginable, InteractsWithQueryString],
    data() {
        return {
            searchQuery: "",
            baseUrl: "/user/api/niffr_cases",
            model: "NIFFRCase",
            module: "User",
            createButtonText: this.__("Create NiFFR Case"),
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
                    headerName: this.__("Actions"),
                    field: "action",
                    filter: false,
                    minWidth: 150,
                    cellRenderer: "tableActionsRenderer",
                    cellRendererParams: {
                        model: "Niffrcase",
                        baseRoutePath: "user/niffr_cases",
                        modelPlural: "niffr_cases",
                        baseApiPath: "/user/api",
                        showEditButton: false,
                        buttons:[
                            {
                                text() {
                                    return this.__(`Share to social media`);
                                },
                                class:"includeIcon includeIconOnly",
                                async callback() {
                                    this.params.context.componentParent.sharePopupActive=true;
                                    this.params.context.componentParent.selectedResource=this.params.data;
                                },
                                color: "success",
                                icon: "share",
                            },
                        ]
                    }
                }
            ],
            selectedResource:{},
            sharePopupActive:false,
            title:"NIFFR Case Result",
             networks:[
                {
                    network:"twitter",
                    class:"vs-button vs-button-primary vs-button-relief text-white my-2 mx-1",
                    hashtags:"vcathlab,ffr_ct_case",
                    icon:"fab fa-twitter",
                    text:"Share on twitter"
                },
                {
                    network:"whatsapp",
                    class:"vs-button vs-button-success vs-button-relief text-white my-2 mx-1",
                    hashtags:"vcathlab,ffr_ct_case",
                    icon:"fab fa-whatsapp",
                    text:"Share on whatsapp"
                },
                {
                    network:"linkedin",
                    class:"vs-button vs-button-primary vs-button-relief text-white my-2 mx-1",
                    hashtags:"vcathlab,ffr_ct_case",
                    icon:"fab fa-linkedin",
                    text:"Share on linkedin"
                },
                {
                    network:"email",
                    class:"vs-button vs-button-danger vs-button-relief text-white my-2 mx-1",
                    hashtags:"vcathlab,ffr_ct_case",
                    icon:"fa fa-envelope",
                    text:"Share on email"
                },
                {
                    network:"telegram",
                    class:"vs-button vs-button-primary vs-button-relief text-white my-2 mx-1",
                    hashtags:"vcathlab,ffr_ct_case",
                    icon:"fab fa-telegram",
                    text:"Share on telegram"
                }
            ],
            items: []
        };
    },
    computed:{
        shareLink(){
            return this.url(this.selectedResource.result_file);
        },
        description(){
            if(Object.keys(this.selectedResource).length){
                return `
Patient: ${this.selectedResource.patient.name}
Age: ${this.selectedResource.patient.age}
Sex: ${this.selectedResource.patient.computed_sex}
Hospital: ${this.selectedResource.patient.hospital}
Physician: ${this.selectedResource.user.name}
Result: ${this.url(this.selectedResource.result_file)}
Date: ${new Date(this.selectedResource.created_at).toLocaleDateString()}
Time: ${new Date(this.selectedResource.created_at).toLocaleTimeString()}
                `;
            }
            return "";
        }
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
<style >
.share-network-list {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;
    max-width: 1000px;
    margin: auto;
  }
  a[class^="share-network-"] i{
    font-size: 1.2rem;
    margin-right: 0.5rem;
  }
  a[class^="share-network-"] .fah {
    background-color: rgba(0, 0, 0, 0.2);
    padding: 10px;
    flex: 0 1 auto;
  }
  a[class^="share-network-"] span {
    padding: 0 10px;
    flex: 1 1 0%;
    font-weight: 500;
  }
</style>
