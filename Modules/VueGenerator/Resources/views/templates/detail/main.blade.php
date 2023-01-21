<template>
    <loading-view :loading="loading">
        <div class="vx-row">
            <div class="vx-col w-full">
              <vx-card class="mb-base">
                <template v-slot:actions>
                    <vs-button color="primary" to="/{{$baseRoutePath}}" type="filled">{{__("Back")}}</vs-button>
                </template>
                    @php
                        $fields=$model::$fields;
                    @endphp
                    @foreach (array_chunk($fields,2) as $nestedField)
                        <div class="vx-row mb-6">
                            @foreach ($nestedField as $field)
                                @if (isset($relations[$field['name']]))
                                    @php
                                        $relation=$relations[$field['name']];
                                    @endphp
                                    @if (isset($relation['in_index']) && $relation['in_index'])
                                        <div class="vx-col w-1/2">
                                            <div class="row flex">
                                                <div class="vx-col w-1/4 pr-5 flex justify-end items-center ">
                                                    <p class="font-semibold">{{__("<?=$relation['label']?>")}}  </p>
                                                </div>
                                                <div class="vx-col w-3/4">
                                                    @include('vuegenerator::templates.detail.relation',['relation'=>$relation,'model'=>$model])
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @elseif (isset($field['inIndex']) && $field['inIndex'])
                                    @php
                                        $htmlType=isset($field['htmlType']) ? $field['htmlType']:"text";
                                    @endphp
                                    <div class="vx-col w-1/2">
                                        <div class="row flex">
                                            <div class="vx-col w-1/4 pr-5 flex justify-end items-center ">
                                                <p class="font-semibold">{{__("<?= $field['title'] ?>")}}  </p>
                                            </div>
                                            <div class="vx-col w-3/4">
                                                @include('vuegenerator::templates.detail.field',['field'=>$field,'htmlType'=>$htmlType,'model'=>$model])
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endforeach
              </vx-card>
            </div>
          </div>
    </loading-view>
</template>
<script>
    import DetailPage from '@/mixins/DetailPage'
    export default{
        components: {},
        mixins: [DetailPage],
        data () {
            return {
             details:{
                    @foreach ($fields as $field)
                        @if (!isset($relations[$field['name']]))
                            "{{$field['name']}}":"",
                        @endif
                    @endforeach
                    @foreach ($relations as $key=>$relation)
                        @if (isset($relation['in_index']) && $relation['in_index'])
                            "{{$relation['function_name']}}":{},
                        @endif
                    @endforeach
            },
            formTypes:{
                @foreach ($fields as $key=>$iem)
                    "{{$key}}":"{{isset($item['htmlType']) ? $item['htmlType']:'text'}}",
                @endforeach
            },
            module:"{{$module}}",
            model:"{{basename(get_class($model))}}"
        }

        },
        props: {
            //
        },
        computed: {
            Iracode(){
                return window.Iracode;
            }
        },
        async created () {
            const {data:response} =await this.$http.get(`{{$baseApiPath}}/{{$modelPlural}}/${this.$route.params.id}`);
            if(response.success){
                const {data}=response;
                this.$store.dispatch("setCurrentResource",data);
                this.populateFormFields(data);
            }
            this.loading=false;
        },
        mounted () {
            //
        }
    }
</script>
