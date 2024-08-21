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
// Route::post('auth/login', 'AuthController@login');

// Route::group(['middleware' => ['auth:api']], function (){
//     Route::prefix('auth')->group(function () {
//         Route::post('logout', 'AuthController@logout');
//         Route::post('refresh', 'AuthController@refresh');
//         Route::get('me', 'AuthController@me');
//     });

//     Route::get('careers/getApplicants','CareerController@getApplicants');
//     Route::apiResource('careers','CareerController');
//     Route::put('careers/{career}/changeStatus','CareerController@changeStatus');
//     Route::get('getFormInputs','StaticsController@getFormInputs');

//     // Route::apiResource('events','EventController');
//     // Route::apiResource('news','NewsController');
//     Route::apiResource('articles','ArticleController');

//     Route::post('updateStatics','StaticsController@store');
//     Route::get('subscribers','HomeController@subscribers');
//     Route::get('contactusMessages','HomeController@contactusMessages');

// });

Route::group(['middleware'=>['lang','visitor'] ],function () {

    Route::get('downloadBrochure/{id}', 'HomeController@downloadProjectFile');

    Route::get('homePage', 'HomeController@mainPage');
    Route::get('service-page', 'HomeController@servicePage');
    Route::get('contact_info', 'HomeController@contactInfo');

    //about us page
    Route::get('about-us', 'AboutUsController@getContent');


     // services
     Route::get('services', 'HomeController@services');
    //albums page
    Route::get('albums', 'AlbumController@allAlbums');
    Route::get('album/{id}', 'AlbumController@singleAlbum');


// allNews
    Route::get('allNews', 'HomeController@allNews');
    Route::get('news/{id}', 'HomeController@singleNews');

// all testimonials
    Route::get('allTestimonials', 'TestimonialController@allTestimonials');
    Route::get('testimonial/{id}', 'TestimonialController@testimonial');


    // all testimonials
    Route::get('allLocations', 'LocationController@allLocations');
    Route::get('location/{id}', 'LocationController@location');

    // store contact us message
    Route::post('store-contact-us', 'HomeController@storeContactUS');


// contacts


});
