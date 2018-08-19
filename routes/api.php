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

Route::prefix('user')->group(function(){
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::middleware('jwt.refresh')->get('token/refresh', 'AuthController@refresh');
});
Route::prefix('product')->middleware(['jwt.auth'])->group(function (){
    Route::post('add', 'ProductController@add');
    Route::get('getlist','ProductController@getlist');
    Route::post('delete','ProductController@delete');
});
