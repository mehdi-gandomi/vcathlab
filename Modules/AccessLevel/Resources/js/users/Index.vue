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
import Sortable from "@/mixins/Sortable";
import InteractsWithQueryString from "@/mixins/InteractsWithQueryString";
import Formatters from "@/components/aggrid-table/Formatters";

export default {
  mixins: [HasFilter, IndexPage, Paginable, InteractsWithQueryString, Sortable],
  data() {
    const locale = window.Iracode.$i18n.locale;
    return {
      searchQuery: "",
      baseUrl: "/accesslevel/api/users",
      model: "User",
      module: "AccessLevel",
      createButtonText: this.__("Create User"),
      createButtonLink: "/accesslevel/users/create",
      printButtonLink: "/accesslevel/users/print",
      columnDefs: [
        {
          headerName: this.__("Row"),
          width: 80,
          minWidth: 80,
          valueGetter: "node.rowIndex + 1",
          valueFormatter: Formatters.rowNumberFormatter,
        },
        {
          headerName: this.__("Email"),
          field: "email",
          resizable: true,
          filter: "agTextColumnFilter",
        },

        {
          headerName: this.__("Master"),
          field: "master",
          resizable: true,
          valueFormatter: Formatters.radioFormatter,

          filter: "agSelectColumnFilter",
          filterParams: {
            buttons: ["apply"],
            closeOnApply: true,
            type: "select",
            module: "AccessLevel",
            model: "User",
          },
        },
        // {
        //   headerName: this.__("Email Verified At"),
        //   field: "email_verified_at",
        //   resizable: true,
        //   valueFormatter: Formatters.dateFormatter,

        //   filter: "agTextColumnFilter",
        // },
        {
          headerName: this.__("Username"),
          field: "username",
          resizable: true,
          filter: "agTextColumnFilter",
        },
        {
          headerName: this.__("Mobile"),
          field: "mobile",
          resizable: true,
          filter: "agTextColumnFilter",
        },
        {
          headerName: this.__("Avatar Url"),
          field: "avatar_url",
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
          headerName: this.__("State"),
          field: "state",
          resizable: true,
          valueFormatter: Formatters.radioFormatter,

          filter: "agSelectColumnFilter",
          filterParams: {
            buttons: ["apply"],
            closeOnApply: true,
            type: "select",
            module: "AccessLevel",
            model: "User",
          },
        },
        {
          headerName: this.__("Actions"),
          field: "action",
          filter: false,
          cellRenderer: "tableActionsRenderer",
          cellRendererParams: {
            model: "User",
            baseRoutePath: "accesslevel/users",
            modelPlural: "users",
            baseApiPath: "/accesslevel/api",
            buttons: [
              {
                text() {
                  if (this.params.data.state) {
                    return this.__("غیرفعال کردن");
                  } else {
                    return this.__("فعال کردن");
                  }
                },
                async callback() {
                  const result = await this.$swal({
                    title: `آیا می خواهید این کاربر را ${
                      this.params.data.state ? "غیرفعال" : "فعال"
                    } کنید؟`,
                    showCancelButton: true,
                    cancelButtonText: "خیر",
                    confirmButtonText: "بله",
                  });
                  if (result.value) {
                    const { data } = await this.$http.post(
                      `/accesslevel/api/users/${this.params.data.id}/toggle_state`
                    );
                    Iracode.success("وضعیت کاربر تغییر کرد");
                    this.params.context.componentParent.gridApi.purgeServerSideCache(
                      []
                    );
                  }
                },
                class() {
                  console.log(this.params.data);
                  let base = "includeIcon includeIconOnly";
                  // if(this.params.data.state == 1) base+=" curosr-default";
                  return base;
                },
                color() {
                  if (this.params.data.state) {
                    return "danger";
                  } else {
                    return "success";
                  }
                },
                icon() {
                  if (this.params.data.state) {
                    return "times";
                  } else {
                    return "check";
                  }
                },
              },
            ],
          },
        },
      ],
      items: [],
    };
  },
};
</script>
