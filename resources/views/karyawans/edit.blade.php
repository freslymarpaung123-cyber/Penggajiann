@extends('adminlte::page')

@section('title', 'Edit Karyawan')

@section('content_header')
    <h1>
        <i class="fas fa-user-edit"></i>
        Edit Karyawan
    </h1>
@stop


@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('karyawans.update', $karyawan->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>NIP</label>
                <input type="text" 
                       name="nip" 
                       class="form-control"
                       value="{{ $karyawan->nip }}">
            </div>


            <div class="form-group">
                <label>Nama Karyawan</label>
                <input type="text" 
                       name="nama_karyawan" 
                       class="form-control"
                       value="{{ $karyawan->nama_karyawan }}">
            </div>


            <div class="form-group">
                <label>Jabatan</label>

                <select name="jabatan_id" class="form-control">

                    @foreach($jabatans as $jabatan)

                    <option value="{{ $jabatan->id }}"
                    {{ $karyawan->jabatan_id == $jabatan->id ? 'selected' : '' }}>

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
                       value="{{ $karyawan->tanggal_masuk }}">
            </div>


            <button class="btn btn-primary">
                <i class="fas fa-save"></i>
                Update
            </button>


            <a href="{{ route('karyawans.index') }}" 
               class="btn btn-secondary">
                Kembali
            </a>


        </form>

    </div>
</div>

@stop