<?php

namespace App\Controllers;

use App\Models\Admin\User;

class AuthController extends Controller
{

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
        $user = User::where('email', $data['email'])->first();

        if ($user) {
            
            if (!password_verify($data['password'], $user->password)) {
                $authMessages = [
                    'status' => 'error',
                    'message' => 'Contraseña incorrecta',
                    'email' => $data['email']
                ];

                return $this->view('admin.assets.login', compact('authMessages'));
            } else {
                if (session_status() !== PHP_SESSION_ACTIVE)
                    session_start();

                $_SESSION['admin_id'] = $user->id;
                $_SESSION['admin_name'] = $user->name;
                $_SESSION['admin_email'] = $user->email;
                $_SESSION['aauth'] = 1;

                return $this->redirect('/' . FOLDER_ADMIN . 'dashboard');
            }
        } else {
            $authMessages = [
                'status' => 'error',
                'message' => 'El usuario no existe',
                'email' => $data['email']
            ];

            return $this->view('admin.assets.login', compact('authMessages'));
        }
    }

    public function logout()
    {
        if (session_status() !== PHP_SESSION_ACTIVE)
            session_start();

        if (session_status() == PHP_SESSION_ACTIVE)
            session_destroy();

        return $this->redirect('/' . FOLDER_ADMIN . 'login');
    }
}
