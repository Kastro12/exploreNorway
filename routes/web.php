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



Route::get('/','PagesController@index');

Route::get('/gallery','GalleryController@index');
Route::get('/routes','RoutesController@index');
Route::get('/profile','ProfileController@index')->name('profile');
Route::get('/profile/impressions','ProfileController@impressions')->name('impressions');
Route::post('/profile/impressions','ProfileController@impressionsStorage');
Route::post('/sendEmail','ContactController@index')->name('sendEmail');

Auth::routes();
Route::get('/home', 'PagesController@index');



Route::prefix('routes')->group(function (){

Route::get('/create_route','RoutesController@create_route')->name('create_route');
Route::post('/create_route','RoutesController@create_R');
Route::get('/create_post','RoutesController@create_post')->name('create_post');
Route::post('/join','RoutesController@join');

});


Route::prefix('admin')->group(function(){

    Route::get('','Admin\HomeController@index')->name('admin');
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');


    //USERS
    Route::get('/users','Admin\UsersController@index')->name('users');
    Route::get('/users/with','Admin\UsersController@usersWith')->name('usersWith');
    Route::get('/users/without','Admin\UsersController@usersWithout')->name('usersWithout');
    Route::delete('/users/without/{id}','Admin\UsersController@destroy');

    //END USERS ROUTE

    //RESERVATIONS
    Route::get('/reservations','Admin\ReservationsController@index')->name('reservations');
    Route::get('/reservations/unconfirmed','Admin\ReservationsController@unconfirmed')->name('reservationsUnconfirmed');
    Route::get('/reservations/unconfirmed/edit/{id}','Admin\ReservationsController@edit')->name('reserveEdit');
    Route::get('/reservations/confirmed','Admin\ReservationsController@confirmed')->name('reservationsConfirmed');
    Route::get('/reservations/settledDebts','Admin\ReservationsController@settledDebts')->name('settledDebts');
    Route::put('/reservations/confirmed/update/{id}','Admin\ReservationsController@update')->name('reservationsUpdate');
    Route::delete('/reservations/unconfirmed/{id}','Admin\ReservationsController@destroy');

    //END RESERVATIONS ROUTE

    //ROUTES
    Route::get('/routes','Admin\RoutesController@index')->name('routes');//users wishes
    Route::get('/routes/current','Admin\RoutesController@current')->name('current');
    Route::get('/routes/filled','Admin\RoutesController@filled')->name('filled');
    Route::get('/routes/create','Admin\RoutesController@create')->name('admincreateroute');
    Route::post('/routes/create','Admin\RoutesController@store');
    Route::put('/routes/current/{id}','Admin\RoutesController@lock');
    Route::delete('/routes/current/delete/{id}','Admin\RoutesController@destroy');
    Route::get('/routes/filled/edit/{id}','Admin\RoutesController@edit')->name('routeEdit');
    Route::put('/routes/filled/update/{id}','Admin\RoutesController@update');

    //END ROUTES ROUTE

    //ACTIVITIES
    Route::get('/activities','Admin\ActivitiesController@index')->name('activities');
    Route::get('/activities/insert','Admin\ActivitiesController@insert')->name('activitiesInsert');
    Route::post('/activities/insert','Admin\ActivitiesController@insertActivity');
    Route::delete('/activities/{id}','Admin\ActivitiesController@destroy');
    Route::put('/activities/update/{id}','Admin\ActivitiesController@update');

    //END ACTIVITIES ROUTE

    //GALLERY
    Route::get('/gallery','Admin\GalleryController@index')->name('gallery');
    Route::get('/gallery/insert','Admin\GalleryController@insert')->name('galleryInsert');
    Route::delete('/gallery/{id}','Admin\GalleryController@destroy');
    Route::post('/gallery/insert','Admin\GalleryController@create');

    //END GALLERY ROUTE

    //IMPRESSIONS
    Route::get('/impressions','Admin\ImpressionsController@index')->name('AdminImpressions');
    Route::put('/impressions/{id}','Admin\ImpressionsController@confirm');
    Route::delete('/impressions/{id}','Admin\ImpressionsController@destroy');


    //END IMPRESSIONS ROUTE

});