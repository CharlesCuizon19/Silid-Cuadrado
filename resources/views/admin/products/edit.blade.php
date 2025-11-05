@extends('layouts.admin')

@section('title', 'Products / Edit Product')

@section('content')
<div class="max-w-screen-xl mx-auto bg-[#121212] p-10 rounded-2xl shadow-xl border border-gray-800">
    <h1 class="text-3xl font-extrabold mb-8 text-[#f37021] tracking-wide">EDIT PRODUCT</h1>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        {{-- Category --}}
        <div>
            <label for="category_id" class="block text-sm font-medium text-gray-300 mb-2">Category</label>
            <select name="category_id" id="category_id"
                class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#f37021] focus:border-[#f37021] transition">
                <option value="">Select a category</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->category_name }}
                </option>
                @endforeach
            </select>
            @error('category_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Title --}}
        <div>
            <label for="title" class="block text-sm font-medium text-gray-300 mb-2">Title</label>
            <input type="text" name="title" id="title"
                class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#f37021] focus:border-[#f37021] transition"
                value="{{ old('title', $product->title) }}" required>
            @error('title')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Description --}}
        <div>
            <label for="description" class="block text-sm font-medium text-gray-300 mb-2">Description</label>
            <textarea name="description" id="description" rows="5"
                class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#f37021] focus:border-[#f37021] transition">{{ old('description', $product->description) }}</textarea>
            @error('description')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Overview --}}
        <div>
            <label for="overview" class="block text-sm font-medium text-gray-300 mb-2">Overview</label>
            <textarea name="overview" id="overview" rows="4"
                class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#f37021] focus:border-[#f37021] transition">{{ old('overview', $product->overview) }}</textarea>
            @error('overview')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Additional Information --}}
        <div>
            <label for="additional_information" class="block text-sm font-medium text-gray-300 mb-2">Additional Information</label>
            <textarea name="additional_information" id="additional_information" rows="4"
                class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#f37021] focus:border-[#f37021] transition">{{ old('additional_information', $product->additional_information) }}</textarea>
            @error('additional_information')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Thumbnail Upload --}}
        <div class="border-2 border-dashed border-gray-600 rounded-xl p-8 text-center bg-[#1a1a1a] hover:border-[#f37021]/60 transition">
            <p class="font-semibold text-white text-lg mb-1">Thumbnail Upload</p>
            <p class="text-sm text-gray-400 mb-5">Upload a new thumbnail or keep the existing one</p>

            <div class="flex flex-col items-center gap-4">
                <label for="thumbnail" class="cursor-pointer flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 15a4 4 0 014-4h.586a1 1 0 01.707.293l2.414 2.414a1 1 0 001.414 0l2.414-2.414a1 1 0 01.707-.293H17a4 4 0 014 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2v-1z" />
                    </svg>
                    <span class="text-gray-400 mb-3">Click below to upload a new image</span>
                    <input type="file" name="thumbnail" id="thumbnail" class="hidden" accept="image/*">
                    <span class="mt-2 px-6 py-2 bg-gradient-to-r from-[#f37021] to-[#f58b42] text-white rounded-lg font-semibold hover:scale-105 transition-transform shadow-md">
                        Replace Thumbnail
                    </span>
                </label>
            </div>
        </div>

        {{-- Existing Thumbnail Preview --}}
        <div id="thumbnail-preview-container" class="mt-6 text-center">
            <p class="font-semibold text-gray-300 mb-3">Current Thumbnail</p>
            <div id="thumbnail-preview" class="relative flex justify-center">
                @if($product->thumbnail)
                <div class="relative inline-block">
                    <img src="{{ asset($product->thumbnail) }}" alt="Thumbnail" class="w-64 h-40 object-cover rounded-lg border border-gray-600">
                    <button type="button" id="remove-thumbnail"
                        class="absolute -top-1 right-1 bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center hover:bg-red-700 transition">
                        ✖
                    </button>
                </div>
                @endif
            </div>
        </div>

        {{-- Product Images --}}
        <div class="border-2 border-dashed border-gray-600 rounded-xl p-8 text-center bg-[#1a1a1a] hover:border-[#f37021]/60 transition">
            <p class="font-semibold text-white text-lg mb-1">Additional Images</p>
            <p class="text-sm text-gray-400 mb-5">Upload new images (optional)</p>

            <div class="flex flex-col items-center gap-4">
                <label for="images" class="cursor-pointer flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mb-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4 16l4-4 4 4m0 0l4-4 4 4M4 8l4-4 4 4m0 0l4-4 4 4" />
                    </svg>
                    <span class="text-gray-400 mb-3">Click to add multiple images</span>
                    <input type="file" name="images[]" id="images" class="hidden" accept="image/*" multiple>
                    <span class="mt-2 px-6 py-2 bg-gradient-to-r from-[#f37021] to-[#f58b42] text-white rounded-lg font-semibold hover:scale-105 transition-transform shadow-md">
                        Upload Images
                    </span>
                </label>
            </div>
        </div>

        {{-- Existing Images Preview --}}
        <div class="mt-6 text-center">
            <p class="font-semibold text-gray-300 mb-3">Current Images</p>
            <div id="images-preview" class="flex flex-wrap justify-center gap-4">
                @foreach($product->images as $image)
                <div class="relative inline-block">
                    <img src="{{ asset($image->image) }}" alt="Product Image"
                        class="w-32 h-32 object-cover rounded-lg border border-gray-700 shadow">
                </div>
                @endforeach
            </div>
        </div>

        {{-- Buttons --}}
        <div class="flex justify-between pt-6">
            <a href="{{ route('admin.products.index') }}"
                class="px-6 py-2 rounded-lg border border-gray-600 text-gray-300 hover:bg-gray-700 hover:text-white transition">
                ← Back
            </a>
            <button type="submit"
                class="px-6 py-2 bg-gradient-to-r from-[#f37021] to-[#f58b42] text-white rounded-lg font-semibold hover:scale-105 shadow-lg transition">
                Update Product
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    // ✅ Initialize CKEditor
    ['description', 'overview', 'additional_information'].forEach(id => {
        ClassicEditor.create(document.querySelector(`#${id}`)).then(editor => {
            editor.editing.view.change(writer => {
                const root = editor.editing.view.document.getRoot();
                writer.setStyle('background-color', '#1a1a1a', root);
                writer.setStyle('color', '#ffffff', root);
            });
        });
    });

    // ✅ Thumbnail preview
    document.getElementById('thumbnail').addEventListener('change', e => {
        const file = e.target.files[0];
        const previewContainer = document.getElementById('thumbnail-preview');
        previewContainer.innerHTML = "";
        if (file && file.type.startsWith("image/")) {
            const reader = new FileReader();
            reader.onload = event => {
                const wrapper = document.createElement("div");
                wrapper.className = "relative inline-block";
                const img = document.createElement("img");
                img.src = event.target.result;
                img.className = "w-80 h-48 object-cover rounded-lg shadow-lg border border-gray-700";
                wrapper.appendChild(img);
                previewContainer.appendChild(wrapper);
            };
            reader.readAsDataURL(file);
        }
    });

    // ✅ Remove current thumbnail
    document.getElementById('remove-thumbnail')?.addEventListener('click', () => {
        document.getElementById('thumbnail-preview').innerHTML = '';
    });

    // ✅ Multiple image preview
    document.getElementById('images').addEventListener('change', e => {
        const files = e.target.files;
        const previewContainer = document.getElementById('images-preview');
        previewContainer.innerHTML = ''; // Clear existing previews

        Array.from(files).forEach(file => {
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = event => {
                    const wrapper = document.createElement('div');
                    wrapper.className = "relative inline-block";

                    const img = document.createElement('img');
                    img.src = event.target.result;
                    img.className = "w-32 h-32 object-cover rounded-lg border border-gray-700 shadow";

                    const btn = document.createElement('button');
                    btn.innerText = '✖';
                    btn.type = 'button';
                    btn.className = 'absolute -top-1 right-1 bg-red-600 text-white rounded-full w-5 h-5 flex items-center justify-center hover:bg-red-700 transition';
                    btn.addEventListener('click', () => wrapper.remove());

                    wrapper.appendChild(img);
                    wrapper.appendChild(btn);
                    previewContainer.appendChild(wrapper);
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>
@endpush
@endsection