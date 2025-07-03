<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Laporan Kegiatan - {{ $hima->nama }}
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
                        Laporan Kegiatan {{ $hima->nama }}
                    </h1>
                    <div class="text-center text-gray-500 mb-8">
                        Berikut adalah daftar Laporan Kegiatan HIMA {{ $hima->nama }}
                    </div>
                    {{-- <a href="path/to/your-file.pdf" download
                        class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                        Download
                    </a> --}}
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6"
                            role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6"
                            role="alert">
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif

                    @if ($laporan_kegiatan->count() > 0)
                        {{-- Statistik Laporan Kegiatan --}}
                        <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-8">
                            <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <svg class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-green-900">Total Laporan</p>
                                        <p class="text-2xl font-bold text-green-600">{{ $laporan_kegiatan->count() }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <svg class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-blue-900">Bulan Ini</p>
                                        <p class="text-2xl font-bold text-blue-600">
                                            {{ $laporan_kegiatan->where('tanggal', '>=', now()->startOfMonth())->count() }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <svg class="h-8 w-8 text-yellow-600" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-yellow-900">Menunggu Verifikasi</p>
                                        <p class="text-2xl font-bold text-yellow-600">
                                            {{ $laporan_kegiatan->where('status', 'Menunggu Verifikasi')->count() }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-purple-50 border border-purple-200 rounded-lg p-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <svg class="h-8 w-8 text-purple-600" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-purple-900">Dengan Video</p>
                                        <p class="text-2xl font-bold text-purple-600">
                                            {{ $laporan_kegiatan->whereNotNull('video')->count() }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-orange-50 border border-orange-200 rounded-lg p-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <svg class="h-8 w-8 text-orange-600" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-orange-900">Dengan Foto</p>
                                        <p class="text-2xl font-bold text-orange-600">
                                            {{ $laporan_kegiatan->whereNotNull('image')->count() }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Tabel Data Laporan Kegiatan --}}
                        <div class="overflow-x-auto">
                            <table class="w-full table-auto">
                                <thead class="bg-green-600 text-white">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">
                                            No
                                        </th>
                                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">
                                            Media
                                        </th>
                                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">
                                            Nama Kegiatan
                                        </th>
                                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">
                                            Tanggal
                                        </th>
                                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">
                                            Keterangan
                                        </th>
                                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">
                                            Status
                                        </th>
                                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($laporan_kegiatan as $index => $laporan)
                                        <tr class="hover:bg-gray-50 transition duration-200">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $index + 1 }}
                                            </td>
                                            <td class="px-6 py-4 text-sm">
                                                <div class="flex items-center space-x-2">
                                                    @if ($laporan->image)
                                                        <img src="{{ Storage::url($laporan->image) }}"
                                                            class="w-12 h-12 object-cover rounded-lg border border-gray-200"
                                                            alt="{{ $laporan->name }}">
                                                    @else
                                                        <div
                                                            class="h-12 w-12 bg-gray-200 rounded-lg flex items-center justify-center">
                                                            <svg class="h-6 w-6 text-gray-400" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                            </svg>
                                                        </div>
                                                    @endif
                                                    @if ($laporan->video)
                                                        <div
                                                            class="flex items-center justify-center w-8 h-8 bg-red-100 rounded-full">
                                                            <svg class="h-4 w-4 text-red-600" fill="currentColor"
                                                                viewBox="0 0 20 20">
                                                                <path d="M8 5v10l7-5-7-5z" />
                                                            </svg>
                                                        </div>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-sm">
                                                <div class="font-medium text-gray-900">
                                                    {{ $laporan->name ?? 'Nama kegiatan tidak tersedia' }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-600">
                                                <div class="flex items-center">
                                                    <svg class="h-4 w-4 text-gray-400 mr-2" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                    {{ $laporan->tanggal ? \Carbon\Carbon::parse($laporan->tanggal)->format('d M Y') : 'Tanggal tidak tersedia' }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-600">
                                                <div class="max-w-xs">
                                                    <p class="text-gray-900 line-clamp-2">
                                                        {{ Str::limit($laporan->keterangan ?? 'Keterangan tidak tersedia', 80) }}
                                                    </p>
                                                    @if (strlen($laporan->keterangan ?? '') > 80)
                                                        <button onclick="showDetailModal({{ $index }})"
                                                            class="text-blue-600 hover:text-blue-800 text-xs mt-1">
                                                            Lihat detail
                                                        </button>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-600">
                                                {{-- Status dengan Select Dropdown --}}
                                                <form
                                                    action="{{ route('adminhima.laporan_kegiatan.update-status', [$hima->id, $laporan->id]) }}"
                                                    method="POST" class="inline-block">
                                                    @csrf
                                                    @method('PATCH')
                                                    <select name="status" onchange="this.form.submit()"
                                                        class="text-xs px-2 py-1 rounded-full border-0 font-medium focus:ring-2 focus:ring-blue-500
                                                        {{ $laporan->status == 'Terverifikasi'
                                                            ? 'bg-green-100 text-green-800'
                                                            : ($laporan->status == 'Ditolak'
                                                                ? 'bg-red-100 text-red-800'
                                                                : 'bg-yellow-100 text-yellow-800') }}">
                                                        <option value="Terverifikasi"
                                                            {{ $laporan->status == 'Terverifikasi' ? 'selected' : '' }}>
                                                            Terverifikasi
                                                        </option>
                                                        <option value="Menunggu Verifikasi"
                                                            {{ $laporan->status == 'Menunggu Verifikasi' ? 'selected' : '' }}>
                                                            Menunggu Verifikasi
                                                        </option>
                                                        {{-- <option value="Ditolak"
                                                            {{ $laporan->status == 'Ditolak' ? 'selected' : '' }}>
                                                            Ditolak
                                                        </option> --}}
                                                    </select>
                                                </form>
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-600">
                                                <div class="flex items-center space-x-2">
                                                    <button onclick="viewLaporan({{ $index }})"
                                                        class="inline-flex items-center px-2 py-1 bg-blue-100 hover:bg-blue-200 text-blue-800 text-xs font-medium rounded transition duration-200">
                                                        <svg class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24"
                                                            stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                        Detail
                                                    </button>
{{-- 
                                                    <button
                                                        onclick="showEditModal({{ $laporan->id }}, '{{ $laporan->name }}', '{{ $laporan->status }}')"
                                                        class="inline-flex items-center px-2 py-1 bg-green-100 hover:bg-green-200 text-green-800 text-xs font-medium rounded transition duration-200">
                                                        <svg class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24"
                                                            stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                        </svg>
                                                        Edit Status
                                                    </button> --}}
                                                </div>
                                            </td>
                                        </tr>

                                        {{-- Modal Detail Laporan --}}
                                        <div id="detail-modal-{{ $index }}"
                                            class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
                                            <div
                                                class="bg-white rounded-lg p-6 max-w-4xl w-full max-h-96 overflow-y-auto">
                                                <div class="flex justify-between items-center mb-4">
                                                    <h3 class="text-lg font-semibold">Detail Laporan:
                                                        {{ $laporan->name }}</h3>
                                                    <button onclick="closeDetailModal({{ $index }})"
                                                        class="text-gray-500 hover:text-gray-700">
                                                        <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                    @if ($laporan->image)
                                                        <div>
                                                            <h4 class="font-medium text-gray-900 mb-2">Dokumentasi Foto
                                                            </h4>
                                                            <img src="{{ Storage::url($laporan->image) }}"
                                                                class="w-full h-48 object-cover rounded-lg"
                                                                alt="{{ $laporan->name }}">
                                                        </div>
                                                    @endif
                                                    @if ($laporan->video)
                                                        <div>
                                                            <h4 class="font-medium text-gray-900 mb-2">Dokumentasi
                                                                Video</h4>
                                                            <video controls class="w-full h-48 rounded-lg">
                                                                <source src="{{ Storage::url($laporan->video) }}"
                                                                    type="video/mp4">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="mt-4">
                                                    <h4 class="font-medium text-gray-900 mb-2">Keterangan</h4>
                                                    <p class="text-gray-600">
                                                        {{ $laporan->keterangan ?? 'Keterangan tidak tersedia' }}</p>
                                                </div>
                                                <div class="mt-4">
                                                    <h4 class="font-medium text-gray-900 mb-2">Informasi Tambahan</h4>
                                                    <div class="grid grid-cols-2 gap-4 text-sm">
                                                        <div>
                                                            <span class="text-gray-500">Tanggal:</span>
                                                            <span
                                                                class="ml-2">{{ $laporan->tanggal ? \Carbon\Carbon::parse($laporan->tanggal)->format('d M Y') : 'Tidak tersedia' }}</span>
                                                        </div>
                                                        <div>
                                                            <span class="text-gray-500">Status:</span>
                                                            <span
                                                                class="ml-2">{{ $laporan->status ?? 'Menunggu Verifikasi' }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- Pagination jika diperlukan --}}
                        @if ($laporan_kegiatan instanceof \Illuminate\Pagination\LengthAwarePaginator)
                            <div class="mt-6">
                                {{ $laporan_kegiatan->links() }}
                            </div>
                        @endif
                    @else
                        {{-- Tampilan kosong --}}
                        <div class="text-center py-12">
                            <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <h3 class="mt-4 text-lg font-medium text-gray-900">Belum ada Laporan Kegiatan</h3>
                            <p class="mt-2 text-sm text-gray-500">
                                Belum ada laporan kegiatan yang tersedia untuk HIMA {{ $hima->nama }}.
                            </p>
                            <div class="mt-6">
                                <div class="text-sm text-gray-400">
                                    Laporan kegiatan akan ditampilkan di sini setelah ditambahkan.
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Edit Status --}}
    <div id="edit-status-modal"
        class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg p-6 max-w-md w-full">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold" id="modal-title">Edit Status Laporan</h3>
                <button onclick="closeEditModal()" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            {{-- <form action="{{ route('adminhima.laporan_kegiatan.update-status', [$hima->id, $laporan_kegiatan->id]) }}"
                method="POST" class="inline-block"> --}}
