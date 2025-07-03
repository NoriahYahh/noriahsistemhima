<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengumuman = Pengumuman::where('user_id', Auth::id())->latest()->paginate(10);
        return view("pengurus.pangumumans.index", compact('pengumuman'));
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'judul' => 'required|string|max:250',
            'file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120', // 5MB max
        ]);

        // Handle file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('pengumuman', $fileName, 'public');
            $validated['file'] = $filePath;
        }

        // Tambahkan user_id
        $validated['user_id'] = auth()->id();

        // Simpan ke database
        Pengumuman::create($validated);

        // Redirect dengan pesan sukses
        return redirect()->route('pengumuman.index')->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengumuman $pengumuman)
    {
        // Pastikan user hanya bisa lihat pengumuman miliknya sendiri
        if ($pengumuman->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('pengurus.pengumuman.show', compact('pengumuman'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengumuman $pengumuman)
    {
        // Pastikan user hanya bisa edit pengumuman miliknya sendiri
        if ($pengumuman->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Return JSON response untuk AJAX request
        if (request()->ajax()) {
            return response()->json([
                'id' => $pengumuman->id,
                'judul' => $pengumuman->judul,
                'file' => $pengumuman->file,
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengumuman $pengumuman)
    {
        // Pastikan user hanya bisa update pengumuman miliknya sendiri
        if ($pengumuman->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Validasi input
        $validated = $request->validate([
            'judul' => 'required|string|max:250',
            'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:5120', // 5MB max
        ]);

        // Handle file upload
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($pengumuman->file && Storage::disk('public')->exists($pengumuman->file)) {
                Storage::disk('public')->delete($pengumuman->file);
            }

            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('pengumuman', $fileName, 'public');
            $validated['file'] = $filePath;
        }

        // Update data
        $pengumuman->update($validated);

        // Return JSON response untuk AJAX request
        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Pengumuman berhasil diperbarui.',
                'data' => $pengumuman
            ]);
        }

        // Redirect dengan pesan sukses
        return redirect()->route('pengumuman.index')->with('success', 'Pengumuman berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengumuman $pengumuman)
    {
        // Pastikan user hanya bisa hapus pengumuman miliknya sendiri
        if ($pengumuman->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Hapus file jika ada
        if ($pengumuman->file && Storage::disk('public')->exists($pengumuman->file)) {
            Storage::disk('public')->delete($pengumuman->file);
        }

        $pengumuman->delete();

        // Return JSON response untuk AJAX request
        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Pengumuman berhasil dihapus.'
            ]);
        }

        return redirect()->route('pengumuman.index')->with('success', 'Pengumuman berhasil dihapus.');
    }

    /**
     * Download file pengumuman
     */
    public function download(Pengumuman $pengumuman)
    {
        // Pastikan user hanya bisa download pengumuman miliknya sendiri
        if ($pengumuman->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        if (!$pengumuman->file || !Storage::disk('public')->exists($pengumuman->file)) {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }

        return Storage::disk('public')->download($pengumuman->file);
    }
}