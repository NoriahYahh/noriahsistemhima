<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data HIMA') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <!-- Header dengan tombol tambah -->
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold">Data HIMA</h1>
                        @if(!$hima->exists)
                            <a href="{{ route('hima.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Tambah Data HIMA
                            </a>
                        @endif
                    </div>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if($hima->exists)
                        <!-- Tampilan data HIMA -->
                        <div class="bg-gray-50 rounded-lg p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                
                                <!-- Kolom Logo -->
                                <div class="space-y-4">
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Logo HIMA</h3>
                                        @if($hima->image)
                                            <div class="border border-gray-300 rounded-lg p-4 bg-white">
                                                <img src="{{ asset('storage/' . $hima->image) }}" 
                                                     alt="Logo HIMA" 
                                                     class="w-full h-48 object-contain rounded-lg shadow-md">
                                            </div>
                                        @else
                                            <div class="border border-gray-300 rounded-lg p-4 bg-white">
                                                <div class="w-full h-48 bg-gray-200 rounded-lg flex items-center justify-center">
                                                    <span class="text-gray-500">Tidak ada logo</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Kolom Informasi -->
                                <div class="space-y-4">
                                    @if($hima->nama)
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-700">Nama Organisasi</h3>
                                            <p class="text-gray-600 mt-1">{{ $hima->nama }}</p>
                                        </div>
                                    @endif

                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-700">Visi</h3>
                                        <p class="text-gray-600 mt-1">{{ $hima->visi ?? 'Belum diisi' }}</p>
                                    </div>

                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-700">Misi</h3>
                                        <p class="text-gray-600 mt-1">{{ $hima->misi ?? 'Belum diisi' }}</p>
                                    </div>

                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-700">Alur Pendaftaran</h3>
                                        <p class="text-gray-600 mt-1">{{ $hima->alur ?? 'Belum diisi' }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Tombol Aksi -->
                            <div class="mt-6 flex space-x-3">
                                <a href="{{ route('hima.edit', $hima) }}" 
                                   class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                                    Edit Data
                                </a>
                                
                                <form action="{{ route('hima.destroy', $hima) }}" method="POST" class="inline"
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                                        Hapus Data
                                    </button>
                                </form>
                            </div>

                            <!-- Info tambahan -->
                            <div class="mt-4 pt-4 border-t border-gray-200">
                                <p class="text-sm text-gray-500">
                                    Terakhir diperbarui: {{ $hima->updated_at ? $hima->updated_at->format('d M Y H:i') : 'Belum pernah diperbarui' }}
                                </p>
                            </div>
                        </div>

                    @else
                        <!-- Tampilan ketika belum ada data -->
                        <div class="text-center py-12">
                            <div class="mx-auto w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mb-4">
                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada data HIMA</h3>
                            <p class="text-gray-500 mb-4">Mulai dengan menambahkan informasi dasar tentang HIMA.</p>
                            <a href="{{ route('hima.create') }}" 
                               class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                                Tambah Data HIMA
                            </a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <style>
        /* Custom styles untuk preview image */
        .image-preview {
            transition: transform 0.3s ease;
        }
        
        .image-preview:hover {
            transform: scale(1.05);
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .grid-cols-1.md\\:grid-cols-2 {
                grid-template-columns: 1fr;
            }
        }
    </style>
</x-app-layout>