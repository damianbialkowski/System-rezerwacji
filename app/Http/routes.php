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
    Route::get('/', 'HomeController@home')->name('');
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

// Route::get('/newsletter/subscribe','NewsletterController@subscribe');



Route::group(['namespace' => 'admin','middleware' => 'admin','prefix' => 'admin','as' => 'admin.'], function (){
    Route::get('/','DashboardController@main')->name('dashboard');
    // admin - article
//    Route::get('/article/create','ArticleController@create')->name('article.create');
//    Route::post('/article/create','ArticleController@store')->name('article.store');
//    Route::get('/article/index','ArticleController@index')->name('article.index');
//    Route::get('/article/show/{id}','ArticleController@show')->name('article.show');
//    Route::get('/article/edit/{id}','ArticleController@edit')->name('article.edit');
//    Route::post('/article/edit/{id}','ArticleController@update')->name('article.update');
//    Route::get('/article/destroy/{id}','ArticleController@destroy')->name('article.destroy');
    Route::resource('articles', 'ArticleController');

    // admin - category
    Route::get('/category/create','CategoryController@create')->name('category.create');
    Route::post('/category/create','CategoryController@store')->name('category.store');
    Route::get('/category/index','CategoryController@index')->name('category.index');
    Route::get('/category/show/{id}','CategoryController@show')->name('category.show');
    Route::get('/category/edit/{id}','CategoryController@edit')->name('category.edit');
    Route::post('/category/edit/{id}','CategoryController@update')->name('category.update');

    // admin - settings
    Route::get('/settings/website','SettingsController@editWebsite')->name('settings.editWebsite');
    Route::patch('/settings/website','SettingsController@updateWebsite')->name('settings.updateWebsite');
    Route::get('/settings/account','SettingsController@editAccount')->name('settings.editAccount');

    // admin - users
    Route::resource('users', 'UserController');
});
