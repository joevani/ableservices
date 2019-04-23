<?php

Auth::routes();
Route::get('/', 'DashboardController@index');
Route::get('dashboard', 'DashboardController@index');
Route::get('/home', 'DashboardController@index')->name('home');
Route::get('setup/users', 'UserController@index');

Route::post('user/login','AuthController@postLogin');

Route::get('setup/users/list','UserController@userlist');
Route::post('setup/users/add','UserController@registerUser');
Route::post('setup/users/getinfo','UserController@getUserinfo');

Route::get('setup/supervisors','UserController@superVisorsView');
Route::get('setup/supervisors/list','UserController@superVisors');
Route::post('setup/supervisors/teamcount','UserController@teamcount');
Route::post('setup/supervisors/assign','UserController@assign');
Route::post('setup/supervisors/members','UserController@superVisorsMember');
Route::get('setup/teamleaders/list','UserController@teamleaders');
Route::post('setup/supervisors/removemember','UserController@remove');
