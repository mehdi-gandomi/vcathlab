<template>
  <div class="mb-base index-page" id="ag-grid-demo">
    <vx-card>
      <IndexToolbar :parent="this" />
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
import HasDynamicTableActions from '../mixins/HasDynamicTableActions';

export default {
  mixins: [HasFilter, IndexPage, Paginable, InteractsWithQueryString, HasDynamicTableActions],
  data() {
    return {
      searchQuery: '',
      baseUrl: '/accesslevel/api/roles',
      model: 'Role',
      module: 'AccessLevel',
      createButtonText: this.__('Create Role'),
      createButtonLink: '/accesslevel/roles/create',
      columnDefs: [
        {
          headerName: this.__('Name'),
          field: 'name',
          resizable: true,
          checkboxSelection: true,
          filter: 'agTextColumnFilter',
        },

        {
          headerName: this.__('Title'),
          field: 'title',
          resizable: true,
          filter: 'agTextColumnFilter',
        },
        {
          headerName: this.__('Actions'),
          field: 'action',
          filter: false,
          minWidth: 150,
          cellRenderer: 'tableActionsRenderer',
          cellRendererParams: {
            model: 'Role',
            baseRoutePath: 'accesslevel/roles',
            modelPlural: 'roles',
            baseApiPath: '/accesslevel/api',
      buttons: [{
                        text() {
			    return this.__(`Show ${this.params.model}`)
			},
                        link() {
                            if (!this.params.data) return "";
                            return `/${this.params.baseRoutePath}/${this.params.data.id}`
                        },
                        color: "primary",
			icon: "eye"
                    }, {
                        text() {
			    return this.__(`Edit ${this.params.model}`)
			},
                        link() {
                            if (!this.params.data) return "";
                            return `/${this.params.baseRoutePath}/${this.params.data.id}/edit`
                        },
                        color: "warning",
			icon: "edit"
                    }, {
			text() {
			    return this.__(`Delete ${this.params.model}`)
			},
                        color: "danger",
			class: "far fa-lg fa-trash-alt",
                        async callback() {
                            const result = await this.$swal({
                                title: this.__('Are you sure?'),
                                text: this.__(`Do you want to delete this ${this.params.model} ?`),
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: this.__("Yes"),
                                cancelButtonText: this.__("Cancel")
                            });
                            if (result.value) {
                                const {
                                    data: response
                                } = await this.$http.delete(`${this.params.baseApiPath}/${this.params.baseRoutePath}/${this.params.data.id}`);
                                if (response.success) {
                                    Iracode.success(this.__(`${this.params.model} Deleted!`))
                                    this.params.context.componentParent.refreshItems()
                                }
                            }
                        }
                    }, {
		text() {
			return this.__(`Users of ${this.params.model}`)
		},
		link() {
			if (!this.params.data) return "";
			return `/${this.params.baseRoutePath}/${this.params.data.id}/users`
		},
		color: "purple",
		icon: "users"
		}],
          },
        },
      ],
      items: [],
    };
  },
};
</script>
