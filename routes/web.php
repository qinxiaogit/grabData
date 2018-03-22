<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
//,'auth.basic'
Route::group(['middleware' => ['web']], function () {
    /** Show Task Dashboard*/
    Route::get('/todo', 'TasksController@index');

    /** Add New Task*/
    Route::post('/todo/task', 'TasksController@store');

    /** Delete Task*/
    Route::post('/todo/task/{id}', 'TasksController@destroy');

    /** Show Task Dashboard*/
    Route::get('/todo2', 'Tasks2Controller@index');

    /** Add New Task*/
    Route::post('/todo2/task', 'Tasks2Controller@store');

    /** Delete Task*/
    Route::post('/todo2/task/{id}', 'Tasks2Controller@destroy');

    Route::get('/blog','BlogController@index')->name('blog');
});
Route::get('/cache')->middleware('test:1234');
Route::get('/cache/{id}', function ($id){
    return response('hello world',200)->header('Content-Type', 'text/plain');;
})->where(['id'=>'[0-9]+']);


Route::resource('photo','PhotoController');

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/elk', 'HomeController@elk');
Route::get('/event', 'HomeController@event');
