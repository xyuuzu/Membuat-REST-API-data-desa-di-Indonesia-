<?php

use App\Http\Controllers\VillageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravolt\Indonesia\Models\Village;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(VillageController::class)->group(function () {
    Route::get('/village','index')->name('village.index');
    Route::get('/village/{id}', 'show')->name('village.show');
    Route::post('/village/','store')->name('village.store');
    Route::post('/village/{id}', 'update')->name('village.update'); 
    Route::delete('/village/{id}', 'destroy')->name('village.destroy');
});

