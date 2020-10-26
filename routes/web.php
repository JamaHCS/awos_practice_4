<?php

use App\Http\Controllers\OffersController;

Route::get('/', 'OffersController@index')->name('index');
Route::get('/create', 'OffersController@create')->name('create');
Route::post('/store', 'OffersController@store')->name('store');
Route::get('/edit/{offer}', 'OffersController@edit')->name('edit');
Route::post('/update/{offer}', 'OffersController@update')->name('update');
Route::delete('/destroy/{offer}', 'OffersController@destroy')->name('destroy');
