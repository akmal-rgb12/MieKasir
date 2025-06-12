<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::query()
            ->with('category')
            ->when($request->search, function ($query, $search) {
                $query->where('name', 'like', '%' . $search . '%')
                      ->orWhere('description', 'like', '%' . $search . '%')
                      ->orWhereHas('category', function ($q) use ($search) {
                          $q->where('name', 'like', '%' . $search . '%');
                      });
            })
            ->latest()
            ->paginate(10)
            ->appends($request->query());

        return view('apps.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('apps.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        try {
            // validate request
            $validated = $request->validated();

            // check if image is uploaded
            if ($request->hasFile('image')) {
                // upload image
                $filePath = Storage::disk('public')->put(Product::IMAGE_PATH, $request->file('image'));
                $validated['image'] = $filePath;
            }

            // create product
            $product = Product::make($validated);
            $product->slug = Str::slug($validated['name']);
            $product->saveOrFail();

            // redirect to products index with success message
            return redirect()->route('products.index')->with([
                'success' => 'Product created successfully',
            ]);
        } catch (\Exception $e) {
            // log error
            Log::error('Product creation failed: ' . $e->getMessage());

            // redirect to products create with error message
            return redirect()->route('products.create')->with([
                'error' => 'Product creation failed',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('apps.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('apps.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        try {
            // validate request
            $validated = $request->validated();

            // check if image is uploaded
            if ($request->hasFile('image')) {
                // delete old image
                if ($product->image) {
                    Storage::disk('public')->delete($product->image);
                }

                // upload new image
                $filePath = Storage::disk('public')->put(Product::IMAGE_PATH, $request->file('image'));
                $validated['image'] = $filePath;
            }

            // update product
            $product->fill($validated);
            $product->saveOrFail();

            // redirect to products index with success message
            return redirect()->route('products.index')->with([
                'success' => 'Product updated successfully',
            ]);
        } catch (\Exception $e) {
            // log error
            Log::error('Product update failed: ' . $e->getMessage());

            // redirect to products edit with error message
            return redirect()->route('products.edit', $product)->with([
                'error' => 'Product update failed',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            // check if product has image
            if ($product->image) {
                // delete image
                Storage::disk('public')->delete($product->image);
            }

            // delete product
            $product->delete();

            // redirect to products index with success message
            return redirect()->route('products.index')->with([
                'success' => 'Product deleted successfully',
            ]);
        } catch (\Exception $e) {
            // log error
            Log::error('Product deletion failed: ' . $e->getMessage());

            // redirect to products index with error message
            return redirect()->route('products.index')->with([
                'error' => 'Product deletion failed',
            ]);
        }
    }
}
