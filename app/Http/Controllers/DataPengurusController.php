<?php

namespace App\Http\Controllers;

use App\Models\DataPengurus;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataPengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data pengurus
        $jabatans = Jabatan::all();
    //   $hima = Hima::where('user_id', Auth::id())->first() ?? new Hima();
// 
        $pengurus = DataPengurus::where('user_id', Auth::id())->get() ?? new DataPengurus();
        return view("pengurus.data_pengurus.index", compact('pengurus', 'jabatans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          $jabatans = Jabatan::where('user_id', Auth::id())->orderBy('nama')->get();
        $pengurus = DataPengurus::all() ?? new DataPengurus();
        return view("pengurus.data_pengurus.create", compact('pengurus', 'jabatans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'nama' => 'required|string|max:250',
            'nrp' => 'required|string|max:1000',
            'jabatan_id' => 'required|string|max:1000',
            'periode' => 'required|string|max:1000',
        ]);
        // Simpan logo ke storage
        $imagePath = $request->file('image')->store('foto_pengurus', 'public');

        DataPengurus::create([
            'image' => $imagePath,
            'nama' => $request->nama,
            'nrp' => $request->nrp,
            'jabatan_id' => $request->jabatan_id,
            'periode' => $request->periode,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('data_pengurus.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(DataPengurus $dataPengurus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataPengurus $dataPengurus)
    {

        return view('pengurus.data_pengurus.edit', compact('dataPengurus'));
    
    }

    public function update(Request $request, DataPengurus $dataPengurus)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nrp' => 'required|string|max:255',
            'jabatan_id' => 'required|exists:jabatans,id',
            'periode' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $pengurus = DataPengurus::findOrFail($id);

        // Update data
        $pengurus->nama = $request->nama;
        $pengurus->nrp = $request->nrp;
        $pengurus->jabatan_id = $request->jabatan_id;
        $pengurus->periode = $request->periode;

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($pengurus->image && Storage::disk('public')->exists($pengurus->image)) {
                Storage::disk('public')->delete($pengurus->image);
            }

            // Store new image
            $imagePath = $request->file('image')->store('pengurus', 'public');
            $pengurus->image = $imagePath;
        }

        $pengurus->save();

        return redirect()->route('data_pengurus.index')->with('success', 'Data pengurus berhasil diupdate!');
    }

    /**
     * Update the specified resource in storage.
     */
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataPengurus $dataPengurus)
    {
        $dataPengurus->delete();
        return redirect()->route('data_pengurus.index');
    }
}
