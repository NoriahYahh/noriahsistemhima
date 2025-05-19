<?php

namespace App\Http\Controllers;

use App\Models\DataAlumni;
use App\Models\DataPengurus;
use App\Models\Jabatan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataAlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(Request $request)
    // {
    //     $periode = $request->input('periode');
    //     $query = DataAlumni::query();
        
    //     if ($periode) {
    //         $query->where('periode', $periode);
    //     }
        
    //     $alumnis = $query->get();
    //     $jabatans = Jabatan::all();
        
    //     return view('pengurus.data_alumni.index', compact('alumnis', 'jabatans', 'periode'));
    // }

    public function index()
    {
        // Ambil tanggal 2 tahun lalu dari sekarang
        $twoYearsAgo = Carbon::now()->subYears(2);
        $jabatans = Jabatan::all();
        // Ambil data pengurus yang tanggal periodenya lebih dari 2 tahun yang lalu
        $dataPengurus = DataPengurus::where('periode', '<=', $twoYearsAgo)->get();

        return view('pengurus.data_alumni.index', compact('dataPengurus','jabatans'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengurus.data_alumni.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nrp' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'periode' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('data_alumni', 'public');
            $validated['image'] = $path;
        }

        DataAlumni::create($validated);

        return redirect()->route('data_alumni.index')->with('success', 'Data alumni berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataAlumni $alumni)
    {
        return view('data_alumni.edit', compact('alumni'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataAlumni $alumni)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nrp' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'periode' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($alumni->image) {
                Storage::disk('public')->delete($alumni->image);
            }
            
            $path = $request->file('image')->store('alumni', 'public');
            $validated['image'] = $path;
        }

        $alumni->update($validated);

        return redirect()->route('data_alumni.index')->with('success', 'Data alumni berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataAlumni $alumni)
    {
        // Hapus gambar jika ada
        if ($alumni->image) {
            Storage::disk('public')->delete($alumni->image);
        }

        $alumni->delete();

        return redirect()->route('data_alumni.index')->with('success', 'Data alumni berhasil dihapus');
    }
}