<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImages;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        $categories = ProductCategory::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:product_categories,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'overview' => 'nullable|string',
            'additional_information' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120'
        ]);

        // ✅ Manually move thumbnail to public/storage/product_thumbnails
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '_' . $thumbnail->getClientOriginalName();
            $thumbnail->move(public_path('storage/product_thumbnails'), $thumbnailName);
            $validated['thumbnail'] = 'storage/product_thumbnails/' . $thumbnailName;
        }

        // ✅ Create the product
        $product = Product::create($validated);

        // ✅ Manually move gallery images to public/storage/product_images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $imageName = time() . '_' . $img->getClientOriginalName();
                $img->move(public_path('storage/product_images'), $imageName);

                ProductImages::create([
                    'product_id' => $product->id,
                    'image' => 'storage/product_images/' . $imageName,
                ]);
            }
        }

        return redirect()->route('admin.products.index')
            ->with('Success', 'Product created successfully!');
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product)
    {
        $categories = ProductCategory::all();
        $product->load('images');
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:product_categories,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'overview' => 'nullable|string',
            'additional_information' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120'
        ]);

        // ✅ Handle thumbnail replacement
        if ($request->hasFile('thumbnail')) {
            // delete old thumbnail if exists
            if ($product->thumbnail && file_exists(public_path($product->thumbnail))) {
                unlink(public_path($product->thumbnail));
            }

            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '_' . $thumbnail->getClientOriginalName();
            $thumbnail->move(public_path('storage/product_thumbnails'), $thumbnailName);
            $validated['thumbnail'] = 'storage/product_thumbnails/' . $thumbnailName;
        }

        // ✅ Update main product fields
        $product->update($validated);

        // ✅ Handle new image uploads (additional images)
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $imageName = time() . '_' . $img->getClientOriginalName();
                $img->move(public_path('storage/product_images'), $imageName);

                ProductImages::create([
                    'product_id' => $product->id,
                    'image' => 'storage/product_images/' . $imageName,
                ]);
            }
        }

        // ✅ Handle image deletions (optional if using AJAX)
        if ($request->has('delete_images')) {
            foreach ($request->delete_images as $imageId) {
                $image = ProductImages::find($imageId);
                if ($image) {
                    if ($image->image && file_exists(public_path($image->image))) {
                        unlink(public_path($image->image));
                    }
                    $image->delete();
                }
            }
        }

        return redirect()->route('admin.products.index')
            ->with('Success', 'Product updated successfully!');
    }


    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product)
    {
        // delete thumbnail if exists
        if ($product->thumbnail && file_exists(public_path($product->thumbnail))) {
            unlink(public_path($product->thumbnail));
        }

        // delete all related images
        foreach ($product->images as $image) {
            if ($image->image_path && file_exists(public_path($image->image_path))) {
                unlink(public_path($image->image_path));
            }
            $image->delete();
        }

        $product->delete();

        return redirect()->back()->with('Success', 'Product deleted successfully!');
    }

    /**
     * Delete a specific image from the product gallery (AJAX route).
     */
    public function deleteImage($id)
    {
        $image = ProductImages::findOrFail($id);

        if ($image->image_path && file_exists(public_path($image->image_path))) {
            unlink(public_path($image->image_path));
        }

        $image->delete();

        return response()->json(['success' => true, 'message' => 'Image deleted successfully.']);
    }
}
