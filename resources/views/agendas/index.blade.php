@extends('layouts.master') @section('title') Beranda @endsection
@section('page-title') Beranda @endsection @section('body')

<body>
    @endsection @section('content')
    <div class="row">
        <div class="col-md-6 col-xl-6 d-flex gap-3">
            <button type="button" class="btn btn-primary waves-effect waves-light mb-3" onclick="window.location.href='{{ route('agendas.create') }}'">Tambah Agenda</button>
            <button type="button" class="btn btn-outline-primary waves-effect waves-light mb-3" onclick="window.location.href='{{ route('user.agendas') }}'">Kelola Agenda Saya</button>
        </div>
    </div>
    <!-- end row -->

    <div class="row mt-3 mb-2">
        @if(isset($searchTerm) && !empty($searchTerm))
            <h4>Cari "{{ $searchTerm }}"</h4>
        @else
            <h4>Rekomendasi Agenda</h4>
        @endif
    </div>

    <div class="row">
        @forelse ($agendas as $agenda)
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header bg-transparent d-flex border-bottom py-2 px-3 align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <img src="{{ URL::asset('build/images/users/avatar-10.jpg') }}" alt="Profile Picture" class="rounded-circle header-profile-user">
                            <div class="ms-3">
                                <p class="mb-0">{{ $agenda->user->name }}</p>
                                <small class="text-muted">{{ $agenda->created_at->format('d M Y') }}</small>
                            </div>
                        </div>
                        <div class="d-flex gap-3">
                            <div>
                                <form class="mb-0" action="{{ route('agendas.bookmark', $agenda->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn p-3 btn-subtle-primary waves-effect waves-light">
                                        @if($agenda->bookmarks->contains('user_id', Auth::id()))
                                            <i class="fas fa-bookmark fa-lg"></i>
                                        @else
                                            <i class="far fa-bookmark fa-lg"></i>
                                        @endif
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <h5 class="text-primary">{{ $agenda->judul }}</h5>
                            <p class="card-text">
                                <i class="fas fa-map-marker-alt me-2 text-danger"></i>
                                <span class="fw-bold me-3">{{ $agenda->lokasi_berangkat }}</span>
                                <i class="fas fa-clock me-2 text-info"></i>
                                <span class="fw-bold me-3">{{ $agenda->durasi }}</span>
                                <i class="fas fa-money-bill-wave me-2 text-success"></i>
                                <span class="fw-bold">{{ $agenda->total_biaya }}</span>
                            </p>
                        </div>
                        
                        <div>
                            <h6 class="text-secondary">Destinasi:</h6>
                            <div class="d-flex flex-wrap gap-1">
                                @foreach($agenda->details as $detail)
                                    @if($detail->kategori === 'destinasi')
                                    <a href="javascript: void(0);" class="btn btn-light btn-rounded waves-effect waves-light">{{ $detail->judul }}</a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-transparent border-top text-muted d-flex justify-content-between gap-4 py-2 px-3">
                        <div class="d-flex align-items-center gap-3">
                            <form class="mb-0" action="{{ route('agendas.like', $agenda->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-subtle-danger waves-effect waves-light me-2 d-flex align-items-center justify-content-center">
                                    @if($agenda->likes->contains('user_id', Auth::id()))
                                        <i class="fas fa-heart fa-lg me-2"></i>
                                    @else
                                        <i class="far fa-heart fa-lg me-2"></i>
                                    @endif
                                    <p class="mb-0"><span>{{ $agenda->likes->count() }} Suka</span></p>
                                </button>
                            </form>
                            <p class="mb-0">{{ $agenda->comments->count() }} Komentar</p>
                        </div>
                        <a href="{{ route('details.index', $agenda->id) }}" style="color: blue; text-decoration: none;" class="btn btn-subtle-primary">
                            Lihat selengkapnya
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">Tidak ada agenda yang sesuai dengan pencarian anda</p>
        @endforelse
    </div>
    
    <div class="d-flex justify-content-center">
        {{ $agendas->links('pagination::bootstrap-5') }}
    </div>

    <!-- end row -->

    @endsection @section('scripts')
    <!-- Card Masonry -->
    <script src="{{ URL::asset('build/libs/masonry-layout/masonry.pkgd.min.js') }}"></script>
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
</body>
