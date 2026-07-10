<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WargaController extends Controller
{
    public function dashboard()
    {
        $total = Complaint::count();
        $pending = Complaint::where('status', 'Pending')->count();
        $diproses = Complaint::where('status', 'Diproses')->count();
        $selesai = Complaint::where('status', 'Selesai')->count();

        return view('warga.dashboard', compact('total', 'pending', 'diproses', 'selesai'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('warga.create', compact('categories'));
    }

    public function riwayat()
    {
        $complaints = Complaint::with('category')->latest()->get();
        return view('warga.riwayat', compact('complaints'));
    }

    public function profil()
    {
        $user = Auth::user();
        return view('warga.profil', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'isi' => 'required',
        ], [
            'judul.required' => 'Judul wajib diisi.',
            'category_id.required' => 'Kategori wajib dipilih.',
            'isi.required' => 'Isi pengaduan wajib diisi.',
        ]);

        $namaFoto = null;

        if ($request->hasFile('foto')) {
            $namaFoto = time() . '_' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('uploads'), $namaFoto);
        }

        Complaint::create([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'foto' => $namaFoto,
            'status' => 'Pending',
        ]);

        return redirect()->route('warga.riwayat')->with('success', 'Pengaduan berhasil dikirim.');
    }

    public function editProfil()
{
    $user = Auth::user();

    return view('warga.edit-profil', compact('user'));
}

    public function updateProfil(Request $request)
{
    $request->validate([
        'name'   => 'required|max:100',
        'email'  => 'required|email|unique:users,email,' . Auth::id(),
        'no_hp'  => 'required|max:20',
        'alamat' => 'required',
    ]);

    $user = User::findOrFail(Auth::id());

    $user->name = $request->name;
    $user->email = $request->email;
    $user->no_hp = $request->no_hp;
    $user->alamat = $request->alamat;

    $user->save();

    return redirect()->route('warga.profil')
        ->with('success', 'Profil berhasil diperbarui.');
}
}