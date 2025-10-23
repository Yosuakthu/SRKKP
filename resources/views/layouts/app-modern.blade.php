<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>SR-KKP - Sistem Rekomendasi BBM Khusus Penugasan</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .status-badge {
                @apply inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium;
            }
            .status-draft { @apply bg-gray-100 text-gray-800; }
            .status-menunggu_operator { @apply bg-yellow-100 text-yellow-800; }
            .status-menunggu_kepala { @apply bg-blue-100 text-blue-800; }
            .status-dipublikasikan { @apply bg-green-100 text-green-800; }
            .status-ditolak { @apply bg-red-100 text-red-800; }

            /* Custom scrollbar */
            ::-webkit-scrollbar {
                width: 6px;
            }
            ::-webkit-scrollbar-track {
                background: #f1f5f9;
            }
            ::-webkit-scrollbar-thumb {
                background: #cbd5e1;
                border-radius: 3px;
            }
            ::-webkit-scrollbar-thumb:hover {
                background: #94a3b8;
            }

            /* Smooth transitions */
            * {
                transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
                transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
                transition-duration: 150ms;
            }
        </style>
    </head>
    <body class="font-sans antialiased bg-gray-50">
        <div class="min-h-screen flex flex-col">
            @include('layouts.navigation-modern')

            <!-- Page Content -->
            <main class="flex-1">
                {{ $slot }}
            </main>
        </div>

        <!-- Loading overlay -->
        <div id="loading-overlay" class="fixed inset-0 bg-white bg-opacity-75 flex items-center justify-center z-50 hidden">
            <div class="text-center">
                <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600 mx-auto"></div>
                <p class="mt-4 text-gray-600">Memuat...</p>
            </div>
        </div>

        <script>
            // Loading overlay functions
            window.showLoading = function() {
                document.getElementById('loading-overlay').classList.remove('hidden');
            };

            window.hideLoading = function() {
                document.getElementById('loading-overlay').classList.add('hidden');
            };

            // Auto-hide loading on page load
            document.addEventListener('DOMContentLoaded', function() {
                window.hideLoading();
            });

            // Show loading on form submit
            document.addEventListener('submit', function(e) {
                if (e.target.tagName === 'FORM') {
                    window.showLoading();
                }
            });
        </script>
    </body>
</html>
