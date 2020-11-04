<?php

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

// Route::get('/', function () {
//     return view('web.index');
// });

Route::get('/','DashboardController@index'); 
Route::get('/car', function () {
    return view('web.car');
});
Route::get('/about', function () {
    return view('web.about');
});
Route::any('/SingleBlog/{id}', 'WebBlogController@single_blog');
Route::get('/blog','WebBlogController@index'); 

Route::get('/contact', function () {
    return view('web.contact');
});
Route::get('/book', function () {
    return view('web.book');
});
Route::get('/blognew', function () {
    return view('web.blognew');
});



Route::get('/api/privacy_policy' , function (){
	return view('privacy_policy');
});


Route::get('/login', function () {
    return view('auth.login');
});


Auth::routes();

// Route::prefix('admin')->group(function () {
//user
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users', 'UserController@users');
Route::get('/createUser', 'UserController@createUser');
Route::post('/postUser', 'UserController@postUser');
Route::any('/userDelete/{id}', 'UserController@userDelete');
Route::any('/editUser/{id}', 'UserController@editUser');
Route::any('/updateUser', 'UserController@updateUser');
Route::any('/userBlock/{id}/{block_status}', 'UserController@userBlock');

//driver

Route::any('/driver', 'UserController@driver');
Route::any('/driverHistory/{id}', 'UserController@driverHistory');
Route::any('/driverDocument/{id}', 'UserController@driverDocument');
Route::any('/uploadDocument', 'UserController@uploadDocument');
Route::any('/driverApporved/{id}/{block_status}', 'UserController@driverApporved');
Route::any('/driverDocument/{id}', 'UserController@driverDocument');
Route::any('/driverDocumentList/{id}', 'UserController@driverDocumentList');
Route::any('/driverDocumentEdit/{id}', 'UserController@driverDocumentEdit');
Route::any('/updateDocument', 'UserController@updateDocument');
                                                                                                                            
//vehicle

Route::get('/vehicle', 'VehicleController@vehicle');
Route::any('/createVehicle', 'VehicleController@createVehicle');
Route::any('/postVehicle', 'VehicleController@postVehicle');
Route::any('/VehicleDelete/{id}', 'VehicleController@VehicleDelete');
Route::any('/editVehicle/{id}', 'VehicleController@editVehicle');
Route::any('/updateVehicle/', 'VehicleController@updateVehicle');

Route::get('/service','VehicleController@service');
Route::get('/createService','VehicleController@createService');
Route::any('/postService','VehicleController@postService');
Route::any('/editService/{id}', 'VehicleController@editService');
Route::any('/updateService', 'VehicleController@updateService');
Route::any('/VehicleServiceDelete/{id}', 'VehicleController@VehicleServiceDelete');

Route::any('/Localization', 'LocalizationController@Localization');
Route::post('/state', 'LocalizationController@state');
Route::post('/city', 'LocalizationController@city');
Route::post('/postLocalization', 'LocalizationController@postLocalization');
Route::any('/LocalizationList', 'LocalizationController@LocalizationList');
Route::any('/LocalizationDelete/{id}', 'LocalizationController@LocalizationDelete');
Route::any('/editLocalization/{id}', 'LocalizationController@editLocalization');
Route::post('/states', 'LocalizationController@states');
Route::post('/citys', 'LocalizationController@citys');
Route::any('/updateLocalization/', 'LocalizationController@updateLocalization');

// PROMO CODE
Route::get('/promocode','PromocodeController@promocode');
Route::get('/createPromocode', 'PromocodeController@createPromocode');
Route::post('/postPromocode', 'PromocodeController@postPromocode'); 

Route::get('/blogs','BlogController@blogs'); 
Route::any('/createBlog', 'BlogController@createBlog');
Route::any('/postBlog', 'BlogController@postBlog');
Route::any('/BlogDelete/{id}', 'BlogController@BlogDelete');
Route::any('/editBlog/{id}', 'BlogController@editBlog');
Route::any('/updateBlog/', 'BlogController@updateBlog');

// });