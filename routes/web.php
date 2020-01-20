<?php

Route::resource('/', 'IndexController');
Route::resource('task', 'TaskController');
Route::get('tasks', 'TasksController@list');
Route::post('tasks/repriority', 'TasksController@repriorities');

Auth::routes();


