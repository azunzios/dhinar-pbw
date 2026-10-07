@extends('layouts.app')

@section('title', 'Daftar Publikasi BPS Provinsi Bengkulu')

@section('content')
    <div class="mx-auto" style="max-width: 1000px;">

        @if (session('success'))
            <div id="alert-sukses" class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
            </div>
        @endif

        <table class="table table-bordered table-bps text-center mb-0">
            <thead>
                <tr>
                    <th style="width:60px">No</th>
                    <th>Judul</th>
                    <th style="width:140px">Tanggal Rilis</th>
                    <th style="width:110px">Sampul</th>
                    <th style="width:160px">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($publikasi as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->tanggal_rilis }}</td>
                        <td>
                            @if ($item->sampul)
                                <img src="/images/{{ $item->sampul }}" alt="{{ $item->judul }}"
                                     width="80" class="img-thumbnail">
                            @endif
                        </td>
                        <td>
                            <a href="/publikasi/{{ $item->id }}/edit"
                               class="btn btn-warning btn-sm">Edit</a>

                            <form action="/publikasi/{{ $item->id }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus publikasi ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Belum ada data publikasi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script>
        // Pesan sukses hilang otomatis setelah 3 detik
        const alertSukses = document.getElementById('alert-sukses');
        if (alertSukses) {
            setTimeout(function () {
                alertSukses.remove();
            }, 3000);
        }
    </script>
@endsection