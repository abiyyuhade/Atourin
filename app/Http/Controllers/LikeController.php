<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like($agendaId)
    {
        $userId = Auth::id();

        $like = Like::where('agenda_id', $agendaId)->where('user_id', $userId)->first();

        if ($like) {
            // If the user has already liked the agenda, unlike it
            $like->delete();
        } else {
            // Otherwise, like the agenda
            Like::create([
                'agenda_id' => $agendaId,
                'user_id' => $userId,
            ]);
        }

        return redirect()->back()->with('success', 'Berhasil tambah/hapus suka');
    }
}
