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
    @include('layouts.guest-navigation')
<div>
    {{$slot}}
</div>
    
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h5 class="mb-4">Himpunan Mahasiswa</h5>
                    <p>Mengembangkan potensi mahasiswa melalui berbagai kegiatan akademik dan non-akademik yang
                        inspiratif dan bermanfaat.</p>
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
                        <li><i class="fas fa-map-marker-alt me-2"></i> Ray V, Jl. Brigjen H. hasan Basri, Handil Bakti, Kec. Alalak, Kabupaten Barito Kuala, Kalimantan Selatan 70582</li>
                        <li><i class="fas fa-phone me-2"></i> 0851-0015-6666</li>
                        <li><i class="fas fa-envelope me-2"></i> polhas</li>
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
