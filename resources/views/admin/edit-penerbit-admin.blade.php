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
                    <h1 class="mt-4">Update Penerbit</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            Halaman Update Data Penerbit
                        </li>
                    </ol>
                    <form action="{{ route('action.update-penerbit', ['id' => $penerbit->penerbit_id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row gap-3">
                            <div class="col-12 col-md-4 form-group">
                                <label for="penerbit_nama" class="form-label">Nama penerbit</label>
                                <input value="{{ $penerbit->penerbit_nama }}" type="text" name="penerbit_nama"
                                    id="penerbit_nama" class="form-control" placeholder="Masukkan nama penerbit" />
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="penerbit_alamat" class="form-label">Alamat penerbit</label>
                                <input value="{{ $penerbit->penerbit_alamat }}" type="text" name="penerbit_alamat"
                                    id="penerbit_alamat" class="form-control" placeholder="Masukkan alamat penerbit" />
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="penerbit_notelp" class="form-label">No telepon penerbit</label>
                                <input value="{{ $penerbit->penerbit_notelp }}" type="text" name="penerbit_notelp"
                                    id="penerbit_notelp" class="form-control" placeholder="Masukkan notelp penerbit" />
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="penerbit_email" class="form-label">Email penerbit</label>
                                <input value="{{ $penerbit->penerbit_email }}" type="email" name="penerbit_email"
                                    id="penerbit_email" class="form-control" placeholder="Masukkan email penerbit" />
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-12 col-md-4">
                                <button class="btn btn-warning">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
@endsection
