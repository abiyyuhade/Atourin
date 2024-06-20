@extends('layouts.master') @section('title') Tambah Agenda @endsection

@section('page-title') Tambah Agenda @endsection @section('body')

<body>
    @endsection @section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Tambah Agenda</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('agendas.store') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input
                                type="text"
                                class="form-control"
                                id="judul"
                                name="judul"
                                placeholder="Judul Agenda"
                            />
                            <label for="floatingnameInput">Judul Agenda</label>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="lokasi_berangkat"
                                        name="lokasi_berangkat"
                                        placeholder="Lokasi Awal"
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
                                        id="mulai"
                                        name="mulai"
                                        placeholder="Waktu Berangkat"
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
                                        id="selesai"
                                        name="selesai"
                                        placeholder="Waktu Selesai"
                                    />
                                    <label for="floatingemailInput"
                                        >Waktu Selesai</label
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    id="private"
                                    name="private"
                                    value="1"
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
