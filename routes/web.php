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

Route::get('/', 'SocialAuthTwitterController@index')->name('twittlogin');
Route::get('/twittlogin', 'SocialAuthTwitterController@twittlogin');
Route::get('/twittlogin1/{id}', 'SocialAuthTwitterController@twittlogin1');
Route::get('/logout', 'SocialAuthTwitterController@logout');

Route::get('query_view/{id}', 'QueryController@query_sample')->name('query_sample');

//query part
//Route::get('query_view', 'QueryController@query_view')->name('query_view');
Route::get('twitt_login_modal', 'QueryController@twitt_login_modal')->name('twitt_login_modal');
Route::get('query_post_modal', 'QueryController@query_post_modal')->name('query_post_modal');
Route::post('query_post', 'QueryController@query_post')->name('query_post');

//interview part
Route::get('interview', 'InterviewController@interview')->name('interview');
Route::get('add_interview', 'InterviewController@add_interview')->name('add_interview');
Route::post('interview', 'InterviewController@interview_finish')->name('interview_finish');
Route::post('interview_modal', 'InterviewController@interview_modal')->name('interview_modal');
Route::get('url_copy_modal', 'InterviewController@url_copy_modal')->name('url_copy');
Route::get('interview_list', 'InterviewController@interview_list')->name('interview_list');
Route::get('answer_post_modal', 'InterviewController@answer_post_modal')->name('answer_post_modal');
Route::post('answer_post', 'InterviewController@answer_post')->name('answer_post');
Route::get('mute_change', 'InterviewController@mute_change')->name('mute_change');
Route::get('delete_query', 'InterviewController@delete_query')->name('delete_query');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
