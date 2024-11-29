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
                    <form action="">
                        <div class="row gap-3">
                            <div class="col-12 col-md-4 form-group">
                                <label for="user_nama" class="form-label">Nama panjang</label>
                                <input type="text" name="user_nama" id="user_nama" class="form-control"
                                    placeholder="Masukkan nama panjang Anda" />
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="user_alamat" class="form-label">Alamat</label>
                                <input type="text" name="user_alamat" id="user_alamat" class="form-control"
                                    placeholder="Masukkan alamat Anda" />
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="user_username" class="form-label">Username</label>
                                <input type="text" name="user_username" id="user_username" class="form-control"
                                    placeholder="Masukkan username Anda" />
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="user_notelp" class="form-label">Nomor telepon</label>
                                <input type="text" name="user_notelp" id="user_notelp" class="form-control"
                                    placeholder="Masukkan Nomor telepon Anda" />
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="user_email" class="form-label">Email</label>
                                <input type="text" name="user_email" id="user_email" class="form-control"
                                    placeholder="Masukkan email Anda" />
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="user_password" class="form-label">Password</label>
                                <input type="text" name="user_password" id="user_password" class="form-control"
                                    placeholder="Masukkan password Anda" />
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
