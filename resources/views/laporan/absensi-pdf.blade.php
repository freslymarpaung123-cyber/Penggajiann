<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Absensi</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background: #ddd; }
        h2 { text-align: center; margin-bottom: 1rem; }
    </style>
</head>
<body>
    <h2>Laporan Absensi Karyawan</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Karyawan</th>
                <th>Tanggal</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($absensis as $absensi)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $absensi->karyawan->nama_karyawan ?? '-' }}</td>
                    <td>{{ $absensi->tanggal }}</td>
                    <td>{{ $absensi->jam_masuk ?? '-' }}</td>
                    <td>{{ $absensi->jam_keluar ?? '-' }}</td>
                    <td>{{ $absensi->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
