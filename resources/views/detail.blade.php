<x-guest-layout> <!-- Hero Section -->
    <div class="max-w-7xl mx-auto px-4">
        <div class="bg-white py-16 text-center mb-10 rounded-2xl mt-8 shadow-lg">
            <h1 class="text-4xl font-bold text-gray-900 mb-8">{{ $himas->nama }}</h1>
            <div class="w-48 h-48 bg-gray-300 rounded-2xl mx-auto flex items-center justify-center overflow-hidden">
                @if ($himas->image)
                    <img src="{{ asset('storage/' . $himas->image) }}" alt="{{ $himas->nama }}"
                        class="w-full h-full object-cover rounded-2xl">
                @else
                    <span class="text-2xl font-bold text-gray-600">LOGO</span>
                @endif
            </div>
        </div>
    </div>

    <!-- Vision & Mission Section -->
    <div class="max-w-7xl mx-auto px-4 mb-16">
        <div class="bg-white rounded-2xl p-10 shadow-lg">
            <div class="grid md:grid-cols-2 gap-12">
                <div>
                    <h3 class="text-2xl font-bold text-primary mb-6">VISI</h3>
                    <p class="text-gray-700 text-justify">{{ $himas->visi }}</p>
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-primary mb-6">MISI</h3>
                    <p class="text-gray-700 text-justify">{{ $himas->misi }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Activities Section -->
    <div class="max-w-7xl mx-auto px-4 mb-16">
        <h2 class="text-4xl font-bold text-gray-900 text-center mb-12">KEGIATAN HIMA</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($info_kegiatans as $kegiatan)
                <div class="cursor-pointer"
                    onclick="showActivityDetail('{{ $kegiatan->id }}', '{{ $kegiatan->nama }}', '{{ $kegiatan->tanggal }}', '{{ $kegiatan->keterangan }}', '{{ asset('storage/' . $kegiatan->image) }}')">
                    <div
                        class="activity-card h-48 bg-gray-300 rounded-2xl flex items-center justify-center mb-4 overflow-hidden">
                        @if ($kegiatan->image)
                            <img src="{{ asset('storage/' . $kegiatan->image) }}" alt="{{ $kegiatan->nama }}"
                                class="w-full h-full object-cover rounded-2xl">
                        @else
                            <i class="fas fa-calendar text-6xl text-gray-600"></i>
                        @endif
                    </div>
                    <div class="text-center font-semibold text-gray-800">{{ $kegiatan->nama }}</div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Structure Organization Section -->
    <div x-data="{ open: false, selected: {} }" class="max-w-7xl mx-auto px-4 mb-16">
        <h2 class="text-4xl font-bold text-gray-900 text-center mb-12">STRUKTUR ORGANISASI</h2>

        @forelse ($pengurus as $tingkatan => $pengurusList)
            <div class="mb-10">
                <div class="flex flex-wrap justify-center gap-6">
                    @foreach ($pengurusList as $pengurus)
                        <div class="bg-white shadow-md rounded-lg p-4 w-60 text-center cursor-pointer hover:shadow-lg transition"
                            @click="open = true; selected = {{ json_encode([
                                'nama' => $pengurus->nama,
                                'nrp' => $pengurus->nrp,
                                'jabatan' => $pengurus->jabatan->nama,
                                'deskripsi' => $pengurus->jabatan->deskripsi,
                                'periode' => $pengurus->periode,
                                'image' => $pengurus->image ? asset('storage/' . $pengurus->image) : null,
                            ]) }}">
                            @if ($pengurus->image)
                                <img :src="'{{ asset('storage/') }}/' + '{{ $pengurus->image }}'"
                                    class="w-24 h-24 mx-auto object-cover mb-3 rounded-full" alt="Foto">
                            @else
                                <div
                                    class="w-24 h-24 mx-auto bg-gray-200 flex items-center justify-center text-gray-500 mb-3 rounded-full">
                                    <i class="fas fa-user text-2xl"></i>
                                </div>
                            @endif
                            <h4 class="text-md font-bold">{{ $pengurus->nama }}</h4>
                            <p class="text-sm text-gray-600">{{ $pengurus->jabatan->nama }}</p>
                            <p class="text-xs text-gray-500">NRP: {{ $pengurus->nrp }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @empty
            <p class="text-center text-gray-500">Belum ada data pengurus untuk periode saat ini.</p>
        @endforelse

        <!-- Modal -->
        <div x-show="open" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center"
            x-transition>
            <div class="bg-white w-11/12 max-w-md mx-auto rounded-lg shadow-lg p-6 relative" @click.away="open = false">
                <button @click="open = false" class="absolute top-2 right-2 text-gray-500 hover:text-red-600 text-xl">
                    &times;
                </button>

                <div class="text-center">
                    <template x-if="selected.image">
                        <img :src="selected.image" class="w-24 h-24 mx-auto mb-4 rounded-full object-cover"
                            alt="Foto">
                    </template>
                    <template x-if="!selected.image">
                        <div
                            class="w-24 h-24 mx-auto bg-gray-200 flex items-center justify-center text-gray-500 mb-4 rounded-full">
                            <i class="fas fa-user text-2xl"></i>
                        </div>
                    </template>

                    <h3 class="text-xl font-semibold text-gray-800" x-text="selected.nama"></h3>
                    <p class="text-sm text-gray-600 mt-1" x-text="selected.jabatan"></p>
                    <p class="text-xs text-gray-500 mt-1">NRP: <span x-text="selected.nrp"></span></p>
                    <p class="text-xs text-gray-500 mt-1">Periode: <span x-text="selected.periode"></span></p>
                    <p class="text-xs text-gray-500 mt-1">Deskripsi: <span x-text="selected.deskripsi"></span></p>

                </div>
            </div>
        </div>
    </div>


    <!-- Announcement Section -->
    <div class="max-w-7xl mx-auto px-4 mb-16">
        <h2 class="text-4xl font-bold text-gray-900 text-center mb-12">PENGUMUMAN</h2>
        <div class="max-w-7xl mx-auto px-4 mb-16">

            <div class="flex justify-center gap-6 mb-12 flex-wrap">
                @forelse ($pengumumans as $pengumuman)
                    <div class="bg-white shadow-md rounded-lg p-6 w-full md:w-1/3 lg:w-1/4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $pengumuman->judul }}</h3>
                        <p class="text-sm text-gray-600 mb-4">Diunggah oleh: {{ $pengumuman->user->name }}</p>

                        @if ($pengumuman->file)
                            <a href="{{ asset('storage/' . $pengumuman->file) }}" target="_blank"
                                class="inline-block bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700 text-sm">
                                <i class="fas fa-file-download mr-2"></i> File
                            </a>
                            {{-- <a href="{{ asset('storage/' . $pengumuman->file) }}" target="_blank"
                                rel="noopener noreferrer"
                                class="inline-block bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700 text-sm">
                                <i class="fas fa-file-download mr-2"></i> Lihat File
                            </a> --}}
                            {{-- <a href="{{ route('pengumuman-hima.show', $pengumuman) }}" target="_blank"
                                class="inline-flex items-center px-3 py-1 bg-green-500 hover:bg-green-600 text-white text-xs font-medium rounded-md transition duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                Lihat
                            </a> --}}
                        @else
                            <p class="text-xs text-red-500">File tidak tersedia</p>
                        @endif
                    </div>
                @empty
                    <p class="text-gray-500 text-center w-full">Belum ada pengumuman.</p>
                @endforelse
            </div>
        </div>

    </div>

    <!-- Registration Flow Section -->
    <div class="max-w-7xl mx-auto px-4 mb-16">
        <h2 class="text-4xl font-bold text-gray-900 text-center mb-12">ALUR PENDAFTARAN</h2>
        <div class="bg-white rounded-2xl p-10 shadow-lg text-center">
            <div class="flex flex-col md:flex-row justify-center items-center gap-8 mb-10">
                <div class="flex-1 max-w-xs">
                    <h5 class="text-lg font-bold text-primary mb-3">Tgl 1 - 2 Pendaftaran</h5>
                    <p class="text-gray-600">Daftar online melalui website resmi</p>
                </div>
                <div class="flow-arrow text-primary text-2xl">
                    <i class="fas fa-arrow-right md:block hidden"></i>
                    <i class="fas fa-arrow-down md:hidden block"></i>
                </div>
                <div class="flex-1 max-w-xs">
                    <h5 class="text-lg font-bold text-primary mb-3">Tgl 3 - 5 Tes Tertulis</h5>
                    <p class="text-gray-600">Ujian tertulis sesuai bidang minat</p>
                </div>
                <div class="flow-arrow text-primary text-2xl">
                    <i class="fas fa-arrow-right md:block hidden"></i>
                    <i class="fas fa-arrow-down md:hidden block"></i>
                </div>
                <div class="flex-1 max-w-xs">
                    <h5 class="text-lg font-bold text-primary mb-3">Tgl 9 - 10 Wawancara</h5>
                    <p class="text-gray-600">Sesi wawancara dengan pengurus</p>
                </div>
            </div>
            <a href="{{ route('daftar.create', $himas->id) }}"
                class="bg-gray-200 text-gray-800 px-10 py-4 rounded-xl font-bold text-lg hover:bg-primary hover:text-white transition-all inline-block">
                Pendaftaran
            </a>
        </div>
    </div>

    <!-- Activity Detail Modal -->

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</x-guest-layout>
