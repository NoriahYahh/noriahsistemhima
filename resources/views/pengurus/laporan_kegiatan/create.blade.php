<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Laporan Kegiatan') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg border border-gray-100">
                <div class="p-8 text-gray-900">
                    <form action="{{ route('laporan_kegiatan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">Nama Kegiatan</label>
                                <input type="text" name="name" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">Tanggal</label>
                                <input type="date" name="tanggal" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">Keterangan</label>
                                <textarea name="keterangan" rows="4" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">Video (opsional)</label>
                                <input type="file" name="video" accept="video/*" class="w-full px-4 py-2 border rounded-md">
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">Gambar</label>
                                <input type="file" name="image" accept="image/*" class="w-full px-4 py-2 border rounded-md" required>
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">Status</label>
                                <select name="status" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                    <option value="Terverifikasi">Terverifikasi</option>
                                    <option value="Menunggu Verifikasi">Menunggu Verifikasi</option>
                                    <option value="Ditolak">Ditolak</option>
                                </select>
                            </div>

                            <div class="flex justify-end">
                                <a href="{{ route('laporan_kegiatan.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md mr-2">Batal</a>
                                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
