
@foreach ($columns->chunk(2) as $nestedColumns)
    <vs-row vs-type="flex"  vs-w="12" class="mb-6">
        @foreach ($nestedColumns as $column)
            @if (isset($relations[$column['name']]))
                @php
                    $relation=$relations[$column['name']];
                @endphp
                @if (isset($relation['in_form']) && $relation['in_form'])
                    <vs-col vs-type="flex" vs-align="center" vs-lg="6">
                        <vs-row vs-type="flex"  vs-w="12" >
                            <vs-col class="justify-end" vs-type="flex" vs-align="center" vs-lg="3">
                                <span>{{__("<?=$relation['label']?>")}}</span>
                                @if (isset($model::$rules[$relation['foreign_key']]) && strpos($model::$rules[$relation['foreign_key']],"required") > -1)
                                    <span class="ml-1 text-red">*</span>
                                @endif
                            </vs-col>
                            <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                                @include('vuegenerator::templates.relation-field',['relation'=>$relation,'model'=>$model])
                            </vs-col>
                        </vs-row>
                    </vs-col>
                @endif
            @elseif(fieldExistsInForm($model,$column['name']))
                @php
                    $htmlType=isset($model::$fields[$column['name']]['htmlType']) ? $model::$fields[$column['name']]['htmlType']:"text";
                @endphp
                <vs-col vs-type="flex" vs-align="center" vs-lg="6">
                    <vs-row vs-type="flex"  vs-w="12" >
                        <vs-col class="justify-end pr-5" vs-type="flex" vs-align="center" vs-lg="3">
                            <span>{{__("<?=$column['label']?>")}}</span>
                            @if (isset($model::$rules[$column['name']]) && strpos($model::$rules[$column['name']],"required") > -1)
                                <span class="ml-1 text-red">*</span>
                            @endif
                        </vs-col>
                        <vs-col vs-type="flex" vs-align="center" vs-lg="9">
                            @if ($htmlType == "radio"  && isset($model::$fields[$column['name']]['options']) && count($model::$fields[$column['name']]['options']))
                                @foreach ($model::$fields[$column['name']]['options'] as $key=>$option)
                                    <vs-radio v-model="form.{{$column['name']}}" vs-name="{{$column['name']}}" vs-value="{{$key}}">{{$option}}</vs-radio>
                                @endforeach
                            @elseif($htmlType == "filepond" || $htmlType == "filepond_image")
                                <component imageResizeMode="cover" :is="inputs.{{$column['name']}}.type" class="w-full" :danger="hasValidationError('<?= $column['name'] ?>')" :danger-text="validationError('<?= $column['name'] ?>')" name="{{$column['name']}}" @include('vuegenerator::templates.filepond-options',['column'=>$column,'model'=>$model]) :files="inputs.{{$column['name']}}.files" :server="uploadServer"/>
                            @elseif($htmlType == "selectTable")
                                <component :is="inputs.{{$column['name']}}.type" v-model="form.{{$column['name']}}" class="w-full" :danger="hasValidationError('<?= $column['name'] ?>')" :danger-text="validationError('<?= $column['name'] ?>')" name="{{$column['name']}}"  :options="inputs.{{$column['name']}}.options" :reduce="field => field.value" :dir="$vs.rtl ? 'rtl' : 'ltr'"  @search='(search) => onSelectTableSearch("{{$column['name']}}",search)' />
                            @else
                                <component :is="inputs.{{$column['name']}}.type" @if (in_array($htmlType,["select","multi_select"])) :value="inputs.{{$column['name']}}.selected" @input="op => onSelect('{{$column['name']}}',op)" @else v-model="form.{{$column['name']}}" @endif class="w-full" :danger="hasValidationError('<?= $column['name'] ?>')" :danger-text="validationError('<?= $column['name'] ?>')" name="{{$column['name']}}" type="{{$htmlType}}" @if (in_array($htmlType,["select","multi_select"])) :options="inputs.{{$column['name']}}.options"  :dir="$vs.rtl ? 'rtl' : 'ltr'" @endif  @if ($htmlType == "multi_select") multiple @endif @if ($htmlType == "date") inputFormat= "YYYY-MM-DD" format="YYYY-MM-DD" displayFormat= "jYYYY-jMM-jDD" @endif />
                            @endif
                        </vs-col>
                    </vs-row>
                </vs-col>
            @endif
        @endforeach
    </vs-row>
@endforeach
