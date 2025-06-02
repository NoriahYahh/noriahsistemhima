<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $hima->nama }}
            </h2>
            <a href="{{ route('hima.index') }}" 
               class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                ← Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-100">
                @if($hima->image)
                    <div class="h-64 overflow-hidden">
                        <img src="{{ asset('storage/' . $hima->image) }}" 
                             alt="{{ $hima->nama }}" 
                             class="w-full h-full object-cover">
                    </div>
                @endif
                
                <div class="p-8">
                    <div class="mb-8">
                        <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $hima->nama }}</h1>
                        
                        @if($hima->user)
                            <div class="flex items-center text-sm text-gray-500 mb-6">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span class="font-medium">Dibuat oleh:</span> {{ $hima->user->name }}
                                <span class="mx-2">•</span>
                                <span>{{ $hima->created_at->format('d F Y') }}</span>
                            </div>
                        @endif
                    </div>

                    <div class="space-y-8">
                        <!-- Visi -->
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center">
                                <svg class="w-6 h-6 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                Visi
                            </h2>
                            <div class="bg-blue-50 border-l-4 border-blue-400 p-6 rounded-r-lg">
                                <p class="text-gray-700 leading-relaxed">{{ $hima->visi }}</p>
                            </div>
                        </div>

                        <!-- Misi -->
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center">
                                <svg class="w-6 h-6 mr-3 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Misi
                            </h2>
                            <div class="bg-green-50 border-l-4 border-green-400 p-6 rounded-r-lg">
                                <div class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $hima->misi }}</div>
                            </div>
                        </div>

                        <!-- Alur -->
                        @if($hima->alur)
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center">
                                    <svg class="w-6 h-6 mr-3 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                    Alur
                                </h2>
                                <div class="bg-purple-50 border-l-4 border-purple-400 p-6 rounded-r-lg">
                                    <div class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $hima->alur }}</div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Footer -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <div class="flex justify-between items-center">
                            <div class="text-sm text-gray-500">
                                Terakhir diupdate: {{ $hima->updated_at->format('d F Y, H:i') }}
                            </div>
                            <a href="{{ route('hima.index') }}" 
                               class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Lihat Semua HIMA
                            </a>
                               <a href="{{ route('hima.index',$hima->id) }}" 
                               class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Lihat Data pengurus
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>