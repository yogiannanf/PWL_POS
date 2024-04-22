@extends('layout.app')

{{--Customize layout sections--}}

@section('subtitle', 'Level')
@section('content_header_title', 'Level')
@section('content_header_subtitle', 'Edit')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Edit Level</div>
            <div class="card-body">
                <a class="btn btn-secondary" href="{{url('/level')}}">Kembali</a>
                <form method="post" action="{{route('level.update', $level->level_id)}}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="kategori_kode">Kode Level</label>
                        <input type="text" class="form-control" id="kodeLevel" name="kodeLevel" value="{{$data->level_kode}}">
                    </div>

                    <div class="form-group">
                        <label for="kategori_nama">Nama Level</label>
                        <input type="text" class="form-control" id="namaLevel" name="namaLevel" value="{{$data->level_nama}}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection