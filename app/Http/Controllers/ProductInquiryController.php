<?php

namespace App\Http\Controllers;

use App\Exports\ProductInquiriesExport;
use App\Models\ProductInquiry;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // ✅ Import Log facade
use Maatwebsite\Excel\Facades\Excel;

class ProductInquiryController extends Controller
{
    /**
     * Display a listing of product inquiries.
     */
    public function index()
    {
        try {
            $inquiries = ProductInquiry::with('product')->latest()->paginate(10);
            Log::info('Loaded product inquiries list', ['count' => $inquiries->count()]);
            return view('admin.product_inquiries.index', compact('inquiries'));
        } catch (\Throwable $e) {
            Log::error('Error loading product inquiries', ['error' => $e->getMessage()]);
            return back()->with('error', 'Failed to load product inquiries.');
        }
    }

    /**
     * Show the form for creating a new inquiry.
     */
    public function create()
    {
        try {
            $products = Product::all();
            Log::info('Loaded create inquiry form', ['products_count' => $products->count()]);
            return view('admin.product_inquiries.create', compact('products'));
        } catch (\Throwable $e) {
            Log::error('Error loading inquiry creation form', ['error' => $e->getMessage()]);
            return back()->with('error', 'Failed to load inquiry creation form.');
        }
    }

    /**
     * Store a newly created product inquiry in storage.
     */
    public function store(Request $request)
    {
        try {
            Log::info('Incoming product inquiry data', $request->all());

            $validated = $request->validate([
                'product_id' => 'required|exists:products,id',
                'full_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'nullable|string|max:50',
                'message' => 'nullable|string',
            ]);

            $inquiry = ProductInquiry::create($validated);

            Log::info('Product inquiry created successfully', ['inquiry_id' => $inquiry->id]);

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Inquiry submitted successfully!',
                ]);
            }

            return redirect()->route('admin.product_inquiries.index')
                ->with('success', 'Product inquiry created successfully!');
        } catch (\Throwable $e) {
            Log::error('Error storing product inquiry', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            if ($request->ajax()) {
                return response()->json(['success' => false, 'message' => 'Failed to submit inquiry.']);
            }

            return back()->with('error', 'Failed to create product inquiry.');
        }
    }

    /**
     * Display the specified inquiry.
     */
    public function show(ProductInquiry $productInquiry)
    {
        try {
            $productInquiry->load('product');
            Log::info('Showing product inquiry', ['id' => $productInquiry->id]);
            return view('admin.product_inquiries.show', compact('productInquiry'));
        } catch (\Throwable $e) {
            Log::error('Error showing product inquiry', ['error' => $e->getMessage()]);
            return back()->with('error', 'Failed to show product inquiry.');
        }
    }

    /**
     * Show the form for editing the specified inquiry.
     */
    public function edit(ProductInquiry $productInquiry)
    {
        try {
            $products = Product::all();
            Log::info('Editing product inquiry', ['id' => $productInquiry->id]);
            return view('admin.product_inquiries.edit', compact('productInquiry', 'products'));
        } catch (\Throwable $e) {
            Log::error('Error editing product inquiry', ['error' => $e->getMessage()]);
            return back()->with('error', 'Failed to load inquiry edit form.');
        }
    }

    /**
     * Update the specified product inquiry in storage.
     */
    public function update(Request $request, ProductInquiry $productInquiry)
    {
        try {
            Log::info('Updating product inquiry', ['id' => $productInquiry->id]);

            $validated = $request->validate([
                'product_id' => 'required|exists:products,id',
                'full_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'nullable|string|max:50',
                'message' => 'nullable|string',
            ]);

            $productInquiry->update($validated);

            Log::info('Product inquiry updated successfully', ['id' => $productInquiry->id]);

            return redirect()->route('admin.product_inquiries.index')
                ->with('success', 'Product inquiry updated successfully!');
        } catch (\Throwable $e) {
            Log::error('Error updating product inquiry', [
                'id' => $productInquiry->id,
                'error' => $e->getMessage(),
            ]);
            return back()->with('error', 'Failed to update product inquiry.');
        }
    }

    /**
     * Remove the specified inquiry from storage.
     */
    public function destroy(ProductInquiry $productInquiry)
    {
        try {
            $productInquiry->delete();
            Log::info('Product inquiry deleted successfully', ['id' => $productInquiry->id]);

            return redirect()->back()->with('success', 'Product inquiry deleted successfully!');
        } catch (\Throwable $e) {
            Log::error('Error deleting product inquiry', ['error' => $e->getMessage()]);
            return back()->with('error', 'Failed to delete product inquiry.');
        }
    }

    /**
     * Export all inquiries to Excel.
     */
    public function export()
    {
        try {
            Log::info('Exporting product inquiries to Excel');
            return Excel::download(new ProductInquiriesExport, 'product_inquiries.xlsx');
        } catch (\Throwable $e) {
            Log::error('Error exporting product inquiries', ['error' => $e->getMessage()]);
            return back()->with('error', 'Failed to export product inquiries.');
        }
    }
}
