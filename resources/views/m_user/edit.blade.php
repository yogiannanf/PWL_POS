@extends('layout.app')

{{--Customize layout sections--}}

@section('subtitle', 'm_user')
@section('content_header_title', 'm_user')
@section('content_header_subtitle', 'Edit')

@section('content')
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
@endsection