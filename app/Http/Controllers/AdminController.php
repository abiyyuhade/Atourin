<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
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
        return view('admin', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin-edit', compact('user'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.index');
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
    
        return redirect()->route('admin.index')->with('success', 'User updated successfully');
    }
    
    
}
