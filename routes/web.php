<?php


Route::group(['middleware' => 'auth'], function() {
	Route::get('/', function () {
	    return view('home');
	});
	Route::resource('master-karyawan', 'ControllerMasterKaryawan');
	Route::resource('master-jabatan', 'ControllerMasterJabatan');
	Route::resource('master-departemen', 'ControllerMasterDepartemen');
	Route::resource('master-tunjangan', 'ControllerMasterTunjangan');
	Route::resource('master-karyawan/gajian', 'ControllerDataKaryawan');
	Route::resource('master-karyawan/tunjangan', 'ControllerTunKaryawan');
	Route::resource('master-karyawan/detail', 'ControllerDetailPendapatan');
	Route::resource('master-potongan', 'ControllerMasterPotongan');
	Route::resource('master-transaksi', 'ControllerMasterTransaksi');
	Route::resource('absensi/data', 'ControllerMasterAbsensi');
	Route::post('absensi/data/create', 'ControllerMasterAbsensi@create');
	Route::resource('absensi', 'ControllerExcell');
	Route::post('absensi/import', 'ControllerExcell@importCsv');
	Route::post('absensi/generate', 'ControllerExcell@generate');
	Route::post('SearchByKoTrans', 'ControllerExcell@searchBy');
	Route::get('profile/{kode_karyawan}', 'ControllerHomeView@profile');
	Route::post('profile/{kode_karyawan}/update', 'ControllerHomeView@updatePass');
	Route::resource('password', 'ControllerPassword');
	Route::get('gajian/detail/{no_slip}', 'ControllerDetailPendapatan@showSlipGaji');
	Route::get('gajian/print/{no_slip}', 'ControllerDetailPendapatan@showPdfSlipGaji');
	Route::get('gajian/{kode_karyawan}', 'ControllerDetailPendapatan@showListSlip');
	// dashboard
	Route::get('dashboard', 'ControllerHomeView@index');
	Route::get('{kode_karyawan}/pdfview', array('as' => 'pdfview', 'uses' => 'ControllerDetailPendapatan@pdfview'));
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
