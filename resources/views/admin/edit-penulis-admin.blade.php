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
                    <h1 class="mt-4">Update Penulis</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            Halaman Update Data Penulis
                        </li>
                    </ol>
                    <form action="{{ route('action.update-penulis', ['id' => $penulis->penulis_id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row gap-3">
                            <div class="col-12 col-md-4 form-group">
                                <label for="penulis_nama" class="form-label">Nama penulis</label>
                                <input value="{{ $penulis->penulis_nama }}" type="text" name="penulis_nama"
                                    id="penulis_nama" class="form-control" placeholder="Masukkan nama penulis" />
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="penulis_tmptlahir" class="form-label">Tempat lahir penulis</label>
                                <input value="{{ $penulis->penulis_tmptlahir }}" type="text" name="penulis_tmptlahir"
                                    id="penulis_tmptlahir" class="form-control"
                                    placeholder="Masukkan tempat lahir penulis" />
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="penulis_tgllahir" class="form-label">No telepon penerbit</label>
                                <input value="{{ $penulis->penulis_tgllahir }}" type="date" name="penulis_tgllahir"
                                    id="penulis_tgllahir" class="form-control" />
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