<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\CustomerController;

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
    return view('home');
});

Route::get('/dropdown',[DropdownController::class, 'index']);
Route::get('/dropdown2',[DropdownController::class, 'index2']);
Route::get('/getCity',[DropdownController::class, 'getCity'])->name('getCity');
Route::get('/getDistrict',[DropdownController::class, 'getDistrict'])->name('getDistrict');
Route::get('/getSubdistrict',[DropdownController::class, 'getSubdistrict'])->name('getSubdistrict');

Route::post('/simpan', [CustomerController::class, 'simpan'])->name('simpan');
Route::post('/simpan2', [CustomerController::class, 'simpan2'])->name('simpan2');

Route::get('/barcode',[DropdownController::class, 'index']);