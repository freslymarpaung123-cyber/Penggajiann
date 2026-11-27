@extends('layouts.adminlte')

@section('title', 'Data Jabatan')

@section('page_title', 'Data Jabatan')

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
            <i class="fas fa-briefcase mr-2"></i>
            Daftar Jabatan
        </h3>

        <div class="card-tools">
            <a href="{{ route('jabatans.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i>
                Tambah Jabatan
            </a>
        </div>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-hover">

                <thead class="thead-light">
                    <tr>
                        <th width="60">No</th>
                        <th>Nama Jabatan</th>
                        <th>Gaji Pokok</th>
                        <th>Tunjangan</th>
                        <th width="280">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($jabatans as $index => $jabatan)

                    <tr>

                        <td class="text-center">
                            {{ $index + 1 }}
                        </td>

                        <td>
                            <strong>{{ $jabatan->nama_jabatan }}</strong>
                        </td>

                        <td class="text-success font-weight-bold">
                            Rp {{ number_format($jabatan->gaji_pokok,0,',','.') }}
                        </td>

                        <td class="text-info font-weight-bold">
                            Rp {{ number_format($jabatan->tunjangan,0,',','.') }}
                        </td>

                        <td>

                            <a href="{{ route('jabatans.show',$jabatan->id) }}"
                               class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                                Detail
                            </a>

                            <a href="{{ route('jabatans.edit',$jabatan->id) }}"
                               class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                                Edit
                            </a>

                            <form action="{{ route('jabatans.destroy',$jabatan->id) }}"
                                  method="POST"
                                  style="display:inline-block">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus jabatan ini?')">

                                    <i class="fas fa-trash"></i>
                                    Hapus

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            <i class="fas fa-info-circle"></i>
                            Belum ada data jabatan.
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection