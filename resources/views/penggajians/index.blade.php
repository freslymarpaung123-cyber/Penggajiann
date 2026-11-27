@extends('layouts.adminlte')

@section('title', 'Data Penggajian')

@section('page_title', 'Data Penggajian')

@section('content')

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <i class="fas fa-check-circle mr-1"></i>
    {{ session('success') }}
</div>
@endif

<div class="card card-primary card-outline shadow">

    <div class="card-header">

        <h3 class="card-title">
            <i class="fas fa-money-check-alt mr-2"></i>
            Daftar Penggajian Pegawai
        </h3>

        <div class="card-tools">

            <a href="{{ route('penggajians.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i>
                Tambah Penggajian
            </a>

        </div>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-hover">

                <thead>

                    <tr>
                        <th width="60">No</th>
                        <th>Pegawai</th>
                        <th>Jabatan</th>
                        <th>Tanggal</th>
                        <th>Total Gaji</th>
                        <th>Status</th>
                        <th width="280">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                @forelse($penggajians as $index => $penggajian)

                    <tr>

                        <td class="text-center">
                            {{ $index + 1 }}
                        </td>

                        <td>

                            <strong>
                                {{ $penggajian->pegawai?->nama_karyawan ?? '-' }}
                            </strong>

                            <br>

                            <small class="text-muted">
                                NIP : {{ $penggajian->pegawai?->nip ?? '-' }}
                            </small>

                        </td>

                        <td>

                            <span class="badge badge-info">

                                {{ $penggajian->pegawai?->jabatan?->nama_jabatan ?? '-' }}

                            </span>

                        </td>

                        <td>

                            {{ \Carbon\Carbon::parse($penggajian->tanggal_gaji)->format('d-m-Y') }}

                        </td>

                        <td>

                            <strong class="text-success">

                                Rp {{ number_format($penggajian->total_gaji,0,',','.') }}

                            </strong>

                        </td>

                        <td>

                            <span class="badge badge-success">

                                <i class="fas fa-check-circle"></i>

                                Dibayar

                            </span>

                        </td>

                        <td>

                            <a href="{{ route('penggajians.slip',$penggajian->id) }}"
                               class="btn btn-info btn-sm">

                                <i class="fas fa-file-invoice"></i>

                            </a>

                            <a href="{{ route('penggajians.pdf',$penggajian->id) }}"
                               class="btn btn-danger btn-sm">

                                <i class="fas fa-file-pdf"></i>

                            </a>

                            <a href="{{ route('penggajians.edit',$penggajian->id) }}"
                               class="btn btn-warning btn-sm">

                                <i class="fas fa-edit"></i>

                            </a>

                            <form action="{{ route('penggajians.destroy',$penggajian->id) }}"
                                  method="POST"
                                  style="display:inline-block">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')">

                                    <i class="fas fa-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="text-center text-muted">

                            <i class="fas fa-info-circle"></i>

                            Belum ada data penggajian.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection