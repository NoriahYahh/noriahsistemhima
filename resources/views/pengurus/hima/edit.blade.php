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

                    <form action="{{ route('hima.update', $hima->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Kolom Form -->
                            <div class="space-y-4">

                                <div class="form-group">
                                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">
                                        Upload Logo Baru
                                        <span class="text-gray-500 text-xs">(Kosongkan jika tidak ingin mengubah)</span>
                                    </label>
                                    <input type="file" name="image" id="image" accept="image/*"
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none p-2">
                                    <p class="text-sm text-gray-500 mt-1">Format yang didukung: JPG, JPEG, PNG (Max:
                                        2MB)</p>

                                    <!-- Tombol Reset untuk kembali ke logo lama -->
                                    <button type="button" id="reset-logo"
                                        class="mt-2 text-sm text-blue-600 hover:text-blue-800 underline">
                                        Reset ke Logo Lama
                                    </button>
                                </div>

                                <div class="form-group">
                                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama
                                        Organisasi</label>
                                    <input type="text" name="nama" id="nama"
                                        value="{{ old('nama', $hima->nama) }}"
                                        class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        placeholder="Masukkan Nama Organisasi">
                                </div>

                                <div class="form-group">
                                    <label for="visi" class="block text-sm font-medium text-gray-700 mb-1">Visi
                                        <span class="text-red-500">*</span></label>
                                    <textarea name="visi" id="visi" rows="3" required
                                        class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        placeholder="Masukkan Visi">{{ old('visi', $hima->visi) }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="misi" class="block text-sm font-medium text-gray-700 mb-1">Misi
                                        <span class="text-red-500">*</span></label>
                                    <textarea name="misi" id="misi" rows="3" required
                                        class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        placeholder="Masukkan Misi">{{ old('misi', $hima->misi) }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="alur" class="block text-sm font-medium text-gray-700 mb-1">Alur
                                        Pendaftaran <span class="text-red-500">*</span></label>
                                    <textarea name="alur" id="alur" rows="3"
                                        class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        placeholder="Masukkan Alur Pendaftaran">{{ old('alur', $hima->alur) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="pendaftaran_dibuka" class="inline-flex items-center">
                                        <input type="checkbox" name="pendaftaran_dibuka" id="pendaftaran_dibuka"
                                            value="1"
                                            {{ old('pendaftaran_dibuka', $hima->pendaftaran_dibuka) ? 'checked' : '' }}
                                            class="rounded text-blue-600 border-gray-300 focus:ring-blue-500">
                                        <span class="ml-2 text-sm text-gray-700">Buka Pendaftaran</span>
                                    </label>
                                </div>

                                <button type="submit"
                                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                                    Update Data
                                </button>
                            </div>

                            <!-- Kolom Preview Logo -->
                            <div class="space-y-4">
                                <div id="logo-preview" class="hidden">
                                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Preview Logo</h3>
                                    <div class="border border-gray-300 rounded-lg p-4 bg-white">
                                        <img id="preview-image" src="{{ asset('storage/' . $hima->image) }}"
                                            alt="Preview Logo"
                                            data-existing-logo="{{ $hima->image ? asset('storage/' . $hima->image) : '' }}"
                                            class="w-full h-64 object-contain rounded-lg shadow-md">
                                    </div>
                                    <p class="text-sm text-gray-600 mt-2 text-center">
                                        <span id="preview-status">Logo Saat Ini</span>
                                    </p>
                                </div>

                                <div id="logo-placeholder" class="block">
                                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Preview Logo</h3>
                                    <div class="border border-gray-300 rounded-lg p-4 bg-white">
                                        <div
                                            class="w-full h-64 bg-gray-200 rounded-lg flex items-center justify-center">
                                            <div class="text-center">
                                                <svg class="mx-auto w-12 h-12 text-gray-400 mb-2" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                                <span class="text-gray-500">Tidak ada logo</span>
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
            const previewImage = document.getElementById('preview-image');
            const logoPreview = document.getElementById('logo-preview');
            const logoPlaceholder = document.getElementById('logo-placeholder');
            const previewStatus = document.getElementById('preview-status');

            // Fungsi untuk menampilkan preview
            function showPreview(imageSrc, isNew = false) {
                previewImage.src = imageSrc;
                logoPreview.classList.remove('hidden');
                logoPlaceholder.classList.add('hidden');
                previewStatus.textContent = isNew ? 'Logo Baru (Belum Disimpan)' : 'Logo Saat Ini';
                previewStatus.className = isNew ? 'text-sm text-blue-600 mt-2 text-center font-medium' :
                    'text-sm text-gray-600 mt-2 text-center';
            }

            // Fungsi untuk menyembunyikan preview
            function hidePreview() {
                logoPreview.classList.add('hidden');
                logoPlaceholder.classList.remove('hidden');
                previewImage.src = '';
            }

            // Ambil logo yang sudah ada
            const existingLogo = previewImage.getAttribute('data-existing-logo');
            if (existingLogo && existingLogo.trim() !== '') {
                showPreview(existingLogo, false);
            }

            // Event listener untuk input file
            imageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];

                if (file) {
                    // Validasi ukuran file (max 2MB)
                    if (file.size > 2 * 1024 * 1024) {
                        alert('Ukuran file terlalu besar! Maksimal 2MB.');
                        this.value = '';

                        // Kembalikan ke logo lama jika ada
                        if (existingLogo && existingLogo.trim() !== '') {
                            showPreview(existingLogo, false);
                        } else {
                            hidePreview();
                        }
                        return;
                    }

                    // Validasi tipe file
                    const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
                    if (!allowedTypes.includes(file.type)) {
                        alert('Format file tidak didukung! Gunakan JPG, JPEG, atau PNG.');
                        this.value = '';

                        // Kembalikan ke logo lama jika ada
                        if (existingLogo && existingLogo.trim() !== '') {
                            showPreview(existingLogo, false);
                        } else {
                            hidePreview();
                        }
                        return;
                    }

                    // Tampilkan preview file baru
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        showPreview(e.target.result, true);
                    };
                    reader.readAsDataURL(file);

                } else {
                    // Jika tidak ada file dipilih, kembalikan ke logo lama atau placeholder
                    if (existingLogo && existingLogo.trim() !== '') {
                        showPreview(existingLogo, false);
                    } else {
                        hidePreview();
                    }
                }
            });

            // Event listener untuk tombol reset
            const resetButton = document.getElementById('reset-logo');
            if (resetButton) {
                resetButton.addEventListener('click', function() {
                    imageInput.value = '';
                    if (existingLogo && existingLogo.trim() !== '') {
                        showPreview(existingLogo, false);
                    } else {
                        hidePreview();
                    }
                });
            }
        });
    </script>
</x-app-layout>
