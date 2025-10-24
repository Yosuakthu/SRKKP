<x-app-layout>
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8">
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-2xl flex items-center justify-center shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Ajukan Permohonan Rekomendasi BBM</h1>
                        <p class="text-gray-600 mt-1">Isi formulir dengan data yang akurat dan lengkap</p>
                    </div>
                </div>
            </div>

            <!-- Info Alert -->
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 rounded-2xl p-6 mb-8">
                <div class="flex items-start space-x-4">
                    <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-blue-900">Informasi Penting</h3>
                        <p class="text-blue-800 mt-1">
                            Pastikan semua data yang Anda isi akurat dan lengkap. Sertifikat mesin wajib dilampirkan untuk kelengkapan berkas permohonan.
                        </p>
                    </div>
                </div>
            </div>

            <form action="{{ route('permohonan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <!-- Data Pribadi Section -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Data Pribadi</h2>
                            <p class="text-gray-600">Informasi identitas pemohon</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="nama" class="block text-sm font-semibold text-gray-700 mb-2">
                                Nama Lengkap <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <input id="nama" name="nama" type="text" required
                                       class="appearance-none relative block w-full px-10 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                       placeholder="Masukkan nama lengkap sesuai KTP"
                                       value="{{ old('nama') }}">
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                        </div>

                        <div>
                            <label for="nik" class="block text-sm font-semibold text-gray-700 mb-2">
                                NIK <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path>
                                    </svg>
                                </div>
                                <input id="nik" name="nik" type="text" required
                                       class="appearance-none relative block w-full px-10 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                       placeholder="16 digit NIK"
                                       value="{{ old('nik') }}">
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('nik')" />
                        </div>

                        <div class="md:col-span-2">
                            <label for="alamat" class="block text-sm font-semibold text-gray-700 mb-2">
                                Alamat Lengkap <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute top-3 left-3 pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <textarea id="alamat" name="alamat" rows="4" required
                                          class="appearance-none relative block w-full px-10 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 resize-none"
                                          placeholder="Masukkan alamat lengkap sesuai KTP">{{ old('alamat') }}</textarea>
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
                        </div>
                    </div>
                </div>

                <!-- Data Usaha Section -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Data Usaha</h2>
                            <p class="text-gray-600">Informasi tentang kegiatan usaha Anda</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="konsumen_pengguna" class="block text-sm font-semibold text-gray-700 mb-2">
                                Konsumen/Pengguna <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                                <input id="konsumen_pengguna" name="konsumen_pengguna" type="text" required
                                       class="appearance-none relative block w-full px-10 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200"
                                       placeholder="Contoh: Nelayan, Petani, dll"
                                       value="{{ old('konsumen_pengguna') }}">
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('konsumen_pengguna')" />
                        </div>

                        <div>
                            <label for="jenis_usaha" class="block text-sm font-semibold text-gray-700 mb-2">
                                Jenis Usaha <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                                <input id="jenis_usaha" name="jenis_usaha" type="text" required
                                       class="appearance-none relative block w-full px-10 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200"
                                       placeholder="Contoh: Penangkapan Ikan, Budidaya, dll"
                                       value="{{ old('jenis_usaha') }}">
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('jenis_usaha')" />
                        </div>
                    </div>
                </div>

                <!-- Data Kapal Section -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-10 h-10 bg-purple-100 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Data Kapal & Mesin</h2>
                            <p class="text-gray-600">Spesifikasi teknis kapal dan mesin yang digunakan</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div>
                            <label for="nama_kapal" class="block text-sm font-semibold text-gray-700 mb-2">
                                Nama Kapal <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                    </svg>
                                </div>
                                <input id="nama_kapal" name="nama_kapal" type="text" required
                                       class="appearance-none relative block w-full px-10 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200"
                                       placeholder="Nama kapal"
                                       value="{{ old('nama_kapal') }}">
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('nama_kapal')" />
                        </div>

                        <div>
                            <label for="jenis_alat_mesin" class="block text-sm font-semibold text-gray-700 mb-2">
                                Jenis Alat Mesin <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <input id="jenis_alat_mesin" name="jenis_alat_mesin" type="text" required
                                       class="appearance-none relative block w-full px-10 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200"
                                       placeholder="Contoh: Outboard, Inboard, dll"
                                       value="{{ old('jenis_alat_mesin') }}">
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('jenis_alat_mesin')" />
                        </div>

                        <div>
                            <label for="fungsi_alat_mesin" class="block text-sm font-semibold text-gray-700 mb-2">
                                Fungsi Alat Mesin <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                    </svg>
                                </div>
                                <input id="fungsi_alat_mesin" name="fungsi_alat_mesin" type="text" required
                                       class="appearance-none relative block w-full px-10 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200"
                                       placeholder="Contoh: Penggerak Utama, Bantu, dll"
                                       value="{{ old('fungsi_alat_mesin') }}">
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('fungsi_alat_mesin')" />
                        </div>

                        <div>
                            <label for="jumlah_alat_mesin" class="block text-sm font-semibold text-gray-700 mb-2">
                                Jumlah Alat Mesin <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                    </svg>
                                </div>
                                <input id="jumlah_alat_mesin" name="jumlah_alat_mesin" type="number" min="1" required
                                       class="appearance-none relative block w-full px-10 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200"
                                       placeholder="1"
                                       value="{{ old('jumlah_alat_mesin') }}">
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('jumlah_alat_mesin')" />
                        </div>

                        <div>
                            <label for="daya_alat_mesin" class="block text-sm font-semibold text-gray-700 mb-2">
                                Daya Alat Mesin (PK/Hp) <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                                <input id="daya_alat_mesin" name="daya_alat_mesin" type="text" required
                                       class="appearance-none relative block w-full px-10 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200"
                                       placeholder="Contoh: 15 PK atau 11 Hp"
                                       value="{{ old('daya_alat_mesin') }}">
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('daya_alat_mesin')" />
                        </div>

                        <div>
                            <label for="lama_penggunaan_jam_per_hari" class="block text-sm font-semibold text-gray-700 mb-2">
                                Lama Penggunaan (Jam/Hari) <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <input id="lama_penggunaan_jam_per_hari" name="lama_penggunaan_jam_per_hari" type="number" min="1" required
                                       class="appearance-none relative block w-full px-10 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200"
                                       placeholder="8"
                                       value="{{ old('lama_penggunaan_jam_per_hari') }}">
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('lama_penggunaan_jam_per_hari')" />
                        </div>

                        <div>
                            <label for="lama_operasi" class="block text-sm font-semibold text-gray-700 mb-2">
                                Lama Operasi (Hari/Bulan) <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <input id="lama_operasi" name="lama_operasi" type="text" required
                                       class="appearance-none relative block w-full px-10 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200"
                                       placeholder="Contoh: 25 hari/bulan"
                                       value="{{ old('lama_operasi') }}">
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('lama_operasi')" />
                        </div>

                        <div>
                            <label for="usulan_volume_konsumsi" class="block text-sm font-semibold text-gray-700 mb-2">
                                Usulan Volume Konsumsi (Liter/Bulan) <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                    </svg>
                                </div>
                                <input id="usulan_volume_konsumsi" name="usulan_volume_konsumsi" type="number" step="0.01" min="0" required
                                       class="appearance-none relative block w-full px-10 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200"
                                       placeholder="0.00"
                                       value="{{ old('usulan_volume_konsumsi') }}">
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('usulan_volume_konsumsi')" />
                        </div>

                        <div>
                            <label for="estimasi_sisa_jbkp" class="block text-sm font-semibold text-gray-700 mb-2">
                                Estimasi Sisa JBKP (Liter) <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <input id="estimasi_sisa_jbkp" name="estimasi_sisa_jbkp" type="number" step="0.01" min="0" required
                                       class="appearance-none relative block w-full px-10 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200"
                                       placeholder="0.00"
                                       value="{{ old('estimasi_sisa_jbkp') }}">
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('estimasi_sisa_jbkp')" />
                        </div>
                    </div>
                </div>

                <!-- File Upload Section -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-10 h-10 bg-orange-100 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Dokumen Pendukung</h2>
                            <p class="text-gray-600">Upload sertifikat mesin untuk melengkapi berkas permohonan</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label for="sertifikat_mesin_path" class="block text-sm font-semibold text-gray-700 mb-2">
                                Sertifikat Mesin <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 transition-all duration-200 hover:border-orange-400 hover:bg-orange-50/50">
                                    <div class="text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        <div class="flex text-sm text-gray-600 justify-center mb-2">
                                            <label for="sertifikat_mesin_path" class="relative cursor-pointer bg-white rounded-md font-medium text-orange-600 hover:text-orange-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-orange-500">
                                                <span>Upload file</span>
                                                <input id="sertifikat_mesin_path" name="sertifikat_mesin_path" type="file" accept=".pdf,.jpg,.jpeg,.png" required class="sr-only">
                                            </label>
                                            <p class="pl-1">atau drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-500">
                                            PDF, JPG, JPEG, PNG hingga 2MB
                                        </p>
                                        <div class="mt-4 flex justify-center space-x-4">
                                            <div class="flex items-center space-x-2 text-xs text-gray-500">
                                                <svg class="w-4 h-4 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
                                                </svg>
                                                <span>PDF</span>
                                            </div>
                                            <div class="flex items-center space-x-2 text-xs text-gray-500">
                                                <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                                                </svg>
                                                <span>Images</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2 flex items-center space-x-2 text-sm text-gray-600">
                                <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>File ini wajib untuk kelengkapan berkas permohonan</span>
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('sertifikat_mesin_path')" />
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-end">
                    <a href="{{ route('dashboard') }}"
                       class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 shadow-sm text-sm font-semibold rounded-xl text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Batal
                    </a>
                    <button type="submit"
                            class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-sm font-semibold rounded-xl text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                        </svg>
                        {{ __('Ajukan Permohonan') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
