<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Ambil semua data users dari database
        // $users = User::all();
        $users = User::paginate(20);
        return view('admin.user', compact('users')); // Pastikan path 'admin.user'
    }

    public function destroy($id)
    {
        // Hapus data user berdasarkan ID
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.user.index')->with('success', 'User deleted successfully');
    }



    public function edit($id)
    {
        // Ambil data user berdasarkan ID
        $user = User::findOrFail($id);
        return view('admin.edit-user', compact('user')); // Pastikan path 'admin.edit-user'
    }

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
}
