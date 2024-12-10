<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('books')->truncate(); //hapus file lama

        $titles = [
            'Laskar Pelangi',
            'Bumi Manusia',
            'Anak Semua Bangsa',
            'Siti Nurbaya',
            'Pulang',
            'Pilar-pilar Kekuatan',
            'Cinta dan Tanda-tanda',
            'Kumpulan Cerita Rakyat',
            'Bintang di Surga',
            'Negeri 5 Menara'
        ];

        $authors = [
            'Andrea Hirata',
            'Pramoedya Ananta Toer',
            'Marah Roesli',
            'Tere Liye',
            'Habiburrahman El Shirazy',
            'Dewi Lestari',
            'Kahlil Gibran',
            'Ayu Utami',
            'A. Fuadi'
        ];

        $images = [
            'book1.jpg',
            'book2.jpg',
            'book3.jpg',
            'book4.jpg',
            'book5.jpg'
        ];

        for ($i = 0; $i < 10; $i++) {
            DB::table('books')->insert([
                'title' => $titles[array_rand($titles)],
                'author' => $authors[array_rand($authors)],
                'category' => 'Fiksi',
                'image' => $images[array_rand($images)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
