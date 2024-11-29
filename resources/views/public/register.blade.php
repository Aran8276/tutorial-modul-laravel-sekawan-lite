@extends('template.layout')
@section('title', 'Login - Web Perpustakaan')

@section('main')
    <section class="login-container">
        <div class="card shadow-lg">
            <div class="card-header">
                <img src="./img/book.png" alt="..." class="img-logo" />
                <h3 class="text-center">Register - Web Perpustakaan</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('action.register') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="user_nama" class="form-label">Nama panjang *</label>
                        <input type="text" name="user_nama" id="user_nama" class="form-control"
                            placeholder="Masukkan nama Anda" />
                    </div>
                    <div class="form-group my-3">
                        <label for="user_alamat" class="form-label">Alamat *</label>
                        <input type="text" name="user_alamat" id="user_alamat" class="form-control"
                            placeholder="Masukkan alamat Anda" />
                    </div>
                    <div class="form-group my-3">
                        <label for="user_username" class="form-label">Username *</label>
                        <input type="text" name="user_username" id="user_username" class="form-control"
                            placeholder="Masukkan username Anda" />
                    </div>
                    <div class="form-group my-3">
                        <label for="user_email" class="form-label">Email *</label>
                        <input type="email" name="user_email" id="user_email" class="form-control"
                            placeholder="Masukkan email Anda" />
                    </div>
                    <div class="form-group my-3">
                        <label for="user_notelp" class="form-label">No telp *</label>
                        <input type="text" name="user_notelp" id="user_notelp" class="form-control"
                            placeholder="Masukkan nomor telepon Anda" />
                    </div>
                    <div class="form-group my-3">
                        <label for="user_password" class="form-label">Password *</label>
                        <input type="password" name="user_password" id="user_password" class="form-control"
                            placeholder="Masukkan password Anda" />
                    </div>
                    <div class="form-group my-3">
                        <button class="btn btn-primary" type="submit">Register</button>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <a href="{{ route('login') }}">
                    <p class="text-primary text-center">
                        Sudah punya akun? Silahkan masuk
                    </p>
                </a>
            </div>
        </div>
    </section>
@endsection
