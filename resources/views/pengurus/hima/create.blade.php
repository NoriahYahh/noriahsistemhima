<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data HIMA') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="container p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold">Tambah Data HIMA</h1>
                        <a href="{{ route('hima.index') }}" 
                           class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                            Kembali
                        </a>
                    </div>

                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('hima.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Kolom Form -->
                            <div class="space-y-4">
                                
                                <div class="form-group">
                                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Upload Logo <span class="text-red-500">*</span></label>
                                    <input type="file" name="image" id="image" accept="image/*" required
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none p-2">
                                    <p class="text-sm text-gray-500 mt-1">Format yang didukung: JPG, JPEG, PNG (Max: 2MB)</p>
                                </div>

                                <div class="form-group">
                                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Organisasi</label>
                                    <input type="text" name="nama" id="nama" 
                                           value="{{ old('nama') }}"
                                           class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                           placeholder="Masukkan Nama Organisasi">
                                </div>

                                <div class="form-group">
                                    <label for="visi" class="block text-sm font-medium text-gray-700 mb-1">Visi <span class="text-red-500">*</span></label>
                                    <textarea name="visi" id="visi" rows="3" required
                                              class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                              placeholder="Masukkan Visi">{{ old('visi') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="misi" class="block text-sm font-medium text-gray-700 mb-1">Misi <span class="text-red-500">*</span></label>
                                    <textarea name="misi" id="misi" rows="3" required
                                              class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                              placeholder="Masukkan Misi">{{ old('misi') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="alur" class="block text-sm font-medium text-gray-700 mb-1">Alur Pendaftaran <span class="text-red-500">*</span></label>
                                    <textarea name="alur" id="alur" rows="3" required
                                              class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                              placeholder="Masukkan Alur Pendaftaran">{{ old('alur') }}</textarea>
                                </div>

                                <button type="submit" 
                                        class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                                    Simpan Data
                                </button>
                            </div>

                            <!-- Kolom Preview Logo -->
                            <div class="space-y-4">
                                <div id="logo-preview" class="hidden">
                                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Preview Logo</h3>
                                    <div class="border border-gray-300 rounded-lg p-4 bg-white">
                                        <img id="preview-image" src="" alt="Preview Logo" 
                                             class="w-full h-64 object-contain rounded-lg shadow-md">
                                    </div>
                                </div>

                                <div id="logo-placeholder" class="block">
                                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Preview Logo</h3>
                                    <div class="border border-gray-300 rounded-lg p-4 bg-white">
                                        <div class="w-full h-64 bg-gray-200 rounded-lg flex items-center justify-center">
                                            <div class="text-center">
                                                <svg class="mx-auto w-12 h-12 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                                <span class="text-gray-500">Pilih logo untuk melihat preview</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>
        // Preview logo saat file dipilih
        document.getElementById('logo').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview-image').src = e.target.result;
                    document.getElementById('logo-preview').classList.remove('hidden');
                    document.getElementById('logo-placeholder').classList.add('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                document.getElementById('logo-preview').classList.add('hidden');
                document.getElementById('logo-placeholder').classList.remove('hidden');
            }
        });
    </script>
</x-app-layout>