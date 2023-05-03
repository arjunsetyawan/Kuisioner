@extends('layouts.admin')
@section('container')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Tambah Data Kriteria</h1>
        <p class="mb-4"></p>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form class="col-lg-8" method="post" action="/datakriteria/tambah">
                        @csrf
                        <div class="mb-3">
                            <label for="kriteria"
                                class="form-label @error('kriteria') is-invalid @enderror">Kriteria</label>
                            <input type="text" class="form-control" id="kriteria" name="kriteria" required
                                value="{{ old('kriteria') }}" autofocus>
                            @error('kriteria')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="detail_kriteria"
                                class="form-label @error('detail_kriteria') is-invalid @enderror">Detail Kriteria</label>
                            <input type="textarea" class="form-control" id="detail_kriteria" name="detail_kriteria"
                                required>
                            @error('detail_kriteria')
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
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
@endsection
