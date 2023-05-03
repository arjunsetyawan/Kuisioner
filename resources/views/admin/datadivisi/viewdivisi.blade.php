@extends('layouts.admin')
@section('container')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">View Data Divisi</h1>
        <p class="mb-4"></p>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Divisi</h6>
            </div>

            @if (session()->has('sukses'))
                <div class="alert alert-success" role="alert">
                    {{ session('sukses') }}

                </div>
            @endif

            <div class="card-body">
                <a href="/datadivisi/create" class="mb-4 btn btn-primary">Tambah data divisi</a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th>Divisi</th>
                                <th style="width :20%">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            @php $no = 1; @endphp
                            @foreach ($divisi as $data)
                                <tr>
                                    <th>{{ $no++ }}</th>
                                    <td>{{ $data->nama_divisi }}</td>
                                    <td>
                                        <button class="btn btn-primary" type="button"><i
                                                class="bi bi-pencil-square"></i></button>
                                        <form action="/datadivisi/delete/{{ $data->id }}" method="POST"
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
@endsection
