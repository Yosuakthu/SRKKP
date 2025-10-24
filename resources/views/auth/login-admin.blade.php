<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-amber-50 via-white to-orange-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <!-- Header -->
            <div class="text-center">
                <div class="mx-auto h-16 w-16 bg-gradient-to-r from-amber-600 to-orange-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h2 class="mt-6 text-3xl font-bold text-gray-900">Login Admin</h2>
                <p class="mt-2 text-sm text-gray-600">
                    Masuk ke panel administrasi Sistem Rekomendasi BBM
                </p>
            </div>

            <!-- Login Form -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4 p-6 pb-0" :status="session('status')" />

                <div class="p-6">
                    <form method="POST" action="{{ route('filament.admin.auth.login') }}" class="space-y-6">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                Alamat Email
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                    </svg>
                                </div>
                                <input id="email" name="email" type="email" autocomplete="email" required
                                       class="appearance-none relative block w-full px-10 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent focus:z-10 sm:text-sm transition-all duration-200"
                                       placeholder="admin@email.com"
                                       :value="old('email')" />
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                                Kata Sandi
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                </div>
                                <input id="password" name="password" type="password" autocomplete="current-password" required
                                       class="appearance-none relative block w-full px-10 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent focus:z-10 sm:text-sm transition-all duration-200"
                                       placeholder="Masukkan kata sandi" />
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember_me" name="remember" type="checkbox"
                                       class="h-4 w-4 text-amber-600 focus:ring-amber-500 border-gray-300 rounded transition duration-150 ease-in-out" />
                                <label for="remember_me" class="ml-2 block text-sm text-gray-700">
                                    Ingat saya
                                </label>
                            </div>

                            @if (Route::has('password.request'))
                                <div class="text-sm">
                                    <a href="{{ route('password.request') }}" class="font-medium text-amber-600 hover:text-amber-500 transition-colors duration-200">
                                        Lupa kata sandi?
                                    </a>
                                </div>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit"
                                    class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-semibold rounded-xl text-white bg-gradient-to-r from-amber-600 to-orange-600 hover:from-amber-700 hover:to-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                    <svg class="h-5 w-5 text-amber-500 group-hover:text-amber-400 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                    </svg>
                                </span>
                                Masuk ke Admin Panel
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Footer -->
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                    <div class="text-center">
                        <p class="text-sm text-gray-600">
                            Bukan admin?
                            <a href="{{ route('login') }}" class="font-medium text-amber-600 hover:text-amber-500 ml-1 transition-colors duration-200">
                                Login sebagai User
                            </a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Additional Info -->
            <div class="text-center">
                <div class="flex justify-center space-x-4 text-sm text-gray-500">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-1 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Aman & Terpercaya
                    </span>
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-1 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                            Data Terlindungi
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
