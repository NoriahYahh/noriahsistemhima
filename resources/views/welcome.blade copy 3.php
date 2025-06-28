<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Himpunan Mahasiswa</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#6366f1',
                        'primary-light': '#a5b4fc',
                        'primary-dark': '#4f46e5',
                        secondary: '#06b6d4',
                        accent: '#8b5cf6'
                    }
                }
            }
        }
    </script>
    <style>
        .modal {
            transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
        }

        .modal-content {
            transition: transform 0.3s ease-in-out;
        }

        .modal.hidden {
            opacity: 0;
            visibility: hidden;
        }

        .modal.hidden .modal-content {
            transform: scale(0.9) translateY(-20px);
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center space-x-2">
                    <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center">
                        <i class="fas fa-graduation-cap text-white text-lg"></i>
                    </div>
                    <span class="text-2xl font-bold text-primary">E-learning</span>
                </div>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="#" class="text-gray-700 hover:text-primary font-medium">HOME</a>
                    <a href="#" class="text-gray-700 hover:text-primary font-medium">Courses</a>
                    <a href="#" class="text-gray-700 hover:text-primary font-medium">Mentor</a>
                    <a href="#" class="text-gray-700 hover:text-primary font-medium">Groups</a>
                    <a href="#" class="text-gray-700 hover:text-primary font-medium">Testimonial</a>
                    <a href="#" class="text-gray-700 hover:text-primary font-medium">Docs</a>
                </div>

                <div class="flex items-center space-x-4">
                    <button
                        class="bg-primary text-white px-6 py-2 rounded-full font-medium hover:bg-primary-dark transition-colors">
                        Sign In
                    </button>
                    <button
                        class="border border-primary text-primary px-6 py-2 rounded-full font-medium hover:bg-primary hover:text-white transition-colors">
                        Sign Up
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-blue-50 to-indigo-100 py-20">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-8">
                    <div class="flex items-center space-x-2 text-green-600">
                        <i class="fas fa-check-circle"></i>
                        <span class="text-sm font-medium">100% FULL-TIME ONLINE</span>
                    </div>

                    <h1 class="text-5xl lg:text-6xl font-bold text-gray-900 leading-tight">
                        Advance your engineering skills with us.
                    </h1>

                    <p class="text-xl text-gray-600 leading-relaxed">
                        Bergabung dengan Himpunan Mahasiswa untuk mengembangkan bakat dan potensi dirimu bersama
                        komunitas yang inspiratif.
                    </p>

                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <input type="text" placeholder="Search courses..."
                                class="w-80 px-6 py-4 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                            <button
                                class="absolute right-2 top-2 bg-primary text-white w-10 h-10 rounded-full flex items-center justify-center hover:bg-primary-dark transition-colors">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center space-x-8 text-sm text-gray-600">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-check text-green-500"></i>
                            <span>Flexible</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-check text-green-500"></i>
                            <span>Learning path</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-check text-green-500"></i>
                            <span>Community</span>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div class="bg-white rounded-3xl p-8 shadow-2xl">
                        <div class="flex items-center justify-center h-96">
                            <img src="{{ asset('img/Politeknik_Hasnur.jpg') }}" alt="Politeknik Hasnur"
                                class="max-w-full max-h-full object-contain">
                        </div>
                    </div>

                    <!-- Floating elements -->
                    <div class="absolute top-4 right-4 bg-white rounded-xl p-4 shadow-lg">
                        <div class="flex items-center space-x-3">
                            <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                            <span class="text-sm font-medium">Our students</span>
                        </div>
                        <div class="mt-2">
                            <div class="w-20 h-2 bg-blue-100 rounded-full">
                                <div class="w-16 h-2 bg-blue-500 rounded-full"></div>
                            </div>
                        </div>
                    </div>

                    <div class="absolute bottom-4 left-4 bg-white rounded-xl p-4 shadow-lg">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-chart-bar text-blue-500"></i>
                            <span class="text-sm font-medium">Performance</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trusted Companies -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h3 class="text-center text-gray-500 font-medium mb-8">Trusted by companies of all sizes</h3>
            <div class="flex justify-center items-center space-x-12 opacity-60">
                <i class="fab fa-microsoft text-3xl"></i>
                <i class="fab fa-walmart text-3xl"></i>
                <i class="fab fa-airbnb text-3xl"></i>
                <i class="fab fa-fedex text-3xl"></i>
            </div>
        </div>
    </section>

    <!-- HIMA Organizations -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900">HIMPUNAN MAHASISWA</h2>
                <a href="#" class="text-primary font-medium hover:underline">Explore courses →</a>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- HIMA Card 1 -->

                @foreach ($himas as $hima)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                        <div class="relative">
                            <div
                                class="h-48 bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center">
                                <div
                                    class="w-20 h-20 bg-white rounded-full flex items-center justify-center overflow-hidden">
                                    @if ($hima->image)
                                        <img src="{{ asset('storage/' . $hima->image) }}" alt="Logo {{ $hima->nama }}"
                                            class="object-cover w-full h-full rounded-full">
                                    @else
                                        <span class="text-2xl font-bold text-primary">LOGO</span>
                                    @endif
                                </div>
                            </div>
                            <div
                                class="absolute top-4 right-4 bg-primary text-white px-3 py-1 rounded-full text-sm font-medium">
                                BEST CHOICE
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2">{{ $hima->nama }}</h3>
                            <p class="text-gray-600 mb-4">Himpunan Mahasiswa Jurusan {{ $hima->user->name ?? 'Teknik' }}
                            </p>

                            <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                                <div class="flex items-center space-x-1">
                                    <i class="fas fa-book"></i>
                                    <span>12 classes</span>
                                </div>
                                <div class="flex items-center space-x-1">
                                    <i class="fas fa-user"></i>
                                    <span>100 students</span>
                                </div>
                            </div>
                            <a href="{{ route('home.show', $hima->id) }}"
                                class="block w-full bg-primary text-white py-3 rounded-full font-medium text-center hover:bg-primary-dark transition-colors">
                                Selengkapnya
                            </a>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="py-20 bg-gradient-to-br from-blue-50 to-indigo-100">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div>
                    <img src="https://polhas.ac.id/wp-content/uploads/2020/01/Politeknik_Hasnur.jpg"
                        alt="Politeknik Hasnur" class="w-full rounded-3xl shadow-2xl">
                </div>
                <div class="space-y-8">
                    <h2 class="text-4xl font-bold text-gray-900 leading-tight">
                        Keuntungan Mengikuti Kepengurusan HIMA di Politeknik Hasnur
                    </h2>

                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div
                                class="w-12 h-12 bg-primary rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-check text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold mb-2">Relasi yang Luas</h3>
                                <p class="text-gray-600">Membangun relasi profesional dengan mahasiswa dan alumni dari
                                    berbagai jurusan, termasuk jaringan eksternal.</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div
                                class="w-12 h-12 bg-primary rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-users text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold mb-2">Leadership & Team Work</h3>
                                <p class="text-gray-600">Mengembangkan kemampuan kepemimpinan dan kerja sama tim dalam
                                    berbagai kegiatan organisasi.</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div
                                class="w-12 h-12 bg-primary rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-certificate text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold mb-2">Sertifikat Kegiatan</h3>
                                <p class="text-gray-600">Mendapatkan sertifikat resmi sebagai bukti keikutsertaan dalam
                                    kegiatan HIMA.</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div
                                class="w-12 h-12 bg-primary rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-lightbulb text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold mb-2">Pengembangan Softskill</h3>
                                <p class="text-gray-600">Meningkatkan keterampilan public speaking, manajemen waktu,
                                    dan problem solving.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Activities Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-4xl font-bold text-gray-900 text-center mb-4">KEGIATAN HIMA</h2>
            <p class="text-xl text-gray-600 text-center mb-12">Berbagai kegiatan menarik untuk mengembangkan potensi
                mahasiswa</p>

            <form class="max-w-md mx-auto mb-12">
                <div class="relative">
                    <input type="text" name="search" placeholder="Cari kegiatan..."
                        class="w-full px-6 py-4 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    <button type="submit"
                        class="absolute right-2 top-2 bg-primary text-white w-10 h-10 rounded-full flex items-center justify-center hover:bg-primary-dark transition-colors">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($info_kegiatans as $kegiatan)
                    <div
                        class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all hover:-translate-y-2 mb-6">
                        <div
                            class="h-48 bg-gradient-to-br from-orange-400 to-red-500 flex items-center justify-center">
                            @if ($kegiatan->image)
                                <img src="{{ asset('storage/' . $kegiatan->image) }}"
                                    alt="Activity {{ $kegiatan->id }}" class="h-full w-full object-cover">
                            @else
                                <i class="fas fa-microphone text-white text-6xl"></i>
                            @endif
                        </div>
                        <div class="p-6">
                            <span
                                class="bg-orange-100 text-orange-600 px-3 py-1 rounded-full text-sm font-medium mb-2 inline-block">
                                {{ $kegiatan->nama }}
                            </span>
                            <h3 class="text-xl font-bold mt-2 mb-2">{{ $kegiatan->nama }}</h3>
                            <p class="text-gray-600 mb-4">{{ Str::limit($kegiatan->keterangan, 100) }}</p>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-500 text-sm">
                                    <i class="far fa-calendar me-1"></i> {{ $kegiatan->tanggal }}
                                </span>
                             
                                <button type="button"
                                    class="bg-primary text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-primary-dark transition-colors detail-btn"
                                    data-activity-id="{{ $kegiatan->id }}" data-activity-name="{{ $kegiatan->nama }}"
                                    data-activity-date="{{ $kegiatan->tanggal }}" 
                                    {{-- data-activity-time="09:00 - 12:00 WIB" --}}
                                    {{-- data-activity-location="Aula Politeknik Hasnur"
                                    data-activity-speaker="Dr. Ahmad Fauzi, M.T." --}}
                                    data-activity-description="{{$kegiatan->keterangan }}"
                                    data-activity-image="{{ asset('storage/' . $kegiatan->image) }}">
                                    Detail
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal (tetap gunakan modal Bootstrap agar kompatibel dengan tombol di atas) -->
                    <!-- Modal -->
                @endforeach
             
            </div>
              <div class="mt-4 ">
                {{ $info_kegiatans->links('') }}
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div id="activityModal"
        class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="modal-content bg-white rounded-2xl max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-6 border-b border-gray-200">
                <h2 id="modalTitle" class="text-2xl font-bold text-gray-900">Detail Kegiatan</h2>
                <button id="closeModal" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-6">
                <!-- Activity Image -->
                
                <div class="mb-6">
                    <img id="modalImage" src="" alt="Activity Image"
                        class="w-full h-50 object-cover rounded-lg">
                </div>

                <!-- Activity Info -->
                <div class="space-y-4">
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-calendar-alt text-primary"></i>
                            <div>
                                <p class="text-sm text-gray-500">Tanggal</p>
                                <p id="modalDate" class="font-medium">-</p>
                            </div>
                        </div>
                        
                    </div>

                    <div class="mt-6">
                        <h3 class="text-lg font-bold mb-2">Deskripsi Kegiatan</h3>
                        <p id="modalDescription" class="text-gray-600 leading-relaxed">-</p>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="flex items-center justify-end space-x-4 p-6 border-t border-gray-200">
                <button id="closeModalFooter"
                    class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                    Tutup
                </button>
              
            </div>
        </div>
    </div>

    <script>
        // Get modal elements
        const modal = document.getElementById('activityModal');
        const closeModal = document.getElementById('closeModal');
        const closeModalFooter = document.getElementById('closeModalFooter');
        const detailButtons = document.querySelectorAll('.detail-btn');

        // Modal content elements
        const modalTitle = document.getElementById('modalTitle');
        const modalImage = document.getElementById('modalImage');
        const modalDate = document.getElementById('modalDate');
     
        const modalDescription = document.getElementById('modalDescription');

        // Open modal function
        function openModal(data) {
            modalTitle.textContent = data.name;
            modalImage.src = data.image;
            modalImage.alt = data.name;
            modalDate.textContent = data.date;
       
            modalDescription.textContent = data.description;

            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // Prevent background scrolling
        }

        // Close modal function
        function closeModalFunction() {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto'; // Restore scrolling
        }

        // Add event listeners to detail buttons
        detailButtons.forEach(button => {
            button.addEventListener('click', function() {
                const data = {
                    id: this.dataset.activityId,
                    name: this.dataset.activityName,
                    date: this.dataset.activityDate,
                   
                    description: this.dataset.activityDescription,
                    image: this.dataset.activityImage
                };
                openModal(data);
            });
        });

        // Close modal event listeners
        closeModal.addEventListener('click', closeModalFunction);
        closeModalFooter.addEventListener('click', closeModalFunction);

        // Close modal when clicking outside
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeModalFunction();
            }
        });

        // Close modal with ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                closeModalFunction();
            }
        });
    </script>
</body>

</html>
