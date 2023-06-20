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
            @can('hrd')
            <a href="/datahasil/cetak" target="_blank" class="print-hidden mb-4 btn btn-primary float-right"><i class="bi bi-printer-fill mr-2"></i>Cetak Data Hasil</a>
            @endcan
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th style="text-align: center; width: 5%;">Nama Karyawan</th>
                            <th style="text-align: center; width: 5%; ">Nama Pengisi</th>
                            <th style="text-align: center; ">Tanggal Pengisian</th>
                            <th>Attitude</th>
                            <th>Kedisiplinan</th>
                            <th>Inisiatif</th>
                            <th>Leadership</th>
                            <th>Kerjasama</th>
                            <th>Kehadiran</th>
                            <th>Tanggung Jawab</th>
                            <th>Komunikasi</th>
                            <th>Periode</th>
                        </tr>
                    </thead>
                    <tfoot>
                        @php $no = 1; @endphp
                        @foreach ($hasil as $data)
                        <tr>
                            <th>{{ $no++ }}</th>
                            <td>{{ $data->nama_karyawan }}</td>
                            <td>{{ $data->nama_karyawan2 }}</td>
                            <td>{{ Carbon::parse($data->tanggal_pengisian)->format('d-m-Y') }}</td>
                            <td>
                                @if ($data->attitude <= 3) Kurang @elseif($data->attitude <= 6) Cukup @elseif($data->attitude <= 9) Baik @elseif($data->attitude <= 12) Sangat Baik @endif </td>
                            <td>
                                @if ($data->kedisiplinan <= 3) Kurang @elseif($data->kedisiplinan <= 6) Cukup @elseif($data->kedisiplinan <= 9) Baik @elseif($data->kedisiplinan <= 12) Sangat Baik @endif </td>
                            <td>
                                @if ($data->inisiatif <= 3) Kurang @elseif($data->inisiatif <= 6) Cukup @elseif($data->inisiatif <= 9) Baik @elseif($data->inisiatif <= 12) Sangat Baik @endif </td>
                            <td>
                                @if ($data->leadership <= 3) Kurang @elseif($data->leadership <= 6) Cukup @elseif($data->leadership <= 9) Baik @elseif($data->leadership <= 12) Sangat Baik @endif </td>
                            <td>
                                @if ($data->kerjasama <= 3) Kurang @elseif($data->kerjasama <= 6) Cukup @elseif($data->kerjasama <= 9) Baik @elseif($data->kerjasama <= 12) Sangat Baik @endif </td>
                            <td>
                                @if ($data->kehadiran <= 3) Kurang @elseif($data->kehadiran <= 6) Cukup @elseif($data->kehadiran <= 9) Baik @elseif($data->kehadiran <= 12) Sangat Baik @endif </td>
                            <td>
                                @if ($data->tanggungjawab <= 3) Kurang @elseif($data->tanggungjawab <= 6) Cukup @elseif($data->tanggungjawab <= 9) Baik @elseif($data->tanggungjawab <= 12) Sangat Baik @endif </td>
                            <td>
                                @if ($data->komunikasi <= 3) Kurang @elseif($data->komunikasi <= 6) Cukup @elseif($data->komunikasi <= 9) Baik @elseif($data->komunikasi <= 12) Sangat Baik @endif </td>
                            <td>{{ $data->bulan }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
