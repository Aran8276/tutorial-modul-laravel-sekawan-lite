<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    public function create(Request $request)
    {
        $id = mt_rand(1000000000000000, 9999999999999999);
        $data = [
            'penerbit_id' => $id,
            'penerbit_nama' => $request->input('penerbit_nama'),
            'penerbit_alamat' => $request->input('penerbit_alamat'),
            'penerbit_notelp' => $request->input('penerbit_notelp'),
            'penerbit_email' => $request->input('penerbit_email'),
        ];
        Penerbit::createPenerbit($data);
        return redirect()->route('penerbitAdmin')->with('success', 'Data penerbit berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $data = [
            'penerbit_nama' => $request->input('penerbit_nama'),
            'penerbit_alamat' => $request->input('penerbit_alamat'),
            'penerbit_notelp' => $request->input('penerbit_notelp'),
            'penerbit_email' => $request->input('penerbit_email'),
        ];
        Penerbit::updatePenerbit($id, $data);
        return redirect()->route('penerbitAdmin')->with('updated', 'Data penerbit berhasil diupdate!');
    }

    public function delete($id)
    {
        Penerbit::deletePenerbit($id);
        return redirect()->route('penerbitAdmin')->with('success', 'Data penerbit berhasil dihapus!');
    }
}
