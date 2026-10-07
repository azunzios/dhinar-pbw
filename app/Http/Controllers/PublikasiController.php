<?php

namespace App\Http\Controllers;

use App\Models\Publikasi;
use Illuminate\Http\Request;

class PublikasiController extends Controller
{
    public function index()
    {
        $publikasi = Publikasi::all();
        return view('publikasi.index', compact('publikasi'));
    }

    public function create()
    {
        return view('publikasi.FormPublikasi');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'         => 'required|string|max:255',
            'tanggal_rilis' => 'required|date',
            'sampul'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $namaFile = null;

        if ($request->hasFile('sampul')) {
            $file = $request->file('sampul');
            $namaFile = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $namaFile);
        }

        Publikasi::create([
            'judul'         => $request->judul,
            'tanggal_rilis' => $request->tanggal_rilis,
            'sampul'        => $namaFile,
        ]);

        return redirect('/publikasi')->with('success', 'Publikasi berhasil ditambahkan.');
    }

    public function edit(Publikasi $publikasi)
    {
        return view('publikasi.EditPublikasi', compact('publikasi'));
    }

    public function update(Request $request, Publikasi $publikasi)
    {
        $request->validate([
            'judul'         => 'required|string|max:255',
            'tanggal_rilis' => 'required|date',
            'sampul'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $namaFile = $publikasi->sampul;

        if ($request->hasFile('sampul')) {
            // hapus sampul lama kalau ada
            if ($publikasi->sampul && file_exists(public_path('images/' . $publikasi->sampul))) {
                unlink(public_path('images/' . $publikasi->sampul));
            }

            $file = $request->file('sampul');
            $namaFile = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $namaFile);
        }

        $publikasi->update([
            'judul'         => $request->judul,
            'tanggal_rilis' => $request->tanggal_rilis,
            'sampul'        => $namaFile,
        ]);

        return redirect('/publikasi')->with('success', 'Publikasi berhasil diperbarui.');
    }

    public function destroy(Publikasi $publikasi)
    {
        if ($publikasi->sampul && file_exists(public_path('images/' . $publikasi->sampul))) {
            unlink(public_path('images/' . $publikasi->sampul));
        }

        $publikasi->delete();

        return redirect('/publikasi')->with('success', 'Publikasi berhasil dihapus.');
    }
}