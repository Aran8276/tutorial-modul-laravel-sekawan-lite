<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeminjamanDetail extends Model
{
    protected $table = 'peminjaman_detail';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'peminjaman_detail_peminjaman_id',
        'peminjaman_detail_buku_id',
    ];
}
