@extends('layouts.app')

@section('content')
    <h1>Create New Agenda</h1>

    <form action="{{ route('agendas.store') }}" method="POST">
        @csrf
        <label for="judul">Judul</label>
        <input type="text" name="judul" id="judul" required>

        <label for="lokasi_berangkat">Lokasi Berangkat</label>
        <input type="text" name="lokasi_berangkat" id="lokasi_berangkat" required>

        <label for="mulai">Mulai</label>
        <input type="date" name="mulai" id="mulai">

        <label for="selesai">Selesai</label>
        <input type="date" name="selesai" id="selesai">

        <button type="submit">Save</button>
    </form>
@endsection