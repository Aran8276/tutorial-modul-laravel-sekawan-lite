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
                    <h1 class="mt-4">Update Peminjaman</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            Halaman Update Peminjaman Buku
                        </li>
                    </ol>
                    <form action="/admin_peminjaman.html">
                        <div class="row gap-3">
                            <div class="col-12 col-md-4 form-group">
                                <label class="form-label"
                                    >Nama peminjam</label
                                >
                                <input
                                    type="text"
                                    disabled
                                    class="form-control"
                                    value="Nama Peminjam"
                                />
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label
                                    for="peminjaman_denda"
                                    class="form-label"
                                    >Denda</label
                                >
                                <input
                                    type="number"
                                    name="peminjaman_denda"
                                    id="peminjaman_denda"
                                    class="form-control"
                                    placeholder="Masukkan denda peminjaman"
                                />
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label
                                    for="peminjaman_note"
                                    class="form-label"
                                    >Catatan</label
                                >
                                <input
                                    type="text"
                                    name="peminjaman_note"
                                    id="peminjaman_note"
                                    class="form-control"
                                    placeholder="Masukkan catatan peminjaman"
                                />
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
