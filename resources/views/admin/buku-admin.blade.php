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
                    <h1 class="mt-4">Buku</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            Halaman Data Buku
                        </li>
                    </ol>
                    <a href="{{ route('tambahBukuAdmin') }}" class="btn btn-primary mb-3">
                        Tambah Buku
                    </a>
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
                    @elseif (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Gagal!</strong> {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Buku</th>
                                    <th>Penulis Buku</th>
                                    <th>Penerbit Buku</th>
                                    <th>Tahun Terbit</th>
                                    <th>Kategori Buku</th>
                                    <th>Rak Buku</th>
                                    <th>ISBN</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($buku as $bukus)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $bukus->buku_judul }}</td>
                                        <td>{{ $bukus->penulis_nama }}</td>
                                        <td>{{ $bukus->penerbit_nama }}</td>
                                        <td>{{ $bukus->buku_thnterbit }}</td>
                                        <td>{{ $bukus->kategori_nama }}</td>
                                        <td>{{ $bukus->rak_nama }}</td>
                                        <td>{{ $bukus->buku_isbn }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('editBukuAdmin', ['id' => $bukus->buku_id]) }}"
                                                    class="btn btn-warning">
                                                    Update
                                                </a>
                                                <!-- Button trigger modal -->
                                                <div class="px-3">
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
                                                                    action="{{ route('action.delete-buku', ['id' => $bukus->buku_id]) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="btn btn-danger" type="submit">
                                                                        Hapus
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $buku->links() }}
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
