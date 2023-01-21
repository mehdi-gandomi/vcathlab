<?php
namespace Modules\Panel;
use BadMethodCallException;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Laravel\Nova\Events\ServingNova;
use Modules\Panel\Events\ServingIracode;
use Facades\Modules\Panel\Entities\TranslationLoader;
use Illuminate\Support\Facades\Cookie;
class Iracode{


    /**
     * Indicates if Nova is being used to reset passwords.
     *
     * @var bool
     */
    public static $resetsPasswords = false;


    /**
     * All of the registered Nova tool scripts.
     *
     * @var array
     */
    public static $scripts = [];

        /**
     * All of the registered Nova tool scripts.
     *
     * @var array
     */
    public static $bottomScripts = [];

    /**
     * All of the registered Nova tool CSS.
     *
     * @var array
     */
    public static $styles = [];

       /**
     * All of the registered Nova tool static files.
     *
     * @var array
     */
    public static $staticFiles = [];

        /**
     * Name of the domain in which all string-translation should be stored under.
     * More about string-translation: https://laravel.com/docs/master/localization#retrieving-translation-strings
     *
     * @var string
     */
    public static $stringsDomain = 'strings';

    /**
     * The variables that should be made available on the Nova JavaScript object.
     *
     * @var array
     */
    public static $jsonVariables = [];

    /**
     * The variables that should be made available on the Nova JavaScript object.
     *
     * @var array
     */
    public static $menus = [];


    /**
     * The translations that should be made available on the Nova JavaScript object.
     *
     * @var array
     */
    public static $translations = [];

    /**
     * The callback used to sort Nova resources in the sidebar.
     *
     * @var \Closure
     */
    public static $sortCallback;

    /**
     * Get the current Nova version.
     *
     * @return string
     */
    public static function version()
    {
        return '3.5.0';
    }
    public static function __constructStatic()
    {
        // if(Cookie::has("locale")) app()->setLocale(Cookie::get("locale"));
        // if(Cookie::has("locale")) dd(decrypt(request()->cookie("locale")));
        static::folderTranslation(\resource_path("lang"));
        static::$jsonVariables = [
            'base' => url('/'),
            'app_name'=>config('app.name'),
            'locale'=>app()->getLocale(),
            'userId' => Auth::id() ?? null,
            "cache_menus"=>env('CACHE_MENUS'),
            "uploadBasePath"=>config('ajaxupload.base_api_path'),
            "path_prefix"=>config('panel.path_prefix'),
            "panel_url"=>config('panel.path_prefix'),
            "root_url"=>url('/'),
            'login_url'=>config("fortify.path")."/login"
        ];
        return new static;
    }
    /**
     * Get the app name utilized by Nova.
     *
     * @return string
     */
    public static function name()
    {
        return config('nova.name', 'Nova Site');
    }

    /**
     * Get the URI path prefix utilized by Nova.
     *
     * @return string
     */
    public static function path()
    {
        return config('panel.path_prefix', '/admin');
    }


    /**
     * Register an event listener for the Nova "serving" event.
     *
     * @param  \Closure|string  $callback
     * @return void
     */
    public static function serving($callback)
    {
        Event::listen(ServingIracode::class, $callback);
    }

    // /**
    //  * Get meta data information about all resources for client side consumption.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return array
    //  */
    // public static function resourceInformation(Request $request)
    // {
    //     return static::resourceCollection()->map(function ($resource) use ($request) {
    //         return array_merge([
    //             'uriKey' => $resource::uriKey(),
    //             'label' => $resource::label(),
    //             'singularLabel' => $resource::singularLabel(),
    //             'authorizedToCreate' => $resource::authorizedToCreate($request),
    //             'searchable' => $resource::searchable(),
    //             'perPageOptions' => $resource::perPageOptions(),
    //         ], $resource::additionalInformation($request));
    //     })->values()->all();
    // }


    // /**
    //  * Get the resources available for the given request.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return array
    //  */
    // public static function globallySearchableResources(Request $request)
    // {
    //     return static::authorizedResources($request)
    //         ->searchable()
    //         ->sortBy(static::sortResourcesWith())
    //         ->all();
    // }


