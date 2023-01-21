<v-select style="width: 100%" :dir="$vs.rtl ? 'rtl' : 'ltr'" :value="inputs.{{$relation['foreign_key']}}.selected" @input="(op)=>onRelationSelect('{{$relation['foreign_key']}}',op)"  label="{{$relation['related_class']::$title}}" :filterable="false" :options="inputs.{{$relation['foreign_key']}}.options" @search="(search,loading)=>onRelationSearch('{{$relation['foreign_key']}}',search,loading)">
    <template slot="no-options">
      @{{__('Type to search')}}
    </template>
</v-select>
