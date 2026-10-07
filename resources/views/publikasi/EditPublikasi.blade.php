@extends('layouts.app')

@section('title', 'Edit Publikasi')

@section('content')
    <div class="mx-auto" style="max-width: 700px;">
        <h3 class="mb-4">Edit Publikasi</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/publikasi/{{ $publikasi->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" id="judul" name="judul" class="form-control"
                       value="{{ old('judul', $publikasi->judul) }}" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_rilis" class="form-label">Tanggal Rilis</label>
                <input type="date" id="tanggal_rilis" name="tanggal_rilis" class="form-control"
                       value="{{ old('tanggal_rilis', \Carbon\Carbon::parse($publikasi->tanggal_rilis)->format('Y-m-d')) }}"
                       required>
            </div>

            <div class="mb-3">
                <label for="sampul" class="form-label">Sampul</label>

                @if ($publikasi->sampul)
                    <div class="mb-2">
                        <img src="/images/{{ $publikasi->sampul }}" alt="{{ $publikasi->judul }}"
                             width="100" class="img-thumbnail">
                    </div>
                @endif

                <input type="file" id="sampul" name="sampul" class="form-control" accept="image/*">
                <div class="form-text">Kosongkan jika tidak ingin mengganti sampul.</div>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="/publikasi" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection