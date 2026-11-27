<!DOCTYPE html>
<html lang="id">

<head>
<meta charset="UTF-8">
<title>Slip Gaji Pegawai</title>

<style>

body{
    font-family: DejaVu Sans, sans-serif;
    font-size:12px;
    color:#333;
    margin:30px;
}

table{
    width:100%;
    border-collapse:collapse;
}

td,th{
    padding:8px;
}

.header{
    border-bottom:3px solid #0d6efd;
    padding-bottom:15px;
    margin-bottom:20px;
}

.logo{
    width:75px;
}

.company-name{
    font-size:22px;
    font-weight:bold;
    color:#0d6efd;
}

.company-subtitle{
    font-size:16px;
    font-weight:bold;
}

.company-address{
    font-size:11px;
    color:#666;
}

.slip-title{
    margin:25px 0 15px;
    text-align:center;
    font-size:20px;
    font-weight:bold;
    color:#0d6efd;
}

.box-title{
    background:#0d6efd;
    color:#fff;
    font-weight:bold;
    padding:8px;
}

.data{
    width:100%;
    border-collapse:collapse;
    margin-bottom:20px;
}

.data td{
    border:1px solid #ddd;
}

.label{
    width:35%;
    font-weight:bold;
    background:#f8f9fa;
}

.detail{
    width:100%;
    border-collapse:collapse;
    margin-top:10px;
}

.detail th{
    background:#0d6efd;
    color:#fff;
    border:1px solid #0d6efd;
}

.detail td{
    border:1px solid #ddd;
}

.text-right{
    text-align:right;
}

.total{
    background:#198754;
    color:#fff;
    font-weight:bold;
}

.signature{
    margin-top:60px;
}

.signature td{
    border:none;
    text-align:center;
    width:50%;
}

.footer{
    margin-top:40px;
    border-top:1px solid #ccc;
    padding-top:10px;
    text-align:center;
    font-size:10px;
    color:#777;
}

</style>

</head>

<body>

<table class="header">

<tr>

<td width="90">

@if(file_exists(public_path('images/profil.png')))
<img src="{{ public_path('images/profil.png') }}" class="logo">
@endif

</td>

<td>

<div class="company-name">
SISTEM INFORMASI PENGGAJIAN
</div>

<div class="company-subtitle">
SLIP GAJI PEGAWAI
</div>

<div class="company-address">
Periode :
{{ \Carbon\Carbon::parse($penggajian->tanggal_gaji)->translatedFormat('F Y') }}
</div>

</td>

<td align="right">

<strong>No. Slip</strong><br>

SG-{{ str_pad($penggajian->id,5,'0',STR_PAD_LEFT) }}

</td>

</tr>

</table>

<div class="slip-title">
SLIP GAJI
</div>

<div class="box-title">
DATA PEGAWAI
</div>

<table class="data">

<tr>
    <td class="label">Nama Pegawai</td>
    <td>{{ optional($penggajian->pegawai)->nama_karyawan }}</td>
</tr>

<tr>
    <td class="label">NIP</td>
    <td>{{ optional($penggajian->pegawai)->nip }}</td>
</tr>

<tr>
    <td class="label">Jabatan</td>
    <td>{{ optional(optional($penggajian->pegawai)->jabatan)->nama_jabatan }}</td>
</tr>

<tr>
    <td class="label">Tanggal Gaji</td>
    <td>{{ \Carbon\Carbon::parse($penggajian->tanggal_gaji)->format('d-m-Y') }}</td>
</tr>

<tr>
    <td class="label">Status</td>
    <td><strong>LUNAS</strong></td>
</tr>

</table>

<div class="box-title">
RINCIAN PENGHASILAN
</div>

<table class="detail">

<thead>

<tr>

<th>Keterangan</th>
<th width="35%">Nominal</th>

</tr>

</thead>

<tbody>

<tr>
<td>Gaji Pokok</td>
<td class="text-right">
Rp {{ number_format($penggajian->gaji_pokok,0,',','.') }}
</td>
</tr>

<tr>
<td>Tunjangan</td>
<td class="text-right">
Rp {{ number_format($penggajian->tunjangan,0,',','.') }}
</td>
</tr>

<tr>
<td>Potongan</td>
<td class="text-right">
Rp {{ number_format($penggajian->potongan,0,',','.') }}
</td>
</tr>

<tr class="total">
<td>TOTAL GAJI DITERIMA</td>
<td class="text-right">
Rp {{ number_format($penggajian->total_gaji,0,',','.') }}
</td>
</tr>

</tbody>

</table>

<table class="signature">

<tr>

<td>

Mengetahui,

<br><br><br><br>

(______________________)

<br>

<strong>Kepala Bagian</strong>

</td>

<td>

Dibuat Oleh,

<br><br><br><br>

(______________________)

<br>

<strong>Admin Penggajian</strong>

</td>

</tr>

</table>

<div class="footer">

Dokumen ini dibuat secara otomatis oleh Sistem Informasi Penggajian.<br>
Dicetak pada {{ now()->format('d-m-Y H:i') }}

</div>

</body>

</html>