<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Semua HIMA') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($himas->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($himas as $hima)
                        <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                            @if($hima->image)
                                <div class="h-48 overflow-hidden">
                                    <img src="{{ asset('storage/' . $hima->image) }}" 
                                         alt="{{ $hima->nama }}" 
                                         class="w-full h-full object-cover">
                                </div>
                            @endif
                            
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-900 mb-3">
                                    {{ $hima->nama }}
                                </h3>
                                
                                <div class="mb-4">
                                    <h4 class="font-semibold text-gray-700 mb-2">Visi:</h4>
                                    <p class="text-gray-600 text-sm line-clamp-3">
                                        {{ Str::limit($hima->visi, 150) }}
                                    </p>
                                </div>
                                
                                <div class="mb-4">
                                    <h4 class="font-semibold text-gray-700 mb-2">Misi:</h4>
                                    <p class="text-gray-600 text-sm line-clamp-3">
                                        {{ Str::limit($hima->misi, 150) }}
                                    </p>
                                </div>
                                
                                @if($hima->user)
                                    <div class="mb-4 text-sm text-gray-500">
                                        <span class="font-medium">Dibuat oleh:</span> {{ $hima->user->name }}
                                    </div>
                                @endif
                                
                                <div class="flex justify-between items-center">
                                    <a href="{{ route('adminhima.show', $hima) }}" 
                                       class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        Lihat Detail
                                    </a>
                                    
                                    <span class="text-xs text-gray-400">
                                        {{ $hima->created_at->format('d M Y') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-100">
                    <div class="p-8 text-center">
                        <div class="text-gray-400 mb-4">
                            <svg class="mx-auto h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada HIMA</h3>
                        <p class="text-gray-500">Belum ada data HIMA yang tersedia saat ini.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>