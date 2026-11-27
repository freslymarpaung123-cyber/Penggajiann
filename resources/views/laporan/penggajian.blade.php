@extends('adminlte::page')

@section('title', 'Laporan Penggajian')


@section('content_header')

<h1>
    <i class="fas fa-money-check-alt"></i>
    Laporan Penggajian
</h1>

@stop



@section('content')


<div class="card">


<div class="card-header">

<form method="GET"
      action="{{ route('laporan.penggajian') }}"
      class="row">


<div class="col-md-4">

<label>Pilih Bulan</label>

<select name="bulan"
        class="form-control">


<option value="">
Semua Bulan
</option>


@for($i=1;$i<=12;$i++)

<option value="{{ $i }}">
{{ date('F', mktime(0,0,0,$i,1)) }}
</option>

@endfor


</select>

</div>



<div class="col-md-4 mt-4 d-flex gap-2">

                <button class="btn btn-primary">

                    <i class="fas fa-search"></i>
                    Tampilkan

                </button>

                <a href="{{ route('laporan.penggajian.pdf', request()->only(['bulan'])) }}"
                   class="btn btn-danger"
                   target="_blank">
                    <i class="fas fa-file-pdf"></i>
                    Cetak PDF
                </a>

</div>


</form>

</div>



<div class="card-body">


<table class="table table-bordered table-striped">


<thead>

<tr>

<th>No</th>
<th>Nama Karyawan</th>
<th>Jabatan</th>
<th>Tanggal Gaji</th>
<th>Gaji Pokok</th>
<th>Tunjangan</th>
<th>Potongan</th>
<th>Total Gaji</th>

</tr>

</thead>



<tbody>


@forelse($penggajians as $gaji)


<tr>


<td>
{{ $loop->iteration }}
</td>


<td>
{{ $gaji->karyawan->nama_karyawan ?? '-' }}
</td>


<td>
{{ $gaji->karyawan->jabatan->nama_jabatan ?? '-' }}
</td>


<td>
{{ $gaji->tanggal_gaji }}
</td>


<td>
Rp {{ number_format($gaji->gaji_pokok) }}
</td>


<td>
Rp {{ number_format($gaji->tunjangan) }}
</td>


<td>
Rp {{ number_format($gaji->potongan) }}
</td>


<td>

<strong>
Rp {{ number_format($gaji->total_gaji) }}
</strong>

</td>


</tr>


@empty


<tr>

<td colspan="8" class="text-center">

Belum ada data penggajian

</td>

</tr>


@endforelse



</tbody>


</table>


</div>


</div>


@stop