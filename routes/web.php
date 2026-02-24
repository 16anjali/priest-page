<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\BhandaraController;
use App\Http\Controllers\Admin\PriestController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Admin Routes
| TODO: Add auth middleware before going live → ->middleware('auth')
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/', function () {
        return redirect()->route('admin.bhandara.index');
    });

    // Priest profile
    Route::get('/priest/edit',    [PriestController::class, 'edit'])->name('priest.edit');
    Route::put('/priest/update',  [PriestController::class, 'update'])->name('priest.update');

    // Bhandara events CRUD
    Route::resource('bhandara', BhandaraController::class);
});
