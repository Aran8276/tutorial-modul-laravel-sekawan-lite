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
                    <h1 class="mt-4">Update Kategori</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            Halaman Update Data Kategori
                        </li>
                    </ol>
                    <form action="{{ route('action.update-kategori', ['id' => $kategori->kategori_id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row gap-3">
                            <div class="col-12 col-md-4 form-group">
                                <label for="kategori_nama" class="form-label">Nama kategori</label>
                                <input value="{{ $kategori->kategori_nama }}" type="text" name="kategori_nama"
                                    id="kategori_nama" class="form-control" placeholder="Masukkan nama kategori" />
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
