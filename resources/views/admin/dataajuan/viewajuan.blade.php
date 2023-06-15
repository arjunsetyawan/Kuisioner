@extends('layouts.admin')
@section('container')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">View Data Ajuan</h1>
    <p class="mb-4"></p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Ajuan</h6>
        </div>

        @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}

        </div>
        @endif

        @if (session()->has('sukses'))
        <div class="alert alert-success" role="alert">
            {{ session('sukses') }}

        </div>
        @endif

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th>Status Akun</th>
                            <th>Status Ajuan</th>
                            @can('admin')
                            <th style="width: 10%;">Action</th>
                            @endcan
                        </tr>
                    </thead>
                    <tfoot>
                        @php $no = 1; @endphp
                        @foreach ($ajuan as $data)
                        <tr>
                            <th>{{ $no++ }}</th>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->password }}</td>
                            <td>
                                @if ($data->role_id == 2)
                                User
                                @elseif($data->role_id == 1)
                                Admin
                                @endif
                            </td>
                            <th>{{ $data->status }}</th>
                            <th>{{ $data->status_ajuan }}</th>
                            @can('admin')
                            <td>
                                <a href="/dataajuan/edit/{{ $data->id }}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                            </td>
                            @endcan
                        </tr>
                        @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
