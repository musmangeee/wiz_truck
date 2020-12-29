<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'Api\AuthController@login');
    Route::post('signup', 'Api\AuthController@signup');
    Route::post('change_password/{id}', 'Api\PasswordResetController@change_password'); 

    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::get('logout', 'Api\AuthController@logout');
        Route::get('user', 'Api\AuthController@user');
    });
});

Route::apiResource('products', 'Api\ProductController');
Route::apiResource('menus', 'Api\MenuController');
Route::apiResource('categories', 'Api\CategoryController');
Route::apiResource('businesses', 'Api\BusinessController');
Route::apiResource('business_category', 'Api\BusinessCategoryController');
Route::get('restaurant/{id}', 'Api\RestaurantController@index');
Route::get('restaurant_reviews/{id}', 'Api\RestaurantReviewController@index');
Route::get('business_order/{id}', 'Api\OrderController@business_order');
Route::get('user_order/{id}', 'Api\OrderController@user_order');

Route::get('category_restaurant/{id}', 'Api\CategoryRestaurantController@get_category_restaurant');

Route::get('order/{id}', 'Api\ProductOrderController@order_accept');



// change password

