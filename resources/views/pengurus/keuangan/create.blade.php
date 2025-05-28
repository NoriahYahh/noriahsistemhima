<form action="#" method="POST" class="mb-10">
                        @csrf
                        <div class="flex flex-wrap items-center space-x-4 mb-6">
                            <input 
                                type="number" 
                                name="nominal" 
                                placeholder="Rp.........." 
                                class="shadow-sm flex-1 min-w-[200px] px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                            >
                            <input 
                                type="date" 
                                name="tanggal" 
                                class="shadow-sm flex-1 min-w-[200px] px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                            >
                            <button 
                                type="submit" 
                                name="action" 
                                value="masuk"
                                class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded-md transition duration-200"
                            >
                                + Uang Masuk
                            </button>
                            <button 
                                type="submit" 
                                name="action" 
                                value="keluar"
                                class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded-md transition duration-200"
                            >
                                + Uang Keluar
                            </button>
                        </div>
                    </form>
