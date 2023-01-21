
    <script>
        window.translations=({!! json_encode(\Modules\Panel\Iracode::allTranslations()) !!})
        window.vuexy={!! json_encode(config("panel.vuexy")) !!};
        window.menus=@json(\Modules\Panel\Iracode::getMenus());
        window.config = @json(\Modules\Panel\Iracode::jsonVariables(request()));
        @if (auth()->check())
            @if (\Schema::hasTable("notifications") )
                window.notifications=@json(auth()->user()->notifications);
            @else
                window.notifications=[];
            @endif
        @endif
    </script>
