import TableActionsRenderer from "@/components/aggrid-table/DynamicTableActions";
import TextFilterRenderer from "@/components/aggrid-table/TextFilter";
import ImageCellRenderer from "@/components/aggrid-table/ImageCellRenderer";
import CheckboxCellRenderer from "@/components/aggrid-table/CheckboxCellRenderer";
import ApplyFilterRenderer from '@/components/aggrid-table/ApplyFilterRenderer';
import translations from '@/components/aggrid-table/translations'
import '@sass/vuexy/extraComponents/agGridStyleOverride.scss';
// import { AgGridVue } from "@node_modules/ag-grid-vue"
import { AgGridVue } from '@ag-grid-community/vue';
import { MenuModule } from '@ag-grid-enterprise/menu';
import { SetFilterModule } from '@node_modules/@ag-grid-enterprise/set-filter';
import DateFilter from "@/components/aggrid-table/filters/DateFilter"
import SelectFilter from "@/components/aggrid-table/filters/SelectFilter"
import TimeFilter from "@/components/aggrid-table/filters/TimeFilter"
import RangeNumberFilter from "@/components/aggrid-table/filters/RangeNumberFilter"
// import {ClientSideRowModelModule} from '@ag-grid-community/client-side-row-model';
import { ServerSideRowModelModule } from '@node_modules/@ag-grid-enterprise/server-side-row-model';
import IndexToolbar from '@/components/IndexToolbar.vue'
// import '@node_modules/@ag-grid-community/core/dist/styles/ag-theme-alpine.css';
// import '@node_modules/@ag-grid-community/core/dist/styles/ag-theme-material.css';
// import '@assets/css/ag-theme-dark.css';
// import '@node_modules/@ag-grid-community/core/dist/styles/ag-theme-dark.css';
import DataSource from '@/components/aggrid-table/DataSource'

