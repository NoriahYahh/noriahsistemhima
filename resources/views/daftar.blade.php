<x-guest-layout>
    <div class="min-h-screen bg-gradient-to-br from-blue-500 via-purple-500 to-indigo-600 py-12 px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Form Container -->
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden relative">
                
                <!-- Decorative Elements -->
                <div class="absolute top-0 right-0 w-40 h-40 bg-gradient-to-br from-purple-400 to-pink-400 rounded-full opacity-10 -translate-y-20 translate-x-20"></div>
                <div class="absolute bottom-0 left-0 w-32 h-32 bg-gradient-to-tr from-blue-400 to-cyan-400 rounded-full opacity-10 translate-y-16 -translate-x-16"></div>
                
                <!-- Header Section -->
                <div class="bg-gradient-to-r from-indigo-600 to-purple-600 p-8 text-white relative">
                    <div class="relative z-10">
                        <h1 class="text-3xl font-bold flex items-center gap-3 mb-3">
                            <i class="fas fa-user-plus"></i>
                            Form Pendaftaran Calon Pengurus
                        </h1>
                        <p class="text-indigo-100 text-lg">
                            Lengkapi data diri Anda untuk mendaftar sebagai calon pengurus {{ $hima->nama ?? 'Himpunan Mahasiswa' }}
                        </p>
                    </div>
                    <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-5 rounded-full -translate-y-32 translate-x-32"></div>
                </div>

                {{--  --}}

                <!-- Alert Messages -->
                <div class="px-8 pt-6">
                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="bg-green-50 border border-green-200 rounded-xl p-4 mb-6">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                <div>
                                    <h4 class="text-green-800 font-semibold">Berhasil!</h4>
                                    <p class="text-green-700 text-sm">{{ session('success') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Error Messages -->
                    @if($errors->any())
                        <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-6">
                            <div class="flex items-start">
                                <i class="fas fa-exclamation-triangle text-red-500 mr-3 mt-0.5"></i>
                                <div>
                                    <h4 class="text-red-800 font-semibold mb-2">Terdapat kesalahan dalam pengisian form:</h4>
                                    <ul class="text-red-700 text-sm space-y-1">
                                        @foreach($errors->all() as $error)
                                            <li>• {{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Form Content -->
                <div class="p-8">
                    <form action="{{ route('daftar.store', $hima) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                        @csrf
                        
                        <!-- Personal Information Section -->
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                                <i class="fas fa-user-circle text-indigo-600 mr-3"></i>
                                Informasi Pribadi
                            </h3>
                            
                            <div class="grid md:grid-cols-2 gap-6">
                                <!-- Nama Lengkap -->
                                <div class="space-y-2">
                                    <label class="flex items-center text-sm font-semibold text-gray-700">
                                        <i class="fas fa-user text-indigo-500 mr-2"></i>
                                        Nama Lengkap
                                        <span class="text-red-500 ml-1">*</span>
                                    </label>
                                    <div class="relative">
                                        <input type="text" name="nama" 
                                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors placeholder-gray-400 @error('nama') border-red-300 @enderror"
                                               placeholder="Masukkan nama lengkap Anda" 
                                               value="{{ old('nama') }}" required>
                                        @error('nama')
                                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- NIM -->
                                <div class="space-y-2">
                                    <label class="flex items-center text-sm font-semibold text-gray-700">
                                        <i class="fas fa-id-card text-indigo-500 mr-2"></i>
                                        Nomor Induk Mahasiswa (NIM)
                                        <span class="text-red-500 ml-1">*</span>
                                    </label>
                                    <input type="text" name="nim" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors placeholder-gray-400 @error('nim') border-red-300 @enderror"
                                           placeholder="Contoh: 12345678901" 
                                           value="{{ old('nim') }}" required>
                                    @error('nim')
                                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Program Studi -->
                                <div class="space-y-2">
                                    <label class="flex items-center text-sm font-semibold text-gray-700">
                                        <i class="fas fa-graduation-cap text-indigo-500 mr-2"></i>
                                        Program Studi
                                        <span class="text-red-500 ml-1">*</span>
                                    </label>
                                    <input type="text" name="prodi" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors placeholder-gray-400 @error('prodi') border-red-300 @enderror"
                                           placeholder="Contoh: Teknik Informatika" 
                                           value="{{ old('prodi') }}" required>
                                    @error('prodi')
                                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Jenis Kelamin -->
                                <div class="space-y-2">
                                    <label class="flex items-center text-sm font-semibold text-gray-700">
                                        <i class="fas fa-venus-mars text-indigo-500 mr-2"></i>
                                        Jenis Kelamin
                                        <span class="text-red-500 ml-1">*</span>
                                    </label>
                                    <select name="jenkel" 
                                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors @error('jenkel') border-red-300 @enderror" required>
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="Laki-laki" {{ old('jenkel') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ old('jenkel') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('jenkel')
                                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Position Selection Section -->
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                                <i class="fas fa-star text-indigo-600 mr-3"></i>
                                Pilihan Posisi Kepengurusan
                            </h3>
                            
                            <div class="grid md:grid-cols-2 gap-6">
                                <!-- Pilihan Posisi Pertama -->
                                <div class="space-y-2">
                                    <label class="flex items-center text-sm font-semibold text-gray-700">
                                        <i class="fas fa-trophy text-yellow-500 mr-2"></i>
                                        Pilihan Posisi Pertama
                                        <span class="text-red-500 ml-1">*</span>
                                        <div class="group relative ml-2">
                                            <i class="fas fa-info-circle text-gray-400 cursor-help"></i>
                                            <div class="invisible group-hover:visible absolute bottom-6 left-0 bg-gray-800 text-white text-xs rounded py-1 px-2 whitespace-nowrap z-10">
                                                Pilihan posisi utama yang Anda inginkan
                                            </div>
                                        </div>
                                    </label>
                                    <select name="pilihan1" 
                                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors @error('pilihan1') border-red-300 @enderror" required>
                                        <option value="">-- Pilih Posisi Pertama --</option>
                                        @if(isset($jabatans))
                                            @foreach($jabatans as $jabatan)
                                                <option value="{{ $jabatan->nama }}" {{ old('pilihan1') == $jabatan->nama ? 'selected' : '' }}>
                                                    {{ $jabatan->nama }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option value="Ketua" {{ old('pilihan1') == 'Ketua' ? 'selected' : '' }}>Ketua</option>
                                            <option value="Wakil Ketua" {{ old('pilihan1') == 'Wakil Ketua' ? 'selected' : '' }}>Wakil Ketua</option>
                                            <option value="Sekretaris" {{ old('pilihan1') == 'Sekretaris' ? 'selected' : '' }}>Sekretaris</option>
                                            <option value="Bendahara" {{ old('pilihan1') == 'Bendahara' ? 'selected' : '' }}>Bendahara</option>
                                            <option value="Koordinator Divisi" {{ old('pilihan1') == 'Koordinator Divisi' ? 'selected' : '' }}>Koordinator Divisi</option>
                                            <option value="Anggota" {{ old('pilihan1') == 'Anggota' ? 'selected' : '' }}>Anggota</option>
                                        @endif
                                    </select>
                                    @error('pilihan1')
                                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Pilihan Posisi Kedua -->
                                <div class="space-y-2">
                                    <label class="flex items-center text-sm font-semibold text-gray-700">
                                        <i class="fas fa-medal text-gray-500 mr-2"></i>
                                        Pilihan Posisi Kedua
                                        <span class="text-red-500 ml-1">*</span>
                                        <div class="group relative ml-2">
                                            <i class="fas fa-info-circle text-gray-400 cursor-help"></i>
                                            <div class="invisible group-hover:visible absolute bottom-6 left-0 bg-gray-800 text-white text-xs rounded py-1 px-2 whitespace-nowrap z-10">
                                                Pilihan alternatif jika pilihan pertama tidak tersedia
                                            </div>
                                        </div>
                                    </label>
                                    <select name="pilihan2" 
                                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors @error('pilihan2') border-red-300 @enderror" required>
                                        <option value="">-- Pilih Posisi Kedua --</option>
                                        @if(isset($jabatans))
                                            @foreach($jabatans as $jabatan)
                                                <option value="{{ $jabatan->nama }}" {{ old('pilihan2') == $jabatan->nama ? 'selected' : '' }}>
                                                    {{ $jabatan->nama }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option value="Ketua" {{ old('pilihan2') == 'Ketua' ? 'selected' : '' }}>Ketua</option>
                                            <option value="Wakil Ketua" {{ old('pilihan2') == 'Wakil Ketua' ? 'selected' : '' }}>Wakil Ketua</option>
                                            <option value="Sekretaris" {{ old('pilihan2') == 'Sekretaris' ? 'selected' : '' }}>Sekretaris</option>
                                            <option value="Bendahara" {{ old('pilihan2') == 'Bendahara' ? 'selected' : '' }}>Bendahara</option>
                                            <option value="Koordinator Divisi" {{ old('pilihan2') == 'Koordinator Divisi' ? 'selected' : '' }}>Koordinator Divisi</option>
                                            <option value="Anggota" {{ old('pilihan2') == 'Anggota' ? 'selected' : '' }}>Anggota</option>
                                        @endif
                                    </select>
                                    @error('pilihan2')
                                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Optional Jabatan Selection -->
                        @if(isset($jabatans) && $jabatans->count() > 0)
                        <div>
                            <div class="space-y-2">
                                <label class="flex items-center text-sm font-semibold text-gray-700">
                                    <i class="fas fa-briefcase text-indigo-500 mr-2"></i>
                                    Pilih Jabatan (Opsional)
                                    <div class="group relative ml-2">
                                        <i class="fas fa-info-circle text-gray-400 cursor-help"></i>
                                        <div class="invisible group-hover:visible absolute bottom-6 left-0 bg-gray-800 text-white text-xs rounded py-1 px-2 whitespace-nowrap z-10">
                                            Pilih jabatan yang tersedia atau kosongkan jika ingin mengisi manual
                                        </div>
                                    </div>
                                </label>
                                <select name="jabatan_id" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors @error('jabatan_id') border-red-300 @enderror">
                                    <option value="">-- Pilih Jabatan (Opsional) --</option>
                                    @foreach($jabatans as $jabatan)
                                        <option value="{{ $jabatan->id }}" {{ old('jabatan_id') == $jabatan->id ? 'selected' : '' }}>
                                            {{ $jabatan->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('jabatan_id')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @endif

                        <!-- File Upload Section -->
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                                <i class="fas fa-file-upload text-indigo-600 mr-3"></i>
                                Berkas Pendukung
                            </h3>
                            
                            <div class="space-y-2">
                                <label class="flex items-center text-sm font-semibold text-gray-700">
                                    <i class="fas fa-file-pdf text-red-500 mr-2"></i>
                                    Unggah Berkas Pendukung
                                    <div class="group relative ml-2">
                                        <i class="fas fa-info-circle text-gray-400 cursor-help"></i>
                                        <div class="invisible group-hover:visible absolute bottom-6 left-0 bg-gray-800 text-white text-xs rounded py-1 px-2 whitespace-nowrap z-10">
                                            Format PDF/DOC/DOCX, maksimal 2MB
                                        </div>
                                    </div>
                                </label>
                                
                                <!-- File Upload Area -->
                                <div class="relative">
                                    <input type="file" name="file" accept=".pdf,.doc,.docx" class="hidden @error('file') border-red-300 @enderror" id="file-input">
                                    <div class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center hover:border-indigo-400 transition-colors cursor-pointer" 
                                         onclick="document.getElementById('file-input').click()">
                                        <div class="space-y-4">
                                            <div class="mx-auto w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center">
                                                <i class="fas fa-cloud-upload-alt text-indigo-600 text-2xl"></i>
                                            </div>
                                            <div>
                                                <p class="text-gray-600 font-medium">Klik untuk memilih file atau drag & drop</p>
                                                <p class="text-gray-400 text-sm mt-1">PDF, DOC, DOCX (maksimal 2MB)</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Selected File Display -->
                                    <div class="hidden mt-4 p-4 bg-green-50 border border-green-200 rounded-xl" id="file-selected">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center space-x-3">
                                                <i class="fas fa-file-pdf text-red-500"></i>
                                                <div>
                                                    <p class="font-medium text-gray-900" id="file-name">document.pdf</p>
                                                    <p class="text-sm text-gray-500" id="file-size">2.1 MB</p>
                                                </div>
                                            </div>
                                            <button type="button" class="text-red-500 hover:text-red-700" onclick="removeFile()">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                                @error('file')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                                
                                <p class="text-sm text-gray-500 flex items-center">
                                    <i class="fas fa-info-circle mr-2"></i>
                                    Berisi CV, surat motivasi, atau portofolio
                                </p>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                            <a href="{{ url()->previous() }}" 
                               class="flex-1 px-6 py-3 border border-gray-300 text-gray-700 rounded-xl font-semibold hover:bg-gray-50 transition-colors flex items-center justify-center">
                                <i class="fas fa-times mr-2"></i>
                                Batal
                            </a>
                            <button type="submit" 
                                    class="flex-1 px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl font-semibold hover:from-indigo-700 hover:to-purple-700 transition-all transform hover:scale-105 flex items-center justify-center shadow-lg">
                                <i class="fas fa-save mr-2"></i>
                                Simpan Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // File input functionality
        document.getElementById('file-input').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                // Show selected file
                document.getElementById('file-selected').classList.remove('hidden');
                document.getElementById('file-name').textContent = file.name;
                document.getElementById('file-size').textContent = (file.size / 1024 / 1024).toFixed(1) + ' MB';
                
                // Validate file type and size
                const allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
                if (!allowedTypes.includes(file.type)) {
                    alert('File harus berformat PDF, DOC, atau DOCX');
                    removeFile();
                    return;
                }
                
                if (file.size > 2 * 1024 * 1024) {
                    alert('Ukuran file tidak boleh lebih dari 2MB');
                    removeFile();
                    return;
                }
            }
        });

        function removeFile() {
            document.getElementById('file-input').value = '';
            document.getElementById('file-selected').classList.add('hidden');
        }

        // Form validation
        document.querySelectorAll('input[required], select[required]').forEach(field => {
            field.addEventListener('blur', function() {
                if (this.value.trim() !== '') {
                    this.classList.remove('border-red-300');
                    this.classList.add('border-green-300');
                } else {
                    this.classList.remove('border-green-300');
                    this.classList.add('border-red-300');
                }
            });
        });

        // Prevent same position selection
        document.querySelector('select[name="pilihan1"]').addEventListener('change', function() {
            const pilihan2 = document.querySelector('select[name="pilihan2"]');
            const selectedValue = this.value;
            
            // Reset pilihan2 if same as pilihan1
            if (pilihan2.value === selectedValue) {
                pilihan2.value = '';
            }
        });

        document.querySelector('select[name="pilihan2"]').addEventListener('change', function() {
            const pilihan1 = document.querySelector('select[name="pilihan1"]');
            const selectedValue = this.value;
            
            // Reset pilihan1 if same as pilihan2
            if (pilihan1.value === selectedValue) {
                pilihan1.value = '';
            }
        });

        // Drag and drop functionality
        const dropZone = document.querySelector('[onclick*="file-input"]');
        
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            dropZone.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, unhighlight, false);
        });

        function highlight() {
            dropZone.classList.add('border-indigo-400', 'bg-indigo-50');
        }

        function unhighlight() {
            dropZone.classList.remove('border-indigo-400', 'bg-indigo-50');
        }

        dropZone.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            
            if (files.length > 0) {
                document.getElementById('file-input').files = files;
                document.getElementById('file-input').dispatchEvent(new Event('change'));
            }
        }
    </script>
</x-guest-layout>