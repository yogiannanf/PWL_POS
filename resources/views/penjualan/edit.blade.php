@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @empty($penjualan)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
                <a href="{{ url('penjualan') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
            @else
                <form method="POST" action="{{ url('/penjualan/'.$penjualan->penjualan_id) }}" class="form-horizontal">
                        @csrf
                            {!! method_field('PUT') !!}
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">ID User</label>
                            <div class="col-11">
                                <select class="form-control" id="userId" name="userId" required>
                                    <option value="">- Pilih user -</option>
                                    @foreach($user as $item)
                                        <option value="{{ $item->user_id }}" @if($item->user_id == $penjualan->user_id) selected @endif>{{ $item->user_id}}</option>
                                    @endforeach
                                </select>
                                @error('userId')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </DIV>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Pembeli</label>
                        <div class="col-11">
                            <input type="text" class="form-control" id="pembeli" name="pembeli" value="{{ old('pembeli', $penjualan->pembeli) }}" required>
                            @error('pembeli')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Kode Penjualan</label>
                        <div class="col-11">
                            <input type="text" class="form-control" id="penjualanKode" name="penjualanKode" value="{{ old('penjualanKode', $penjualan->penjualan_kode) }}" required>
                            @error('penjualanKode')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Tanggal Penjualan</label>
                        <div class="col-11">
                            <input type="datetime-local" class="form-control" id="penjualanTanggal" name="penjualanTanggal" value="{{ old('penjualanTanggal', $penjualan->penjualan_tanggal) }}" required>
                            @error('penjualanTanggal')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label"></label>
                        <div class="col-11">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            <a class="btn btn-sm btn-default ml-1" href="{{ url('penjualan') }}">Kembali</a>
                        </div>
                    </div>
                </form>
            @endempty
        </div>
    </div>
@endsection
@push('css')
@endpush
@push('js')
@endpush