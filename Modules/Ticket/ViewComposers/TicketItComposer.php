<?php

namespace Modules\Ticket\ViewComposers;

use Modules\Ticket\Controllers\ToolsController;
use Modules\Ticket\Helpers\EditorLocale;
use Modules\Ticket\Models\Agent;
use Modules\Ticket\Models\Setting;

class TicketItComposer
{
    public static function settings(&$u)
    {
        view()->composer('ticket::*', function ($view) use (&$u) {
            if (auth()->check()) {
                if ($u === null) {
                    $u = Agent::find(auth()->user()->id);
                }
                $view->with('u', $u);
            }
            $setting = new Setting();
            $view->with('setting', $setting);
        });
    }

    public static function general()
    {
        // Passing to views the master view value from the setting file
        view()->composer('ticket::*', function ($view) {
            $tools = new ToolsController();
            $master = Setting::grab('master_template');
            $email = Setting::grab('email.template');
            $view->with(compact('master', 'email', 'tools'));
        });
    }

    public static function codeMirror()
    {
        // Passing to views the master view value from the setting file
        view()->composer('ticket::*', function ($view) {
            $editor_enabled = Setting::grab('editor_enabled');
            $codemirror_enabled = Setting::grab('editor_html_highlighter');
            $codemirror_theme = Setting::grab('codemirror_theme');
            $view->with(compact('editor_enabled', 'codemirror_enabled', 'codemirror_theme'));
        });
    }

    public static function summerNotes()
    {
        view()->composer('ticket::tickets.partials.summernote', function ($view) {

            $editor_locale = EditorLocale::getEditorLocale();
            $editor_options = file_get_contents(base_path(Setting::grab('summernote_options_json_file')));

            $view->with(compact('editor_locale', 'editor_options'));
        });
    }

    public static function sharedAssets()
    {
        //inlude font awesome css or not
        view()->composer('ticket::shared.assets', function ($view) {
            $include_font_awesome = Setting::grab('include_font_awesome');
            $view->with(compact('include_font_awesome'));
        });
    }
}
