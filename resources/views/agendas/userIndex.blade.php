@extends('layouts.master') @section('title') Agenda @endsection
@section('page-title') Agenda Saya @endsection @section('body')

<body>
    @endsection @section('content')
    <div class="row">
        <div class="col-md-6 col-xl-6 d-flex gap-3">
            <button type="button" class="btn btn-primary waves-effect waves-light mb-3" onclick="window.location.href='{{ route('agendas.create') }}'">Tambah Agenda</button>
        </div>
    </div>
    <!-- end row -->

    <div class="row mt-3 mb-2">
        <h4></h4>
    </div>

    <div class="row">
        @foreach ($agendas as $agenda)
        <div class="col-lg-6">
            <div class="card">
                <div
                    class="card-header bg-transparent d-flex border-bottom py-2 px-3 align-items-center justify-content-between"
                >
                    <div class="d-flex gap-3">
                        <p class="mb-0">Oleh: {{ $agenda->user->name }}, pada: {{ $agenda->created_at->format('d M Y') }}</p>
                        @if ($agenda->private)
                            <span class="badge text-bg-primary pt-1">Private</span>
                        @else
                            <span class="badge text-bg-success pt-1">Publish</span>
                        @endif
                    </div>
                    <div class="d-flex gap-3">
                        <button type="button" class="btn btn-subtle-danger waves-effect waves-light p-3" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <i class="fas fa-trash fa-lg"></i>
                        </button>

                        <a href="{{ route('agendas.edit', $agenda->id) }}">
                            <button type="button" class="btn btn-subtle-warning waves-effect waves-light p-3">
                                <i class="fas fa-pencil-alt fa-lg"></i>
                            </button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="card-title">{{ $agenda->judul }}</h4>
                    <p class="card-text">
                        <i class="fas fa-map-marker-alt"></i> 
                        Dari: {{ $agenda->lokasi_berangkat }}
                    </p>
                    <h5 class="card-title">Destinasi Tujuan</h5>
                    @foreach($agenda->details as $detail)
                        @if($detail->kategori === 'destinasi')
                        <a
                            href="javascript: void(0);"
                            class="btn btn-light btn-rounded waves-effect waves-light"
                            >{{ $detail->judul }}</a>
                        @endif
                    @endforeach
                </div>
                <div class="card-footer bg-transparent border-top text-muted d-flex justify-content-between gap-4 py-2 px-3">
                    <div class="d-flex gap-4 mt-2">
                        <p class="mb-0"><span>{{ $agenda->likes->count() }} Suka</span></p>
                        <p class="mb-0">{{ $agenda->comments->count() }} Komentar</p>
                    </div>
                    <a href="{{ route('details.userDetail', $agenda->id) }}" style="color: blue; text-decoration: none;" class="btn btn-subtle-primary">
                        Lihat selengkapnya
                    </a>
                </div>         
            </div>
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deleteModalLabel">Konfirmasi Hapus</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin menghapus agenda ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect waves-light" data-bs-dismiss="modal">Batal</button>
                        <form class="" action="{{ route('agendas.destroy', ['agenda' => $agenda->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger waves-effect waves-light">Hapus</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- end row -->

    @endsection @section('scripts')
    <!-- Card Masonry -->
    <script src="{{ URL::asset('build/libs/masonry-layout/masonry.pkgd.min.js') }}"></script>
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
</body>
