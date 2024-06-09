@extends('layouts.app')

@section('content')
    <h1>{{ $agenda->judul }}</h1>
    <p>Lokasi Berangkat: {{ $agenda->lokasi_berangkat }}</p>
    <p>Mulai: {{ $agenda->mulai }}</p>
    <p>Selesai: {{ $agenda->selesai }}</p>
    <a href="{{ route('agendas.edit', $agenda) }}">Edit</a>
    <form action="{{ route('agendas.destroy', $agenda) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endsection