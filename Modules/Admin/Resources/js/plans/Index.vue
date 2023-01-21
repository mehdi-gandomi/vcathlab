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
      baseUrl: "/user/api/plans",
      model: "Plan",
      module: "User",
      createButtonText: this.__("Create Plan"),
      createButtonLink: "/user/plans/create",
      printButtonLink: "/user/plans/print",
      columnDefs: [
        {
          headerName: this.__("Slug"),
          field: "slug",
          resizable: true,
          filter: "agTextColumnFilter",
        },

        {
          headerName: this.__("Name"),
          field: "name",
          resizable: true,
          filter: "agTextColumnFilter",
        },
        {
          headerName: this.__("Description"),
          field: "description",
          resizable: true,
          filter: "agTextColumnFilter",
        },
        {
          headerName: this.__("Is Active"),
          field: "is_active",
          resizable: true,
          valueFormatter: Formatters.checkboxFormatter,

          cellRenderer: "checkboxCellRenderer",
          filter: "agSelectColumnFilter",
          filterParams: {
            buttons: ["apply"],
            closeOnApply: true,
            type: "select",
            module: "User",
            model: "Plan",
          },
        },
        {
          headerName: this.__("Price"),
          field: "price",
          resizable: true,
          filter: "agTextColumnFilter",
        },
        {
          headerName: this.__("Signup Fee"),
          field: "signup_fee",
          resizable: true,
          filter: "agTextColumnFilter",
        },
        {
          headerName: this.__("Currency"),
          field: "currency",
          resizable: true,
          filter: "agTextColumnFilter",
        },
        {
          headerName: this.__("Trial Period"),
          field: "trial_period",
          resizable: true,
          filter: false,
        },
        {
          headerName: this.__("Trial Interval"),
          field: "trial_interval",
          resizable: true,
          valueFormatter: Formatters.selectFormatter,

          filter: "agSelectColumnFilter",
          filterParams: {
            buttons: ["apply"],
            closeOnApply: true,
            type: "select",
            module: "User",
            model: "Plan",
          },
        },
        {
          headerName: this.__("Invoice Period"),
          field: "invoice_period",
          resizable: true,
          filter: "agTextColumnFilter",
        },
        {
          headerName: this.__("Invoice Interval"),
          field: "invoice_interval",
          resizable: true,
          valueFormatter: Formatters.selectFormatter,

          filter: "agSelectColumnFilter",
          filterParams: {
            buttons: ["apply"],
            closeOnApply: true,
            type: "select",
            module: "User",
            model: "Plan",
          },
        },
        {
          headerName: this.__("Grace Period"),
          field: "grace_period",
          resizable: true,
          filter: "agTextColumnFilter",
        },
        {
          headerName: this.__("Grace Interval"),
          field: "grace_interval",
          resizable: true,
          filter: "agTextColumnFilter",
        },
        {
          headerName: this.__("Prorate Extend Due"),
          field: "prorate_extend_due",
          resizable: true,
          filter: "agSelectColumnFilter",
          filterParams: {
            buttons: ["apply"],
            closeOnApply: true,
            type: "select",
            module: "User",
            model: "Plan",
          },
        },
        {
          headerName: this.__("Active Subscribers Limit"),
          field: "active_subscribers_limit",
          resizable: true,
          filter: "agTextColumnFilter",
        },
        {
          headerName: this.__("Sort Order"),
          field: "sort_order",
          resizable: true,
          filter: "agTextColumnFilter",
        },
        {
          headerName: this.__("Created At"),
          field: "created_at",
          resizable: true,
          filter: "agTextColumnFilter",
        },
        {
          headerName: this.__("Updated At"),
          field: "updated_at",
          resizable: true,
          filter: "agTextColumnFilter",
        },
        {
          headerName: this.__("Deleted At"),
          field: "deleted_at",
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
            model: "Plan",
            baseRoutePath: "user/plans",
            modelPlural: "plans",
            baseApiPath: "/user/api",
          },
        },
      ],
      items: [],
    };
  },
};
</script>
