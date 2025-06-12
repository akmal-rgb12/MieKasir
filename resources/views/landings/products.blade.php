@extends('layouts.landing')

@section('title', 'Menu Kami')

@push('styles')
<style>
    /* Custom Pagination Styles */
    .pagination {
        @apply flex justify-center items-center gap-2 mt-8;
    }

    .pagination li {
        @apply inline-flex items-center;
    }

    .pagination li .page-link,
    .pagination li .page-text {
        @apply px-3 py-2 text-sm rounded-lg transition-all duration-200;
    }

    .pagination li.active .page-link {
        @apply bg-primary-600 text-white border-primary-600;
    }

    .pagination li .page-link {
        @apply text-gray-500 hover:text-primary-600 hover:bg-primary-50;
    }

    .pagination li.disabled .page-text {
        @apply text-gray-300 cursor-not-allowed;
    }

    /* Category Filter Styles */
    .category-filter {
        @apply relative flex flex-wrap gap-2 justify-center;
    }

    .category-btn {
        @apply relative px-6 py-3 rounded-xl text-sm font-medium transition-all duration-300 transform hover:-translate-y-0.5;
        animation: slideIn 0.5s ease-out backwards;
    }

    .category-btn::after {
        content: '';
        @apply absolute bottom-0 left-1/2 w-0 h-0.5 bg-primary-500 transform -translate-x-1/2 transition-all duration-300;
    }

    .category-btn:hover::after {
        @apply w-full;
    }

    .category-btn.active {
        @apply bg-primary-600 text-white shadow-lg shadow-primary-500/25;
        transform: translateY(-2px);
    }

    .category-btn.active::after {
        @apply w-full bg-white;
    }

    .category-btn:not(.active) {
        @apply bg-white/80 backdrop-blur-lg text-gray-700 hover:bg-white hover:text-primary-600 shadow-md;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Product card animations */
    .product-card {
        transition: all 0.5s ease-in-out;
    }

    .product-card.hidden {
        opacity: 0;
        transform: scale(0.8);
    }

    .product-card.visible {
        opacity: 1;
        transform: scale(1);
    }
</style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute top-0 left-0 w-full h-full">
            <div class="absolute top-10 left-10 w-64 h-64 bg-primary-200/30 rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-64 h-64 bg-emerald-200/30 rounded-full blur-3xl"></div>
        </div>

        <!-- Hero Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 relative">
            <div class="text-center max-w-3xl mx-auto mb-16 animate-fade-in-up">
                <h1 class="text-4xl md:text-5xl font-bold font-poppins text-gray-900 mb-4">
                    Menu <span class="text-primary-600">Mie Ayam</span> Kami
                </h1>
                <p class="text-lg text-gray-600">
                    Temukan berbagai pilihan menu mie ayam lezat dengan berbagai varian yang menggugah selera
                </p>
            </div>
        </div>
    </section>

    <!-- Category Filter -->
    <section class="py-8 bg-white/50 backdrop-blur-xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap items-center justify-center gap-3">
                <button onclick="filterByCategory('all')"
                        data-category="all"
                        class="group relative overflow-hidden px-6 py-3 rounded-xl bg-white hover:bg-primary-50 border-2 border-transparent hover:border-primary-100 text-sm font-medium transition-all duration-300 ease-in-out transform hover:-translate-y-0.5 hover:shadow-lg active:translate-y-0 active:shadow-md">
                    <div class="absolute inset-0 bg-gradient-to-r from-primary-600 to-primary-500 transition-transform duration-300 ease-out transform translate-y-full group-hover:translate-y-0"></div>
                    <span class="relative flex items-center gap-2 text-primary-600 group-hover:text-white transition-colors duration-300">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        Semua Menu
                    </span>
                </button>

                @foreach($categories as $category)
                    <button onclick="filterByCategory('{{ $category->id }}')"
                            data-category="{{ $category->id }}"
                            class="group relative overflow-hidden px-6 py-3 rounded-xl bg-white hover:bg-primary-50 border-2 border-transparent hover:border-primary-100 text-sm font-medium transition-all duration-300 ease-in-out transform hover:-translate-y-0.5 hover:shadow-lg active:translate-y-0 active:shadow-md">
                        <div class="absolute inset-0 bg-gradient-to-r from-primary-600 to-primary-500 transition-transform duration-300 ease-out transform translate-y-full group-hover:translate-y-0"></div>
                        <span class="relative flex items-center gap-2 text-gray-700 group-hover:text-white transition-colors duration-300">
                            <svg class="w-4 h-4 opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                            {{ $category->name }}
                        </span>
                    </button>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Products Grid -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($products as $product)
                <div class="opacity-0 translate-y-4 product-card card-modern p-4"
                     data-category="{{ $product->category_id }}"
                     style="animation: fadeInUp 0.5s ease-out {{ 0.1 * $loop->iteration }}s forwards;">
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

            <!-- Pagination -->
            <div class="mt-12">
                {{ $products->links() }}
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

        function filterByCategory(categoryId) {
            const buttons = document.querySelectorAll('[data-category]');
            const products = document.querySelectorAll('.product-card');

            // Update button states
            buttons.forEach(button => {
                const isActive = button.dataset.category === categoryId;
                // button.classList.toggle('bg-primary-600', isActive);
                button.classList.toggle('bg-white', !isActive);
                button.classList.toggle('text-white', isActive);
                // button.classList.toggle('border-primary-600', isActive);
                button.classList.toggle('scale-105', isActive);
                button.classList.toggle('shadow-lg', isActive);

                // Update hover gradient for active button
                const gradient = button.querySelector('div');
                if (isActive) {
                    gradient.classList.remove('translate-y-full');
                    gradient.classList.add('translate-y-0');
                } else {
                    gradient.classList.add('translate-y-full');
                    gradient.classList.remove('translate-y-0');
                }
            });

            // Animate products
            products.forEach(product => {
                const shouldShow = categoryId === 'all' || product.dataset.category === categoryId;

                if (shouldShow) {
                    product.classList.remove('hidden');
                    setTimeout(() => {
                        product.classList.remove('opacity-0', 'translate-y-4', 'scale-95');
                        product.classList.add('opacity-100', 'translate-y-0', 'scale-100');
                    }, 50);
                } else {
                    product.classList.add('opacity-0', 'translate-y-4', 'scale-95');
                    setTimeout(() => {
                        product.classList.add('hidden');
                    }, 300);
                }
            });
        }

        // Initialize products animation
        document.addEventListener('DOMContentLoaded', () => {
            const products = document.querySelectorAll('.product-card');
            products.forEach(product => {
                product.classList.add('transition-all', 'duration-300', 'ease-in-out');
            });
        });
    </script>

    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
    @endpush
@endsection
