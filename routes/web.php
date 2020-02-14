<?php

use App\Models\Transaction;
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

//project web laravel 

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Route::get('register', function () {
    return view('register');
});

Route::get('/pegawai', 'productcontroller@index');
Route::get('/users/cari', 'productcontroller@cari');

//route CRUD
Route::get('/pegawai', 'PegawaiController1@index');
Route::get('/pegawai/tambah', 'PegawaiController1@tambah');
Route::post('/pegawai/store', 'PegawaiController1@store');
//update CRUD
Route::get('/pegawai/edit/{id}', 'PegawaiController1@edit');
Route::post('/pegawai/update', 'PegawaiController1@update');
//hapus CRUD
Route::get('/pegawai/hapus/{id}', 'PegawaiController1@hapus');

Route::get('/input', 'MalasngodingController@input');

Route::post('/proses', 'MalasngodingController@proses');
//search
Route::get('/pegawai', 'PegawaiController@index');
Route::get('/pegawai/cari', 'PegawaiController@cari');
Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {
    // Route::get('users', 'Web\UsersController@index')->name('data.user');
    // Route::get('users', 'Web\UsersController@destroy')->name('data.destroy');
    Route::resource('user', 'Web\UsersController');

    Route::resource('product', 'Web\ProductsController');


    Route::resource('transactions', 'Web\TransactionWebController', [
        'only' => ['index', 'show', 'edit', 'update', 'create', 'destroy'],
    ]);

    // Route::get('product', 'Web\ProductsController@index')->name('product.index');
    // Route::get('product/create', 'Web\ProductsController@create')->name('product.create');
    // Route::post('product', 'Web\ProductsController@store')->name('product.store');
    // Route::get('product/{idproduct}', 'Web\ProductsController@show')->name('product.show');
    // Route::get('product/{idproduct}/edit', 'Web\ProductsController@edit')->name('product.edit'); 
    // Route::put('product/{idproduct}', 'Web\ProductsController@update')->name('product.update'); 
    // Route::delete('product/{idproduct}', 'Web\ProductsController@destroy')->name('product.destroy'); 
});
