<!-- Sidebar -->
<div class="fixed inset-y-0 left-0 z-40 w-64 bg-white/95 backdrop-blur-xl border-r border-gray-200/50 shadow-xl transform transition-transform duration-300 ease-in-out -translate-x-full lg:translate-x-0" id="sidebar">
    <div class="flex flex-col h-full">
        <!-- Logo Section -->
        <div class="flex items-center justify-center h-16 px-6 border-b border-gray-200/30">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-gradient-to-br from-primary-600 to-primary-700 rounded-2xl flex items-center justify-center shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 1H5C3.89 1 3 1.89 3 3V19C3 20.1 3.9 21 5 21H11V19H5V3H13V9H21ZM19 12H13L11 14L13 16H19C20.1 16 21 15.1 21 14S20.1 12 19 12Z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl font-bold font-poppins text-gray-900">MieKasir</h1>
                    <p class="text-xs text-primary-600 font-medium">Dashboard</p>
                </div>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
            <!-- Dashboard -->
            <a href="{{ route('dashboard') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-2xl transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-gradient-to-r from-primary-500 to-primary-600 text-white shadow-lg shadow-primary-500/25' : 'text-gray-700 hover:bg-primary-50 hover:text-primary-700' }}">
                <svg class="w-5 h-5 mr-3 {{ request()->routeIs('dashboard') ? 'text-white' : 'text-gray-400 group-hover:text-primary-600' }}" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path>
                </svg>
                Dashboard
            </a>

            @if (Auth::user()->role == 'admin')
            <!-- Kasir -->
            <a href="{{ route('transactions.cashier') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-2xl transition-all duration-200 text-gray-700 hover:bg-primary-50 hover:text-primary-700">
                <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-primary-600" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4zM18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"></path>
                </svg>
                Kasir 
            </a>

            <!-- Menu / Produk -->
            <a href="{{ route('products.index') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-2xl transition-all duration-200 text-gray-700 hover:bg-primary-50 hover:text-primary-700">
                <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-primary-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                </svg>
                Produk
            </a>

            <!-- Inventory -->
            <a href="{{ route('categories.index') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-2xl transition-all duration-200 text-gray-700 hover:bg-primary-50 hover:text-primary-700">
                <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-primary-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 2L3 7v11a1 1 0 001 1h12a1 1 0 001-1V7l-7-5zM9 9a1 1 0 112 0v4a1 1 0 11-2 0V9z" clip-rule="evenodd"></path>
                </svg>
                Kategori
            </a>

            <!-- Transaksi -->
            <a href="{{ route('transactions.index') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-2xl transition-all duration-200 text-gray-700 hover:bg-primary-50 hover:text-primary-700">
                <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-primary-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                </svg>
                Transaksi
            </a>

            <!-- Pelanggan -->
            <a href="{{ route('users.index') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-2xl transition-all duration-200 text-gray-700 hover:bg-primary-50 hover:text-primary-700">
                <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-primary-600" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>
                </svg>
                Pengguna
            </a>
            @endif
        </nav>

        <!-- User Profile Section -->
        <div class="p-4 border-t border-gray-200/30">
            <div class="flex items-center px-4 py-3 bg-gradient-to-r from-primary-50 to-emerald-50 rounded-2xl">
                <div class="w-10 h-10 bg-gradient-to-br from-primary-600 to-primary-700 rounded-xl flex items-center justify-center">
                    <span class="text-sm font-semibold text-white">{{ substr(Auth::user()->name ?? 'U', 0, 1) }}</span>
                </div>
                <div class="ml-3 flex-1">
                    <p class="text-sm font-semibold text-gray-900">{{ Auth::user()->name ?? 'User' }}</p>
                    <p class="text-xs text-primary-600">Administrator</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mobile Sidebar Overlay -->
<div class="fixed inset-0 z-30 bg-black bg-opacity-50 transition-opacity duration-300 lg:hidden opacity-0 pointer-events-none" id="sidebar-overlay"></div>
