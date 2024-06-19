<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Agenda;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }
        $users = User::all();
        return view('admin.user', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.user-edit', compact('user'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.index')->with('success', 'Berhasil menghapus pengguna');
    }
    public function update(Request $request, User $user): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|string|in:user,admin',
        ]);
    
        if (in_array($validatedData['role'], ['user', 'admin'])) {
            $user->role = $validatedData['role'];
        }
    
        $user->update($validatedData);
    
        return redirect()->route('admin.index')->with('success', 'Berhasil mengubah pengguna');
    }

    public function agendas() {
        $agendas = Agenda::where('private', false)
                            ->with('comments', 'likes', 'bookmarks', 'details', 'user')
                            ->get();
        return view('admin.agendas', compact('agendas'));
    }
    public function agendaDestroy(Agenda $agenda)
    {
        $agenda->delete();
        return redirect()->route('admin.agendas')->with('success', 'Berhasil menghapus agenda');
    }
    
}
