<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $bookmarkedAgendas = $user->bookmarks->map->agenda;

        return view('bookmark', compact('bookmarkedAgendas'));
    }

    public function bookmark($agendaId)
    {
        $userId = Auth::id();

        $bookmark = Bookmark::where('agenda_id', $agendaId)->where('user_id', $userId)->first();

        if ($bookmark) {
            // If the user has already bookmarked the agenda, unbookmark it
            $bookmark->delete();
        } else {
            // Otherwise, bookmark the agenda
            Bookmark::create([
                'agenda_id' => $agendaId,
                'user_id' => $userId,
            ]);
        }

        return redirect()->back();
    }
}
