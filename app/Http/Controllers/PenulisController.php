<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penulis;
use Illuminate\Http\Request;

class PenulisController extends Controller
{
    public function create(Request $request)
    {
        $id = mt_rand(1000000000000000, 9999999999999999);
        $data = [
            'penulis_id' => $id,
            'penulis_nama' => $request->input("penulis_nama"),
            'penulis_tmptlahir' => $request->input("penulis_tmptlahir"),
            'penulis_tgllahir' => $request->input("penulis_tgllahir"),
        ];
        Penulis::createPenulis($data);
        return redirect()->route('penulisAdmin')->with('success', 'Data penulis berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $data = [
            'penulis_nama' => $request->input("penulis_nama"),
            'penulis_tmptlahir' => $request->input("penulis_tmptlahir"),
            'penulis_tgllahir' => $request->input("penulis_tgllahir"),
        ];
        Penulis::updatePenulis($id, $data);
        return redirect()->route('penulisAdmin')->with('updated', 'Data penulis berhasil diupdate!');
    }

    public function delete($id)
    {
        $buku = Buku::where("buku_penulis_id", $id)->get();

        if ($buku) {
            foreach ($buku as $bukus) {
                Buku::deleteBuku($bukus->buku_id);
            }
        }

        Penulis::deletePenulis($id);
        return redirect()->route('penulisAdmin')->with('success', 'Data penulis berhasil dihapus!');
    }
}
