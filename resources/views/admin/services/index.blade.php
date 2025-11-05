@extends('layouts.admin')

@section('title', 'Services')

@section('content')
<h1 class="text-2xl font-semibold mb-6">SERVICES</h1>

<!-- Top Bar -->
<div class="flex justify-end items-center mb-6">
    <!-- Create Button -->
    <a href="{{ route('admin.services.create') }}"
        class="inline-flex items-center gap-2 text-sm bg-gradient-to-r from-[#f37021] to-[#f58b42] text-white px-6 py-3 rounded-xl shadow-md hover:shadow-lg hover:scale-105 transition-transform duration-200">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
        </svg>
        Create Service
    </a>
</div>

<!-- Table -->
<div class="overflow-x-auto bg-white border rounded-lg shadow">
    <table class="table-fixed w-full border-collapse" id="services-table">
        <thead>
            <tr class="bg-[#1a1a1a] text-white text-sm font-semibold">
                <th class="px-10 py-3 rounded-tl-lg text-center w-16">ID</th>
                <th class="px-10 py-3 w-1/5">Title</th>
                <th class="px-10 py-3 w-1/5">Short Description</th>
                <th class="px-10 py-3 w-1/4">Overview</th>
                <th class="px-10 py-3 w-1/4">Offer</th>
                <th class="px-10 py-3 text-center w-1/5">Icon</th>
                <th class="px-10 py-3 text-center w-1/5">Thumbnail</th>
                <th class="px-10 py-3 text-center w-1/5">Images</th>
                <th class="px-10 py-3 rounded-tr-lg text-center w-40">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($services as $service)
            <tr class="border-t hover:bg-gray-50 transition align-middle">
                <td class="px-10 py-3 text-center">{{ $service->id }}</td>
                <td class="px-10 py-3 font-medium text-center">{{ $service->title }}</td>
                <td class="px-10 py-3 text-gray-600 text-sm text-center">
                    {!! Str::limit(strip_tags($service->short_description), 80, '...') !!}
                </td>
                <td class="px-10 py-3 text-gray-600 text-sm text-center">
                    {!! Str::limit(strip_tags($service->overview), 80, '...') !!}
                </td>
                <td class="px-10 py-3 text-gray-600 text-sm text-center">
                    {!! Str::limit(strip_tags($service->offer), 80, '...') !!}
                </td>

                <!-- Icon -->
                <td class="px-10 py-3 text-center">
                    @if ($service->icon)
                    <img src="{{ asset($service->icon) }}" alt="Icon"
                        class="w-12 h-12 object-contain mx-auto rounded">
                    @else
                    <span class="text-gray-400 italic">No Icon</span>
                    @endif
                </td>

                <!-- Thumbnail -->
                <td class="px-10 py-3 text-center">
                    @if ($service->thumbnail)
                    <img src="{{ asset($service->thumbnail) }}" alt="Thumbnail"
                        class="w-24 h-14 object-cover rounded shadow mx-auto">
                    @else
                    <span class="text-gray-400 italic">No Thumbnail</span>
                    @endif
                </td>

                <!-- Gallery Images -->
                <td class="px-10 py-3 text-center">
                    @if ($service->images && $service->images->count() > 0)
                    <div class="flex flex-wrap justify-center gap-2">
                        @foreach ($service->images as $img)
                        <img src="{{ asset($img->image) }}"
                            class="w-12 h-12 object-cover rounded border border-gray-300 shadow-sm hover:scale-105 transition"
                            alt="Gallery Image">
                        @endforeach
                    </div>
                    @else
                    <span class="text-gray-400 italic">No Images</span>
                    @endif
                </td>

                <!-- Actions -->
                <td class="px-10 py-3 whitespace-nowrap text-center">
                    <div class="flex justify-center items-center gap-2">
                        <a href="{{ route('admin.services.edit', $service->id) }}"
                            class="px-3 py-1 rounded text-white bg-blue-500 hover:bg-blue-600 transition">
                            Edit
                        </a>
                        <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST"
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
                <td colspan="9" class="text-center py-6 text-gray-500">No services found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#services-table').DataTable({
            ordering: false,
            pageLength: 10,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search services...",
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
                    targets: [5, 6, 7],
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
                text: "This service will be permanently deleted.",
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