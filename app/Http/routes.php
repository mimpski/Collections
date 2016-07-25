<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@homepage']);
Route::get('/create-a-collection', ['as' => 'create_a_collection', 'uses' => 'CollectionController@create_a_collection']);
Route::post('/save-collection', ['as' => 'save_collection', 'uses' => 'CollectionController@save_collection']);
Route::get('/listing', ['as' => 'add_items', 'uses' => 'CollectionController@add_items']);
Route::get('/save-to-collection', ['as' => 'add_to_collection', 'uses' => 'CollectionController@add_to_collection']);
Route::post('/view-collection', ['as' => 'view_collection', 'uses' => 'CollectionController@view_collection']);
Route::get('/collection/{id}', ['as' => 'individual_collection', 'uses' => 'CollectionController@individual_collection']);
Route::get('/edit-collection/{id}', ['as' => 'edit_collection', 'uses' => 'CollectionController@edit_collection']);
Route::post('/update-collection', ['as' => 'update_collection', 'uses' => 'CollectionController@update_collection']);
Route::get('/update-listing/{id}', ['as' => 'update_items', 'uses' => 'CollectionController@update_items']);
Route::get('/my-collections', ['as' => 'my_collections', 'uses' => 'CollectionController@my_collections']);

Route::auth();
