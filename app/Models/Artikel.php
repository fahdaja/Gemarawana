<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';
    protected $fillable = [
        'judul',
        'deskripsi',
        'image_path',
        'lokasi',
        'provinsi_id',
        'kota_id',
    ];
}