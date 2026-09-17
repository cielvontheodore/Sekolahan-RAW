<x-app-layout>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <x-slot name="header">
        <div>
            <h2 class="fw-bold mb-1">Add Admin</h2>
            <p class="text-muted mb-0">
                Create a new administrator account
            </p>
        </div>
    </x-slot>

    <div class="container py-4">

        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">

                <form action="{{ route('admin-admins.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="{{ old('name') }}"
                            required
                        >

                        @error('name')
                            <div class="text-danger small mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email') }}"
                            required
                        >

                        @error('email')
                            <div class="text-danger small mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            required
                        >

                        @error('password')
                            <div class="text-danger small mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">
                            Confirm Password
                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control"
                            required
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
                            Create Admin
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</x-app-layout>