<form id="edit-status-form" method="POST" class="inline-block">

                @csrf
                @method('PATCH')
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-700">Status</label>
                    <select name="status" id="status-select"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                        <option value="Terverifikasi">Terverifikasi</option>
                        <option value="Menunggu Verifikasi">Menunggu Verifikasi</option>
                        <option value="Ditolak">Ditolak</option>
                    </select>
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeEditModal()"
                        class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition duration-200">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-200">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function showDetailModal(index) {
            document.getElementById(`detail-modal-${index}`).classList.remove('hidden');
        }

        function closeDetailModal(index) {
            document.getElementById(`detail-modal-${index}`).classList.add('hidden');
        }

        function viewLaporan(index) {
            showDetailModal(index);
        }

        function showEditModal(laporanId, laporanName, currentStatus) {
            document.getElementById('modal-title').textContent = `Edit Status: ${laporanName}`;
            document.getElementById('edit-status-form').action = `/admin/${{{ $hima->id }}}/laporan_kegiatan/${laporanId}/update-status`;
            document.getElementById('status-select').value = currentStatus;
            document.getElementById('edit-status-modal').classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('edit-status-modal').classList.add('hidden');
        }

        // Close modal when clicking outside
        document.getElementById('edit-status-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeEditModal();
            }
        });
    </script>
</x-app-layout>
