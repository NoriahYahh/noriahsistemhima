<?php

namespace App\Http\Controllers;

use App\Models\DataPengurus;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $pengurus = DataPengurus::where('user_id', Auth::id())
            ->where('is_alumni', false)
            ->get();

        // $pengurus = DataPengurus::where('user_id', Auth::id())->get() ?? new DataPengurus();
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
            'nrp' => 'required|string|max:25',
            'jabatan_id' => 'required|string|max:1000',
            'periode' => ['required', 'regex:/^\d{4}-\d{4}$/'],
        ]);
        // Simpan logo ke storage
        $imagePath = $request->file('image')->store('foto_pengurus', 'public');

        // Simpan data pengurus
        $data = DataPengurus::create([
            'image' => $imagePath,
            'nama' => $request->nama,
            'nrp' => $request->nrp,
            'jabatan_id' => $request->jabatan_id,
            'periode' => $request->periode,
            'user_id' => auth()->id(),
            'is_alumni' => $request->has('is_alumni'),
        ]);

        // return redirect()->route('data_pengurus.index');
        // Redirect sesuai status is_alumni
        if ($data->is_alumni) {
            return redirect()->route('data_alumni.index')->with('success', 'Data alumni berhasil ditambahkan.');
        } else {
            return redirect()->route('data_pengurus.index')->with('success', 'Data pengurus berhasil ditambahkan.');
        }
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


        // Ambil semua jabatan untuk dropdown
        $jabatans = Jabatan::where('user_id', Auth::id())->orderBy('nama')->get();

        return view('pengurus.data_pengurus.edit', compact('dataPengurus', 'jabatans'));
    }

    // public function update(Request $request, DataPengurus $dataPengurus)
    // {


    //     // Validasi input
    //     $request->validate([
    //         'nama' => 'required|string|max:255',
    //         'nrp' => 'required|string|max:25',
    //         'jabatan_id' => 'required|exists:jabatans,id',
    //         'periode' => ['required', 'regex:/^\d{4}-\d{4}$/'],
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     // Siapkan data untuk update
    //     $updateData = [
    //         'nama' => $request->nama,
    //         'nrp' => $request->nrp,
    //         'jabatan_id' => $request->jabatan_id,
    //         'periode' => $request->periode,
    //         'is_alumni' => $request->has('is_alumni')

    //     ];


    //     // Handle image upload jika ada file baru
    //     if ($request->hasFile('image')) {
    //         // Hapus gambar lama jika ada
    //         if ($dataPengurus->image && Storage::disk('public')->exists($dataPengurus->image)) {
    //             Storage::disk('public')->delete($dataPengurus->image);
    //         }

    //         // Simpan gambar baru
    //         $imagePath = $request->file('image')->store('pengurus', 'public');
    //         $updateData['image'] = $imagePath;
    //     }

    //     // Update data pengurus
    //     $dataPengurus->update($updateData);

    //     return redirect()->route('data_pengurus.index')->with('success', 'Data pengurus berhasil diupdate!');
    // }
    public function update(Request $request, DataPengurus $dataPengurus)
{
    // Validasi input
    $request->validate([
        'nama' => 'required|string|max:255',
        'nrp' => 'required|string|max:25',
        'jabatan_id' => 'required|exists:jabatans,id',
        'periode' => ['required', 'regex:/^\d{4}-\d{4}$/'],
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Siapkan data update
    $updateData = [
        'nama' => $request->nama,
        'nrp' => $request->nrp,
        'jabatan_id' => $request->jabatan_id,
        'periode' => $request->periode,
        'is_alumni' => $request->has('is_alumni'),
    ];

    // Handle upload image baru jika ada
    if ($request->hasFile('image')) {
        // Hapus gambar lama
        if ($dataPengurus->image && Storage::disk('public')->exists($dataPengurus->image)) {
            Storage::disk('public')->delete($dataPengurus->image);
        }

        // Simpan gambar baru
        $imagePath = $request->file('image')->store('pengurus', 'public');
        $updateData['image'] = $imagePath;
    }

    // Update ke database
    $dataPengurus->update($updateData);

    // Redirect sesuai status alumni
    if ($updateData['is_alumni']) {
        return redirect()->route('data_alumni.index')->with('success', 'Data alumni berhasil diperbarui!');
    } else {
        return redirect()->route('data_pengurus.index')->with('success', 'Data pengurus berhasil diperbarui!');
    }
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
