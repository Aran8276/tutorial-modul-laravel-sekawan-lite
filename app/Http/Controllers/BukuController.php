<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\PeminjamanDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    public function create(Request $request)
    {
        try {
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
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('bukuAdmin')->with('error', "Gagal membuat buku: " . $e->getMessage());
        }
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

        $buku = Buku::find($id);

        if ($request->hasFile("buku_urlgambar")) {
            if ($buku->buku_urlgambar) {
                Storage::disk("public")->delete($buku->buku_urlgambar);
            }

            Buku::uploadGambarBuku($id, $request->file("buku_urlgambar"));
        }


        return redirect()->route('bukuAdmin')->with('updated', 'Data buku berhasil diupdate!');
    }

    public function delete($id)
    {
        // Kita bisa pakai ini di Penerbit, dll. Otomatis peminjaman & gambar terhapus
        Buku::deleteBuku($id);

        return redirect()->route('bukuAdmin')->with('success', 'Data buku berhasil dihapus!');
    }
}
