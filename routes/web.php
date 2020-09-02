<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes([
    'register' => false,
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::group([
        'prefix' => 'payments/{payment}',
        'as' => 'payments.'
    ], function () {
        Route::get('{code}', 'PaymentController@payment')->name('payment');
        Route::post('validation', 'PaymentController@validation')->name('validation');

        Route::get('success', 'PaymentController@success')->name('success');
        Route::get('fail', 'PaymentController@fail')->name('fail');
    });
    Route::resource('payments', 'PaymentController');
    Route::resource('cards', 'CardController');
});
