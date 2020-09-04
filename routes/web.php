<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', 'HomePageController@index')->name('home');
Route::get('/sns', 'SNSController@index')->name('sns');
Route::post('/sns/registrations', 'SNSController@registration')->name('snsRegistration');

Auth::routes();

Route::get('login/{provider}', 'SNSController@redirectToProvider')->name('redirectTo');
Route::get('login/{provider}/callback', 'SNSController@handleProviderCallback')->name('redirectCallback');

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(["as" => "individual.", "prefix" => "member", "namespace" => "Dashboard\Individual"], function () {

    Route::group(['middleware' => 'individual'], function () {
        Route::get('profiles/edit', 'EditProfileController@index')->name('profileEdit');
        Route::get('look', 'LookController@index')->name('look');
        Route::post('look/upload', 'LookController@store')->name('lookUpload');
    });

    Route::get('profiles/{user_id}', 'ProfileController@show')->name('profile');
    Route::get('profiles/{user_id}/following', 'ProfileController@showFollowing')->name('following');
    Route::get('profiles/{user_id}/follower', 'ProfileController@showFollower')->name('follower');
    Route::get('profiles/{user_id}/liked', 'ProfileController@showLikedLooks')->name('liked');
    Route::patch('profiles/{user_id}/update', 'EditProfileController@edit')->name('profileUpdate')->middleware('profile');

    Route::group(['middleware' => ['individual', 'look']], function () {
        Route::get('look/{id}', 'LookController@show')->name('lookShow');
        Route::post('look/{id}/update', 'LookController@update')->name('lookUpdate');
        Route::get('look/{id}/delete', 'LookController@delete')->name('lookDelete');
    });
});

Route::group(["as" => "shop.", "prefix" => "shop", "namespace" => "Dashboard\Shop"], function () {

    Route::group(['middleware' => 'shop'], function () {
        Route::get('profiles/edit', 'EditProfileController@index')->name('profileEdit');
        Route::patch('profiles/{user_id}/update', 'EditProfileController@edit')->name('profileUpdate')->middleware('profile');
        Route::get('item', 'ItemController@index')->name('item');
        Route::post('item/create', 'ItemController@store')->name('itemCreate');
    });

    Route::get('profiles/{user_id}', 'ProfileController@show')->name('profile');
    Route::get('profiles/{user_id}/staff', 'ProfileController@showStaff')->name('staff');
    Route::get('profiles/{user_id}/user', 'ProfileController@showUser')->name('user');
    Route::group(['middleware' => ['shop', 'item']], function () {
        Route::get('item/{id}', 'ItemController@show')->name('itemShow');
        Route::post('item/{id}/update', 'ItemController@update')->name('itemUpdate');
        Route::post('item/{id}/delete', 'ItemController@delete')->name('itemDelete');
    });
});

//add to favourite routes
Route::post('profiles/favourite', 'FavouriteController@isFavourite')->name('isfavourite');
Route::post('profiles/favourite/update', 'FavouriteController@addRemoveFavourite')->name('addRemoveFavourite');

Route::get('items/details/{id}', 'ItemDetailController@show')->name('itemDetail');
Route::get('items/cart', 'CartController@index')->name('cart')->middleware('auth');

Route::get('users/profiles/picture', 'Dashboard\ProfilePictureController@show')->name('profilePicture');
Route::post('users/profiles/picture/update', 'Dashboard\ProfilePictureController@update')->name('profilePictureUpdate');

Route::get('users/profiles/address', 'Dashboard\AddressController@index')->name('address');
Route::patch('users/profiles/address/update', 'Dashboard\AddressController@update')->name('addressUpdate');

Route::get('look/detail/{id}', 'LookDetailController@showLook')->name('detail');

//route for likes
Route::post('look/loadLike', 'LookDetailController@loadLike')->name('loadLike');
Route::post('look/likes', 'LookDetailController@addRemoveLike')->name('addRemoveLike');
Route::post('item/loadLike', 'ItemDetailController@loadLike')->name('loadLikeItem');
Route::post('item/likes', 'ItemDetailController@addRemoveLike')->name('addRemoveLikeItem');

//Route for switch language
Route::get('lang/{locale}', 'LocaleSwitcherController@lang');

//Route for message
Route::get('getChat', 'MessageController@getChat')->name('getChannel');
Route::get('/message/{id}', 'MessageController@getMessage')->name('message');
Route::post('message', 'MessageController@sendMessage')->name('messagePost');
Route::get('/channel/{id}', 'MessageController@createChannel')->name('channel');
// Cart
Route::post('cart', 'CartController@save')->name('cartSave');
Route::delete('cart/delete/{id}', 'CartController@delete')->name('cartDelete');
Route::post('checkout', 'CartController@checkout')->name('checkout');
//Route for search
Route::get('search', 'SearchController@search')->name('search');

//route for list view
Route::get('rank/lists/{type}', 'ListController@show')->name('rankList');
Route::post('shop/list', 'ListController@getShopList')->name('shopList');
Route::post('user/list', 'ListController@getUserList')->name('userList');

//Route for terms of use
Route::get('terms-of-use', function () {
    return view('termsOfUse.terms-of-use');
})->name('termsOfUse');

//Route for privacy
Route::get('privacy-policy', function () {
    return view('privacyPolicy.privacy-policy');
})->name('privacyPolicy');
