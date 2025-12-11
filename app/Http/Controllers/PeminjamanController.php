<?php
namespace App\Http\Controllers;
use App\Models\Peminjaman;
use App\Models\Anggota;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::with(['anggota', 'buku'])->latest()->paginate(10);
        return view('peminjaman.index', compact('peminjamans'));
    }

    public function create()
    {
        $anggotas = Anggota::all();
        // Hanya tampilkan buku yang stoknya > 0
        $bukus = Buku::where('stok', '>', 0)->get(); 
        
        return view('peminjaman.create', compact('anggotas', 'bukus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'anggota_id' => 'required|exists:anggotas,id',
            'buku_id' => 'required|exists:bukus,id',
            'tanggal_pinjam' => 'required|date',
        ]);

        $buku = Buku::findOrFail($request->buku_id);

        if ($buku->stok <= 0) {
             return redirect()->back()->with('error', 'Stok buku habis.')->withInput();
        }
        
        // Kurangi stok buku
        $buku->decrement('stok');

        // Buat record Peminjaman
        Peminjaman::create($request->all());

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil dicatat.');
    }
    
    // Method untuk Pengembalian (Update)
    public function update(Request $request, Peminjaman $peminjaman)
    {
        // Validasi khusus untuk pengembalian
        $request->validate([
            'status' => ['required', Rule::in(['Sudah Kembali'])],
        ]);
        
        // Pastikan status saat ini masih "Dipinjam"
        if ($peminjaman->status == 'Dipinjam') {
            $peminjaman->update([
                'status' => 'Sudah Kembali',
                'tanggal_kembali' => now(),
            ]);

            // Tambahkan stok buku
            $buku = Buku::findOrFail($peminjaman->buku_id);
            $buku->increment('stok');
            
            return redirect()->route('peminjaman.index')->with('success', 'Buku berhasil dikembalikan dan stok diperbarui.');
        }

        return redirect()->route('peminjaman.index')->with('error', 'Buku sudah dikembalikan sebelumnya.');
    }
    
    // CRUD Peminjaman tidak memerlukan destroy/delete, hanya update status. 
}