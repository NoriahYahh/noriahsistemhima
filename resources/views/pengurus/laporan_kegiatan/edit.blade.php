<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Laporan Kegiatan</h2>
    </x-slot>

    <div class="max-w-3xl mx-auto p-6 bg-white rounded shadow mt-8">
        <form action="{{ route('laporan_kegiatan.update', $laporanKegiatan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $laporanKegiatan->name) }}" class="w-full border px-3 py-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="tanggal" class="block font-medium text-gray-700">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', $laporanKegiatan->tanggal) }}" class="w-full border px-3 py-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="keterangan" class="block font-medium text-gray-700">Keterangan</label>
                <textarea name="keterangan" id="keterangan" rows="4" class="w-full border px-3 py-2 rounded" required>{{ old('keterangan', $laporanKegiatan->keterangan) }}</textarea>
            </div>

            {{-- Video --}}
            <div class="mb-4">
                <label for="video" class="block font-medium text-gray-700">Video</label>
                @if ($laporanKegiatan->video)
                    <p class="mb-2">
                        <a href="{{ asset('storage/' . $laporanKegiatan->video) }}" target="_blank" class="text-blue-500 underline">Lihat Video Saat Ini</a>
                    </p>
                @endif
                <input type="file" name="video" id="video" class="w-full border px-3 py-2 rounded">
            </div>

            {{-- Image --}}
            <div class="mb-4">
                <label for="image" class="block font-medium text-gray-700">Image</label>
                @if ($laporanKegiatan->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $laporanKegiatan->image) }}" class="w-24 h-16 object-cover rounded" />
                    </div>
                @endif
                <input type="file" name="image" id="image" class="w-full border px-3 py-2 rounded">
            </div>

            {{-- Status --}}
            <div class="mb-4">
                <label for="status" class="block font-medium text-gray-700">Status</label>
                <select name="status" id="status" class="w-full border px-3 py-2 rounded" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="draft" {{ old('status', $laporanKegiatan->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="selesai" {{ old('status', $laporanKegiatan->status) == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>

            <div class="flex items-center">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
                <a href="{{ route('laporan_kegiatan.index') }}" class="ml-4 text-gray-600 hover:underline">Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
