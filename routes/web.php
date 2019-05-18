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
    return view('welcome');
}); 

Route::group(['prefix' => '/'], function(){
	Route::get('email/verify','Organizer\VerificationController@resend');
	Route::get('register', 'Organizer\AuthOrganizerController@showRegisterForm')->name('register');
	Route::post('register','Organizer\AuthOrganizerController@register')->name('organizer.register');

	Route::get('login', 'Organizer\AuthOrganizerController@showLoginForm')->name('login');
	Route::post('login','Organizer\AuthOrganizerController@login')->name('organizer.login');
	Route::post('logout','Organizer\AuthOrganizerController@logoutOrganizer')->name('logout');

	Route::get('home', 'Organizer\HomeController@index')->name('organizer.home');

});

