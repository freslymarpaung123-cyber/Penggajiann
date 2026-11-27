<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Penggajian</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background: #ddd; }
        h2 { text-align: center; margin-bottom: 1rem; }
    </style>
</head>
<body>
    <h2>Laporan Penggajian Karyawan</h2>
    <table>
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
            @foreach($penggajians as $gaji)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $gaji->karyawan->nama_karyawan ?? '-' }}</td>
                    <td>{{ $gaji->karyawan->jabatan->nama_jabatan ?? '-' }}</td>
                    <td>{{ $gaji->tanggal_gaji }}</td>
                    <td>Rp {{ number_format($gaji->gaji_pokok, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($gaji->tunjangan, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($gaji->potongan, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($gaji->total_gaji, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