export default {
    components: {
        AgGridVue,
        IndexToolbar
    },
    props:{
        shouldUpdateQueryString:{
            type:Boolean,
            default:true
        },
        defaultFilterModel:{
            type:Object,
            default:()=>{return {}}
        },
        shouldShowToolbar:{
            type:Boolean,
            default:true
        }
    },
    data() {
        const lang=this.$i18n;
        const data= {
            gridOptions: {
                context: {
                    componentParent: this
                },
                pagination: true,
                // sets 10 rows per page (default is 100)
                paginationPageSize: 10,
            },
            showHelpPopup:false,
            currentRowCount:0,
            rowModelType:"serverSide",
            translations:translations[lang.locale],
            gridApi: null,
            frameworkComponents: {
                agDateInput: DateFilter,
                tableActionsRenderer: TableActionsRenderer,
                textFilterRenderer: TextFilterRenderer,
                applyFilterRenderer:ApplyFilterRenderer,
                agSelectColumnFilter:SelectFilter,
                agRangeNumberColumnFilter:RangeNumberFilter,
                agTimeRangeColumnFilter:TimeFilter,
                imageCellRenderer:ImageCellRenderer,
                checkboxCellRenderer:CheckboxCellRenderer
            },
            modules:[ServerSideRowModelModule,MenuModule,SetFilterModule],
            defaultColDef: {
                sortable: true,
                editable: false,
                resizable: true,
                suppressMenu: false,
                flex: 1,
                filter: true,
                minWidth:150,
                filter: "agTextColumnFilter",
                filterParams: {
                    buttons: ['apply'],
                    suppressFilterButton: true,
                    suppressAndOrCondition: true,
                    suppressMenu:true,
                    closeOnApply:true,
                    suppressFilterOptions:true,
                    // filterOptions:[]//display none if filter options are specified empty, in _custom.scss .ag-filter-select.ag-disabled
                },
                // filterComponentParams: {         buttons: ['reset', 'apply'],debounceMs: 200,suppressFilterButton: true,suppressAndOrCondition: true,suppressMenu:true },
                // floatingFilter: true,
            },
            fields:{}
        }
        return data;
    },
    computed: {
        localeText(){
            return this.translations[Lang.locale] ? this.translations[Lang.locale]:this.translations['en'];
        },
        isBrowserMozilla(){
            return typeof InstallTrigger !== 'undefined';
        }
    },
    methods: {
        async refreshItems() {
            // this.gridApi.showLoadingOverlay();
            const params=this.getParamsForIndex();
            try{
                const { data } = await this.$http.get(this.baseUrl, {
                  params,
              });
              if (data.success) {
                  this.items = data.data;
              }
            }catch(e){console.log(e)}
            // this.gridApi.hideOverlay()
          },
        onGridReady(params) {
            params.api.setServerSideDatasource(new DataSource(this));
            // ;
            if(this.columnDefs.length < 8) this.gridApi.sizeColumnsToFit();
            else this.gridOptions.columnApi.autoSizeAllColumns();
            // window.onresize = () => {
            //     this.gridApi.sizeColumnsToFit();
            // }
        },
        async multiDelete(){
            const selected=this.gridApi.getSelectedRows();
            if(selected.length < 1) {
                return this.$vs.notify({
                    title: this.__('Delete'),
                    text: this.__("You didn't select an item!"),
                    iconPack: 'feather',
                    icon: 'icon-alert-circle',
                    color: 'warning'
                  })
            }
            const result=await this.$swal({
                title: this.__('Are you sure?'),
                text: this.__(`Do you want to delete selected items ?`),
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: this.__("Yes"),
                cancelButtonText: this.__("Cancel")
            });
            if(result.value){
                const ids=selected.map(item=>item.id);
                const {data}=await this.$http.post(`${this.baseUrl}/multi_delete`,{
                    ids
                });
                if(data.success){
                    Iracode.success(this.__("Selected items deleted!"));
                    this.gridApi.purgeServerSideCache();
                }
            }
        },
        async exportExcel(){
            this.$vs.loading();
            // let a=document.createElement("a");
            console.log(`${this.baseUrl}/export?${new URLSearchParams(this.getParamsForExport()).toString()}`)
            // a.href=`${this.baseUrl}/export?${new URLSearchParams(this.getParamsForExport()).toString()}`;
            const {data:blob}=await this.$http.get(`${this.baseUrl}/export?${new URLSearchParams(this.getParamsForExport()).toString()}`,{
                responseType: 'blob', // important
            })

             // Create an object URL for the blob object
            const url = URL.createObjectURL(blob);

            // Create a new anchor element
            const a = document.createElement('a');

            // Set the href and download attributes for the anchor element
            // You can optionally set other attributes like `title`, etc
            // Especially, if the anchor element will be attached to the DOM
            a.href = url;
            a.download = `${this.model}.xlsx`;

            // Click handler that releases the object URL after the element has been clicked
            // This is required for one-off downloads of the blob content
            const clickHandler = (e) => {
                console.log(e)
                setTimeout(() => {
                URL.revokeObjectURL(url);
                // this.removeEventListener('click', clickHandler);
                this.$vs.loading.close()
                }, 150);
            };

            // Add the click event listener on the anchor element
            // Comment out this line if you don't want a one-off download of the blob content
            a.addEventListener('click', clickHandler, false);

            // Programmatically trigger a click on the anchor element
            // Useful if you want the download to happen automatically
            // Without attaching the anchor element to the DOM
            // Comment out this line if you don't want an automatic download of the blob content
            a.click();

            // Return the anchor element
            // Useful if you want a reference to the element
            // in order to attach it to the DOM or use it in some other way
            return a;
            // a.target="_self";
            // a.download=true;
            // a.click();
            // a=null;

        },
        addFixedHeader(){
            const header = document.querySelector('[ref="headerRoot"]');
            const body = document.querySelector('[ref="eBodyViewport"]');
            // body.style.minHeight="300px";
            const headerContainer = document.querySelector('[ref="eHeaderContainer"]');

            // More on this later
            const original={};
            original.position = header.style.position;
            original.top = header.style.top;
            original.height = header.style.height;
            original.width = header.style.width;
            original.minHeight = header.style.minHeight;
            original.zIndex = header.style.zIndex;

            window.addEventListener("scroll", () => {
                const shouldStick = header.getBoundingClientRect().top <= 0;
                const shouldUnstick = body.getBoundingClientRect().top -
                    header.getBoundingClientRect().height > 0;

                if (shouldStick) {
                    header.style.position = "fixed";
                    header.style.top = "55px";
                    header.style.height = "55px";
                    header.style.width = "79%";
                    header.style.minHeight = "55px";
                    headerContainer.querySelector(".ag-header-row:nth-of-type(2)").style.display="none";
                    // this is optional, but if you have other contents that overlap the
                    // header you may want to adjust the zIndex accordingly
                    header.style.zIndex = "2";
                }
                if (shouldUnstick) {
                    headerContainer.querySelector(".ag-header-row:nth-of-type(2)").style.display="block";
                    header.style.position = original.position;
                    header.style.top = original.top;
                    header.style.width = original.width;
                    header.style.height = original.height;
                    header.style.minHeight = original.minHeight;
                    header.style.zIndex = original.zIndex;
                }
            })
        },
        onFilterChanged(params){
            // if(this.anyFilterApplied){
            //     const model=params.api.getFilterModel();
            //     console.log("modified",model)
            //     this.setFilterQuery(model);
            // }
            // console.log(params.filterInstance.getValue())
        }
    },
    // watch: {
    //     '$store.state.windowWidth'(val) {
    //         if(val <= 576) {
    //         this.maxPageNumbers = 4
    //         this.gridOptions.columnApi.setColumnPinned('email', null)
    //         }
    //         else this.gridOptions.columnApi.setColumnPinned('email', 'left')
    //     }
    // },
    async beforeMount() {
        this.$http.post(`${window.config.path_prefix}/api/get-model-fields`,{
            model:this.model,
            module:this.module
        }).then(({data})=>{

            this.fields=data.data;
        });
    },
    async mounted() {
        this.gridApi = this.gridOptions.api
        // if(this.columnDefs.length < 5) this.gridApi.sizeColumnsToFit();
        //
        //
        this.initializeFilters();
        /* =================================================================
            NOTE:
            Header is not aligned properly in RTL version of agGrid table.
            However, we given fix to this issue. If you want more robust solution please contact them at gitHub
        ================================================================= */
        // this.addFixedHeader();
        if(this.$vs.rtl) {
            // document.querySelector(".ag-header").style.height="125px";
            // document.querySelector(".ag-header").style.minHeight="125px";
            document.querySelector("[ref=gridPanel]").style.minHeight="300px";
            // const header = this.$refs.agGridTable.$el.querySelector(".ag-header-container")
            // header.style.transform="translateX(20px)";
            // header.style.left = "-" + String(Number(header.style.transform.slice(11,-3)) + 9) + "px";
            document.querySelector(".ag-body-horizontal-scroll-viewport").scrollLeft=this.$store.state.windowWidth;
        }
    }
}
