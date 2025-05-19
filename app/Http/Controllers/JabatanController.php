<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Attribute;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jabatans = Jabatan::all();
        return view("pengurus.jabatan.index",compact('jabatans'));
    }

   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pengurus.jabatan.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:250',
        ]);

        Jabatan::create( [
            'nama' => $request->nama,
        ]);

        return redirect()->route('jabatan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jabatan $jabatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jabatan $jabatan)
    {
        //
    }
}
