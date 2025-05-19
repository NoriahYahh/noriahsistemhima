<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Info Kegiatan') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-100">
                <div class="p-8 text-gray-900">
                    <h1 class="text-2xl font-bold text-center text-gray-800 mb-10">Edit Kegiatan</h1>

                    @if (session('success'))
                        <div class="mb-6 px-4 py-3 bg-green-100 text-green-800 rounded-md">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('info_kegiatan.update', $infoKegiatan->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-end">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">Nama Kegiatan :</label>
                                <input 
                                    type="text" 
                                    name="nama" 
                                    value="{{ old('nama', $infoKegiatan->nama) }}"
                                    class="shadow-sm block w-full px-4 py-2 border @error('nama') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200"
                                >
                                @error('nama')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">Tanggal :</label>
                                <input 
                                    type="date" 
                                    name="tanggal" 
                                    value="{{ old('tanggal', $infoKegiatan->tanggal) }}"
                                    class="shadow-sm block w-full px-4 py-2 border @error('tanggal') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200"
                                >
                                @error('tanggal')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">Keterangan :</label>
                                <input 
                                    type="text" 
                                    name="keterangan" 
                                    value="{{ old('keterangan', $infoKegiatan->keterangan) }}"
                                    class="shadow-sm block w-full px-4 py-2 border @error('keterangan') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200"
                                >
                                @error('keterangan')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label class="block mb-2 text-sm font-medium text-gray-700">Upload Gambar Baru (Opsional):</label>
                                <input 
                                    type="file" 
                                    name="image"
                                    class="shadow-sm block w-full text-sm @error('image') border-red-500 @else border-gray-300 @enderror rounded-md cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200"
                                >
                                @error('image')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror

                                @if ($infoKegiatan->image)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $infoKegiatan->image) }}" class="w-32 h-20 object-cover rounded-md" alt="Gambar {{ $infoKegiatan->nama }}">
                                    </div>
                                @endif
                            </div>

                            <div class="flex md:justify-start">
                                <button 
                                    type="submit" 
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-md transition duration-200"
                                >
                                    Simpan Perubahan
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
