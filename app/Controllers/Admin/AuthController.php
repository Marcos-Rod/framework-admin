<?php

namespace App\Controllers;

use App\Models\User;

class AuthController extends Controller
{

    public function index()
    {
        return $this->view('admin.assets.login');
    }

    public static function isLoggedIn()
    {

        if (isset($_SESSION['aauth']) == 1 && intval($_SESSION["admin_id"]) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function login()
    {
        $data = $_POST;

        // Verificar el token CSRF
        if (!$this->verifyCsrfToken($data['csrf_token'])) {
            $this->setError('Token no válido. Vuelva a intentar');
        } else {
            $user = User::where('email', $data['email'])->first();

            // Agregamos un retraso después de varios intentos fallidos
            usleep(rand(0, 500000)); // Retraso aleatorio de hasta 0.5 segundos

            if ($user && password_verify($data['password'], $user->password)) {
                // Autenticación exitosa
                $this->startSession($user);
                $this->redirectAfterLogin();
            } else {
                // Autenticación fallida
                $this->setError($user ? 'Contraseña incorrecta' : 'El usuario no existe');
            }
        }

        // Agregar mensajes al array de datos
        $data['messages'] = $this->getMessages();

        return $this->view('admin.assets.login', $data);
    }

    public function logout()
    {
        $this->destroySession();
        $this->redirect('/' . FOLDER_ADMIN . 'login');
    }

    // Función para destruir la sesión de manera segura
    private function destroySession()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        session_unset();
        session_destroy();
    }

    // Función para verificar el token CSRF
    public function verifyCsrfToken($token)
    {
        return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
    }

    // Función para iniciar sesión
    private function startSession($user)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        // Regenerar el ID de sesión para prevenir ataques de sesión
        session_regenerate_id(true);

        $_SESSION['admin_id'] = $user->id;
        $_SESSION['admin_name'] = $user->name;
        $_SESSION['admin_email'] = $user->email;
        $_SESSION['aauth'] = 1;
    }

    // Función para redirigir después del inicio de sesión
    private function redirectAfterLogin()
    {
        $redirectUrl = $_SESSION['redirect_after_login'] ?? '/' . FOLDER_ADMIN . 'dashboard';
        unset($_SESSION['redirect_after_login']);
        $this->redirect($redirectUrl);
    }
}
