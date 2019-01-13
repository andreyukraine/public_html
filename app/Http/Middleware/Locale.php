<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\{
    App, Auth, Config, Request, Session
};


class Locale
{

    /*
    * Проверяет наличие корректной метки языка в текущем URL
    * Возвращает метку или значеие null, если нет метки
    */

    /**
     * Проверяет наличие корректной метки языка в текущем URL
     *
     * @return string|null
     */
    public static function getLocale()
    {
        $uri = Request::path(); //получаем URI

        $segmentsURI = explode('/',$uri); //делим на части по разделителю "/"

        //Проверяем метку языка  - есть ли она среди доступных языков
        if (!empty($segmentsURI[0]) && in_array($segmentsURI[0], config('app.locales'))) {
            return $segmentsURI[0];
        } else {
            return  null;
        }
    }
    /**
     * Устанавливает язык приложения в зависимости от метки языка из URL
     *
     * @param \Illuminate\Http\Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $uri = Request::path(); //получаем URI
        $segmentsURI = explode('/',$uri); //делим на части по разделителю "/"


        //для админки
        if ($segmentsURI[0] == 'admin') {
            if (Auth::check()) {
                if (Auth::user()->role == 1) {
                    $session_locale = Session::get('locale');
                    if (in_array($session_locale, Config::get('app.locales'))) {
                        $locale_admin = $session_locale;
                    } else {
                        $locale_admin = Config::get('app.locale');
                    }
                    App::setLocale($locale_admin);
                    return $next($request);
                }
            }
        }else{
            $locale = self::getLocale();
            if ($locale) {
                App::setLocale($locale);
            } else {
                App::setLocale(config('app.locale'));
                return $next($request);
            }

        }
        return $next($request);
    }
}
