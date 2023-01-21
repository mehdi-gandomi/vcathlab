<template>
    <!-- TABLE ACTION ROW -->
    <div class="flex flex-wrap justify-between items-center">
        <!-- ITEMS PER PAGE -->
        <div class="md:mb-4 md:mb-0 ag-grid-table-actions-left">
            <vs-dropdown vs-trigger-click class="cursor-pointer">
                <div
                    class="md:p-4 p-2 border border-solid d-theme-border-grey-light rounded-full d-theme-dark-bg cursor-pointer flex items-center justify-between font-medium"
                >
                    <span class="mr-2"
                        >{{ parent.from }} - {{ parent.from + parent.currentRowCount - 1 }}
                        {{ __("of") }} {{ parent.paginationData.count }}</span
                    >
                    <feather-icon
                        icon="ChevronDownIcon"
                        svgClasses="h-4 w-4"
                    />
                </div>
                <vs-dropdown-menu>
                    <vs-dropdown-item
                        v-for="(perPage,
                        index) in parent.paginationData.perPages"
                        :key="index"
                        @click="() => parent.setPerPage(index)"
                    >
                        <span>{{ perPage }}</span>
                    </vs-dropdown-item>
                </vs-dropdown-menu>
            </vs-dropdown>
        </div>

        <!-- TABLE ACTION COL-2: SEARCH & EXPORT AS CSV -->
        <div
            class="flex flex-wrap items-center justify-between ag-grid-table-actions-right"
        >
        <vx-tooltip
                class="mx-1 larger-icon"
                :text="__('Refresh')"
            >
                <vs-button
                    color="warning"
                    @click="refreshGrid"
                    type="filled"
                    icon="icon-repeat"
                    icon-pack="feather"
                ></vs-button>
            </vx-tooltip>
            <vx-tooltip
                class="mx-1 larger-icon"
                :text="parent.createButtonText"
                v-if="showCreateButton"
            >
                <vs-button
                    color="success"
                    :to="parent.createButtonLink"
                    type="filled"
                    icon="icon-plus"
                    icon-pack="feather"
                ></vs-button>
            </vx-tooltip>
            <vx-tooltip v-if="showGuideButton"  class="mx-1 larger-icon" :text="__('Guide')">
                <vs-button
                    @click="showHelpPopup=true"
                    color="dark"
                    type="border"
                    icon="icon-alert-circle"
                    icon-pack="feather"
                ></vs-button>
            </vx-tooltip>
            <vx-tooltip v-if="showPrintButton" class="mx-1 larger-icon" :text="__('Print')">
                <vs-button
                    color="dark"
                    :to="printUrl"
                    type="border"
                    icon="icon-printer"
                    icon-pack="feather"
                ></vs-button>
            </vx-tooltip>
            <vx-tooltip
                class="mx-1 larger-icon"
                :text="__('Delete Selected')"
                v-if="showMultiDeleteButton"
            >
                <vs-button
                    @click="parent.multiDelete"
                    color="dark"
                    type="border"
                    icon="icon-trash-2"
                    icon-pack="feather"
                ></vs-button>
            </vx-tooltip>
            <vx-tooltip v-if="showExportButton" class="mx-1 larger-icon" :text="__('Export')">
                <!-- Dropdown Button 3 -->
                <div class="dropdown-button-container">
                    <vs-dropdown
                        vs-trigger-click
                        class="cursor-pointer"
                    >
                        <vs-button
                            class="btn-drop"
                            type="border"
                            color="danger"
                            icon="icon-share"
                            icon-pack="feather"
                        >
                        </vs-button>
                        <vs-dropdown-menu>
                            <vs-dropdown-item>
                                <span
                                    class="flex items-center justify-center"
                                    @click="parent.exportExcel"
                                >
                                    <i class="far fa-file-excel"></i>
                                    <span class="ml-2">{{
                                        __("Excel")
                                    }}</span>
                                </span>
                            </vs-dropdown-item>
                            <vs-dropdown-item>
                                <span
                                    class="flex items-center justify-center"
                                >
                                    <i class="far fa-file-csv"></i>
                                    <span class="ml-2">{{
                                        __("CSV")
                                    }}</span>
                                </span>
                            </vs-dropdown-item>
                            <vs-dropdown-item>
                                <span
                                    class="flex items-center justify-center"
                                >
                                    <i class="far fa-file-pdf"></i>
                                    <span class="ml-2">{{
                                        __("PDF")
                                    }}</span>
                                </span>
                            </vs-dropdown-item>
                        </vs-dropdown-menu>
                    </vs-dropdown>
                </div>
            </vx-tooltip>
            <vx-tooltip
                v-if="parent.anyFiltersApplied"
                class="mx-1 larger-icon"
                :text="__('Clear Filters')"
            >
                <vs-button
                    @click="parent.resetFilters"
                    color="dark"
                    type="border"
                    icon="icon-refresh-cw"
                    icon-pack="feather"
                ></vs-button>
            </vx-tooltip>
            <!-- <vs-button class="mb-4 md:mb-0" @click="gridApi.exportDataAsCsv()">Export as CSV</vs-button> -->
        </div>
        <help-popup :show="showHelpPopup" @close="showHelpPopup=false"/>
    </div>
</template>
<script>
import HelpPopup from "@/components/HelpPopup.vue";
export default {
    props:{
        parent:{

        },
        showCreateButton:{
            type:Boolean,
            default:true
        },
        showPrintButton:{
            type:Boolean,
            default:true
        },
        showGuideButton:{
            type:Boolean,
            default:true
        },
        showMultiDeleteButton:{
            type:Boolean,
            default:true
        },
        showExportButton:{
            type:Boolean,
            default:true
        }
    },
    computed: {
        printUrl(){
            return `${this.parent.printButtonLink}?${new URLSearchParams(this.parent.getParamsForIndex()).toString()}`;
        }
    },
    data() {
        return {
            showHelpPopup:false,
        }
    },
    methods: {
        refreshGrid(){
            this.parent.gridApi.purgeServerSideCache([]);
        }
    },
    components:{
        HelpPopup
    },
    created() {
            // console.log("options",this.parent.gridOptions)

    },
}
</script>
