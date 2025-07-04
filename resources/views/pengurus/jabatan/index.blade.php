<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jabatan') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-100">
                <div class="p-8 text-gray-900">
                    <h1 class="text-2xl font-bold text-center text-gray-800 mb-10">Jabatan</h1>

                    <!-- Alert Success -->
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6"
                            role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif
                    @role('pengurus')
                        <form action="{{ route('jabatan.store') }}" method="POST" class="mb-10">
                            @csrf

                            <!-- Baris 1: Nama Jabatan & Tingkatan -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <!-- Nama Jabatan -->
                                <div>
                                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Nama
                                        Jabatan</label>
                                    <input type="text" name="nama" id="name" placeholder="Contoh: Ketua Umum"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nama') border-red-500 @enderror"
                                        value="{{ old('nama') }}" required>
                                    @error('nama')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Tingkatan -->
                                <div>
                                    <label for="tingkatan"
                                        class="block text-sm font-semibold text-gray-700 mb-1">Tingkatan</label>
                                    <select name="tingkatan" id="tingkatan"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('tingkatan') border-red-500 @enderror">
                                        <option value="">-- Pilih Tingkatan --</option>
                                        @for ($i = 1; $i <= 5; $i++)
                                            <option value="{{ $i }}"
                                                {{ old('tingkatan') == $i ? 'selected' : '' }}>Tingkatan {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                    @error('tingkatan')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Baris 2: Deskripsi & Tombol -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-end mb-4">
                                <!-- Deskripsi -->
                                <div>
                                    <label for="deskripsi" class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi
                                        (opsional)</label>
                                    <input type="text" name="deskripsi" id="deskripsi" placeholder="Deskripsi jabatan"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('deskripsi') border-red-500 @enderror"
                                        value="{{ old('deskripsi') }}">
                                    @error('deskripsi')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Tombol Submit -->
                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="w-full md:w-auto bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md transition duration-200">
                                        + Tambah
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endrole

                    <div class="overflow-x-auto">
                        <table class="w-full table-auto">
                            <thead class="bg-gray-400 text-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">No
                                    </th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Nama
                                        Jabatan</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">
                                        Tingkatan</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">
                                        Deskripsi</th>

                                    @role('pengurus')
                                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">
                                            Action</th>
                                    @endrole
                                </tr>
                            </thead>
                            <tbody class="bg-gray-100">
                                @forelse ($jabatans as $index => $jabatan)
                                    <tr class="border-t border-gray-200" id="jabatan-row-{{ $jabatan->id }}">
                                        <td class="px-6 py-4 text-sm">{{ $jabatans->firstItem() + $index }}</td>
                                        <td class="px-6 py-4 text-sm" id="jabatan-nama-{{ $jabatan->id }}">
                                            {{ $jabatan->nama }}</td>
                                        <td class="px-6 py-4 text-sm" id="jabatan-tingkatan-{{ $jabatan->id }}">
                                            {{ $jabatan->tingkatan ?? '-' }}</td>
                                        <td class="px-6 py-4 text-sm" id="jabatan-deskripsi-{{ $jabatan->id }}">
                                            {{ $jabatan->deskripsi ?? '-' }}</td>

                                        @role('pengurus')
                                            <td class="px-6 py-4 text-sm flex space-x-4">
                                                <button onclick="editJabatan({{ $jabatan->id }})"
                                                    class="text-blue-600 hover:text-blue-800 font-medium">Edit</button>
                                                <button onclick="deleteJabatan({{ $jabatan->id }})"
                                                    class="text-red-600 hover:text-red-800 font-medium">Delete</button>
                                            </td>
                                        @endrole
                                    </tr>
                                @empty
                                    <tr>
                                        {{-- untuk tabel kosong agar pas --}}
                                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                            Belum ada data jabatan
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if ($jabatans->hasPages())
                        <div class="mt-6">
                            {{ $jabatans->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Jabatan -->
    {{-- <div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-medium text-gray-900">Edit Jabatan</h3>
                    <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <form id="editForm">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="edit_nama" class="block text-sm font-medium text-gray-700 mb-2">Nama Jabatan</label>
                        <input type="text" id="edit_nama" name="nama"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            required>
                        <div id="edit_nama_error" class="text-red-500 text-sm mt-1 hidden"></div>
                    </div>
                    <label for="edit_tingkatan" class="block text-sm font-medium text-gray-700 mb-2">Tingkatan</label>
                    <input type="text" id="edit_tingkatan" name="tingkatan"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                    <label for="edit_deskripsi"
                        class="block text-sm font-medium text-gray-700 mb-2 mt-3">Deskripsi</label>
                    <input type="text" id="edit_deskripsi" name="deskripsi"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closeEditModal()"
                            class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition duration-200">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-200">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
    <!-- Modal Edit Jabatan -->
    <div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-6 border w-full max-w-xl shadow-lg rounded-md bg-white">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-semibold text-gray-800">Edit Jabatan</h3>
                <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            <form id="editForm">
                @csrf
                @method('PUT')

                <!-- Baris 1: Nama Jabatan & Tingkatan -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="edit_nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Jabatan</label>
                        <input type="text" id="edit_nama" name="nama"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            required>
                        <div id="edit_nama_error" class="text-red-500 text-sm mt-1 hidden"></div>
                    </div>

                    <div>
                        <label for="edit_tingkatan"
                            class="block text-sm font-medium text-gray-700 mb-1">Tingkatan</label>
                        <select id="edit_tingkatan" name="tingkatan"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">-- Pilih Tingkatan --</option>
                            @for ($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}">Tingkatan {{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <!-- Baris 2: Deskripsi & Tombol -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-end">
                    <div>
                        <label for="edit_deskripsi"
                            class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                        <input type="text" id="edit_deskripsi" name="deskripsi"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="w-full md:w-auto bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md transition duration-200">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Delete Confirmation -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                    <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L5.268 15.5c-.77.833.192 2.5 1.732 2.5z">
                        </path>
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Hapus Jabatan</h3>
                <p class="text-sm text-gray-500 mb-4">Apakah Anda yakin ingin menghapus jabatan ini? Tindakan ini tidak
                    can dibatalkan.</p>

                <div class="flex justify-center space-x-3">
                    <button type="button" onclick="closeDeleteModal()"
                        class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition duration-200">
                        Batal
                    </button>
                    <button type="button" onclick="confirmDelete()"
                        class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition duration-200">
                        Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentJabatanId = null;

        // Function to show success message
        function showSuccessMessage(message) {
            const alertDiv = document.createElement('div');
            alertDiv.className = 'bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6';
            alertDiv.setAttribute('role', 'alert');
            alertDiv.innerHTML = `<span class="block sm:inline">${message}</span>`;

            const container = document.querySelector('.p-8');
            const firstChild = container.children[1]; // Insert after h1
            container.insertBefore(alertDiv, firstChild);

            // Auto remove after 3 seconds
            setTimeout(() => {
                alertDiv.remove();
            }, 3000);
        }

        // Function to show error message
        function showErrorMessage(message) {
            const alertDiv = document.createElement('div');
            alertDiv.className = 'bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6';
            alertDiv.setAttribute('role', 'alert');
            alertDiv.innerHTML = `<span class="block sm:inline">${message}</span>`;

            const container = document.querySelector('.p-8');
            const firstChild = container.children[1];
            container.insertBefore(alertDiv, firstChild);

            setTimeout(() => {
                alertDiv.remove();
            }, 3000);
        }

        // Edit Jabatan Functions
        function editJabatan(id) {
            currentJabatanId = id;

            // Fetch jabatan data
            fetch(`/jabatan/${id}/edit`, {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    document.getElementById('edit_nama').value = data.nama;
                    document.getElementById('edit_tingkatan').value = data.tingkatan || '';
                    document.getElementById('edit_deskripsi').value = data.deskripsi || '';

                    document.getElementById('editModal').classList.remove('hidden');
                    document.getElementById('edit_nama').focus();
                })
                .catch(error => {
                    console.error('Error:', error);
                    showErrorMessage('Terjadi kesalahan saat mengambil data jabatan.');
                });
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
            document.getElementById('edit_nama_error').classList.add('hidden');
            document.getElementById('editForm').reset();
            currentJabatanId = null;
        }

        // Handle edit form submission
        document.getElementById('editForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData();
            formData.append('nama', document.getElementById('edit_nama').value);
            formData.append('tingkatan', document.getElementById('edit_tingkatan').value);
            formData.append('deskripsi', document.getElementById('edit_deskripsi').value);

            formData.append('_method', 'PUT');

            // Ambil CSRF token dari form yang ada
            const csrfToken = document.querySelector('input[name="_token"]').value;
            formData.append('_token', csrfToken);

            fetch(`/jabatan/${currentJabatanId}`, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    },
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        // Update the table row
                        document.getElementById(`jabatan-nama-${currentJabatanId}`).textContent = data.data
                            .nama;
                        document.getElementById(`jabatan-tingkatan-${currentJabatanId}`).textContent = data.data
                            .tingkatan;
                            document.getElementById(`jabatan-deskripsi-${currentJabatanId}`).textContent = data.data
                            .deskripsi;
                        closeEditModal();
                        showSuccessMessage(data.message);
                    } else {
                        // Show validation errors
                        if (data.errors && data.errors.nama) {
                            document.getElementById('edit_nama_error').textContent = data.errors.nama[0];
                            document.getElementById('edit_nama_error').classList.remove('hidden');
                        }
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showErrorMessage('Terjadi kesalahan saat mengupdate jabatan.');
                });
        });

        // Delete Jabatan Functions
        function deleteJabatan(id) {
            currentJabatanId = id;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            currentJabatanId = null;
        }

        function confirmDelete() {
            // Ambil CSRF token
            const csrfToken = document.querySelector('input[name="_token"]').value;

            const formData = new FormData();
            formData.append('_method', 'DELETE');
            formData.append('_token', csrfToken);

            fetch(`/jabatan/${currentJabatanId}`, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    },
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        // Remove the table row
                        document.getElementById(`jabatan-row-${currentJabatanId}`).remove();
                        closeDeleteModal();
                        showSuccessMessage(data.message);
                    } else {
                        showErrorMessage('Terjadi kesalahan saat menghapus jabatan.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showErrorMessage('Terjadi kesalahan saat menghapus jabatan.');
                });
        }

        // Close modal when clicking outside
        document.getElementById('editModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeEditModal();
            }
        });

        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeDeleteModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeEditModal();
                closeDeleteModal();
            }
        });
    </script>
    <!-- Tambahkan ini untuk token browser-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</x-app-layout>
