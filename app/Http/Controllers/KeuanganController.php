<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keuangans = Keuangan::orderBy('tanggal', 'desc')->get();
        
        // Calculate running balance
        $saldo = 0;
        $keuangansWithSaldo = $keuangans->map(function ($item) use (&$saldo) {
            if ($item->jenis === 'masuk') {
                $saldo += $item->uang;
            } else {
                $saldo -= $item->uang;
            }
            $item->saldo = $saldo;
            return $item;
        });
        
        return view("pengurus.keuangan.index",compact('keuangansWithSaldo'));
  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $keuangans = Keuangan::orderBy('tanggal', 'desc')->get();
        
        // Calculate running balance
        $saldo = 0;
        $keuangansWithSaldo = $keuangans->map(function ($item) use (&$saldo) {
            if ($item->jenis === 'masuk') {
                $saldo += $item->uang;
            } else {
                $saldo -= $item->uang;
            }
            $item->saldo = $saldo;
            return $item;
        });
        
        return view("pengurus.keuangan.create",compact('keuangansWithSaldo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'nominal' => 'required|numeric|min:1',
            'tanggal' => 'required|date',
            'action' => 'required|in:masuk,keluar',
        ]);

        // Create new keuangan entry
        Keuangan::create([
            'uang' => $request->nominal,
            'tanggal' => $request->tanggal,
            'jenis' => $request->action,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('keuangan.index')
            ->with('success', 'Data keuangan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Keuangan $keuangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Keuangan $keuangan)
    {
        // Check if the user owns this record
        if (Auth::id() !== $keuangan->user_id) {
            return redirect()->route('keuangan.index')
                ->with('error', 'Anda tidak memiliki akses untuk mengedit data ini.');
        }
        
        return response()->json([
            'id' => $keuangan->id,
            'uang' => $keuangan->uang,
            'tanggal' => $keuangan->tanggal,
            'jenis' => $keuangan->jenis
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Keuangan $keuangan)
    {
        // Check if the user owns this record
        if (Auth::id() !== $keuangan->user_id) {
            return redirect()->route('keuangan.index')
                ->with('error', 'Anda tidak memiliki akses untuk mengedit data ini.');
        }
        
        // Validate the request
        $request->validate([
            'nominal' => 'required|numeric|min:1',
            'tanggal' => 'required|date',
            'jenis' => 'required|in:masuk,keluar',
        ]);

        // Update the keuangan entry
        $keuangan->update([
            'uang' => $request->nominal,
            'tanggal' => $request->tanggal,
            'jenis' => $request->jenis,
        ]);

        return redirect()->route('keuangan.index')
            ->with('success', 'Data keuangan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Keuangan $keuangan)
    {
        // Check if user owns this record
        if (Auth::id() !== $keuangan->user_id) {
            return redirect()->route('keuangan.index')
                ->with('error', 'Anda tidak memiliki akses untuk menghapus data ini.');
        }
        
        // Delete the record
        $keuangan->delete();

        return redirect()->route('keuangan.index')
            ->with('success', 'Data keuangan berhasil dihapus.');
    }
}