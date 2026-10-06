<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukKarya extends Model
{
    protected $fillable = [
        'slug',
        'jurusan',
        'foto',
        'judul',
        'siswa',
        'deskripsi',
        'harga',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}