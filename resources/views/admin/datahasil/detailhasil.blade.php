@extends('layouts.admin')
@section('container')

@php
use Carbon\Carbon;
@endphp

<div class="container-fluid">
    <p class="mb-4"></p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col">
                    <h6 class="m-0 font-weight-bold text-primary">Data Hasil </h6>
                </div>
                <div class="d-flex justify-content-end">
                    <form action="" method="GET">
                        @csrf
                        <select name="bulan" id="bulan">
                            @if ($searchBulan != null)
                            @foreach ($periode as $data )
                            <option value="{{$data->id_periode}}" @if ($data->id_periode == $searchBulan)
                                selected
                                @endif>{{$data->bulan}}</option>
                            @endforeach
                            @else
                            @foreach ($periode as $data )
                            <option value="{{$data->id_periode}}">{{$data->bulan}}</option>
                            @endforeach
                            @endif
                        </select>
                        <button type="submit" style="height : 35px;" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="col float-right">
                </div>
            </div>

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

        <input type="text" class="form-control" id="attitue" name="attitue" hidden value="{{$datadetail['attitude']}}">
        <input type="text" class="form-control" id="kedisiplinan" name="kedisiplinan" hidden value="{{$datadetail['kedisiplinan']}}">
        <input type="text" class="form-control" id="inisiatif" name="inisiatif" hidden value="{{$datadetail['inisiatif']}}">
        <input type="text" class="form-control" id="leadership" name="leadership" hidden value="{{$datadetail['leadership']}}">
        <input type="text" class="form-control" id="kerjasama" name="kerjasama" hidden value="{{$datadetail['kerjasama']}}">
        <input type="text" class="form-control" id="kehadiran" name="kehadiran" hidden value="{{$datadetail['kehadiran']}}">
        <input type="text" class="form-control" id="tanggungjawab" name="tanggungjawab" hidden value="{{$datadetail['tanggungjawab']}}">
        <input type="text" class="form-control" id="komunikasi" name="komunikasi" hidden value="{{$datadetail['komunikasi']}}">


        <div class="row">
            <div class="table-responsive" style="width: 30%; margin-top:52px; margin-left:10px;">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tbody>
                        <tr>
                            <td>Nama Karyawan</td>
                            <td style="width: 5%;">:</td>
                            <td>{{$datakaryawan->nama}}</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td style="width: 5%;">:</td>
                            <td>{{$datakaryawan->gender}}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Masuk</td>
                            <td style="width: 5%;">:</td>
                            <td>{{Carbon::parse($datakaryawan->tanggal_masuk)->format('d-m-Y')}}</td>
                        </tr>
                        <tr>
                            <td>Divisi</td>
                            <td style="width: 5%;">:</td>
                            <td>@if ($datakaryawan->divisi_id == 2)
                                Software Quality Assurance
                                @elseif($datakaryawan->divisi_id == 3)
                                Backend
                                @elseif($datakaryawan->divisi_id == 4)
                                Frontend
                                @elseif($datakaryawan->divisi_id == 6)
                                API Tester
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Tempat & Tanggal Lahir</td>
                            <td style="width: 5%;">:</td>
                            <td>{{ $datakaryawan->tempat_lahir }}, {{ Carbon::parse($datakaryawan->tanggal_lahir)->format('d-m-Y')}}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td style="width: 5%;">:</td>
                            <td>{{ $datakaryawan->alamat }}</td>
                        </tr>
                        <tr>
                            <td>No Telepon</td>
                            <td style="width: 5%;">:</td>
                            <td>{{ $datakaryawan->no_telp }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div style="width: 50%;" class="card-body">
                <div>
                    <canvas id="myChart" class="d-flex justify-content-center"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.slim.js" integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    let attitude = $('#attitue').val();
    let kedisiplinan = $('#kedisiplinan').val();
    let inisiatif = $('#inisiatif').val();
    let leadership = $('#leadership').val();
    let kerjasama = $('#kerjasama').val();
    let kehadiran = $('#kehadiran').val();
    let tanggungjawab = $('#tanggungjawab').val();
    let komunikasi = $('#komunikasi').val();

    // let data = $('#test2').val();
    let data4 = [attitude, kedisiplinan, inisiatif, leadership, kerjasama, kehadiran, tanggungjawab, komunikasi];
    // let data2 = JSON.parse(data);
    // let data4 = [data2['attitude'], data2['kedisiplinan'], data2["inisiatif"], data2["leadership"], data2['kerjasama'], data2['kehadiran'], data2['tanggungjawab'], data2['komunikasi']];
</script>
<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Attitude', 'Kedisplinan', 'Inisiatif', 'Leadership', 'Kerjasama', 'Kehadiran', 'Tanggungjawab', 'Komunikasi'],
            datasets: [{
                label: 'Data Penilaian',
                data: data4,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

@endsection