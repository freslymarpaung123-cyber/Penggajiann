<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{

    public function index()
    {
        $absensis = Absensi::with('pegawai')
            ->latest()
            ->get();

        return view('absensis.index', compact('absensis'));
    }


    public function create()
    {
        $pegawais = Karyawan::all();

        return view('absensis.create', compact('pegawais'));
    }


    public function store(Request $request)
    {
        $request->validate([

            'pegawai_id' => 'required',
            'tanggal' => 'required|date',
            'jam_masuk' => 'nullable',
            'jam_keluar' => 'nullable',
            'status' => 'required',

        ]);


        Absensi::create($request->all());


        return redirect()
            ->route('absensis.index')
            ->with('success','Data absensi berhasil ditambahkan.');
    }


    public function show(Absensi $absensi)
    {
        $absensi->load('pegawai');

        return view('absensis.show', compact('absensi'));
    }


    public function edit(Absensi $absensi)
    {
        $pegawais = Karyawan::all();


        return view(
            'absensis.edit',
            compact('absensi','pegawais')
        );
    }


    public function update(Request $request, Absensi $absensi)
    {
        $request->validate([

            'pegawai_id' => 'required',
            'tanggal' => 'required|date',
            'jam_masuk' => 'nullable',
            'jam_keluar' => 'nullable',
            'status' => 'required',

        ]);


        $absensi->update($request->all());


        return redirect()
            ->route('absensis.index')
            ->with('success','Data absensi berhasil diperbarui.');
    }


    public function destroy(Absensi $absensi)
    {
        $absensi->delete();


        return redirect()
            ->route('absensis.index')
            ->with('success','Data absensi berhasil dihapus.');
    }


    public function cetak()
    {
        $absensis = Absensi::with('pegawai')
            ->latest()
            ->get();


        return view(
            'absensis.cetak',
            compact('absensis')
        );
    }

}