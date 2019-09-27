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

Route::get('/syarat-ketentuan', function () {
	return view('home');
}); 

Route::group(['prefix' => '/'], function(){

	Route::get('email/verify', 'Organizer\VerificationController@show')->name('verification.notice');
	Route::get('email/verify/{id}', 'Organizer\VerificationController@verify')->name('verification.verify');
	Route::get('email/resend', 'Organizer\VerificationController@resend')->name('verification.resend');


	Route::get('register', 'Organizer\AuthOrganizerController@showRegisterForm')->name('register');
	Route::post('register','Organizer\AuthOrganizerController@register',(['verify' => true]))->name('organizer.register');

	Route::get('login', 'Organizer\AuthOrganizerController@showLoginForm')->name('login');
	Route::post('login','Organizer\AuthOrganizerController@login')->name('organizer.login');
	Route::post('logout','Organizer\AuthOrganizerController@logoutOrganizer')->name('logout');

	Route::get('home', 'Organizer\HomeController@index')->name('organizer.home')->middleware('verified');


	Route::get('event-saya', 'Organizer\BuatEventController@index')->name('organizer.event.index');

	Route::get('buat-event','Organizer\BuatEventController@create')->name('organizer.buat');

	Route::post('buat-event', 'Organizer\BuatEventController@store')->name('organizer.buatevent'); 

	Route::get('event-saya/edit/{id}', 'Organizer\BuatEventController@edit')->name('organizer.editevent');

	Route::patch('event-saya/update/{id}', 'Organizer\BuatEventController@update')->name('organizer.updateevent');

	Route::get('event-saya/detail/{id}', 'Organizer\BuatEventController@show')->name('organizer.detailevent');

	Route::get('event-saya/destroy/{id}', 'Organizer\BuatEventController@destroy')->name('organizer.hapusevent');

	Route::get('event-saya/detail/{id}/pemesan', 'Organizer\BuatEventController@showpmsn')->name('organizer.pemesanevent');

	Route::get('event-saya/detail/{id}/penjualan', 'Organizer\BuatEventController@showpnjln')->name('organizer.penjualanevent');
	Route::get('event-saya/detail/{id}/penjualan/cetak', 'Organizer\BuatEventController@showpnjln_cetak')->name('organizer.penjualanevent_cetak');


	Route::get('event-saya/detail/{id}/check-in', 'Organizer\BuatEventController@showcheck')->name('organizer.checkinevent');
	Route::get('event-saya/detail/{id}/check-in/cetak', 'Organizer\BuatEventController@showcheck_cetak')->name('organizer.checkinevent.cetak');

	Route::patch('event-saya/detail/{id}/check-in/{kode_tiket}', 'Organizer\BuatEventController@checkin')->name('organizer.checkinevent.act');


	Route::get('beli-offline', 'Organizer\BeliOfflineController@index')->name('organizer.belioffline');

	Route::patch('beli-offline/beli', 'Organizer\BeliOfflineController@beli')->name('organizer.belioffline.beli');




	Route::get('profil-saya/informasi-dasar', 'Organizer\ProfilController@edit')->name('organizer.profil');

	Route::patch('profil-saya/update', 'Organizer\ProfilController@update')->name('organizer.updateprofil');

	Route::get('profil-saya/rekening-kamu', 'Organizer\ProfilController@editrek')->name('organizer.profilrek');

	Route::patch('profil-saya/updaterek', 'Organizer\ProfilController@updaterek')->name('organizer.updateprofilrek');

	Route::get('profil-saya/ubah-password', 'Organizer\ProfilController@changepass')->name('organizer.password.change');
	
	Route::patch('profil-saya/ubah-password', 'Organizer\ProfilController@updatepass')->name('organizer.password.update');


	// Route::get('event-saya/detail/1', function(){
 //    return view('pages.organizer.detailevent');
 //  	})->name('organizer.detailevent')->middleware('auth:organizer');

});

Route::group(['prefix' => 'admin/'], function(){
	

	Route::get('login', 'Admin\AuthAdminController@showLoginForm')->name('admlogin');
	Route::post('login','Admin\AuthAdminController@login')->name('admin.login');
	Route::post('logout','Admin\AuthAdminController@logoutAdmin')->name('admlogout');

	Route::get('home', 'Admin\HomeController@index')->name('admin.home');

	
	Route::get('organizer', 'Admin\DataOrganizerController@index')->name('admin.organizer.index');
	Route::get('organizer/destroy/{id}', 'Admin\DataOrganizerController@destroy');
	Route::get('organizer/show/{id}', 'Admin\DataOrganizerController@show')->name('admin.organizer.show');
	Route::patch('organizer/reset/{id}', 'Admin\DataOrganizerController@reset')->name('admin.organizer.reset');

	Route::get('event', 'Admin\EventController@index')->name('admin.event.index');
	Route::get('event/destroy/{id}', 'Admin\EventController@destroy');
	Route::get('event/show/{id}', 'Admin\EventController@show')->name('admin.event.show');

	Route::get('order', 'Admin\TransactionController@index')->name('admin.trans.index');
	Route::get('order/destroy/{id}', 'Admin\TransactionController@destroy');
	Route::get('order/show/{id}', 'Admin\TransactionController@show')->name('admin.order.show');
	Route::patch('order/confirm/{id}', 'Admin\TransactionController@confirm')->name('admin.order.confirm');
	Route::patch('order/cancel/{id}', 'Admin\TransactionController@cancel')->name('admin.order.cancel');


	Route::get('visitor', 'Admin\UserController@index')->name('admin.visitor.index');
	Route::get('visitor/destroy/{id}', 'Admin\UserController@destroy');
	Route::get('visitor/show/{id}', 'Admin\UserController@show')->name('admin.visitor.show');
	Route::patch('visitor/reset/{id}', 'Admin\UserController@reset')->name('admin.visitor.reset');


	Route::get('campus', 'Admin\CampusController@index')->name('admin.campus.index');
	Route::get('campus/destroy/{id}', 'Admin\CampusController@destroy');

	Route::get('campus/edit/{id}','Admin\CampusController@edit')->name('admin.campus.edit');
	Route::patch('campus/update/{id}', 'Admin\CampusController@update')->name('admin.campus.update');

	Route::post('campus/add', 'Admin\CampusController@store')->name('admin.campus.add');


	Route::get('income', 'Admin\PendapatanController@index')->name('admin.income.index');
	Route::get('income/cetak', 'Admin\PendapatanController@cetak')->name('admin.income.cetak');

	Route::get('transfer', 'Admin\TransferHasilController@index')->name('admin.transfer.index');

	Route::patch('transfer/send/{id}', 'Admin\TransferHasilController@send')->name('admin.transfer.send');



});

