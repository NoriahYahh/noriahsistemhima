<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Alumni') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-100">
                <div class="p-8 text-gray-900">

                    <h1 class="text-2xl font-bold text-center text-gray-800 mb-10">Data Alumni</h1>
                       @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6"
                            role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif
                    <div class="mb-6">
                        <form method="GET" action="{{ route('data_alumni.index') }}" class="flex justify-end">
                            <input type="text" name="search" placeholder="Cari nama atau NRP..."
                                value="{{ request('search') }}"
                                class="px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring focus:border-blue-300">
                            <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-r-md transition duration-200">
                                Cari
                            </button>
                        </form>
                    </div>

                    <div class="mb-4 text-right">
                        {{-- <a href="{{ route('data_pengurus.create') }}"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md">
                            Tambah
                        </a> --}}
                    </div>
                    @if ($dataPengurus->isEmpty())
                        <div class="alert alert-info">Tidak ada data pengurus dengan periode lebih dari 2 tahun.</div>
                    @else
                        <table class="w-full table-auto">
                            <thead class="bg-gray-400 text-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Name
                                    </th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">NRP
                                    </th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">
                                        Jabatan</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">
                                        Periode</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Image
                                    </th>

                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataPengurus as $pengurus)
                                    <tr>
                                        <td class="px-6 py-4 text-sm">{{ $pengurus->nama }}</td>
                                        <td class="px-6 py-4 text-sm">{{ $pengurus->nrp }}</td>

                                        <td class="px-6 py-4 text-sm">{{ $pengurus->jabatan->nama }}</td>
                                        <td class="px-6 py-4 text-sm">{{ $pengurus->periode }}</td>

                                        <td class="px-6 py-4 text-sm">
                                            @if ($pengurus->is_alumni)
                                                <span class="text-green-600 font-semibold">Alumni</span>
                                            @else
                                                <span class="text-blue-600 font-semibold">Aktif</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-sm">
                                            @if ($pengurus->image)
                                                <img src="{{ Storage::url($pengurus->image) }}"
                                                    class="w-16 h-16 object-cover rounded-md"
                                                    alt="{{ $pengurus->name }}">
                                            @else
                                                <div class="w-16 h-16 bg-gray-300 rounded-md"></div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-sm">
                                            <div class="flex space-x-4">
                                                <a href="{{ route('data_pengurus.edit', $pengurus->id) }}"
                                                    type="button" onclick="editPengurus({{ $pengurus->id }})"
                                                    class="text-blue-600 hover:text-blue-800 font-medium">
                                                    Edit
                                                </a>
                                                <form action="{{ route('data_pengurus.destroy', $pengurus->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>


            </div>
        </div>
    </div>
    </div>

</x-app-layout>
