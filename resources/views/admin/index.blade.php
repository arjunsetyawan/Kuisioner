@extends('layouts.admin')
@section('container')

@php
setlocale(LC_TIME, 'id_ID');
use Carbon\Carbon;
use Carbon\CarbonInterface;
@endphp

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    @can('hrd')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Grafik Penilaian Bulan {{ Carbon::now()->isoFormat('MMMM')}}</h1>
    </div>
    @endcan

    @can('admin')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard Admin</h1>
    </div>
    @endcan

    <!-- Content Row -->
    <div class="row">

        @can('admin')
        <!-- Total User -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="">
                                    Total User</a>
                            </div>
                            <div class="col-auto">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $users }}</div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endcan

        @can('admin')
        <!-- Total Divisi -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="">
                                    Total Divisi</a>
                            </div>
                            <div class="col-auto">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $divisi }}</div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endcan

        @can('admin')
        <!-- Total Kriteria -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><a href="">Kriteria</a>
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $kriteria }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endcan

        @can('admin')
        <!-- Total Pertanyaan -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                <a href="">Total Pertanyaan</a>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pertanyaan }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endcan

        @can('admin')
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                <a href="">Total Ajuan</a>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $ajuan }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endcan
        <!-- Total Pertanyaan -->

        <!-- @can('hrd') -->
        <!-- Total User Yang Sudah Isi Kuisioner -->
        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                <a href="">Total User yang Sudah Diisi</a>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $hasil }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Total Yang Belum mengisi Kuisioner -->
        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                <a href="">Total User Belum Disi sama sekali</a>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $selisih }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endcan -->
    </div>

    @can('hrd')
    <input type="text" class="form-control" id="hasilkuisioner" name="hasilkuisioner" hidden value="{{$hasilkuisioner}}">
    @endcan

    <!-- Content Row -->

    <div class="row">
        <div class="col-md-3 col-lg-4">
            <canvas id="myChart"></canvas>
        </div>
        <div class="col-md-3 col-lg-4">
            <canvas id="myChart2"></canvas>
        </div>
        <div class="col-md-3 col-lg-4">
            <canvas id="myChart3"></canvas>
        </div>
        <div class="col-md-3 col-lg-4">
            <canvas id="myChart4"></canvas>
        </div>
        <div class="col-md-3 col-lg-4">
            <canvas id="myChart5"></canvas>
        </div>
        <div class="col-md-3 col-lg-4">
            <canvas id="myChart6"></canvas>
        </div>
        <div class="col-md-3 col-lg-4">
            <canvas id="myChart7"></canvas>
        </div>
        <div class="col-md-3 col-lg-4">
            <canvas id="myChart8"></canvas>
        </div>
    </div>
    <!-- Content Row -->
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script src="https://code.jquery.com/jquery-3.7.0.slim.js" integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    let attitude = JSON.parse($('#hasilkuisioner').val());

    let data1 = [];
    let namedata1 = [];
    attitude.forEach(element => {
        data1.push(element.attitude);
    });
    attitude.forEach(element => {
        namedata1.push(element.nama);
    });
</script>

<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: namedata1,
            datasets: [{
                label: 'Data Attitude',
                data: data1,
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

<script>
    let kedisiplinan = JSON.parse($('#hasilkuisioner').val());

    let data2 = [];
    let namedata2 = [];
    kedisiplinan.forEach(element => {
        data2.push(element.kedisiplinan);
    });
    kedisiplinan.forEach(element => {
        namedata2.push(element.nama);
    });
</script>

<script>
    const ctx2 = document.getElementById('myChart2');

    new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: namedata2,
            datasets: [{
                label: 'Data Kedisiplinan',
                data: data2,
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

<script>
    let inisiatif = JSON.parse($('#hasilkuisioner').val());

    let data3 = [];
    let namedata3 = [];
    inisiatif.forEach(element => {
        data3.push(element.inisiatif);
    });
    inisiatif.forEach(element => {
        namedata3.push(element.nama);
    });
</script>

<script>
    const ctx3 = document.getElementById('myChart3');

    new Chart(ctx3, {
        type: 'bar',
        data: {
            labels: namedata3,
            datasets: [{
                label: 'Data Inisiatif',
                data: data3,
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

<script>
    let leadership = JSON.parse($('#hasilkuisioner').val());

    let data4 = [];
    let namedata4 = [];
    leadership.forEach(element => {
        data4.push(element.leadership);
    });
    leadership.forEach(element => {
        namedata4.push(element.nama);
    });
</script>

<script>
    const ctx4 = document.getElementById('myChart4');

    new Chart(ctx4, {
        type: 'bar',
        data: {
            labels: namedata4,
            datasets: [{
                label: 'Data Leadership',
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

<script>
    let kerjasama = JSON.parse($('#hasilkuisioner').val());

    let data5 = [];
    let namedata5 = [];
    kerjasama.forEach(element => {
        data5.push(element.kerjasama);
    });
    kerjasama.forEach(element => {
        namedata5.push(element.nama);
    });
</script>

<script>
    const ctx5 = document.getElementById('myChart5');

    new Chart(ctx5, {
        type: 'bar',
        data: {
            labels: namedata5,
            datasets: [{
                label: 'Data Kerjasama',
                data: data5,
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

<script>
    let kehadiran = JSON.parse($('#hasilkuisioner').val());

    let data6 = [];
    let namedata6 = [];
    kehadiran.forEach(element => {
        data6.push(element.kehadiran);
    });
    kehadiran.forEach(element => {
        namedata6.push(element.nama);
    });
</script>

<script>
    const ctx6 = document.getElementById('myChart6');

    new Chart(ctx6, {
        type: 'bar',
        data: {
            labels: namedata6,
            datasets: [{
                label: 'Data Kehadiran',
                data: data6,
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

<script>
    let tanggungjawab = JSON.parse($('#hasilkuisioner').val());

    let data7 = [];
    let namedata7 = [];
    tanggungjawab.forEach(element => {
        data7.push(element.tanggungjawab);
    });
    tanggungjawab.forEach(element => {
        namedata7.push(element.nama);
    });
</script>

<script>
    const ctx7 = document.getElementById('myChart7');

    new Chart(ctx7, {
        type: 'bar',
        data: {
            labels: namedata7,
            datasets: [{
                label: 'Data Tanggungjawab',
                data: data7,
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

<script>
    let komunikasi = JSON.parse($('#hasilkuisioner').val());

    let data8 = [];
    let namedata8 = [];
    komunikasi.forEach(element => {
        data8.push(element.komunikasi);
    });
    komunikasi.forEach(element => {
        namedata8.push(element.nama);
    });
</script>

<script>
    const ctx8 = document.getElementById('myChart8');

    new Chart(ctx8, {
        type: 'bar',
        data: {
            labels: namedata8,
            datasets: [{
                label: 'Data Komunikasi',
                data: data8,
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