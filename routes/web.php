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

Route::get('/', function () {
    return view('app.home');
});

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::get('/outbreaks', 'AdminController@outbreaks')->name('admin.outbreaks');
    Route::get('/outbreaks/{outbreak}', 'AdminController@outbreak')->name('admin.outbreak');
    Route::get('/outbreaks/{outbreak}/studies', 'AdminController@index')->name('admin.studies');
    Route::get('/outbreaks/{outbreak}/studies/{study}', 'AdminController@study')->name('admin.study');
});

Route::prefix('api')->group(function() {
	// Outbreaks
	Route::get('/outbreaks', 'Api\OutbreakController@index')->name('outbreaks');
	Route::post('/outbreaks', 'Api\OutbreakController@store')->name('outbreaks.post');
	Route::get('/outbreaks/{outbreak}', 'Api\OutbreakController@show')->name('outbreaks.get');
	Route::put('/outbreaks/{outbreak}', 'Api\OutbreakController@update')->name('outbreaks.put');
	Route::delete('/outbreaks/{outbreak}', 'Api\OutbreakController@delete')->name('outbreaks.delete');

	// Api\Studies
	Route::get('/studies', 'Api\StudyController@index')->name('studies');
	Route::post('/studies', 'Api\StudyController@store')->name('studies.post');
	Route::get('/studies/{study}', 'Api\StudyController@show')->name('studies.get');
	Route::put('/studies/{study}', 'Api\StudyController@update')->name('studies.put');
	Route::delete('/studies/{study}', 'Api\StudyController@delete')->name('studies.delete');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
