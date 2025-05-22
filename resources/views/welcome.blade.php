<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIKS- Sistem Informasi Keuangan Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 50%, #1d4ed8 100%);
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .feature-icon {
            transition: all 0.3s ease;
        }
        .feature-card:hover .feature-icon {
            transform: scale(1.1);
        }
        .stats-card:hover {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
            color: white;
        }
        .stats-card:hover .stats-icon {
            color: white;
        }
        .mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }
        .mobile-menu.open {
            max-height: 500px;
        }
    </style>
</head>
<body class="font-sans antialiased text-gray-800">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        {{-- <img class="h-10 w-auto" src="{{asset('assets/img/kaiadmin/logo.png')}}" alt="SIKS Logo"> --}}
                        <span class="ml-2 text-xl font-bold text-blue-800">SIKS</span>
                    </div>
                    <div class="hidden md:ml-10 md:flex md:space-x-8">
                        <a href="#" class="border-blue-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Beranda</a>
                    </div>
                </div>
                <div class="hidden md:flex items-center">
                     @if (Route::has('login'))
                     @auth
                    <a href="{{ url('/dashboard') }}" class="ml-8 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Dashboard</a>
                     @else
                     <a href="{{route('login')}}" class="ml-8 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Masuk</a>
                     @endauth
                     @endif
                </div>
                <div class="-mr-2 flex items-center md:hidden">
                    <button type="button" id="mobile-menu-button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
                        <span class="sr-only">Open main menu</span>
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="mobile-menu md:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <a href="#" class="bg-blue-50 border-blue-500 text-blue-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Beranda</a>
                <a href="#" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Fitur</a>
                <a href="#" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Laporan</a>
                <a href="#" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Bantuan</a>
                <div class="mt-4 px-3">
                    <a href="login.html" class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-blue-600 hover:bg-blue-700">Masuk</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="gradient-bg">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">
                    Sistem Informasi Keuangan Sekolah
                </h1>
                <p class="mt-6 max-w-lg mx-auto text-xl text-blue-100">
                    Solusi terintegrasi untuk manajemen keuangan sekolah yang transparan, dan efisien.
                </p>
                <div class="mt-10 flex justify-center space-x-4">
                    <a href="{{route('login')}}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-blue-700 bg-white hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white">
                        Masuk Sekarang
                    </a>
                    <a href="#" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 bg-opacity-60 hover:bg-opacity-70 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base text-blue-600 font-semibold tracking-wide uppercase">Fitur Unggulan</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Manajemen Keuangan yang Lebih Baik
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                    Sistem kami dirancang khusus untuk memenuhi kebutuhan keuangan sekolah dengan fitur-fitur canggih.
                </p>
            </div>

            <div class="mt-10">
                <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-3">
                    <!-- Feature 1 -->
                    <div class="feature-card bg-white rounded-lg overflow-hidden shadow-md transition-all duration-300 ease-in-out">
                        <div class="p-6">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-100 text-blue-600 feature-icon">
                                <i class="fas fa-chart-pie text-xl"></i>
                            </div>
                            <div class="mt-5">
                                <h3 class="text-lg font-medium text-gray-900">Sistem Berbasis Web</h3>
                                <p class="mt-2 text-base text-gray-500">
                                    Aplikasi dapat diakses dari mana saja dan kapan saja melalui browser web.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Feature 2 -->
                    <div class="feature-card bg-white rounded-lg overflow-hidden shadow-md transition-all duration-300 ease-in-out">
                        <div class="p-6">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-100 text-blue-600 feature-icon">
                                <i class="fas fa-receipt text-xl"></i>
                            </div>
                            <div class="mt-5">
                                <h3 class="text-lg font-medium text-gray-900">Pencatatan Transaksi</h3>
                                <p class="mt-2 text-base text-gray-500">
                                    Catat semua transaksi keuangan sekolah secara real-time dengan bukti yang valid.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Feature 3 -->
                    <div class="feature-card bg-white rounded-lg overflow-hidden shadow-md transition-all duration-300 ease-in-out">
                        <div class="p-6">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-100 text-blue-600 feature-icon">
                                <i class="fas fa-file-invoice-dollar text-xl"></i>
                            </div>
                            <div class="mt-5">
                                <h3 class="text-lg font-medium text-gray-900">Laporan </h3>
                                <p class="mt-2 text-base text-gray-500">
                                    Hasilkan laporan keuangan secara akurat dan dapat diexport pada format excel sehingga mudah digunakan.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Feature 4 -->
                    <div class="feature-card bg-white rounded-lg overflow-hidden shadow-md transition-all duration-300 ease-in-out">
                        <div class="p-6">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-100 text-blue-600 feature-icon">
                                <i class="fas fa-user-shield text-xl"></i>
                            </div>
                            <div class="mt-5">
                                <h3 class="text-lg font-medium text-gray-900">Keamanan Data</h3>
                                <p class="mt-2 text-base text-gray-500">
                                    Sistem keamanan berlapis untuk melindungi data keuangan sekolah Anda.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Feature 5 -->
                    <div class="feature-card bg-white rounded-lg overflow-hidden shadow-md transition-all duration-300 ease-in-out">
                        <div class="p-6">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-100 text-blue-600 feature-icon">
                                <i class="fas fa-mobile-alt text-xl"></i>
                            </div>
                            <div class="mt-5">
                                <h3 class="text-lg font-medium text-gray-900">Akses Mobile</h3>
                                <p class="mt-2 text-base text-gray-500">
                                    Pantau keuangan sekolah kapan saja dan di mana saja melalui perangkat mobile.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Feature 6 -->
                    <div class="feature-card bg-white rounded-lg overflow-hidden shadow-md transition-all duration-300 ease-in-out">
                        <div class="p-6">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-100 text-blue-600 feature-icon">
                                <i class="fas fa-users text-xl"></i>
                            </div>
                            <div class="mt-5">
                                <h3 class="text-lg font-medium text-gray-900">Multi-User</h3>
                                <p class="mt-2 text-base text-gray-500">
                                    Dukungan untuk banyak pengguna dengan level akses yang berbeda.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <footer class="bg-gray-800">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                {{-- <div>
                    <h3 class="text-sm font-semibold text-gray-300 tracking-wider uppercase">Tentang</h3>
                    <ul class="mt-4 space-y-4">
                        <li><a href="#" class="text-base text-gray-400 hover:text-white">Tentang Kami</a></li>
                        <li><a href="#" class="text-base text-gray-400 hover:text-white">Tim</a></li>
                        <li><a href="#" class="text-base text-gray-400 hover:text-white">Karir</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-300 tracking-wider uppercase">Dukungan</h3>
                    <ul class="mt-4 space-y-4">
                        <li><a href="#" class="text-base text-gray-400 hover:text-white">Pusat Bantuan</a></li>
                        <li><a href="#" class="text-base text-gray-400 hover:text-white">Dokumentasi</a></li>
                        <li><a href="#" class="text-base text-gray-400 hover:text-white">Panduan</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-300 tracking-wider uppercase">Legal</h3>
                    <ul class="mt-4 space-y-4">
                        <li><a href="#" class="text-base text-gray-400 hover:text-white">Kebijakan Privasi</a></li>
                        <li><a href="#" class="text-base text-gray-400 hover:text-white">Syarat & Ketentuan</a></li>
                        <li><a href="#" class="text-base text-gray-400 hover:text-white">Lisensi</a></li>
                    </ul>
                </div> --}}
                <div>
                    <h3 class="text-sm font-semibold text-gray-300 tracking-wider uppercase">Hubungi Kami</h3>
                    <ul class="mt-4 space-y-4">
                        <li class="text-base text-gray-400">support@sifis.example</li>
                        <li class="text-base text-gray-400">(021) 1234-5678</li>
                        <li class="text-base text-gray-400">Jl. Pendidikan No. 123, Jakarta</li>
                    </ul>
                </div>
            </div>
            <div class="mt-12 border-t border-gray-700 pt-8 flex flex-col md:flex-row justify-between">
                <p class="text-base text-gray-400">
                    &copy; 2023 SIFIS - Sistem Informasi Keuangan Sekolah. All rights reserved.
                </p>
                <div class="mt-4 md:mt-0 flex space-x-6">
                    <a href="#" class="text-gray-400 hover:text-white">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('open');

            // Change icon
            const icon = this.querySelector('i');
            if (menu.classList.contains('open')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                if (targetId === '#') return;

                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth'
                    });

                    // Close mobile menu if open
                    const mobileMenu = document.getElementById('mobile-menu');
                    if (mobileMenu.classList.contains('open')) {
                        mobileMenu.classList.remove('open');
                        const menuButton = document.getElementById('mobile-menu-button');
                        const icon = menuButton.querySelector('i');
                        icon.classList.remove('fa-times');
                        icon.classList.add('fa-bars');
                    }
                }
            });
        });
    </script>
</body>
</html>
