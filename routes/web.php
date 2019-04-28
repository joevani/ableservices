<?php

Auth::routes();
Route::get('/', 'DashboardController@index');
Route::get('dashboard', 'DashboardController@index');
Route::get('/home', 'DashboardController@index')->name('home');
Route::get('setup/users', 'ProfileController@index');
Route::get('setup/users/create', 'ProfileController@create');
Route::post('setup/users/create', 'ProfileController@store');
Route::get('setup/employee/{id}', 'ProfileController@show');
Route::post('setup/users/update', 'ProfileController@update');
Route::post('user/login','AuthController@postLogin');

Route::get('setup/clients/create', 'ProfileController@createClient');
Route::post('setup/clients/create', 'ProfileController@storeClient');
Route::get('setup/client/{id}', 'ProfileController@showClient');
Route::post('setup/clients/update', 'ProfileController@updateClient');

Route::get('profile', 'ProfileController@myProfile');
Route::post('profile/updatephoto', 'ProfileController@updatePhoto');
Route::post('profile/updatepassword', 'ProfileController@updatePassword');

Route::get('setup/clients','ProfileController@clients');


Route::get('setup/users/list','UserController@userlist');
Route::post('setup/users/add','UserController@registerUser');
Route::post('setup/users/getinfo','UserController@getUserinfo');


Route::get('workers','UserController@workerss');
Route::get('teamleaders','UserController@leaders');

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
Route::post('escalate_ticket_admin/{ticket_id}', 'TicketsController@escalateManagement');
Route::post('comment', 'CommentsController@postComment');



Route::get('news','NewsController@index');
Route::get('news/create','NewsController@create');
Route::post('news/create','NewsController@store');
Route::get('news/{id}','NewsController@show');


Route::get('memo/create','MemoController@create');
Route::post('memo/create','MemoController@store');
Route::get('memo','MemoController@index');
Route::get('memo/{id}','MemoController@viewMemo');

Route::get('feedbacks','TicketsController@feedbackList');
Route::get('feedbacks/create','TicketsController@createFeedback');
Route::post('feedbacks/create','TicketsController@storeFeedback');
Route::get('feedbacks/{ticket_id}', 'TicketsController@showFeedback');


Route::get('messages/create','MessageController@create');
Route::post('messages/create','MessageController@store');
Route::get('messages/sent','MessageController@sent');
Route::get('messages/inbox','MessageController@inbox');
Route::get('messages/reply/{id}','MessageController@show');
Route::post('messages/reply','MessageController@reply');

Route::get('setup/locations','LocationsController@index');
Route::get('setup/locations/create','LocationsController@create');
Route::post('setup/locations/create','LocationsController@store');
Route::get('setup/locations/{id}','LocationsController@show');
Route::post('setup/locations/update','LocationsController@update');
Route::get('locations/assigment','LocationsController@assign');
Route::post('locations/assigment','LocationsController@assignworker');



Route::view('offline', 'offline');
