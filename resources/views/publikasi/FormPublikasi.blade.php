@extends('layouts.app')

@section('title', 'Tambah Publikasi')

@section('content')
    <div class="mx-auto" style="max-width: 700px;">
        <h3 class="mb-4">Tambah Publikasi</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/publikasi" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" id="judul" name="judul" class="form-control"
                       value="{{ old('judul') }}" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_rilis" class="form-label">Tanggal Rilis</label>
                <input type="date" id="tanggal_rilis" name="tanggal_rilis" class="form-control"
                       value="{{ old('tanggal_rilis') }}" required>
            </div>

            <div class="mb-3">
                <label for="sampul" class="form-label">Sampul</label>
                <input type="file" id="sampul" name="sampul" class="form-control" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="/publikasi" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection