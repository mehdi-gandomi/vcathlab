<template>
    <div>
        <div class="flex justify-center my-2">
            <vs-button color="success" @click="print" type="filled">{{ __("Print") }}</vs-button>
        </div>
        <div id="crudPrint" >
            <div class="flex justify-between">
                <div class="logo">
                    <img :src="logoUrl" alt="">
                </div>
                <div class="exportTitle">
                    <h4>@{{title}}</h4>
                </div>
                <div class="date">
                    <strong>@{{__("Date")}}:</strong>
                    <p>@{{currentDate}}</p>
                </div>
            </div>
            <div class="flex justify-between  my-5">
                <div class="siteName">
                    <h4>@{{site_name}}</h4>
                </div>
                <div class="exportTitle">
                    <h4>@{{title}}</h4>
                </div>
                <div class="date">
                    <strong>@{{__("Time")}}:</strong>
                    <p>@{{currentTime}}</p>
                </div>
            </div>
            <div class="table-wrap">
                <vs-table stripe :data="items">
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
                                            {{data[indextr].<?= $column['name'] ?> | dateFormatter(data[indextr],"<?= $column['name'] ?>")}}
                                        @else
                                            @switch($model::$fields[$column['name']]['htmlType'])
                                                @case("select")
                                                    {{data[indextr].<?= $column['name'] ?> | selectFormatter(data[indextr],"<?= $column['name'] ?>")}}
                                                @break
                                                @case("radio")
                                                    {{data[indextr].<?= $column['name'] ?> | radioFormatter(data[indextr],"<?= $column['name'] ?>")}}
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
        </div>
    </div>
</template>

<script>
    import Printable from '@/mixins/Printable'
    export default{
        mixins:[Printable],
        data() {
            return {
                baseUrl:"{{ $baseApiPath }}/{{ $modelPlural }}",
                title:this.__("Export <?= $title ?>"),
                items:[],
                model:"{{basename(get_class($model))}}",
                module:"{{$module}}",
            }
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
