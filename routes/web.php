<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\ForeCast;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/table', [DataController::class, 'index'])->name('dataTable');
Route::get('/forecast', [ForeCast::class, 'index'])->name('foreCast');
