<?php

namespace App\Http\Controllers;

use App\Models\Proker;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prokers = Proker::with('jabatan', 'user')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view("pengurus.proker.index", compact('prokers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jabatans = Jabatan::orderBy('nama')->get();
        return view("pengurus.proker.create", compact('jabatans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_proker' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'jabatan_id' => 'required|exists:jabatans,id',
            'periode' => 'required|string|max:50',
        ]);

        Proker::create([
            'nama_proker' => $request->nama_proker,
            'deskripsi' => $request->deskripsi,
            'jabatan_id' => $request->jabatan_id,
            'periode' => $request->periode,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('proker.index')
            ->with('success', 'Program kerja berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proker $proker)
    {
        $proker->load('jabatan', 'user');
        return view('pengurus.proker.show', compact('proker'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proker $proker)
    {
        $jabatans = Jabatan::orderBy('nama')->get();
        return view('pengurus.proker.edit', compact('proker', 'jabatans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proker $proker)
    {
        $request->validate([
            'nama_proker' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'jabatan_id' => 'required|exists:jabatans,id',
            'periode' => 'required|string|max:50',
        ]);

        $proker->update([
            'nama_proker' => $request->nama_proker,
            'deskripsi' => $request->deskripsi,
            'jabatan_id' => $request->jabatan_id,
            'periode' => $request->periode,
        ]);

        return redirect()->route('proker.index')
            ->with('success', 'Program kerja berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proker $proker)
    {
        $proker->delete();

        return redirect()->route('proker.index')
            ->with('success', 'Program kerja berhasil dihapus!');
    }
}