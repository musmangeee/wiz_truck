<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\User;
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



/*
 * Login & Registration Routes
 */

Auth::routes(['verify' => false]);
// Route::get('signup', 'SignupController@signup');
// Route::post('signup', 'SignupController@register')->name('signup');
Route::get('redirect/{driver}', 'Auth\LoginController@redirectToProvider')
    ->name('login.provider')
    ->where('driver', implode('|', config('auth.socialite.drivers')));
Route::get('{driver}/callback', 'Auth\LoginController@handleProviderCallback')
    ->name('login.callback')
    ->where('driver', implode('|', config('auth.socialite.drivers')));




    

/*
 * Default users Routes
 */
Route::get('/', 'Frontend\FrontEndController@index')->name('user.index');

Route::post('subscription', 'Frontend\FrontEndController@subscription')->name('frontend.subscription');
Route::get('search', 'SearchController@search')->name('search');
Route::get('location', 'SearchController@set_location')->name('location');
Route::get('search_cities', 'SearchController@search')->name('search_cities');
Route::get('all_cities', 'Frontend\FrontEndController@all_cities');
Route::get('faq', 'Frontend\FrontEndController@faq');
Route::get('terms_conditions', 'Frontend\FrontEndController@terms_conditions');
Route::get('privacy_policy', 'Frontend\FrontEndController@privacy_policy');
Route::get('list-business/{slug}', 'Frontend\BusinessController@index');
Route::get('user/{slug}', 'Frontend\ProfileController@index');
Route::get('autocomplete_locations', 'SearchController@autocomplete_locations')->name('autocomplete_locations');
Route::get('autocomplete_keyword', 'SearchController@autocomplete_keyword')->name('autocomplete_keyword');
Route::get('autocomplete_business', 'SearchController@autocomplete_business')->name('autocomplete_business');
Route::get('autocomplete_city', 'SearchController@autocomplete_city')->name('autocomplete_city');
Route::get('autocomplete_town', 'SearchController@autocomplete_town')->name('autocomplete_town');
Route::get('list_cities', 'SearchController@list_cities')->name('list_cities');
Route::group(['middleware' => ['check_business_role', 'check_admin_role']], function () {
    
    
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('write_a_review', 'DefaultUser\ReviewController@writeareview')->name('search.business');
    Route::get('write_a_review/{slug}', 'DefaultUser\ReviewController@write_a_review_page')->name('write_a_review_store');
    Route::post('store_review', 'DefaultUser\ReviewController@postReview')->name('user.store.review');
    Route::post('/my/business/store', 'DefaultUser\BusinessController@store_business')->name('user.business.store');
    Route::get('/my/business/create', 'DefaultUser\BusinessController@create');


//for product and menu
    
    Route::get('/my/business/menu', 'DefaultUser\BusinessController@create');
    Route::resource('products', 'ProductController');
    Route::resource('menu', 'MenuController');



    Route::get('my/reviews', 'DefaultUser\ReviewController@index')->name('user.reviews');
    Route::get('my/profile', 'UserProfileController@index')->name('user.profile');
    Route::get('setting', 'DefaultUser\ProfileController@setting')->name('user.profile');
    Route::post('setting/update', 'DefaultUser\ProfileController@update')->name('setting.update');




    Route::get('claim_business/{slug}', 'DefaultUser\BusinessController@claim_business')->name('user.claim_business');
    Route::post('store_claim_business', 'DefaultUser\BusinessController@store_claim_business')->name('user.store_claim_business');
});


/*
 * Business Routes
 */

    






Route::prefix('business')->group(function () {
    Route::group(['middleware' => ['check_business_role', 'role:restaurant']], function () {
        Route::get('/', 'BusinessUser\BusinessController@index')->name('individual.business.index');
        Route::get('setting', 'BusinessUser\BusinessController@setting');
        Route::get('business/reviews', 'BusinessUser\BusinessController@index');
        
    });
});

// Auth Logins for ridder & bussines
Route::get('checkout', 'CheckoutController@index')->name('frontend.checkout');

Route::group(['middleware' => ['guest']], function () {
Route::get('/business/login', 'BusinessUser\LoginController@login')->name('Businesslogin');
Route::get('/business/register', 'BusinessUser\LoginController@register')->name('register');
Route::post('/business/register', 'BusinessUser\Auth\RegisterController@register')->name('Businessregister');
Route::get('/ridder/login', 'BusinessUser\LoginController@Ridderlogin');
Route::get('/ridder/login', 'BusinessUser\LoginController@Ridderregister')->name('ridderSignup');
});

/*
 * Admin Routes
 */

Route::prefix('admin')->group(function () {
    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/', 'AdminController@index')->name('admin.index');
        Route::resource('users', 'UserController');
        Route::resource('roles', 'RoleController');
        Route::resource('permissions', 'PermissionController');
        Route::resource('business', 'AdminUser\BusinessController');
        Route::resource('business_category', 'AdminUser\BusinessCategoryController');
        Route::resource('city', 'AdminUser\CityController');
        Route::resource('town', 'AdminUser\TownController');
        Route::resource('claims', 'AdminUser\BusinessClaimController');
        Route::post('verify_business', 'AdminUser\BusinessController@verify_business')->name('verify_business');
        Route::post('claim_business', 'AdminUser\BusinessClaimController@claim_business')->name('admin.claim_business');
        Route::resource('subscription', 'AdminUser\SubscriptionController');


        

    });

   
});


// Route::get('email-verify', function () {
//     dd(Auth::user()->sendEmailVerificationNotification());
// });




/**
 * Testing
 */
// Route::get('google-maps', function () {
//     return view('test.search');
// });





//cart

Route::get('/cart', 'CartController@cart')->name('cart');
Route::get('/add-to-cart/{product}', 'CartController@addToCart')->name('add-cart');
Route::get('/remove/{id}', 'CartController@removeFromCart')->name('remove');



Route::get('maps', function () {

	$ip = '50.90.0.1';
    $data = \Location::get($ip);
    dd($data);
   
});