<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Himpunan Mahasiswa</title>
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
        
        .hero-section {
            background-color: #f1e9ff;
            padding: 50px 0;
            border-radius: 0 0 30px 30px;
            position: relative;
            overflow: hidden;
        }
        
        .hero-content h1 {
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        
        .hero-content p {
            font-size: 1.1rem;
            margin-bottom: 30px;
            color: #666;
        }
        
        .hero-image {
            position: relative;
        }
        
        .hero-image img {
            width: 100%;
            border-radius: 20px;
        }
        
        .hero-image:before {
            content: "";
            position: absolute;
            width: 120%;
            height: 120%;
            background: var(--primary-light);
            border-radius: 50%;
            top: -40px;
            left: -40px;
            z-index: -1;
        }
        
        .section-title {
            text-align: center;
            margin: 50px 0 30px;
            font-weight: 700;
            color: var(--primary-dark);
        }
        
        .partner-logos {
            background-color: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin: 30px 0;
        }
        
        .partner-logos img {
            height: 30px;
            opacity: 0.7;
            transition: all 0.3s ease;
        }
        
        .partner-logos img:hover {
            opacity: 1;
        }
        
        .search-box {
            background-color: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin: 30px 0;
        }
        
        .search-input {
            border-radius: 25px;
            padding: 10px 20px;
            border: 1px solid #e0e0e0;
        }
        
        .organization-card {
            background: linear-gradient(135deg, #f1e9ff 0%, #eae0ff 100%);
            border-radius: 20px;
            padding: 20px;
            text-align: center;
            margin-bottom: 30px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            position: relative;
            overflow: hidden;
        }
        
        .organization-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .organization-logo {
            width: 100px;
            height: 100px;
            background-color: white;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            font-weight: bold;
            color: var(--primary);
            font-size: 1.5rem;
        }
        
        .features-section {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            padding: 50px 0;
            color: white;
            margin: 40px 0;
            border-radius: 30px;
        }
        
        .feature-item {
            display: flex;
            margin-bottom: 20px;
        }
        
        .feature-icon {
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 15px;
            flex-shrink: 0;
        }
        
        .popular-course-card {
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
            transition: all 0.3s ease;
        }
        
        .popular-course-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .course-image {
            height: 200px;
            overflow: hidden;
        }
        
        .course-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .course-content {
            padding: 20px;
        }
        
        .course-title {
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--text-dark);
        }
        
        .course-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid #eee;
            padding-top: 15px;
            margin-top: 15px;
        }
        
        .course-price {
            font-weight: 700;
            color: var(--primary);
        }
        
        .rating {
            color: #ffc107;
        }
        
        .teacher-section {
            padding: 50px 0;
            background-color: white;
            border-radius: 30px;
            margin: 40px 0;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .teacher-image {
            border-radius: 20px;
            overflow: hidden;
        }
        
        .teacher-image img {
            width: 100%;
        }
        
        .perks-list {
            list-style: none;
            padding: 0;
        }
        
        .perks-list li {
            padding: 5px 0;
            position: relative;
            padding-left: 25px;
        }
        
        .perks-list li:before {
            content: "✓";
            color: var(--primary);
            position: absolute;
            left: 0;
            font-weight: bold;
        }
        
        .testimonial-section {
            padding: 50px 0;
        }
        
        .testimonial-card {
            padding: 20px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }
        
        .testimonial-header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .testimonial-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 15px;
        }
        
        .testimonial-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .testimonial-name {
            font-weight: 700;
            margin-bottom: 0;
        }
        
        .testimonial-position {
            color: #777;
            font-size: 0.9rem;
        }
        
        .testimonial-rating {
            color: #ffc107;
            margin-bottom: 10px;
        }
        
        .activity-card {
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
            transition: all 0.3s ease;
        }
        
        .activity-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .activity-image {
            height: 200px;
            background-color: #f1e9ff;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }
        
        .activity-content {
            padding: 20px;
        }
        
        footer {
            background-color: var(--primary-dark);
            color: white;
            padding: 30px 0;
            margin-top: 50px;
            border-radius: 30px 30px 0 0;
        }
        
        .footer-links {
            list-style: none;
            padding: 0;
        }
        
        .footer-links li {
            margin-bottom: 10px;
        }
        
        .footer-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
        }
        
        .footer-links a:hover {
            color: white;
            text-decoration: underline;
        }
        
        .social-links a {
            display: inline-block;
            width: 36px;
            height: 36px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            text-align: center;
            line-height: 36px;
            color: white;
            margin-right: 10px;
            transition: all 0.3s ease;
        }
        
        .social-links a:hover {
            background-color: white;
            color: var(--primary);
        }
        
        .badge-custom {
            background-color: var(--secondary);
            color: white;
            padding: 5px 15px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        
        @media (max-width: 768px) {
            .hero-section {
                text-align: center;
            }
            
            .hero-image {
                margin-top: 30px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">Himpunan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kegiatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Organisasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Berita</a>
                    </li>
                </ul>
                <div>
                    <a href="#" class="btn btn-outline-primary me-2">Daftar</a>
                    <a href="#" class="btn btn-primary">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div class="hero-content" style="max-width: 50%;">
                    <h1>Develop your skills in a new and unique way</h1>
                    <p>Bergabung dengan Himpunan Mahasiswa untuk mengembangkan bakat dan potensi dirimu bersama komunitas yang inspiratif.</p>
                    <a href="#" class="btn btn-primary me-2">Bergabung Sekarang</a>
                    <a href="#" class="btn btn-outline-primary">Pelajari Lebih Lanjut</a>
                </div>
                <div class="hero-image">
                    <img src="{{ asset('img/logo-polhas.png')}}" alt="Students" class="img-fluid" style="width: 400px;">
                </div>
            </div>
        </div>
    </section>
    

    <!-- Partner Logos -->
    <div class="container">
        <div class="partner-logos d-flex justify-content-between align-items-center flex-wrap">
            <div class="p-3"><img src="/api/placeholder/120/30" alt="Partner 1"></div>
            <div class="p-3"><img src="/api/placeholder/120/30" alt="Partner 2"></div>
            <div class="p-3"><img src="/api/placeholder/120/30" alt="Partner 3"></div>
            <div class="p-3"><img src="/api/placeholder/120/30" alt="Partner 4"></div>
            <div class="p-3"><img src="/api/placeholder/120/30" alt="Partner 5"></div>
        </div>
    </div>

    <!-- Student Organizations Section -->
    <div class="container">
        <h2 class="section-title">HIMPUNAN MAHASISWA</h2>
        
        <!-- Search Box -->
        <div class="search-box">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="input-group">
                        <input type="text" class="form-control search-input" placeholder="Cari Himpunan Mahasiswa...">
                        <button class="btn btn-primary" type="button">Cari</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <!-- Bagian Logo HIMA  -->
            <div class="col-md-6 col-lg-4">
                <div class="organization-card">
                    <div class="organization-logo">LOGO</div>
                    <h4>HIMA Teknik</h4>
                    <p>Himpunan Mahasiswa Jurusan Teknik</p>
                    <a href="#" class="btn btn-primary">Selengkapnya</a>
                </div>
            </div>
            
            <!-- Organization 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="organization-card">
                    <div class="organization-logo">LOGO</div>
                    <h4>HIMA Ekonomi</h4>
                    <p>Himpunan Mahasiswa Jurusan Ekonomi</p>
                    <a href="#" class="btn btn-primary">Selengkapnya</a>
                </div>
            </div>
            
            <!-- Organization 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="organization-card">
                    <div class="organization-logo">LOGO</div>
                    <h4>HIMA Hukum</h4>
                    <p>Himpunan Mahasiswa Jurusan Hukum</p>
                    <a href="#" class="btn btn-primary">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="container">
        <div class="features-section">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="mb-4">Benefits From Our Online Learning</h2>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-check"></i>
                        </div>
                        <div>
                            <h5>Jaringan Luas</h5>
                            <p>Membangun jaringan profesional dengan mahasiswa dan alumni dari berbagai jurusan</p>
                        </div>
                    </div>
                    
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div>
                            <h5>Leadership & Team Work</h5>
                            <p>Mengembangkan kemampuan kepemimpinan dan kerjasama tim dalam berbagai kegiatan</p>
                        </div>
                    </div>
                    
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <div>
                            <h5>Sertifikat Kegiatan</h5>
                            <p>Dapatkan sertifikat resmi untuk setiap kegiatan yang diikuti</p>
                        </div>
                    </div>
                    
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <div>
                            <h5>Pengembangan Softskill</h5>
                            <p>Meningkatkan kemampuan public speaking, manajemen waktu, dan problem solving</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6 d-flex align-items-center">
                    <img src="/api/placeholder/500/400" alt="Features" class="img-fluid rounded-4">
                </div>
            </div>
        </div>
    </div>

    <!-- Activities Section -->
    <div class="container">
        <h2 class="section-title">KEGIATAN HIMA</h2>
        
        <div class="row">
            <!-- Activity 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="activity-card">
                    <div class="activity-image">
                        <img src="/api/placeholder/400/200" alt="Activity 1" class="img-fluid">
                    </div>
                    <div class="activity-content">
                        <span class="badge-custom mb-2">Seminar</span>
                        <h5>Leadership Training</h5>
                        <p>Pelatihan kepemimpinan untuk mahasiswa baru dengan pembicara profesional</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span><i class="far fa-calendar me-1"></i> 12 Mei 2025</span>
                            <a href="#" class="btn btn-sm btn-outline-primary">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Activity 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="activity-card">
                    <div class="activity-image">
                        <img src="/api/placeholder/400/200" alt="Activity 2" class="img-fluid">
                    </div>
                    <div class="activity-content">
                        <span class="badge-custom mb-2">Workshop</span>
                        <h5>Digital Marketing</h5>
                        <p>Workshop strategi pemasaran digital untuk mahasiswa jurusan ekonomi</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span><i class="far fa-calendar me-1"></i> 20 Mei 2025</span>
                            <a href="#" class="btn btn-sm btn-outline-primary">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Activity 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="activity-card">
                    <div class="activity-image">
                        <img src="/api/placeholder/400/200" alt="Activity 3" class="img-fluid">
                    </div>
                    <div class="activity-content">
                        <span class="badge-custom mb-2">Kompetisi</span>
                        <h5>Debat Ilmiah</h5>
                        <p>Kompetisi debat ilmiah antar universitas dengan hadiah menarik</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span><i class="far fa-calendar me-1"></i> 5 Juni 2025</span>
                            <a href="#" class="btn btn-sm btn-outline-primary">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-4">
            <a href="#" class="btn btn-primary">Lihat Semua Kegiatan</a>
        </div>
    </div>

    <!-- Teacher Section -->
    <div class="container">
        <div class="teacher-section">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="mb-4">If You Are A Certified Teacher</h2>
                    <p class="mb-4">Bergabunglah sebagai pembimbing HIMA dan bantu mahasiswa mengembangkan potensi mereka.</p>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="perks-list">
                                <li>Networking dengan dosen</li>
                                <li>Pengalaman mengajar</li>
                                <li>Sertifikat pembimbing</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="perks-list">
                                <li>Pengembangan karir</li>
                                <li>Kompensasi menarik</li>
                                <li>Jadwal fleksibel</li>
                            </ul>
                        </div>
                    </div>
                    
                    <a href="#" class="btn btn-primary mt-4">Daftar Sebagai Pembimbing</a>
                </div>
                
                <div class="col-lg-6 teacher-image mt-4 mt-lg-0">
                    <img src="/api/placeholder/500/400" alt="Teacher" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="container testimonial-section">
        <h2 class="section-title">TESTIMONIAL MAHASISWA</h2>
        
        <div class="row">
            <!-- Testimonial 1 -->
            <div class="col-md-4">
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div class="testimonial-avatar">
                            <img src="/api/placeholder/50/50" alt="Avatar">
                        </div>
                        <div>
                            <p class="testimonial-name">Budi Santoso</p>
                            <p class="testimonial-position">Mahasiswa Teknik</p>
                        </div>
                    </div>
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p>"Bergabung dengan HIMA Teknik memberikan saya banyak pengalaman berharga dalam berorganisasi dan membangun jaringan profesional."</p>
                </div>
            </div>
            
            <!-- Testimonial 2 -->
            <div class="col-md-4">
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div class="testimonial-avatar">
                            <img src="/api/placeholder/50/50" alt="Avatar">
                        </div>
                        <div>
                            <p class="testimonial-name">Siti Rahma</p>
                            <p class="testimonial-position">Mahasiswa Ekonomi</p>
                        </div>
                    </div>
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p>"Kegiatan-kegiatan yang diadakan HIMA sangat bermanfaat untuk meningkatkan soft skill dan persiapan karir di masa depan."</p>
                </div>
            </div>
            
            <!-- Testimonial 3 -->
            <div class="col-md-4">
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div class="testimonial-avatar">
                            <img src="/api/placeholder/50/50" alt="Avatar">
                        </div>
                        <div>
                            <p class="testimonial-name">Ahmad Rizki</p>
                            <p class="testimonial-position">Mahasiswa Hukum</p>
                        </div>
                    </div>
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p>"HIMA memberikan kesempatan untuk menerapkan ilmu yang dipelajari di kelas ke dalam kegiatan praktis yang berdampak pada masyarakat."</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h5 class="mb-4">Himpunan Mahasiswa</h5>
                    <p>Mengembangkan potensi mahasiswa melalui berbagai kegiatan akademik dan non-akademik yang inspiratif dan bermanfaat.</p>
                    <div class="social-links mt-3">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h5 class="mb-4">Tautan Cepat</h5>
                    <ul class="footer-links">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Kegiatan</a></li>
                        <li><a href="#">Organisasi</a></li>
                        <li><a href="#">Berita</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="mb-4">Kategori</h5>
                    <ul class="footer-links">
                        <li><a href="#">Seminar</a></li>
                        <li><a href="#">Workshop</a></li>
                        <li><a href="#">Kompetisi</a></li>
                        <li><a href="#">Pelatihan</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <h5 class="mb-4">Kontak Kami</h5>
                    <ul class="footer-links">
                        <li><i class="fas fa-map-marker-alt me-2"></i> Jl. Universitas No. 123</li>
                        <li><i class="fas fa-phone me-2"></i> (021) 1234-5678</li>
                        <li><i class="fas fa-envelope me-2"></i> info@himapusat.ac.id</li>
                    </ul>
                </div>
            </div>
            
            <div class="text-center mt-4 pt-4 border-top border-light">
                <p>© 2025 Himpunan Mahasiswa. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>