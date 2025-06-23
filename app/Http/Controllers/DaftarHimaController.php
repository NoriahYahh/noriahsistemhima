<?php

namespace App\Http\Controllers;

use App\Models\DaftarHima;
use App\Models\Hima;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class DaftarHimaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //      $himas = Hima::all();
    // return view('daftar', compact('himas'));
    // }

    /**
     * Show the form for creating a new resource.
     */
   public function create(Hima $hima) // $hima adalah User yang bertindak sebagai Hima
    {
        // Ambil jabatan berdasarkan hima_id
        $jabatans = Jabatan::where('user_id', $hima->id)->get();
        return view('daftar', compact('hima', 'jabatans'));
    }

   public function store(Request $request, Hima $hima)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'nim' => 'required|string|max:20|unique:daftar_himas,nim',
        'prodi' => 'required|string|max:255',
        'jenkel' => 'required|in:Laki-laki,Perempuan',
        'pilihan1' => 'required|string|max:255',
        'pilihan2' => 'required|string|max:255',
        'jabatan_id' => 'nullable|exists:jabatans,id',
        'file' => 'nullable|mimes:pdf,doc,docx|max:2048'
    ]);

    $data = $request->all();
    
    // Handle file upload
    if ($request->hasFile('file')) {
        $data['file'] = $request->file('file')->store('daftar-hima', 'public');
    }

    // Set hima_id (consistent with your model)
    $data['user_id'] = $hima->id;

    DaftarHima::create($data);

    return redirect()->route('daftar.create', $hima)
                    ->with('success', 'Pendaftaran berhasil disimpan!');
}
    /**
     * Display the specified resource.
     */
    public function show(DaftarHima $daftarHima)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DaftarHima $daftarHima)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DaftarHima $daftarHima)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DaftarHima $daftarHima)
    {
        //
    }
}
