<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect' ]
    ],
    function()
    {

/*        Route::get('/page/{slug}', ['as' => 'page', 'uses' => 'IndexController@page', function ($slug) {
            //
            }
        ]);*/

        Route::get('category/{slug}', [
            'as' => 'category', 'uses' => 'CategoriesController@category', function ($slug) {
            //
        }]);

        Route::get('categories/{slug?}', [
            'as' => 'categories', 'uses' => 'CategoriesController@categories', function ($slug) {
            //
        }]);

        Route::get('search', [
            'as' => 'search', 'uses' => 'CategoriesController@search'
        ]);

/*        Route::get(LaravelLocalization::transRoute('routes.page'),['as' => 'page', 'uses' => 'IndexController@page'],function($slug){

        });*/

        Route::get(LaravelLocalization::transRoute('routes.home'),[ 'as' => 'home', 'uses' => 'IndexController@index', function(){

        }]);

        Route::get(LaravelLocalization::transRoute('routes.page'),[ 'as' => 'page', 'uses' => 'IndexController@page', function($slug=null){

        }]);
        Route::get(LaravelLocalization::transRoute('routes.about'),[ 'as' => 'about', 'uses' => 'IndexController@about', function(){

        }]);
        Route::get(LaravelLocalization::transRoute('routes.blog'),[ 'as' => 'blog', 'uses' => 'IndexController@blog', function($slug=null){

        }]);

        Route::get(LaravelLocalization::transRoute('routes.expired'),[ 'as' => 'expired', 'uses' => 'IndexController@expired', function(){

        }]);

        Route::get(LaravelLocalization::transRoute('routes.new_products'),[ 'as' => 'new_products', 'uses' => 'IndexController@new_products', function(){

        }]);
        Route::get(LaravelLocalization::transRoute('routes.contact'),[ 'as' => 'contact', 'uses' => 'IndexController@contact', function(){

        }]);
        Route::get(LaravelLocalization::transRoute('routes.collaboration'),[ 'as' => 'collaboration', 'uses' => 'IndexController@collaboration', function(){

        }]);
        Route::get(LaravelLocalization::transRoute('routes.support'),[ 'as' => 'support', 'uses' => 'IndexController@support', function(){

        }]);
        Route::get(LaravelLocalization::transRoute('routes.categories'),[ 'as' => 'categories', 'uses' => 'CategoriesController@categories', function($slug=null){

        }]);
    }
);

Route::get(LaravelLocalization::transRoute('routes.product'),[ 'as' => 'product', 'uses' => 'CategoriesController@product', function($slug=null){

}]);
Route::get(LaravelLocalization::transRoute('routes.seller'),[ 'as' => 'seller', 'uses' => 'CategoriesController@seller', function($slug=null){

}]);

/*Route::get(LaravelLocalization::transRoute('routes.addseller'),[ 'as' => 'addseller', 'uses' => 'SellerController@addseller', function(){

}]);*/

Route::resource('addseller', 'SellerController');

Route::post('subscribe',[ 'as' => 'subscribe', 'uses' => 'NewsletterController@subscribe', function(){

}]);
Route::post('sendform',[ 'as' => 'sendform', 'uses' => 'NewsletterController@sendform', function(){

}]);



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => ['web']], function () {
    /**
     * Route for auth system
     */
    // Вызов страницы регистрации пользователя
    Route::get('admin/translations', ['as' => 'settings.languages', 'uses' => '\Barryvdh\TranslationManager\Controller@getIndex']);

    Route::get('admin/translations/view/{group}', ['as' => 'settings.languages.view', 'uses' => '\Barryvdh\TranslationManager\Controller@getView']);

    Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);
    Route::get('register', 'AuthController@register');
    // Пользователь заполнил форму регистрации и отправил
    Route::post('register', 'AuthController@registerProcess');
    // Пользователь получил письмо для активации аккаунта со ссылкой сюда
    Route::get('activate/{id}/{code}', 'AuthController@activate');
    // Вызов страницы авторизации
    Route::get('login', 'AuthController@login');
    // Пользователь заполнил форму авторизации и отправил
    Route::post('login', 'AuthController@loginProcess');
    // Выход пользователя из системы
    Route::get('logout', 'AuthController@logoutuser');
    // Пользователь забыл пароль и запросил сброс пароля. Это начало процесса -
    // Страница с запросом E-Mail пользователя
    Route::get('reset', 'AuthController@resetOrder');
    // Пользователь заполнил и отправил форму с E-Mail в запросе на сброс пароля
    Route::post('reset', 'AuthController@resetOrderProcess');
    // Пользователю пришло письмо со ссылкой на эту страницу для ввода нового пароля
    Route::get('reset/{id}/{code}', 'AuthController@resetComplete');
    // Пользователь ввел новый пароль и отправил.
    Route::post('reset/{id}/{code}', 'AuthController@resetCompleteProcess');
    // Сервисная страничка, показываем после заполнения рег формы, формы сброса и т.
    // о том, что письмо отправлено и надо заглянуть в почтовый ящик.
    Route::get('wait', 'AuthController@wait');

    Route::get('attaches/{date}/{filename}', function ($date,$filename) {
        return Storage::get('attaches/'.$date.'/'.$filename);
    });

    Route::get('attaches/{dateImg}/{filename}/{width}/{height}/{type?}/{anchor?}', 'ImageController@whResize');
    Route::get('attaches/{dateImg}/{filename}/', 'ImageController@fullImage');
});

