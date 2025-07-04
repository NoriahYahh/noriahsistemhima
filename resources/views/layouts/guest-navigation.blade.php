<!-- Tambahkan Alpine.js di <head> atau sebelum </body> -->
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<!-- Navigation -->
<nav class="bg-white shadow-lg sticky top-0 z-50" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center">
                    <i class="fas fa-graduation-cap text-white text-lg"></i>
                </div>
                <span class="text-2xl font-bold text-primary">SiHIMA</span>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-primary font-medium">HOME</a>
                <a href="{{ route('home') }}#hima" class="text-gray-700 hover:text-primary font-medium">HIMA</a>
                <a href="{{ route('home') }}#benefit" class="text-gray-700 hover:text-primary font-medium">BENEFIT</a>
                <a href="{{ route('home') }}#kegiatan" class="text-gray-700 hover:text-primary font-medium">KEGIATAN</a>
            </div>

            <!-- Sign In (desktop) -->
            <div class="hidden md:flex items-center space-x-4">
                <a href="{{ route('login') }}"
                    class="bg-primary text-white px-6 py-2 rounded-full font-medium hover:bg-primary-dark transition-colors">
                    Login
                </a>
            </div>

            <!-- Hamburger Menu (mobile only) -->
            <div class="md:hidden flex items-center">
                <button @click="open = !open" class="focus:outline-none">
                    <svg x-show="!open" class="h-6 w-6 text-gray-700" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="open" x-cloak class="h-6 w-6 text-gray-700" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="open" x-transition x-cloak class="md:hidden mt-2 space-y-2 pb-4">
            <a href="{{ route('home') }}"
                class="block text-gray-700 hover:text-primary font-medium">HOME</a>
            <a href="{{ route('home') }}#hima"
                class="block text-gray-700 hover:text-primary font-medium">HIMA</a>
            <a href="{{ route('home') }}#benefit"
                class="block text-gray-700 hover:text-primary font-medium">BENEFIT</a>
            <a href="{{ route('home') }}#kegiatan"
                class="block text-gray-700 hover:text-primary font-medium">KEGIATAN</a>
            <a href="{{ route('login') }}"
                class="block text-white bg-primary px-4 py-2 rounded-full text-center hover:bg-primary-dark">
                Login
            </a>
        </div>
    </div>
</nav>
