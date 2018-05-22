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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/project',function () {
 return response("OK",200);
});

Route::get('/project',function(){
    return view('project');
});

Route::get('/project','ProjectController@listeProject');
Route::get('/project/{id}','ProjectController@detailProject');
