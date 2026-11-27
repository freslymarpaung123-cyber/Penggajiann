<?php

namespace App\Http\Controllers;

use App\Models\Penggajian;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PenggajianController extends Controller
{
    public function index()
    {
        $penggajians = Penggajian::with('pegawai.jabatan')
            ->latest('tanggal_gaji')
            ->get();

        return view('penggajians.index', compact('penggajians'));
    }

    public function create()
    {
        $karyawans = Karyawan::with('jabatan')->get();

        return view('penggajians.create', compact('karyawans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:karyawans,id',
            'tanggal_gaji' => 'required|date',
            'potongan' => 'nullable|numeric|min:0',
        ]);

        $karyawan = Karyawan::with('jabatan')
            ->findOrFail($request->pegawai_id);

        $gaji_pokok = $karyawan->jabatan->gaji_pokok;
        $tunjangan = $karyawan->jabatan->tunjangan;
        $potongan = $request->potongan ?? 0;

        $total_gaji = $gaji_pokok + $tunjangan - $potongan;

        Penggajian::create([
            'pegawai_id'   => $karyawan->id,
            'tanggal_gaji' => $request->tanggal_gaji,
            'gaji_pokok'   => $gaji_pokok,
            'tunjangan'    => $tunjangan,
            'potongan'     => $potongan,
            'total_gaji'   => $total_gaji,
        ]);

        return redirect()
            ->route('penggajians.index')
            ->with('success', 'Data penggajian berhasil ditambahkan.');
    }

    public function show(Penggajian $penggajian)
    {
        $penggajian->load('pegawai.jabatan');

        return view('penggajians.show', compact('penggajian'));
    }

    public function edit(Penggajian $penggajian)
    {
        $karyawans = Karyawan::with('jabatan')->get();

        return view('penggajians.edit', compact(
            'penggajian',
            'karyawans'
        ));
    }

    public function update(Request $request, Penggajian $penggajian)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:karyawans,id',
            'tanggal_gaji' => 'required|date',
            'potongan' => 'nullable|numeric|min:0',
        ]);

        $karyawan = Karyawan::with('jabatan')
            ->findOrFail($request->pegawai_id);

        $gaji_pokok = $karyawan->jabatan->gaji_pokok;
        $tunjangan = $karyawan->jabatan->tunjangan;
        $potongan = $request->potongan ?? 0;

        $total_gaji = $gaji_pokok + $tunjangan - $potongan;

        $penggajian->update([
            'pegawai_id'   => $karyawan->id,
            'tanggal_gaji' => $request->tanggal_gaji,
            'gaji_pokok'   => $gaji_pokok,
            'tunjangan'    => $tunjangan,
            'potongan'     => $potongan,
            'total_gaji'   => $total_gaji,
        ]);

        return redirect()
            ->route('penggajians.index')
            ->with('success', 'Data penggajian berhasil diperbarui.');
    }

    public function slip(Penggajian $penggajian)
    {
        $penggajian->load('pegawai.jabatan');

        return view('penggajians.slip', compact('penggajian'));
    }

    public function pdf(Penggajian $penggajian)
    {
        $penggajian->load('pegawai.jabatan');

        $pdf = Pdf::loadView('penggajians.pdf', [
            'penggajian' => $penggajian
        ]);

        $pdf->setPaper('A4', 'portrait');

        return $pdf->stream(
            'Slip-Gaji-' .
            str_replace(' ', '-', $penggajian->pegawai->nama_karyawan)
            . '.pdf'
        );
    }

    public function destroy(Penggajian $penggajian)
    {
        $penggajian->delete();

        return redirect()
            ->route('penggajians.index')
            ->with('success', 'Data penggajian berhasil dihapus.');
    }
}