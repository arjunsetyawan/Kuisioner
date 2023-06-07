@extends('layouts.admin')
@section('container')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">View Data Pertanyaan</h1>
        <p class="mb-4"></p>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Pertanyaan</h6>
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
                    <a href="/datapertanyaan/create" class="mb-4 btn btn-primary">Tambah data Pertanyaan</a>
                @endcan
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kriteria</th>
                                <th>Pertanyaan</th>
                                <th>Periode</th>
                                @can('admin')
                                    <th style="width: 10%;">Action</th>
                                @endcan
                            </tr>
                        </thead>
                        <tfoot>
                            @php $no = 1; @endphp
                            @foreach ($pertanyaan as $data)
                                <tr>
                                    <th>{{ $no++ }}</th>
                                    <td>
                                        @if ($data->kriteria_id == 1)
                                            Attitude
                                        @elseif($data->kriteria_id == 2)
                                            Kedisiplinan kerja
                                        @elseif($data->kriteria_id == 3)
                                            Inisiatif dalam bekerja
                                        @elseif($data->kriteria_id == 4)
                                            Leadership
                                        @elseif($data->kriteria_id == 5)
                                            Kerjasama tim
                                        @elseif($data->kriteria_id == 6)
                                            Kehadiran
                                        @elseif($data->kriteria_id == 7)
                                            Tanggung jawab
                                        @elseif($data->kriteria_id == 8)
                                            Komunikasi
                                        @endif
                                    </td>
                                    <td>{{ $data->nama_pertanyaan }}</td>
                                    <td>
                                        @if ($data->periode_id == 1)
                                            Januari
                                        @elseif($data->periode_id == 2)
                                            Februari
                                        @elseif($data->periode_id == 3)
                                            Maret
                                        @elseif($data->periode_id == 4)
                                            April
                                        @elseif($data->periode_id == 5)
                                            Mei
                                        @elseif($data->periode_id == 6)
                                            Juni
                                        @elseif($data->periode_id == 7)
                                            Juli
                                        @elseif($data->periode_id == 8)
                                            Agustus
                                        @elseif($data->periode_id == 9)
                                            September
                                        @elseif($data->periode_id == 10)
                                            Oktober
                                        @elseif($data->periode_id == 11)
                                            November
                                        @elseif($data->periode_id == 12)
                                            Desember
                                        @endif
                                    </td>
                                    @can('admin')
                                        <td>
                                            <a href="/datapertanyaan/edit/{{ $data->id }}" class="btn btn-primary"><i
                                                    class="bi bi-pencil-square"></i></a>
                                            <form action="/datapertanyaan/delete/{{ $data->id }}" method="POST"
                                                class="d-inline">
                                                {{-- @method('delete') --}}
                                                @csrf
                                                <button class="btn btn-danger" type="submit"
                                                    onclick="return confirm('Are you sure want to delete?')"><i
                                                        class="bi bi-trash"></i></button>
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

    <div class="d-flex justify-content-end mr-4">
        {{ $pertanyaan->links() }}

    </div>

@endsection
