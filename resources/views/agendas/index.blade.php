@extends('layouts.app')

@section('content')
    <h1>Agenda List</h1>
    <a href="{{ route('agendas.create') }}">Create New Agenda</a>
    <ul>
        @foreach($agendas as $agenda)
            <li>{{ $agenda->judul }} - <a href="{{ route('agendas.show', $agenda) }}">View</a></li>
        @endforeach
    </ul>
@endsection
