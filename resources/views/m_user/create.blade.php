@extends('layout.app')

{{-- Customize layout sections --}}

@section('subtitle', 'm_user')
@section('content_header_title', 'm_user')
@section('content_header_subtitle', 'Create')

{{-- Content body: main page content --}}

@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Buat user baru</h3>
            </div>

            <form method="post" action="../m_user">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                    <input type="text" class="@error('nama') is-invalid @enderror form-control" id="nama" name="nama" placeholder="Nama">
                    @error('nama')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="leveld">Level Id</label>
                    <select type="text" class="@error('level_id') is-invalid @enderror form-control" id="levelId" name="levelId">
                        @foreach ($levels as $level)
                            <option value="{{ $level->level_id }}">{{ $level->level_nama }}</option>
                        @endforeach
                    </select>
                    @error('level_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="@error('username') is-invalid @enderror form-control" id="username" name="username" placeholder="Username">
                    @error('username')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="@error('password') is-invalid @enderror form-control" id="password" name="password" placeholder="Password">
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        </div>
    </div>
@endsection