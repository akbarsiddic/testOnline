<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\PegawaiController;

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

Route::get("/kecamatan", [KecamatanController::class, "index"]);
Route::post("/kecamatan/add", [KecamatanController::class, "add"]);
Route::post("/kecamatan/update/{id}", [KecamatanController::class, "edit"])->name("kecamatan.update");
Route::get("/kecamatan/delete/{id}", [KecamatanController::class, "delete"])->name("kecamatan.delete");

Route::get("/provinsi", [ProvinsiController::class, "index"]);
Route::post("/provinsi/add", [ProvinsiController::class, "add"]);
Route::post("/provinsi/update/{id}", [ProvinsiController::class, "edit"])->name("provinsi.update");
Route::get("/provinsi/delete/{id}", [ProvinsiController::class, "delete"])->name("provinsi.delete");

Route::get("/kelurahan", [KelurahanController::class, "index"]);
Route::post("/kelurahan/add", [KelurahanController::class, "add"]);
Route::post("/kelurahan/update/{id}", [KelurahanController::class, "edit"])->name("kelurahan.update");
Route::get("/kelurahan/delete/{id}", [KelurahanController::class, "delete"])->name("kelurahan.delete");

Route::get("/pegawai", [PegawaiController::class, "index"]);
Route::post("/pegawai/add", [PegawaiController::class, "add"]);
Route::post("/pegawai/update/{id}", [PegawaiController::class, "edit"])->name("pegawai.update");
Route::get("/pegawai/delete/{id}", [PegawaiController::class, "delete"])->name("pegawai.delete");