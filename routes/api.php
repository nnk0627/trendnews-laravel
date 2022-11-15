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

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['namespace' => 'Api', 'middleware' => 'auth:api'], function () {

    // Route::get('post', 'PostController@index');
    // Route::post('post', 'PostController@store');
    // Route::get('post/{id}', 'PostController@show');
    // Route::put('post/{id}', 'PostController@update');

    // Route::delete('post/{id}', 'PostController@destroy');

    Route::apiResource('post', 'PostController');
});
