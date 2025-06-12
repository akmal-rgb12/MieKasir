@extends('layouts.landing')

@section('title', 'Checkout')

@section('content')
    <!-- Checkout Section -->
    <section class="relative overflow-hidden py-12">
        <!-- Background Elements -->
        <div class="absolute top-0 left-0 w-full h-full">
            <div class="absolute top-10 left-10 w-64 h-64 bg-primary-200/30 rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-64 h-64 bg-emerald-200/30 rounded-full blur-3xl"></div>
        </div>

        <!-- Checkout Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center mb-8">
                <h1 class="text-3xl md:text-4xl font-bold font-poppins text-gray-900">Checkout Pesanan</h1>
                <p class="text-gray-600 mt-2">Selesaikan pesanan Anda dengan aman</p>
            </div>

            <form action="{{ route('transactions.store') }}" method="POST" enctype="multipart/form-data" id="checkout-form">
                @csrf
                <input type="hidden" name="from_checkout" value="true">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                    <!-- Order Summary -->
                    <div class="lg:col-span-8">
                        <div class="card-modern p-6 mb-6">
                            <h2 class="text-xl font-semibold mb-4">Ringkasan Pesanan</h2>
                            <div class="space-y-4">
                                @foreach($cartItems as $item)
                                    <div class="flex items-center space-x-4 py-4 border-b border-gray-100 last:border-0">
                                        <div class="w-20 h-20 bg-gray-100 rounded-lg overflow-hidden">
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
                                            <h3 class="font-semibold text-gray-900">{{ $item->product->name }}</h3>
                                            <p class="text-sm text-gray-500">{{ $item->product->category->name }}</p>
                                            <div class="flex items-center mt-2">
                                                <span class="text-primary-600 font-semibold">
                                                    Rp {{ number_format($item->product->price, 0, ',', '.') }}
                                                </span>
                                                <span class="mx-2 text-gray-400">×</span>
                                                <span>{{ $item->quantity }}</span>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <p class="font-semibold text-gray-900">
                                                Rp {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}
                                            </p>
                                        </div>

                                        <!-- Hidden inputs for cart data -->
                                        <input type="hidden" name="items[{{ $loop->index }}][product_id]" value="{{ $item->product_id }}">
                                        <input type="hidden" name="items[{{ $loop->index }}][quantity]" value="{{ $item->quantity }}">
                                        <input type="hidden" name="items[{{ $loop->index }}][price]" value="{{ $item->product->price }}">
                                        <input type="hidden" name="items[{{ $loop->index }}][total]" value="{{ $item->product->price * $item->quantity }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Upload Bukti Transfer -->
                        <div class="card-modern p-6">
                            <h2 class="text-xl font-semibold mb-4">Bukti Transfer</h2>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Upload Bukti Pembayaran <span class="text-red-500">*</span>
                                    </label>
                                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl">
                                        <div class="space-y-1 text-center">
                                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <div class="flex text-sm text-gray-600">
                                                <label for="payment_proof" class="relative cursor-pointer bg-white rounded-md font-medium text-primary-600 hover:text-primary-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-primary-500">
                                                    <span>Upload file</span>
                                                    <input id="payment_proof" name="payment_proof" type="file" class="sr-only" accept="image/*,.pdf" required>
                                                </label>
                                                <p class="pl-1">atau drag and drop</p>
                                            </div>
                                            <p class="text-xs text-gray-500">
                                                PNG, JPG, JPEG atau PDF hingga 2MB
                                            </p>
                                        </div>
                                    </div>
                                    @error('payment_proof')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Summary -->
                    <div class="lg:col-span-4">
                        <div class="card-modern p-6 sticky top-4">
                            <h2 class="text-xl font-semibold mb-4">Ringkasan Pembayaran</h2>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Subtotal</span>
                                    <span class="font-semibold">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Pajak (11%)</span>
                                    <span class="font-semibold">Rp {{ number_format($tax, 0, ',', '.') }}</span>
                                </div>
                                <div class="border-t border-gray-100 my-4"></div>
                                <div class="flex justify-between text-lg font-bold">
                                    <span>Total</span>
                                    <span class="text-primary-600">Rp {{ number_format($total, 0, ',', '.') }}</span>
                                </div>
                            </div>

                            <!-- Hidden input for total price -->
                            <input type="hidden" name="total_price" value="{{ $total }}">

                            <!-- Submit Button -->
                            <button type="submit"
                                    class="w-full mt-6 px-6 py-3 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition-colors duration-200">
                                Proses Pembayaran
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    @push('scripts')
    <script>
        // Preview uploaded file
        document.getElementById('payment_proof').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (!file) return;

            // Validate file size (max 2MB)
            if (file.size > 2 * 1024 * 1024) {
                alert('Ukuran file terlalu besar. Maksimum 2MB.');
                this.value = '';
                return;
            }

            // Validate file type
            const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'application/pdf'];
            if (!validTypes.includes(file.type)) {
                alert('Tipe file tidak valid. Gunakan PNG, JPG, JPEG, atau PDF.');
                this.value = '';
                return;
            }
        });

        // Drag and drop functionality
        const dropZone = document.querySelector('input[type="file"]').closest('div');

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults (e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            dropZone.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, unhighlight, false);
        });

        function highlight(e) {
            dropZone.classList.add('border-primary-500');
        }

        function unhighlight(e) {
            dropZone.classList.remove('border-primary-500');
        }

        dropZone.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            document.getElementById('payment_proof').files = files;
        }
    </script>
    @endpush
@endsection
