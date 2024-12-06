<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function create(Request $request)
    {
        $id = mt_rand(1000000000000000, 9999999999999999);
        $data = [
            'kategori_id' => $id,
            'kategori_nama' => $request->input("kategori_nama"),
        ];
        Kategori::createKategori($data);
        return redirect()->route('kategoriAdmin')->with('success', 'Data kategori berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $data = [
            'kategori_nama' => $request->input("kategori_nama"),
        ];
        Kategori::updateKategori($id, $data);
        return redirect()->route('kategoriAdmin')->with('updated', 'Data kategori berhasil diupdate!');
    }

    public function delete($id)
    {
        $buku = Buku::where("buku_kategori_id", $id)->get();

        if ($buku) {
            foreach ($buku as $bukus) {
                Buku::deleteBuku($bukus->buku_id);
            }
        }

        Kategori::deleteKategori($id);
        return redirect()->route('kategoriAdmin')->with('success', 'Data kategori berhasil dihapus!');
    }
}
