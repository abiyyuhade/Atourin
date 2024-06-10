@extends('layouts.master') @section('title') Tambah Agenda @endsection

@section('page-title') @endsection @section('body')

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
                                        id="biaya"
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
                                        id="mulai"
                                        name="mulai"
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
                                        type="datetime-local"
                                        class="form-control"
                                        id="selesai"
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
    @endsection
</body>
