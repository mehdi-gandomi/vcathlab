@if(Module::isActive("AccessLevel"))
    import acl from "@/middleware/acl.js";
@endif
export default [
    @foreach ($routes as $route)
        {
            "path": "{{ $route['path'] }}",
            @if (isset($route['name']))
                "name": "{{ $route['name'] }}",
            @endif
            @if (isset($route['redirect']))
                "redirect": "{{ $route['redirect'] }}",
            @endif
            @if (isset($route['component']))
                "component": () =>import( /* webpackPrefetch: true */ "{{ $route['component'] }}"),
            @endif
            @isset($route['meta'])
                "meta":{
                    @foreach ($route['meta'] as $key => $meta)
                        @if ($key == 'breadcrumb')
                            "{{ $key }}":[
                            @include('vuegenerator::templates.breadcrumb',['breadcrumb'=>$meta])
                            ],
                        @elseif($key == "middleware")
                            "middleware":[
                                @foreach ($meta as $middleware)
                                    {{$middleware}},
                                @endforeach
                            ],
                        @else
                            "{{ $key }}":"{{ $meta }}",
                        @endif
                    @endforeach
                }
            @endisset
            @if (isset($route['children']) && count($route['children']))
                "children": [
                @foreach ($route['children'] as $key => $innerRoute)
                    {
                        "path": "{{ $innerRoute['path'] }}",
                        @if (isset($innerRoute['name']))
                            "name": "{{ $innerRoute['name'] }}",
                        @endif
                        @if (isset($innerRoute['redirect']))
                            "redirect": "{{ $innerRoute['redirect'] }}",
                        @endif
                        @if (isset($innerRoute['component']))
                            "component": () =>import( /* webpackPreload: true */ "{{ $innerRoute['component'] }}"),
                        @endif
                        @isset($innerRoute['meta'])
                            "meta":{
                            @foreach ($innerRoute['meta'] as $key => $meta)
                                @if ($key == 'breadcrumb')
                                    "{{ $key }}":[
                                    @include('vuegenerator::templates.breadcrumb',['breadcrumb'=>$meta])
                                    ],
                                    @elseif($key == "middleware")
                                        "middleware":[
                                            @foreach ($meta as $middleware)
                                                {{$middleware}},
                                            @endforeach
                                        ],
                                    @else
                                    "{{ $key }}":"{{ $meta }}",
                                @endif
                            @endforeach
                            }
                        @endisset
                    },
                @endforeach
                ],
                @isset($innerRoute['meta'])
                    "meta":{
                    @foreach ($innerRoute['meta'] as $key => $meta)
                        @if ($key == 'breadcrumb')
                            "{{ $key }}":[
                            @include('vuegenerator::templates.breadcrumb',['breadcrumb'=>$meta])
                            ],
                        @elseif($key == "middleware")
                            "middleware":[
                                @foreach ($meta as $middleware)
                                    {{$middleware}},
                                @endforeach
                            ],
                        @else
                            "{{ $key }}":"{{ $meta }}",
                        @endif
                    @endforeach
                    }
                @endisset
            @endif
        },
    @endforeach
]
