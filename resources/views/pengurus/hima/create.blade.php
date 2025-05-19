<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hima') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="container p-6 text-gray-900">
                    <h1>Tambah Beranda</h1>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- PERBAIKI ACTION DAN ENCTYPE --}}
                    <form action="{{ route('hima.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <style>
                            .form-group {
                                margin-bottom: 15px;
                            }

                            .form-control {
                                width: 100%;
                            }

                            .btn {
                                margin-top: 10px;
                            }
                        </style>

                        <div class="form-group">
                            <label for="logo" class="block text-sm font-medium text-gray-700 mb-1">Upload Logo</label>
                            <input type="file" name="logo" id="logo" accept="image/*"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                        </div>

                        <div class="form-group">
                            <label for="visi">Visi</label>
                            <input type="text" name="visi" class="form-control" id="visi"
                                placeholder="Masukkan Visi" required>
                        </div>

                        <div class="form-group">
                            <label for="misi">Misi</label>
                            <input type="text" name="misi" class="form-control" id="misi"
                                placeholder="Masukkan Misi" required>
                        </div>

                        <div class="form-group">
                            <label for="alur_pendaftaran">Alur Pendaftaran</label>
                            <input type="text" name="alur_pendaftaran" class="form-control" id="alur_pendaftaran"
                                placeholder="Masukkan Alur Pendaftaran" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
