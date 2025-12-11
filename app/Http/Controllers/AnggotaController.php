<?php
namespace App\Http\Controllers;
use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggotas = Anggota::latest()->paginate(10);
        return view('anggota.index', compact('anggotas'));
    }

    public function create()
    {
        return view('anggota.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|unique:anggotas|string|max:20',
            'alamat' => 'nullable|string',
            'email' => 'required|email|unique:anggotas|max:255',
        ]);

        Anggota::create($request->all());
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function edit(Anggota $anggota)
    {
        return view('anggota.edit', compact('anggota'));
    }

    public function update(Request $request, Anggota $anggota)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|unique:anggotas,npm,'.$anggota->id.'|string|max:20',
            'alamat' => 'nullable|string',
            'email' => 'required|email|unique:anggotas,email,'.$anggota->id.'|max:255',
        ]);

        $anggota->update($request->all());
        return redirect()->route('anggota.index')->with('success', 'Data Anggota berhasil diperbarui.');
    }

    public function destroy(Anggota $anggota)
    {
        $anggota->delete();
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil dihapus.');
    }
}