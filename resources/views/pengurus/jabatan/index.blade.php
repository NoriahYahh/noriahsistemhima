<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jabatan') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-100">
                <div class="p-8 text-gray-900">
                    <h1 class="text-2xl font-bold text-center text-gray-800 mb-10">Jabatan</h1>
                    @role('pengurus')
                        <form action="{{ route('jabatan.store') }}" method="POST" class="mb-10">
                            @csrf
                            <div class="flex items-center space-x-4 mb-6">
                                <input type="text" name="nama" id="name" placeholder="Nama Jabatan"
                                    class="shadow-sm flex-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                <button type="submit"
                                    class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded-md transition duration-200">
                                    + Tambah
                                </button>
                                <button type="button"
                                    class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded-md transition duration-200">
                                    Update
                                </button>
                            </div>
                        </form>
                    @endrole

                    <div class="overflow-x-auto">
                        <table class="w-full table-auto">
                            <thead class="bg-gray-400 text-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">No
                                    </th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Nama
                                        Jabatan</th>
                                    @role('pengurus')
                                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">
                                            Action</th>
                                    @endrole
                                </tr>
                            </thead>
                            <tbody class="bg-gray-100">
                                @foreach ($jabatans as $jabatan)
                                    <tr class="border-t border-gray-200">
                                        <td class="px-6 py-4 text-sm">1</td>
                                        <td class="px-6 py-4 text-sm">{{ $jabatan->nama }}</td>
                                        @role('pengurus')
                                            <td class="px-6 py-4 text-sm flex space-x-4">
                                                <a href="#"
                                                    class="text-blue-600 hover:text-blue-800 font-medium">Edit</a>
                                                <a href="#"
                                                    class="text-red-600 hover:text-red-800 font-medium">Delete</a>
                                            </td>
                                        @endrole
                                    </tr>
                                @endforeach

                                <!-- Data jabatan lainnya bisa ditambahkan di sini -->
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
