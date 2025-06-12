@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
<div class="max-w-9xl mx-auto space-y-8">
    <!-- Breadcrumb & Header Section -->
    <div class="flex flex-col gap-6 animate-fade-in-up">
        <!-- Breadcrumb Navigation -->
        <nav class="flex items-center space-x-2 text-sm text-gray-600">
            <a href="{{ route('categories.index') }}" class="flex items-center gap-2 hover:text-primary-600 transition-colors duration-200">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6zm16-4H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z"/>
                </svg>
                Kategori
            </a>
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-gray-900 font-medium">Tambah Kategori</span>
        </nav>

        <!-- Page Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="space-y-2">
                <h1 class="text-3xl font-bold font-poppins text-gray-900 flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-primary-600 rounded-2xl flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                    </div>
                    Tambah Kategori Baru
                </h1>
                <p class="text-gray-600 font-medium">
                    Buat kategori baru untuk mengorganisir produk Anda
                </p>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('categories.index') }}"
                   class="inline-flex items-center gap-2 px-4 py-2.5 bg-white/80 backdrop-blur-xl border border-gray-200/50 rounded-2xl text-gray-700 hover:text-gray-900 hover:bg-white transition-all duration-300 font-medium shadow-sm hover:shadow-md">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali
                </a>
            </div>
        </div>
    </div>

    <!-- Main Form Section -->
    <div class="animate-fade-in-up" style="animation-delay: 0.1s">
        <div class="card-modern p-8">
            <!-- Form Header -->
            <div class="mb-8 pb-6 border-b border-gray-100">
                <h3 class="text-xl font-semibold text-gray-900 font-poppins flex items-center gap-3">
                    <div class="w-8 h-8 bg-gradient-to-br from-blue-100 to-blue-200 rounded-2xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6zm16-4H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-1 9H9V9h10v2zm-4 4H9v-2h6v2zm4-8H9V5h10v2z"/>
                        </svg>
                    </div>
                    Informasi Kategori
                </h3>
                <p class="text-sm text-gray-600 mt-2">Lengkapi informasi dasar untuk kategori baru</p>
            </div>

            <form action="{{ route('categories.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Nama Kategori Field -->
                <div class="space-y-3">
                    <label for="name" class="block text-sm font-semibold text-gray-700 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                        Nama Kategori
                        <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ old('name') }}"
                               placeholder="Masukkan nama kategori (contoh: Makanan Utama)"
                               class="w-full pl-4 pr-4 py-4 bg-white/80 backdrop-blur-xl border border-gray-200/50 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-400 transition-all duration-300 text-gray-900 font-medium placeholder-gray-400 @error('name') border-red-400 focus:border-red-400 focus:ring-red-500/20 @enderror"
                               required>
                        @error('name')
                            <div class="absolute -bottom-6 left-0 flex items-center gap-1 text-red-600 text-sm font-medium">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <p class="text-xs text-gray-500 flex items-center gap-1">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                        </svg>
                        Nama kategori akan digunakan untuk mengelompokkan produk
                    </p>
                </div>

                <!-- Slug Field -->
                <div class="space-y-3">
                    <label for="slug" class="block text-sm font-semibold text-gray-700 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                        </svg>
                        URL Slug
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-700">
                            Otomatis
                        </span>
                    </label>
                    <div class="relative">
                        <input type="text"
                               name="slug"
                               id="slug"
                               value="{{ old('slug') }}"
                               readonly
                               class="w-full pl-4 pr-4 py-4 bg-gray-50/80 backdrop-blur-xl border border-gray-200/50 rounded-2xl text-gray-600 font-mono text-sm cursor-not-allowed">
                        <div class="absolute right-3 top-1/2 transform -translate-y-1/2">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-xs text-gray-500 flex items-center gap-1">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                        </svg>
                        Slug akan dibuat otomatis berdasarkan nama kategori
                    </p>
                </div>

                <!-- Form Actions -->
                <div class="flex flex-col sm:flex-row sm:justify-end gap-3 pt-6 border-t border-gray-100">
                    <a href="{{ route('categories.index') }}"
                       class="w-full sm:w-auto px-6 py-3 bg-white/80 backdrop-blur-xl border border-gray-200/50 rounded-2xl text-gray-700 hover:text-gray-900 hover:bg-white transition-all duration-300 font-semibold text-center shadow-sm hover:shadow-md">
                        <span class="flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Batal
                        </span>
                    </a>
                    <button type="submit"
                            class="w-full sm:w-auto px-6 py-3 bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white rounded-2xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 shine-effect">
                        <span class="flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Simpan Kategori
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const nameInput = document.getElementById('name');
    const slugInput = document.getElementById('slug');

    function generateSlug(name) {
        return name
            .toLowerCase()
            .replace(/[^a-z0-9 -]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-')
            .replace(/^-|-$/g, '');
    }

    nameInput.addEventListener('input', function() {
        const name = this.value;
        const slug = generateSlug(name);

        slugInput.value = slug;

        // Add visual feedback
        if (name.length > 0) {
            slugInput.classList.remove('bg-gray-50/80');
            slugInput.classList.add('bg-green-50/80', 'border-green-200/50');
        } else {
            slugInput.classList.remove('bg-green-50/80', 'border-green-200/50');
            slugInput.classList.add('bg-gray-50/80');
        }
    });

    // Focus animation
    nameInput.addEventListener('focus', function() {
        this.parentElement.classList.add('transform', 'scale-[1.02]');
    });

    nameInput.addEventListener('blur', function() {
        this.parentElement.classList.remove('transform', 'scale-[1.02]');
    });

    // Auto focus
    nameInput.focus();
});
</script>
@endpush
@endsection
