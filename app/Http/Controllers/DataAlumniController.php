<?php

namespace App\Http\Controllers;

use App\Models\DataAlumni;
use App\Models\DataPengurus;
use App\Models\Jabatan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataAlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    

//    public function index()
// {
//     $twoYearsAgo = Carbon::now()->subYears(2);

//     // Ambil semua data alumni, baik karena sudah 2 tahun atau manual ditandai alumni
//     $query = DataPengurus::query();

//     // Jika bukan admin, hanya tampilkan datanya sendiri
//     // if (!Auth::user()->is_admin) {
//     //     $query->where('user_id', Auth::id());
//     // }

//     // Ambil semua yang periodenya lebih dari 2 tahun ATAU yang sudah ditandai alumni
//     $dataPengurus = $query->where(function ($q) use ($twoYearsAgo) {
//         $q->where('periode', '<=', $twoYearsAgo)
//           ->orWhere('is_alumni', true);
//     })->get();

//     // Tandai otomatis sebagai alumni jika sudah > 2 tahun tapi belum ditandai
//     foreach ($dataPengurus as $pengurus) {
//         if (!$pengurus->is_alumni && $pengurus->periode <= $twoYearsAgo) {
//             $pengurus->update(['is_alumni' => true]);
//         }
//     }

//     return view('pengurus.data_alumni.index', compact('dataPengurus'));
// }
public function index(Request $request)
{
    $twoYearsAgo = Carbon::now()->subYears(2);
    $search = $request->input('search'); // ambil input pencarian

    $query = DataPengurus::query();

    // Jika bukan admin, hanya tampilkan data miliknya
    if (!Auth::user()->is_admin) {
        $query->where('user_id', Auth::id());
    }

    // Filter alumni
    $query->where(function ($q) use ($twoYearsAgo) {
        $q->where('periode', '<=', $twoYearsAgo)
          ->orWhere('is_alumni', true);
    });

    // Jika ada keyword pencarian
    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('nama', 'like', '%' . $search . '%')
              ->orWhere('nrp', 'like', '%' . $search . '%');
        });
    }

    $dataPengurus = $query->get();

    // Tandai otomatis alumni
    foreach ($dataPengurus as $pengurus) {
        if (!$pengurus->is_alumni && $pengurus->periode <= $twoYearsAgo) {
            $pengurus->update(['is_alumni' => true]);
        }
    }

    return view('pengurus.data_alumni.index', compact('dataPengurus', 'search'));
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengurus.data_alumni.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nrp' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'periode' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('data_alumni', 'public');
            $validated['image'] = $path;
        }

        DataAlumni::create($validated);

        return redirect()->route('data_alumni.index')->with('success', 'Data alumni berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataAlumni $alumni)
    {
        return view('data_alumni.edit', compact('alumni'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataAlumni $alumni)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nrp' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'periode' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($alumni->image) {
                Storage::disk('public')->delete($alumni->image);
            }

            $path = $request->file('image')->store('alumni', 'public');
            $validated['image'] = $path;
        }

        $alumni->update($validated);

        return redirect()->route('data_alumni.index')->with('success', 'Data alumni berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataAlumni $alumni)
    {
        // Hapus gambar jika ada
        if ($alumni->image) {
            Storage::disk('public')->delete($alumni->image);
        }

        $alumni->delete();

        return redirect()->route('data_alumni.index')->with('success', 'Data alumni berhasil dihapus');
    }
}
