@extends('layouts.adminlte')

@section('title', 'Dashboard')

@section('page_title', 'Dashboard')


@section('content')


<!-- Welcome -->

<div class="card card-primary card-outline shadow mb-4">

    <div class="card-body">

        <h3>
            Halo, {{ Auth::user()->name }} 👋
        </h3>

        <p class="text-muted">
            Selamat datang di Sistem Informasi Penggajian Pegawai.
        </p>

    </div>

</div>




<!-- Statistik -->

<div class="row">


    <div class="col-lg-3 col-6">

        <div class="small-box bg-info">

            <div class="inner">

                <h3>{{ $totalJabatan }}</h3>

                <p>Total Jabatan</p>

            </div>

            <div class="icon">

                <i class="fas fa-briefcase"></i>

            </div>

        </div>

    </div>




    <div class="col-lg-3 col-6">

        <div class="small-box bg-success">

            <div class="inner">

                <h3>{{ $totalPegawai }}</h3>

                <p>Total Pegawai</p>

            </div>


            <div class="icon">

                <i class="fas fa-users"></i>

            </div>


        </div>

    </div>





    <div class="col-lg-3 col-6">

        <div class="small-box bg-warning">

            <div class="inner">

                <h3>{{ $totalPenggajian }}</h3>

                <p>Total Penggajian</p>

            </div>


            <div class="icon">

                <i class="fas fa-money-bill"></i>

            </div>


        </div>


    </div>





    <div class="col-lg-3 col-6">

        <div class="small-box bg-danger">

            <div class="inner">

                <h3>{{ $totalUser }}</h3>

                <p>Total User</p>

            </div>


            <div class="icon">

                <i class="fas fa-user"></i>

            </div>


        </div>


    </div>


</div>





<!-- Grafik Penggajian -->

<div class="card card-primary card-outline mt-4">

    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-chart-bar mr-2"></i>
            Grafik Penggajian Bulanan
        </h3>
    </div>


    <div class="card-body">

        <div style="height:350px">
            <canvas id="grafikPenggajian"></canvas>
        </div>

    </div>

</div>



<!-- Penggajian Terbaru -->

<div class="card card-primary card-outline mt-4">

    <div class="card-header">

        <h3 class="card-title">
            <i class="fas fa-history mr-2"></i>
            Penggajian Terbaru
        </h3>

    </div>


    <div class="card-body table-responsive">


        <table class="table table-bordered table-hover">

            <thead>

                <tr>
                    <th>No</th>
                    <th>Pegawai</th>
                    <th>Tanggal</th>
                    <th>Total Gaji</th>
                </tr>

            </thead>


            <tbody>


            @forelse($penggajianTerbaru as $data)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>
                        {{ $data->pegawai->nama ?? '-' }}
                    </td>


                    <td>
                        {{ \Carbon\Carbon::parse($data->tanggal_gaji)->format('d-m-Y') }}
                    </td>


                    <td class="text-success font-weight-bold">

                        Rp {{ number_format($data->total_gaji,0,',','.') }}

                    </td>


                </tr>


            @empty

                <tr>
                    <td colspan="4" class="text-center">
                        Belum ada data penggajian
                    </td>
                </tr>


            @endforelse


            </tbody>


        </table>


    </div>

</div>



@push('js')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>

document.addEventListener("DOMContentLoaded", function(){

    const canvas = document.getElementById('grafikPenggajian');

    if(canvas){

        new Chart(canvas, {

            type: 'bar',

            data: {

                labels: @json($bulan),

                datasets: [{

                    label: 'Total Gaji',

                    data: @json($total),

                    borderWidth: 1

                }]

            },


            options: {

                responsive:true,

                maintainAspectRatio:false,

                scales: {

                    y: {

                        beginAtZero:true

                    }

                }

            }

        });

    }

});


</script>

@endpush

@endsection