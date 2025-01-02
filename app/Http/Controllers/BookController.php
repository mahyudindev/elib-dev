<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    public function index()
    {
        $books = Book::all();
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        return view('admin.books.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'pdf' => 'nullable|file|mimes:pdf|max:10000', // Validasi PDF
    ]);

    $book = new Book();
    $book->title = $request->title;
    $book->author = $request->author;
    $book->category = $request->category;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = $book->id . '.' . $image->getClientOriginalExtension();
        $image->storeAs('books', $filename, 'public');
        $book->image = 'storage/books/' . $filename;
        $book->save();
    }

    if ($request->hasFile('pdf')) {
        $pdf = $request->file('pdf');
        $filename = $book->id . '.' . $pdf->getClientOriginalExtension();
        $pdf->storeAs('pdf', $filename, 'public');
        $book->pdf = 'storage/pdf/' . $filename;
        $book->save();
    }


    return redirect()->route('admin.books.index')->with('success', 'Buku berhasil ditambahkan.');
}

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('admin.books.edit', compact('book'));
    }


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

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = $book->id . '.' . $image->getClientOriginalExtension();
        $image->storeAs('books', $filename, 'public');
        $book->image = 'storage/books/' . $filename;
        $book->save();
    }

    if ($request->hasFile('pdf')) {
        $pdf = $request->file('pdf');
        $filename = $book->id . '.' . $pdf->getClientOriginalExtension();
        $pdf->storeAs('pdf', $filename, 'public');
        $book->pdf = 'storage/pdf/' . $filename;
        $book->save();
    }


    return redirect()->route('admin.books.index')->with('success', 'Buku berhasil diperbarui.');
}


    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        if ($book->image) {
            Storage::delete('public/images/books/' . $book->image);
        }
        $book->delete();

        return redirect()->route('admin.books.index')->with('success', 'Buku berhasil dihapus.');
    }
}

