<template>
    {{--  v-model="selected"  --}}
    <div class="table-wrap">
        <vs-table   :sst="true"
        @search="handleSearch"
        @change-page="handleChangePage"
        @sort="handleSort"
        :total="totalItems"
        pagination
        max-items="10"
        search
        stripe :data="items"  :noDataText="__('No {{$title}} found')">
            <template slot="thead">
                @foreach ($columns as $key => $column)
                    @if (fieldExistsInIndex($model, $column['name']) && !isset($relations[$column['name']]))
                        <vs-th>
                            {{__("<?=$column['label']?>")}}
                        </vs-th>
                    @endif
                @endforeach
                {{--  @foreach ($relations as $relation)
                    @if (isset($relation['in_index']) && $relation['in_index'])
                        <vs-th>
                            {{__("<?=$relation['label']?>")}}
                        </vs-th>
                    @endif
                @endforeach  --}}
            </template>

            <template slot-scope="{data}">
                <vs-tr :key="indextr" v-for="(tr, indextr) in data" >
                    @foreach ($columns as $key => $column)
                        @if (fieldExistsInIndex($model, $column['name']) && !isset($relations[$column['name']]))
                            <vs-td :data="data[indextr].<?= $column['name'] ?>">
                                @if (in_array($column['name'], $model->getDates()))
                                    {{dateFormatter(data[indextr].<?= $column['name'] ?>,data[indextr],"<?= $column['name'] ?>")}}
                                @else
                                    @switch($model::$fields[$column['name']]['htmlType'])
                                        @case("select")
                                            {{ selectFormatter(data[indextr].<?= $column['name'] ?>,data[indextr],"<?= $column['name'] ?>")}}
                                        @break
                                        @case("radio")
                                            {{radioFormatter(data[indextr].<?= $column['name'] ?>,data[indextr],"<?= $column['name'] ?>")}}
                                        @break
                                        @default
                                            {{data[indextr].<?= $column['name'] ?>}}
                                        @break
                                    @endswitch
                                @endif

                            </vs-td>
                        @endif
                    @endforeach
                    {{--  @foreach ($relations as $relation)
                        @if (isset($relation['in_index']) && $relation['in_index'])
                            <vs-td :data="data[indextr].<?= $column['name'] ?>">

                            </vs-td>
                        @endif
                    @endforeach  --}}
                </vs-tr>
            </template>
        </vs-table>
    </div>
</template>

<script>
    export default{
        data() {
            return {
                baseUrl:"{{ $baseApiPath }}",
                title:this.__("Export <?= $title ?>"),
                items:[],
                totalItems:0,
                fields:{},
                model:"{{basename(get_class($model))}}",
                module:"{{$module}}",
            }
        },
        methods:{
            dateFormatter(value,data,field){
                const localedParam=`${field}_${Iracode.$i18n.locale}`;
                if(!data[localedParam]) return data[field];
                return data[localedParam];
            },
            relationFormatter(value,data,field){
                return Iracode.getByDotNotation(data,field,"-");
            },
            radioFormatter(value,data,field){
                let fieldDefinition=this.fields[field];
                value= typeof value == "boolean" ? +value:value;
                if(fieldDefinition && fieldDefinition.options && fieldDefinition.options.length){
                    return fieldDefinition.options[value] ? fieldDefinition.options[value]:value;
                }
                return value;
            },
            selectFormatter(value,data,field){
                let fieldDefinition=this.fields[field];
                if(!fieldDefinition) return data[field];
                value= typeof value == "boolean" ? +value:value;
                if(fieldDefinition &&fieldDefinition.options && Object.keys(fieldDefinition.options).length){
                    return fieldDefinition.options[value] ?fieldDefinition.options[value]:value;
                }
                return value;
            },
            handleSearch(searching) {
                console.log(searching,"search")
            },
            handleChangePage(page) {
                const query={...this.$route.query};
                query.page=page;
                this.$router.push({query})
                this.getData();
            },
            handleSort(key, active) {
                console.log(key,active,"sort")
            },
            async getData(){
                const { data } = await this.$http.get(this.baseUrl,{
                    params:this.$route.query
                });
                this.items=data.data.items;
                this.totalItems=data.data.pagination_data.count;
            }
        },
        mounted() {

        },
        async created() {
            const {data:fields}=await this.$http.post(`${window.config.path_prefix}/api/get-model-fields`,{
                model:this.model,
                module:this.module
            });
            this.fields=fields.data;
            this.getData();
        },
    }
</script>
<style lang="scss">
    #crudPrint{
        padding: 5rem;
        max-width: 90%;
        margin: auto;

    .logo{
            width: 100px;
            img{
                width: 100%;
            }
        }
    }

</style>
