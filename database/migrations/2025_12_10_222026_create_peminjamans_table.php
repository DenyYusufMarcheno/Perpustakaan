<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// PASTIKAN NAMA FILE: ...create_peminjamans_table.php

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->id();
            // Foreign Key Anggota
            $table->foreignId('anggota_id')->constrained('anggotas')->onDelete('cascade');
            
            // PERBAIKAN 1: Tambahkan Foreign Key Buku
            $table->foreignId('buku_id')->constrained('bukus')->onDelete('cascade');
            
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali')->nullable();
            $table->enum('status', ['Dipinjam', 'Sudah Kembali'])->default('Dipinjam');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // PERBAIKAN 2: Gunakan nama tabel yang benar
        Schema::dropIfExists('peminjamans');
    }
};