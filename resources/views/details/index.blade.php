@extends('layouts.master') @section('title')
Detail Agenda
@endsection
@section('page-title')
    Detail Agenda
    @endsection @section('body')

    <body>
        @endsection @section('content')
        <div class="row">
            <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="floatingemailInput"
                                                placeholder="Enter Email address" disabled />
                                            <label for="floatingnameInput">{{ $agenda->judul }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="floatingemailInput"
                                                placeholder="Enter Email address" disabled />
                                            <label for="floatingemailInput">Dari: {{ $agenda->lokasi_berangkat }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control" id="floatingemailInput"
                                                placeholder="Enter Email address" disabled value="{{ $agenda->mulai }}" />
                                            <label for="floatingemailInput">Waktu Berangkat: </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control" id="floatingemailInput"
                                                placeholder="Enter Email address" disabled value="{{ $agenda->selesai }}" />
                                            <label for="floatingemailInput">Waktu Selesai:</label>
                                        </div>
                                    </div>
                                    <div>
                                        @php
                                            $userBookmark = $agenda->bookmarks->where('user_id', Auth::id())->first();
                                        @endphp
                                        <div>
                                            <button type="button" class="btn w-md @if($userBookmark) btn-danger @else btn-subtle-primary @endif" onclick="document.getElementById('bookmark-form-{{ $agenda->id }}').submit();">
                                                @if($userBookmark)
                                                    Hapus Bookmark
                                                @else
                                                    Simpan Bookmark
                                                @endif
                                            </button>
                                            <form id="bookmark-form-{{ $agenda->id }}" action="{{ route('agendas.bookmark', $agenda->id) }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>

                                    <div>
                                        <form id="bookmark-form-{{ $agenda->id }}" action="{{ route('agendas.bookmark', $agenda->id) }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
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
                                            @foreach ($details as $detail)
                                                @if ($detail->kategori == 'transportasi')
                                                    <div class="row timeline-left">
                                                        <div class="col-md-6 d-md-none d-block">
                                                            <div class="timeline-icon">
                                                                <i class="mdi-car-estate text-primary h2 mb-0"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="timeline-box">
                                                                <div class="timeline-date bg-primary text-center rounded">
                                                                    <h3 class="text-white mb-0 font-size-20">
                                                                        {{ \Carbon\Carbon::parse($detail->mulai)->format('d') }}
                                                                    </h3>
                                                                    <p class="mb-0 text-white-50">
                                                                        {{ \Carbon\Carbon::parse($detail->mulai)->format('F') }}
                                                                    </p>
                                                                </div>
                                                                <div class="event-content">
                                                                    <div class="timeline-text">
                                                                        <h3 class="font-size-17">{{ $detail->judul }}</h3>
                                                                        <div class="btn btn-outline-primary">
                                                                            Mulai:
                                                                            <b>{{ \Carbon\Carbon::parse($detail->mulai)->format('H:i') }}</b>
                                                                        </div>
                                                                        <div class="btn btn-outline-primary">
                                                                            Selesai:
                                                                            <b>{{ \Carbon\Carbon::parse($detail->selesai)->format('H:i') }}</b>
                                                                        </div><br>
                                                                        <div
                                                                            class="btn btn-subtle-primary mt-3 waves-effect waves-light">
                                                                            Harga: <b>{{ $detail->biaya }}</b>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 d-md-block d-none">
                                                            <div class="timeline-icon">
                                                                <i class="fas fa-car-side text-primary h2 mb-0"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($detail->kategori == 'destinasi')
                                                    <div class="row timeline-right">
                                                        <div class="col-md-6">
                                                            <div class="timeline-icon">
                                                                <i class="far fa-map text-primary h2 mb-0"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="timeline-box">
                                                                <div class="timeline-date bg-primary text-center rounded">
                                                                    <h3 class="text-white mb-0 font-size-20">
                                                                        {{ \Carbon\Carbon::parse($detail->mulai)->format('d') }}
                                                                    </h3>
                                                                    <p class="mb-0 text-white-50">
                                                                        {{ \Carbon\Carbon::parse($detail->mulai)->format('F') }}
                                                                    </p>
                                                                </div>
                                                                <div class="event-content">
                                                                    <div class="timeline-text">
                                                                        <h3 class="font-size-17">{{ $detail->judul }}</h3>
                                                                        <div class="btn btn-outline-primary">
                                                                            Mulai:
                                                                            <b>{{ \Carbon\Carbon::parse($detail->mulai)->format('H:i') }}</b>
                                                                        </div>
                                                                        <div class="btn btn-outline-primary">
                                                                            Selesai:
                                                                            <b>{{ \Carbon\Carbon::parse($detail->selesai)->format('H:i') }}</b>
                                                                        </div><br>
                                                                        <div
                                                                            class="btn btn-subtle-primary mt-3 waves-effect waves-light">
                                                                            Harga: <b>{{ $detail->biaya }}</b>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="timeline-start">
                                            <p>Selesai</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <div class="">
                            <h5 class="font-size-14 mb-3">Komentar : </h5>

                            <div class="border py-3 rounded">

                                <div class="px-4" data-simplebar style="max-height: 360px;">

                                <!-- ITERASI KOMENTAR -->
                                    <div class="border-bottom pb-3 pt-3">
                                        <p class="float-sm-end text-muted font-size-13">12 July, 2021</p>
                                        <div class="d-flex align-items-start">
                                            <div class="flex-grow-1">
                                                <div class="d-flex">
                                                    <img src="{{ URL::asset('build/images/users/avatar-2.jpg') }}"
                                                        class="avatar-sm rounded-circle" alt="">
                                                    <div class="flex-1 mt-2 ps-3">
                                                        <h5 class="font-size-16 mb-0">Samuel</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-muted my-3">Maecenas non vestibulum ante, nec efficitur
                                            orci. Duis eu ornare mi, quis bibendum quam. Etiam imperdiet aliquam
                                            purus sit amet rhoncus. Vestibulum pretium consectetur leo, in mattis
                                            ipsum sollicitudin eget. Pellentesque vel mi tortor.
                                            Nullam vitae maximus dui dolor sit amet, consectetur adipiscing elit.
                                        </p>

                                    </div>
                                <!-- ITERASI KOMENTAR SELESAI --> 
                                   
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="px-4 mt-2">
                            <div class="border rounded mt-4">
                                <form action="#">
                                    <div class="px-2 py-1 bg-light">
                                        <div class="btn-group" role="group">
                                            <button type="button"
                                                class="btn btn-sm btn-link text-body text-decoration-none"><i
                                                    class="bx bx-link"></i></button>
                                            <button type="button"
                                                class="btn btn-sm btn-link text-body text-decoration-none"><i
                                                    class="bx bx-smile"></i></button>
                                            <button type="button"
                                                class="btn btn-sm btn-link text-body text-decoration-none"><i
                                                    class="bx bx-at"></i></button>
                                        </div>
                                    </div>
                                    <textarea rows="7" class="form-control border-0 resize-none" placeholder="Komentar anda..."></textarea>
                                </form>
                            </div>

                            <div class="text-end mt-3">
                                <button type="button" class="btn btn-success w-sm text-truncate ms-2">
                                    Kirim <i class="bx bx-send ms-2 align-middle"></i></button>
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
