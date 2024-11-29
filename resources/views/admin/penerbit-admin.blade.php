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
                    <h1 class="mt-4">Penerbit</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            Halaman Data Penerbit
                        </li>
                    </ol>
                    <a href="{{ route('tambahPenerbitAdmin') }}" class="btn btn-primary mb-3">
                        Tambah Penerbit
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
                                    <th>Nama Penerbit</th>
                                    <th>Alamat Penerbit</th>
                                    <th>Notelp Penerbit</th>
                                    <th>Email Penerbit</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penerbit as $penerbits)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $penerbits->penerbit_id }}</td>
                                        <td>{{ $penerbits->penerbit_nama }}</td>
                                        <td>{{ $penerbits->penerbit_alamat }}</td>
                                        <td>{{ $penerbits->penerbit_notelp }}</td>
                                        <td>{{ $penerbits->penerbit_email }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('editPenerbitAdmin', ['id' => $penerbits->penerbit_id]) }}"
                                                    class="btn btn-warning">
                                                    Update
                                                </a>
                                                <form
                                                    action="{{ route('action.delete-penerbit', ['id' => $penerbits->penerbit_id]) }}"
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