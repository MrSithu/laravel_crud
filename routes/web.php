<?php

use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ItemController::class, 'index']);
Route::get('/create', [ItemController::class, 'create']);
Route::post('/create', [ItemController::class, 'store'])->name('item.store');
Route::get('/edit/{id}', [ItemController::class, 'edit']);
Route::put('/update/{id}', [ItemController::class, 'update'])->name('item.update');
Route::get('/delete/{id}', [ItemController::class, 'delete']);
