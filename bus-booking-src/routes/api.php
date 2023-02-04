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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')->namespace('Api\Auth')->name('api.auth.')->group(function(){

    Route::post('register', 'RegisterController@register')->name('register');

    Route::post('verify-email', 'RegisterController@verifyEmail')->name('verify-email');
    
    Route::post('login', 'LoginController@login')->name('login');

    Route::post('logout', 'LogoutController@logout')->name('logout')->middleware(['auth:sanctum']);

    Route::post('send-verification-code', 'PasswordController@sendVerificationCode')->name('send-verification-code');

    Route::post('reset-password', 'PasswordController@resetPassword')->name('reset-password');

    Route::post('change-password', 'PasswordController@changePassword')->name('change-password')->middleware(['auth:sanctum']);
});

Route::middleware(['auth:sanctum'])
->name('api.')
// ->prefix('')
->namespace('Api')
->group(function () {

	Route::apiResources([
        // 'users' => 'UserController',
    ]);

	Route::post('bookings', 'BookingController@store'); // to book a seat
	Route::get('seats', 'SeatController@index'); // to get available seats
});
