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

//Route::get('/', function () {
//    return view('welcome');
//});
use App\Model\Task;
use http\Client\Response;
use Symfony\Component\Console\Input\Input;

Route::resource('/', 'IndexController');
Route::resource('task', 'TaskController');
Auth::routes();

Route::post('tasks/repriority', 'TasksController@repriorities');
