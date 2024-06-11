<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgendaController extends Controller
{
  public function index() {
    $agendas = Agenda::where('private', false)
                        ->with('comments', 'likes', 'bookmarks', 'details', 'user')
                        ->get();
    return view('agendas.index', compact('agendas'));
  }

  public function userAgendas(){
    $userId = Auth::id();
    $agendas = Agenda::where('user_id', $userId)
                         ->with(['user', 'details'])
                         ->get();
    return view('agendas.userIndex', compact('agendas'));
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
    return redirect()->route('user.agendas');
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
    return redirect()->route('user.agendas');
  }

  public function destroy(Agenda $agenda){
    $agenda->delete();
    return redirect()->route('agendas.index')->with('success', 'Agenda deleted successfully.');
  }
}
