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

                    {{-- <form action="{{ route('data_pengurus.store') }}" method="POST" enctype="multipart/form-data"
                        class="mb-10 space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">Nama</label>
                                <input type="text" name="nama" placeholder="Nama Lengkap"
                                    class="shadow-sm block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('nama') border-red-500 @enderror"
                                    value="{{ old('nama') }}" required>
                                @error('nama')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">NRP</label>
                                <input type="text" name="nrp" placeholder="NRP"
                                    class="shadow-sm block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('nrp') border-red-500 @enderror"
                                    value="{{ old('nrp') }}" required>
                                @error('nrp')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">Jabatan</label>
                                <select name="jabatan_id"
                                    class="shadow-sm block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('jabatan_id') border-red-500 @enderror"
                                    required>
                                    <option value="">-- Pilih Jabatan --</option>
                                    @foreach ($jabatans as $jabatan)
                                        <option value="{{ $jabatan->id }}"
                                            {{ old('jabatan_id') == $jabatan->id ? 'selected' : '' }}>
                                            {{ $jabatan->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('jabatan_id')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">Periode</label>
                                <input type="text" name="periode" placeholder="Contoh: 2022"
                                    class="shadow-sm block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('periode') border-red-500 @enderror"
                                    value="{{ old('periode') }}" required>
                                @error('periode')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="md:col-span-2">
                                <label class="block mb-2 text-sm font-medium text-gray-700">Image</label>
                                <input type="file" name="image"
                                    class="shadow-sm block w-full text-sm text-gray-700 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('image') border-red-500 @enderror">
                                @error('image')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-end space-x-4">
                            <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-md transition duration-200">
                                + Tambah
                            </button>
                        </div>
                    </form> --}}

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
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Image
                                    </th>
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

                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-gray-100">
                                @forelse ($pengurus as $p)
                                    <tr class="border-t border-gray-200">
                                        <td class="px-6 py-4 text-sm">
                                            @if ($p->image)
                                                <img src="{{ Storage::url($p->image) }}"
                                                    class="w-16 h-16 object-cover rounded-md" alt="{{ $p->name }}">
                                            @else
                                                <div class="w-16 h-16 bg-gray-300 rounded-md"></div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-sm">{{ $p->nama }}</td>
                                        <td class="px-6 py-4 text-sm">{{ $p->nrp }}</td>
                                        <td class="px-6 py-4 text-sm">{{ $p->jabatan->nama }}</td>
                                        <td class="px-6 py-4 text-sm">{{ $p->periode }}</td>
                                        <td class="px-6 py-4 text-sm">
                                            @if ($p->is_alumni)
                                                <span class="text-green-600 font-semibold">Alumni</span>
                                            @else
                                                <span class="text-blue-600 font-semibold">Aktif</span>
                                            @endif
                                        </td>

                                        <td class="px-6 py-4 text-sm">
                                            <div class="flex space-x-4">
                                                <a href="{{ route('data_pengurus.edit', $p->id) }}" type="button"
                                                    onclick="editPengurus({{ $p->id }})"
                                                    class="text-blue-600 hover:text-blue-800 font-medium">
                                                    Edit
                                                </a>
                                                <form action="{{ route('data_pengurus.destroy', $p->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
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
    {{-- <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg w-full max-w-2xl">
            <h2 class="text-xl font-bold mb-6">Edit Data Pengurus</h2>

            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="edit_name"
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
                        <input type="text" name="jabatan" id="edit_jabatan"
                            class="shadow-sm block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                            required>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700">Periode</label>
                        <input type="text" name="periode" id="edit_periode"
                            class="shadow-sm block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                            required>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" name="is_alumni" id="is_alumni"
                            class="h-4 w-4 text-blue-600 border-gray-300 rounded"
                            {{ old('is_alumni') ? 'checked' : '' }}>
                        <label for="is_alumni" class="text-sm text-gray-700">Tandai sebagai Alumni</label>
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
    </div> --}}

    <script>
        function editPengurus(id) {
            // Fetch data
            fetch(`/pengurus/${id}/edit`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('edit_name').value = data.name;
                    document.getElementById('edit_nrp').value = data.nrp;
                    document.getElementById('edit_jabatan').value = data.jabatan;
                    document.getElementById('edit_periode').value = data.periode;

                    // Set form action
                    document.getElementById('editForm').action = `/pengurus/${id}`;

                    // Show modal
                    document.getElementById('editModal').classList.remove('hidden');
                });
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }
    </script>
</x-app-layout>
