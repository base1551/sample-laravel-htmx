<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlcoholicBeverageController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('alcoholic_beverage')->controller(AlcoholicBeverageController::class)->group(function () {

    Route::get('/', 'index')->name('alcoholic_beverage.index');
    Route::get('/list', 'list')->name('alcoholic_beverage.list');
    Route::get('create', 'create')->name('alcoholic_beverage.create');
    Route::post('/', 'store')->name('alcoholic_beverage.store');
    Route::get('{alcoholic_beverage}', 'show')->name('alcoholic_beverage.show');
    Route::get('{alcoholic_beverage}/edit', 'edit')->name('alcoholic_beverage.edit');
    Route::put('{alcoholic_beverage}', 'update')->name('alcoholic_beverage.update');
    Route::delete('{alcoholic_beverage}', 'destroy')->name('alcoholic_beverage.destroy');
});
