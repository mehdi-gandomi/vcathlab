@foreach ($breadcrumb as $key=>$value)
{
    @foreach ($value as $innerKey=>$innerValue)
        @if (is_array($innerValue))
        "{{$innerKey}}":{
            @foreach ($innerValue as $nestedKey=>$nestedValue)
            "{{$nestedKey}}":"{{$nestedValue}}",
            @endforeach
        },
        @else
        {{--  @if ($innerKey == "title")
        "{{$innerKey}}":window.Iracode.app.__("{{$innerValue}}"),
        @else  --}}
        "{{$innerKey}}":"{{$innerValue}}",
        {{--  @endif  --}}
        @endif
    @endforeach
},
@endforeach
