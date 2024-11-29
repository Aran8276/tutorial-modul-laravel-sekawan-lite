@extends('template.layout')

@section('title', 'Dashboard - Admin Perpustakaan')

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
    <div id="layoutSidenav">
        @include('template.sidebar_admin')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Peminjaman</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            Halaman Daftar Peminjaman Siswa
                        </li>
                    </ol>
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Berhasil!</strong> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @elseif (session('updated'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <strong>Berhasil!</strong> {{ session('updated') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Buku</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Status Kembali</th>
                                    <th>Catatan</th>
                                    <th>Denda</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($peminjaman as $peminjamans)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $peminjamans->buku[0]->buku_judul }}</td>
                                        <td>{{ $peminjamans->peminjaman_tglpinjam }}</td>
                                        @if ($peminjamans->peminjaman_statuskembali == 0)
                                            <td>-</td>
                                            <td>Meminjam</td>
                                            <td>-</td>
                                            <td>-</td>
                                        @else
                                            <td>{{ $peminjamans->peminjaman_tglkembali }}</td>
                                            <td>Selesai</td>
                                            <td>{{ $peminjamans->peminjaman_note }}</td>
                                            <td>{{ $peminjamans->peminjaman_denda }}</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
