@extends('layouts.app')

@section('title', 'Edit Transaksi')

@section('content')
<div class="max-w-9xl mx-auto space-y-8">
    <!-- Breadcrumb Navigation -->
    <div class="flex items-center gap-3 text-sm text-gray-500 animate-fade-in-up">
        <a href="{{ route('transactions.index') }}" class="hover:text-primary-600 transition-colors">Transaksi</a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
        <a href="{{ route('transactions.show', $transaction) }}" class="hover:text-primary-600 transition-colors">{{ $transaction->invoice_number }}</a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
        <span class="text-gray-900 font-medium">Edit</span>
    </div>

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 animate-fade-in-up" style="animation-delay: 0.1s">
        <div class="space-y-2">
            <h1 class="text-3xl font-bold font-poppins text-gray-900 flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-amber-500 to-amber-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
                Edit Transaksi
            </h1>
            <p class="text-gray-600 font-medium">
                Update status atau bukti pembayaran transaksi <span class="font-semibold text-amber-600">{{ $transaction->invoice_number }}</span>
            </p>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('transactions.show', $transaction) }}"
               class="inline-flex items-center gap-2 bg-white hover:bg-gray-50 text-gray-700 border border-gray-200 px-6 py-3 rounded-2xl font-semibold shadow-sm hover:shadow-md transition-all duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Batal
            </a>
        </div>
    </div>

    <!-- Form Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Left Column - Form -->
        <div class="lg:col-span-2">
            <form action="{{ route('transactions.update', $transaction) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Transaction Status -->
                <div class="card-modern p-6 animate-fade-in-up" style="animation-delay: 0.2s">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-8 h-8 bg-gradient-to-br from-blue-100 to-blue-200 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900 font-poppins">Status Transaksi</h2>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label for="status" class="block text-sm font-semibold text-gray-700 mb-3">
                                Status Pembayaran <span class="text-red-500">*</span>
                            </label>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                                <label class="relative">
                                    <input type="radio" name="status" value="pending"
                                           {{ old('status', $transaction->status) === 'pending' ? 'checked' : '' }}
                                           class="sr-only peer">
                                    <div class="p-4 bg-white border-2 border-gray-200 rounded-2xl cursor-pointer transition-all duration-200 peer-checked:border-yellow-500 peer-checked:bg-yellow-50 hover:border-yellow-300">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 bg-yellow-100 rounded-xl flex items-center justify-center">
                                                <svg class="w-4 h-4 text-yellow-600" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15h2v-6h-2v6zm0-8h2V7h-2v2z"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-semibold text-gray-900">Pending</p>
                                                <p class="text-sm text-gray-500">Menunggu pembayaran</p>
                                            </div>
                                        </div>
                                    </div>
                                </label>

                                <label class="relative">
                                    <input type="radio" name="status" value="completed"
                                           {{ old('status', $transaction->status) === 'completed' ? 'checked' : '' }}
                                           class="sr-only peer">
                                    <div class="p-4 bg-white border-2 border-gray-200 rounded-2xl cursor-pointer transition-all duration-200 peer-checked:border-green-500 peer-checked:bg-green-50 hover:border-green-300">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 bg-green-100 rounded-xl flex items-center justify-center">
                                                <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-semibold text-gray-900">Completed</p>
                                                <p class="text-sm text-gray-500">Pembayaran selesai</p>
                                            </div>
                                        </div>
                                    </div>
                                </label>

                                <label class="relative">
                                    <input type="radio" name="status" value="cancelled"
                                           {{ old('status', $transaction->status) === 'cancelled' ? 'checked' : '' }}
                                           class="sr-only peer">
                                    <div class="p-4 bg-white border-2 border-gray-200 rounded-2xl cursor-pointer transition-all duration-200 peer-checked:border-red-500 peer-checked:bg-red-50 hover:border-red-300">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 bg-red-100 rounded-xl flex items-center justify-center">
                                                <svg class="w-4 h-4 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15h2v-6h-2v6zm0-8h2V7h-2v2z"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-semibold text-gray-900">Cancelled</p>
                                                <p class="text-sm text-gray-500">Transaksi dibatalkan</p>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            @error('status')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Payment Proof -->
                <div class="card-modern p-6 animate-fade-in-up" style="animation-delay: 0.3s">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-8 h-8 bg-gradient-to-br from-yellow-100 to-yellow-200 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-yellow-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900 font-poppins">Bukti Pembayaran</h2>
                    </div>

                    <div class="space-y-6">
                        <!-- Current Payment Proof -->
                        @if($transaction->payment_proof)
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-3">Bukti Pembayaran Saat Ini</label>
                            <div class="relative group">
                                <div class="w-full h-48 bg-gray-100 rounded-2xl overflow-hidden">
                                    <img src="{{ Storage::url($transaction->payment_proof) }}"
                                         alt="Current Payment Proof"
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                         onerror="this.onerror=null; this.src='{{ asset('assets/images/no-image.png') }}';">
                                </div>
                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300 rounded-2xl flex items-center justify-center">
                                    <a href="{{ Storage::url($transaction->payment_proof) }}"
                                       target="_blank"
                                       class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-white text-gray-900 px-4 py-2 rounded-xl font-medium shadow-lg hover:shadow-xl transform hover:scale-105">
                                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                        </svg>
                                        Lihat
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Upload New Payment Proof -->
                        <div>
                            <label for="payment_proof" class="block text-sm font-semibold text-gray-700 mb-3">
                                {{ $transaction->payment_proof ? 'Ganti Bukti Pembayaran' : 'Upload Bukti Pembayaran' }}
                            </label>
                            <div class="relative">
                                <input type="file" id="payment_proof" name="payment_proof" accept="image/*"
                                       class="block w-full text-sm text-gray-500 file:mr-4 file:py-3 file:px-6 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100 transition-colors duration-200 bg-white border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-400">
                                <p class="mt-2 text-sm text-gray-500">Format: JPG, PNG, atau GIF. Maksimal 2MB.</p>
                            </div>
                            @error('payment_proof')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Preview New Image -->
                        <div id="image-preview" class="hidden">
                            <label class="block text-sm font-semibold text-gray-700 mb-3">Preview Gambar Baru</label>
                            <div class="w-full h-48 bg-gray-100 rounded-2xl overflow-hidden">
                                <img id="preview-img" src="" alt="Preview" class="w-full h-full object-cover">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex items-center gap-4 animate-fade-in-up" style="animation-delay: 0.4s">
                    <button type="submit"
                            class="inline-flex items-center gap-2 bg-gradient-to-r from-amber-600 to-amber-700 hover:from-amber-700 hover:to-amber-800 text-white px-8 py-4 rounded-2xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 shine-effect">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Update Transaksi
                    </button>
                    <a href="{{ route('transactions.show', $transaction) }}"
                       class="inline-flex items-center gap-2 bg-white hover:bg-gray-50 text-gray-700 border border-gray-200 px-8 py-4 rounded-2xl font-semibold shadow-sm hover:shadow-md transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        Batal
                    </a>
                </div>
            </form>
        </div>

        <!-- Right Column - Transaction Summary -->
        <div class="space-y-6">
            <!-- Transaction Info -->
            <div class="card-modern p-6 animate-fade-in-up" style="animation-delay: 0.5s">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-8 h-8 bg-gradient-to-br from-blue-100 to-blue-200 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 14V6c0-1.1-.9-2-2-2H3c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 font-poppins">Info Transaksi</h3>
                </div>

                <div class="space-y-4">
                    <div>
                        <label class="text-xs font-medium text-gray-500 uppercase tracking-wider">Invoice Number</label>
                        <p class="text-lg font-bold text-gray-900">{{ $transaction->invoice_number }}</p>
                    </div>
                    <div>
                        <label class="text-xs font-medium text-gray-500 uppercase tracking-wider">Total Amount</label>
                        <p class="text-2xl font-bold text-primary-600">Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</p>
                    </div>
                    <div>
                        <label class="text-xs font-medium text-gray-500 uppercase tracking-wider">Items</label>
                        <p class="text-lg font-semibold text-gray-900">{{ $transaction->items->count() }} produk</p>
                    </div>
                    <div>
                        <label class="text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</label>
                        <p class="text-lg font-semibold text-gray-900">{{ $transaction->customer->name ?? 'N/A' }}</p>
                        <p class="text-sm text-gray-500">{{ $transaction->customer->email ?? '' }}</p>
                    </div>
                    <div>
                        <label class="text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Transaksi</label>
                        <p class="text-lg font-semibold text-gray-900">{{ $transaction->created_at->format('d M Y') }}</p>
                        <p class="text-sm text-gray-500">{{ $transaction->created_at->format('H:i') }} WIB</p>
                    </div>
                </div>
            </div>

            <!-- Current Status -->
            <div class="card-modern p-6 animate-fade-in-up" style="animation-delay: 0.6s">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-8 h-8 bg-gradient-to-br from-purple-100 to-purple-200 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-purple-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 font-poppins">Status Saat Ini</h3>
                </div>

                <div class="text-center">
                    @if($transaction->status === 'completed')
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                            </svg>
                        </div>
                        <p class="text-lg font-bold text-green-700">Completed</p>
                        <p class="text-sm text-green-600">Transaksi telah selesai</p>
                    @elseif($transaction->status === 'pending')
                        <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-yellow-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15h2v-6h-2v6zm0-8h2V7h-2v2z"/>
                            </svg>
                        </div>
                        <p class="text-lg font-bold text-yellow-700">Pending</p>
                        <p class="text-sm text-yellow-600">Menunggu pembayaran</p>
                    @elseif($transaction->status === 'cancelled')
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15h2v-6h-2v6zm0-8h2V7h-2v2z"/>
                            </svg>
                        </div>
                        <p class="text-lg font-bold text-red-700">Cancelled</p>
                        <p class="text-sm text-red-600">Transaksi dibatalkan</p>
                    @else
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-gray-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15h2v-6h-2v6zm0-8h2V7h-2v2z"/>
                            </svg>
                        </div>
                        <p class="text-lg font-bold text-gray-700">{{ ucfirst($transaction->status) }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('payment_proof');
    const preview = document.getElementById('image-preview');
    const previewImg = document.getElementById('preview-img');

    fileInput.addEventListener('change', function(e) {
        const file = e.target.files[0];

        if (file) {
            if (file.size > 2 * 1024 * 1024) { // 2MB
                alert('Ukuran file terlalu besar. Maksimal 2MB.');
                e.target.value = '';
                preview.classList.add('hidden');
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                preview.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        } else {
            preview.classList.add('hidden');
        }
    });
});
</script>
@endpush

@endsection
