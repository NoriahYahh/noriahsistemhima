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
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            border-radius: 25px;
            padding: 8px 20px;
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        .btn-outline-primary {
            border-color: var(--primary);
            color: var(--primary);
            border-radius: 25px;
            padding: 8px 20px;
            font-weight: 600;
        }

        .btn-outline-primary:hover {
            background-color: var(--primary);
            color: white;
        }

        .navbar {
            background-color: white;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            padding: 15px 0;
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--primary);
        }

        .nav-link {
            font-weight: 600;
            color: var(--text-dark);
        }

        .nav-link:hover {
            color: var(--primary);
        }

        .breadcrumb {
            background-color: transparent;
            padding: 20px 0;
        }

        .breadcrumb-item a {
            color: var(--primary);
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: var(--text-dark);
        }

        .hero-detail {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 60px 0;
            border-radius: 30px;
            margin-bottom: 40px;
        }

        .hima-logo {
            width: 150px;
            height: 150px;
            background-color: white;
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        }

        .hima-logo img {
            max-width: 120px;
            max-height: 120px;
            object-fit: contain;
        }

        .info-card {
            background-color: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
            transition: all 0.3s ease;
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .info-card h3 {
            color: var(--primary);
            margin-bottom: 20px;
            font-weight: 700;
        }

        .structure-item {
            background-color: var(--bg-light);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
        }

        .structure-item:hover {
            transform: translateX(10px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .structure-avatar {
            width: 60px;
            height: 60px;
            background-color: var(--primary);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 15px;
            color: white;
            font-weight: bold;
            font-size: 1.2rem;
        }

        .activity-timeline {
            position: relative;
            padding-left: 30px;
        }

        .activity-timeline::before {
            content: '';
            position: absolute;
            left: 15px;
            top: 0;
            bottom: 0;
            width: 2px;
            background-color: var(--primary-light);
        }

        .timeline-item {
            position: relative;
            margin-bottom: 30px;
            background-color: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: -37px;
            top: 20px;
            width: 12px;
            height: 12px;
            background-color: var(--primary);
            border-radius: 50%;
            border: 3px solid white;
            box-shadow: 0 0 0 3px var(--primary-light);
        }

        .timeline-date {
            color: var(--primary);
            font-weight: 600;
            font-size: 0.9rem;
        }

        .contact-info {
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary) 100%);
            color: white;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .contact-icon {
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 15px;
        }

        .gallery-item {
            border-radius: 15px;
            overflow: hidden;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .gallery-item:hover {
            transform: scale(1.05);
        }

        .gallery-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .stats-card {
            background: linear-gradient(135deg, var(--secondary) 0%, #ff9ec7 100%);
            color: white;
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            margin-bottom: 20px;
        }

        .stats-number {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .join-section {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            border-radius: 30px;
            padding: 50px;
            text-align: center;
            margin: 40px 0;
        }

        .social-links a {
            display: inline-block;
            width: 50px;
            height: 50px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            text-align: center;
            line-height: 50px;
            color: white;
            margin: 0 10px;
            transition: all 0.3s ease;
            font-size: 1.2rem;
        }

        .social-links a:hover {
            background-color: white;
            color: var(--primary);
            transform: translateY(-5px);
        }

        .badge-custom {
            background-color: var(--secondary);
            color: white;
            padding: 5px 15px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .achievement-item {
            background-color: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 15px;
            border-left: 4px solid var(--primary);
            transition: all 0.3s ease;
        }

        .achievement-item:hover {
            transform: translateX(10px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .hero-detail {
                text-align: center;
            }
            
            .structure-item {
                flex-direction: column;
                text-align: center;
            }
            
            .structure-avatar {
                margin-right: 0;
                margin-bottom: 10px;
            }
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/">Himpunan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kegiatan">Kegiatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#organisasi">Organisasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#berita">Berita</a>
                    </li>
                </ul>
                <div>
                    <a href="#" class="btn btn-outline-primary me-2">Daftar</a>
                    <a href="#" class="btn btn-primary">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Breadcrumb -->
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/">Organisasi</a></li>
                <li class="breadcrumb-item active" aria-current="page">HIMA Teknik Informatika</li>
            </ol>
        </nav>
    </div>

    <!-- Hero Section -->
    <div class="container">
        <div class="hero-detail">
            <div class="row align-items-center">
                <div class="col-lg-4 text-center">
                    <div class="hima-logo mx-auto">
                        <img src="/api/placeholder/120/120" alt="Logo HIMA Teknik Informatika">
                    </div>
                </div>
                <div class="col-lg-8">
                    <h1 class="mb-3">{{$himas->nama}}</h1>
                    <p class="mb-4 lead">{{$himas->d}}</p>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="badge-custom">Teknologi</span>
                        <span class="badge-custom">Innovation</span>
                        <span class="badge-custom">Leadership</span>
                        <span class="badge-custom">Community</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics -->
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-number">250+</div>
                    <div>Anggota Aktif</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-number">15</div>
                    <div>Divisi</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-number">50+</div>
                    <div>Kegiatan/Tahun</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-number">5</div>
                    <div>Tahun Berdiri</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <!-- Left Column -->
            <div class="col-lg-8">
                <!-- About Section -->
                <div class="info-card">
                    <h3><i class="fas fa-info-circle me-2"></i>Tentang Kami</h3>
                    <p>Himpunan Mahasiswa Teknik Informatika (HIMATIF) adalah organisasi kemahasiswaan yang berfokus pada pengembangan potensi mahasiswa di bidang teknologi informasi. Kami berkomitmen untuk menciptakan generasi yang inovatif, berkarakter, dan siap menghadapi tantangan era digital.</p>
                    
                    <h5 class="mt-4 mb-3">Visi</h5>
                    <p>"Menjadi wadah pengembangan mahasiswa Teknik Informatika yang unggul dalam teknologi, berkarakter, dan berdaya saing global."</p>
                    
                    <h5 class="mt-4 mb-3">Misi</h5>
                    <ul>
                        <li>Mengembangkan kemampuan akademik dan non-akademik mahasiswa</li>
                        <li>Memfasilitasi pembelajaran teknologi terkini</li>
                        <li>Membangun jaringan profesional di bidang IT</li>
                        <li>Mengabdi kepada masyarakat melalui teknologi</li>
                    </ul>
                </div>

                <!-- Structure Section -->
                <div class="info-card">
                    <h3><i class="fas fa-users me-2"></i>Struktur Organisasi</h3>
                    
                    <div class="structure-item">
                        <div class="structure-avatar">KH</div>
                        <div>
                            <h5 class="mb-1">Ketua Himpunan</h5>
                            <p class="mb-1">Ahmad Rizky Pratama</p>
                            <small class="text-muted">Teknik Informatika 2022</small>
                        </div>
                    </div>

                    <div class="structure-item">
                        <div class="structure-avatar">WK</div>
                        <div>
                            <h5 class="mb-1">Wakil Ketua</h5>
                            <p class="mb-1">Siti Nurhaliza</p>
                            <small class="text-muted">Teknik Informatika 2022</small>
                        </div>
                    </div>

                    <div class="structure-item">
                        <div class="structure-avatar">SK</div>
                        <div>
                            <h5 class="mb-1">Sekretaris</h5>
                            <p class="mb-1">Budi Santoso</p>
                            <small class="text-muted">Teknik Informatika 2023</small>
                        </div>
                    </div>

                    <div class="structure-item">
                        <div class="structure-avatar">BH</div>
                        <div>
                            <h5 class="mb-1">Bendahara</h5>
                            <p class="mb-1">Maya Sari</p>
                            <small class="text-muted">Teknik Informatika 2023</small>
                        </div>
                    </div>
                </div>

                <!-- Activities Timeline -->
                <div class="info-card">
                    <h3><i class="fas fa-calendar me-2"></i>Kegiatan Terbaru</h3>
                    
                    <div class="activity-timeline">
                        <div class="timeline-item">
                            <div class="timeline-date">15 Mei 2025</div>
                            <h5>Workshop Machine Learning</h5>
                            <p>Pelatihan dasar-dasar machine learning dengan Python untuk mahasiswa tingkat awal hingga menengah.</p>
                            <span class="badge-custom">Workshop</span>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-date">8 Mei 2025</div>
                            <h5>Hackathon HIMATIF 2025</h5>
                            <p>Kompetisi programming 48 jam dengan tema "Smart City Solutions" diikuti 50+ tim dari berbagai universitas.</p>
                            <span class="badge-custom">Kompetisi</span>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-date">1 Mei 2025</div>
                            <h5>Tech Talk: Future of AI</h5>
                            <p>Seminar dengan pembicara dari Google Indonesia membahas perkembangan AI dan peluang karir.</p>
                            <span class="badge-custom">Seminar</span>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-date">25 Apr 2025</div>
                            <h5>Community Service: Digital Literacy</h5>
                            <p>Program pengabdian masyarakat untuk meningkatkan literasi digital di desa binaan.</p>
                            <span class="badge-custom">Pengabdian</span>
                        </div>
                    </div>
                </div>

                <!-- Achievements -->
                <div class="info-card">
                    <h3><i class="fas fa-trophy me-2"></i>Prestasi</h3>
                    
                    <div class="achievement-item">
                        <h5 class="mb-1">Juara 1 National Programming Contest 2024</h5>
                        <p class="mb-1">Tim HIMATIF berhasil meraih juara pertama dalam kompetisi programming tingkat nasional.</p>
                        <small class="text-muted"><i class="fas fa-calendar me-1"></i>Desember 2024</small>
                    </div>

                    <div class="achievement-item">
                        <h5 class="mb-1">Best Innovation Award - Startup Competition</h5>
                        <p class="mb-1">Aplikasi EduTech karya mahasiswa HIMATIF meraih penghargaan inovasi terbaik.</p>
                        <small class="text-muted"><i class="fas fa-calendar me-1"></i>Oktober 2024</small>
                    </div>

                    <div class="achievement-item">
                        <h5 class="mb-1">Outstanding Community Service</h5>
                        <p class="mb-1">Program digitalisasi UMKM mendapat apresiasi dari pemerintah daerah.</p>
                        <small class="text-muted"><i class="fas fa-calendar me-1"></i>Agustus 2024</small>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-lg-4">
                <!-- Contact Info -->
                <div class="contact-info">
                    <h4 class="mb-4"><i class="fas fa-phone me-2"></i>Kontak</h4>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <strong>Email</strong><br>
                            himatif@university.ac.id
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div>
                            <strong>Telepon</strong><br>
                            +62 812-3456-7890
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <strong>Alamat</strong><br>
                            Gedung Teknik Lt. 3<br>
                            Universitas ABC
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div>
                            <strong>Jam Operasional</strong><br>
                            Senin - Jumat: 08:00 - 17:00
                        </div>
                    </div>

                    <div class="social-links text-center mt-4">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>

                <!-- Gallery -->
                <div class="info-card">
                    <h4 class="mb-4"><i class="fas fa-images me-2"></i>Galeri</h4>
                    
                    <div class="row">
                        <div class="col-6">
                            <div class="gallery-item">
                                <img src="/api/placeholder/200/150" alt="Kegiatan 1">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="gallery-item">
                                <img src="/api/placeholder/200/150" alt="Kegiatan 2">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="gallery-item">
                                <img src="/api/placeholder/200/150" alt="Kegiatan 3">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="gallery-item">
                                <img src="/api/placeholder/200/150" alt="Kegiatan 4">
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center mt-3">
                        <a href="#" class="btn btn-outline-primary btn-sm">Lihat Semua</a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="info-card">
                    <h4 class="mb-4"><i class="fas fa-link me-2"></i>Tautan Cepat</h4>
                    
                    <div class="d-grid gap-2">
                        <a href="#" class="btn btn-outline-primary">Daftar Anggota</a>
                        <a href="#" class="btn btn-outline-primary">Download Proposal</a>
                        <a href="#" class="btn btn-outline-primary">Jadwal Kegiatan</a>
                        <a href="#" class="btn btn-outline-primary">Dokumentasi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Join Section -->
    <div class="container">
        <div class="join-section">
            <h2 class="mb-4">Bergabung dengan HIMATIF</h2>
            <p class="mb-4 lead">Kembangkan potensimu bersama komunitas mahasiswa Teknik Informatika yang inspiratif dan inovatif. Dapatkan pengalaman berharga dalam berorganisasi, networking, dan pengembangan skill teknologi.</p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="#" class="btn btn-light btn-lg">Daftar Sekarang</a>
                <a href="#" class="btn btn-outline-light btn-lg">Pelajari Lebih Lanjut</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>