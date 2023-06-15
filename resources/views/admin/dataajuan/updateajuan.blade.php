@extends('layouts.admin')
@section('container')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Update Data Ajuan</h1>
    <p class="mb-4"></p>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <form class="col-lg-8" method="post" action="/dataajuan/update/{{ $data->id }}">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label @error('nama') is-invalid @enderror">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $data->nama) }}" disabled>
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label @error('email') is-invalid @enderror">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $data->email) }}" disabled>
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label @error('password') is-invalid @enderror">Password</label>
                        <input type="text" class="form-control" id="password" name="password" value="{{ old('password', $data->password) }}" disabled>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Role" class="form-label">Role</label>
                        <select class="form-select form-control @error('role_id') is-invalid @enderror" name="role_id" disabled>
                            @foreach ($roles as $role)
                            @if (old('role_id', $data->role_id) == $role->id)
                            <option value="{{ $role->id }}" selected>{{ $role->role }}</option>
                            @else
                            <option value="{{ $role->id }}">{{ $role->role }}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('role_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label @error('status') is-invalid @enderror">Status</label>
                        <input type="text" class="form-control" id="status" name="status" value="{{ old('status', $data->status) }}" disabled>
                        @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status_ajuan" class="form-label">Status Ajuan</label>
                        @if ($data->status_ajuan == "Akun telah dibuat" )
                        <select class="form-select" name="status_ajuan" disabled>
                            <option>{{$data->status_ajuan}}</option>
                        </select>
                        @endif
                        @if (($data->status_ajuan) == "Menunggu Admin")
                        <select class="form-select" name="status_ajuan">
                            <option value="Menunggu Admin">Menunggu Admin</option>
                            <option value="Akun telah dibuat">Akun telah dibuat</option>
                        </select>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection