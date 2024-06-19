<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Agenda $agenda){
        $validated = $request->validate([
            'deskripsi' => 'required|string|max:1000',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['agenda_id'] = $agenda->id;

        Comment::create($validated);

        return redirect()->route('details.index', $agenda->id)->with('success', 'Berhasil menambah komentar');
    }
}
