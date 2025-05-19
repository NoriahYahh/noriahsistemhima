<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Himpunan Mahasiswa Politeknik Hasnur</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <style>
        /* Custom CSS */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        
        /* Header/Navbar */
        .navbar {
            background-color: #f0f0f0;
            padding: 15px 0;
        }
        
        .navbar .nav-link {
            color: #333;
            font-weight: 500;
            padding: 0.5rem 1rem;
        }
        
        .navbar .nav-link:hover {
            color: #0d6efd;
        }
        
        /* Main sections */
        section {
            padding: 60px 0;
        }
        
        h1, h2, h3, h4 {
            font-weight: bold;
            margin-bottom: 20px;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 40px;
        }
        
        /* Logo section */
        .logo-container {
            width: 200px;
            height: 200px;
            background-color: #ccc;
            margin: 0 auto 30px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* Vision & Mission */
        .text-block {
            margin-bottom: 40px;
            text-align: center;
        }
        
        /* Activities section */
        .activities-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin: 30px 0;
        }
        
        .activity-item {
            width: 30%;
            background-color: #ccc;
            height: 200px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        
        .activity-item::before, .activity-item::after {
            content: '';
            position: absolute;
            background-color: #666;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }
        
        .activity-item::before {
            transform: rotate(45deg);
        }
        
        .activity-item::after {
            transform: rotate(-45deg);
        }
        
        .activity-caption {
            text-align: center;
            margin-top: 10px;
            font-weight: 500;
        }
        
        /* Organization structure */
        .org-structure {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin: 40px 0;
        }
        
        .org-member {
            width: 22%;
            height: 150px;
            background-color: #ccc;
            margin-bottom: 20px;
        }
        
        .org-description {
            text-align: center;
            margin: 30px 0;
        }
        
        /* Announcement section */
        .announcement-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin: 30px 0;
        }
        
        .announcement-btn {
            background-color: #ccc;
            border: none;
            padding: 8px 20px;
            border-radius: 5px;
            font-weight: 500;
        }
        
        /* Registration process */
        .registration-process {
            display: flex;
            justify-content: space-around;
            margin: 30px 0;
        }
        
        .registration-step {
            text-align: center;
        }
        
        .registration-btn {
            display: block;
            margin: 30px auto;
            background-color: #ccc;
            border: none;
            padding: 8px 20px;
            border-radius: 5px;
            font-weight: 500;
        }
        
        /* For hero section from the provided code */
        .hero {
            padding: 60px 0;
            background-color: #f8f9fa;
        }
        
        .accent-text {
            color: #0d6efd;
        }
        
        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
            padding: 10px 25px;
            font-weight: 500;
        }
        
        .btn-link {
            color: #0d6efd;
            text-decoration: none;
            font-weight: 500;
        }
        
        .btn-link:hover {
            text-decoration: underline;
        }
        
        .section-divider {
            height: 2px;
            background-color: #f0f0f0;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">Politeknik Hasnur</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Himpunan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kegiatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pengurus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pengumuman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section (from provided code) -->
    <section id="hero" class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <h1 class="mb-4">
                            Selamat Datang <br>
                            di Sistem Himpunan Mahasiswa <br>
                            <span class="accent-text">Politeknik Hasnur</span>
                        </h1>
                        <p class="mb-4 mb-md-5">
                            Sistem ini berfungsi untuk membagikan informasi tentang HIMA yang ada di Politeknik Hasnur
                        </p>
                        <div class="hero-buttons">
                            <a href="#about" class="btn btn-primary me-0 me-sm-2 mx-1">Get Started</a>
                            <a href="#" class="btn btn-link mt-2 mt-sm-0">
                                <i class="bi bi-play-circle me-1"></i>
                                Play Video
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image text-center">
                        <img width="500" height="500" src="/api/placeholder/500/500" alt="Logo Politeknik Hasnur" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main HIMA Section -->
    <section id="hima-main">
        <div class="container">
            <h1 class="section-title">HIMPUNAN MAHASISWA</h1>
            
            <div class="logo-container">
                <span>LOGO</span>
            </div>
            
            <div class="text-block">
                <h3>VISI</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam semper justo vitae est placerat, et vehicula massa aliquet. Aenean sed porttitor quam. Sed sed nisl malesuada, placerat erat sed, porttitor porta. Donec a orci vehicula augue porta aliquet. Integer neque urna, commodo vel interdum e, tincidunt et tortor. Nulla tellus felis lobortis libero vel magna molestie, non egestas erat porttitor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porta eros a ipsum cursus faucibus. In sem sem, bibendum quis consequat id, mattis et turpis. Praesent ante velit, venenatis in eros eu, aliquet ultricies mi. Cras lobortis, nibh ut viverra pellentesque, enim sem mollis dolor, at pulvinar dui lacus vel eros. In vulputate vitae ante eget tempus. Mauris faucibus enim eu dui consectetur luctus. Mauris dignissim dapibus tempor. Fusce pellentesque imperdiet vehicula.</p>
            </div>
            
            <div class="text-block">
                <h3>MISI</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing edit. Aliquam semper justo vitae est placerat, et vehicula massa aliquet. Aenean sed porttitor quam. Sed sed nisl malesuada, placerat erat sed, porttitor porta. Donec a orci vehicula augue porta aliquet. Integer neque urna, commodo vel interdum e, tincidunt et tortor. Nulla tellus felis lobortis libero vel magna molestie, non egestas erat porttitor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porta eros a ipsum cursus faucibus. In sem sem, bibendum quis consequat id, mattis et turpis. Praesent ante velit, venenatis in eros eu, aliquet ultricies mi. Cras lobortis, nibh ut viverra pellentesque, enim sem mollis dolor, at pulvinar dui lacus vel eros. In vulputate vitae ante eget tempus. Mauris faucibus enim eu dui consectetur luctus. Mauris dignissim dapibus tempor. Fusce pellentesque imperdiet vehicula.</p>
            </div>
            
            <div class="text-center">
                <button class="announcement-btn">Penjelasan Jabatan/Divisi</button>
            </div>
        </div>
    </section>
    
    <!-- Kegiatan HIMA -->
    <section id="activities">
        <div class="container">
            <h2 class="section-title">KEGIATAN HIMA</h2>
            
            <div class="activities-container">
                <div class="activity-col">
                    <div class="activity-item"></div>
                    <p class="activity-caption">Keterangan</p>
                </div>
                
                <div class="activity-col">
                    <div class="activity-item"></div>
                    <p class="activity-caption">Keterangan</p>
                </div>
                
                <div class="activity-col">
                    <div class="activity-item"></div>
                    <p class="activity-caption">Keterangan</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Struktur Organisasi -->
    <section id="org-structure">
        <div class="container">
            <h2 class="section-title">STRUKTUR ORGANISASI</h2>
            
            <div class="org-structure">
                <div class="org-member"></div>
                <div class="org-member"></div>
                <div class="org-member"></div>
                <div class="org-member"></div>
            </div>
            
            <p class="org-description">Deskripsi dari data pengurus seperti nama, dan jabatannya</p>
        </div>
    </section>
    
    <!-- Pengumuman -->
    <section id="announcements">
        <div class="container">
            <h2 class="section-title">PENGUMUMAN</h2>
            
            <div class="announcement-buttons">
                <button class="announcement-btn">Registrasi</button>
                <button class="announcement-btn">Tes Tertulis</button>
                <button class="announcement-btn">Wawancara</button>
            </div>
        </div>
    </section>
    
    <!-- Alur Pendaftaran -->
    <section id="registration-process">
        <div class="container">
            <h2 class="section-title">ALUR PENDAFTARAN</h2>
            
            <div class="registration-process">
                <div class="registration-step">
                    <p>Tgl 1 - 2 pendaftaran<br>Tgl 9 - 10 Wawancara</p>
                </div>
                
                <div class="registration-step">
                    <p>Tgl 3 - 5 Tes Tertulis</p>
                </div>
            </div>
            
            <button class="registration-btn">Pendaftaran</button>
        </div>
    </section>
    
    <!-- Testimonials Section (from provided code) -->
    <section id="testimonials" class="section light-background">
        <div class="container section-title">
            <h2>Testimonials</h2>
            <div class="title-shape">
                <svg viewBox="0 0 200 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M 0,10 C 40,0 60,20 100,10 C 140,0 160,20 200,10" fill="none" stroke="currentColor" stroke-width="2"></path>
                </svg>
            </div>
            <p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur vel illum qui dolorem</p>
        </div>

        <div class="container">
            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-lg-8">
                                <h2>Sed ut perspiciatis unde omnis</h2>
                                <p>
                                    Proin iaculis purus consequat sem cure digni ssim donec porttitora entum
                                    suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et.
                                    Maecen aliquam, risus at semper.
                                </p>
                                <p>
                                    Beatae magnam dolore quia ipsum. Voluptatem totam et qui dolore dignissimos.
                                    Amet quia sapiente laudantium nihil illo et assumenda sit cupiditate. Nam
                                    perspiciatis perferendis minus consequatur. Enim ut eos quo.
                                </p>
                                <div class="d-flex align-items-center mt-4">
                                    <div class="me-3">
                                        <img src="/api/placeholder/60/60" class="rounded-circle" alt="Testimonial">
                                    </div>
                                    <div>
                                        <h5 class="mb-0">Saul Goodman</h5>
                                        <small class="text-muted">Client</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 d-none d-lg-block">
                                <div class="p-3">
                                    <img src="/api/placeholder/300/300" class="img-fluid rounded" alt="Testimonial photo">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <button class="btn btn-outline-primary mx-2" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                        <i class="bi bi-arrow-left"></i>
                    </button>
                    <button class="btn btn-outline-primary mx-2" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p>© 2025 Politeknik Hasnur. All rights reserved.</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>