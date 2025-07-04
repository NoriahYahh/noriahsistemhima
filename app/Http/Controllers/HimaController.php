<?php

namespace App\Http\Controllers;

use App\Models\Hima;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class HimaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data HIMA
        $hima = Hima::where('user_id', Auth::id())->first() ?? new Hima();
        return view('pengurus.hima.index', compact('hima'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengurus.hima.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'nama' => 'required|string|max:250',
            'visi' => 'required|string|max:1000',
            'misi' => 'required|string|max:1000',
            'alur' => 'nullable|string|max:1000',
            'pendaftaran_dibuka' => 'nullable|boolean',
        ]);


        // Simpan logo ke storage
        $imagePath = $request->file('image')->store('logo_hima', 'public');

        Hima::create([
            'image' => $imagePath,
            'nama' => $request->nama,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'alur' => $request->alur,
            'pendaftaran_dibuka' => $request->has('pendaftaran_dibuka'),
            'user_id' => auth()->id(),
        ]);


        return redirect()->route('hima.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hima $hima)
    {
        return view('pengurus.hima.edit', compact('hima'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hima $hima)
    {
        $request->validate([
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'nama' => 'required|string|max:250',
            'visi' => 'required|string|max:1000',
            'misi' => 'required|string|max:1000',
            'alur' => 'nullable|string|max:1000',
            'pendaftaran_dibuka' => 'nullable|boolean',
        ]);


        $updateData = [
            'nama' => $request->nama,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'alur' => $request->alur,
            'pendaftaran_dibuka' => $request->pendaftaran_dibuka
        ];

        // Jika ada upload logo baru
        if ($request->hasFile('image')) {
            // Hapus logo lama jika ada
            if ($hima->image && Storage::disk('public')->exists($hima->image)) {
                Storage::disk('public')->delete($hima->image);
            }

            // Simpan logo baru
            $imagePath = $request->file('image')->store('logo_hima', 'public');
            $updateData['image'] = $imagePath;
        }
        $updateData['pendaftaran_dibuka'] = $request->has('pendaftaran_dibuka');

        $hima->update($updateData);

        return redirect()->route('hima.index')->with('success', 'Data HIMA berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hima $hima)
    {
        // Hapus logo jika ada
        if ($hima->image && Storage::disk('public')->exists($hima->image)) {
            Storage::disk('public')->delete($hima->image);
        }

        $hima->delete();

        return redirect()->route('hima.index')->with('success', 'Data HIMA berhasil dihapus');
    }
}
