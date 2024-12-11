<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    // Menampilkan daftar pengguna
    public function index()
    {
        // Mengambil data pengguna dengan pagination
        $users = User::paginate(25);
        return view('admin.user.user', compact('users'));
    }

    // Menghapus pengguna berdasarkan ID
    public function destroy($id)
    {
        // Hapus data user berdasarkan ID
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.user.index')->with('success', 'User deleted successfully');
    }

    // Menampilkan form untuk mengedit pengguna
    public function edit($id)
    {
        // Ambil data user berdasarkan ID
        $user = User::findOrFail($id);
        return view('admin.user.edit-user', compact('user')); // Pastikan path 'admin.edit-user'
    }

    // Mengupdate data pengguna
    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        // Update data user
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('admin.user.index')->with('success', 'User updated successfully');
    }

    // Menampilkan form untuk membuat pengguna baru
    public function create()
    {
        return view('admin.user.create-user'); // Pastikan path 'admin.user.create-user'
    }

    // Menyimpan pengguna baru
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed|min:8',
            'role' => 'required|in:user,admin', // Role hanya boleh 'user' atau 'admin'
        ]);

        // Menyimpan pengguna baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.user.index')->with('success', 'User created successfully');

    }
}
