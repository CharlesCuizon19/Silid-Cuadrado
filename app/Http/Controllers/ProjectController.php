<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\ProjectImage;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('category')->latest()->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $categories = ProjectCategory::all();
        return view('admin.projects.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id'    => 'required|exists:project_categories,id',
            'project_title'  => 'required|string|max:255',
            'overview'       => 'nullable|string',
            'scope_work'     => 'nullable|string',
            'project_image'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'images.*'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:6000',
        ]);

        if ($request->hasFile('project_image')) {
            $imageName = time() . '_' . $request->file('project_image')->getClientOriginalName();
            $request->file('project_image')->move(public_path('storage/project_image'), $imageName);
            $validated['project_image'] = 'storage/project_image/' . $imageName;
        }

        $project = Project::create($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('storage/project_image'), $filename);

                ProjectImage::create([
                    'project_id' => $project->id,
                    'images'     => 'storage/project_image/' . $filename,
                ]);
            }
        }

        return redirect()->route('admin.projects.index')->with('Success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        $categories = ProjectCategory::all();
        $project->load('images');
        return view('admin.projects.edit', compact('project', 'categories'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'category_id'    => 'required|exists:project_categories,id',
            'project_title'  => 'required|string|max:255',
            'overview'       => 'nullable|string',
            'scope_work'     => 'nullable|string',
            'project_image'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'images.*'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('project_image')) {
            if ($project->project_image && file_exists(public_path($project->project_image))) {
                unlink(public_path($project->project_image));
            }

            $imageName = time() . '_' . $request->file('project_image')->getClientOriginalName();
            $request->file('project_image')->move(public_path('storage/project_image'), $imageName);
            $validated['project_image'] = 'storage/project_image/' . $imageName;
        }

        $project->update($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('storage/project_image'), $filename);

                ProjectImage::create([
                    'project_id' => $project->id,
                    'images'     => 'storage/project_image/' . $filename,
                ]);
            }
        }

        return redirect()->route('admin.projects.index')->with('Success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        if ($project->project_image && file_exists(public_path($project->project_image))) {
            unlink(public_path($project->project_image));
        }

        foreach ($project->images as $image) {
            if ($image->images && file_exists(public_path($image->images))) {
                unlink(public_path($image->images));
            }
            $image->delete();
        }

        $project->delete();

        return redirect()->back()->with('Success', 'Project deleted successfully.');
    }

    /**
     * Delete a gallery image (not the main one)
     */
    public function deleteImage($id)
    {
        $image = ProjectImage::find($id);

        if ($image) {
            if ($image->images && file_exists(public_path($image->images))) {
                unlink(public_path($image->images));
            }
            $image->delete();

            return response()->json([
                'success' => true,
                'message' => 'Gallery image deleted successfully.'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Image not found.'
        ], 404);
    }

    /**
     * Delete the main project image only
     */
    public function deleteMainImage($id)
    {
        $project = Project::findOrFail($id);

        if ($project->project_image && file_exists(public_path($project->project_image))) {
            unlink(public_path($project->project_image));
        }

        $project->update(['project_image' => null]);

        return response()->json([
            'success' => true,
            'message' => 'Main project image deleted successfully.'
        ]);
    }
}
