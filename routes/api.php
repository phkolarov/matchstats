<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware'=> ['auth:api','throttle:60,1'],'prefix'=> 'system' ],function (){

    Route::post('/add-data','SystemController@upload_file');
    Route::get('/get-data/{skip}/{limit}','SystemController@get_data');
    Route::post('/set-data/','SystemController@set_data');
    Route::post('/update-data/{id}','SystemController@update_data');
    Route::delete('/delete-row/{id}','SystemController@delete_row');
    Route::get('/get-data-count/{count?}','SystemController@get_page_count');
});

