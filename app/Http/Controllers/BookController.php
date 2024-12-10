<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    // Fungsi untuk menampilkan katalog buku
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    // Fungsi untuk menampilkan detail buku
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    // Fungsi untuk menampilkan form edit buku
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    // Fungsi untuk mengupdate data buku
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $book = Book::findOrFail($id);
        $book->title = $request->title;
        $book->author = $request->author;
        $book->category = $request->category;

        // Jika ada file gambar yang diunggah, simpan gambar baru dan hapus yang lama
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($book->image && Storage::exists('public/images/books/' . $book->image)) {
                Storage::delete('public/images/books/' . $book->image);
            }

            // Simpan gambar baru
            $imagePath = $request->file('image')->store('public/images/books');
            $book->image = basename($imagePath);
        }

        $book->save();

        return redirect()->route('books.index')->with('success', 'Data buku berhasil diperbarui.');
    }
}
