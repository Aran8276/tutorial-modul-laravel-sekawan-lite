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
                    <h1 class="mt-4">Buku</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            Halaman Daftar Buku
                        </li>
                    </ol>
                    <div class="row gap-4">
                        @foreach ($buku as $bukus)
                            <div class="card col-12 col-md-4 col-lg-3">
                                <div class="card-body" style="text-align: center">
                                    <img src="{{ asset('img/book.png') }}" alt="Bulan" class="book-img"
                                        style="width: 150px" />
                                    <hr />
                                    <p class="text-center fw-bolder fs-4 my-0">
                                        {{ $bukus->buku_judul }}
                                    </p>
                                    <p class="text-center mb-3">
                                        Ditulis oleh {{ $bukus->penulis->penulis_nama }}
                                    </p>
                                    <form action="{{ route('action.pinjam-buku', ['id' => $bukus->buku_id]) }}"
                                        method="GET">
                                        <button class="btn btn-primary d-block mx-auto" type="submit">
                                            Pinjam
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
