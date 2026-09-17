<x-app-layout>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <x-slot name="header">
        <div>
            <h2 class="fw-bold mb-1">Admin Management</h2>
            <p class="text-muted mb-0">
                Manage administrator accounts
            </p>
        </div>
    </x-slot>

    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h5 class="fw-bold mb-1">Administrators</h5>
                <p class="text-muted mb-0">
                    {{ $admin->count() }} account(s)
                </p>
            </div>

            <a href="{{ route('admin-admins.create') }}"
               class="btn btn-dark">
                + Add Admin
            </a>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th class="px-4">Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th class="text-end px-4">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($admin as $admins)
                                <tr>
                                    <td class="px-4 fw-semibold">
                                        {{ $admins->name }}
                                    </td>

                                    <td>
                                        {{ $admins->email }}
                                    </td>

                                    <td>
                                        @if ($admins->role === 'super_admin')
                                            <span class="badge bg-dark">
                                                Super Admin
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">
                                                Admin
                                            </span>
                                        @endif
                                    </td>

                                    <td class="text-end px-4">
                                        <a href="{{ route('admin-admins.edit', $admins) }}"
                                           class="btn btn-sm btn-outline-secondary">
                                            Edit
                                        </a>

                                        @if ($admins->id !== auth()->id())
                                            <form action="{{ route('admin-admins.destroy', $admins) }}"
                                                  method="POST"
                                                  class="d-inline">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('Delete this admin?')">
                                                    Delete
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4"
                                        class="text-center text-muted py-5">
                                        No administrators found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</x-app-layout>
