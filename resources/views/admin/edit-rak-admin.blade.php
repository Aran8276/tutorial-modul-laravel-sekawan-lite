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
                    <h1 class="mt-4">Update Rak</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            Halaman Update Data Rak
                        </li>
                    </ol>
                    <form action="{{ route('action.update-rak', ['id' => $rak->rak_id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row gap-3">
                            <div class="col-12 col-md-4 form-group">
                                <label for="rak_nama" class="form-label">Nama rak</label>
                                <input value="{{ $rak->rak_nama }}" type="text" name="rak_nama" id="rak_nama"
                                    class="form-control" placeholder="Masukkan nama rak" />
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="rak_lokasi" class="form-label">Lokasi rak</label>
                                <input value="{{ $rak->rak_lokasi }}" type="text" name="rak_lokasi" id="rak_lokasi"
                                    class="form-control" placeholder="Masukkan lokasi rak" />
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="rak_kapasitas" class="form-label">Kapasitas rak</label>
                                <input value="{{ $rak->rak_kapasitas }}" type="number" name="rak_kapasitas"
                                    id="rak_kapasitas" class="form-control" placeholder="Masukkan kapasitas rak" />
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
