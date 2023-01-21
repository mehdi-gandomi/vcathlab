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

      <div class="pagination-wrap vs-pagination-primary" v-if="paginationData.totalPages > 1">
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
import HasFilter from '@/mixins/HasFilter';
import IndexPage from '@/mixins/IndexPage';
import Paginable from '@/mixins/Paginable';
import InteractsWithQueryString from '@/mixins/InteractsWithQueryString';
import Formatters from '@/components/aggrid-table/Formatters';

export default {
  mixins: [HasFilter, IndexPage, Paginable, InteractsWithQueryString],
  data() {
    return {
      searchQuery: '',
      baseUrl: `/accesslevel/api/role_users/?role_id=${this.$route.params.id}`,
      model: 'User',
      module: 'AccessLevel',
      createButtonText: this.__('Create User'),
      createButtonLink: `/accesslevel/roles/${this.$route.params.id}/users/assign`,
      columnDefs: [
        {
          headerName: this.__('Email'),
          field: 'email',
          resizable: true,
          checkboxSelection: true,
          minWidth:250,
          filter: 'agTextColumnFilter',
        },
        {
          headerName: this.__('Username'),
          field: 'username',
          resizable: true,
          filter: 'agTextColumnFilter',
        },
{
          headerName: this.__('Name'),
          field: 'name',
          resizable: true,
          filter: 'agTextColumnFilter',
        },

        {
          headerName: this.__('State'),
          field: 'state',
          resizable: true,
          valueFormatter: Formatters.checkboxFormatter,

          cellRenderer: 'checkboxCellRenderer',
          filter: 'agSelectColumnFilter',
          filterParams: {
            buttons: ['apply'],
            closeOnApply: true,
            type: 'select',
            module: 'AccessLevel',
            model: 'User',
          },
        },

        {
          headerName: this.__('Actions'),
          field: 'action',
          filter: false,
          minWidth: 150,
          cellRenderer: 'tableActionsRenderer',
          cellRendererParams: {
            model: 'User',
            baseRoutePath: 'accesslevel/role_users',
            modelPlural: 'role_users',
            baseApiPath: '/accesslevel/api',
          },
        },
      ],
      items: [],
    };
  },
  async created() {
      this.$store.dispatch('setCurrentResource', {});
    const { data: response } = await this.$http.get(
      `/accesslevel/api/roles/${this.$route.params.id}`
    );
    if (response.success) {
      const { data } = response;
      this.$store.dispatch('setCurrentResource', data);
    }
    //   this.$store.dispatch('setCurrentResource', data);
  },
};
</script>
