<!-- Main Navigation -->
<nav class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-xl border-b border-gray-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('landings.index') }}" class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-primary-600 to-primary-700 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 1H5C3.89 1 3 1.89 3 3V19C3 20.1 3.9 21 5 21H11V19H5V3H13V9H21ZM19 12H13L11 14L13 16H19C20.1 16 21 15.1 21 14S20.1 12 19 12Z"/>
                        </svg>
                    </div>
                    <div>
                        <span class="text-xl font-bold text-gray-900 font-poppins">MieKasir</span>
                        <p class="text-xs text-primary-600 font-medium">Sistem Kasir Modern</p>
                    </div>
                </a>
            </div>

            <!-- Auth Buttons and Cart -->
            <div class="hidden md:flex items-center space-x-4">
                <!-- Cart Dropdown -->
                <div class="relative cart-dropdown">
                    <button type="button" class="cart-toggle flex items-center space-x-1 text-gray-700 hover:text-primary-600 transition-colors duration-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span id="cart-count" class="bg-primary-600 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">0</span>
                    </button>

                    <div class="cart-content absolute right-0 mt-2 w-80 bg-white rounded-xl shadow-lg py-2 z-50 hidden transform opacity-0 transition-all duration-200">
                        <div class="px-4 py-2 border-b border-gray-100">
                            <h3 class="text-sm font-semibold text-gray-700">Keranjang Belanja</h3>
                        </div>
                        <div id="cart-items" class="max-h-96 overflow-y-auto">
                            <!-- Cart items will be dynamically inserted here -->
                        </div>
                        <div class="px-4 py-2 border-t border-gray-100">
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-sm font-semibold text-gray-700">Total:</span>
                                <span id="cart-total" class="text-sm font-bold text-primary-600">Rp 0</span>
                            </div>
                            <a href="/checkout" class="block w-full px-4 py-2 text-center bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors duration-200">
                                Checkout
                            </a>
                        </div>
                    </div>
                </div>

                @guest
                    <a href="{{ route('login') }}" class="text-gray-700 font-semibold hover:text-primary-600 transition-colors duration-200">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" class="px-4 py-2 rounded-xl bg-primary-600 text-white font-semibold hover:bg-primary-700 transition-all duration-200 transform hover:scale-105 shadow-md hover:shadow-lg">
                        Daftar
                    </a>
                @else
                    @if(auth()->user()->is_admin)
                        <a href="{{ route('dashboard') }}" class="px-4 py-2 rounded-xl bg-primary-600 text-white font-semibold hover:bg-primary-700 transition-all duration-200 transform hover:scale-105 shadow-md hover:shadow-lg">
                            Dashboard
                        </a>
                    @else
                        <!-- User Dropdown -->
                        <div class="relative user-dropdown">
                            <button type="button" class="user-toggle flex items-center space-x-2 text-gray-700 hover:text-primary-600 transition-colors duration-200">
                                <span class="font-semibold">{{ auth()->user()->name }}</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>

                            <div class="user-content absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg py-2 z-50 hidden transform opacity-0 transition-all duration-200">
                                <a href="{{ route('transactions.my-orders') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-primary-600 transition-colors duration-200">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                        </svg>
                                        <span>Pesanan Saya</span>
                                    </div>
                                </a>
                                <form method="POST" action="{{ route('logout') }}" class="block">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-primary-600 transition-colors duration-200">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                            </svg>
                                            <span>Keluar</span>
                                        </div>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endif
                @endguest
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden flex items-center space-x-4">
                <!-- Mobile Cart -->
                <div class="cart-dropdown">
                    <button type="button" class="cart-toggle p-2 text-gray-600 hover:text-gray-900">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </button>

                    <div class="cart-content absolute right-0 mt-2 w-80 bg-white rounded-xl shadow-lg py-2 z-50 hidden transform opacity-0 transition-all duration-200 mr-4">
                        <div class="px-4 py-2 border-b border-gray-100">
                            <h3 class="text-sm font-semibold text-gray-700">Keranjang Belanja</h3>
                        </div>
                        <div class="px-4 py-2">
                            <p class="text-sm text-gray-500">Keranjang belanja kosong</p>
                        </div>
                    </div>
                </div>

                <button type="button" class="mobile-menu-button inline-flex items-center justify-center p-2 rounded-xl text-gray-600 hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary-500 transition-all duration-200">
                    <span class="sr-only">Buka menu</span>
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="md:hidden mobile-menu hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 border-t border-gray-200">
            @guest
                <a href="{{ route('login') }}" class="block px-3 py-2 rounded-xl text-gray-600 hover:text-gray-900 hover:bg-gray-100 font-medium transition-colors duration-200">
                    Masuk
                </a>
                <a href="{{ route('register') }}" class="block px-3 py-2 rounded-xl text-white bg-primary-600 hover:bg-primary-700 font-medium transition-colors duration-200">
                    Daftar
                </a>
            @else
                @if(auth()->user()->is_admin)
                    <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded-xl text-white bg-primary-600 hover:bg-primary-700 font-medium transition-colors duration-200">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('transactions.my-orders') }}" class="block px-3 py-2 rounded-xl text-gray-600 hover:text-gray-900 hover:bg-gray-100 font-medium transition-colors duration-200">
                        Pesanan Saya
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-3 py-2 rounded-xl text-gray-600 hover:text-gray-900 hover:bg-gray-100 font-medium transition-colors duration-200">
                            Keluar
                        </button>
                    </form>
                @endif
            @endguest
        </div>
    </div>
