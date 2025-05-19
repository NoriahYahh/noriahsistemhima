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

                    <h1 class="mb-4">Daftar Data Pengurus (Periode > 2 Tahun)</h1>

                    @if ($dataPengurus->isEmpty())
                        <div class="alert alert-info">Tidak ada data pengurus dengan periode lebih dari 2 tahun.</div>
                    @else
                     <table class="w-full table-auto">
                             <thead class="bg-gray-400 text-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">NRP</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Jabatan</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Periode</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataPengurus as $pengurus)
                                    <tr>
                                        <td class="px-6 py-4 text-sm">{{ $pengurus->nama }}</td>
                                        <td class="px-6 py-4 text-sm">{{ $pengurus->nrp }}</td>

                                        <td class="px-6 py-4 text-sm">{{ $pengurus->jabatan->nama }}</td>
                                        <td class="px-6 py-4 text-sm">{{ \Carbon\Carbon::parse($pengurus->periode)->format('d-m-Y') }}</td>
                                        <td class="px-6 py-4 text-sm">
                                            @if ($pengurus->image)
                                                <img src="{{ Storage::url($pengurus->image) }}"
                                                    class="w-16 h-16 object-cover rounded-md" alt="{{ $pengurus->name }}">
                                            @else
                                                <div class="w-16 h-16 bg-gray-300 rounded-md"></div>
                                            @endif
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
