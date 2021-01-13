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



Route::post('for', 'Api\ProductOrderController@change_password');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'Api\AuthController@login');
    Route::post('signup', 'Api\AuthController@signup');
    Route::post('change_password/{id}', 'Api\PasswordResetController@change_password'); 
    Route::post('forgot_password', 'Api\Auth\ForgetPasswordController@forgot_password');

    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::get('logout', 'Api\AuthController@logout');
        Route::get('user', 'Api\AuthController@user');
        Route::apiResource('restaurant_menu', 'Api\Restaurant\RestaurantMenuController');
        Route::apiResource('owner_restaurant', 'Api\Restaurant\OwnerRestaurantController');
        Route::get('business_review/{id}', 'Api\Reviews\ReviewController@index');
        Route::post('post_review', 'Api\Reviews\ReviewController@store');
        Route::post('get_order', 'Api\ProductOrderController@create_order');
        Route::get('check_order/{id}', 'Api\ProductOrderController@index');
        Route::get('update_order/{id}', 'Api\ProductOrderController@update');
        Route::get('delete_order/{id}', 'Api\ProductOrderController@destroy');
        Route::post('accept_order', 'Api\ProductOrderController@accept_order');
        Route::post('cancel_order', 'Api\ProductOrderController@cancel_order');
        Route::post('deliver_order', 'Api\ProductOrderController@deliver_order');
        Route::post('completed_order', 'Api\ProductOrderController@completed_order');
        Route::post('update_profile/{id}', 'Api\Profile\ProfileController@update');//
        Route::post('order_exists', 'Api\Restaurant\OrderManagementController@order_exists');
        Route::get('pending_order_rider', 'Api\Rider\RiderController@TodaysPendingOrders');
        Route::get('all_orders', 'Api\Rider\RiderController@AllOrders');
        Route::post('rider_status', 'Api\Rider\RiderController@status');
        Route::get('order_details','Api\UserOrderController@get_details');
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
//! Google Json response
Route::post('/mobileres', 'Auth\LoginController@mobileResponse');
// ! Google Login Res
Route::post('apiregister', 'Api\BusinessController@ApiRegister');
// !Rider Register
Route::post('ridderregister', 'Api\RidderController@ridderRegister');
// !Coupon
Route::apiResource('coupon', 'Api\Coupon\CouponController');
// !Location
Route::get('location', 'SearchController@findNearestRestaurants');
Route::get('search', 'Api\SearchController@searchlocation');
// ! Rider routes
Route::prefix('rider')->group(function () {
    Route::post('login', 'Api\Rider\RiderAPIController@login');
    Route::post('register', 'Api\Rider\RiderAPIController@register');
    Route::post('send_reset_link_email', 'Api\Rider\RiderAPIController@sendResetLinkEmail');
    Route::get('user', 'Api\Rider\RiderAPIController@user');
    Route::get('logout', 'Api\Rider\RiderAPIController@logout');
    Route::post('settings/{id}', 'Api\Rider\RiderAPIController@settings');
});


Route::middleware('auth:api')->group(function () {
    Route::prefix('business')->group(function (){
        Route::get('order_details','Api\Business\OrderAPIController@get_details');
    });
});


