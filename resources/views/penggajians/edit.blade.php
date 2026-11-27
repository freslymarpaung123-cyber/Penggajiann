@extends('layouts.adminlte')

@section('title', 'Edit Penggajian')

@section('page_title', 'Edit Penggajian')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-8">

        <div class="card card-warning card-outline shadow">

            <div class="card-header">

                <h3 class="card-title">
                    <i class="fas fa-edit mr-2"></i>
                    Form Edit Penggajian
                </h3>

            </div>

            <form action="{{ route('penggajians.update', $penggajian->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="card-body">

                    @if ($errors->any())

                        <div class="alert alert-danger">

                            <h5>
                                <i class="fas fa-exclamation-triangle mr-1"></i>
                                Terjadi Kesalahan
                            </h5>

                            <ul class="mb-0">

                                @foreach ($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif

                    <div class="form-group">

                        <label for="pegawai_id">
                            Pegawai
                        </label>

                        <select
                            id="pegawai_id"
                            name="pegawai_id"
                            class="form-control @error('pegawai_id') is-invalid @enderror"
                            required>

                            <option value="">-- Pilih Pegawai --</option>

                            @foreach($pegawais as $pegawai)

                                <option
                                    value="{{ $pegawai->id }}"
                                    {{ old('pegawai_id', $penggajian->pegawai_id) == $pegawai->id ? 'selected' : '' }}>

                                    {{ $pegawai->nama }}
                                    - {{ $pegawai->jabatan->nama_jabatan }}

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

                        <label for="tanggal_gaji">
                            Tanggal Gaji
                        </label>

                        <input
                            type="date"
                            id="tanggal_gaji"
                            name="tanggal_gaji"
                            class="form-control @error('tanggal_gaji') is-invalid @enderror"
                            value="{{ old('tanggal_gaji', $penggajian->tanggal_gaji) }}"
                            required>

                        @error('tanggal_gaji')

                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>

                    <div class="form-group">

                        <label for="potongan">
                            Potongan
                        </label>

                        <div class="input-group">

                            <div class="input-group-prepend">

                                <span class="input-group-text">

                                    Rp

                                </span>

                            </div>

                            <input
                                type="number"
                                id="potongan"
                                name="potongan"
                                class="form-control @error('potongan') is-invalid @enderror"
                                value="{{ old('potongan', $penggajian->potongan) }}"
                                placeholder="Masukkan Potongan">

                        </div>

                        @error('potongan')

                            <div class="invalid-feedback d-block">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>

                </div>

                <div class="card-footer">

                    <button
                        type="submit"
                        class="btn btn-warning">

                        <i class="fas fa-save mr-1"></i>

                        Update

                    </button>

                    <a
                        href="{{ route('penggajians.index') }}"
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