@extends('m_user/template')
@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Membuat Daftar User</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="{{ route('m_user.index') }}">
                Kembali</a>
        </div>
    </div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Ops</strong> Input gagal<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ route('m_user.store') }}" method="POST">
    @csrf
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Level_id:</strong>
            <input type="text" name="level_id" class="form-control" placeholder="Masukkan Level Id"></input>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Username:</strong>
            <input type="text" name="username" class="form-control" placeholder="Masukkan username"></input>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>nama:</strong>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama"></input>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Password:</strong>
            <input type="password" name="password" class="form-control" placeholder="Masukkan password"></input>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </div>
</form>

{{-- @extends('layout.app')

{{-- Customize layout sections --}}

{{-- @section('subtitle', 'm_user')
@section('content_header_title', 'm_user')
@section('content_header_subtitle', 'Create') --}}

{{-- Content body: main page content --}}

{{-- @section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Buat user baru</h3>
            </div> --}}

            {{-- <form method="post" action="../m_user">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                    <input type="text" class="@error('nama') is-invalid @enderror form-control" id="nama" name="nama" placeholder="Nama">
                    @error('nama')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div> --}}

                {{-- <div class="form-group">
                    <label for="leveld">Level Id</label>
                    <select type="text" class="@error('level_id') is-invalid @enderror form-control" id="levelId" name="levelId">
                        @foreach ($levels as $level)
                            <option value="{{ $level->level_id }}">{{ $level->level_nama }}</option>
                        @endforeach
                    </select>
                    @error('level_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div> --}}

                {{-- <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="@error('username') is-invalid @enderror form-control" id="username" name="username" placeholder="Username">
                    @error('username')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div> --}}

                {{-- <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="@error('password') is-invalid @enderror form-control" id="password" name="password" placeholder="Password">
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div> --}}
            
            {{-- <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        </div>
    </div>
@endsection --}}