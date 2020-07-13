<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => ['custom']], function () {
    Route::get('widget', 'ApiController@getAllWidgets');
    Route::get('widget/{id}', 'ApiController@getWidget');
    Route::post('widget', 'ApiController@createWidget');
    Route::put('widget/{id}', 'ApiController@updateWidget');
    Route::delete('widget/{id}','ApiController@deleteWidget');
});