@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Details</h1>
        <a href="{{ route('details.create', $agenda->id) }}" class="btn btn-primary">Add Detail</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Cost</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($details as $detail)
                <tr>
                    <td>{{ $detail->judul }}</td>
                    <td>{{ $detail->kategori }}</td>
                    <td>{{ $detail->biaya }}</td>
                    <td>{{ $detail->mulai }}</td>
                    <td>{{ $detail->selesai }}</td>
                    <td>
                        <a href="{{ route('details.show', ['agenda' => $agenda->id, 'detail' => $detail->id]) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('details.edit', ['agenda' => $agenda->id, 'detail' => $detail->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('details.destroy', ['agenda' => $agenda->id, 'detail' => $detail->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this detail?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
