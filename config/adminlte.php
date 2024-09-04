<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => 'Deco Art Dashboard',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => true,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '',
    'logo_img' => 'assets\logo.png',
    'logo_img_class' => 'col-md-6',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'EIS',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => true,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'md',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => '/dashboard',
    'logout_url' => '/dashboard/logout',
    'login_url' => '/dashboard/login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        [
            'text' => 'search',
            'search' => false,
            'topnav' => true,
        ],
        [
            'text' => 'blog',
            'url'  => '/',
            'can'  => 'manage-blog',
        ],
        [
            'text'        => 'View Website',
            'url'         => 'https://decoart.com.eg/',
            'icon'        => 'fa fa-globe',
            // 'label'       => 'DB',
            'label_color' => 'success',
            'target' => '_blank',
        ],

        ['header' => 'account_settings'],
        [
            'text' => 'Dashboard',
            'url'  => 'dashboard/',
            'icon' => 'fa fa-bar-chart',
        ],
        [
            'text' => 'Profile',
            'url'  => 'dashboard/user/profile',
            'icon' => 'fas fa-fw fa-user',
        ],
        ['header' => 'WEBSITE SECTIONS'],
        [
            'can'  => 'home',
            'text' => 'Home Page',
            'url'  => 'dashboard/home',
            'icon' => 'fa  fa-home',
        ],
        [
            'can'  => 'home',
            'text' => 'About Us Page',
            'url'  => 'dashboard/about-us',
            'icon' => 'fa fa-info-circle',
        ],
//        [
//            'text' => 'Services',
//            'url'  => 'dashboard/service',
//            'icon' => 'fa fa-gears',
//            'submenu' => [
//                [
//                    'text' => 'Services',
//                    'url' => 'dashboard/service',
//                ],
//                [
//                    'text' => 'Service Materials',
//                    'url' => 'dashboard/material',
//                ],
//                [
//                    'text' => 'Service Labels',
//                    'url' => 'dashboard/label',
//                ],
//                [
//                    'text' => 'Service Page',
//                    'url' => 'dashboard/service-page',
//                ],
//                ]
//        ],
        // [
        //     'text' => 'Service Materials',
        //     'url'  => 'dashboard/material',
        //     'icon' => 'fas fa-warehouse',
        // ],
        // [
        //     'text' => 'Service Labels',
        //     'url'  => 'dashboard/label',
        //     'icon' => 'fas fa-warehouse',
        // ],
        // [
        //     'text' => 'Service Page',
        //     'url'  => 'dashboard/service-page',
        //     'icon' => 'fas fa-warehouse',
        // ],
        [
            'text' => 'Banners Page',
            'url'  => 'dashboard/banner',
            'icon' => 'far fa-images',

        ],
        [
            // 'can'  => 'projects',
            'text' => 'Categories Page',
            'url'  => 'dashboard/category',
            'icon' => 'fa fa-newspaper-o',
        ],
        [
            // 'can'  => 'projects',
            'text' => 'Products Page',
            'url'  => 'dashboard/product',
            'icon' => 'fa fa-newspaper-o',
        ],
        [
            // 'can'  => 'projects',
            'text' => 'news',
            'url'  => 'dashboard/news',
            'icon' => 'fa fa-newspaper-o',
        ],
        [
            // 'can'  => 'projects',
            'text' => 'testimonial',
            'url'  => 'dashboard/testimonial',
            'icon' => 'fa fa-comments-o',
        ],
        [
            // 'can'  => 'projects',
            'text' => 'Locations',
            'url'  => 'dashboard/location',
            'icon' => 'fas fa-map-marker-alt',
        ],

        // construction_updates
        [
            // 'can'  => 'projects',
            'text' => 'Contact Us Messages',
            'url'  => 'dashboard/contact_us',
            'icon' => 'fas fa-sms',
        ],
//        [
//            'text'=>'setting',
//            'url'=>'dashboard/setting',
//            'icon'=>'fas fa-warehouse',
//        ],
        // ['header' => 'Projects'],
        // [
        //     'can'  => 'projects',
        //     'text'=>'Properties',
        //     'icon' => 'fas fa-building',
        //     'url'  => 'dashboard/user/profile',
        // ],
        // [
        //     // 'can'  => 'projects',
        //     'text' => 'project Settings',
        //     'icon' => 'fas fa-cog',
        //     'submenu' => [
        //         // [
        //         //     'can'  => 'property_types',
        //         //     'text' => 'property type',
        //         //     'url'  => 'dashboard/property_types',
        //         //     'icon' => 'fas fa-building',
        //         // ],
        //         // [
        //         //     'can'  => 'companies',
        //         //     'text' => 'company',
        //         //     'url'  => 'dashboard/companies',
        //         //     'icon' => 'fas fa-warehouse',
        //         // ],
        //         // [
        //         //     'can'  => 'districts',
        //         //     'text' => 'districts',
        //         //     'url'  => 'dashboard/districts',
        //         //     'icon' => 'fas fa-warehouse',
        //         // ],
        //         // [
        //         //     // 'can'  => 'projects',
        //         //     'text' => 'Projects',
        //         //     'url'  => 'dashboard/project',
        //         //     'icon' => 'fas fa-building',
        //         // ],
        //         // // [
        //         // //     'can'  => 'media_centers',
        //         // //     'text' => 'media_centers',
        //         // //     'url'  => 'dashboard/media_center',
        //         // //     'icon' => 'fas fa-warehouse',
        //         // // ],
        //         // [
        //         //     // 'can'  => 'projects',
        //         //     'text' => 'life_styles',
        //         //     'url'  => 'dashboard/life_style',
        //         //     'icon' => 'fas fa-warehouse',
        //         // ],
        //         // [
        //         //     // 'can'  => 'projects',
        //         //     'text' => 'news',
        //         //     'url'  => 'dashboard/news',
        //         //     'icon' => 'fas fa-warehouse',
        //         // ],
        //         // // construction_updates
        //         // [
        //         //     // 'can'  => 'projects',
        //         //     'text' => 'construction updates',
        //         //     'url'  => 'dashboard/construction_updates',
        //         //     'icon' => 'fas fa-warehouse',
        //         // ],
        //         // [
        //         //     'can'  => 'service',
        //         //     'text' => 'Service',
        //         //     'url'  => 'dashboard/service',
        //         //     'icon' => 'fas fa-warehouse',
        //         // ],
        //     ]
        // ],
        // [
        //     'can'  => 'projects',
        //     'text' => 'projects',
        //     'icon' => 'fas fa-building',
        //     'submenu' => [
        //         [
        //             'can'  => 'projects',
        //             'text' => 'Projects',
        //             'url'  => 'dashboard/project',
        //             'icon' => 'fas fa-building',
        //         ],
        //         [
        //             'can'  => 'service',
        //             'text' => 'Service',
        //             'url'  => 'dashboard/service',
        //             'icon' => 'fas fa-warehouse',
        //         ],
        //     ]
        // ],

        // [
        //     // 'can'  => 'messages',
        //     'text' => 'Messages',
        //     'url'  => 'dashboard/message',
        //     'icon' => 'fas fa-envelope',
        // ],



        // [
        //     'can'  => 'seo',
        //     'text' => 'SEO pixel',
        //     'url'  => 'dashboard/seo',
        //     'icon' => 'fas fa-info',
        // ],
