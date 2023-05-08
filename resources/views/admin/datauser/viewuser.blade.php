@extends('layouts.admin')
@section('container')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">View Data User</h1>
        <p class="mb-4"></p>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
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
                <a href="/datauser/create" class="mb-4 btn btn-primary">Tambah data user</a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            @php $no = 1; @endphp
                            @foreach ($users as $data)
                                <tr>
                                    <th>{{ $no++ }}</th>
                                    <td>{{ $data->username }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->password }}</td>
                                    <td>
                                        @if ($data->role_id == 2)
                                            User
                                        @elseif($data->role_id == 1)
                                            Admin
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/datauser/edit/{{ $data->id }}" class="btn btn-primary"><i
                                                class="bi bi-pencil-square"></i></a>
                                        <form action="/datauser/delete/{{ $data->id }}" method="POST" class="d-inline">
                                            {{-- @method('delete') --}}
                                            @csrf
                                            <button class="btn btn-danger" type="submit"
                                                onclick="return confirm('Are you sure want to delete?')"><i
                                                    class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
