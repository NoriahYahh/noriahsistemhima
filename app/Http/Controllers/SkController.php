<?php

namespace App\Http\Controllers;

use App\Models\Sk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     // $skList = Sk::where('user_id', Auth::id())->latest()->paginate(10);
    //     // return view('pengurus.sk.index', compact('skList'));
    //         $user = Auth::user();

    // if ($user->hasRole('admin')) {
    //     // Admin melihat semua data SK
    //     $skList = Sk::latest()->paginate(10);
    // } else {
    //     // Pengurus melihat SK miliknya ATAU yang ditujukan kepadanya
    // $skList = Sk::where('user_id', $user->id)
    //             ->orWhere('for_user_id', $user->id)
    //             ->latest()
    //             ->paginate(10);
    // }
    //     return view('pengurus.sk.index', compact('skList'));

    // }
public function index()
{
    $user = Auth::user();
    $query = Sk::with(['user', 'foruser'])->latest();

    if (!$user->hasRole('admin')) {
        $query->where(function ($q) use ($user) {
            $q->where('user_id', $user->id)
              ->orWhere('for_user_id', $user->id);
        });
    }

    // Filter berdasarkan pengunggah (user_id)
    if (request()->filled('search')) {
        $query->where('user_id', request('search'));
    }

    // Filter berdasarkan tahun
    if (request()->filled('year')) {
        $query->whereYear('created_at', request('year'));
    }

    $skList = $query->paginate(10);

    // Ambil user untuk dropdown
  $users = $user->hasRole('admin')
    ? \App\Models\User::orderBy('name')->get()
    : \App\Models\User::whereHas('roles', function ($q) {
            $q->where('name', 'admin');
        })
        ->orWhere('id', $user->id)
        ->orderBy('name')
        ->get();
    // Ambil daftar tahun dari tabel SK
    $years = \App\Models\Sk::selectRaw('YEAR(created_at) as year')
        ->distinct()
        ->orderBy('year', 'desc')
        ->pluck('year');

    return view('pengurus.sk.index', compact('skList', 'users', 'years'));
}


    public function create()
    {
         $pengurusUsers = User::role('pengurus')->get();
        $skList = Sk::latest()->get();
        return view('pengurus.sk.create', compact('skList','pengurusUsers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'keterangan' => 'required|string|max:255',
            'for_user_id' => 'nullable|exists:users,id',

        ]);

        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();

        // Store file in the storage/app/public/sk directory
        $path = $file->storeAs('public/sk', $fileName);

        Sk::create([
            'file' => $fileName,
            'keterangan' => $request->keterangan,
            'user_id' => Auth::id(),
           'for_user_id' => $request->for_user_id,
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
