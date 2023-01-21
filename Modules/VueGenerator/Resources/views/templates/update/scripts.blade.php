import Form from '@/Form';
import HasForm from '@/mixins/HasForm'
import UpdatePage from "@/mixins/UpdatePage";
export default {
    components: {},
    mixins: [HasForm,UpdatePage],
    data () {
        return {
            form:new Form({
                @foreach ($columns as $column)
                    @if (fieldExistsInForm($model, $column['name']))
                        @php
                        $htmlType=$model::$fields[$column['name']]['htmlType'];
                        @endphp
                        @if (in_array($htmlType, ['select', 'multi_select', 'radio']) && isset($model::$fields[$column['name']]['options']) && count($model::$fields[$column['name']]['options']))
                            @php
                            $options=$model::$fields[$column['name']]['options']
                            @endphp
                            {{ $column['name'] }}:"{{ array_keys($options)[0] }}",
                        @else
                            @if (in_array($htmlType, ['filepond', 'filepond_image']) && $model::$fields[$column['name']]['filepond_options']['allow-multiple'])
                                {{ $column['name'] }}:[],
                            @elseif($htmlType == "checkbox")
                                {{ $column['name'] }}:false,
                            @else
                                {{ $column['name'] }}:"",
                            @endif
                        @endif
                    @endif
                @endforeach
                @foreach ($relations as $key => $relation)
                    @if (isset($relation['in_form']) && $relation['in_form'] && $relation['relation_type'] == 'mt1')
                        {{ $relation['foreign_key'] }}:"",
                    @endif
                @endforeach
            }),
            model:"{{addslashes(get_class($model))}}",
            inputs:{
                @foreach ($columns as $column)
                    @if (fieldExistsInForm($model, $column['name']) && !isset($relations[$column['name']]))
                        {{ $column['name'] }}:{
                        type:"{{ isset($model::$fields[$column['name']]['htmlType']) ? config('vuegenerator.inputs')[$model::$fields[$column['name']]['htmlType']] : config('vuegenerator.inputs')['text'] }}",
                        field_type:"{{ isset($model::$fields[$column['name']]['htmlType']) ? $model::$fields[$column['name']]['htmlType'] : 'text' }}",
                        @if (in_array($model::$fields[$column['name']]['htmlType'], ['select', 'multi_select','selectTable']))
                            options:[
                                @if (isset($model::$fields[$column['name']]['options']))
                                    @foreach ($model::$fields[$column['name']]['options'] as $key => $value)
                                        {
                                        label:"{{ $value }}",
                                        value:"{{ $key }}"
                                        },
                                    @endforeach
                                @endif
                            ],
                            selected:{},
                        @endif
                        @if ($model::$fields[$column['name']]['htmlType'] == 'selectTable')
                            select_table_options:{
                                @if (isset($model::$fields[$column['name']]['select_table_options']))
                                    @foreach ($model::$fields[$column['name']]['select_table_options'] as $key => $value)
                                        {{ $key }}:"{{ $value }}",
                                    @endforeach
                                @endif
                            },
                        @endif
                        @if (in_array($model::$fields[$column['name']]['htmlType'],["filepond","filepond_image"]))
                            files:[],
                            filepond_options:{
                                @foreach ($model::$fields[$column['name']]['filepond_options'] as $key => $value)
                                    @if (is_bool($value))
                                        "{{$key}}":Iracode.toBool({{ $value ? 1:0 }}),
                                    @else
                                        "{{$key}}":"{{ $value }}",
                                    @endif
                                @endforeach
                            },
                        @endif
                        @if ($model::$fields[$column['name']]['htmlType'] == 'relation' && isset($relations[$column['name']]) &&  $relation['relation_type'] == 'mt1')
                            search_url:$relations[$column['name']]::$api_route,
                            options:[]
                        @endif
                        },
                    @endif
                @endforeach
                @foreach ($relations as $relation)
                    @if (isset($relation['in_form']) && $relation['in_form'] &&  $relation['relation_type'] == 'mt1')
                        {{ $relation['foreign_key'] }}:{
                        field_type:"relation",
                        foreign_key:'{{ $relation['foreign_key'] }}',
                        relation_name:'{{ $relation['function_name'] }}',
                        options:[],
                        selected:{},
                        searchUrl:"{{ $relation['related_class']::$api_route }}",
                        titleField:"{{ $relation['related_class']::$title }}",
                        },
                    @endif
                @endforeach
            },
        }
    },
    props: {
    //
    },
    computed: {
    //
    },
    async created () {
        const {data:response} =await this.$http.get(`{{ $baseApiPath }}/{{ $modelPlural }}/${this.$route.params.id}`);
        if(response.success){
            const {data}=response;
            this.$store.dispatch("setCurrentResource",data);
            this.populateFormFields(data);
        }
    },
    mounted () {
    //
    },
    methods: {
        async onSubmit(action){
            const data =await this.form.put(`{{ $baseApiPath }}/{{ $modelPlural }}/${this.$route.params.id}`);
            if(data.success){
                Iracode.success(this.__("$TABLE_NAME_TITLE$ Updated Successfully"))
            }
            if(action == "close") this.$router.push("/{{ $baseRoutePath }}");
            else this.form.reset();
        }
    }

};
