@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('penjualan') }}" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">ID User</label>
                    <div class="col-11">
                        <select class="form-control" id="userId" name="userId" required>
                            <option value="">- Pilih user -</option>
                            @foreach($user as $item)
                                <option value="{{ $item->user_id }}">{{ $item->user_id}}</option>
                            @endforeach
                        </select>
                        @error('userId')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Pembeli</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="pembeli" name="pembeli" value="{{ old('pembeli') }}" required>
                        @error('pembeli')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Kode Penjualan</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="penjualanKode" name="penjualanKode" value="{{ old('penjualanKode') }}" required>
                        @error('penjualanKode')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label"> Tanggal Penjualan</label>
                    <div class="col-11">
                        <input type="datetime-local" class="form-control" id="penjualanTanggal" name="penjualanTanggal" value="{{ date('Y-m-d\TH:i:s') }}" required>
                        @error('penjualanTanggal')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label"></label>
                    <div class="col-11">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a class="btn btn-sm btn-default ml-1" href="{{ url('penjualan')}}">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('css')
@endpush
@push('js')
<script>
    // Set tanggal dan waktu terkini
    const now = new Date();
    const year = now.getFullYear();
    const month = now.getMonth() + 1 < 10 ? '0' + (now.getMonth() + 1) : now.getMonth() + 1;
    const day = now.getDate() < 10 ? '0' + now.getDate() : now.getDate();
    const hours = now.getHours() < 10 ? '0' + now.getHours() : now.getHours();
    const minutes = now.getMinutes() < 10 ? '0' + now.getMinutes() : now.getMinutes();
    const seconds = now.getSeconds() < 10 ? '0' + now.getSeconds() : now.getSeconds();
    const currentTime = `${year}-${month}-${day}T${hours}:${minutes}:${seconds}`;
    document.getElementById('penjualanTanggal').value = currentTime;
</script>
@endpush