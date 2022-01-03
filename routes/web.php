<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TokoController;

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
    $data = array(
        'menu' => 'Home',
        'submenu' => '',
    );

    return view('home',$data);
})->middleware('auth');

// Route::get('/home', function () {
//     $data = array(
//         'menu' => 'Home',
//         'submenu' => '',
//     );

//     return view('home',$data);
// });

Route::get('/webscan', function () {
    $data = array(
        'menu' => 'MasterTambahData',
        'submenu' => 'tambahdata',
    );

    return view('webscan',$data);
});

Route::get('/dropdown',[DropdownController::class, 'index']);
Route::get('/dropdown2',[DropdownController::class, 'index2']);
Route::get('/getCity',[DropdownController::class, 'getCity'])->name('getCity');
Route::get('/getDistrict',[DropdownController::class, 'getDistrict'])->name('getDistrict');
Route::get('/getSubdistrict',[DropdownController::class, 'getSubdistrict'])->name('getSubdistrict');

Route::get('/customer', [CustomerController::class, 'index']);
Route::post('/simpan', [CustomerController::class, 'simpan'])->name('simpan');
Route::post('/simpan2', [CustomerController::class, 'simpan2'])->name('simpan2');
Route::post('/importexcel', [CustomerController::class, 'importexcel'])->name('importexcel');

Route::get('/generate-pdf', [PDFController::class, 'generatePDF'])->name('generate');;
Route::get('/cetakpdf/{id_barang}/{col}/{row}', [PDFController::class, 'generatePDF']);;
Route::post('/generate2', [PDFController::class, 'generate'])->name('generate2');;

Route::get('/barang', [BarangController::class, 'index']);
Route::get('/barang/formBarang', [BarangController::class, 'formBarang'])->name('formBarang');
Route::post('/barang/tambahBarang', [BarangController::class, 'tambahBarang'])->name('tambahBarang');
Route::get('/scanner', [BarangController::class, 'scanner']);

Route::get('/toko', [TokoController::class, 'index']);
Route::get('/toko/formToko', [TokoController::class, 'formToko'])->name('formToko');
Route::post('/toko/tambahToko', [TokoController::class, 'tambahToko'])->name('tambahToko');
Route::get('/scannertoko', [TokoController::class, 'scanner'])->name('scannertoko');
Route::get('/getAllFields', [TokoController::class, 'getAllFields'])->name('getAllFields');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Google Login
Route::get('/login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');

Route::get('/login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

Route::get('/logout',function(){
    Auth::logout();
    return  redirect ('/login');
})->name('logout');