<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\Request;

class BorrowBookController extends Controller
{
    public function store(Request $request, $book_id)
    {
        $book = Book::findOrFail($book_id);

        $existingTransaction = Transaction::where('user_id', auth()->id())
            ->where('book_id', $book_id)
            ->whereNull('returned_at')
            ->first();

        if ($existingTransaction) {
            return redirect()->back()->with('error', 'Kamu Sudah Meminjam Buku Ini. Harap Kembalikan Terlebih Dahulu.');
        }

        $transaction = new Transaction();
        $transaction->user_id = auth()->id();
        $transaction->book_id = $book->id;
        $transaction->borrow_date = now();
        $transaction->return_date = now()->addDays(3);
        $transaction->save();

        return redirect()->route('dashboard')->with('success', 'Book borrowed successfully.');
    }

public function return(Request $request, $transaction_id)
{
    $transaction = Transaction::where('id', $transaction_id)
        ->where('user_id', auth()->id())
        ->whereNull('returned_at') // Buku harus dalam status belum dikembalikan
        ->firstOrFail();

    $transaction->returned_at = now();
    $transaction->save();

    return redirect()->route('dashboard')->with('success', 'Buku berhasil dikembalikan.');
}

}


