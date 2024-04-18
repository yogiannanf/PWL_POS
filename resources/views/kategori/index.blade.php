@extends('layout.app')

{{--Customize layout sections--}}

@section('subtitle', 'Kategori')
@section('content_header_title', 'Home')
@section('content_header_title', 'Kategori')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage Kategori</div>
            <div class="card-body">
                
                {{ $dataTable->table() }}
                <!-- Tambahkan tombol Add -->
        <a class="btn btn-Primary" href="/kategori/create">+ Add Kategori</a>
            </div>
              
        </div>
      
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush