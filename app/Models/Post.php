<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model

{
    protected $fillable = ['name', 'slug', 'description', 'body', 'keywords', 'status', 'category_id', 'published'];

    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
}
