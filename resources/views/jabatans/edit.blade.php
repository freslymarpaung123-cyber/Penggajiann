@extends('layouts.adminlte')

@section('title', 'Edit Jabatan')

@section('page_title', 'Edit Jabatan')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-8">

        <div class="card card-warning card-outline shadow">

            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-edit mr-2"></i>
                    Form Edit Jabatan
                </h3>
            </div>

            <form action="{{ route('jabatans.update', $jabatan->id) }}" method="POST">

                @csrf
                @method('PUT')

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
                            value="{{ old('nama_jabatan', $jabatan->nama_jabatan) }}"
                            placeholder="Masukkan nama jabatan"
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
                            value="{{ old('gaji_pokok', $jabatan->gaji_pokok) }}"
                            placeholder="Masukkan gaji pokok"
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
                            value="{{ old('tunjangan', $jabatan->tunjangan) }}"
                            placeholder="Masukkan tunjangan"
                            required>

                        @error('tunjangan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>

                <div class="card-footer">

                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save mr-1"></i>
                        Update
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