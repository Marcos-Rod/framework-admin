<?php

use App\Controllers\Admin\AdminController;
use App\Controllers\AuthController;
use App\Route;



/*** Rutas del admin ****/
Route::get('admin', [AdminController::class, 'index']);

if (AuthController::isLoggedIn()) {
    /* Rutas protegidas con autenticación */
}

Route::get(FOLDER_ADMIN . ':slug', [AdminController::class, 'index']);
Route::post(FOLDER_ADMIN . 'login', [AuthController::class, 'login']);
Route::post(FOLDER_ADMIN . 'logout', [AuthController::class, 'logout']);

Route::dispatch();
