<?php

use App\Http\Controllers\CitasController;
use App\Http\Controllers\ContactosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('citas', CitasController::class);
Route::apiResource('contactos', ContactosController::class);