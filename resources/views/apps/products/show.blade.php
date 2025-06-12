@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')
<div class="max-w-9xl mx-auto space-y-8">
    <!-- Breadcrumb Navigation -->
    <nav class="flex items-center gap-3 text-sm text-gray-600 font-medium animate-fade-in-up">
        <a href="{{ route('products.index') }}" class="hover:text-blue-600 transition-colors duration-200">
            <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2C7 1.45 7.45 1 8 1H16C16.55 1 17 1.45 17 2V4H20C20.55 4 21 4.45 21 5S20.55 6 20 6H19V19C19 20.1 18.1 21 17 21H7C5.9 21 5 20.1 5 19V6H4C3.45 6 3 5.55 3 5S3.45 4 4 4H7ZM9 3V4H15V3H9ZM7 6V19H17V6H7Z"/>
            </svg>
            Produk
        </a>
        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
        <span class="text-gray-900 font-semibold">Detail Produk</span>
    </nav>

    <!-- Page Header -->
    <div class="text-center space-y-4 animate-fade-in-up">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-3xl shadow-lg">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
            </svg>
        </div>
        <div>
            <h1 class="text-3xl font-bold text-gray-900 font-poppins">Detail Produk</h1>
            <p class="text-gray-600 font-medium">Informasi lengkap tentang produk "{{ $product->name }}"</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <!-- Product Image Section -->
        <div class="lg:col-span-1 animate-fade-in-up" style="animation-delay: 0.1s">
            <div class="card-modern p-6">
                <div class="aspect-square w-full bg-gradient-to-br from-gray-100 to-gray-200 rounded-2xl overflow-hidden">
                    @if($product->image)
                        <img src="{{ Storage::url($product->image) }}"
                             alt="{{ $product->name }}"
                             class="w-full h-full object-cover"
                             onerror="this.onerror=null; this.src='{{ asset('assets/images/no-image.png') }}'">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <svg class="w-24 h-24 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M7 4V2C7 1.45 7.45 1 8 1H16C16.55 1 17 1.45 17 2V4H20C20.55 4 21 4.45 21 5S20.55 6 20 6H19V19C19 20.1 18.1 21 17 21H7C5.9 21 5 20.1 5 19V6H4C3.45 6 3 5.55 3 5S3.45 4 4 4H7ZM9 3V4H15V3H9ZM7 6V19H17V6H7Z"/>
                            </svg>
                        </div>
                    @endif
                </div>

                <!-- Quick Actions -->
                <div class="mt-6 space-y-3">
                    <a href="{{ route('products.edit', $product) }}"
                       class="w-full inline-flex items-center justify-center gap-2 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white px-4 py-3 rounded-2xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Edit Produk
                    </a>
                    <a href="{{ route('products.index') }}"
                       class="w-full inline-flex items-center justify-center gap-2 px-4 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-2xl transition-all duration-300 hover:scale-105">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali ke Daftar
                    </a>
                </div>
            </div>
        </div>

        <!-- Product Details Section -->
        <div class="lg:col-span-2 space-y-6">

            <!-- Basic Information Card -->
            <div class="card-modern p-6 animate-fade-in-up" style="animation-delay: 0.2s">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M7 4V2C7 1.45 7.45 1 8 1H16C16.55 1 17 1.45 17 2V4H20C20.55 4 21 4.45 21 5S20.55 6 20 6H19V19C19 20.1 18.1 21 17 21H7C5.9 21 5 20.1 5 19V6H4C3.45 6 3 5.55 3 5S3.45 4 4 4H7ZM9 3V4H15V3H9ZM7 6V19H17V6H7Z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 font-poppins">Informasi Dasar</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-2">Nama Produk</label>
                        <div class="p-3 bg-gray-50 rounded-xl border border-gray-200">
                            <p class="font-semibold text-gray-900">{{ $product->name }}</p>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-2">URL Slug</label>
                        <div class="p-3 bg-gray-50 rounded-xl border border-gray-200">
                            <p class="font-mono text-blue-600 text-sm">{{ $product->slug }}</p>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-2">Kategori</label>
                        <div class="p-3 bg-gray-50 rounded-xl border border-gray-200">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-700">
                                {{ $product->category->name ?? 'Tidak ada kategori' }}
                            </span>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-2">Status</label>
                        <div class="p-3 bg-gray-50 rounded-xl border border-gray-200">
                            @if($product->status === 'active')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-700">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                    </svg>
                                    Aktif
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-700">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                    </svg>
                                    Nonaktif
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Price & Stock Information Card -->
            <div class="card-modern p-6 animate-fade-in-up" style="animation-delay: 0.3s">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-8 h-8 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 font-poppins">Harga & Stok</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-gradient-to-br from-green-50 to-green-100 p-6 rounded-2xl border border-green-200">
                        <div class="flex items-center gap-3 mb-2">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <h4 class="font-semibold text-green-800">Harga Produk</h4>
                        </div>
                        <p class="text-2xl font-bold text-green-900">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <p class="text-sm text-green-600 mt-1">per unit</p>
                    </div>

                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-6 rounded-2xl border border-blue-200">
                        <div class="flex items-center gap-3 mb-2">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                            <h4 class="font-semibold text-blue-800">Stok Tersedia</h4>
                        </div>
                        <div class="flex items-center gap-2">
                            @if($product->stock <= 10)
                                <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                                <p class="text-2xl font-bold text-red-600">{{ $product->stock }}</p>
                            @elseif($product->stock <= 50)
                                <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                                <p class="text-2xl font-bold text-yellow-600">{{ $product->stock }}</p>
                            @else
                                <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                <p class="text-2xl font-bold text-blue-900">{{ $product->stock }}</p>
                            @endif
                        </div>
                        <p class="text-sm text-blue-600 mt-1">unit tersedia</p>
                    </div>
                </div>

                @if($product->stock <= 10)
                    <div class="mt-4 p-4 bg-red-50 border border-red-200 rounded-2xl">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                            </svg>
                            <p class="font-medium text-red-800">Peringatan: Stok produk hampir habis!</p>
                        </div>
                        <p class="text-sm text-red-600 mt-1">Pertimbangkan untuk menambah stok atau mengubah status produk.</p>
                    </div>
                @endif
            </div>

            <!-- Description Card -->
            @if($product->description)
            <div class="card-modern p-6 animate-fade-in-up" style="animation-delay: 0.4s">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 font-poppins">Deskripsi Produk</h3>
                </div>

                <div class="p-4 bg-gray-50 rounded-xl border border-gray-200">
                    <p class="text-gray-700 leading-relaxed">{{ $product->description }}</p>
                </div>
            </div>
            @endif

            <!-- Metadata Card -->
            <div class="card-modern p-6 animate-fade-in-up" style="animation-delay: 0.5s">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-8 h-8 bg-gradient-to-br from-gray-500 to-gray-600 rounded-xl flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 font-poppins">Informasi Produk</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-2">Dibuat Pada</label>
                        <div class="p-3 bg-gray-50 rounded-xl border border-gray-200">
                            <p class="text-gray-900 font-medium">{{ $product->created_at->format('d M Y, H:i') }}</p>
                            <p class="text-sm text-gray-500">{{ $product->created_at->diffForHumans() }}</p>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-2">Terakhir Diupdate</label>
                        <div class="p-3 bg-gray-50 rounded-xl border border-gray-200">
                            <p class="text-gray-900 font-medium">{{ $product->updated_at->format('d M Y, H:i') }}</p>
                            <p class="text-sm text-gray-500">{{ $product->updated_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
