@extends('layout.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Level')
@section('content_header_title', 'Level')
@section('content_header_subtitle', 'Create')

{{-- Content body: main page content --}}

@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Buat level baru</h3>
            </div>

            <form method="post" action="../level">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="kodeKategori">Kode Level</label>
                    <input type="text" class="@error('level_kode') is-invalid @enderror form-control" id="level_kode" name="level_kode" placeholder=" Kode Level">
                    @error('level_kode')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="namaKategori">Nama Level</label>
                    <input type="text" class="@error('level_nama') is-invalid @enderror form-control" id="level_nama" name="level_nama" placeholder="Nama Level">
                    @error('level_nama')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        </div>
    </div>
@endsection