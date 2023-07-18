@extends('layouts.admin')
@section('container')

@php
use Carbon\Carbon;
@endphp

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">View Data Karyawan</h1>
    <p class="mb-4"></p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Karyawan</h6>
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
                            <th>Tanggal Masuk</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Gender</th>
                            <th>Alamat</th>
                            <th>Divisi</th>
                            <th>No Telepon</th>
                        </tr>
                    </thead>
                    <tfoot>
                        @php $no = 1; @endphp
                        @foreach ($karyawan as $data)
                        <tr>
                            <th>{{ $no++ }}</th>
                            <td>{{ $data->nama }}</td>
                            <td>{{ Carbon::parse($data->tanggal_masuk)->format('d-m-Y') }}</td>
                            <td>{{ $data->tempat_lahir }}</td>
                            <td>{{ Carbon::parse($data->tanggal_lahir)->format('d-m-Y')}}</td>
                            <td>{{ $data->gender}}</td>
                            <td>{{ $data->alamat }}</td>
                            <td>{{ $data->nama_divisi }}</td>
                            <td>{{ $data->no_telp }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection