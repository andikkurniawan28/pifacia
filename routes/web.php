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
use App\Http\Controllers\KategoriProdukController;

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
