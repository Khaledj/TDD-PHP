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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'IndexController@index')->name('index');

Route::get('/project',function () {
 return response("OK",200);
});

Route::get('/project',function(){
    return view('project');
});

Route::get('/project','ProjectController@listeProject');
Route::get('/project/{id}','ProjectController@detailProject');

Route::get('/add','ProjectController@create')->middleware('auth');
Route::post('/project','ProjectController@store')->middleware('auth');

Route::get('/project/{projectcode}/edit','ProjectController@edit')->middleware('auth');
Route::put('/project/{projectcode}','ProjectController@update')->middleware('auth');


