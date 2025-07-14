{{-- resources/views/dashboard.blade.php --}}
<x-app-layout>
    <div class="py-12">
        @role('pengurus')

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                {{-- Statistik Cards --}}
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">

                    {{-- HIMA Stats --}}
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Total Kegiatan</dt>
                                        <dd class="text-lg font-medium text-gray-900">{{ $totalKegiatan }}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Total Pengumuman</dt>
                                        <dd class="text-lg font-medium text-gray-900">{{ $totalPengumuman }}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Pengurus Aktif</dt>
                                        <dd class="text-lg font-medium text-gray-900">{{ $totalPengurusAktif }}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="w-8 h-8 bg-indigo-500 rounded-full flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Total Jabatan</dt>
                                        <dd class="text-lg font-medium text-gray-900">{{ $totalJabatan }}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>





                {{-- Kegiatan & Pengumuman Terbaru (Untuk semua role) --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Kegiatan Terbaru --}}
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Kegiatan Terbaru</h3>
                            <div class="space-y-4">
                                @forelse($kegiatanTerbaru as $kegiatan)
                                    <div class="flex items-start space-x-3">
                                        <div class="flex-shrink-0">
                                            <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-900">{{ $kegiatan->nama }}</p>
                                            @can('admin')
                                                <p class="text-sm text-gray-500">{{ $kegiatan->user->name }}</p>
                                            @endcan
                                            <p class="text-xs text-gray-400">{{ $kegiatan->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-sm text-gray-500">Belum ada kegiatan</p>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    {{-- Pengumuman Terbaru --}}
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Pengumuman Terbaru</h3>
                            <div class="space-y-4">
                                @forelse($pengumumanTerbaru as $pengumuman)
                                    <div class="flex items-start space-x-3">
                                        <div class="flex-shrink-0">
                                            <div
                                                class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center">
                                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-900">{{ $pengumuman->judul }}</p>
                                            @can('admin')
                                                <p class="text-sm text-gray-500">{{ $pengumuman->user->name }}</p>
                                            @endcan
                                            <p class="text-xs text-gray-400">{{ $pengumuman->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-sm text-gray-500">Belum ada pengumuman</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Daftar Pendaftar HIMA --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-8">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Daftar Pendaftar HIMA</h3>
                        @if ($pendaftarHima->count())
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                                Nama</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">NIM
                                            </th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                                Prodi</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                                Jenis Kelamin</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                                Pilihan 1</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                                Pilihan 2</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                                File</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($pendaftarHima as $pendaftar)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $pendaftar->nama }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $pendaftar->nim }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $pendaftar->prodi }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $pendaftar->jenkel }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $pendaftar->pilihan1 }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $pendaftar->pilihan2 }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600">
                                                    @if ($pendaftar->file)
                                                        <a href="{{ Storage::url($pendaftar->file) }}" target="_blank"
                                                            class="underline">Lihat File</a>
                                                    @else
                                                        Tidak ada file
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-sm text-gray-500">Belum ada pendaftar.</p>
                        @endif
                    </div>
                </div>
            </div>
            {{-- Statistik untuk selain admin --}}
        @endrole
        @role('admin')
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                {{-- Statistik Cards untuk Admin --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    {{-- Total SK --}}
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h6l4 4v10a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Total SK</dt>
                                        <dd class="text-lg font-medium text-gray-900">{{ \App\Models\Sk::count() }}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Total Laporan Kegiatan --}}
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Laporan Kegiatan</dt>
                                        <dd class="text-lg font-medium text-gray-900">
                                            {{ \App\Models\LaporanKegiatan::count() }}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Total HIMA --}}
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="w-8 h-8 bg-purple-600 rounded-full flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 7h18M3 12h18M3 17h18" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Total HIMA</dt>
                                        <dd class="text-lg font-medium text-gray-900">{{ \App\Models\Hima::count() }}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    @if ($himas->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($himas as $hima)
                                <div
                                    class="bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                                    @if ($hima->image)
                                        <div class="h-48 flex items-center justify-center overflow-hidden">
                                            <img src="{{ asset('storage/' . $hima->image) }}" alt="{{ $hima->nama }}"
                                                class="w-[150px] h-[150px] object-cover rounded-full">
                                        </div>
                                    @endif


                                    <div class="p-6">
                                        <h3 class="text-xl font-bold text-gray-900 mb-3">
                                            {{ $hima->nama }}
                                        </h3>

                                        {{-- <div class="mb-4">
                                    <h4 class="font-semibold text-gray-700 mb-2">Visi:</h4>
                                    <p class="text-gray-600 text-sm line-clamp-3">
                                        {{ Str::limit($hima->visi, 150) }}
                                    </p>
                                </div>
                                
                                <div class="mb-4">
                                    <h4 class="font-semibold text-gray-700 mb-2">Misi:</h4>
                                    <p class="text-gray-600 text-sm line-clamp-3">
                                        {{ Str::limit($hima->misi, 150) }}
                                    </p>
                                </div> --}}

                                        @if ($hima->user)
                                            <div class="mb-4 text-sm text-gray-500">
                                                <span class="font-medium">Dibuat oleh:</span> {{ $hima->user->name }}
                                            </div>
                                        @endif

                                        <div class="flex justify-between items-center">
                                            <a href="{{ route('adminhima.show', $hima) }}"
                                                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                Lihat Detail
                                            </a>

                                            <span class="text-xs text-gray-400">
                                                {{ $hima->created_at->format('d M Y') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-100">
                            <div class="p-8 text-center">
                                <div class="text-gray-400 mb-4">
                                    <svg class="mx-auto h-12 w-12" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada HIMA</h3>
                                <p class="text-gray-500">Belum ada data HIMA yang tersedia saat ini.</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endrole


    </div>
</x-app-layout>
