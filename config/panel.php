<?php

return [
    'name' => 'Panel',
    'path_prefix'=>'/app',
    'api_path_prefix'=>'/app/api',
    'api_namespace'=>'\App\Http\Controllers\Panel\API',
    'web_namespace'=>'\App\Http\Controllers\Panel\API',
    'api_request_namespace'=>'App\Http\Requests\Panel\API',
    'api_routes_path'=>base_path("routes/panel/api.php"),
    'web_routes_path'=>base_path("routes/panel/web.php"),
    'base_routes_path'=>base_path("routes/panel"),
    'api_controller_path'=>app_path('Http/Controllers/Panel/API/'),
    'base_controller_path'=>app_path('Http/Controllers/Panel'),
    'middleware'=>["auth:sanctum","verified"],
    'modulesjs-file'=>resource_path("js/modules.js"),
    'vuexy'=>[
        'mobile_verification'=>false,
        'show_language_switcher'=>false,
        'session_locking'=>false,
        'show_search_bar'=>false,
       'themeConfig'=>[
        "disableCustomizer" => false,       // options[Boolean] => true, false(default)
        "disableThemeTour"  => true,        // options[Boolean] => true, false(default)
        "footerType"        => "static",    // options[String]  => static(default) / sticky / hidden
        "hideScrollToTop"   => false,       // options[Boolean] => true, false(default)
        "mainLayoutType"    => "vertical",  // options[String]  => vertical(default) / horizontal
        "navbarColor"       => "#fff",      // options[String]  => HEX color / rgb / rgba / Valid HTML Color name - (default=> #fff)
        "navbarType"        => "floating",  // options[String]  => floating(default) / static / sticky / hidden
        "routerTransition"  => "zoom-fade", // options[String]  => zoom-fade / slide-fade / fade-bottom / fade / zoom-out / none(default)
        "rtl"               => false,       // options[Boolean] => true, false(default)
        "sidebarCollapsed"  => false,       // options[Boolean] => true, false(default)
        "theme"             => "semi-dark",     // options[String]  => "light"(default), "dark", "semi-dark"
        'app_title'=>'Iracode CMS',
        // Not required yet - WIP
        "userInfoLocalStorageKey"=> "userInfo",
        // NOTE=> themeTour will be disabled in screens < 1200. Please refer docs for more info.
       ],
       'colors'=>[
        "primary" => '#7367F0',
        "success" => '#28C76F',
        "danger"  => '#EA5455',
        "warning" => '#F1C40F',
        "dark"    => '#1E1E1E'
       ]
       ],
       'menu'=>[]
];
