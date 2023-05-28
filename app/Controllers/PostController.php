<?php

namespace App\Controllers;

use App\Models\Post;

class PostController extends Controller{

    public function index(){
        $metas = [
            'title' => 'Blog - Tu empresa',
            'description' => 'Una descripcion',
            'keywords' => 'keywords, para, seo',
            'slug' => 'blog',
            'file' => 'blog',
        ];

        $model = new Post;
        $posts = $model->where('status', 2)->get();

        foreach ($posts as $key => $value) {
            $posts[$key]['image'] = $model->image($value['id']);
        }

        return $this->view('assets.template', compact('metas', 'posts'));
    }

    public function show($slug){
        $model = new Post;
        $post = $model->where('slug', $slug)->first();
        $post['image'] = $model->image($post['id']);

        $others = $model->others($slug);

        $metas = [
            'title' => $post['name'] . ' - tu empresa',
            'description' => 'Una descripcion',
            'keywords' => ($post['keywords']) ? $post['keywords'] :'keywords, para, seo',
            'slug' => $post['slug'],
            'file' => 'post',
        ];
        
        return $this->view('assets.template', compact('metas', 'post', 'others'));
    }
    
    
}