<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Menampilkan semua data user
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }
    


    // Menampilkan form untuk membuat user baru
    public function create()
    {
        return view('users.create');
    }

    // Menyimpan data User ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_user' => 'required|integer',
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'nullable|string|min:8',
            'level' => 'required|string|max:255',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        
        User::create($validated);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit user
    public function edit($id = null)
    {
        if (!$id) {
            abort(404, 'User not found');
        }
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }
    
    
    

    // Mengupdate data user
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_user' => 'required|integer',
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'nullable|string|min:8',
            'level' => 'required|string|max:255',
        ]);

        $user = User::findOrFail($id);

        if (!empty($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
    }

    // Menghapus user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }
    
}
