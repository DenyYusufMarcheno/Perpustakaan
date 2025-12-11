<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    
    // Solusi untuk memaksa nama tabel plural yang benar (peminjamans)
    protected $table = 'peminjamans'; 
    
    protected $fillable = [
        'anggota_id', 
        'buku_id', 
        'tanggal_pinjam', 
        'tanggal_kembali', 
        'status'
    ];

    // Relasi Many-to-One
    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
    
    // Relasi Many-to-One
    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}