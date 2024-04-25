@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('penjualan/create')}}">Tambah</a>
            </div>
        </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{session('error')}}</div>
        @endif

        {{-- menampilkan data filtering --}}
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Filter:</label>
                    <div class="col-3">
                        <select class="form-control" id="userId" name="userId" required>
                            <option value="">- Semua -</option>
                            @foreach($user as $item)
                            <option value="{{ $item->user_id }}">{{ $item->user_id}}</option>
                            @endforeach
                        </select>
                        <small class="Form-text text-muted">ID User</small>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-bordered table-striped table-hover table-sm" id="table_user">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID User</th>
                    <th>Pembeli</th>
                    <th>Kode Penjualan</th>
                    <th>Tanggal Penjualan</th>
                    <th>Aksi</th></tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@push('css')
@endpush

@push('js')
    <script>
        $(document).ready(function() {
            var dataPenjualan = $('#table_user').DataTable({
                serverSide: true, 
                ajax: {
                    "url": "{{ url('penjualan/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    // mengirimkan data untuk filtering
                    "data": function (d){
                        d.user_id = $('#userId').val();
                    }
                },
                columns: [
                    {
                        data: "DT_RowIndex", // nomor urut dari laravel datatable addIndexColumn()
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    },{
                        data: "user_id",
                        className: "",
                        orderable: true, // orderable: true, jika ingin kolom ini bisa diurutkan
                        searchable: true // searchable: true, jika ingin kolom ini bisa dicari
                    },{
                        data: "pembeli",
                        className: "",
                        orderable: true, // orderable: true, jika ingin kolom ini bisa diurutkan
                        searchable: true // searchable: true, jika ingin kolom ini bisa dicari
                    },{
                        data: "penjualan_kode",
                        className: "",
                        orderable: false, // orderable: true, jika ingin kolom ini bisa diurutkan
                        searchable: false // searchable: true, jika ingin kolom ini bisa dicari
                    },{
                        data: "penjualan_tanggal",
                        className: "",
                        orderable: false, // orderable: true, jika ingin kolom ini bisa diurutkan
                        searchable: false // searchable: true, jika ingin kolom ini bisa dicari
                    },{
                        data: "aksi",
                        className: "",
                        orderable: false, // orderable: true, jika ingin kolom ini bisa diurutkan
                        searchable: false // searchable: true, jika ingin kolom ini bisa dicari
                    }
                ]
            });
            // menambahkan listener jika ada filtering terpilih
            $('#userId').on('change', function(){
                dataPenjualan.ajax.reload();
            })
        });
    </script>
@endpush