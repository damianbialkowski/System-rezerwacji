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
    Route::get('/articles/{id},{slug}','ArticleController@show');
    Route::get('/categories/{id},{slug}','CategoryController@show');
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
    // admin - articles
    Route::resource('articles', 'ArticleController');

    // admin - categories
//    Route::get('/categories/create','CategoryController@create')->name('categories.create');
//    Route::post('/categories/create','CategoryController@store')->name('categories.store');
//    Route::get('/categories/index','CategoryController@index')->name('categories.index');
//    Route::get('/categories/show/{id}','CategoryController@show')->name('categories.show');
//    Route::get('/categories/edit/{id}','CategoryController@edit')->name('categories.edit');
//    Route::post('/categories/edit/{id}','CategoryController@update')->name('categories.update');
    Route::resource('categories', 'CategoryController');

    // admin - settings
    Route::get('/settings/website','SettingsController@editWebsite')->name('settings.editWebsite');
    Route::patch('/settings/website','SettingsController@updateWebsite')->name('settings.updateWebsite');
    Route::get('/settings/account','SettingsController@editAccount')->name('settings.editAccount');

    // admin - users
    Route::resource('users', 'UserController');
});
