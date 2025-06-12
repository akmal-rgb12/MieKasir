<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class siteController extends Controller
{
    /**
     * index
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Mengambil data untuk landing page
        $products = Product::with('category')
            ->orderBy('created_at', 'desc')
            ->get();

        $categories = Category::all();

        $transactions = Transaction::where('status', 'completed')
            ->get();

        $users = User::all();

        return view('landings.index', compact(
            'products',
            'categories',
            'transactions',
            'users'
        ));
    }

    /**
     * checkout
     * @return \Illuminate\Contracts\View\View
     */
    public function checkout()
    {
        // Mengambil item keranjang user yang sedang login
        $user = User::find(Auth::user()->id);
        $cartItems = $user->carts()
            ->with(['product.category'])
            ->get();

        // Menghitung subtotal
        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        // Menghitung pajak (11%)
        $tax = $subtotal * 0.11;

        // Menghitung total
        $total = $subtotal + $tax;

        // Daftar metode pembayaran yang tersedia
        $paymentMethods = [
            (object) [
                'id' => 'cash',
                'name' => 'Tunai'
            ],
            (object) [
                'id' => 'transfer',
                'name' => 'Transfer Bank'
            ],
            (object) [
                'id' => 'ewallet',
                'name' => 'E-Wallet'
            ],
            (object) [
                'id' => 'qris',
                'name' => 'QRIS'
            ]
        ];

        return view('landings.checkout', compact(
            'cartItems',
            'subtotal',
            'tax',
            'total',
            'paymentMethods'
        ));
    }

    /**
     * myOrders
     * @return \Illuminate\Contracts\View\View
     */
    public function products(Request $request)
    {
        $categories = Category::all();

        // Query dasar untuk produk
        $query = Product::with('category')
            ->orderBy('created_at', 'desc');

        // Filter berdasarkan kategori jika ada
        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        // Filter berdasarkan pencarian jika ada
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Pagination dengan 12 item per halaman
        $products = $query->paginate(12);

        return view('landings.products', compact('products', 'categories'));
    }
}
