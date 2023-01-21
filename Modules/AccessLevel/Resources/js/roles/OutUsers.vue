<template>
  <div class="mb-base index-page" id="ag-grid-demo">
    <vx-card>
      <IndexToolbar v-if="shouldShowToolbar" :showCreateButton="false" :parent="this" />
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
import $ from '@node_modules/jquery';
window.XjQuery = $;

import HasFilter from '@/mixins/HasFilter';
import IndexPage from '@/mixins/IndexPage';
import Paginable from '@/mixins/Paginable';
import InteractsWithQueryString from '@/mixins/InteractsWithQueryString';
import Formatters from '@/components/aggrid-table/Formatters';
import HasDynamicTableActions from '../mixins/HasDynamicTableActions';

import AddUsers from './AddUsers.vue'
const Vue = window.Vue;

export default {
  mixins: [HasFilter, IndexPage, Paginable, InteractsWithQueryString, HasDynamicTableActions],
  data() {
    return {
      searchQuery: '',
      baseUrl: `/accesslevel/api/role_outusers/?role_id=${this.$route.params.id}`,
      model: 'User',
      module: 'AccessLevel',
      showCreateButton: false,
      columnDefs: [
        {
          headerName: this.__('Email'),
          field: 'email',
          resizable: true,
          minWidth:250,
          checkboxSelection: true,
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
            baseRoutePath: 'accesslevel/role_outusers',
            modelPlural: 'role_outusers',
            baseApiPath: '/accesslevel/api',
	  exposeRowId: true,
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
                    }]
          },
        },
      ],
      items: [],
      selectedUserIds: [],
    };
  },
  mounted() {
	window.defFuncs = {add(){alert("Add();")}};
	const CMPClass = Vue.extend(AddUsers);
	let instance = new CMPClass();
	instance.$mount();
	$(".ag-grid-table-actions-right").prepend(instance.$el);
	$(instance.$el).click(async() => {
        console.log("added")
		this.findUsers();
		const data = await this.sendUsers();
		if (data && data.data.success) {
			Iracode.success(this.__('User Added Successfully'));
			this.$router.push(`/accesslevel/roles/${this.$route.params.id}/users`);
		}
	});
  },
  methods : {
	findUsers() { // fill in "selectedUserIds" by selected rows
		this.selectedUserIds = [];
		$('[ref="eCenterContainer"] > .ag-row').each((i, elem) => {
			if($(elem).find(".ag-checkbox-input-wrapper.ag-checked").length)
				this.selectedUserIds.push($(elem).find(".row-id").data("id"));
		});
	},
	sendUsers(){
		if(!this.selectedUserIds.length) return null;
		return this.$http.post('/accesslevel/api/role_outusers/assign', {role_id: this.$route.params.id, users: this.selectedUserIds});
	}
  }
};
</script>
