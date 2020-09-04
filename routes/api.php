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

// Current version of prototype app we do not require any security
Route::get('/categories', 'API\CategoryController@list')->name('apiCategoryList');
Route::get('/sub/categories/{category_id}', 'API\SubCategoryController@list')->name('apiSubCategoryList');
Route::get('/brands', 'API\BrandController@list')->name('apiBrandList');
Route::get('/colors', 'API\ColorController@list')->name('apiColorList');
Route::get('/heights', 'API\HeightController@list')->name('apiHeightList');
Route::get('/items/search', 'API\ItemController@search')->name('apiItemSearch');
Route::get('/items/{id}/details', 'API\ItemController@itemDetail')->name('apiItemDetail');
Route::get('/items/{user}', 'API\ItemController@listByUser')->name('apiItemListByUser');
Route::get('/items/informations/{id}', 'API\ItemDetailInformationController@isAvailable')->name('apiItemIsAvailable');
Route::get('/looks', 'API\LookController@list')->name('apiLookList');
Route::get('/looks/{user}', 'API\LookController@listByUser')->name('apiLookListByUser');
Route::get('/item/details/{id}', 'API\ItemDetailController@getDetail')->name('apiItemDetail');
Route::get('/users/{id}/cart', 'API\CartController@getCart')->name('apiCart');
Route::post('/users/{id}/cart', 'API\CartController@save')->name('apiCartSave');
Route::get('/hashtags', 'API\HashTagController@list')->name('apiHashTag');

Route::apiResource('comments', 'API\CommentController');