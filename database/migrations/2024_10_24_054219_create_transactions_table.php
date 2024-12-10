<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id(); // ID Transaksi
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // ID Pengguna (foreign key)
            $table->foreignId('book_id')->constrained('books')->onDelete('cascade'); // ID Buku (foreign key)
            $table->date('borrow_date'); // Tanggal Pinjam
            $table->date('return_date'); // Tanggal Kembali
            $table->timestamps(); // Created at & Updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
