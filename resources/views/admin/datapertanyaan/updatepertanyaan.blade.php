@extends('layouts.admin')
@section('container')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Update Data Pertanyaan</h1>
    <p class="mb-4"></p>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <form class="col-lg-8" method="post" action="/datapertanyaan/update/{{ $data->id }}">
                    @csrf
                    <div class="mb-3">
                        <label for="kriteria_id" class="form-label">Kriteria</label>
                        <select class="form-select form-control @error('kriteria_id') is-invalid @enderror" name="kriteria_id">
                            @foreach ($kriterias as $kriteria)
                            @if (old('kriteria_id', $data->kriteria_id) == $kriteria->id_kriteria)
                            <option value="{{ $kriteria->id_kriteria }}" selected>{{ $kriteria->kriteria }}</option>
                            @else
                            <option value="{{ $kriteria->id_kriteria }}">{{ $kriteria->kriteria }}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('kriteria_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama_pertanyaan" class="form-label">Pertanyaan</label>
                        <input type="text" class="form-control @error('nama_pertanyaan') is-invalid @enderror" id="nama_pertanyaan" name="nama_pertanyaan" required value="{{ old('nama_pertanyaan', $data->nama_pertanyaan) }}">
                        @error('nama_pertanyaan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="periode" class="form-label">Periode</label>
                        <select class="form-select form-control @error('periode_id') is-invalid @enderror" name="periode_id">
                            @foreach ($periodes as $periode)
                            @if (old('periode_id', $data->periode_id) == $periode->id_periode)
                            <option value="{{ $periode->id_periode }}" selected>{{ $periode->bulan }}</option>
                            @else
                            <option value="{{ $periode->id_periode }}">{{ $periode->bulan }}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('periode_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection