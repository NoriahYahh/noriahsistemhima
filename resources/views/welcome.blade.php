
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
  

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div class="hero-content" style="max-width: 50%;">
                    <h1>Himpunan Mahasiswa di Politeknik Hasnur</h1>
                    <p>Bergabung dengan Himpunan Mahasiswa untuk mengembangkan bakat dan potensi dirimu bersama
                        komunitas yang inspiratif.</p>
                    <a href="#" class="btn btn-primary me-2">Bergabung Sekarang</a>
                    {{-- <a href="#" class="btn btn-outline-primary">Pelajari Lebih Lanjut</a> --}}
                </div>
                <div class="hero-image">
                    <img src="{{ asset('img/logo-polhas.png') }}" alt="Students" class="img-fluid" style="width: 400px;">
                </div>
            </div>
        </div>
    </section>


    {{-- <!-- Partner Logos -->
    <div class="container">
        <div class="partner-logos d-flex justify-content-between align-items-center flex-wrap">
            <div class="p-3"><img src="/api/placeholder/120/30" alt="Partner 1"></div>
            <div class="p-3"><img src="/api/placeholder/120/30" alt="Partner 2"></div>
            <div class="p-3"><img src="/api/placeholder/120/30" alt="Partner 3"></div>
            <div class="p-3"><img src="/api/placeholder/120/30" alt="Partner 4"></div>
            <div class="p-3"><img src="/api/placeholder/120/30" alt="Partner 5"></div>
        </div>
    </div> --}}

    <!-- Student Organizations Section -->
    <div class="container">
        <h2 class="section-title">HIMPUNAN MAHASISWA</h2>

        <!-- Search Box -->
        <div class="search-box">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="input-group">
                        <input type="text" class="form-control search-input"
                            placeholder="Cari Himpunan Mahasiswa...">
                        <button class="btn btn-primary" type="button">Cari</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Bagian Logo HIMA  -->
            @foreach ($himas as $hima)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="organization-card border rounded p-3 text-center shadow-sm">
                        <!-- Tampilkan gambar -->
                        @if ($hima->image)
                            <div class="organization-logo mb-2">
                                <img src="{{ asset('storage/' . $hima->image) }}" alt="Logo {{ $hima->nama }}"
                                    style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;">
                            </div>
                        @else
                            <div class="organization-logo mb-2">LOGO</div>
                        @endif

                        <!-- Tampilkan nama organisasi -->
                        <h4>{{ $hima->nama }}</h4>

                        <!-- Deskripsi singkat (contoh dari relasi user atau statis) -->
                        <p>Himpunan Mahasiswa Jurusan {{ $hima->user->name ?? 'Teknik' }}</p>

                        <!-- Tombol detail -->
                        <a href="{{ route('home.show', $hima->id) }}" class="btn btn-primary">Selengkapnya</a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <!-- Features Section -->
    <div class="container py-5">
        <div class="features-section text-center p-4 rounded-4" style="background-color: rgba(255, 255, 255, 0.8);">

            <!-- Gambar -->
            <div class="mb-4">
                <img src="{{ asset('img/Politeknik_Hasnur.jpg') }}" alt="Features"
                    class="img-fluid rounded-4 shadow-sm mx-auto d-block"
                    style="max-width: 600px; max-height: 350px; object-fit: cover;">
            </div>

            <!-- Judul -->
            <h2 class="mb-5">Keuntungan Mengikuti Kepengurusan HIMA di Politeknik Hasnur</h2>

            <!-- Fitur-Fitur -->
            <div class="row justify-content-center">
                <div class="col-md-6 text-start mb-4 d-flex">
                    <div class="me-3 text-primary fs-4">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div>
                        <h5>Relasi yang Luas</h5>
                        <p class="mb-0">Membangun relasi profesional dengan mahasiswa dan alumni dari berbagai
                            jurusan, termasuk jaringan eksternal.</p>
                    </div>
                </div>

                <div class="col-md-6 text-start mb-4 d-flex">
                    <div class="me-3 text-primary fs-4">
                        <i class="fas fa-users"></i>
                    </div>
                    <div>
                        <h5>Leadership & Team Work</h5>
                        <p class="mb-0">Mengembangkan kemampuan kepemimpinan dan kerja sama tim dalam berbagai
                            kegiatan organisasi.</p>
                    </div>
                </div>

                <div class="col-md-6 text-start mb-4 d-flex">
                    <div class="me-3 text-primary fs-4">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <div>
                        <h5>Sertifikat Kegiatan</h5>
                        <p class="mb-0">Mendapatkan sertifikat resmi sebagai bukti keikutsertaan dalam kegiatan HIMA.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 text-start mb-4 d-flex">
                    <div class="me-3 text-primary fs-4">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <div>
                        <h5>Pengembangan Softskill</h5>
                        <p class="mb-0">Meningkatkan keterampilan public speaking, manajemen waktu, dan problem
                            solving.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Activities Section -->
    <div class="container">
        <h2 class="section-title">KEGIATAN HIMA</h2>

        <div class="row">
            <!-- Activity 1 -->
            @foreach ($info_kegiatans as $kegiatan)
                <div class="col-md-6 col-lg-4">
                    <div class="activity-card mb-4">
                        <div class="activity-image ">
                            <img src="{{ asset('storage/' . $kegiatan->image) }}" alt="Activity {{ $kegiatan->id }}"
                                class="w-100" style=" height: 200px; object-fit: cover;">
                        </div>
                        <div class="activity-content mb-4">
                            <span class="badge-custom mb-4">{{ $kegiatan->nama }}</span>
                            <h5>{{ $kegiatan->nama }}</h5>
                            <p>{{ $kegiatan->keterangan }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span><i class="far fa-calendar me-1"></i> {{ $kegiatan->tanggal }}</span>
                                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#activityModal{{ $kegiatan->id }}">
                                    Detail
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal untuk setiap kegiatan -->
                <div class="modal fade" id="activityModal{{ $kegiatan->id }}" tabindex="-1"
                    aria-labelledby="activityModalLabel{{ $kegiatan->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="activityModalLabel{{ $kegiatan->id }}">
                                    {{ $kegiatan->nama }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="{{ asset('storage/' . $kegiatan->image) }}"
                                            alt="{{ $kegiatan->nama }}" class="img-fluid rounded mb-3">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="activity-details">
                                            <h6 class="mb-3">Detail Kegiatan</h6>
                                            <div class="mb-3">
                                                <strong>Nama Kegiatan:</strong>
                                                <p class="mb-2">{{ $kegiatan->nama }}</p>
                                            </div>
                                            <div class="mb-3">
                                                <strong>Tanggal:</strong>
                                                <p class="mb-2"><i class="far fa-calendar me-1"></i>
                                                    {{ $kegiatan->tanggal }}</p>
                                            </div>
                                            <div class="mb-3">
                                                <strong>Keterangan:</strong>
                                                <p class="mb-2">{{ $kegiatan->keterangan }}</p>
                                            </div>
                                            {{-- Tambahkan field lain jika ada --}}
                                            @if (isset($kegiatan->lokasi))
                                                <div class="mb-3">
                                                    <strong>Lokasi:</strong>
                                                    <p class="mb-2"><i class="fas fa-map-marker-alt me-1"></i>
                                                        {{ $kegiatan->lokasi }}</p>
                                                </div>
                                            @endif
                                            @if (isset($kegiatan->waktu))
                                                <div class="mb-3">
                                                    <strong>Waktu:</strong>
                                                    <p class="mb-2"><i class="far fa-clock me-1"></i>
                                                        {{ $kegiatan->waktu }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Tutup</button>
                                {{-- Tambahkan tombol aksi lain jika diperlukan --}}
                                {{-- <button type="button" class="btn btn-primary">Daftar</button> --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- CSS tambahan untuk styling modal --}}
            <style>
                .modal-content {
                    border: none;
                    border-radius: 15px;
                    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
                }

                .modal-header {
                    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                    color: white;
                    border-radius: 15px 15px 0 0;
                    border-bottom: none;
                }

                .modal-header .btn-close {
                    filter: invert(1);
                }

                .modal-body {
                    padding: 2rem;
                }

                .activity-details h6 {
                    color: #667eea;
                    font-weight: bold;
                    border-bottom: 2px solid #eee;
                    padding-bottom: 0.5rem;
                }

                .activity-details strong {
                    color: #333;
                    font-size: 0.9rem;
                }

                .activity-details p {
                    color: #666;
                    line-height: 1.6;
                }

                .modal-footer {
                    border-top: 1px solid #eee;
                    padding: 1rem 2rem;
                }

                @media (max-width: 768px) {
                    .modal-dialog {
                        margin: 1rem;
                    }

                    .modal-body {
                        padding: 1rem;
                    }
                }
            </style>


        </div>

        <div class="text-center mt-4">
            <a href="#" class="btn btn-primary">Lihat Semua Kegiatan</a>
        </div>
    </div>


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
