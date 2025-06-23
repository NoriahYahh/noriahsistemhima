<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Pengurus') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-100">
                <div class="p-8 text-gray-900">
                    <div class="flex items-center justify-between mb-10">
                        <h1 class="text-2xl font-bold text-gray-800">Edit Data Pengurus</h1>
                        <a href="{{ route('data_pengurus.index') }}" 
                           class="bg-gray-500 hover:bg-gray-600 text-white font-medium py-2 px-4 rounded-md transition duration-200">
                            ← Kembali
                        </a>
                    </div>

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

                    <form action="{{ route('data_pengurus.update', $dataPengurus->id) }}" method="POST" enctype="multipart/form-data"
                        class="space-y-6">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">Nama</label>
                                <input type="text" name="nama" placeholder="Nama Lengkap"
                                    class="shadow-sm block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('nama') border-red-500 @enderror"
                                    value="{{ old('nama', $dataPengurus->nama) }}" required>
                                @error('nama')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">NRP</label>
                                <input type="text" name="nrp" placeholder="NRP"
                                    class="shadow-sm block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('nrp') border-red-500 @enderror"
                                    value="{{ old('nrp', $dataPengurus->nrp) }}" required>
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
                                            {{ old('jabatan_id', $dataPengurus->jabatan_id) == $jabatan->id ? 'selected' : '' }}>
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
                                    value="{{ old('periode', $dataPengurus->periode) }}" required>
                                @error('periode')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="md:col-span-2">
                                <label class="block mb-2 text-sm font-medium text-gray-700">Image</label>
                                
                                <!-- Preview gambar lama jika ada -->
                                @if($dataPengurus->image)
                                    <div class="mb-4">
                                        <p class="text-sm text-gray-600 mb-2">Gambar saat ini:</p>
                                        <div class="relative inline-block">
                                            <img src="{{ Storage::url($dataPengurus->image) }}" 
                                                 alt="Current Image" 
                                                 class="w-32 h-32 object-cover border border-gray-300 rounded-lg shadow-sm">
                                            <div class="absolute top-0 right-0 bg-gray-800 text-white text-xs px-2 py-1 rounded-bl-lg">
                                                Current
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                
                                <input type="file" name="image" id="image"
                                    class="shadow-sm block w-full text-sm text-gray-700 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('image') border-red-500 @enderror"
                                    accept="image/*">
                                <p class="text-xs text-gray-500 mt-1">
                                    Biarkan kosong jika tidak ingin mengubah gambar. Format yang diizinkan: JPEG, PNG, JPG, GIF (Max: 2MB)
                                </p>
                                @error('image')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                                
                                <!-- Preview gambar baru -->
                                <div id="imagePreview" class="mt-4 hidden">
                                    <p class="text-sm text-gray-600 mb-2">Preview gambar baru:</p>
                                    <img id="previewImg" src="" alt="Preview" 
                                         class="w-32 h-32 object-cover border border-gray-300 rounded-lg shadow-sm">
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                            <a href="{{ route('data_pengurus.index') }}" 
                               class="bg-gray-500 hover:bg-gray-600 text-white font-medium py-2 px-6 rounded-md transition duration-200">
                                Batal
                            </a>
                            <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-md transition duration-200">
                                💾 Update Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Preview image when file is selected
        document.getElementById('image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('previewImg').src = e.target.result;
                    document.getElementById('imagePreview').classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            } else {
                document.getElementById('imagePreview').classList.add('hidden');
            }
        });

        // Auto focus on first input
        document.querySelector('input[name="nama"]').focus();
    </script>
</x-app-layout>