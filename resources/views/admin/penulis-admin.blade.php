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
                    <h1 class="mt-4">Penulis</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            Halaman Data Penulis
                        </li>
                    </ol>
                    <a href="{{ route('tambahPenulisAdmin') }}" class="btn btn-primary mb-3">
                        Tambah Penulis
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
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Nama Penulis</th>
                                    <th>Tempat Lahir Penulis</th>
                                    <th>Tanggal Lahir Penulis</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penulis as $penuliss)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $penuliss->penulis_id }}</td>
                                        <td>{{ $penuliss->penulis_nama }}</td>
                                        <td>{{ $penuliss->penulis_tmptlahir }}</td>
                                        <td>{{ $penuliss->penulis_tgllahir }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('editPenulisAdmin', ['id' => $penuliss->penulis_id]) }}"
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
                                                                    action="{{ route('action.delete-penulis', ['id' => $penuliss->penulis_id]) }}"
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
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
