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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create-a-collection', ['as' => 'create_a_collection', 'uses' => 'CollectionController@create_a_collection']);
Route::get('/listing/{id}', ['as' => 'add_items', 'uses' => 'CollectionController@add_items']);
Route::get('/add-to-collection/{id}', ['as' => 'add_item', 'uses' => 'CollectionController@add']);
Route::get('/view-collection', ['as' => 'collection_view', 'uses' => 'CollectionController@showCollection']);

Route::auth();
