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

Route::group(['namespace' => 'api', 'prefix' => 'v1'], function () {
    Route::group(['middleware' => 'api'], function () {
        // Root url
        Route::get('/', 'HomeController@index')->name('api_index');
        
        // Header section
        Route::group(['prefix' => 'header'], function () {
            Route::any('/header-details', 'HomeController@headerDetails')->name('api_header_details');
        });
        // Home page section
        Route::group(['prefix' => 'home'], function () {
            Route::any('/home-page-details', 'HomeController@homePageDetails')->name('api_home_page_details');
        });
        // Enquiry section
        Route::group(['prefix' => 'capture'], function () {
            Route::post('/enquiry', 'HomeController@enquiry')->name('api_enquiry');
        });
        // Footer section
        Route::group(['prefix' => 'footer'], function () {
            Route::any('/footer-details', 'HomeController@footerDetails')->name('api_footer_details');
        });
    });
});