    /**
     * Set the callable that resolves the user's preferred timezone.
     *
     * @param  callable  $userTimezoneCallback
     * @return static
     */
    public static function userTimezone($userTimezoneCallback)
    {
        static::$userTimezoneCallback = $userTimezoneCallback;

        return new static;
    }

    /**
     * Resolve the user's preferred timezone.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public static function resolveUserTimezone(Request $request)
    {
        if (static::$userTimezoneCallback) {
            return call_user_func(static::$userTimezoneCallback, $request);
        }
    }


    /**
     * Get all of the additional scripts that should be registered.
     *
     * @return array
     */
    public static function allScripts()
    {
        return static::$scripts;
    }

        /**
     * Get all of the additional scripts that should be registered.
     *
     * @return array
     */
    public static function allBottomScripts()
    {
        return static::$bottomScripts;
    }


    /**
     * Get all of the available scripts that should be registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public static function availableScripts(Request $request)
    {
        return static::$scripts;
    }

    /**
     * Get all of the additional stylesheets that should be registered.
     *
     * @return array
     */
    public static function allStyles()
    {
        return static::$styles;
    }

    /**
     * Get all of the available stylesheets that should be registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public static function availableStyles(Request $request)
    {
        return static::$styles;
    }


    /**
     * Register the given script file with Nova.
     *
     * @param  string  $name
     * @param  string  $path
     * @return static
     */
    public static function script($name, $path,$showInPanel=true)
    {
        static::$scripts[$name] = [
            'path'=>$path,
            'show_in_panel'=>$showInPanel
        ];

        return new static;
    }


    /**
     * Register the given script file with Nova.
     *
     * @param  string  $name
     * @param  string  $path
     * @return static
     */
    public static function addMenu($name, $path,$showInPanel=true)
    {
        static::$scripts[$name] = [
            'path'=>$path,
            'show_in_panel'=>$showInPanel
        ];

        return new static;
    }

    /**
     * Register the given script file with Nova.
     *
     * @param  string  $name
     * @param  string  $path
     * @return static
     */
    public static function initializeMenus($menus)
    {
        if(is_callable($menus)){
            static::$menus=$menus();
            return new static;
        }
        static::$menus=$menus;
        return new static;
    }


    /**
     * Register the given script file with Nova.
     *
     * @param  string  $name
     * @param  string  $path
     * @return static
     */
    public static function getMenus()
    {
        return static::$menus;
    }
    /**
     * Register the given script file with Nova.
     *
     * @param  string  $name
     * @param  string  $path
     * @return static
     */
    public static function bottomScript($name, $path,$showInPanel=true)
    {
        static::$bottomScripts[$name] = [
            'path'=>$path,
            'show_in_panel'=>$showInPanel
        ];

        return new static;
    }

      /**
     * Register the given static file with Nova.
     *
     * @param  string  $name
     * @param  string  $path
     * @return static
     */
    public static function staticFile($name, $path,$showInPanel=true)
    {
        static::$staticFiles[$name] = [
            'path'=>$path,
            'show_in_panel'=>$showInPanel
        ];

        return new static;
    }

          /**
     * Register the given static file with Nova.
     *
     * @param  string  $name
     * @param  string  $path
     * @return static
     */
    public static function allStaticFiles()
    {
        return static::$staticFiles;
    }
    /**
     * Register the given remote script file with Nova.
     *
     * @param  string  $path
     * @return static
     */
    public static function remoteScript($path)
    {
        static::$scripts[md5($path)] = $path;

        return new static;
    }

    /**
     * Register the given CSS file with Nova.
     *
     * @param  string  $name
     * @param  string  $path
     * @return static
     */
    public static function style($name, $path,$showInPanel=true)
    {
        static::$styles[$name] = [
            'path'=>$path,
            'show_in_panel'=>$showInPanel
        ];;

        return new static;
    }


