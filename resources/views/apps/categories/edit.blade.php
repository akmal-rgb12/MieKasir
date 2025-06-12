@extends('layouts.app')

@section('title', 'Edit Kategori')

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
            <span class="text-gray-900 font-medium">Edit Kategori</span>
        </nav>

        <!-- Page Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="space-y-2">
                <h1 class="text-3xl font-bold font-poppins text-gray-900 flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-amber-500 to-orange-600 rounded-2xl flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </div>
                    Edit Kategori
                </h1>
                <p class="text-gray-600 font-medium">
                    Perbarui informasi kategori "{{ $category->name }}"
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
                    <div class="w-8 h-8 bg-gradient-to-br from-amber-100 to-orange-200 rounded-2xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </div>
                    Perbarui Informasi Kategori
                </h3>
                <p class="text-sm text-gray-600 mt-2">Edit dan perbarui detail kategori produk</p>
            </div>

            <form action="{{ route('categories.update', $category) }}" method="POST" class="space-y-6" id="categoryForm">
                @csrf
                @method('PUT')

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
                               value="{{ old('name', $category->name) }}"
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
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-700">
                            Otomatis Diperbarui
                        </span>
                    </label>
                    <div class="relative">
                        <input type="text"
                               name="slug"
                               id="slug"
                               value="{{ old('slug', $category->slug) }}"
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
                        Slug akan diperbarui otomatis berdasarkan nama kategori
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
                            class="w-full sm:w-auto px-6 py-3 bg-gradient-to-r from-amber-600 to-orange-700 hover:from-amber-700 hover:to-orange-800 text-white rounded-2xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 shine-effect">
                        <span class="flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            Perbarui Kategori
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
        if (name.length > 0 && slug !== '{{ $category->slug }}') {
            slugInput.classList.remove('bg-gray-50/80');
            slugInput.classList.add('bg-amber-50/80', 'border-amber-200/50');
        } else {
            slugInput.classList.remove('bg-amber-50/80', 'border-amber-200/50');
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

    // Form validation
    document.getElementById('categoryForm').addEventListener('submit', function(e) {
        const name = nameInput.value.trim();

        if (!name) {
            e.preventDefault();
            showToast('Nama kategori wajib diisi', 'error');
            nameInput.focus();
            return false;
        }

        if (name.length < 2) {
            e.preventDefault();
            showToast('Nama kategori minimal 2 karakter', 'error');
            nameInput.focus();
            return false;
        }

        // Show loading
        showLoading();
    });

    // Auto focus and select text for editing
    nameInput.focus();
    nameInput.select();
});
</script>
@endpush
@endsection
