@extends('layouts.adminlte')

@section('title', 'Tambah Penggajian')

@section('page_title', 'Tambah Penggajian')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-8">

        <div class="card card-primary card-outline shadow">

            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-money-check-alt mr-2"></i>
                    Form Tambah Penggajian
                </h3>
            </div>

            <form action="{{ route('penggajians.store') }}" method="POST">

                @csrf

                <div class="card-body">

                    <div class="form-group">

                        <label for="pegawai_id">Pegawai</label>

                        <select
                            id="pegawai_id"
                            name="pegawai_id"
                            class="form-control @error('pegawai_id') is-invalid @enderror"
                            required>

                            <option value="">-- Pilih Pegawai --</option>

                            @foreach($karyawans as $karyawan)

                                <option value="{{ $karyawan->id }}"
                                    {{ old('pegawai_id') == $karyawan->id ? 'selected' : '' }}>

                                    {{ $karyawan->nama_karyawan }}
                                    - {{ $karyawan->jabatan->nama_jabatan }}

                                </option>

                            @endforeach

                        </select>

                        @error('pegawai_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="form-group">

                        <label for="tanggal_gaji">Tanggal Gaji</label>

                        <input
                            type="date"
                            id="tanggal_gaji"
                            name="tanggal_gaji"
                            class="form-control @error('tanggal_gaji') is-invalid @enderror"
                            value="{{ old('tanggal_gaji', date('Y-m-d')) }}"
                            required>

                        @error('tanggal_gaji')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="form-group">

                        <label for="potongan">Potongan</label>

                        <div class="input-group">

                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>

                            <input
                                type="number"
                                id="potongan"
                                name="potongan"
                                class="form-control @error('potongan') is-invalid @enderror"
                                value="{{ old('potongan', 0) }}"
                                placeholder="Masukkan potongan">

                        </div>

                        @error('potongan')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>

                <div class="card-footer">

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-1"></i>
                        Simpan
                    </button>

                    <a href="{{ route('penggajians.index') }}"
                           class="btn btn-secondary">
                        <i class="fas fa-arrow-left mr-1"></i>
                        Kembali
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection