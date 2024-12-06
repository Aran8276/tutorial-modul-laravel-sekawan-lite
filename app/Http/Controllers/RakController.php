<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Rak;
use Illuminate\Http\Request;

class RakController extends Controller
{
    public function create(Request $request)
    {
        $id = mt_rand(1000000000000000, 9999999999999999);
        $data = [
            'rak_id' => $id,
            'rak_nama' => $request->input("rak_nama"),
            'rak_lokasi' => $request->input("rak_lokasi"),
            'rak_kapasitas' => $request->input("rak_kapasitas"),
        ];
        Rak::createRak($data);
        return redirect()->route('rakAdmin')->with('success', 'Data rak berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $data = [
            'rak_nama' => $request->input("rak_nama"),
            'rak_lokasi' => $request->input("rak_lokasi"),
            'rak_kapasitas' => $request->input("rak_kapasitas"),
        ];
        Rak::updateRak($id, $data);
        return redirect()->route('rakAdmin')->with('updated', 'Data rak berhasil diupdate!');
    }

    public function delete($id)
    {
        $buku = Buku::where("buku_rak_id", $id)->get();

        if ($buku) {
            foreach ($buku as $bukus) {
                Buku::deleteBuku($bukus->buku_id);
            }
        }

        Rak::deleteRak($id);
        return redirect()->route('rakAdmin')->with('success', 'Data rak berhasil dihapus!');
    }
}
