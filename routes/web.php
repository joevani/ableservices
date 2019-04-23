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

Route::get('setup/teamleaders','UserController@teamleadersView');
Route::get('setup/teamleaders/workers','UserController@workers');
Route::post('setup/teamleaders/assign','UserController@assignWorker');
Route::post('setup/teamleaders/members','UserController@teamleadMember');


Route::get('issues','TicketsController@userTickets');
Route::get('new_ticket', 'TicketsController@create');
Route::post('new_ticket', 'TicketsController@store');
Route::get('tickets/{ticket_id}', 'TicketsController@show');
Route::get('issues/list', 'TicketsController@index');
Route::post('close_ticket/{ticket_id}', 'TicketsController@close');
Route::post('escalate_ticket/{ticket_id}', 'TicketsController@escalateSuperVisor');
Route::post('comment', 'CommentsController@postComment');
