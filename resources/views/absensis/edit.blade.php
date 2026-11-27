@extends('adminlte::page')

@section('title', 'Edit Absensi')

@section('content_header')
<h1>Edit Data Absensi</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('absensis.update', $absensi->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Pegawai</label>

                <select name="pegawai_id" class="form-control" required>

                    @foreach($pegawais as $pegawai)

                    <option value="{{ $pegawai->id }}"
                        {{ $pegawai->id == $absensi->pegawai_id ? 'selected' : '' }}>

                        {{ $pegawai->nama }}

                    </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">
                <label>Tanggal</label>

                <input
                    type="date"
                    name="tanggal"
                    class="form-control"
                    value="{{ $absensi->tanggal }}"
                    required>

            </div>

            <div class="mb-3">
                <label>Jam Masuk</label>

                <input
                    type="time"
                    name="jam_masuk"
                    class="form-control"
                    value="{{ $absensi->jam_masuk }}"
                    required>

            </div>

            <div class="mb-3">
                <label>Jam Keluar</label>

                <input
                    type="time"
                    name="jam_keluar"
                    class="form-control"
                    value="{{ $absensi->jam_keluar }}">

            </div>

            <div class="mb-3">
                <label>Status</label>

                <select name="status" class="form-control">

                    <option value="Hadir" {{ $absensi->status == 'Hadir' ? 'selected' : '' }}>Hadir</option>

                    <option value="Izin" {{ $absensi->status == 'Izin' ? 'selected' : '' }}>Izin</option>

                    <option value="Sakit" {{ $absensi->status == 'Sakit' ? 'selected' : '' }}>Sakit</option>

                    <option value="Alpha" {{ $absensi->status == 'Alpha' ? 'selected' : '' }}>Alpha</option>

                </select>

            </div>

            <button class="btn btn-warning">
                Update
            </button>

            <a href="{{ route('absensis.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>
</div>

@stop