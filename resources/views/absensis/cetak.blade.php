<!DOCTYPE html>
<html>
<head>
    <title>Laporan Absensi</title>

    <style>
        body {
            font-family: Arial;
        }

        table {
            width:100%;
            border-collapse: collapse;
        }

        th, td {
            border:1px solid black;
            padding:8px;
            text-align:center;
        }

        h2 {
            text-align:center;
        }

    </style>

</head>

<body>


<h2>
    LAPORAN ABSENSI KARYAWAN
</h2>


<table>

<tr>
    <th>No</th>
    <th>Nama Karyawan</th>
    <th>Tanggal</th>
    <th>Jam Masuk</th>
    <th>Jam Keluar</th>
    <th>Status</th>
</tr>


@foreach($absensis as $absensi)

<tr>

<td>{{ $loop->iteration }}</td>

<td>
    {{ $absensi->karyawan->nama_karyawan ?? '-' }}
</td>

<td>
    {{ $absensi->tanggal }}
</td>

<td>
    {{ $absensi->jam_masuk }}
</td>

<td>
    {{ $absensi->jam_keluar }}
</td>

<td>
    {{ $absensi->status }}
</td>

</tr>

@endforeach


</table>


<script>
window.print();
</script>


</body>
</html>