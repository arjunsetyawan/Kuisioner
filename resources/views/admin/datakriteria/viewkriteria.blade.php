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
            @can('admin')
            <a href="/datakriteria/create" class="mb-4 btn btn-primary">Tambah data Kriteria </a>
            @endcan
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kriteria</th>
                            <th style="width : 70%">Detail Kriteria</th>
                            @can('admin')
                            <th>Action</th>
                            @endcan
                        </tr>
                    </thead>
                    <tfoot>
                        @foreach ($kriteria as $data)
                        <tr>
                            <td>{{ $data->id_kriteria }}</td>
                            <td>{{ $data->kriteria }}</td>
                            <td>{{ $data->detail_kriteria }}</td>
                            @can('admin')
                            <td>
                                <a href="/datakriteria/edit/{{ $data->id_kriteria }}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                <form action="/datakriteria/delete/{{ $data->id_kriteria }}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure want to delete?')"><i class="bi bi-trash"></i></button>
                                </form>
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
<br>

<div class="d-flex justify-content-end me-4">
    {{ $kriteria->links() }}
</div>

@endsection