@extends('adminlte::page')

@section('title', 'Data Karyawan')


@section('content_header')
    <h1>
        <i class="fas fa-users"></i>
        Data Karyawan
    </h1>
@stop


@section('content')

@if(session('success'))
<div class="alert alert-success">
    <i class="fas fa-check-circle"></i>
    {{ session('success') }}
</div>
@endif


<div class="card">

    <div class="card-header">
        <a href="{{ route('karyawans.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Tambah Karyawan
        </a>
    </div>


    <div class="card-body">

        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama Karyawan</th>
                    <th>Jabatan</th>
                    <th>Tanggal Masuk</th>
                    <th width="200px">Aksi</th>
                </tr>
            </thead>


            <tbody>

            @forelse($karyawans as $karyawan)

                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>
                        {{ $karyawan->nip }}
                    </td>

                    <td>
                        {{ $karyawan->nama_karyawan }}
                    </td>

                    <td>
                        {{ $karyawan->jabatan->nama_jabatan ?? '-' }}
                    </td>

                    <td>
                        {{ $karyawan->tanggal_masuk }}
                    </td>

                    <td>

                        <a href="{{ route('karyawans.edit',$karyawan->id) }}"
                           class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>


                        <form action="{{ route('karyawans.destroy',$karyawan->id) }}"
                              method="POST"
                              style="display:inline">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus data ini?')">

                                <i class="fas fa-trash"></i>

                            </button>

                        </form>

                    </td>

                </tr>


            @empty

                <tr>
                    <td colspan="6" class="text-center">
                        Belum ada data karyawan
                    </td>
                </tr>

            @endforelse


            </tbody>

        </table>

    </div>

</div>


@stop