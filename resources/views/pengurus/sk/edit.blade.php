<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data SK') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-100">
                <div class="p-8 text-gray-900">
                    <h1 class="text-2xl font-bold text-center text-gray-800 mb-10">Edit SK</h1>

                    @if (session('success'))
                        <div class="mb-4 px-4 py-2 bg-green-100 border border-green-200 text-green-700 rounded-md">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('sk.update', $sk) }}" method="POST" enctype="multipart/form-data" class="mb-10 space-y-6">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-end">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">File :</label>
                                <div class="flex flex-col">
                                    <div class="mb-2">
                                        <span class="text-sm text-gray-600">File saat ini: {{ $sk->file }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <input 
                                            type="file" 
                                            name="file" 
                                            class="shadow-sm block w-full text-sm text-gray-700 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        >
                                        <p class="ml-2 text-xs text-gray-500">Biarkan kosong jika tidak ingin mengubah file</p>
                                    </div>
                                </div>
                                @error('file')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">Keterangan :</label>
                                <input 
                                    type="text" 
                                    name="keterangan" 
                                    placeholder="Masukkan keterangan"
                                    class="shadow-sm block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                    value="{{ old('keterangan', $sk->keterangan) }}"
                                >
                                @error('keterangan')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-start space-x-4">
                            <button 
                                type="submit" 
                                class="mt-6 bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-md transition duration-200"
                            >
                                Update
                            </button>
                            <a 
                                href="{{ route('sk.index') }}" 
                                class="mt-6 bg-gray-500 hover:bg-gray-600 text-white font-medium py-2 px-6 rounded-md transition duration-200"
                            >
                                Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>