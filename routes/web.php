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

Route::middleware(['auth'])->group(function () {
    Route::prefix('catalogs')->group(function () {
        Route::get('/', [CatalogsController::class, 'listCatalogs'])->name('show.catalogs');
        Route::get('/individual', [CatalogsController::class, 'listIndividualCatalogs'])->name('show.individual-catalogs');
        Route::get('/create', [CatalogsController::class, 'listCreateCatalog'])->name('show.create-catalog');
        Route::get('/{catalog}', [CatalogsController::class, 'listCatalog'])->name('show.catalog');
        Route::get('/update/{catalog}', [CatalogsController::class, 'listUpdate'])->name('show.update-catalog');
        Route::get('/delete/{catalog}', [CatalogsController::class, 'listDelete'])->name('show.delete-catalog');
    });
});

Route::middleware(['guest'])->group(function () {
    Route::name('authentication.')->group(function () {
        Route::get('/login', [AuthenticationController::class, 'showLogin'])->name('login');
        Route::get('/register', [AuthenticationController::class, 'showRegister'])->name('register');
    });
});
