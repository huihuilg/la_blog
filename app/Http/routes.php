<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'Home\UserController@index');

Route::get('home/index', 'Home\UserController@index');
Route::get('home/about', 'Home\UserController@about');
Route::get('home/article', 'Home\UserController@article');
Route::get('home/articledetail', 'Home\UserController@articledetail');
Route::any('home/pingl', 'Home\UserController@pingl');
Route::get('home/comment', 'Home\UserController@comment');
Route::post('home/liuy', 'Home\UserController@liuy');
Route::get('home/moodList', 'Home\UserController@moodList');
Route::any('home/register', 'Home\UserController@register');
Route::any('home/doRegister', 'Home\UserController@doRegister');
Route::any('home/login', 'Home\UserController@login');
Route::any('home/doLogin', 'Home\UserController@doLogin');
Route::any('home/loginOut', 'Home\UserController@loginOut');
Route::any('home/send', 'Home\UserController@send');
Route::any('home/doSend', 'Home\UserController@doSend');
Route::any('home/toux', 'Home\UserController@toux');
Route::any('home/touxsub', 'Home\UserController@touxsub');
Route::any('home/pwd', 'Home\UserController@pwd');
Route::any('home/pwdsub', 'Home\UserController@pwdsub');
Route::any('home/gr', 'Home\UserController@gr');
Route::any('home/grsub', 'Home\UserController@grsub');
Route::any('home/search', 'Home\UserController@search');
//Route::get('notice', 'Home\UserController@notice');


//后台管理

Route::any('header', 'Admin\AdminController@header');
Route::any('admin/usergl', 'Admin\AdminController@usergl');
Route::any('admin', 'Admin\AdminController@usergl');
Route::any('admin/userLock', 'Admin\AdminController@userLock');

Route::any('admin/disLock', 'Admin\AdminController@disLock');

Route::any('admin/userdel', 'Admin\AdminController@userdel');
Route::any('admin/bowen', 'Admin\AdminController@bowen');
Route::any('admin/bowendel', 'Admin\AdminController@bowendel');
Route::any('admin/bowenhs', 'Admin\AdminController@bowenhs');
Route::any('admin/bowenEdit', 'Admin\AdminController@bowenEdit');

Route::any('admin/reply', 'Admin\AdminController@reply');
Route::any('admin/replydel', 'Admin\AdminController@replydel');
Route::any('admin/replyhs', 'Admin\AdminController@replyhs');
Route::any('admin/replyEdit', 'Admin\AdminController@replyEdit');

Route::any('admin/ly', 'Admin\AdminController@ly');
Route::any('admin/lydel', 'Admin\AdminController@lydel');


