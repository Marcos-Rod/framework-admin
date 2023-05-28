<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model

{
    protected $fillable = ['project', 'url', 'keywords', 'description', 'public_key', 'secret_key'];
}
