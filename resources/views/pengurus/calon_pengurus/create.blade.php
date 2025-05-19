<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Calon Pengurus') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-8 border border-gray-100">
                <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Form Tambah Calon Pengurus</h1>

                {{-- Tampilkan error validasi --}}
                @if ($errors->any())
                    <div class="mb-4 bg-red-100 text-red-700 px-4 py-3 rounded">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('calon_pengurus.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Nama</label>
                        <input type="text" name="nama" value="{{ old('nama') }}"
                            class="w-full mt-1 p-2 border border-gray-300 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">NIM</label>
                        <input type="text" name="nim" value="{{ old('nim') }}"
                            class="w-full mt-1 p-2 border border-gray-300 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Program Studi</label>
                        <input type="text" name="prodi" value="{{ old('prodi') }}"
                            class="w-full mt-1 p-2 border border-gray-300 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Jenis Kelamin</label>
                        <select name="jenkel" class="w-full mt-1 p-2 border border-gray-300 rounded" required>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="Laki-laki" {{ old('jenkel') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('jenkel') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Pilihan 1</label>
                        <input type="text" name="pilihan1" value="{{ old('pilihan1') }}"
                            class="w-full mt-1 p-2 border border-gray-300 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Pilihan 2</label>
                        <input type="text" name="pilihan2" value="{{ old('pilihan2') }}"
                            class="w-full mt-1 p-2 border border-gray-300 rounded" required>
                    </div>

                    <div class="mb-6">
                        <label class="block font-medium text-gray-700">Unggah File (PDF, max 2MB)</label>
                        <input type="file" name="file" accept="application/pdf"
                            class="w-full mt-1 p-2 border border-gray-300 rounded">
                    </div>

                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('calon_pengurus.index') }}"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Batal</a>
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
