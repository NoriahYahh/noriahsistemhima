<?php

namespace App\Http\Controllers;

use App\Models\LaporanKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class LaporanKegiatanController extends Controller
{
    public function index()
    {
        $laporanKegiatan = LaporanKegiatan::where('user_id', Auth::id())->paginate(10);
        return view('pengurus.laporan_kegiatan.index', compact('laporanKegiatan'));
    }

    public function create()
    {
        return view('pengurus.laporan_kegiatan.create');
    }

    public function show(LaporanKegiatan $laporanKegiatan)
    {
        //
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
            'video' => 'nullable|file|mimetypes:video/mp4,video/avi,video/mpeg|max:20000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'status' => 'required|string',
        ]);

        if ($request->hasFile('video')) {
            $validated['video'] = $request->file('video')->store('videos', 'public');
        }

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        }
        $validated['user_id'] = auth()->id();
        LaporanKegiatan::create($validated);

        return redirect()->route('laporan_kegiatan.index')->with('success', 'Laporan berhasil ditambahkan.');
    }

    public function edit(LaporanKegiatan $laporanKegiatan)
    {
        return view('pengurus.laporan_kegiatan.edit', compact('laporanKegiatan'));
    }

    public function update(Request $request, LaporanKegiatan $laporanKegiatan)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
            'video' => 'nullable|file|mimetypes:video/mp4,video/avi,video/mpeg|max:20000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'status' => 'required|string',
        ]);

        if ($request->hasFile('video')) {
            if ($laporanKegiatan->video) {
                Storage::disk('public')->delete($laporanKegiatan->video);
            }
            $validated['video'] = $request->file('video')->store('videos', 'public');
        }

        if ($request->hasFile('image')) {
            if ($laporanKegiatan->image) {
                Storage::disk('public')->delete($laporanKegiatan->image);
            }
            $validated['image'] = $request->file('image')->store('images', 'public');
        }
        $validated['user_id'] = auth()->id();

        $laporanKegiatan->update($validated);

        return redirect()->route('laporan_kegiatan.index')->with('success', 'Laporan berhasil diperbarui.');
    }

    public function destroy(LaporanKegiatan $laporanKegiatan)
    {
        if ($laporanKegiatan->video) {
            Storage::disk('public')->delete($laporanKegiatan->video);
        }

        if ($laporanKegiatan->image) {
            Storage::disk('public')->delete($laporanKegiatan->image);
        }

        $laporanKegiatan->delete();

        return redirect()->route('laporan_kegiatan.index')->with('success', 'Laporan berhasil dihapus.');
    }
}
