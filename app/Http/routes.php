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

Auth::routes();

Route::group(['namespace' => 'Front','name' => 'front.'], function () {
    Route::get('/', 'HomeController@home')->name('home');
    Route::get('/search','SearchController@search');
    Route::get('/article/{id},{slug}','ArticleController@show');
    Route::get('/category/{id},{slug}','CategoryController@show');
});

// Route::group(['name' => 'auth.', 'prefix' => 'auth'], function () {
//     Route::get('/register','RegisterController@create');
//     Route::post('/register','RegisterController@store')->name('register');
//     Route::get('/login','LoginController@create');
//     Route::post('/login','LoginController@login')->name('login');
// });


// Route::get('/register',function(){
//     return redirect('/');
// });

// Route::get('/newsletter/subscribe','NewsletterController@subscribe');

// Route::get('/logout','Auth\LoginController@logout')->name('user.logout');


Route::group(['namespace' => 'Admin','middleware' => 'admin','prefix' => 'admin'], function (){
    Route::get('/','DashboardController@main');
    // admin - article
    Route::get('/article/create','ArticleController@create');
    Route::post('/article/create','ArticleController@store');
    Route::get('/article/index','ArticleController@index');
    Route::get('/article/show/{id}','ArticleController@show');
    Route::get('/article/edit/{id}','ArticleController@edit');
    Route::post('/article/edit/{id}','ArticleController@update');
    Route::get('/article/destroy/{id}','ArticleController@destroy');

    // admin - category
    Route::get('/category/create','CategoryController@create');
    Route::post('/category/create','CategoryController@store');
    Route::get('/category/index','CategoryController@index');
    Route::get('/category/show/{id}','CategoryController@show');
    Route::get('/category/edit/{id}','CategoryController@edit');
    Route::post('/category/edit/{id}','CategoryController@update');

    // admin - settings
    Route::get('/settings/website','SettingsController@editWebsite');
    Route::patch('/settings/website','SettingsController@updateWebsite');
    Route::get('/settings/account','SettingsController@editAccount');

    // admin - user
    Route::get('/user/create','UserController@create');
    Route::post('/user/create','UserController@store');
    Route::get('/user/index','UserController@index');
    Route::get('/user/edit/{id}','UserController@edit');
    Route::post('/user/edit/{id}','UserController@update');
});
