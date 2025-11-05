@extends('layouts.admin')

@section('title', 'Contacts')

@section('content')
<!-- Page Title -->
<h1 class="text-2xl font-semibold mb-6">CONTACTS</h1>

<!-- Top Bar -->
<div class="flex justify-end items-center mb-6">
    <a href="{{ route('admin.contacts.export') }}"
        class="flex items-center gap-2 text-sm bg-gradient-to-r from-green-600 to-emerald-500 hover:bg-green-800 transition px-6 py-3 rounded-lg shadow-md text-white">
        <!-- Excel Logo Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="w-5 h-5">
            <path fill="#185C37" d="M22.5 6h19v36h-19z" />
            <path fill="#21A366" d="M9.5 6h13v36h-13z" />
            <path fill="#107C41" d="M22.5 6h6.5v36h-6.5z" />
            <path fill="#fff" d="M16 17h2.5l3 5.5 3-5.5H27l-4.25 7 4.25 7h-2.5l-3-5.5-3 5.5H16l4.25-7-4.25-7z" />
        </svg>
        <span class="font-medium">Export to Excel</span>
    </a>
</div>

<!-- Contacts Table -->
<div class="overflow-x-auto bg-white border rounded-lg shadow">
    <table class="table-fixed w-full border-collapse text-center" id="contacts-table">
        <thead>
            <tr class="bg-black text-white text-sm font-semibold">
                <th class="px-10 py-3 rounded-tl-lg w-16">ID</th>
                <th class="px-10 py-3 w-1/5">Name</th>
                <th class="px-10 py-3 w-1/5">Email</th>
                <th class="px-10 py-3 w-1/5">Subject</th>
                <th class="px-10 py-3 w-1/5">Message</th>
                <th class="px-10 py-3 rounded-tr-lg w-40">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($contacts as $contact)
            <tr class="border-t hover:bg-gray-50 transition">
                <td class="px-10 py-3 text-center">{{ $contact->id }}</td>
                <td class="px-10 py-3">{{ $contact->full_name }}</td>
                <td class="px-10 py-3">{{ strip_tags($contact->email) }}</td>
                <td class="px-10 py-3">{{ strip_tags($contact->subject) }}</td>
                <td class="px-10 py-3">{{ strip_tags($contact->message) }}</td>
                <td class="px-6 py-3 whitespace-nowrap">
                    <div class="flex justify-center items-center gap-2">
                        <button type="button"
                            onclick="confirmDelete({{ $contact->id }})"
                            class="px-3 py-1 rounded text-white bg-red-500 hover:bg-red-600 transition">
                            Delete
                        </button>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center py-6 text-gray-500">No contacts found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#contacts-table').DataTable({
            ordering: false,
            pageLength: 10,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search contacts...",
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
                    targets: 6,
                    className: "text-center"
                } // Actions column
            ]
        });
    });

    // SweetAlert Delete
    function confirmDelete(contactId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "Delete this contact? This action cannot be undone.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#EF4444',
            cancelButtonColor: '#6B7280',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                let form = document.createElement('form');
                form.method = 'POST';
                form.action = "/admin/contacts/" + contactId;

                let csrf = document.createElement('input');
                csrf.type = 'hidden';
                csrf.name = '_token';
                csrf.value = "{{ csrf_token() }}";

                let method = document.createElement('input');
                method.type = 'hidden';
                method.name = '_method';
                method.value = 'DELETE';

                form.appendChild(csrf);
                form.appendChild(method);
                document.body.appendChild(form);
                form.submit();
            }
        });
    }

    // SweetAlert Success after CRUD
    @if(session('success'))
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: "{{ session('success') }}",
        timer: 2000,
        showConfirmButton: false
    });
    @endif
</script>
@endpush