<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogsController;
use App\Http\Controllers\ResourcesController;
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
        Route::get('/{catalog}', [CatalogsController::class, 'listCatalog'])->name('show.catalog');
    });
    Route::prefix('resources')->group(function () {
        Route::get('/{resource}', [ResourcesController::class, 'listResource'])->name('show.resource');
        Route::get('/{resource}/comments/{comment}', [ResourcesController::class, 'listResourceComments'])->name('show.resource-comments');
    });
});

Route::middleware(['guest'])->group(function () {
    Route::name('authentication.')->group(function () {
        Route::get('/login', [AuthenticationController::class, 'showLogin'])->name('login');
        Route::get('/register', [AuthenticationController::class, 'showRegister'])->name('register');
    });
});
