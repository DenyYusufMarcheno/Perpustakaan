<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Buku;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bukus = [
            [
                'judul' => 'Pemrograman Web dengan Laravel',
                'penulis' => 'John Doe',
                'isbn' => '978-0-12-345678-9',
                'stok' => 5,
            ],
            [
                'judul' => 'Belajar PHP untuk Pemula',
                'penulis' => 'Jane Smith',
                'isbn' => '978-0-98-765432-1',
                'stok' => 3,
            ],
            [
                'judul' => 'Database MySQL Advanced',
                'penulis' => 'Bob Johnson',
                'isbn' => '978-0-11-223344-5',
                'stok' => 7,
            ],
            [
                'judul' => 'Clean Code: A Handbook',
                'penulis' => 'Robert Martin',
                'isbn' => '978-0-13-235088-4',
                'stok' => 4,
            ],
            [
                'judul' => 'Design Patterns in PHP',
                'penulis' => 'Sarah Williams',
                'isbn' => '978-0-59-651234-7',
                'stok' => 6,
            ],
        ];

        foreach ($bukus as $buku) {
            Buku::create($buku);
        }
    }
}
