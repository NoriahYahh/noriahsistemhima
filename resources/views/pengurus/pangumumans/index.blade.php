<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pengumuman') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-100">
                <div class="p-8 text-gray-900">
                    <h1 class="text-2xl font-bold text-center text-gray-800 mb-10">Pengumuman</h1>

                    <!-- Alert Success -->
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6"
                            role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <!-- Alert Error -->
                    @if (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6"
                            role="alert">
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif

                    @role('pengurus')
                        <form action="{{ route('pengumuman.store') }}" method="POST" enctype="multipart/form-data"
                            class="mb-10">
                            @csrf

                            <!-- Baris 1: Judul & File -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <!-- Judul -->
                                <div>
                                    <label for="judul" class="block text-sm font-semibold text-gray-700 mb-1">Judul
                                        Pengumuman</label>
                                    <input type="text" name="judul" id="judul"
                                        placeholder="Masukkan judul pengumuman"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('judul') border-red-500 @enderror"
                                        value="{{ old('judul') }}" required>
                                    @error('judul')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- File -->
                                <div>
                                    <label for="file" class="block text-sm font-semibold text-gray-700 mb-1">File
                                        (Opsional)</label>
                                    <input type="file" name="file" id="file"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('file') border-red-500 @enderror"
                                        accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                                    <p class="text-xs text-gray-500 mt-1">Format: PDF, JPG, JPEG, PNG. Maksimal 5MB.</p>
                                    @error('file')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Baris 2: Tombol Submit -->
                            <div class="flex justify-end">
                                <button type="submit"
                                    class="w-full md:w-auto bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md transition duration-200">
                                    + Tambah Pengumuman
                                </button>
                            </div>
                        </form>
                    @endrole

                    <div class="overflow-x-auto">
                        <table class="w-full table-auto">
                            <thead class="bg-gray-400 text-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">No
                                    </th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Judul
                                    </th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">File
                                    </th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">
                                        Tanggal</th>
                                    @role('pengurus')
                                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">
                                            Action</th>
                                    @endrole
                                </tr>
                            </thead>
                            <tbody class="bg-gray-100">
                                @forelse ($pengumuman as $index => $item)
                                    <tr class="border-t border-gray-200" id="pengumuman-row-{{ $item->id }}">
                                        <td class="px-6 py-4 text-sm">{{ $pengumuman->firstItem() + $index }}</td>
                                        <td class="px-6 py-4 text-sm" id="pengumuman-judul-{{ $item->id }}">
                                            {{ $item->judul }}
                                        </td>
                                        <td class="px-6 py-4 text-sm">
                                            @if ($item->file)
                                                <a href="{{ route('pengumuman.download', $item->id) }}"
                                                    class="text-blue-600 hover:text-blue-800 font-medium">
                                                  </i>Download
                                                </a>
                                            @else
                                                <span class="text-gray-500">-</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-sm">{{ $item->created_at->format('d/m/Y H:i') }}</td>
                                        @role('pengurus')
                                            <td class="px-6 py-4 text-sm flex space-x-4">
                                                <a href="{{ asset('storage/' . $item->file) }}" target="_blank"
                                                    class="text-green-600 hover:text-green-800 font-medium">
                                                     Lihat
                                                </a>
                                                <button onclick="editPengumuman({{ $item->id }})"
                                                    class="text-blue-600 hover:text-blue-800 font-medium">Edit</button>
                                                <button onclick="deletePengumuman({{ $item->id }})"
                                                    class="text-red-600 hover:text-red-800 font-medium">Delete</button>
                                            </td>
                                        @endrole
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                            Belum ada data pengumuman
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if ($pengumuman->hasPages())
                        <div class="mt-6">
                            {{ $pengumuman->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Pengumuman -->
    <div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-6 border w-full max-w-xl shadow-lg rounded-md bg-white">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-semibold text-gray-800">Edit Pengumuman</h3>
                <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            <form id="editForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Baris 1: Judul & File -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="edit_judul" class="block text-sm font-medium text-gray-700 mb-1">Judul
                            Pengumuman</label>
                        <input type="text" id="edit_judul" name="judul"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            required>
                        <div id="edit_judul_error" class="text-red-500 text-sm mt-1 hidden"></div>
                    </div>

                    <div>
                        <label for="edit_file" class="block text-sm font-medium text-gray-700 mb-1">File
                            (Opsional)</label>
                        <input type="file" id="edit_file" name="file"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                        <p class="text-xs text-gray-500 mt-1">Format: PDF, DOC, DOCX, JPG, JPEG, PNG. Maksimal 5MB.</p>
                        <div id="edit_file_error" class="text-red-500 text-sm mt-1 hidden"></div>
                    </div>
                </div>

                <!-- Baris 2: Tombol -->
                <div class="flex justify-end">
                    <button type="submit"
                        class="w-full md:w-auto bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md transition duration-200">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Detail Pengumuman -->
    <div id="detailModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-6 border w-full max-w-xl shadow-lg rounded-md bg-white">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-semibold text-gray-800">Detail Pengumuman</h3>
                <button onclick="closeDetailModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            <div id="detailContent" class="space-y-4">
                <!-- Detail content akan diisi melalui JavaScript -->
            </div>
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
                <h3 class="text-lg font-medium text-gray-900 mb-2">Hapus Pengumuman</h3>
                <p class="text-sm text-gray-500 mb-4">Apakah Anda yakin ingin menghapus pengumuman ini? Tindakan ini
                    tidak dapat dibatalkan.</p>

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
        let currentPengumumanId = null;
        let deleteId = null;

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

        // Edit Pengumuman Functions
        function editPengumuman(id) {
            currentPengumumanId = id;

            // Fetch pengumuman data
            fetch(`/pengumuman/${id}/edit`, {
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
                    document.getElementById('edit_judul').value = data.judul;

                    document.getElementById('editModal').classList.remove('hidden');
                    document.getElementById('edit_judul').focus();
                })
                .catch(error => {
                    console.error('Error:', error);
                    showErrorMessage('Terjadi kesalahan saat mengambil data pengumuman.');
                });
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
            document.getElementById('edit_judul_error').classList.add('hidden');
            document.getElementById('edit_file_error').classList.add('hidden');
            document.getElementById('editForm').reset();
            currentPengumumanId = null;
        }

        // Handle edit form submission
        document.getElementById('editForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData();
            formData.append('judul', document.getElementById('edit_judul').value);

            const fileInput = document.getElementById('edit_file');
            if (fileInput.files[0]) {
                formData.append('file', fileInput.files[0]);
            }

            formData.append('_method', 'PUT');

            // Ambil CSRF token dari form yang ada
            const csrfToken = document.querySelector('input[name="_token"]').value;
            formData.append('_token', csrfToken);

            fetch(`/pengumuman/${currentPengumumanId}`, {
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
                        document.getElementById(`pengumuman-judul-${currentPengumumanId}`).textContent = data
                            .data.judul;

                        closeEditModal();
                        showSuccessMessage(data.message);
                    } else {
                        // Show validation errors
                        if (data.errors && data.errors.judul) {
                            document.getElementById('edit_judul_error').textContent = data.errors.judul[0];
                            document.getElementById('edit_judul_error').classList.remove('hidden');
                        }
                        if (data.errors && data.errors.file) {
                            document.getElementById('edit_file_error').textContent = data.errors.file[0];
                            document.getElementById('edit_file_error').classList.remove('hidden');
                        }
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showErrorMessage('Terjadi kesalahan saat mengupdate pengumuman.');
                });
        });

        // Show Detail Functions
        function showDetail(id) {
            fetch(`/pengumuman/${id}`, {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    const detailContent = `
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Judul:</label>
                                <p class="mt-1 text-sm text-gray-900">${data.judul}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">File:</label>
                                <p class="mt-1 text-sm text-gray-900">${data.file ? 'Ada file' : 'Tidak ada file'}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Tanggal Dibuat:</label>
                                <p class="mt-1 text-sm text-gray-900">${new Date(data.created_at).toLocaleDateString('id-ID', { 
                                    day: '2-digit', 
                                    month: '2-digit', 
                                    year: 'numeric',
                                    hour: '2-digit',
                                    minute: '2-digit'
                                })}</p>
                            </div>
                        </div>
                    `;

                    document.getElementById('detailContent').innerHTML = detailContent;
                    document.getElementById('detailModal').classList.remove('hidden');
                })
                .catch(error => {
                    console.error('Error:', error);
                    showErrorMessage('Terjadi kesalahan saat mengambil detail pengumuman.');
                });
        }

        function closeDetailModal() {
            document.getElementById('detailModal').classList.add('hidden');
        }

        // Delete Pengumuman Functions
        function deletePengumuman(id) {
            deleteId = id;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            deleteId = null;
        }

        function confirmDelete() {
            // Ambil CSRF token
            const csrfToken = document.querySelector('input[name="_token"]').value;

            const formData = new FormData();
            formData.append('_method', 'DELETE');
            formData.append('_token', csrfToken);

            fetch(`/pengumuman/${deleteId}`, {
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
                        document.getElementById(`pengumuman-row-${deleteId}`).remove();
                        closeDeleteModal();
                        showSuccessMessage(data.message);
                    } else {
                        showErrorMessage('Terjadi kesalahan saat menghapus pengumuman.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showErrorMessage('Terjadi kesalahan saat menghapus pengumuman.');
                });
        }

        // Close modal when clicking outside
        document.getElementById('editModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeEditModal();
            }
        });

        document.getElementById('detailModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeDetailModal();
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
                closeDetailModal();
                closeDeleteModal();
            }
        });
    </script>

    <!-- Font Awesome untuk icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Tambahkan ini untuk token browser-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</x-app-layout>
