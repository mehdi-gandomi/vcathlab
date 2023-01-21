<?php

namespace Modules\User\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Facades\DB;
use Laravel\Fortify\Fortify;
use Modules\User\Actions\CreateNewUser;
use Modules\User\Enums\Profession;
use Modules\User\Enums\Specialty;
use Modules\Panel\Iracode;
use Modules\Place\Models\Province;
use Modules\User\Actions\LoginUser;
use Modules\User\Actions\UpdateUserProfileInformation;

class UserServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'User';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'user';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));
        Fortify::registerView(function($request){
            $countries=DB::table("countries")->get();
            $provinces=Province::orderBy("en_name")->get();
            $cities=$provinces->first()->cities()->orderBy("en_name")->get();
            $professions=Profession::asSelectArray();
            $specialties=Specialty::asSelectArray();
            return view("user::register",compact("countries","provinces","cities","professions","specialties"));
        });
        \Laravel\Fortify\Fortify::loginView("user::auth.login");
        \Laravel\Fortify\Fortify::authenticateUsing(new LoginUser);
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::verifyEmailView("user::auth.verify-email");
        Iracode::script("axios",module_path("User","Resources/assets/js/axios.min.js"));
        Iracode::folderTranslation(__DIR__."/../Resources/lang");
        Iracode::serving(function($event){
            Iracode::script("User",asset("vendor/user/js/app.js"));
            // Iracode::initializeMenus(  [


            //     0 =>


            //     [


            //       'name' => 'تنظیمات سیستم',


            //       'url' => NULL,


            //       'slug' => 's1',


            //       'icon' => '',


            //       'submenu' =>


            //       [


            //         0 =>


            //         [


            //           'name' => 'گروههای کاری',


            //           'url' => '/accesslevel/roles',


            //           'target' => '_self',


            //           'slug' => 'm1',


            //           'icon' => 'far fa-tty',


            //         ],


            //         1 =>


            //         [


            //           'name' => 'زیرسیستم ها',


            //           'url' => '/accesslevel/subsystems',


            //           'target' => '_self',


            //           'slug' => 'm2',


            //           'icon' => 'far fa-tty',


            //         ],


            //         2 =>


            //         [


            //           'name' => 'گزارش فعالیت کاربران',


            //           'url' => '/accesslevel/user_activities',


            //           'target' => '_self',


            //           'slug' => 'm3',


            //           'icon' => 'far fa-tty',


            //         ],


            //         3 =>


            //         [


            //           'name' => 'گزارش فعالیت کاربران',


            //           'url' => '/accesslevel/users',


            //           'target' => '_self',


            //           'slug' => 'm4',


            //           'icon' => 'far fa-tty',


            //         ],


            //       ],


            //     ],


            //     1 =>


            //     [


            //       'name' => 'اطلاعات پایه',


            //       'url' => NULL,


            //       'slug' => 's2',


            //       'icon' => '',


            //       'submenu' =>


            //       [


            //         0 =>


            //         [


            //           'name' => 'مدیریت اماکن',


            //           'url' => NULL,


            //           'target' => '_self',


            //           'slug' => 'm5',


            //           'icon' => 'far fa-tty',


            //           'submenu' =>


            //           [


            //             0 =>


            //             [


            //               'name' => 'اطلاعات کشورها',


            //               'url' => '/location/countries',


            //               'target' => '_self',


            //               'slug' => 'm6',


            //               'icon' => 'far fa-tty',


            //             ],


            //             1 =>


            //             [


            //               'name' => 'اطلاعات شهرها',


            //               'url' => '/location/cities',


            //               'target' => '_self',


            //               'slug' => 'm7',


            //               'icon' => 'far fa-tty',


            //             ],


            //           ],


            //         ],


            //         1 =>


            //         [


            //           'name' => 'اطلاعات واحدهای پولی',


            //           'url' => '/basicinform/currencies',


            //           'target' => '_self',


            //           'slug' => 'm8',


            //           'icon' => 'far fa-blind',


            //         ],


            //         2 =>


            //         [


            //           'name' => 'اطلاعات اصناف',


            //           'url' => '/basicinformation/guilds',


            //           'target' => '_self',


            //           'slug' => 'm9',


            //           'icon' => 'far fa-blind',


            //         ],


            //         3 =>


            //         [


            //           'name' => 'اطلاعات دسته بندی آگهی ها',


            //           'url' => '/basicinformation/categories',


            //           'target' => '_self',


            //           'slug' => 'm10',


            //           'icon' => 'far fa-blind',


            //         ],


            //       ],


            //     ],


            //   ]);
            Iracode::initializeMenus(function(){

                if(auth()->check()){
                    if(auth()->user()->master){
                        return [
                            [
                                'url'=>"/dashboard/analytics",
                                'name'=>"Dashboard",
                                'slug'=>'dashboard',
                                'icon'=>'HomeIcon'
                            ],
                            [
                                "url"=> null,
                                "name"=> "MACE Risk",
                                "icon"=> "HomeIcon",
                                "submenu"=> [


                                  [
                                    'url'=>"/mace_assesment",
                                    'name'=>"MACE Calculator",
                                    'slug'=>'mace-assesment-calculator'
                                ],

                                [
                                    'url'=>"/user/mace_assesments",
                                    'name'=>"List",
                                    'slug'=>'mace-assesment-list'
                                ],
                                ]
                            ],
                            [
                                "url"=> null,
                                "name"=> "Echocardiography",
                                "icon"=> "HomeIcon",
                                "submenu"=> [


                                    [
                                        'url'=>"/echocardiography",
                                        'name'=>"Echo Calculator",
                                        'slug'=>'mace-assesment-calculator'
                                    ],

                                [
                                    'url'=>"/user/mace_assesments",
                                    'name'=>"List",
                                    'slug'=>'mace-assesment-list'
                                ],
                                ]
                            ],
                            [
                                "url"=> null,
                                "name"=> "Complex Cases",
                                "icon"=> "FileTextIcon",
                                "submenu"=> [
                                    [
                                        'url'=>"/admin/complex_cases",
                                        'name'=>"Cases",
                                        'slug'=>'admin-complex-cases',
                                        'icon'=>'FileTextIcon'
                                    ],
                                    [
                                        'url'=>"/admin/complex_case_categories",
                                        'name'=>"Categories",
                                        'slug'=>'complex-case-categories',
                                        'icon'=>'FileTextIcon'
                                    ],
                                    [
                                        'url'=>"/admin/complex_case/comments",
                                        'name'=>"Comments",
                                        'slug'=>'complex-cases-comments',
                                        'icon'=>'MessageCircleIcon'
                                    ],
                                ]
                            ],


                            [
                                "url"=> null,
                                "name"=> "NiFFR Cases",
                                // "icon"=> "ActivityIcon",
                                "icon_url"=> "/images/icons/niffr.png",
                                "width"=>"30px",
                                "submenu"=> [

                                  [
                                    "url"=> '/user/niffr_cases/create',
                                    "name"=> "New NiFFR Case",
                                    "icon"=> "FileTextIcon",
                                    "slug"=> "new-report",
                                  ],
                                  [
                                    "url"=> "/admin/niffr_cases",
                                    "name"=> "List",
                                    "icon"=> "FileTextIcon",
                                    "slug"=> 'admin-niffer-cases',
                                  ]
                                ]
                            ],
                            [
                                "url"=> null,
                                "name"=> "FFR CT Cases",
                                // "icon"=> "FileTextIcon",
                                "icon_url" => "/images/icons/ffr.png",
                                "submenu"=> [
                                    [
                                        'url'=>"/admin/ct_cases",
                                        'name'=>"Cases",
                                        'slug'=>'admin-ct-cases',
                                        'icon'=>'FileTextIcon'
                                    ],

                                ]
                            ],

                            [
                                "url"=> null,
                                "name"=> "Tickets",
                                "icon"=> "MessageCircleIcon",
                                "submenu"=> [

                                  [
                                    "url"=> '/admin/tickets',
                                    "name"=> "Tickets",
                                    "icon"=> "FileTextIcon",
                                    "slug"=> "new-report",
                                  ],
                                  [
                                    "url"=> "/admin/tickets/create",
                                    "name"=> "New ticket",
                                    "icon"=> "FileTextIcon",
                                    "slug"=> 'niffer-cases',
                                  ]
                                ]
                            ],
                            [
                                "url"=> null,
                                "name"=> "Subsriptions",
                                "icon"=> "UsersIcon",
                                "submenu"=> [

                                  [
                                    "url"=> '/subscriptions/plans',
                                    "name"=> "Plans",
                                    "icon"=> "FileTextIcon",
                                    "slug"=> "new-plan",
                                  ]
                                ]
                            ],
                            [
                                'url'=>"/admin/users",
                                'name'=>"Users",
                                'slug'=>'users',
                                'icon'=>'UsersIcon'
                            ],
                            [
                                'url'=>"/admin/physicians",
                                'name'=>"Physicians",
                                'slug'=>'physicians',
                                'icon'=>'UsersIcon'
                            ],
                            [
                                'url'=>"/settings",
                                'name'=>"Settings",
                                'slug'=>'settings',
                                'icon'=>'SettingsIcon'
                            ],
                        ];
                    }else{
                   		if(auth()->user()->email == "kojuri@vcathlab.com"){
                            return [
                                [
                                    'url' => "/dashboard/analytics",
                                    'name' => "Dashboard",
                                    'slug' => 'dashboard',
                                    'icon' => 'HomeIcon',
                                ],
                                [
                                    "url" => null,
                                    "name" => "MACE Risk",
                                    "icon" => "HomeIcon",
                                    "submenu" => [

                                        [
                                            'url' => "/mace_assesment",
                                            'name' => "MACE Calculator",
                                            'slug' => 'mace-assesment-calculator',
                                        ],

                                        [
                                            'url' => "/user/mace_assesments",
                                            'name' => "List",
                                            'slug' => 'mace-assesment-list',
                                        ],
                                    ],
                                ],
                                [
                                    "url" => null,
                                    "name" => "Echocardiography",
                                    "icon" => "HomeIcon",
                                    "submenu" => [

                                        [
                                            'url' => "/echocardiography",
                                            'name' => "Echo Calculator",
                                            'slug' => 'mace-assesment-calculator',
                                        ],

                                        [
                                            'url' => "/user/mace_assesments",
                                            'name' => "List",
                                            'slug' => 'mace-assesment-list',
                                        ],
                                    ],
                                ],

                                [
                                    "url" => null,
                                    "name" => "Non-Invasive FFR",
                                    // "icon"=> "ActivityIcon",
                                    "icon_url" => "/images/icons/niffr.png",
                                    "submenu" => [

                                        [
                                            "url" => '/user/niffr_cases/create',
                                            "name" => "New NiFFR Case",
                                            "icon" => "FileTextIcon",
                                            "slug" => "new-report",
                                        ],
                                        [
                                            "url" => "/user/niffr_cases",
                                            "name" => "List",
                                            "icon" => "FileTextIcon",
                                            "slug" => 'niffer-cases',
                                        ],
                                    ],
                                    [
                                        "url" => null,
                                        "name" => "Body Analyzer",
                                        // "icon"=> "ActivityIcon",
                                        "icon_url" => "/images/icons/niffr.png",
                                        "submenu" => [

                                            [
                                                "url" => '/user/niffr_cases/create',
                                                "name" => "New",
                                                "icon" => "FileTextIcon",
                                                "slug" => "new-report",
                                            ],
                                            [
                                                "url" => "/user/niffr_cases",
                                                "name" => "List",
                                                "icon" => "FileTextIcon",
                                                "slug" => 'niffer-cases',
                                            ],
                                        ],
                                    ],

                                    [
                                        'url' => "/profile",
                                        'name' => "Profile",
                                        'slug' => 'dashboard',
                                        'icon' => 'UserIcon',
                                    ],

                                ],
                                [
                                    "url" => null,
                                    "name" => "Body Analyzer",
                                    // "icon"=> "ActivityIcon",
                                    "icon_url" => "/images/icons/niffr.png",
                                    "submenu" => [

                                        [
                                            "url" => '/user/niffr_cases/create',
                                            "name" => "New ",
                                            "icon" => "FileTextIcon",
                                            "slug" => "new-report",
                                        ],
                                        [
                                            "url" => "/user/niffr_cases",
                                            "name" => "List",
                                            "icon" => "FileTextIcon",
                                            "slug" => 'niffer-cases',
                                        ],
                                    ],

                                ],
                                [
                                    "url" => null,
                                    "name" => "Cardiopulmonary",
                                    // "icon"=> "ActivityIcon",
                                    "icon_url" => "/images/icons/niffr.png",
                                    "submenu" => [

                                        [
                                            "url" => '/user/niffr_cases/create',
                                            "name" => "New",
                                            "icon" => "FileTextIcon",
                                            "slug" => "new-report",
                                        ],
                                        [
                                            "url" => "/user/niffr_cases",
                                            "name" => "List",
                                            "icon" => "FileTextIcon",
                                            "slug" => 'niffer-cases',
                                        ],
                                    ],
                                ],
                                [
                                    'url'=>"/profile",
                                    'name'=>"Profile",
                                    'slug'=>'dashboard',
                                    'icon'=>'UserIcon'
                                ],
                            ];
                        }else{
                        	     return [
                            [
                                'url'=>"/dashboard/analytics",
                                'name'=>"Dashboard",
                                'slug'=>'dashboard',
                                'icon'=>'HomeIcon'
                            ],

                            [
                                'url'=>"/user/patients",
                                'name'=>"Patients",
                                'slug'=>'patients',
                                'icon'=>'UsersIcon'
                            ],
                            [
                                "url"=> null,
                                "name"=> "NiFFR Cases",
                                // "icon"=> "ActivityIcon",
                                "icon_url"=> "/images/icons/niffr.png",
                                "submenu"=> [

                                  [
                                    "url"=> '/user/niffr_cases/create',
                                    "name"=> "New NiFFR Case",
                                    "icon"=> "FileTextIcon",
                                    "slug"=> "new-report",
                                  ],
                                  [
                                    "url"=> "/user/niffr_cases",
                                    "name"=> "List",
                                    "icon"=> "FileTextIcon",
                                    "slug"=> 'niffer-cases',
                                  ]
                                ]
                            ],
                            [
                                "url"=> null,
                                "name"=> "FFR CT Cases",
                                // "icon"=> "FileTextIcon",
                                "icon_url" => "/images/icons/ffr.png",
                                "submenu"=> [

                                  [
                                    "url"=> '/user/ffr_ct_cases/create',
                                    "name"=> "New FFR CT case",
                                    "icon"=> "FileTextIcon",
                                    "slug"=> "new-ffr-ct-case",
                                  ],
                                  [
                                    "url"=> "/user/ct_cases",
                                    "name"=> "FFR CT Cases",
                                    "icon"=> "FileTextIcon",
                                    "slug"=> 'ffr-ct-cases',
                                  ]
                                ]
                            ],


                            [
                                'url'=>"/complex_cases",
                                'name'=>"My Complex Cases",
                                'slug'=>'ffr-ct-cases',
                                'icon'=>'ListIcon'
                            ],
                            [
                                "url"=> null,
                                "name"=> "Tickets",
                                "icon"=> "MessageCircleIcon",
                                "submenu"=> [

                                  [
                                    "url"=> '/user/tickets',
                                    "name"=> "Tickets",
                                    "icon"=> "FileTextIcon",
                                    "slug"=> "new-report",
                                  ],
                                  [
                                    "url"=> "/user/tickets/create",
                                    "name"=> "New ticket",
                                    "icon"=> "FileTextIcon",
                                    "slug"=> 'niffer-cases',
                                  ]
                                ]
                            ],
                            [
                                'url'=>"/profile",
                                'name'=>"Profile",
                                'slug'=>'dashboard',
                                'icon'=>'UserIcon'
                            ],


                        ];
                        }
                    }
                }
            });
        });
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);

    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path($this->moduleName, 'Config/config.php') => config_path($this->moduleNameLower . '.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path($this->moduleName, 'Config/config.php'), $this->moduleNameLower
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/' . $this->moduleNameLower);

        $sourcePath = module_path($this->moduleName, 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ], ['views', $this->moduleNameLower . '-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/' . $this->moduleNameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
        } else {
            $this->loadTranslationsFrom(module_path($this->moduleName, 'Resources/lang'), $this->moduleNameLower);
        }
        $this->callAfterResolving('translator', function ($translator) {
            $translator->getLoader()->addJsonPath(module_path($this->moduleName, 'Resources/lang'));
        });
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        if (! app()->environment('production') && $this->app->runningInConsole()) {
            app(Factory::class)->load(module_path($this->moduleName, 'Database/factories'));
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (\Config::get('view.paths') as $path) {
            if (is_dir($path . '/modules/' . $this->moduleNameLower)) {
                $paths[] = $path . '/modules/' . $this->moduleNameLower;
            }
        }
        return $paths;
    }
}