    /**
     * Register the given translations with Nova.
     *
     * @param  array|string  $translations
     * @return static
     */
    public static function translations($translations,$locale,$customPath="")
    {
        if (is_string($translations)) {
            if (! is_readable($translations)) {
                return new static;
            }

            $translations = json_decode(file_get_contents($translations), true);
        }
        if(!isset(static::$translations[$locale.".".static::$stringsDomain])) static::$translations[$locale.".".static::$stringsDomain]=[];
        if($customPath){
            static::$translations[$locale.".".static::$stringsDomain.".".$customPath] = array_merge(static::$translations[$locale.".".static::$stringsDomain], $translations);
        }else{
            static::$translations[$locale.".".static::$stringsDomain] = array_merge(static::$translations[$locale.".".static::$stringsDomain], $translations);
        }
        return new static;
    }

    /**
     * Register the given translations with Nova.
     *
     * @param  array|string  $translations
     * @return static
     */
    public static function laravelTranslations($translations,$locale,$customPath="")
    {
        if (is_string($translations)) {
            if (! is_readable($translations)) {
                return new static;
            }
            $translations = json_decode(file_get_contents($translations), true);
        }
        $path=$locale;
        if($customPath) $path.=".".$customPath;
        Arr::set(static::$translations,$path,$translations);
        return new static;
    }
    /**
     * Get all of the additional translations that should be loaded.
     *
     * @return array
     */
    public static function allTranslations()
    {
        return static::$translations;
    }

    public static function getTranslation($key,$default="",$customPath="")
    {
        $path=app()->getLocale().".".$key;

        if(Arr::has(static::$translations,$path)){
            return Arr::get(static::$translations,$path);
        }
        $path=app()->getLocale().".strings.".$key;
        if(Arr::has(static::$translations,$path)){
            return Arr::get(static::$translations,$path);
        }
        return $default ? $default:$key;
    }

    /**
     * Get the JSON variables that should be provided to the global Nova JavaScript object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public static function jsonVariables(Request $request)
    {
        return collect(static::$jsonVariables)->map(function ($variable) use ($request) {
            return is_callable($variable) ? $variable($request) : $variable;
        })->all();
    }

    /**
     * Provide additional variables to the global Nova JavaScript object.
     *
     * @param  array  $variables
     * @return static
     */
    public static function provideToScript(array $variables)
    {
        static::$jsonVariables = array_merge(static::$jsonVariables, $variables);

        return new static;
    }


    /**
     * Humanize the given value into a proper name.
     *
     * @param  string  $value
     * @return string
     */
    public static function humanize($value)
    {
        if (is_object($value)) {
            return static::humanize(class_basename(get_class($value)));
        }

        return Str::title(Str::snake($value, ' '));
    }


    /**
     * Dynamically proxy static method calls.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return void
     */
    public static function __callStatic($method, $parameters)
    {
        if (! property_exists(get_called_class(), $method)) {
            throw new BadMethodCallException("Method {$method} does not exist.");
        }
        return static::${$method};
    }


    /**
     * Register the callback used to sort Nova resources in the sidebar.
     *
     * @var \Closure
     *
     * @param \Closure $callback
     * @return static
     */
    public static function sortResourcesBy($callback)
    {
        static::$sortCallback = $callback;

        return new static;
    }

    /**
     * Get the sorting strategy to use for Nova resources.
     *
     * @return array
     */
    public static function sortResourcesWith()
    {
        return static::$sortCallback ?? function ($resource) {
            return $resource::label();
        };
    }
    public static function folderTranslation($path)
    {
        $messages=TranslationLoader::generateMultiple($path);
        foreach($messages as $key=>$translations){
            if(!isset(static::$translations[$key])) static::$translations[$key]=[];
            static::$translations[$key]=array_merge(static::$translations[$key],$translations);
        }
        return new static;
    }
    private static function getVendorKey($key)
    {
        $keyParts = explode('.', $key, 4);
        unset($keyParts[0]);

        return $keyParts[2] .'.'. $keyParts[1] . '::' . $keyParts[3];
    }
    public static function t($key,$default="",$customPath="")
    {
        return static::getTranslation($key,$default="",$customPath="");
    }
}
