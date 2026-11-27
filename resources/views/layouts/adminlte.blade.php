@extends('adminlte::page')


@section('title')
    @yield('title', 'Sistem Informasi Penggajian')
@stop



@section('content_header')

<div class="row mb-3">

    <div class="col-md-6">

        <h2 class="font-weight-bold text-dark mb-1">

            <i class="fas fa-tachometer-alt text-primary mr-2"></i>

            @yield('page_title', 'Dashboard')

        </h2>


        <p class="text-muted mb-0">

            Sistem Informasi Penggajian

        </p>


    </div>



    <div class="col-md-6 text-right">


        @auth

            <span class="badge badge-primary px-3 py-2">

                <i class="fas fa-user-circle mr-1"></i>

                {{ Auth::user()->name }}

            </span>


        @endauth


    </div>


</div>


@stop





@section('content')


    @yield('content')


@stop





@section('css')


<style>


body{

    font-family:'Segoe UI', sans-serif;

}



.content-wrapper{

    background:#f4f6f9;

}



.card{

    border:none;

    border-radius:12px;

    box-shadow:0 4px 15px rgba(0,0,0,.08);

    transition:.3s;

}



.card:hover{

    box-shadow:0 8px 20px rgba(0,0,0,.12);

}



.card-header{

    border-radius:12px 12px 0 0 !important;

    font-weight:600;

}



.card-title{

    font-size:22px;

}



.btn{

    border-radius:8px;

}



.form-control{

    border-radius:8px;

}



.input-group-text{

    border-radius:8px 0 0 8px;

}



.table{

    border-radius:10px;

    overflow:hidden;

}



.table thead{

    background:#007bff;

    color:white;

}



.small-box{

    border-radius:12px;

}



.badge{

    font-size:14px;

}



.breadcrumb{

    background:transparent;

    padding:0;

    margin:0;

}



.footer-custom{

    text-align:center;

    padding:15px;

    color:#666;

    font-size:14px;

}



</style>


@stop






@section('footer')


<div class="footer-custom">


    <strong>

        Sistem Informasi Penggajian

    </strong>


    <br>


    <small>

        Copyright © {{ date('Y') }} - All Rights Reserved

    </small>


</div>


@stop






@section('js')


<script>

console.log('Sistem Informasi Penggajian');

</script>



{{-- Tempat script dari halaman lain --}}

@stack('js')


@stop