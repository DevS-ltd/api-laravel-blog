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
    Route::get('email/verify/{id}', 'VerificationController@verify')->name('verification.verify')->middleware('signed');

    Route::prefix('password/reset')
        ->name('password.')
        ->group(function () {
            Route::get('{token}', 'ResetPasswordController@showResetForm')->name('reset');
            Route::post('/', 'ResetPasswordController@reset')->name('update');
        });
});

Route::get('/success', 'SuccessController')->name('success');
