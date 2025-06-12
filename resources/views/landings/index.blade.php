@extends('layouts.landing')

@section('title', 'Selamat Datang')

@section('content')
    <!-- Hero Section -->
    <section class="relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute top-0 left-0 w-full h-full">
            <div class="absolute top-10 left-10 w-64 h-64 bg-primary-200/30 rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-64 h-64 bg-emerald-200/30 rounded-full blur-3xl"></div>
        </div>

        <!-- Hero Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-32 relative">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div class="space-y-8 animate-fade-in-up">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold font-poppins leading-tight text-gray-900">
                        Kelola Bisnis
                        <span class="text-primary-600">Mie Ayam</span>
                        Lebih Modern
                    </h1>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        MieKasir adalah solusi point of sale modern untuk warung mie ayam Anda.
                        Kelola transaksi, stok, dan laporan dengan mudah dalam satu aplikasi.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('register') }}" class="inline-flex items-center px-6 py-3 rounded-xl bg-primary-600 text-white font-semibold hover:bg-primary-700 transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Mulai Gratis
                        </a>
                        <a href="#features" class="inline-flex items-center px-6 py-3 rounded-xl bg-white text-gray-700 font-semibold hover:bg-gray-50 transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Pelajari Lebih Lanjut
                        </a>
                    </div>
                </div>

                <!-- Right Image -->
                <div class="relative animate-fade-in-up" style="animation-delay: 0.2s">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-br from-primary-500/20 to-emerald-500/20 rounded-3xl transform rotate-3"></div>
                        <img src="https://images.unsplash.com/photo-1582878826629-29b7ad1cdc43?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80"
                             alt="Mie Ayam Modern"
                             onerror="this.onerror=null; this.src='{{ asset('assets/images/no-image.png') }}';"
                             class="relative rounded-3xl shadow-2xl transform -rotate-3 hover:rotate-0 transition-transform duration-500">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-white/50 backdrop-blur-xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 animate-fade-in-up">
                <h2 class="text-3xl md:text-4xl font-bold font-poppins text-gray-900 mb-4">
                    Fitur Unggulan untuk Bisnis Anda
                </h2>
                <p class="text-lg text-gray-600">
                    Nikmati berbagai fitur modern yang akan membantu mengembangkan bisnis mie ayam Anda
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1: POS -->
                <div class="card-modern p-6 animate-fade-in-up" style="animation-delay: 0.1s">
                    <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Point of Sale Modern</h3>
                    <p class="text-gray-600">
                        Proses transaksi dengan cepat dan mudah. Mendukung berbagai metode pembayaran modern.
                    </p>
                </div>

                <!-- Feature 2: Inventory -->
                <div class="card-modern p-6 animate-fade-in-up" style="animation-delay: 0.2s">
                    <div class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Manajemen Stok</h3>
                    <p class="text-gray-600">
                        Pantau stok bahan baku secara real-time. Dapatkan notifikasi saat stok menipis.
                    </p>
                </div>

                <!-- Feature 3: Analytics -->
                <div class="card-modern p-6 animate-fade-in-up" style="animation-delay: 0.3s">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Laporan & Analisis</h3>
                    <p class="text-gray-600">
                        Analisis penjualan dan performa bisnis dengan laporan yang detail dan mudah dipahami.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Preview -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 animate-fade-in-up">
                <h2 class="text-3xl md:text-4xl font-bold font-poppins text-gray-900 mb-4">
                    Menu Unggulan Kami
                </h2>
                <p class="text-lg text-gray-600">
                    Kelola berbagai menu mie ayam dengan mudah melalui sistem kami
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($products->take(4) as $product)
                <div class="card-modern p-4 animate-fade-in-up" style="animation-delay: {{ 0.1 * $loop->iteration }}s">
                    <div class="aspect-square bg-gray-100 rounded-xl overflow-hidden mb-4">
                        @if($product->image)
                            <img src="{{ Storage::url($product->image) }}"
                                 alt="{{ $product->name }}"
                                 onerror="this.onerror=null; this.src='{{ asset('assets/images/no-image.png') }}';"
                                 class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-300">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gray-100">
                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                        @endif
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-1">{{ $product->name }}</h3>
                    <p class="text-sm text-gray-500 mb-2">{{ $product->category->name }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-lg font-bold text-primary-600">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </span>
                        <span class="text-sm px-2 py-1 bg-primary-50 text-primary-700 rounded-full">
                            Stok: {{ $product->stock }}
                        </span>
                    </div>
                    <div class="mt-4 flex justify-between items-center">
                        <button onclick="addToCart({{ $product->id }})"
                                class="flex justify-center items-center px-4 py-2 bg-primary-600 text-white text-center rounded-lg hover:bg-primary-700 transition-colors duration-200 w-full">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            Tambah ke Keranjang
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    @push('scripts')
    <script>
        function addToCart(productId) {
            if (!@json(auth()->check())) {
                window.location.href = '{{ route('login') }}';
                return;
            }

            fetch('/carts/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    token: '{{ csrf_token() }}',
                    product_id: productId,
                    quantity: 1
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update cart count and items
                    window.loadCart();

                    // Tampilkan notifikasi sukses
                    const notification = document.createElement('div');
                    notification.className = 'fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg transform transition-transform duration-300 translate-y-0';
                    notification.textContent = 'Berhasil menambahkan ke keranjang!';
                    document.body.appendChild(notification);

                    // Hilangkan notifikasi setelah 3 detik
                    setTimeout(() => {
                        notification.classList.add('translate-y-full');
                        setTimeout(() => notification.remove(), 300);
                    }, 3000);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                // Tampilkan notifikasi error
                const notification = document.createElement('div');
                notification.className = 'fixed bottom-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg';
                notification.textContent = 'Gagal menambahkan ke keranjang. Silakan coba lagi.';
                document.body.appendChild(notification);

                setTimeout(() => notification.remove(), 3000);
            });
        }
    </script>
    @endpush

    <!-- Statistics Section -->
    <section class="py-20 bg-gradient-to-br from-primary-600 to-emerald-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Total Products -->
                <div class="text-center animate-fade-in-up">
                    <div class="text-4xl font-bold mb-2">{{ $products->count() }}</div>
                    <p class="text-primary-100">Total Menu</p>
                </div>

                <!-- Total Categories -->
                <div class="text-center animate-fade-in-up" style="animation-delay: 0.1s">
                    <div class="text-4xl font-bold mb-2">{{ $categories->count() }}</div>
                    <p class="text-primary-100">Kategori Menu</p>
                </div>

                <!-- Total Transactions -->
                <div class="text-center animate-fade-in-up" style="animation-delay: 0.2s">
                    <div class="text-4xl font-bold mb-2">{{ $transactions->count() }}</div>
                    <p class="text-primary-100">Transaksi Selesai</p>
                </div>

                <!-- Total Users -->
                <div class="text-center animate-fade-in-up" style="animation-delay: 0.3s">
                    <div class="text-4xl font-bold mb-2">{{ $users->count() }}</div>
                    <p class="text-primary-100">Pengguna Aktif</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="card-modern p-8 md:p-12 text-center animate-fade-in-up">
                <h2 class="text-3xl md:text-4xl font-bold font-poppins text-gray-900 mb-4">
                    Siap Memulai?
                </h2>
                <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">
                    Bergabunglah dengan MieKasir dan rasakan kemudahan mengelola bisnis mie ayam Anda secara modern
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('register') }}" class="inline-flex items-center px-8 py-4 rounded-xl bg-primary-600 text-white font-semibold hover:bg-primary-700 transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        Daftar Sekarang
                    </a>
                    <a href="#contact" class="inline-flex items-center px-8 py-4 rounded-xl bg-white text-gray-700 font-semibold hover:bg-gray-50 transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
