<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\PeminjamanDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function create(Request $request, $id)
    {
        // `user123` didapatkan dari table data phpMyAdmin yang kita buat tadi
        $user_id = 'user123';
        $peminjaman_id = mt_rand(1000000000000000, 9999999999999999);
        $data_peminjaman = [
            'peminjaman_id' => $peminjaman_id,
            'peminjaman_user_id' => $user_id,
            'peminjaman_tglpinjam' => now(),
            'peminjaman_tglkembali' => now(),
            'peminjaman_statuskembali' => 0,
            'peminjaman_note' => "",
            'peminjaman_denda' => 0,
        ];

        $data_peminjaman_detail = [
            'peminjaman_detail_peminjaman_id' => $peminjaman_id,
            'peminjaman_detail_buku_id' => $id,
        ];

        // eloquent
        // Peminjaman::create($data_peminjaman);
        // PeminjamanDetail::create($data_peminjaman_detail);

        // query builder
        DB::table('peminjaman')->insert($data_peminjaman);
        DB::table('peminjaman_detail')->insert($data_peminjaman_detail);

        return redirect()->route('peminjamanSiswa')->with('success', 'Anda berhasil meminjam buku!');
    }

    public function update(Request $request, $id)
    {
        $data_peminjaman = [
            'peminjaman_tglkembali' => now(),
            'peminjaman_statuskembali' => 1,
            'peminjaman_note' => $request->input('peminjaman_note'),
            'peminjaman_denda' => $request->input('peminjaman_denda'),
        ];

        Peminjaman::where("peminjaman_id", $id)->update($data_peminjaman);

        return redirect()->route('peminjamanAdmin')->with('success', 'Peminjaman berhasil diselesaikan!');
    }

    public function delete($id)
    {
        PeminjamanDetail::where('peminjaman_detail_peminjaman_id', $id)->delete();
        Peminjaman::find($id)->delete();

        return redirect()->route('peminjamanAdmin')->with('success', 'Peminjaman berhasil dihapus!');
    }
}
