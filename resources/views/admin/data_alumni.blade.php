<x-app-layout>
    {{-- bagian header atas --}}
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Data Alumni - {{ $hima->nama }}
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
                        Data Alumni {{ $hima->nama }}
                    </h1>
                    <div class="text-center text-gray-500 mb-8">
                        Berikut adalah daftar alumni untuk HIMA {{ $hima->nama }} yang dikelompokkan berdasarkan periode
                    </div>

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6"
                            role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if($alumni->count() > 0)
                        {{-- Loop untuk setiap periode --}}
                        @foreach($alumni as $periode => $alumniPeriode)
                            <div class="mb-8">
                                {{-- Header Periode --}}
                                <div class="bg-blue-100 border-l-4 border-blue-500 p-4 mb-4">
                                    <h3 class="text-lg font-semibold text-blue-800">
                                        Periode {{ $periode }}
                                    </h3>
                                    <p class="text-sm text-blue-600">
                                        Total {{ $alumniPeriode->count() }} alumni
                                    </p>
                                </div>

                                {{-- Tabel Data Alumni untuk periode ini --}}
                                <div class="overflow-x-auto mb-6">
                                    <table class="w-full table-auto">
                                        <thead class="bg-gray-400 text-gray-700">
                                            <tr>
                                                <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">
                                                    Image
                                                </th>
                                                <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">
                                                    Nama
                                                </th>
                                                <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">
                                                    NRP
                                                </th>
                                                <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">
                                                    Jabatan
                                                </th>
                                                <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">
                                                    Status
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-gray-100">
                                            @foreach($alumniPeriode as $anggota)
                                                <tr class="border-t border-gray-200 hover:bg-gray-50">
                                                    <td class="px-6 py-4 text-sm">
                                                        @if($anggota->image)
                                                            <img src="{{ Storage::url($anggota->image) }}"
                                                                class="w-16 h-16 object-cover rounded-md"
                                                                alt="{{ $anggota->user->name ?? 'Alumni' }}">
                                                        @else
                                                            <div class="h-16 w-16 bg-blue-500 rounded-md flex items-center justify-center">
                                                                <span class="text-white font-medium text-lg">
                                                                    {{ substr($anggota->user->name ?? 'A', 0, 1) }}
                                                                </span>
                                                            </div>
                                                        @endif
                                                    </td>
                                                    <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                                        {{ $anggota->user->name ?? 'Nama tidak tersedia' }}
                                                    </td>
                                                    <td class="px-6 py-4 text-sm text-gray-600">
                                                        {{ $anggota->nrp ?? 'NRP tidak tersedia' }}
                                                    </td>
                                                    <td class="px-6 py-4 text-sm text-gray-600">
                                                        {{ $anggota->jabatan->nama ?? 'Jabatan tidak tersedia' }}
                                                    </td>
                                                    <td class="px-6 py-4 text-sm">
                                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                            Alumni
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endforeach

                        {{-- Summary Statistics --}}
                        <div class="mt-8 bg-gray-50 p-6 rounded-lg">
                            <h4 class="text-lg font-semibold text-gray-800 mb-4">Ringkasan Alumni</h4>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="bg-white p-4 rounded-lg shadow-sm">
                                    <div class="text-2xl font-bold text-blue-600">{{ $alumni->flatten()->count() }}</div>
                                    <div class="text-sm text-gray-600">Total Alumni</div>
                                </div>
                                <div class="bg-white p-4 rounded-lg shadow-sm">
                                    <div class="text-2xl font-bold text-green-600">{{ $alumni->count() }}</div>
                                    <div class="text-sm text-gray-600">Total Periode</div>
                                </div>
                                <div class="bg-white p-4 rounded-lg shadow-sm">
                                    <div class="text-2xl font-bold text-purple-600">{{ $alumni->first()->count() ?? 0 }}</div>
                                    <div class="text-sm text-gray-600">Alumni Periode Terbaru</div>
                                </div>
                            </div>
                        </div>

                    @else
                        {{-- Tampilan kosong --}}
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada data alumni</h3>
                            <p class="mt-1 text-sm text-gray-500">
                                Belum ada alumni yang terdaftar untuk HIMA {{ $hima->nama }}.
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Detail Alumni (Opsional) --}}
    <div id="detailModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg w-full max-w-2xl">
            <h2 class="text-xl font-bold mb-6">Detail Alumni</h2>
            
            <div id="detailContent" class="space-y-4">
                <!-- Content will be loaded here -->
            </div>

            <div class="flex justify-end mt-6">
                <button type="button" onclick="closeDetailModal()"
                    class="bg-gray-500 hover:bg-gray-600 text-white font-medium py-2 px-6 rounded-md transition duration-200">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <script>
        function viewAlumniDetail(id) {
            // Fetch data alumni detail
            fetch(`/alumni/${id}/detail`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('detailContent').innerHTML = `
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="text-center md:col-span-2">
                                ${data.image ? 
                                    `<img src="${data.image}" class="w-32 h-32 object-cover rounded-full mx-auto mb-4" alt="${data.nama}">` :
                                    `<div class="w-32 h-32 bg-blue-500 rounded-full mx-auto mb-4 flex items-center justify-center">
                                        <span class="text-white font-medium text-4xl">${data.nama.charAt(0)}</span>
                                    </div>`
                                }
                                <h3 class="text-lg font-semibold">${data.nama}</h3>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">NIM</label>
                                <p class="text-sm text-gray-900">${data.nim}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Jabatan</label>
                                <p class="text-sm text-gray-900">${data.jabatan}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Periode</label>
                                <p class="text-sm text-gray-900">${data.periode}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Alumni
                                </span>
                            </div>
                        </div>
                    `;

                    // Show modal
                    document.getElementById('detailModal').classList.remove('hidden');
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat mengambil data alumni');
                });
        }

        function closeDetailModal() {
            document.getElementById('detailModal').classList.add('hidden');
        }

        // Close modal when clicking outside
        document.getElementById('detailModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeDetailModal();
            }
        });
    </script>
</x-app-layout>