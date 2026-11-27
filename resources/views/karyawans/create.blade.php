@extends('adminlte::page')

@section('title', 'Tambah Karyawan')


@section('content_header')
<h1>
    <i class="fas fa-user-plus"></i>
    Tambah Karyawan
</h1>
@stop



@section('content')


<div class="card">

    <div class="card-header">
        Form Tambah Karyawan
    </div>


    <div class="card-body">


        <form action="{{ route('karyawans.store') }}" method="POST">

            @csrf


            <div class="form-group">
                <label>NIP</label>

                <input type="text"
                       name="nip"
                       class="form-control"
                       placeholder="Masukkan NIP"
                       required>

            </div>



            <div class="form-group">

                <label>Nama Karyawan</label>

                <input type="text"
                       name="nama_karyawan"
                       class="form-control"
                       placeholder="Masukkan nama karyawan"
                       required>

            </div>




            <div class="form-group">

                <label>Jabatan</label>

                <select name="jabatan_id"
                        class="form-control"
                        required>


                    <option value="">
                        -- Pilih Jabatan --
                    </option>


                    @foreach($jabatans as $jabatan)

                    <option value="{{ $jabatan->id }}">

                        {{ $jabatan->nama_jabatan }}

                    </option>

                    @endforeach


                </select>

            </div>




            <div class="form-group">

                <label>Tanggal Masuk</label>

                <input type="date"
                       name="tanggal_masuk"
                       class="form-control"
                       required>

            </div>




            <button type="submit"
                    class="btn btn-primary">

                <i class="fas fa-save"></i>
                Simpan

            </button>



            <a href="{{ route('karyawans.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>


        </form>


    </div>

</div>


@stop