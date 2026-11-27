@extends('layouts.adminlte')

@section('title', 'Slip Gaji')

@section('page_title', 'Slip Gaji Pegawai')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-10">

        <div class="card card-primary card-outline shadow">

            <div class="card-header text-center bg-primary">

                <h3 class="mb-1 text-white font-weight-bold">
                    SISTEM INFORMASI PENGGAJIAN
                </h3>

                <p class="mb-0 text-white">
                    Slip Gaji Pegawai
                </p>

            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6">

                        <div class="card border-primary">

                            <div class="card-header bg-light">

                                <h5 class="mb-0">
                                    <i class="fas fa-user mr-2"></i>
                                    Data Pegawai
                                </h5>

                            </div>

                            <div class="card-body p-0">

                                <table class="table table-borderless mb-0">

                                    <tr>
                                        <th width="40%">Nama</th>
                                        <td>{{ $penggajian->pegawai->nama }}</td>
                                    </tr>

                                    <tr>
                                        <th>NIP</th>
                                        <td>{{ $penggajian->pegawai->nip }}</td>
                                    </tr>

                                    <tr>
                                        <th>Jabatan</th>
                                        <td>
                                            <span class="badge badge-info">
                                                {{ $penggajian->pegawai->jabatan->nama_jabatan }}
                                            </span>
                                        </td>
                                    </tr>

                                </table>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="card border-success">

                            <div class="card-header bg-light">

                                <h5 class="mb-0">
                                    <i class="fas fa-calendar-alt mr-2"></i>
                                    Informasi Pembayaran
                                </h5>

                            </div>

                            <div class="card-body p-0">

                                <table class="table table-borderless mb-0">

                                    <tr>
                                        <th width="45%">Tanggal Gaji</th>
                                        <td>
                                            {{ \Carbon\Carbon::parse($penggajian->tanggal_gaji)->format('d-m-Y') }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            <span class="badge badge-success">
                                                <i class="fas fa-check-circle mr-1"></i>
                                                SUDAH DIBAYAR
                                            </span>
                                        </td>
                                    </tr>

                                </table>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="card mt-4">

                    <div class="card-header">

                        <h5 class="mb-0">
                            <i class="fas fa-money-bill-wave mr-2"></i>
                            Rincian Penghasilan
                        </h5>

                    </div>

                    <div class="card-body p-0">

                        <table class="table table-bordered mb-0">

                            <tr>
                                <th width="45%">Gaji Pokok</th>
                                <td class="text-success font-weight-bold">
                                    Rp {{ number_format($penggajian->gaji_pokok,0,',','.') }}
                                </td>
                            </tr>

                            <tr>
                                <th>Tunjangan</th>
                                <td class="text-info font-weight-bold">
                                    Rp {{ number_format($penggajian->tunjangan,0,',','.') }}
                                </td>
                            </tr>

                            <tr>
                                <th>Potongan</th>
                                <td class="text-danger font-weight-bold">
                                    Rp {{ number_format($penggajian->potongan,0,',','.') }}
                                </td>
                            </tr>

                            <tr class="table-success">

                                <th>
                                    <i class="fas fa-wallet mr-1"></i>
                                    TOTAL GAJI DITERIMA
                                </th>

                                <td>

                                    <h4 class="mb-0 font-weight-bold text-success">

                                        Rp {{ number_format($penggajian->total_gaji,0,',','.') }}

                                    </h4>

                                </td>

                            </tr>

                        </table>

                    </div>

                </div>

                <div class="row text-center mt-5">

                    <div class="col-md-6">

                        <p>Mengetahui,</p>

                        <br><br><br>

                        <strong>Kepala Bagian</strong>

                    </div>

                    <div class="col-md-6">

                        <p>Dibuat Oleh,</p>

                        <br><br><br>

                        <strong>Admin Penggajian</strong>

                    </div>

                </div>

            </div>

            <div class="card-footer">

                <a href="{{ route('penggajians.index') }}"
                   class="btn btn-secondary">

                    <i class="fas fa-arrow-left mr-1"></i>
                    Kembali

                </a>

                <a href="{{ route('penggajians.pdf', $penggajian->id) }}"
                   class="btn btn-danger float-right">

                    <i class="fas fa-file-pdf mr-1"></i>
                    Download PDF

                </a>

            </div>

        </div>

    </div>

</div>

@endsection