@extends('layouts.admin')

@section('title', 'Products')

@section('content')
<h1 class="text-2xl font-semibold mb-6">PRODUCTS</h1>

<!-- 🔹 Top Bar -->
<div class="flex justify-end items-center mb-6">
    <a href="{{ route('admin.products.create') }}"
        class="inline-flex items-center gap-2 text-sm bg-gradient-to-r from-[#f37021] to-[#f58b42] text-white px-6 py-3 rounded-xl shadow-md hover:shadow-lg hover:scale-105 transition-transform duration-200">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
        </svg>
        Create Product
    </a>
</div>

<!-- 🔹 Products Table -->
<div class="overflow-x-auto bg-white border rounded-lg shadow">
    <table class="table-fixed w-full border-collapse" id="products-table">
        <thead>
            <tr class="bg-[#1a1a1a] text-white text-sm font-semibold">
                <th class="px-8 py-3 rounded-tl-lg text-center w-16">ID</th>
                <th class="px-8 py-3 text-center w-32">Category</th>
                <th class="px-8 py-3 text-left w-40">Title</th>
                <th class="px-8 py-3 text-left w-64">Description</th>
                <th class="px-8 py-3 text-center w-40">Overview</th>
                <th class="px-8 py-3 text-center w-40">Additional Info</th>
                <th class="px-8 py-3 text-center w-32">Thumbnail</th>
                <th class="px-8 py-3 text-center w-32">Images</th>
                <th class="px-8 py-3 rounded-tr-lg text-center w-40">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr class="border-t hover:bg-gray-50 transition align-middle">
                <td class="px-8 py-3 text-center font-medium">{{ $product->id }}</td>

                <!-- Category -->
                <td class="px-8 py-3 text-center">
                    {{ $product->category->category_name ?? '—' }}
                </td>

                <!-- Title -->
                <td class="px-8 py-3 font-semibold text-gray-900 text-center">
                    {{ $product->title }}
                </td>

                <!-- Description -->
                <td class="px-8 py-3 text-gray-700 text-sm text-center">
                    {{ Str::limit(strip_tags($product->description), 70, '...') }}
                </td>

                <!-- Overview -->
                <td class="px-8 py-3 text-gray-700 text-sm text-center">
                    {{ Str::limit(strip_tags($product->overview), 50, '...') }}
                </td>

                <!-- Additional Info -->
                <td class="px-8 py-3 text-gray-700 text-sm text-center">
                    {{ Str::limit(strip_tags($product->additional_information), 50, '...') }}
                </td>

                <!-- Thumbnail -->
                <td class="px-8 py-3 text-center">
                    @if ($product->thumbnail)
                    <img src="{{ asset($product->thumbnail) }}" alt="{{ $product->title }}"
                        class="w-20 h-20 object-cover rounded-lg border shadow-sm">
                    @else
                    <span class="text-gray-500 italic text-sm">No image</span>
                    @endif
                </td>

                <!-- Images -->
                <td class="px-8 py-3 text-center">
                    @if ($product->images && $product->images->count() > 0)
                    <div class="flex justify-center items-center gap-2">
                        <!-- First Image -->
                        <img src="{{ asset($product->images->first()->image) }}" alt="Product Image"
                            class="w-10 h-10 object-cover rounded-full border shadow-sm">

                        <!-- +More if exists -->
                        @if ($product->images->count() > 1)
                        <span class="text-xs text-gray-500">
                            +{{ $product->images->count() - 1 }}
                        </span>
                        @endif
                    </div>
                    @else
                    <span class="text-gray-500 italic text-sm">No images</span>
                    @endif
                </td>

                <!-- Actions -->
                <td class="px-6 py-3 whitespace-nowrap align-middle">
                    <div class="flex justify-center items-center gap-2">
                        <a href="{{ route('admin.products.edit', $product->id) }}"
                            class="px-3 py-1 rounded text-white bg-blue-500 hover:bg-blue-600 transition">
                            Edit
                        </a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                            class="inline delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="button"
                                class="delete-btn px-3 py-1 rounded text-white bg-red-500 hover:bg-red-600 transition">
                                Delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9" class="text-center py-6 text-gray-500 italic">No products found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#products-table').DataTable({
            ordering: false,
            pageLength: 10,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search products...",
                lengthMenu: "Show _MENU_ entries",
                info: "Showing _START_ to _END_ of _TOTAL_ entries",
                paginate: {
                    previous: "Previous",
                    next: "Next"
                }
            },
            columnDefs: [{
                    targets: "_all",
                    className: "align-middle"
                },
                {
                    targets: [0, 1, 4, 5, 6, 7, 8],
                    className: "text-center"
                }
            ]
        });

        // SweetAlert Delete Confirmation
        $(document).on('click', '.delete-btn', function(e) {
            e.preventDefault();
            let form = $(this).closest('form');
            Swal.fire({
                title: "Are you sure?",
                text: "This product will be permanently deleted.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#6c757d",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) form.submit();
            });
        });
    });
</script>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: "{{ session('success') }}",
        timer: 2000,
        showConfirmButton: false
    });
</script>
@endif
@endpush