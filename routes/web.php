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

Route::get('/', 'App\ImageController@index');

Route::post('image/handle', ['as' => 'image.handle', 'uses' => 'App\ImageController@handle']);

Route::get('excel', ['as' => 'excel', 'uses' => 'App\ExcelController@index']);
//Route::get('image-resize/{file}/{w?}/{h?}', ['as' => 'app.image.handle', 'uses' => 'App\AppController@handle'])->where(['file' => '(.*?)']);
