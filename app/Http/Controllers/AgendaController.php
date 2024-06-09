<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgendaController extends Controller
{
  public function index() {
    $agendas = Agenda::with('user')->get();
    return view('agendas.index', compact('agendas'));
  }

  public function userAgendas(){
        $userId = Auth::id();
        $agendas = Agenda::where('user_id', $userId)->with('user')->get();
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
    ]);

    $request->user()->agendas()->create($validated);
    return redirect()->route('agendas.index');
  }

  public function show(Agenda $agenda){
    return view('agendas.show', compact('agenda'));
  }

  public function edit(Agenda $agenda){
    return view('agendas.edit', compact('agenda'));
  }

  public function update(Request $request, Agenda $agenda){
    $validated = $request -> validate([
      'judul' => 'required|string|max:255',
      'lokasi_berangkat' => 'required|string|max:255',
      'mulai' => 'nullable|date',
      'selesai' => 'nullable|date',
    ]);

    $agenda->update($validated);
    return redirect()->route('agendas.index');
  }

  public function destroy(Agenda $agenda){
    $agenda->delete();
    return redirect()->route('agendas.index');
  }
}
