<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $hima->nama }}
            </h2>

            <a href="{{ url()->previous() }}" 
               class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                ← Kembali
            </a>
        </div>
    </x-slot>

 <div class="py-12 bg-gray-50">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-100">
            
            {{-- Header dengan Logo --}}
            @if($hima->image)
                <div class="h-48 bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center">
                    <div class="w-40 h-40 bg-white rounded-full flex items-center justify-center overflow-hidden shadow-lg">
                        @if ($hima->image)
                            <img src="{{ asset('storage/' . $hima->image) }}" 
                                 alt="Logo {{ $hima->nama }}"
                                 class="object-cover w-full h-full rounded-full">
                        @else
                            <span class="text-2xl font-bold text-blue-600">LOGO</span>
                        @endif
                    </div>
                </div>
            @endif
            
            <div class="p-8">
                {{-- Informasi Dasar --}}
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $hima->nama }}</h1>
                    
                    @if($hima->user)
                        <div class="flex items-center text-sm text-gray-500 mb-6">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span class="font-medium">Dibuat oleh:</span> 
                            <span class="ml-1">{{ $hima->user->name }}</span>
                            <span class="mx-2">•</span>
                            <span>{{ $hima->created_at->format('d F Y') }}</span>
                        </div>
                    @endif
                </div>

                {{-- Konten Utama --}}
                <div class="space-y-8">
                    {{-- Visi --}}
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            Visi
                        </h2>
                        <div class="bg-blue-50 border-l-4 border-blue-400 p-6 rounded-r-lg">
                            <p class="text-gray-700 leading-relaxed">{{ $hima->visi }}</p>
                        </div>
                    </div>

                    {{-- Misi --}}
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Misi
                        </h2>
                        <div class="bg-green-50 border-l-4 border-green-400 p-6 rounded-r-lg">
                            <div class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $hima->misi }}</div>
                        </div>
                    </div>

                    {{-- Alur --}}
                    @if($hima->alur)
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center">
                                <svg class="w-6 h-6 mr-3 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                Alur
                            </h2>
                            <div class="bg-purple-50 border-l-4 border-purple-400 p-6 rounded-r-lg">
                                <div class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $hima->alur }}</div>
                            </div>
                        </div>
                    @endif
                </div>

                {{-- Footer dengan Navigasi --}}
                <div class="mt-12 pt-8 border-t border-gray-200">
                    {{-- Informasi Update --}}
                    <div class="mb-6">
                        <p class="text-sm text-gray-500">
                            Terakhir diupdate: {{ $hima->updated_at->format('d F Y, H:i') }}
                        </p>
                    </div>
                    
                    {{-- Tombol Navigasi --}}
                    <div class="space-y-4">
                        {{-- Baris pertama - Tombol utama --}}
                        <div class="flex flex-wrap gap-3">
                            <a href="{{ route('hima.index') }}" 
                               class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                                Kembali ke Daftar HIMA
                            </a>
                        </div>
                        
                        {{-- Baris kedua - Menu Data --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                            <a href="{{ route('adminhima.pengurus', $hima->id) }}" 
                               class="inline-flex items-center justify-center px-4 py-3 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150 text-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                Data Pengurus
                            </a>
                            
                            <a href="{{ route('adminhima.proker', $hima->id) }}" 
                               class="inline-flex items-center justify-center px-4 py-3 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150 text-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                </svg>
                                Program Kerja
                            </a>
                            
                            <a href="{{ route('adminhima.alumni', $hima->id) }}" 
                               class="inline-flex items-center justify-center px-4 py-3 bg-purple-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 focus:bg-purple-700 active:bg-purple-900 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition ease-in-out duration-150 text-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                                Data Alumni
                            </a>
                            
                            <a href="{{ route('adminhima.laporan_kegiatan', $hima->id) }}" 
                               class="inline-flex items-center justify-center px-4 py-3 bg-orange-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-700 focus:bg-orange-700 active:bg-orange-900 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition ease-in-out duration-150 text-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Laporan Kegiatan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>