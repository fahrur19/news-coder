<?php

use Illuminate\Http\Request;

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

//API Advertisement
Route::get('/advertisement', 'FrontController@indexapi');

// API Category
Route::get('/page/category', 'FrontController@getAllCategory');
Route::get('/page/category/{id}', 'FrontController@getCategory');
Route::post('/page/category', 'FrontController@storeCategory');

// API News
Route::get('/page/news', 'FrontController@getAllNews');
Route::get('/page/news/{id}', 'FrontController@getNews');
Route::post('/page/news', 'FrontController@storeNews');

// API USER
Route::get('/page/users', 'UsersController@getAllUsers');
Route::get('/page/users/{id}', 'UsersController@getUsers');
Route::post('/page/users', 'UsersController@storeUser');

// API SETTINGs
Route::get('/page/setting', 'SettingController@getAllSetting');
Route::get('/page/setting/{id}', 'SettingController@getSetting');

//API OAuth


// Route::post('/register', 'Api/AuthController@register');

// Route::group(['middleware' => 'auth:api'], function(){
//     Route::post('details', 'API\UserController@details');
// });

// Route::post('/register', 'UserController@store');
Route::get('login', 'API\AuthController@login');
Route::post('register', 'API\AuthController@register');
  
Route::middleware('auth:api')->group( function () {
    Route::resource('user', 'UserController');
});
