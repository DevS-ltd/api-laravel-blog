<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'namespace' => 'Auth',
], function () {
    Route::group([
        'prefix' => 'email',
    ], function () {
        Route::get('verify/{id}', 'VerificationController@verify')->name('verification.verify')->middleware('signed');
    });

    Route::group([
        'prefix' => 'password',
    ], function () {
        Route::get('reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('reset', 'ResetPasswordController@reset')->name('password.update');
    });
});

Route::get('/success', 'SuccessController')->name('success');
