<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title', 'Authentication')</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Custom Tailwind Configuration -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Inter', 'ui-sans-serif', 'system-ui'],
                        'poppins': ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        'primary': {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                        }
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'float-delayed': 'float 6s ease-in-out infinite 2s',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'bounce-slow': 'bounce 3s infinite',
                        'fade-in-up': 'fade-in-up 1s ease-out',
                        'slide-in-left': 'slide-in-left 0.8s ease-out',
                        'slide-in-right': 'slide-in-right 0.8s ease-out',
                    }
                }
            }
        }
    </script>

    <style>
        .bg-mesh {
            background:
                radial-gradient(circle at 25% 25%, rgba(34, 197, 94, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, rgba(16, 163, 74, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 50% 50%, rgba(21, 128, 61, 0.05) 0%, transparent 50%);
        }

        .glass-effect {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow:
                0 25px 50px -12px rgba(0, 0, 0, 0.25),
                0 0 0 1px rgba(255, 255, 255, 0.1);
        }

        .floating-container {
            background: linear-gradient(135deg,
                rgba(22, 163, 74, 0.95) 0%,
                rgba(21, 128, 61, 0.9) 50%,
                rgba(20, 83, 45, 0.95) 100%);
            backdrop-filter: blur(10px);
            border-radius: 32px;
            box-shadow:
                0 32px 64px -12px rgba(0, 0, 0, 0.4),
                0 0 0 1px rgba(255, 255, 255, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.2);
            transform: perspective(1000px) rotateY(-5deg);
            animation: float 6s ease-in-out infinite;
        }

        .pattern-dots {
            background-image:
                radial-gradient(circle at 1px 1px, rgba(255,255,255,0.15) 1px, transparent 0);
            background-size: 20px 20px;
        }

        .gradient-text {
            background: linear-gradient(135deg, #ffffff 0%, #dcfce7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .floating-element {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }

        .floating-element-1 {
            width: 60px;
            height: 60px;
            top: 10%;
            right: 15%;
            animation: float 8s ease-in-out infinite;
        }

        .floating-element-2 {
            width: 40px;
            height: 40px;
            top: 70%;
            right: 10%;
            animation: float 10s ease-in-out infinite 3s;
        }

        .floating-element-3 {
            width: 80px;
            height: 80px;
            top: 40%;
            right: 5%;
            animation: float 7s ease-in-out infinite 1.5s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            25% {
                transform: translateY(-20px) rotate(5deg);
            }
            50% {
                transform: translateY(-15px) rotate(0deg);
            }
            75% {
                transform: translateY(-25px) rotate(-5deg);
            }
        }

        @keyframes fade-in-up {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slide-in-left {
            0% {
                opacity: 0;
                transform: translateX(-50px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slide-in-right {
            0% {
                opacity: 0;
                transform: translateX(50px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .shine-effect {
            position: relative;
            overflow: hidden;
        }

        .shine-effect::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(255, 255, 255, 0.2),
                transparent
            );
            transition: left 0.6s;
        }

        .shine-effect:hover::before {
            left: 100%;
        }
    </style>
</head>
<body class="min-h-screen bg-mesh font-sans overflow-hidden relative">
    <!-- Background Elements -->
    <div class="absolute inset-0 bg-gradient-to-br from-primary-50 via-emerald-50 to-green-100"></div>

    <!-- Floating Background Circles -->
    <div class="absolute top-20 left-20 w-32 h-32 bg-primary-200/20 rounded-full blur-2xl animate-pulse-slow"></div>
    <div class="absolute bottom-20 right-20 w-40 h-40 bg-emerald-300/20 rounded-full blur-2xl animate-pulse-slow" style="animation-delay: 2s"></div>
    <div class="absolute top-1/2 left-10 w-24 h-24 bg-green-200/20 rounded-full blur-xl animate-bounce-slow"></div>

    <div class="min-h-screen flex relative z-10">
        <!-- Bagian Kiri - Floating Container dengan Background Image & Copywriting -->
        <div class="hidden lg:flex lg:w-1/2 items-center justify-center p-8 relative">
            <!-- Floating Elements -->
            <div class="floating-element floating-element-1"></div>
            <div class="floating-element floating-element-2"></div>
            <div class="floating-element floating-element-3"></div>

            <!-- Main Floating Container -->
            <div class="floating-container relative w-full max-w-lg mx-8 p-8 animate-slide-in-left">
                <!-- Background Image with Overlay -->
                <div class="absolute inset-0 rounded-3xl overflow-hidden">
                    <div class="absolute inset-0 bg-cover bg-center"
                         style="background-image: url('https://images.unsplash.com/photo-1569718212165-3a8278d5f624?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2080&q=80'); opacity: 0.1;">
                    </div>
                    <div class="absolute inset-0 pattern-dots"></div>
                </div>

                <!-- Content -->
                <div class="relative z-10 text-white">
                    <!-- Logo/Brand dengan Animate -->
                    <div class="mb-8 animate-fade-in-up">
                        <div class="flex items-center space-x-4">
                            <div class="w-16 h-16 bg-white/20 backdrop-blur-md rounded-3xl flex items-center justify-center shine-effect">
                                <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 1H5C3.89 1 3 1.89 3 3V19C3 20.1 3.9 21 5 21H11V19H5V3H13V9H21ZM19 12H13L11 14L13 16H19C20.1 16 21 15.1 21 14S20.1 12 19 12Z"/>
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-3xl font-bold font-poppins gradient-text">MieKasir</h1>
                                <p class="text-white/80 text-sm font-medium">Sistem Kasir Modern</p>
                            </div>
                        </div>
                    </div>

                    <!-- Main Copywriting -->
                    <div class="space-y-6 animate-fade-in-up" style="animation-delay: 0.2s">
                        <h2 class="text-4xl lg:text-5xl font-bold font-poppins leading-tight gradient-text">
                            Revolusi Digital
                            <span class="block text-emerald-100">Bisnis Mie Ayam</span>
                            <span class="block text-white">Anda</span>
                        </h2>

                        <p class="text-lg text-white/90 leading-relaxed font-medium">
                            Platform kasir dan manajemen yang mengubah cara Anda mengelola warung mie ayam.
                            Tingkatkan efisiensi, pantau stok real-time, dan kembangkan bisnis dengan teknologi terdepan.
                        </p>

                                                 <!-- Statistics -->
                         <div class="grid grid-cols-3 gap-4 pt-6" style="animation-delay: 0.4s">
                             <div class="text-center animate-fade-in-up">
                                 <div class="text-2xl font-bold text-emerald-200">100%</div>
                                 <div class="text-xs text-white/70">Akurasi Data</div>
                             </div>
                             <div class="text-center animate-fade-in-up" style="animation-delay: 0.1s">
                                 <div class="text-2xl font-bold text-emerald-200">Real</div>
                                 <div class="text-xs text-white/70">Time Update</div>
                             </div>
                             <div class="text-center animate-fade-in-up" style="animation-delay: 0.2s">
                                 <div class="text-2xl font-bold text-emerald-200">Auto</div>
                                 <div class="text-xs text-white/70">Backup</div>
                             </div>
                         </div>

                        <!-- Features dengan Icon -->
                        <div class="space-y-4 pt-4">
                            <div class="flex items-center space-x-4 group animate-fade-in-up" style="animation-delay: 0.6s">
                                <div class="w-8 h-8 bg-emerald-400/30 backdrop-blur-sm rounded-xl flex items-center justify-center group-hover:bg-emerald-400/50 transition-all duration-300">
                                    <svg class="w-5 h-5 text-emerald-200" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-white/90 font-medium">Kasir Lightning Fast dengan POS Modern</span>
                            </div>
                            <div class="flex items-center space-x-4 group animate-fade-in-up" style="animation-delay: 0.7s">
                                <div class="w-8 h-8 bg-emerald-400/30 backdrop-blur-sm rounded-xl flex items-center justify-center group-hover:bg-emerald-400/50 transition-all duration-300">
                                    <svg class="w-5 h-5 text-emerald-200" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-white/90 font-medium">Smart Inventory dengan AI Prediction</span>
                            </div>
                            <div class="flex items-center space-x-4 group animate-fade-in-up" style="animation-delay: 0.8s">
                                <div class="w-8 h-8 bg-emerald-400/30 backdrop-blur-sm rounded-xl flex items-center justify-center group-hover:bg-emerald-400/50 transition-all duration-300">
                                    <svg class="w-5 h-5 text-emerald-200" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-white/90 font-medium">Analytics Dashboard Real-time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bagian Kanan - Form Authentication -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 relative animate-slide-in-right">
            <div class="w-full max-w-md relative">
                <!-- Mobile Logo -->
                <div class="lg:hidden mb-8 text-center animate-fade-in-up">
                    <div class="flex items-center justify-center space-x-3 mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-primary-600 to-primary-700 rounded-3xl flex items-center justify-center shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 1H5C3.89 1 3 1.89 3 3V19C3 20.1 3.9 21 5 21H11V19H5V3H13V9H21ZM19 12H13L11 14L13 16H19C20.1 16 21 15.1 21 14S20.1 12 19 12Z"/>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold font-poppins text-gray-900">MieKasir</h1>
                            <p class="text-primary-600 text-sm font-medium">Sistem Kasir Modern</p>
                        </div>
                    </div>
                </div>

                <!-- Auth Form Container -->
                <div class="glass-effect rounded-3xl p-8 animate-fade-in-up" style="animation-delay: 0.3s">
                    @yield('content')
                </div>

                <!-- Footer -->
                <div class="mt-8 text-center text-sm text-gray-500 animate-fade-in-up" style="animation-delay: 0.5s">
                    <p>&copy; {{ date('Y') }} MieKasir. Semua hak cipta dilindungi.</p>
                    <p class="mt-1 text-xs">Powered by Modern Technology</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    @stack('scripts')
</body>
</html>
