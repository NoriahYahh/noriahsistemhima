<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-gray-800 leading-tight flex items-center">
                <svg class="w-8 h-8 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                    </path>
                </svg>
                {{ __('Data HIMA') }}
            </h2>
            @if (!$hima->exists)
                <a href="{{ route('hima.create') }}"
                    class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Tambah Data HIMA
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Success Alert -->
            @if (session('success'))
                <div
                    class="mb-6 bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-500 rounded-lg p-4 shadow-sm">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-green-500 mr-3" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-green-800 font-medium">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            @if ($hima->exists)
                <!-- Main Content Card -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden">

                    <!-- Header Section -->
                    <div class="bg-gradient-to-r from-blue-600 via-blue-700 to-indigo-700 px-8 py-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <h1 class="text-3xl font-bold text-white mb-2">
                                    {{ $hima->nama ?? 'Himpunan Mahasiswa' }}
                                </h1>
                                <p class="text-blue-100 opacity-90">Informasi Lengkap Organisasi</p>
                            </div>
                            <div class="hidden md:block">
                                <div
                                    class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Grid -->
                    <div class="p-8">
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                            <!-- Logo Section -->
                            <div class="lg:col-span-1">
                                <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl p-6 h-full">
                                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                                        <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        Logo Organisasi
                                    </h3>

                                    @if ($hima->image)
                                        <div class="relative group">
                                            <div
                                                class="bg-white rounded-xl p-4 shadow-md hover:shadow-lg transition-shadow duration-300">
                                                <img src="{{ asset('storage/' . $hima->image) }}" alt="Logo HIMA"
                                                    class="w-full h-64 object-contain rounded-lg group-hover:scale-105 transition-transform duration-300">
                                            </div>
                                            <div
                                                class="absolute inset-0 bg-blue-600 bg-opacity-0 group-hover:bg-opacity-10 rounded-xl transition-all duration-300">
                                            </div>
                                        </div>
                                    @else
                                        <div class="bg-white rounded-xl p-8 shadow-md">
                                            <div class="flex flex-col items-center justify-center h-64 text-gray-400">
                                                <svg class="w-16 h-16 mb-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                                <p class="text-center font-medium">Belum ada logo</p>
                                                <p class="text-sm mt-1">Upload logo organisasi</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Information Section -->
                            <div class="lg:col-span-2">
                                <div class="space-y-6">

                                    <!-- Visi Section -->
                                    <div
                                        class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-6 border-l-4 border-green-500">
                                        <h3 class="text-xl font-bold text-gray-800 mb-3 flex items-center">
                                            <svg class="w-6 h-6 mr-2 text-green-600" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                </path>
                                            </svg>
                                            Visi
                                        </h3>
                                        <div class="bg-white rounded-lg p-4 shadow-sm">
                                            <p class="text-gray-700 leading-relaxed">
                                                {{ $hima->visi ?? 'Visi organisasi belum diisi. Silakan update data untuk menambahkan visi.' }}
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Misi Section -->
                                    <div
                                        class="bg-gradient-to-r from-blue-50 to-cyan-50 rounded-xl p-6 border-l-4 border-blue-500">
                                        <h3 class="text-xl font-bold text-gray-800 mb-3 flex items-center">
                                            <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5H7a2 2 0 00-2 2v6a2 2 0 002 2h2m0 0V9a2 2 0 012-2h2a2 2 0 012 2v6a2 2 0 01-2 2H9m0 0v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2h2m0 0V5a2 2 0 012-2h2">
                                                </path>
                                            </svg>
                                            Misi
                                        </h3>
                                        <div class="bg-white rounded-lg p-4 shadow-sm">
                                            <p class="text-gray-700 leading-relaxed">
                                                {{ $hima->misi ?? 'Misi organisasi belum diisi. Silakan update data untuk menambahkan misi.' }}
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Alur Pendaftaran Section -->
                                    <div
                                        class="bg-gradient-to-r from-purple-50 to-violet-50 rounded-xl p-6 border-l-4 border-purple-500">
                                        <h3 class="text-xl font-bold text-gray-800 mb-3 flex items-center">
                                            <svg class="w-6 h-6 mr-2 text-purple-600" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7"></path>
                                            </svg>
                                            Alur Pendaftaran
                                        </h3>
                                        <div class="bg-white rounded-lg p-4 shadow-sm">
                                            <p class="text-gray-700 leading-relaxed">
                                                {{ $hima->alur ?? 'Alur pendaftaran belum diisi. Silakan update data untuk menambahkan informasi alur pendaftaran.' }}
                                            </p>
                                        </div>
                                    </div>
                                    <!-- Status Pendaftaran -->
                                    <div class="mt-6">
                                        <div
                                            class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold 
                {{ $hima->pendaftaran_dibuka ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="{{ $hima->pendaftaran_dibuka ? 'M5 13l4 4L19 7' : 'M6 18L18 6M6 6l12 12' }}" />
                                            </svg>
                                            {{ $hima->pendaftaran_dibuka ? 'Pendaftaran Sedang Dibuka' : 'Pendaftaran Ditutup' }}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="mt-8 pt-6 border-t border-gray-200">
                            <div class="flex flex-col sm:flex-row gap-4 justify-between items-start sm:items-center">
                                <div class="flex flex-col sm:flex-row gap-3">
                                    <a href="{{ route('hima.edit', $hima) }}"
                                        class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                                        Edit Data
                                    </a>

                                    <form action="{{ route('hima.destroy', $hima) }}" method="POST" class="inline"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-500 to-rose-500 hover:from-red-600 hover:to-rose-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                            Hapus Data
                                        </button>
                                    </form>
                                </div>

                                <!-- Last Updated Info -->
                                <div class="flex items-center text-sm text-gray-500 bg-gray-50 rounded-lg px-4 py-2">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>
                                        Terakhir diperbarui:
                                        {{ $hima->updated_at ? $hima->updated_at->format('d M Y, H:i') : 'Belum pernah diperbarui' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- Empty State -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                    <div class="text-center py-16 px-8">
                        <div
                            class="mx-auto w-32 h-32 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-full flex items-center justify-center mb-8">
                            <svg class="w-16 h-16 text-blue-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>

                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Belum Ada Data HIMA</h3>
                        <p class="text-gray-600 mb-8 max-w-md mx-auto leading-relaxed">
                            Mulai dengan menambahkan informasi dasar tentang Himpunan Mahasiswa.
                            Anda dapat menambahkan logo, visi, misi, dan alur pendaftaran.
                        </p>

                        <a href="{{ route('hima.create') }}"
                            class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-200 text-lg">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Tambah Data HIMA
                        </a>

                        <!-- Feature highlights -->
                        <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto">
                            <div class="text-center p-4">
                                <div
                                    class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                                <h4 class="font-semibold text-gray-800">Upload Logo</h4>
                                <p class="text-sm text-gray-600 mt-1">Tambahkan logo organisasi</p>
                            </div>

                            <div class="text-center p-4">
                                <div
                                    class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                </div>
                                <h4 class="font-semibold text-gray-800">Visi & Misi</h4>
                                <p class="text-sm text-gray-600 mt-1">Definisikan tujuan organisasi</p>
                            </div>

                            <div class="text-center p-4">
                                <div
                                    class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </div>
                                <h4 class="font-semibold text-gray-800">Alur Pendaftaran</h4>
                                <p class="text-sm text-gray-600 mt-1">Panduan untuk anggota baru</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>

    <style>
        /* Enhanced animations and transitions */
        .image-preview {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .image-preview:hover {
            transform: scale(1.02);
        }

        /* Custom scrollbar for better aesthetics */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Enhanced button hover effects */
        .btn-gradient {
            background-size: 200% 200%;
            animation: gradient-shift 3s ease infinite;
        }

        @keyframes gradient-shift {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* Responsive improvements */
        @media (max-width: 640px) {
            .grid-cols-1.lg\\:grid-cols-3 {
                grid-template-columns: 1fr;
            }

            .text-3xl {
                font-size: 1.875rem;
            }

            .px-8 {
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }

        /* Loading animation for images */
        .image-loading {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% {
                background-position: 200% 0;
            }

            100% {
                background-position: -200% 0;
            }
        }
    </style>
</x-app-layout>
