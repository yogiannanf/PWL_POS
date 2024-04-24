@extends('m_user/template')
@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Edit User</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="{{ route('m_user.index') }}">
                Kembali</a>
        </div>
    </div>
</div>
@if ($errors->any())
<div class="alert alert-danger"><strong>Ops!</strong> Error <br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ route('m_user.update', $useri->user_id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Level_id:</strong>
                <input type="text" name="level_id" value="{{ $useri->level_id }}" class="form-control" placeholder="Masukkan level">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Username:</strong>
                <input type="text" value="{{ $useri->username }}" class="form-control" name="username" placeholder="Masukkan Nomor username">
            </div>
        </div>
        <div class=" col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>nama:</strong>
                <input type="text" value="{{ $useri->nama }}" name="nama" class="form-control" placeholder="Masukkan nama"></input>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password:</strong>
                <input type="password" value="{{ $useri->password }}" name="password" class="form-control" placeholder="Masukkan password"></input>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>
@endsection

{{-- @extends('layout.app') --}}

{{--Customize layout sections--}}

{{-- @section('subtitle', 'm_user')
@section('content_header_title', 'm_user')
@section('content_header_subtitle', 'Edit') --}}

{{-- @section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Edit User</div>
            <div class="card-body">
                <a class="btn btn-secondary" href="{{url('/m_user')}}">Kembali</a>
                <form method="post" action="{{route('m_user.update', $data->user_id)}}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="namaKategori">Level Id</label>
                      <select name="form-control" id="levelId">
                        @foreach ($levels as $level)
                        <option value="{{ $level->level_id }}" @if(@m_user->level_id == $level->level_id) selected @endif> {{ $level->level_nama }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                        <label for="kodeKategori">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="{{$data->username}}">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="{{ $user->password }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection --}}