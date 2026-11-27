@extends('layouts.adminlte')

@section('title', 'Profile')

@section('page_title', 'Profile')

@section('content')

<div class="row">

    <div class="col-md-12">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}

                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
            </div>
        @endif

    </div>

</div>


<div class="row">

    <div class="col-lg-8">

        <div class="card card-primary card-outline">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fas fa-user-circle mr-2"></i>

                    Informasi Profil

                </h3>

            </div>

            <div class="card-body">

                @include('profile.partials.update-profile-information-form')

            </div>

        </div>

    </div>


    <div class="col-lg-4">

        <div class="card card-warning card-outline">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fas fa-lock mr-2"></i>

                    Ubah Password

                </h3>

            </div>

            <div class="card-body">

                @include('profile.partials.update-password-form')

            </div>

        </div>


        <div class="card card-danger card-outline mt-3">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fas fa-trash mr-2"></i>

                    Hapus Akun

                </h3>

            </div>

            <div class="card-body">

                @include('profile.partials.delete-user-form')

            </div>

        </div>

    </div>

</div>

@endsection