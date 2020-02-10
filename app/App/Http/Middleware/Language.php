<?php


namespace App\App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\App;

class Language
{

    public function handle($request, Closure $next)
    {
        $headers =  apache_request_headers();
        $default = config('app.locale');
        if (isset($headers['lang'])){
            if (in_array($headers['lang'],config('app.locales'))){
                $default = $headers['lang'];
            }
        }
        App::setLocale($default);
        return $next($request);

    }
}
