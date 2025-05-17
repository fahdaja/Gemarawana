<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    protected $table = 'galeri';
    protected $fillable = [
        'judul',
        'image_path'
    ];
}
