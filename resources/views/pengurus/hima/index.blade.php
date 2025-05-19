<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Calon Pengurus') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold">Data Calon Pengurus</h1>
                        <a href="{{ route('pengurus.create') }}" 
                           class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                            Tambah Data
                        </a>
                    </div>

                    @if (session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <style>
                        .table-container {
                            overflow-x: auto;
                        }
                        
                        table {
                            width: 100%;
                            border-collapse: collapse;
                        }
                        
                        table th,
                        table td {
                            padding: 0.75rem;
                            border-bottom: 1px solid #e5e7eb;
                            text-align: left;
                        }
                        
                        table th {
                            background-color: #f3f4f6;
                            font-weight: 600;
                        }
                        
                        table tr:hover {
                            background-color: #f9fafb;
                        }
                        
                        .btn {
                            display: inline-block;
                            padding: 0.375rem 0.75rem;
                            font-size: 0.875rem;
                            font-weight: 500;
                            line-height: 1.5;
                            text-align: center;
                            white-space: nowrap;
                            vertical-align: middle;
                            border-radius: 0.25rem;
                            cursor: pointer;
                        }
                        
                        .btn-info {
                            color: #ffffff;
                            background-color: #0ea5e9;
                            border-color: #0ea5e9;
                        }
                        
                        .btn-danger {
                            color: #ffffff;
                            background-color: #ef4444;
                            border-color: #ef4444;
                        }
                        
                        .btn-group {
                            display: flex;
                            gap: 0.5rem;
                        }
                    </style>

                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>Prodi</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Pilihan 1</th>
                                    <th>Pilihan 2</th>
                                    <th>File</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($calonPengurus as $calon)
                                <tr>
                                    <td>{{ $calon->nama }}</td>
                                    <td>{{ $calon->nim }}</td>
                                    <td>{{ $calon->prodi }}</td>
                                    <td>{{ $calon->jenkel }}</td>
                                    <td>{{ $calon->pilihan1 }}</td>
                                    <td>{{ $calon->pilihan2 }}</td>
                                    <td>
                                        @if($calon->file)
                                            <a href="{{ asset('storage/files/'.$calon->file) }}" 
                                               class="text-blue-500 hover:underline" 
                                               target="_blank">
                                                Lihat File
                                            </a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('pengurus.edit', $calon->id) }}" class="btn btn-info">
                                                Edit
                                            </a>
                                            <form action="{{ route('pengurus.destroy', $calon->id) }}" method="POST" 
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4">Tidak ada data tersedia</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $calonPengurus->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>