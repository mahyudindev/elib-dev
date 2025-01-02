<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'borrow_date',
        'return_date',
    ];

    protected $casts = [
        'borrow_date' => 'datetime',
        'return_date' => 'datetime',
    ];

    // Relasi ke model Book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public static function validateUniqueBorrow($userId, $bookId)
    {
        return !Transaction::where('user_id', $userId)
            ->where('book_id', $bookId)
            ->whereNull('returned_at')
            ->exists();
    }
}

