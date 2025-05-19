<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Pengurus') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{-- <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div> --}}

                <div class="container p-6 text-gray-900">
                    <h1>Tambah Additional for Chinese shipment</h1>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="" method="POST">
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
                            <label for="vm_pct">VM, pct</label>
                            <input type="number" name="vm_pct" class="form-control" id="vm_pct"
                                placeholder="Masukkan VM, pct" step="any"  required>
                        </div>

                        <div class="form-group">
                            <label for="cv_cg">CV, c/g</label>
                            <input type="number" name="cv_cg" class="form-control" id="cv_cg"
                                placeholder="Masukkan CV, c/g" step="any" required>
                        </div>

                        <div class="form-group">
                            <label for="pm">PM:</label>
                            <input type="number" name="pm" class="form-control" id="pm"
                                placeholder="Masukkan PM" step="any"  required>
                        </div>

                        <div class="form-group">
                            <label for="radioactiv">Radioactive</label>
                            <input type="number" name="radioactiv" class="form-control" id="radioactiv"
                                placeholder="Masukkan Radioactive" step="any"
                                required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
