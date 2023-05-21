<?php

use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;

Route::get('person/all', [PersonController::class, 'all']);
Route::post('person/insert', [PersonController::class, 'insert']);
Route::get('person/getbyid/{id}', [PersonController::class, 'getById']);
Route::put('person/edit/{id}', [PersonController::class, 'edit']);
Route::delete('person/delete/{id}', [PersonController::class, 'delete']);
