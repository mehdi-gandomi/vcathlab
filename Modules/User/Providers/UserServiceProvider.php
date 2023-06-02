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

            Iracode::initializeMenus(function(){

                if(auth()->check()){
                    if(auth()->user()->master){
                        return [

                            [
                                "url"=> null,
                                "name"=> "Automatic OBP",
                                "icon_url" => "/images/icons/aobp-icon.png",
                                "submenu"=> [


                                  [
                                    'url'=>"/aobp",
                                    'name'=>"AOBP Calculator",
                                    'slug'=>'aobp-calculator'
                                ],

                                [
                                    'url'=>"/user/aobp_calculations",
                                    'name'=>"List",
                                    'slug'=>'aobp-list'
                                ],
                                ]
                            ],

                            [
                                "url"=> null,
                                "name"=> "Carotic IMT Scan",
                                "icon_url" => "/images/icons/aobp-icon.png",
                                "submenu"=> [


                                  [
                                    'url'=>"/imt",
                                    'name'=>"IMT Calculator",
                                    'slug'=>'imt-calculator'
                                ],

                                [
                                    'url'=>"/user/imt_scans",
                                    'name'=>"List",
                                    'slug'=>'imt-list'
                                ],
                                ]
                            ],
                            [
                                "url"=> null,
                                "name"=> "ABPM",
                                "icon_url" => "/images/icons/aobp-icon.png",
                                "submenu"=> [


                                  [
                                    'url'=>"/abpm",
                                    'name'=>"ABPM Calculator",
                                    'slug'=>'abpm-calculator'
                                ],

                                [
                                    'url'=>"/user/abpm_calculations",
                                    'name'=>"List",
                                    'slug'=>'abpm-list'
                                ],
                                ]
                            ],
                            [
                                "url"=> null,
                                "name"=> "MACE Risk",
                                "icon_url" => "/images/icons/macerisk.png",
                                "submenu"=> [


                                  [
                                    'url'=>"/mace_assesment?renew=1",
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
                                "icon_url" => "/images/icons/echo.png",
                                "submenu"=> [


                                    [
                                        'url'=>"/echocardiography?renew=1",
                                        'name'=>"Echo Calculator",
                                        'slug'=>'mace-assesment-calculator'
                                    ],

                                    [
                                        'url' => "/user/echo_calculations",
                                        'name' => "List",
                                        'slug' => 'echo-calculations',
                                    ],
                                ]
                            ],
                            [
                                "url" => null,
                                "name" => "Computation Center",
                                "icon_url" => "/images/icons/computational-icon.png",
                                "submenu" => [

                                    [
                                        'url' => "/computation_center/assesment",
                                        'name' => "Assesment",
                                        'slug' => 'computaion_center-assesment',
                                    ],
                                    [
                                        'url' => "/computation_center/list",
                                        'name' => "List",
                                        'slug' => 'computaion_center-list',
                                    ]
                                ],
                            ],
                            [
                                "url" => null,
                                "name" => "Body Analyzer",
                                "icon" => "HomeIcon",
                                "submenu" => [

                                    [
                                        'url' => "/body_analyzer",
                                        'name' => "Analyzer",
                                        'slug' => 'body-analyzer',
                                    ],
                                    [
                                        'url' => "/user/body_compositions",
                                        'name' => "List",
                                        'slug' => 'body-analyzer-list',
                                    ],

                                ],
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
                                "name"=> "Angiography Risk",
                                "icon_url" => "/images/icons/angio.png",
                                "submenu"=> [


                                      [
                                    'url'=>"/angiography?renew=1",
                                        'name'=>"Angio Calculator",
                                        'slug'=>'angiography'
                                    ],

                                    [
                                        'url'=>"/user/angiographies",
                                        'name'=>"List",
                                        'slug'=>'angiography-list'
                                    ],
                                ]
                            ],
                            // [
                            //     "url"=> null,
                            //     "name"=> "FFR CT Cases",
                            //     // "icon"=> "FileTextIcon",
                            //     "icon_url" => "/images/icons/ffr.png",
                            //     "submenu"=> [
                            //         [
                            //             'url'=>"/admin/ct_cases",
                            //             'name'=>"Cases",
                            //             'slug'=>'admin-ct-cases',
                            //             'icon'=>'FileTextIcon'
                            //         ],

                            //     ]
                            // ],
                            // [
                            //     'url'=>"/admin/report",
                            //     'name'=>"Report",
                            //     'slug'=>'report',
                            //     'icon'=>'BookIcon'
                            // ],
                            // [
                            //     "url"=> null,
                            //     "name"=> "Tickets",
                            //     "icon"=> "MessageCircleIcon",
                            //     "submenu"=> [

                            //       [
                            //         "url"=> '/admin/tickets',
                            //         "name"=> "Tickets",
                            //         "icon"=> "FileTextIcon",
                            //         "slug"=> "new-report",
                            //       ],
                            //       [
                            //         "url"=> "/admin/tickets/create",
                            //         "name"=> "New ticket",
                            //         "icon"=> "FileTextIcon",
                            //         "slug"=> 'niffer-cases',
                            //       ]
                            //     ]
                            // ],
                            // [
                            //     "url"=> null,
                            //     "name"=> "Subsriptions",
                            //     "icon"=> "UsersIcon",
                            //     "submenu"=> [

                            //       [
                            //         "url"=> '/subscriptions/plans',
                            //         "name"=> "Plans",
                            //         "icon"=> "FileTextIcon",
                            //         "slug"=> "new-plan",
                            //       ]
                            //     ]
                            // ],
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
                   		if(in_array(auth()->user()->panel_type,[2,3,4,5,6])){
                            $menu=[
                                [
                                    'url' => "/dashboard/analytics",
                                    'name' => "Dashboard",
                                    'slug' => 'dashboard',
                                    'icon' => 'HomeIcon',
                                ],
                                [
                                    "url"=> null,
                                    "name"=> "ABPM",
                                    "icon_url" => "/images/icons/aobp-icon.png",
                                    "submenu"=> [


                                      [
                                        'url'=>"/abpm",
                                        'name'=>"ABPM Calculator",
                                        'slug'=>'abpm-calculator'
                                    ],

                                    [
                                        'url'=>"/user/abpm_calculations",
                                        'name'=>"List",
                                        'slug'=>'abpm-list'
                                    ],
                                    ]
                                ],

                            [
                                "url"=> null,
                                "name"=> "Carotic IMT Scan",
                                "icon_url" => "/images/icons/aobp-icon.png",
                                "submenu"=> [


                                  [
                                    'url'=>"/imt",
                                    'name'=>"IMT Calculator",
                                    'slug'=>'imt-calculator'
                                ],

                                [
                                    'url'=>"/user/imt_scans",
                                    'name'=>"List",
                                    'slug'=>'imt-list'
                                ],
                                ]
                            ],
                            ];

                            if(auth()->user()->mace_access){
                                $menu[]=[
                                    "url" => null,
                                    "name" => "MACE Risk",
                                    "icon_url" => "/images/icons/macerisk.png",
                                    "submenu" => [

                                        [
                                            'url' => "/mace_assesment?renew=1",
                                            'name' => "MACE Calculator",
                                            'slug' => 'mace-assesment-calculator',
                                        ],

                                        [
                                            'url' => "/user/mace_assesments",
                                            'name' => "List",
                                            'slug' => 'mace-assesment-list',
                                        ],
                                    ],
                                ];
                            }
                            if(auth()->user()->echo_access){
                                $menu[]=[
                                    "url" => null,
                                    "name" => "Echocardiography",
                                    "icon_url" => "/images/icons/echo.png",
                                    "submenu" => [

                                        [
                                            'url' => "/echocardiography?renew=1",
                                            'name' => "Echo Calculator",
                                            'slug' => 'mace-assesment-calculator',
                                        ],

                                        [
                                            'url' => "/user/echo_calculations",
                                            'name' => "List",
                                            'slug' => 'echo-calculations',
                                        ],
                                    ],
                                ];
                            }
                            // if(auth()->user()->echo_access){
                            //     $menu[]=[
                            //         "url" => null,
                            //         "name" => "Echocardiography",
                            //         "icon_url" => "/images/icons/echo.png",
                            //         "submenu" => [

                            //             [
                            //                 'url' => "/echocardiography?renew=1",
                            //                 'name' => "Echo Calculator",
                            //                 'slug' => 'mace-assesment-calculator',
                            //             ],

                            //             [
                            //                 'url' => "/user/echo_calculations",
                            //                 'name' => "List",
                            //                 'slug' => 'echo-calculations',
                            //             ],
                            //         ],
                            //     ];
                            // }
                            $menu[]=[
                                "url" => null,
                                "name" => "Body Analyzer",
                                "icon" => "HomeIcon",
                                "submenu" => [

                                    [
                                        'url' => "/body_analyzer",
                                        'name' => "Analyzer",
                                        'slug' => 'body-analyzer',
                                    ],
                                    [
                                        'url' => "/user/body_compositions",
                                        'name' => "List",
                                        'slug' => 'body-analyzer-list',
                                    ],
                                ],
                            ];
                            $menu[]= [
                                "url"=> null,
                                "name"=> "Automatic OBP",
                                "icon_url" => "/images/icons/aobp-icon.png",
                                "submenu"=> [


                                  [
                                    'url'=>"/aobp",
                                    'name'=>"AOBP Calculator",
                                    'slug'=>'aobp-calculator'
                                ],

                                [
                                    'url'=>"/user/aobp_calculations",
                                    'name'=>"List",
                                    'slug'=>'aobp-list'
                                ],
                                ]
                            ];
                            if(auth()->user()->ffr_access){
                                $menu[]=[
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
                                    ]
                                ];
                            }
                            if(auth()->user()->ct_access){
                                $menu[]=[
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
                                      ];
                            }
                            $menu[]=[
                                'url' => "/profile",
                                'name' => "Profile",
                                'slug' => 'dashboard',
                                'icon' => 'UserIcon',
                            ];
                            $menu[]= [
                                "url" => null,
                                "name" => "Computation Center",
                                "icon_url" => "/images/icons/computational-icon.png",
                                "submenu" => [

                                    [
                                        'url' => "/computation_center/assesment",
                                        'name' => "Assesment",
                                        'slug' => 'computaion_center-assesment',
                                    ],
                                    [
                                        'url' => "/computation_center/list",
                                        'name' => "List",
                                        'slug' => 'computaion_center-list',
                                    ]
                                ],
                            ];
                            $menu[]=[
                                "url"=> null,
                                "name"=> "Angiography Risk",
                                "icon_url" => "/images/icons/angio.png",
                                "submenu"=> [


                                      [
                                    'url'=>"/angiography?renew=1",
                                        'name'=>"Angio Calculator",
                                        'slug'=>'angiography'
                                    ],

                                    [
                                        'url'=>"/user/angiographies",
                                        'name'=>"List",
                                        'slug'=>'angiography-list'
                                    ],
                                ]
                            ];
                            return $menu;
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
                                "url" => null,
                                "name" => "Computation Center",
                                "icon_url" => "/images/icons/computational-icon.png",
                                "submenu" => [

                                    [
                                        'url' => "/computation_center/assesment",
                                        'name' => "Assesment",
                                        'slug' => 'computaion_center-assesment',
                                    ],
                                    [
                                        'url' => "/computation_center/list",
                                        'name' => "List",
                                        'slug' => 'computaion_center-list',
                                    ]
                                ],
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

