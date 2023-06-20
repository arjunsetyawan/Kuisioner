@extends('layouts.admin')
@section('container')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Tambah Data Pertanyaan</h1>
    <p class="mb-4"></p>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <form class="col-lg-8" method="post" action="/datapertanyaan/tambah">
                    @csrf
                    <div class="mb-3">
                        <label for="kriteria" class="form-label">Kriteria</label>
                        <select class="form-select form-control @error('kriteria_id') is-invalid @enderror" name="kriteria_id">
                            @foreach ($kriterias as $kriteria)
                            <option value="{{ $kriteria->id_kriteria }}">{{ $kriteria->kriteria }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        @error('kriteria_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama_pertanyaan" class="form-label">Pertanyaan</label>
                        <input type="text" class="form-control @error('nama_pertanyaan') is-invalid @enderror" id="nama_pertanyaan" name="nama_pertanyaan" required value="{{ old('nama_pertanyaan') }}">
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
                            <option value="{{ $periode->id_periode }}">{{ $periode->bulan }}</option>
                            @endforeach
                        </select>
                    </div>
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