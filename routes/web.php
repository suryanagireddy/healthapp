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

Route::get('/', 'HomeController@index')->name('home');


Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

//->middleware('auth');

Route::middleware(['auth'])->group(function () {

Route::get('techniques/create/{service_id?}', 'TechniquesController@create');
Route::resource('techniques', 'TechniquesController');

Route::resource('services', 'ServicesController');
Route::resource('roles', 'RolesController');
Route::resource('users', 'UsersController');
Route::resource('qualifications', 'QualificationsController');

});



