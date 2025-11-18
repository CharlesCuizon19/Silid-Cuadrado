<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Service;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function homepage()
    {
        $banners = Banner::latest()->take(5)->get();

        $services = Service::with('images')
            ->latest()
            ->take(10)
            ->get();

        $products = Product::with('category', 'images')
            ->latest()
            ->take(6)
            ->get();

        $projects = Project::with('category', 'images')
            ->latest()
            ->take(4)
            ->get();

        return view('pages.homepage', compact('banners', 'services', 'products', 'projects'));
    }



    public function about_us()
    {
        return view('pages.about-us');
    }
    public function products(Request $request)
    {
        // Filters
        $selectedCategories = $request->input('categories', []);
        $search = $request->input('search');
        $sort = $request->input('sort');

        // Query
        $query = Product::with('category')
            ->when(!empty($selectedCategories), function ($q) use ($selectedCategories) {
                $q->whereHas('category', function ($sub) use ($selectedCategories) {
                    $sub->whereIn('category_name', $selectedCategories);
                });
            })
            ->when(!empty($search), function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%");
            })
            ->when($sort === 'newest', fn($q) => $q->latest())
            ->when($sort === 'oldest', fn($q) => $q->oldest())
            ->when($sort === 'a-z', fn($q) => $q->orderBy('title', 'asc'))
            ->when($sort === 'z-a', fn($q) => $q->orderBy('title', 'desc'));

        // Pagination
        $perPage = 9;
        $products = $query->paginate($perPage);

        // For filter UI
        $categories = ProductCategory::pluck('category_name');

        return view('pages.products', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function product_details($id)
    {
        // Get product with its related category and images
        $product = Product::with(['category', 'images'])->findOrFail($id);

        // Get 3 latest products excluding the current one
        $relatedProducts = Product::with('category')
            ->where('id', '!=', $id)
            ->latest()
            ->take(3)
            ->get();

        return view('pages.product-details', [
            'product' => $product,
            'products' => $relatedProducts,
        ]);
    }

    public function services(Request $request)
    {
        // Paginate 9 per page, same as before
        $services = Service::with('images')->latest()->paginate(9);

        return view('pages.services', compact('services'));
    }
    public function service_details($id)
    {
        // ✅ Get selected service with its gallery images
        $service = Service::with('images')->findOrFail($id);

        // ✅ Get 4 other related services (excluding current one)
        $relatedServices = Service::where('id', '!=', $id)
            ->latest()
            ->take(4)
            ->get();

        return view('pages.service-details', compact('service', 'relatedServices'));
    }

    public function projects(Request $request)
    {
        // --- Filters ---
        $selectedCategories = $request->input('categories', []); // array of selected categories
        $search = $request->input('search');

        // --- Base Query ---
        $query = Project::with('category')
            ->when(!empty($selectedCategories), function ($q) use ($selectedCategories) {
                $q->whereHas('category', function ($sub) use ($selectedCategories) {
                    $sub->whereIn('category_name', $selectedCategories);
                });
            })
            ->when($search, function ($q) use ($search) {
                $q->where('project_title', 'like', "%{$search}%");
            })
            ->latest();

        // --- Pagination ---
        $perPage = 4;
        $projects = $query->paginate($perPage);
        $page = $projects->currentPage();
        $lastPage = $projects->lastPage();
        $total = $projects->total();

        // --- Get all categories for the dropdown ---
        $categories = ProjectCategory::pluck('category_name');

        return view('pages.projects', [
            'projects' => $projects,
            'categories' => $categories,
            'page' => $page,
            'perPage' => $perPage,
            'total' => $total,
            'lastPage' => $lastPage,
            'selectedCategories' => $selectedCategories,
            'search' => $search,
        ]);
    }

    public function project_details($id)
    {
        // Fetch the project with its category and gallery images
        $project = Project::with(['category', 'images'])->findOrFail($id);

        // Get related projects (excluding current one)
        $relatedProjects = Project::with('category')
            ->where('id', '!=', $id)
            ->latest()
            ->take(3)
            ->get();

        // Convert scope_of_work into array if it's stored as comma-separated text
        $scopeOfWork = [];
        if (!empty($project->scope_work)) {
            $scopeOfWork = array_map('trim', explode(',', $project->scope_work));
        }

        return view('pages.project-details', compact('project', 'relatedProjects', 'scopeOfWork'));
    }
    public function contact_us()
    {
        return view('pages.contact-us');
    }
    public function terms_and_conditions()
    {
        return view('pages.terms-and-conditions');
    }
    public function privacy_policy()
    {
        return view('pages.privacy-policy');
    }
}
