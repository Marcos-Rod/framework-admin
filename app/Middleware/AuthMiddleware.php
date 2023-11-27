<?php

namespace App\Middleware;

use App\Controllers\AuthController;
use App\Controllers\Controller;

class AuthMiddleware
{

    private $allowedRoutes = [
        FOLDER_ADMIN . 'login',
    ];

    public function handle()
    {
        // Verifica si ya está en la página de inicio de sesión
        $isLoginPage = strpos($_SERVER['REQUEST_URI'], FOLDER_ADMIN . 'login') !== false;

        $currentRoute = $_SERVER['REQUEST_URI'];
        

        if (!AuthController::isLoggedIn() && !$isLoginPage && !in_array($currentRoute, $this->allowedRoutes)) {
            $_SESSION['redirect_after_login'] = $currentRoute;
            (new Controller())->redirect('/' . FOLDER_ADMIN . 'login');
        }
    }
}