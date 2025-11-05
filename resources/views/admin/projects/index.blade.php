@extends('layouts.admin')

@section('title', 'Projects')

@section('content')
<h1 class="text-2xl font-semibold mb-6">PROJECTS</h1>

<!-- Top Bar -->
<div class="flex justify-end items-center mb-6">
    <!-- Create Button -->
    <a href="{{ route('admin.projects.create') }}"
        class="inline-flex items-center gap-2 text-sm bg-gradient-to-r from-[#f37021] to-[#f58b42] text-white px-6 py-3 rounded-xl shadow-md hover:shadow-lg hover:scale-105 transition-transform duration-200">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
        </svg>
        Create Project
    </a>
</div>

<!-- Table -->
<div class="overflow-x-auto bg-white border rounded-lg shadow">
    <table class="table-fixed w-full border-collapse" id="projects-table">
        <thead>
            <tr class="bg-[#1a1a1a] text-white text-sm font-semibold">
                <th class="px-10 py-3 rounded-tl-lg text-center w-16">ID</th>
                <th class="px-10 py-3 w-1/5">Title</th>
                <th class="px-10 py-3 w-1/5">Category</th>
                <th class="px-10 py-3 w-2/5">Overview</th>
                <th class="px-10 py-3 w-2/5">Scope of Work</th>
                <th class="px-10 py-3 w-1/5 text-center">Thumbnail</th>
                <th class="px-10 py-3 w-1/5 text-center">Images</th>
                <th class="px-10 py-3 rounded-tr-lg text-center w-40">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($projects as $project)
            <tr class="border-t hover:bg-gray-50 transition align-middle">
                <td class="px-10 py-3 text-center">{{ $project->id }}</td>
                <td class="px-10 py-3 font-medium text-center">{{ $project->project_title }}</td>
                <td class="px-10 py-3 text-center">
                    {{ $project->category?->category_name ?? 'Uncategorized' }}
                </td>
                <td class="px-10 py-3 text-gray-600 text-sm truncate max-w-xs text-center">
                    {!! Str::limit(strip_tags($project->overview), 100, '...') !!}
                </td>
                <td class="px-10 py-3 font-medium text-center">{!! $project->scope_work !!}</td>
                <td class="px-10 py-3 text-center align-middle">
                    <div class="flex justify-center">
                        @if ($project->project_image)
                        <img src="{{ asset($project->project_image) }}"
                            class="w-24 h-14 object-cover rounded shadow" alt="Project Image">
                        @else
                        <span class="text-gray-400 italic">No Image</span>
                        @endif
                    </div>
                </td>
                <!-- Gallery Images -->
                <td class="px-6 py-3 text-center">
                    @if ($project->images && $project->images->count() > 0)
                    <div class="flex flex-wrap justify-center gap-2">
                        @foreach ($project->images as $img)
                        <img src="{{ asset($img->images) }}"
                            class="w-12 h-12 object-cover rounded border border-gray-300 shadow-sm hover:scale-105 transition"
                            alt="Gallery Image">
                        @endforeach
                    </div>
                    @else
                    <span class="text-gray-400 italic">No Images</span>
                    @endif
                </td>
                <td class="px-6 py-3 whitespace-nowrap align-middle">
                    <div class="flex justify-center items-center gap-2">
                        <a href="{{ route('admin.projects.edit', $project->id) }}"
                            class="px-3 py-1 rounded text-white bg-blue-500 hover:bg-blue-600 transition">
                            Edit
                        </a>
                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="inline delete-form">
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
                <td colspan="8" class="text-center py-6 text-gray-500">No projects found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#projects-table').DataTable({
            ordering: false,
            pageLength: 10,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search projects...",
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
                    targets: 4,
                    className: "text-center"
                },
                {
                    targets: 5,
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
                text: "This project will be permanently deleted.",
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