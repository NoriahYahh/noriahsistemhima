<?php

namespace App\Http\Controllers;

use App\Models\DataPengurus;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class DataPengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data pengurus
        $jabatans = Jabatan::all();
        $pengurus = DataPengurus::all()?? new DataPengurus(); 
        return view("pengurus.data_pengurus.index", compact('pengurus','jabatans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pengurus.data_pengurus.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:250',
            'nrp' => 'required|string|max:1000',
            'jabatan_id' => 'required|string|max:1000',
            'periode' => 'required|string|max:1000',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
         // Simpan logo ke storage
         $imagePath = $request->file('image')->store('foto_pengurus', 'public');

         DataPengurus::create([
             'nama' => $request->nama,
             'nrp' => $request->nrp,
             'jabatan_id' => $request->jabatan_id,
             'periode' => $request->periode,
            'image' => $imagePath,
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataPengurus $dataPengurus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataPengurus $dataPengurus)
    {
        $dataPengurus->delete();
        return redirect()->route('data_pengurus.index');
    }
}
