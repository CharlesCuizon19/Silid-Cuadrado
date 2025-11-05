<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceImage;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the services.
     */
    public function index()
    {
        $services = Service::with('images')->latest()->paginate(10);
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new service.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created service in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'              => 'required|string|max:255',
            'short_description'  => 'nullable|string|max:500',
            'overview'           => 'nullable|string',
            'offer'              => 'nullable|string',
            'icon'               => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'thumbnail'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:6000',
            'images.*'           => 'nullable|image|mimes:jpg,jpeg,png,webp|max:6000',
        ]);

        // ✅ Handle icon upload
        if ($request->hasFile('icon')) {
            $iconName = time() . '_' . $request->file('icon')->getClientOriginalName();
            $request->file('icon')->move(public_path('storage/service_icons'), $iconName);
            $validated['icon'] = 'storage/service_icons/' . $iconName;
        }

        // ✅ Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $thumbName = time() . '_' . $request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->move(public_path('storage/service_thumbnails'), $thumbName);
            $validated['thumbnail'] = 'storage/service_thumbnails/' . $thumbName;
        }

        $service = Service::create($validated);

        // ✅ Handle gallery images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('storage/service_gallery'), $filename);

                ServiceImage::create([
                    'service_id' => $service->id,
                    'image'     => 'storage/service_gallery/' . $filename,
                ]);
            }
        }

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    /**
     * Show the form for editing the specified service.
     */
    public function edit(Service $service)
    {
        $service->load('images');
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified service in storage.
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title'              => 'required|string|max:255',
            'short_description'  => 'nullable|string|max:500',
            'overview'           => 'nullable|string',
            'offer'              => 'nullable|string',
            'icon'               => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'thumbnail'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'images.*'           => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // ✅ Replace icon if new one uploaded
        if ($request->hasFile('icon')) {
            if ($service->icon && file_exists(public_path($service->icon))) {
                unlink(public_path($service->icon));
            }

            $iconName = time() . '_' . $request->file('icon')->getClientOriginalName();
            $request->file('icon')->move(public_path('storage/service_icons'), $iconName);
            $validated['icon'] = 'storage/service_icons/' . $iconName;
        }

        // ✅ Replace thumbnail if new one uploaded
        if ($request->hasFile('thumbnail')) {
            if ($service->thumbnail && file_exists(public_path($service->thumbnail))) {
                unlink(public_path($service->thumbnail));
            }

            $thumbName = time() . '_' . $request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->move(public_path('storage/service_thumbnails'), $thumbName);
            $validated['thumbnail'] = 'storage/service_thumbnails/' . $thumbName;
        }

        $service->update($validated);

        // ✅ Add new gallery images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('storage/service_gallery'), $filename);

                ServiceImage::create([
                    'service_id' => $service->id,
                    'images'     => 'storage/service_gallery/' . $filename,
                ]);
            }
        }

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified service from storage.
     */
    public function destroy(Service $service)
    {
        // ✅ Delete icon and thumbnail
        if ($service->icon && file_exists(public_path($service->icon))) {
            unlink(public_path($service->icon));
        }
        if ($service->thumbnail && file_exists(public_path($service->thumbnail))) {
            unlink(public_path($service->thumbnail));
        }

        // ✅ Delete gallery images
        foreach ($service->images as $image) {
            if ($image->images && file_exists(public_path($image->images))) {
                unlink(public_path($image->images));
            }
            $image->delete();
        }

        $service->delete();

        return redirect()->back()->with('success', 'Service deleted successfully.');
    }

    /**
     * ✅ Delete individual gallery image via AJAX.
     */
    public function deleteImage($id)
    {
        $image = ServiceImage::find($id);

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
     * ✅ Delete only the main thumbnail or icon.
     */
    public function deleteMainImage($id, $type)
    {
        $service = Service::findOrFail($id);

        if ($type === 'thumbnail' && $service->thumbnail) {
            if (file_exists(public_path($service->thumbnail))) {
                unlink(public_path($service->thumbnail));
            }
            $service->update(['thumbnail' => null]);
            $msg = 'Thumbnail deleted successfully.';
        } elseif ($type === 'icon' && $service->icon) {
            if (file_exists(public_path($service->icon))) {
                unlink(public_path($service->icon));
            }
            $service->update(['icon' => null]);
            $msg = 'Icon deleted successfully.';
        } else {
            return response()->json(['success' => false, 'message' => 'Image not found.'], 404);
        }

        return response()->json(['success' => true, 'message' => $msg]);
    }
}
