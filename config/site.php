<?php
/**
 * Created by PhpStorm.
 * User: majid
 * Date: 5/8/19
 * Time: 1:10 PM
 */

return [

    'image' => [
        // Image cache time
        'cache' => 1440, // in minutes

        // global file size
        'file_size' => 10485760, // 10 MB

        // size of different actions
        'actions' => [
            // size of avatar image
            'avatar' => '60x60',

            // size of thumbnails in data list
            'list_thumbnail' => '64x64',

            // size of thumbnails
            'thumbnail' => '160x80',

            // size of covers
            'cover' => '800x400',

        ]
    ],

    'user' => [
        // Show users as online (sec.)
        'online_time' => 300,

        // maximum file size of user avatar
        'avatar_size' => 102400, // 100 KB

        // path of default avatar if the user avatar file removed from the server
        'default_avatar_path' => 'resources/img/admin/default-avatar.png',
    ],

    'admin' => [
        // Administration URL
        'url' => 'admin',

        // Administration Namespace
        'namespace' => '\App\Http\Controllers\Admin',

        // default items per page in admin listings
        'per_page' => 20,

        // Administration Admin navigation
        'navigation' => [
            /*
             * Header Navigation parameters
             * - title (required)
             * - icon
             * - link --or-- route
             * - children [ header navigation parameters ]
             */
            'header' => [
                [
                    'title' => 'Dashboard',
                    'icon' => 'fa fa-home',
                    'route' => 'admin.dashboard'
                ],
                [
                    'title' => 'Users',
                    'icon' => 'fa fa-users',
                    'children' => [
                        [
                            'title' => 'Add User',
                            'route' => 'admin.users.create'
                        ],
                        [
                            'title' => 'List Users',
                            'route' => 'admin.users.index',
                        ],
                    ]
                ],
                [
                    'title' => 'Products',
                    'icon' => 'fa fa-car',
                    'children' => [
                        [
                            'title' => 'List of products',
                            'route' => 'admin.products.index',
                        ],
                        [
                            'title' => 'Add product',
                            'route' => 'admin.products.create',
                        ],
                        [
                            'title' => 'Colors',
                            'route' => 'admin.products.colors.index'
                        ],
                        [
                            'title' => 'Brands',
                            'route' => 'admin.products.brands.index'
                        ],
                    ]
                ]
            ]
        ]
    ],
    'sortables' => [
        [
            'slug' => 'bouwjaar',
            'title' => 'Bouwjaar'
        ],
        [
            'slug' => 'prijs',
            'title' => 'Prijs'
        ],
        [
            'slug' => 'merk',
            'title' => 'Merk'
        ],
        [
            'slug' => 'km-stand',
            'title' => 'Km-stand'
        ]
    ],

    'products' => [
        // Product images
        'image' => [
            // file size of product images
            'file_size' => 10485760, // 10 MB
        ],
        'default_image_path' => 'img/default-product-image.jpg',
        // Fuel types
        'fuel_types' => [
            'gasoline' => 'Gasoline',
            'diesel' => 'Diesel',
            'ethanol' => 'Ethanol',
            'biodiesel' => 'Biodiesel',
            'propane' => 'Propane',
            'cng' => 'CNG',
            'electric' => 'Electric',
        ],

        // Transmission types
        'transmission_types' => [
            'at' => 'Automatic Transmission',
            'mt' => 'Manual Transmission',
            'am' => 'Automated Manual Transmission',
            'cvt' => 'Continuously Variable Transmission',
        ],

        // products prefix url
        'url' => 'autos',

        // number of records per page in listings, search and ...
        'paginate_count' => 25
    ]
];