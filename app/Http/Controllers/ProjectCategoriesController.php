<?php

namespace App\Http\Controllers;

use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProjectCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projectCategories = ProjectCategory::latest()->paginate();
        return view('admin.projectCategories.index', compact('projectCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projectCategories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|string|max:255'
        ]);

        $projectCategory = ProjectCategory::create([
            'category_name' => $validated['category_name']
        ]);

        // If request is AJAX, return JSON
        if ($request->ajax()) {
            return response()->json($projectCategory);
        }

        // Otherwise normal redirect
        return redirect()->back()->with('Success', 'Project category created successfully.');
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
    public function edit(ProjectCategory $projectCategory)
    {
        return view('admin.projectCategories.edit', compact('projectCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProjectCategory $projectCategory)
    {
        $validated = $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $projectCategory->update($validated);

        return redirect()->route('admin.projectCategories.index')->with('Success', 'Project category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $projectCategory = ProjectCategory::findOrFail($id);
        $projectCategory->delete();

        return redirect()->back()->with('Success', 'Project category deleted successfully.');
    }
}
