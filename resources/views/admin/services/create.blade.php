@extends('layouts.admin')

@section('title', 'Services / Create Service')

@section('content')
<div class="max-w-screen-xl mx-auto bg-[#121212] p-10 rounded-2xl shadow-xl border border-gray-800">
    <h1 class="text-3xl font-extrabold mb-8 text-[#f37021] tracking-wide">CREATE SERVICE</h1>

    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        {{-- Title --}}
        <div>
            <label for="title" class="block text-sm font-medium text-gray-300 mb-2">Service Title</label>
            <input type="text" name="title" id="title"
                class="w-full bg-[#1a1a1a] text-white placeholder-gray-400 border border-gray-700 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#f37021] focus:border-[#f37021] transition"
                value="{{ old('title') }}" placeholder="Enter service title" required>
            @error('title')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Short Description --}}
        <div>
            <label for="short_description" class="block text-sm font-medium text-gray-300 mb-2">Short Description</label>
            <textarea name="short_description" id="short_description" rows="3"
                class="w-full bg-[#1a1a1a] text-white placeholder-gray-400 border border-gray-700 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#f37021] focus:border-[#f37021] transition"
                placeholder="Enter short summary">{{ old('short_description') }}</textarea>
            @error('short_description')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Overview --}}
        <div>
            <label for="overview" class="block text-sm font-medium text-gray-300 mb-2">Overview</label>
            <textarea name="overview" id="overview" rows="5"
                class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5">{{ old('overview') }}</textarea>
            @error('overview')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- What We Offer --}}
        <div>
            <label for="offer" class="block text-sm font-medium text-gray-300 mb-2">What We Offer</label>
            <textarea name="offer" id="offer" rows="5"
                class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5">{{ old('offer') }}</textarea>
            @error('offer')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Icon Upload --}}
        <div
            class="border-2 border-dashed border-gray-600 rounded-xl p-8 text-center bg-[#1a1a1a] hover:border-[#f37021]/60 transition">
            <p class="font-semibold text-white text-lg mb-1">Service Icon</p>
            <p class="text-sm text-gray-400 mb-5">Upload an image (Max 5MB • JPG • PNG • SVG • WEBP)</p>

            <div class="flex flex-col items-center gap-4">
                <label for="icon" class="cursor-pointer flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mb-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 15a4 4 0 014-4h.586a1 1 0 01.707.293l2.414 2.414a1 1 0 001.414 0l2.414-2.414a1 1 0 01.707-.293H17a4 4 0 014 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2v-1z" />
                    </svg>
                    <span class="text-gray-400 mb-3">Click to upload icon</span>
                    <input type="file" name="icon" id="icon" class="hidden" accept="image/*">
                    <span
                        class="mt-2 px-6 py-2 bg-gradient-to-r from-[#f37021] to-[#f58b42] text-white rounded-lg font-semibold hover:scale-105 transition-transform shadow-md">
                        Upload Icon
                    </span>
                </label>
            </div>

            {{-- Icon Preview --}}
            <div id="iconPreviewContainer" class="hidden mt-6 text-center">
                <p class="font-semibold text-gray-300 mb-3">Icon Preview</p>
                <div id="iconPreview" class="relative flex justify-center"></div>
            </div>

            @error('icon')
            <p class="text-red-500 text-sm mt-3">{{ $message }}</p>
            @enderror
        </div>

        {{-- Thumbnail Upload --}}
        <div
            class="border-2 border-dashed border-gray-600 rounded-xl p-8 text-center bg-[#1a1a1a] hover:border-[#f37021]/60 transition">
            <p class="font-semibold text-white text-lg mb-1">Service Thumbnail</p>
            <p class="text-sm text-gray-400 mb-5">Upload an image (Max 5MB • JPG • PNG • WEBP • GIF)</p>

            <div class="flex flex-col items-center gap-4">
                <label for="thumbnail" class="cursor-pointer flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mb-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 15a4 4 0 014-4h.586a1 1 0 01.707.293l2.414 2.414a1 1 0 001.414 0l2.414-2.414a1 1 0 01.707-.293H17a4 4 0 014 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2v-1z" />
                    </svg>
                    <span class="text-gray-400 mb-3">Click to upload thumbnail</span>
                    <input type="file" name="thumbnail" id="thumbnail" class="hidden" accept="image/*">
                    <span
                        class="mt-2 px-6 py-2 bg-gradient-to-r from-[#f37021] to-[#f58b42] text-white rounded-lg font-semibold hover:scale-105 transition-transform shadow-md">
                        Upload Thumbnail
                    </span>
                </label>
            </div>

            {{-- Thumbnail Preview --}}
            <div id="thumbnailPreviewContainer" class="hidden mt-6 text-center">
                <p class="font-semibold text-gray-300 mb-3">Thumbnail Preview</p>
                <div id="thumbnailPreview" class="relative flex justify-center"></div>
            </div>

            @error('thumbnail')
            <p class="text-red-500 text-sm mt-3">{{ $message }}</p>
            @enderror
        </div>

        {{-- Gallery Images (for ServiceImage relation) --}}
        <div
            class="border-2 border-dashed border-gray-600 rounded-xl p-8 text-center bg-[#1a1a1a] hover:border-[#f37021]/60 transition">
            <p class="font-semibold text-white text-lg mb-1">Service Gallery Images</p>
            <p class="text-sm text-gray-400 mb-5">Upload multiple images (You can select more than one)</p>

            <div class="flex flex-col items-center gap-4">
                <label for="images" class="cursor-pointer flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mb-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 15a4 4 0 014-4h.586a1 1 0 01.707.293l2.414 2.414a1 1 0 001.414 0l2.414-2.414a1 1 0 01.707-.293H17a4 4 0 014 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2v-1z" />
                    </svg>
                    <span class="text-gray-400 mb-3">Click to upload gallery images</span>
                    <input type="file" name="images[]" id="images" class="hidden" accept="image/*" multiple>
                    <span
                        class="mt-2 px-6 py-2 bg-gradient-to-r from-[#f37021] to-[#f58b42] text-white rounded-lg font-semibold hover:scale-105 transition-transform shadow-md">
                        Upload Gallery
                    </span>
                </label>
            </div>

            {{-- Gallery Preview --}}
            <div id="galleryPreviewContainer" class="hidden mt-6 text-center">
                <p class="font-semibold text-gray-300 mb-3">Gallery Preview</p>
                <div id="galleryPreview" class="flex flex-wrap justify-center gap-3"></div>
            </div>

            @error('images.*')
            <p class="text-red-500 text-sm mt-3">{{ $message }}</p>
            @enderror
        </div>

        {{-- Buttons --}}
        <div class="flex justify-between pt-6">
            <a href="{{ route('admin.services.index') }}"
                class="px-6 py-2 rounded-lg border border-gray-600 text-gray-300 hover:bg-gray-700 hover:text-white transition">
                ← Back
            </a>
            <button type="submit"
                class="px-6 py-2 bg-gradient-to-r from-[#f37021] to-[#f58b42] text-white rounded-lg font-semibold hover:scale-105 shadow-lg transition">
                Save Service
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    // ✅ CKEditor setup
    ['overview', 'offer'].forEach(id => {
        ClassicEditor.create(document.querySelector('#' + id))
            .then(editor => {
                editor.editing.view.change(writer => {
                    const root = editor.editing.view.document.getRoot();
                    writer.setStyle('background-color', '#1a1a1a', root);
                    writer.setStyle('color', '#ffffff', root);
                });
            })
            .catch(console.error);
    });

    // ✅ Helper for single preview (icon / thumbnail)
    function setupSinglePreview(inputId, previewContainerId, previewId) {
        const input = document.getElementById(inputId);
        const container = document.getElementById(previewContainerId);
        const preview = document.getElementById(previewId);

        input.addEventListener('change', (e) => {
            const file = e.target.files[0];
            preview.innerHTML = '';
            if (file && file.type.startsWith('image/')) {
                container.classList.remove('hidden');
                const reader = new FileReader();
                reader.onload = (event) => {
                    const wrapper = document.createElement('div');
                    wrapper.className = 'relative inline-block';
                    const img = document.createElement('img');
                    img.src = event.target.result;
                    img.className = 'w-80 h-48 object-cover rounded-lg shadow-lg border border-gray-700';
                    const removeBtn = document.createElement('button');
                    removeBtn.innerHTML = '✖';
                    removeBtn.type = 'button';
                    removeBtn.className = 'absolute bg-red-600 text-white rounded-full w-7 h-7 flex items-center justify-center text-sm shadow-lg hover:bg-red-700 transition';
                    removeBtn.style.top = '-10px';
                    removeBtn.style.right = '-10px';
                    removeBtn.onclick = () => {
                        input.value = '';
                        preview.innerHTML = '';
                        container.classList.add('hidden');
                    };
                    wrapper.appendChild(img);
                    wrapper.appendChild(removeBtn);
                    preview.appendChild(wrapper);
                };
                reader.readAsDataURL(file);
            }
        });
    }

    setupSinglePreview('icon', 'iconPreviewContainer', 'iconPreview');
    setupSinglePreview('thumbnail', 'thumbnailPreviewContainer', 'thumbnailPreview');

    // ✅ Gallery Preview
    document.getElementById('images').addEventListener('change', (e) => {
        const files = e.target.files;
        const container = document.getElementById('galleryPreviewContainer');
        const preview = document.getElementById('galleryPreview');
        preview.innerHTML = '';
        if (files.length > 0) {
            container.classList.remove('hidden');
            Array.from(files).forEach(file => {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = event => {
                        const img = document.createElement('img');
                        img.src = event.target.result;
                        img.className = 'w-24 h-24 object-cover rounded-lg border border-gray-700 shadow-md';
                        preview.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                }
            });
        } else {
            container.classList.add('hidden');
        }
    });
</script>
@endpush
@endsection