<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Informasi Keuangan Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 50%, #1d4ed8 100%);
        }
        .input-focus:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
            border-color: #3b82f6;
        }
        .shake {
            animation: shake 0.5s;
        }
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full space-y-8">
        <div class="text-center">
            <img src="{{asset('assets/img/kaiadmin/SIKS.png')}}" alt="Logo" class="mx-auto w-auto">
            {{-- <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                Sistem Informasi Keuangan Sekolah
            </h2> --}}
            <p class="mt-2 text-sm text-gray-600">
                Masukkan Akun Anda untuk mengakses sistem
            </p>
        </div>

        <div class="bg-white shadow-xl rounded-lg overflow-hidden">
            <div class="gradient-bg py-3 px-4">
                <h3 class="text-lg font-medium text-white">Login</h3>
            </div>

            <form method="POST" action="{{ route('login') }}" id="loginForm" class="px-8 py-6 space-y-6">
                @csrf
                <div class="rounded-md shadow-sm space-y-4">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                            Email
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user text-gray-400"></i>
                            </div>
                            <input id="email" name="email" type="text" required
                                class="input-focus pl-10 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none transition duration-150"
                                placeholder="Masukkan Email">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                            Password
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input id="password" name="password" type="password" required
                                class="input-focus pl-10 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none transition duration-150"
                                placeholder="Masukkan password">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <button type="button" id="togglePassword" class="text-gray-400 hover:text-gray-500 focus:outline-none">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember" type="checkbox"
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="remember-me" class="ml-2 block text-sm text-gray-700">
                            Ingat saya
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="#" id="forgotPassword" class="font-medium text-blue-600 hover:text-blue-500">
                            Lupa password?
                        </a>
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <i class="fas fa-sign-in-alt"></i>
                        </span>
                        Masuk
                    </button>
                </div>
            </form>
        </div>

        <div class="text-center text-sm text-gray-500">
            © 2025 Sistem Informasi Keuangan Sekolah. All rights reserved.
        </div>
    </div>

    <!-- Forgot Password Modal -->
    <div id="forgotModal" class="fixed inset-0 z-10 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="gradient-bg px-4 py-3 sm:px-6 flex justify-between items-center">
                    <h3 class="text-lg font-medium text-white">Lupa Password</h3>
                    <button id="closeModal" class="text-white hover:text-gray-200 focus:outline-none">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div class="px-4 py-5 sm:p-6">
                    <p class="text-sm text-gray-600 mb-4">
                        Jika Anda lupa password, silakan hubungi administrator sistem melalui kontak berikut:
                    </p>

                    <div class="space-y-3">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-blue-100 rounded-full p-2">
                                <i class="fas fa-envelope text-blue-600"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-700">Email</p>
                                <p class="text-sm text-blue-600">admin@sekolah.example</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-blue-100 rounded-full p-2">
                                <i class="fas fa-phone-alt text-blue-600"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-700">Telepon</p>
                                <p class="text-sm text-blue-600">(021) 1234-5678</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-blue-100 rounded-full p-2">
                                <i class="fas fa-map-marker-alt text-blue-600"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-700">Lokasi</p>
                                <p class="text-sm text-gray-600">Kantor TU Sekolah, Lantai 2</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" id="closeModalBtn" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm transition duration-150">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle password visibility
            const togglePassword = document.getElementById('togglePassword');
            const password = document.getElementById('password');

            togglePassword.addEventListener('click', function() {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
            });

            // Forgot password modal
            const forgotPassword = document.getElementById('forgotPassword');
            const forgotModal = document.getElementById('forgotModal');
            const closeModal = document.getElementById('closeModal');
            const closeModalBtn = document.getElementById('closeModalBtn');

            forgotPassword.addEventListener('click', function(e) {
                e.preventDefault();
                forgotModal.classList.remove('hidden');
            });

            [closeModal, closeModalBtn].forEach(el => {
                el.addEventListener('click', function() {
                    forgotModal.classList.add('hidden');
                });
            });
        });
    </script>
</body>
</html>
