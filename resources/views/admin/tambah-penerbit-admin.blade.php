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
                    <h1 class="mt-4">Tambah Penerbit</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            Halaman Tambah Data Penerbit
                        </li>
                    </ol>
                    <form action="{{ route('action.create-penerbit') }}" method="POST">
                        @csrf
                        <div class="row gap-3">
                            <div class="col-12 col-md-4 form-group">
                                <label for="penerbit_nama" class="form-label">Nama penerbit</label>
                                <input type="text" name="penerbit_nama" id="penerbit_nama" class="form-control"
                                    placeholder="Masukkan nama penerbit" />
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="penerbit_alamat" class="form-label">Alamat penerbit</label>
                                <input type="text" name="penerbit_alamat" id="penerbit_alamat" class="form-control"
                                    placeholder="Masukkan alamat penerbit" />
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="penerbit_notelp" class="form-label">No telepon penerbit</label>
                                <input type="text" name="penerbit_notelp" id="penerbit_notelp" class="form-control"
                                    placeholder="Masukkan notelp penerbit" />
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="penerbit_email" class="form-label">Email penerbit</label>
                                <input type="email" name="penerbit_email" id="penerbit_email" class="form-control"
                                    placeholder="Masukkan email penerbit" />
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-12 col-md-4">
                                <button class="btn btn-primary">
                                    Tambah
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
@endsection
