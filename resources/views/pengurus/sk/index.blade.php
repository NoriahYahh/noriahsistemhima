<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data SK') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-100">
                <div class="p-8 text-gray-900">
                    <h1 class="text-2xl font-bold text-center text-gray-800 mb-10">SK</h1>

                    @if (session('success'))
                        <div class="mb-4 px-4 py-2 bg-green-100 border border-green-200 text-green-700 rounded-md">
                            {{ session('success') }}
                        </div>
                    @endif


                    <div class="mb-4 text-right">
                     <form method="GET" action="{{ route('sk.index') }}" class="mb-4 max-w-2xl flex space-x-2">
    <!-- Dropdown Pengunggah -->
    <select name="search" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="">-- Pilih Pengunggah --</option>
        @foreach ($users as $uploader)
            <option value="{{ $uploader->id }}" {{ request('search') == $uploader->id ? 'selected' : '' }}>
                {{ $uploader->name }}
            </option>
        @endforeach
    </select>

    <!-- Dropdown Tahun -->
    <select name="year" class="w-48 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="">-- Semua Tahun --</option>
        @foreach ($years as $year)
            <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>{{ $year }}</option>
        @endforeach
    </select>

    <!-- Tombol Cari -->
    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">
        Cari
    </button>
</form>

                        <a href="{{ route('sk.create') }}"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md">
                            Tambah
                        </a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full table-auto">
                            <thead class="bg-gray-400 text-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">
                                        Pengupload</th>
                                    @role('admin')
                                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">
                                            Untuk</th>
                                    @endrole
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">
                                        Keterangan</th>
                                            <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">
                                        Tanggal di buat</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">File
                                    </th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-gray-100">
                                @forelse ($skList as $sk)
                                    <tr class="border-t border-gray-200">
                                        <td class="px-6 py-4 text-sm">{{ $sk->user->name }}</td>
                                        @role('admin')
                                            <td class="px-6 py-4 text-sm">
                                                @if ($sk->foruser)
                                                    {{ $sk->foruser->name }}
                                                @else
                                                    <span class="text-gray-400">Tidak ada user</span>
                                                @endif
                                            </td>
                                        @endrole

                                        <td class="px-6 py-4 text-sm">{{ $sk->keterangan }}</td>
                                        <td class="px-6 py-4 text-sm">{{ $sk->created_at }}</td>
                                        <td class="px-6 py-4 text-sm">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('sk.show', $sk) }}" target="_blank"
                                                    class="inline-flex items-center px-3 py-1 bg-green-500 hover:bg-green-600 text-white text-xs font-medium rounded-md transition duration-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                    Lihat
                                                </a>
                                                <a href="{{ route('sk.download', $sk) }}"
                                                    class="inline-flex items-center px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white text-xs font-medium rounded-md transition duration-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                                    </svg>
                                                    Download
                                                </a>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-sm flex space-x-4">
                                            <a href="{{ route('sk.edit', $sk) }}"
                                                class="text-blue-600 hover:text-blue-800 font-medium">Edit</a>
                                            <form action="{{ route('sk.destroy', $sk) }}" method="POST"
                                                class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 hover:text-red-800 font-medium"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="border-t border-gray-200">
                                        <td colspan="3" class="px-6 py-4 text-sm text-center text-gray-500">Belum ada
                                            data SK</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
