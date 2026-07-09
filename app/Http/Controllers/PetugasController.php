<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function dashboard()
    {
        $total = Complaint::count();
        $pending = Complaint::where('status', 'Pending')->count();
        $diproses = Complaint::where('status', 'Diproses')->count();
        $selesai = Complaint::where('status', 'Selesai')->count();

        return view('petugas.dashboard', compact(
            'total',
            'pending',
            'diproses',
            'selesai'
        ));
    }

    public function index()
    {
        // Hanya menampilkan pengaduan yang belum selesai
        $complaints = Complaint::with(['user', 'category'])
            ->whereIn('status', ['Pending', 'Diproses'])
            ->latest()
            ->get();

        return view('petugas.index', compact('complaints'));
    }

    // Method baru untuk melihat riwayat yang sudah selesai
    public function riwayat()
    {
        $complaints = Complaint::with(['user', 'category'])
            ->where('status', 'Selesai')
            ->latest()
            ->get();

        return view('petugas.riwayat', compact('complaints'));
    }

    public function edit($id)
    {
        $complaint = Complaint::with(['user', 'category'])->findOrFail($id);

        return view('petugas.edit', compact('complaint'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
            'tanggapan' => 'nullable'
        ]);

        $complaint = Complaint::findOrFail($id);

        $complaint->update([
            'status' => $request->status,
            'tanggapan' => $request->tanggapan,
        ]);

        return redirect()
            ->route('petugas.index')
            ->with('success', 'Status berhasil diperbarui');
    }
}