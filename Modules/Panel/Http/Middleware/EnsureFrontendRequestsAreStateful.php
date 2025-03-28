<?php

namespace Modules\Panel\Http\Middleware;

use Illuminate\Routing\Pipeline;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class EnsureFrontendRequestsAreStateful
{
    /**
     * Handle the incoming requests.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  callable  $next
     * @return \Illuminate\Http\Response
     */
    public function handle($request, $next)
    {
        if($request->bearerToken()) return $next($request);
        $this->configureSecureCookieSessions();
        return (new Pipeline(app()))->send($request)->through([
            function ($request, $next) {
                $request->attributes->set('sanctum', true);
                return $next($request);
            },
            config('sanctum.middleware.encrypt_cookies', \Illuminate\Cookie\Middleware\EncryptCookies::class),
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // config('sanctum.middleware.verify_csrf_token', \Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class),
        ])->then(function ($request) use ($next) {
            return $next($request);

        });
    }

    /**
     * Configure secure cookie sessions.
     *
     * @return void
     */
    protected function configureSecureCookieSessions()
    {
        config([
            'session.http_only' => true,
            'session.same_site' => 'lax',
        ]);
    }

    /**
     * Determine if the given request is from the first-party application frontend.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    public static function fromFrontend($request)
    {
        return true;
        $domain = $request->headers->get('referer') ?: $request->headers->get('origin');

        $domain = Str::replaceFirst('https://', '', $domain);
        $domain = Str::replaceFirst('http://', '', $domain);
        $domain = Str::endsWith($domain, '/') ? $domain : "{$domain}/";

        $stateful = array_filter(config('sanctum.stateful', []));

        return Str::is(Collection::make($stateful)->map(function ($uri) {
            return trim($uri).'/*';
        })->all(), $domain);
    }
}
