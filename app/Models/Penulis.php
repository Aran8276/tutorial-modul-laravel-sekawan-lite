<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penulis extends Model
{
    protected $table = 'penulis';
    protected $primaryKey = 'penulis_id';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'penulis_id',
        'penulis_nama',
        'penulis_tmptlahir',
        'penulis_tgllahir',
    ];

    protected static function createPenulis($data)
    {
        return self::create($data);
    }

    protected static function readPenulis()
    {
        $data = self::all();
        return $data;
    }

    protected static function updatePenulis($id, $data)
    {
        $penulis = self::find($id);
        if ($penulis) {
            $penulis->update($data);
            return $penulis;
        }

        return null;
    }

    // digunakan untuk membaca 1 data penulis hanya dengan id
    protected static function readPenulisById($id)
    {
        $penulis = self::find($id);
        return $penulis;
    }

    protected static function deletePenulis($id)
    {
        return self::destroy($id);
    }
}
