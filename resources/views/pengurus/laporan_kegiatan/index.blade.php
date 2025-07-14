<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laporan Kegiatan') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-100">
                <div class="p-8 text-gray-900">
                    <h1 class="text-2xl font-bold text-center text-gray-800 mb-10">Info Kegiatan</h1>

                    {{-- Notifikasi sukses --}}
                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    
                    <div class="mb-4">
                        <a href="{{ route('laporan_kegiatan.create') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded-md">
                            Tambah
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr class="bg-gray-300 text-left">
                                    <th class="py-3 px-4 text-gray-600">Name</th>
                                    <th class="py-3 px-4 text-gray-600">Tanggal</th>
                                    <th class="py-3 px-4 text-gray-600">Keterangan</th>
                                    <th class="py-3 px-4 text-gray-600">Video</th>
                                    <th class="py-3 px-4 text-gray-600">Image</th>
                                    <th class="py-3 px-4 text-gray-600">Status</th>
                                    <th class="py-3 px-4 text-gray-600">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($laporanKegiatan as $item)
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-4 px-4">{{ $item->name }}</td>
                                        <td class="py-4 px-4">{{ $item->tanggal }}</td>
                                        <td class="py-4 px-4">{{ $item->keterangan }}</td>
                                        <td class="py-4 px-4">
                                            @if ($item->video)
                                                <a href="{{ asset('storage/' . $item->video) }}" target="_blank" class="text-blue-500 underline">Lihat Video</a>
                                            @endif
                                        </td>
                                        <td class="py-4 px-4">
                                            @if ($item->image)
                                                <img src="{{ asset('storage/' . $item->image) }}" class="w-16 h-12 object-cover" />
                                            @endif
                                        </td>
                                        <td class="py-4 px-4">{{ $item->status }}</td>
                                        <td class="py-4 px-4">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('laporan_kegiatan.edit', $item->id) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                                                <form action="{{ route('laporan_kegiatan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
