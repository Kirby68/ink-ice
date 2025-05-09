<?php

use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'App\Http\Controllers\Main', 'prefix' => 'admin'], function () {
    Route::get('/', 'IndexController')->name('admin.index');
    Route::group(['prefix' => 'tag'], function () {
        Route::get('/', 'TagsController')->name('admin.tag');
        Route::get('/create', 'TagsController@create')->name('admin.tag.create');
        Route::patch('/{tag}', 'TagsController@update')->name('admin.tag.update');
        Route::get('/{tag}/edit', 'TagsController@edit')->name('admin.tag.edit');
        Route::post('/create', 'TagsController@store')->name('admin.tag.store');
        Route::delete('/{tag}', 'TagsController@destroy')->name('admin.tag.destroy');
    });
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', 'CategoriesController')->name('admin.category');
        Route::get('/create', 'CategoriesController@create')->name('admin.category.create');
        Route::patch('/{category}', 'CategoriesController@update')->name('admin.category.update');
        Route::get('/{category}/edit', 'CategoriesController@edit')->name('admin.category.edit');
        Route::post('/create', 'CategoriesController@store')->name('admin.category.store');
        Route::delete('/{category}', 'CategoriesController@destroy')->name('admin.category.destroy');
    });
    Route::group(['prefix' => 'user'], function () {
        Route::get('/create', 'UserController@create')->name('admin.user.create');
        Route::get('/', 'UserController')->name('admin.user');
        Route::get('/{user}', 'UserController@show')->name('admin.user.show');
        Route::patch('/{user}', 'UserController@update')->name('admin.user.update');
        Route::get('/{user}/edit', 'UserController@edit')->name('admin.user.edit');
        Route::post('/', 'UserController@store')->name('admin.user.store');
        Route::delete('/{user}', 'UserController@destroy')->name('admin.user.destroy');
    });
    Route::group(['prefix' => 'product'], function () {
        Route::get('/create', 'ProductController@create')->name('admin.product.create');
        Route::get('/', 'ProductController')->name('admin.product');
        Route::get('/{product}', 'ProductController@show')->name('admin.product.show');
        Route::patch('/{product}', 'ProductController@update')->name('admin.product.update');
        Route::get('/{product}/edit', 'ProductController@edit')->name('admin.product.edit');
        Route::post('/', 'ProductController@store')->name('admin.product.store');
        Route::delete('/{product}', 'ProductController@destroy')->name('admin.product.destroy');
    });
});

Route::get('{page}', 'App\Http\Controllers\Client\IndexController')->where('page', '(.*)');
Route::get('/test', 'App\Http\Controllers\Client\AdmController');

