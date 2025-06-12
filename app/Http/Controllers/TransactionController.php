<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $transactions = Transaction::query()
            ->when($request->search, function ($query, $search) {
                $query->where('invoice_number', 'like', '%' . $search . '%')
                      ->orWhereHas('customer', function ($q) use ($search) {
                          $q->where('name', 'like', '%' . $search . '%')
                            ->orWhere('email', 'like', '%' . $search . '%');
                      });
            })
            ->with(['items.product.category', 'customer'])
            ->latest()
            ->paginate(10)
            ->appends($request->query());

        return view('apps.transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('apps.transactions.create');
    }

    /**
     * Show the cashier interface.
     */
    public function cashier()
    {
        $products = Product::with('category')
            ->where('stock', '>', 0)
            ->where('status', 'active')
            ->get();

        $categories = \App\Models\Category::all();

        return view('apps.transactions.cashier', compact('products', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransactionRequest $request)
    {
        try {
            // begin transaction
            DB::beginTransaction();

            // validate request
            $validated = $request->validated();

            // upload payment proof
            if ($request->hasFile('payment_proof')) {
                $filePath = Storage::disk('public')->put(Transaction::PAYMENT_PROOF_PATH, $request->file('payment_proof'));
                $validated['payment_proof'] = $filePath;
            }

            // create transaction
            $transaction = Transaction::make($validated);
            $transaction->invoice_number = $transaction->getInvoiceNumber();
            $transaction->customer_id = Auth::user()->id;

            // Set status to completed for cashier transactions
            if ($request->has('from_cashier') || $request->route()->getName() === 'transactions.cashier.store') {
                $transaction->status = 'completed';
            }

            $transaction->saveOrFail();

            // create transaction items
            foreach ($validated['items'] as $item) {
                // ensure product is exists
                $product = Product::findOrFail($item['product_id']);

                // check if product is available
                if ($product->stock < $item['quantity']) {
                    throw ValidationException::withMessages([
                        'items.*.quantity' => 'Product is not available',
                    ]);
                }

                // ensure quantity is not more than stock
                if ($item['quantity'] > $product->stock) {
                    throw ValidationException::withMessages([
                        'items.*.quantity' => 'Product is not available',
                    ]);
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

            // update transaction total price
            $transaction->total_price = $transaction->items->sum('total');
            $transaction->saveOrFail();

            // commit transaction
            DB::commit();

            if ($request->has('from_checkout')) {
                // delete cart items
                $user = User::find(Auth::user()->id);
                $user->carts()->delete();

                // redirect to landing page with success message
                return redirect()->route('landings.index')->with([
                    'success' => 'Transaksi berhasil diproses! Invoice: ' . $transaction->invoice_number,
                ]);
            }

            // Redirect based on source
            if ($request->has('from_cashier')) {
                return redirect()->route('transactions.show', $transaction->invoice_number)->with([
                    'success' => 'Transaksi berhasil diproses! Invoice: ' . $transaction->invoice_number,
                ]);
            }

            return redirect()->route('transactions.index')->with([
                'success' => 'Transaction created successfully',
            ]);
        } catch (\Exception $e) {
            // log error
            Log::error('Transaction creation failed: ' . $e->getMessage());

            // delete payment proof
            if ($request->hasFile('payment_proof')) {
                Storage::disk('public')->delete(Transaction::PAYMENT_PROOF_PATH . '/' . $request->file('payment_proof'));
            }

            // rollback transaction
            DB::rollBack();

            // redirect to landing page with error message
            return redirect()->route('landings.index')->with([
                'error' => 'Transaction creation failed',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        $transaction->load(['items.product.category', 'customer']);

        return view('apps.transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        $transaction->load(['items.product.category', 'customer']);

        return view('apps.transactions.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        try {
            // validate request
            $validated = $request->validated();

            // upload payment proof
            if ($request->hasFile('payment_proof')) {
                $filePath = Storage::disk('public')->put(Transaction::PAYMENT_PROOF_PATH, $request->file('payment_proof'));
                $validated['payment_proof'] = $filePath;
            }

            // update transaction
            $transaction->update($validated);

            return redirect()->route('transactions.index')->with([
                'success' => 'Transaction updated successfully',
            ]);
        } catch (\Exception $e) {
            // log error
            Log::error('Transaction update failed: ' . $e->getMessage());

            // redirect to transactions edit with error message
            return redirect()->route('transactions.edit', $transaction)->with([
                'error' => 'Transaction update failed',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        try {
            // delete payment proof
            if ($transaction->payment_proof) {
                Storage::disk('public')->delete(Transaction::PAYMENT_PROOF_PATH . '/' . $transaction->payment_proof);
            }

            // delete transaction
            $transaction->delete();

            return redirect()->route('transactions.index')->with([
                'success' => 'Transaction deleted successfully',
            ]);
        } catch (\Exception $e) {
            // log error
            Log::error('Transaction deletion failed: ' . $e->getMessage());

            // redirect to transactions index with error message
            return redirect()->route('transactions.index')->with([
                'error' => 'Transaction deletion failed',
            ]);
        }
    }

    public function myOrders()
    {
        $transactions = Transaction::where('customer_id', Auth::user()->id)
            ->with(['items.product.category'])
            ->latest()
            ->paginate(5);

        return view('landings.my-orders', compact('transactions'));
    }
}
