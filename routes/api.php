<?php

use Illuminate\Http\Request;

Route::middleware('api')->get('/getType/{product}', 'ApiController@getType');

Route::middleware('api')->get('/products', 'ApiController@products');
Route::middleware('api')->get('/products/{id}', 'ApiController@product');

Route::get('/vigence/{id}', 'ApiController@switchVigence')->middleware('api');

Route::apiResource('/offers', 'ApiController');
