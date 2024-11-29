@extends('template.layout')
@section('title', 'Login - Web Perpustakaan')

@section('main')
    <section class="login-container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal!</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card shadow-lg">
            <div class="card-header">
                <img src="./img/book.png" alt="..." class="img-logo" />
                <h3 class="text-center">Login - Web Perpustakaan</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('action.login') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="user_username" class="form-label">Username *</label>
                        <input type="text" name="user_username" id="user_username" class="form-control"
                            placeholder="Masukkan username Anda" />
                    </div>
                    <div class="form-group my-3">
                        <label for="user_password" class="form-label">Password *</label>
                        <input type="password" name="user_password" id="user_password" class="form-control"
                            placeholder="Masukkan password Anda" />
                    </div>
                    <div class="form-group my-3">
                        <button class="btn btn-primary" type="submit">Login</button>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <a href="{{ route('register') }}">
                    <p class="text-primary text-center">
                        Tidak punya akun? Silahkan mendaftar
                    </p>
                </a>
            </div>
        </div>
    </section>
@endsection
