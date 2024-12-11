<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;  // Tambahkan import untuk User model

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil jumlah buku
        $bookCount = Book::count();

        // Mengambil jumlah user
        $userCount = User::count();

        // Mengirimkan jumlah buku dan user ke view dashboard admin
        return view('admin.dashboard', compact('bookCount', 'userCount'));
    }
}

