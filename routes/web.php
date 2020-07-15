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

Route::get('/subscriptions', 'SubscriptionsController@index')->name('subscriptions.index');
Route::get('/subscriptions/create', 'SubscriptionsController@create');
Route::post('/subscriptions', 'SubscriptionsController@store');
