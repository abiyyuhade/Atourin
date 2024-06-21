<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $agendas = $user->bookmarks->map->agenda;
        $agendas->each(function($agenda) {
            //DURASI
            if ($agenda->mulai && $agenda->selesai) {
                $mulai = Carbon::parse($agenda->mulai);
                $selesai = Carbon::parse($agenda->selesai);
                $agenda->durasi = $mulai->diffInDays($selesai) . ' hari';
            }
      
            //BIAYA
            $total_biaya = 0;
            foreach ($agenda->details as $detail) {
                $total_biaya += $detail->biaya;
            }
            $agenda->total_biaya = $total_biaya;
        });

        return view('bookmark', compact('agendas'));
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

        return redirect()->back()->with('success', 'Berhasil tambah/hapus markah');
    }
}
