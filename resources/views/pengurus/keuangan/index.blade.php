<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Keuangan HIMA') }}
        </h2>
    </x-slot>

    <!-- Edit Modal -->
    <div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
        <div class="bg-white rounded-lg w-full max-w-md mx-auto p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-medium text-gray-900">Edit Data Keuangan</h3>
                <button type="button" onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="edit_nominal" class="block text-sm font-medium text-gray-700 mb-1">Nominal</label>
                    <input type="number" id="edit_nominal" name="nominal" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                
                <div class="mb-4">
                    <label for="edit_tanggal" class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                    <input type="date" id="edit_tanggal" name="tanggal" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jenis</label>
                    <div class="flex space-x-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="jenis" value="masuk" class="form-radio h-4 w-4 text-blue-600" required>
                            <span class="ml-2 text-gray-700">Uang Masuk</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="jenis" value="keluar" class="form-radio h-4 w-4 text-blue-600">
                            <span class="ml-2 text-gray-700">Uang Keluar</span>
                        </label>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="edit_keterangan" class="block text-sm font-medium text-gray-700 mb-1">Keterangan</label>
                    <textarea id="edit_keterangan" name="keterangan" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" rows="3"></textarea>
                </div>

                <div class="mb-6">
                    <label for="edit_image" class="block text-sm font-medium text-gray-700 mb-1">Bukti (Gambar)</label>
                    <input type="file" id="edit_image" name="image" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <p class="text-sm text-gray-500 mt-1">Format: JPG, JPEG, PNG. Maksimal 2MB.</p>
                </div>
                
                <div class="flex justify-end">
                    <button type="button" onclick="closeModal()" class="mr-2 px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition duration-200">
                        Batal
                    </button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-200">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="py-12 bg-gray-50">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            
            @if (session('error'))
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif
            
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-100">
                <div class="p-8 text-gray-900">
                    <h1 class="text-2xl font-bold text-center text-gray-800 mb-10">KEUANGAN HIMA</h1>

                    <form action="{{ route('keuangan.store') }}" method="POST" enctype="multipart/form-data" class="mb-10">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nominal</label>
                                <input 
                                    type="number" 
                                    name="nominal" 
                                    placeholder="Masukkan nominal" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                    required
                                >
                                @error('nominal')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                                <input 
                                    type="date" 
                                    name="tanggal" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                    value="{{ date('Y-m-d') }}"
                                    required
                                >
                                @error('tanggal')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Keterangan</label>
                                <textarea 
                                    name="keterangan" 
                                    placeholder="Keterangan (opsional)" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                    rows="2"
                                ></textarea>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Bukti (Gambar)</label>
                                <input 
                                    type="file" 
                                    name="image" 
                                    accept="image/*"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                >
                                <p class="text-sm text-gray-500 mt-1">Format: JPG, JPEG, PNG. Maksimal 2MB.</p>
                            </div>
                        </div>
                        
                        <div class="flex justify-center space-x-4">
                            <button 
                                type="submit" 
                                name="action" 
                                value="masuk"
                                class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-6 rounded-md transition duration-200"
                            >
                                + Uang Masuk
                            </button>
                            <button 
                                type="submit" 
                                name="action" 
                                value="keluar"
                                class="bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-6 rounded-md transition duration-200"
                            >
                                - Uang Keluar
                            </button>
                        </div>
                    </form>

                    <div class="overflow-x-auto">
                        <table class="w-full table-auto">
                            <thead class="bg-gray-400 text-white">
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Tanggal</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Uang Masuk</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Uang Keluar</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Keterangan</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Bukti</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Jumlah Uang</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-gray-100">
                                @forelse ($keuangansWithSaldo as $keuangan)
                                <tr class="border-t border-gray-200 hover:bg-gray-50">
                                    <td class="px-6 py-4 text-sm">{{ \Carbon\Carbon::parse($keuangan->tanggal)->format('d/m/Y') }}</td>
                                    <td class="px-6 py-4 text-sm text-green-600 font-medium">
                                        @if ($keuangan->jenis === 'masuk')
                                            Rp {{ number_format($keuangan->uang, 0, ',', '.') }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm text-red-600 font-medium">
                                        @if ($keuangan->jenis === 'keluar')
                                            Rp {{ number_format($keuangan->uang, 0, ',', '.') }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm">{{ $keuangan->keterangan ?? '-' }}</td>
                                    <td class="px-6 py-4 text-sm">
                                        @if ($keuangan->image)
                                            <a href="{{ asset('storage/' . $keuangan->image) }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                                                Lihat Bukti
                                            </a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm font-bold 
                                        @if($keuangan->saldo >= 0) text-green-600 @else text-red-600 @endif">
                                        Rp {{ number_format($keuangan->saldo, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        @if (Auth::id() === $keuangan->user_id)
                                            <div class="flex space-x-2">
                                                <button 
                                                    type="button" 
                                                    onclick="openEditModal({{ $keuangan->id }})" 
                                                    class="text-blue-600 hover:text-blue-800 font-medium text-sm"
                                                >
                                                    Edit
                                                </button>
                                                <form action="{{ route('keuangan.destroy', $keuangan->id) }}" method="POST" class="inline" onsubmit="return confirm('Anda yakin ingin menghapus data ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-800 font-medium text-sm">Delete</button>
                                                </form>
                                            </div>
                                        @else
                                            <span class="text-gray-400 text-sm">No Access</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr class="border-t border-gray-200">
                                    <td colspan="7" class="px-6 py-8 text-sm text-center text-gray-500">
                                        Belum ada data keuangan
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                            @if($keuangansWithSaldo->count() > 0)
                            <tfoot class="bg-gray-200">
                                <tr>
                                    <td class="px-6 py-4 text-sm font-semibold">Total</td>
                                    <td class="px-6 py-4 text-sm font-semibold text-green-600">
                                        Rp {{ number_format($keuangansWithSaldo->where('jenis', 'masuk')->sum('uang'), 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 text-sm font-semibold text-red-600">
                                        Rp {{ number_format($keuangansWithSaldo->where('jenis', 'keluar')->sum('uang'), 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 text-sm font-semibold">-</td>
                                    <td class="px-6 py-4 text-sm font-semibold">-</td>
                                    <td class="px-6 py-4 text-sm font-bold 
                                        @php
                                            $totalMasuk = $keuangansWithSaldo->where('jenis', 'masuk')->sum('uang');
                                            $totalKeluar = $keuangansWithSaldo->where('jenis', 'keluar')->sum('uang');
                                            $totalSaldo = $totalMasuk - $totalKeluar;
                                        @endphp
                                        @if($totalSaldo >= 0) text-green-600 @else text-red-600 @endif">
                                        Rp {{ number_format($totalSaldo, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4"></td>
                                </tr>
                            </tfoot>
                            @endif
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        function openEditModal(id) {
            // Fetch data for the selected record
            fetch(`/keuangan/${id}/edit`, {
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Tidak memiliki akses atau terjadi kesalahan');
                }
                return response.json();
            })
            .then(data => {
                // Populate form fields
                document.getElementById('edit_nominal').value = data.uang;
                document.getElementById('edit_tanggal').value = data.tanggal;
                document.getElementById('edit_keterangan').value = data.keterangan || '';
                
                // Set the correct radio button
                const radioButtons = document.querySelectorAll('input[name="jenis"]');
                for (const radioButton of radioButtons) {
                    radioButton.checked = radioButton.value === data.jenis;
                }
                
                // Update form action URL
                document.getElementById('editForm').action = `/keuangan/${data.id}`;
                
                // Show the modal
                document.getElementById('editModal').classList.remove('hidden');
            })
            .catch(error => {
                console.error('Error fetching data:', error);
                alert('Terjadi kesalahan saat mengambil data: ' + error.message);
            });
        }
        
        function closeModal() {
            document.getElementById('editModal').classList.add('hidden');
            // Reset form
            document.getElementById('editForm').reset();
        }
        
        // Close modal when clicking outside of it
        document.getElementById('editModal').addEventListener('click', function(event) {
            if (event.target === this) {
                closeModal();
            }
        });
    </script>
</x-app-layout>