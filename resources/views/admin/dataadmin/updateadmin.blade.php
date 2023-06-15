@extends('layouts.admin')
@section('container')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Update Data Admin</h1>
    <p class="mb-4"></p>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <form class="col-lg-8" method="post" action="/dataadmin/update/{{ $data->id }}">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label @error('nama') is-invalid @enderror">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required value="{{ old('nama', $data->nama) }}" autofocus>
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email', $data->email) }}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" name="role_id">
                            @foreach ($roles as $role)
                            @if (old('role_id', $data->role_id) == $role->id)
                            <option value="{{ $role->id }}" selected>{{ $role->role }}</option>
                            @else
                            <option value="{{ $role->id }}">{{ $role->role }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" name="status">
                            @if (old('status', $data->status) == 'Active')
                            <option value="Active" selected>Active</option>
                            <option value="Inactive">Inactive</option>
                            @else
                            <option value="Inactive" selected>Inactive</option>
                            <option value="Active">Active</option>
                            @endif
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection