<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'HIMPUNAN MAHASISWA' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="bg-gray-50" x-data="{ sidebarOpen: false }">
    <div class="flex h-screen">

        <!-- Overlay (for mobile) -->
        <div x-show="sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            @click="sidebarOpen = false"
            class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden"></div>

        <!-- Sidebar -->
        <div class="fixed inset-y-0 left-0 z-50 w-64 bg-white border-r border-gray-200 flex flex-col transform transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-0"
            :class="{ 'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen }">

            <!-- Sidebar content (logo + menu) -->
            <div class="p-6 border-b border-gray-200 flex items-center justify-between">
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-purple-600 rounded-lg flex items-center justify-center mr-3">
                        <span class="text-white font-bold text-sm">SHM</span>
                    </div>
                    <div>
                        <h1 class="font-semibold text-gray-900">Sistem </h1>
                        <p class="text-sm text-gray-500">Himpunan Mahasiswa</p>
                    </div>
                </div>
                <!-- Close sidebar (mobile) -->
                <button @click="sidebarOpen = false"
                    class="lg:hidden p-2 rounded-md text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Isi menu sidebar -->
              <nav class="flex-1 p-6 space-y-2 overflow-y-auto">
                    <!-- Dashboard - Always visible -->
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center px-3 py-2 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-purple-50 text-purple-600' : 'text-gray-600 hover:bg-gray-100' }} transition-colors">
                        <i class="fas fa-chart-bar w-5 h-5 mr-3 text-sm"></i>
                        <span class="text-sm font-medium">Dashboard</span>
                    </a>

                    @role('pengurus')
                        <!-- HIMA Menu -->
                        <a href="{{ route('hima.index') }}"
                            class="flex items-center px-3 py-2 rounded-lg {{ request()->routeIs('hima.*') ? 'bg-purple-50 text-purple-600' : 'text-gray-600 hover:bg-gray-100' }} transition-colors">
                            <i class="fas fa-university w-5 h-5 mr-3 text-sm"></i>
                            <span class="text-sm font-medium">HIMA</span>
                        </a>

                        <!-- Jabatan Menu -->
                        <a href="{{ route('jabatan.index') }}"
                            class="flex items-center px-3 py-2 rounded-lg {{ request()->routeIs('jabatan.*') ? 'bg-purple-50 text-purple-600' : 'text-gray-600 hover:bg-gray-100' }} transition-colors">
                            <i class="fas fa-user-tie w-5 h-5 mr-3 text-sm"></i>
                            <span class="text-sm font-medium">Jabatan</span>
                        </a>

                        <!-- Data Pengurus Menu -->
                        <a href="{{ route('data_pengurus.index') }}"
                            class="flex items-center px-3 py-2 rounded-lg {{ request()->routeIs('data_pengurus.*') ? 'bg-purple-50 text-purple-600' : 'text-gray-600 hover:bg-gray-100' }} transition-colors">
                            <i class="fas fa-users w-5 h-5 mr-3 text-sm"></i>
                            <span class="text-sm font-medium">Data Pengurus</span>
                        </a>

                        <!-- Proker Menu -->
                        <a href="{{ route('proker.index') }}"
                            class="flex items-center px-3 py-2 rounded-lg {{ request()->routeIs('proker.*') ? 'bg-purple-50 text-purple-600' : 'text-gray-600 hover:bg-gray-100' }} transition-colors">
                            <i class="fas fa-project-diagram w-5 h-5 mr-3 text-sm"></i>
                            <span class="text-sm font-medium">Proker</span>
                        </a>

                        <!-- Info Kegiatan Menu -->
                        <a href="{{ route('info_kegiatan.index') }}"
                            class="flex items-center px-3 py-2 rounded-lg {{ request()->routeIs('info_kegiatan.*') ? 'bg-purple-50 text-purple-600' : 'text-gray-600 hover:bg-gray-100' }} transition-colors">
                            <i class="fas fa-info-circle w-5 h-5 mr-3 text-sm"></i>
                            <span class="text-sm font-medium">Info Kegiatan</span>
                        </a>

                        <!-- Keuangan Menu -->
                        <a href="{{ route('keuangan.index') }}"
                            class="flex items-center px-3 py-2 rounded-lg {{ request()->routeIs('keuangan.*') ? 'bg-purple-50 text-purple-600' : 'text-gray-600 hover:bg-gray-100' }} transition-colors">
                            <i class="fas fa-money-bill-wave w-5 h-5 mr-3 text-sm"></i>
                            <span class="text-sm font-medium">Keuangan</span>
                        </a>

                        <!-- Data Alumni Menu -->
                        <a href="{{ route('data_alumni.index') }}"
                            class="flex items-center px-3 py-2 rounded-lg {{ request()->routeIs('data_alumni.*') ? 'bg-purple-50 text-purple-600' : 'text-gray-600 hover:bg-gray-100' }} transition-colors">
                            <i class="fas fa-graduation-cap w-5 h-5 mr-3 text-sm"></i>
                            <span class="text-sm font-medium">Data Alumni</span>
                        </a>

                        <!-- Laporan Kegiatan Menu -->
                        <a href="{{ route('laporan_kegiatan.index') }}"
                            class="flex items-center px-3 py-2 rounded-lg {{ request()->routeIs('laporan_kegiatan.*') ? 'bg-purple-50 text-purple-600' : 'text-gray-600 hover:bg-gray-100' }} transition-colors">
                            <i class="fas fa-file-alt w-5 h-5 mr-3 text-sm"></i>
                            <span class="text-sm font-medium">Laporan Kegiatan</span>
                        </a>

                        <!-- SK Menu -->
                        <a href="{{ route('sk.index') }}"
                            class="flex items-center px-3 py-2 rounded-lg {{ request()->routeIs('sk.*') ? 'bg-purple-50 text-purple-600' : 'text-gray-600 hover:bg-gray-100' }} transition-colors">
                            <i class="fas fa-scroll w-5 h-5 mr-3 text-sm"></i>
                            <span class="text-sm font-medium">SK</span>
                        </a>

                        <!-- Data Calon Pengurus Menu -->
                        <a href="{{ route('calon_pengurus.index') }}"
                            class="flex items-center px-3 py-2 rounded-lg {{ request()->routeIs('calon_pengurus.*') ? 'bg-purple-50 text-purple-600' : 'text-gray-600 hover:bg-gray-100' }} transition-colors">
                            <i class="fas fa-user-plus w-5 h-5 mr-3 text-sm"></i>
                            <span class="text-sm font-medium">Data Calon Pengurus</span>
                        </a>

                        <!-- Pengumuman Menu -->
                        <a href="{{ route('pengumuman.index') }}"
                            class="flex items-center px-3 py-2 rounded-lg {{ request()->routeIs('pengumuman.*') ? 'bg-purple-50 text-purple-600' : 'text-gray-600 hover:bg-gray-100' }} transition-colors">
                            <i class="fas fa-bullhorn w-5 h-5 mr-3 text-sm"></i>
                            <span class="text-sm font-medium">Pengumuman</span>
                        </a>

                    @endrole

                    @role('admin')
                        <!-- All HIMA with Inline Dropdown -->
                        <div x-data="{ open: {{ request()->routeIs('adminhima.index') || request()->routeIs('adminhima.show') || request()->routeIs('sk.index') ? 'true' : 'false' }} }" class="w-full">
                            <!-- Trigger -->
                            <button @click="open = !open"
                                class="flex items-center w-full px-3 py-2 rounded-lg transition-colors
             {{ request()->routeIs('adminhima.index') || request()->routeIs('adminhima.show') || request()->routeIs('sk.index') ? 'bg-purple-50 text-purple-600' : 'text-gray-600 hover:bg-gray-100' }}">
                                <i class="fas fa-university w-5 h-5 mr-3 text-sm"></i>
                                <span class="text-sm font-medium">All HIMA</span>
                                <svg class="ml-auto w-4 h-4 transform transition-transform" :class="{ 'rotate-180': open }"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>

                            <!-- Dropdown Content -->
                            <div x-show="open" x-transition class="ml-6 mt-2 space-y-1">
                                @foreach ($himas as $hima)
                                    <a href="{{ route('adminhima.show', $hima) }}"
                                        class="block px-3 py-2 rounded-lg text-sm transition-colors
                                   {{ request()->route('hima')?->id == $hima->id
                                       ? 'bg-purple-100 text-purple-700'
                                       : 'text-gray-600 hover:bg-gray-100' }}">
                                        {{ $hima->nama }}
                                    </a>
                                @endforeach

                                <a href="{{ route('sk.index') }}"
                                    class="block px-3 py-2 rounded-lg text-sm transition-colors
                {{ request()->routeIs('sk.index') ? 'bg-purple-100 text-purple-700' : 'text-gray-600 hover:bg-gray-100' }}">
                                    • SK HIMA
                                </a>
                            </div>
                        </div>

                        <!-- Akun Menu -->
                        <div class="mt-2">
                            <a href="{{ route('akun.index') }}"
                                class="flex items-center px-3 py-2 rounded-lg transition-colors
             {{ request()->routeIs('akun.index') ? 'bg-purple-50 text-purple-600' : 'text-gray-600 hover:bg-gray-100' }}">
                                <i class="fas fa-user-cog w-5 h-5 mr-3 text-sm"></i>
                                <span class="text-sm font-medium">Akun</span>
                            </a>
                        </div>
                    @endrole
                </nav>

            <!-- User profile -->
            <div class="p-6 border-t border-gray-200">
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-gray-300 rounded-full mr-3 flex items-center justify-center">
                        <i class="fas fa-user text-gray-600 text-sm"></i>
                    </div>
                    <div class="flex-1">
                        <p class="font-medium text-gray-900 text-sm">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}" class="mt-3">
                    @csrf
                    <button type="submit"
                        class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-lg">
                        Log Out
                    </button>
                </form>
            </div>
        </div>

        <!-- Main content Header -->
        <div class="flex-1 flex flex-col overflow-hidden">
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex items-center justify-between">
                        <!-- Tombol toggle sidebar -->
                        <button @click="sidebarOpen = !sidebarOpen"
                            class="lg:hidden p-2 rounded-md text-gray-700 hover:text-gray-900 focus:outline-none">
                            <i class="fas fa-bars text-lg"></i>
                        </button>

                        <!-- Slot header -->
                        <div class="ml-4 w-full">
                            {{ $header }}
                        </div>
                    </div>
                </header>
            @endisset

            <!-- Isi halaman -->
            <main class="flex-1 overflow-auto p-6">
                {{ $slot }}
            </main>
        </div>
    </div>

    <!-- Optional Quill Editor -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <script>
        // Inisialisasi editor Quill jika ada
        const quill = document.querySelector('#alur-editor');
        if (quill) {
            const q = new Quill('#alur-editor', { theme: 'snow' });

            const oldAlur = @json(old('alur'));
            if (oldAlur) {
                q.root.innerHTML = oldAlur;
            }

            document.querySelector('form').addEventListener('submit', function () {
                document.querySelector('#alur').value = q.root.innerHTML;
            });
        }
    </script>

</body>

</html>
