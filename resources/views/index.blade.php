@extends('layouts.master') @section('title') Cards @endsection
@section('page-title') Home @endsection @section('body')

<body>
    @endsection @section('content')
    <div class="row">
        <div class="col-md-6 col-xl-6 d-flex gap-3">
            <button type="button" class="btn btn-primary waves-effect waves-light mb-3">Tambah Agenda</button>
            <button type="button" class="btn btn-outline-primary waves-effect waves-light mb-3">Kelola Agenda Saya</button>
        </div>
    </div>
    <!-- end row -->

    <div class="row mt-3 mb-2">
        <h4>Rekomendasi Agenda</h4>
    </div>

    <div class="row">

        <div class="col-lg-6">
            <div class="card">
                <div
                    class="card-header bg-transparent d-flex border-bottom text-uppercase py-2 px-3 align-items-center justify-content-between"
                >
                    <div>
                        <p class="mb-0">Oleh: Luthfi, pada: 19 Agustus 2024</p>
                    </div>
                    <div  class="btn p-3 btn-subtle-primary waves-effect waves-light">
                        <i class="far fa-bookmark fa-lg"></i> 
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Perjalanan ke Purwokerto</h4>
                    <p class="card-text">
                        <i class="fas fa-map-marker-alt"></i> 
                        Dari: Kuningan, Jawa Barat
                    </p>
                    <h5 class="card-title">Destinasi Tujuan</h5>
                    <a
                        href="javascript: void(0);"
                        class="btn btn-light btn-rounded waves-effect waves-light"
                        >Baturraden</a
                    >
                    <a
                        href="javascript: void(0);"
                        class="btn btn-light btn-rounded waves-effect waves-light"
                        >Alun-alun</a
                    >
                </div>
                <div class="card-footer bg-transparent border-top text-muted">
                    500 komentar
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div
                    class="card-header bg-transparent d-flex border-bottom text-uppercase py-2 px-3 align-items-center justify-content-between"
                >
                    <div>
                        <p class="mb-0">Oleh: Luthfi, pada: 19 Agustus 2024</p>
                    </div>
                    <div  class="btn p-3 btn-subtle-primary waves-effect waves-light">
                        <i class="far fa-bookmark fa-lg"></i> 
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Perjalanan ke Purwokerto</h4>
                    <p class="card-text">
                        <i class="fas fa-map-marker-alt"></i> 
                        Dari: Kuningan, Jawa Barat
                    </p>
                    <h5 class="card-title">Destinasi Tujuan</h5>
                    <a
                        href="javascript: void(0);"
                        class="btn btn-light btn-rounded waves-effect waves-light"
                        >Baturraden</a
                    >
                    <a
                        href="javascript: void(0);"
                        class="btn btn-light btn-rounded waves-effect waves-light"
                        >Alun-alun</a
                    >
                </div>
                <div class="card-footer bg-transparent border-top text-muted">
                    500 komentar
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    @endsection @section('scripts')
    <!-- Card Masonry -->
    <script src="{{ URL::asset('build/libs/masonry-layout/masonry.pkgd.min.js') }}"></script>
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
</body>
