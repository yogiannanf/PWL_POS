@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('barang') }}" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">ID Kategori</label>
                    <div class="col-11">
                        <select class="form-control" id="kategori" name="kategori_id" required>
                            <option value="">- Jenis Kategori -</option>
                            @foreach($kategori as $item)
                                <option value="{{ $item->kategori_id }}" data-id="{{ $item->kategori_id }}">{{ $item->kategori_id }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Kode Barang</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="barangKode" name="barangKode" value="{{ old('barangKode') }}" required>
                        @error('barangKode')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Nama Barang</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="barangNama" name="barangNama" value="{{ old('barangNama') }}" required>
                        @error('barangNama')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Harga Beli</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="hargaBeli" name="hargaBeli" value="{{ old('hargaBeli') }}" required>
                        @error('hargaBeli')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Harga Jual</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="hargaJual" name="hargaJual" value="{{ old('hargaJual') }}" required>
                        @error('hargaJual')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label"></label>
                    <div class="col-11">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a class="btn btn-sm btn-default ml-1" href="{{ url('barang')}}">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')
@endpush