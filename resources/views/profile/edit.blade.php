@extends('layouts.master')
@section('title')
    Profile
@endsection
@section('page-title')
    Profile
@endsection
@section('body')
<body>
@endsection
@section('content')
<div class="row">
    <!-- Profile Information Section -->
    <div class="col-xxl-3">
        <div class="card">
            <div class="card-body p-0">
                <div class="user-profile-img">
                    <img src="{{ URL::asset('build/images/pattern-bg.jpg') }}" class="profile-img profile-foreground-img rounded-top"
                         style="height: 120px;" alt="">
                    <div class="overlay-content rounded-top">
                        <div>
                            <div class="user-nav p-3">
                                <div class="d-flex justify-content-end">
                                    <div class="dropdown">
                                        <a class="text-muted dropdown-toggle font-size-16" href="#"
                                           role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                            <i class="bx bx-dots-vertical text-white font-size-20"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end user-profile-img -->

                <div class="p-4 pt-0">
                    <div class="mt-n5 position-relative text-center border-bottom pb-3">
                        <img src="{{ URL::asset('build/images/users/avatar-10.jpg') }}" alt=""
                             class="avatar-xl rounded-circle img-thumbnail">
                        <div class="mt-3">
                            <h5 class="mb-1">{{ Auth::user()->name }}</h5> <!-- Menampilkan nama pengguna -->
                            <p class="text-muted mb-0">{{ Auth::user()->email }}</p> <!-- Menampilkan email pengguna -->
                        </div>
                    </div>

                    <div class="table-responsive mt-3 border-bottom pb-3">
                        <table class="table align-middle table-sm table-nowrap table-borderless table-centered mb-0">
                            <tbody>
                            <tr>
                                <th class="fw-bold">Jenis Kelamin :</th>
                                <td class="text-muted">{{ Auth::user()->jk }}</td> <!-- Menampilkan jenis kelamin pengguna -->
                            </tr>
                            <tr>
                                <th class="fw-bold">Tanggal Lahir :</th>
                                <td class="text-muted">{{ Auth::user()->tgl_lahir }}</td> <!-- Menampilkan tanggal lahir pengguna -->
                            </tr>
                            <tr>
                                <th class="fw-bold">Alamat :</th>
                                <td class="text-muted">{{ Auth::user()->alamat }}</td> <!-- Menampilkan alamat pengguna -->
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Update Form Section -->
    <div class="col-xxl-9">
        <div class="card">
            <div class="card-body">
                <!-- Include the Breeze profile update form -->
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <!-- Include the Breeze password update form -->
                @include('profile.partials.update-password-form')
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <!-- Include the Breeze delete user form -->
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <!-- apexcharts -->
    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/profile.init.js') }}"></script>
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
