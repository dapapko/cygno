<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'FilterController@list_groups');
Route::get('/groups', 'GroupController@list');
Route::get('/groups/add', 'GroupController@addRender');
Route::post('/groups/add', 'GroupController@add');
Route::get('/groups/delete/{id}', 'GroupController@delete');
Route::get('/entities', 'EntityController@list');
Route::get('/entities/add', 'EntityController@renderAdd');
Route::post('/entities/add', 'EntityController@add');
Route::get('/entities/edit/{id}', 'EntityController@renderEdit');
Route::post('/entities/edit/{id}', 'EntityController@edit');
Route::get('/entities/delete/{id}', 'EntityController@delete');
Route::get('/attributes/add', 'AttributeController@renderAdd');
Route::post('/attributes/add', 'AttributeController@add');
Route::get('/attributes', 'AttributeController@list');
Route::get('/attributes/edit/{id}', 'AttributeController@renderEdit');
Route::post('/attributes/edit/{id}', 'AttributeController@edit');
Route::get('/attributes/delete/{id}', 'AttributeController@delete');
Route::post('/filter/{group_id}', 'FilterController@build');
Route::get('/filter', 'FilterController@list_groups');
Route::get('/filter/{group_id}', 'FilterController@render');
Route::get('/filters/', 'FilterController@list');
Route::get('/filters/add', 'FilterController@addRender');
Route::post('/filters/add', 'FilterController@add');
Route::get('/filters/edit/{id}', 'FilterController@editRender');
Route::get('/filters/delete/{id}', 'FilterController@delete');
Route::post('/filters/edit/{id}', 'FilterController@edit');
Route::get('/vector/{group_id}', 'VectorController@show');
Route::post('/vector/{group_id}', 'VectorController@updateVector');
Route::get('/excel', 'ExcelController@render');
Route::post('/excel', 'ExcelController@parse');



Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
