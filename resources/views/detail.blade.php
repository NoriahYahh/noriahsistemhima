<x-guest-layout>
    <!-- Hero Section -->
    <div class="max-w-7xl mx-auto px-4">
        <div class="bg-white py-8 md:py-16 text-center mb-6 md:mb-10 rounded-2xl mt-4 md:mt-8 shadow-lg">
            <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 mb-4 md:mb-8 px-4">{{ $himas->nama }}
            </h1>
            <div
                class="w-32 h-32 md:w-48 md:h-48 bg-gray-300 rounded-2xl mx-auto flex items-center justify-center overflow-hidden">
                @if ($himas->image)
                    <img src="{{ asset('storage/' . $himas->image) }}" alt="{{ $himas->nama }}"
                        class="w-full h-full object-cover rounded-2xl">
                @else
                    <span class="text-lg md:text-2xl font-bold text-gray-600">LOGO</span>
                @endif
            </div>
        </div>
    </div>

    <!-- Vision & Mission Section -->
    <div class="max-w-7xl mx-auto px-4 mb-8 md:mb-16">
        <div class="bg-white rounded-2xl p-6 md:p-10 shadow-lg">
            <div class="grid md:grid-cols-2 gap-6 md:gap-12">
                <div>
                    <h3 class="text-xl md:text-2xl font-bold text-primary mb-4 md:mb-6">VISI</h3>
                    <p class="text-sm md:text-base text-gray-700 text-justify leading-relaxed">{{ $himas->visi }}</p>
                </div>
                <div>
                    <h3 class="text-xl md:text-2xl font-bold text-primary mb-4 md:mb-6">MISI</h3>
                    <p class="text-sm md:text-base text-gray-700 text-justify leading-relaxed">{{ $himas->misi }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Activities Section -->
    <div class="max-w-7xl mx-auto px-4 mb-8 md:mb-16">
        <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 text-center mb-8 md:mb-12">KEGIATAN HIMA
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-8">
            @foreach ($info_kegiatans as $kegiatan)
                <div class="cursor-pointer"
                    onclick="showActivityDetail('{{ $kegiatan->id }}', '{{ $kegiatan->nama }}', '{{ $kegiatan->tanggal }}', '{{ $kegiatan->keterangan }}', '{{ asset('storage/' . $kegiatan->image) }}')">
                    <div
                        class="activity-card h-32 md:h-48 bg-gray-300 rounded-2xl flex items-center justify-center mb-3 md:mb-4 overflow-hidden">
                        @if ($kegiatan->image)
                            <img src="{{ asset('storage/' . $kegiatan->image) }}" alt="{{ $kegiatan->nama }}"
                                class="w-full h-full object-cover rounded-2xl">
                        @else
                            <i class="fas fa-calendar text-3xl md:text-6xl text-gray-600"></i>
                        @endif
                    </div>
                    <div class="text-center font-semibold text-gray-800 text-sm md:text-base px-2">
                        {{ $kegiatan->nama }}</div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Structure Organization Section -->
    <div x-data="{ open: false, selected: {} }" class="max-w-7xl mx-auto px-4 mb-8 md:mb-16">
        <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 text-center mb-8 md:mb-12">STRUKTUR
            ORGANISASI</h2>

        @forelse ($pengurus as $tingkatan => $pengurusList)
            <div class="mb-6 md:mb-10">
                <div class="flex flex-wrap justify-center gap-3 md:gap-6">
                    @foreach ($pengurusList as $pengurus)
                        <div class="bg-white shadow-md rounded-lg p-3 md:p-4 w-full sm:w-48 md:w-60 text-center cursor-pointer hover:shadow-lg transition"
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
                                    class="w-16 h-16 md:w-24 md:h-24 mx-auto object-cover mb-2 md:mb-3 rounded-full"
                                    alt="Foto">
                            @else
                                <div
                                    class="w-16 h-16 md:w-24 md:h-24 mx-auto bg-gray-200 flex items-center justify-center text-gray-500 mb-2 md:mb-3 rounded-full">
                                    <i class="fas fa-user text-lg md:text-2xl"></i>
                                </div>
                            @endif
                            <h4 class="text-sm md:text-md font-bold">{{ $pengurus->nama }}</h4>
                            <p class="text-xs md:text-sm text-gray-600">{{ $pengurus->jabatan->nama }}</p>
                            <p class="text-xs text-gray-500">NRP: {{ $pengurus->nrp }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @empty
            <p class="text-center text-gray-500 text-sm md:text-base">Belum ada data pengurus untuk periode saat ini.
            </p>
        @endforelse

        <!-- Modal -->
        <div x-show="open" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4"
            x-transition>
            <div class="bg-white w-full max-w-sm md:max-w-md mx-auto rounded-lg shadow-lg p-4 md:p-6 relative"
                @click.away="open = false">
                <button @click="open = false" class="absolute top-2 right-2 text-gray-500 hover:text-red-600 text-xl">
                    &times;
                </button>

                <div class="text-center">
                    <template x-if="selected.image">
                        <img :src="selected.image"
                            class="w-20 h-20 md:w-24 md:h-24 mx-auto mb-3 md:mb-4 rounded-full object-cover"
                            alt="Foto">
                    </template>
                    <template x-if="!selected.image">
                        <div
                            class="w-20 h-20 md:w-24 md:h-24 mx-auto bg-gray-200 flex items-center justify-center text-gray-500 mb-3 md:mb-4 rounded-full">
                            <i class="fas fa-user text-lg md:text-2xl"></i>
                        </div>
                    </template>

                    <h3 class="text-lg md:text-xl font-semibold text-gray-800" x-text="selected.nama"></h3>
                    <p class="text-sm text-gray-600 mt-1" x-text="selected.jabatan"></p>
                    <p class="text-xs text-gray-500 mt-1">NRP: <span x-text="selected.nrp"></span></p>
                    <p class="text-xs text-gray-500 mt-1">Periode: <span x-text="selected.periode"></span></p>
                    <p class="text-xs text-gray-500 mt-1">Deskripsi: <span x-text="selected.deskripsi"></span></p>
                </div>
            </div>
        </div>
    </div>
    {{-- alumni --}}
    <!-- Structure Organization Section -->
    <div x-data="{ open: false, selected: {} }" class="max-w-7xl mx-auto px-4 mb-8 md:mb-16">
        <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 text-center mb-8 md:mb-12">ALUMNI</h2>

        @forelse ($alumni as $periode => $alumniList)
            <div class="mb-6 md:mb-10">
                <h3 class="text-lg font-semibold text-gray-700 mb-4 text-center">Periode {{ $periode }}</h3>
                <div class="flex overflow-x-auto space-x-4 pb-4 px-1">
                    @foreach ($alumniList as $alumni)
                        <div class="bg-white shadow-md rounded-lg p-3 w-48 flex-shrink-0 text-center cursor-pointer hover:shadow-lg transition"
                            @click="open = true; selected = {{ json_encode([
                                'nama' => $alumni->nama,
                                'nrp' => $alumni->nrp,
                                'jabatan' => $alumni->jabatan->nama,
                                'deskripsi' => $alumni->jabatan->deskripsi,
                                'periode' => $alumni->periode,
                                'image' => $alumni->image ? asset('storage/' . $alumni->image) : null,
                            ]) }}">
                            @if ($alumni->image)
                                <img :src="'{{ asset('storage/') }}/' + '{{ $alumni->image }}'"
                                    class="w-20 h-20 mx-auto object-cover mb-2 rounded-full" alt="Foto">
                            @else
                                <div
                                    class="w-20 h-20 mx-auto bg-gray-200 flex items-center justify-center text-gray-500 mb-2 rounded-full">
                                    <i class="fas fa-user text-xl"></i>
                                </div>
                            @endif
                            <h4 class="text-sm font-bold">{{ $alumni->nama }}</h4>
                            <p class="text-xs text-gray-600">{{ $alumni->jabatan->nama }}</p>
                            <p class="text-xs text-gray-500">NRP: {{ $alumni->nrp }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @empty
            <p class="text-center text-gray-500 text-sm md:text-base">Belum ada data alumni untuk ditampilkan.</p>
        @endforelse

        <!-- Modal -->
        <div x-show="open" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4"
            x-transition>
            <div class="bg-white w-full max-w-sm md:max-w-md mx-auto rounded-lg shadow-lg p-4 md:p-6 relative"
                @click.away="open = false">
                <button @click="open = false" class="absolute top-2 right-2 text-gray-500 hover:text-red-600 text-xl">
                    &times;
                </button>

                <div class="text-center">
                    <template x-if="selected.image">
                        <img :src="selected.image" class="w-20 h-20 mx-auto mb-3 rounded-full object-cover"
                            alt="Foto">
                    </template>
                    <template x-if="!selected.image">
                        <div
                            class="w-20 h-20 mx-auto bg-gray-200 flex items-center justify-center text-gray-500 mb-3 rounded-full">
                            <i class="fas fa-user text-xl"></i>
                        </div>
                    </template>

                    <h3 class="text-lg font-semibold text-gray-800" x-text="selected.nama"></h3>
                    <p class="text-sm text-gray-600 mt-1" x-text="selected.jabatan"></p>
                    <p class="text-xs text-gray-500 mt-1">NRP: <span x-text="selected.nrp"></span></p>
                    <p class="text-xs text-gray-500 mt-1">Periode: <span x-text="selected.periode"></span></p>
                    <p class="text-xs text-gray-500 mt-1">Deskripsi: <span x-text="selected.deskripsi"></span></p>
                </div>
            </div>
        </div>
    </div>



    <!-- Announcement Section -->
    <div class="max-w-7xl mx-auto px-4 mb-8 md:mb-16">
        <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 text-center mb-8 md:mb-12">PENGUMUMAN</h2>
        <div class="max-w-7xl mx-auto px-4 mb-8 md:mb-16">
            <div class="flex justify-center gap-4 md:gap-6 mb-8 md:mb-12 flex-wrap">
                @forelse ($pengumumans as $pengumuman)
                    <div class="bg-white shadow-md rounded-lg p-4 md:p-6 w-full sm:w-full md:w-1/3 lg:w-1/4">
                        <h3 class="text-base md:text-lg font-semibold text-gray-800 mb-2">{{ $pengumuman->judul }}
                        </h3>
                        <p class="text-xs md:text-sm text-gray-600 mb-4">Diunggah oleh: {{ $pengumuman->user->name }}
                        </p>

                        @if ($pengumuman->file)
                            <a href="{{ asset('storage/' . $pengumuman->file) }}" target="_blank"
                                class="inline-block bg-purple-600 text-white px-3 md:px-4 py-2 rounded hover:bg-purple-700 text-xs md:text-sm">
                                <i class="fas fa-file-download mr-1 md:mr-2"></i> File
                            </a>
                        @else
                            <p class="text-xs text-red-500">File tidak tersedia</p>
                        @endif
                    </div>
                @empty
                    <p class="text-gray-500 text-center w-full text-sm md:text-base">Belum ada pengumuman.</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Registration Flow Section -->
    @if ($himas->alur)
        <div class="max-w-7xl mx-auto px-4 mb-8 md:mb-16">
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 text-center mb-8 md:mb-12">ALUR
                PENDAFTARAN</h2>
            <div class="bg-white rounded-2xl p-6 md:p-10 shadow-lg text-center">
                <div class="flex flex-col md:flex-row justify-center items-center gap-4 md:gap-8 mb-6 md:mb-10">
                    {!! $himas->alur !!}
                </div>
                @if ($himas->pendaftaran_dibuka)
                    <a href="{{ route('daftar.create', $himas->id) }}"
                        class="bg-gray-200 text-gray-800 px-6 md:px-10 py-3 md:py-4 rounded-xl font-bold text-base md:text-lg hover:bg-primary hover:text-white transition-all inline-block">
                        Pendaftaran
                    </a>
                @endif
            </div>
        </div>
    @endif

    <!-- Activity Detail Modal -->

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</x-guest-layout>
