@extends('layouts.landing')

@section('title', 'Pesanan Saya')

@push('styles')
<style>
    .accordion-content {
        max-height: 0;
        opacity: 0;
        overflow: hidden;
        transition: all 0.3s ease-out;
    }

    .accordion-content.active {
        max-height: 2000px;
        opacity: 1;
        transition: all 0.5s ease-in;
    }

    .accordion-toggle svg {
        transition: transform 0.3s ease;
    }

    .accordion-toggle.active svg {
        transform: rotate(180deg);
    }

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
</style>
@endpush

@section('content')
    <!-- My Orders Section -->
    <section class="relative overflow-hidden py-12">
        <!-- Background Elements -->
        <div class="absolute top-0 left-0 w-full h-full">
            <div class="absolute top-10 left-10 w-64 h-64 bg-primary-200/30 rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-64 h-64 bg-emerald-200/30 rounded-full blur-3xl"></div>
        </div>

        <!-- Orders Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center mb-8">
                <h1 class="text-3xl md:text-4xl font-bold font-poppins text-gray-900">Pesanan Saya</h1>
                <p class="text-gray-600 mt-2">Riwayat transaksi dan status pesanan Anda</p>
            </div>

            @if($transactions->isEmpty())
                <div class="text-center py-12">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Belum Ada Pesanan</h3>
                    <p class="text-gray-600 mb-6">Anda belum memiliki riwayat pesanan</p>
                    <a href="{{ route('landings.index') }}" class="inline-flex items-center px-6 py-3 rounded-xl bg-primary-600 text-white font-semibold hover:bg-primary-700 transition-all duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                        Mulai Belanja
                    </a>
                </div>
            @else
                <div class="space-y-6">
                    @foreach($transactions as $transaction)
                        <div class="card-modern p-6">
                            <!-- Order Header - Always Visible -->
                            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-1">Invoice #{{ $transaction->invoice_number }}</h3>
                                    <p class="text-sm text-gray-500">{{ $transaction->created_at->format('d F Y, H:i') }}</p>
                                </div>
                                <div class="mt-2 md:mt-0 flex items-center gap-3">
                                    <span class="px-3 py-1 rounded-full text-sm font-medium
                                        @if($transaction->status === 'completed') bg-green-100 text-green-700
                                        @elseif($transaction->status === 'pending') bg-yellow-100 text-yellow-700
                                        @else bg-red-100 text-red-700 @endif">
                                        {{ ucfirst($transaction->status) }}
                                    </span>
                                    <button type="button"
                                            class="accordion-toggle flex items-center justify-center w-8 h-8 rounded-full bg-gray-100 hover:bg-gray-200 transition-colors duration-200"
                                            data-target="order-{{ $transaction->id }}"
                                            aria-expanded="false">
                                        <svg class="w-5 h-5 text-gray-600 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <!-- Order Total - Always Visible -->
                            <div class="flex justify-between items-center py-2">
                                <span class="font-semibold text-gray-900">Total Pembayaran</span>
                                <span class="text-lg font-bold text-primary-600">
                                    Rp {{ number_format($transaction->total_price, 0, ',', '.') }}
                                </span>
                            </div>

                            <!-- Accordion Content -->
                            <div id="order-{{ $transaction->id }}"
                                class="accordion-content"
                                data-active="false">
                                <div class="border-t border-gray-100 pt-4">
                                    <!-- Order Items -->
                                    <div class="divide-y divide-gray-100">
                                        @foreach($transaction->items as $item)
                                            <div class="py-4 flex items-center space-x-4">
                                                <div class="w-16 h-16 bg-gray-100 rounded-lg overflow-hidden">
                                                    @if($item->product->image)
                                                        <img src="{{ Storage::url($item->product->image) }}"
                                                             alt="{{ $item->product->name }}"
                                                             class="w-full h-full object-cover"
                                                             onerror="this.onerror=null; this.src='{{ asset('assets/images/no-image.png') }}';">
                                                    @else
                                                        <div class="w-full h-full flex items-center justify-center">
                                                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                            </svg>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="flex-1">
                                                    <h4 class="font-semibold text-gray-900">{{ $item->product->name }}</h4>
                                                    <p class="text-sm text-gray-500">{{ $item->product->category->name }}</p>
                                                    <div class="flex items-center mt-1">
                                                        <span class="text-sm text-gray-600">
                                                            {{ $item->quantity }}x @Rp {{ number_format($item->price, 0, ',', '.') }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="text-right">
                                                    <p class="font-semibold text-gray-900">
                                                        Rp {{ number_format($item->total, 0, ',', '.') }}
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    @if($transaction->payment_proof)
                                        <div class="mt-4 pt-4 border-t border-gray-100">
                                            <h4 class="font-semibold text-gray-900 mb-2">Bukti Pembayaran</h4>
                                            <a href="{{ Storage::url($transaction->payment_proof) }}"
                                               target="_blank"
                                               class="inline-flex items-center text-sm text-primary-600 hover:text-primary-700">
                                                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                                </svg>
                                                Lihat Bukti Pembayaran
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- Pagination -->
                    @if ($transactions->hasPages())
                        <div class="mt-8">
                            {{ $transactions->links() }}
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </section>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Accordion functionality
            document.querySelectorAll('.accordion-toggle').forEach(button => {
                button.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const content = document.getElementById(targetId);
                    const isActive = content.classList.contains('active');

                    // Toggle button state
                    this.classList.toggle('active');

                    // Toggle content state
                    if (!isActive) {
                        content.classList.add('active');
                        content.setAttribute('data-active', 'true');
                    } else {
                        content.classList.remove('active');
                        content.setAttribute('data-active', 'false');
                    }

                    // Update ARIA attributes
                    this.setAttribute('aria-expanded', !isActive);
                });
            });
        });
    </script>
    @endpush
@endsection
