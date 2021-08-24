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
    $data['title'] = "Login ";
    return view('auth.login', $data);
})->middleware('guest');

Auth::routes();

Route::group(['middleware' => ['auth', 'checkRole:admin']], function(){

    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('merek', 'MerekController');

    Route::resource('mobil', 'MobilController');

    Route::resource('karyawan', 'KaryawanController');

    Route::resource('pelanggan', 'PelangganController');

    Route::get('pengembalian', ['as' => 'pengembalian.index', 'uses' => 'PengembalianController@index' ]);

    //Route::post('biaya_tambahan', ['as' => 'biaya_tambahan', 'uses' => 'PengembalianController@biaya_tambahan']);
    
    Route::get('pengembalian/edit/{id}', ['as' => 'pengembalian.biaya', 'uses' => 'PengembalianController@edit']);

    Route::post('pengembalian/biaya_tambahan/{id}', ['as' => 'pengembalian.biaya_tambahan', 'uses' => 'PengembalianController@biaya_tambahan']);

    Route::get('pengembalian/informasi', ['as' => 'pengembalian.informasi', 'uses' => 'PengembalianController@informasi']);

    Route::post('pengembalian/proses', ['as' => 'pengembalian.proses', 'uses' => 'PengembalianController@proses']);

    Route::get('laporan/transaksi', 'LaporanController@index');
});


//booking daftar iki seng iso
Route::get('booking/daftar', ['as' => 'pelanggan.create', 'uses' => 'PelangganController@create']);

Route::get('booking', ['as' => 'booking.index', 'uses' => 'BookingController@index' ]);

Route::get('booking/mobil', ['as' => 'booking.mobil', 'uses' => 'BookingController@mobil']);

//Route::get('booking/daftar',['as' => 'pelanggan.create', 'uses' => 'PelangganController@create']);

//Route::post('booking',['as' => 'pelanggan.store', 'uses' => 'PelangganController@store']);

Route::get('list-member', 'BookingController@listMember');

Route::post('create-client', ['as' => 'create-client', 'uses' => 'BookingController@createClient' ]);
//Route::get('booking/pesan', ['as' => 'list-member', 'uses' => 'BookingController@listMember']);

Route::post('booking/details', ['as' => 'booking.hitung', 'uses' => 'BookingController@hitung']);

Route::post('booking/proses', ['as' => 'booking.proses', 'uses' => 'BookingController@proses']);



//Route::get('pelanggan', 'PelangganController@index');

//Route::get('pelanggan/edit', 'PelangganController@edit');