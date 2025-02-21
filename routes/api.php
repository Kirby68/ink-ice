<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['jwt.auth'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

Route::post('/orders', App\Http\Controllers\API\Order\StoreController::class);
Route::post('/login', App\Http\Controllers\API\User\LoginController::class);
Route::post('/registration', App\Http\Controllers\API\User\RegistrationController::class);
Route::get('/products', App\Http\Controllers\API\Product\IndexController::class);
Route::get('/products/{product}', App\Http\Controllers\API\Product\ShowController::class);
Route::get('/redirect', App\Http\Controllers\API\RedirectController::class);

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth',
    'namespace' => 'App\Http\Controllers',

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});
