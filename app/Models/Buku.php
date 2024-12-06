<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';
    protected $primaryKey = 'buku_id';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        "buku_id",
        "buku_judul",
        "buku_isbn",
        "buku_thnterbit",
        "buku_penulis_id",
        "buku_kategori_id",
        "buku_penerbit_id",
        "buku_rak_id",
    ];

    protected static function createBuku($data)
    {
        return self::create($data);
    }

    protected static function updateBuku($id, $data)
    {
        $buku = self::find($id);
        if ($buku) {
            $buku->update($data);
            return $buku;
        }

        return null;
    }

    // digunakan untuk membaca 1 data buku hanya dengan id
    protected static function readBukuById($id)
    {
        $buku = self::find($id);
        return $buku;
    }

    protected static function deleteBuku($id)
    {
        return self::destroy($id);
    }

    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class, 'buku_penerbit_id', 'penerbit_id');
    }

    public function penulis()
    {
        return $this->belongsTo(Penulis::class, 'buku_penulis_id', 'penulis_id');
    }

    public function rak()
    {
        return $this->belongsTo(Rak::class, 'buku_rak_id', 'rak_id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'buku_kategori_id', 'kategori_id');
    }

    protected static function uploadGambarBuku($id, $file)
    {
        $buku = self::find($id);

        $path = $file->store("buku_pictures", "public");

        $buku->buku_urlgambar = $path;

        $buku->save();
    }
}
