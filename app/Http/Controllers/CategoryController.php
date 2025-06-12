<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::query()
            ->when($request->search, function ($query, $search) {
                $query->where('name', 'like', '%' . $search . '%')
                      ->orWhere('description', 'like', '%' . $search . '%');
            })
            ->latest()
            ->paginate(10)
            ->appends($request->query());

        return view('apps.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('apps.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        try {
            // validate request
            $validated = $request->validated();

            // create category
            $category = Category::make($validated);
            $category->slug = Str::slug($validated['name']);
            $category->saveOrFail();

            // redirect to categories index with success message
            return redirect()->route('categories.index')->with([
                'success' => 'Category created successfully',
            ]);
        } catch (\Exception $e) {
            // log error
            Log::error('Category creation failed: ' . $e->getMessage());

            // redirect to categories create with error message
            return redirect()->route('categories.create')->with([
                'error' => 'Category creation failed',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('apps.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('apps.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try {
            // validate request
            $validated = $request->validated();

            // update category
            $category->fill($validated);
            $category->slug = Str::slug($validated['name']);
            $category->saveOrFail();

            // redirect to categories index with success message
            return redirect()->route('categories.index')->with([
                'success' => 'Category updated successfully',
            ]);
        } catch (\Exception $e) {
            // log error
            Log::error('Category update failed: ' . $e->getMessage());

            // redirect to categories edit with error message
            return redirect()->route('categories.edit', $category)->with([
                'error' => 'Category update failed',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            // delete category
            $category->delete();

            // redirect to categories index with success message
            return redirect()->route('categories.index')->with([
                'success' => 'Category deleted successfully',
            ]);
        } catch (\Exception $e) {
            // log error
            Log::error('Category deletion failed: ' . $e->getMessage());

            // redirect to categories index with error message
            return redirect()->route('categories.index')->with([
                'error' => 'Category deletion failed',
            ]);
        }
    }
}
