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

        .btn-division {
            background-color: #e8e8e8;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            color: var(--text-dark);
            transition: all 0.3s ease;
            margin: 10px auto;
            display: block;
            width: 200px;
        }

        .btn-division:hover {
            background-color: var(--primary);
            color: white;
            transform: translateY(-2px);
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

        .activity-card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        }

        .activity-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }

        .activity-card:hover::before {
            left: 100%;
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
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            font-weight: bold;
            color: #666;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .structure-card:hover {
            background-color: var(--primary);
            color: white;
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
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
            <h1 class="section-title">HIMPUNAN MAHASISWA</h1>
            <div class="hero-logo">
                LOGO
            </div>
        </div>
    </div>

    <!-- Vision & Mission Section -->
    <div class="container">
        <div class="vision-mission">
            <div class="row">
                <div class="col-md-6">
                    <h3>VISI</h3>
                    <p>Menjadi wadah pengembangan mahasiswa yang unggul dalam bidang akademik dan non-akademik, berkarakter kuat, serta mampu berkontribusi positif bagi kemajuan institusi dan masyarakat. Kami berkomitmen untuk menciptakan generasi pemimpin masa depan yang inovatif, beretos kerja tinggi, dan memiliki integritas yang tinggi dalam setiap aspek kehidupan.</p>
                </div>
                <div class="col-md-6">
                    <h3>MISI</h3>
                    <p>Menyelenggarakan program-program pengembangan diri yang komprehensif meliputi pelatihan kepemimpinan, workshop keterampilan, dan kegiatan pengabdian masyarakat. Memfasilitasi mahasiswa dalam mengembangkan potensi akademik melalui diskusi ilmiah, penelitian kolaboratif, dan seminar dengan narasumber ahli. Membangun jaringan yang kuat antara mahasiswa, alumni, dan profesional di berbagai bidang untuk menciptakan ekosistem pembelajaran yang berkelanjutan.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Division Button -->
    <div class="container text-center">
        <button class="btn-division" onclick="showDivisions()">
            Penjelasan Jabatan/Divisi
        </button>
    </div>

    <!-- Activities Section -->
    <div class="container activities-section">
        <h2 class="section-title">KEGIATAN HIMA</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="activity-card" onclick="showActivityDetail('kegiatan1')">
                    ×
                </div>
                <div class="activity-title">Workshop & Seminar</div>
            </div>
            <div class="col-md-4">
                <div class="activity-card" onclick="showActivityDetail('kegiatan2')">
                    ×
                </div>
                <div class="activity-title">Kompetisi & Lomba</div>
            </div>
            <div class="col-md-4">
                <div class="activity-card" onclick="showActivityDetail('kegiatan3')">
                    ×
                </div>
                <div class="activity-title">Pengabdian Masyarakat</div>
            </div>
        </div>
    </div>

    <!-- Structure Organization Section -->
    <div class="container structure-section">
        <h2 class="section-title">STRUKTUR ORGANISASI</h2>
        <div class="structure-grid">
            <div class="structure-card" onclick="showStructureDetail('ketua')">
                Ketua Umum
            </div>
            <div class="structure-card" onclick="showStructureDetail('wakil')">
                Wakil Ketua
            </div>
            <div class="structure-card" onclick="showStructureDetail('sekretaris')">
                Sekretaris
            </div>
            <div class="structure-card" onclick="showStructureDetail('bendahara')">
                Bendahara
            </div>
        </div>
        <div class="description-box">
            <p id="structure-description">Deskripsi dari data pengurus seperti nama, dan jabatannya</p>
        </div>
    </div>

    <!-- Announcement Section -->
    <div class="container announcement-section">
        <h2 class="section-title">PENGUMUMAN</h2>
        <div class="btn-group-custom">
            <a class="btn-announcement active" href="/daftar">Pendaftaran</a>
            <button class="btn-announcement" onclick="showAnnouncement('tes')">Tes Tertulis</button>
            <button class="btn-announcement" onclick="showAnnouncement('wawancara')">Wawancara</button>
        </div>
    </div>

    <!-- Registration Flow Section -->
    <div class="container">
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
            <button class="btn-register" onclick="registerNow()">
                Pendaftaran
            </button>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Data struktur organisasi
        const structureData = {
            ketua: {
                name: "Ahmad Rizky Pratama",
                position: "Ketua Umum",
                description: "Memimpin organisasi dan bertanggung jawab atas seluruh kegiatan himpunan. Mengkoordinasikan semua divisi dan mengambil keputusan strategis untuk kemajuan organisasi."
            },
            wakil: {
                name: "Siti Nurhaliza",
                position: "Wakil Ketua",
                description: "Membantu ketua dalam menjalankan tugas-tugas organisasi dan menggantikan ketua saat berhalangan. Mengawasi pelaksanaan program kerja dan koordinasi antar divisi."
            },
            sekretaris: {
                name: "Budi Santoso",
                position: "Sekretaris",
                description: "Mengelola administrasi organisasi, dokumentasi rapat, dan korespondensi. Bertanggung jawab atas arsip dan database anggota serta menyiapkan laporan kegiatan."
            },
            bendahara: {
                name: "Maya Sari",
                position: "Bendahara",
                description: "Mengelola keuangan organisasi, membuat laporan keuangan, dan mengatur anggaran untuk setiap kegiatan. Memastikan transparansi dalam pengelolaan dana."
            }
        };

        // Data pengumuman
        const announcementData = {
            registrasi: "Pendaftaran anggota baru dibuka! Silakan daftar melalui link yang tersedia. Syarat: IPK minimal 3.0, aktif berorganisasi, dan memiliki motivasi tinggi.",
            tes: "Tes tertulis akan dilaksanakan pada tanggal 3-5. Materi meliputi pengetahuan umum, logika, dan sesuai bidang minat masing-masing.",
            wawancara: "Sesi wawancara akan dilakukan pada tanggal 9-10. Persiapkan diri dengan baik dan tunjukkan motivasi serta visi Anda untuk bergabung."
        };

        // Fungsi navigasi
        function navigateTo(page) {
            alert(`Navigasi ke halaman: ${page}`);
            // Di implementasi nyata, ini akan mengarahkan ke halaman yang sesuai
        }

        // Fungsi untuk menampilkan detail struktur
        function showStructureDetail(position) {
            const data = structureData[position];
            const descriptionElement = document.getElementById('structure-description');
            descriptionElement.innerHTML = `
                <h5>${data.name}</h5>
                <h6 class="text-primary">${data.position}</h6>
                <p>${data.description}</p>
            `;
        }

        // Fungsi untuk menampilkan pengumuman
        function showAnnouncement(type) {
            // Update active button
            document.querySelectorAll('.btn-announcement').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');

            // Show announcement (in real implementation, this would show the content)
            alert(`Pengumuman ${type}: ${announcementData[type]}`);
        }

        // Fungsi untuk menampilkan divisi
        function showDivisions() {
            alert("Menampilkan penjelasan jabatan dan divisi dalam organisasi:\n\n1. Ketua Umum - Memimpin organisasi\n2. Wakil Ketua - Membantu ketua\n3. Sekretaris - Mengelola administrasi\n4. Bendahara - Mengelola keuangan\n5. Divisi Acara - Mengelola event\n6. Divisi Humas - Public relations\n7. Divisi Media - Dokumentasi dan publikasi");
        }

        // Fungsi untuk menampilkan detail kegiatan
        function showActivityDetail(kegiatan) {
            const activities = {
                kegiatan1: "Workshop & Seminar: Kegiatan pengembangan skill melalui pelatihan dan seminar dengan narasumber ahli",
                kegiatan2: "Kompetisi & Lomba: Event kompetisi untuk mengasah kemampuan dan prestasi mahasiswa",
                kegiatan3: "Pengabdian Masyarakat: Program sosial untuk berkontribusi kepada masyarakat"
            };
            alert(activities[kegiatan]);
        }

        // Fungsi pendaftaran
        function registerNow() {
            if (confirm("Apakah Anda yakin ingin mendaftar sebagai anggota?")) {
                alert("Terima kasih! Anda akan diarahkan ke formulir pendaftaran.");
                // Di implementasi nyata, ini akan mengarahkan ke halaman pendaftaran
            }
        }

        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            // Set default structure description
            showStructureDetail('ketua');
        });
    </script>
</body>

</html>