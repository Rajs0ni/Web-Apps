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

Route::get('/', 'TodosController@index');

Route::get('/todo', 'TodosController@index');
Route::get('/todo/create', 'TodosController@create');
Route::post('/todo/store', 'TodosController@store');
Route::get('/todo/{todo}/show','TodosController@show');
Route::get('/todo/{todo}/gshow','TodosController@gridshow');
Route::get('/todo/{todo}/edit','TodosController@edit');
Route::post('/todo/{todo}/update','TodosController@update');
Route::get('/todo/{todo}/deleteTask','TodosController@deleteTask');
Route::get('/todo/search','TodosController@search');
Route::post('/todo/find','TodosController@find');
Route::get('todo/clearall','TodosController@clearall');
Route::get('todo/getcompleted','TodosController@getCompleted');
Route::get('todo/getProcessing','TodosController@getProcessing');
Route::get('todo/getPending','TodosController@getPending');
Route::get('todo/help','TodosController@help');
Route::get('todo/gridview','TodosController@gridview');
Route::get('todo/sort/by/title','TodosController@sortByTitle');
Route::get('todo/sort/by/date','TodosController@sortByDate');
Route::resource('todo','TodosController');