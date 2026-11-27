<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Penggajian;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{

    public function absensi(Request $request)
    {
        $absensis = Absensi::with('karyawan')
            ->when($request->tanggal_awal, function ($query) use ($request) {
                $query->whereDate('tanggal', '>=', $request->tanggal_awal);
            })
            ->when($request->tanggal_akhir, function ($query) use ($request) {
                $query->whereDate('tanggal', '<=', $request->tanggal_akhir);
            })
            ->latest('tanggal')
            ->get();

        return view('laporan.absensi', compact('absensis'));
    }


    public function penggajian(Request $request)
    {
        $penggajians = Penggajian::with('karyawan.jabatan')
            ->when($request->bulan, function ($query) use ($request) {
                $query->whereMonth('tanggal_gaji', $request->bulan);
            })
            ->latest('tanggal_gaji')
            ->get();

        return view('laporan.penggajian', compact('penggajians'));
    }

    public function absensiPdf(Request $request)
    {
        $absensis = Absensi::with('karyawan')
            ->when($request->tanggal_awal, function ($query) use ($request) {
                $query->whereDate('tanggal', '>=', $request->tanggal_awal);
            })
            ->when($request->tanggal_akhir, function ($query) use ($request) {
                $query->whereDate('tanggal', '<=', $request->tanggal_akhir);
            })
            ->latest('tanggal')
            ->get();

        $pdf = Pdf::loadView('laporan.absensi-pdf', compact('absensis'));
        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream('laporan-absensi.pdf');
    }

    public function penggajianPdf(Request $request)
    {
        $penggajians = Penggajian::with('karyawan.jabatan')
            ->when($request->bulan, function ($query) use ($request) {
                $query->whereMonth('tanggal_gaji', $request->bulan);
            })
            ->latest('tanggal_gaji')
            ->get();

        $pdf = Pdf::loadView('laporan.penggajian-pdf', compact('penggajians', 'request'));
        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream('laporan-penggajian.pdf');
    }

}