<?php

use Illuminate\Http\Request;

Route::middleware('api')->get('/getType/{product}', 'OffersController@getType');

Route::middleware('api')->get('/products', 'ApiController@products');
Route::middleware('api')->get('/products/{id}', 'ApiController@product');

Route::middleware('api')->get('/offers', 'ApiController@offers');
Route::middleware('api')->get('/offers/{id}', 'ApiController@offer');
