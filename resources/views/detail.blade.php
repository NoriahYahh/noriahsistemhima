
<!-- HTML Template yang diupdate -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Himpunan Mahasiswa</title>
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
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
            line-height: 1.6;
        }

        .navbar {
            background-color: #e8e8e8;
            padding: 15px 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .navbar-nav .nav-link {
            color: var(--text-dark);
            font-weight: 500;
            padding: 8px 15px;
            margin: 0 5px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            background-color: var(--primary);
            color: white;
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--primary);
            font-size: 1.5rem;
        }

        .hero-section {
            background-color: white;
            padding: 60px 0;
            text-align: center;
            margin-bottom: 40px;
        }

        .hero-logo {
            width: 200px;
            height: 200px;
            background-color: #c4c4c4;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            font-size: 2rem;
            font-weight: bold;
            color: #666;
            object-fit: cover;
        }

        .section-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 30px;
            text-align: center;
        }

        .vision-mission {
            background-color: white;
            padding: 40px;
            border-radius: 15px;
            margin-bottom: 40px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .vision-mission h3 {
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 20px;
        }

        .vision-mission p {
            text-align: justify;
            margin-bottom: 20px;
        }

        .activities-section {
            margin: 60px 0;
        }

        .activity-card {
            background-color: #c4c4c4;
            height: 200px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            font-size: 4rem;
            color: #666;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .activity-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 15px;
        }

        .activity-card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        }

        .activity-title {
            text-align: center;
            font-weight: 600;
            margin-top: 10px;
        }

        .structure-section {
            margin: 60px 0;
        }

        .structure-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }

        .structure-card {
            background-color: #c4c4c4;
            height: 150px;
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            font-weight: bold;
            color: #666;
            transition: all 0.3s ease;
            cursor: pointer;
            padding: 15px;
            text-align: center;
        }

        .structure-card:hover {
            background-color: var(--primary);
            color: white;
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        }

        .structure-card .position {
            font-size: 1rem;
            margin-bottom: 5px;
        }

        .structure-card .name {
            font-size: 0.9rem;
            font-weight: normal;
        }

        .description-box {
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-bottom: 40px;
        }

        .announcement-section {
            margin: 60px 0;
        }

        .btn-group-custom {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 40px;
            flex-wrap: wrap;
        }

        .btn-announcement {
            background-color: #e8e8e8;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: 600;
            color: var(--text-dark);
            transition: all 0.3s ease;
        }

        .btn-announcement:hover, .btn-announcement.active {
            background-color: var(--primary);
            color: white;
        }

        .registration-flow {
            background-color: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            text-align: center;
        }

        .flow-steps {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 30px 0;
            flex-wrap: wrap;
        }

        .flow-step {
            flex: 1;
            padding: 0 15px;
            min-width: 150px;
            margin: 10px 0;
        }

        .flow-step h5 {
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 10px;
        }

        .flow-arrow {
            color: var(--primary);
            font-size: 1.5rem;
            margin: 0 10px;
        }

        .btn-register {
            background-color: #e8e8e8;
            border: none;
            padding: 15px 40px;
            border-radius: 10px;
            font-weight: 700;
            color: var(--text-dark);
            font-size: 1.1rem;
            transition: all 0.3s ease;
            margin-top: 30px;
        }

        .btn-register:hover {
            background-color: var(--primary);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        }

        @media (max-width: 768px) {
            .flow-steps {
                flex-direction: column;
            }
            
            .flow-arrow {
                transform: rotate(90deg);
                margin: 20px 0;
            }
            
            .btn-group-custom {
                flex-direction: column;
                align-items: center;
            }
            
            .btn-announcement {
                width: 200px;
            }
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">Himpunan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/" onclick="navigateTo('home')">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="navigateTo('about')">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="navigateTo('kegiatan')">Kegiatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="navigateTo('pengurus')">Pengurus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="navigateTo('pengumuman')">Pengumuman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="navigateTo('login')">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="container">
        <div class="hero-section">
            <h1 class="section-title">{{$himas->nama}}</h1>
            <div class="hero-logo">
                <img src="{{ asset('storage/' . $himas->image) }}" 
                     alt="{{ $himas->nama }}" 
                     class="hero-logo">
            </div>
        </div>
    </div>

    <!-- Vision & Mission Section -->
    <div class="container">
        <div class="vision-mission">
            <div class="row">
                <div class="col-md-6">
                    <h3>VISI</h3>
                    <p>{{$himas->visi}}</p>
                </div>
                <div class="col-md-6">
                    <h3>MISI</h3>
                    <p>{{$himas->misi}}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Activities Section -->
    <div class=" activities-section">
        <h2 class="section-title">KEGIATAN HIMA</h2>
        <div class="row">
            @foreach ($info_kegiatans as $kegiatan)
            <div class="col-md-4">
                <div class="activity-card" onclick="showActivityDetail('{{$kegiatan->id}}')">
                    <img src="{{ asset('storage/' . $kegiatan->image) }}" 
                         alt="{{ $kegiatan->nama }}">
                </div>
                <div class="activity-title">{{$kegiatan->nama}}</div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Structure Organization Section -->
    {{-- <div class="container structure-section">
        <h2 class="section-title">STRUKTUR ORGANISASI</h2>
        <div class="structure-grid">
            @foreach ($pengurus as $person)
                @if (in_array(strtolower($person->jabatan->nama), ['ketua umum', 'ketua', 'wakil ketua','wakil','wakil ketua umum', 'sekretaris','sekertaris', 'bendahara']))
                <div class="structure-card" onclick="showStructureDetail('{{$person->id}}')">
                    <div class="position">{{$person->jabatan->nama}}</div>
                    <div class="name">{{ $person->user ? $person->user->name : $person->nama }}</div>
                </div>
                @endif
            @endforeach
            
               @foreach ($pengurus as $person)
                @php
                    $jabatan_lower = strtolower($person->jabatan->nama);
                    $show_position = str_contains($jabatan_lower, 'ketua') || 
                                   str_contains($jabatan_lower, 'wakil') || 
                                   str_contains($jabatan_lower, 'sekretaris') || 
                                   str_contains($jabatan_lower, 'sekertaris') || 
                                   str_contains($jabatan_lower, 'bendahara');
                @endphp
                @if ($show_position)
                <div class="structure-card" onclick="showStructureDetail('{{$person->id}}')">
                    <div class="position">{{$person->jabatan->nama}}</div>
                    <div class="name">{{ $person->user ? $person->user->name : $person->nama }}</div>
                </div>
                @endif
            @endforeach
        </div>
        <div class="description-box">
            <p id="structure-description">Pilih salah satu pengurus untuk melihat detail informasi</p>
        </div>
    </div> --}}
    
<!-- Structure Organization Section - Updated -->
<div class=" structure-section">
    <h2 class="section-title">STRUKTUR ORGANISASI</h2>
    
    <!-- Wrapper untuk menengahkan grid -->
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-8">
            <div class="structure-grid">
                @php
                    // Definisikan urutan prioritas jabatan
                    $jabatan_priority = [
                        'ketua' => 1,
                        'wakil' => 2,
                        'bendahara' => 3,
                        'sekretaris' => 4,
                        'sekertaris' => 4, // untuk menangani typo
                    ];
                    
                    // Filter dan urutkan pengurus
                    $filtered_pengurus = $pengurus->filter(function($person) {
                        $jabatan_lower = strtolower($person->jabatan->nama);
                        return str_contains($jabatan_lower, 'ketua') || 
                               str_contains($jabatan_lower, 'wakil') || 
                               str_contains($jabatan_lower, 'sekretaris') || 
                               str_contains($jabatan_lower, 'sekertaris') || 
                               str_contains($jabatan_lower, 'bendahara');
                    })->sortBy(function($person) use ($jabatan_priority) {
                        $jabatan_lower = strtolower($person->jabatan->nama);
                        
                        // Cari prioritas berdasarkan kata kunci dalam nama jabatan
                        foreach ($jabatan_priority as $keyword => $priority) {
                            if (str_contains($jabatan_lower, $keyword)) {
                                return $priority;
                            }
                        }
                        
                        // Jika tidak ditemukan, beri prioritas terakhir
                        return 99;
                    });
                @endphp
                
                @foreach ($filtered_pengurus as $person)
                <div class="structure-card" onclick="showStructureDetail('{{$person->id}}')">
                    <div class="position">{{$person->jabatan->nama}}</div>
                    <div class="name">{{ $person->user ? $person->user->name : $person->nama }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    
    <!-- Description box juga di tengah -->
    <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-6">
            <div class="description-box">
                <p id="structure-description">Pilih salah satu pengurus untuk melihat detail informasi</p>
            </div>
        </div>
    </div>
</div>
    <!-- Announcement Section -->
    <div class=" announcement-section">
        <h2 class="section-title">PENGUMUMAN</h2>
        <div class="btn-group-custom">
            <a class="btn-announcement active" href="/daftar">Pendaftaran</a>
            <button class="btn-announcement" onclick="showAnnouncement('tes')">Tes Tertulis</button>
            <button class="btn-announcement" onclick="showAnnouncement('wawancara')">Wawancara</button>
        </div>
    </div>

    <!-- Registration Flow Section -->
    <div class="">
        <h2 class="section-title">ALUR PENDAFTARAN</h2>
        <div class="registration-flow">
            <div class="flow-steps">
                <div class="flow-step">
                    <h5>Tgl 1 - 2 Pendaftaran</h5>
                    <p>Daftar online melalui website resmi</p>
                </div>
                <div class="flow-arrow d-none d-md-block">
                    <i class="fas fa-arrow-right"></i>
                </div>
                <div class="flow-step">
                    <h5>Tgl 9 - 10 Wawancara</h5>
                    <p>Sesi wawancara dengan pengurus</p>
                </div>
                <div class="flow-arrow d-none d-md-block">
                    <i class="fas fa-arrow-right"></i>
                </div>
                <div class="flow-step">
                    <h5>Tgl 3 - 5 Tes Tertulis</h5>
                    <p>Ujian tertulis sesuai bidang minat</p>
                </div>
            </div>
            <a class="btn-register" href="/daftar">
                Pendaftaran
            </a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Data pengurus dari server (Laravel Blade to JavaScript)
        const pengurusData = {!! json_encode($pengurus->keyBy('id')->map(function($person) {
            return [
                'id' => $person->id,
                'nama' => $person->nama,
                'nrp' => $person->nrp,
                'user_name' => $person->user ? $person->user->name : $person->nama,
                'position' => $person->jabatan->nama,
                'periode' => $person->periode,
                'image' => $person->image,
                'email' => $person->user ? $person->user->email : '',
            ];
        })) !!};

        // Data pengumuman
        const announcementData = {
            registrasi: "Pendaftaran anggota baru dibuka! Silakan daftar melalui link yang tersedia. Syarat: IPK minimal 3.0, aktif berorganisasi, dan memiliki motivasi tinggi.",
            tes: "Tes tertulis akan dilaksanakan pada tanggal 3-5. Materi meliputi pengetahuan umum, logika, dan sesuai bidang minat masing-masing.",
            wawancara: "Sesi wawancara akan dilakukan pada tanggal 9-10. Persiapkan diri dengan baik dan tunjukkan motivasi serta visi Anda untuk bergabung."
        };

        // Fungsi navigasi
        function navigateTo(page) {
            alert(`Navigasi ke halaman: ${page}`);
        }

        // Fungsi untuk menampilkan detail struktur
        function showStructureDetail(pengurusId) {
            const data = pengurusData[pengurusId];
            if (data) {
                const descriptionElement = document.getElementById('structure-description');
                descriptionElement.innerHTML = `
                    <h5>${data.user_name}</h5>
                    <h6 class="text-primary">${data.position}</h6>
                    <p><strong>NRP:</strong> ${data.nrp}</p>
                    <p><strong>Periode:</strong> ${data.periode}</p>
                    ${data.email ? `<p><strong>Email:</strong> ${data.email}</p>` : ''}
                    ${data.image ? `<div class="mt-3"><img src="/storage/${data.image}" alt="${data.user_name}" style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;"></div>` : ''}
                `;
            }
        }

        // Fungsi untuk menampilkan pengumuman
        function showAnnouncement(type) {
            document.querySelectorAll('.btn-announcement').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');

            alert(`Pengumuman ${type}: ${announcementData[type]}`);
        }

        // Fungsi untuk menampilkan detail kegiatan
        function showActivityDetail(kegiatanId) {
            alert(`Detail kegiatan dengan ID: ${kegiatanId}`);
        }

        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            // Set default structure description jika ada data pengurus
            const firstPengurus = Object.keys(pengurusData)[0];
            if (firstPengurus) {
                showStructureDetail(firstPengurus);
            }
        });
    </script>
</body>
</html>