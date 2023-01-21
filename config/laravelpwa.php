<?php

return [
    'name' => 'LaravelPWA',
    'manifest' => [
        "short_name" => "Virtual Cathlab",
        "name" => "Virtual Cathlab v1",
        "lang" => "en",
        "description" => "Virtual Cathlab v1",
        "start_url" => env("START_URL","https://vcathlab.com/"),
        "background_color" => "#fff",
        "theme_color" => "#db1f27",
        "dir" => "ltr",
        "display" => "standalone",
        "orientation" => "any",
        "status_bar" => "#db1f27",
        "icons" => [
            "192x192" => [
                "path" => "/images/icons/android-icon-192x192-dunplab-manifest-29418.png",
                "type" => "image/png",
                "purpose" => "any",
            ],
            "180x180" => [
                "path" => "/images/icons/apple-icon-180x180-dunplab-manifest-29418.png",
                "type" => "image/png",
                "purpose" => "any",
            ],
            "152x152" => [
                "path" => "/images/icons/apple-icon-152x152-dunplab-manifest-29418.png",
                "type" => "image/png",
                "purpose" => "any",
            ],
            "144x144" => [
                "path" => "/images/icons/apple-icon-144x144-dunplab-manifest-29418.png",
                "type" => "image/png",
                "purpose" => "any",
            ],
            "120x120" => [
                "path" => "/images/icons/apple-icon-120x120-dunplab-manifest-29418.png",
                "type" => "image/png",
                "purpose" => "any",
            ],
            "114x114" => [
                "path" => "/images/icons/apple-icon-114x114-dunplab-manifest-29418.png",
                "type" => "image/png",
                "purpose" => "any",
            ],
            "96x96" => [
                "path" => "/images/icons/favicon-96x96-dunplab-manifest-29418.png",
                "type" => "image/png",
                "purpose" => "any",
            ],
            "76x76" => [
                "path" => "/images/icons/apple-icon-76x76-dunplab-manifest-29418.png",
                "type" => "image/png",
                "purpose" => "any",
            ],
            "72x72" => [
                "path" => "/images/icons/apple-icon-72x72-dunplab-manifest-29418.png",
                "type" => "image/png",
                "purpose" => "any",
            ],
            "60x60" => [
                "path" => "/images/icons/apple-icon-60x60-dunplab-manifest-29418.png",
                "type" => "image/png",
                "purpose" => "any",
            ],
            "57x57" => [
                "path" => "/images/icons/apple-icon-57x57-dunplab-manifest-29418.png",
                "type" => "image/png",
                "purpose" => "any",
            ],
            "32x32" => [
                "path" => "/images/icons/favicon-32x32-dunplab-manifest-29418.png",
                "type" => "image/png",
                "purpose" => "any",
            ],
            "16x16" => [
                "path" => "/images/icons/favicon-16x16-dunplab-manifest-29418.png",
                "type" => "image/png",
                "purpose" => "any",
            ],
        ],
        "prefer_related_applications" => "false",
        'splash' => [
            '640x1136' => '/images/Webapp.jpg',
            '750x1334' => '/images/Webapp.jpg',
            '828x1792' => '/images/Webapp.jpg',
            '1125x2436' => '/images/Webapp.jpg',
            '1242x2208' => '/images/Webapp.jpg',
            '1242x2688' => '/images/Webapp.jpg',
            '1536x2048' => '/images/Webapp.jpg',
            '1668x2224' => '/images/Webapp.jpg',
            '1668x2388' => '/images/Webapp.jpg',
            '2048x2732' => '/images/Webapp.jpg',
        ],
        // 'shortcuts' => [
        //     [
        //         'name' => 'Shortcut Link 1',
        //         'description' => 'Shortcut Link 1 Description',
        //         'url' => '/shortcutlink1',
        //         'icons' => [
        //             "src" => "/images/icons/icon-72x72.png",
        //             "purpose" => "any",
        //         ],
        //     ],
        //     [
        //         'name' => 'Shortcut Link 2',
        //         'description' => 'Shortcut Link 2 Description',
        //         'url' => '/shortcutlink2',
        //     ],
        // ],
        'custom' => [],
    ],
];
