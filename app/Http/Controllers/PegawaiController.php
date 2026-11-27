<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::with('jabatan')->get();

        return view('pegawais.index', compact('pegawais'));
    }

    public function create()
    {
        $jabatans = Jabatan::all();

        return view('pegawais.create', compact('jabatans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:pegawais,nip',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'jabatan_id' => 'required',
        ]);

        Pegawai::create($request->all());

        return redirect()->route('pegawais.index')
            ->with('success', 'Data pegawai berhasil ditambahkan.');
    }

    public function show(Pegawai $pegawai)
    {
        return view('pegawais.show', compact('pegawai'));
    }

    public function edit(Pegawai $pegawai)
    {
        $jabatans = Jabatan::all();

        return view('pegawais.edit', compact('pegawai', 'jabatans'));
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'nip' => 'required|unique:pegawais,nip,' . $pegawai->id,
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'jabatan_id' => 'required',
        ]);

        $pegawai->update($request->all());

        return redirect()->route('pegawais.index')
            ->with('success', 'Data pegawai berhasil diperbarui.');
    }

    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();

        return redirect()->route('pegawais.index')
            ->with('success', 'Data pegawai berhasil dihapus.');
    }
}