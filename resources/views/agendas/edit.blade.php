@extends('layouts.app')

@section('content')
    <h1>Edit Agenda</h1>

    <form action="{{ route('agendas.update', $agenda) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="judul">Judul</label>
        <input type="text" name="judul" id="judul" value="{{ $agenda->judul }}" required>
        
        <label for="lokasi_berangkat">Lokasi Berangkat</label>
        <input type="text" name="lokasi_berangkat" id="lokasi_berangkat" value="{{ $agenda->lokasi_berangkat }}" required>

        <label for="mulai">Mulai</label>
        <input type="date" name="mulai" id="mulai" value="{{ $agenda->mulai }}">

        <label for="selesai">Selesai</label>
        <input type="date" name="selesai" id="selesai" value="{{ $agenda->selesai }}">

        <button type="submit">Save</button>
    </form>
@endsection