</nav>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initial cart load
        if (@json(auth()->check())) {
            loadCart();
        }

        // Cart functionality
        const cartDropdowns = document.querySelectorAll('.cart-dropdown');

        cartDropdowns.forEach(dropdown => {
            const toggleButton = dropdown.querySelector('.cart-toggle');
            const content = dropdown.querySelector('.cart-content');
            let isOpen = false;

            // Toggle cart dropdown
            toggleButton.addEventListener('click', async (e) => {
                e.stopPropagation();
                if (!isOpen) {
                    await loadCart();
                    openCart(content);
                } else {
                    closeCart(content);
                }
                isOpen = !isOpen;
            });

            // Close cart when clicking outside
            document.addEventListener('click', (e) => {
                if (!dropdown.contains(e.target) && isOpen) {
                    closeCart(content);
                    isOpen = false;
                }
            });

            // Close cart on ESC key
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && isOpen) {
                    closeCart(content);
                    isOpen = false;
                }
            });
        });

        // Cart functions
        async function loadCart() {
            try {
                const [countResponse, itemsResponse] = await Promise.all([
                    fetch('/carts/count'),
                    fetch('/carts/items')
                ]);

                const countData = await countResponse.json();
                const itemsData = await itemsResponse.json();

                updateCartCount(countData.count);
                updateCartItems(itemsData.items);
            } catch (error) {
                console.error('Error loading cart:', error);
            }
        }

        function updateCartCount(count) {
            document.getElementById('cart-count').textContent = count;
        }

        function updateCartItems(items) {
            const cartItemsContainer = document.getElementById('cart-items');
            const cartTotal = document.getElementById('cart-total');

            if (items.length === 0) {
                cartItemsContainer.innerHTML = `
                    <div class="px-4 py-2">
                        <p class="text-sm text-gray-500">Keranjang belanja kosong</p>
                    </div>
                `;
                cartTotal.textContent = 'Rp 0';
                return;
            }

            let total = 0;
            cartItemsContainer.innerHTML = items.map(item => {
                total += item.total;
                return `
                    <div class="px-4 py-2 border-b border-gray-100 flex items-center space-x-4">
                        <img src="${item.image}" alt="${item.name}" class="w-16 h-16 object-cover rounded-lg" onerror="this.onerror=null; this.src='{{ asset('assets/images/no-image.png') }}';">
                        <div class="flex-1">
                            <h4 class="text-sm font-medium text-gray-900">${item.name}</h4>
                            <p class="text-sm text-gray-500">${item.quantity} x Rp ${new Intl.NumberFormat('id-ID').format(item.price)}</p>
                        </div>
                        <span class="text-sm font-semibold text-primary-600">
                            Rp ${new Intl.NumberFormat('id-ID').format(item.total)}
                        </span>
                    </div>
                `;
            }).join('');

            cartTotal.textContent = `Rp ${new Intl.NumberFormat('id-ID').format(total)}`;
        }

        // Make loadCart function available globally
        window.loadCart = loadCart;

        // Fungsi untuk membuka cart dropdown
        function openCart(content) {
            content.classList.remove('hidden');
            // Trigger reflow
            content.offsetHeight;
            content.classList.remove('opacity-0');
            content.classList.add('opacity-100');
        }

        // Fungsi untuk menutup cart dropdown
        function closeCart(content) {
            content.classList.remove('opacity-100');
            content.classList.add('opacity-0');
            setTimeout(() => {
                content.classList.add('hidden');
            }, 200);
        }

        // Mobile menu functionality
        const mobileMenuButton = document.querySelector('.mobile-menu-button');
        const mobileMenu = document.querySelector('.mobile-menu');

        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            if (!mobileMenu.contains(event.target) && !mobileMenuButton.contains(event.target)) {
                mobileMenu.classList.add('hidden');
            }
        });

        // Handle scroll behavior
        let lastScroll = 0;
        const navbar = document.querySelector('nav');

        window.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset;

            if (currentScroll <= 0) {
                navbar.classList.remove('shadow-lg');
                return;
            }

            if (currentScroll > lastScroll) {
                // Scrolling down
                navbar.classList.add('transform', '-translate-y-full', 'transition-transform', 'duration-300');
            } else {
                // Scrolling up
                navbar.classList.remove('-translate-y-full');
                navbar.classList.add('shadow-lg');
            }

            lastScroll = currentScroll;
        });

        // User dropdown functionality
        const userDropdowns = document.querySelectorAll('.user-dropdown');

        userDropdowns.forEach(dropdown => {
            const toggleButton = dropdown.querySelector('.user-toggle');
            const content = dropdown.querySelector('.user-content');
            let isOpen = false;

            // Toggle user dropdown
            toggleButton?.addEventListener('click', (e) => {
                e.stopPropagation();
                if (!isOpen) {
                    openUserDropdown(content);
                } else {
                    closeUserDropdown(content);
                }
                isOpen = !isOpen;
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', (e) => {
                if (!dropdown.contains(e.target) && isOpen) {
                    closeUserDropdown(content);
                    isOpen = false;
                }
            });

            // Close dropdown on ESC key
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && isOpen) {
                    closeUserDropdown(content);
                    isOpen = false;
                }
            });
        });

        // Fungsi untuk membuka user dropdown
        function openUserDropdown(content) {
            if (!content) return;
            content.classList.remove('hidden');
            // Trigger reflow
            content.offsetHeight;
            content.classList.remove('opacity-0');
            content.classList.add('opacity-100');
        }

        // Fungsi untuk menutup user dropdown
        function closeUserDropdown(content) {
            if (!content) return;
            content.classList.remove('opacity-100');
            content.classList.add('opacity-0');
            setTimeout(() => {
                content.classList.add('hidden');
            }, 200);
        }
    });
</script>
@endpush
