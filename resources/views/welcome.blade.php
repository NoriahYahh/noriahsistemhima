<x-guest-layout>

    <!-- Hero Section -->
    <section id="hero" class="bg-gradient-to-br from-blue-50 to-indigo-100 py-12 md:py-20">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-8 md:gap-12 items-center">
                <div class="space-y-6 md:space-y-8">
                    <h1 class="text-2xl md:text-3xl lg:text-4xl xl:text-5xl font-bold text-gray-900 leading-tight">
                        Advance your soft skills with us.
                    </h1>

                    <p class="text-base md:text-lg lg:text-xl text-gray-600 leading-relaxed">
                        Bergabung dengan Himpunan Mahasiswa untuk mengembangkan bakat dan potensi dirimu bersama
                        komunitas yang inspiratif.
                    </p>
                </div>

                <div class="relative">
                    <div class="bg-white rounded-2xl md:rounded-3xl p-4 md:p-8 shadow-2xl">
                        <div class="flex items-center justify-center h-48 md:h-96">
                            <img src="{{ asset('img/logo-polhas.png') }}" alt="Politeknik Hasnur"
                                class="max-w-full max-h-full object-contain">
                        </div>
                    </div>

                    <!-- Floating elements -->
                    <div
                        class="absolute top-2 right-2 md:top-4 md:right-4 bg-white rounded-lg md:rounded-xl p-2 md:p-4 shadow-lg">
                        <div class="flex items-center space-x-2 md:space-x-3">
                            <div class="w-2 h-2 md:w-3 md:h-3 bg-blue-500 rounded-full"></div>
                        </div>
                        <div class="mt-1 md:mt-2">
                            <div class="w-12 h-1 md:w-20 md:h-2 bg-blue-100 rounded-full">
                            </div>
                        </div>
                    </div>

                    <div
                        class="absolute bottom-2 left-2 md:bottom-4 md:left-4 bg-white rounded-lg md:rounded-xl p-2 md:p-4 shadow-lg">
                        <div class="flex items-center space-x-1 md:space-x-2">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- HIMA Organizations -->
    <section id="hima" class="py-12 md:py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 md:mb-12">
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 mb-4 md:mb-0">HIMPUNAN MAHASISWA
                </h2>
                {{-- <a href="#" class="text-primary font-medium hover:underline text-sm md:text-base">Explore courses
                    →</a> --}}
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                @foreach ($himas as $hima)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                        <div class="relative">
                            <div
                                class="h-32 md:h-48 bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center">
                                <div
                                    class="w-12 h-12 md:w-20 md:h-20 bg-white rounded-full flex items-center justify-center overflow-hidden">
                                    @if ($hima->image)
                                        <img src="{{ asset('storage/' . $hima->image) }}" alt="Logo {{ $hima->nama }}"
                                            class="object-cover w-full h-full rounded-full">
                                    @else
                                        <span class="text-xs md:text-2xl font-bold text-primary">LOGO</span>
                                    @endif
                                </div>
                            </div>
                            <div
                                class="absolute top-2 right-2 md:top-4 md:right-4 bg-primary text-white px-2 py-1 md:px-3 md:py-1 rounded-full text-xs md:text-sm font-medium">
                                BEST CHOICE
                            </div>
                        </div>
                        <div class="p-4 md:p-6">
                            <h3 class="text-lg md:text-xl font-bold mb-2">{{ $hima->nama }}</h3>
                            <p class="text-sm md:text-base text-gray-600 mb-4">Himpunan Mahasiswa Jurusan
                                {{ $hima->user->name ?? 'Teknik' }}</p>

                            <div class="flex items-center justify-between text-xs md:text-sm text-gray-500 mb-4">
                                {{-- <div class="flex items-center space-x-1">
                                    <i class="fas fa-book"></i>
                                    <span>12 classes</span>
                                </div>
                                <div class="flex items-center space-x-1">
                                    <i class="fas fa-user"></i>
                                    <span>100 students</span>
                                </div> --}}
                            </div>
                            <a href="{{ route('home.show', $hima->id) }}"
                                class="block w-full bg-primary text-white py-2 md:py-3 rounded-full font-medium text-sm md:text-base text-center hover:bg-primary-dark transition-colors">
                                Selengkapnya
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section id="benefit" class="py-12 md:py-20 bg-gradient-to-br from-blue-50 to-indigo-100">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-8 md:gap-16 items-center">
                <div class="order-2 lg:order-1">
                    <img src="{{ asset('img/Politeknik_Hasnur.jpg') }}" alt="Politeknik Hasnur"
                        class="w-full rounded-2xl md:rounded-3xl shadow-2xl">
                </div>
                <div class="space-y-6 md:space-y-8 order-1 lg:order-2">
                    <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 leading-tight">
                        Keuntungan Mengikuti Kepengurusan HIMA di Politeknik Hasnur
                    </h2>

                    <div class="space-y-4 md:space-y-6">
                        <div class="flex items-start space-x-3 md:space-x-4">
                            <div
                                class="w-8 h-8 md:w-12 md:h-12 bg-primary rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-check text-white text-sm md:text-base"></i>
                            </div>
                            <div>
                                <h3 class="text-lg md:text-xl font-bold mb-1 md:mb-2">Relasi yang Luas</h3>
                                <p class="text-sm md:text-base text-gray-600">Membangun relasi profesional dengan
                                    mahasiswa dan alumni dari
                                    berbagai jurusan, termasuk jaringan eksternal.</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3 md:space-x-4">
                            <div
                                class="w-8 h-8 md:w-12 md:h-12 bg-primary rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-users text-white text-sm md:text-base"></i>
                            </div>
                            <div>
                                <h3 class="text-lg md:text-xl font-bold mb-1 md:mb-2">Leadership & Team Work</h3>
                                <p class="text-sm md:text-base text-gray-600">Mengembangkan kemampuan kepemimpinan dan
                                    kerja sama tim dalam
                                    berbagai kegiatan organisasi.</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3 md:space-x-4">
                            <div
                                class="w-8 h-8 md:w-12 md:h-12 bg-primary rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-certificate text-white text-sm md:text-base"></i>
                            </div>
                            <div>
                                <h3 class="text-lg md:text-xl font-bold mb-1 md:mb-2">Sertifikat Kegiatan</h3>
                                <p class="text-sm md:text-base text-gray-600">Mendapatkan sertifikat resmi sebagai bukti
                                    keikutsertaan dalam
                                    kegiatan HIMA.</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3 md:space-x-4">
                            <div
                                class="w-8 h-8 md:w-12 md:h-12 bg-primary rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-lightbulb text-white text-sm md:text-base"></i>
                            </div>
                            <div>
                                <h3 class="text-lg md:text-xl font-bold mb-1 md:mb-2">Pengembangan Softskill</h3>
                                <p class="text-sm md:text-base text-gray-600">Meningkatkan keterampilan public speaking,
                                    manajemen waktu,
                                    dan problem solving.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Activities Section -->
    <section id="kegiatan" class="py-12 md:py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 text-center mb-2 md:mb-4">KEGIATAN HIMA
            </h2>
            <p class="text-base md:text-lg lg:text-xl text-gray-600 text-center mb-8 md:mb-12">Berbagai kegiatan menarik
                untuk mengembangkan potensi mahasiswa</p>

            {{-- bagian search kegiatan --}}
            <form action="{{ route('home') }}#kegiatan" method="GET" class="max-w-md mx-auto mb-8 md:mb-12">
                <div class="relative">
                    <input type="text" name="search" placeholder="Cari kegiatan..." value="{{ request('search') }}"
                        class="w-full px-4 py-3 md:px-6 md:py-4 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm md:text-base">
                    <button type="submit"
                        class="absolute right-2 top-2 md:right-2 md:top-2 bg-primary text-white w-8 h-8 md:w-10 md:h-10 rounded-full flex items-center justify-center hover:bg-primary-dark transition-colors">
                        <i class="fas fa-search text-sm md:text-base"></i>
                    </button>
                </div>
            </form>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                @foreach ($info_kegiatans as $kegiatan)
                    <div
                        class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all hover:-translate-y-2 mb-4 md:mb-6">
                        <div
                            class="h-32 md:h-48 bg-gradient-to-br from-orange-400 to-red-500 flex items-center justify-center">
                            @if ($kegiatan->image)
                                <img src="{{ asset('storage/' . $kegiatan->image) }}"
                                    alt="Activity {{ $kegiatan->id }}" class="h-full w-full object-cover">
                            @else
                                <i class="fas fa-microphone text-white text-3xl md:text-6xl"></i>
                            @endif
                        </div>
                        <div class="p-4 md:p-6">
                            <span
                                class="bg-orange-100 text-orange-600 px-2 py-1 md:px-3 md:py-1 rounded-full text-xs md:text-sm font-medium mb-2 inline-block">
                                @foreach ($himas as $hima)
                                    @if ($kegiatan->user_id == $hima->user_id)
                                        {{ $hima->nama }}
                                    @endif
                                @endforeach


                            </span>
                            <h3 class="text-lg md:text-xl font-bold mt-2 mb-2">{{ $kegiatan->nama }}</h3>
                            <p class="text-sm md:text-base text-gray-600 mb-4">
                                {{ Str::limit($kegiatan->keterangan, 100) }}</p>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-500 text-xs md:text-sm">
                                    <i class="far fa-calendar me-1"></i> {{ $kegiatan->tanggal }}
                                </span>

                                <button type="button"
                                    class="bg-primary text-white px-3 py-1 md:px-4 md:py-2 rounded-full text-xs md:text-sm font-medium hover:bg-primary-dark transition-colors detail-btn"
                                    data-activity-id="{{ $kegiatan->id }}"
                                    data-activity-name="{{ $kegiatan->nama }}"
                                    data-activity-date="{{ $kegiatan->tanggal }}"
                                    data-activity-description="{{ $kegiatan->keterangan }}"
                                    data-activity-image="{{ asset('storage/' . $kegiatan->image) }}">
                                    Detail
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-4">
                {{ $info_kegiatans->links('') }}
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div id="activityModal"
        class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden p-4">
        <div class="modal-content bg-white rounded-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-4 md:p-6 border-b border-gray-200">
                <h2 id="modalTitle" class="text-lg md:text-2xl font-bold text-gray-900">Detail Kegiatan</h2>
                <button id="closeModal" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <i class="fas fa-times text-lg md:text-xl"></i>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-4 md:p-6">
                <!-- Activity Image -->
                <div class="mb-4 md:mb-6">
                    <img id="modalImage" src="" alt="Activity Image"
                        class="w-full h-32 md:h-50 object-contain rounded-lg">
                </div>

                <!-- Activity Info -->
                <div class="space-y-3 md:space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-4">
                        <div class="flex items-center space-x-2 md:space-x-3">
                            <i class="fas fa-calendar-alt text-primary text-sm md:text-base"></i>
                            <div>
                                <p class="text-xs md:text-sm text-gray-500">Tanggal</p>
                                <p id="modalDate" class="font-medium text-sm md:text-base">-</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 md:mt-6">
                        <h3 class="text-base md:text-lg font-bold mb-2">Deskripsi Kegiatan</h3>
                        <p id="modalDescription" class="text-sm md:text-base text-gray-600 leading-relaxed">-</p>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="flex items-center justify-end space-x-3 md:space-x-4 p-4 md:p-6 border-t border-gray-200">
                <button id="closeModalFooter"
                    class="px-4 py-2 md:px-6 md:py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm md:text-base">
                    Tutup
                </button>
            </div>
        </div>
    </div>

</x-guest-layout>
