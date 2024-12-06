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
                                @foreach ($peminjaman as $peminjamans)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $peminjamans->user->user_username }}</td>
                                        <td>{{ $peminjamans->buku[0]->buku_judul }}</td>
                                        <td>{{ $peminjamans->peminjaman_tglpinjam }}</td>


                                        @if ($peminjamans->peminjaman_statuskembali == 0)
                                            <td>-</td>
                                            <td>Meminjam</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>
                                                <a href="{{ route('editPeminjamanAdmin', ['id' => $peminjamans->peminjaman_id]) }}"
                                                    class="btn btn-warning">
                                                    Update
                                                </a>
                                            </td>
                                        @else
                                            <td>{{ $peminjamans->peminjaman_tglkembali }}</td>
                                            <td>Selesai</td>
                                            <td>{{ $peminjamans->peminjaman_note }}</td>
                                            <td>{{ $peminjamans->peminjaman_denda }}</td>
                                            <td>


                                                <!-- Button trigger modal -->
                                                <div>
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#hapusModal">
                                                        Hapus
                                                    </button>
                                                </div>

                                                <!-- Modal -->
                                                <div class="modal fade" id="hapusModal" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5">
                                                                    Konfirmasi
                                                                </h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah anda yakin ingin menghapus data ini?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Tutup</button>
                                                                <form
                                                                    action="{{ route('action.delete-peminjaman', ['id' => $peminjamans->peminjaman_id]) }}"
                                                                    method="POST">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="btn btn-danger" type="submit">
                                                                        Hapus
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
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
