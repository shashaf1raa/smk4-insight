<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = [
        'kategori',
        'gambar',
        'tanggal',
        'judul',
        'ringkasan',
        'isi',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}