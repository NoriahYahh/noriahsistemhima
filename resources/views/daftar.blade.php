<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Calon Pengurus - {{ $hima->nama }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #8a52e9;
            --primary-light: #a47ff0;
            --primary-dark: #6e35c9;
            --secondary: #ff7cb6;
            --text-dark: #333333;
            --text-light: #ffffff;
            --bg-light: #f8f5ff;
            --success: #28a745;
            --danger: #dc3545;
            --warning: #ffc107;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, var(--bg-light) 0%, #ffffff 100%);
            min-height: 100vh;
            color: var(--text-dark);
        }

        .form-container {
            background: white;
            border-radius: 25px;
            box-shadow: 0 20px 40px rgba(138, 82, 233, 0.1);
            padding: 40px;
            margin: 40px auto;
            max-width: 800px;
            position: relative;
            overflow: hidden;
        }

        .form-container::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent, rgba(138, 82, 233, 0.05), transparent);
            transform: rotate(45deg);
            pointer-events: none;
        }

        .form-header {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
        }

        .form-header h1 {
            color: var(--primary-dark);
            font-weight: 700;
            font-size: 2.2rem;
            margin-bottom: 10px;
            position: relative;
        }

        .form-header .subtitle {
            color: #666;
            font-size: 1.1rem;
            margin-bottom: 20px;
        }

        .form-header::after {
            content: '';
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            border-radius: 2px;
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-label {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            font-size: 0.95rem;
        }

        .form-label i {
            margin-right: 8px;
            color: var(--primary);
            width: 16px;
        }

        .form-control, .form-select {
            border: 2px solid #e9ecef;
            border-radius: 15px;
            padding: 12px 20px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: #fafafa;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(138, 82, 233, 0.15);
            background-color: white;
            transform: translateY(-2px);
        }

        .form-control:hover, .form-select:hover {
            border-color: var(--primary-light);
            background-color: white;
        }

        .form-control.is-invalid {
            border-color: var(--danger);
            background-color: #fff5f5;
        }

        .invalid-feedback {
            display: block;
            color: var(--danger);
            font-size: 0.875rem;
            margin-top: 5px;
        }

        .gender-select {
            position: relative;
        }

        .gender-select::after {
            content: '\f078';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary);
            pointer-events: none;
        }

        .file-input-wrapper {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .file-input {
            position: absolute;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .file-input-display {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            border: 2px dashed #e9ecef;
            border-radius: 15px;
            background-color: #fafafa;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .file-input-display:hover {
            border-color: var(--primary);
            background-color: rgba(138, 82, 233, 0.05);
        }

        .file-input-display i {
            color: var(--primary);
            margin-right: 10px;
            font-size: 1.2rem;
        }

        .file-input-text {
            color: #666;
            flex-grow: 1;
        }

        .required-indicator {
            color: var(--danger);
            margin-left: 3px;
        }

        .alert {
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 30px;
            position: relative;
        }

        .alert-danger {
            background: linear-gradient(135deg, #fee, #fdd);
            border: 1px solid #f5c6cb;
        }

        .alert-success {
            background: linear-gradient(135deg, #d4edda, #c3e6cb);
            border: 1px solid #c3e6cb;
        }

        .alert ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .alert li {
            padding: 5px 0;
            position: relative;
            padding-left: 20px;
        }

        .alert li::before {
            content: '•';
            position: absolute;
            left: 0;
            font-weight: bold;
        }

        .button-group {
            display: flex;
            gap: 15px;
            justify-content: flex-end;
            margin-top: 40px;
            flex-wrap: wrap;
        }

        .btn-custom {
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            border: 2px solid;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            min-width: 120px;
            justify-content: center;
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-color: var(--primary);
            color: white;
        }

        .btn-primary-custom:hover {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(138, 82, 233, 0.3);
            color: white;
        }

        .btn-secondary-custom {
            background: transparent;
            border-color: #6c757d;
            color: #6c757d;
        }

        .btn-secondary-custom:hover {
            background-color: #6c757d;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(108, 117, 125, 0.3);
        }

        .form-step-indicator {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }

        .step-item {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: #e9ecef;
            margin: 0 6px;
        }

        .step-item.active {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
        }

        .floating-elements {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
        }

        .floating-circle {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(138, 82, 233, 0.1), rgba(255, 124, 182, 0.1));
            animation: float 6s ease-in-out infinite;
        }

        .floating-circle:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-circle:nth-child(2) {
            width: 60px;
            height: 60px;
            top: 20%;
            right: 15%;
            animation-delay: 2s;
        }

        .floating-circle:nth-child(3) {
            width: 40px;
            height: 40px;
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }

        .navbar {
            background-color: white;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            padding: 15px 0;
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--primary);
            font-size: 1.5rem;
        }

        .nav-link {
            font-weight: 600;
            color: var(--text-dark);
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: var(--primary);
        }

        @media (max-width: 768px) {
            .form-container {
                margin: 20px;
                padding: 25px;
            }

            .form-header h1 {
                font-size: 1.8rem;
            }

            .button-group {
                flex-direction: column-reverse;
            }

            .btn-custom {
                width: 100%;
            }
        }

        .tooltip-custom {
            position: relative;
            display: inline-block;
            margin-left: 5px;
        }

        .tooltip-custom .tooltiptext {
            visibility: hidden;
            width: 200px;
            background-color: var(--primary-dark);
            color: white;
            text-align: center;
            border-radius: 10px;
            padding: 8px;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            margin-left: -100px;
            opacity: 0;
            transition: opacity 0.3s;
            font-size: 0.85rem;
        }

        .tooltip-custom:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-graduation-cap me-2"></i>
                {{ $hima->nama ?? 'Himpunan Mahasiswa' }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-home me-1"></i>Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-users me-1"></i>Calon Pengurus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-info-circle me-1"></i>Tentang</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="form-container">
            <!-- Floating Background Elements -->
            <div class="floating-elements">
                <div class="floating-circle"></div>
                <div class="floating-circle"></div>
                <div class="floating-circle"></div>
            </div>

            <!-- Form Header -->
            <div class="form-header">
                <h1><i class="fas fa-user-plus me-3"></i>Form Pendaftaran Calon Pengurus</h1>
                <p class="subtitle">Lengkapi data diri Anda untuk mendaftar sebagai calon pengurus {{ $hima->nama ?? 'Himpunan Mahasiswa' }}</p>
            </div>

            <!-- Progress Indicator -->
            <div class="form-step-indicator">
                <div class="step-item active"></div>
                <div class="step-item active"></div>
                <div class="step-item active"></div>
                <div class="step-item"></div>
            </div>

            <!-- Success Message -->
            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle me-2"></i>
                    <strong>Berhasil!</strong> {{ session('success') }}
                </div>
            @endif

            <!-- Error Messages -->
            @if($errors->any())
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong>Terdapat kesalahan dalam pengisian form:</strong>
                    <ul class="mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('daftar.store', $hima) }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-user"></i>
                                Nama Lengkap
                                <span class="required-indicator">*</span>
                            </label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" 
                                   placeholder="Masukkan nama lengkap Anda" 
                                   value="{{ old('nama') }}" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-id-card"></i>
                                Nomor Induk Mahasiswa (NIM)
                                <span class="required-indicator">*</span>
                            </label>
                            <input type="text" name="nim" class="form-control @error('nim') is-invalid @enderror" 
                                   placeholder="Contoh: 12345678901" 
                                   value="{{ old('nim') }}" required>
                            @error('nim')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-graduation-cap"></i>
                                Program Studi
                                <span class="required-indicator">*</span>
                            </label>
                            <input type="text" name="prodi" class="form-control @error('prodi') is-invalid @enderror" 
                                   placeholder="Contoh: Teknik Informatika" 
                                   value="{{ old('prodi') }}" required>
                            @error('prodi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-venus-mars"></i>
                                Jenis Kelamin
                                <span class="required-indicator">*</span>
                            </label>
                            <div class="gender-select">
                                <select name="jenkel" class="form-select @error('jenkel') is-invalid @enderror" required>
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="Laki-laki" {{ old('jenkel') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('jenkel') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            @error('jenkel')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
    {{-- Pilihan Posisi Pertama --}}
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label">
                <i class="fas fa-star"></i>
                Pilihan Posisi Pertama
                <span class="required-indicator">*</span>
                <div class="tooltip-custom">
                    <i class="fas fa-info-circle"></i>
                    <span class="tooltiptext">Pilihan posisi utama yang Anda inginkan dalam kepengurusan</span>
                </div>
            </label>
            <select name="pilihan1" class="form-select @error('pilihan1') is-invalid @enderror" required>
                <option value="">-- Pilih Posisi Pertama --</option>
                @foreach($jabatans as $jabatan)
                    <option value="{{ $jabatan->nama }}" {{ old('pilihan1') == $jabatan->nama ? 'selected' : '' }}>
                        {{ $jabatan->nama }}
                    </option>
                @endforeach
            </select>
            @error('pilihan1')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    {{-- Pilihan Posisi Kedua --}}
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label">
                <i class="fas fa-star-half-alt"></i>
                Pilihan Posisi Kedua
                <span class="required-indicator">*</span>
                <div class="tooltip-custom">
                    <i class="fas fa-info-circle"></i>
                    <span class="tooltiptext">Pilihan posisi alternatif jika pilihan pertama tidak tersedia</span>
                </div>
            </label>
            <select name="pilihan2" class="form-select @error('pilihan2') is-invalid @enderror" required>
                <option value="">-- Pilih Posisi Kedua --</option>
                @foreach($jabatans as $jabatan)
                    <option value="{{ $jabatan->nama }}" {{ old('pilihan2') == $jabatan->nama ? 'selected' : '' }}>
                        {{ $jabatan->nama }}
                    </option>
                @endforeach
            </select>
            @error('pilihan2')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>


                {{-- <!-- Optional: Jabatan Selection (if you want to use the dropdown) -->
                @if(isset($jabatans) && $jabatans->count() > 0)
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-briefcase"></i>
                        Pilih Jabatan (Opsional)
                        <div class="tooltip-custom">
                            <i class="fas fa-info-circle"></i>
                            <span class="tooltiptext">Pilih jabatan yang tersedia atau kosongkan jika ingin mengisi manual</span>
                        </div>
                    </label>
                    <select name="jabatan_id" class="form-select @error('jabatan_id') is-invalid @enderror">
                        <option value="">-- Pilih Jabatan (Opsional) --</option>
                        @foreach($jabatans as $jabatan)
                            <option value="{{ $jabatan->id }}" {{ old('jabatan_id') == $jabatan->id ? 'selected' : '' }}>
                                {{ $jabatan->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('jabatan_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                @endif --}}

                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-file-pdf"></i>
                        Unggah Berkas Pendukung
                        <div class="tooltip-custom">
                            <i class="fas fa-info-circle"></i>
                            <span class="tooltiptext">Format PDF/DOC/DOCX, maksimal 2MB. Berisi CV, surat motivasi, atau portofolio</span>
                        </div>
                    </label>
                    <div class="file-input-wrapper">
                        <input type="file" name="file" accept=".pdf,.doc,.docx" class="file-input @error('file') is-invalid @enderror">
                        <div class="file-input-display">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <span class="file-input-text">Klik untuk memilih file atau drag & drop file di sini</span>
                        </div>
                    </div>
                    @error('file')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted mt-1 d-block">
                        <i class="fas fa-info-circle me-1"></i>
                        Format yang didukung: PDF, DOC, DOCX (maksimal 2MB)
                    </small>
                </div>

                <!-- Action Buttons -->
                <div class="button-group">
                    <a href="{{ url()->previous() }}" class="btn-custom btn-secondary-custom">
                        <i class="fas fa-times"></i>
                        Batal
                    </a>
                    <button type="submit" class="btn-custom btn-primary-custom">
                        <i class="fas fa-save"></i>
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // File input enhancement
        document.querySelector('.file-input').addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name || 'Klik untuk memilih file atau drag & drop file di sini';
            document.querySelector('.file-input-text').textContent = fileName;
            
            if (e.target.files[0]) {
                document.querySelector('.file-input-display').style.borderColor = 'var(--primary)';
                document.querySelector('.file-input-display').style.backgroundColor = 'rgba(138, 82, 233, 0.05)';
            }
        });

        // Input animation enhancements
        document.querySelectorAll('.form-control, .form-select').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('focused');
            });
        });

        // Drag and drop functionality for file input
        const fileInputDisplay = document.querySelector('.file-input-display');
        const fileInput = document.querySelector('.file-input');

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            fileInputDisplay.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            fileInputDisplay.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            fileInputDisplay.addEventListener(eventName, unhighlight, false);
        });

        function highlight(e) {
            fileInputDisplay.style.borderColor = 'var(--primary)';
            fileInputDisplay.style.backgroundColor = 'rgba(138, 82, 233, 0.1)';
        }

        function unhighlight(e) {
            fileInputDisplay.style.borderColor = '#e9ecef';
            fileInputDisplay.style.backgroundColor = '#fafafa';
        }

        fileInputDisplay.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            
            if (files.length > 0) {
                const file = files[0];
                const allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
                
                if (allowedTypes.includes(file.type)) {
                    fileInput.files = files;
                    document.querySelector('.file-input-text').textContent = file.name;
                    fileInputDisplay.style.borderColor = 'var(--primary)';
                    fileInputDisplay.style.backgroundColor = 'rgba(138, 82, 233, 0.05)';
                } else {
                    alert('File harus berformat PDF, DOC, atau DOCX');
                }
            }
        }
    </script>
</body>

</html>