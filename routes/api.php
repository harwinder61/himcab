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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'Api\AuthController@register');
Route::post('login', 'Api\AuthController@login');
Route::post('forget_pswd','Api\AuthController@forgot_pswd');
Route::post('social_login','Api\AuthController@social_login');
Route::post('driverPersonaldetail','Api\DriverController@save_driver_details');
Route::post('driveruploaddocx','Api\DriverController@upload_document');

Route::post('details','Api\DetailController@get_details');
Route::post('editprofile','Api\DriverController@edit_profile');
Route::post('editDocument_nbr','Api\DriverController@edit_doc_nbr');
Route::post('edit_document','Api\DriverController@updatedocument');
Route::post('DriverEditProfileImage','Api\DriverController@DriverEditProfileImage');
Route::post('onlineofflinedriver','Api\DriverController@onlineofflinedriver');

Route::post('commentdriver','Api\DriverController@comment_ratingdriver');
Route::post('allcommentdriver','Api\DriverController@get_comments');

Route::post('allcommentuser','Api\UserController@get_comments');
Route::post('UserEditProfileImage','Api\UserController@UserEditProfileImage');

Route::post('img_upload','Api\PhotoController@index');

Route::post('userbooking','Api\BookingController@ridebook');
Route::post('nearbydriver','Api\BookingController@nearbydriver');
