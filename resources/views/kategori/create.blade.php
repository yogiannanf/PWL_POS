@extends('layout.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Create')

{{-- Content body: main page content --}}

@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Buat kategori baru</h3>
            </div>

            <form method="post" action="../kategori">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="katagori_kode">Kode Kategori</label>
                    <input type="kategori_kode" type="text" class="form-control" id="kodeKategori" name="kodeKategori" placeholder="untuk makanan, contoh:MKN" class="@error('kategori_kode') is-invalid @enderror">
                </div>
                @error('kategori_kode')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

                <div class="form-group">
                    <label for="namaKategori">Nama Kategori</label>
                    <input type="text" class="form-control" id="namaKategori" name="namaKategori" placeholder="Nama">
                </div>
            </div>
            
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

            {{-- <label for="kategori_kode">Kode kategori</label>

            <input type="kategori_kode"
                type="text"
                name="kategori_kode"
                class="@error('kategori_kode') is-invalid @enderror"> --}}

            
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

        </form>
        </div>
    </div>
@endsection