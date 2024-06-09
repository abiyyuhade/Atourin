@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Title: {{ $detail->judul }}</h5>
                <p class="card-text">Category: {{ $detail->kategori }}</p>
                <p class="card-text">Cost: {{ $detail->biaya }}</p>
                <p class="card-text">Start: {{ $detail->mulai }}</p>
                <p class="card-text">End: {{ $detail->selesai }}</p>
            </div>
        </div>
        <a href="{{ route('details.edit', ['agenda' => $detail->agenda_id, 'detail' => $detail->id]) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('details.destroy', ['agenda' => $detail->agenda_id, 'detail' => $detail->id]) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this detail?')">Delete</button>
        </form>
    </div>
@endsection
