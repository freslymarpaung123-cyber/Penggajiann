@extends('layouts.adminlte')

@section('title', 'Tambah Pegawai')

@section('page_title', 'Tambah Pegawai')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-8">

        <div class="card card-primary card-outline shadow">

            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-user-plus mr-2"></i>
                    Form Tambah Pegawai
                </h3>
            </div>

            <form action="{{ route('pegawais.store') }}" method="POST">

                @csrf

                <div class="card-body">

                    <div class="form-group">
                        <label for="nip">NIP</label>

                        <input
                            type="text"
                            id="nip"
                            name="nip"
                            class="form-control @error('nip') is-invalid @enderror"
                            value="{{ old('nip') }}"
                            placeholder="Masukkan NIP"
                            required>

                        @error('nip')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Pegawai</label>

                        <input
                            type="text"
                            id="nama"
                            name="nama"
                            class="form-control @error('nama') is-invalid @enderror"
                            value="{{ old('nama') }}"
                            placeholder="Masukkan nama pegawai"
                            required>

                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>

                        <select
                            id="jenis_kelamin"
                            name="jenis_kelamin"
                            class="form-control @error('jenis_kelamin') is-invalid @enderror">

                            <option value="">-- Pilih Jenis Kelamin --</option>

                            <option value="Laki-laki"
                                {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                                Laki-laki
                            </option>

                            <option value="Perempuan"
                                {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan
                            </option>

                        </select>

                        @error('jenis_kelamin')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>

                        <textarea
                            id="alamat"
                            name="alamat"
                            rows="3"
                            class="form-control @error('alamat') is-invalid @enderror"
                            placeholder="Masukkan alamat">{{ old('alamat') }}</textarea>

                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="no_hp">No. HP</label>

                        <input
                            type="text"
                            id="no_hp"
                            name="no_hp"
                            class="form-control @error('no_hp') is-invalid @enderror"
                            value="{{ old('no_hp') }}"
                            placeholder="Masukkan nomor HP">

                        @error('no_hp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jabatan_id">Jabatan</label>

                        <select
                            id="jabatan_id"
                            name="jabatan_id"
                            class="form-control @error('jabatan_id') is-invalid @enderror"
                            required>

                            <option value="">-- Pilih Jabatan --</option>

                            @foreach($jabatans as $jabatan)
                                <option value="{{ $jabatan->id }}"
                                    {{ old('jabatan_id') == $jabatan->id ? 'selected' : '' }}>
                                    {{ $jabatan->nama_jabatan }}
                                </option>
                            @endforeach

                        </select>

                        @error('jabatan_id')
                            <div class="invalid-feedback">
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

                    <a href="{{ route('pegawais.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left mr-1"></i>
                        Kembali
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection