@extends('adminlte::page')

@section('title', 'Tambah Absensi')

@section('content_header')
<h1>Tambah Data Absensi</h1>
@stop

@section('content')

<div class="card">

    <div class="card-body">

        <form action="{{ route('absensis.store') }}" method="POST">

            @csrf


            <div class="mb-3">

                <label>Pegawai</label>

                <select name="pegawai_id" class="form-control" required>

                    <option value="">
                        -- Pilih Pegawai --
                    </option>


                    @foreach($pegawais as $pegawai)

                        <option value="{{ $pegawai->id }}">

                            {{ $pegawai->nama_karyawan }}

                        </option>

                    @endforeach


                </select>

            </div>



            <div class="mb-3">

                <label>Tanggal</label>

                <input type="date"
                       name="tanggal"
                       class="form-control"
                       required>

            </div>



            <div class="mb-3">

                <label>Jam Masuk</label>

                <input type="time"
                       name="jam_masuk"
                       class="form-control"
                       required>

            </div>



            <div class="mb-3">

                <label>Jam Keluar</label>

                <input type="time"
                       name="jam_keluar"
                       class="form-control">

            </div>



            <div class="mb-3">

                <label>Status</label>

                <select name="status"
                        class="form-control"
                        required>

                    <option value="Hadir">Hadir</option>
                    <option value="Izin">Izin</option>
                    <option value="Sakit">Sakit</option>
                    <option value="Alpha">Alpha</option>

                </select>

            </div>



            <button class="btn btn-success">
                Simpan
            </button>


            <a href="{{ route('absensis.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>


        </form>

    </div>

</div>

@stop