@extends('layouts.master') @section('title') Ubah Agenda @endsection

@section('page-title') Ubah Agenda @endsection @section('body')

<body>
    @endsection @section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Ubah Agenda</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-floating mb-3">
                            <input
                                type="text"
                                class="form-control"
                                id="floatingnameInput"
                                placeholder="Enter Name"
                            />
                            <label for="floatingnameInput">Judul Agenda</label>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input
                                        type="email"
                                        class="form-control"
                                        id="floatingemailInput"
                                        placeholder="Enter Email address"
                                    />
                                    <label for="floatingemailInput"
                                        >Lokasi Awal</label
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
                                    />
                                    <label for="floatingemailInput"
                                        >Waktu Berangkat</label
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
                                    />
                                    <label for="floatingemailInput"
                                        >Waktu Selesai</label
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    id="floatingCheck"
                                />
                                <label
                                    class="form-check-label"
                                    for="floatingCheck"
                                >
                                    Private
                                </label>
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
    @endsection
</body>
