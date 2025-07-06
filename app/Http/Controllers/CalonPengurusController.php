<?php

namespace App\Http\Controllers;

use App\Models\CalonPengurus;
use App\Models\DaftarHima;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CalonPengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $calonPengurus = DaftarHima::latest()->paginate(10);
        return view('pengurus.calon_pengurus.index', compact('calonPengurus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengurus.calon_pengurus.create');
    }

    public function pendaftar(DaftarHima $daftar_hima)
    {
        if (!$daftar_hima->file || !Storage::disk('public')->exists($daftar_hima->file)) {
            abort(404, 'File tidak ditemukan.');
        }
        // dd($daftar_hima->file);
        // Tampilkan file langsung di browser (biasanya PDF)
        return Storage::disk('public')->response($daftar_hima->file);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:calon_pengurus',
            'prodi' => 'required|string|max:100',
            'jenkel' => 'required|in:Laki-laki,Perempuan',
            'pilihan1' => 'required|string|max:100',
            'pilihan2' => 'required|string|max:100',
            'file' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $data = $request->except('file');

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('files', $filename, 'public');
            $data['file'] = $filename;
        }

        CalonPengurus::create($data);

        return redirect()->route('calon_pengurus.index')
            ->with('success', 'Data calon pengurus berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CalonPengurus $calonPenguru)
    {
        return view('pengurus.calon_pengurus.edit', compact('calonPenguru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CalonPengurus $calonPenguru)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:calon_pengurus,nim,' . $calonPenguru->id,
            'prodi' => 'required|string|max:100',
            'jenkel' => 'required|in:Laki-laki,Perempuan',
            'pilihan1' => 'required|string|max:100',
            'pilihan2' => 'required|string|max:100',
            'file' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $data = $request->except('file');

        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($calonPenguru->file) {
                Storage::disk('public')->delete('files/' . $calonPenguru->file);
            }

            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('files', $filename, 'public');
            $data['file'] = $filename;
        }

        $calonPenguru->update($data);

        return redirect()->route('calon_pengurus.index')
            ->with('success', 'Data calon pengurus berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pengurus = CalonPengurus::findOrFail($id);

        // Hapus file dari storage
        if ($pengurus->file && Storage::exists('public/files/' . $pengurus->file)) {
            Storage::delete('public/files/' . $pengurus->file);
        }

        $pengurus->delete(); // <--- Ini baris penting!

        return redirect()->route('calon_pengurus.index')->with('success', 'Data berhasil dihapus.');
    }
}
