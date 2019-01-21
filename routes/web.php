<?php
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;

Route::get('/', function () {
    return redirect('/'. config('app.locale'));
});

//Переключение языков
Route::get('setlocale/{lang}', function ($lang) {

    $referer = Redirect::back()->getTargetUrl(); //URL предыдущей страницы
    $parse_url = parse_url($referer, PHP_URL_PATH); //URI предыдущей страницы

    //разбиваем на массив по разделителю
    $segments = explode('/', $parse_url);

    //Если URL (где нажали на переключение языка) содержал корректную метку языка
    if (in_array($segments[1], config('app.locales'))) {
        unset($segments[1]); //удаляем метку
    }

    //Добавляем метку языка в URL (если выбран не язык по-умолчанию)
    if ($lang != config('app.locale')){
        array_splice($segments, 1, 0, $lang);
    }

    //формируем полный URL
    $url = Request::root().implode("/", $segments);

    //если были еще GET-параметры - добавляем их
    if(parse_url(urldecode($referer), PHP_URL_QUERY)){
        $url = $url.'?'. parse_url(urldecode($referer), PHP_URL_QUERY);
    }
    return redirect($url); //Перенаправляем назад на ту же страницу

})->name('setlocale');

Route::group(['prefix' => App\Http\Middleware\Locale::getLocale()], function() {


    Route::get('export', ['uses' => 'Tools\ToolsController@createFile', 'as' => 'createFile']);
    Route::post('export', ['uses' => 'Tools\ToolsController@exportFile', 'as' => 'exportFile']);

    /**
     * Роуты аутентификации...
     */

    //отображение формы аутентификации
    Route::get('goblin', 'Auth\LoginController@showLoginForm')->name('goblin');
    //POST запрос аутентификации на сайте
    Route::post('goblin', 'Auth\LoginController@login');
    //POST запрос на выход из системы (логаут)
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    /**
     * Маршруты регистрации...
     */

    //страница с формой Laravel регистрации пользователей
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    //POST запрос регистрации на сайте
    Route::post('register', 'Auth\RegisterController@register');

    /**
     * URL для сброса пароля...
     */

    //POST запрос для отправки email письма пользователю для сброса пароля
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    //ссылка для сброса пароля (можно размещать в письме)
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    //страница с формой для сброса пароля
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    //POST запрос для сброса старого и установки нового пароля
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');


    //Route::get('sitemap', 'SitemapController@index');
    Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home']);




    //СТРАНИЦЫ
    Route::group(['prefix' => 'pages'], function () {
        Route::get('/{url}', ['as' => 'pages', 'uses' => 'Pages\PagesController@show']);

    });
    Route::get('shops', ['uses' => 'PartnersController@index', 'as' => 'shops']);

    //Route::get('contact', function () { return view('site.content.contact');})->name('contact');
    //Route::get('about', function () { return view('site.content.about');})->name('about');

    Route::post('send', ['uses' => 'HomeController@index', 'as' => 'post_home']);
    Route::get('send', ['uses' => 'HomeController@index', 'as' => 'get_home']);

    Route::get('/logout', function () {
        \Auth::logout();
        return redirect(route('login'));
    })->name('logout');


    Route::get('filter', ['uses' => 'Catalog\ProductController@filter', 'as' => 'product_filter_home']);

    //БЛОГ
    Route::group(['prefix' => 'blog'], function () {
        Route::get('/{id}', ['as' => 'post', 'uses' => 'Blog\BlogController@show']);
        Route::get('/', ['as' => 'blog', 'uses' => 'Blog\BlogController@index']);
    });

    //КАТАЛОГ
    Route::group(['prefix' => 'catalog'], function () {
        Route::get('/{category}/{product}', ['as' => 'products_show', 'uses' => 'Catalog\ProductController@show']);
        Route::get('/{category}', ['as' => 'category_url', 'uses' => 'Catalog\CategoryController@show']);
        Route::post('/', ['uses' => 'Catalog\ProductController@index', 'as' => 'product_filter']);
        Route::get('/', ['uses' => 'Catalog\ProductController@index', 'as' => 'product_catalog']);
    });


    Route::post('/ajax', 'Catalog\ProductController@index');

//для всех авторизированxых
    Route::group(['middleware' => 'auth'], function () {
        Route::post('/user_ajax', ['uses' => 'Users\UsersController@show', 'as' => 'user.ajax']);
    });

//для пользователей
    Route::group(['middleware' => 'users'], function () {
        Route::get('/users', ['uses' => 'Users\UsersController@show', 'as' => 'user.panel']);
    });

//для алминов
    Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {


        //localization
        Route::post('/loc', ['uses' => 'HomeController@setlocale']);

        //НАСТРОЙКИ
        Route::post('/settings', ['uses' => 'SettingController@store', 'as' => 'admin.settings.store']);
        Route::get('/settings', ['uses' => 'SettingController@index', 'as' => 'admin.settings']);

        Route::get('/index', ['uses' => 'Admin\AdminController@show', 'as' => 'admin_panel']);
        Route::get('/admin_users', ['uses' => 'Users\UsersController@index', 'as' => 'admin.users']);
        Route::get('/users_create', ['uses' => 'Users\UsersController@create', 'as' => 'admin.users.create']);
        Route::post('/users_create', ['uses' => 'Users\UsersController@store', 'as' => 'admin.users.store']);
        Route::resource('category', 'Catalog\CategoryController');
        Route::resource('products', 'Catalog\ProductController');
        Route::resource('slider', 'Slider\SliderController');
        Route::resource('blog', 'Blog\BlogController');
        Route::resource('values', 'Catalog\ValueController');
        Route::resource('pages', 'Pages\PagesController');
        //Route::resource('partners', 'PartnersController');

        //PAGES
        Route::group(['prefix' => 'pages'], function () {
            Route::get('/', ['as' => 'pages.admin', 'uses' => 'Pages\PagesController@admin']);
        });

        //ПАРТНЕРЫ
        Route::get('partners', ['uses' => 'PartnersController@admin', 'as' => 'partners.admin']);
        Route::get('/partners_create', ['uses' => 'PartnersController@create', 'as' => 'partners.create']);
        Route::get('/{id}/edit', ['uses' => 'PartnersController@edit', 'as' => 'partners.edit']);
        Route::put('/{id}/edit', ['uses' => 'PartnersController@update', 'as' => 'partners.update']);
        Route::post('/users_create', ['uses' => 'PartnersController@store', 'as' => 'partners.store']);

        //БЛОГ
        Route::group(['prefix' => 'blog'], function () {
            Route::get('/', ['as' => 'blog.index', 'uses' => 'Blog\BlogController@admin']);
            Route::post('/{id}/edit/del_img', ['uses' => 'Blog\BlogController@del_images', 'as' => 'del_img']);
        });

        //СВОЙСТВА
        Route::post('add_value', ['uses' => 'Catalog\ValueController@addValuesOption', 'as' => 'admin.value.add']);
        Route::post('add_value_img', ['uses' => 'Catalog\ValueController@addValuesOption', 'as' => 'admin.value_img.add']);
        Route::post('del_value', ['uses' => 'Catalog\ValueController@delValuesOption', 'as' => 'admin.value.del']);
        Route::post('edit_value', ['uses' => 'Catalog\ValueController@editValuesOption', 'as' => 'admin.value.edit']);

        Route::get('tools', ['uses' => 'Tools\ToolsController@index', 'as' => 'tools']);
        Route::post('import', ['uses' => 'Tools\ToolsController@importExcel', 'as' => 'import']);

        Route::get('products', ['uses' => 'Catalog\ProductController@admin', 'as' => 'products.admin']);
        Route::post('ajax/products', ['uses' => 'Catalog\ProductController@admin', 'as' => 'products.admin.ajax']);
        Route::post('products', ['uses' => 'Catalog\ProductController@store', 'as' => 'products.store']);
        Route::get('category', ['uses' => 'Catalog\CategoryController@admin', 'as' => 'category.admin']);
        Route::post('products/{id}/edit/del_img', ['uses' => 'Catalog\ProductController@del_images', 'as' => 'del_img_product']);

        Route::resource('options', 'Catalog\OptionController');
        Route::get('delete_option/{id}', ['uses' => 'Catalog\OptionController@destroy', 'as' => 'delete.option']);
        Route::get('delete_products/{id}', ['uses' => 'Catalog\ProductController@destroy', 'as' => 'delete.products']);
        Route::get('delete_slider/{id}', ['uses' => 'Slider\SliderController@destroy', 'as' => 'delete.slider']);
        Route::get('delete_category/{id}', ['uses' => 'Catalog\CategoryController@destroy', 'as' => 'delete.category']);
        Route::get('delete_pages/{id}', ['uses' => 'Pages\PagesController@destroy', 'as' => 'delete.pages']);
        Route::get('delete_partner/{id}', ['uses' => 'PartnersController@destroy', 'as' => 'delete.partner']);
    });

});



