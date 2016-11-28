<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|


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

Route::group(['prefix' => 'v1'], function () {

    Route::post('/auth', 'api\v1\AuthController@authenticated');
    Route::get('/auth/refresh', ['middleware' => 'jwt.refresh', function () {
    }]);

    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::get('/things', 'api\v1\ThingController@thingAndChannel');
        Route::get('/auth', 'api\v1\AuthController@getAuthenticatedUser');
        Route::post('/logout', 'api\v1\AuthController@logout');

    });

});
