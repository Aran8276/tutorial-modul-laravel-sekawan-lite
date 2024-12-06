<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\PeminjamanDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    public function create(Request $request)
    {
        $id = mt_rand(1000000000000000, 9999999999999999);
        $data = [
            'buku_id' => $id,
            "buku_judul" => $request->input("buku_judul"),
            "buku_isbn" => $request->input("buku_isbn"),
            "buku_thnterbit" => $request->input("buku_thnterbit"),
            "buku_penulis_id" => $request->input("buku_penulis_id"),
            "buku_kategori_id" => $request->input("buku_kategori_id"),
            "buku_penerbit_id" => $request->input("buku_penerbit_id"),
            "buku_rak_id" => $request->input("buku_rak_id"),
        ];
        Buku::createBuku($data);

        if ($request->hasFile("buku_urlgambar")) {
            Buku::uploadGambarBuku($id, $request->file("buku_urlgambar"));
        }

        return redirect()->route('bukuAdmin')->with('success', 'Data buku berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $data = [
            "buku_judul" => $request->input("buku_judul"),
            "buku_isbn" => $request->input("buku_isbn"),
            "buku_thnterbit" => $request->input("buku_thnterbit"),
            "buku_penulis_id" => $request->input("buku_penulis_id"),
            "buku_kategori_id" => $request->input("buku_kategori_id"),
            "buku_penerbit_id" => $request->input("buku_penerbit_id"),
            "buku_rak_id" => $request->input("buku_rak_id"),
        ];
        Buku::updateBuku($id, $data);
        return redirect()->route('bukuAdmin')->with('updated', 'Data buku berhasil diupdate!');
    }

    public function delete($id)
    {
        $buku = Buku::find($id);
        $peminjaman_detail = PeminjamanDetail::where('peminjaman_detail_buku_id', $id)->get();

        foreach ($peminjaman_detail as $peminjaman_details) {
            $peminjaman = Peminjaman::find($peminjaman_details)->first();
            $peminjaman->delete();
        }

        Storage::disk("public")->delete($buku->buku_urlgambar);

        Buku::deleteBuku($id);

        return redirect()->route('bukuAdmin')->with('success', 'Data buku berhasil dihapus!');
    }
}
