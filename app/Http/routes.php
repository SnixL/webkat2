<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {

	Route::get('/websites', 'SiteController@sitelisting');
	
	Route::get('/addwebsite', 'SiteController@index');
	
	Route::post('/addwebsite', 'SiteController@create');
	
	Route::get('/', function () {
        return view('welcome');
    });
	Route::get('/impressum', function () {
		return view('impressum');
	});
	
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
	
});

