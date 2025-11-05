<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProductCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productCategories = ProductCategory::latest()->paginate();
        return view('admin.productCategories.index', compact('productCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.productCategories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|string|max:255'
        ]);

        $productCategories = ProductCategory::create([
            'category_name' => $validated['category_name']
        ]);

        // If request is AJAX, return JSON
        if ($request->ajax()) {
            return response()->json($productCategories);
        }

        // Otherwise normal redirect
        return redirect()->back()->with('Success', 'Product category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCategory $productCategory)
    {
        return view('admin.productCategories.edit', compact('productCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductCategory $productCategory)
    {
        $validated = $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $productCategory->update($validated);

        return redirect()->route('admin.productCategories.index')->with('Success', 'Product category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $productCategory = ProductCategory::findOrFail($id);
        $productCategory->delete();

        return redirect()->back()->with('Success', 'Product category deleted successfully.');
    }
}
