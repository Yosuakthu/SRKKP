<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <svg class="w-6 h-6 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Ajukan Permohonan Rekomendasi BBM
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border border-gray-200 dark:border-gray-700">
                <div class="p-6">
                    <!-- Info Section -->
                    <div class="mb-6 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-4">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-blue-600 mt-0.5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div>
                                <h4 class="text-sm font-medium text-blue-800 dark:text-blue-200">Informasi Penting</h4>
                                <p class="text-sm text-blue-700 dark:text-blue-300 mt-1">
                                    Pastikan semua data yang Anda isi akurat dan lengkap. Sertifikat mesin wajib dilampirkan untuk kelengkapan berkas permohonan.
                                </p>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('permohonan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Data Pribadi -->
                            <div class="md:col-span-2">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Data Pribadi
                                </h3>
                            </div>

                            <div>
                                <x-input-label for="nama" :value="__('Nama Lengkap')" />
                                <x-text-input id="nama" name="nama" type="text" class="mt-1 block w-full" :value="old('nama')" required />
                                <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="nik" :value="__('NIK')" />
                                <x-text-input id="nik" name="nik" type="text" class="mt-1 block w-full" :value="old('nik')" required />
                                <x-input-error :messages="$errors->get('nik')" class="mt-2" />
                            </div>

                            <div class="md:col-span-2">
                                <x-input-label for="alamat" :value="__('Alamat Lengkap')" />
                                <x-textarea id="alamat" name="alamat" class="mt-1 block w-full" rows="3" required>{{ old('alamat') }}</x-textarea>
                                <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                            </div>

                            <!-- Data Usaha -->
                            <div class="md:col-span-2">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                    Data Usaha
                                </h3>
                            </div>

                            <div>
                                <x-input-label for="konsumen_pengguna" :value="__('Konsumen/Pengguna')" />
                                <x-text-input id="konsumen_pengguna" name="konsumen_pengguna" type="text" class="mt-1 block w-full" :value="old('konsumen_pengguna')" required />
                                <x-input-error :messages="$errors->get('konsumen_pengguna')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="jenis_usaha" :value="__('Jenis Usaha')" />
                                <x-text-input id="jenis_usaha" name="jenis_usaha" type="text" class="mt-1 block w-full" :value="old('jenis_usaha')" required />
                                <x-input-error :messages="$errors->get('jenis_usaha')" class="mt-2" />
                            </div>

                            <!-- Data Kapal -->
                            <div class="md:col-span-2">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                    </svg>
                                    Data Kapal
                                </h3>
                            </div>

                            <div>
                                <x-input-label for="nama_kapal" :value="__('Nama Kapal')" />
                                <x-text-input id="nama_kapal" name="nama_kapal" type="text" class="mt-1 block w-full" :value="old('nama_kapal')" required />
                                <x-input-error :messages="$errors->get('nama_kapal')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="jenis_alat_mesin" :value="__('Jenis Alat Mesin')" />
                                <x-text-input id="jenis_alat_mesin" name="jenis_alat_mesin" type="text" class="mt-1 block w-full" :value="old('jenis_alat_mesin')" required />
                                <x-input-error :messages="$errors->get('jenis_alat_mesin')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="fungsi_alat_mesin" :value="__('Fungsi Alat Mesin')" />
                                <x-text-input id="fungsi_alat_mesin" name="fungsi_alat_mesin" type="text" class="mt-1 block w-full" :value="old('fungsi_alat_mesin')" required />
                                <x-input-error :messages="$errors->get('fungsi_alat_mesin')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="jumlah_alat_mesin" :value="__('Jumlah Alat Mesin')" />
                                <x-text-input id="jumlah_alat_mesin" name="jumlah_alat_mesin" type="number" class="mt-1 block w-full" :value="old('jumlah_alat_mesin')" min="1" required />
                                <x-input-error :messages="$errors->get('jumlah_alat_mesin')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="daya_alat_mesin" :value="__('Daya Alat Mesin (PK/Hp)')" />
                                <x-text-input id="daya_alat_mesin" name="daya_alat_mesin" type="text" class="mt-1 block w-full" :value="old('daya_alat_mesin')" required />
                                <x-input-error :messages="$errors->get('daya_alat_mesin')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="lama_penggunaan_jam_per_hari" :value="__('Lama Penggunaan (Jam/Hari)')" />
                                <x-text-input id="lama_penggunaan_jam_per_hari" name="lama_penggunaan_jam_per_hari" type="number" class="mt-1 block w-full" :value="old('lama_penggunaan_jam_per_hari')" min="1" required />
                                <x-input-error :messages="$errors->get('lama_penggunaan_jam_per_hari')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="lama_operasi" :value="__('Lama Operasi (Hari/Bulan)')" />
                                <x-text-input id="lama_operasi" name="lama_operasi" type="text" class="mt-1 block w-full" :value="old('lama_operasi')" required />
                                <x-input-error :messages="$errors->get('lama_operasi')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="usulan_volume_konsumsi" :value="__('Usulan Volume Konsumsi (Liter/Bulan)')" />
                                <x-text-input id="usulan_volume_konsumsi" name="usulan_volume_konsumsi" type="number" step="0.01" class="mt-1 block w-full" :value="old('usulan_volume_konsumsi')" min="0" required />
                                <x-input-error :messages="$errors->get('usulan_volume_konsumsi')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="estimasi_sisa_jbkp" :value="__('Estimasi Sisa JBKP (Liter)')" />
                                <x-text-input id="estimasi_sisa_jbkp" name="estimasi_sisa_jbkp" type="number" step="0.01" class="mt-1 block w-full" :value="old('estimasi_sisa_jbkp')" min="0" required />
                                <x-input-error :messages="$errors->get('estimasi_sisa_jbkp')" class="mt-2" />
                            </div>

                            <!-- File Upload -->
                            <div class="md:col-span-2">
                                <x-input-label for="sertifikat_mesin_path" :value="__('Sertifikat Mesin (PDF/JPG/JPEG/PNG)')" />
                                <x-file-input id="sertifikat_mesin_path" name="sertifikat_mesin_path" class="mt-1 block w-full" accept=".pdf,.jpg,.jpeg,.png" />
                                <x-input-error :messages="$errors->get('sertifikat_mesin_path')" class="mt-2" />
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Maksimal 2MB. File ini wajib untuk kelengkapan berkas permohonan.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6 space-x-3">
                            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 shadow-sm text-sm font-medium rounded-md text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                                Batal
                            </a>
                            <x-primary-button>
                                {{ __('Ajukan Permohonan') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
