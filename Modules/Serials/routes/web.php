<?php

use Illuminate\Support\Facades\Route;
use Modules\Serials\Http\Controllers\SerialsController;


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

Route::group([], function () {
    Route::resource('serials', SerialsController::class)->names('serials');
});

Route::middleware('auth')->prefix('app/serials')->group(function(){
    Route::get('/', [SerialsController::class, 'index'])->name('app.serials.index');
    Route::get('create', [SerialsController::class,'create'])->name('app.serials.create');
    Route::post('store', [SerialsController::class,'store'])->name('app.serials.store');
    Route::get('edit/{id}', [SerialsController::class,'edit'])->name('app.serials.edit');
    Route::patch('edit/{id}', [SerialsController::class,'update'])->name('app.serials.update');
    Route::delete('{id}', [SerialsController::class,'destroy'])->name('app.serials.delete');
});
