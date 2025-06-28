   <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center space-x-2">
                    <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center">
                        <i class="fas fa-graduation-cap text-white text-lg"></i>
                    </div>
                    <span class="text-2xl font-bold text-primary">SiHima</span>
                </div>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{route('home')}}" class="text-gray-700 hover:text-primary font-medium">HOME</a>
                    <a href="{{ route('home') }}#hima" class="text-gray-700 hover:text-primary font-medium">HIMA</a>
                    <a href="{{ route('home') }}#benefit" class="text-gray-700 hover:text-primary font-medium">BENEFIT</a>
                    <a href="{{ route('home') }}#kegiatan" class="text-gray-700 hover:text-primary font-medium">KEGIATAN</a>
                    
                </div>

                <div class="flex items-center space-x-4">
                    <a href="{{route('login')}}"
                        class="bg-primary text-white px-6 py-2 rounded-full font-medium hover:bg-primary-dark transition-colors">
                        Sign In
                    </a>
                    {{-- <a
                        class="border border-primary text-primary px-6 py-2 rounded-full font-medium hover:bg-primary hover:text-white transition-colors">
                        Sign Up
                    </a> --}}
                </div>
            </div>
        </div>
    </nav