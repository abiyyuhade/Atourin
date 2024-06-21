@extends('layouts.master') @section('title') Tambah Agenda @endsection

@section('page-title') @endsection 

@section('css')
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/flatpickr/flatpickr.min.css') }}">
@endsection

@section('body')

<body>
    @endsection @section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Tambah Transportasi</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('details.store', $agenda) }}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input
                                type="text"
                                class="form-control"
                                id="judul"
                                name="judul"
                                placeholder="Enter Name"
                                required
                            />
                            <label for="floatingnameInput">Judul</label>
                        </div>
                        <input type="hidden" name="kategori" value="{{ $kategori }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="regexp-mask"
                                        name="biaya"
                                        placeholder="Enter Email address"
                                    />
                                    <label for="floatingemailInput"
                                        >Biaya</label
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input
                                        type="datetime-local"
                                        class="form-control"
                                        id="datepicker-mulai"
                                        name="mulai"
                                        placeholder="Enter Email address"
                                    />
                                    <label for="floatingemailInput"
                                        >Waktu Mulai</label
                                    >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input
                                        type="datetime-local"
                                        class="form-control"
                                        id="datepicker-selesai"
                                        name="selesai"
                                        placeholder="Enter Email address"
                                    />
                                    <label for="floatingemailInput"
                                        >Waktu Selesai</label
                                    >
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary w-md">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
    @endsection @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
        <!-- form mask -->
        <script src="{{ URL::asset('build/libs/imask/imask.min.js') }}"></script>
        <!-- form mask init -->
        <script src="{{ URL::asset('build/js/pages/form-mask.init.js') }}"></script>

        <!-- datepicker js -->
        <script src="{{ URL::asset('build/libs/flatpickr/flatpickr.min.js') }}"></script>
        
        <script>
            flatpickr('#datepicker-mulai', {
                enableTime: true,
                dateFormat: "d-m-Y H:i",
                time_24hr: true
            });
            flatpickr('#datepicker-selesai', {
                enableTime: true,
                dateFormat: "d-m-Y H:i",
                time_24hr: true
            });
        </script>
    @endsection
</body>
