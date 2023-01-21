@if ($model::$fields[$column['name']]['filepond_options'])
    @foreach ($model::$fields[$column['name']]['filepond_options'] as $key=>$option) :{{$key}}="inputs.{{$column['name']}}.filepond_options['{{$key}}']"  @endforeach
@endif
