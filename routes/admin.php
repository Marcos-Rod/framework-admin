<?

use App\Admin\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Route;

Route::get(FOLDER_ADMIN, [HomeController::class, 'index']);



Route::get('/admin/:slug', [HomeController::class, 'index']);
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/logout', [AuthController::class, 'logout']);

Route::dispatch();