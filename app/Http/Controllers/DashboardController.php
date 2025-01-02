<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $borrowedBooks = Transaction::with('book')
            ->where('user_id', auth()->id())
            ->whereNull('returned_at')
            ->get();

        return view('dashboard', compact('borrowedBooks'));
    }
}

