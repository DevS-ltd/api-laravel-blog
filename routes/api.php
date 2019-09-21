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
*/

Route::group([
    'namespace' => 'Auth',
], function () {
    Route::post('login', 'LoginController@login')->middleware('guest');
    Route::post('register', 'RegisterController@register');

    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')
        ->name('password.email')
        ->middleware(['throttle:6,1']);

    Route::group([
        'middleware' => 'auth',
    ], function () {
        Route::post('logout', 'LoginController@logout');
        Route::post('refresh', 'LoginController@refresh');
        Route::get('email/resend', 'VerificationController@resend')->name('verification.resend');
    });
});

Route::apiResource('posts', 'PostController');
Route::apiResource('posts/{post}/photos', 'PhotoController')->only(['store', 'destroy']);
Route::resource('profile', 'ProfileController')->only(['index', 'store']);
