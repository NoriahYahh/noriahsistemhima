<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Pengurus') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-100">
                <div class="p-8 text-gray-900">
                    <h1 class="text-2xl font-bold text-center text-gray-800 mb-10">Data Pengurus</h1>

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6"
                            role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    {{-- bagian untuk button tambah --}}
                    <div class="mb-4 text-right">
                        <a href="{{ route('data_pengurus.create') }}"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md">
                            Tambah
                        </a>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full table-auto">
                            <thead class="bg-gray-400 text-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Image</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">NRP</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Jabatan</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Periode</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-gray-100">
                                @forelse ($dataPengurus as $p)
                                    <tr class="border-t border-gray-200">
                                        <td class="px-6 py-4 text-sm">
                                            @if ($p->image)
                                                <img src="{{ Storage::url($p->image) }}"
                                                    class="w-16 h-16 object-cover rounded-md"
                                                    alt="{{ $p->nama }}">
                                            @else
                                                <div class="w-16 h-16 bg-gray-300 rounded-md"></div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-sm">{{ $p->nama }}</td>
                                        <td class="px-6 py-4 text-sm">{{ $p->nrp }}</td>
                                        <td class="px-6 py-4 text-sm">{{ $p->jabatan->nama ?? 'N/A' }}</td>
                                        <td class="px-6 py-4 text-sm">{{ $p->periode }}</td>
                                        <td class="px-6 py-4 text-sm">
                                            <div class="flex space-x-4">
                                                <button type="button" onclick="editPengurus({{ $p->id }})"
                                                    class="text-blue-600 hover:text-blue-800 font-medium">
                                                    Edit
                                                </button>
                                                <form action="{{ route('data_pengurus.destroy', $p->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-800 font-medium">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-4 text-sm text-center text-gray-500">Tidak ada
                                            data pengurus</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
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
                        <label class="block mb-2 text-sm font-medium text-gray-700">NRP</label>
                        <input type="text" name="nrp" id="edit_nrp"
                            class="shadow-sm block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                            required>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700">Jabatan</label>
                        <select name="jabatan_id" id="edit_jabatan_id"
                            class="shadow-sm block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                            required>
                            <option value="">-- Pilih Jabatan --</option>
                            @foreach ($jabatans as $jabatan)
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
                        <div class="mb-2" id="current_image_container">
                            <img id="current_image" src="" class="w-24 h-24 object-cover rounded-md hidden">
                        </div>
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
            // Set form action untuk update
            document.getElementById('editForm').action = `/data_pengurus/${id}`;
            
            // Fetch data pengurus
            fetch(`/data_pengurus/${id}/edit`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    // Populate form fields
                    document.getElementById('edit_nama').value = data.nama;
                    document.getElementById('edit_nrp').value = data.nrp;
                    document.getElementById('edit_jabatan_id').value = data.jabatan_id;
                    document.getElementById('edit_periode').value = data.periode;
                    
                    // Handle image display
                    const currentImage = document.getElementById('current_image');
                    if (data.image) {
                        currentImage.src = "/storage/" + data.image;
                        currentImage.classList.remove('hidden');
                    } else {
                        currentImage.classList.add('hidden');
                    }
                    
                    // Show modal
                    document.getElementById('editModal').classList.remove('hidden');
                })
                .catch(error => {
                    console.error('Error fetching pengurus data:', error);
                    alert('Terjadi kesalahan saat mengambil data pengurus');
                });
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }

        // Close modal when clicking outside of it
        document.getElementById('editModal').addEventListener('click', function(event) {
            if (event.target === this) {
                closeEditModal();
            }
        });
    </script>
</x-app-layout>