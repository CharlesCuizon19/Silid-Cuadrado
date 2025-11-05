@extends('layouts.admin')

@section('title', 'Projects / Create Project')

@section('content')
<div class="max-w-screen-xl mx-auto bg-[#121212] p-10 rounded-2xl shadow-xl border border-gray-800">
    <h1 class="text-3xl font-extrabold mb-8 text-[#f37021] tracking-wide">CREATE PROJECT</h1>

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        {{-- Category --}}
        <div>
            <label for="category_id" class="block text-sm font-medium text-gray-300 mb-2">Category</label>
            <select name="category_id" id="category_id"
                class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#f37021] focus:border-[#f37021] transition">
                <option value="" disabled selected>-- Select Category --</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
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
                placeholder="Enter project title" value="{{ old('project_title') }}" required>
            @error('project_title')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Overview --}}
        <div>
            <label for="overview" class="block text-sm font-medium text-gray-300 mb-2">Overview</label>
            <textarea name="overview" id="overview" rows="5"
                class="w-full bg-[#1a1a1a] text-white placeholder-gray-400 border border-gray-700 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#f37021] focus:border-[#f37021] transition"
                placeholder="Enter project overview">{{ old('overview') }}</textarea>
            @error('overview')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Scope of Work --}}
        <div>
            <label for="scope_work" class="block text-sm font-medium text-gray-300 mb-2">Scope of Work</label>
            <textarea name="scope_work" id="scope_work" rows="5"
                class="w-full bg-[#1a1a1a] text-white placeholder-gray-400 border border-gray-700 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#f37021] focus:border-[#f37021] transition"
                placeholder="Describe scope of work">{{ old('scope_work') }}</textarea>
            @error('scope_work')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Main Project Image --}}
        <div
            class="border-2 border-dashed border-gray-600 rounded-xl p-8 text-center bg-[#1a1a1a] hover:border-[#f37021]/60 transition">
            <p class="font-semibold text-white text-lg mb-1">Main Project Image</p>
            <p class="text-sm text-gray-400 mb-5">
                Upload an image (Max 5MB • JPG • PNG • WEBP • GIF)
            </p>

            <div class="flex flex-col items-center gap-4">
                <label for="project_image" class="cursor-pointer flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mb-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 15a4 4 0 014-4h.586a1 1 0 01.707.293l2.414 2.414a1 1 0 001.414 0l2.414-2.414a1 1 0 01.707-.293H17a4 4 0 014 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2v-1z" />
                    </svg>
                    <span class="text-gray-400 mb-3">Click below or drag an image to upload</span>
                    <input type="file" name="project_image" id="project_image" class="hidden" accept="image/*">
                    <span
                        class="mt-2 px-6 py-2 bg-gradient-to-r from-[#f37021] to-[#f58b42] text-white rounded-lg font-semibold hover:scale-105 transition-transform shadow-md">
                        Upload Image
                    </span>
                </label>
            </div>

            {{-- Preview --}}
            <div id="preview-container" class="hidden mt-6 text-center">
                <p class="font-semibold text-gray-300 mb-3">Preview</p>
                <div id="preview" class="relative flex justify-center"></div>
            </div>

            @error('project_image')
            <p class="text-red-500 text-sm mt-3">{{ $message }}</p>
            @enderror
        </div>

        {{-- Gallery Images --}}
        <div
            class="border-2 border-dashed border-gray-600 rounded-xl p-8 text-center bg-[#1a1a1a] hover:border-[#f37021]/60 transition">
            <p class="font-semibold text-white text-lg mb-1">Gallery Images</p>
            <p class="text-sm text-gray-400 mb-5">
                Upload additional images (You can select multiple files)
            </p>

            <div class="flex flex-col items-center gap-4">
                <label for="images" class="cursor-pointer flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mb-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 15a4 4 0 014-4h.586a1 1 0 01.707.293l2.414 2.414a1 1 0 001.414 0l2.414-2.414a1 1 0 01.707-.293H17a4 4 0 014 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2v-1z" />
                    </svg>
                    <span class="text-gray-400 mb-3">Click below or drag multiple images to upload</span>
                    <input type="file" name="images[]" id="images" class="hidden" accept="image/*" multiple>
                    <span
                        class="mt-2 px-6 py-2 bg-gradient-to-r from-[#f37021] to-[#f58b42] text-white rounded-lg font-semibold hover:scale-105 transition-transform shadow-md">
                        Upload Gallery
                    </span>
                </label>

                {{-- Preview --}}
                <div id="galleryPreview" class="hidden mt-6">
                    <p class="font-semibold text-gray-300 mb-3">Gallery Preview</p>
                    <div id="galleryImagesContainer" class="flex flex-wrap justify-center gap-3"></div>
                </div>
            </div>

            @error('images.*')
            <p class="text-red-500 text-sm mt-3">{{ $message }}</p>
            @enderror
        </div>

        {{-- Buttons --}}
        <div class="flex justify-between pt-6">
            <a href="{{ route('admin.projects.index') }}"
                class="px-6 py-2 rounded-lg border border-gray-600 text-gray-300 hover:bg-gray-700 hover:text-white transition">
                ← Back
            </a>
            <button type="submit"
                class="px-6 py-2 bg-gradient-to-r from-[#f37021] to-[#f58b42] text-white rounded-lg font-semibold hover:scale-105 shadow-lg transition">
                Save Project
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    // ✅ CKEditor dark mode like in Banner
    ['overview', 'scope_work'].forEach(id => {
        ClassicEditor.create(document.querySelector('#' + id))
            .then(editor => {
                editor.editing.view.change(writer => {
                    const root = editor.editing.view.document.getRoot();
                    writer.setStyle('background-color', '#1a1a1a', root);
                    writer.setStyle('color', '#ffffff', root);
                });
            })
            .catch(error => console.error(error));
    });

    // ✅ Main Image Preview (floating X)
    document.getElementById('project_image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const previewContainer = document.getElementById('preview-container');
        const preview = document.getElementById('preview');
        preview.innerHTML = '';

        if (file && file.type.startsWith("image/")) {
            previewContainer.classList.remove('hidden');
            const reader = new FileReader();
            reader.onload = function(event) {
                const wrapper = document.createElement('div');
                wrapper.className = 'relative inline-block';

                const img = document.createElement('img');
                img.src = event.target.result;
                img.className = 'w-80 h-48 object-cover rounded-lg shadow-lg border border-gray-700';

                const removeBtn = document.createElement('button');
                removeBtn.innerHTML = '✖';
                removeBtn.type = 'button';
                removeBtn.className =
                    'absolute bg-red-600 text-white rounded-full w-7 h-7 flex items-center justify-center text-sm shadow-lg hover:bg-red-700 transition';
                removeBtn.style.top = '-10px';
                removeBtn.style.right = '-10px';
                removeBtn.style.boxShadow = '0 2px 6px rgba(0,0,0,0.4)';

                removeBtn.onclick = () => {
                    document.getElementById('project_image').value = '';
                    preview.innerHTML = '';
                    previewContainer.classList.add('hidden');
                };

                wrapper.appendChild(img);
                wrapper.appendChild(removeBtn);
                preview.appendChild(wrapper);
            };
            reader.readAsDataURL(file);
        }
    });

    // ✅ Gallery Preview
    document.getElementById('images').addEventListener('change', function(e) {
        const files = e.target.files;
        const previewContainer = document.getElementById('galleryPreview');
        const galleryContainer = document.getElementById('galleryImagesContainer');
        galleryContainer.innerHTML = '';

        if (files.length > 0) {
            previewContainer.classList.remove('hidden');
            Array.from(files).forEach(file => {
                if (file.type.startsWith("image/")) {
                    const reader = new FileReader();
                    reader.onload = event => {
                        const img = document.createElement('img');
                        img.src = event.target.result;
                        img.className = 'w-24 h-24 object-cover rounded-lg border border-gray-700 shadow-md';
                        galleryContainer.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                }
            });
        } else {
            previewContainer.classList.add('hidden');
        }
    });
</script>
@endpush
@endsection