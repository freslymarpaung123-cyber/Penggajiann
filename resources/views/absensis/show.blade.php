@extends('adminlte::page')

@section('title', 'Detail Absensi')

@section('content_header')
<h1>Detail Data Absensi</h1>
@stop

@section('content')

<div class="card">

    <div class="card-header bg-primary text-white">
        Detail Absensi
    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>
                <th width="250">Nama Karyawan</th>
                <td>
                    {{ $absensi->karyawan->nama_karyawan ?? '-' }}
                </td>
            </tr>

            <tr>
                <th>Tanggal</th>
                <td>{{ $absensi->tanggal }}</td>
            </tr>

            <tr>
                <th>Jam Masuk</th>
                <td>{{ $absensi->jam_masuk }}</td>
            </tr>

            <tr>
                <th>Jam Keluar</th>
                <td>{{ $absensi->jam_keluar }}</td>
            </tr>

            <tr>
                <th>Status</th>
                <td>{{ $absensi->status }}</td>
            </tr>

        </table>

        <br>

        <a href="{{ route('absensis.index') }}"
           class="btn btn-secondary">

            Kembali

        </a>

    </div>

</div>

@stop