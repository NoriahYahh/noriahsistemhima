<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Keuangan') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-100">
                <div class="p-8 text-gray-900">
                    <h1 class="text-2xl font-bold text-center text-gray-800 mb-10">EDIT DATA KEUANGAN</h1>
                    
                    <form action="{{ route('keuangan.update', $keuangan->id) }}" method="POST" class="max-w-md mx-auto">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-6">
                            <label for="nominal" class="block text-sm font-medium text-gray-700 mb-1">Nominal</label>
                            <input 
                                type="number" 
                                name="nominal" 
                                id="nominal"
                                value="{{ $keuangan->nominal }}" 
                                class="shadow-sm block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                required
                            >
                            @error('nominal')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-6">
                            <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                            <input 
                                type="date" 
                                name="tanggal" 
                                id="tanggal"
                                value="{{ $keuangan->tanggal }}" 
                                class="shadow-sm block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                required
                            >
                            @error('tanggal')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-6">
                            <label for="jenis" class="block text-sm font-medium text-gray-700 mb-1">Jenis</label>
                            <select 
                                name="jenis" 
                                id="jenis"
                                class="shadow-sm block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                required
                            >
                                <option value="masuk" {{ $keuangan->jenis === 'masuk' ? 'selected' : '' }}>Uang Masuk</option>
                                <option value="keluar" {{ $keuangan->jenis === 'keluar' ? 'selected' : '' }}>Uang Keluar</option>
                            </select>
                            @error('jenis')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <a 
                                href="{{ route('keuangan.index') }}" 
                                class="bg-gray-500 hover:bg-gray-600 text-white font-medium py-2 px-4 rounded-md transition duration-200"
                            >
                                Batal
                            </a>
                            <button 
                                type="submit" 
                                class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition duration-200"
                            >
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>