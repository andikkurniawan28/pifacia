<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleImportController;
use App\Http\Controllers\UserImportController;
use App\Http\Controllers\ProdukImportController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\SupplierImportController;
use App\Http\Controllers\KategoriProdukImportController;

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

Route::get('/', "HomeController@index")->name("home");

Route::get("login", "AuthController@login")->name("login");
Route::get("register", "AuthController@register")->name("register");
Route::get("logout", "AuthController@logout")->name("logout");
Route::post("login", "AuthController@loginProcess")->name("login_process");

Route::get('dashboard', 'DashboardController')->name('dashboard');
Route::resource('role', 'RoleController')->middleware(["auth"]);
Route::resource('user', 'UserController')->middleware(["auth", "only_admin"]);
Route::resources([
    "kategori_produk"   => "KategoriProdukController",
    "supplier"          => "SupplierController",
    "produk"            => "ProdukController",
]);

Route::get("restore/{model}/{id}", "RestoreController")->name("restore");

Route::get("test", "TestController")->name("test");

Route::get("role-import", "RoleImportController@index")->name("role-import");
Route::post("role-import", "RoleImportController@process")->name("role-process");
Route::get("user-import", "UserImportController@index")->name("user-import");
Route::post("user-import", "UserImportController@process")->name("user-process");
Route::get("kategori_produk-import", "KategoriProdukImportController@index")->name("kategori_produk-import");
Route::post("kategori_produk-import", "KategoriProdukImportController@process")->name("kategori_produk-process");
Route::get("supplier-import", "SupplierImportController@index")->name("supplier-import");
Route::post("supplier-import", "SupplierImportController@process")->name("supplier-process");
Route::get("produk-import", "ProdukImportController@index")->name("produk-import");
Route::post("produk-import", "ProdukImportController@process")->name("produk-process");
