<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Calon Pengurus') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-100">
                <div class="p-8 text-gray-900">
                    <h1 class="text-2xl font-bold text-center text-gray-800 mb-10">Data Calon Pengurus</h1>

                    {{-- Pesan Sukses --}}
                    @if (session('success'))
                        <div class="mb-6 px-4 py-3 bg-green-100 text-green-800 rounded-md">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Tombol Tambah Data
                    <div class="mb-6">
                        <a href="{{ route('calon_pengurus.create') }}"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
                            + Tambah Calon Pengurus
                        </a>
                    </div> --}}

                    {{-- Tabel Data --}}
                    <div class="overflow-x-auto">
                        <table class="w-full table-auto border-collapse">
                            <thead class="bg-gray-400 text-gray-700">
                                <tr>
                                    <th class="px-4 py-2">No</th>
                                    <th class="px-4 py-2">Nama</th>
                                    <th class="px-4 py-2">NIM</th>
                                    <th class="px-4 py-2">Prodi</th>
                                    <th class="px-4 py-2">Jenis Kelamin</th>
                                    <th class="px-4 py-2">Pilihan 1</th>
                                    <th class="px-4 py-2">Pilihan 2</th>
                                    <th class="px-4 py-2">File</th>
                                    {{-- <th class="px-4 py-2">Aksi</th> --}}
                                </tr>
                            </thead>
                            <tbody class="bg-gray-100">
                                @forelse ($calonPengurus as $index => $item)
                                    <tr class="text-center">
                                        <td class="px-4 py-2">{{ $calonPengurus->firstItem() + $index }}</td>
                                        <td class="px-4 py-2">{{ $item->nama }}</td>
                                        <td class="px-4 py-2">{{ $item->nim }}</td>
                                        <td class="px-4 py-2">{{ $item->prodi }}</td>
                                        <td class="px-4 py-2">{{ $item->jenkel }}</td>
                                        <td class="px-4 py-2">{{ $item->pilihan1 }}</td>
                                        <td class="px-4 py-2">{{ $item->pilihan2 }}</td>
                                        <td class="px-4 py-2">
                                            @if ($item->file)
                                                <a href="{{ asset('storage/files/' . $item->file) }}" target="_blank"
                                                    class="text-blue-600 underline">Lihat</a>
                                            @else
                                                <span class="text-gray-500">-</span>
                                            @endif
                                        </td>
                                        
                                           
                                                
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center text-gray-500 py-4">Data tidak tersedia.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Paginasi --}}
                    <div class="mt-6">
                        {{ $calonPengurus->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
