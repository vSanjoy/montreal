<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace'=>'admin', 'prefix'=>'adminpanel', 'as'=>'admin.'], function() {
    Route::any('/', 'AuthController@login')->name('login');
    Route::any('/forgot-password', 'AuthController@forgotPassword')->name('forgot-password');
    Route::any('/reset-password/{token}', 'AuthController@resetPassword')->name('reset-password');
    Route::post('/ckeditor-upload', 'CmsController@upload')->name('ckeditor-upload');
    Route::any('/401', 'AuthController@unauthorizedAccess')->name('401');    // Unauthorized access

    Route::group(['middleware' => 'backend'], function () {
        Route::get('/dashboard', 'AccountController@dashboard')->name('dashboard');
        Route::any('/profile', 'AccountController@profile')->name('profile');
        Route::post('/account/delete-uploaded-image', 'AccountController@deleteUploadedImage')->name('delete-uploaded-image');
        Route::any('/change-password', 'AccountController@changePassword')->name('change-password');
        Route::any('/generate-slug', 'AccountController@generateSlug')->name('generate-slug');
        Route::any('/logout', 'AuthController@logout')->name('logout');

        Route::group(['middleware' => 'admin'], function () {
            Route::any('/website-settings', 'AccountController@websiteSettings')->name('website-settings');
    
            Route::group(['prefix' => 'users', 'as' => 'user.'], function () {
                Route::get('/list', 'UsersController@list')->name('list');
                Route::get('/add', 'UsersController@add')->name('add');
                Route::post('/add-submit', 'UsersController@add')->name('addsubmit');
                Route::get('/edit/{id}', 'UsersController@edit')->name('edit');
                Route::post('/edit-submit/{id}', 'UsersController@edit')->name('editsubmit');
                Route::get('/status/{id}', 'UsersController@status')->name('change-status');
                Route::any('/change-password/{id}', 'UsersController@changePassword')->name('change-password');                
                Route::get('/delete/{id}', 'UsersController@delete')->name('delete');
            });

            Route::group(['prefix' => 'service', 'as' => 'service.'], function () {
                Route::get('/', 'ServicesController@list')->name('list');
                Route::post('ajax-list-request', 'ServicesController@ajaxListRequest')->name('ajax-list-request');
                Route::get('/add', 'ServicesController@add')->name('add');
                Route::post('/add-submit', 'ServicesController@add')->name('add-submit');
                Route::get('/edit/{id}', 'ServicesController@edit')->name('edit');
                Route::any('/edit-submit/{id}', 'ServicesController@edit')->name('edit-submit');
                Route::get('/status/{id}', 'ServicesController@status')->name('change-status');
                Route::get('/delete/{id}', 'ServicesController@delete')->name('delete');
                Route::post('/delete-uploaded-image', 'ServicesController@deleteUploadedImage')->name('delete-uploaded-image');
                Route::get('/sort', 'ServicesController@sort')->name('sort');
                Route::post('/save-sort', 'ServicesController@saveSort')->name('save-sort');
                Route::post('/bulk-actions', 'ServicesController@bulkActions')->name('bulk-actions');
            });

            Route::group(['prefix' => 'portfolioCategory', 'as' => 'portfolioCategory.'], function () {
                Route::get('/', 'PortfolioCategoriesController@list')->name('list');
                Route::post('ajax-list-request', 'PortfolioCategoriesController@ajaxListRequest')->name('ajax-list-request');
                Route::get('/add', 'PortfolioCategoriesController@add')->name('add');
                Route::post('/add-submit', 'PortfolioCategoriesController@add')->name('add-submit');
                Route::get('/edit/{id}', 'PortfolioCategoriesController@edit')->name('edit');
                Route::any('/edit-submit/{id}', 'PortfolioCategoriesController@edit')->name('edit-submit');
                Route::get('/status/{id}', 'PortfolioCategoriesController@status')->name('change-status');
                Route::get('/delete/{id}', 'PortfolioCategoriesController@delete')->name('delete');
                Route::post('/delete-uploaded-image', 'PortfolioCategoriesController@deleteUploadedImage')->name('delete-uploaded-image');
                Route::get('/sort', 'PortfolioCategoriesController@sort')->name('sort');
                Route::post('/save-sort', 'PortfolioCategoriesController@saveSort')->name('save-sort');
                Route::post('/bulk-actions', 'PortfolioCategoriesController@bulkActions')->name('bulk-actions');
            });

            Route::group(['prefix' => 'portfolio', 'as' => 'portfolio.'], function () {
                Route::get('/', 'PortfoliosController@list')->name('list');
                Route::post('ajax-list-request', 'PortfoliosController@ajaxListRequest')->name('ajax-list-request');
                Route::get('/add', 'PortfoliosController@add')->name('add');
                Route::post('/add-submit', 'PortfoliosController@add')->name('add-submit');
                Route::get('/edit/{id}', 'PortfoliosController@edit')->name('edit');
                Route::any('/edit-submit/{id}', 'PortfoliosController@edit')->name('edit-submit');
                Route::get('/status/{id}', 'PortfoliosController@status')->name('change-status');
                Route::get('/delete/{id}', 'PortfoliosController@delete')->name('delete');
                Route::post('/delete-uploaded-image', 'PortfoliosController@deleteUploadedImage')->name('delete-uploaded-image');
                Route::get('/sort', 'PortfoliosController@sort')->name('sort');
                Route::post('/save-sort', 'PortfoliosController@saveSort')->name('save-sort');
                Route::post('/bulk-actions', 'PortfoliosController@bulkActions')->name('bulk-actions');
            });

            Route::group(['prefix' => 'enquiry', 'as' => 'enquiry.'], function () {
                Route::get('/', 'EnquiriesController@list')->name('list');
                Route::post('ajax-list-request', 'EnquiriesController@ajaxListRequest')->name('ajax-list-request');
                Route::get('/view/{id}', 'EnquiriesController@view')->name('view');
                Route::get('/delete/{id}', 'EnquiriesController@delete')->name('delete');
                Route::post('/bulk-actions', 'EnquiriesController@bulkActions')->name('bulk-actions');
                Route::get('/export', 'EnquiriesController@export')->name('export');
            });

            Route::group(['prefix' => 'contact', 'as' => 'contact.'], function () {
                Route::get('/', 'ContactsController@list')->name('list');
                Route::post('ajax-list-request', 'ContactsController@ajaxListRequest')->name('ajax-list-request');
                Route::get('/view/{id}', 'ContactsController@view')->name('view');
                Route::get('/delete/{id}', 'ContactsController@delete')->name('delete');
                Route::post('/bulk-actions', 'ContactsController@bulkActions')->name('bulk-actions');
                Route::get('/export', 'ContactsController@export')->name('export');
            });

            Route::group(['prefix' => 'role', 'as' => 'role.'], function () {
                Route::get('/', 'RolesController@list')->name('list');
                Route::post('ajax-list-request', 'RolesController@ajaxListRequest')->name('ajax-list-request');
                Route::get('/add', 'RolesController@add')->name('add');
                Route::post('/add-submit', 'RolesController@add')->name('add-submit');
                Route::get('/edit/{id}', 'RolesController@edit')->name('edit');
                Route::any('/edit-submit/{id}', 'RolesController@edit')->name('edit-submit');
                Route::get('/status/{id}', 'RolesController@status')->name('change-status');
                Route::get('/delete/{id}', 'RolesController@delete')->name('delete');
                Route::post('/bulk-actions', 'RolesController@bulkActions')->name('bulk-actions');
            });

            Route::group(['prefix' => 'subAdmin', 'as' => 'subAdmin.'], function () {
                Route::get('/', 'SubAdminsController@list')->name('list');
                Route::post('ajax-list-request', 'SubAdminsController@ajaxListRequest')->name('ajax-list-request');
                Route::get('/add', 'SubAdminsController@add')->name('add');
                Route::post('/add-submit', 'SubAdminsController@add')->name('add-submit');
                Route::get('/edit/{id}', 'SubAdminsController@edit')->name('edit');
                Route::any('/edit-submit/{id}', 'SubAdminsController@edit')->name('edit-submit');
                Route::get('/status/{id}', 'SubAdminsController@status')->name('change-status');
                Route::get('/delete/{id}', 'SubAdminsController@delete')->name('delete');
                Route::post('/delete-uploaded-image', 'SubAdminsController@deleteUploadedImage')->name('delete-uploaded-image');
                Route::post('/bulk-actions', 'SubAdminsController@bulkActions')->name('bulk-actions');
            });

            Route::group(['prefix' => 'cms', 'as' => 'cms.'], function () {
                Route::get('/', 'CmsController@list')->name('list');
                Route::post('ajax-list-request', 'CmsController@ajaxListRequest')->name('ajax-list-request');
                Route::get('/add', 'CmsController@add')->name('add');
                Route::post('/add-submit', 'CmsController@add')->name('add-submit');
                Route::get('/edit/{id}', 'CmsController@edit')->name('edit');
                Route::post('/edit-submit/{id}', 'CmsController@edit')->name('edit-submit');
                Route::get('/status/{id}', 'CmsController@status')->name('change-status');
                Route::post('/delete-uploaded-image', 'CmsController@deleteUploadedImage')->name('delete-uploaded-image');
            });
            
        });

    });

});


