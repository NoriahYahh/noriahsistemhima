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
            
            <form id="editForm" method="POST">
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
                
                <div class="mb-6">
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

                    <form action="{{ route('keuangan.store') }}" method="POST" class="mb-10">
                        @csrf
                        <div class="flex flex-wrap items-center space-x-4 mb-6">
                            <input 
                                type="number" 
                                name="nominal" 
                                placeholder="Rp.........." 
                                class="shadow-sm flex-1 min-w-[200px] px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                required
                            >
                            <input 
                                type="date" 
                                name="tanggal" 
                                class="shadow-sm flex-1 min-w-[200px] px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                value="{{ date('Y-m-d') }}"
                                required
                            >
                            <button 
                                type="submit" 
                                name="action" 
                                value="masuk"
                                class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded-md transition duration-200"
                            >
                                + Uang Masuk
                            </button>
                            <button 
                                type="submit" 
                                name="action" 
                                value="keluar"
                                class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded-md transition duration-200"
                            >
                                + Uang Keluar
                            </button>
                        </div>
                        @error('nominal')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        @error('tanggal')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </form>

                    <div class="overflow-x-auto">
                        <table class="w-full table-auto">
                            <thead class="bg-gray-400 text-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Tanggal</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Uang Masuk</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Uang Keluar</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Jumlah Uang</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-gray-100">
                                @forelse ($keuangansWithSaldo as $keuangan)
                                <tr class="border-t border-gray-200">
                                    <td class="px-6 py-4 text-sm">{{ $keuangan->tanggal }}</td>
                                    <td class="px-6 py-4 text-sm">
                                        @if ($keuangan->jenis === 'masuk')
                                            {{ $keuangan->formatted_uang }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        @if ($keuangan->jenis === 'keluar')
                                            {{ $keuangan->formatted_uang }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm">Rp {{ number_format($keuangan->saldo, 0, ',', '.') }}</td>
                                    <td class="px-6 py-4 text-sm flex space-x-4">
                                        @if (Auth::id() === $keuangan->user_id)
                                            <button 
                                                type="button" 
                                                onclick="openEditModal({{ $keuangan->id }})" 
                                                class="text-blue-600 hover:text-blue-800 font-medium"
                                            >
                                                Edit
                                            </button>
                                            <form action="{{ route('keuangan.destroy', $keuangan->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus data ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800 font-medium">Delete</button>
                                            </form>
                                        @else
                                            <span class="text-gray-400">No Access</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr class="border-t border-gray-200">
                                    <td colspan="5" class="px-6 py-4 text-sm text-center">Belum ada data keuangan</td>
                                </tr>
                                @endforelse
                            </tbody>
                            <tfoot class="bg-gray-200">
                                <tr>
                                    <td class="px-6 py-4 text-sm font-semibold">Total</td>
                                    <td class="px-6 py-4 text-sm font-semibold">
                                        Rp {{ number_format($keuangansWithSaldo->where('jenis', 'masuk')->sum('uang'), 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 text-sm font-semibold">
                                        Rp {{ number_format($keuangansWithSaldo->where('jenis', 'keluar')->sum('uang'), 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 text-sm font-semibold">
                                        @php
                                            $totalMasuk = $keuangansWithSaldo->where('jenis', 'masuk')->sum('uang');
                                            $totalKeluar = $keuangansWithSaldo->where('jenis', 'keluar')->sum('uang');
                                            $totalSaldo = $totalMasuk - $totalKeluar;
                                        @endphp
                                        Rp {{ number_format($totalSaldo, 0, ',', '.') }}
                                    </td>
                                    <td></td>
                                </tr>
                            </tfoot>
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
            .then(response => response.json())
            .then(data => {
                // Populate form fields
                document.getElementById('edit_nominal').value = data.uang;
                document.getElementById('edit_tanggal').value = data.tanggal;
                
                // Set the correct radio button
                const radioButtons = document.querySelectorAll('input[name="jenis"]');
                for (const radioButton of radioButtons) {
                    if (radioButton.value === data.jenis) {
                        radioButton.checked = true;
                    }
                }
                
                // Update form action URL
                document.getElementById('editForm').action = `/keuangan/${data.id}`;
                
                // Show the modal
                document.getElementById('editModal').classList.remove('hidden');
            })
            .catch(error => {
                console.error('Error fetching data:', error);
                alert('Terjadi kesalahan saat mengambil data. Silakan coba lagi.');
            });
        }
        
        function closeModal() {
            document.getElementById('editModal').classList.add('hidden');
        }
        
        // Close modal when clicking outside of it (optional)
        document.getElementById('editModal').addEventListener('click', function(event) {
            if (event.target === this) {
                closeModal();
            }
        });
    </script>
</x-app-layout>