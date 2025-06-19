<?php

namespace App\Http\Controllers;

use App\Models\InfoKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class InfoKegiatanController extends Controller
{
    public function index()
    {
        $infokegiatan  = InfoKegiatan::where('user_id', Auth::id())->paginate(10);
        return view('pengurus.info_kegiatan.index', compact('infokegiatan'));
    }

    public function create()
    {
        return view("pengurus.info_kegiatan.create");
    }

    public function store(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'keterangan' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Simpan file gambar ke storage
        $imagePath = $request->file('image')->store('info_kegiatan', 'public');

        // Tambahkan user_id ke data yang sudah divalidasi
        $validated['user_id'] = auth()->id();
        $validated['image'] = $imagePath;

        // Simpan data ke database
        InfoKegiatan::create($validated);

        // Redirect kembali dengan pesan sukses
        return redirect()->route('info_kegiatan.index')->with('success', 'Data berhasil disimpan.');
    }


    public function show(InfoKegiatan $infoKegiatan)
    {
        return view('pengurus.info_kegiatan.show', compact('infoKegiatan'));
    }

    public function edit(InfoKegiatan $infoKegiatan)
    {
        return view('pengurus.info_kegiatan.edit', compact('infoKegiatan'));
    }

    public function update(Request $request, InfoKegiatan $InfoKegiatan)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'keterangan' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($InfoKegiatan->image && Storage::disk('public')->exists($InfoKegiatan->image)) {
                Storage::disk('public')->delete($InfoKegiatan->image);
            }

            $imagePath = $request->file('image')->store('info_kegiatan', 'public');
            $InfoKegiatan->image = $imagePath;
        }

        $InfoKegiatan->update([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'image' => $InfoKegiatan->image,
        ]);

        return redirect()->route('info_kegiatan.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(InfoKegiatan $infoKegiatan)
    {
        if ($infoKegiatan->image && Storage::disk('public')->exists($infoKegiatan->image)) {
            Storage::disk('public')->delete($infoKegiatan->image);
        }

        $infoKegiatan->delete();

        return redirect()->route('info_kegiatan.index')->with('success', 'Data berhasil dihapus.');
    }
}
