<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keanggotaan extends Model
{
    protected $table = 'keanggotaan';
    protected $fillable = [
        'nama',
        'nim',
        'jurusan',
        'no_anggota',
        'status',
        'keterangan',
    ];
}
