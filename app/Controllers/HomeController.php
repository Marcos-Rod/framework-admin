<?php

namespace App\Controllers;

class HomeController extends Controller
{
    public function index($slug = "inicio")
    {
        $metas = [
            'slug' => $slug,
            'file' => $slug,
        ];

        return $this->view('assets.template', compact('metas'));
    }

}
