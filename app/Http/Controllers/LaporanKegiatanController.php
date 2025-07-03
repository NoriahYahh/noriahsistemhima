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
        $laporanKegiatan = LaporanKegiatan::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('pengurus.laporan_kegiatan.index', compact('laporanKegiatan'));
    }

    public function create()
    {
        return view('pengurus.laporan_kegiatan.create');
    }

    public function show(LaporanKegiatan $laporanKegiatan)
    {
        // Pastikan user hanya bisa melihat laporan mereka sendiri
        if ($laporanKegiatan->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access');
        }
        
        return view('pengurus.laporan_kegiatan.show', compact('laporanKegiatan'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'keterangan' => 'required|string',
            'video' => 'nullable|file|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|max:20480', // 20MB
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', // 5MB
        ]);

        // Handle file uploads
        if ($request->hasFile('video')) {
            $validated['video'] = $request->file('video')->store('laporan_kegiatan/videos', 'public');
        }

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('laporan_kegiatan/images', 'public');
        }

        // Set user_id dan status default
        $validated['user_id'] = auth()->id();
        $validated['status'] = 'Menunggu Verifikasi'; // ✅ Perbaikan: gunakan field status

        LaporanKegiatan::create($validated);

        return redirect()->route('laporan_kegiatan.index')
            ->with('success', 'Laporan kegiatan berhasil ditambahkan dan sedang menunggu verifikasi.');
    }

    public function edit(LaporanKegiatan $laporanKegiatan)
    {
        // Pastikan user hanya bisa edit laporan mereka sendiri
        if ($laporanKegiatan->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access');
        }
        
        // Hanya bisa edit jika status belum terverifikasi
        if ($laporanKegiatan->status === 'Terverifikasi') {
            return redirect()->route('laporan_kegiatan.index')
                ->with('error', 'Laporan yang sudah terverifikasi tidak dapat diedit.');
        }
        
        return view('pengurus.laporan_kegiatan.edit', compact('laporanKegiatan'));
    }

    public function update(Request $request, LaporanKegiatan $laporanKegiatan)
    {
        // Pastikan user hanya bisa update laporan mereka sendiri
        if ($laporanKegiatan->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access');
        }
        
        // Hanya bisa update jika status belum terverifikasi
        if ($laporanKegiatan->status === 'Terverifikasi') {
            return redirect()->route('laporan_kegiatan.index')
                ->with('error', 'Laporan yang sudah terverifikasi tidak dapat diedit.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'keterangan' => 'required|string',
            'video' => 'nullable|file|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|max:20480',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        // Handle video upload
        if ($request->hasFile('video')) {
            // Hapus video lama jika ada
            if ($laporanKegiatan->video && Storage::disk('public')->exists($laporanKegiatan->video)) {
                Storage::disk('public')->delete($laporanKegiatan->video);
            }
            $validated['video'] = $request->file('video')->store('laporan_kegiatan/videos', 'public');
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($laporanKegiatan->image && Storage::disk('public')->exists($laporanKegiatan->image)) {
                Storage::disk('public')->delete($laporanKegiatan->image);
            }
            $validated['image'] = $request->file('image')->store('laporan_kegiatan/images', 'public');
        }

        // Reset status ke menunggu verifikasi setelah update
        $validated['status'] = 'Menunggu Verifikasi';

        $laporanKegiatan->update($validated);

        return redirect()->route('laporan_kegiatan.index')
            ->with('success', 'Laporan kegiatan berhasil diperbarui dan sedang menunggu verifikasi ulang.');
    }

    public function destroy(LaporanKegiatan $laporanKegiatan)
    {
        // Pastikan user hanya bisa hapus laporan mereka sendiri
        if ($laporanKegiatan->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access');
        }

        // Hapus file video jika ada
        if ($laporanKegiatan->video && Storage::disk('public')->exists($laporanKegiatan->video)) {
            Storage::disk('public')->delete($laporanKegiatan->video);
        }

        // Hapus file gambar jika ada
        if ($laporanKegiatan->image && Storage::disk('public')->exists($laporanKegiatan->image)) {
            Storage::disk('public')->delete($laporanKegiatan->image);
        }

        $laporanKegiatan->delete();

        return redirect()->route('laporan_kegiatan.index')
            ->with('success', 'Laporan kegiatan berhasil dihapus.');
    }
}