<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Data Pengurus - {{ $hima->nama }}
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
                        Data Pengurus {{ $hima->nama }}
                    </h1>
                    <div class="text-center text-gray-500 mb-8">
                        Berikut adalah daftar pengurus untuk HIMA {{ $hima->nama }}
                    </div>

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6"
                            role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if($pengurus->count() > 0)
                   

                        {{-- Tabel Data Pengurus --}}
                        <div class="overflow-x-auto">
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
                                            Periode
                                        </th>
                                     
                                    </tr>
                                </thead>
                                <tbody class="bg-gray-100">
                                    @foreach($pengurus as $anggota)
                                        <tr class="border-t border-gray-200 hover:bg-gray-50">
                                            <td class="px-6 py-4 text-sm">
                                                @if($anggota->image)
                                                    <img src="{{ Storage::url($anggota->image) }}"
                                                        class="w-16 h-16 object-cover rounded-md"
                                                        alt="{{ $anggota->nama }}">
                                                @else
                                                    <div class="h-16 w-16 bg-blue-500 rounded-md flex items-center justify-center">
                                                        <span class="text-white font-medium text-lg">
                                                            {{ substr($anggota->nama ?? 'N/A', 0, 1) }}
                                                        </span>
                                                    </div>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                                {{ $anggota->nama ?? 'Nama tidak tersedia' }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-600">
                                                {{ $anggota->nrp ?? 'NRP tidak tersedia' }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-600">
                                                {{ $anggota->jabatan->nama ?? 'Jabatan tidak tersedia' }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-600">
                                                {{ $anggota->periode ?? 'Periode tidak tersedia' }}
                                            </td>
                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- Pagination jika diperlukan --}}
                        @if($pengurus instanceof \Illuminate\Pagination\LengthAwarePaginator)
                            <div class="mt-6">
                                {{ $pengurus->links() }}
                            </div>
                        @endif

                    @else
                        {{-- Tampilan kosong --}}
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada data pengurus</h3>
                            <p class="mt-1 text-sm text-gray-500">
                                Belum ada pengurus yang terdaftar untuk HIMA {{ $hima->nama }}.
                            </p>
                            {{-- <div class="mt-6">
                                <a href="{{ route('akun.data_pengurus.create', $hima->id) }}"
                                    class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    + Tambah Pengurus Pertama
                                </a>
                            </div> --}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Edit (Opsional) --}}
    <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg w-full max-w-2xl">
            <h2 class="text-xl font-bold mb-6">Edit Data Pengurus</h2>

            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" name="nama" id="edit_nama"
                            class="shadow-sm block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                            required>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700">NIM</label>
                        <input type="text" name="nim" id="edit_nim"
                            class="shadow-sm block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                            required>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700">Jabatan</label>
                        <select name="jabatan_id" id="edit_jabatan"
                            class="shadow-sm block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                            required>
                            <option value="">-- Pilih Jabatan --</option>
                            @foreach($jabatans ?? [] as $jabatan)
                                <option value="{{ $jabatan->id }}">{{ $jabatan->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700">Periode</label>
                        <input type="text" name="periode" id="edit_periode"
                            class="shadow-sm block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                            required>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-700">Image</label>
                        <input type="file" name="image"
                            class="shadow-sm block w-full text-sm text-gray-700 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                        <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengubah gambar</p>
                    </div>
                </div>

                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closeEditModal()"
                        class="bg-gray-500 hover:bg-gray-600 text-white font-medium py-2 px-6 rounded-md transition duration-200">
                        Batal
                    </button>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-md transition duration-200">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function editPengurus(id) {
            // Fetch data pengurus
            fetch(`/pengurus/${id}/edit`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('edit_nama').value = data.nama;
                    document.getElementById('edit_nim').value = data.nim;
                    document.getElementById('edit_jabatan').value = data.jabatan_id;
                    document.getElementById('edit_periode').value = data.periode;

                    // Set form action
                    document.getElementById('editForm').action = `/pengurus/${id}`;

                    // Show modal
                    document.getElementById('editModal').classList.remove('hidden');
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat mengambil data pengurus');
                });
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }

        // Close modal when clicking outside
        document.getElementById('editModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeEditModal();
            }
        });
    </script>
</x-app-layout>