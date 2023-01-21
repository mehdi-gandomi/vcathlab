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
          <vs-input class="mb-4 md:mb-0 mr-4" v-model="searchQuery" placeholder="Search..." />
          <vx-tooltip class="mx-1 larger-icon" :text="__('Create Menuitem')">
            <vs-button
              color="success"
              to="/menu_items/create"
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
          <vx-tooltip class="mx-1 larger-icon" :text="__('Delete Items')">
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
      baseUrl: '/api/menu_items',
      columnDefs: [
        {
          headerName: this.__('آیدی منو'),
          field: 'menu_id',
          resizable: true,
          checkboxSelection: true,
          headerCheckboxSelection: true,
        },

        {
          headerName: this.__('Title'),
          field: 'title',
          resizable: true,
        },
        {
          headerName: this.__('Slug'),
          field: 'slug',
          resizable: true,
        },
        {
          headerName: this.__('Url'),
          field: 'url',
          resizable: true,
        },
        {
          headerName: this.__('Target'),
          field: 'target',
          resizable: true,
        },
        {
          headerName: this.__('Parent Id'),
          field: 'parent_id',
          resizable: true,
        },
        {
          headerName: this.__('Order'),
          field: 'order',
          resizable: true,
        },
        {
          headerName: this.__('Route'),
          field: 'route',
          resizable: true,
        },
        {
          headerName: this.__('Params'),
          field: 'params',
          resizable: true,
        },
        {
          headerName: this.__('Controller'),
          field: 'controller',
          resizable: true,
        },
        {
          headerName: this.__('Middleware'),
          field: 'middleware',
          resizable: true,
        },
        {
          headerName: this.__('Icon'),
          field: 'icon',
          resizable: true,
        },
        {
          headerName: this.__('Custom Class'),
          field: 'custom_class',
          resizable: true,
        },
        {
          headerName: this.__('Created At'),
          field: 'created_at',
          resizable: true,
          valueFormatter: dateFormatter,
        },
        {
          headerName: this.__('Updated At'),
          field: 'updated_at',
          resizable: true,
          valueFormatter: dateFormatter,
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
            model: 'Menuitem',
            baseRoutePath: 'menu_items',
            baseApiPath: '/api',
          },
        },
      ],
      items: [],
    };
  },
};
</script>
