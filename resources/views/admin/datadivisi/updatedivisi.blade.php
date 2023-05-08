@extends('layouts.admin')
@section('container')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Update Data Divisi</h1>
        <p class="mb-4"></p>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form class="col-lg-8" method="post" action="/datadivisi/update/{{ $data->id }}">
                        @csrf
                        <div class="mb-3">
                            <label for="divisi" class="form-label @error('divisi') is-invalid @enderror">Divisi</label>
                            <input type="text" class="form-control" id="divisi" name="nama_divisi" required
                                value="{{ old('divisi', $data->nama_divisi) }}" autofocus>
                            @error(' nama_divisi')
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
