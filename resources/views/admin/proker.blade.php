<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Program Kerja - {{ $hima->nama }}
            </h2>
            <a href="{{ route('adminhima.show', $hima->id) }}" 
               class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                ← Kembali ke Detail HIMA
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-100">
                <div class="p-8 text-gray-900">
                    <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">
                        Program Kerja {{ $hima->nama }}
                    </h1>
                    <div class="text-center text-gray-500 mb-8">
                        Berikut adalah daftar Program Kerja HIMA {{ $hima->nama }}
                    </div>

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6"
                            role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if($proker->count() > 0)
                        {{-- Statistik Proker --}}
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <svg class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-blue-900">Total Proker</p>
                                        <p class="text-2xl font-bold text-blue-600">{{ $proker->count() }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <svg class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-green-900">Periode Aktif</p>
                                        <p class="text-2xl font-bold text-green-600">{{ $proker->pluck('periode')->unique()->count() }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-purple-50 border border-purple-200 rounded-lg p-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <svg class="h-8 w-8 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H8a2 2 0 01-2-2V8a2 2 0 012-2h8zM5 20a2 2 0 002-2v-2a2 2 0 00-2-2H3a2 2 0 00-2 2v2a2 2 0 002 2h2z" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-purple-900">Divisi Terlibat</p>
                                        <p class="text-2xl font-bold text-purple-600">{{ $proker->whereNotNull('jabatan_id')->pluck('jabatan_id')->unique()->count() }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Tabel Data Proker --}}
                        <div class="overflow-x-auto">
                            <table class="w-full table-auto">
                                <thead class="bg-blue-600 text-white">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">
                                            No
                                        </th>
                                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">
                                            Nama Program Kerja
                                        </th>
                                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">
                                            Deskripsi
                                        </th>
                                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">
                                            Penanggung Jawab
                                        </th>
                                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">
                                            Periode
                                        </th>
                                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">
                                            Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($proker as $index => $item)
                                        <tr class="hover:bg-gray-50 transition duration-200">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $index + 1 }}
                                            </td>
                                            <td class="px-6 py-4 text-sm">
                                                <div class="font-medium text-gray-900">
                                                    {{ $item->nama_proker ?? 'Nama proker tidak tersedia' }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-600">
                                                <div class="max-w-xs">
                                                    <p class="text-gray-900 line-clamp-3">
                                                        {{ Str::limit($item->deskripsi ?? 'Deskripsi tidak tersedia', 100) }}
                                                    </p>
                                                    @if(strlen($item->deskripsi ?? '') > 100)
                                                        <button onclick="toggleDescription({{ $index }})" 
                                                                class="text-blue-600 hover:text-blue-800 text-xs mt-1">
                                                            Lihat selengkapnya
                                                        </button>
                                                    @endif
                                                </div>
                                                {{-- Modal untuk deskripsi lengkap --}}
                                                <div id="desc-modal-{{ $index }}" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
                                                    <div class="bg-white rounded-lg p-6 max-w-2xl w-full max-h-96 overflow-y-auto">
                                                        <div class="flex justify-between items-center mb-4">
                                                            <h3 class="text-lg font-semibold">{{ $item->nama_proker }}</h3>
                                                            <button onclick="closeDescription({{ $index }})" class="text-gray-500 hover:text-gray-700">
                                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                        <p class="text-gray-600">{{ $item->deskripsi ?? 'Deskripsi tidak tersedia' }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-600">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-8 w-8">
                                                        <div class="h-8 w-8 bg-blue-500 rounded-full flex items-center justify-center">
                                                            <span class="text-white font-medium text-xs">
                                                                {{ $item->jabatan ? substr($item->jabatan->nama, 0, 2) : 'N/A' }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="ml-3">
                                                        <p class="text-sm font-medium text-gray-900">
                                                            {{ $item->jabatan->nama ?? 'Jabatan tidak tersedia' }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-600">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                    {{ $item->periode ?? 'Periode tidak tersedia' }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-600">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    Aktif
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- Pagination jika diperlukan --}}
                        @if($proker instanceof \Illuminate\Pagination\LengthAwarePaginator)
                            <div class="mt-6">
                                {{ $proker->links() }}
                            </div>
                        @endif

                    @else
                        {{-- Tampilan kosong --}}
                        <div class="text-center py-12">
                            <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                            <h3 class="mt-4 text-lg font-medium text-gray-900">Belum ada Program Kerja</h3>
                            <p class="mt-2 text-sm text-gray-500">
                                Belum ada program kerja yang terdaftar untuk HIMA {{ $hima->nama }}.
                            </p>
                            <div class="mt-6">
                                <div class="text-sm text-gray-400">
                                    Program kerja akan ditampilkan di sini setelah ditambahkan.
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleDescription(index) {
            document.getElementById(`desc-modal-${index}`).classList.remove('hidden');
        }

        function closeDescription(index) {
            document.getElementById(`desc-modal-${index}`).classList.add('hidden');
        }

        // Close modal when clicking outside
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('fixed') && e.target.classList.contains('inset-0')) {
                const modals = document.querySelectorAll('[id^="desc-modal-"]');
                modals.forEach(modal => modal.classList.add('hidden'));
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const modals = document.querySelectorAll('[id^="desc-modal-"]');
                modals.forEach(modal => modal.classList.add('hidden'));
            }
        });
    </script>
</x-app-layout>