@extends('layouts.admin')
@section('container')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">View Data Kriteria</h1>
        <p class="mb-4"></p>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Kriteria</h6>
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
                <a href="/datakriteria/create" class="mb-4 btn btn-primary">Tambah data admin</a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kriteria</th>
                                <th style="width : 70%">Detail Kriteria</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            @foreach ($kriteria as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->kriteria }}</td>
                                    <td>{{ $data->detail_kriteria }}</td>
                                    <td>
                                        <button class="btn btn-primary" type="button"><i
                                                class="bi bi-pencil-square"></i></button>
                                        <form action="/datakriteria/delete/{{ $data->id }}" method="POST"
                                            class="d-inline">
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
    <br>
@endsection
