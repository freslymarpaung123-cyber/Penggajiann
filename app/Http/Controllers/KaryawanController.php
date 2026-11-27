<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Menampilkan semua data karyawan.
     */
    public function index()
    {
        $karyawans = Karyawan::with('jabatan')
            ->latest()
            ->get();

        return view('karyawans.index', compact('karyawans'));
    }


    /**
     * Menampilkan form tambah karyawan.
     */
    public function create()
    {
        $jabatans = Jabatan::all();

        return view('karyawans.create', compact('jabatans'));
    }


    /**
     * Menyimpan data karyawan baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|string|max:50|unique:karyawans,nip',
            'nama_karyawan' => 'required|string|max:255',
            'jabatan_id' => 'required',
            'tanggal_masuk' => 'required|date',
        ]);


        Karyawan::create([
            'nip' => $request->nip,
            'nama_karyawan' => $request->nama_karyawan,
            'jabatan_id' => $request->jabatan_id,
            'tanggal_masuk' => $request->tanggal_masuk,
        ]);


        return redirect()
            ->route('karyawans.index')
            ->with('success', 'Data karyawan berhasil ditambahkan.');
    }


    /**
     * Menampilkan detail karyawan.
     */
    public function show($id)
    {
        $karyawan = Karyawan::with('jabatan')
            ->findOrFail($id);

        return view('karyawans.show', compact('karyawan'));
    }


    /**
     * Menampilkan form edit karyawan.
     */
    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);

        $jabatans = Jabatan::all();

        return view('karyawans.edit', compact('karyawan', 'jabatans'));
    }


    /**
     * Memperbarui data karyawan.
     */
    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::findOrFail($id);


        $request->validate([
            'nip' => 'required|string|max:50|unique:karyawans,nip,' . $karyawan->id,
            'nama_karyawan' => 'required|string|max:255',
            'jabatan_id' => 'required',
            'tanggal_masuk' => 'required|date',
        ]);


        $karyawan->update([
            'nip' => $request->nip,
            'nama_karyawan' => $request->nama_karyawan,
            'jabatan_id' => $request->jabatan_id,
            'tanggal_masuk' => $request->tanggal_masuk,
        ]);


        return redirect()
            ->route('karyawans.index')
            ->with('success', 'Data karyawan berhasil diperbarui.');
    }


    /**
     * Menghapus data karyawan.
     */
    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);

        $karyawan->delete();


        return redirect()
            ->route('karyawans.index')
            ->with('success', 'Data karyawan berhasil dihapus.');
    }
}