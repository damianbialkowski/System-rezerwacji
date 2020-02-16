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

Route::get('/', 'HomeController@home')->name('home');
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

Route::group(['name' => 'admin.' ,'prefix' => 'admin' ,'middleware' => 'admin'],function(){

    Route::get('/','Admin\DashboardController@main');
    // admin - article
    Route::get('/article/create','Admin\ArticleController@create');
    Route::post('/article/create','Admin\ArticleController@store');
    Route::get('/article/index','Admin\ArticleController@index');
    Route::get('/article/show/{slug}','Admin\ArticleController@show');
    Route::get('/article/edit/{slug}','Admin\ArticleController@edit');
    Route::post('/article/edit/{slug}','Admin\ArticleController@update');
    Route::get('/article/destroy/{id}','Admin\ArticleController@destroy');

    // admin - category
    Route::get('/category/create','Admin\CategoryController@create');
    Route::post('/category/create','Admin\CategoryController@store');
    Route::get('/category/index','Admin\CategoryController@index');
    Route::get('/category/show/{slug}','Admin\CategoryController@show');
    Route::get('/category/edit/{slug}','Admin\CategoryController@edit');
    Route::post('/category/edit/{slug}','Admin\CategoryController@update');

    // admin - settings
    Route::get('/settings/website','Admin\SettingsController@editWebsite');
    Route::patch('/settings/website','Admin\SettingsController@updateWebsite');
    Route::get('/settings/account','Admin\SettingsController@editAccount');

    // admin - user
    Route::get('/user/create','Admin\UserController@create');
    Route::post('/user/create','Admin\UserController@store');
    Route::get('/user/index','Admin\UserController@index');
    Route::get('/user/edit/{id}','Admin\UserController@edit');
    Route::post('/user/edit/{id}','Admin\UserController@update');
});
