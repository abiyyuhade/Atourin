<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgendaController extends Controller
{
  public function index() {
    $agendas = Agenda::where('private', false)
                        ->with('comments', 'likes', 'bookmarks', 'details', 'user')
                        ->paginate(20);
    $this->componentAgendas($agendas);
    return view('agendas.index', compact('agendas'));
  }

  public function userAgendas(){
    $userId = Auth::id();
    $agendas = Agenda::where('user_id', $userId)
                         ->with(['user', 'details'])
                         ->get();
    $this->componentAgendas($agendas);
    return view('agendas.userIndex', compact('agendas'));
  }

  //PERHITUNGAN DURASI DAN TOTAL BIAYA
  public function componentAgendas($agendas){
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
  }

  public function create(){
    return view('agendas.create');
  }

  public function store(Request $request){
    $validated = $request -> validate([
      'judul' => 'required|string|max:255',
      'lokasi_berangkat' => 'required|string|max:255',
      'mulai' => 'nullable|date',
      'selesai' => 'nullable|date',
      'private' => 'sometimes|boolean',
    ]);
    $validated['private'] = $request->has('private');
    $request->user()->agendas()->create($validated);
    return redirect()->route('user.agendas')->with('success', 'Agenda berhasil dibuat');
  }

  public function show(Agenda $agenda){
    if ($agenda->private && $agenda->user_id !== Auth::id()) {
      abort(403);
    }
    return view('agendas.show', compact('agenda'));
  }

  public function edit(Agenda $agenda){
    if ($agenda->private && $agenda->user_id !== Auth::id()) {
      abort(403);
    }
    return view('agendas.edit', compact('agenda'));
  }

  public function update(Request $request, Agenda $agenda){
    $validated = $request -> validate([
      'judul' => 'required|string|max:255',
      'lokasi_berangkat' => 'required|string|max:255',
      'mulai' => 'nullable|date',
      'selesai' => 'nullable|date',
      'private' => 'sometimes|boolean',
    ]);
    if (isset($validated['private'])) {
      $agenda->private = $validated['private'];
    } else {
      $agenda->private = false;
    }
    $agenda->update($validated);
    return redirect()->route('user.agendas')->with('success', 'Agenda berhasil diubah');
  }

  public function destroy(Agenda $agenda){
    $agenda->delete();
    return redirect()->route('user.agendas')->with('success', 'Agenda berhasil dihapus');
  }

  public function search(Request $request)
  {
      $searchTerm = $request->input('search');
      $agendas = Agenda::where('judul', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('lokasi_berangkat', 'LIKE', "%{$searchTerm}%")
                  ->orWhereHas('user', function($q) use ($searchTerm) {
                    $q->where('name', 'LIKE', "%{$searchTerm}%");
                  })
                  ->orWhereHas('details', function($q) use ($searchTerm) {
                    $q->where('judul', 'LIKE', "%{$searchTerm}%")->where('kategori', 'destinasi');
                  })
                  ->paginate(20);
      $this->componentAgendas($agendas);
      return view('agendas.index', compact('agendas', 'searchTerm'));
  }
}
