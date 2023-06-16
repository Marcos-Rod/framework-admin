<?php

use App\Controllers\HomeController;
use App\Route;

Route::get('/', [HomeController::class, 'index']);

Route::dispatch();