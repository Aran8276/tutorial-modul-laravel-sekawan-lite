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
                    <h1 class="mt-4">User</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            Halaman Pengaturan User
                        </li>
                    </ol>
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
                    <form action="{{ route('action.update-profile') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row gap-3">
                            <div class="col-12 col-md-4 form-group">
                                <label for="user_nama" class="form-label">Nama panjang</label>
                                <input value="{{ $pengaturan->user_nama }}" type="text" name="user_nama" id="user_nama"
                                    class="form-control" placeholder="Masukkan nama panjang Anda" />
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="user_alamat" class="form-label">Alamat</label>
                                <input value="{{ $pengaturan->user_alamat }}" type="text" name="user_alamat"
                                    id="user_alamat" class="form-control" placeholder="Masukkan alamat Anda" />
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="user_username" class="form-label">Username</label>
                                <input value="{{ $pengaturan->user_username }}" type="text" name="user_username"
                                    id="user_username" class="form-control" placeholder="Masukkan username Anda" />
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="user_notelp" class="form-label">Nomor telepon</label>
                                <input value="{{ $pengaturan->user_notelp }}" type="text" name="user_notelp"
                                    id="user_notelp" class="form-control" placeholder="Masukkan Nomor telepon Anda" />
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="user_email" class="form-label">Email</label>
                                <input value="{{ $pengaturan->user_email }}" type="text" name="user_email"
                                    id="user_email" class="form-control" placeholder="Masukkan email Anda" />
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="user_password" class="form-label">Password</label>
                                <input type="password" name="user_password" id="user_password" class="form-control"
                                    placeholder="(tidak berubah)" />
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
