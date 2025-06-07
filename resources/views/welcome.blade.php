<x-guest-layout>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div class="hero-content" style="max-width: 50%;">
                    <h1>Develop your skills in a new and unique way</h1>
                    <p>Bergabung dengan Himpunan Mahasiswa untuk mengembangkan bakat dan potensi dirimu bersama
                        komunitas yang inspiratif.</p>
                    <a href="#" class="btn btn-primary me-2">Bergabung Sekarang</a>
                    <a href="#" class="btn btn-outline-primary">Pelajari Lebih Lanjut</a>
                </div>
                <div class="hero-image">
                    <img src="{{ asset('img/logo-polhas.png') }}" alt="Students" class="img-fluid"
                        style="width: 400px;">
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
                                    class="img-fluid" style="max-height: 100px;">
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
                    <p class="mb-4">Bergabunglah sebagai pembimbing HIMA dan bantu mahasiswa mengembangkan potensi
                        mereka.</p>

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
                    <p>"Bergabung dengan HIMA Teknik memberikan saya banyak pengalaman berharga dalam berorganisasi dan
                        membangun jaringan profesional."</p>
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
                    <p>"Kegiatan-kegiatan yang diadakan HIMA sangat bermanfaat untuk meningkatkan soft skill dan
                        persiapan karir di masa depan."</p>
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
                    <p>"HIMA memberikan kesempatan untuk menerapkan ilmu yang dipelajari di kelas ke dalam kegiatan
                        praktis yang berdampak pada masyarakat."</p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>