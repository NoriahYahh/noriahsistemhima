<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'HR Management Dashboard' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white border-r border-gray-200 flex flex-col">
            <!-- Logo Section -->
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-purple-600 rounded-lg flex items-center justify-center mr-3">
                        <span class="text-white font-bold text-sm">SM</span>
                    </div>
                    <div>
                        <h1 class="font-semibold text-gray-900">Sistem Manajement</h1>
                        <p class="text-sm text-gray-500">Himpunan Mahasiswa</p>
                    </div>
                </div>
            </div>

            <!-- Navigation Menu -->
            <nav class="flex-1 p-6 space-y-2">
                <!-- Dashboard - Always visible -->
                <a href="{{ route('dashboard') }}"
                    class="flex items-center px-3 py-2 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-purple-50 text-purple-600' : 'text-gray-600 hover:bg-gray-100' }} transition-colors">
                    <i class="fas fa-chart-bar w-5 h-5 mr-3 text-sm"></i>
                    <span class="text-sm font-medium">Dashboard</span>
                </a>

                @role('pengurus')
                    <!-- HIMA Menu -->
                    <a href="{{ route('hima.index') }}"
                        class="flex items-center px-3 py-2 rounded-lg {{ request()->routeIs('hima.index') ? 'bg-purple-50 text-purple-600' : 'text-gray-600 hover:bg-gray-100' }} transition-colors">
                        <i class="fas fa-university w-5 h-5 mr-3 text-sm"></i>
                        <span class="text-sm font-medium">HIMA</span>
                    </a>

                    <!-- Jabatan Menu -->
                    <a href="{{ route('jabatan.index') }}"
                        class="flex items-center px-3 py-2 rounded-lg {{ request()->routeIs('jabatan') ? 'bg-purple-50 text-purple-600' : 'text-gray-600 hover:bg-gray-100' }} transition-colors">
                        <i class="fas fa-user-tie w-5 h-5 mr-3 text-sm"></i>
                        <span class="text-sm font-medium">Jabatan</span>
                    </a>

                    <!-- Data Pengurus Menu -->
                    <a href="{{ route('data_pengurus.index') }}"
                        class="flex items-center px-3 py-2 rounded-lg {{ request()->routeIs('data_pengurus.index') ? 'bg-purple-50 text-purple-600' : 'text-gray-600 hover:bg-gray-100' }} transition-colors">
                        <i class="fas fa-users w-5 h-5 mr-3 text-sm"></i>
                        <span class="text-sm font-medium">Data Pengurus</span>
                    </a>

                    <!-- Proker Menu -->
                    <a href="{{ route('proker.index') }}"
                        class="flex items-center px-3 py-2 rounded-lg {{ request()->routeIs('proker.index') ? 'bg-purple-50 text-purple-600' : 'text-gray-600 hover:bg-gray-100' }} transition-colors">
                        <i class="fas fa-project-diagram w-5 h-5 mr-3 text-sm"></i>
                        <span class="text-sm font-medium">Proker</span>
                    </a>

                    <!-- Info Kegiatan Menu -->
                    <a href="{{ route('info_kegiatan.index') }}"
                        class="flex items-center px-3 py-2 rounded-lg {{ request()->routeIs('info_kegiatan') ? 'bg-purple-50 text-purple-600' : 'text-gray-600 hover:bg-gray-100' }} transition-colors">
                        <i class="fas fa-info-circle w-5 h-5 mr-3 text-sm"></i>
                        <span class="text-sm font-medium">Info Kegiatan</span>
                    </a>

                    <!-- Keuangan Menu -->
                    <a href="{{ route('keuangan.index') }}"
                        class="flex items-center px-3 py-2 rounded-lg {{ request()->routeIs('keuangan') ? 'bg-purple-50 text-purple-600' : 'text-gray-600 hover:bg-gray-100' }} transition-colors">
                        <i class="fas fa-money-bill-wave w-5 h-5 mr-3 text-sm"></i>
                        <span class="text-sm font-medium">Keuangan</span>
                    </a>

                    <!-- Data Alumni Menu -->
                    <a href="{{ route('data_alumni.index') }}"
                        class="flex items-center px-3 py-2 rounded-lg {{ request()->routeIs('data_alumni.index') ? 'bg-purple-50 text-purple-600' : 'text-gray-600 hover:bg-gray-100' }} transition-colors">
                        <i class="fas fa-graduation-cap w-5 h-5 mr-3 text-sm"></i>
                        <span class="text-sm font-medium">Data Alumni</span>
                    </a>

                    <!-- Laporan Kegiatan Menu -->
                    <a href="{{ route('laporan_kegiatan.index') }}"
                        class="flex items-center px-3 py-2 rounded-lg {{ request()->routeIs('laporan_kegiatan.index') ? 'bg-purple-50 text-purple-600' : 'text-gray-600 hover:bg-gray-100' }} transition-colors">
                        <i class="fas fa-file-alt w-5 h-5 mr-3 text-sm"></i>
                        <span class="text-sm font-medium">Laporan Kegiatan</span>
                    </a>

                    <!-- SK Menu -->
                    <a href="{{ route('sk.index') }}"
                        class="flex items-center px-3 py-2 rounded-lg {{ request()->routeIs('sk.index') ? 'bg-purple-50 text-purple-600' : 'text-gray-600 hover:bg-gray-100' }} transition-colors">
                        <i class="fas fa-scroll w-5 h-5 mr-3 text-sm"></i>
                        <span class="text-sm font-medium">SK</span>
                    </a>

                    <!-- Data Calon Pengurus Menu -->
                    <a href="{{ route('calon_pengurus.index') }}"
                        class="flex items-center px-3 py-2 rounded-lg {{ request()->routeIs('calon_pengurus.index') ? 'bg-purple-50 text-purple-600' : 'text-gray-600 hover:bg-gray-100' }} transition-colors">
                        <i class="fas fa-user-plus w-5 h-5 mr-3 text-sm"></i>
                        <span class="text-sm font-medium">Data Calon Pengurus</span>
                    </a>
                @endrole

                @role('admin')
                <!-- SK Menu -->
                    <a href="{{ route('sk.index') }}"
                        class="flex items-center px-3 py-2 rounded-lg {{ request()->routeIs('sk.index') ? 'bg-purple-50 text-purple-600' : 'text-gray-600 hover:bg-gray-100' }} transition-colors">
                        <i class="fas fa-scroll w-5 h-5 mr-3 text-sm"></i>
                        <span class="text-sm font-medium">SK</span>
                    </a>
                    <!-- All HIMA Menu -->
                    <a href="{{ route('adminhima.index') }}"
                        class="flex items-center px-3 py-2 rounded-lg {{ request()->routeIs('adminhima.index') ? 'bg-purple-50 text-purple-600' : 'text-gray-600 hover:bg-gray-100' }} transition-colors">
                        <i class="fas fa-university w-5 h-5 mr-3 text-sm"></i>
                        <span class="text-sm font-medium">All HIMA</span>
                    </a>

                    <!-- Akun Menu -->
                    <a href="{{ route('akun.index') }}"
                        class="flex items-center px-3 py-2 rounded-lg {{ request()->routeIs('akun.index') ? 'bg-purple-50 text-purple-600' : 'text-gray-600 hover:bg-gray-100' }} transition-colors">
                        <i class="fas fa-user-cog w-5 h-5 mr-3 text-sm"></i>
                        <span class="text-sm font-medium">Akun</span>
                    </a>
                @endrole
            </nav>

            <!-- User Profile -->
            <div class="p-6 border-t border-gray-200">
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-gray-300 rounded-full mr-3 flex items-center justify-center">
                        <i class="fas fa-user text-gray-600 text-sm"></i>
                    </div>
                    <div class="flex-1">
                        <p class="font-medium text-gray-900 text-sm">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                    </div>
                    {{-- <i class="fas fa-chevron-right text-gray-400 text-xs"></i> --}}
                </div>
                  <a href="{{ route('profile.edit') }}"
                        class="flex items-center mt-2 px-3 py-2 rounded-lg {{ request()->routeIs('profile.edit') ? 'bg-purple-50 text-purple-600' : 'text-gray-600 hover:bg-gray-100' }} transition-colors">
                        <i class="fas fa-user-cog w-5 h-5 mr-3 text-sm"></i>
                        <span class="text-sm font-medium">Profile</span>
                    </a>
                     <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="w-full text-left px-4 py-2 mt-3 text-sm text-gray-700 hover:bg-gray-100">
                {{ __('Log Out') }}
            </button>
        </form>
            </div>


        </div>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
           
            

            <!-- Main Content -->
            <main class="flex-1 overflow-auto p-6">
                {{ $slot }}
            </main>
        </div>
    </div>

    {{-- <script>
        // Simple JavaScript for sidebar interactions
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarLinks = document.querySelectorAll('nav a');
            
            sidebarLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Remove active class from all links
                    sidebarLinks.forEach(l => {
                        l.classList.remove('bg-purple-50', 'text-purple-600');
                        l.classList.add('text-gray-600');
                    });
                    
                    // Add active class to clicked link
                    this.classList.remove('text-gray-600');
                    this.classList.add('bg-purple-50', 'text-purple-600');
                });
            });
        });
    </script> --}}
</body>

</html>
