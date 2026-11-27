@extends('adminlte::page')

@section('title', 'Data Absensi')

@section('content_header')
    <h1>Data Absensi</h1>
@stop

@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card">

    <div class="card-header">

        <a href="{{ route('absensis.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Tambah Absensi
        </a>

        <a href="{{ route('absensis.cetak') }}"
           target="_blank"
           class="btn btn-success">
            <i class="fas fa-print"></i>
            Cetak Absensi
        </a>

    </div>

    <div class="card-body">

        <table class="table table-bordered table-striped">

            <thead class="thead-dark">
                <tr>
                    <th width="50">No</th>
                    <th>Pegawai</th>
                    <th>Tanggal</th>
                    <th>Jam Masuk</th>
                    <th>Jam Keluar</th>
                    <th>Status</th>
                    <th width="250">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($absensis as $key => $absensi)

                <tr>

                    <td>{{ $key + 1 }}</td>

                    <td>
                        {{ $absensi->pegawai?->nama_karyawan ?? '-' }}
                    </td>

                    <td>{{ $absensi->tanggal }}</td>

                    <td>{{ $absensi->jam_masuk ?? '-' }}</td>

                    <td>{{ $absensi->jam_keluar ?? '-' }}</td>

                    <td>
                        @if($absensi->status == 'Hadir')
                            <span class="badge badge-success">Hadir</span>
                        @elseif($absensi->status == 'Izin')
                            <span class="badge badge-warning">Izin</span>
                        @elseif($absensi->status == 'Sakit')
                            <span class="badge badge-danger">Sakit</span>
                        @else
                            <span class="badge badge-secondary">
                                {{ $absensi->status }}
                            </span>
                        @endif
                    </td>

                    <td>

                        <a href="{{ route('absensis.show', $absensi->id) }}"
                           class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i>
                            Detail
                        </a>

                        <a href="{{ route('absensis.edit', $absensi->id) }}"
                           class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                            Edit
                        </a>

                        <form action="{{ route('absensis.destroy', $absensi->id) }}"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus data absensi?')">

                                <i class="fas fa-trash"></i>
                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="7" class="text-center">
                        Belum ada data absensi.
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@stop