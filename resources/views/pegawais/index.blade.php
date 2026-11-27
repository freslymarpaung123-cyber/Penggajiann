@extends('layouts.adminlte')

@section('title', 'Data Pegawai')

@section('page_title', 'Data Pegawai')

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
            <i class="fas fa-users mr-2"></i>
            Daftar Pegawai
        </h3>

        <div class="card-tools">

            <a href="{{ route('pegawais.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i>
                Tambah Pegawai
            </a>

        </div>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-hover">

                <thead class="thead-light">

                    <tr>

                        <th width="60">No</th>
                        <th>Nama Pegawai</th>
                        <th>Jabatan</th>
                        <th>No. HP</th>
                        <th>Alamat</th>
                        <th width="180">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($pegawais as $pegawai)

                    <tr>

                        <td class="text-center">
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            <strong>{{ $pegawai->nama }}</strong>
                        </td>

                        <td>
                            <span class="badge badge-info">
                                {{ $pegawai->jabatan->nama_jabatan }}
                            </span>
                        </td>

                        <td>{{ $pegawai->no_hp }}</td>

                        <td>{{ $pegawai->alamat }}</td>

                        <td>

                            <a href="{{ route('pegawais.edit', $pegawai->id) }}"
                               class="btn btn-warning btn-sm"
                               title="Edit">

                                <i class="fas fa-edit"></i>

                            </a>

                            <form action="{{ route('pegawais.destroy', $pegawai->id) }}"
                                  method="POST"
                                  style="display:inline-block">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')"
                                        title="Hapus">

                                    <i class="fas fa-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="text-center text-muted">

                            <i class="fas fa-info-circle"></i>
                            Belum ada data pegawai.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection