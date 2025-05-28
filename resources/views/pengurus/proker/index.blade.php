<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Program Kerja') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-100">
                <div class="p-8 text-gray-900">
                    <div class="flex justify-between items-center mb-10">
                        <h1 class="text-2xl font-bold text-gray-800">Program Kerja</h1>
                        @role('pengurus')
                        <a href="{{ route('proker.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition duration-200">
                            Tambah Program Kerja
                        </a>
                        @endrole
                    </div>

                    @if (session('success'))
                        <div class="mb-4 px-4 py-2 bg-green-100 border border-green-200 text-green-700 rounded-md">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="w-full table-auto">
                            <thead class="bg-gray-400 text-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Nama Program</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Deskripsi</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Jabatan</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Periode</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-gray-100">
                                @forelse ($prokers as $proker)
                                <tr class="border-t border-gray-200">
                                    <td class="px-6 py-4 text-sm">{{ $proker->nama_proker }}</td>
                                    <td class="px-6 py-4 text-sm">{{ Str::limit($proker->deskripsi, 50) }}</td>
                                    <td class="px-6 py-4 text-sm">{{ $proker->jabatan->nama }}</td>
                                    <td class="px-6 py-4 text-sm">{{ $proker->periode }}</td>
                                    <td class="px-6 py-4 text-sm flex space-x-4">
                                        <a href="{{ route('proker.show', $proker) }}" class="text-blue-600 hover:text-blue-800 font-medium">Detail</a>
                                        <a href="{{ route('proker.edit', $proker) }}" class="text-green-600 hover:text-green-800 font-medium">Edit</a>
                                        <form action="{{ route('proker.destroy', $proker) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 font-medium" onclick="return confirm('Apakah Anda yakin ingin menghapus program kerja ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr class="border-t border-gray-200">
                                    <td colspan="5" class="px-6 py-4 text-sm text-center text-gray-500">Belum ada data program kerja</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-4">
                        {{ $prokers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>