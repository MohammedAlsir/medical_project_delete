<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api'], function () {

    Route::post('login', 'AuthController@login'); // == Login ==
    Route::post('register', 'AuthController@register'); // == Login ==
    Route::get('company', 'AuthController@company'); // == Login ==

    // == This routes user must be logged in ==
    Route::group(['middleware' => ['auth:api']], function () {

        Route::get('clinic', 'OprationController@get_clinic');
        Route::get('clinic/{id}/doctors', 'OprationController@get_doctor_by_id');

        Route::get('clinic/{id}/doctors', 'OprationController@get_doctor_by_id');

        Route::post('reservation', 'ReservationController@reservation'); // == Login ==




        Route::post('profile', 'AuthController@profile');
    });
});
