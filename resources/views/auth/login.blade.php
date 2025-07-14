<x-guest-layout>
    <!-- Login Container -->
    <div
    {{-- bagian ganti warna login --}}
        class="min-h-screen bg-primary-dark from-indigo-500 via-purple-600 to-pink-500 flex justify-center items-center p-4">
        <div class="w-full max-w-md">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <!-- Header -->
                <div class="text-center px-8 pt-8">

                    <img class="w-20 h-20   mx-auto mb-4 flex items-center justify-center"
                        src="{{ asset('img/logo-polhas.png') }}" alt="Logo Polhas">


                    <h2 class="text-gray-800 font-bold text-2xl mb-2">Selamat Datang</h2>
                    <p class="text-gray-600 text-sm">Masuk ke akun HIMA Anda</p>
                </div>

                <!-- Form -->
                <div class="px-8 py-6">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                Alamat Email
                            </label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" required
                                autofocus autocomplete="username"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Masukkan email Anda" />
                            @error('email')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                Kata Sandi
                            </label>
                            <input id="password" type="password" name="password" required
                                autocomplete="current-password"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Masukkan kata sandi Anda">
                            @error('password')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center">
                            <input type="checkbox" name="remember" id="remember_me"
                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label class="ml-2 block text-sm text-gray-700" for="remember_me">
                                Ingat saya
                            </label>
                        </div>

                        <!-- Login Button -->
                        <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition-colors duration-200">
                            Masuk
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
