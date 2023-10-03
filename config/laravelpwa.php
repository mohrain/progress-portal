<?php

return [
    'name' => 'Suchi Darta',
    'manifest' => [
        'name' => env('APP_NAME', 'Suchi Darta'),
        'short_name' => 'Suchi Darta',
        'start_url' => '/',
        'background_color' => '#ffffff',
        'theme_color' => '#000000',
        'display' => 'standalone',
        'orientation' => 'any',
        'status_bar' => 'black',
        'icons' => [
            '144x144' => [
                'path' => '/images/icons/manifest-icon-192.maskable.png',
                'purpose' => 'any'
            ],
            '192x192' => [
                'path' => '/images/icons/manifest-icon-192.maskable.png',
                'purpose' => 'any'
            ],
            '192x192' => [
                'path' => '/images/icons/manifest-icon-192.maskable.png',
                'purpose' => 'maskable'
            ],
            '512x512' => [
                'path' => '/images/icons/manifest-icon-512.maskable.png',
                'purpose' => 'any'
            ],
            '512x512' => [
                'path' => '/images/icons/manifest-icon-512.maskable.png',
                'purpose' => 'maskable'
            ],
            // [
            //     "path" => "/images/icons/manifest-icon-192.maskable.png",
            //     "sizes" => "192x192",
            //     "type" => "image/png",
            //     "purpose" => "any"
            // ],
            // [
            //     "path" => "/images/icons/manifest-icon-192.maskable.png",
            //     "sizes" => "192x192",
            //     "type" => "image/png",
            //     "purpose" => "maskable"
            // ],
            // [
            //     "path" => "/images/icons/manifest-icon-512.maskable.png",
            //     "sizes" => "512x512",
            //     "type" => "image/png",
            //     "purpose" => "any"
            // ],
            // [
            //     "path" => "/images/icons/manifest-icon-512.maskable.png",
            //     "sizes" => "512x512",
            //     "type" => "image/png",
            //     "purpose" => "maskable"
            // ]
        ],
        'splash' => [
            '640x1136' => '/images/icons/apple-splash-640-1136.jpg',
            '750x1334' => '/images/icons/apple-splash-750-1334.jpg',
            '828x1792' => '/images/icons/apple-splash-828-1792.jpg',
            '1125x2436' => '/images/icons/apple-splash-1125-2436.jpg',
            '1242x2208' => '/images/icons/apple-splash-1242-2208.jpg',
            '1242x2688' => '/images/icons/apple-splash-1242-2688.jpg',
            '1536x2048' => '/images/icons/apple-splash-1536-2048.jpg',
            '1668x2224' => '/images/icons/apple-splash-1668-2224.jpg',
            '1668x2388' => '/images/icons/apple-splash-1668-2388.jpg',
            '2048x2732' => '/images/icons/apple-splash-2048-2732.jpg',
        ],
        'shortcuts' => [
            [
                'name' => 'नयाँ सूची दर्ता',
                'description' => 'नयाँ सूची दर्ता',
                'url' => '/suchi/create',
                'icons' => [
                    "src" => "/images/icons/manifest-icon-192.maskable.png",
                    "purpose" => "any"
                ]
            ],
            [
                'name' => 'System Logs',
                'description' => 'Open system logs',
                'url' => '/admin/logs',
                'icons' => [
                    "src" => "/images/icons/manifest-icon-192.maskable.png",
                    "purpose" => "any"
                ]
            ],
        ],
        'custom' => []
    ]
];
