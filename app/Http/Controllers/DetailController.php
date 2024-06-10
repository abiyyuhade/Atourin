<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function index(Agenda $agenda){
    $details = $agenda->details;
    return view('details.index', compact('details', 'agenda'));
    }

    public function create(Agenda $agenda, $kategori){
    return view('details.create', compact('agenda', 'kategori'));
    }

    public function createTransportasi(Agenda $agenda) {
        $kategori = 'transportasi';
        return view('details.createTransportasi', compact('agenda', 'kategori'));
    }
    
    public function createDestinasi(Agenda $agenda) {
        $kategori = 'destinasi';
        return view('details.createDestinasi', compact('agenda', 'kategori'));
    }

    public function userDetail(Agenda $agenda, Detail $detail){
        $userId = Auth::id();
        $details = Detail::where('user_id', $userId)
                     ->where('agenda_id', $agenda->id)
                     ->with(['user', 'agenda'])
                     ->get();
        return view('details.userDetail', compact('agenda', 'details'));
    }

    public function store(Request $request, Agenda $agenda){
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|in:transportasi,destinasi',
            'biaya' => 'nullable|integer',
            'mulai' => 'nullable|date',
            'selesai' => 'nullable|date',
        ]);

        $validatedData['user_id'] = Auth::id();
        $validatedData['agenda_id'] = $agenda->id;
    
        $detail = Detail::create($validatedData);
        return redirect()->route('details.userDetail', ['agenda' => $agenda->id, 'detail' => $detail->id])->with('success', 'Detail added successfully.');
    }

    public function show(Agenda $agenda, Detail $detail){
        return view('details.show', compact('agenda', 'detail'));
    }

    public function edit(Agenda $agenda, Detail $detail){
        return view('details.edit', compact('agenda', 'detail'));
    }

    public function editTransportasi(Agenda $agenda, Detail $detail) {
        $kategori = 'transportasi';
        return view('details.editTransportasi', compact('agenda', 'kategori', 'detail'));
    }
    
    public function editDestinasi(Agenda $agenda, Detail $detail) {
        $kategori = 'destinasi';
        return view('details.editDestinasi', compact('agenda', 'kategori', 'detail'));
    }

    public function update(Request $request, Agenda $agenda, Detail $detail){
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|in:transportasi,destinasi',
            'biaya' => 'nullable|integer',
            'mulai' => 'nullable|date',
            'selesai' => 'nullable|date',
        ]);
    
        $validatedData['user_id'] = Auth::id();
        $validatedData['agenda_id'] = $agenda->id;
    
        $detail->update($validatedData);
        return redirect()->route('details.userDetail', ['agenda' => $agenda->id, 'detail' => $detail->id])->with('success', 'Detail updated successfully.');
    }

    public function destroy(Agenda $agenda, Detail $detail){
        $detail->delete();
        return redirect()->route('details.userDetail', ['agenda' => $agenda->id])->with('success', 'Detail deleted successfully.');
    }

    public function destroyAgenda(Agenda $agenda){
        $agenda->delete();
        return redirect()->route('details.userDetails')->with('success', 'Agenda deleted successfully.');
    }
}