//        [
//            'can'  => 'seo',
//            'text' => 'SEO ',
//            'url'  => 'seo/dashboard',
//            'icon' => 'fas fa-info',
//        ],
        // [
        //     'can'  => 'messages',
        //     'text' => 'Landing Page',
        //     'icon' => 'fas fa-digital-tachograph',
        //     'submenu' => [
        //         [
        //             'can'  => 'projects',
        //             'text' => 'data',
        //             'url'  => 'dashboard/leads/create',
        //             'icon' => 'fas fa-calendar-week',
        //         ],
        //         [
        //             'can'  => 'projects',
        //             'text' => 'SEO',
        //             'url'  => 'dashboard/leads/seo',
        //             'icon' => 'fas fa-calendar-week',
        //         ],
        //         [
        //             'can'  => 'messages',
        //             'text' => 'Leads',
        //             'url'  => 'dashboard/leads',
        //             'icon' => 'fas fa-newspaper',
        //         ],
        //     ]
        // ],

        // [
        //     'text'    => 'multilevel',
        //     'icon'    => 'fas fa-fw fa-share',
        //     'submenu' => [
        //         [
        //             'text' => 'level_one',
        //             'url'  => '/dashboard',
        //         ],
        //         [
        //             'text'    => 'level_one',
        //             'url'     => '#',
        //             'submenu' => [
        //                 [
        //                     'text' => 'level_two',
        //                     'url'  => '#',
        //                 ],
        //                 [
        //                     'text'    => 'level_two',
        //                     'url'     => '#',
        //                     'submenu' => [
        //                         [
        //                             'text' => 'level_three',
        //                             'url'  => '#',
        //                         ],
        //                         [
        //                             'text' => 'level_three',
        //                             'url'  => '#',
        //                         ],
        //                     ],
        //                 ],
        //             ],
        //         ],
        //         [
        //             'text' => 'level_one',
        //             'url'  => '#',
        //         ],
        //     ],
        // ],
        // ['header' => 'labels'],
        // [
        //     'text'       => 'important',
        //     'icon_color' => 'red',
        //     'url'        => '#',
        // ],
        // [
        //     'text'       => 'warning',
        //     'icon_color' => 'yellow',
        //     'url'        => '#',
        // ],
        // [
        //     'text'       => 'information',
        //     'icon_color' => 'cyan',
        //     'url'        => '#',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'plugins' => [

        'Datatables' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.24/af-2.3.5/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/cr-1.5.3/date-1.0.3/fc-3.3.2/fh-3.1.8/kt-2.6.1/r-2.2.7/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.1/sp-1.2.2/sl-1.3.3/datatables.min.css',
                ],
                [
                  'type' => 'js',
                  'asset' => false,
                  'location' => '//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js',
                ],
                [
                  'type' => 'js',
                  'asset' => false,
                  'location' => '//cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.24/af-2.3.5/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/cr-1.5.3/date-1.0.3/fc-3.3.2/fh-3.1.8/kt-2.6.1/r-2.2.7/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.1/sp-1.2.2/sl-1.3.3/datatables.min.js',
                ],
            ],
        ],
        'Select2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/css/select2.css',
                ],
            ],
        ],
        'icons' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.all.min.js',
                ],
            ],
        ],
        'Pace' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
        'summernote' => [
          'active' => true,
          'files' => [
              [
                  'type' => 'css',
                  'asset' => true,
                  'location' => 'vendor/summernote/summernote.min.css',
              ],
              [
                  'type' => 'js',
                  'asset' => true,
                  'location' => 'vendor/summernote/summernote.min.js',
              ],
          ],
        ],
        'dropzone' => [
          'active' => true,
          'files' => [
              [
                  'type' => 'css',
                  'asset' => false,
                  'location' => '//cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css',
              ],
              [
                  'type' => 'js',
                  'asset' => false,
                  'location' => '//cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.js',
              ],
          ],
        ],
        'bs-custom-file-input' => [
          'active' => true,
          'files' => [
              [
                  'type' => 'js',
                  'asset' => true,
                  'location' => 'vendor/bs-custom-file-input/bs-custom-file-input.min.js',
              ],
          ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    */

    'livewire' => false,
];
