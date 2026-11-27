@extends('layouts.adminlte')

@section('title', 'Tambah Jabatan')

@section('page_title', 'Tambah Jabatan')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-8">

        <div class="card card-primary card-outline shadow">

            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-briefcase mr-2"></i>
                    Form Tambah Jabatan
                </h3>
            </div>

            <form action="{{ route('jabatans.store') }}" method="POST">

                @csrf

                <div class="card-body">

                    <div class="form-group">
                        <label for="nama_jabatan">
                            Nama Jabatan
                        </label>

                        <input
                            type="text"
                            id="nama_jabatan"
                            name="nama_jabatan"
                            class="form-control @error('nama_jabatan') is-invalid @enderror"
                            placeholder="Masukkan nama jabatan"
                            value="{{ old('nama_jabatan') }}"
                            required>

                        @error('nama_jabatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="gaji_pokok">
                            Gaji Pokok
                        </label>

                        <input
                            type="number"
                            id="gaji_pokok"
                            name="gaji_pokok"
                            class="form-control @error('gaji_pokok') is-invalid @enderror"
                            placeholder="Masukkan gaji pokok"
                            value="{{ old('gaji_pokok') }}"
                            required>

                        @error('gaji_pokok')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tunjangan">
                            Tunjangan
                        </label>

                        <input
                            type="number"
                            id="tunjangan"
                            name="tunjangan"
                            class="form-control @error('tunjangan') is-invalid @enderror"
                            placeholder="Masukkan tunjangan"
                            value="{{ old('tunjangan', 0) }}"
                            required>

                        @error('tunjangan')
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

                    <a href="{{ route('jabatans.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left mr-1"></i>
                        Kembali
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection