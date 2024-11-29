<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Rak;
use App\Models\Penulis;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function loginPage()
    {
        return view("public.login");
    }

    public function registerPage()
    {
        return view("public.register");
    }

    public function dashboardAdmin()
    {
        return view("admin.dashboard", ['level' => 'admin']);
    }

    public function bukuAdmin()
    {
        $data = Buku::with(['penerbit', 'penulis', 'rak', 'kategori'])->get();

        // return $data;

        return view("admin.buku-admin", ['level' => 'admin', 'buku' => $data]);
    }

    public function tambahBukuAdmin()
    {
        $penerbit = Penerbit::readPenerbit();
        $penulis = Penulis::readPenulis();
        $rak = Rak::readRak();
        $kategori = Kategori::readKategori();

        return view("admin.tambah-buku-admin", [
            'level' => 'admin',
            'penerbit' => $penerbit,
            'penulis' => $penulis,
            'rak' => $rak,
            'kategori' => $kategori,
        ]);
    }

    public function editBukuAdmin($id)
    {
        $buku = Buku::readBukuById($id);

        $penerbit = Penerbit::readPenerbit();
        $penulis = Penulis::readPenulis();
        $rak = Rak::readRak();
        $kategori = Kategori::readKategori();

        return view("admin.edit-buku-admin", [
            'level' => 'admin',
            'buku' => $buku,
            'penerbit' => $penerbit,
            'penulis' => $penulis,
            'rak' => $rak,
            'kategori' => $kategori,
        ]);
    }


    public function kategoriAdmin()
    {
        $data = Kategori::readKategori();

        return view("admin.kategori-admin", ['level' => 'admin', 'kategori' => $data]);
    }

    public function tambahKategoriAdmin()
    {
        return view("admin.tambah-kategori-admin", ['level' => 'admin']);
    }

    public function editKategoriAdmin($id)
    {
        $kategori = Kategori::readKategoriById($id);

        return view("admin.edit-kategori-admin", ['level' => 'admin', 'kategori' => $kategori]);
    }

    public function rakAdmin()
    {
        $data = Rak::readRak();

        return view("admin.rak-admin", ['level' => 'admin', 'rak' => $data]);
    }

    public function tambahRakAdmin()
    {
        return view("admin.tambah-rak-admin", ['level' => 'admin']);
    }

    public function editRakAdmin($id)
    {
        $rak = Rak::readRakById($id);

        return view("admin.edit-rak-admin", ['level' => 'admin', 'rak' => $rak]);
    }

    public function penulisAdmin()
    {
        $data = Penulis::readPenulis();

        return view("admin.penulis-admin", ['level' => 'admin', 'penulis' => $data]);
    }

    public function tambahPenulisAdmin()
    {
        return view("admin.tambah-penulis-admin", ['level' => 'admin']);
    }

    public function editPenulisAdmin($id)
    {
        $penulis = Penulis::readPenulisById($id);

        return view("admin.edit-penulis-admin", ['level' => 'admin', 'penulis' => $penulis]);
    }

    public function penerbitAdmin()
    {
        $data = Penerbit::readPenerbit();

        return view("admin.penerbit-admin", ['level' => 'admin', 'penerbit' => $data]);
    }

    public function tambahPenerbitAdmin()
    {
        return view("admin.tambah-penerbit-admin", ['level' => 'admin']);
    }

    public function editPenerbitAdmin($id)
    {
        $penerbit = Penerbit::readPenerbitById($id);

        return view("admin.edit-penerbit-admin", ['level' => 'admin', 'penerbit' => $penerbit]);
    }

    public function peminjamanAdmin()
    {
        return view("admin.peminjaman-admin", ['level' => 'admin']);
    }

    public function editPeminjamanAdmin()
    {
        return view("admin.edit-peminjaman-admin", ['level' => 'admin']);
    }

    public function pengaturanAdmin()
    {
        return view("admin.pengaturan-admin", ['level' => 'admin']);
    }

    public function dashboardSiswa()
    {
        return view("siswa.dashboard-siswa", ["level" => "siswa"]);
    }

    public function bukuSiswa()
    {
        return view("siswa.buku-siswa", ["level" => "siswa"]);
    }

    public function peminjamanSiswa()
    {
        return view("siswa.peminjaman-siswa", ["level" => "siswa"]);
    }

    public function pengaturanSiswa()
    {
        return view("siswa.pengaturan-siswa", ["level" => "siswa"]);
    }
}
