@extends('layouts.admin')

@section('title', 'Projects / Edit Project')

@section('content')
<div class="max-w-screen-xl mx-auto bg-[#121212] p-10 rounded-2xl shadow-xl border border-gray-800">
    <h1 class="text-3xl font-extrabold mb-8 text-[#f37021] tracking-wide">EDIT PROJECT</h1>

    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        {{-- Category --}}
        <div>
            <label for="category_id" class="block text-sm font-medium text-gray-300 mb-2">Category</label>
            <select name="category_id" id="category_id"
                class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#f37021] focus:border-[#f37021] transition">
                <option value="" disabled>-- Select Category --</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $project->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->category_name }}
                </option>
                @endforeach
            </select>
            @error('category_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Project Title --}}
        <div>
            <label for="project_title" class="block text-sm font-medium text-gray-300 mb-2">Project Title</label>
            <input type="text" name="project_title" id="project_title"
                class="w-full bg-[#1a1a1a] text-white placeholder-gray-400 border border-gray-700 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#f37021] focus:border-[#f37021] transition"
                value="{{ old('project_title', $project->project_title) }}" required>
            @error('project_title')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Overview --}}
        <div>
            <label for="overview" class="block text-sm font-medium text-gray-300 mb-2">Overview</label>
            <textarea name="overview" id="overview" rows="5"
                class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#f37021] focus:border-[#f37021] transition">{{ old('overview', $project->overview) }}</textarea>
            @error('overview')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Scope of Work --}}
        <div>
            <label for="scope_work" class="block text-sm font-medium text-gray-300 mb-2">Scope of Work</label>
            <textarea name="scope_work" id="scope_work" rows="5"
                class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#f37021] focus:border-[#f37021] transition">{{ old('scope_work', $project->scope_work) }}</textarea>
            @error('scope_work')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Main Project Image --}}
        <div class="border-2 border-dashed border-gray-600 rounded-xl p-8 text-center bg-[#1a1a1a] hover:border-[#f37021]/60 transition">
            <p class="font-semibold text-white text-lg mb-1">Main Project Image</p>
            <p class="text-sm text-gray-400 mb-5">Upload a new image (optional)</p>

            <div class="flex flex-col items-center gap-4">
                <label for="project_image" class="cursor-pointer flex flex-col items-center">
                    <input type="file" name="project_image" id="project_image" class="hidden" accept="image/*">
                    <span
                        class="mt-2 px-6 py-2 bg-gradient-to-r from-[#f37021] to-[#f58b42] text-white rounded-lg font-semibold hover:scale-105 transition-transform shadow-md">
                        Change Image
                    </span>
                </label>
            </div>

            {{-- Current Image Preview --}}
            <div id="preview-container" class="mt-6 text-center">
                <p class="font-semibold text-gray-300 mb-3">Current Image</p>
                <div id="preview" class="relative flex justify-center">
                    @if($project->project_image)
                    <div class="relative inline-block" id="mainImageContainer">
                        <img src="{{ asset($project->project_image) }}"
                            class="w-80 h-48 object-cover rounded-lg shadow-lg border border-gray-700">
                        <button type="button"
                            class="absolute top-[-10px] right-[-10px] bg-red-600 text-white rounded-full w-7 h-7 flex items-center justify-center text-sm shadow-lg hover:bg-red-700 transition"
                            onclick="removeMainImage({{ $project->id }})">✖</button>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Gallery Images --}}
        <div class="border-2 border-dashed border-gray-600 rounded-xl p-8 text-center bg-[#1a1a1a] hover:border-[#f37021]/60 transition">
            <p class="font-semibold text-white text-lg mb-1">Gallery Images</p>
            <p class="text-sm text-gray-400 mb-5">Upload or replace gallery images (optional)</p>

            <div class="flex flex-col items-center gap-4">
                <label for="images" class="cursor-pointer flex flex-col items-center">
                    <input type="file" name="images[]" id="images" class="hidden" accept="image/*" multiple>
                    <span
                        class="mt-2 px-6 py-2 bg-gradient-to-r from-[#f37021] to-[#f58b42] text-white rounded-lg font-semibold hover:scale-105 transition-transform shadow-md">
                        Upload Gallery
                    </span>
                </label>

                {{-- Existing Gallery --}}
                @if($project->images && $project->images->count() > 0)
                <div class="mt-6">
                    <p class="font-semibold text-gray-300 mb-3">Current Gallery</p>
                    <div class="flex flex-wrap justify-center gap-3">
                        @foreach($project->images as $img)
                        <div class="relative inline-block" id="galleryImage_{{ $img->id }}">
                            <img src="{{ asset($img->images) }}"
                                class="w-24 h-24 object-cover rounded-lg border border-gray-700 shadow-md">
                            <button type="button"
                                class="absolute top-[-8px] right-[-8px] bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs shadow hover:bg-red-700 transition"
                                onclick="removeGalleryImage({{ $img->id }})">✖</button>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- New Upload Preview --}}
                <div id="galleryPreview" class="hidden mt-6">
                    <p class="font-semibold text-gray-300 mb-3">New Gallery Preview</p>
                    <div id="galleryImagesContainer" class="flex flex-wrap justify-center gap-3"></div>
                </div>
            </div>
        </div>

        {{-- Buttons --}}
        <div class="flex justify-between pt-6">
            <a href="{{ route('admin.projects.index') }}"
                class="px-6 py-2 rounded-lg border border-gray-600 text-gray-300 hover:bg-gray-700 hover:text-white transition">
                ← Back
            </a>
            <button type="submit"
                class="px-6 py-2 bg-gradient-to-r from-[#f37021] to-[#f58b42] text-white rounded-lg font-semibold hover:scale-105 shadow-lg transition">
                Update Project
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    // ✅ CKEditor dark mode
    ['overview', 'scope_work'].forEach(id => {
        ClassicEditor.create(document.querySelector('#' + id)).then(editor => {
            editor.editing.view.change(writer => {
                const root = editor.editing.view.document.getRoot();
                writer.setStyle('background-color', '#1a1a1a', root);
                writer.setStyle('color', '#ffffff', root);
            });
        }).catch(console.error);
    });

    // ✅ AJAX Remove Main Image
    function removeMainImage(projectId) {
        Swal.fire({
            title: 'Remove main image?',
            text: 'This will permanently delete the image.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#f37021',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Yes, remove it'
        }).then(result => {
            if (result.isConfirmed) {
                fetch(`/admin/projects/main-image/${projectId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            document.getElementById('mainImageContainer').remove();
                            Swal.fire('Deleted!', data.message, 'success');
                        } else {
                            Swal.fire('Error', data.message, 'error');
                        }
                    })
                    .catch(() => Swal.fire('Error', 'Something went wrong.', 'error'));
            }
        });
    }

    // ✅ AJAX Remove Gallery Image
    function removeGalleryImage(id) {
        Swal.fire({
            title: 'Remove this image?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#f37021',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Yes, delete it'
        }).then(result => {
            if (result.isConfirmed) {
                fetch(`/admin/projects/image/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                }).then(res => res.json()).then(data => {
                    if (data.success) {
                        document.getElementById(`galleryImage_${id}`).remove();
                        Swal.fire('Deleted!', data.message, 'success');
                    } else {
                        Swal.fire('Error', data.message, 'error');
                    }
                }).catch(() => Swal.fire('Error', 'Something went wrong.', 'error'));
            }
        });
    }

    // ✅ Preview new gallery uploads
    document.getElementById('images').addEventListener('change', e => {
        const files = e.target.files;
        const galleryContainer = document.getElementById('galleryImagesContainer');
        const galleryPreview = document.getElementById('galleryPreview');
        galleryContainer.innerHTML = '';

        if (files.length > 0) {
            galleryPreview.classList.remove('hidden');
            Array.from(files).forEach(file => {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = ev => {
                        const img = document.createElement('img');
                        img.src = ev.target.result;
                        img.className = 'w-24 h-24 object-cover rounded-lg border border-gray-700 shadow-md';
                        galleryContainer.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                }
            });
        } else {
            galleryPreview.classList.add('hidden');
        }
    });

    // ✅ Preview new main image instantly
    document.getElementById('project_image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const previewContainer = document.getElementById('preview');
        previewContainer.innerHTML = '';

        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(ev) {
                const wrapper = document.createElement('div');
                wrapper.className = 'relative inline-block';
                wrapper.innerHTML = `
                    <img src="${ev.target.result}" class="w-80 h-48 object-cover rounded-lg shadow-lg border border-gray-700 fade-in">
                    <button type="button"
                        class="absolute top-[-10px] right-[-10px] bg-red-600 text-white rounded-full w-7 h-7 flex items-center justify-center text-sm shadow-lg hover:bg-red-700 transition"
                        onclick="removePreviewImage()">✖</button>
                `;
                previewContainer.appendChild(wrapper);
            };
            reader.readAsDataURL(file);
        }
    });

    // ✅ Remove preview image
    function removePreviewImage() {
        document.getElementById('preview').innerHTML = '';
        document.getElementById('project_image').value = '';
    }
</script>

<style>
    .fade-in {
        animation: fadeIn 0.4s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: scale(0.98);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }
</style>
@endpush
@endsection