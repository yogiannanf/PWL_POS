@extends('layout.app')

{{--Customize layout sections--}}

@section('subtitle', 'm_user')
@section('content_header_title', 'Home')
@section('content_header_title', 'm_user')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage User</div>
            <div class="card-body">
                
                {{ $dataTable->table() }}
                <!-- Tambahkan tombol Add -->
        <a class="btn btn-Primary" href="{{route('user.create')}}">+ Add User</a>
            </div>
              
        </div>
      
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush