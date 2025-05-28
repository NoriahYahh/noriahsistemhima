<?php

namespace App\Http\Controllers;

use App\Models\Sk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skList = Sk::latest()->get();
        return view('pengurus.sk.index', compact('skList'));
    }

    public function create()
    {
        $skList = Sk::latest()->get();
        return view('pengurus.sk.create', compact('skList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'keterangan' => 'required|string|max:255',
        ]);

        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();

        // Store file in the storage/app/public/sk directory
        $path = $file->storeAs('public/sk', $fileName);

        Sk::create([
            'file' => $fileName,
            'keterangan' => $request->keterangan,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('sk.index')
            ->with('success', 'SK berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sk $sk)
    {
        return view('pengurus.sk.edit', compact('sk'));
    }
    /**
     * Show the specified resource.
     */
    public function show(Sk $sk)
    {
        return Storage::response('public/sk/' . $sk->file);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sk $sk)
    {
        $request->validate([
            'keterangan' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        if ($request->hasFile('file')) {
            // Delete old file
            Storage::delete('public/sk/' . $sk->file);

            // Store new file
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/sk', $fileName);

            $sk->update([
                'file' => $fileName,
                'keterangan' => $request->keterangan,
            ]);
        } else {
            // Update only keterangan
            $sk->update([
                'keterangan' => $request->keterangan,
            ]);
        }

        return redirect()->route('sk.index')
            ->with('success', 'SK berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sk $sk)
    {
        // Delete file
        Storage::delete('public/sk/' . $sk->file);

        // Delete record
        $sk->delete();

        return redirect()->route('sk.index')
            ->with('success', 'SK berhasil dihapus');
    }

    /**
     * Download file
     */
    public function download(Sk $sk)
    {
        return Storage::download('public/sk/' . $sk->file);
    }
}
