<?php

return [
    'model_namespace'=>"\\App\\Models",
    'templates_dir'=>'templates',
    'base_api_path'=>'/api',
    'modules_base_path'=>'Modules/Panel/Resources/js/src/modules',
    'modules_relative_base_path'=>'@/modules',
    'crud'=>[
        'create'=>'Create.vue',
        'update'=>'Update.vue',
        'index'=>'Index.vue',
        'detail'=>'Detail.vue',
        'print'=>'Print.vue',
        'routes_path'=>'Modules/Panel/Resources/js/src/routes.json',
        'routes_js_path'=>'Modules/Panel/Resources/js/src/routes.js'
        // 'routes_path'=>'Modules/Panel/Resources/js/src/routes.json',
        // 'routes_js_path'=>'Modules/Panel/Resources/js/src/routes.js'
    ],
    'pagination'=>[
        'limit'=>20
    ]
];
