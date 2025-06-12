<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCartRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }

    /**
     * Display a listing of the resource.
     */
    public function storeToTransaction(Request $request)
    {
        try {
            // begin transaction
            DB::beginTransaction();

            // validate request
            $validated = $request->validate([
                'items' => 'required|array',
                'items.*.product_id' => 'required|exists:products,id',
                'items.*.quantity' => 'required|integer|min:1',
                'payment_proof' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
            ], [
                'items.required' => 'Items are required',
                'items.array' => 'Items must be an array',
                'items.*.product_id.required' => 'Product ID is required',
                'items.*.product_id.exists' => 'Product not found',
                'items.*.quantity.required' => 'Quantity is required',
                'items.*.quantity.integer' => 'Quantity must be an integer',
                'items.*.quantity.min' => 'Quantity must be greater than 0',
                'payment_proof.required' => 'Payment proof is required',
                'payment_proof.file' => 'Payment proof must be a file',
                'payment_proof.mimes' => 'Payment proof must be a file of type: jpeg, png, jpg, pdf',
                'payment_proof.max' => 'Payment proof must be less than 2MB',
            ]);

            // upload payment proof
            $paymentProof = $request->file('payment_proof');
            $paymentProofPath = Storage::disk('public')->put(Transaction::PAYMENT_PROOF_PATH, $paymentProof);

            // create transaction
            $transaction = Transaction::create([
                'invoice_number' => Transaction::getInvoiceNumber(),
                'customer_id' => Auth::user()->id,
                'total_price' => $validated['items']->sum('total'),
                'payment_proof' => $paymentProofPath,
            ]);

            // create transaction items
            foreach ($validated['items'] as $item) {
                // ensure product is exists
                $product = Product::findOrFail($item['product_id']);

                // check if product is available
                if ($product->stock < $item['quantity']) {
                    return response()->json([
                        'message' => 'Product is not available',
                        'errors' => [
                            'items.*.quantity' => 'Product is not available',
                        ],
                    ], 400);
                }

                // ensure quantity is not more than stock
                if ($item['quantity'] > $product->stock) {
                    return response()->json([
                        'message' => 'Product is not available',
                        'errors' => [
                            'items.*.quantity' => 'Product is not available',
                        ],
                    ], 400);
                }

                // create transaction item
                $transaction->items()->create([
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $product->price,
                    'total' => $product->price * $item['quantity'],
                ]);

                // update product stock
                $product->stock -= $item['quantity'];
                $product->saveOrFail();
            }

            // commit transaction
            DB::commit();

            // return response
            return response()->json([
                'message' => 'Transaction created successfully',
                'data' => $transaction,
            ]);
        } catch (\Exception $e) {
            // log error
            Log::error('Transaction creation failed: ' . $e->getMessage());

            // delete payment proof
            if ($paymentProofPath) {
                Storage::disk('public')->delete($paymentProofPath);
            }

            // rollback transaction
            DB::rollBack();

            // return response
            return response()->json([
                'message' => 'Transaction creation failed',
                'errors' => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function addToCart(Request $request)
    {
        try {
            // validate request
            $validated = $request->validate([
                'product_id' => 'required|exists:products,id',
                'quantity' => 'required|integer|min:1',
            ], [
                'product_id.required' => 'Product ID is required',
                'product_id.exists' => 'Product not found',
                'quantity.required' => 'Quantity is required',
                'quantity.integer' => 'Quantity must be an integer',
                'quantity.min' => 'Quantity must be greater than 0',
            ]);

            // check if product is exists
            $product = Product::findOrFail($validated['product_id']);

            // check if quantity is not more than stock
            if ($validated['quantity'] > $product->stock) {
                return response()->json(['message' => 'Product is not available'], 400);
            }

            // check if cart is exists
            $cart = Cart::where('user_id', Auth::user()->id)->where('product_id', $validated['product_id'])->first();

            // if cart is exists, update quantity
            if ($cart) {
                $cart->quantity += $validated['quantity'];
                $cart->saveOrFail();
            } else {
                // create cart
                Cart::create([
                    'user_id' => Auth::user()->id,
                    'product_id' => $validated['product_id'],
                    'quantity' => $validated['quantity'],
                ]);
            }

            // return response with cart count and items
            return response()->json([
                'message' => 'Cart added successfully',
                'cart_count' => $this->getCartCount()->original['count'],
                'cart_items' => $this->getCartItems()->original['items'],
            ], 200);
        } catch (\Exception $e) {
            // log error
            Log::error('Cart addition failed: ' . $e->getMessage());

            // return response
            return response()->json([
                'message' => 'Cart addition failed',
                'errors' => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Get cart count
     */
    public function getCartCount()
    {
        $count = Cart::where('user_id', Auth::user()->id)->sum('quantity');
        return response()->json(['count' => $count]);
    }

    /**
     * Get cart items
     */
    public function getCartItems()
    {
        $items = Cart::with('product')
            ->where('user_id', Auth::user()->id)
            ->get()
            ->map(function ($cart) {
                return [
                    'id' => $cart->id,
                    'product_id' => $cart->product_id,
                    'name' => $cart->product->name,
                    'price' => $cart->product->price,
                    'quantity' => $cart->quantity,
                    'total' => $cart->product->price * $cart->quantity,
                    'image' => $cart->product->image ? Storage::url($cart->product->image) : asset('assets/images/no-image.png'),
                ];
            });

        return response()->json(['items' => $items]);
    }
}
