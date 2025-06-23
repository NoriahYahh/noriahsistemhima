<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jabatans = Jabatan::where('user_id', Auth::id())->paginate(10);
        return view("pengurus.jabatan.index", compact('jabatans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pengurus.jabatan.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:250',
        ]);

        // Tambahkan user_id
        $validated['user_id'] = auth()->id();

        // Simpan ke database
        Jabatan::create($validated);

        // Redirect dengan pesan sukses
        return redirect()->route('jabatan.index')->with('success', 'Jabatan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jabatan $jabatan)
    {
        // Pastikan user hanya bisa edit jabatan miliknya sendiri
        if ($jabatan->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        // Return JSON response untuk AJAX request
        if (request()->ajax()) {
            return response()->json([
                'id' => $jabatan->id,
                'nama' => $jabatan->nama
            ]);
        }
        
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        // Pastikan user hanya bisa update jabatan miliknya sendiri
        if ($jabatan->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:250',
        ]);

        // Update data
        $jabatan->update($validated);

        // Return JSON response untuk AJAX request
        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Jabatan berhasil diperbarui.',
                'data' => $jabatan
            ]);
        }

        // Redirect dengan pesan sukses
        return redirect()->route('jabatan.index')->with('success', 'Jabatan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jabatan $jabatan)
    {
        // Pastikan user hanya bisa hapus jabatan miliknya sendiri
        if ($jabatan->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $jabatan->delete();

        // Return JSON response untuk AJAX request
        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Jabatan berhasil dihapus.'
            ]);
        }

        return redirect()->route('jabatan.index')->with('success', 'Jabatan berhasil dihapus.');
    }
}