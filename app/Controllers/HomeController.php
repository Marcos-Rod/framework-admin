<?php

namespace App\Controllers;

class HomeController extends Controller
{
    public function index($slug = "inicio")
    {
        $this->metas['title'] = (($slug != "inicio") ? ucfirst($slug) . ' - ' : '') . $this->project;
        $this->metas['file'] = $slug;
        $this->metas['slug'] = $slug;
        $this->metas['canonical_url'] = $slug;

        return $this->view('assets.template');
    }

}
