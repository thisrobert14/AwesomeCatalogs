<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogsController;
use App\Http\Controllers\AuthenticationController;

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

Route::prefix('catalogs')->group(function () {
    Route::get('/', [CatalogsController::class, 'listCatalogs'])->name('show.catalogs');
    Route::get('/create', [CatalogsController::class, 'listCreateCatalog'])->name('show.create-catalog');
});

Route::name('authentication.')->group(function () {
    Route::get('/login', [AuthenticationController::class, 'showLogin'])->name('login');
    Route::get('/register', [AuthenticationController::class, 'showRegister'])->name('register');
});
