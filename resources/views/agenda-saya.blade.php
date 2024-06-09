@extends('layouts.master') @section('title') Agenda @endsection
@section('page-title') Agenda Saya @endsection @section('body')

<body>
    @endsection @section('content')
    <div class="row">
        <div class="col-md-6 col-xl-6 d-flex gap-3">
            <button type="button" class="btn btn-primary waves-effect waves-light mb-3">Tambah Agenda</button>
        </div>
    </div>
    <!-- end row -->

    <div class="row mt-3 mb-2">
        <h4></h4>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <a href="">
                <div class="card">
                    <div
                        class="card-header bg-transparent d-flex border-bottom text-uppercase py-2 px-3 align-items-center justify-content-between"
                    >
                        <div>
                            <p class="mb-0">Oleh: Luthfi, pada: 12 </p>
                        </div>
                        <div  class="btn p-3 btn-subtle-primary waves-effect waves-light">
                            <i class="far fa-bookmark fa-lg"></i> 
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Judulnya cok</h4>
                        <p class="card-text">
                            <i class="fas fa-map-marker-alt"></i> 
                            Dari: mana mana pun
                        </p>
                        <h5 class="card-title">Destinasi Tujuan</h5>
                        <a
                            href="javascript: void(0);"
                            class="btn btn-light btn-rounded waves-effect waves-light"
                            >Baturraden</a>
                    </div>
                    <div class="card-footer bg-transparent border-top text-muted">
                        500 komentar
                    </div>
                    
                </div>
            </a>
        </div>
    </div>
    <!-- end row -->

    @endsection @section('scripts')
    <!-- Card Masonry -->
    <script src="{{ URL::asset('build/libs/masonry-layout/masonry.pkgd.min.js') }}"></script>
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
</body>
