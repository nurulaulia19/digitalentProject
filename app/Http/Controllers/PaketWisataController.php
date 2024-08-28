<?php

namespace App\Http\Controllers;

use App\Models\PaketWisata;
use Illuminate\Http\Request;

class PaketWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $paketWisata = PaketWisata::all(); // Mengambil semua data paket wisata
        return view('paket_wisata.index', compact('paketWisata'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paket_wisata.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'jenis_paket' => 'required|string|max:255',
            'harga' => 'required|integer',
            'deskripsi' => 'required|string',
        ]);

        // Buat paket wisata baru
        PaketWisata::create([
            'jenis_paket' => $request->jenis_paket,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('paket_wisata.index')->with('success', 'Paket wisata berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $paketWisata = PaketWisata::findOrFail($id);
        return view('paket_wisata.show', compact('paketWisata'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $paketWisata = PaketWisata::findOrFail($id); // Mengambil data berdasarkan id
        return view('paket_wisata.edit', compact('paketWisata'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'jenis_paket' => 'required|string|max:255',
            'harga' => 'required|integer',
            'deskripsi' => 'required|string',
        ]);

        // Temukan paket wisata berdasarkan ID dan perbarui
        $paketWisata = PaketWisata::findOrFail($id);
        $paketWisata->update([
            'jenis_paket' => $request->jenis_paket,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('paket_wisata.index')->with('success', 'Paket wisata berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Temukan paket wisata berdasarkan ID dan hapus
        $paketWisata = PaketWisata::findOrFail($id);
        $paketWisata->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('paket_wisata.index')->with('success', 'Paket wisata berhasil dihapus!');
    }
}
