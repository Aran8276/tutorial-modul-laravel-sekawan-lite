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
                    <h1 class="mt-4">Tambah Buku</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            Halaman Tambah Data Buku
                        </li>
                    </ol>
                    <form action="{{ route('action.create-buku') }}" method="POST">
                        @csrf
                        <div class="row gap-3">
                            <div class="col-12 col-md-4 form-group">
                                <label for="buku_judul" class="form-label">Judul Buku *</label>
                                <input type="text" name="buku_judul" id="buku_judul" class="form-control"
                                    placeholder="Masukkan judul buku" />
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="buku_penulis_id" class="form-label">Penulis Buku *</label>
                                <select name="buku_penulis_id" id="buku_penulis_id" class="form-control">
                                    <option selected>
                                        -Pilih Penulis Buku-
                                    </option>

                                    @foreach ($penulis as $penuliss)
                                        <option value="{{ $penuliss->penulis_id }}">
                                            {{ $penuliss->penulis_nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="buku_penerbit_id" class="form-label">Penerbit Buku *</label>
                                <select name="buku_penerbit_id" id="buku_penerbit_id" class="form-control">
                                    <option selected>
                                        -Pilih Penerbit Buku-
                                    </option>
                                    @foreach ($penerbit as $penerbits)
                                        <option value="{{ $penerbits->penerbit_id }}">
                                            {{ $penerbits->penerbit_nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="buku_thnterbit" class="form-label">Tahun Terbit *</label>
                                <input type="text" name="buku_thnterbit" id="buku_thnterbit" class="form-control"
                                    placeholder="Masukkan tahun terbit" />
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="buku_kategori_id" class="form-label">Kategori Buku *</label>
                                <select name="buku_kategori_id" id="buku_kategori_id" class="form-control">
                                    <option selected>
                                        -Pilih Kategori Buku-
                                    </option>
                                    @foreach ($kategori as $kategoris)
                                        <option value="{{ $kategoris->kategori_id }}">
                                            {{ $kategoris->kategori_nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="buku_rak_id" class="form-label">Rak Buku *</label>
                                <select name="buku_rak_id" id="buku_rak_id" class="form-control">
                                    <option selected>
                                        -Pilih Rak Buku-
                                    </option>
                                    @foreach ($rak as $raks)
                                        <option value="{{ $raks->rak_id }}">
                                            {{ $raks->rak_lokasi }} ({{ $raks->rak_nama }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="buku_isbn" class="form-label">Nomor ISBN *</label>
                                <input type="text" name="buku_isbn" id="buku_isbn" class="form-control"
                                    placeholder="Masukkan nomor ISBN" />
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-12 col-md-4">
                                <button class="btn btn-primary">
                                    Tambahkan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
@endsection
