@extends('layouts.app')

@section('title', 'Kasir')

@section('content')
<div class="max-w-9xl mx-auto space-y-6">
    <!-- Success Alert -->
    @if(session('success'))
    <div class="bg-green-50 border border-green-200 rounded-2xl p-4 animate-fade-in-up">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                </svg>
            </div>
            <div>
                <p class="font-semibold text-green-900">{{ session('success') }}</p>
                <p class="text-sm text-green-700">Transaksi telah berhasil diproses dan disimpan</p>
            </div>
            <button type="button" class="ml-auto text-green-400 hover:text-green-600" onclick="this.parentElement.parentElement.remove()">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>
    @endif

    @if ($errors->any())
    <div class="bg-red-50 border border-red-200 rounded-2xl p-4 animate-fade-in-up">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center">
                <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                </svg>
            </div>
            <div>
                <p class="font-semibold text-red-900">{{ $errors->first() }}</p>
                <p class="text-sm text-red-700">Transaksi gagal diproses</p>
            </div>
            <button type="button" class="ml-auto text-red-400 hover:text-red-600" onclick="this.parentElement.parentElement.remove()">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>
    @endif

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 animate-fade-in-up">
        <div class="space-y-2">
            <h1 class="text-3xl font-bold font-poppins text-gray-900 flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M7 18c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12L8.1 13h7.45c.75 0 1.41-.41 1.75-1.03L21.7 4H5.21l-.94-2H1zm16 16c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                    </svg>
                </div>
                Sistem Kasir
            </h1>
            <p class="text-gray-600 font-medium">
                Point of Sale untuk transaksi langsung
            </p>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('transactions.index') }}"
               class="inline-flex items-center gap-2 bg-white hover:bg-gray-50 text-gray-700 border border-gray-200 px-6 py-3 rounded-2xl font-semibold shadow-sm hover:shadow-md transition-all duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
                Riwayat Transaksi
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left Column - Product Selection -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Product Search & Filter -->
            <div class="card-modern p-6 animate-fade-in-up" style="animation-delay: 0.1s">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-8 h-8 bg-gradient-to-br from-blue-100 to-blue-200 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold text-gray-900 font-poppins">Pilih Produk</h2>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 mb-6">
                    <div class="flex-1">
                        <input type="text"
                               id="product-search"
                               placeholder="Cari produk berdasarkan nama..."
                               class="w-full px-4 py-3 bg-white border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-400 transition-all duration-300">
                    </div>
                    <select id="category-filter"
                            class="px-4 py-3 bg-white border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-400 transition-all duration-300">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Products Grid -->
                <div id="products-grid" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                    @foreach($products as $product)
                    <div class="product-card bg-white border border-gray-200 rounded-2xl p-4 hover:shadow-lg transition-all duration-300 cursor-pointer"
                         data-product-id="{{ $product->id }}"
                         data-product-name="{{ $product->name }}"
                         data-product-price="{{ $product->price }}"
                         data-product-stock="{{ $product->stock }}"
                         data-category-id="{{ $product->category_id }}">
                        <div class="aspect-square bg-gray-100 rounded-xl overflow-hidden mb-3">
                            @if($product->image)
                                <img src="{{ Storage::url($product->image) }}"
                                     alt="{{ $product->name }}"
                                     class="w-full h-full object-cover"
                                     onerror="this.onerror=null; this.src='{{ asset('assets/images/no-image.png') }}';">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <svg class="w-12 h-12 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M7 4V2C7 1.45 7.45 1 8 1H16C16.55 1 17 1.45 17 2V4H20C20.55 4 21 4.45 21 5S20.55 6 20 6H19V19C19 20.1 18.1 21 17 21H7C5.9 21 5 20.1 5 19V6H4C3.45 6 3 5.55 3 5S3.45 4 4 4H7ZM9 3V4H15V3H9ZM7 6V19H17V6H7Z"/>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1 line-clamp-2">{{ $product->name }}</h3>
                            <p class="text-sm text-gray-500 mb-2">{{ $product->category->name }}</p>
                            <div class="flex items-center justify-between">
                                <span class="text-lg font-bold text-green-600">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                <span class="text-sm px-2 py-1 bg-gray-100 rounded-full">
                                    Stok: {{ $product->stock }}
                                </span>
                            </div>
                        </div>
                        @if($product->stock > 0)
                            <button type="button"
                                    class="add-to-cart w-full mt-3 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white py-2 px-4 rounded-xl font-medium transition-all duration-200 hover:scale-105">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                Tambah ke Keranjang
                            </button>
                        @else
                            <button type="button" disabled
                                    class="w-full mt-3 bg-gray-300 text-gray-500 py-2 px-4 rounded-xl font-medium cursor-not-allowed">
                                Stok Habis
                            </button>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Right Column - Cart & Checkout -->
        <div class="space-y-6">
            <!-- Shopping Cart -->
            <div class="card-modern p-6 animate-fade-in-up" style="animation-delay: 0.2s">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-8 h-8 bg-gradient-to-br from-green-100 to-green-200 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M7 18c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12L8.1 13h7.45c.75 0 1.41-.41 1.75-1.03L21.7 4H5.21l-.94-2H1zm16 16c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold text-gray-900 font-poppins">Keranjang</h2>
                    <span id="cart-count" class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                        0 items
                    </span>
                </div>

                <!-- Cart Items -->
                <div id="cart-items" class="space-y-3 mb-6 max-h-96 overflow-y-auto">
                    <div id="empty-cart" class="text-center py-8">
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                        </div>
                        <p class="text-gray-500">Keranjang masih kosong</p>
                        <p class="text-sm text-gray-400">Tambahkan produk untuk memulai transaksi</p>
                    </div>
                </div>

                <!-- Cart Total -->
                <div class="border-t border-gray-100 pt-4">
                    <div class="space-y-2 mb-4">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Subtotal:</span>
                            <span id="subtotal" class="font-semibold">Rp 0</span>
                        </div>
                        <div class="flex justify-between text-lg font-bold">
                            <span>Total:</span>
                            <span id="total-price" class="text-green-600">Rp 0</span>
                        </div>
                    </div>

                    <button type="button"
                            id="clear-cart"
                            class="w-full mb-3 bg-gray-100 hover:bg-gray-200 text-gray-700 py-2 px-4 rounded-xl font-medium transition-colors duration-200">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Kosongkan Keranjang
                    </button>
                </div>
            </div>

            <!-- Payment Form -->
            <div class="card-modern p-6 animate-fade-in-up" style="animation-delay: 0.3s">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-8 h-8 bg-gradient-to-br from-yellow-100 to-yellow-200 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-yellow-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z"/>
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold text-gray-900 font-poppins">Pembayaran</h2>
                </div>

                <form action="{{ route('transactions.store') }}" method="POST" id="checkout-form">
                    @csrf

                    <!-- Hidden inputs for cart data -->
                    <div id="cart-data"></div>

                    <!-- Mark as cashier transaction -->
                    <input type="hidden" name="from_cashier" value="1">

                    <!-- Total Price Hidden Input -->
                    <input type="hidden" name="total_price" id="hidden-total-price" value="0">

                    <!-- Payment Amount -->
                    <div class="mb-6">
                        <label for="payment_amount" class="block text-sm font-semibold text-gray-700 mb-3">
                            Nominal Pembayaran <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500">Rp</span>
                            <input type="number"
                                   id="payment_amount"
                                   name="payment_amount"
                                   min="0"
                                   required
                                   class="w-full pl-12 pr-4 py-3 bg-white border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-400 transition-all duration-200"
                                   placeholder="Masukkan nominal pembayaran">
                        </div>
                    </div>

                    <!-- Change Amount -->
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-gray-700 mb-3">
                            Kembalian
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500">Rp</span>
                            <input type="text"
                                   id="change_amount"
                                   readonly
                                   class="w-full pl-12 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-2xl"
                                   value="0">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                            id="checkout-btn"
                            disabled
                            class="w-full bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 disabled:from-gray-300 disabled:to-gray-400 disabled:cursor-not-allowed text-white py-4 px-6 rounded-2xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 disabled:transform-none transition-all duration-300">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span id="checkout-text">Pilih produk terlebih dahulu</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    let cart = [];

    // Clear cart if transaction was successful
    @if(session('success'))
    cart = [];
    @endif

    const cartItemsContainer = document.getElementById('cart-items');
    const cartCountElement = document.getElementById('cart-count');
    const subtotalElement = document.getElementById('subtotal');
    const totalPriceElement = document.getElementById('total-price');
    const hiddenTotalPrice = document.getElementById('hidden-total-price');
    const cartDataContainer = document.getElementById('cart-data');
    const checkoutBtn = document.getElementById('checkout-btn');
    const checkoutText = document.getElementById('checkout-text');
    const emptyCart = document.getElementById('empty-cart');

    // Product search and filter
    const productSearch = document.getElementById('product-search');
    const categoryFilter = document.getElementById('category-filter');
    const productCards = document.querySelectorAll('.product-card');

    // Payment amount and change calculation
    const paymentAmount = document.getElementById('payment_amount');
    const changeAmount = document.getElementById('change_amount');

    // Add to cart functionality
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function() {
            const card = this.closest('.product-card');
            const productId = card.dataset.productId;
            const productName = card.dataset.productName;
            const productPrice = parseFloat(card.dataset.productPrice);
            const productStock = parseInt(card.dataset.productStock);

            addToCart(productId, productName, productPrice, productStock);
        });
    });

    function addToCart(productId, productName, productPrice, productStock) {
        const existingItem = cart.find(item => item.productId === productId);

        if (existingItem) {
            if (existingItem.quantity < productStock) {
                existingItem.quantity++;
                existingItem.total = existingItem.quantity * existingItem.price;
            } else {
                alert('Stok tidak mencukupi!');
                return;
            }
        } else {
            cart.push({
                productId: productId,
                productName: productName,
                price: productPrice,
                quantity: 1,
                total: productPrice,
                stock: productStock
            });
        }

        updateCartUI();
    }

    function removeFromCart(productId) {
        cart = cart.filter(item => item.productId !== productId);
        updateCartUI();
    }

    function updateQuantity(productId, newQuantity) {
        const item = cart.find(item => item.productId === productId);
        if (item) {
            if (newQuantity <= 0) {
                removeFromCart(productId);
                return;
            }

            if (newQuantity <= item.stock) {
                item.quantity = newQuantity;
                item.total = item.quantity * item.price;
                updateCartUI();
            } else {
                alert('Stok tidak mencukupi!');
            }
        }
    }

    function updateCartUI() {
        // Update cart count
        cartCountElement.textContent = `${cart.length} items`;

        // Clear cart items container
        cartItemsContainer.innerHTML = '';

        if (cart.length === 0) {
            cartItemsContainer.appendChild(emptyCart);
            subtotalElement.textContent = 'Rp 0';
            totalPriceElement.textContent = 'Rp 0';
            hiddenTotalPrice.value = '0';
            checkoutBtn.disabled = true;
            checkoutText.textContent = 'Pilih produk terlebih dahulu';
            cartDataContainer.innerHTML = '';
            return;
        }

        // Hide empty cart message
        emptyCart.style.display = 'none';

        // Add cart items
        cart.forEach(item => {
            const cartItem = document.createElement('div');
            cartItem.className = 'bg-gray-50 rounded-xl p-3';
            cartItem.innerHTML = `
                <div class="flex items-center justify-between mb-2">
                    <h4 class="font-semibold text-gray-900 text-sm">${item.productName}</h4>
                    <button type="button" class="text-red-500 hover:text-red-700" onclick="removeFromCart('${item.productId}')">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <button type="button" class="w-6 h-6 bg-white rounded-full flex items-center justify-center text-gray-600 hover:bg-gray-100" onclick="updateQuantity('${item.productId}', ${item.quantity - 1})">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                            </svg>
                        </button>
                        <span class="w-8 text-center font-semibold">${item.quantity}</span>
                        <button type="button" class="w-6 h-6 bg-white rounded-full flex items-center justify-center text-gray-600 hover:bg-gray-100" onclick="updateQuantity('${item.productId}', ${item.quantity + 1})">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                        </button>
                    </div>
                    <span class="font-bold text-green-600">Rp ${item.total.toLocaleString('id-ID')}</span>
                </div>
                <p class="text-xs text-gray-500 mt-1">Rp ${item.price.toLocaleString('id-ID')} × ${item.quantity}</p>
            `;
            cartItemsContainer.appendChild(cartItem);
        });

        // Calculate totals
        const subtotal = cart.reduce((sum, item) => sum + item.total, 0);
        subtotalElement.textContent = `Rp ${subtotal.toLocaleString('id-ID')}`;
        totalPriceElement.textContent = `Rp ${subtotal.toLocaleString('id-ID')}`;
        hiddenTotalPrice.value = subtotal;

        // Update cart data for form submission
        updateCartData();

        // Enable/disable checkout button
        checkoutBtn.disabled = false;
        checkoutText.textContent = 'Proses Pembayaran';
    }

    function updateCartData() {
        cartDataContainer.innerHTML = '';

        cart.forEach((item, index) => {
            const itemInputs = `
                <input type="hidden" name="items[${index}][product_id]" value="${item.productId}">
                <input type="hidden" name="items[${index}][quantity]" value="${item.quantity}">
                <input type="hidden" name="items[${index}][price]" value="${item.price}">
                <input type="hidden" name="items[${index}][total]" value="${item.total}">
            `;
            cartDataContainer.insertAdjacentHTML('beforeend', itemInputs);
        });
    }

    // Clear cart
    document.getElementById('clear-cart').addEventListener('click', function() {
        if (confirm('Yakin ingin mengosongkan keranjang?')) {
            cart = [];
            updateCartUI();
        }
    });

    // Product search and filter
    function filterProducts() {
        const searchTerm = productSearch.value.toLowerCase();
        const selectedCategory = categoryFilter.value;

        productCards.forEach(card => {
            const productName = card.dataset.productName.toLowerCase();
            const categoryId = card.dataset.categoryId;

            const matchesSearch = productName.includes(searchTerm);
            const matchesCategory = !selectedCategory || categoryId === selectedCategory;

            if (matchesSearch && matchesCategory) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    productSearch.addEventListener('input', filterProducts);
    categoryFilter.addEventListener('change', filterProducts);

    // Payment amount and change calculation
    paymentAmount.addEventListener('input', function() {
        const amount = parseFloat(this.value) || 0;
        const total = parseFloat(hiddenTotalPrice.value) || 0;
        const change = amount - total;

        changeAmount.value = change >= 0 ? change.toLocaleString('id-ID') : '0';

        // Enable/disable checkout button based on payment amount
        checkoutBtn.disabled = amount < total || cart.length === 0;
        checkoutText.textContent = amount < total ? 'Nominal pembayaran kurang' : 'Proses Pembayaran';
    });

    // Form submission
    document.getElementById('checkout-form').addEventListener('submit', function(e) {
        if (cart.length === 0) {
            e.preventDefault();
            alert('Keranjang masih kosong!');
            return;
        }

        const amount = parseFloat(paymentAmount.value) || 0;
        const total = parseFloat(hiddenTotalPrice.value) || 0;

        if (amount < total) {
            e.preventDefault();
            alert('Nominal pembayaran kurang!');
            return;
        }

        // Show loading state
        checkoutBtn.disabled = true;
        checkoutText.textContent = 'Memproses...';
    });

    // Global functions for onclick handlers
    window.removeFromCart = removeFromCart;
    window.updateQuantity = updateQuantity;
});
</script>
@endpush

@endsection
