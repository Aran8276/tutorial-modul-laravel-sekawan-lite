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
                    <h1 class="mt-4">Rak</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            Halaman Data Rak
                        </li>
                    </ol>
                    <a href="{{ route('tambahRakAdmin') }}" class="btn btn-primary mb-3">Tambah Rak</a>
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
                                    <th>Nama Rak</th>
                                    <th>Lokasi Rak</th>
                                    <th>Kapasitas Rak</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rak as $raks)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $raks->rak_id }}</td>
                                        <td>{{ $raks->rak_nama }}</td>
                                        <td>{{ $raks->rak_lokasi }}</td>
                                        <td>{{ $raks->rak_kapasitas }} buku</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('editRakAdmin', ['id' => $raks->rak_id]) }}"
                                                    class="btn btn-warning">
                                                    Update
                                                </a>
                                                <form action="{{ route('action.delete-rak', ['id' => $raks->rak_id]) }}"
                                                    class="px-3" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">
                                                        Hapus
                                                    </button>
                                                </form>
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