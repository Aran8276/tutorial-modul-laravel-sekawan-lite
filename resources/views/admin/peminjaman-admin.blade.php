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
                            Halaman Data Peminjaman
                        </li>
                    </ol>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Peminjam</th>
                                    <th>Nama Buku</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Status Kembali</th>
                                    <th>Catatan</th>
                                    <th>Denda</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Siswa 1</td>
                                    <td>Bulan</td>
                                    <td>2024-12-01</td>
                                    <td></td>
                                    <td>Meminjam</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="{{ route('editPeminjamanAdmin') }}" class="btn btn-warning">
                                            Update
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Siswa 2</td>
                                    <td>Bulan</td>
                                    <td>2023-12-01</td>
                                    <td>2024-08-12</td>
                                    <td>Selesai</td>
                                    <td>Telat Mengumpulkan</td>
                                    <td>Rp250,000</td>
                                    <td>
                                        <form action="">
                                            <button class="btn btn-danger" type="submit">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Siswa 2</td>
                                    <td>Bulan</td>
                                    <td>2023-12-01</td>
                                    <td>2024-08-12</td>
                                    <td>Selesai</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <form action="">
                                            <button class="btn btn-danger" type="submit">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
