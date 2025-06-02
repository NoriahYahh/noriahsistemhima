<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Pengurus') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-100">
                <div class="p-8 text-gray-900">
                    <h1 class="text-2xl font-bold text-center text-gray-800 mb-10">Data Pengurus</h1>

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6"
                            role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <form action="{{ route('data_pengurus.store') }}" method="POST" enctype="multipart/form-data"
                        class="mb-10 space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">Nama</label>
                                <input type="text" name="nama" placeholder="Nama Lengkap"
                                    class="shadow-sm block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('nama') border-red-500 @enderror"
                                    value="{{ old('nama') }}" required>
                                @error('nama')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">NRP</label>
                                <input type="text" name="nrp" placeholder="NRP"
                                    class="shadow-sm block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('nrp') border-red-500 @enderror"
                                    value="{{ old('nrp') }}" required>
                                @error('nrp')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">Jabatan</label>
                                <select name="jabatan_id"
                                    class="shadow-sm block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('jabatan_id') border-red-500 @enderror"
                                    required>
                                    <option value="">-- Pilih Jabatan --</option>
                                    @foreach ($jabatans as $jabatan)
                                        <option value="{{ $jabatan->id }}"
                                            {{ old('jabatan_id') == $jabatan->id ? 'selected' : '' }}>
                                            {{ $jabatan->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('jabatan_id')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">Periode</label>
                                <input type="text" name="periode" placeholder="Contoh: 2022"
                                    class="shadow-sm block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('periode') border-red-500 @enderror"
                                    value="{{ old('periode') }}" required>
                                @error('periode')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="md:col-span-2">
                                <label class="block mb-2 text-sm font-medium text-gray-700">Image</label>
                                <input type="file" name="image"
                                    class="shadow-sm block w-full text-sm text-gray-700 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('image') border-red-500 @enderror">
                                @error('image')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-end space-x-4">
                            <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-md transition duration-200">
                                + Tambah
                            </button>
                        </div>
                    </form>

                  
                </div>
            </div>
        </div>
    </div>

   
</x-app-layout>
