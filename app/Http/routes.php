<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/cacheClear','AppController@cacheClear');
Route::get('/configClear','AppController@configClear');
// Route::get('/f',function(){
//     Artisan::call('storage:link');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/register','RegisterController@create');
// Route::get('/register',function(){
//     return redirect('/');
// });
Route::post('/register','RegisterController@store')->name('user.register');
Route::get('/login','LoginController@create');
Route::post('/login','LoginController@login')->name('user.login');
Route::get('/search','SearchController@search');
// Route::get('/newsletter/subscribe','NewsletterController@subscribe');

// Route::group(['middleware' => ['guest']],function(){
    
// });
Route::get('/logout','Auth\LoginController@logout')->name('user.logout');

Route::get('/article/{id},{slug}','ArticleController@show');
Route::get('/category/{id},{slug}','CategoryController@show');

Route::group(['middleware' => ['admin']],function(){

    Route::get('/admin','Admin\DashboardController@main');
    // admin - article
    Route::get('/admin/article/create','Admin\ArticleController@create');
    Route::post('/admin/article/create','Admin\ArticleController@store');
    Route::get('/admin/article/list','Admin\ArticleController@index');
    Route::get('/admin/article/show/{slug}','Admin\ArticleController@show');
    Route::get('/admin/article/edit/{slug}','Admin\ArticleController@edit');
    Route::post('/admin/article/edit/{slug}','Admin\ArticleController@update');
    Route::get('/admin/article/destroy/{id}','Admin\ArticleController@destroy');

    // admin - category
    Route::get('/admin/category/create','Admin\CategoryController@create');
    Route::post('/admin/category/create','Admin\CategoryController@store');
    Route::get('/admin/category/list','Admin\CategoryController@index');
    Route::get('/admin/category/show/{slug}','Admin\CategoryController@show');
    Route::get('/admin/category/edit/{slug}','Admin\CategoryController@edit');
    Route::post('/admin/category/edit/{slug}','Admin\CategoryController@update');

    // admin - settings
    Route::get('/admin/settings/website','Admin\SettingsController@editWebsite');
    Route::patch('/admin/settings/website','Admin\SettingsController@updateWebsite');
    Route::get('/admin/settings/account','Admin\SettingsController@editAccount');

    // admin - user
    Route::get('/admin/user/create','Admin\UserController@create');
    Route::post('/admin/user/create','Admin\UserController@store');
    Route::get('/admin/user/list','Admin\UserController@index');
    Route::get('/admin/user/edit/{id}','Admin\UserController@edit');
    Route::post('/admin/user/edit/{id}','Admin\UserController@update');
});

Route::get('/polityka-prywatnosci',function(){
    return view('pages.polityka-prywatnosci');
});