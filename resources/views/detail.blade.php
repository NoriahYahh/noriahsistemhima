<x-guest-layout>    <!-- Hero Section -->
    <div class="max-w-7xl mx-auto px-4">
        <div class="bg-white py-16 text-center mb-10 rounded-2xl mt-8 shadow-lg">
            <h1 class="text-4xl font-bold text-gray-900 mb-8">{{$himas->nama}}</h1>
            <div class="w-48 h-48 bg-gray-300 rounded-2xl mx-auto flex items-center justify-center overflow-hidden">
                @if($himas->image)
                    <img src="{{ asset('storage/' . $himas->image) }}" 
                         alt="{{ $himas->nama }}" 
                         class="w-full h-full object-cover rounded-2xl">
                @else
                    <span class="text-2xl font-bold text-gray-600">LOGO</span>
                @endif
            </div>
        </div>
    </div>

    <!-- Vision & Mission Section -->
    <div class="max-w-7xl mx-auto px-4 mb-16">
        <div class="bg-white rounded-2xl p-10 shadow-lg">
            <div class="grid md:grid-cols-2 gap-12">
                <div>
                    <h3 class="text-2xl font-bold text-primary mb-6">VISI</h3>
                    <p class="text-gray-700 text-justify">{{$himas->visi}}</p>
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-primary mb-6">MISI</h3>
                    <p class="text-gray-700 text-justify">{{$himas->misi}}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Activities Section -->
    <div class="max-w-7xl mx-auto px-4 mb-16">
        <h2 class="text-4xl font-bold text-gray-900 text-center mb-12">KEGIATAN HIMA</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($info_kegiatans as $kegiatan)
            <div class="cursor-pointer" onclick="showActivityDetail('{{$kegiatan->id}}', '{{$kegiatan->nama}}', '{{$kegiatan->tanggal}}', '{{$kegiatan->keterangan}}', '{{ asset('storage/' . $kegiatan->image) }}')">
                <div class="activity-card h-48 bg-gray-300 rounded-2xl flex items-center justify-center mb-4 overflow-hidden">
                    @if($kegiatan->image)
                        <img src="{{ asset('storage/' . $kegiatan->image) }}" 
                             alt="{{ $kegiatan->nama }}"
                             class="w-full h-full object-cover rounded-2xl">
                    @else
                        <i class="fas fa-calendar text-6xl text-gray-600"></i>
                    @endif
                </div>
                <div class="text-center font-semibold text-gray-800">{{$kegiatan->nama}}</div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Structure Organization Section -->
    <div class="max-w-7xl mx-auto px-4 mb-16">
        <h2 class="text-4xl font-bold text-gray-900 text-center mb-12">STRUKTUR ORGANISASI</h2>
        
        <div class="flex justify-center mb-12">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 max-w-4xl">
                @php
                    $jabatan_priority = [
                        'ketua' => 1,
                        'wakil' => 2,
                        'bendahara' => 3,
                        'sekretaris' => 4,
                        'sekertaris' => 4,
                    ];
                    
                    $filtered_pengurus = $pengurus->filter(function($person) {
                        $jabatan_lower = strtolower($person->jabatan->nama);
                        return str_contains($jabatan_lower, 'ketua') || 
                               str_contains($jabatan_lower, 'wakil') || 
                               str_contains($jabatan_lower, 'sekretaris') || 
                               str_contains($jabatan_lower, 'sekertaris') || 
                               str_contains($jabatan_lower, 'bendahara');
                    })->sortBy(function($person) use ($jabatan_priority) {
                        $jabatan_lower = strtolower($person->jabatan->nama);
                        
                        foreach ($jabatan_priority as $keyword => $priority) {
                            if (str_contains($jabatan_lower, $keyword)) {
                                return $priority;
                            }
                        }
                        
                        return 99;
                    });
                @endphp
                
                @foreach ($filtered_pengurus as $person)
                <div class="structure-card bg-gray-300 h-36 rounded-2xl flex flex-col items-center justify-center p-4 text-center cursor-pointer hover:bg-primary hover:text-white transition-all"
                     onclick="showStructureDetail('{{$person->id}}', '{{ $person->user ? $person->user->name : $person->nama }}', '{{$person->jabatan->nama}}', '{{$person->nrp}}', '{{$person->periode}}', '{{ $person->user ? $person->user->email : '' }}', '{{$person->image}}')">
                    <div class="text-sm font-medium mb-1">{{$person->jabatan->nama}}</div>
                    <div class="text-sm">{{ $person->user ? $person->user->name : $person->nama }}</div>
                </div>
                @endforeach
            </div>
        </div>
        
        <div class="flex justify-center">
            <div class="bg-white rounded-2xl p-8 shadow-lg text-center max-w-2xl">
                <div id="structure-description">
                    <p class="text-gray-600">Pilih salah satu pengurus untuk melihat detail informasi</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Announcement Section -->
    <div class="max-w-7xl mx-auto px-4 mb-16">
        <h2 class="text-4xl font-bold text-gray-900 text-center mb-12">PENGUMUMAN</h2>
        <div class="flex justify-center gap-6 mb-12 flex-wrap">
            <a href="/daftar" class="bg-primary text-white px-6 py-3 rounded-lg font-semibold hover:bg-primary-dark transition-all">Pendaftaran</a>
            <button class="btn-announcement bg-gray-200 text-gray-800 px-6 py-3 rounded-lg font-semibold hover:bg-primary hover:text-white transition-all" onclick="showAnnouncement('tes')">Tes Tertulis</button>
            <button class="btn-announcement bg-gray-200 text-gray-800 px-6 py-3 rounded-lg font-semibold hover:bg-primary hover:text-white transition-all" onclick="showAnnouncement('wawancara')">Wawancara</button>
        </div>
    </div>

    <!-- Registration Flow Section -->
    <div class="max-w-7xl mx-auto px-4 mb-16">
        <h2 class="text-4xl font-bold text-gray-900 text-center mb-12">ALUR PENDAFTARAN</h2>
        <div class="bg-white rounded-2xl p-10 shadow-lg text-center">
            <div class="flex flex-col md:flex-row justify-center items-center gap-8 mb-10">
                <div class="flex-1 max-w-xs">
                    <h5 class="text-lg font-bold text-primary mb-3">Tgl 1 - 2 Pendaftaran</h5>
                    <p class="text-gray-600">Daftar online melalui website resmi</p>
                </div>
                <div class="flow-arrow text-primary text-2xl">
                    <i class="fas fa-arrow-right md:block hidden"></i>
                    <i class="fas fa-arrow-down md:hidden block"></i>
                </div>
                <div class="flex-1 max-w-xs">
                    <h5 class="text-lg font-bold text-primary mb-3">Tgl 3 - 5 Tes Tertulis</h5>
                    <p class="text-gray-600">Ujian tertulis sesuai bidang minat</p>
                </div>
                <div class="flow-arrow text-primary text-2xl">
                    <i class="fas fa-arrow-right md:block hidden"></i>
                    <i class="fas fa-arrow-down md:hidden block"></i>
                </div>
                <div class="flex-1 max-w-xs">
                    <h5 class="text-lg font-bold text-primary mb-3">Tgl 9 - 10 Wawancara</h5>
                    <p class="text-gray-600">Sesi wawancara dengan pengurus</p>
                </div>
            </div>
            <a href="{{route('daftar.create',$himas->id)}}" 
               class="bg-gray-200 text-gray-800 px-10 py-4 rounded-xl font-bold text-lg hover:bg-primary hover:text-white transition-all inline-block">
                Pendaftaran
            </a>
        </div>
    </div>

    <!-- Activity Detail Modal -->
    <div id="activityModal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="modal-content bg-white rounded-2xl max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
            <div class="flex items-center justify-between p-6 border-b border-gray-200">
                <h2 id="modalTitle" class="text-2xl font-bold text-gray-900">Detail Kegiatan</h2>
                <button id="closeModal" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <div class="p-6">
                <div class="mb-6">
                    <img id="modalImage" src="" alt="Activity Image" class="w-full h-64 object-cover rounded-lg">
                </div>

                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-calendar-alt text-primary"></i>
                        <div>
                            <p class="text-sm text-gray-500">Tanggal</p>
                            <p id="modalDate" class="font-medium">-</p>
                        </div>
                    </div>

                    <div class="mt-6">
                        <h3 class="text-lg font-bold mb-2">Deskripsi Kegiatan</h3>
                        <p id="modalDescription" class="text-gray-600 leading-relaxed">-</p>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end space-x-4 p-6 border-t border-gray-200">
                <button id="closeModalFooter" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

        // Data pengumuman
        const announcementData = {
            tes: "Tes tertulis akan dilaksanakan pada tanggal 3-5. Materi meliputi pengetahuan umum, logika, dan sesuai bidang minat masing-masing.",
            wawancara: "Sesi wawancara akan dilakukan pada tanggal 9-10. Persiapkan diri dengan baik dan tunjukkan motivasi serta visi Anda untuk bergabung."
        };

        // Modal elements
        const modal = document.getElementById('activityModal');
        const closeModal = document.getElementById('closeModal');
        const closeModalFooter = document.getElementById('closeModalFooter');
        const modalTitle = document.getElementById('modalTitle');
        const modalImage = document.getElementById('modalImage');
        const modalDate = document.getElementById('modalDate');
        const modalDescription = document.getElementById('modalDescription');

        // Show activity detail
        function showActivityDetail(id, nama, tanggal, keterangan, image) {
            modalTitle.textContent = nama;
            modalImage.src = image;
            modalImage.alt = nama;
            modalDate.textContent = tanggal;
            modalDescription.textContent = keterangan;

            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        // Close modal function
        function closeModalFunction() {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

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

        // Show structure detail
        function showStructureDetail(id, nama, jabatan, nrp, periode, email, image) {
            const descriptionElement = document.getElementById('structure-description');
            descriptionElement.innerHTML = `
                <h5 class="text-xl font-bold mb-2">${nama}</h5>
                <h6 class="text-primary font-semibold mb-4">${jabatan}</h6>
                <div class="text-left space-y-2">
                    <p><strong>NRP:</strong> ${nrp}</p>
                    <p><strong>Periode:</strong> ${periode}</p>
                    ${email ? `<p><strong>Email:</strong> ${email}</p>` : ''}
                </div>
                ${image ? `<div class="mt-4"><img src="/storage/${image}" alt="${nama}" class="w-24 h-24 object-cover rounded-full mx-auto"></div>` : ''}
            `;
        }

        // Show announcement
        function showAnnouncement(type) {
            document.querySelectorAll('.btn-announcement').forEach(btn => {
                btn.classList.remove('bg-primary', 'text-white');
                btn.classList.add('bg-gray-200', 'text-gray-800');
            });
            event.target.classList.remove('bg-gray-200', 'text-gray-800');
            event.target.classList.add('bg-primary', 'text-white');

            alert(`Pengumuman ${type}: ${announcementData[type]}`);
        }
    </script>
</x-guest-layout>

