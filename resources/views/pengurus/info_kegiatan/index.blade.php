<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Info Kegiatan') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-100">
                <div class="p-8 text-gray-900">
                    <h1 class="text-2xl font-bold text-center text-gray-800 mb-10">Info Kegiatan</h1>

                    <!-- Tampilkan pesan sukses -->
                    @if (session('success'))
                        <div class="mb-6 px-4 py-3 bg-green-100 text-green-800 rounded-md">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Form Tambah Kegiatan -->
                    <form action="{{ route('info_kegiatan.store') }}" method="POST" enctype="multipart/form-data" class="mb-10 space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-end">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">Nama Kegiatan :</label>
                                <input 
                                    type="text" 
                                    name="nama" 
                                    value="{{ old('nama') }}"
                                    placeholder="Masukkan nama kegiatan"
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
                                    value="{{ old('tanggal') }}"
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
                                    value="{{ old('keterangan') }}"
                                    placeholder="Masukkan keterangan kegiatan"
                                    class="shadow-sm block w-full px-4 py-2 border @error('keterangan') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200"
                                >
                                @error('keterangan')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label class="block mb-2 text-sm font-medium text-gray-700">Upload Gambar :</label>
                                <input 
                                    type="file" 
                                    name="image" 
                                    class="shadow-sm block w-full text-sm @error('image') border-red-500 @else border-gray-300 @enderror rounded-md cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200"
                                >
                                @error('image')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex md:justify-start">
                                <button 
                                    type="submit" 
                                    class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-6 rounded-md transition duration-200"
                                >
                                    Tambahkan
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Tabel List Kegiatan -->
                    <div class="overflow-x-auto">
                        <table class="w-full table-auto border-collapse">
                            <thead class="bg-gray-400 text-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Nama</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Tanggal</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Keterangan</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Gambar</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-gray-100">
                                @forelse ($info_kegiatan as $item)
                                    <tr class="border-t border-gray-200">
                                        <td class="px-6 py-4">{{ $item->nama }}</td>
                                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                        <td class="px-6 py-4">{{ $item->keterangan }}</td>
                                        <td class="px-6 py-4">
                                            <img src="{{ asset('storage/' . $item->image) }}" class="w-32 h-20 object-cover rounded-md" alt="Gambar {{ $item->nama }}">
                                        </td>
                                        <td class="px-6 py-4 flex space-x-4">
                                            <a href="{{ route('info_kegiatan.edit', $item->id) }}" class="text-blue-600 hover:text-blue-800 font-medium">Edit</a>
                                            <form action="{{ route('info_kegiatan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kegiatan ini?')" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800 font-medium">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">Belum ada data kegiatan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
