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

Route::get('/checklist', [
	'uses' => 'ChecklistController@index',
	'as' => 'checklist'
]);

Route::post('/create/checklist', [
	'uses' => 'ChecklistController@create',
	'as' => 'checklist.create'
]);

Route::get('/checklist/delete/{id}', [
	'uses' => 'ChecklistController@delete',
	'as' => 'checklist.delete'
]);

Route::get('/checklist/update/{id}', [
	'uses' => 'ChecklistController@update',
	'as' => 'checklist.update'
]);

Route::post('/checklist/save/{id}', [
	'uses' => 'ChecklistController@save',
	'as' => 'checklist.save'
]);

Route::get('/checklist/checked/{id}', [
	'uses' => 'ChecklistController@checked',
	'as' => 'checklist.checked'
]);