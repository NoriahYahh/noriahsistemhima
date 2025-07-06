<?php

namespace App\Http\Controllers;

use App\Models\DataPengurus;
use App\Models\Hima;
use App\Models\Jabatan;
use App\Models\LaporanKegiatan;
use App\Models\Proker;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;


class AdminController extends Controller
{
    public function hima()
    {
        $himas = Hima::with('user')->get();

        return view('admin.index', compact('himas'));
    }

    /**
     * Display the specified HIMA.
     */
    public function showhima(Hima $hima)
    {
        $hima->load('user');

        return view('admin.show', compact('hima'));
    }

    public function datapengurus(Hima $hima)
    {
        $jabatans = Jabatan::all();
        $hima->load('user');

        // Ambil data pengurus berdasarkan HIMA yang dipilih
        $pengurus = DataPengurus::where('user_id', $hima->id)
            ->with(['jabatan', 'user']) // Load relasi jika ada
            ->get();

        return view("admin.data_pengurus", compact('pengurus', 'jabatans', 'hima'));
    }
    //untuk menampilkan data prokernya
    public function proker(Hima $hima)
    {
        $hima->load('user');

        // Ambil data pengurus berdasarkan HIMA yang dipilih
        $proker = Proker::where('user_id', $hima->id)
            ->get();

        return view("admin.proker", compact('proker', 'hima'));
    }

    public function laporan_kegiatan(Hima $hima)
    {
        $hima->load('user');

        // Ambil data pengurus berdasarkan HIMA yang dipilih
        $laporan_kegiatan = LaporanKegiatan::where('user_id', $hima->id)
            ->get();

        return view("admin.laporan_kegiatan", compact('laporan_kegiatan', 'hima'));
    }

    public function updateStatus(Request $request, $id)
{
    try {
        // Validasi input
        $request->validate([
            'status' => 'required|in:Terverifikasi,Menunggu Verifikasi,Ditolak'
        ]);

        // Cari laporan kegiatan berdasarkan ID
        $laporanKegiatan = LaporanKegiatan::findOrFail($id);
        
        // Update status
        $laporanKegiatan->status = $request->status;
        $laporanKegiatan->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Status laporan kegiatan berhasil diperbarui!');
        
    } catch (\Exception $e) {
        // Jika terjadi error
        return redirect()->back()->with('error', 'Gagal memperbarui status laporan kegiatan: ' . $e->getMessage());
    }
}

  public function dataalumni(Hima $hima)
    {
        $jabatans = Jabatan::all();
        $hima->load('user');

        // Ambil data pengurus berdasarkan HIMA yang dipilih
         $alumni = DataPengurus::where('is_alumni', true)
        ->whereHas('jabatan', function ($query) use ($hima) {
            $query->where('user_id', $hima->user_id);
        })
        ->with(['user', 'jabatan'])
        ->orderBy('periode', 'desc') // urut dari periode terbaru
        ->get()
        ->groupBy('periode');
        return view("admin.data_alumni", compact('alumni', 'jabatans', 'hima'));
    }

    public function index()
    {

        // return view('kendaraan.index', compact('kendaraans'));
        return view('admin.akun_pengurus.index', [
            'users' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();

        // Kirim data role ke view
        return view('admin.akun_pengurus.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:' . User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Buat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Assign role ke user
        $user->assignRole($request->role);


        return redirect()->route('akun.index')->with('success', 'Kendaraan created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        // Mengembalikan view edit dengan data user yang akan diedit
        return view('admin.akun_pengurus.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|string|max:255',
            // Anda bisa tambahkan validasi lain sesuai kebutuhan di sini
        ]);

        // Periksa apakah ada input password baru
        if ($request->filled('password')) {
            // Jika ada, validasi dan update password
            $request->validate([
                'password' => 'required|string|min:8', // Sesuaikan dengan kebutuhan Anda
            ]);
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        } else {
            // Jika tidak ada input password baru, gunakan password yang lama
            $user->update([
                'password' => $user->password,
            ]);
        }

        // Update data user selain password
        $user->update($request->only('name', 'email'));
        $user->syncRoles($request->role);



        // Redirect kembali ke halaman daftar pengguna dengan pesan sukses
        return redirect()->route('akun.index')->with('success', 'User berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {

        // Hapus user
        $user->delete();

        // Redirect kembali ke halaman yang diinginkan dengan pesan sukses
        return redirect()->route('akun.index')->with('success', 'User berhasil dihapus.');
    }
}
