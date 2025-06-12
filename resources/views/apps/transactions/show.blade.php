@extends('layouts.app')

@section('title', 'Detail Transaksi')

@section('content')
<div class="max-w-6xl mx-auto space-y-8">
    <!-- Breadcrumb Navigation -->
    <div class="flex items-center gap-3 text-sm text-gray-500 animate-fade-in-up">
        <a href="{{ route('transactions.index') }}" class="hover:text-primary-600 transition-colors">Transaksi</a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
        <span class="text-gray-900 font-medium">Detail Transaksi</span>
    </div>

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 animate-fade-in-up" style="animation-delay: 0.1s">
        <div class="space-y-2">
            <h1 class="text-3xl font-bold font-poppins text-gray-900 flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 14V6c0-1.1-.9-2-2-2H3c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2z"/>
                    </svg>
                </div>
                {{ $transaction->invoice_number }}
            </h1>
            <p class="text-gray-600 font-medium">
                Detail lengkap transaksi pelanggan
            </p>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('transactions.edit', $transaction) }}"
               class="inline-flex items-center gap-2 bg-gradient-to-r from-amber-600 to-amber-700 hover:from-amber-700 hover:to-amber-800 text-white px-6 py-3 rounded-2xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 shine-effect">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
                Edit Transaksi
            </a>
            <a href="{{ route('transactions.index') }}"
               class="inline-flex items-center gap-2 bg-white hover:bg-gray-50 text-gray-700 border border-gray-200 px-6 py-3 rounded-2xl font-semibold shadow-sm hover:shadow-md transition-all duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Left Column - Transaction Info -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Transaction Overview -->
            <div class="card-modern p-6 animate-fade-in-up" style="animation-delay: 0.2s">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-8 h-8 bg-gradient-to-br from-blue-100 to-blue-200 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 14V6c0-1.1-.9-2-2-2H3c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2z"/>
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold text-gray-900 font-poppins">Informasi Transaksi</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wider">Invoice Number</label>
                            <p class="text-lg font-semibold text-gray-900 mt-1">{{ $transaction->invoice_number }}</p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wider">Total Amount</label>
                            <p class="text-2xl font-bold text-primary-600 mt-1">Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wider">Status</label>
                            <div class="mt-2">
                                @if($transaction->status === 'completed')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-700">
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                        </svg>
                                        Completed
                                    </span>
                                @elseif($transaction->status === 'pending')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-700">
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15h2v-6h-2v6zm0-8h2V7h-2v2z"/>
                                        </svg>
                                        Pending
                                    </span>
                                @elseif($transaction->status === 'cancelled')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-700">
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15h2v-6h-2v6zm0-8h2V7h-2v2z"/>
                                        </svg>
                                        Cancelled
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-700">
                                        {{ ucfirst($transaction->status) }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wider">Tanggal Transaksi</label>
                            <p class="text-lg font-semibold text-gray-900 mt-1">{{ $transaction->created_at->format('d F Y') }}</p>
                            <p class="text-sm text-gray-500">{{ $transaction->created_at->format('H:i') }} WIB</p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wider">Customer ID</label>
                            <p class="text-lg font-semibold text-gray-900 mt-1">#{{ $transaction->customer_id }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Transaction Items -->
            <div class="card-modern overflow-hidden animate-fade-in-up" style="animation-delay: 0.3s">
                <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-gray-100/50">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-gradient-to-br from-purple-100 to-purple-200 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-purple-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M7 4V2C7 1.45 7.45 1 8 1H16C16.55 1 17 1.45 17 2V4H20C20.55 4 21 4.45 21 5S20.55 6 20 6H19V19C19 20.1 18.1 21 17 21H7C5.9 21 5 20.1 5 19V6H4C3.45 6 3 5.55 3 5S3.45 4 4 4H7ZM9 3V4H15V3H9ZM7 6V19H17V6H7Z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 font-poppins">Items Transaksi</h3>
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-primary-100 text-primary-700">
                            {{ $transaction->items->count() }} items
                        </span>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50/50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Produk</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Harga</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Qty</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($transaction->items as $item)
                            <tr class="hover:bg-gray-50/50 transition-colors duration-200">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-12 h-12 bg-gradient-to-br from-gray-100 to-gray-200 rounded-2xl flex items-center justify-center overflow-hidden flex-shrink-0">
                                            @if($item->product && $item->product->image)
                                                <img src="{{ Storage::url($item->product->image) }}" alt="{{ $item->product->name }}" class="w-full h-full object-cover" onerror="this.onerror=null; this.src='{{ asset('assets/images/no-image.png') }}';">
                                            @else
                                                <svg class="w-6 h-6 text-gray-600" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M7 4V2C7 1.45 7.45 1 8 1H16C16.55 1 17 1.45 17 2V4H20C20.55 4 21 4.45 21 5S20.55 6 20 6H19V19C19 20.1 18.1 21 17 21H7C5.9 21 5 20.1 5 19V6H4C3.45 6 3 5.55 3 5S3.45 4 4 4H7ZM9 3V4H15V3H9ZM7 6V19H17V6H7Z"/>
                                                </svg>
                                            @endif
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-900">
                                                {{ $item->product->name ?? 'Produk tidak ditemukan' }}
                                            </p>
                                            <p class="text-sm text-gray-500">
                                                {{ $item->product->category->name ?? 'Kategori tidak ada' }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm">
                                        <p class="font-semibold text-gray-900">Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                                        <p class="text-gray-500 text-xs">per unit</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-700">
                                        {{ $item->quantity }}x
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <p class="text-lg font-bold text-gray-900">Rp {{ number_format($item->total, 0, ',', '.') }}</p>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-gray-50">
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-right">
                                    <p class="text-lg font-bold text-gray-900">Total Keseluruhan:</p>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-2xl font-bold text-primary-600">Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</p>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <!-- Right Column - Customer & Payment -->
        <div class="space-y-6">
            <!-- Customer Information -->
            <div class="card-modern p-6 animate-fade-in-up" style="animation-delay: 0.4s">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-8 h-8 bg-gradient-to-br from-green-100 to-green-200 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 font-poppins">Informasi Customer</h3>
                </div>

                @if($transaction->customer)
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-primary-100 to-primary-200 rounded-full flex items-center justify-center">
                            <span class="text-lg font-bold text-primary-700">
                                {{ strtoupper(substr($transaction->customer->name, 0, 1)) }}
                            </span>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900">{{ $transaction->customer->name }}</p>
                            <p class="text-sm text-gray-500">{{ $transaction->customer->email }}</p>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-gray-100">
                        <div class="space-y-3">
                            <div>
                                <label class="text-xs font-medium text-gray-500 uppercase tracking-wider">Customer ID</label>
                                <p class="text-sm font-semibold text-gray-900">#{{ $transaction->customer->id }}</p>
                            </div>
                            <div>
                                <label class="text-xs font-medium text-gray-500 uppercase tracking-wider">Bergabung</label>
                                <p class="text-sm font-semibold text-gray-900">{{ $transaction->customer->created_at->format('d M Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="text-center py-8">
                    <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <p class="text-gray-500">Customer tidak ditemukan</p>
                </div>
                @endif
            </div>

            <!-- Payment Proof -->
            @if($transaction->payment_proof)
            <div class="card-modern p-6 animate-fade-in-up" style="animation-delay: 0.5s">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-8 h-8 bg-gradient-to-br from-yellow-100 to-yellow-200 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-yellow-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 font-poppins">Bukti Pembayaran</h3>
                </div>

                <div class="space-y-4">
                    <div class="relative group">
                        <div class="aspect-w-16 aspect-h-12 bg-gray-100 rounded-2xl overflow-hidden">
                            <img src="{{ Storage::url($transaction->payment_proof) }}"
                                 alt="Bukti Pembayaran"
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
                                Buka
                            </a>
                        </div>
                    </div>

                    <a href="{{ Storage::url($transaction->payment_proof) }}"
                       target="_blank"
                       class="inline-flex items-center gap-2 bg-primary-50 hover:bg-primary-100 text-primary-700 px-4 py-2 rounded-xl font-medium transition-colors duration-200 w-full justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                        </svg>
                        Download Bukti
                    </a>
                </div>
            </div>
            @endif

            <!-- Quick Actions -->
            <div class="card-modern p-6 animate-fade-in-up" style="animation-delay: 0.6s">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-8 h-8 bg-gradient-to-br from-indigo-100 to-indigo-200 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-indigo-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 font-poppins">Quick Actions</h3>
                </div>

                <div class="space-y-3">
                    <a href="{{ route('transactions.edit', $transaction) }}"
                       class="flex items-center gap-3 p-3 bg-amber-50 hover:bg-amber-100 rounded-xl transition-colors duration-200 group">
                        <div class="w-8 h-8 bg-amber-200 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-200">
                            <svg class="w-4 h-4 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-medium text-amber-900">Edit Status</p>
                            <p class="text-sm text-amber-700">Update status transaksi</p>
                        </div>
                    </a>

                    <form action="{{ route('transactions.destroy', $transaction) }}" method="POST"
                          onsubmit="return confirm('Yakin hapus transaksi ini? Tindakan ini tidak dapat dibatalkan.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="flex items-center gap-3 p-3 bg-red-50 hover:bg-red-100 rounded-xl transition-colors duration-200 group w-full">
                            <div class="w-8 h-8 bg-red-200 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-200">
                                <svg class="w-4 h-4 text-red-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </div>
                            <div class="text-left">
                                <p class="font-medium text-red-900">Hapus Transaksi</p>
                                <p class="text-sm text-red-700">Hapus transaksi permanen</p>
                            </div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
