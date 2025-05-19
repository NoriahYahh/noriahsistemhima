<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Program Kerja') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-100">
                <div class="p-8 text-gray-900">
                    <div class="flex justify-between items-center mb-10">
                        <h1 class="text-2xl font-bold text-gray-800">Detail Program Kerja</h1>
                        <a href="{{ route('proker.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded-md transition duration-200">
                            Kembali
                        </a>
                    </div>

                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 mb-6">
                        <div class="mb-4">
                            <h3 class="text-lg font-semibold text-gray-700">Nama Program</h3>
                            <p class="text-gray-800 mt-1">{{ $proker->nama_proker }}</p>
                        </div>
                        
                        <div class="mb-4">
                            <h3 class="text-lg font-semibold text-gray-700">Deskripsi</h3>
                            <p class="text-gray-800 mt-1 whitespace-pre-line">{{ $proker->deskripsi }}</p>
                        </div>
                        
                        <div class="mb-4">
                            <h3 class="text-lg font-semibold text-gray-700">Jabatan</h3>
                            <p class="text-gray-800 mt-1">{{ $proker->jabatan->nama }}</p>
                        </div>
                        
                        <div class="mb-4">
                            <h3 class="text-lg font-semibold text-gray-700">Periode</h3>
                            <p class="text-gray-800 mt-1">{{ $proker->periode }}</p>
                        </div>
                        
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700">Dibuat Oleh</h3>
                            <p class="text-gray-800 mt-1">{{ $proker->user->name }}</p>
                        </div>
                    </div>

                    <div class="flex space-x-4">
                        <a href="{{ route('proker.edit', $proker) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-md transition duration-200">
                            Edit
                        </a>
                        
                        <form action="{{ route('proker.destroy', $proker) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button 
                                type="submit" 
                                class="bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-6 rounded-md transition duration-200"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus program kerja ini?')"
                            >
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>