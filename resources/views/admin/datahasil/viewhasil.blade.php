@extends('layouts.admin')
@section('container')

@php
use Carbon\Carbon;
@endphp


<style>
    @media print {
        .print-hidden {
            display: none;
        }
    }
</style>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">View Data Hasil Kuisioner</h1>
    <p class="mb-4"></p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Hasil</h6>
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
                            <th>Nama Karyawan</th>
                            <th>Tanggal Masuk</th>
                            <th>Divisi</th>
                            <th>Status</th>
                            <th style="width: 10%">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        @php $no = 1; @endphp
                        @foreach ($view as $data)
                        <tr>
                            <th>{{ $no++ }}</th>
                            <td>{{ $data->nama }}</td>
                            <td>{{ Carbon::parse($data->tanggal_masuk)->format('d-m-Y') }}</td>
                            <td> @if ($data->divisi_id == 2)
                                Software Quality Assurance
                                @elseif($data->divisi_id == 3)
                                Backend
                                @elseif($data->divisi_id == 4)
                                Frontend
                                @elseif($data->divisi_id == 6)
                                API Tester
                                @endif
                            </td>
                            <td>{{ $data->status }}</td>
                            <td>
                                <a href="/hrd/detailhasil/{{$data->id}}" class="btn btn-primary"><i class="bi bi-eye-fill"></i></a>
                                <a href="/datahasil/cetak/{{$data->id}}" class="btn btn-danger"><i class="bi bi-printer"></i></a>
                            </td>
                        </tr>
                        </tbody>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
