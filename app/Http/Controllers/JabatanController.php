<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Menampilkan semua data jabatan.
     */
    public function index()
    {
        $jabatans = Jabatan::latest()->get();

        return view('jabatans.index', compact('jabatans'));
    }

    /**
     * Menampilkan form tambah jabatan.
     */
    public function create()
    {
        return view('jabatans.create');
    }

    /**
     * Menyimpan data jabatan baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:255|unique:jabatans,nama_jabatan',
            'gaji_pokok'   => 'required|numeric|min:0',
            'tunjangan'    => 'nullable|numeric|min:0',
        ]);

        Jabatan::create([
            'nama_jabatan' => $request->nama_jabatan,
            'gaji_pokok'   => $request->gaji_pokok,
            'tunjangan'    => $request->tunjangan ?? 0,
        ]);

        return redirect()
            ->route('jabatans.index')
            ->with('success', 'Data jabatan berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail jabatan.
     */
    public function show($id)
    {
        $jabatan = Jabatan::findOrFail($id);

        return view('jabatans.show', compact('jabatan'));
    }

    /**
     * Menampilkan form edit jabatan.
     */
    public function edit($id)
    {
        $jabatan = Jabatan::findOrFail($id);

        return view('jabatans.edit', compact('jabatan'));
    }

    /**
     * Memperbarui data jabatan.
     */
    public function update(Request $request, $id)
    {
        $jabatan = Jabatan::findOrFail($id);

        $request->validate([
            'nama_jabatan' => 'required|string|max:255|unique:jabatans,nama_jabatan,' . $jabatan->id,
            'gaji_pokok'   => 'required|numeric|min:0',
            'tunjangan'    => 'nullable|numeric|min:0',
        ]);

        $jabatan->update([
            'nama_jabatan' => $request->nama_jabatan,
            'gaji_pokok'   => $request->gaji_pokok,
            'tunjangan'    => $request->tunjangan ?? 0,
        ]);

        return redirect()
            ->route('jabatans.index')
            ->with('success', 'Data jabatan berhasil diperbarui.');
    }

    /**
     * Menghapus data jabatan.
     */
    public function destroy($id)
    {
        $jabatan = Jabatan::findOrFail($id);

        $jabatan->delete();

        return redirect()
            ->route('jabatans.index')
            ->with('success', 'Data jabatan berhasil dihapus.');
    }
}