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

//Route::get('/', function() {
//    return view('welcome');
//});

Route::get('/', 'TwittLoginController@index')->name('twittlogin');

Route::get('prof_make', 'ProfmakeController@index')->name('prof_make');

Route::get('query_list', 'QueryController@query_list')->name('query.list');

Route::get('query_get', 'QueryController@query_get')->name('query.get');

Route::get('query_post', 'QueryController@query_post')->name('query.post');

Route::get('query_view', 'QueryController@query_view')->name('query.view');

Route::get('profile', 'ProfileController@index')->name('profile.index');

Route::get('profile_confirm', 'ProfileController@confirm')->name('profile.confirm');

Route::get('profile_finish', 'ProfileController@finish')->name('profile.finish');


