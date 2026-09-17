<x-app-layout>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <x-slot name="header">
        <div>
            <h2 class="fw-bold mb-1">Edit Admin</h2>
            <p class="text-muted mb-0">
                Update administrator account
            </p>
        </div>
    </x-slot>

    <div class="container py-4">

        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">

                <form action="{{ route('admin-admins.update', $admin) }}"
                      method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Name --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="{{ old('name', $admin->name) }}"
                            required
                        >

                        @error('name')
                            <div class="text-danger small mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email', $admin->email) }}"
                            required
                        >

                        @error('email')
                            <div class="text-danger small mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Role --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            Role
                        </label>

                        <select name="role" class="form-select" required>
                            <option value="admin"
                                {{ old('role', $admin->role) === 'admin' ? 'selected' : '' }}>
                                Admin
                            </option>

                            <option value="super_admin"
                                {{ old('role', $admin->role) === 'super_admin' ? 'selected' : '' }}>
                                Super Admin
                            </option>
                        </select>

                        @error('role')
                            <div class="text-danger small mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            New Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Leave blank to keep current password"
                        >

                        @error('password')
                            <div class="text-danger small mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Confirm Password --}}
                    <div class="mb-4">
                        <label class="form-label fw-semibold">
                            Confirm New Password
                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control"
                        >
                    </div>

                    <div class="d-flex gap-2">
                        <a
                            href="{{ route('admin-admins.index') }}"
                            class="btn btn-outline-secondary"
                        >
                            Cancel
                        </a>

                        <button
                            type="submit"
                            class="btn btn-dark"
                        >
                            Save Changes
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</x-app-layout>
