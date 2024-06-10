@extends('layouts.master') @section('title') Agenda @endsection
@section('page-title') Home @endsection @section('body')

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
        <h4>Rekomendasi Agenda</h4>
    </div>

    <div class="row">
        @foreach ($agendas as $agenda)
        <div class="col-lg-6">
                <div class="card">
                    <div
                        class="card-header bg-transparent d-flex border-bottom py-2 px-3 align-items-center justify-content-between"
                    >
                        <div>
                            <p class="mb-0">Oleh: {{ $agenda->user->name }}, pada: {{ $agenda->created_at->format('d M Y') }}</p>
                        </div>
                        <div class="d-flex">
                            <div>
                                @php
                                    $userLike = $agenda->likes->where('user_id', Auth::id())->first();
                                @endphp
                                <div class="btn p-3 btn-subtle-danger waves-effect waves-light mx-2" onclick="document.getElementById('like-form-{{ $agenda->id }}').submit();">
                                    @if($userLike)
                                        <i class="fas fa-heart fa-lg"></i> <!-- Solid heart icon for liked -->
                                    @else
                                        <i class="far fa-heart fa-lg"></i> <!-- Regular heart icon for not liked -->
                                    @endif
                                </div>
                                <form id="like-form-{{ $agenda->id }}" action="{{ route('agendas.like', $agenda->id) }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>

                            <div>
                                @php
                                    $userBookmark = $agenda->bookmarks->where('user_id', Auth::id())->first();
                                @endphp
                                <div class="btn p-3 btn-subtle-primary waves-effect waves-light mx-2" onclick="document.getElementById('bookmark-form-{{ $agenda->id }}').submit();">
                                    @if($userBookmark)
                                        <i class="fas fa-bookmark fa-lg"></i> <!-- Solid bookmark icon for bookmarked -->
                                    @else
                                        <i class="far fa-bookmark fa-lg"></i> <!-- Regular bookmark icon for not bookmarked -->
                                    @endif
                                </div>
                                <form id="bookmark-form-{{ $agenda->id }}" action="{{ route('agendas.bookmark', $agenda->id) }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
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
                        <a href="{{ route('details.index', $agenda->id) }}" style="color: blue; text-decoration: none;" class="btn btn-subtle-primary">
                            Lihat selengkapnya
                        </a>
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
