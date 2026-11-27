<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Penggajian;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Data penggajian terbaru
        $penggajianTerbaru = Penggajian::with('pegawai')
            ->latest('tanggal_gaji')
            ->take(5)
            ->get();

        // Data grafik penggajian per bulan
        $grafikGaji = Penggajian::selectRaw("
                MONTH(tanggal_gaji) as bulan,
                SUM(total_gaji) as total
            ")
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        $bulan = [];
        $total = [];

        foreach ($grafikGaji as $data) {

            $bulan[] = Carbon::create()
                ->month($data->bulan)
                ->locale('id')
                ->translatedFormat('F');

            $total[] = (float) $data->total;
        }

        // Total nominal seluruh gaji
        $totalNominalGaji = Penggajian::sum('total_gaji');

        return view('dashboard', [

            // Statistik
            'totalJabatan'      => Jabatan::count(),
            'totalPegawai'      => Pegawai::count(),
            'totalPenggajian'   => Penggajian::count(),
            'totalUser'         => User::count(),
            'totalNominalGaji'  => $totalNominalGaji,

            // Grafik
            'bulan'             => $bulan,
            'total'             => $total,

            // Tabel
            'penggajianTerbaru' => $penggajianTerbaru,

        ]);
    }
}