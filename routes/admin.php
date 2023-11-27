<?php

use App\Controllers\Admin\AdminController;
use App\Controllers\AuthController;
use App\Middleware\AuthMiddleware;
use App\Route;



/*** Rutas del admin ****/
Route::get(FOLDER_ADMIN, [AdminController::class, 'index']);
Route::get(FOLDER_ADMIN . '/login', [AuthController::class, 'index']);

// Ruta con middleware (AuthMiddleware)
Route::middleware(AuthMiddleware::class)->get(FOLDER_ADMIN . ':slug', [AdminController::class, 'index']);

Route::post(FOLDER_ADMIN . 'login', [AuthController::class, 'login']);
Route::post(FOLDER_ADMIN . 'logout', [AuthController::class, 'logout']);

Route::dispatch();
