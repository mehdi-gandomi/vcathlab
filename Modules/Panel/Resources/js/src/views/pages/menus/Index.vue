<template>
  <div class="mb-base" id="ag-grid-demo">
    <vx-card>
      <!-- TABLE ACTION ROW -->
      <div class="flex flex-wrap justify-between items-center">
        <!-- ITEMS PER PAGE -->
        <div class="mb-4 md:mb-0 mr-4 ag-grid-table-actions-left">
          <vs-dropdown vs-trigger-click class="cursor-pointer">
            <div
              class="p-4 border border-solid d-theme-border-grey-light rounded-full d-theme-dark-bg cursor-pointer flex items-center justify-between font-medium"
            >
              <span class="mr-2"
                >{{ from }} - {{ from + items.length - 1 }} {{ __('of') }}
                {{ paginationData.count }}</span
              >
              <feather-icon icon="ChevronDownIcon" svgClasses="h-4 w-4" />
            </div>
            <vs-dropdown-menu>
              <vs-dropdown-item
                v-for="(perPage, index) in paginationData.perPages"
                :key="index"
                @click="() => setPerPage(index)"
              >
                <span>{{ perPage }}</span>
              </vs-dropdown-item>
            </vs-dropdown-menu>
          </vs-dropdown>
        </div>

        <!-- TABLE ACTION COL-2: SEARCH & EXPORT AS CSV -->
        <div class="flex flex-wrap items-center justify-between ag-grid-table-actions-right">
          <vs-input
            class="mb-4 md:mb-0 mr-4"
            v-model="searchQuery"
            :placeholder="__('Search...')"
          />
          <vx-tooltip class="mx-1 larger-icon" :text="__('Create Menu')">
            <vs-button
              color="success"
              to="/menus/create"
              type="filled"
              icon="icon-plus"
              icon-pack="feather"
            ></vs-button>
          </vx-tooltip>
          <vx-tooltip class="mx-1 larger-icon" :text="__('Guide')">
            <vs-button
              color="dark"
              type="border"
              icon="icon-alert-circle"
              icon-pack="feather"
            ></vs-button>
          </vx-tooltip>

          <vx-tooltip class="mx-1 larger-icon" :text="__('Print')">
            <vs-button
              color="dark"
              type="border"
              icon="icon-printer"
              icon-pack="feather"
            ></vs-button>
          </vx-tooltip>
          <vx-tooltip class="mx-1 larger-icon" :text="__('Delete Selected')">
            <vs-button
              color="dark"
              type="border"
              icon="icon-trash-2"
              icon-pack="feather"
            ></vs-button>
          </vx-tooltip>
          <vx-tooltip class="mx-1 larger-icon" :text="__('Export')">
            <!-- Dropdown Button 3 -->
            <div class="dropdown-button-container">
              <vs-dropdown vs-trigger-click class="cursor-pointer">
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
                    <span class="flex items-center justify-center" @click="exportExcel">
                      <font-awesome-icon icon="file-excel" />
                      <span class="ml-2">{{ __('Excel') }}</span>
                    </span>
                  </vs-dropdown-item>
                  <vs-dropdown-item>
                    <span class="flex items-center justify-center">
                      <font-awesome-icon icon="file-csv" />
                      <span class="ml-2">{{ __('CSV') }}</span>
                    </span>
                  </vs-dropdown-item>
                  <vs-dropdown-item>
                    <span class="flex items-center justify-center">
                      <font-awesome-icon icon="file-pdf" />
                      <span class="ml-2">{{ __('PDF') }}</span>
                    </span>
                  </vs-dropdown-item>
                </vs-dropdown-menu>
              </vs-dropdown>
            </div>
          </vx-tooltip>
          <!-- <vs-button class="mb-4 md:mb-0" @click="gridApi.exportDataAsCsv()">Export as CSV</vs-button> -->
        </div>
      </div>
      <ag-grid-vue
        ref="agGridTable"
        :gridOptions="gridOptions"
        class="ag-theme-material w-100 my-4 ag-grid-table"
        :columnDefs="columnDefs"
        :defaultColDef="defaultColDef"
        :rowData="items"
        rowSelection="multiple"
        colResizeDefault="shift"
        domLayout="autoHeight"
        :animateRows="true"
        :suppressPaginationPanel="true"
        :frameworkComponents="frameworkComponents"
        :enableRtl="$vs.rtl"
        :overlayLoadingTemplate="__('loading') + '...'"
      ></ag-grid-vue>
      <vs-pagination
        v-if="items"
        :total="paginationData.totalPages"
        @change="loadPage"
        :max="paginationData.maxPageNumbers"
        v-model="paginationData.currentPage"
      />
    </vx-card>
  </div>
</template>

<script>
import { AgGridVue } from 'ag-grid-vue';
import '@sass/vuexy/extraComponents/agGridStyleOverride.scss';
import HasFilter from '@/mixins/HasFilter';
import IndexPage from '@/mixins/IndexPage';
import Paginable from '@/mixins/Paginable';
import InteractsWithQueryString from '@/mixins/InteractsWithQueryString';
import { dateFormatter, relationFormatter } from '@/components/aggrid-table/Formatters';

export default {
  components: {
    AgGridVue,
  },
  mixins: [HasFilter, IndexPage, Paginable, InteractsWithQueryString],
  data() {
    return {
      searchQuery: '',
      baseUrl: '/api/menus',
      columnDefs: [
        {
          headerName: this.__('عنوان'),
          field: 'title',
          resizable: true,
        },
        {
          headerName: this.__('آیکن'),
          field: 'icon_class',
          resizable: true,
        },
        {
          headerName: this.__('لینک'),
          field: 'route',
          resizable: true,
        },
        {
          headerName: this.__('ترتیب نمایش'),
          field: 'ordering',
          resizable: true,
        },
        {
          headerName: this.__('نمایش در تب جدید'),
          field: 'open_in_blank',
          resizable: true,
        },
        {
          headerName: this.__('نمایش در iFrame'),
          field: 'open_in_iframe',
          resizable: true,
        },
        {
          headerName: this.__('توضیحات'),
          field: 'description',
          resizable: true,
        },
        {
          headerName: this.__('وضعیت'),
          field: 'state',
          resizable: true,
        },
        {
          headerName: this.__('menu'),
          field: 'menu.title',
          resizable: true,
          valueFormatter: relationFormatter,
          filter: false,
        },
        {
          headerName: this.__('subsystem'),
          field: 'subsystem.title',
          resizable: true,
          valueFormatter: relationFormatter,
          filter: false,
        },
        {
          headerName: this.__('Actions'),
          field: 'action',
          filter: false,
          cellRenderer: 'tableActionsRenderer',
          filter: true,
          floatingFilterComponent: 'applyFilterRenderer',
          floatingFilterComponentParams: { suppressFilterButton: true },
          cellRendererParams: {
            model: 'Menu',
            baseRoutePath: 'menus',
            baseApiPath: '/api',
          },
        },
      ],
      items: [],
    };
  },
};
</script>
