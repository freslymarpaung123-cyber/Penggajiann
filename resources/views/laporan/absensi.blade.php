@extends('adminlte::page')

@section('title', 'Laporan Absensi')

@section('content_header')
    <h1>
        <i class="fas fa-calendar-check"></i>
        Laporan Absensi
    </h1>
@stop


@section('content')

<div class="card">

    <div class="card-header">
        <form method="GET" action="{{ route('laporan.absensi') }}" class="row">

            <div class="col-md-4">
                <label>Tanggal Awal</label>
                <input type="date"
                       name="tanggal_awal"
                       class="form-control">
            </div>


            <div class="col-md-4">
                <label>Tanggal Akhir</label>
                <input type="date"
                       name="tanggal_akhir"
                       class="form-control">
            </div>


            <div class="col-md-4 mt-4 d-flex gap-2">
                <button class="btn btn-primary">
                    <i class="fas fa-search"></i>
                    Tampilkan
                </button>

                <a href="{{ route('laporan.absensi.pdf', request()->only(['tanggal_awal', 'tanggal_akhir'])) }}"
                   class="btn btn-danger"
                   target="_blank">
                    <i class="fas fa-file-pdf"></i>
                    Cetak PDF
                </a>
            </div>

        </form>
    </div>



    <div class="card-body">

        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Karyawan</th>
                    <th>Tanggal</th>
                    <th>Jam Masuk</th>
                    <th>Jam Keluar</th>
                    <th>Status</th>
                </tr>
            </thead>


            <tbody>

            @forelse($absensis as $absensi)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>
                        {{ $absensi->karyawan->nama_karyawan ?? '-' }}
                    </td>

                    <td>
                        {{ $absensi->tanggal }}
                    </td>

                    <td>
                        {{ $absensi->jam_masuk ?? '-' }}
                    </td>

                    <td>
                        {{ $absensi->jam_keluar ?? '-' }}
                    </td>

                    <td>

                        @if($absensi->status == 'Hadir')

                            <span class="badge badge-success">
                                Hadir
                            </span>

                        @elseif($absensi->status == 'Izin')

                            <span class="badge badge-warning">
                                Izin
                            </span>

                        @elseif($absensi->status == 'Sakit')

                            <span class="badge badge-info">
                                Sakit
                            </span>

                        @else

                            <span class="badge badge-danger">
                                Alpha
                            </span>

                        @endif

                    </td>

                </tr>


            @empty

                <tr>
                    <td colspan="6" class="text-center">
                        Belum ada data absensi
                    </td>
                </tr>

            @endforelse


            </tbody>

        </table>

    </div>

</div>

@stop