<?php

namespace App\Controllers\Admin;

use App\Controllers\AuthController;
use App\Controllers\Controller;

class AdminController extends Controller
{
    public function index($slug = "dashboard")
    {

        if (!AuthController::isLoggedIn()) {
            return $this->view('admin.assets.login');
        }

        $metas = [
            'title' => 'Admin',
            'description' => 'Administrador',
            'slug' => $slug,
            'file' => $slug,
        ];

        return $this->view('admin.assets.template', compact('metas'));
        
    }

    
}
