<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Laporan Kegiatan') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg border border-gray-100">
                <div class="p-8 text-gray-900">
                    
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('laporan_kegiatan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <!-- Kolom Form -->
                            <div class="space-y-6">
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-700">
                                        Nama Kegiatan <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="name" 
                                           value="{{ old('name') }}"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                           placeholder="Masukkan nama kegiatan" required>
                                </div>

                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-700">
                                        Tanggal <span class="text-red-500">*</span>
                                    </label>
                                    <input type="date" name="tanggal" 
                                           value="{{ old('tanggal') }}"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                </div>

                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-700">
                                        Keterangan <span class="text-red-500">*</span>
                                    </label>
                                    <textarea name="keterangan" rows="4" 
                                              class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                              placeholder="Masukkan keterangan kegiatan..." required>{{ old('keterangan') }}</textarea>
                                </div>

                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-700">
                                        Gambar Kegiatan <span class="text-red-500">*</span>
                                    </label>
                                    <input type="file" name="image" id="image" accept="image/*" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                    <p class="text-sm text-gray-500 mt-1">Format: JPG, JPEG, PNG (Max: 5MB)</p>
                                </div>

                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-700">
                                        Video Kegiatan <span class="text-gray-500">(Opsional)</span>
                                    </label>
                                    <input type="file" name="video" id="video" accept="video/*" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <p class="text-sm text-gray-500 mt-1">Format: MP4, AVI, MPEG (Max: 20MB)</p>
                                </div>

                                <div class="flex justify-end space-x-3 pt-6">
                                    <a href="{{ route('laporan_kegiatan.index') }}" 
                                       class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-md transition-colors">
                                        Batal
                                    </a>
                                    <button type="submit" 
                                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md transition-colors">
                                        Simpan Laporan
                                    </button>
                                </div>
                            </div>

                            <!-- Kolom Preview -->
                            <div class="space-y-6">
                                <!-- Preview Gambar -->
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-700 mb-3">Preview Gambar</h3>
                                    
                                    <div id="image-preview" class="hidden">
                                        <div class="border border-gray-300 rounded-lg p-4 bg-gray-50">
                                            <img id="preview-image" src="" alt="Preview Gambar" 
                                                 class="w-full h-64 object-cover rounded-lg shadow-md">
                                        </div>
                                        <p class="text-sm text-green-600 mt-2 text-center font-medium">
                                            ✓ Gambar siap diupload
                                        </p>
                                    </div>

                                    <div id="image-placeholder" class="block">
                                        <div class="border border-gray-300 rounded-lg p-4 bg-gray-50">
                                            <div class="w-full h-64 bg-gray-200 rounded-lg flex items-center justify-center">
                                                <div class="text-center">
                                                    <svg class="mx-auto w-16 h-16 text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 002 2v12a2 2 0 002 2z"></path>
                                                    </svg>
                                                    <span class="text-gray-500">Pilih gambar untuk melihat preview</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Preview Video -->
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-700 mb-3">Preview Video</h3>
                                    
                                    <div id="video-preview" class="hidden">
                                        <div class="border border-gray-300 rounded-lg p-4 bg-gray-50">
                                            <video id="preview-video" controls 
                                                   class="w-full h-64 rounded-lg shadow-md">
                                                <source src="" type="video/mp4">
                                                Browser Anda tidak mendukung video.
                                            </video>
                                        </div>
                                        <p class="text-sm text-green-600 mt-2 text-center font-medium">
                                            ✓ Video siap diupload
                                        </p>
                                        <button type="button" id="remove-video" 
                                                class="text-sm text-red-600 hover:text-red-800 underline mt-1 block mx-auto">
                                            Hapus Video
                                        </button>
                                    </div>

                                    <div id="video-placeholder" class="block">
                                        <div class="border border-gray-300 rounded-lg p-4 bg-gray-50">
                                            <div class="w-full h-64 bg-gray-200 rounded-lg flex items-center justify-center">
                                                <div class="text-center">
                                                    <svg class="mx-auto w-16 h-16 text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                                    </svg>
                                                    <span class="text-gray-500">Pilih video untuk melihat preview</span>
                                                    <p class="text-xs text-gray-400 mt-1">(Opsional)</p>
                                                </div>
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
    document.addEventListener('DOMContentLoaded', function() {
        const imageInput = document.getElementById('image');
        const videoInput = document.getElementById('video');
        const previewImage = document.getElementById('preview-image');
        const previewVideo = document.getElementById('preview-video');
        const imagePreview = document.getElementById('image-preview');
        const videoPreview = document.getElementById('video-preview');
        const imagePlaceholder = document.getElementById('image-placeholder');
        const videoPlaceholder = document.getElementById('video-placeholder');
        const removeVideoBtn = document.getElementById('remove-video');

        // Preview Gambar
        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            
            if (file) {
                // Validasi ukuran file (5MB)
                if (file.size > 5 * 1024 * 1024) {
                    alert('Ukuran gambar terlalu besar! Maksimal 5MB.');
                    this.value = '';
                    hideImagePreview();
                    return;
                }
                
                // Validasi tipe file
                const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
                if (!allowedTypes.includes(file.type)) {
                    alert('Format gambar tidak didukung! Gunakan JPG, JPEG, atau PNG.');
                    this.value = '';
                    hideImagePreview();
                    return;
                }
                
                // Tampilkan preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    showImagePreview();
                };
                reader.readAsDataURL(file);
                
            } else {
                hideImagePreview();
            }
        });

        // Preview Video
        videoInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            
            if (file) {
                // Validasi ukuran file (20MB)
                if (file.size > 20 * 1024 * 1024) {
                    alert('Ukuran video terlalu besar! Maksimal 20MB.');
                    this.value = '';
                    hideVideoPreview();
                    return;
                }
                
                // Validasi tipe file
                const allowedTypes = ['video/mp4', 'video/avi', 'video/mpeg'];
                if (!allowedTypes.includes(file.type)) {
                    alert('Format video tidak didukung! Gunakan MP4, AVI, atau MPEG.');
                    this.value = '';
                    hideVideoPreview();
                    return;
                }
                
                // Tampilkan preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewVideo.src = e.target.result;
                    showVideoPreview();
                };
                reader.readAsDataURL(file);
                
            } else {
                hideVideoPreview();
            }
        });

        // Hapus video
        removeVideoBtn.addEventListener('click', function() {
            videoInput.value = '';
            hideVideoPreview();
        });

        function showImagePreview() {
            imagePreview.classList.remove('hidden');
            imagePlaceholder.classList.add('hidden');
        }

        function hideImagePreview() {
            imagePreview.classList.add('hidden');
            imagePlaceholder.classList.remove('hidden');
            previewImage.src = '';
        }

        function showVideoPreview() {
            videoPreview.classList.remove('hidden');
            videoPlaceholder.classList.add('hidden');
        }

        function hideVideoPreview() {
            videoPreview.classList.add('hidden');
            videoPlaceholder.classList.remove('hidden');
            previewVideo.src = '';
        }
    });
    </script>
</x-app-layout>