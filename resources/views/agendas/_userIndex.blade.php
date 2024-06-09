@extends('layouts.master') @section('title') Timeline @endsection
@section('page-title') Timeline @endsection @section('body')

<body>
    @endsection @section('content')
    <div class="row">
        <div class="col-xl-12">
            <a href="">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Detail Agenda</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-floating mb-3">
                            <input
                                type="text"
                                class="form-control"
                                id="floatingnameInput"
                                placeholder="Enter Name"
                                disabled
                            />
                            <label for="floatingnameInput">{{ $agenda->judul }}</label>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input
                                        type="email"
                                        class="form-control"
                                        id="floatingemailInput"
                                        placeholder="Enter Email address"
                                        disabled
                                    />
                                    <label for="floatingemailInput"
                                        >Lokasi Awal sudah diisi</label
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input
                                        type="date"
                                        class="form-control"
                                        id="floatingemailInput"
                                        placeholder="Enter Email address"
                                        disabled
                                    />
                                    <label for="floatingemailInput"
                                        >Waktu Berangkat sudah diisi</label
                                    >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input
                                        type="date"
                                        class="form-control"
                                        id="floatingemailInput"
                                        placeholder="Enter Email address"
                                        disabled
                                    />
                                    <label for="floatingemailInput"
                                        >Waktu Selesai sudah diisi</label
                                    >
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-subtle-danger w-md">
                                Hapus
                            </button>
                            <button type="submit" class="btn btn-subtle-warning w-md mx-3">
                                Ubah
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
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-xl-10">
                            <div class="timeline">
                                <div class="timeline-container">
                                    <div class="timeline-end">
                                        <p>Mulai</p>
                                    </div>
                                    <div class="timeline-continue">
                                        <div class="row timeline-left">
                                            <div
                                                class="col-md-6 d-md-none d-block"
                                            >
                                                <div class="timeline-icon">
                                                    <i
                                                        class="mdi-car-estate text-primary h2 mb-0"
                                                    ></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="timeline-box">
                                                    <div
                                                        class="timeline-date bg-primary text-center rounded"
                                                    >
                                                        <h3
                                                            class="text-white mb-0 font-size-20"
                                                        >
                                                            25
                                                        </h3>
                                                        <p
                                                            class="mb-0 text-white-50"
                                                        >
                                                            Juni
                                                        </p>
                                                    </div>
                                                    <div class="event-content">
                                                  
                                                        <div
                                                            class="timeline-text"
                                                        >
                                                            <h3
                                                                class="font-size-17"
                                                            >
                                                                Menggunakan travel atourin
                                                            </h3>
                                                            <div class="btn btn-outline-primary">
                                                              Mulai: <b>08.00</b>
                                                            </div>
                                                            <div class="btn btn-outline-primary">
                                                              Selesai: <b>12.00</b>
                                                            </div>
                                                            <div class="btn btn-subtle-primary mt-3 waves-effect waves-light">
                                                              Harga: <b>120.000</b>
                                                            </div> <br>
                                                            <div class="btn btn-sm btn-danger mt-3 mx-2 waves-effect waves-light">
                                                              <i class="fas fa-trash h5 m-2"></i>
                                                            </div>
                                                            <div class="btn btn-sm btn-warning mt-3 waves-effect waves-light">
                                                              <i class="fas fa-pen h5 m-2"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col-md-6 d-md-block d-none"
                                            >
                                                <div class="timeline-icon">
                                                    <i
                                                        class="fas fa-car-side text-primary h2 mb-0"
                                                    ></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row timeline-right">
                                            <div class="col-md-6">
                                                <div class="timeline-icon">
                                                    <i
                                                        class="far fa-map text-primary h2 mb-0"
                                                    ></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="timeline-box">
                                                    <div
                                                        class="timeline-date bg-primary text-center rounded"
                                                    >
                                                        <h3
                                                            class="text-white mb-0 font-size-20"
                                                        >
                                                            25
                                                        </h3>
                                                        <p
                                                            class="mb-0 text-white-50"
                                                        >
                                                            Juni
                                                        </p>
                                                    </div>
                                                    <div class="event-content">
                                                        <div
                                                            class="timeline-text"
                                                        >
                                                            <h3
                                                                class="font-size-17"
                                                            >
                                                                Baturaden
                                                            </h3>
                                                            <div class="btn btn-outline-primary">
                                                              Mulai: <b>13.00</b>
                                                            </div>
                                                            <div class="btn btn-outline-primary">
                                                              Selesai: <b>15.00</b>
                                                            </div>
                                                            <div class="btn btn-subtle-primary mt-3 waves-effect waves-light">
                                                              Harga: <b>20.000</b>
                                                            </div> <br>
                                                            <div class="btn btn-sm btn-danger mt-3 mx-2 waves-effect waves-light">
                                                              <i class="fas fa-trash h5 m-2"></i>
                                                            </div>
                                                            <div class="btn btn-sm btn-warning mt-3 waves-effect waves-light">
                                                              <i class="fas fa-pen h5 m-2"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="timeline-start">
                                        <p>Selesai</p>
                                    </div>
                                    <hr class="mt-5">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div>
                                            <button class="btn btn-primary waves-effect waves-light mx-3">Tambah Transportasi</button>
                                        </div>
                                        <div>
                                            <button class="btn btn-info waves-effect waves-light">Tambah Destinasi</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection @section('scripts')
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
</body>
