<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data HIMA') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="container p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold">Edit Data HIMA</h1>
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

                    <form action="{{ route('hima.update', $hima) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Kolom Form -->
                            <div class="space-y-4">
                                
                                <div class="form-group">
                                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Upload Logo Baru</label>
                                    <input type="file" name="image" id="image" accept="image/*"
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none p-2">
                                    <p class="text-sm text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengubah logo</p>
                                </div>

                                <div class="form-group">
                                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Organisasi</label>
                                    <input type="text" name="nama" id="nama" 
                                           value="{{ old('nama', $hima->nama) }}"
                                           class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                           placeholder="Masukkan Nama Organisasi" required>
                                </div>

                                <div class="form-group">
                                    <label for="visi" class="block text-sm font-medium text-gray-700 mb-1">Visi</label>
                                    <textarea name="visi" id="visi" rows="3"
                                              class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                              placeholder="Masukkan Visi" required>{{ old('visi', $hima->visi) }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="misi" class="block text-sm font-medium text-gray-700 mb-1">Misi</label>
                                    <textarea name="misi" id="misi" rows="3"
                                              class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                              placeholder="Masukkan Misi" required>{{ old('misi', $hima->misi) }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="alur" class="block text-sm font-medium text-gray-700 mb-1">Alur Pendaftaran</label>
                                    <textarea name="alur" id="alur" rows="3"
                                              class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                              placeholder="Masukkan Alur Pendaftaran" required>{{ old('alur', $hima->alur) }}</textarea>
                                </div>

                                <button type="submit" 
                                        class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                                    Simpan Perubahan
                                </button>
                            </div>

                            <!-- Kolom Preview Logo Saat Ini -->
                            <div class="space-y-4">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Logo Saat Ini</h3>
                                    @if($hima->image)
                                        <div class="border border-gray-300 rounded-lg p-4 bg-white">
                                            <img src="{{ asset('storage/' . $hima->image) }}" 
                                                 alt="Logo HIMA Saat Ini" 
                                                 class="w-full h-64 object-contain rounded-lg shadow-md">
                                        </div>
                                        <p class="text-sm text-gray-500 mt-2">
                                            File: {{ basename($hima->image) }}
                                        </p>
                                    @else
                                        <div class="border border-gray-300 rounded-lg p-4 bg-white">
                                            <div class="w-full h-64 bg-gray-200 rounded-lg flex items-center justify-center">
                                                <span class="text-gray-500">Tidak ada logo</span>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <!-- Preview logo baru saat dipilih -->
                                <div id="new-logo-preview" class="hidden">
                                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Preview Logo Baru</h3>
                                    <div class="border border-gray-300 rounded-lg p-4 bg-white">
                                        <img id="preview-image" src="" alt="Preview Logo Baru" 
                                             class="w-full h-64 object-contain rounded-lg shadow-md">
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
        // Preview logo baru saat file dipilih
        document.getElementById('logo').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview-image').src = e.target.result;
                    document.getElementById('new-logo-preview').classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                document.getElementById('new-logo-preview').classList.add('hidden');
            }
        });
    </script>
</x-app-layout>